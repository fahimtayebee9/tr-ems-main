<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Weekly Report</title>
    <style>
        html { margin: 0px; }
        body {padding-top: 0px; padding-left: 20px; padding-right: 20px;}
    </style>
</head>
<body>
    <main>
        <div>
            <h2 style="text-decoration: none; text-transform: capitalize; text-align: center; margin-bottom: 6px;">Weekly Report</h2>
            <h3 style="text-decoration: none; text-transform: capitalize; text-align: center; margin: 0;">
                {{ date('M d, Y', strtotime($report->week_start_date)) }} - {{ date('M d, Y', strtotime($report->week_end_date)) }}
            </h3>
        </div>
        <div class="amz-ads-console" style="margin-top: 20px;">
            @foreach($otherAccountDetails as $childReport)
                <div style="margin-top: 50px;">
                    <h2 style="text-decoration: none; text-transform: capitalize; text-align: left; font-weight: 700; 
                            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size: 22px; 
                            padding-bottom: 8px; display: block; margin: 0;">
                        {{$childReport->client_name}}
                    </h2>
                    <span style="border-bottom: 2px dashed #011731; width: 50%; display: block;"></span>
                </div>
                
                <table style="width: 100%;text-align:center; border-collapse: collapse; margin-top: 15px;">
                    <thead>
                        <tr style="color:#fff; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
                            <td width="80px"></td>
                            <td style="background: #00235B; padding: 10px 0px;border: 1px solid #011731;">
                                <p style="margin: 0; font-size: 18px;font-weight: 700;">Total Sales</p>
                                <small class="font-size: 10px!important; font-weight: 600">[UNIT]</small>
                            </td>
                            <td style="background: #00235B; padding: 10px 0px;border: 1px solid #011731;">
                                <p style="margin: 0; font-size: 18px;font-weight: 700;">Total Sales</p>
                                <small class="font-size: 10px!important; font-weight: 600">[AMOUNT]</small>
                            </td>
                            <td style="background: #00235B; padding: 10px 0px;border: 1px solid #011731;">
                                <p style="margin: 0; font-size: 18px;font-weight: 700;">Ads Sales</p>
                                <small class="font-size: 10px!important; font-weight: 600">[UNIT]</small>
                            </td>
                            <td style="background: #00235B; padding: 10px 0px;border: 1px solid #011731">
                                <p style="margin: 0; font-size: 18px;font-weight: 700;">Ads Sales</p>
                                <small class="font-size: 10px!important; font-weight: 600">[AMOUNT]</small>
                            </td>
                            <td style="background: #00235B; padding: 10px 0px;border: 1px solid #011731">
                                <p style="margin: 0; font-size: 18px;font-weight: 700;">ACOS</p>
                            </td>
                            <td style="background: #00235B; padding: 10px 0px;border: 1px solid #011731">
                                <p style="margin: 0; font-size: 18px;font-weight: 700;">Spend</p>
                            </td>
                            <td style="background: #00235B; padding: 10px 0px;border: 1px solid #011731">
                                <p style="margin: 0; font-size: 18px;font-weight: 700;">TACOS</p>
                            </td>
                            <td style="background: #00235B; padding: 10px 0px;border: 1px solid #011731">
                                <p style="margin: 0; font-size: 18px;font-weight: 700;">ROAS</p>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="font-size: 14px; background: #d0e0fa; color: #011731; border: 1px solid #00235B;">LAST WEEK</td>
                            @php
                                $ch_weeklySales = App\Models\WeeklySale::where('client_weekly_report_id', $childReport->id)->first();
                                // dd($ch_weeklySales);
                            @endphp
                            <td style="font-size: 18px;border: 1px solid #888888; padding: 10px 0;">
                                {{ $ch_weeklySales->current_week_total_sales_unit }}
                            </td>
                            <td style="font-size: 18px;border: 1px solid #888888; padding: 10px 0;">
                                ${{ $ch_weeklySales->current_week_total_sales_amount }}
                            </td>
                            <td style="font-size: 18px;border: 1px solid #888888; padding: 10px 0;">
                                {{ $ch_weeklySales->current_week_ads_sales_unit }}
                            </td>
                            <td style="font-size: 18px;border: 1px solid #888888; padding: 10px 0;">
                                ${{ $ch_weeklySales->current_week_ads_sales_amount }}
                            </td>
                            <td style="font-size: 18px;border: 1px solid #888888; padding: 10px 0;">
                                {{ $ch_weeklySales->current_week_acos }}%
                            </td>
                            <td style="font-size: 18px;border: 1px solid #888888; padding: 10px 0;">
                                {{ $ch_weeklySales->current_week_ads_spend }}%
                            </td>
                            <td style="font-size: 18px;border: 1px solid #888888; padding: 10px 0;">
                                {{ $ch_weeklySales->current_week_tacos }}%
                            </td>
                            <td style="font-size: 18px;border: 1px solid #888888; padding: 10px 0;">
                                {{ $ch_weeklySales->current_week_roas }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 140px; font-size: 14px; background: #d0e0fa; color: #011731; border: 1px solid #00235B;">CURRENT WEEK</td>
                            @php
                                $ch_weeklySales = App\Models\WeeklySale::where('client_weekly_report_id', $childReport->id)->first();
                                // dd($ch_weeklySales);
                            @endphp
                            <td style="font-size: 18px;border: 1px solid #888888; padding: 10px 0;">
                                {{ $ch_weeklySales->current_week_total_sales_unit }}
                            </td>
                            <td style="font-size: 18px;border: 1px solid #888888; padding: 10px 0;">
                                ${{ $ch_weeklySales->current_week_total_sales_amount }}
                            </td>
                            <td style="font-size: 18px;border: 1px solid #888888; padding: 10px 0;">
                                {{ $ch_weeklySales->current_week_ads_sales_unit }}
                            </td>
                            <td style="font-size: 18px;border: 1px solid #888888; padding: 10px 0;">
                                ${{ $ch_weeklySales->current_week_ads_sales_amount }}
                            </td>
                            <td style="font-size: 18px;border: 1px solid #888888; padding: 10px 0;">
                                {{ $ch_weeklySales->current_week_acos }}%
                            </td>
                            <td style="font-size: 18px;border: 1px solid #888888; padding: 10px 0;">
                                {{ $ch_weeklySales->current_week_ads_spend }}%
                            </td>
                            <td style="font-size: 18px;border: 1px solid #888888; padding: 10px 0;">
                                {{ $ch_weeklySales->current_week_tacos }}%
                            </td>
                            <td style="font-size: 18px;border: 1px solid #888888; padding: 10px 0;">
                                {{ $ch_weeklySales->current_week_roas }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            @endforeach
        </div>
    </main>
</body>
</html>