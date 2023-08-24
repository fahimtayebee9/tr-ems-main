<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\CompanyPolicy;
use App\Models\CompanyDetail;
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

class LeaveManagementController extends Controller
{
    public function empLeaveIndex(){
        if(Auth::check() == false  || RoleManager::where('id',auth()->user()->role_id)->first()->slug != 'employee'){
            return redirect()->route('login');
        }
        else{
            session(
                [
                    "page" => "leave-management",
                    "page_title" => "Leave Management",
                    "page_icon" => "fas fa-calendar-check",
                ]
            );
            $leaveApplicationList = LeaveApplication::where('employee_id', Employee::where('user_id', Auth::user()->id)->first()->id)->get();
            $employee = Employee::where('user_id', Auth::user()->id)->first();
            return view('employee.pages.leaves-index', compact('leaveApplicationList', 'employee'));
        }
    }

    
    public function empLeaveGetByType($type){
        if(Auth::check() == false  || RoleManager::where('id',auth()->user()->role_id)->first()->slug != 'employee'){
            return redirect()->route('login');
        }
        else{
            $leaveApplicationList = LeaveApplication::where('employee_id', Employee::where('user_id', Auth::user()->id)->first()->id)->where('leave_type', $type)->get();
            return response()->json($leaveApplicationList);
        }
    }
}
