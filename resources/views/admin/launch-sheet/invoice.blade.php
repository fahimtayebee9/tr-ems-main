@extends("admin.layouts.app")

@section("body")

<div class="page-header">
    <div class="row">
        <div class="col-md-12">
            @include('admin.includes.breadcrumb-v2')
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <form action="{{ route('admin.launch-sheet.createInvoice') }}" method="post">
                    @csrf
                    <div class="row justify-content-between">
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group m-0">
                                        <label for="invoice_start_date">Select Month [Optional]</label>
                                        <select name="invoice_month" id="invoice_month" class="form-control">
                                            <option value="">Select Month</option>
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
                                <div class="col-md-4">
                                    <div class="form-group m-0">
                                        <label for="invoice_start_date">Select Start Date</label>
                                        <input type="date" class="form-control" name="invoice_start_date" id="invoice_start_date">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group m-0">
                                        <label for="invoice_end_date">Select End Date</label>
                                        <input type="date" class="form-control" name="invoice_end_date" id="invoice_end_date">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group m-0">
                                <label for="invoice_end_date">Generate Invoice</label>
                                <button type="submit" class="btn btn-success w-100">Generate</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body attendance-table-box">
                <div class="table-responsive" id="attendance-tbl">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>Invoice No</th>
                                <th>Invoice Date</th>
                                <th>Total Launch</th>
                                <th>Invoice Amount</th>
                                <th>Invoice Status</th>
                                <th>Invoice Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoices as $invoice)
                                <tr>
                                    <td>{{ $invoice->invoice_number }}</td>
                                    <td>
                                        <b>{{ \Carbon\Carbon::parse($invoice->start_date)->format('d-m-Y') }}</b> TO
                                        <b>{{ \Carbon\Carbon::parse($invoice->end_date)->format('d-m-Y') }}</b>
                                    </td>
                                    <td>{{ $invoice->total_launch }}</td>
                                    <td>BDT. {{ $invoice->total_cost }}</td>
                                    <td>
                                        @if ($invoice->status == 0)
                                            <span class="badge badge-danger">Pending</span>
                                        @elseif($invoice->status == 1)
                                            <span class="badge badge-success">Paid</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.launch-sheet.showInvoice', $invoice->invoice_number) }}" class="btn btn-primary btn-sm">View</a>
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