@extends('employee.layouts.shreyu')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10">
                            <form action="{{ route('employee.launch-sheet.createInvoice') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group m-0">
                                            <label for="invoice_start_date">Select Start Date</label>
                                            <input type="date" class="form-control" name="invoice_start_date" id="invoice_start_date">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group m-0">
                                            <label for="invoice_end_date">Select End Date</label>
                                            <input type="date" class="form-control" name="invoice_end_date" id="invoice_end_date">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group m-0">
                                            <label for="invoice_end_date">Generate Invoice</label>
                                            <button type="submit" class="btn btn-info w-100">Generate</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-2 align-items-center d-flex">
                            {{-- return to launch management --}}
                            <a href="{{ route('employee.launch-sheet.index') }}" class="btn btn-warning w-100">Back to Launch Management</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <table id="tbl-launch-invocies" class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
                            cellspacing="0" width="100%" role="grid" aria-describedby="datatable_info"
                            style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1"
                                        colspan="1" style="width: 256px; border-bottom-color: #f5b225;" aria-sort="ascending"
                                        aria-label="Invoice Number: activate to sort column descending">Invoice Number</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                        colspan="1" style="width: 380px; border-bottom-color: #f5b225;"
                                        aria-label="Date Range: activate to sort column ascending">Date Range</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                        colspan="1" style="width: 189px; border-bottom-color: #f5b225;"
                                        aria-label="Total Launch: activate to sort column ascending">Total Launch</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                        colspan="1" style="width: 102px; border-bottom-color: #f5b225;"
                                        aria-label="Total Cost: activate to sort column ascending">Total Cost</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                        colspan="1" style="width: 181px; border-bottom-color: #f5b225;"
                                        aria-label="Invocie Statuss: activate to sort column ascending">Invocie Statuss</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                        colspan="1" style="width: 163px; border-bottom-color: #f5b225;"
                                        aria-label="Actions: activate to sort column ascending">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($invoices as $item)
                                <tr role="row" class="odd">
                                    <td tabindex="0" class="sorting_1">INV-{{ $item->invoice_number }}</td>
                                    <td>
                                        <b>{{ $item->start_date }}</b> to <b>{{ $item->end_date }}</b>
                                    </td>
                                    <td class="text-left">
                                        {{ $item->total_launch }}
                                    </td>
                                    <td>
                                        BDT. {{ $item->total_cost }}
                                    </td>
                                    <td>
                                        @if($item->status == 0)
                                            <span class="badge badge-danger font-size-12">Unpaid</span>
                                        @else
                                            <span class="badge badge-success font-size-12">Paid</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('employee.launch-sheet.showInvoice', $item->invoice_number) }}" class="btn btn-sm btn-primary">View</a>
                                        {{-- Download PDF --}}
                                        <a href="{{ route('employee.launch-sheet.exportPDF', $item->invoice_number) }}" class="btn btn-sm btn-info"
                                            data-toggle="tooltip" data-title="Download PDF Invoice">
                                            <i class="fas fa-download"></i>
                                            <i class="fas fa-file-pdf ml-2"></i>
                                        </a>
                                        {{-- Download Excel --}}
                                        <a href="{{ route('employee.launch-sheet.exportExcel', $item->id) }}" class="btn btn-sm btn-success"
                                            data-toggle="tooltip" data-title="Download Excel Invoice">
                                            <i class="fas fa-download"></i>
                                            <i class="fas fa-file-excel ml-2"></i>
                                        </a>
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
