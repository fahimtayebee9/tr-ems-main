@extends('employee.layouts.shreyu')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body invoice">
                    <div class="float-right">
                        <h6>Invoice : # <strong>{{ $invoice->invoice_number }}</strong></h6>
                        <h6 class="mb-0">Date : {{ date('d/m/Y', strtotime($invoice->invoice_date)) }}</h6>
                    </div>
                    <div class="">
                        <h4 class="mb-0 align-self-center">
                            @php
                                $logo = App\Models\CompanyDetail::orderBy('id', 'desc')->first()->company_logo;
                            @endphp
                            @if ($logo)
                                <img src="{{ asset('storage/uploads/company/'.$logo) }}" alt="logo" height="70" />
                            @else
                                <img src="{{ asset('storage/assets/images/logo-sm.png') }}" alt="logo" height="24" />
                            @endif
                        </h4>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="float-left mt-4">
                                <address><strong>Twitter, Inc.</strong><br>795 Folsom Ave, Suite 600<br>San Francisco, CA
                                    94107<br><abbr title="Phone">P:</abbr> (123) 456-7890</address>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table mt-4">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Description</th>
                                            <th width="10%" class="text-center">Quantity</th>
                                            <th width="10%" class="text-center">Unit Cost</th>
                                            <th width="10%" class="text-right">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $count = 1;
                                            $total_cost = 0;
                                        @endphp
                                        @for($i = \Carbon\Carbon::parse($invoice->start_date); $i <= \Carbon\Carbon::parse($invoice->end_date); $i->addDay())
                                            @php
                                                $daily_total_launch_sheet = \App\Models\ExtraLaunch::whereDate('date', date('Y-m-d', strtotime($i)))->first()->total_launch;
                                                $per_day_cost = $daily_total_launch_sheet * $price_per_launch;
                                                $total_cost += $per_day_cost;
                                            @endphp
                                            
                                            <tr>
                                                <td>{{ $count++ }}</td>
                                                <td>{{ date('d M, Y', strtotime($i)) }}</td>
                                                <td>{{ date('l', strtotime($i)) }}</td>
                                                <td width="10%" class="text-center">{{ $daily_total_launch_sheet }}</td>
                                                <td width="10%" class="text-center">BDT. {{ $price_per_launch }}</td>
                                                <td width="10%" class="text-right">BDT. {{ $per_day_cost }}</td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                    <div class="row" style="border-radius: 0px;">
                        <div class="col-md-9">
                            <p><strong>Terms And Condition :</strong></p>
                            <ul class="pl-3">
                                <li><small>All accounts are to be paid within 7 days from receipt of invoice.</small></li>
                                <li><small>To be paid by cheque or credit card or direct payment online.</small></li>
                                <li><small>If account is not paid within 7 days the credits details supplied as
                                        confirmation<br>of work undertaken will be charged the agreed quoted fee noted
                                        above.</small></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <p class="text-right"><strong>Sub-total:</strong> {{ $total_cost }}</p>
                            <p class="text-right">Utility: 12.9%</p>
                            <hr>
                            <h4 class="text-right mb-0">BDT. {{$total_cost}}</h4>
                        </div>
                    </div>
                    <!--end row-->
                    <hr>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-12 col-xl-4 ml-auto align-self-center">
                            <div class="text-center text-muted"><small>Thank you very much for doing business with us.
                                    Thanks !</small></div>
                        </div>
                        <div class="col-lg-12 col-xl-4">
                            <div class="d-print-none float-right">
                                <a href="javascript:window.print()" class="btn btn-info text-light"><i class="fas fa-print"></i></a>
                                
                                <a href="{{ route('employee.launch-sheet.exportPDF', $invoice->invoice_number) }}" class="btn btn-primary text-light">PDF</a> 
                                <a href="#" class="btn btn-danger text-light">EXCEL</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
