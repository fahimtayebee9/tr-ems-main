<?php

namespace App\Http\Controllers\Admin;

use App\Models\WeeklyReport;
use App\Models\ClientAccount;
use App\Models\DailySale;
use App\Models\MeetingNote;
use App\Models\DailyTask;
use App\Models\PdfReport;
use App\Http\Requests\StoreWeeklyReportRequest;
use App\Http\Requests\UpdateWeeklyReportRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class WeeklyReportController extends Controller
{
    public function generate(){
        // check if user is authenticated
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            // set session data
            session([
                'menu_active' => 'weekly_generate',
                'page_title' => 'Reports',
                'page_title_description' => 'Generate Weekly Reports',
                'breadcrumb' => [
                    'Home' => route('admin.dashboard'),
                    'Reports' => '',
                    'Weekly Reports' => '',
                ],
            ]);
            
            // get all daily sales
            $dailySales = DailySale::all();
            // get all client accounts
            $clientAccountList = ClientAccount::all();
            // all weekly reports
            $weeklyReports = WeeklyReport::orderby('id', 'desc')->get();
            // return view
            return view('admin.weekly-reports.generate', compact('dailySales', 'clientAccountList', 'weeklyReports'));
        }
    }

    protected function calculateWeeklyReport($dailySales){
        
    }

    public function store(Request $request){
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            $dailySales = DailySale::where('caccount_id', $request->caccount_id)
                            ->whereBetween('date', [date('Y-m-d', strtotime($request->week_start_date)), date('Y-m-d', strtotime($request->week_end_date))])
                            ->get();

            $meetingNotesList = MeetingNote::where('client_account_id', $request->caccount_id)
                            ->whereBetween('added_on', [date('Y-m-d', strtotime($request->week_start_date)), date('Y-m-d', strtotime($request->week_end_date))])
                            ->get();

            $tasksList = DailyTask::where('client_account_id', $request->caccount_id)
                            ->whereBetween('submission_date', [date('Y-m-d', strtotime($request->week_start_date)), date('Y-m-d', strtotime($request->week_end_date))])
                            ->get();
            
            $clientAccount = ClientAccount::where('id', $request->caccount_id)->first();

            if($meetingNotesList != null && $tasksList != null && count($dailySales) == 0){
                $weeklyReport = new WeeklyReport();
                $weeklyReport->caccount_id          = $clientAccount->id;
                $weeklyReport->start_date           = date('Y-m-d', strtotime($request->week_start_date));
                $weeklyReport->end_date             = date('Y-m-d', strtotime($request->week_end_date));
                $weeklyReport->total_sales          = 0;//$total_sales;
                $weeklyReport->total_ads_sales      = 0;//$total_ads_sales;
                $weeklyReport->total_impressions    = 0;//$total_impressions;
                $weeklyReport->total_clicks         = 0;//$total_clicks;
                $weeklyReport->total_cost           = 0;//$total_cost;
                $weeklyReport->average_tacos        = 0;//$average_tacos;
                $weeklyReport->average_acos         = 0;//$average_acos;
                $weeklyReport->average_roas         = 0;//$average_roas;
                $weeklyReport->average_cpc          = 0;//$average_cpc;
                $weeklyReport->average_cr           = 0;//$average_cr;
                $weeklyReport->total_order_units    = 0;
                $weeklyReport->total_ads_order_units = 0;
                $weeklyReport->report_type          = $request->report_type;
                $weeklyReport->count_meeting_notes  = count($meetingNotesList);
                $weeklyReport->count_daily_tasks    = count($tasksList);
                $weeklyReport->save();

                return redirect()->route('admin.reports.custom-weekly-report.generateReport')->with([
                    'message' => 'Weekly report generated successfully.',
                    'alert-type' => 'success',
                ]);
            }
            else if($dailySales == null || empty($dailySales) || count($dailySales) == 0){
                return redirect()->back()->with([
                    'message' => 'No data found for the selected client account. Please import data first.',
                    'alert-type' => 'error',
                ]);
            }
            else{
                // defualt values
                $allSales       = [];
                $adsSales       = [];
                $dates          = [];
                $average_tacos  = 0;
                $average_acos   = 0;
                $average_roas   = 0;
                $average_cpc    = 0;
                $average_cr     = 0;
                $total_impressions = 0;
                $total_clicks       = 0;
                $total_cost         = 0;
                $total_sales        = 0;
                $total_ads_sales    = 0;
    
                // get total sales data
                foreach($dailySales as $dailySale){
                    $allSales[]     = $dailySale->all_sales;
                    $adsSales[]     = $dailySale->sponsored_sales;
                    $dates[]        = $dailySale->date;
                    $average_tacos  += $dailySale->tacos;
                    $average_acos   += $dailySale->acos;
                    $average_roas   += $dailySale->roas;
                    $average_cpc    += $dailySale->cpc;
                    $average_cr     += $dailySale->cr;
                    $total_impressions  += $dailySale->impressions;
                    $total_clicks       += $dailySale->clicks;
                    $total_cost         += $dailySale->cost;
                    $total_sales        += $dailySale->all_sales;
                    $total_ads_sales    += $dailySale->sponsored_sales;
                }
                
                // dd($dailySales, $average_tacos, $average_acos, $average_roas, $average_cpc, $average_cr, $total_sales);
                
                // calculate average data
                $average_acos   = ($total_cost / $total_ads_sales) * 100;
                $average_tacos  = ($total_cost / $total_sales) * 100;
                $average_cpc    = $average_cpc / count($dailySales);
                $average_cr     = ($average_cr / count($dailySales)) * 100;
                $average_roas   = $average_roas / count($dailySales);//$total_ads_sales / $total_cost;
    
                // store to WeeklyReport table
                $weeklyReport = new WeeklyReport();
                $weeklyReport->caccount_id          = $clientAccount->id;
                $weeklyReport->start_date           = date('Y-m-d', strtotime($request->week_start_date));
                $weeklyReport->end_date             = date('Y-m-d', strtotime($request->week_end_date));
                $weeklyReport->total_sales          = $total_sales;
                $weeklyReport->total_ads_sales      = $total_ads_sales;
                $weeklyReport->total_impressions    = $total_impressions;
                $weeklyReport->total_clicks         = $total_clicks;
                $weeklyReport->total_cost           = $total_cost;
                $weeklyReport->average_tacos        = $average_tacos;
                $weeklyReport->average_acos         = $average_acos;
                $weeklyReport->average_roas         = $average_roas;
                $weeklyReport->average_cpc          = $average_cpc;
                $weeklyReport->average_cr           = $average_cr;
                $weeklyReport->total_order_units    = 0;
                $weeklyReport->total_ads_order_units = 0;
                $weeklyReport->report_type          = $request->report_type;
                $weeklyReport->count_meeting_notes = count($meetingNotesList);
                $weeklyReport->count_daily_tasks = count($tasksList);
                $weeklyReport->total_sales_unit_oneyearago = 0;
                $weeklyReport->total_sales_amount_oneyearago    = 0;
                $weeklyReport->save();
    
                // return view
                return redirect()->route('admin.reports.custom-weekly-report.generateReport')->with([
                    'message' => 'Weekly Report Generated Successfully',
                    'alert-type' => 'success',
                ]);
            }
        }
    }

    public function update(Request $request, $id){
        $weeklyReport = WeeklyReport::where('id', $id)->first();
        // dd($request->all(), $weeklyReport);
        $weeklyReport->total_sales          = $request->total_sales;
        $weeklyReport->total_ads_sales      = $request->total_ads_sales;
        $weeklyReport->total_impressions    = $request->total_impressions;
        $weeklyReport->total_clicks         = $request->total_clicks;
        $weeklyReport->total_cost           = $request->total_cost;
        $weeklyReport->average_tacos        = $request->average_tacos;
        $weeklyReport->average_acos         = $request->average_acos;
        $weeklyReport->average_roas         = $request->average_roas;
        $weeklyReport->average_cpc          = $request->average_cpc;
        $weeklyReport->average_cr           = $request->average_cr;
        $weeklyReport->total_order_units    = $request->total_units;
        $weeklyReport->total_ads_order_units = $request->ads_units;
        $weeklyReport->total_sales_unit_oneyearago = $request->total_units_oneyearago;
        $weeklyReport->total_sales_amount_oneyearago = $request->total_amount_oneyearago;
        $weeklyReport->update();

        return redirect()->back()->with([
            'message' => 'Weekly Report Updated Successfully',
            'alert-type' => 'success',
        ]);
    }

    public function destroy($id){
        $weeklyReport = WeeklyReport::where('id', $id)->first();
        $weeklyReport->delete();

        return redirect()->back()->with([
            'message' => 'Weekly Report Deleted Successfully',
            'alert-type' => 'success',
        ]);
    }

    public function viewCombinedPdf(Request $request){
        $accountIdList = $request->accounts;
        $accountNamesList = array();
        $weeklyReportist = array();
        $meetingNotesList = array();
        $tasksList = array();
        $clientAccountList = array();
        $nh_theme_count = 0;
        $zh_theme_count = 0;
        $chartDataByAccountList = array();

        $report_start_date = null;
        $report_end_date = null;

        $report_theme = null;

        for($i = 0; $i < count($accountIdList); $i++){
            $weeklyReport = WeeklyReport::where('caccount_id', $accountIdList[$i])->orderby('id', 'desc')->first();
            $last_week_report = \App\Models\WeeklyReport::where('caccount_id', $weeklyReport->caccount_id)
                        ->where('start_date', date('Y-m-d', strtotime($weeklyReport->start_date . ' -7 days')))
                        ->where('end_date', date('Y-m-d', strtotime($weeklyReport->end_date . ' -7 days')))
                        ->first();
            $last_week_report2 = \App\Models\WeeklyReport::where('caccount_id', $weeklyReport->caccount_id)
                        ->where('start_date', date('Y-m-d', strtotime($weeklyReport->start_date . ' -14 days')))
                        ->where('end_date', date('Y-m-d', strtotime($weeklyReport->end_date . ' -14 days')))
                        ->first();
            $last_week_report3 = \App\Models\WeeklyReport::where('caccount_id', $weeklyReport->caccount_id)
                        ->where('start_date', date('Y-m-d', strtotime($weeklyReport->start_date . ' -21 days')))
                        ->where('end_date', date('Y-m-d', strtotime($weeklyReport->end_date . ' -21 days')))
                        ->first();

            $clientAccountWeeklyReport = [
                'week_4' => $weeklyReport,
                'week_3' => $last_week_report,
                'week_2' => $last_week_report2,
                'week_1' => $last_week_report3,
            ];

            $chartDataByAccount = [];

            for($j = 0; $j < 4; $j++){
                $chartDataByAccountPart = (object)[
                    'period'            => 'Week ' . ($j + 1),
                    'total_sales'       => $clientAccountWeeklyReport['week_' . ($j + 1)]->total_sales,
                    'total_ads_sales'   => $clientAccountWeeklyReport['week_' . ($j + 1)]->total_ads_sales,
                    'total_cost'        => $clientAccountWeeklyReport['week_' . ($j + 1)]->total_cost,
                ];
                array_push($chartDataByAccount, $chartDataByAccountPart);
            }

            // check department of client account and get the report template
            $clientAccount = ClientAccount::where('id', $weeklyReport->caccount_id)->first();
            $meetingNotes = MeetingNote::where('client_account_id', $weeklyReport->caccount_id)
                        ->whereBetween('added_on', [$weeklyReport->start_date, $weeklyReport->end_date])->get();
            $tasks = DailyTask::where('client_account_id', $weeklyReport->caccount_id)
                        ->whereBetween('submission_date', [$weeklyReport->start_date, $weeklyReport->end_date])->get();
            
            if($clientAccount->department->slug == 'nudawn'){
                $nh_theme_count++;
                $report_theme = 'nudawn';
            }
            else if($clientAccount->department->slug == 'zonhack'){
                $zh_theme_count++;
                $report_theme = 'zonhack';
            }

            array_push($weeklyReportist, $clientAccountWeeklyReport);
            array_push($clientAccountList, $clientAccount);
            array_push($chartDataByAccountList, $chartDataByAccount);
            array_push($accountNamesList, $clientAccount->account_name);
            array_push($meetingNotesList, $meetingNotes);
        }

        $report_start_date  = $weeklyReportist[0]['week_4']->start_date;
        $report_end_date    = $weeklyReportist[0]['week_4']->end_date;
        $report_type        = ($weeklyReportist[0]['week_4']->report_type == 2) ? 'Weekly' : 
                                (($weeklyReportist[0]['week_4']->report_type == 3) ? 'Monthly' : 'Bi-Weekly');
        $inc_meeting_notes  = $request->insert_meeting_notes;

        $check_icon = public_path('storage/uploads/reports-images/check-circle-32.png');
        // convert icon to base64
        $check_icon = base64_encode(file_get_contents($check_icon));
        
        $labels_chart = json_encode(collect($chartDataByAccountPart)->pluck('period')->toArray());
        
        if($zh_theme_count > 0 && $zh_theme_count == count($accountIdList)){
            return redirect()->route('admin.reports.custom-weekly-report.view.combined.pdf', 
            compact('weeklyReportist', 'meetingNotesList', 'tasksList', 'report_start_date', 'report_theme',
            'report_end_date', 'report_type', 'clientAccountList', 'chartDataByAccountList'))
            ->with([
                'message' => 'Report generated successfully',
                'alert-type' => 'success',
            ]);
        }
        else if($nh_theme_count > 0 && $nh_theme_count == count($accountIdList)){
            return view('admin.weekly-reports.nh-report-view', 
                    compact('weeklyReportist', 'meetingNotesList', 'tasksList', 'report_start_date', 'report_theme', 'accountIdList', 'inc_meeting_notes',
                    'report_end_date', 'report_type', 'clientAccountList', 'chartDataByAccountList', 'accountNamesList', 'check_icon'))
                ->with([
                    'message' => 'Report generated successfully',
                    'alert-type' => 'success',
                ]);
        }
    }

    public function downloadCombinedReport(Request $request){
        // $validated = Validator::make($request->all(), [
        //     'content' => 'required',
        //     'report_theme' => 'required',
        //     'report_start_date' => 'required',
        //     'report_end_date' => 'required',
        // ]);

        // if($validated->fails()){
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => 'Please select at least one report to download',
        //     ]);
        // }
        // else{
        //     $report_content = $request->content;
        //     $reportDateRange = date('d M, Y', strtotime($request->report_start_date)) . ' - ' . date('d M, Y', strtotime($request->report_end_date));
        //     $report_theme = $request->report_theme;
        //     $report_type = $request->report_type;



        //     // if($request->report_theme == 'nudawn'){
        //     //     $pdf = PDF::loadView('admin.pdfs.reports.nudawn-template', 
        //     //         compact('report_content','report_theme', 'report_type', 'reportDateRange'))
        //     //         ->setPaper('legal', 'landscape');
        //     //     // save pdf to storage
        //     //     $filename = $request->report_theme . '-' . time() . '.pdf';
        //     //     $path = public_path('storage/pdfs/');
        //     //     $pdf->save($path . '/' . $filename);
        //     //     $reportPdf = public_path('storage/pdfs/' . $filename);
        //     //     return response()->download($reportPdf);
        //     // }
        //     // else if($request->report_theme == 'zonhack'){

        //     // }
        // }
    }

    public function downloadPdf(Request $request, $id){
        $weeklyReport = WeeklyReport::where('id', $id)->first();
        // dd($request->all(), $weeklyReport->caccount_id);

        $last_week_report = WeeklyReport::where('caccount_id', $weeklyReport->caccount_id)
                        ->where('start_date', date('Y-m-d', strtotime($weeklyReport->start_date . ' -7 days')))
                        ->where('end_date', date('Y-m-d', strtotime($weeklyReport->end_date . ' -7 days')))
                        ->first();

        $clientAccount = ClientAccount::where('id', $weeklyReport->caccount_id)->first();
        
        $meetingNotesList = MeetingNote::where('client_account_id', $weeklyReport->caccount_id)
                        ->whereBetween('added_on', [$weeklyReport->start_date, $weeklyReport->end_date])
                        ->get();
        $dailyTaskList = DailyTask::where('client_account_id', $weeklyReport->caccount_id)
                        ->whereBetween('submission_date', [$weeklyReport->start_date, $weeklyReport->end_date])
                        ->orderBy('task_status', 'asc')->get();
        
        if($clientAccount->department->slug == 'zonhack'){
            $lastWeeklyReport = ($weeklyReport != null) ? $last_week_report : null;
            $report = PDF::loadView('admin.pdfs.reports.zonhack-single', 
                compact('weeklyReport', 'dailyTaskList', 'clientAccount', 'request', 'last_week_report'));
        }
        else{
            return view('admin.pdfs.reports.nudawn-single', 
                compact('weeklyReport', 'meetingNotesList', 'dailyTaskList', 'clientAccount', 'request', 'last_week_report'));
            $report = PDF::loadView('admin.pdfs.reports.nudawn-single', 
                compact('weeklyReport', 'meetingNotesList', 'dailyTaskList', 'clientAccount', 'request', 'last_week_report'))
                ->setPaper('legal', 'landscape');
        }
        
        return $report->stream(strtoupper($clientAccount->account_name) . '-Weekly-Report.pdf');
    }

    // CONNECTED TO generateAllReport FUNCTION
    public function generateWeeklyReport($week_start_date, $week_end_date, $client_account_id, $report_type){
        $dailySales = DailySale::where('caccount_id', $client_account_id)
                        ->whereBetween('date', [date('Y-m-d', strtotime($week_start_date)), date('Y-m-d', strtotime($week_end_date))])
                        ->get();

        $meetingNotesList = MeetingNote::where('client_account_id', $client_account_id)
                        ->whereBetween('added_on', [date('Y-m-d', strtotime($week_start_date)), date('Y-m-d', strtotime($week_end_date))])
                        ->get();

        $tasksList = DailyTask::where('client_account_id', $client_account_id)
                        ->whereBetween('submission_date', [date('Y-m-d', strtotime($week_start_date)), date('Y-m-d', strtotime($week_end_date))])
                        ->get();
        
        $clientAccount = ClientAccount::where('id', $client_account_id)->first();

        $allSales       = [];
        $adsSales       = [];
        $dates          = [];
        $average_tacos  = 0;
        $average_acos   = 0;
        $average_roas   = 0;
        $average_cpc    = 0;
        $average_cr     = 0;
        $total_impressions = 0;
        $total_clicks       = 0;
        $total_cost         = 0;
        $total_sales        = 0;
        $total_ads_sales    = 0;
        
        foreach($dailySales as $dailySale){
            $allSales[]     = $dailySale->all_sales;
            $adsSales[]     = $dailySale->sponsored_sales;
            $dates[]        = $dailySale->date;
            $average_tacos  += $dailySale->tacos;
            $average_acos   += $dailySale->acos;
            $average_roas   += $dailySale->roas;
            $average_cpc    += $dailySale->cpc;
            $average_cr     += $dailySale->cr;
            $total_impressions  += $dailySale->impressions;
            $total_clicks       += $dailySale->clicks;
            $total_cost         += $dailySale->cost;
            $total_sales        += $dailySale->all_sales;
            $total_ads_sales    += $dailySale->sponsored_sales;
        }

        $average_acos   = ($total_cost > 0 && $total_ads_sales > 0) ? ($total_cost / $total_ads_sales) * 100 : 0;
        $average_tacos  = ($total_cost > 0 && $total_sales > 0) ? ($total_cost / $total_sales) * 100 : 0;
        $average_cpc    = ($total_cost > 0 && $total_clicks > 0) ? ($total_cost / $total_clicks) : 0;
        $average_cr     = ($average_cr > 0 && count($dailySales) > 0) ? ($average_cr / count($dailySales)) * 100 : 0;
        $average_roas   = ($average_roas > 0 && count($dailySales) > 0) ? $average_roas / count($dailySales) : 0;
        
        // store to WeeklyReport table
        $lastWeeklyReport = new WeeklyReport();
        $lastWeeklyReport->caccount_id          = $clientAccount->id;
        $lastWeeklyReport->start_date           = date('Y-m-d', strtotime($week_start_date));
        $lastWeeklyReport->end_date             = date('Y-m-d', strtotime($week_end_date));
        $lastWeeklyReport->total_sales          = $total_sales;
        $lastWeeklyReport->total_ads_sales      = $total_ads_sales;
        $lastWeeklyReport->total_impressions    = $total_impressions;
        $lastWeeklyReport->total_clicks         = $total_clicks;
        $lastWeeklyReport->total_cost           = $total_cost;
        $lastWeeklyReport->average_tacos        = $average_tacos;
        $lastWeeklyReport->average_acos         = $average_acos;
        $lastWeeklyReport->average_roas         = $average_roas;
        $lastWeeklyReport->average_cpc          = $average_cpc;
        $lastWeeklyReport->average_cr           = $average_cr;
        $lastWeeklyReport->total_order_units    = 0;
        $lastWeeklyReport->total_ads_order_units = 0;
        // $lastWeeklyReport->report_type          = $request->report_type;
        $lastWeeklyReport->count_meeting_notes  = count($meetingNotesList);
        $lastWeeklyReport->count_daily_tasks    = count($tasksList);
        $lastWeeklyReport->total_sales_unit_oneyearago = 0;
        $lastWeeklyReport->total_sales_amount_oneyearago    = 0;
        $lastWeeklyReport->report_type  = ($report_type == 'weekly') ? 1 : 2;
        $lastWeeklyReport->save();
    }

    public function generateAllReport(Request $request){
        // All Daily Sales Report for the selected client account
        $dailySales = DailySale::where('caccount_id', $request->client_account)
                        ->get();
        $weeksList = [];
        $dailySalesDatesList = $dailySales->pluck('date')->toArray();
        $dailySalesDatesList = array_unique($dailySalesDatesList);

        if($dailySalesDatesList == null){
            return redirect()->back()->with([
                'message' => 'No daily sales report found for the selected client account.',
                'alert-type' => 'error'
            ]);
        }

        foreach($dailySalesDatesList as $date){
            $week_start_date = date('Y-m-d', strtotime('monday this week', strtotime($date)));
            $week_end_date = date('Y-m-d', strtotime('sunday this week', strtotime($date)));
            $weeksList[] = [
                'week_start_date' => $week_start_date,
                'week_end_date' => $week_end_date
            ];
        }

        $weeksList = array_unique($weeksList, SORT_REGULAR);

        foreach($weeksList as $week){
            $this->generateWeeklyReport($week['week_start_date'], $week['week_end_date'], $request->client_account, $request->report_type);
        }

        return redirect()->back()->with([
            'message' => 'Weekly reports generated successfully.',
            'alert-type' => 'success'
        ]);
    }

}
