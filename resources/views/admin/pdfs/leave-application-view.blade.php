<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Application-{{ $application->application_id }}</title>
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
            font-size: 14px;
        }
        table .notice{
            font-family: 'Arial', sans-serif;
            font-size: 12px;
            font-weight: 700;
        }
    </style>
</head>

<body style="width: 100%!important;">
    <header class="clearfix">
        <p>
            {{ \Carbon\Carbon::parse($application->created_at)->format('d M, Y') }}
        </p>
        <p>
            To,
            <br>
            @if($application->apply_to == 1)
            {{ "HR Manager" }}
            @elseif($application->apply_to == 2)
            {{ "CEO" }}
            @endif
            <br>
            {{ $companyDetails->company_name }}
            <br>
            {{ $companyDetails->company_address }}
        </p>
        <p>
            <b>Subject:</b> {{ $application->subject }}
        </p>
    </header>
    <main style="width: 100%!important; overflow:hidden;">
        <p>
            Dear 
            {{-- {{ \App\Models\Employee::where('employee_id', "1612001")->first()->user->first_name }} {{ \App\Models\Employee::where('employee_id', "1612001")->first()->user->last_name }}, --}}
        </p>
        <p>
            {!! $application->description !!}
        </p>
        <p>
            Yours Sincerely,
            <br>
            {{ $application->employee->user->first_name }} {{ $application->employee->user->last_name }}
            <br>
            {{ $application->employee->designation->name }} [{{ $application->employee->department->name }}]
            <br>
            {{ $companyDetails->company_name }}
            <br>
            {{ $companyDetails->company_address }}
        </p>
        <div class="">
            <table class="table">
                <tr>
                    <td style="text-align: center;">
                        <div id="notices">
                            <div style="margin-bottom: 15px;">
                                @if($application && $application->status_by_astmanager == 2)
                                <img src="{{ public_path('storage/uploads/signatures/assistant-manager-approved-digital-signature.png') }}" alt="Approved" width="100px">
                                @endif
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
                                @if($application && $application->status_by_hr == 2)
                                <img src="{{ public_path('storage/uploads/signatures/assistant-manager-approved-digital-signature.png') }}" alt="Approved" width="240px">
                                @endif

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
