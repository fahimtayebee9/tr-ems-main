<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;

class AdminPageController extends Controller
{
    public function index()
    {
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            session([
                'menu_active' => 'dashboard',
                'page_title' => 'Dashboard',
                'page_title_description' => 'Overview of the system',
                'breadcrumb' => [
                    'Home' => '',
                ],
            ]);
            
            return view('admin.dashboard');
        }
    }
}
