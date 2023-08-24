<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\CompanyPolicy;
use App\Models\LaunchSheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use App\Models\TaskForm;
use App\Models\DailyTask;
use App\Models\AttendanceBreak;
use App\Models\LeaveApplication;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\EmployeeAttendance;
use App\Models\ExtraLaunch;
use App\Models\LaunchInvoice;
use App\Models\RoleManager;

class AttendanceController extends Controller
{
    public function filterAttendanceData(Request $request){
        if(Auth::check() == false || RoleManager::where('id',auth()->user()->role_id)->first()->slug != 'employee'){
            return redirect()->route('login');
        }
        else{
            $employee = Employee::where('user_id', Auth::user()->id)->first();
            $attendanceList = Attendance::where('employee_id', $employee->id)
                                ->whereMonth('date', $request->attendance_month)->orwhere('status', $request->attendance_status)
                                ->get();
            $launchList = LaunchSheet::where('user_id', $employee->user_id)->orderby('id','desc')->get();
            $request = null;
            // dd($attendanceList, $employee, $launchList);
            return view('employee.pages.attendance', compact('attendanceList', 'employee', 'launchList'));
        }
    }

    public function empAttendance(){
        if(Auth::check() == false  || RoleManager::where('id',auth()->user()->role_id)->first()->slug != 'employee'){
            return redirect()->route('login');
        }
        else{
            // dd('empAttendance');
            session(
                [
                    "page" => "attendance",
                    "page_title" => "Attendance",
                    "page_icon" => "fas fa-calendar-check",
                ]
            );
            $attendanceList = Attendance::where('employee_id', Employee::where('user_id', Auth::user()->id)->first()->id)->orderby('id','desc')->get();
            $employee = Employee::where('user_id', Auth::user()->id)->first();
            $launchList = LaunchSheet::where('user_id', $employee->user_id)->orderby('id','desc')->get();
            // dd($attendanceList, $employee, $launchList);
            return view('employee.pages.attendance', compact('attendanceList', 'employee', 'launchList'));
        }
    }

    public function empAttendanceGetAll($employee_id){
        if(Auth::check() == false  || RoleManager::where('id',auth()->user()->role_id)->first()->slug != 'employee'){
            return redirect()->route('login');
        }
        else{
            $attendanceList = Attendance::where('employee_id', $employee_id)->get();
            return response()->json($attendanceList);
        }
    }

    public function empAttendanceStore(Request $request){
        if(Auth::check() == false  || RoleManager::where('id',auth()->user()->role_id)->first()->slug != 'employee'){
            return redirect()->route('login');
        }
        else{
            $validated_data = Validator::make($request->all(), [
                'employee_id' => 'required',
            ]);

            $companyPolicy = CompanyPolicy::first();
            // dd(Carbon::parse($companyPolicy->office_start_time)->addMinutes($companyPolicy->attendance_buffer_time));

            if($validated_data->fails()){
                return redirect()->back()->withErrors([
                    'error' => $validated_data->errors()->all(),
                    'message' => 'Please fill all the fields',
                    'alert-type' => 'error'
                ]);
            }
            else{
                $attendance = new Attendance();
                $userAgent  = new \Jenssegers\Agent\Agent;
                $attendance->employee_id    = $request->employee_id;
                $attendance->date           = date('Y-m-d');
                $attendance->in_time        = Carbon::now();
                if(Auth::user()->employee->flexible_time_applicable == 1){
                    $attendance->status = 1;
                }
                else if($attendance->in_time > Carbon::parse($companyPolicy->office_start_time)->addMinutes($companyPolicy->attendance_buffer_time)){
                    $attendance->status = 6;
                }
                else{
                    $attendance->status = 1;
                }
                $attendance->note          = $request->note;
                $attendance->sign_in_from  = $request->sign_in_from;
                $attendance->signin_ip     = $request->ip();
                $attendance->signin_device = $userAgent->platform();
                $attendance->save();

                return redirect()->back()->with([
                    'message' => 'Attendance marked successfully',
                    'alert-type' => 'success'
                ]);
            }
        }
    }

    public function empAttendanceUpdate(Request $request){
        if(Auth::check() == false  || RoleManager::where('id',auth()->user()->role_id)->first()->slug != 'employee'){
            return redirect()->route('login');
        }
        else{
            $validated_data = Validator::make($request->all(), [
                'employee_id' => 'required',
            ]);

            if($validated_data->fails()){
                return redirect()->back()->withErrors([
                    'error' => $validated_data->errors()->all(),
                    'message' => 'Please fill all the fields',
                    'alert-type' => 'error'
                ]);
            }
            else{
                $attendance = Attendance::where('employee_id', $request->employee_id)->where('date', $request->date)->first();
                
                $attendance->out_time       = Carbon::now();
                $attendance->update();

                return redirect()->back()->with([
                    'message' => 'Punched Out successfully',
                    'alert-type' => 'success'
                ]);
            }
        }
    }
    
    public function empAttendanceBreakStore(Request $request){
        if(Auth::check() == false  || RoleManager::where('id',auth()->user()->role_id)->first()->slug != 'employee'){
            return redirect()->route('login');
        }
        else{
            $validated_data = Validator::make($request->all(), [
                'attendance_id' => 'required',
            ]);

            if($validated_data->fails()){
                return redirect()->back()->withErrors([
                    'error' => $validated_data->errors()->all(),
                    'message' => 'Please fill all the fields',
                    'alert-type' => 'error'
                ]);
            }
            else{
                $attendanceBreak = new AttendanceBreak();
                $attendanceBreak->attendance_id = $request->attendance_id;
                $attendanceBreak->break_in = Carbon::now();
                $attendanceBreak->save();

                return redirect()->back()->with([
                    'message' => 'Break Started successfully',
                    'alert-type' => 'success'
                ]);
            }
        }
    }

    public function empAttendanceBreakUpdate(Request $request){
        if(Auth::check() == false  || RoleManager::where('id',auth()->user()->role_id)->first()->slug != 'employee'){
            return redirect()->route('login');
        }
        else{
            $validated_data = Validator::make($request->all(), [
                'break_id' => 'required',
            ]);

            if($validated_data->fails()){
                return redirect()->back()->withErrors([
                    'error' => $validated_data->errors()->all(),
                    'message' => 'Please fill all the fields',
                    'alert-type' => 'error'
                ]);
            }
            else{
                $attendanceBreak = AttendanceBreak::find($request->break_id);
                $attendanceBreak->break_out = Carbon::now();
                $attendanceBreak->update();

                return redirect()->back()->with([
                    'message' => 'Break Ended successfully',
                    'alert-type' => 'success'
                ]);
            }
        }
    }

    public function empAttendanceGetByStatus($status){
        if(Auth::check() == false  || RoleManager::where('id',auth()->user()->role_id)->first()->slug != 'employee'){
            return redirect()->route('login');
        }
        else{
            $employee_id = Employee::where('user_id', Auth::user()->id)->first()->id;
            $attendance = Attendance::where('employee_id', Employee::where('user_id', Auth::user()->id)->first()->id)->where('status', $status)->get();
            return response()->json($attendance);
        }
    }

    public function empAttendanceGetLaunchSheet($atnId){
        if(Auth::check() == false  || RoleManager::where('id',auth()->user()->role_id)->first()->slug != 'employee'){
            return redirect()->route('login');
        }
        else{
            $launch_status = LaunchSheet::where('attendance_id', $atnId)->get()->first()->status;
            return response()->json(["launch_status" => $launch_status]);
        }
    }

    public function empAttendanceGetByMonth($month){
        if(Auth::check() == false  || RoleManager::where('id',auth()->user()->role_id)->first()->slug != 'employee'){
            return redirect()->route('login');
        }
        else{
            $employee_id = Employee::where('user_id', Auth::user()->id)->first()->id;
            $attendance = Attendance::where('employee_id', Employee::where('user_id', Auth::user()->id)->first()->id)->whereMonth('date', $month)->get();
            return response()->json($attendance);
        }
    }
}
