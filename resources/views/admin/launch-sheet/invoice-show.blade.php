@extends('admin.layouts.app')

@section('body')
    <div class="block-header">
        <div class="row">
            @include('admin.includes.breadcrumb-v2')

            <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-end">
                {{-- <!-- <a class="btn btn-primary" href="{{ route('admin.tasks.forms.create') }}"><i class="fa fa-plus"></i> Add New Form</a> --> --}}
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card invoice1">                        
                <div class="body">
                    <div class="invoice-top clearfix">
                        <div class="logo mb-4" style="width: 10%;">
                            @if(\App\Models\CompanyDetail::first()->company_logo)
                                <img src="{{ asset('storage/uploads/company/'. \App\Models\CompanyDetail::first()->company_logo) }}" alt="logo" 
                                    class="img-fluid">
                            @else
                                <img src="{{ asset('assets/images/logo.png') }}" alt="logo" class="img-fluid">
                            @endif
                        </div>
                        <div class="title">
                            <h4>Invoice #{{$invoice->invoice_number}}</h4>
                            <p>Issued: {{ date('d M, Y', strtotime($invoice->invoice_date)) }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Total Launch</th>
                                    <th>Rate</th>
                                    <th style="width: 80px;">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $count = 1;
                                    $total_cost = 0;
                                @endphp
                                @for($i = \Carbon\Carbon::parse($invoice->start_date); $i <= \Carbon\Carbon::parse($invoice->end_date); $i->addDay())
                                    @php
                                        $daily_total_launch_sheet = \App\Models\LaunchSheet::whereDate('date', date('Y-m-d', strtotime($i)))->where('status', 1)->get()->count();
                                        $per_day_cost = $daily_total_launch_sheet * $price_per_launch;
                                        $total_cost += $per_day_cost;
                                    @endphp
                                    
                                    <tr>
                                        <td>{{ $count++ }}</td>
                                        <td>{{ date('d M, Y', strtotime($i)) }}</td>
                                        <td>{{ $daily_total_launch_sheet }}</td>
                                        <td>BDT. {{ $price_per_launch }}</td>
                                        <td>BDT. {{ $per_day_cost }}</td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <h5>Note</h5>
                            <p>Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.</p>
                        </div>
                        <div class="col-md-6 text-right">
                            <p class="mb-0"><b>Sub-total:</b> BDT. {{ $total_cost }}</p>
                            <p class="mb-0">Utility: 12.9%</p>                            
                            <h3 class="mb-0 m-t-10">BDT. {{ $total_cost }}</h3>
                        </div>                                    
                        <div class="hidden-print col-md-12 text-right">
                            <hr>
                            <button class="btn btn-outline-secondary"><i class="icon-printer"></i></button>
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection