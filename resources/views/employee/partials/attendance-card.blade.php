<div class="card" id="punch-info-atd">
    <div class="card-body">
        <div class="d-flex">
            <div class="flex-grow-1">
                <span class="text-muted text-uppercase fs-12 fw-bold">
                    Today's Attendance
                    <small class="text-muted">{{ date('d M, Y') }}</small>
                </span>
                {{-- <h3 class="mb-0">$2100</h3> --}}

                @if (!empty($attendance))
                    <div class="statistics mb-3">
                        <div class="row">
                            <div class="col-md-6 col-6 text-center">
                                @php
                                    $statusClass = null;
                                    
                                    if (intval($attendance->status) == 6) {
                                        $statusClass = 'stats-box-warning';
                                    } elseif (intval($attendance->status) == 1) {
                                        $statusClass = 'stats-box-success';
                                    } else {
                                        $statusClass = 'stats-box-danger';
                                    }
                                @endphp

                                <div class="stats-box {{ $statusClass }}">
                                    <p class="font-weight-bold">Punch In</p>
                                    <h6>{{ date('h:i A', strtotime($attendance->in_time)) }}</h6>
                                </div>
                            </div>
                            <div class="col-md-6 col-6 text-center">
                                <div class="stats-box">
                                    <p>Break</p>
                                    <h6>
                                        @php
                                            $break = \App\Models\AttendanceBreak::where('attendance_id', $attendance->id)->first();
                                            $totalDuration = 0;
                                            if (!empty($break)) {
                                                $startTime = \Carbon\Carbon::parse($break->break_in);
                                                $finishTime = \Carbon\Carbon::parse($break->break_out);
                                            
                                                $totalDuration = $finishTime->diffInMinutes($startTime, true);
                                            }
                                        @endphp
                                        {{ floor($totalDuration / 60) }} mins
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="punch-info" >
                        <div class="punch-hours">
                            <span>
                                @php
                                    $startTime = \Carbon\Carbon::parse($attendance->in_time);
                                    $finishTime = !empty($attendance->out_time) ? \Carbon\Carbon::parse($attendance->out_time) : \Carbon\Carbon::now();
                                    
                                    $totalDuration = $finishTime->diffInMinutes($startTime, true);
                                @endphp
                                {{ floor($totalDuration / 60) }} Hrs {{ $totalDuration % 60 }} Mins
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        @if (
                            \App\Models\Attendance::where('id', $attendance->id)->exists() &&
                                !empty(\App\Models\Attendance::where('id', $attendance->id)->first()->out_time))
                            <div class="col-md-12">
                                <div class="alert alert-warning">
                                    <p class="text-center m-0">You have already punched out at
                                        <b>{{ date('h:i A', strtotime(\Carbon\Carbon::parse(\App\Models\Attendance::where('id', $attendance->id)->first()->out_time))) }}</b>.
                                    </p>
                                </div>
                            </div>
                        @else
                            <div class="col-md-6">
                                @if (\App\Models\AttendanceBreak::where('attendance_id', $attendance->id)->where('break_out', null)->exists())
                                    @php
                                        $break = \App\Models\AttendanceBreak::where('attendance_id', $attendance->id)
                                            ->where('break_out', null)
                                            ->first();
                                    @endphp
                                    <form action="{{ route('employee.attendance.break.update') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="break_id" value="{{ $break->id }}">
                                        <div class="punch-btn-section text-center">
                                            <button type="submit" class="btn btn-success punch-btn w-100">Back
                                                In</button>
                                        </div>
                                    </form>
                                @else
                                    <form action="{{ route('employee.attendance.break.store') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="attendance_id" value="{{ $attendance->id }}">
                                        <div class="punch-btn-section text-center">
                                            <button type="submit"
                                                class="btn btn-warning punch-btn w-100">Break</button>
                                        </div>
                                    </form>
                                @endif
                            </div>
                            <div class="col-md-6">
                                {{-- <form action="{{ route('employee.attendance.update') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                                    <input type="hidden" name="attendance_id" value="{{ $attendance->id }}">
                                    <input type="hidden" name="date" value="{{ date('Y-m-d') }}">
                                    <div class="punch-btn-section text-center">
                                        <button type="submit" class="btn w-100 btn-primary punch-btn w-100">Punch Out</button>
                                    </div>
                                </form> --}}

                                {{-- modal trigger button for punch out --}}
                                <button type="button" class="btn w-100 btn-primary punch-btn w-100" data-toggle="modal"
                                    data-target="#punchOutModal">
                                    Punch Out
                                </button>

                                @include('employee.pages.modals.mdl-punch-out')
                            </div>
                        @endif
                    </div>
                @else
                    <form action="{{ route('employee.attendance.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                        <input type="hidden" name="date" value="{{ date('Y-m-d') }}">
                        <div class="form-group mt-2 mb-2">
                            <label for="sign_in_from">Sign In Location</label>
                            <select data-plugin="customselect" name="sign_in_from" id="sign_in_from" class="form-control mt-2">
                                <option value="0">Office</option>
                                <option value="1">Home</option>
                            </select>
                        </div>
                        <div class="form-group mt-2 mb-2">
                            <label for="attendance_note">Attendance Note <span>(OPTIONAL)</span></label>
                            <input type="text" name="attendance_note" id="attendance_note" class="form-control"
                                placeholder="Enter attendance note">
                        </div>
                        <div class="punch-btn-section text-center">
                            <button type="submit" class="btn btn-primary punch-btn">Punch In</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
