@extends('employee.layouts.shreyu')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="table-header-actions row justify-content-between">
                        <div class="col-md-6">
                            <form action="" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group m-0">
                                            <select class="form-control custom-select select2-hidden-accessible w-100"
                                                name="month-flt" id="month-filter">
                                                <option>Select Month</option>
                                                <option value="1">January</option>
                                                <option value="2">February</option>
                                                <option value="3">March</option>
                                                <option value="4">April</option>
                                                <option value="5">May</option>
                                                <option value="6">June</option>
                                                <option value="7">July</option>
                                                <option value="8">August</option>
                                                <option value="9">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-success">Filter</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6 text-right">
                            {{-- Launch Invoicce Route --}}
                            <a href="{{ route('employee.launch-sheet.invoices') }}" type="submit"
                                class="btn btn-outline-info ml-2">Launch Invoice</a>
                            {{-- Calculate Total Launch Route --}}
                            <a href="{{ route('employee.launch-sheet.calculateTotalLaunch') }}" type="submit"
                                class="btn btn-outline-info ml-2">Calculate Total Launch</a>
                        </div>
                    </div>
                </div>
                @php
                    $current_month = session()->get('month_filter') ? session()->get('month_filter') : date('m');
                    $current_year = session()->get('year_filter') ? session()->get('year_filter') : date('Y');
                @endphp
                <div class="card-body">
                    <div class="table-responsive">
                        @if (!empty($users))
                            <table style="width:100%!important; text-overflow: ellipsis;"
                                class="table thead-default table-hover table-striped table-bordered dataTable dtr-inline"
                                role="grid" aria-describedby="employees_tbl_info">
                                <thead class="thead-dark">
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="employees_tbl" rowspan="1"
                                            colspan="1" aria-label="Name: activate to sort column ascending"
                                            style="width: 120.812px;">Employee</th>
                                        @php
                                            // get total days in current month
                                            $total_days = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
                                        @endphp
                                        {{-- loop through total days and print column name --}}
                                        @for ($i = 1; $i <= $total_days; $i++)
                                            @php
                                                $date = \Carbon\Carbon::create(date('Y'), date('m'), $i);
                                            @endphp
                                            <th tabindex="0" aria-controls="employees_tbl" rowspan="1" colspan="1"
                                                class="text-center p-1" style="width: 76px!important;">{{ $date->format('d-m-Y') }}
                                            </th>
                                        @endfor
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $item)
                                        @if (!empty($item))
                                            <tr role="row" class="even">
                                                <td class="d-block justify-content-start align-items-center" width="280px">
                                                    <h6 class="mb-0">{{ $item->first_name . ' ' . $item->last_name }}</h6>
                                                    @if ($item->employee != null)
                                                        <span>{{ $item->employee->employee_id }}</span>
                                                    @endif
                                                </td>
                                                {{-- @php
                                                    if($item->employee){
                                                        dd($item->employee);
                                                    }
                                                @endphp --}}
                                                @for ($i = 1; $i <= $total_days; $i++)
                                                    @php
                                                        // create carbon date from $i
                                                        $date = \Carbon\Carbon::create(date('Y'), date('m'), $i);
                                                        
                                                        // check if date is holiday from weekly_holiday day name in company policy table
                                                        $week_days = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
                                                        $company_policy = \App\Models\CompanyPolicy::first();
                                                        $day = $week_days[$company_policy->weekly_holiday];
                                                        
                                                        // check if attendance is marked for this date
                                                        $ldate_sheet = null;
                                                        $ldate_sheet = \App\Models\LaunchSheet::where('user_id', $item->id)
                                                            ->whereDate('date', $date)
                                                            ->first();
                                                        
                                                        $disabled = '';
                                                        if ($i < date('d')) {
                                                            $disabled = 'disabled';
                                                        }
                                                    @endphp

                                                    @if ($date->format('l') == $day)
                                                        <td class="text-center p-1">
                                                            <span class="badge badge-danger">W</span>
                                                        </td>
                                                    @elseif ($item->employee != null && $item->employee->employee_id == "1612001")
                                                        <td class="text-center p-1 {{ ($ldate_sheet != null && $ldate_sheet->status == 1) ? 'custom-status-changer-success' : 'custom-status-changer' }} ">
                                                            @if($i < date('d') && $ldate_sheet == null)
                                                                @if($ldate_sheet == null)
                                                                    <span class="badge badge-danger">
                                                                        <i class="far fa-window-close"></i>
                                                                    </span>
                                                                @elseif ($ldate_sheet->status == 1)
                                                                    <span class="badge badge-danger">
                                                                        <i class="far fa-window-close"></i>
                                                                    </span>
                                                                @else
                                                                    <span class="badge badge-success">
                                                                        <i class="fas fa-check"></i>
                                                                    </span>
                                                                @endif
                                                            @else
                                                                <select name="launch_status_manager" id="lstatus-manager" data-employeeId="{{ $item->employee->employee_id }}" 
                                                                    {{ $disabled }} class="lstatus custom-status-manager form-control border-success">
                                                                    <option value=""></option>
                                                                    <option value="1" {{ $ldate_sheet != null && $ldate_sheet->status == 1 ? 'selected' : '' }}>Yes</option>
                                                                    <option value="0" {{ $ldate_sheet != null && $ldate_sheet->status == 0 ? 'selected' : '' }}>No</option>
                                                                </select>
                                                            @endif
                                                        </td>
                                                    @elseif ($item->employee != null && $item->employee->employee_id == "1612004")
                                                        <td class="text-center p-1 {{ ($ldate_sheet != null && $ldate_sheet->status == 1) ? 'custom-status-changer-success' : 'custom-status-changer' }} ">
                                                            @if($i < date('d'))
                                                                @if($ldate_sheet == null)
                                                                    <span class="badge badge-danger">
                                                                        <i class="far fa-window-close"></i>
                                                                    </span>
                                                                @elseif ($ldate_sheet->status == 1)
                                                                    <span class="badge badge-danger">
                                                                        <i class="far fa-window-close"></i>
                                                                    </span>
                                                                @else
                                                                    <span class="badge badge-success">
                                                                        <i class="fas fa-check"></i>
                                                                    </span>
                                                                @endif
                                                            @else
                                                                
                                                                <input type="hidden" name="employee_id" value="{{ $item->employee->employee_id }}">
                                                                <input type="hidden" name="date" value="{{ $date }}">
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                                <select name="launch_status_astmanager" id="lstatus-astmanager" data-employeeId="{{ $item->employee->employee_id }}"
                                                                    {{ $disabled }} class="lstatus custom-status-astmanager form-control border-success">
                                                                    <option value=""></option>
                                                                    <option value="1" {{ $ldate_sheet != null && $ldate_sheet->status == 1 ? 'selected' : '' }}>Yes</option>
                                                                    <option value="0" {{ $ldate_sheet != null && $ldate_sheet->status == 0 ? 'selected' : '' }}>No</option>
                                                                </select>
                                                            @endif
                                                        </td>
                                                    @else
                                                        <td class="text-center p-1">
                                                            @if ($ldate_sheet != null && $ldate_sheet->status == 1)
                                                                <span class="badge badge-success">
                                                                    <i class="fas fa-check"></i>
                                                                </span>
                                                            @else
                                                                <span class="badge badge-danger">
                                                                    <i class="far fa-window-close"></i>
                                                                </span>
                                                            @endif
                                                        </td>
                                                    @endif
                                                @endfor
                                            </tr>
                                        @endif
                                    @endforeach
                                    <tr>
                                        <!-- Extra Launch -->

                                        <td>
                                            <h6 class="mb-0">Extra Launch</h6>
                                        </td>
                                        @for ($i = 1; $i <= $total_days; $i++)
                                            @php
                                                $ext_launch = \App\Models\ExtraLaunch::whereDate('date', $current_year . '-' . $current_month . '-' . $i)->first();
                                            @endphp
                                            <td>
                                                <!-- Ajax Form with select box -->
                                                @php
                                                    $disabled = '';
                                                    if ($i < date('d')) {
                                                        $disabled = 'disabled';
                                                    }
                                                @endphp
                                                {{-- {{ route('admin.launch-sheet.update') }} --}}
                                                <form action="" method="post"> 
                                                    @csrf
                                                    <input type="hidden" name="date_day" value="{{ $i }}">
                                                    <div class="form-group">
                                                        <select class="extra-launch-select form-control" {{ $disabled }}
                                                            name="extra_launch" id="extra-launch-{{ $i }}">
                                                            <option value="0"
                                                                @if (!empty($ext_launch) && $ext_launch->count == 0) selected @endif>0
                                                            </option>
                                                            <option value="1"
                                                                @if (!empty($ext_launch) && $ext_launch->count == 1) selected @endif>1
                                                            </option>
                                                            <option value="2"
                                                                @if (!empty($ext_launch) && $ext_launch->count == 2) selected @endif>2
                                                            </option>
                                                            <option value="3"
                                                                @if (!empty($ext_launch) && $ext_launch->count == 3) selected @endif>3
                                                            </option>
                                                            <option value="4"
                                                                @if (!empty($ext_launch) && $ext_launch->count == 4) selected @endif>4
                                                            </option>
                                                            <option value="5"
                                                                @if (!empty($ext_launch) && $ext_launch->count == 5) selected @endif>5
                                                            </option>
                                                            <option value="6"
                                                                @if (!empty($ext_launch) && $ext_launch->count == 6) selected @endif>6
                                                            </option>
                                                            <option value="7"
                                                                @if (!empty($ext_launch) && $ext_launch->count == 7) selected @endif>7
                                                            </option>
                                                            <option value="8"
                                                                @if (!empty($ext_launch) && $ext_launch->count == 8) selected @endif>8
                                                            </option>
                                                            <option value="9"
                                                                @if (!empty($ext_launch) && $ext_launch->count == 9) selected @endif>9
                                                            </option>
                                                            <option value="10"
                                                                @if (!empty($ext_launch) && $ext_launch->count == 10) selected @endif>10
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <button class="btn btn-sm btn-success" type="submit">Update</button>
                                                </form>
                                            </td>
                                        @endfor
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6 class="mb-0">Total</h6>
                                        </td>
                                        @for ($i = 1; $i <= $total_days; $i++)
                                            @php
                                                $extLaunchInfo = \App\Models\ExtraLaunch::whereDate('date', \Carbon\Carbon::create($current_year, $current_month, $i))->first();
                                                if ($i == 12) {
                                                    // dd($extLaunchInfo);
                                                }
                                            @endphp
                                            @if (!empty($extLaunchInfo))
                                                <td class="text-center p-1">
                                                    <b>{{ $extLaunchInfo->total_launch }}</b>
                                                </td>
                                            @else
                                                <td class="text-center p-1">
                                                    <b>0</b>
                                                </td>
                                            @endif
                                        @endfor
                                        <!-- Summary of attendance -->
                                    </tr>
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-info">No Details Found</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
