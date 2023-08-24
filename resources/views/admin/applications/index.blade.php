@extends('admin.layouts.app')

@section('body')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                @include('admin.includes.breadcrumb-v2')
            </div>
            <div class="col-auto float-end ms-auto">
                
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card-group m-b-30">
                <div class="card bg-inverse-success">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <span class="d-block">Approved</span>
                            </div>
                        </div>
                        <h3 class="mb-3">
                            {{ \App\Models\Application::where('status_by_astmanager', 2)->where('status_by_hr', 2)->get()->count() }}
                        </h3>
                        <p class="mb-0">
                            Previous Month 
                            <span class="text-muted">
                                {{ \App\Models\Application::whereMonth('created_at', date('m') - 1)
                                    ->where('status_by_astmanager', 2)->where('status_by_hr', 2)->get()->count() }}
                            </span>    
                        </p>
                    </div>
                </div>
                <div class="card bg-inverse-danger">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <span class="d-block">Rejected</span>
                            </div>
                        </div>
                        <h3 class="mb-3">
                            {{ \App\Models\Application::where('status_by_astmanager', 3)->where('status_by_hr', 3)->get()->count() }}
                        </h3>
                        <p class="mb-0">
                            Previous Month 
                            <span class="text-muted">
                                {{ \App\Models\Application::whereMonth('created_at', date('m') - 1)
                                    ->where('status_by_astmanager', 3)->where('status_by_hr', 3)->get()->count() }}
                            </span>
                        </p>
                    </div>
                </div>
                <div class="card bg-inverse-warning">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <span class="d-block">Pending Applications</span>
                            </div>
                        </div>
                        <h3 class="mb-3">
                            {{ \App\Models\Application::where('status_by_astmanager', 1)->where('status_by_hr', 1)->get()->count() }}
                        </h3>
                        <p class="mb-0">
                            Overall Employees {{ \App\Models\User::where('role_id', 3)->count() }}</p>
                    </div>
                </div>
                <div class="card bg-inverse-info">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <span class="d-block">Paid Leave Applications</span>
                            </div>
                        </div>
                        <h3 class="mb-3">
                            {{ \App\Models\Application::where('application_type', 1)->get()->count() }}
                        </h3>
                        <p class="mb-0">
                            Previous Month 
                            <span class="text-muted">
                                {{ \App\Models\Application::whereMonth('created_at', date('m') - 1)->get()->count() }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="right-col w-50 d-flex justify-content-end align-items-center">
                            <div class="leave-filter mr-3 w-50">
                                <select class="form-control custom-select select2-hidden-accessible w-100"
                                    name="application_type" id="leave-type-filter">
                                    <option>Select Leave Type</option>
                                    <option value="1">Full Day Paid Leave</option>
                                    <option value="2">Half Day Non-Paid Leave</option>
                                    <option value="3">Full Day Non-Paid Leave</option>
                                </select>
                            </div>
                            <div class="leave-filter mr-3 w-50">
                                <select class="form-control custom-select select2-hidden-accessible w-100"
                                    name="application_type" id="leave-type-filter">
                                    <option>Select Status</option>
                                    <option value="1">Full Day Paid Leave</option>
                                    <option value="2">Half Day Non-Paid Leave</option>
                                    <option value="3">Full Day Non-Paid Leave</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0" id="tbl-leave-applications">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Employee</th>
                                    <th width="15%">Applied On</th>
                                    <th>Subject</th>
                                    <th>Status</th>
                                    <th>Type</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tbd-leave-applications">
                                @foreach ($applicationsList as $leave)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="d-flex justify-content-start align-items-center">
                                            <span>
                                                <h6 class="mb-0">
                                                    {{ $leave->employee->user->first_name . ' ' . $leave->employee->user->last_name }}
                                                </h6>
                                                <span>ID: <b>{{ $leave->employee->employee_id }}</b></span>
                                            </span>
                                        </td>
                                        <td>
                                            {{ Carbon\Carbon::parse($leave->created_at)->format('d M, Y') }}
                                        </td>
                                        <td>{{ $leave->subject }}</td>
                                        <td>
                                            @if ($leave->status_by_astmanager == 2 && $leave->status_by_hr == 2)
                                                <span class="badge badge-pill badge-success">Approved</span>
                                            @elseif($leave->status_by_astmanager == 1 || $leave->status_by_hr == 1)
                                                <span class="badge badge-pill badge-warning">Pending</span>
                                            @else
                                                <span class="badge badge-pill badge-danger">Rejected</span>
                                            @endif
                                        </td>

                                        <td>
                                            @if ($leave->application_type == 1)
                                                <span class="badge badge-pill badge-success">Leave</span>
                                            @elseif($leave->application_type == 2)
                                                <span class="badge badge-pill badge-danger">Salary Review</span>
                                            @else
                                                <span class="badge badge-pill badge-warning">Others</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.application.show', $leave->id) }}" class="btn btn-sm btn-warning"
                                                data-toggle="tooltip" data-title="View">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.application.exportPDF', $leave->id) }}"
                                                class="btn btn-sm btn-info" data-toggle="tooltip" data-title="Download PDF">
                                                <i class="fa fa-download"></i>
                                            </a>
                                            <a href="{{ route('admin.application.destroy', $leave->id) }}"
                                                class="btn btn-sm btn-danger" data-toggle="tooltip" data-title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </a>
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
