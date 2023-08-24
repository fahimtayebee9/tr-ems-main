<?php

namespace App\Http\Controllers\Admin;

use App\Models\DailySale;
use App\Models\ClientAccount;
use App\Http\Requests\StoreDailySaleRequest;
use App\Http\Requests\UpdateDailySaleRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DailySalesImport;
use DB;

class DailySaleController extends Controller
{
    public function index()
    {
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            session([
                'menu_active' => 'daily_sales',
                'page_title' => 'Daily Sales Data',
                'page_title_description' => 'Overview of Daily Sales',
                'breadcrumb' => [
                    'Home' => route('admin.dashboard'),
                    'Reports' => '',
                    'Daily Sales' => '',
                ],
            ]);
            
            $dailySales = DailySale::all();
            $clientAccountList = ClientAccount::all();
            return view('admin.dailySales.index', compact('dailySales', 'clientAccountList'));
        }
    }

    public function getDataForChart(Request $request)
    {
        // dd($request->all());
        // calculate last $request->days days from today
        $lastDays = [];
        for($i = 0; $i < $request->days; $i++){
            $lastDays[] = date('Y-m-d', strtotime('-'.$i.' days'));
        }
        $lastDays = array_reverse($lastDays);
        $dailySales = DailySale::where('caccount_id', $request->caccount_id)
                        ->whereBetween('date', [date('Y-m-d', strtotime($lastDays[0])), date('Y-m-d', strtotime($lastDays[count($lastDays) - 1]))])
                        ->get();
        $allSales = [];
        $adsSales = [];
        $dates = [];
        $average_tacos = 0;
        $average_acos = 0;
        $average_roas = 0;
        $average_cpc = 0;
        $average_cr = 0;
        $total_impressions = 0;
        $total_clicks = 0;
        $total_cost = 0;
        $total_sales = 0;
        $total_ads_sales = 0;

        foreach($dailySales as $dailySale){
            $allSales[] = $dailySale->all_sales;
            $adsSales[] = $dailySale->sponsored_sales;
            $dates[] = $dailySale->date;

            $average_tacos += $dailySale->tacos;
            $average_acos += $dailySale->acos;
            $average_roas += $dailySale->roas;
            $average_cpc += $dailySale->cpc;
            $average_cr += $dailySale->cr;
            $total_impressions += $dailySale->impressions;
            $total_clicks += $dailySale->clicks;
            $total_cost += $dailySale->cost;
            $total_sales += $dailySale->all_sales;
            $total_ads_sales += $dailySale->sponsored_sales;
        }

        $average_acos   = $total_cost / $total_ads_sales;
        $average_tacos  = $total_cost / $total_sales;
        $average_cpc    = $average_cpc / count($dailySales);
        $average_cr     = $average_cr / count($dailySales);
        $average_roas   = $total_ads_sales / $total_cost;

        $chartData = [];
        for($i = 0; $i < count($lastDays); $i++){
            $chartData[] = [
                'period' => date('d M, Y', strtotime($lastDays[$i])),
                'all_sales' => (count($allSales) > $i) ? number_format((float)$allSales[$i], 2, '.', '') : 0,
                'ads_sales' => (count($adsSales) > $i) ? number_format((float)$adsSales[$i], 2, '.', '') : 0,
            ];
        }

        $response_data = [
            'chart_data' => $chartData,
            'average_tacos' => number_format((float)($average_tacos * 100), 2, '.', ''),
            'average_acos' => number_format((float)($average_acos * 100), 2, '.', ''),
            'average_roas' => number_format((float)$average_roas, 2, '.', ''),
            'average_cpc' => number_format((float)$average_cpc, 2, '.', ''),
            'average_cr' => number_format((float)$average_cr, 2, '.', ''),
            'total_impressions' => $total_impressions,
            'total_clicks' => $total_clicks,
            'total_cost' => number_format((float)$total_cost, 2, '.', ''),
            'total_sales' => number_format((float)$total_sales, 2, '.', ''),
            'total_ads_sales' => number_format((float)$total_ads_sales, 2, '.', ''),
        ];

        return response()->json($response_data);
    }

    public function importBulk(Request $request)
    {
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            if($request->hasFile('bulk_data')){
                Excel::import(new DailySalesImport($request->caccount_id), $request->file('bulk_data'));

                return redirect()->back()->with([
                    'message' => 'Bulk Imported Successfully',
                    'alert-type' => 'success'
                ]);
            }
            else{
                return redirect()->back()->with([
                    'message' => 'No File Uploaded',
                    'alert-type' => 'error'
                ]);
            }
        }
    }
}
