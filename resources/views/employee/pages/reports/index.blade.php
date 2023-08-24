@extends('employee.layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.reports.custom-weekly-report.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-2">
                            {{-- Last Days Select --}}
                            <div class="form-group m-0">
                                <label for="days_count">Last Days</label><br>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-secondary active">
                                        <input type="radio" class="radio_days_range" name="days_count"
                                            id="last_7_days" data-days="7" autocomplete="off"> 7 Days
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input type="radio" class="radio_days_range" name="days_count"
                                            id="last_14_days" data-days="14" autocomplete="off"> 14 Days
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input type="radio" class="radio_days_range" name="days_count"
                                            id="last_30_days" data-days="30" autocomplete="off"> 30 Days
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            {{-- week start date --}}
                            <div class="form-group m-0">
                                <label for="week_start_date">Week Start Date</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="week_start_date" id="week_start_date"
                                        class="form-control date" placeholder="Week Start Date"
                                        value="{{ old('week_start_date') }}">
                                    {{-- <input type="text" class="form-control date" placeholder="Ex: 30/07/2016"> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            {{-- week end date --}}
                            <div class="form-group m-0">
                                <label for="week_end_date">Week End Date</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="week_end_date" id="week_end_date"
                                        class="form-control datepicker" placeholder="Week End Date"
                                        value="{{ old('week_end_date') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group m-0">
                                <label for="caccount_id">Client Account</label>
                                <select name="caccount_id" id="caccountId" class="form-control select2">
                                    <option value="">Select Client Account</option>
                                    @foreach ($clientAccountList as $client_account)
                                        @php
                                            $marketplace = ($client_account->marketplace == 1) ? 'US' : 
                                                (($client_account->marketplace == 2) ? 'CA' : 'Walmart');
                                        @endphp
                                        <option value="{{ $client_account->id }}">
                                            {{ $client_account->account_name }} [{{ $marketplace }}]
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            {{-- Report Type --}}
                            <div class="form-group m-0">
                                <label for="report_type">Report Type</label>
                                <select name="report_type" id="reportType" class="form-control">
                                    <option value="">Select Report Type</option>
                                    <option value="2">Weekly</option>
                                    <option value="5">Bi-Weekly</option>
                                    <option value="3">Monthly</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group m-0">
                                <br>
                                <button type="submit" class="btn btn-primary m-auto w-100 font-weight-bold">Generate</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsivex">
                    <table class="table table-striped custom-table mb-0" id="tbl-reports-list">
                        <thead>
                            <tr class="align-items-center">
                                <th class="align-middle text-left" width="5%">#</th>
                                <th class="align-middle text-center" width="10%">Week</th>
                                <th class="align-middle text-center">Client</th>
                                <th class="align-middle text-center">All Sales <br><span
                                        style="font-size: 14px;">(Amount)</span></th>
                                <th class="align-middle text-center">All Sales <br><span
                                        style="font-size: 14px;">(Units)</span></th>
                                <th class="align-middle text-center">Ads Sales <br><span
                                        style="font-size: 14px;">(Amount)</span></th>
                                <th class="align-middle text-center">Ads Sales <br><span
                                        style="font-size: 14px;">(Units)</span></th>
                                <th class="align-middle text-center">ACOS</th>
                                <th class="align-middle text-center">TACOS</th>
                                <th class="align-middle text-center">Ads Spend</th>
                                <th class="align-middle text-center">ROAS</th>
                                <th class="align-middle text-center">Meeting Notes</th>
                                <th class="align-middle text-center">Tasks</th>
                                <th class="align-middle text-center" width="5%">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbd-weekly-reports">
                            @if(count($weeklyReports) > 0)
                                @php
                                    $list = [];
                                @endphp
                                @foreach ($weeklyReports as $item)
                                    @php
                                        $list[] = $item->caccount_id;
                                    @endphp
                                    @if (Auth::user()->employee->getAccountManagers->count() > 0)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="text-center">
                                            {{ date('d M, Y', strtotime($item->start_date)) }} -
                                            {{ date('d M, Y', strtotime($item->end_date)) }}
                                        </td>
                                        <td class="text-center">
                                            @php
                                                $list_of_accounts = Auth::user()->employee->getAccountManagers->pluck('account_id')->toArray();
                                            @endphp
                                            @if (in_array($item->caccount_id, $list_of_accounts))
                                                @php
                                                    $marketplace = ($item->clientAccount->marketplace == 1) ? 'US' : (($item->clientAccount->marketplace == 2) ? 'CA' : 'Walmart');
                                                @endphp
                                                {{ $item->clientAccount->account_name }} [{{ $marketplace }}]
                                            @endif
                                        </td>
                                        <td class="text-center total_sales_td">
                                            ${{ $item->total_sales }}
                                        </td>
                                        <td class="text-center total_sales_units_td">
                                            {{ ($item->total_order_units > 0) ? $item->total_order_units : 0 }}
                                        </td>
                                        <td class="text-center">
                                            ${{ $item->total_ads_sales }}
                                        </td>
                                        <td class="text-center">
                                            {{ ($item->total_ads_order_units > 0) ? $item->total_ads_order_units : 0 }}
                                        </td>
                                        <td class="text-center">
                                            {{ $item->average_acos }}%
                                        </td>
                                        <td class="text-center">
                                            {{ $item->average_tacos }}%
                                        </td>
                                        <td class="text-center">
                                            ${{ $item->total_cost }}
                                        </td>
                                        <td class="text-center">
                                            {{ $item->average_roas }}
                                        </td>
                                        <td class="text-center">
                                            {{ $item->count_meeting_notes }}
                                        </td>
                                        <td class="text-center">
                                            {{ $item->count_daily_tasks }}
                                        </td>
                                        <td class="text-center">
                                            <a href="" type="button" class="btn btn-warning" data-target="#edit-weekly-sales-row" data-toggle="modal">
                                                <i class="fa fa-pencil"></i>
                                            </a>

                                            <button type="button" class="btn btn-danger dlt-weekly-report" data-crsf="{{ csrf_token() }}"
                                                data-url="{{ route('admin.reports.custom-weekly-report.destroy', $item->id) }}" data-rowId="{{$item->id}}" id="destroy-weekly-sales-{{ $item->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>

                                            <a href="" type="button" class="btn btn-info" data-target="#mdl-download-report-form-{{ $item->id }}" data-toggle="modal">
                                                <i class="fa fa-download"></i>
                                            </a>
                                            
                                            {{-- MODAL FOR UPDATE UNITS --}}
                                            @include('admin.weekly-reports.modals.mdl-edit-weekly-report')

                                            {{-- MODAL FOR DELETE REPORT --}}
                                            <div class="modal fade" id="destroy-weekly-sales-row" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="title text-danger" style="font-size: 20px; margin: 0px;" id="edit-weekly-sales-rowLabel">Confirmation</h4>
                                                        </div>

                                                        <form action="{{ route('admin.reports.custom-weekly-report.destroy', $item->id) }}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="modal-body text-dark text-left">
                                                                <div class="form-group">
                                                                    <p style="font-size: 18px;">Are you sure you want to delete this report?</p>
                                                                </div>
                                                                <div class="form-group m-0 text-center">
                                                                    <button type="submit" class="btn btn-primary">Yes</button>
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- MODAL FOR DOWNLOAD REPORT --}}
                                            <div class="modal fade" id="mdl-download-report-form-{{ $item->id }}" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="title" id="mdl-download-report-formLabel">Download Report</h4>
                                                        </div>
                                                        <form action="{{ route('admin.reports.custom-weekly-report.download.pdf', $item->id) }}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="client_account_id" value="{{ $item->caccount_id }}">
                                                            <div class="modal-body text-dark text-left">
                                                                <div class="form-group">
                                                                    <label for="marketplace" class="d-block">Do you want to include Tasks?</label>
                                                                    <select name="insert_tasks" id="ins_tasks" class="form-control">
                                                                        <option value="">Select Option</option>
                                                                        <option value="1">Yes</option>
                                                                        <option value="0">No</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">DOWNLOAD</button>
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="14" class="text-center">No Data Found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection