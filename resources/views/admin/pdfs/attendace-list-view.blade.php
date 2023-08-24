<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Attendance Report {{ $current_full_month }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <style>
        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        body {
            line-height: 1.6;
            margin: 2em;
        }

        th {
            background-color: #001f3f;
            color: #fff;
            padding: 0.5em 1em;
        }

        td {
            border-top: 1px solid #eee;
            padding: 0.5em 1em;
        }

        input {
            cursor: pointer;
        }

        /* Column types */
        th.missed-col {
            background-color: #f00;
        }

        td.missed-col {
            background-color: #ffecec;
            color: #f00;
            text-align: center;
        }

        .name-col {
            text-align: left;
        }

        table .notice {
            font-family: 'Arial', sans-serif;
            font-size: 12px;
            font-weight: 700;
        }
    </style>
</head>

<body style="width: 100%!important;">
    <header class="clearfix">
        <p style="text-align: center;">
            Attendance Report
        </p>
        <p style="text-align: center;">
            {{ $current_full_month }}
        </p>
    </header>
    <main style="width: 100%!important; overflow:hidden;">
        <table>
            <thead>
                <tr>
                    <th class="name-col">Employee</th>
                    @php
                        $current_month = \Carbon\Carbon::now()->month;
                        $current_year = \Carbon\Carbon::now()->year;
                        $days = cal_days_in_month(CAL_GREGORIAN, $current_month, $current_year);
                        for ($i = 1; $i <= $days; $i++) {
                            echo '<th>' . $i . '</th>';
                        }
                    @endphp
                    <th class="missed-col">Summary</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr class="student">
                        <td class="name-col">{{ $employee->user->first_name . ' ' . $employee->user->last_name }}</td>
                        @for ($i = 1; $i <= $days; $i++)
                            @php
                                $date = $current_year . '-' . $current_month . '-' . $i;
                                $attendance = \App\Models\Attendance::where('employee_id', $employee->id)
                                    ->where('date', $date)
                                    ->first();
                                $companyPolicy = \App\Models\CompanyPolicy::orderby('id', 'desc')->first();
                                $office_start_time = $companyPolicy->office_start_time;
                                $office_end_time = $companyPolicy->office_end_time;
                                $office_extended_start_time = \Carbon\Carbon::parse($office_start_time)
                                    ->addMinutes($companyPolicy->buffer_time)
                                    ->format('H:i:s');
                                
                            @endphp
                            @if ($attendance)
                                @if ($attendance->in_time >= $office_start_time && $attendance->in_time <= $office_extended_start_time)
                                    <td class="attend-col">P</td>
                                @elseif($attendance->in_time > $office_extended_start_time)
                                    <td class="attend-col">L</td>
                                @else
                                    <td class="attend-col">A</td>
                                @endif
                            @else
                                <td class="attend-col">N</td>
                            @endif
                        @endfor
                        <td class="missed-col">
                            @php
                                $total_present = \App\Models\Attendance::where('employee_id', $employee->id)
                                    ->where('in_time', '>=', $office_start_time)
                                    ->where('in_time', '<=', $office_extended_start_time)
                                    ->count();
                                $total_late = \App\Models\Attendance::where('employee_id', $employee->id)
                                    ->where('in_time', '>', $office_extended_start_time)
                                    ->count();
                                $total_absent = $days - ($total_present + $total_late);
                            @endphp
                            <p class="notice">P: {{ $total_present }}</p>
                            <p class="notice">L: {{ $total_late }}</p>
                            <p class="notice">A: {{ $total_absent }}</p>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</body>

</html>
