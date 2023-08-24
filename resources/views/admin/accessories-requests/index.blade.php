@extends('admin.layouts.app-v2')

@section('body')

    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                @include('admin.includes.breadcrumb-v2')
            </div>
            <div class="col-auto float-end ms-auto">
                <a href="#" type="button" data-toggle="modal" data-target="#mdl-accessories-request-total" class="btn btn-info text-capitalize">
                    <i class="fa fa-eye"></i>
                    view total requested accessories
                </a>

                <a href="" class="btn btn-success" data-toggle="tooltip" data-title="Download Total Accessories Request Count">
                    {{-- excel file icon --}}
                    <i class="fa fa-file-excel-o"></i>
                    Export EXCEL
                </a>

                @include('admin.pc_configurations.modals.emp-accessories-request')
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-3">
                            <select name="flt-emp-accessories-request" id="flt-emp-accessories-request"
                                class="form-control select2">
                                <option value="">Select Employee</option>
                                @foreach (\App\Models\Employee::all() as $employee)
                                    <option value="{{ $employee->id }}">
                                        {{ $employee->user->first_name . ' ' . $employee->user->last_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="flt-status-accessories-request" id="flt-status-accessories-request"
                                class="form-control select2">
                                <option value="">Select Status</option>
                                <option value="pending">Pending</option>
                                <option value="approved">Approved</option>
                                <option value="rejected">Rejected</option>
                            </select>
                        </div>
                        <div class="col-md-4 d-flex">
                            <div class="form-group form-focus focused w-50 m-0">
                                <div class="cal-icon">
                                    <input class="form-control floating datetimepicker" type="text">
                                </div>
                                <label class="focus-label">From</label>
                            </div>
                            <div class="form-group form-focus focused w-50 m-0">
                                <div class="cal-icon">
                                    <input class="form-control floating datetimepicker ml-2" type="text">
                                </div>
                                <label class="focus-label">To</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-primary" id="btn-filter-accessories-request">
                                <i class="fa fa-search"></i> Filter
                            </button>
                            <button type="button" class="btn btn-danger" id="btn-reset-accessories-request">
                                <i class="fa fa-refresh"></i> Reset
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (!empty($list_of_requests))
                        <div class="table-responsive">
                            <table class="table table-hover m-b-0">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Employee</th>
                                        <th class="text-center">Request Date</th>
                                        <th class="text-center">Approved By</th>
                                        <th class="text-center">Approve Date</th>
                                        <th class="text-center">Requested Items</th>
                                        <th class="text-center" width="160">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list_of_requests as $sheet)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-left">
                                                {{ $sheet->employee->user->first_name . ' ' . $sheet->employee->user->last_name }}
                                                <span class="d-block text-small">
                                                    ID: {{ $sheet->employee->user->username }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                {{ date('d M, Y', strtotime($sheet->request)) }}
                                            </td>
                                            <td class="text-center">
                                                @if ($sheet->status == 'approved')
                                                    {{ $sheet->approved_by->first_name . ' ' . $sheet->approved_by->last_name }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                {{ date('d M, Y', strtotime($sheet->approved_date)) }}
                                            </td>
                                            <td class="text-center">
                                                @php
                                                    $status_classes = [
                                                        'pending' => 'warning',
                                                        'approved' => 'success',
                                                        'rejected' => 'danger',
                                                    ];
                                                    
                                                    $statusList = $sheet->itemsList->pluck('status')->toArray();
                                                    $totalCountArray = array_count_values($statusList);
                                                    $countPending = isset($totalCountArray['pending']) ? $totalCountArray['pending'] : 0;
                                                    $countRejected = isset($totalCountArray['rejected']) ? $totalCountArray['rejected'] : 0;
                                                @endphp
                                                @if ($countPending > 0)
                                                    <span class="badge badge-warning">Pending</span>
                                                @elseif ($countRejected > 0)
                                                    <span class="badge badge-danger">Rejected</span>
                                                @else
                                                    <span class="badge badge-success">Approved</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="" type="button"
                                                    data-target="#mdl-accessories-request-{{ $sheet->id }}"
                                                    data-toggle="modal" class="btn btn-sm btn-primary exploder">
                                                    <i class="fa fa-eye"></i>
                                                    <span>View</span>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr class="explode hide rq-item-row">
                                            <td colspan="7" style="background: #fff; display: none;">
                                                <table class="table table-condensed">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Item</th>
                                                            <th width="40%">Issue</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="rqst-item-object-tbody">
                                                        @foreach ($sheet->itemsList as $item)
                                                            <tr class="rqst-item-object">
                                                                <th>{{ $loop->iteration }}</th>
                                                                <th width="25%" class="text-left text-muted text-uppercase">
                                                                    {{ $item->accessory->item_name }}
                                                                </th>
                                                                <td class="text-left">{{ $item->issue }}</td>
                                                                <td>
                                                                    <select data-url="{{ route('admin.computer-configurations.requests.update') }}" data-csrf="{{ csrf_token() }}" 
                                                                        data-rid="{{$item->id}}" name="acc-item-request-status" id="item-status-{{ $item->id }}"
                                                                        class="form-control">
                                                                        <option value="pending"
                                                                            @if ($item->status == 'pending') selected @endif>Pending
                                                                        </option>
                                                                        <option value="approved"
                                                                            @if ($item->status == 'approved') selected @endif>Approved
                                                                        </option>
                                                                        <option value="rejected"
                                                                            @if ($item->status == 'rejected') selected @endif>Rejected
                                                                        </option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info">No Salary Sheets Found</div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
