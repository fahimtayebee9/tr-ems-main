@extends('employee.layouts.shreyu')

@section('content')

    @php
        $attendance = \App\Models\Attendance::where('employee_id', $employee->id)
            ->where('date', date('Y-m-d'))
            ->first();
    @endphp

    <div class="row">
        <div class="col-md-12 col-xl-4">
            @include('employee.partials.attendance-card')
        </div>

        <div class="col-md-6 col-xl-4">
            <div class="card mini-stat" id="launch-card">
                <div class="mini-stat-icon text-right">
                    <i class="mdi mdi-tag-text-outline"></i>
                </div>
                <div class="card-body">
                    <h6 class="text-uppercase mb-3">
                        Today's Launch
                        <small class="text-muted">{{ date('d M, Y') }}</small>
                    </h6>
                    @php
                        $launchSheet = App\Models\LaunchSheet::orderby('id', 'desc')
                            ->where('user_id', $employee->user->id)
                            ->first();
                        $launchStatus = isset($launchSheet->status) ? $launchSheet->status : 0;
                        $statusClass = $launchStatus == 1 ? 'bg-success' : 'bg-danger';
                        
                    @endphp
                    <div class="punch-info " id="launch-data">
                        <div class="punch-hours">
                            <span>
                                @if ($launchStatus == 1)
                                    Yes
                                @else
                                    No
                                @endif
                            </span>
                        </div>
                    </div>
                    <!-- && Carbon\Carbon::now() < Carbon\Carbon::parse('17:30:00') -->
                    @php
                        $attendance = \App\Models\Attendance::where('employee_id', $employee->id)
                            ->where('date', date('Y-m-d'))
                            ->first();
                        $launchSheet = App\Models\LaunchSheet::orderby('id', 'desc')
                            ->where('user_id', $employee->user->id)
                            ->whereDate('date', date('Y-m-d'))
                            ->first();
                    @endphp
                    @if (!empty($attendance))
                        @if (App\Models\LaunchSheet::where('user_id', $employee->user_id)->where('date', date('Y-m-d'))->exists() == false && Carbon\Carbon::now() < Carbon\Carbon::parse('24:00:00'))
                            <div class="punch-btn-section text-center" >
                                <p>
                                    Do you want to take launch?
                                </p>
                                <form action="{{ route('employee.launch-management.store') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $employee->user_id }}">
                                    <input type="hidden" name="attendance_id" value="{{ $attendance->id }}">
                                    <select data-plugin="customselect" name="launch_status" class="form-control mb-3 ml-auto mr-auto text-center"
                                        id="launch_status">
                                        <option value="1" {{ $launchStatus == 1 ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ $launchStatus == 0 ? 'selected' : '' }}>No</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary punch-btn launch-btn mt-2">
                                        @if ($launchStatus == 1)
                                            Cancel Request
                                        @else
                                            Submit Request
                                        @endif
                                    </button>
                                </form>
                            </div>
                        @else
                            <div class="alert alert-info">
                                <p class="text-center m-0">
                                    You have already submitted your launch request.
                                </p>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-4">
            <div class="card mini-stat mb-2">
                <div class="mini-stat-icon text-right">
                    <i class="mdi mdi-tag-text-outline"></i>
                </div>
                <div class="card-body">
                    @php
                        $date = date('Y-m-d');
                        $taskSubmission = null; //\App\Models\TaskSubmission::where('employee_id', $employee->id)->whereDate('created_at', \Carbon\Carbon::now())->first();
                    @endphp

                    <h6 class="text-uppercase mb-0">Daily Task Form</h6>
                    <p class="mb-2 mt-2">
                        <b>Status: </b>
                        <span
                            class="badge {{ isset($tasksubmission) && $taskSubmission != null ? 'badge-success' : 'badge-warning' }}">
                            {{ isset($tasksubmission) && $taskSubmission != null ? 'Submitted' : 'Not Submitted' }}
                        </span>
                    </p>

                    @if (isset($taskSubmission) && $taskSubmission != null)
                        <p class="mb-0">
                            <b>Submitted At:</b>
                            {{ isset($taskSubmission->created_at) ? \Carbon\Carbon::parse($taskSubmission->created_at)->format('d M, Y') . '(' . \Carbon\Carbon::parse($taskSubmission->created_at)->format('g:i A') . ')' : 'Not Submitted' }}
                        </p>
                    @endif

                    @if ($attendance)
                        @if ($attendance->in_time != null && $taskSubmission == null)
                            <a href="{{ route('employee.task-management.create') }}" class="btn btn-outline-primary mb-0">
                                View Task
                            </a>
                        @else
                            <div class="alert alert-info">
                                <p class="text-center m-0">
                                    You are not allowed to submit task form.
                                </p>
                            </div>
                        @endif
                    @endif
                </div>
            </div>

            {{-- calculate total employement duration from joining_date to today --}}
            @php
                $joiningDate = Carbon\Carbon::parse($employee->joining_date);
                $today = Carbon\Carbon::now();
                $totalEmployementDuration = $joiningDate->diffInMonths($today);
                // dd();
            @endphp

            @if (
                $employee->paid_leaves_applicable == 1 ||
                    $totalEmployementDuration >= \App\Models\CompanyPolicy::orderby('id', 'desc')->first()->paid_leave_rule)
                <div class="card mini-stat mt-3">
                    <div class="mini-stat-icon text-right">
                        <i class="mdi mdi-buffer"></i>
                    </div>
                    <div class="card-body">
                        @php
                            $applications = App\Models\Application::where('employee_id', $employee->id)
                                ->where('application_type', 1)
                                ->where('status_by_astmanager', 1)
                                ->where('status_by_hr', 1)
                                ->get();
                            $paidLeavesTaken = 0;
                            $totalPaidLeavesByPolicy = \App\Models\CompanyPolicy::where('policy_id', 'POLICY-YPL')->first()->value;
                            foreach ($applications as $application) {
                                $leaveApplication = App\Models\LeaveApplication::where('application_id', $application->id)->first();

                                $lstart = Carbon\Carbon::parse($leaveApplication->from_date);
                                $lend = Carbon\Carbon::parse($paidLeave->to_date);
                                $paidLeavesTaken += $lstart->diffInDays($lend);
                            }
                            
                        @endphp
                        <h6 class="text-uppercase mb-3">Paid Leaves</h6>
                        <h4 class="mb-0">
                            {{ $paidLeavesTaken . '/' . $totalPaidLeavesByPolicy }}
                        </h4>
                    </div>
                </div>
            @endif
        </div>
    </div><!-- end row -->

    <div class="row">
        <div class="col-md-7">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mt-0 header-title">
                                Daily Assigned Tasks
                                {{-- {{ Auth::user()->employee->designation }} --}}
                            </h4>
                            <p class="text-muted font-14">
                                Here you can see all the tasks assigned to you.
                            </p>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="" data-target="#mdl-daily-task-create" data-toggle="modal"
                                class="btn btn-outline-primary">
                                <i class="mdi mdi-plus"></i> Add Tasks
                            </a>

                            @include('employee.pages.modals.mdl-daily-task-create')
                        </div>
                    </div>
                    @php
                        $taskSubmission = null; 
                        // \App\Models\DailyTask::where('emp_id', $employee->id)
                        //     ->whereDate('submission_date', date('Y-m-d'))
                        //     ->get();
                        // dd($taskSubmission);
                    @endphp
                    @if (isset($taskSubmission))
                        <div class="">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th width="25%">Task Title</th>
                                        <th class="text-center" width="380px">Description</th>
                                        <th class="text-center" width="140px">Client Account</th>
                                        <th class="text-center" width="100px">Status</th>
                                        <th class="text-center" width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($taskSubmission as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->task_title }}</td>
                                            <td>{!! $item->task_description !!}</td>
                                            <td class="text-center">
                                                {{ $item->clientAccount->account_name }}
                                            </td>
                                            <td class="text-center">
                                                @if ($item->task_status == 1)
                                                    <span class="badge badge-warning">PENDING</span>
                                                @elseif($item->task_status == 2)
                                                    <span class="badge badge-info">IN PROGRESS</span>
                                                @elseif($item->task_status == 3)
                                                    <span class="badge badge-success">COMPLETED</span>
                                                @endif
                                            </td>
                                            <td>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info">
                            <p class="text-center m-0">
                                No task assigned to you.
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h2 class="mt-0 header-title m-0">Notice Board</h2>
                </div>
                <div class="card-body">
                    @foreach ($noticeList as $item)
                        @if (!Carbon\Carbon::parse($item->expiry_date)->isPast())
                            <div class="alert alert-secondary alert-dismissible fade show" role="alert"
                                data-toggle="modal" data-target="#mdl-notice-{{ $item->id }}">
                                <strong>{{ $item->title }}</strong>
                                <p class="mb-0">
                                    {{ substr($item->description, 0, 100) . '...' }}
                                </p>
                                <p class="mb-0">
                                    <small>
                                        <i class="mdi mdi-clock-outline"></i>
                                        {{ Carbon\Carbon::parse($item->expiry_date)->diffForHumans() }}
                                    </small>
                                </p>
                            </div>

                            <div class="modal" id="mdl-notice-{{ $item->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="mdl-notice-{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="card m-0">
                                            <div class="card-header">
                                                <h4 class="mt-0 header-title m-0">{{ $item->title }}</h4>
                                            </div>
                                            <div class="card-body">
                                                <p class="mb-0">
                                                    {!! $item->description !!}
                                                </p>
                                                <p class="mb-0 font-weight-bold mt-3">
                                                    Expiry Date: {{ Carbon\Carbon::parse($item->expiry_date)->format('d M, Y') }}
                                                    <small class="badge badge-danger">
                                                        <i class="mdi mdi-clock-outline"></i>
                                                        {{ Carbon\Carbon::parse($item->expiry_date)->diffForHumans() }}
                                                    </small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>


@endsection
