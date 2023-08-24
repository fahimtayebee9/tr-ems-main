@extends('admin.layouts.app')

@section('body')
    <div class="page-header">
        <div class="row">
            <div class="col-md-6">
                @include('admin.includes.breadcrumb-v2')
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-end">
                <a class="btn btn-primary" href="{{ route('admin.reports.custom-weekly-report.reset') }}">
                    <i class="fa fa-plus"></i> Reset Report Form
                </a>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    
                    <form action="{{ route('admin.reports.custom-weekly-report.generate.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="report_number">Report ID</label>
                                    <input type="text" name="report_number" id="report_number" class="form-control"
                                        placeholder="Report ID" disabled value="{{ $report_number }}">
                                    <input type="hidden" value="{{ $report_number }}">
                                    <input type="hidden" name="report_type" value="{{session()->get('report_type')}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="week">Client Name</label>
                                    <select name="client_name" id="" class="form-control">
                                        <option value="">Select Client</option>
                                        @foreach ($clientAccountList as $item)
                                            <option value="{{ $item->id }}">{{ $item->account_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="week_start_date">Week Start Date</label>
                                    <div class="input-group date" data-date-autoclose="true" data-provide="datepicker">
                                        <input type="text"  name="week_start_date" id="week_start_date" value="{{ old('week_start_date') }}" class="form-control">
                                        <div class="input-group-append">                                            
                                            <button class="btn btn-outline-secondary" type="button"><i class="fa fa-calendar"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="week_end_date">Week End Date</label>
                                    <div class="input-group date" data-date-autoclose="true" data-provide="datepicker">
                                        <input type="text"  name="week_end_date" id="week_end_date" class="form-control"
                                            placeholder="Week End Date" value="{{ old('week_end_date') }}">
                                        <div class="input-group-append">                                            
                                            <button class="btn btn-outline-secondary" type="button"><i class="fa fa-calendar"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="amz_seller_support_issues">Seller Support Issues [AMAZON]</label>
                                    <input type="text" name="amz_seller_support_issues" id="amz_seller_support_issues" class="form-control"
                                        placeholder="" value="{{ old('amz_seller_support_issues') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="amz_seller_support_case_url">Seller Support Case URL [AMAZON]</label>
                                    <input type="text" name="amz_seller_support_case_url" id="amz_seller_support_case_url" class="form-control"
                                        placeholder="" value="{{ old('amz_seller_support_case_url') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="walmart_seller_support_issues">Seller Support Issues <b>[WALMART]</b></label>
                                    <input type="text" name="walmart_seller_support_issues" id="walmart_seller_support_issues" class="form-control"
                                        placeholder="" value="{{ old('walmart_seller_support_issues') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="walmart_seller_support_case_url">Seller Support Case URL <b>[WALMART]</b></label>
                                    <input type="text" name="walmart_seller_support_case_url" id="walmart_seller_support_case_url" class="form-control"
                                        placeholder="" value="{{ old('walmart_seller_support_case_url') }}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            {{-- checkbox for amazon[us], amazon[ca], walmart --}}
                            <div class="col-md-12">
                                <label>Choose which details you want to add,</label>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="fancy-checkbox" >
                                        <label>
                                            <input type="checkbox" id="chk_add_amazon_us" name="chk_add_amazon_us">
                                            <span>Add <b>AMAZON [US]</b> Market Informations</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="fancy-checkbox">
                                        <label>
                                            <input type="checkbox" id="chk_add_amazon_ca" name="chk_add_amazon_ca">
                                            <span>Add <b>AMAZON [CANADA]</b> Market Informations</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="fancy-checkbox">
                                        <label>
                                            <input type="checkbox" id="chk_add_walmart" name="chk_add_walmart">
                                            <span>Add <b>WALMART</b> Market Informations</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 d-flex justify-content-between align-items-center">
                                <div class="form-group">
                                    <div class="fancy-checkbox">
                                        <label>
                                            <input type="checkbox" id="chk_add_meeting_notes" name="chk_add_meeting_notes">
                                            <span>Add <b>Meeting Notes</b></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="fancy-checkbox">
                                        <label>
                                            <input type="checkbox" id="chk_add_tasks" name="chk_add_tasks">
                                            <span>Add <b>Tasks</b></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card d-none" id="accordion_amazon_us_info">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0 d-flex w-100 justify-content-between align-items-center">
                                        <span style="">Amazon [United States Of America]</span>
                                        <div class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                            {{-- arrow down --}}
                                            <i class="fa fa-arrow-down"></i>
                                        </div>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="us_one_year_total_sales_amount">Total Sales Amount [One Year
                                                        Ago]</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">$</span>
                                                        </div>
                                                        <input type="text" name="us_one_year_total_sales_amount"
                                                            id="us_one_year_total_sales_amount" class="form-control"
                                                            value="{{ old('us_one_year_total_sales_amount') }}"
                                                            aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="us_one_year_total_sales_unit">Total Sales Unit [One Year Ago]</label>
                                                    <input type="text" name="us_one_year_total_sales_unit"
                                                        id="us_one_year_total_sales_unit" class="form-control"
                                                        value="{{ old('us_one_year_total_sales_unit') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="us_last_week_total_sales_amount">Total Sales Amount [Last Week]</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">$</span>
                                                        </div>
                                                        <input type="text" name="us_last_week_total_sales_amount"
                                                            id="us_last_week_total_sales_amount" class="form-control"
                                                            value="{{ old('us_last_week_total_sales_amount') }}"
                                                            aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="us_last_week_total_sales_unit">Total Sales Unit [Last Week]</label>
                                                    <input type="text" name="us_last_week_total_sales_unit"
                                                        id="us_last_week_total_sales_unit" class="form-control"
                                                        value="{{ old('us_last_week_total_sales_unit') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="us_current_week_total_sales_amount">Total Sales Amount [Current
                                                        Week]</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">$</span>
                                                        </div>
                                                        <input type="text" name="us_current_week_total_sales_amount"
                                                            id="us_current_week_total_sales_amount" class="form-control"
                                                            value="{{ old('us_current_week_total_sales_amount') }}"
                                                            aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="us_current_week_total_sales_unit">Total Sales Unit [Current
                                                        Week]</label>
                                                    <input type="text" name="us_current_week_total_sales_unit"
                                                        id="us_current_week_total_sales_unit" class="form-control"
                                                        value="{{ old('us_current_week_total_sales_unit') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="us_current_week_ads_sales_amount">Ads Sales Amount [Current
                                                        Week]</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">$</span>
                                                        </div>
                                                        <input type="text" name="us_current_week_ads_sales_amount"
                                                            id="us_current_week_ads_sales_amount" class="form-control"
                                                            value="{{ old('us_current_week_ads_sales_amount') }}"
                                                            aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="us_current_week_ads_sales_unit">Ads Sales Unit [Current Week]</label>
                                                    <input type="text" name="us_current_week_ads_sales_unit"
                                                        id="us_current_week_ads_sales_unit" class="form-control"
                                                        value="{{ old('us_current_week_ads_sales_unit') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="us_current_week_acos">ACOS [Current Week]</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">%</span>
                                                        </div>
                                                        <input type="text" name="us_current_week_acos" id="us_current_week_acos"
                                                            class="form-control" value="{{ old('us_current_week_acos') }}"
                                                            aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="us_current_week_tacos">TACOS [Current Week]</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">%</span>
                                                        </div>
                                                        <input type="text" name="us_current_week_tacos" id="us_current_week_tacos"
                                                            class="form-control" value="{{ old('us_current_week_tacos') }}"
                                                            aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="us_current_week_ads_spend">Ads Spend [Current Week]</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">$</span>
                                                        </div>
                                                        <input type="text" name="us_current_week_ads_spend"
                                                            id="us_current_week_ads_spend" class="form-control"
                                                            value="{{ old('us_current_week_ads_spend') }}"
                                                            aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="us_current_week_ads_roas">ROAS [Current Week]</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">$</span>
                                                        </div>
                                                        <input type="text" name="us_current_week_ads_roas"
                                                            id="us_current_week_ads_roas" class="form-control"
                                                            value="{{ old('us_current_week_ads_roas') }}"
                                                            aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card d-none" id="accordion_amazon_ca_info">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0 d-flex w-100 justify-content-between align-items-center">
                                        <span style="">Amazon [Canada]</span>
                                        <div class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            {{-- arrow down --}}
                                            <i class="fa fa-arrow-down"></i>
                                        </div>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="ca_one_year_total_sales_amount">Total Sales Amount [One Year
                                                        Ago]</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">$</span>
                                                        </div>
                                                        <input type="text" name="ca_one_year_total_sales_amount"
                                                            id="ca_one_year_total_sales_amount" class="form-control"
                                                            value="{{ old('ca_one_year_total_sales_amount') }}"
                                                            aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="ca_one_year_total_sales_unit">Total Sales Unit [One Year Ago]</label>
                                                    <input type="text" name="ca_one_year_total_sales_unit"
                                                        id="ca_one_year_total_sales_unit" class="form-control"
                                                        value="{{ old('ca_one_year_total_sales_unit') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="ca_last_week_total_sales_amount">Total Sales Amount [Last Week]</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">$</span>
                                                        </div>
                                                        <input type="text" name="ca_last_week_total_sales_amount"
                                                            id="ca_last_week_total_sales_amount" class="form-control"
                                                            value="{{ old('ca_last_week_total_sales_amount') }}"
                                                            aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="ca_last_week_total_sales_unit">Total Sales Unit [Last Week]</label>
                                                    <input type="text" name="ca_last_week_total_sales_unit"
                                                        id="ca_last_week_total_sales_unit" class="form-control"
                                                        value="{{ old('ca_last_week_total_sales_unit') }}">
                                                </div>
                                            </div>
                                        </div>
            
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="ca_current_week_total_sales_amount">Total Sales Amount [Current
                                                        Week]</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">$</span>
                                                        </div>
                                                        <input type="text" name="ca_current_week_total_sales_amount"
                                                            id="ca_current_week_total_sales_amount" class="form-control"
                                                            value="{{ old('ca_current_week_total_sales_amount') }}"
                                                            aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="ca_current_week_total_sales_unit">Total Sales Unit [Current
                                                        Week]</label>
                                                    <input type="text" name="ca_current_week_total_sales_unit"
                                                        id="ca_current_week_total_sales_unit" class="form-control"
                                                        value="{{ old('ca_current_week_total_sales_unit') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="ca_current_week_ads_sales_amount">Ads Sales Amount [Current
                                                        Week]</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">$</span>
                                                        </div>
                                                        <input type="text" name="ca_current_week_ads_sales_amount"
                                                            id="ca_current_week_ads_sales_amount" class="form-control"
                                                            value="{{ old('ca_current_week_ads_sales_amount') }}"
                                                            aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="ca_current_week_ads_sales_unit">Ads Sales Unit [Current Week]</label>
                                                    <input type="text" name="ca_current_week_ads_sales_unit"
                                                        id="ca_current_week_ads_sales_unit" class="form-control"
                                                        value="{{ old('ca_current_week_ads_sales_unit') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="ca_current_week_acos">ACOS [Current Week]</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">%</span>
                                                        </div>
                                                        <input type="text" name="ca_current_week_acos" id="ca_current_week_acos"
                                                            class="form-control" value="{{ old('ca_current_week_acos') }}"
                                                            aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="ca_current_week_tacos">TACOS [Current Week]</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">%</span>
                                                        </div>
                                                        <input type="text" name="ca_current_week_tacos" id="ca_current_week_tacos"
                                                            class="form-control" value="{{ old('ca_current_week_tacos') }}"
                                                            aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="ca_current_week_ads_spend">Ads Spend [Current Week]</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">$</span>
                                                        </div>
                                                        <input type="text" name="ca_current_week_ads_spend"
                                                            id="ca_current_week_ads_spend" class="form-control"
                                                            value="{{ old('ca_current_week_ads_spend') }}"
                                                            aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="ca_current_week_ads_roas">ROAS [Current Week]</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">%</span>
                                                        </div>
                                                        <input type="text" name="ca_current_week_ads_roas"
                                                            id="ca_current_week_ads_roas" class="form-control"
                                                            value="{{ old('ca_current_week_ads_roas') }}"
                                                            aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card d-none" id="accordion_walmart_info">
                                <div class="card-header" id="walmart_infos_heading">
                                    <h5 class="mb-0 d-flex w-100 justify-content-between align-items-center">
                                        <span style="">Walmart</span>
                                        <div class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#walmart_infos" aria-expanded="false" aria-controls="walmart_infos">
                                            {{-- arrow down --}}
                                            <i class="fa fa-arrow-down"></i>
                                        </div>
                                    </h5>
                                </div>
                                <div id="walmart_infos" class="collapse" aria-labelledby="walmart_infos_heading"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="walmart_one_year_total_sales_amount">Total Sales Amount [One Year
                                                        Ago]</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">$</span>
                                                        </div>
                                                        <input type="text" name="walmart_one_year_total_sales_amount"
                                                            id="walmart_one_year_total_sales_amount" class="form-control"
                                                            value="{{ old('walmart_one_year_total_sales_amount') }}"
                                                            aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="walmart_one_year_total_sales_unit">Total Sales Unit [One Year Ago]</label>
                                                    <input type="text" name="walmart_one_year_total_sales_unit"
                                                        id="walmart_one_year_total_sales_unit" class="form-control"
                                                        value="{{ old('walmart_one_year_total_sales_unit') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="walmart_last_week_total_sales_amount">Total Sales Amount [Last Week]</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">$</span>
                                                        </div>
                                                        <input type="text" name="walmart_last_week_total_sales_amount"
                                                            id="walmart_last_week_total_sales_amount" class="form-control"
                                                            value="{{ old('walmart_last_week_total_sales_amount') }}"
                                                            aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="walmart_last_week_total_sales_unit">Total Sales Unit [Last Week]</label>
                                                    <input type="text" name="walmart_last_week_total_sales_unit"
                                                        id="walmart_last_week_total_sales_unit" class="form-control"
                                                        value="{{ old('walmart_last_week_total_sales_unit') }}">
                                                </div>
                                            </div>
                                        </div>
            
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="walmart_current_week_total_sales_amount">Total Sales Amount [Current
                                                        Week]</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">$</span>
                                                        </div>
                                                        <input type="text" name="walmart_current_week_total_sales_amount"
                                                            id="walmart_current_week_total_sales_amount" class="form-control"
                                                            value="{{ old('walmart_current_week_total_sales_amount') }}"
                                                            aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="walmart_current_week_total_sales_unit">Total Sales Unit [Current
                                                        Week]</label>
                                                    <input type="text" name="walmart_current_week_total_sales_unit"
                                                        id="walmart_current_week_total_sales_unit" class="form-control"
                                                        value="{{ old('walmart_current_week_total_sales_unit') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="walmart_current_week_ads_sales_amount">Ads Sales Amount [Current
                                                        Week]</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">$</span>
                                                        </div>
                                                        <input type="text" name="walmart_current_week_ads_sales_amount"
                                                            id="walmart_current_week_ads_sales_amount" class="form-control"
                                                            value="{{ old('walmart_current_week_ads_sales_amount') }}"
                                                            aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="walmart_current_week_ads_sales_unit">Ads Sales Unit [Current Week]</label>
                                                    <input type="text" name="walmart_current_week_ads_sales_unit"
                                                        id="walmart_current_week_ads_sales_unit" class="form-control"
                                                        value="{{ old('walmart_current_week_ads_sales_unit') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="walmart_current_week_acos">ACOS [Current Week]</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">%</span>
                                                        </div>
                                                        <input type="text" name="walmart_current_week_acos" id="walmart_current_week_acos"
                                                            class="form-control" value="{{ old('walmart_current_week_acos') }}"
                                                            aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="walmart_current_week_tacos">TACOS [Current Week]</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">%</span>
                                                        </div>
                                                        <input type="text" name="walmart_current_week_tacos" id="walmart_current_week_tacos"
                                                            class="form-control" value="{{ old('walmart_current_week_tacos') }}"
                                                            aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="walmart_current_week_ads_spend">Ads Spend [Current Week]</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">$</span>
                                                        </div>
                                                        <input type="text" name="walmart_current_week_ads_spend"
                                                            id="walmart_current_week_ads_spend" class="form-control"
                                                            value="{{ old('walmart_current_week_ads_spend') }}"
                                                            aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="walmart_current_week_ads_roas">ROAS [Current Week]</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">%</span>
                                                        </div>
                                                        <input type="text" name="walmart_current_week_ads_roas"
                                                            id="walmart_current_week_ads_roas" class="form-control"
                                                            value="{{ old('walmart_current_week_ads_roas') }}"
                                                            aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card d-none" id="accordion_meeting_notes">
                                <div class="card-header" id="meeting_notes_heading">
                                    <h5 class="mb-0 d-flex w-100 justify-content-between align-items-center">
                                        <span style="">Meeting Notes</span>
                                        <div class="d-flex w-50 justify-content-end align-items-center">
                                            <span class="btn btn-info" id="btn_add_meeting_note_row">
                                                <i class="fa fa-plus"></i> Add Row
                                            </span>
                                            <div class="btn btn-link collapsed ml-3" data-toggle="collapse"
                                                data-target="#meeting_notes" aria-expanded="false" aria-controls="meeting_notes">
                                                {{-- arrow down --}}
                                                <i class="fa fa-arrow-down"></i>
                                            </div>
                                        </div>
                                    </h5>
                                </div>
                                <div id="meeting_notes" class="collapse" aria-labelledby="meeting_notes_heading"
                                    data-parent="#accordion">
                                    <div class="card-body" id="div_meeting_note_row_holder">
                                        <div class="row" data-rowgroup="1">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="marketplaces">Marketplace</label>
                                                    <select name="marketplaces[]" id="marketplaces"
                                                        class="form-control">
                                                        <option value="1">Amazon US</option>
                                                        <option value="2">Amazon CA</option>
                                                        <option value="3">Walmart</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="walmart_one_year_total_sales_unit">Note</label>
                                                    <textarea class="form-control" name="notes[]" id="id_notes" cols="30" rows="1"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="walmart_last_week_total_sales_amount">Url [Optional]</label>
                                                    <input type="text" name="urls[]" id="id_url" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-1 d-flex justify-content-end align-items-center">
                                                <span class="btn btn-danger btn_trash_note_row" data-rowno="1">
                                                    <i class="fa fa-trash"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card d-none" id="accordion_weekly_tasks">
                                <div class="card-header" id="weekly_tasks_heading">
                                    <h5 class="mb-0 d-flex w-100 justify-content-between align-items-center">
                                        <span style="">Weekly Tasks</span>
                                        <div class="d-flex w-50 justify-content-end align-items-center">
                                            <span class="btn btn-info" id="btn_add_task_row">
                                                <i class="fa fa-plus"></i> Add Row
                                            </span>
                                            <div class="btn btn-link collapsed ml-3" data-toggle="collapse"
                                                data-target="#weekly_tasks" aria-expanded="false" aria-controls="weekly_tasks">
                                                {{-- arrow down --}}
                                                <i class="fa fa-arrow-down"></i>
                                            </div>
                                        </div>
                                    </h5>
                                </div>
                                <div id="weekly_tasks" class="collapse" aria-labelledby="weekly_tasks_heading"
                                    data-parent="#accordion">
                                    <div class="card-body" id="div_wtasks_row_holder">
                                        <div class="row row-group" data-rowgroup="t-1">
                                            <div class="col-md-11">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="category">Category</label>
                                                            <select name="category[]" id="category_select"
                                                                class="form-control">
                                                                <option value="1">Amazon & Merchandising</option>
                                                                <option value="2">Walmart</option>
                                                                <option value="3">Graphics</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="task_status">Status</label>
                                                            <select name="task_status[]" id="task_status" class="form-control">
                                                                <option value="1">Pending</option>
                                                                <option value="2">In Progress</option>
                                                                <option value="3">Completed</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="tasks">Task</label>
                                                            <textarea name="tasks[]" class="form-control" id="id_tasks" cols="30" rows="1"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="task_urls">Url [Optional]</label>
                                                            <input type="text" name="task_urls[]" id="id_task_urls" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1 d-flex justify-content-end align-items-center">
                                                <span class="btn btn-danger btn_trash_task_row" data-trashNo="t-1">
                                                    <i class="fa fa-trash"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-success">Generate</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
