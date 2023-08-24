<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Weekly Report</title>
    <style>
        html { margin: 0px; }
        body {padding-top: 140px; padding-left: 40px; padding-right: 40px;}
    </style>
</head>
<body  style="background-image: url({{ public_path('storage/uploads/report-templates/zh-template-front.jpg') }}); background-size: cover;">
    <main>
        <header>
            <h1 style="text-decoration: none; text-transform: uppercase; text-align: center;">{{ $report->client_name }}</h1>
            <h2 style="text-decoration: none; text-transform: capitalize; text-align: center;">Weekly Report</h2>
            <h3 style="text-decoration: none; text-transform: capitalize; text-align: center;">
                {{ date('M d, Y', strtotime($report->week_start_date)) }} - {{ date('M d, Y', strtotime($report->week_end_date)) }}
            </h3>
        </header>
        <div class="amz-ads-console">
            <h2 style="text-decoration: none; text-transform: capitalize; text-align: left; font-weight: 700; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size: 22px; padding-bottom: 8px; border-bottom: 2px dashed #15301c; display: inline-block;">Sales & Ads Performance [United States Of America]</h2>
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
                        <td style="border: 1px solid #a3a3a3;">{{ $report->us_last_week_total_sales_unit }}</td>
                        <td style="border: 1px solid #a3a3a3;">{{ $report->us_current_week_total_sales_unit }}</td>
                        <td style="border: 1px solid #a3a3a3;">{{ $report->us_one_year_total_sales_unit }}</td>
                    </tr>
                    <tr>
                        <td style="background: rgb(182, 224, 195); padding: 10px 0px;border: 1px solid #15301c; color: #252525;
                            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size: 14px;font-weight: 700;">Amount</td>
                        <td style="border: 1px solid #a3a3a3;">${{ $report->us_last_week_total_sales_amount }}</td>
                        <td style="border: 1px solid #a3a3a3;">${{ $report->us_current_week_total_sales_amount }}</td>
                        <td style="border: 1px solid #a3a3a3;">${{ $report->us_one_year_total_sales_amount }}</td>
                    </tr>
                </tbody>
            </table>
            
            <h2 style="text-decoration: none; text-transform: capitalize; text-align: left;">Amazon Advertising</h2>
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
                        <td style="font-size: 20px;border: 1px solid #888888; padding: 10px 0;">{{ $report->us_current_week_total_sales_unit }}</td>
                        <td style="font-size: 20px;border: 1px solid #888888; padding: 10px 0;">${{ $report->us_current_week_total_sales_amount }}</td>
                        <td style="font-size: 20px;border: 1px solid #888888; padding: 10px 0;">{{ $report->us_current_week_ads_sales_unit }}</td>
                        <td style="font-size: 20px;border: 1px solid #888888; padding: 10px 0;">${{ $report->us_current_week_ads_sales_amount }}</td>
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
                        <td style="font-size: 20px;border: 1px solid #888888; padding: 10px 0;">{{ $report->us_current_week_acos }}%</td>
                        <td style="font-size: 20px;border: 1px solid #888888; padding: 10px 0;">{{ $report->us_current_week_tacos }}%</td>
                        <td style="font-size: 20px;border: 1px solid #888888; padding: 10px 0;">${{ $report->us_current_week_ads_spend }}</td>
                        <td style="font-size: 20px;border: 1px solid #888888; padding: 10px 0;">{{ $report->us_current_week_ads_roas }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="amz-ads-console">
            <h2 style="text-decoration: none; text-transform: capitalize; text-align: left;">Sales & Ads Performance [Canada]</h2>
            <div class="amz-us-graph">GRAPH AREA</div>
            <table style="width: 100%;text-align:center; border-collapse: collapse; margin-top: 15px;">
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
                        <td style="border: 1px solid #a3a3a3;">{{ $report->us_last_week_total_sales_unit }}</td>
                        <td style="border: 1px solid #a3a3a3;">{{ $report->us_current_week_total_sales_unit }}</td>
                        <td style="border: 1px solid #a3a3a3;">{{ $report->us_one_year_total_sales_unit }}</td>
                    </tr>
                    <tr>
                        <td style="background: rgb(182, 224, 195); padding: 10px 0px;border: 1px solid #15301c; color: #252525;
                            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size: 14px;font-weight: 700;">Amount</td>
                        <td style="border: 1px solid #a3a3a3;">{{ $report->us_last_week_total_sales_amount }}</td>
                        <td style="border: 1px solid #a3a3a3;">{{ $report->us_current_week_total_sales_amount }}</td>
                        <td style="border: 1px solid #a3a3a3;">{{ $report->us_one_year_total_sales_amount }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>