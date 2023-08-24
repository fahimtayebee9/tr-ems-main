<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NuDawn Ecommerce - Single Account Template</title>

    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('storage/assets/vendor/bootstrap/css/bootstrap.min.css') }}"> 
    <link rel="stylesheet" href="{{ asset('storage/assets/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('storage/assets/css/simple-line-icons.min.css') }}"> -->

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('storage/assets/vendor/chartist/css/chartist.min.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/assets/vendor/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/assets/vendor/dropify/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
    <link href="{{ asset('storage/employee/assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    {{-- <link href="{{ asset('storage/employee/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('storage/employee/assets/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('storage/assets/vendor/morrisjs/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/assets/vendor/charts-c3/plugin.css') }}">

    <!-- MAIN Project CSS file -->
    <link rel="stylesheet" href="{{ asset('storage/assets/css/main.css') }}">

    <!-- MAIN Project CSS file -->
    <link rel="stylesheet" href="{{ asset('storage/assets/css/custom.css') }}">

    <!-- VENDOR JS -->
    <script src="{{ asset('storage/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}"></script>


    <!-- Javascript -->
    <script src="{{ asset('storage/assets/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ asset('storage/assets/bundles/vendorscripts.bundle.js') }}"></script>

    <!-- page js file -->
    <!-- <script src="{{ asset('storage/assets/vendor/sweetalert/sweetalert.min.js') }}"></script> -->
    <script src="{{ asset('storage/assets/bundles/sweetalert2@11.js') }}"></script>
    <script src="{{ asset('storage/assets/bundles/mainscripts.bundle.js') }}"></script>
    <script src="{{ asset('storage/assets/js/hr/index.js') }}"></script>
    <script src="{{ asset('storage/employee/assets/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('storage/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('storage/employee/assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('storage/assets/bundles/datatablescripts.bundle.js') }}"></script>
    <script src="{{ asset('storage/assets/vendor/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('storage/default/peity_chart.js') }}"></script>
    <script src="{{ asset('storage/assets/bundles/c3.bundle.js')}}"></script>
    <script src="{{ asset('storage/assets/bundles/morrisscripts.bundle.js') }}"></script>
    <script src="{{ asset('storage/assets/bundles/apexcharts.bundle.js') }}"></script>
    <script src="{{ asset('storage/assets/bundles/mainscripts.bundle.js') }}"></script>
    <!-- Page js file -->
    <script src="{{ asset('storage/assets/bundles/dashboard.js') }}"></script>
    <script src="{{ asset('storage/assets/bundles/custom.js') }}"></script>
    <script src="{{ asset('storage/assets/customJs/dailySales.js') }}"></script>
    <script src="{{ asset('storage/assets/customJs/invoicePage.js') }}"></script>
    <script src="{{ asset('storage/assets/customJs/reportController.js') }}"></script>

</head>
<body>
    <main>
        <header style="font-family: Arial, Helvetica, sans-serif; text-align: center;">
            <h1 style="margin-bottom: 20px;">NuDawn Ecommerce</h1>
            {{-- <h2 style="margin: 0;">
                {{ $clientAccount->account_name }}
            </h2> --}}
        </header>

        <div id="morris-chart-holder" style="padding: 35px;">
            <div id="chart-nudawn-signle" style="height: 25rem; max-height: 25rem; position: relative;" class="morris"></div>
        </div>

        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="border: 1px solid #6096ba; color: #fff;font-family: Arial, Helvetica, sans-serif;font-size: 18px;
                    font-weight: 700; background-color: rgb(82, 8, 201); padding: 15px; text-align: center;" colspan="6">
                    {{ $clientAccount->account_name }}    
                </td>
                <td style="border: 1px solid #6096ba; color: #fff;font-family: Arial, Helvetica, sans-serif;font-size: 18px;
                    font-weight: 700; background-color: rgb(78, 28, 158); padding: 15px; text-align: center;" colspan="2">
                    {{ $weeklyReport->start_date }}   
                </td>
                <td style="border: 1px solid #6096ba; color: #fff;font-family: Arial, Helvetica, sans-serif;font-size: 18px;
                    font-weight: 700; background-color: rgb(78, 28, 158); padding: 15px; text-align: center;" colspan="2">
                    {{ $weeklyReport->end_date }}     
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid #6096ba; background-color: #e0e1dd; padding: 15px; font-size: 18px; font-family: Arial, Helvetica, sans-serif; text-align: center; font-weight: 600;">Comparison</td>
                <td style="border: 1px solid #6096ba; background-color: #b8b8ff; padding: 15px; font-size: 18px; font-family: Arial, Helvetica, sans-serif; text-align: center; font-weight: 600;">
                    Total Sales
                    <br>
                    <span style="font-size: 16px; font-weight: 500;">(Amount)</span>
                </td>
                <td style="border: 1px solid #6096ba; background-color: #b8b8ff; padding: 15px; font-size: 18px; font-family: Arial, Helvetica, sans-serif; text-align: center; font-weight: 600;">
                    Total Orders
                    <br>
                    <span style="font-size: 16px; font-weight: 500;">(Quantity)</span>
                </td>
                <td style="border: 1px solid #6096ba; background-color: #cbc0d3; padding: 15px; font-size: 18px; font-family: Arial, Helvetica, sans-serif; text-align: center; font-weight: 600;">
                    Ads Sales
                    <br>
                    <span style="font-size: 16px; font-weight: 500;">(Amount)</span>
                </td>
                <td style="border: 1px solid #6096ba; background-color: #cbc0d3; padding: 15px; font-size: 18px; font-family: Arial, Helvetica, sans-serif; text-align: center; font-weight: 600;">
                    Ads Orders
                    <br>
                    <span style="font-size: 16px; font-weight: 500;">(Quantity)</span>
                </td>
                <td style="border: 1px solid #6096ba; background-color: #cbc0d3; padding: 15px; font-size: 18px; font-family: Arial, Helvetica, sans-serif; text-align: center; font-weight: 600;">
                    Ads Spend
                </td>
                <td style="border: 1px solid #6096ba; background-color: #abc4ff; padding: 15px; font-size: 18px; font-family: Arial, Helvetica, sans-serif; text-align: center; font-weight: 600;">
                    ACOS
                </td>
                
                <td style="border: 1px solid #6096ba; background-color: #abc4ff; padding: 15px; font-size: 18px; font-family: Arial, Helvetica, sans-serif; text-align: center; font-weight: 600;">
                    ROAS
                </td>
                <td style="border: 1px solid #6096ba; background-color: #abc4ff; padding: 15px; font-size: 18px; font-family: Arial, Helvetica, sans-serif; text-align: center; font-weight: 600;">
                    TACOS
                </td>
                <td style="border: 1px solid #6096ba; background-color: #cce3de; padding: 15px; font-size: 18px; font-family: Arial, Helvetica, sans-serif; text-align: center; font-weight: 600;">
                    Comments
                </td>
            </tr>
            <tr>
                <td style="background-color: #b6ccfe; border: 1px solid #6096ba;padding: 10px 0; font-family: Arial, Helvetica, sans-serif; font-size: 18px;text-align: center; font-weight: 600; ">
                    Last Week
                </td>
                <td style="border: 1px solid #6096ba;padding: 10px 0; font-family: Arial, Helvetica, sans-serif; font-size: 18px;text-align: center; font-weight: 600; ">
                    {{ $last_week_report->total_sales }}    
                </td>
                <td style="border: 1px solid #6096ba;padding: 10px 0; font-family: Arial, Helvetica, sans-serif; font-size: 18px;text-align: center; font-weight: 600; ">
                    {{ $last_week_report->total_order_units }}    
                </td>
                <td style="border: 1px solid #6096ba;padding: 10px 0; font-family: Arial, Helvetica, sans-serif; font-size: 18px;text-align: center; font-weight: 600; ">
                    {{ $last_week_report->total_ads_sales }}    
                </td>
                <td style="border: 1px solid #6096ba;padding: 10px 0; font-family: Arial, Helvetica, sans-serif; font-size: 18px;text-align: center; font-weight: 600; ">
                    {{ $last_week_report->total_ads_order_units }}
                </td>
                <td style="border: 1px solid #6096ba;padding: 10px 0; font-family: Arial, Helvetica, sans-serif; font-size: 18px;text-align: center; font-weight: 600; ">
                    ${{ $last_week_report->total_cost }}
                </td>
                <td style="border: 1px solid #6096ba;padding: 10px 0; font-family: Arial, Helvetica, sans-serif; font-size: 18px;text-align: center; font-weight: 600; ">
                    {{ $last_week_report->average_acos }}%
                </td>
                <td style="border: 1px solid #6096ba;padding: 10px 0; font-family: Arial, Helvetica, sans-serif; font-size: 18px;text-align: center; font-weight: 600; ">
                    {{ $last_week_report->average_roas }}%
                </td>
                <td style="border: 1px solid #6096ba;padding: 10px 0; font-family: Arial, Helvetica, sans-serif; font-size: 18px;text-align: center; font-weight: 600; ">
                    {{ $last_week_report->average_tacos }}%
                </td>
                <td style="border: 1px solid #6096ba;padding: 10px 0; font-family: Arial, Helvetica, sans-serif; font-size: 18px;text-align: center; font-weight: 600; ">
                    {{-- {{ $last_week_report->comments }} --}}
                </td>
            </tr>
            <tr>
                <td style="background-color: #b6ccfe; border: 1px solid #6096ba;padding: 10px 0; font-family: Arial, Helvetica, sans-serif; font-size: 18px;text-align: center; font-weight: 600; ">
                    This Week
                </td>
                <td style="border: 1px solid #6096ba;padding: 10px 0; font-family: Arial, Helvetica, sans-serif; font-size: 18px;text-align: center; font-weight: 600; ">
                    {{ number_format($weeklyReport->total_sales, 2, '.') }}
                    {{-- compare last_week_report and weeklyReport total_sales attribute and show arrow icon --}}
                    @if ($weeklyReport->total_sales > $last_week_report->total_sales)
                        <br>
                        <span style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #00e070;">[INCREASED]</span>
                    @elseif ($weeklyReport->total_sales < $last_week_report->total_sales)
                        <br>
                        <span style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #ff0000;">[DECREASED]</span>
                    @else
                        <img src="https://img.icons8.com/ios/50/000000/long-arrow-right.png" style="color: #0995f3; width: 20px; height: 15px;"/>
                    @endif
                </td>
                <td style="border: 1px solid #6096ba;padding: 10px 0; font-family: Arial, Helvetica, sans-serif; font-size: 18px;text-align: center; font-weight: 600; ">
                    {{ $weeklyReport->total_order_units }}
                </td>
                </td>
                <td style="border: 1px solid #6096ba;padding: 10px 0; font-family: Arial, Helvetica, sans-serif; font-size: 18px;text-align: center; font-weight: 600; ">
                    {{ $weeklyReport->total_ads_sales }}
                    @if ($weeklyReport->total_ads_sales > $last_week_report->total_ads_sales)
                        <br>
                        <span style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #00e070;">[INCREASED]</span>
                    @elseif ($weeklyReport->total_ads_sales < $last_week_report->total_ads_sales)
                        <br>
                        <span style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #ff0000;">[DECREASED]</span>
                    @else
                        <img src="https://img.icons8.com/ios/50/000000/long-arrow-right.png" style="color: #0995f3; width: 20px; height: 15px;"/>
                    @endif
                </td>
                <td style="border: 1px solid #6096ba;padding: 10px 0; font-family: Arial, Helvetica, sans-serif; font-size: 18px;text-align: center; font-weight: 600; ">
                    {{ $weeklyReport->total_ads_order_units }}    
                </td>
                <td style="border: 1px solid #6096ba;padding: 10px 0; font-family: Arial, Helvetica, sans-serif; font-size: 18px;text-align: center; font-weight: 600; ">
                    ${{ $weeklyReport->total_cost }}
                </td>
                <td style="border: 1px solid #6096ba;padding: 10px 0; font-family: Arial, Helvetica, sans-serif; font-size: 18px;text-align: center; font-weight: 600; ">
                    {{ $weeklyReport->average_acos }}    
                </td>
                <td style="border: 1px solid #6096ba;padding: 10px 0; font-family: Arial, Helvetica, sans-serif; font-size: 18px;text-align: center; font-weight: 600; ">
                    {{ $weeklyReport->average_roas }}
                </td>
                <td style="border: 1px solid #6096ba;padding: 10px 0; font-family: Arial, Helvetica, sans-serif; font-size: 18px;text-align: center; font-weight: 600; ">
                    {{ $weeklyReport->average_tacos }}%
                </td>
                <td style="border: 1px solid #6096ba;padding: 10px 0; font-family: Arial, Helvetica, sans-serif; font-size: 18px;text-align: center; font-weight: 600; ">
                    -
                </td>
            </tr>
        </table>
    </main>
</body>
</html>