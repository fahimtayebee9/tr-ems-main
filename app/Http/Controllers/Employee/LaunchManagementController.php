<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyPolicy;
use App\Models\LaunchSheet;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\ExtraLaunch;
use App\Models\Employee;
use App\Models\CompanyDetail;
use App\Models\LaunchInvoice;
use PDF;
use App\Models\RoleManager;

class LaunchManagementController extends Controller
{
    public function empLaunchManagement(){
        if(Auth::check() == false  || RoleManager::where('id',auth()->user()->role_id)->first()->slug != 'employee'){
            return redirect()->route('login');
        }
        else{
            session(
                [
                    "page" => "launch-management",
                    "page_title" => "Launch Management",
                    "page_icon" => "fas fa-rocket",
                ]
            );
            $curDate = intval(date('d'));
            $current_month = intval(date('m'));
            $current_year = intval(date('Y'));
            $launchSheets   = LaunchSheet::all();
            $extraLaunchs   = ExtraLaunch::all();
            $employees      = Employee::all();
            $users          = User::all();

            return view('employee.pages.launch-management', compact('launchSheets', 'extraLaunchs', 'employees', 'users'));
        }
    }

    public function calculateTotalLaunch(){
        $emptyDb = ExtraLaunch::truncate();

        $curDate = intval(date('d'));
        $curMonth = intval(date('m'));
        $curYear = intval(date('Y'));

        $totalDaysInMonth = cal_days_in_month(CAL_GREGORIAN, $curMonth, $curYear);
        for($c = 1; $c <= $totalDaysInMonth; $c++){
            $totalLaunchPerDay = LaunchSheet::where('status', 1)->whereDate('date', date('Y-m-d', strtotime($curYear.'-'.$curMonth.'-'.$c)))
                                    ->get()->unique('user_id')->count();
            // dd($totalLaunchPerDay);

            $dailyLaunchInfo = new ExtraLaunch();
            $dailyLaunchInfo->date = date('Y-m-d', strtotime($curYear.'-'.$curMonth.'-'.$c));
            $dailyLaunchInfo->total_launch = $totalLaunchPerDay;
            $dailyLaunchInfo->count = 0;
            $dailyLaunchInfo->save();
        }

        return redirect()->route('employee.launch-sheet.index');
    }

    public function empLaunchManagementInvoices(){
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            session([
                'menu_active' => 'launch_sheet',
                'page_title' => 'Launch Invoices',
                'page_title_description' => 'Manage Launch Sheet Details',
                'breadcrumb' => [
                    'Home' => route('employee.dashboard'),
                    'Launch Sheet' => route('employee.launch-sheet.index'),
                    'Invoices' => 'active',
                ],
            ]);

            $launchSheets = LaunchSheet::all();
            $extraLaunchs = ExtraLaunch::all();
            $invoices = LaunchInvoice::all();
            return view('employee.pages.launch-invoices', compact('launchSheets', 'extraLaunchs', 'invoices'));
        }
    }

    public function createInvoice(Request $request){
        // dd($request->all());
        $request->validate([
            'invoice_start_date' => 'required',
            'invoice_end_date' => 'required',
        ]);

        $inv_start_date = $request->invoice_start_date;
        $inv_end_date   = $request->invoice_end_date;
        $inv_month      = $request->invoice_month;

        $launchSheets = LaunchSheet::whereBetween('date', [$inv_start_date, $inv_end_date])->get();
        $extraLaunchs = ExtraLaunch::whereBetween('date', [$inv_start_date, $inv_end_date])->get();
        $price_per_launch = CompanyPolicy::orderby('id', 'desc')->first()->launch_price_per_person;
        
        $daily_total_launch_sheet = 0;
        for($i = Carbon::parse($request->invoice_start_date); $i <= Carbon::parse($request->invoice_end_date); $i->addDay()){
            $daily_total_launch_sheet += ExtraLaunch::whereDate('date', date('Y-m-d', strtotime($i)))->first()->total_launch;
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
        $launch_invoice->total_cost     = $daily_total_launch_sheet * $price_per_launch;
        $launch_invoice->status         = 0;
        $launch_invoice->save();

        return redirect()->route('employee.launch-sheet.invoices')->with([
            'message' => 'Invoice Created Successfully',
            'alert-type' => 'success',
        ]);
    }

    public function showInvoice($invoice_number){
        $invoice = LaunchInvoice::where('invoice_number', $invoice_number)->first();
        $launchSheets = LaunchSheet::whereBetween('date', [$invoice->start_date, $invoice->end_date])->get();
        $extraLaunchs = ExtraLaunch::whereBetween('date', [$invoice->start_date, $invoice->end_date])->get();
        $price_per_launch = CompanyPolicy::orderby('id', 'desc')->first()->launch_price_per_person;
        return view('employee.pages.launch-invoice-show', compact('invoice', 'launchSheets', 'extraLaunchs', 'price_per_launch'));
    }

    public function createInvoicePdf($invoice_number){
        $invoice = LaunchInvoice::where('invoice_number', $invoice_number)->first();
        $launchSheets = LaunchSheet::whereBetween('date', [$invoice->start_date, $invoice->end_date])->get();
        $extraLaunchs = ExtraLaunch::whereBetween('date', [$invoice->start_date, $invoice->end_date])->get();
        $price_per_launch = CompanyPolicy::orderby('id', 'desc')->first()->launch_price_per_person;
        $companyDetails = CompanyDetail::orderBy('id', 'desc')->first();
        $pdf = PDF::loadView('employee.pages.pdfs.launch-invoice-view', compact('invoice', 'launchSheets', 'extraLaunchs', 'price_per_launch', 'companyDetails'));
        return $pdf->download('INV-'. $invoice->invoice_number .'.pdf');
    }

    public function empLaunchManagementUpdate(Request $request, $employeeId){
        $request->validate([
            'status' => 'required',
            'employeeId' => 'required',
            'date' => 'required',
        ]);

        $employee = Employee::where('employee_id', $employeeId)->first();
        $launchSheet = LaunchSheet::where('user_id', $employee->user_id)->where('date', date('Y-m-d', strtotime($request->date)))->first();
        if($launchSheet == null){
            $launchSheet                = new LaunchSheet();
            $launchSheet->user_id       = $employee->user_id;
            $launchSheet->date          = $request->date;
            $launchSheet->status        = $request->status;
            $result = $launchSheet->save();
        }
        else{
            $launchSheet->status = $request->status;
            $result = $launchSheet->save();
        }

        if($result){
            return response()->json([
                'message' => 'Launch Sheet Updated Successfully!',
                'alert-type' => 'success',
                'status' => 200,
            ]);
        }
        else{
            return response()->json([
                'message' => 'Launch Sheet Updated Failed!',
                'alert-type' => 'error',
                'status' => 500,
            ]);
        }
    }

    public function empLaunchManagementStore(Request $request){
        if(Auth::check() == false  || RoleManager::where('id',auth()->user()->role_id)->first()->slug != 'employee'){
            return redirect()->route('login');
        }
        else{
            $validated_data = Validator::make($request->all(), [
                'user_id' => 'required',
                'launch_status' => 'required',
            ]);

            if($validated_data->fails()){
                return redirect()->back()->withErrors([
                    'error' => $validated_data->errors()->all(),
                    'message' => 'Please fill all the fields',
                    'alert-type' => 'error'
                ]);
            }

            $launchInfo = new LaunchSheet();
            $launchInfo->user_id = $request->user_id;
            $launchInfo->attendance_id = $request->attendance_id;
            $launchInfo->date = Carbon::now();
            $launchInfo->status = $request->launch_status;
            $launchInfo->save();

            return redirect()->back()->with([
                'message' => 'Launch Request submitted successfully',
                'alert-type' => 'success'
            ]);
        }
    }
}
