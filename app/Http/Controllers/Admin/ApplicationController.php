<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use PDF;
use App\Models\CompanyPolicy;
use App\Models\CompanyDetail;
use App\Models\Employee;
use App\Models\AttendanceBreak;
use App\Models\User;
use App\Models\EmployeeAttendance;
use App\Models\RoleManager;

class ApplicationController extends Controller
{
    public function index()
    {
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            session([
                'menu_active' => 'all-applications',
                'page_title' => 'Applications',
                'page_title_description' => 'All applications are listed here.',
                'breadcrumb' => [
                    'Home' => route('admin.dashboard'),
                    'Applications' => '',
                ],
            ]);

            $applicationsList = Application::all();
            return view('admin.applications.index', compact('applicationsList'));
        }
    }

    public function createPdf($application){
        // dd($application);
        $application = Application::where('id', $application)->first();
        $companyDetails = CompanyDetail::orderBy('id', 'desc')->first();
        $pdf = PDF::loadView('admin.pdfs.leave-application-view', compact('application', 'companyDetails'));
        return $pdf->download('Application-'. $application->application_id . ' | ' . $application->employee->employee_id .'.pdf');
    }

    public function create()
    {
        
    }

    public function store(StoreApplicationRequest $request)
    {
        //
    }

    public function show(Application $application)
    {
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            $application = Application::find($application->id);
            
            if(!empty($application)) {
                return view('admin.applications.show', compact('application'));
            }

            return redirect()->route('admin.application.index');
        }
    }

    public function updateByAstManager(Request $request, $leave_id)
    {
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            $leaveApplication = LeaveApplication::where('leave_id', $leave_id)->first();
            
            if(!empty($leaveApplication)) {
                $leaveApplication->status_by_astmanager = $request->status_by_astmanager;
                $leaveApplication->update(); 

                return redirect()->route('admin.leave.show', $leaveApplication->leave_id)->with('success', 'Leave Application Status Updated Successfully!');
            }

            return redirect()->route('admin.leave.index');
        }
    }

    public function updateByManager(Request $request, $leave_id)
    {
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            $leaveApplication = LeaveApplication::where('leave_id', $leave_id)->first();
            
            if(!empty($leaveApplication)) {
                $leaveApplication->status_by_hr = $request->status_by_hr;
                $leaveApplication->update(); 

                return redirect()->route('admin.leave.show', $leaveApplication->leave_id)->with('success', 'Leave Application Status Updated Successfully!');
            }

            return redirect()->route('admin.leave.index');
        }
    }

    public function destroy($leaveApplication)
    {
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            $leaveApplication = LeaveApplication::find($leaveApplication);
            
            if(!empty($leaveApplication)) {
                $leaveApplication->delete();
                return redirect()->route('admin.leave.index')->with(
                    [
                        'message' => 'Leave Application Deleted Successfully!',
                        'alert-type' => 'success'
                    ]
                );
            }

            return redirect()->route('admin.leave.index')->with(
                [
                    'message' => 'Leave Application Not Found!',
                    'alert-type' => 'error'
                ]
            );
        }
    }
}
