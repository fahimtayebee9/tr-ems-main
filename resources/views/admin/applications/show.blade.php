@extends('admin.layouts.app')

@section('body')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                @include('admin.includes.breadcrumb-v2')
            </div>
            <div class="col-auto float-end ms-auto"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card-group m-b-30">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <h4 class="table-avatar d-flex align-items-center">
                                    <a href="" class="avatar">
                                        @if($application->employee->user->image)
                                            <img src="{{ asset('storage/uploads/users/'.$application->employee->user->image) }}" alt="user" class="rounded-circle img-fluid">
                                        @else
                                            <img src="{{ asset('storage/uploads/users/default.webp') }}" alt="user" class="rounded-circle img-fluid">
                                        @endif
                                    </a>
                                    {{$application->employee->user->first_name . ' '. $application->employee->user->last_name}}
                                </h4>
                                <table style="width: 100%;">
                                    <tr>
                                        <td width="110px">Email</td>
                                        <td width="15px">:</td>
                                        <td>{{ $application->employee->user->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Employee ID</td>
                                        <td>:</td>
                                        <td>{{ $application->employee->user->username }}</td>
                                    </tr>
                                    <tr>
                                        <td>Designation</td>
                                        <td>:</td>
                                        <td>{{$application->employee->designation->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Department</td>
                                        <td>:</td>
                                        <td>{{$application->employee->department->name }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <h4 class="text-info">Leave Details</h4>
                                
                                <table style="width: 100%;">
                                    <tr>
                                        <td width="110px">Leave Type</td>
                                        <td width="15px">:</td>
                                        <td>
                                            @if($application->leave_type == 1)
                                                <span class="badge badge-primary">Full Day Paid</span>
                                            @elseif($application->leave_type == 2)
                                                <span class="badge badge-success">Half Day Non-Paid</span>
                                            @elseif($application->leave_type == 3)
                                                <span class="badge badge-warning">Full Day Non-Paid</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Leave Date</td>
                                        <td>:</td>
                                        <td>
                                            {{ date('d M, Y', strtotime($application->leave_from)) }}
                                            @if(!empty($application->leave_to))
                                                - {{ date('d M, Y', strtotime($application->leave_to)) }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Total Days</td>
                                        <td>:</td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($application->leave_from)->diffInDays($application->leave_to) }} Days    
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Reason</td>
                                        <td>:</td>
                                        <td>
                                            {{ $application->subject }}    
                                        </td>
                                    </tr>
                                </table>

                                <div class="btn-list mt-3">
                                    <a href="{{ route('admin.application.exportPDF', $application->id) }}" data-title="Download PDF" data-toggle="tooltip" class="btn btn-info btn-sm">
                                        <i class="fa fa-download"></i> Download PDF
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                @php
                                    // dd(Auth::user()->role_id);
                                @endphp
                                @if (Auth::user()->role_id != 1)
                                    @if(Auth::user()->employee->employee_id == "1612004")
                                        @if(!isset($application->status_by_astmanager) || $application->status_by_astmanager == 1)
                                            <p class="mb-2">
                                                Authorized By : <b>{{ Auth::user()->first_name . ' '. Auth::user()->last_name }}</b>
                                            </p>
                                            <form action="{{ route('admin.application.update', $application->leave_id) }}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="status_by_astmanager">
                                                                Status By {{ Auth::user()->employee->designation->name }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <h6>&nbsp;</h6>
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        @else
                                            <p>
                                                <b>
                                                    Status By 
                                                    <span style="cursor: pointer!important;"
                                                        data-title="{{ \App\Models\Employee::where('employee_id', "1612004")->first()->user->first_name . 
                                                        ' ' . \App\Models\Employee::where('employee_id', "1612004")->first()->user->last_name }}" 
                                                        data-toggle="tooltip">
                                                        {{ \App\Models\Employee::where('employee_id', "1612004")->first()->designation->name }}
                                                    </span>:
                                                </b>
                                                @if($application->status_by_astmanager == 2)
                                                    <span class="badge badge-success">Approved</span>
                                                @elseif($application->status_by_astmanager == 3)
                                                    <span class="badge badge-danger">Rejected</span>
                                                @else
                                                    <span class="badge badge-warning">Pending</span>
                                                @endif
                                                <select name="status_by_astmanager" class="form-control" id="status_by_astmanager">
                                                    <option value="">Select Status</option>
                                                    <option value="1" @if($application->status_by_astmanager == 1) selected @endif>Pending</option>
                                                    <option value="2" @if($application->status_by_astmanager == 2) selected @endif>Approved</option>
                                                    <option value="3" @if($application->status_by_astmanager == 3) selected @endif>Rejected</option>
                                                </select>
                                            </p>
                                        @endif
                                    @elseif(Auth::user()->employee->employee_id == "1612001")
                                        <p class="mb-2">
                                            Authorized By : <b>{{ Auth::user()->first_name . ' '. Auth::user()->last_name }}</b>
                                        </p>
                                        <p>
                                            <b>
                                                Status By 
                                                <span style="cursor: pointer!important;"
                                                    data-title="{{ \App\Models\Employee::where('employee_id', "1612001")->first()->user->first_name . 
                                                    ' ' . \App\Models\Employee::where('employee_id', "1612001")->first()->user->last_name }}" 
                                                    data-toggle="tooltip">
                                                    {{ \App\Models\Employee::where('employee_id', "1612001")->first()->designation->name }}
                                                </span>:
                                            </b>
                                            <select name="status_by_hr" 
                                                @if($application->status_by_astmanager == 1 || $application->status_by_astmanager == 3) 
                                                    disabled 
                                                @endif 
                                                class="form-control select ml-2" id="status_by_hr">
                                                <option value="0">Select Status</option>
                                                <option value="1" @if($application->status_by_hr == 1) selected @endif>Pending</option>
                                                <option value="2" @if($application->status_by_hr == 2) selected @endif>Approved</option>
                                                <option value="3" @if($application->status_by_hr == 3) selected @endif>Rejected</option>
                                            </select>
                                        </p>
                                    @endif
                                    <p>
                                        @if(Auth::user()->employee->employee_id != "1612001" && Auth::user()->role_id != 1)
                                            <b>
                                                Status By 
                                                <span style="cursor: pointer!important;"
                                                    data-title="{{ \App\Models\Employee::where('employee_id', "1612001")->first()->user->first_name . 
                                                    ' ' . \App\Models\Employee::where('employee_id', "1612001")->first()->user->last_name }}" 
                                                    data-toggle="tooltip">
                                                    {{ \App\Models\Employee::where('employee_id', "1612001")->first()->designation->name }}
                                                </span>:
                                            </b>
                                            @if($application->status_by_hr == 2)
                                                <span class="badge badge-success">Approved</span>
                                            @elseif($application->status_by_hr == 3)
                                                <span class="badge badge-danger">Rejected</span>
                                            @else
                                                <span class="badge badge-warning">Pending</span>
                                            @endif
                                        @endif
                                        <hr>
                                        @if (Auth::user()->employee->employee_id != "1612004" && Auth::user()->role_id != 1)
                                            <b>
                                                Status By 
                                                <span style="cursor: pointer!important;"
                                                    data-title="{{ \App\Models\Employee::where('employee_id', "1612004")->first()->user->first_name . 
                                                    ' ' . \App\Models\Employee::where('employee_id', "1612004")->first()->user->last_name }}" 
                                                    data-toggle="tooltip">
                                                    {{ \App\Models\Employee::where('employee_id', "1612004")->first()->designation->name }}
                                                </span>:
                                            </b>
                                            @if($application->status_by_astmanager == 2)
                                                <span class="badge badge-success">Approved</span>
                                            @elseif($application->status_by_astmanager == 3)
                                                <span class="badge badge-danger">Rejected</span>
                                            @elseif($application->status_by_astmanager == 1 || $application->status_by_astmanager == 0)
                                                <span class="badge badge-warning">Pending</span>
                                            @endif
    
                                            @if($application->status_by_astmanager == 1 || $application->status_by_astmanager == 3) 
                                                <div class="alert alert-warning mt-2">
                                                    <b>Note:</b> {{ \App\Models\Employee::where('employee_id', "1612004")->first()->designation->name }} hasn't approved yet.
                                                </div> 
                                            @endif 
                                        @endif
                                    </p>
                                @endif
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card invoice1">
                <div class="card-body">
                    <p class="m-0">
                        {!! $application->description !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
