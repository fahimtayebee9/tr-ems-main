<?php

namespace App\Http\Controllers\Admin;

use App\Models\LeaveApplication;
use App\Http\Requests\StoreLeaveApplicationRequest;
use App\Http\Requests\UpdateLeaveApplicationRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use PDF;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\CompanyDetail;

class LeaveApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            session([
                'menu_active' => 'leave-applications',
                'page_title' => 'Leave Applications',
                'page_title_description' => 'Overview of the system',
                'breadcrumb' => [
                    'Home' => route('admin.dashboard'),
                    'Leave Applications' => '',
                ],
            ]);

            $leaveApplicationsList = LeaveApplication::all();
            return view('admin.leave-applications.index', compact('leaveApplicationsList'));
        }
    }

    public function createPdf($leave_id){
        
    }

    public function show($leaveApplication)
    {
        
    }

    
}
