<?php

namespace App\Http\Controllers\Employee;

use App\Models\WeeklyReport;
use App\Models\ClientAccount;
use App\Models\DailySale;
use App\Models\MeetingNote;
use App\Models\DailyTask;
use App\Models\PdfReport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class ReportController extends Controller
{
    public function index()
    {
        if(Auth::check() && Auth::user()->role->slug == 'employee') {
            session(
                [
                    "page" => "reports",
                    "page_title" => "Reports",
                    "page_icon" => "fas fa-sticky-note",
                    "bread_crumb" => [
                        "Home" => route('employee.dashboard'),
                        "Reports" => "",
                        "Generate" => ""
                    ]
                ]
            );
            
            $dailySales = DailySale::all();
            $clientAccountList = ClientAccount::all();
            $weeklyReports = WeeklyReport::orderby('id', 'desc')->get();

            return view('employee.pages.reports.index', compact('dailySales', 'clientAccountList', 'weeklyReports'));
        } else {
            return redirect()->route('login');
        }
    }
}
