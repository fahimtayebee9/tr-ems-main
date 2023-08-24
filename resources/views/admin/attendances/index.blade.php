@extends('admin.layouts.app-v2')

@section('body')
    @php
        $company_policy = \App\Models\CompanyPolicy::all();
    @endphp
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                @include('admin.includes.breadcrumb-v2')
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-end">
                <a class="btn btn-primary" href="{{ route('admin.attendance.seedDatabase') }}"><i class="fa fa-plus mr-2"></i>
                    Seed Database</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.attendance.export') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group m-0">
                                    @php
                                        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                                    @endphp
                                    <select name="month" class="form-control show-tick">
                                        @foreach ($months as $key => $month)
                                            <option value="{{ $key + 1 }}"
                                                {{ $key + 1 == date('m') ? 'selected' : '' }}>{{ $month }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group m-0">
                                    @php
                                        $years = ['2019', '2020', '2021', '2022', '2023', '2024', '2025', '2026', '2027', '2028', '2029', '2030'];
                                    @endphp
                                    <select name="year" class="form-control show-tick">
                                        @foreach ($years as $year)
                                            <option value="{{ $year }}" {{ $year == date('Y') ? 'selected' : '' }}>
                                                {{ $year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group m-0">
                                    <select name="submission_type" class="form-control show-tick">
                                        <option value="1">Export</option>
                                        <option value="2">Preview</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary w-100" data-toggle="tooltip"
                                    data-title="Export Excel">
                                    <i class="fa fa-file-excel-o mr-2"></i>
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body attendance-table-box">
                    <div class="table-responsive" id="attendance-tbl">
                        @if (!empty($employees))
                            <table class="table table-striped custom-table table-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th>Employee</th>
                                        @php
                                            $total_days = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
                                        @endphp
                                        
                                        @for ($i = 1; $i <= $total_days; $i++)
                                            <th tabindex="0" aria-controls="employees_tbl" class="text-center">
                                                {{ date('d M', strtotime(date('Y-m-'. $i))) }}
                                            </th>
                                        @endfor
                                        <th class="sorting" aria-controls="employees_tbl">Summary</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $item)
                                        <tr role="row" class="even">
                                            <td class="d-flex justify-content-start align-items-center">
                                                <span>
                                                    <h6 class="mb-0">
                                                        {{ $item->user->first_name . ' ' . $item->user->last_name }}
                                                    </h6>
                                                    <span>{{ $item->employee_id }}</span>
                                                </span>
                                            </td>
                                            @for ($i = 1; $i <= $total_days; $i++)
                                                @php
                                                    $date = \Carbon\Carbon::create(date('Y'), date('m'), $i);
                                                    $week_days = ['saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday'];
                                                    $day = $week_days[$company_policy->where('policy_id','POLICY-WH')->first()->value-1];
                                                    
                                                    $attendance = \App\Models\Attendance::where('employee_id', $item->id)
                                                        ->whereDate('date', $date)
                                                        ->first();
                                                    
                                                @endphp
                                                @if (strtolower($date->format('l')) == $day)
                                                    <td>
                                                        <span class="badge badge-warning">WK</span>
                                                    </td>
                                                @elseif(empty($attendance))
                                                    <td class="text-center">
                                                        <span class="badge bg-inverse-danger">
                                                            <i class="fa fa-close text-danger"></i>
                                                        </span>
                                                    </td>
                                                @elseif(!empty($attendance))
                                                    <td class="text-center p-1">
                                                        @if ($attendance->status == 1)
                                                            <a href="javascript:void(0);"
                                                                class="m-0 text-center"
                                                                data-toggle="modal"
                                                                data-target="#attendance_info_{{ $item->employee_id }}">
                                                                <i class="fa fa-check text-success"></i>
                                                            </a>
                                                        @elseif($attendance->status == 2)
                                                            <a href="javascript:void(0);"
                                                                class="text-center" data-toggle="modal"
                                                                data-target="#attendance_info_{{ $item->employee_id }}">
                                                                <i class="fa fa-close text-danger"></i>
                                                            </a>
                                                        @elseif($attendance->status == 3)
                                                            <span class="text-center">
                                                                <a href="javascript:void(0);" data-toggle="modal"
                                                                    data-target="#attendance_info_{{ $item->employee_id }}">
                                                                    <i class="fa fa-close text-danger"></i>
                                                                </a>
                                                            </span>
                                                        @elseif($attendance->status == 5)
                                                            <a href="javascript:void(0);"
                                                                class="text-center" data-toggle="modal"
                                                                data-target="#attendance_info_{{ $item->employee_id }}">
                                                                LV
                                                            </a>
                                                        @elseif($attendance->status == 6)
                                                            <div class="text-center">
                                                                <a href="javascript:void(0);" data-bs-toggle="modal" data-target="#attendance_info_{{ $item->employee_id }}">
                                                                    {{-- <span class="first-off"> --}}
                                                                        <i class="fa fa-check text-success"></i>
                                                                        <i class="fa fa-close text-danger"></i>
                                                                    {{-- </span> --}}
                                                                </a>
                                                            </div>
                                                        @endif

                                                        @include('admin.includes.modals.mdl_daily_attendance')
                                                    </td>
                                                @endif
                                            @endfor
                                            <!-- Summary of attendance -->
                                            <td class="text-center">
                                                <a href="javascript:void(0);" class="btn btn-sm btn-primary"
                                                    data-toggle="modal"
                                                    data-target="#attendance_summary_{{ $item->employee_id }}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                @include('admin.includes.modals.mdl-attendance-summary')
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                {{-- <tfoot class="tfoot-default">
                                    <tr>
                                        <td>Summary</td>
                                        @for ($i = 1; $i <= $total_days; $i++)
                                            @php
                                                $date = \Carbon\Carbon::create(date('Y'), date('m'), $i);
                                                $company_policy = \App\Models\CompanyPolicy::first();
                                                $office_start_time = $company_policy->office_start_time;
                                                $office_end_time = $company_policy->office_end_time;
                                                $buffer_time = $company_policy->attendance_buffer_time;
                                                $week_days = ['saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday'];
                                                $day = $week_days[$company_policy->weekly_holiday-1];
                                                // add minutes to office_start_time with carbon
                                                $extended_start_time = \Carbon\Carbon::parse($office_start_time)->addMinutes($buffer_time)->format('Y-m-d H:i:s');

                                                $on_time = \App\Models\Attendance::whereDate('date', $date)->whereTime('in_time', "<",$extended_start_time)->get()->count();
                                                $late = \App\Models\Attendance::whereDate('date', $date)->whereTime('in_time', ">=",$extended_start_time)->get()->count();
                                                $absent = \App\Models\Employee::all()->count() - ($on_time + $late);
                                            @endphp
                                            <td>    
                                                @if ($date->format('l') == $day)
                                                    <span class="badge badge-default">Weekend</span>
                                                @else    
                                                    On Time: {{ $on_time }} <br>
                                                    Late: {{ $late }} <br>
                                                    Absent: {{ $absent }} <br>
                                                @endif
                                            </td>
                                        @endfor
                                    </tr>
                                </tfoot> --}}
                            </table>
                            <table style="width:100%!important; text-overflow: ellipsis;"
                                class="table table-hover js-basic-example dataTable table-custom table-striped m-b-0 c_list no-footer"
                                id="employees_tbl" role="grid" aria-describedby="employees_tbl_info">
                                
                                <tbody>
                                    
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-info">No Attendance Details Found</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
