@extends("employee.layouts.shreyu")

@section("content")
<!-- mdl-leave-create -->

<div class="row">
    <div class="col-md-12 col-xl-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-8 d-flex justify-content-end align-items-center">
                        <div class="btn-group">
                            <a href="{{ route('employee.applications') }}" class="{{ (Route::getCurrentRoute()->getActionName() == "employee.applications") ? 'active' : ''  }}btn btn-info">All</a>
                            <a href="{{ route('employee.applications.leave-applicaitons') }}" class="{{ (Route::getCurrentRoute()->getActionName() == "employee.applications.leave-applicaitons") ? 'active' : '' }}btn btn-info">Leave Applications</a>
                            <a href="{{ route('employee.applications.others-applicaitons') }}" class="{{ (Route::getCurrentRoute()->getActionName() == "employee.applications.others-applicaitons") ? 'active' : '' }}btn btn-info">Others</a>
                        </div>
                        <div class="leave-filter w-50" style="margin-left: 15px; margin-right: 15px;">
                            <select class="form-control custom-select select2-hidden-accessible w-100" name="leave_type" id="leave-type-filter">
                                <option>Select Type</option>
                                <option value="1">Full Day Paid Leave</option>
                                <option value="2">Half Day Non-Paid Leave</option>
                                <option value="3">Full Day Non-Paid Leave</option>
                            </select>
                        </div>
                        <a href="{{ route('employee.applications.create') }}" class="btn btn-info width-md">
                            <i class="fas fa-plus" style="font-size: 10px;"></i>
                            Apply Leave
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th width="10%">Application ID</th>
                                <th width="15%">Apply Date</th>
                                <th>Subject</th>
                                <th width="10%">Status</th>
                                <th width="10%">Type</th>
                                <th width="5%">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbl-leave-applications">
                            @foreach($applicationList as $leave)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $leave->application_id }}</td>
                                <td>
                                    {{ date('d M, Y', strtotime($leave->created_at)) }}
                                </td>
                                <td>{{ $leave->subject }}</td>
                                <td>
                                    @if($leave->status_by_astmanager == 1 && $leave->status_by_hr == 1)
                                        <span class="badge badge-soft-warning">Pending</span>
                                    @elseif($leave->status_by_astmanager == 2 && $leave->status_by_hr == 1)
                                        <span class="badge badge-pill badge-success">Approved by AST Manager</span>
                                    @elseif($leave->status_by_astmanager == 3 && $leave->status_by_hr == 1)
                                        <span class="badge badge-pill badge-danger">Rejected by AST Manager</span>
                                    @elseif($leave->status_by_astmanager == 2 && $leave->status_by_hr == 2)
                                        <span class="badge badge-pill badge-success">Approved</span>
                                    @elseif($leave->status_by_astmanager == 3 && $leave->status_by_hr == 3)
                                        <span class="badge badge-pill badge-danger">Rejected</span>
                                    @else
                                        <span class="badge badge-soft-warning">Pending</span>
                                    @endif
                                </td>
                                
                                <td>
                                    @if($leave->application_type == 1)
                                        <span class="badge badge-soft-warning">Leave</span>
                                    @elseif($leave->application_type == 2)
                                        <span class="badge badge-pill badge-success">Salary Review</span>
                                    @elseif($leave->application_type == 3)
                                        <span class="badge badge-pill badge-danger">General</span>
                                    @else
                                        <span class="badge badge-soft-warning">Others</span>
                                    @endif
                                </td>
                                <td>
                                    {{-- LINK TO DOWNLOAD PDF --}}
                                    <a href="{{ route('employee.applications.downloadPdf', $leave->application_id) }}" class="btn btn-warning btn-sm" 
                                        data-title="Download PDF" data-toggle="tooltip">
                                        <i data-feather="download"></i>
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

</div><!-- end row-->

@endsection