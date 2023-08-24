<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PdfReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDF;
use Intervention\Image\Facades\Image;

class PdfReportController extends Controller
{
    public function index()
    {
        // check if user is authenticated
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            // set session data
            session([
                'menu_active' => 'pdf_reports',
                'page_title' => 'PDF Reports',
                'page_title_description' => 'All Generated PDF Reports',
                'breadcrumb' => [
                    'Home' => route('admin.dashboard'),
                    'Reports' => '',
                    'PDFs' => '',
                ],
            ]);

            $pdfReportsList = PdfReport::orderby('id', 'desc')->get();
            return view('admin.pdf-reports.index', compact('pdfReportsList'));
        }
    }

    public function deleteAllReport(Request $request)
    {
        $pdfReportsList = PdfReport::all();
        $idList = explode(',', $request->accounts_id);
        // dd($pdfReportsList, $idList);
        
        foreach($pdfReportsList as $pdf_file){
            if(Storage::disk('public')->exists('pdfs/' . $pdf_file->file_name)){
                Storage::disk('public')->delete('pdfs/' . $pdf_file->file_name);
            }
            $pdf_file->delete();
        }
        
        return redirect()->back()
            ->with([
                'message' => 'All reports deleted successfully',
                'alert-type' => 'success',
            ]);
    }

    // public function viewCombinedPdf(Request $request){
    //     $accountIdList = $request->accounts;
    //     $accountNamesList = array();
    //     $weeklyReportist = array();
    //     $meetingNotesList = array();
    //     $tasksList = array();
    //     $clientAccountList = array();
    //     $nh_theme_count = 0;
    //     $zh_theme_count = 0;
    //     $chartDataByAccountList = array();

    //     $report_start_date = null;
    //     $report_end_date = null;

    //     $report_theme = null;

    //     for($i = 0; $i < count($accountIdList); $i++){
    //         $weeklyReport = WeeklyReport::where('caccount_id', $accountIdList[$i])->orderby('id', 'desc')->first();
    //         $last_week_report = \App\Models\WeeklyReport::where('caccount_id', $weeklyReport->caccount_id)
    //                     ->where('start_date', date('Y-m-d', strtotime($weeklyReport->start_date . ' -7 days')))
    //                     ->where('end_date', date('Y-m-d', strtotime($weeklyReport->end_date . ' -7 days')))
    //                     ->first();
    //         $last_week_report2 = \App\Models\WeeklyReport::where('caccount_id', $weeklyReport->caccount_id)
    //                     ->where('start_date', date('Y-m-d', strtotime($weeklyReport->start_date . ' -14 days')))
    //                     ->where('end_date', date('Y-m-d', strtotime($weeklyReport->end_date . ' -14 days')))
    //                     ->first();
    //         $last_week_report3 = \App\Models\WeeklyReport::where('caccount_id', $weeklyReport->caccount_id)
    //                     ->where('start_date', date('Y-m-d', strtotime($weeklyReport->start_date . ' -21 days')))
    //                     ->where('end_date', date('Y-m-d', strtotime($weeklyReport->end_date . ' -21 days')))
    //                     ->first();

    //         $clientAccountWeeklyReport = [
    //             'week_4' => $weeklyReport,
    //             'week_3' => $last_week_report,
    //             'week_2' => $last_week_report2,
    //             'week_1' => $last_week_report3,
    //         ];

    //         $chartDataByAccount = [];

    //         for($j = 0; $j < 4; $j++){
    //             $chartDataByAccountPart = (object)[
    //                 'period'            => 'Week ' . ($j + 1),
    //                 'total_sales'       => $clientAccountWeeklyReport['week_' . ($j + 1)]->total_sales,
    //                 'total_ads_sales'   => $clientAccountWeeklyReport['week_' . ($j + 1)]->total_ads_sales,
    //             ];
    //             array_push($chartDataByAccount, $chartDataByAccountPart);
    //         }

    //         // check department of client account and get the report template
    //         $clientAccount = ClientAccount::where('id', $weeklyReport->caccount_id)->first();
    //         $meetingNotes = MeetingNote::where('client_account_id', $weeklyReport->caccount_id)
    //                     ->whereBetween('added_on', [$weeklyReport->start_date, $weeklyReport->end_date])->get();
    //         $tasks = DailyTask::where('client_account_id', $weeklyReport->caccount_id)
    //                     ->whereBetween('submission_date', [$weeklyReport->start_date, $weeklyReport->end_date])->get();
            
    //         if($clientAccount->department->slug == 'nudawn'){
    //             $nh_theme_count++;
    //             $report_theme = 'nudawn';
    //         }
    //         else if($clientAccount->department->slug == 'zonhack'){
    //             $zh_theme_count++;
    //             $report_theme = 'zonhack';
    //         }

    //         array_push($weeklyReportist, $clientAccountWeeklyReport);
    //         array_push($clientAccountList, $clientAccount);
    //         array_push($chartDataByAccountList, $chartDataByAccount);
    //         array_push($accountNamesList, $clientAccount->account_name);
    //     }

    //     // dd($chartDataByAccountList);

    //     $report_start_date  = $weeklyReportist[0]['week_4']->start_date;
    //     $report_end_date    = $weeklyReportist[0]['week_4']->end_date;
    //     $report_type        = ($weeklyReportist[0]['week_4']->report_type == 2) ? 'Weekly' : 
    //                             (($weeklyReportist[0]['week_4']->report_type == 3) ? 'Monthly' : 'Bi-Weekly');
        


    //     if($zh_theme_count > 0 && $zh_theme_count == count($accountIdList)){
    //         // $pdf = PDF::loadView('admin.pdfs.reports.zonhack-template', compact('weeklyReportist', 'meetingNotesList', 'tasksList', 'report_start_date', 'report_end_date', 'report_type', 'clientAccountList'));
            
    //         return view('admin.weekly-reports.nh-report-view', 
    //             compact('weeklyReportist', 'meetingNotesList', 'tasksList', 'report_start_date', 'report_theme',
    //                 'report_end_date', 'report_type', 'clientAccountList', 'chartDataByAccountList'));
    //     }
    //     else if($nh_theme_count > 0 && $nh_theme_count == count($accountIdList)){
    //         $pdf = PDF::loadView('admin.pdfs.reports.zonhack-template', 
    //             compact('weeklyReportist', 'meetingNotesList', 'tasksList', 'report_start_date', 'report_theme',
    //             'report_end_date', 'report_type', 'clientAccountList', 'chartDataByAccountList'));
    //         // save pdf to storage
    //         $filename = $request->report_theme . '-' . time() . '.pdf';
    //         $path = public_path('storage/pdfs/');
    //         $pdf->save($path . '/' . $filename);
    //         $reportPdf = public_path('storage/pdfs/' . $filename);

    //         return redirect()->back()->with([
    //             'message' => 'Report generated successfully',
    //             'alert-type' => 'success',
    //         ]);

    //         // return view('admin.weekly-reports.nh-report-view', 
    //         //     compact('weeklyReportist', 'meetingNotesList', 'tasksList', 'report_start_date', 'report_theme',
    //         //         'report_end_date', 'report_type', 'clientAccountList', 'chartDataByAccountList'));
    //     }
    // }

    public function download(Request $request)
    {
        // dd($request->all());
        $tables_list = json_decode($request->tbl_comparision);
        $charts_list = json_decode($request->cht_comparision);
        // remove \n from $tables_list and $charts_list array items
        $tables_list = array_map(function($item){
            return str_replace("\n", '', $item);
        }, $tables_list);
        $charts_list = array_map(function($item){
            $item = str_replace("\n", '', $item);
            return str_replace('&quot;', "'", $item);
        }, $charts_list);
        
        // dd($charts_list[0]);
        
        $pdfReportObj = new PdfReport();
        $pdfReportObj->report_id = 'report_' . time();
        $pdfReportObj->file_name = $pdfReportObj->report_id . '.pdf';
        $pdfReportObj->file_path = public_path('storage/pdfs');
        $pdfReportObj->file_type = 'pdf';
        $pdfReportObj->file_size = 0;
        $pdfReportObj->date_range = date('d M, Y', strtotime($request->report_start_date)) . ' - ' . date('d M, Y', strtotime($request->report_end_date));
        $pdfReportObj->report_theme = $request->report_theme;
        $pdfReportObj->accounts_name = $request->accountNamesList;
        $pdfReportObj->accounts_ids = $request->accountIdList;
        $pdfReportObj->paper_size = ($request->report_theme == 'nudawn') ? 'legal' : 'a4';
        $pdfReportObj->orientation = ($request->report_theme == 'nudawn') ? 'landscape' : 'portrait';
        $pdfReportObj->page_margin = ($request->report_theme == 'nudawn') ? '0' : '10';
        $pdfReportObj->tables_json = $request->tbl_comparision;
        $pdfReportObj->charts_json = $request->cht_comparision;
        $pdfReportObj->save();

        $dpdf = PDF::loadView('admin.pdfs.reports.nudawn-template', 
            compact('request', 'pdfReportObj', 'tables_list', 'charts_list'))
            ->setPaper($pdfReportObj->paper_size, $pdfReportObj->orientation)
            ->setOption('enable-javascript', true)
            ->setOption('javascript-delay', 2000)
            ->setOption('enable-smart-shrinking', true)
            ->setOption('no-stop-slow-scripts', true)
            ->setOption('utf8', true);

        // save pdf to storage
        $dpdf->save($pdfReportObj->file_path . '/' . $pdfReportObj->file_name);
        $pdf = public_path('storage/pdfs/' . $pdfReportObj->file_name);
        
        // return view('admin.pdfs.reports.nudawn-template', 
        // compact('request', 'pdfReportObj', 'tables_list', 'charts_list'));

        return $dpdf->stream($pdfReportObj->file_name);
    }

    public function destroy($id)
    {
        $pdfReport = PdfReport::find($id);
        // delete file from storage if exists
        $file_path = storage_path('app/public/pdfs/' . $pdfReport->file_name);
        if(file_exists($file_path)){
            unlink($file_path);
        }

        $pdfReport->delete();

        return redirect()->back()->with([
            'message' => 'Report deleted successfully',
            'alert-type' => 'success',
        ]);
    }
}
