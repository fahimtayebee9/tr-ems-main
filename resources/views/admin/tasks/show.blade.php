@extends("admin.layouts.app")

@section("body")
<div class="block-header">
    <div class="row">
        @include('admin.includes.breadcrumb-v2')
    </div>

    <div class="row clearfix row-deck mt-4">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card number-chart">
                <div class="body pb-3">
                    <span class="text-uppercase font-weight-bold pb-4">Employee Details</span>
                    <div class="row">
                        <div class="col-6">
                            <table>
                                <tr>
                                    <td width="120px">Employee Name</td>
                                    <td width="10px">:</td>
                                    <td>
                                        {{ $employee->user->first_name . ' ' . $employee->user->last_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Employee ID</td>
                                    <td >:</td>
                                    <td>
                                        {{ $employee->employee_id }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Employee Email</td>
                                    <td>:</td>
                                    <td>
                                        {{ $employee->user->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Employee Phone</td>
                                    <td>:</td>
                                    <td>
                                        {{ $employee->user->phone }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-6">
                            <table>
                                <tr>
                                    <td width="120px">Submission Date</td>
                                    <td width="10px">:</td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($taskSubmissionDate)->format('d M, Y') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Task Completed</td>
                                    <td>:</td>
                                    <td>
                                        {{ count($taskSubmissions) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Percentage</td>
                                    <td>:</td>
                                    <td>
                                        @php
                                            $percentage = 0;
                                            $total_percentage = 0;
                                            foreach ($taskSubmissions as $taskSubmission) {
                                                $total_percentage += $taskSubmission->task_completion_percentage;
                                            }
                                            // $percentage = ($total_percentage / count($taskSubmissions)) * 100;
                                            echo $total_percentage . '%';
                                        @endphp
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-hover m-b-0" id="tbl-tasks-submissions">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Task Title</th>
                                <th>Description</th>
                                <th>Value</th>
                                <th>Screen Shot</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($taskSubmissions as $taskSubmission)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $taskSubmission->task_title }}</td>
                                    <td>{{ $taskSubmission->task_description }}</td>
                                    <td>{{ $taskSubmission->task_completion_percentage }}%</td>
                                    <td>
                                        <a href="{{ $taskSubmission->screenshot_url }}" target="_blank" class="btn btn-info btn-sm">View Image</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection