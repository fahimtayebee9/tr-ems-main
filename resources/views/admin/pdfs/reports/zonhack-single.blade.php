<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ strtoupper($clientAccount->account_name) . ' Report' }}</title>
    <style>
        html { margin: 0px; }
        body {padding-top: 140px; padding-left: 40px; padding-right: 40px;}
    </style>
</head>
<body  style="background-image: url({{ public_path('storage/uploads/report-templates/zh-template-front.jpg') }}); background-size: cover;">
    <main>
        {{-- weeklyReport meetingNotesList dailyTaskList clientAccount request --}}
        @php
            $report_type = ($weeklyReport->report_type == 2) ? 'Weekly' : (($weeklyReport->report_type == 3) ? 'Monthly' : 'Bi-Weekly');
        @endphp
        <header>
            <h1 style="text-decoration: none; text-transform: uppercase; text-align: center;">{{ $clientAccount->account_name }}</h1>
            <h2 style="text-decoration: none; text-transform: capitalize; text-align: center;">{{ $report_type }} Report</h2>
            <h3 style="text-decoration: none; text-transform: capitalize; text-align: center;">
                {{ date('M d, Y', strtotime($weeklyReport->start_date)) }} - {{ date('M d, Y', strtotime($weeklyReport->end_date)) }}
            </h3>
        </header>

        @php
            $marketplace = ($clientAccount->marketplace == 1) ? 'Amazon [United States of America]' : 
            (($clientAccount->marketplace == 2) ? 'Amazon [Canada]' : 'Walmart');
        @endphp

        <div class="{{$marketplace}}-console">
            <h2 style="text-decoration: none; text-transform: capitalize; text-align: left; font-weight: 700; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size: 22px; padding-bottom: 8px; border-bottom: 2px dashed #15301c; display: inline-block;">
                Sales & Ads Performance: {{ $marketplace }}
            </h2>
            <div id="amz-us-graph"></div>
            <table style="width: 100%;text-align:center; border-collapse: collapse;">
                <thead>
                    <tr style="color:#fff; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; 
                                font-size: 18px;font-weight: 700;">
                        <td></td>
                        <td style="background: #01571a; padding: 10px 0px;border: 1px solid #15301c;">Last Week</td>
                        <td style="background: #01571a; padding: 10px 0px;border: 1px solid #15301c;">This Week</td>
                        <td style="background: #01571a; padding: 10px 0px;border: 1px solid #15301c;">One Year Ago</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="background: rgb(182, 224, 195); padding: 10px 0px;border: 1px solid #15301c; color: #252525;
                            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size: 14px;font-weight: 700;">Unit</td>
                        <td style="font-family: Arial, Helvetica, sans-serif; font-size: 20px; border: 1px solid #a3a3a3;">{{ $lastWeeklyReport->total_order_units }}</td>
                        <td style="font-family: Arial, Helvetica, sans-serif; font-size: 20px; border: 1px solid #a3a3a3;">
                            {{ $weeklyReport->total_order_units }}
                            
                            @if($weeklyReport->total_order_units > $weeklyReport->total_sales_unit_oneyearago 
                                && $weeklyReport->total_order_units > $lastWeeklyReport->total_order_units)
                                <i style="color: #00b300; font-size: 12px; font-weight: 800;" class="fa fa-arrow-up"></i>
                                <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                {{-- <span>(Up)</span> --}}
                            @elseif( $weeklyReport->total_order_units < $weeklyReport->total_sales_unit_oneyearago 
                                || $weeklyReport->total_order_units < $lastWeeklyReport->total_sales_unit_oneyearago)
                                <span style="color: #ff0000; font-size: 12px; font-weight: 600;">(Down)</span>
                            @endif
                        </td>
                        <td style="font-family: Arial, Helvetica, sans-serif; font-size: 20px; border: 1px solid #a3a3a3;">{{ $weeklyReport->total_sales_unit_oneyearago }}</td>
                    </tr>
                    <tr>
                        <td style="background: rgb(182, 224, 195); padding: 10px 0px;border: 1px solid #15301c; color: #252525;
                            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size: 14px;font-weight: 700;">Amount</td>
                        <td style="font-family: Arial, Helvetica, sans-serif; font-size: 20px;border: 1px solid #a3a3a3;">
                            ${{ $lastWeeklyReport->total_sales }}
                        </td>
                        <td style="font-family: Arial, Helvetica, sans-serif; font-size: 20px;border: 1px solid #a3a3a3;">
                            ${{ $weeklyReport->total_sales }}
                            @if($weeklyReport->total_sales > $weeklyReport->total_sales_amount_oneyearago 
                                && $weeklyReport->total_sales > $lastWeeklyReport->total_sales)
                                {{-- arrow up icon --}}
                                <i style="color: #00b300; font-size: 12px; font-weight: 800;" class="fa fa-arrow-up"></i>
                                <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                {{-- <i style="color: #00b300; font-size: 12px; font-weight: 800;" class="far fa-arrow-up"></i> --}}
                            @elseif( $weeklyReport->total_sales < $weeklyReport->total_sales_amount_oneyearago 
                                || $weeklyReport->total_sales < $lastWeeklyReport->total_sales_amount_oneyearago)
                                <span style="color: #ff0000; font-size: 12px; font-weight: 600;">(Down)</span>
                            @endif
                        </td>
                        <td style="font-family: Arial, Helvetica, sans-serif; font-size: 20px;border: 1px solid #a3a3a3;">${{ $weeklyReport->total_sales_amount_oneyearago }}</td>
                    </tr>
                </tbody>
            </table>
            
            <h2 style="text-decoration: none; text-transform: capitalize; text-align: left;">
                {{ $marketplace }} Advertising
            </h2>
            
            <table style="width: 100%;text-align:center; border-collapse: collapse;">
                <thead>
                    <tr style="color:#fff; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
                        <td style="background: #01571a; padding: 10px 0px;border: 1px solid #15301c;">
                            <p style="margin: 0; font-size: 18px;font-weight: 700;">Total Sales</p>
                            <small class="font-size: 10px!important; font-weight: 600">[UNIT]</small>
                        </td>
                        <td style="background: #01571a; padding: 10px 0px;border: 1px solid #15301c;">
                            <p style="margin: 0; font-size: 18px;font-weight: 700;">Total Sales</p>
                            <small class="font-size: 10px!important; font-weight: 600">[AMOUNT]</small>
                        </td>
                        <td style="background: #01571a; padding: 10px 0px;border: 1px solid #15301c;">
                            <p style="margin: 0; font-size: 18px;font-weight: 700;">Ads Sales</p>
                            <small class="font-size: 10px!important; font-weight: 600">[UNIT]</small>
                        </td>
                        <td style="background: #01571a; padding: 10px 0px;border: 1px solid #15301c">
                            <p style="margin: 0; font-size: 18px;font-weight: 700;">Ads Sales</p>
                            <small class="font-size: 10px!important; font-weight: 600">[AMOUNT]</small>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="font-size: 20px;border: 1px solid #888888; padding: 10px 0;">
                            {{ $weeklyReport->total_order_units }}
                        </td>
                        <td style="font-size: 20px;border: 1px solid #888888; padding: 10px 0;">
                            ${{ $weeklyReport->total_sales }}
                        </td>
                        <td style="font-size: 20px;border: 1px solid #888888; padding: 10px 0;">
                            {{ $weeklyReport->total_ads_order_units }}
                        </td>
                        <td style="font-size: 20px;border: 1px solid #888888; padding: 10px 0;">
                            ${{ $weeklyReport->total_ads_sales }}
                        </td>
                    </tr>
                </tbody>
            </table>

            <table style="width: 100%;text-align:center; border-collapse: collapse; margin-top: 15px;">
                <thead>
                    <tr  style="color:#fff; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
                        <td style="background: #01571a; padding: 10px 0px;border: 1px solid #15301c">
                            <p style="margin: 0; font-size: 18px;font-weight: 700;">ACOS</p>
                        </td>
                        <td style="background: #01571a; padding: 10px 0px;border: 1px solid #15301c">
                            <p style="margin: 0; font-size: 18px;font-weight: 700;">TACOS</p>
                        </td>
                        <td style="background: #01571a; padding: 10px 0px;border: 1px solid #15301c">
                            <p style="margin: 0; font-size: 18px;font-weight: 700;">SPEND</p>
                        </td>
                        <td style="background: #01571a; padding: 10px 0px;border: 1px solid #15301c">
                            <p style="margin: 0; font-size: 18px;font-weight: 700;">ROAS</p>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="font-size: 20px;border: 1px solid #888888; padding: 10px 0;">
                            {{ $weeklyReport->average_acos }}%</td>
                        <td style="font-size: 20px;border: 1px solid #888888; padding: 10px 0;">
                            {{ $weeklyReport->average_tacos }}%</td>
                        <td style="font-size: 20px;border: 1px solid #888888; padding: 10px 0;">
                            ${{ $weeklyReport->total_cost }}</td>
                        <td style="font-size: 20px;border: 1px solid #888888; padding: 10px 0;">
                            {{ $weeklyReport->average_roas }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div style="page-break-after: always!important;"></div>

        {{-- <h1>HELOOOOOOOOOOO</h1> --}}
        <div class="{{$marketplace}}-console">
            @if($dailyTaskList != null && count($dailyTaskList) > 0)
                @php
                    $graphicTasks = $dailyTaskList->where('category', 3);
                    $amazonTasks = $dailyTaskList->where('category', 1);
                    $walmartTasks = $dailyTaskList->where('category', 2);
                @endphp
                @for ($i = 1; $i <= 3; $i++)
                    @php
                        $tasks = ($i == 3) ? $graphicTasks : (($i == 1) ? $amazonTasks : $walmartTasks);
                        // $tasks = $tasks->->get();
                    @endphp
                    <h2 style="text-decoration: none; text-transform: capitalize; text-align: left; margin-top: 25px;">
                        @if($i == 3 && count($graphicTasks) > 0)
                            Graphic Tasks
                        @elseif($i == 1 && count($amazonTasks) > 0)
                            Amazon & Merchandising Tasks
                        @elseif($i == 2 && count($walmartTasks) > 0)
                            Walmart Tasks
                        @endif
                    </h2>
                    
                    @if(count($tasks) > 0)
                    <table style="width: 100%;text-align:center; border-collapse: collapse;">
                        <thead>
                            <tr style="color:#fff; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
                                <td style="background: #01571a; padding: 10px 0px;border: 1px solid #15301c; width: 50px;">
                                    <p style="margin: 0; font-size: 18px;font-weight: 700;">#</p>
                                </td>
                                <td style="background: #01571a; padding: 10px 0px;border: 1px solid #15301c;">
                                    <p style="margin: 0; font-size: 18px;font-weight: 700;">Task Note</p>
                                </td>
                                <td style="background: #01571a; padding: 10px 0px;border: 1px solid #15301c; width: 140px;">
                                    <p style="margin: 0; font-size: 18px;font-weight: 700;">Comment</p>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($tasks as $task)
                            <tr>
                                <td style="font-family:Arial, Helvetica, sans-serif; font-size: 16px;border: 1px solid #888888; padding: 10px 0;">
                                    {{ $loop->iteration }}
                                </td>
                                <td style="font-family:Arial, Helvetica, sans-serif; font-size: 16px;border: 1px solid #888888; padding: 10px 0;">
                                    {{ $task->task_description }}
                                </td>
                                <td style="font-family:Arial, Helvetica, sans-serif; font-size: 16px;border: 1px solid #888888; padding: 10px 0;">
                                    {{ ($task->task_status == 1) ? 'Completed' : ($task->task_status == 2 ? 'In Progress' : 'Pending') }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                @endfor
            @endif
        </div>
    </main>
</body> 
</html>