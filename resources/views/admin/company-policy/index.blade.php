@extends("admin.layouts.app")

@section("body")
<div class="page-header">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            @include('admin.includes.breadcrumb-v2')
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-end">
            <!-- <button data-toggle="modal" type="button" class="btn btn-primary" data-target="#md-create-holidays"><i class="fa fa-plus"></i> Add New Holiday</button> -->
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="body">
                <div class="body table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="border-0" width="25%">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th class="border-0"  colspan="2" scope="row">
                                                    @if(!empty($company_details->company_logo))
                                                        <img src="{{ asset('storage/uploads/company/'. $company_details->company_logo) }}" alt="company logo" class="img-fluid">
                                                    @else
                                                        <img src="{{ asset('storage/assets/images/browser.png') }}" alt="company logo" class="img-fluid w-50">
                                                    @endif
                                                </th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td class="border-0">
                                    <div class="text-right">
                                        <a data-toggle="modal" data-target="#mdl-edit-company-detail" data- class="btn btn-outline-info mb-3 text-right">
                                            <i class="fa fa-edit"></i>
                                            {{ __('Edit') }}
                                        </a>

                                        @include('admin.company-policy.company-detail-edit-modal')
                                    </div>
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th scope="row" width="25%">
                                                    {{ __('Company Name') }}
                                                </th>
                                                <td>{{ __($company_details->company_name) }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" width="25%">
                                                    {{ __('Company Address') }}
                                                </th>
                                                <td>{{ __($company_details->company_address) }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" width="25%">
                                                    {{ __('Company Email Address') }}
                                                </th>
                                                <td>{{ __($company_details->company_email) }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" width="25%">
                                                    {{ __('Official Phone Number') }}
                                                </th>
                                                <td>{{ __($company_details->company_phone) }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" width="25%">
                                                    {{ __('Career Email Address') }}
                                                </th>
                                                <td>{{ __($company_details->company_career_mail) }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="text-right">
                    <a href="{{ route('company-policy.edit', $company_policy) }}" class="btn btn-outline-info mb-3 text-right">
                        <i class="fa fa-edit"></i>
                        {{ __('Edit') }}
                    </a>
                </div>
                <div class="mb-3 d-flex align-items-center justify-content-center">

                    <div class="border bg-light  w-25 p-3 mr-2">
                        <span class="d-block text-center">
                            <b>{{ __('Office Start Time') }}</b>
                        </span>
                        <span class="d-block text-center">
                            <b>{{ __(\Carbon\Carbon::createFromFormat('H:i:s',$company_policy->office_start_time)->format('h:i A')) }}</b>
                        </span>
                    </div>
                    <div class="border bg-light  w-25 p-3 ml-2">
                        <span class="d-block text-center">
                            <b>{{ __('Office End Time') }}</b>
                        </span>
                        <span class="d-block text-center">
                        <b>{{ __(\Carbon\Carbon::createFromFormat('H:i:s',$company_policy->office_end_time)->format('h:i A')) }}</b>
                        </span>
                    </div>
                </div>
                <div class="body table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td width="50%">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th class="border-0" scope="row" width="25%">
                                                    {{ __('Late Attendance Rule') }}
                                                </th>
                                                <td class="border-0">
                                                    <div class="pcy-view-1 d-block">
                                                        @if($company_policy->late_attendance_rule == 1)
                                                            {{ __('Count As Half Day') }}
                                                        @elseif($company_policy->late_attendance_rule == 2)
                                                            {{ __('Count As Full Day') }}
                                                        @endif
                                                        <button data-id="1" class="btn btn-sm btn-warning pcy-btn ml-3">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                    </div>
                                                    <div class="pcy-edit-1 d-none">
                                                        <form action="{{ route('company-policy.update.attendanceRule') }}" method="post">
                                                            @csrf
                                                            <div class="input-group">
                                                                <select name="late_attendance_rule" id="late_attendance_rule" class="form-control">
                                                                    <option value="">Select Rule</option>
                                                                    <option value="1" {{ $company_policy->late_attendance_rule == 1 ? 'selected' : '' }}>
                                                                        {{ __('Count As Half Day') }}
                                                                    </option>
                                                                    <option value="2" {{ $company_policy->late_attendance_rule == 2 ? 'selected' : '' }}>
                                                                        {{ __('Count As Full Day') }}
                                                                    </option>
                                                                </select>
                                                                <button type="submit" id="lar_submit" class="btn btn-success" style="border-top-left-radius: 0px!important; border-bottom-left-radius: 0px!important;">
                                                                    <i class="fa fa-check"></i>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td width="50%">
                                    <table style="width: 100%;">
                                        <tbody>
                                            <tr>
                                                <th class="border-0" scope="row" width="25%">
                                                    {{ __('Half Day Absent Rule') }}
                                                </th>
                                                <td class="border-0">
                                                    <div class="pcy-view-2 d-block">
                                                        @if($company_policy->half_day_absent_rule == 1)
                                                            {{ __('Deduct Salary By Percentage ('. $company_policy->half_day_absent_rule_value .'% of Daily Salary)') }}
                                                        @elseif($company_policy->half_day_absent_rule == 2)
                                                            {{ __('Deduct Salary By Fixed Amount') }}
                                                        @endif
                                                        <button data-id="1" class="btn btn-sm btn-warning pcy-btn ml-3">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                    </div>
                                                    <div class="pcy-edit-2 d-none">
                                                        <form action="{{ route('company-policy.update.hdar') }}" method="post">
                                                            @csrf
                                                            <div class="input-group">
                                                                <select name="half_day_absent_rule" id="half_day_absent_rule" class="form-control">
                                                                    <option value="">Select Rule</option>
                                                                    <option value="1" {{ $company_policy->half_day_absent_rule == 1 ? 'selected' : '' }}>
                                                                        {{ __('Deduct Salary By Percentage') }}
                                                                    </option>
                                                                    <option value="2" {{ $company_policy->half_day_absent_rule == 2 ? 'selected' : '' }}>
                                                                        {{ __('Deduct Salary By Fixed Amount') }}
                                                                    </option>
                                                                </select>
                                                                <input type="text" name="half_day_absent_rule_value" id="half_day_absent_rule_value" 
                                                                    class="form-control" value="{{ $company_policy->half_day_absent_rule_value }}">
                                                                <button type="submit" id="hdar_submit" class="btn btn-success" 
                                                                    style="border-top-left-radius: 0px!important; border-bottom-left-radius: 0px!important;">
                                                                    <i class="fa fa-check"></i>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th class="border-0" scope="row" width="25%">
                                                    {{ __('Full Day Absent Rule') }}
                                                </th>
                                                <td class="border-0">
                                                    <div class="pcy-view-3 d-block">
                                                        @if($company_policy->full_day_absent_rule == 1)
                                                            {{ __('Deduct Salary By Percentage ('. $company_policy->full_day_absent_rule_value .'% of Daily Salary)') }}
                                                        @elseif($company_policy->full_day_absent_rule == 2)
                                                            {{ __('Deduct Salary By Fixed Amount') }}
                                                        @endif
                                                        <button data-id="1" class="btn btn-sm btn-warning pcy-btn ml-3">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                    </div>
                                                    <div class="pcy-edit-3 d-none">
                                                        <form action="{{ route('company-policy.update.hdar') }}" method="post">
                                                            @csrf
                                                            <div class="input-group">
                                                                <select name="full_day_absent_rule" id="full_day_absent_rule" class="form-control">
                                                                    <option value="">Select Rule</option>
                                                                    <option value="1" {{ $company_policy->full_day_absent_rule == 1 ? 'selected' : '' }}>
                                                                        {{ __('Deduct Salary By Percentage') }}
                                                                    </option>
                                                                    <option value="2" {{ $company_policy->full_day_absent_rule == 2 ? 'selected' : '' }}>
                                                                        {{ __('Deduct Salary By Fixed Amount') }}
                                                                    </option>
                                                                </select>
                                                                <input type="text" name="full_day_absent_rule_value" id="full_day_absent_rule_value" 
                                                                    class="form-control" value="{{ $company_policy->full_day_absent_rule_value }}">
                                                                <button type="submit" id="fdar_submit" class="btn btn-success" 
                                                                    style="border-top-left-radius: 0px!important; border-bottom-left-radius: 0px!important;">
                                                                    <i class="fa fa-check"></i>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th class="border-0" scope="row" width="25%">
                                                    {{ __('Paid Leave Rule') }}
                                                </th>
                                                <td class="border-0">
                                                    <div class="pcy-view-4 d-block">
                                                        @if($company_policy->paid_leave_rule == 3)
                                                            {{ __('Applicable after 3 months') }}
                                                        @elseif($company_policy->paid_leave_rule == 6)
                                                            {{ __('Applicable after 6 months') }}
                                                        @elseif($company_policy->paid_leave_rule == 9)
                                                            {{ __('Applicable after 9 months') }}
                                                        @elseif($company_policy->paid_leave_rule == 12)
                                                            {{ __('Applicable after 12 months') }}
                                                        @endif
                                                        <button data-id="1" class="btn btn-sm btn-warning pcy-btn ml-3">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                    </div>
                                                    <div class="pcy-edit-4 d-none">
                                                        <form action="{{ route('company-policy.update.hdar') }}" method="post">
                                                            @csrf
                                                            <div class="input-group">
                                                                <select name="paid_leave_rule" id="paid_leave_rule" class="form-control">
                                                                    <option value="">Select Rule</option>
                                                                    <option value="3" {{ $company_policy->paid_leave_rule == 3 ? 'selected' : '' }}>
                                                                        {{ __('Applicable after 3 months') }}
                                                                    </option>
                                                                    <option value="6" {{ $company_policy->paid_leave_rule == 6 ? 'selected' : '' }}>
                                                                        {{ __('Applicable after 6 months') }}
                                                                    </option>
                                                                    <option value="9" {{ $company_policy->paid_leave_rule == 9 ? 'selected' : '' }}>
                                                                        {{ __('Applicable after 9 months') }}
                                                                    </option>
                                                                    <option value="12" {{ $company_policy->paid_leave_rule == 12 ? 'selected' : '' }}>
                                                                        {{ __('Applicable after 12 months') }}
                                                                    </option>
                                                                </select>
                                                                <button type="submit" id="pdlr_submit" class="btn btn-success" 
                                                                    style="border-top-left-radius: 0px!important; border-bottom-left-radius: 0px!important;">
                                                                    <i class="fa fa-check"></i>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th class="border-0" scope="row" width="35%">
                                                    {{ __('Unpaid Leave Rule') }}
                                                </th>
                                                <td class="border-0">
                                                    <div class="pcy-view-5 d-block">
                                                        @if($company_policy->unpaid_leave_rule == 1)
                                                            {{ __('Count As Absent') }}
                                                        @elseif($company_policy->unpaid_leave_rule == 2)
                                                            {{ __('Count As Half Day') }}
                                                        @endif
                                                        <button data-id="1" class="btn btn-sm btn-warning pcy-btn ml-3">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                    </div>
                                                    <div class="pcy-edit-5 d-none">
                                                        <form action="{{ route('company-policy.update.hdar') }}" method="post">
                                                            @csrf
                                                            <div class="input-group">
                                                                <select name="unpaid_leave_rule" id="unpaid_leave_rule" class="form-control">
                                                                    <option value="">Select Rule</option>
                                                                    <option value="1" {{ $company_policy->unpaid_leave_rule == 1 ? 'selected' : '' }}>
                                                                        {{ __('Count As Absent') }}
                                                                    </option>
                                                                    <option value="2" {{ $company_policy->unpaid_leave_rule == 2 ? 'selected' : '' }}>
                                                                        {{ __('Count As Half Day') }}
                                                                    </option>
                                                                </select>
                                                                <button type="submit" id="unplr_submit" class="btn btn-success" 
                                                                    style="border-top-left-radius: 0px!important; border-bottom-left-radius: 0px!important;">
                                                                    <i class="fa fa-check"></i>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th class="border-0" scope="row" width="25%">
                                                    {{ __('Attendance Buffer Time') }}
                                                </th>
                                                <td class="border-0">
                                                    {{ __($company_policy->attendance_buffer_time . ' mins')
                                                         . " [" . \Carbon\Carbon::createFromFormat('H:i:s',$company_policy->office_start_time)->format('h:i A') . " - " . \Carbon\Carbon::createFromFormat('H:i:s',$company_policy->office_start_time)->addMinute($company_policy->attendance_buffer_time)->format('h:i A') . "]" }}
                                                    <!-- edit button -->
                                                    <a href="" data-toggle="modal" data-target="#edit-policy-custom" class="ml-3 btn btn-sm btn-outline-warning">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th class="border-0" scope="row" width="25%">
                                                    {{ __('Attendance Bonus Rule') }}
                                                </th>
                                                <td class="border-0">
                                                    @if($company_policy->attendance_bonus_rule_value_type == 1)
                                                        {{ __('Applicable If 100% Attendance') . " (" . $company_policy->attendance_bonus_rule_value . "%)" }}
                                                    @elseif($company_policy->attendance_bonus_rule_value_type == 2)
                                                        {{ __('Fixed Amount') . " (" . $company_policy->attendance_bonus_rule_value . " tk)" }}
                                                    @endif
                                                    <!-- edit button -->
                                                    <a href="" data-toggle="modal" data-target="#edit-policy-custom" class="ml-3 btn btn-sm btn-outline-warning">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th class="border-0" scope="row" width="25%"> 
                                                    {{ __('Overtime Rule') }}
                                                </th>
                                                <td class="border-0">
                                                    @if($company_policy->overtime_rule == 1)
                                                        {{ __('Not applicable')}}
                                                    @elseif($company_policy->overtime_rule == 2)
                                                        {{ __('Applicable') . " (" . $company_policy->overtime_rule_value . " tk)" }}
                                                    @endif
                                                    <!-- edit button -->
                                                    <a href="" data-toggle="modal" data-target="#edit-policy-custom" class="ml-3 btn btn-sm btn-outline-warning">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th class="border-0" scope="row" width="25%">
                                                    {{ __('Launch Wastage Rule') }}
                                                </th>
                                                <td class="border-0">
                                                    @if($company_policy->launch_wastage_rule == 1)
                                                        {{ __('Not applicable')}}
                                                    @elseif($company_policy->launch_wastage_rule == 2)
                                                        @if($company_policy->launch_wastage_rule_value == 1)
                                                            {{ __('Pay Launch Payment')}} 
                                                        @else
                                                            {{ __('Deduct From Salary')}}
                                                        @endif
                                                    @endif
                                                    <!-- edit button -->
                                                    <a href="" data-toggle="modal" data-target="#edit-policy-custom" class="ml-3 btn btn-sm btn-outline-warning">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th class="border-0" width="25">
                                                    {{ __('Festival Bonus Rule') }}
                                                </th>
                                                <td class="border-0">
                                                    @if($company_policy->festival_bonus_rule == 1)
                                                        {{ __('Not applicable')}}
                                                    @elseif($company_policy->festival_bonus_rule == 2)
                                                        @if($company_policy->festival_bonus_rule_value == 1)
                                                            {{ __('Percentage Of Salary') . " (" . $company_policy->festival_bonus_rule_value . "%)" }} 
                                                        @else
                                                            {{ __('Fixed Amount') . " (" . $company_policy->festival_bonus_rule_value . " tk)"}}
                                                        @endif
                                                    @endif
                                                    <!-- edit button -->
                                                    <a href="" data-toggle="modal" data-target="#edit-policy-custom" class="ml-3 btn btn-sm btn-outline-warning">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection