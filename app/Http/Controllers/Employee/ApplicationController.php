<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\CompanyPolicy;
use App\Models\CompanyDetail;
use App\Models\LaunchSheet;
use App\Models\Application;
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
use PDF;

class ApplicationController extends Controller
{
    public function index(){
        if(Auth::check() == false  || RoleManager::where('id',auth()->user()->role_id)->first()->slug != 'employee'){
            return redirect()->route('login');
        }
        else{
            session(
                [
                    "page" => "all-applications",
                    "page_title" => "Applications",
                    "page_icon" => "fas fa-calendar-check",
                    "breadcrumb" => [
                        ["name" => "Home", "link" => route('employee.dashboard') ],
                        ["name" => "Applications", "link" => ""],
                        ["name" => "All Applications", "link" => ""],
                    ]
                ]
            );
            $applicationList = Application::where('employee_id', Employee::where('user_id', Auth::user()->id)->first()->id)->get();
            $employee = Employee::where('user_id', Auth::user()->id)->first();
            return view('employee.pages.applications.index', compact('applicationList', 'employee'));
        }
    }

    public function store(Request $request){
        // dd($request->all());

        if(Auth::check() == false  || RoleManager::where('id',auth()->user()->role_id)->first()->slug != 'employee'){
            return redirect()->route('login');
        }
        else{
            $validated_data = Validator::make($request->all(), [
                'employee_id' => 'required',
                'application_type' => 'required',
                'subject' => 'required',
                'description' => 'required',
            ]);

            if($validated_data->fails()){
                return redirect()->back()->withErrors([
                    'error' => $validated_data->errors()->all(),
                    'message' => 'Please fill all the fields',
                    'alert-type' => 'error'
                ]);
            }

            $application = new Application();
            $application->application_id = "EAS-" . time();
            $application->employee_id = $request->employee_id;
            $application->application_type = $request->application_type;
            $application->subject = $request->subject;
            $application->description = $request->description;
            $application->apply_to = $request->apply_to;
            $application->save();

            if($application->application_type == 1){
                $leaveApplication = new LeaveApplication();
                $leaveApplication->from_date = $request->leave_from;
                $leaveApplication->to_date   = ($request->leave_to == null) ? $request->leave_from : $request->leave_to;
                $leaveApplication->leave_type = $request->leave_type;
                $leaveApplication->application_id = $application->id;
                $leaveApplication->save();
            }

            return redirect()->route('employee.applications')->with([
                'message' => 'Your Application has been submitted',
                'alert-type' => 'success'
            ]);
        }
    }

    public function downloadPdf($leave){
        if(Auth::check() == false  || RoleManager::where('id',auth()->user()->role_id)->first()->slug != 'employee'){
            return redirect()->route('login');
        }
        else{
            $leaveApplication = Application::where('application_id', $leave)->first();
            $employee = Employee::where('id', $leaveApplication->employee_id)->first();
            $companyPolicy = CompanyPolicy::orderby('id', 'desc')->first();
            $companyDetails = CompanyDetail::orderby('id', 'desc')->first();
            $pdf = \PDF::loadView('employee.pages.pdfs.leave-pdf', compact('leaveApplication', 'employee', 'companyPolicy', 'companyDetails'));
            return $pdf->stream($leaveApplication->leave_id . '.pdf');
        }
    }

    // CREATE LEAVE APPLICATION
    public function create(){
        if(Auth::check() == false  || RoleManager::where('id',auth()->user()->role_id)->first()->slug != 'employee'){
            return redirect()->route('login');
        }
        else{
            session(
                [
                    "page" => "application-create",
                    "page_title" => "Apply Applicaiton",
                    "page_icon" => "fas fa-calendar-check",
                    "breadcrumb" => [
                        ["name" => "Home", "link" => route('employee.dashboard') ],
                        ["name" => "Applications", "link" => route('employee.applications')],
                        ["name" => "New Application", "link" => ""],
                    ]
                ]
            );
            $employee = Employee::where('user_id', Auth::user()->id)->first();
            $companyPolicy = CompanyPolicy::orderby('id', 'desc')->first();
            $totalPaidLeavesTaken = Application::where('application_type', 1)->where('employee_id', $employee->id)->get()->count();
            return view('employee.pages.applications.create', compact('employee', 'companyPolicy', 'totalPaidLeavesTaken'));
        }
    }
}
