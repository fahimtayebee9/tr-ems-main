@extends('admin.layouts.app')

@section('body')
    <div class="block-header">
        <div class="row">
            @include('admin.includes.breadcrumb-v2')

            <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-end">
                <a class="btn btn-primary" href="{{ route('admin.reports.custom-weekly-report.generate.blank') }}">
                    <i class="fa fa-plus"></i> Generate Report
                </a>
                {{-- <hr>
                <p>
                    {{ session()->get('report_type') }} || {{ session()->get('report_template') }}
                </p> --}}
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="body" style="min-height: 70vh;">
                    
                </div>
            </div>
        </div>
    </div>
@endsection
