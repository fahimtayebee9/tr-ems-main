@extends("employee.layouts.shreyu")

@section("content")

@php
    $attendance = \App\Models\Attendance::where('employee_id', $employee->id)->where('date', date('Y-m-d'))->first();
@endphp

<div class="row">
    <div class="col-md-12 col-xl-4">
        @include('employee.partials.attendance-card')
    </div>

    @php
        $attendance = \App\Models\Attendance::where('employee_id', \App\Models\Employee::where('user_id', Auth::user()->id)->first()->id)->first();
        $attendanceBreaks = null; //\App\Models\AttendanceBreak::where('attendance_id', $attendance->id)->get();
        $attendanceBreaks = ($attendance != null) ? \App\Models\AttendanceBreak::where('attendance_id', $attendance->id)->get() : null;
    @endphp

    <div class="col-md-12 col-xl-4">
        <div class="card mini-stat att-statistics">
            <div class="mini-stat-icon text-right">
                <i class="mdi mdi-cube-outline"></i>
            </div>
            <div class="card-body">
                <h5 class="card-title">Statistics</h5>
                @php
                    $companyPolicy = \App\Models\CompanyPolicy::orderby('id', 'desc')->first();
                    $startTime = \Carbon\Carbon::parse($companyPolicy->office_start_time);
                    $endTime = \Carbon\Carbon::parse($companyPolicy->office_end_time);
                    $totalHoursDay = $startTime->diffInHours($endTime);
                    $totalHoursMonth = $startTime->diffInHours($endTime) * Carbon\Carbon::now()->daysInMonth;
                    $totalHoursWeek = $startTime->diffInHours($endTime) * 7;

                    //get attendance details of current month for current employee
                    $attendances = \App\Models\Attendance::where('employee_id', \App\Models\Employee::where('user_id', Auth::user()->id)->first()->id)->whereMonth('date', date('m'))->get();
                    $totalHoursWorkedMonth = 0;
                    $totalHoursWorkedDay = 0;
                    $totalHoursWorkedWeek = 0;  
                    foreach($attendances as $att){
                        $attendanceBreak = \App\Models\AttendanceBreak::where('attendance_id', $att->id)->get();
                        $totalBreak = 0;
                        foreach($attendanceBreak as $break){
                            $startTime = \Carbon\Carbon::parse($break->break_in);
                            $endTime = \Carbon\Carbon::parse($break->break_out);
                            $totalBreak += $startTime->diffInHours($endTime);
                        }

                        //calculate total hours worked in current month
                        $mstartTime = \Carbon\Carbon::parse($att->in_time);
                        $mendTime = \Carbon\Carbon::parse($att->out_time);
                        $totalHoursWorkedMonth += $mstartTime->diffInHours($mendTime);
                        $totalHoursWorkedMonth -= $totalBreak;

                        //calculate total hours worked in current week
                        
                        $attendancesWeek = \App\Models\Attendance::where('employee_id', \App\Models\Employee::where('user_id', Auth::user()->id)->first()->id)->whereBetween('date', [Carbon\Carbon::now()->startOfWeek(), Carbon\Carbon::now()->endOfWeek()])->get();
                        foreach($attendancesWeek as $attWeek){
                            $attendanceBreakWeek = \App\Models\AttendanceBreak::where('attendance_id', $attWeek->id)->get();
                            $totalBreakWeek = 0;
                            foreach($attendanceBreakWeek as $breakWeek){
                                $startTime = \Carbon\Carbon::parse($breakWeek->break_in);
                                $endTime = \Carbon\Carbon::parse($breakWeek->break_out);
                                $totalBreakWeek += $startTime->diffInHours($endTime);
                            }

                            //calculate total hours worked in current week
                            $wstartTime = \Carbon\Carbon::parse($attWeek->in_time);
                            $wendTime = \Carbon\Carbon::parse($attWeek->out_time);
                            $totalHoursWorkedWeek += $wstartTime->diffInHours($wendTime);
                            $totalHoursWorkedWeek -= $totalBreakWeek;
                        }

                        //calculate total hours worked in current day
                        
                        $attendancesDay = \App\Models\Attendance::where('employee_id', \App\Models\Employee::where('user_id', Auth::user()->id)->first()->id)->where('date', date('Y-m-d'))->get();
                        foreach($attendancesDay as $attDay){
                            $attendanceBreakDay = \App\Models\AttendanceBreak::where('attendance_id', $attDay->id)->get();
                            $totalBreakDay = 0;
                            
                            foreach($attendanceBreakDay as $breakDay){
                                $startTime = \Carbon\Carbon::parse($breakDay->break_in);
                                $endTime = \Carbon\Carbon::parse($breakDay->break_out);
                                $totalBreakDay += $startTime->diffInHours($endTime);
                            }

                            //calculate total hours worked in current day
                            $dstartTime = \Carbon\Carbon::parse($attDay->in_time);
                            $dendTime = \Carbon\Carbon::parse($attDay->out_time);
                            $totalHoursWorkedDay += $dstartTime->diffInHours($dendTime);
                            $totalHoursWorkedDay -= $totalBreakDay;
                        }
                    }

                    //calculate remaining hours in current month
                    $curDate = Carbon\Carbon::now();
                    $monthStartDate = Carbon\Carbon::now()->startOfMonth();
                    $remainingHoursMonth = $totalHoursMonth - ($curDate->diffInDays($monthStartDate) * $totalHoursDay);

                @endphp
                <div class="stats-list">
                    <div class="stats-info">
                        <p>Today <strong>{{ $totalHoursWorkedDay }} <small>/ {{ $totalHoursDay }} hrs</small></strong></p>
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="stats-info">
                        <p>This Week <strong>{{$totalHoursWorkedWeek}} <small>/ {{$totalHoursWeek}} hrs</small></strong></p>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="stats-info">

                        <p>This Month <strong>{{$totalHoursWorkedMonth}} <small>/ {{$totalHoursMonth}} hrs</small></strong></p>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 62%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="stats-info">
                        <p>Remaining <strong>{{$remainingHoursMonth}} <small>/ {{$totalHoursMonth}} hrs</small></strong></p>
                        <div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 62%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 col-xl-4">
        <div class="card mini-stat">
            <div class="mini-stat-icon text-right">
                <i class="mdi mdi-buffer"></i>
            </div>
            <div class="card-body">
                <h5 class="card-title">Today Activity</h5>
                <ul class="res-activity-list">

                    <li>
                        <p class="mb-0">Punch In at</p>
                        <p class="res-activity-time">
                            {{-- check if attendance is not null --}}
                            @if($attendance != null)
                            <i class="fa fa-clock-o"></i>
                            {{ \Carbon\Carbon::parse($attendance->in_time)->format('h:i A') }}
                            @else
                                <p>NOT LOGGED IN</p>
                            @endif
                        </p>
                    </li>
                    @if($attendanceBreaks != null)
                    @foreach($attendanceBreaks as $attendanceBreak)
                    <li>
                        <p class="mb-0">Break In at</p>
                        <p class="res-activity-time">
                            <i class="fa fa-clock-o"></i>
                            {{ \Carbon\Carbon::parse($attendanceBreak->break_in)->format('h:i A') }}
                        </p>
                    </li>
                    <li>
                        <p class="mb-0">Back at</p>
                        <p class="res-activity-time">
                            <i class="fa fa-clock-o"></i>
                            {{ \Carbon\Carbon::parse($attendanceBreak->break_out)->format('h:i A') }}
                        </p>
                    </li>
                    @endforeach
                    @endif
                    <li>
                        <p class="mb-0">Punch Out at</p>
                        <p class="res-activity-time">
                            @if($attendance != null)
                            <i class="fa fa-clock-o"></i>
                            {{ \Carbon\Carbon::parse($attendance->out_time)->format('h:i A') }}
                            @else
                                <p>NOT LOGGED IN</p>
                            @endif
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </div><!-- end row -->
</div>


<div class="row">
    <div class="col-md-12 col-xl-12">
        <form action="{{ route('employee.attendance.filterData') }}" method="GET">
            @csrf
            <div class="row mb-3">
                <div class="col-md-4">
                    <select class="select2 form-control custom-select select2-hidden-accessible" name="attendance_month" id="attendance-month">
                        <option value="*">Select Month</option>
                        @for($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}">{{ date('F', mktime(0, 0, 0, $i, 10)) }}</option>
                        @endfor
                    </select>
                </div>

                <div class="col-md-4">
                    <select class="select2 form-control custom-select select2-hidden-accessible" name="attendance_status" id="attendance-status">
                        <option value="*">Select Status</option>
                        <option value="1">Present</option>
                        <option value="2">Absent</option>
                        <option value="3">Leave</option>
                        <option value="6">Half Day</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary w-100">Filter</button>
                </div>
            </div>
        </form>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0" id="tbl-attendance-data">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date </th>
                                <th>Punch In</th>
                                <th>Punch Out</th>
                                <th>Launch Status</th>
                                <th>Stauts</th>
                            </tr>
                        </thead>
                        <tbody id="attendance-table-emp">
                            @php
                                $total_lunch = 0;
                            @endphp
                            @foreach($attendanceList as $attendance)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ \Carbon\Carbon::parse($attendance->date)->format('d M Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($attendance->in_time)->format('h:i A') }}</td>
                                    <td>
                                        @if($attendance->out_time != null)
                                            {{ \Carbon\Carbon::parse($attendance->out_time)->format('h:i A') }}
                                        @else
                                            <span class="badge badge-danger">Not Logged Out</span>
                                        @endif
                                    </td>
                                    <td>
                                        @foreach($launchList as $launch)
                                            @if($attendance->id == $launch->attendance_id)
                                                @if($launch->status == 1)
                                                    <span class="badge badge-info">Taken</span>
                                                @else
                                                    <span class="badge badge-danger">Not Taken</span>
                                                    @break
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @if($attendance->status == 1)
                                        <span class="badge badge-info">Present</span>
                                        @elseif($attendance->status == 6)
                                        <span class="badge badge-warning">Present [LATE]</span>
                                        @else
                                        <span class="badge badge-danger">Absent</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div><!-- end row-->

@endsection