<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Application-{{ $leaveApplication->leave_id }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <style>
        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #0087C3;
            text-decoration: none;
        }

        body {
            position: relative;
            width: 21cm;
            height: 29.7cm;
            margin: 0 auto;
            color: #555555;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-family: SourceSansPro;
        }

        .table {
            width: 100%;
            max-width: 100%;
            margin-top: 80px;
        }

        header {
            padding: 10px 0;
            margin-bottom: 20px;
        }
        header p{
            font-family: 'Arial', sans-serif;
            font-size: 14px;
        }

        main p{
            font-family: 'Arial', sans-serif;
            /* font-size: 14px; */
        }
        table .notice{
            font-family: 'Arial', sans-serif;
            font-size: 12px;
            font-weight: 700;
        }
    </style>
</head>

<body style="width: 100%!important;">
    <header class="">
        <p>
            {{ \Carbon\Carbon::parse($leaveApplication->created_at)->format('d M, Y') }}
        </p>
        <p>
            To,
            <br>
            @if($leaveApplication->apply_to == 1)
            <span class="margin-bottom: 15px!important;">{{ "HR Manager" }}</span>
            @elseif($leaveApplication->apply_to == 2)
            <span style="margin-bottom: 15px!important;">{{ "CEO" }}</span>
            @endif
            <br>
            <span style="margin-bottom: 15px!important;">{{ $companyDetails->company_name }}</span>
            <br>
            <span style="margin-bottom: 15px!important;">{!! $companyDetails->company_address !!}</span>
        </p>
        <p style="margin: 0px!important;">
            <b>Subject:</b> {{ $leaveApplication->subject }}
        </p>
    </header>
    <main style="width: 100%!important; overflow:hidden; margin-top: 15px!important;">
        <p>
            Dear {{ $leaveApplication->default_apply_to }},
        </p>
        <p style="font-size: 18px!important;font-family: Arial, Helvetica, sans-serif!important;">
            {!! $leaveApplication->description !!}
        </p>
        <p>
            Yours Sincerely,
            <br>
            {{ $leaveApplication->employee->user->first_name }} {{ $leaveApplication->employee->user->last_name }}
            <br>
            {{ $leaveApplication->employee->designation->name }} [{{ $leaveApplication->employee->department->name }}]
            <br>
            {{ $companyDetails->company_name }}
            <br>
            {!! $companyDetails->company_address !!}
        </p>
        <div style="margin-top: 70px;">
            <table class="table">
                <tr>
                    <td style="text-align: center;">
                        <div id="notices">
                            <div style="margin-bottom: 15px;">
                                <div style="margin-top: 15px; border-bottom: 1px dashed #000; width: 75%; margin: 0 auto;"></div>
                            </div>
                            <div class="notice">
                                Authorized Signature
                            </div>
                        </div>
                    </td>
                    <td style="text-align: center;">
                        <div id="notices">
                            <div style="margin-bottom: 15px;">
                                <div style="margin-top: 15px; border-bottom: 1px dashed #000; width: 75%; margin: 0 auto;"></div>
                            </div>
                            <div class="notice">
                                Authorized Signature
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </main>
</body>

</html>
