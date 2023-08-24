<?php

namespace App\Http\Controllers\Admin;

use App\Models\Attendance;
use App\Models\Employee;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Image;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AttendanceExport;
use Faker\Factory as Faker;

class AttendanceController extends Controller
{
    public function index()
    {
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            session(
                [
                    'menu_active' => 'attendance',
                    'page_title' => 'Attendance Management',
                    'page_title_description' => 'Manage Attendance & Details',
                    'breadcrumb' => [
                        'Home' => route('admin.dashboard'),
                        'Attendance' => route('admin.attendance.index'),
                    ],
                ]
            );
            $employees = Employee::all();
            return view('admin.attendances.index', compact('employees'));
        }
    }

    public function exportFile(Request $request)
    {
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            $employees = Employee::all();
            
            // dd($request->all());
            
            $request->validate([
                'month' => 'required',
                'year' => 'required',
            ]);
            
            $start_date = date($request->year .'-'. $request->month .'-01');
            $end_date = date($request->year .'-'. $request->month . '-t');
            $current_full_month = date('F-Y', strtotime($start_date));
            
            $attendances = Attendance::whereBetween('date', [$start_date, $end_date])->get();
            
            return Excel::download(new AttendanceExport($request->month, $request->year), 'Attendance Report of '.$current_full_month.'.xlsx');
        }
    }

    public function seedDatabase(){
        $months = ['05'];
        $employees = Employee::all();
        $faker = Faker::create();

        // Empty the table first
        // Attendance::truncate();

        foreach($months as $month){
            foreach($employees as $employee){
                $total_days_in_month = date('t', strtotime('2023-'.$month.'-01'));
                for($d = 1; $d <= $total_days_in_month; $d++){
                    $time = strtotime('2023-'.$month.'-'.$d);
                    $date = date('Y-m-d', $time);
                    $day = date('D', strtotime($date));
                    if($day != 'Sun'){
                        $in_time = $faker->dateTimeBetween($date . ' 09:00', $date . ' 09:30');
                        $out_time = $faker->dateTimeBetween($date . ' 17:00', $date . ' 18:00');

                        $attendance = new Attendance();
                        $attendance->employee_id = $employee->id;
                        $attendance->date = $date;
                        $attendance->in_time = $in_time;
                        $attendance->out_time = $out_time;
                        $attendance->status = $in_time > new \DateTime('09:30') ? 6 : 1;
                        $attendance->save();
                    }
                }
            }
        }

        return redirect()->back();
    }

    public function getDataForChart(){
        $current_month = date('m');
        $current_year = date('Y');
        $start_date = date($current_year .'-'. $current_month .'-01');
        $end_date = date($current_year .'-'. $current_month . '-t');
        $total_days_in_month = date('t', strtotime($start_date));

        $data = [];
        for($d = 1; $d <= $total_days_in_month; $d++){
            $time = strtotime($start_date);
            $date = date('Y-m-d', $time);
            $on_time_by_day = Attendance::where('date', $date)->where('status', 1)->distinct('employee_id')->count();
            $late_by_day = Attendance::where('date', $date)->where('status', 6)->distinct('employee_id')->count();
            $data[] = [
                'date' => date('d M', strtotime($date)),
                'on_time' => $on_time_by_day,
                'late' => $late_by_day,
            ];
            $start_date = date('Y-m-d', strtotime($start_date . ' +1 day'));
        }

        return response()->json([
            'responseData' => $data,
            'status' => 200,
        ]);
    }
}
