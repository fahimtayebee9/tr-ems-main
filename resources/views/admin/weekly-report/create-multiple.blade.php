@extends('admin.layouts.app')

@section('body')
    <div class="block-header">
        <div class="row">
            @include('admin.includes.breadcrumb-v2')

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
                <div class="body">
                    <form action="{{ route('admin.reports.custom-weekly-report.generate.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="report_number">Report ID</label>
                                    <input type="text" name="report_number" id="report_number" class="form-control"
                                        placeholder="Report ID" disabled value="{{ $report_number }}">
                                    <input type="hidden" name="report_number" value="{{$report_number}}">
                                    <input type="hidden" name="report_type" value="{{session()->get('report_type')}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="week_start_date">Week Start Date</label>
                                    <input type="date" name="week_start_date" id="week_start_date" class="form-control"
                                        placeholder="Week Start Date" value="{{ old('week_start_date') }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="week_end_date">Week End Date</label>
                                    <input type="date" name="week_end_date" id="week_end_date" class="form-control"
                                        placeholder="Week End Date" value="{{ old('week_end_date') }}">
                                </div>
                            </div>
                        </div>
                        
                        {{-- ACCOUNTS DATA --}}
                        <div id="accordion">
                            <div class="card" id="accordion_amazon_account_1">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0 d-flex w-100 justify-content-between align-items-center">
                                        <span style="font-size: 20px; font-weight: 700; margin: 0;" id="accordion_amazon_account__title_1">Account Name</span>
                                        <div class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#accordion_amazon_account_card_1" aria-expanded="false" aria-controls="accordion_amazon_account_card_1">
                                            {{-- arrow down --}}
                                            <i class="fa fa-arrow-down"></i>
                                        </div>
                                    </h5>
                                </div>

                                <div id="accordion_amazon_account_card_1" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="account_names">Account Name</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                A
                                                            </span>
                                                        </div>
                                                        <input type="text" name="account_names[]"
                                                            id="account_names_1" class="form-control account-name-input"
                                                            aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="us_last_week_total_sales_amount">Total Sales Amount [Last Week]</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">$</span>
                                                        </div>
                                                        <input type="text" name="us_last_week_total_sales_amount[]"
                                                            id="us_last_week_total_sales_amount_1" class="form-control"
                                                            aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="us_last_week_total_sales_unit">Total Sales Unit [Last Week]</label>
                                                    <input type="text" name="us_last_week_total_sales_unit[]"
                                                        id="us_last_week_total_sales_unit_1" class="form-control">
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
                                                        <input type="text" name="us_current_week_total_sales_amount[]"
                                                            id="us_current_week_total_sales_amount_1" class="form-control"
                                                            aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="us_current_week_total_sales_unit">Total Sales Unit [Current
                                                        Week]</label>
                                                    <input type="text" name="us_current_week_total_sales_unit[]"
                                                        id="us_current_week_total_sales_unit_1" class="form-control">
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
                                                        <input type="text" name="us_current_week_ads_sales_amount[]"
                                                            id="us_current_week_ads_sales_amount_1" class="form-control"
                                                            aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="us_current_week_ads_sales_unit">Ads Sales Unit [Current Week]</label>
                                                    <input type="text" name="us_current_week_ads_sales_unit[]"
                                                        id="us_current_week_ads_sales_unit_1" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="us_current_week_acos">ACOS [Current Week]</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">%</span>
                                                        </div>
                                                        <input type="text" name="us_current_week_acos[]" id="us_current_week_acos_1"
                                                            class="form-control"
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
                                                        <input type="text" name="us_current_week_tacos[]" id="us_current_week_tacos_1"
                                                            class="form-control"
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
                                                        <input type="text" name="us_current_week_ads_spend[]"
                                                            id="us_current_week_ads_spend_1" class="form-control"
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
                                                        <input type="text" name="us_current_week_ads_roas[]"
                                                            id="us_current_week_ads_roas_1" class="form-control"
                                                            aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-md-3 text-right">
                                <div class="btn btn-info" id="add_new_account">
                                    <i class="fa fa-plus" style="font-size: 12px;"></i>
                                    Add Another Account
                                </div>
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-check" style="font-size: 12px;"></i>
                                    SAVE
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
