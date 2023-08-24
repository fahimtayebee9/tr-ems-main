@extends('admin.layouts.app')

@section('body')
    <div class="page-header">
        <div class="row">
            <div class="col-md-6">
                @include('admin.includes.breadcrumb-v2')
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-end">
                <a class="btn btn-primary" href="{{ route('admin.reports.custom-weekly-report.generate.blank') }}">
                    <i class="fa fa-plus"></i> Generate Report
                </a>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="body" style="min-height: 70vh;">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0" id="tbl-leave-applications">
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
                                    <th class="align-middle text-center" width="5%">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tbd-weekly-reports">
                                @foreach ($weeklyReports as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="text-center">
                                            {{ date('d M, Y', strtotime($item->week_start)) }} -
                                            {{ date('d M, Y', strtotime($item->week_end)) }}
                                        </td>
                                        <td class="text-center">
                                            {{ $item->clientAccount->account_name }}
                                        </td>
                                        <td class="text-center total_sales_td">
                                            <div class="input-group d-none" id="update_total_sales">
                                                <input type="text" class="form-control" name="total_sales_update" 
                                                    style="max-width: 100px!important;" value="{{ $item->total_sales }}">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="button" style="">
                                                        {{-- check icon --}}
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                    <button class="btn btn-outline-secondary" type="button" style="">
                                                        {{-- close icon --}}
                                                        <i class="fa fa-close"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <span class="d-block" id="td_total_sales_data">    
                                                ${{ $item->total_sales }}
                                            </span>
                                        </td>
                                        <td class="text-center total_sales_units_td">
                                            <div class="input-group d-none" id="update_total_sales_units">
                                                <input type="text" class="form-control" name="total_sales_units_update" 
                                                    style="max-width: 100px!important;" value="{{ $item->total_sales }}">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="button" style="">
                                                        {{-- check icon --}}
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                    <button class="btn btn-outline-secondary" type="button" id="close_total_sales_update" style="">
                                                        {{-- close icon --}}
                                                        <i class="fa fa-close"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <span class="d-block" id="td_total_sales_units_data">
                                                {{ ($item->total_units > 0) ? $item->total_units : 0 }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            ${{ $item->total_ads_sales }}
                                        </td>
                                        <td class="text-center">
                                            {{ $item->ads_units }}
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
                                        <td>

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
