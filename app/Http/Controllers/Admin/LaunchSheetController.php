<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreLaunchSheetRequest;
use App\Http\Requests\UpdateLaunchSheetRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\LaunchSheet;
use App\Models\User;
use App\Models\Employee;
use App\Models\Attendance;
use App\Models\ExtraLaunch;
use App\Models\CompanyPolicy;
use App\Models\LaunchInvoice;
use Carbon\Carbon;
use PDF;
use App\Models\LaunchProvider;

class LaunchSheetController extends Controller
{   
    public function seedDatabase(){
        $attendanceList = Attendance::all();
        // dd($attendanceList);
        foreach($attendanceList as $attendance){
            $launchSheet                = new LaunchSheet();
            $launchSheet->user_id       = $attendance->employee->user_id;
            $launchSheet->date          = date('Y-m-d', strtotime($attendance->date));
            $launchSheet->attendance_id = $attendance->id;
            $launchSheet->status        = rand(0, 1);
            $launchSheet->save();
        }

        return redirect()->back()->with([
            'message' => 'Database Seeded Successfully',
            'alert-type' => 'success'
        ]);
    }
    public function index()
    {
        if(Auth::check() == false || Auth::user()->role_id == 4){
            return redirect()->route('login');
        }
        else{
            session([
                'menu_active' => 'launch_sheet',
                'page_title' => 'Launch Sheet',
                'page_title_description' => 'Manage Launch Sheet Details',
                'breadcrumb' => [
                    'Home' => route('admin.dashboard'),
                    'Launch Sheet' => '',
                ],
            ]);

            $curDate = intval(date('d'));
            $curMonth = intval(date('m'));
            $curYear = intval(date('Y'));
            $launchSheets   = LaunchSheet::all();
            $extraLaunchs   = ExtraLaunch::all();
            $employees      = Employee::all();
            $users          = User::all();
            return view('admin.launch-sheet.index', compact('launchSheets', 'employees', 'extraLaunchs', 'users'));
        }
    }

    public function invoices(){
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            session([
                'menu_active' => 'launch_sheet_invoices',
                'page_title' => 'Launch Sheet',
                'page_title_description' => 'Manage Launch Sheet Details',
                'breadcrumb' => [
                    'Home' => route('admin.dashboard'),
                    'Launch Sheet' => route('admin.launch-sheet.index'),
                ],
            ]);

            $launchSheets = LaunchSheet::all();
            $extraLaunchs = ExtraLaunch::all();
            $employees = Employee::all();
            $invoices = LaunchInvoice::all();
            return view('admin.launch-sheet.invoice', compact('launchSheets', 'employees', 'extraLaunchs', 'invoices'));
        }
    }

    public function reloadTotalLaunch(){
        $curDate = intval(date('d'));
        $curMonth = intval(date('m'));
        $curYear = intval(date('Y'));
        $totalDaysInMonth = cal_days_in_month(CAL_GREGORIAN, $curMonth, $curYear);
        for($c = 1; $c <= $totalDaysInMonth; $c++){
            $totalLaunchPerDay = LaunchSheet::whereDate('date', date('Y-m-d', strtotime($curYear.'-'.$curMonth.'-'.$c)))->distinct('user_id')->where('status', 1)->get()->count();
            $extraLaunch = ExtraLaunch::whereDate('date', date('Y-m-d', strtotime($curYear.'-'.$curMonth.'-'.$c)))->first();

            // dd($extraLaunch, $totalLaunchPerDay);

            if($extraLaunch != null || !empty($extraLaunch)){
                // dd($extraLaunch, $totalLaunchPerDay, "NOT NULL", $extraLaunch->update() );
                $extraLaunch->total_launch = $totalLaunchPerDay + $extraLaunch->count;
                $extraLaunch->count = $extraLaunch->count;
                $extraLaunch->update();
            }
            else{
                $dailyLaunchInfo = new ExtraLaunch();
                $dailyLaunchInfo->date = date('Y-m-d', strtotime($curYear.'-'.$curMonth.'-'.$c));
                $dailyLaunchInfo->total_launch = $totalLaunchPerDay;
                $dailyLaunchInfo->count = 0;
                $dailyLaunchInfo->save();
            }
        }

        return redirect()->route('admin.launch-sheet.index');
    }

    public function update(Request $request){
        $totalLaunchPerDay = LaunchSheet::whereDay('date', $request->date_day)->where('status', 1)->get()->count();
        $extraLaunch = ExtraLaunch::whereDay('date', $request->date_day)->first();

        if(!empty($extraLaunch) || isset($extraLaunch)){
            $extraLaunch->delete();
        }

        $curYear = intval(date('Y'));
        $curMonth = intval(date('m'));
        $total_launch_count = $totalLaunchPerDay + $request->extra_launch;
        
        // dd($total_launch_count);
        
        $dailyLaunchInfo = new ExtraLaunch();
        $dailyLaunchInfo->date = date('Y-m-d', strtotime($curYear.'-'.$curMonth.'-'.$request->date_day));
        $dailyLaunchInfo->total_launch = $total_launch_count;
        $dailyLaunchInfo->count = $request->extra_launch;
        $dailyLaunchInfo->total_price = $total_launch_count * CompanyPolicy::orderby('id', 'desc')->first()->launch_price_per_person;
        $dailyLaunchInfo->save();

        return redirect()->back()->with([
            'message' => 'Extra Launch Updated Successfully',
            'alert-type' => 'success',
        ]);
    }

    public function createInvoice(Request $request){
        
        $inv_start_date = $request->invoice_start_date;
        $inv_end_date   = $request->invoice_end_date;
        $inv_month      = $request->invoice_month;

        $launchProvider = LaunchProvider::where('status', 1)->first();

        if($inv_month == null){
            $launchSheets = LaunchSheet::whereBetween('date', [$inv_start_date, $inv_end_date])->get();
            $extraLaunchs = ExtraLaunch::whereBetween('date', [$inv_start_date, $inv_end_date])->get();
            
            $daily_total_launch_sheet = 0;
            for($i = Carbon::parse($request->invoice_start_date); $i <= Carbon::parse($request->invoice_end_date); $i->addDay()){
                $daily_total_launch_sheet += LaunchSheet::whereDate('date', date('Y-m-d', strtotime($i)))->where('status', 1)->get()->count();
            }
    
            // generate random number for invoice number and check if it is already exist
            $invoice_number = rand(100000, 999999);
            $invoice = LaunchInvoice::where('invoice_number', $invoice_number)->first();
            while($invoice != null){
                $invoice_number = rand(100000, 999999);
                $invoice = LaunchInvoice::where('invoice_number', $invoice_number)->first();
            }
    
            for($i = Carbon::parse($request->invoice_start_date); $i <= Carbon::parse($request->invoice_end_date); $i->addDay()){
                while($invoice != null){
                    $invoice_number = rand(100000, 999999);
                    $invoice = LaunchInvoice::whereDate('start_date', date('Y-m-d', strtotime($i)))
                                            ->whereDate('end_date', date('Y-m-d', strtotime($i)))->first();
                }   
            }
    
            $launch_invoice                 = new LaunchInvoice();
            $launch_invoice->invoice_date   = date('Y-m-d');
            $launch_invoice->invoice_number = $invoice_number;
            $launch_invoice->start_date     = $inv_start_date;
            $launch_invoice->end_date       = $inv_end_date;
            $launch_invoice->total_launch   = $daily_total_launch_sheet;
            $launch_invoice->total_cost     = $daily_total_launch_sheet * $launchProvider->unit_price;
            $launch_invoice->status         = 0;
            $launch_invoice->save();
        }
        else{
            $launchSheets = LaunchSheet::whereMonth('date', $inv_month)->get();
            $extraLaunchs = ExtraLaunch::whereMonth('date', $inv_month)->get();
            $date = date('Y-'.$inv_month.'-d');
            $total_days_in_month = Carbon::parse($date)->daysInMonth;
            
            $daily_total_launch_sheet = 0;
            for($i = 1; $i <= $total_days_in_month; $i++){
                $newDate = date('Y-'.$inv_month.'-'.$i);
                $daily_total_launch_sheet += LaunchSheet::whereDate('date', date('Y-m-d', strtotime($newDate)))->where('status', 1)->get()->count();
            }
            // dd($inv_month,$launchSheets, $extraLaunchs, $total_days_in_month, $daily_total_launch_sheet);

            // generate random number for invoice number and check if it is already exist
            $invoice_number = rand(100000, 999999);
            $invoice = LaunchInvoice::where('invoice_number', $invoice_number)->first();
            while($invoice != null){
                $invoice_number = rand(100000, 999999);
                $invoice = LaunchInvoice::where('invoice_number', $invoice_number)->first();
            }

            for($i = Carbon::parse($request->invoice_start_date); $i <= Carbon::parse($request->invoice_end_date); $i->addDay()){
                while($invoice != null){
                    $invoice_number = rand(100000, 999999);
                    $invoice = LaunchInvoice::whereDate('start_date', date('Y-m-d', strtotime($i)))
                                            ->whereDate('end_date', date('Y-m-d', strtotime($i)))->first();
                }   
            }

            $total_vehicle_cost = 0;
            foreach($launchSheets as $launchSheet){
                $total_vehicle_cost += $launchProvider->vehicle_cost;
            }

            $launch_invoice                 = new LaunchInvoice();
            $launch_invoice->invoice_date   = date('Y-m-d');
            $launch_invoice->invoice_number = $invoice_number;
            $launch_invoice->start_date     = date('Y-'.$inv_month.'-01');
            $launch_invoice->end_date       = date('Y-'.$inv_month.'-'.$total_days_in_month);
            $launch_invoice->total_launch   = $daily_total_launch_sheet;
            $launch_invoice->total_cost     = $daily_total_launch_sheet * $launchProvider->unit_price;
            $launch_invoice->status         = 0;
            $launch_invoice->save();
        }

        

        return redirect()->route('admin.launch-sheet.invoice')->with([
            'message' => 'Invoice Created Successfully',
            'alert-type' => 'success',
        ]);
    }

    public function showInvoice($invoice_number){
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            $invoice = LaunchInvoice::where('invoice_number', $invoice_number)->first();
            $launchSheets = LaunchSheet::whereBetween('date', [$invoice->start_date, $invoice->end_date])->get();
            $extraLaunchs = ExtraLaunch::whereBetween('date', [$invoice->start_date, $invoice->end_date])->get();
            $price_per_launch = CompanyPolicy::orderby('id', 'desc')->first()->launch_price_per_person;
            return view('admin.launch-sheet.invoice-show', compact('invoice', 'launchSheets', 'extraLaunchs', 'price_per_launch'));
        }
    }

    // LAUNCH SHEET PROVIDERS
    public function providerIndex(){
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            session([
                'menu_active' => 'launch_sheet_provider',
                'page_title' => 'Launch Providers',
                'page_title_description' => 'Manage Launch Providers Details',
                'breadcrumb' => [
                    'Home' => route('admin.dashboard'),
                    'Launch Sheet' => route('admin.launch-sheet.index'),
                    'Providers' => ""
                ],
            ]);

            $providersList = DailyLaunchProvider::all();
            return view('admin.launch-sheet.provider-index', compact('providersList'));
        }
    }
}
