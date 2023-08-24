<?php

namespace App\Http\Controllers;

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
use App\Models\NoticeBoard;
use App\Models\LaunchInvoice;
    
class PageController extends Controller
{
    public function empDashboard(){
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            session(
                [
                    "page" => "dashboard",
                    "page_title" => "Dashboard",
                    "page_icon" => "fas fa-calendar-check",
                    "breadcrumb" => [
                        ["name" => "Dashboard", "link" => ""],
                    ]
                ]
            );
            $employee = Employee::where('user_id', Auth::user()->id)->first();
            $attendance = Attendance::where('employee_id', $employee->id)->where('date', Carbon::now()->format('Y-m-d'))->first();
            $noticeList = NoticeBoard::where('status', 'active')->orderBy('id', 'desc')->get();
            return view('employee.dashboard', compact('employee', 'attendance', 'noticeList'));
        }
    }

    public function empProfile(){
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            session(
                [
                    "page" => "employee-profile",
                    "page_title" => "Profile",
                    "page_icon" => "fas fa-user",
                ]
            );
            $employee = Employee::where('user_id', Auth::user()->id)->first();
            return view('employee.pages.profile', compact('employee'));
        }
    }

    public function empProfileUpdate(Request $request){
        // dd($request->all());

        // check current password is correct or not
        if(Hash::check($request->current_password, Auth::user()->password)){
            // check new password and confirm password is same or not
            if($request->new_password == $request->confirm_password){
                // update password
                $user = User::find(Auth::user()->id);
                $user->password = Hash::make($request->new_password);
                $user->cspwdbycrt = Crypt::encryptString($request->new_password);
                $user->save();

                return redirect()->back()->with([
                    'message' => 'Password updated successfully',
                    'alert-type' => 'success'
                ]);
            }
            else{
                return redirect()->back()->with([
                    'message' => 'New password and confirm password does not match',
                    'alert-type' => 'error'
                ]);
            }
        }
        else{
            return redirect()->back()->with([
                'message' => 'Current password is incorrect',
                'alert-type' => 'error'
            ]);
        }
    }

}
