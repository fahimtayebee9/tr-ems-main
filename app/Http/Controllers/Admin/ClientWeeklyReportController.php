<?php

namespace App\Http\Controllers\Admin;

use App\Models\ClientWeeklyReport;
use App\Models\ClientWeeklyMeetingNote;
use App\Models\ClientWeeklyReportTask;
use App\Models\WeeklySale;
use App\Models\ClientAccount;   
use App\Http\Requests\StoreClientWeeklyReportRequest;
use App\Http\Requests\UpdateClientWeeklyReportRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use PDF;

use Illuminate\Support\Facades\Validator;

class ClientWeeklyReportController extends Controller
{
    public function index(){
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            session(
                [
                    'menu_active' => 'custom-reports',
                    'page_title' => 'Custom Reports',
                    'page_title_description' => 'Manage Weekly Reports & Details',
                    'breadcrumb' => [
                        'Home' => route('admin.dashboard'),
                        'Weekly Report' => route('admin.reports.custom-weekly-report.index'),
                    ],
                ]
            );
            $weeklyMeetingNotes = ClientWeeklyMeetingNote::all();
            $weeklyReportTasks  = ClientWeeklyReportTask::all();
            $weeklyReports      = ClientWeeklyReport::where('parent_report_id', null)->get();
            
            return view('admin.weekly-report.index', compact('weeklyMeetingNotes', 'weeklyReportTasks', 'weeklyReports'));
        }
    }

    public function updateLocation(Request $request)
    {
        if($request->report_type == "single"){
            session()->put('report_type', 'single');
            return redirect()->route('admin.reports.custom-weekly-report.generate.single');
        }
        else{
            session()->put('report_type', 'multiple');
            return redirect()->route('admin.reports.custom-weekly-report.generate.multiple');
        }
    }

    public function getReportTheme()
    {
        return view('admin.weekly-report.generate-blank');
    }

    protected function getRandomReportNumber(){
        // GENERATE RANDOM UNIQUE REPORT NUMBER 
        $report_number = rand(100000, 999999);
        $prev_report = ClientWeeklyReport::where('report_number', $report_number)->first();
        while($prev_report != null){
            $report_number = rand(100000, 999999);
            $prev_report = ClientWeeklyReport::where('report_number', $report_number)->first();
        }
        return $report_number;
    }

    public function generate()
    {
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            session(
                [
                    'menu_active' => 'custom-reports',
                    'page_title' => 'Weekly Reports',
                    'page_title_description' => 'Manage Weekly Reports & Details',
                    'breadcrumb' => [
                        'Home' => route('admin.dashboard'),
                        'Weekly Report' => route('admin.reports.custom-weekly-report.index'),
                    ],
                ]
            );

            // GENERATE RANDOM UNIQUE REPORT NUMBER 
            $report_number = $this->getRandomReportNumber();
            $clientAccountList = ClientAccount::all();
            return view('admin.weekly-report.create', compact('report_number', 'clientAccountList'));
        }
    }

    public function generateMultiple()
    {
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            session(
                [
                    'menu_active' => 'custom-reports',
                    'page_title' => 'Weekly Reports',
                    'page_title_description' => 'Manage Weekly Reports & Details',
                    'breadcrumb' => [
                        'Home' => route('admin.dashboard'),
                        'Weekly Report' => route('admin.reports.custom-weekly-report.index'),
                    ],
                ]
            );

            $report_number = $this->getRandomReportNumber();
            return view('admin.weekly-report.create-multiple', compact('report_number'));
        }
    }

    public function generateStore(Request $request){
        // check if report type is single or multiple
        if(session('report_type') == "single"){
            $validInputs = Validator::make($request->all(), [
                'report_number' => 'required',
                'week_start_date' => 'required',
                'week_end_date' => 'required',
                'client_name' => 'required',
            ]);

            if($validInputs->fails()){
                return redirect()->back()->withErrors($validInputs)->withInput();
            }
            
            $report = new ClientWeeklyReport();
            
            $report->report_number      = $request->report_number;
            $report->week_start_date    = date('Y-m-d', strtotime($request->week_start_date));
            $report->week_end_date      = date('Y-m-d', strtotime($request->week_end_date));
            $report->client_name        = $request->client_name;
            $report->amz_seller_support_issues          = $request->amz_seller_support_issues;
            $report->amz_seller_support_case_url        = $request->amz_seller_support_case_url;
            $report->walmart_seller_support_issues      = $request->walmart_seller_support_issues;
            $report->walmart_seller_support_case_url    = $request->walmart_seller_support_case_url;
            $report->report_template_theme          = session()->get('report_template');
            $report->is_multiple_accounts           = 0;
            

            // check if chk_add_amazon_us is checked
            if($request->chk_add_amazon_us == "on"){
                $report->is_amazon_us_data_added   = 1;
            }
            
            // check if chk_add_amazon_ca is checked
            if($request->chk_add_amazon_ca == "on"){
                $report->is_amazon_ca_data_added   = 1;
            }
    
            // check if chk_add_amazon_mx is checked
            if($request->chk_add_walmart == "on"){
                $report->is_walmart_data_added   = 1;
            }
            // check if chk_add_amazon_mx is checked
            if($request->chk_add_meeting_notes == "on"){
                $report->is_meeting_notes_added = 1;
            }
            if($request->chk_add_tasks == "on"){
                $report->is_weekly_tasks_added = 1;
            }
    
            $report->save();
            
            if($request->chk_add_amazon_us = "on"){
                $weeklySalesData = new WeeklySale();
                $weeklySalesData->one_year_total_sales_amount       = $request->us_one_year_total_sales_amount[$i];
                $weeklySalesData->one_year_total_sales_unit         = $request->us_one_year_total_sales_unit[$i];
                $weeklySalesData->last_week_total_sales_amount      = $request->us_last_week_total_sales_amount[$i];
                $weeklySalesData->last_week_total_sales_unit        = $request->us_last_week_total_sales_unit[$i];
                $weeklySalesData->current_week_total_sales_amount   = $request->us_current_week_total_sales_amount[$i];
                $weeklySalesData->current_week_total_sales_unit     = $request->us_current_week_total_sales_unit[$i];
                $weeklySalesData->current_week_ads_sales_amount     = $request->us_current_week_ads_sales_amount[$i];
                $weeklySalesData->current_week_ads_sales_unit       = $request->us_current_week_ads_sales_unit[$i];
                $weeklySalesData->current_week_acos                 = $request->us_current_week_acos[$i];
                $weeklySalesData->current_week_tacos                = $request->us_current_week_tacos[$i];
                $weeklySalesData->current_week_ads_spend            = $request->us_current_week_ads_spend[$i];
                $weeklySalesData->current_week_ads_roas             = $request->us_current_week_ads_roas[$i];
                $weeklySalesData->marketplace                       = 0;
                $weeklySalesData->client_weekly_report_id           = $report->id;
                $weeklySalesData->save();
            }

            if($request->chk_add_walmart = "on"){
                $weeklySalesData = new WeeklySale();
                $weeklySalesData->one_year_total_sales_amount       = $request->walmart_one_year_total_sales_amount[$i];
                $weeklySalesData->one_year_total_sales_unit         = $request->walmart_one_year_total_sales_unit[$i];
                $weeklySalesData->last_week_total_sales_amount      = $request->walmart_last_week_total_sales_amount[$i];
                $weeklySalesData->last_week_total_sales_unit        = $request->walmart_last_week_total_sales_unit[$i];
                $weeklySalesData->current_week_total_sales_amount   = $request->walmart_current_week_total_sales_amount[$i];
                $weeklySalesData->current_week_total_sales_unit     = $request->walmart_current_week_total_sales_unit[$i];
                $weeklySalesData->current_week_ads_sales_amount     = $request->walmart_current_week_ads_sales_amount[$i];
                $weeklySalesData->current_week_ads_sales_unit       = $request->walmart_current_week_ads_sales_unit[$i];
                $weeklySalesData->current_week_acos                 = $request->walmart_current_week_acos[$i];
                $weeklySalesData->current_week_tacos                = $request->walmart_current_week_tacos[$i];
                $weeklySalesData->current_week_ads_spend            = $request->walmart_current_week_ads_spend[$i];
                $weeklySalesData->current_week_ads_roas             = $request->walmart_current_week_ads_roas[$i];
                $weeklySalesData->marketplace                       = 2;
                $weeklySalesData->client_weekly_report_id           = $report->id;
                $weeklySalesData->save();
            }

            if($request->chk_add_amazon_ca = "on"){
                $weeklySalesData = new WeeklySale();
                $weeklySalesData->one_year_total_sales_amount       = $request->ca_one_year_total_sales_amount[$i];
                $weeklySalesData->one_year_total_sales_unit         = $request->ca_one_year_total_sales_unit[$i];
                $weeklySalesData->last_week_total_sales_amount      = $request->ca_last_week_total_sales_amount[$i];
                $weeklySalesData->last_week_total_sales_unit        = $request->ca_last_week_total_sales_unit[$i];
                $weeklySalesData->current_week_total_sales_amount   = $request->ca_current_week_total_sales_amount[$i];
                $weeklySalesData->current_week_total_sales_unit     = $request->ca_current_week_total_sales_unit[$i];
                $weeklySalesData->current_week_ads_sales_amount     = $request->ca_current_week_ads_sales_amount[$i];
                $weeklySalesData->current_week_ads_sales_unit       = $request->ca_current_week_ads_sales_unit[$i];
                $weeklySalesData->current_week_acos                 = $request->ca_current_week_acos[$i];
                $weeklySalesData->current_week_tacos                = $request->ca_current_week_tacos[$i];
                $weeklySalesData->current_week_ads_spend            = $request->ca_current_week_ads_spend[$i];
                $weeklySalesData->current_week_ads_roas             = $request->ca_current_week_ads_roas[$i];
                $weeklySalesData->marketplace                       = 1;
                $weeklySalesData->client_weekly_report_id           = $report->id;
                $weeklySalesData->save();
            }

            // check if chk_add_meeting_notes is checked
            if($request->chk_add_meeting_notes == "on" && $request->notes != null){
                $total_notes = count($request->notes);
                for($i = 0; $i < $total_notes; $i++){
                    $meetingNote = new ClientWeeklyMeetingNote();
                    $meetingNote->note                      = $request->notes[$i];
                    $meetingNote->note_url                  = $request->urls[$i];
                    $meetingNote->marketplace               = $request->marketplaces[$i];
                    $meetingNote->client_weekly_report_id   = $report->id;
                    $meetingNote->save();
                }
            }
    
            // check if chk_add_tasks is checked
            if($request->chk_add_tasks == "on" && $request->tasks != null){
                $total_tasks = count($request->tasks);
                for($i = 0; $i < $total_tasks; $i++){
                    $task = new ClientWeeklyReportTask();
                    $task->task_title                = $request->tasks[$i];
                    $task->task_status               = $request->task_status[$i];
                    $task->task_url                  = $request->task_urls[$i];
                    $task->category                  = $request->category[$i];
                    $task->client_weekly_report_id   = $report->id;
                    $task->save();
                }
            }
    
            session()->forget(['report_type', 'report_template']);
    
            return redirect()->route('admin.reports.custom-weekly-report.index')->with([
                'message' => 'Report has been updated successfully',
                'alert-type' => 'success'
            ]);
        }
        else{
            $validInputs = Validator::make($request->all(), [
                'report_number'     => 'required',
                'week_start_date'   => 'required',
                'week_end_date'     => 'required',
                'account_names'     => 'required',
            ]);

            if($validInputs->fails()){
                return redirect()->back()->withErrors($validInputs)->withInput();
            }
            else{
                $count = count($request->account_names);
                $parentReport = new ClientWeeklyReport();
                $parentReport->report_number                    = $request->report_number;
                $parentReport->week_start_date                  = date('Y-m-d', strtotime($request->week_start_date));
                $parentReport->week_end_date                    = date('Y-m-d', strtotime($request->week_end_date));
                $parentReport->client_name                      = "Multiple Accounts";
                $parentReport->is_multiple_accounts             = 1;
                $parentReport->report_template_theme            = (session()->get('report_template') != null) ? session()->get('report_template') : 'nh-template';
                $parentReport->save();

                for($i = 0; $i < $count; $i++){
                    $report = new ClientWeeklyReport();
                    $report->report_number                      = $this->getRandomReportNumber();
                    $report->week_start_date                    = date('Y-m-d', strtotime($request->week_start_date));
                    $report->week_end_date                      = date('Y-m-d', strtotime($request->week_end_date));
                    $report->client_name                        = $request->account_names[$i];
                    $report->is_multiple_accounts               = 1;
                    $report->report_template_theme              = (session()->get('report_template') != null) ? session()->get('report_template') : 'nh-template';
                    $report->parent_report_id                   = $parentReport->id;
                    $report->save();
                    
                    $weeklySalesData = new WeeklySale();
                    $weeklySalesData->last_week_total_sales_amount      = $request->us_last_week_total_sales_amount[$i];
                    $weeklySalesData->last_week_total_sales_unit        = $request->us_last_week_total_sales_unit[$i];
                    $weeklySalesData->current_week_total_sales_amount   = $request->us_current_week_total_sales_amount[$i];
                    $weeklySalesData->current_week_total_sales_unit     = $request->us_current_week_total_sales_unit[$i];
                    $weeklySalesData->current_week_ads_sales_amount     = $request->us_current_week_ads_sales_amount[$i];
                    $weeklySalesData->current_week_ads_sales_unit       = $request->us_current_week_ads_sales_unit[$i];
                    $weeklySalesData->current_week_acos                 = $request->us_current_week_acos[$i];
                    $weeklySalesData->current_week_tacos                = $request->us_current_week_tacos[$i];
                    $weeklySalesData->current_week_ads_spend            = $request->us_current_week_ads_spend[$i];
                    $weeklySalesData->current_week_ads_roas             = $request->us_current_week_ads_roas[$i];
                    $weeklySalesData->marketplace                       = 0;
                    $weeklySalesData->client_weekly_report_id           = $report->id;
                    $weeklySalesData->save();
                }

                return redirect()->route('admin.reports.custom-weekly-report.index')->with([
                    'message' => 'Report has been generated successfully!',
                    'alert-type' => 'success'
                ]);
            }
        }
    }

    public function updateAmzUsSales(Request $request, $clientWeeklyReportNumber){
        // cheeck user is logged in or not
        if(Auth::check() == false){
            return redirect()->route('admin.login');
        }
        else{
            $report = ClientWeeklyReport::where('report_number', $clientWeeklyReportNumber)->first();
            
            if($clientWeeklyReport->is_amz_us_data_added == 1){
                $clientWeeklyReport->is_amz_us_data_added   = 1;
                $report->us_one_year_total_sales_amount     = $request->us_one_year_total_sales_amount;
                $report->us_one_year_total_sales_unit       = $request->us_one_year_total_sales_unit;
                $report->us_last_week_total_sales_amount    = $request->us_last_week_total_sales_amount;
                $report->us_last_week_total_sales_unit      = $request->us_last_week_total_sales_unit;
                $report->us_current_week_total_sales_amount = $request->us_current_week_total_sales_amount;
                $report->us_current_week_total_sales_unit   = $request->us_current_week_total_sales_unit;
                $report->us_current_week_ads_sales_amount   = $request->us_current_week_ads_sales_amount;
                $report->us_current_week_ads_sales_unit     = $request->us_current_week_ads_sales_unit;
                $report->us_current_week_acos               = $request->us_current_week_acos;
                $report->us_current_week_tacos              = $request->us_current_week_tacos;
                $report->us_current_week_ads_spend          = $request->us_current_week_ads_spend;
                $report->us_current_week_ads_roas           = $request->us_current_week_ads_roas;
                $clientWeeklyReport->save();
                
                return redirect()->route('admin.reports.custom-weekly-report.index')->with([
                    'message' => 'Amazon US Sales Updated Successfully',
                    'alert-type' => 'success'
                ]);
            }
            else{
                return redirect()->route('admin.reports.custom-weekly-report.index')->with([
                    'message' => 'Amazon US Sales Not Added Yet',
                    'alert-type' => 'error'
                ]);
            }
        }
    }

    public function updateAmzCaSales(Request $request, $clientWeeklyReportNumber){
        // cheeck user is logged in or not
        if(Auth::check() == false){
            return redirect()->route('admin.login');
        }
        else{
            $report = ClientWeeklyReport::where('report_number', $clientWeeklyReportNumber)->first();
            
            if($clientWeeklyReport->is_amz_ca_data_added == 1){
                $clientWeeklyReport->is_amz_ca_data_added   = 1;
                $report->ca_one_year_total_sales_amount     = $request->ca_one_year_total_sales_amount;
                $report->ca_one_year_total_sales_unit       = $request->ca_one_year_total_sales_unit;
                $report->ca_last_week_total_sales_amount    = $request->ca_last_week_total_sales_amount;
                $report->ca_last_week_total_sales_unit      = $request->ca_last_week_total_sales_unit;
                $report->ca_current_week_total_sales_amount = $request->ca_current_week_total_sales_amount;
                $report->ca_current_week_total_sales_unit   = $request->ca_current_week_total_sales_unit;
                $report->ca_current_week_ads_sales_amount   = $request->ca_current_week_ads_sales_amount;
                $report->ca_current_week_ads_sales_unit     = $request->ca_current_week_ads_sales_unit;
                $report->ca_current_week_acos               = $request->ca_current_week_acos;
                $report->ca_current_week_tacos              = $request->ca_current_week_tacos;
                $report->ca_current_week_ads_spend          = $request->ca_current_week_ads_spend;
                $report->ca_current_week_ads_roas           = $request->ca_current_week_ads_roas;
                $clientWeeklyReport->save();
                
                return redirect()->route('admin.reports.custom-weekly-report.index')->with([
                    'message' => 'Amazon Canada Sales Updated Successfully',
                    'alert-type' => 'success'
                ]);
            }
            else{
                return redirect()->route('admin.reports.custom-weekly-report.index')->with([
                    'message' => 'Amazon Canada Sales Not Added Yet',
                    'alert-type' => 'error'
                ]);
            }
        }
    }

    public function updateWalmartSales(Request $request, $clientWeeklyReportNumber){
        // cheeck user is logged in or not
        if(Auth::check() == false){
            return redirect()->route('admin.login');
        }
        else{
            $report = ClientWeeklyReport::where('report_number', $clientWeeklyReportNumber)->first();
            
            if($clientWeeklyReport->is_walmart_data_added == 1){
                $clientWeeklyReport->is_walmart_data_added       = 1;
                $report->walmart_one_year_total_sales_amount     = $request->walmart_one_year_total_sales_amount;
                $report->walmart_one_year_total_sales_unit       = $request->walmart_one_year_total_sales_unit;
                $report->walmart_last_week_total_sales_amount    = $request->walmart_last_week_total_sales_amount;
                $report->walmart_last_week_total_sales_unit      = $request->walmart_last_week_total_sales_unit;
                $report->walmart_current_week_total_sales_amount = $request->walmart_current_week_total_sales_amount;
                $report->walmart_current_week_total_sales_unit   = $request->walmart_current_week_total_sales_unit;
                $report->walmart_current_week_ads_sales_amount   = $request->walmart_current_week_ads_sales_amount;
                $report->walmart_current_week_ads_sales_unit     = $request->walmart_current_week_ads_sales_unit;
                $report->walmart_current_week_acos               = $request->walmart_current_week_acos;
                $report->walmart_current_week_tacos              = $request->walmart_current_week_tacos;
                $report->walmart_current_week_ads_spend          = $request->walmart_current_week_ads_spend;
                $report->walmart_current_week_ads_roas           = $request->walmart_current_week_ads_roas;
                $clientWeeklyReport->save();
                
                return redirect()->route('admin.reports.custom-weekly-report.index')->with([
                    'message' => 'Walmart Sales Updated Successfully',
                    'alert-type' => 'success'
                ]);
            }
            else{
                return redirect()->route('admin.reports.custom-weekly-report.index')->with([
                    'message' => 'Walmart Sales Not Added Yet',
                    'alert-type' => 'error'
                ]);
            }
        }
    }

    public function editMeetingNotes($clientWeeklyReportNumber){
        if(Auth::check() == false){
            return redirect()->route('admin.login');
        }
        else{
            session([
                'menu_active' => 'custom-reports',
                'page_title' => 'Weekly Reports Update',
                'page_title_description' => 'Update Weekly Report Meeting Notes',
                'breadcrumb' => [
                    'Home' => route('admin.dashboard'),
                    'Weekly Report' => route('admin.reports.custom-weekly-report.index'),
                    'Meeting Notes' => ""
                ],
            ]);
            $clientWeeklyReport = ClientWeeklyReport::where('report_number', $clientWeeklyReportNumber)->first();
            $meetingNotes       = ClientWeeklyMeetingNote::where('client_weekly_report_id', $clientWeeklyReport->id)->get();
            return view('admin.reports.custom-weekly-report.update-meeting-notes', compact('clientWeeklyReport', 'meetingNotes'));
        }
    }

    public function updateMeetingNotes(Request $request, $clientWeeklyReportNumber){
        // check if user is logged in
        if(Auth::check() == false){
            return redirect()->route('admin.login');
        }
        else{
            session([
                'menu_active' => 'custom-reports',
                'page_title' => 'Weekly Reports Update',
                'page_title_description' => 'Update Weekly Report Meeting Notes',
                'breadcrumb' => [
                    'Home' => route('admin.dashboard'),
                    'Weekly Report' => route('admin.reports.custom-weekly-report.index'),
                    'Meeting Notes' => ""
                ],
            ]);

            $clientWeeklyReport = ClientWeeklyReport::where('report_number', $clientWeeklyReportNumber)->first();
            $meetingNotes       = ClientWeeklyMeetingNote::where('client_weekly_report_id', $clientWeeklyReport->id)->get();
            
            $total_notes = count($request->notes);
            for($i = 0; $i < $total_notes; $i++){
                $meetingNote                            = ClientWeeklyMeetingNote::find($request->meeting_note_id[$i]);
                $meetingNote->note                      = $request->notes[$i];
                $meetingNote->note_url                  = $request->urls[$i];
                $meetingNote->marketplace               = $request->marketplaces[$i];
                $meetingNote->client_weekly_report_id   = $clientWeeklyReport->id;
                $meetingNote->save();
            }
            return redirect()->route('admin.reports.custom-weekly-report.index')->with([
                'message' => 'Meeting Notes Updated Successfully',
                'type' => 'success'
            ]);
        }
    }

    public function editWeeklyReportTasks($clientWeeklyReportNumber){
        if(Auth::check() == false){
            return redirect()->route('admin.login');
        }
        else{
            session([
                'menu_active' => 'custom-reports',
                'page_title' => 'Weekly Reports Update',
                'page_title_description' => 'Update Weekly Report Tasks',
                'breadcrumb' => [
                    'Home' => route('admin.dashboard'),
                    'Weekly Report' => route('admin.reports.custom-weekly-report.index'),
                    'Tasks' => ""
                ],
            ]);
            
            $clientWeeklyReport = ClientWeeklyReport::where('report_number', $clientWeeklyReportNumber)->first();
            $meetingTasks       = ClientWeeklyReportTask::where('client_weekly_report_id', $clientWeeklyReport->id)->get();
            return view('admin.reports.custom-weekly-report.update-tasks', compact('clientWeeklyReport', 'meetingTasks'));
        }
    }

    public function updateWeeklyReportTasks(Request $request, $clientWeeklyReportNumber){
        // check if user is logged in
        if(Auth::check() == false){
            return redirect()->route('admin.login');
        }
        else{
            session([
                'menu_active' => 'custom-reports',
                'page_title' => 'Weekly Reports Update',
                'page_title_description' => 'Update Weekly Report Tasks',
                'breadcrumb' => [
                    'Home' => route('admin.dashboard'),
                    'Weekly Report' => route('admin.reports.custom-weekly-report.index'),
                    'Tasks' => ""
                ],
            ]);

            $clientWeeklyReport = ClientWeeklyReport::where('report_number', $clientWeeklyReportNumber)->first();
            $meetingTasks       = ClientWeeklyReportTask::where('client_weekly_report_id', $clientWeeklyReport->id)->get();
            
            $total_tasks = count($request->tasks);
            for($i = 0; $i < $total_tasks; $i++){
                $task                                   = ClientWeeklyReportTask::find($request->task_id[$i]);
                $task->task_title                       = $request->tasks[$i];
                $task->task_description                 = $request->task_descriptions[$i];
                $task->task_status                      = $request->task_status[$i];
                $task->task_url                         = $request->task_urls[$i];
                $task->category                         = $request->category[$i];
                $task->client_weekly_report_id          = $clientWeeklyReport->id;
                $task->save();
            }
            return redirect()->route('admin.reports.custom-weekly-report.index')->with([
                'message' => 'Tasks Updated Successfully',
                'type' => 'success'
            ]);
        }
    }

    public function show($clientWeeklyReport)
    {
        // check if user is logged in
        if(Auth::check() == false){
            return redirect()->route('admin.login');
        }
        else{
            session([
                'menu_active' => 'custom-reports',
                'page_title' => 'Weekly Reports',
                'page_title_description' => 'View Weekly Report',
                'breadcrumb' => [
                    'Home' => route('admin.dashboard'),
                    'Weekly Report' => route('admin.reports.custom-weekly-report.index'),
                    'View' => ""
                ],
            ]);

            $report = ClientWeeklyReport::where('report_number', $clientWeeklyReport)->first();
            $meetingNotes = ClientWeeklyMeetingNote::where('client_weekly_report_id', $report->id)->get();
            $meetingTasks = ClientWeeklyReportTask::where('client_weekly_report_id', $report->id)->get();

            return view('admin.reports.custom-weekly-report.show', compact('report', 'meetingNotes', 'meetingTasks'));
        }
    }

    public function exportPdf($report_number){
        // check if user is logged in
        if(Auth::check() == false){
            return redirect()->route('admin.login');
        }
        else{
            $report = ClientWeeklyReport::where('report_number', $report_number)->first();
            $report_theme = ($report->report_template_theme == 'zonhack') ? "Zonhack" : "NuDawn";
            // check if report is single or multiple
            if($report->is_multiple_accounts == 0){
                $meetingNotes = ClientWeeklyMeetingNote::where('client_weekly_report_id', $report->id)->get();
                $meetingTasks = ClientWeeklyReportTask::where('client_weekly_report_id', $report->id)->get();
                
                $pdf = PDF::loadView('admin.pdfs.reports.zh-template', compact('report', 'meetingNotes', 'meetingTasks'));
                $pdf->setOption('page-size', 'A4');
                $pdf->setOption('enable-javascript', true);
                $pdf->setOption('javascript-delay', 1000);
                $pdf->setOption('no-stop-slow-scripts', true);
                $pdf->setOption('enable-smart-shrinking', true);
                $pdf->setOption('margin-top', 0);
                $pdf->setOption('margin-bottom', 0);
                $pdf->setOption('margin-left', 0);
                $pdf->setOption('margin-right', 0);
                $pdf->setOption('orientation', 'portrait');
                
                return $pdf->stream($report->report_number.'.pdf',array('Attachment'=>0));//$pdf->download('Application-'. $leaveApplication->leave_id .'.pdf');
            }
            else if ($report->is_multiple_accounts == 1 && $report->parent_report_id == null){
                $otherAccountDetails = ClientWeeklyReport::where('parent_report_id', $report->id)->get();
                // dd($otherAccountDetails);
                $pdf = PDF::loadView('admin.pdfs.reports.nd-template', compact('report', 'otherAccountDetails'))->setPaper('letter', 'landscape');
                $pdf->setOption('orientation', 'landscape');
                $pdf->setOption('page-size', 'A4');
                $pdf->setOption('enable-javascript', true);
                $pdf->setOption('javascript-delay', 1000);
                $pdf->setOption('no-stop-slow-scripts', true);
                $pdf->setOption('enable-smart-shrinking', true);
                // $pdf->setOption('margin-top', 0);
                // $pdf->setOption('margin-bottom', 0);
                // $pdf->setOption('margin-left', 0);
                // $pdf->setOption('margin-right', 0);
                return $pdf->stream('Weekly-' . $report_theme . '-Report.pdf',array('Attachment'=>0));
            }
        }
        $report = ClientWeeklyReport::where('report_number', $report_number)->first();
        $meetingNotes = ClientWeeklyMeetingNote::where('client_weekly_report_id', $report->id)->get();
        $meetingTasks = ClientWeeklyReportTask::where('client_weekly_report_id', $report->id)->get();
        
        $pdf = PDF::loadView('admin.pdfs.reports.zh-template', compact('report', 'meetingNotes', 'meetingTasks'));
        return $pdf->stream('my.pdf',array('Attachment'=>0));//$pdf->download('Application-'. $leaveApplication->leave_id .'.pdf');
    }

    public function resetForm(){
        session()->forget('report_type');

        return redirect()->route('admin.reports.custom-weekly-report.index');
    }

    public function destroy(ClientWeeklyReport $clientWeeklyReport)
    {
        //
    }
}
