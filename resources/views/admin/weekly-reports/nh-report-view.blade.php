@extends('admin.layouts.app')

@section('body')
    <div class='card mt-4'>
        <div class='body'>
            <header style='font-family: Arial, Helvetica, sans-serif; text-align: center;'>
                <h1 style='margin-bottom: 20px;'>NuDawn Ecommerce</h1>
            </header>

            @php
                $svg = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 36 36" class="circular-chart">
                            <path class="circle-bg"
                                stroke-width="1"
                                fill="none"
                                stroke="#ddd"
                                d="M18 2.0845
                                    a 15.9155 15.9155 0 0 1 0 31.831
                                    a 15.9155 15.9155 0 0 1 0 -31.831"
                                />
                        </svg>';

                $html = '<img src="data:image/svg+xml;base64,'.base64_encode($svg).'"  width="100" height="100" />';
            @endphp 

            @for ($i = 0; $i < count($weeklyReportist); $i++)
                <main id='main-table-container' class='account-comparision'>                    
                    <div class='chart-html'>
                        {{-- {!! $html !!} --}}
                        <div id='morris-chart-holder-{{$i}}' style='padding: 0px;' >
                            <div id='chart-nudawn-{{ $weeklyReportist[$i]['week_4']->clientAccount->id }}' 
                                style='height: 18rem; max-height: 18rem; position: relative;' 
                                class='morris morris-chart-loader' data-chartLoader='<?php echo json_encode($chartDataByAccountList[$i]); ?>'>
                            </div>
                        </div>
                    </div>

                    <div class='table_container'>
                        <table style='width: 100%; border-collapse: collapse; margin-bottom: 50px;'>
                            <tr>
                                <td style='border: 1px solid #351c75; color: #fff;font-family: Arial, Helvetica, sans-serif;font-size: 18px;
                                    font-weight: 700; background-color: #351c75; padding: 15px; text-align: center;'
                                    colspan='6'>
                                    {{ $weeklyReportist[$i]['week_4']->clientAccount->account_name }}
                                </td>
                                <td style='border: 1px solid #351c75; color: #fff;font-family: Arial, Helvetica, sans-serif;font-size: 18px;
                                    font-weight: 700; background-color: #674ea7; padding: 15px; text-align: center;'
                                    colspan='2'>
                                    {{ date('d M, Y', strtotime($weeklyReportist[$i]['week_4']->start_date)) }}
                                </td>
                                <td style='border: 1px solid #351c75; color: #fff;font-family: Arial, Helvetica, sans-serif;font-size: 18px;
                                    font-weight: 700; background-color: #674ea7; padding: 15px; text-align: center;'
                                    colspan='2'>
                                    {{ date('d M, Y', strtotime($weeklyReportist[$i]['week_4']->end_date)) }}
                                </td>
                            </tr>

                            <tr>
                                <td
                                    style='border: 1px solid #351c75; background-color: #351c75; padding: 15px; font-size: 18px; 
                                    font-family: Arial, Helvetica, sans-serif; text-align: center; font-weight: 600; color: #fff;'>
                                    Comparison</td>
                                <td
                                    style='border: 1px solid #351c75; background-color: #f3ab62; color: #fff; padding: 15px; font-size: 18px; font-family: Arial, Helvetica, sans-serif; text-align: center; font-weight: 600;'>
                                    Total Sales
                                    <br>
                                    <span style='font-size: 16px; font-weight: 500;'>(Amount)</span>
                                </td>
                                <td
                                    style='border: 1px solid #351c75; background-color: #f3ab62; color: #fff; padding: 15px; font-size: 18px; font-family: Arial, Helvetica, sans-serif; text-align: center; font-weight: 600;'>
                                    Total Orders
                                    <br>
                                    <span style='font-size: 16px; font-weight: 500;'>(Quantity)</span>
                                </td>
                                <td
                                    style='border: 1px solid #351c75; background-color: #3474b1; color: #fff; padding: 15px; font-size: 18px; font-family: Arial, Helvetica, sans-serif; text-align: center; font-weight: 600;'>
                                    Ads Sales
                                    <br>
                                    <span style='font-size: 16px; font-weight: 500;'>(Amount)</span>
                                </td>
                                <td
                                    style='border: 1px solid #351c75; background-color: #3474b1; color: #fff; padding: 15px; font-size: 18px; font-family: Arial, Helvetica, sans-serif; text-align: center; font-weight: 600;'>
                                    Ads Orders
                                    <br>
                                    <span style='font-size: 16px; font-weight: 500;'>(Quantity)</span>
                                </td>
                                <td
                                    style='border: 1px solid #351c75; background-color: #3474b1; color: #fff; padding: 15px; font-size: 18px; font-family: Arial, Helvetica, sans-serif; text-align: center; font-weight: 600;'>
                                    Ads Spend
                                </td>
                                <td
                                    style='border: 1px solid #351c75; background-color: #7fec71; padding: 15px; font-size: 18px; font-family: Arial, Helvetica, sans-serif; text-align: center; font-weight: 600;'>
                                    ACOS
                                </td>

                                <td
                                    style='border: 1px solid #351c75; background-color: #7fec71; padding: 15px; font-size: 18px; font-family: Arial, Helvetica, sans-serif; text-align: center; font-weight: 600;'>
                                    ROAS
                                </td>
                                <td
                                    style='border: 1px solid #351c75; background-color: #7fec71; padding: 15px; font-size: 18px; font-family: Arial, Helvetica, sans-serif; text-align: center; font-weight: 600;'>
                                    TACOS
                                </td>
                                <td
                                    style='border: 1px solid #351c75; background-color: #cce3de; padding: 15px; font-size: 18px; font-family: Arial, Helvetica, sans-serif; text-align: center; font-weight: 600;'>
                                    Note
                                </td>
                            </tr>

                            <tr>
                                <td
                                    style='background-color: #134f5c; color: #fff; border: 1px solid #351c75;padding: 10px 0; font-family: Arial, Helvetica, sans-serif; font-size: 18px;text-align: center; font-weight: 600; '>
                                    Last Week
                                </td>
                                <td
                                    style='border: 1px solid #351c75;padding: 10px 0; font-family: Arial, Helvetica, sans-serif; font-size: 18px;text-align: center; font-weight: 600; '>
                                    {{ $weeklyReportist[$i]['week_3']->total_sales }}
                                </td>
                                <td
                                    style='border: 1px solid #351c75;padding: 10px 0; font-family: Arial, Helvetica, sans-serif; font-size: 18px;text-align: center; font-weight: 600; '>
                                    {{ $weeklyReportist[$i]['week_3']->total_order_units }}
                                </td>
                                <td
                                    style='border: 1px solid #351c75;padding: 10px 0; font-family: Arial, Helvetica, sans-serif; font-size: 18px;text-align: center; font-weight: 600; '>
                                    {{ $weeklyReportist[$i]['week_3']->total_ads_sales }}
                                </td>
                                <td
                                    style='border: 1px solid #351c75;padding: 10px 0; font-family: Arial, Helvetica, sans-serif; font-size: 18px;text-align: center; font-weight: 600; '>
                                    {{ $weeklyReportist[$i]['week_3']->total_ads_order_units }}
                                </td>
                                <td
                                    style='border: 1px solid #351c75;padding: 10px 0; font-family: Arial, Helvetica, sans-serif; font-size: 18px;text-align: center; font-weight: 600; '>
                                    ${{ $weeklyReportist[$i]['week_3']->total_cost }}
                                </td>
                                <td
                                    style='border: 1px solid #351c75;padding: 10px 0; font-family: Arial, Helvetica, sans-serif; font-size: 18px;text-align: center; font-weight: 600; '>
                                    {{ $weeklyReportist[$i]['week_3']->average_acos }}%
                                </td>
                                <td
                                    style='border: 1px solid #351c75;padding: 10px 0; font-family: Arial, Helvetica, sans-serif; font-size: 18px;text-align: center; font-weight: 600; '>
                                    {{ $weeklyReportist[$i]['week_3']->average_roas }}%
                                </td>
                                <td
                                    style='border: 1px solid #351c75;padding: 10px 0; font-family: Arial, Helvetica, sans-serif; font-size: 18px;text-align: center; font-weight: 600; '>
                                    {{ $weeklyReportist[$i]['week_3']->average_tacos }}%
                                </td>
                                @php
                                    // calculate sales incresed or decrease percentage
                                    $salesPercentage = 0;
                                    $type = $weeklyReportist[$i]['week_4']->total_sales > $weeklyReportist[$i]['week_3']->total_sales ? 'Increased' : 'Dropped';
                                    $bg_color = $weeklyReportist[$i]['week_4']->total_sales > $weeklyReportist[$i]['week_3']->total_sales ? '#7fec71' : '#f7aebc';
                                    $color = $weeklyReportist[$i]['week_4']->total_sales > $weeklyReportist[$i]['week_3']->total_sales ? '#fff' : '#000';
                                    if ($weeklyReportist[$i]['week_4']->total_sales > $weeklyReportist[$i]['week_3']->total_sales) {
                                        $salesPercentage = (($weeklyReportist[$i]['week_4']->total_sales - $weeklyReportist[$i]['week_3']->total_sales) / $weeklyReportist[$i]['week_3']->total_sales) * 100;
                                    } else {
                                        $salesPercentage = (($weeklyReportist[$i]['week_3']->total_sales - $weeklyReportist[$i]['week_4']->total_sales) / $weeklyReportist[$i]['week_3']->total_sales) * 100;
                                    }
                                @endphp
                                <td rowspan='2'
                                    style='color:{{ $color }};background: {{ $bg_color }};border: 1px solid #351c75;padding: 10px 0; font-family: Arial, Helvetica, sans-serif; font-size: 18px;text-align: center; font-weight: 600; '>
                                    <p style='margin: 0;'>
                                        {{ number_format($salesPercentage, 2, '.') . '% Sales' }}
                                    </p>
                                    <p style='margin: 0;'>
                                        {{ $type }}
                                    </p>
                                </td>
                            </tr>

                            <tr>
                                <td
                                    style='background-color: #6aa84f; color: #fff; border: 1px solid #351c75;padding: 10px 0; font-family: Arial, Helvetica, sans-serif; font-size: 18px;text-align: center; font-weight: 600; '>
                                    This Week
                                </td>
                                <td
                                    style='border: 1px solid #351c75;padding: 10px 0; font-family: Arial, Helvetica, sans-serif; font-size: 18px;text-align: center; font-weight: 600; '>
                                    {{ number_format($weeklyReportist[$i]['week_4']->total_sales, 2, '.') }}
                                </td>
                                <td
                                    style='border: 1px solid #351c75;padding: 10px 0; font-family: Arial, Helvetica, sans-serif; font-size: 18px;text-align: center; font-weight: 600; '>
                                    {{ $weeklyReportist[$i]['week_4']->total_order_units }}
                                </td>
                                </td>
                                <td
                                    style='border: 1px solid #351c75;padding: 10px 0; font-family: Arial, Helvetica, sans-serif; font-size: 18px;text-align: center; font-weight: 600; '>
                                    {{ $weeklyReportist[$i]['week_4']->total_ads_sales }}
                                </td>
                                <td
                                    style='border: 1px solid #351c75;padding: 10px 0; font-family: Arial, Helvetica, sans-serif; font-size: 18px;text-align: center; font-weight: 600; '>
                                    {{ $weeklyReportist[$i]['week_4']->total_ads_order_units }}
                                </td>
                                <td
                                    style='border: 1px solid #351c75;padding: 10px 0; font-family: Arial, Helvetica, sans-serif; font-size: 18px;text-align: center; font-weight: 600; '>
                                    ${{ $weeklyReportist[$i]['week_4']->total_cost }}
                                </td>
                                <td
                                    style='border: 1px solid #351c75;padding: 10px 0; font-family: Arial, Helvetica, sans-serif; font-size: 18px;text-align: center; font-weight: 600; '>
                                    {{ $weeklyReportist[$i]['week_4']->average_acos }}
                                </td>
                                <td
                                    style='border: 1px solid #351c75;padding: 10px 0; font-family: Arial, Helvetica, sans-serif; font-size: 18px;text-align: center; font-weight: 600; '>
                                    {{ $weeklyReportist[$i]['week_4']->average_roas }}
                                </td>
                                <td
                                    style='border: 1px solid #351c75;padding: 10px 0; font-family: Arial, Helvetica, sans-serif; font-size: 18px;text-align: center; font-weight: 600; '>
                                    {{ $weeklyReportist[$i]['week_4']->average_tacos }}%
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                    @php
                        $notesCount = count($meetingNotesList[$i]);
                        // dd($notesCount, $inc_meeting_notes);
                    @endphp

                    @if ($inc_meeting_notes == 1 && $notesCount > 0)
                        <div class='meeting_notes_container'>
                            <h1 style="font-size: 24px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-weight: 600;">
                                Meeting Notes
                            </h1>
                            <ul style="list-style: none; counter-reset: list; padding: 0;--length: {{$notesCount}}" role="list">
                                @for($j = 0; $j < $notesCount; $j++)
                                    @php
                                        // dd($check_icon);
                                    @endphp
                                    <li style="--stop: calc(100% / var(--length) * var(--i));
                                            --l: 62%;
                                            --l2: 88%;
                                            --h: calc((var(--i) - 1) * (180 / var(--length)));
                                            --c1: #6B728E;
                                            --c2: #B2B2B2;
                                            
                                            position: relative;
                                            counter-increment: list;
                                            max-width: 100%;
                                            margin: 0;
                                            margin-bottom: 15px;
                                            padding: 10px;
                                            box-shadow: 0 0 2px rgba(0, 0, 0, 0.3);
                                            border-radius: 0.25rem;
                                            overflow: hidden;
                                            background-color: white;">
                                        <div style="align-items: center; justify-content: flex-start; ">
                                            <h3 style="font-size: 18px; display: inline; margin-bottom: 15px; align-items: baseline; margin: 0 0 1rem; color: rgb(70 70 70);">
                                                {{ __('NOTE TITLE') }}
                                                @if ($meetingNotesList[$i][$j]->priority == 3)
                                                    <span style="padding: 6px 12px; border-radius: 4px;font-weight: 600; background: #e0ffe1; color: #298103; font-size: 12px;">HIGH</span>
                                                @elseif ($meetingNotesList[$i][$j]->priority == 2)
                                                    <span style="padding: 6px 12px; border-radius: 4px;font-weight: 600; background: #f9e9c1; color: #eba606; font-size: 12px;">MEDIUM</span>
                                                @elseif ($meetingNotesList[$i][$j]->priority == 1)
                                                    <span style="padding: 6px 12px; border-radius: 4px;font-weight: 600; background: #f9c1c1; color: #740606; font-size: 12px;">LOW</span>
                                                @endif
                                            </h3>
                                            <p style="margin: 0; font-size: 18px; font-family: Montserrat, sans-serif;">
                                                {{ $meetingNotesList[$i][$j]->note }}
                                            </p>
                                        </div>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                    @endif
                </main>
            @endfor


        </div>

        <footer
            style='-webkit-transition: all 0.3s ease-in-out; transition: all 0.3s ease-in-out; padding: 15px 20px; position: fixed; bottom: 0px; left: 280px; width: calc(100% - 280px); z-index: 99; background: #e7e7e7; justify-content: center; display: flex;'>
            <div class='btn-group d-flex align-items-center justify-content-center text-align-center w-25'>
                <form action='{{ route('admin.reports.pdf.download') }}' method='post'>
                    @csrf
                    <input type='hidden' name='report_theme' id='report_theme' value='{{ $report_theme }}'>
                    <input type='hidden' name='csrf-token' value='{{ csrf_token() }}'>
                    <input type='hidden' name='report_type' id='report_type' value='{{ $report_type }}'>
                    <input type='hidden' name='report_start_date' value='{{ $report_start_date }}'>
                    <input type='hidden' name='report_end_date' value='{{ $report_end_date }}'>
                    <input type='hidden' name='tbl_comparision'>
                    <input type='hidden' name='cht_comparision'>
                    <input type='hidden' name='accountNamesList' value='{{ implode(',', $accountNamesList) }}'>
                    <input type='hidden' name='accountIdList' value='{{ implode(',', $accountIdList) }}'>
                    <input type='hidden' name='chartImageList'>
                    <input type='hidden' name='meetingNotesListOl'>
                    <input type='hidden' name='inc_meeting_notes' value="{{$inc_meeting_notes}}">
                    <button type='submit' class='btn btn-primary' id='download-combined-report'>
                        <i class='fa fa-download'></i> Download
                    </button>
                    <a href='{{ route('admin.reports.custom-weekly-report.generateReport') }}' class='btn btn-danger'>
                        <i class='fa fa-arrow-left'></i> Back
                    </a>
                </form>
            </div>
        </footer>
    </div>
@endsection
