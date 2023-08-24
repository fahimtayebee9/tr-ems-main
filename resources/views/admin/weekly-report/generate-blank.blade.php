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
    
    {{-- @include('admin.includes.modals.mdl-report-category-form') --}}

    <div class="row clearfix justify-content-center align-items-center">
        <div class="col-md-4">
            <div class="card" style="border: 2px dashed #2929b9;">
                <div class="card-body">
                    <h5 style="font-family: 'Arial', sans-serif; font-size: 18px; font-weight: 700; margin-bottom: 0px;">Weekly Report</h5>
                    <hr style="border: 1px dashed #2929b9;">
                    <form action="{{ route('admin.reports.custom-weekly-report.update.location') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="report-type">Select what type of report you want to generate</label>
                            <select name="report_type" id="report-type" class="form-control">
                                <option value="">None</option>
                                <option value="single">Create Report for Single Account [With All Details]</option>
                                <option value="multiple">Create Report for Multiple Accounts</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="report-type">Report Template</label>
                            <select name="report_template" id="report-template" class="form-control">
                                <option value="empty">Blank Template</option>
                                <option value="zonhack">ZonHack Template</option>
                                <option value="nudawn">NuDawn Template</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Make Report</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
