<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NuDawn Ecommerce - Report</title>

    <style type="text/css">
        .apexcharts-legend {
            display: flex;
            overflow: auto;
            padding: 0 10px;
        }

        .apexcharts-legend.position-bottom,
        .apexcharts-legend.position-top {
            flex-wrap: wrap
        }

        .apexcharts-legend.position-right,
        .apexcharts-legend.position-left {
            flex-direction: column;
            bottom: 0;
        }

        .apexcharts-legend.position-bottom.left,
        .apexcharts-legend.position-top.left,
        .apexcharts-legend.position-right,
        .apexcharts-legend.position-left {
            justify-content: flex-start;
        }

        .apexcharts-legend.position-bottom.center,
        .apexcharts-legend.position-top.center {
            justify-content: center;
        }

        .apexcharts-legend.position-bottom.right,
        .apexcharts-legend.position-top.right {
            justify-content: flex-end;
        }

        .apexcharts-legend-series {
            cursor: pointer;
            line-height: normal;
        }

        .apexcharts-legend.position-bottom .apexcharts-legend-series,
        .apexcharts-legend.position-top .apexcharts-legend-series {
            display: flex;
            align-items: center;
        }

        .apexcharts-legend-text {
            position: relative;
            font-size: 14px;
        }

        .apexcharts-legend-text *,
        .apexcharts-legend-marker * {
            pointer-events: none;
        }

        .apexcharts-legend-marker {
            position: relative;
            display: inline-block;
            cursor: pointer;
            margin-right: 3px;
        }

        .apexcharts-legend.right .apexcharts-legend-series,
        .apexcharts-legend.left .apexcharts-legend-series {
            display: inline-block;
        }

        .apexcharts-legend-series.no-click {
            cursor: auto;
        }

        .apexcharts-legend .apexcharts-hidden-zero-series,
        .apexcharts-legend .apexcharts-hidden-null-series {
            display: none !important;
        }

        .inactive-legend {
            opacity: 0.45;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body style="margin: 0px!important; padding: 0px!important;">
    <div class="container">
        <main>
            <header style="font-family: Arial, Helvetica, sans-serif; text-align: center;">
                <h1 style="margin-bottom: 10px;">NuDawn Ecommerce</h1>
                {{-- <h2 style="margin-bottom: 5px;">{{ $request->report_type }} Report</h2> --}}
                <h3 style="margin-bottom: 5px;">
                    {{ date('d M, Y', strtotime($request->report_start_date)) . ' - ' . date('d M, Y', strtotime($request->report_end_date)) }}
                </h3>
            </header>
            @php
                $tbl_comparision_data = json_decode($pdfReportObj->tables_json);
                $mnt_notes_data = json_decode($request->meetingNotesListOl);
                $count = count($tbl_comparision_data);
                // dd($count, $charts_list);
            @endphp
            @for ($i = 0; $i < $count; $i++)
                <main>
                    {{-- <div class="chart-holder">
                        <img src="data:image/svg+xml;base64,'{{base64_encode($charts_list[$i])}}'" style="max-width: 100%!important;"/>
                    </div> --}}

                    {!! $tbl_comparision_data[$i] !!}
                    
                    @if ($mnt_notes_data[$i] != '')
                        <div class="meeting_notes_container">
                            {!! $mnt_notes_data[$i] !!}
                        </div>
                    @endif
                </main>
                @if ($i != $count - 1)
                    <div class="page-break"></div>
                    @php sleep(1); @endphp
                @endif
            @endfor
        </main>
    </div>

</body>

</html>
