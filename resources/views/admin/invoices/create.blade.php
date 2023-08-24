@extends('admin.layouts.app')

@section('body')
    <div class="block-header">
        <div class="row">
            @include('admin.includes.breadcrumb-v2')

            <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-end">
                {{-- <a class="btn btn-primary" href="{{ route('admin.invoice-management.create') }}"><i
                        class="fa fa-plus mr-2"></i> Create Invoice</a> --}}
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2>Create Invoice</h2>
                </div>
                <div class="body">
                    <form action="{{ route('admin.invoice-management.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="invoice_number">Invoice Number</label>
                                    <input type="text" name="" id="invoice_number" class="form-control"
                                        placeholder="Invoice Number" value="{{ $invoice_number }}">
                                    <input type="hidden" name="invoice_number" value="{{ $invoice_number }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="invoice_date">Invoice Date</label>
                                    <input type="text" name="invoice_date" id="invoice_date" class="form-control"
                                        placeholder="Invoice Date" value="{{ old('invoice_date') }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="due_date">Due Date</label>
                                    <input type="text" name="due_date" id="due_date" class="form-control"
                                        placeholder="Due Date" value="{{ old('due_date') }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="fomr-group">
                                    {{-- for Theme --}}
                                    <label for="theme">Theme</label>
                                    <select name="theme_id" id="theme" class="form-control">
                                        <option value="">Select Theme</option>
                                        @foreach ($themeList as $item)
                                            <option value="{{ $item->id }}">{{ $item->name   }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="client_id">Client</label>
                                    <select name="client_account_id" id="client_id" class="form-control">
                                        <option value="">Select Client</option>
                                        @foreach ($clientAccountsList as $client)
                                            <option value="{{ $client->id }}">{{ $client->account_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="invoice_status">Invoice Status</label>
                                    <select name="invoice_status" id="invoice_status" class="form-control">
                                        <option value="">Select Invoice Status</option>
                                        <option value="1">PAID</option>
                                        <option value="2">UNPAID</option>
                                        <option value="3">PARTIALLY PAID</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="client_name">Client Name</label>
                                    <input type="text" name="client_name" id="client_name" class="form-control"
                                        placeholder="Client Name" value="{{ old('client_name') }}">
                                </div>
                                <div class="form-group">
                                    <label for="client_email">Client Email</label>
                                    <input type="text" name="client_email" id="client_email" class="form-control"
                                        placeholder="Client Email" value="{{ old('client_email') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="client_address">Client Address</label>
                                    <input type="text" name="client_address" id="client_address" class="form-control"
                                        placeholder="Client Address" value="{{ old('client_address') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="client_phone">Client Phone</label>
                                    <input type="text" name="client_phone" id="client_phone" class="form-control"
                                        placeholder="Client Phone" value="{{ old('client_phone') }}">
                                </div>
                            </div>
                        </div>
                        <div id="inv-items-list">
                            <div class="row" data-row="1">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="item_name">Item Name</label>
                                        <input type="text" name="item_name[]" class="form-control"
                                            placeholder="Item Name" value="{{ old('item_name') }}">
                                    </div>
                                    <div class="form-group">
                                        <textarea name="item_description[]" cols="30" rows="3"
                                            class="form-control" placeholder="Item Description"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 item-price-qty">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="item_quantity">Quantity</label>
                                                <input type="number" name="item_quantity[]" class="form-control"
                                                    placeholder="Quantity" value="{{ old('item_quantity') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="item_price">Price</label>
                                                <input type="number" name="item_price[]" class="form-control unit_price"
                                                    placeholder="Price" value="{{ old('item_price') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="item_total">Total</label>
                                        <input type="number" name="item_total[]" class="form-control item_total"
                                            placeholder="Total" value="{{ old('item_total') }}">
                                    </div>
                                </div>
                                {{-- <div class="col-md-1">
                                    <div class="form-group text-right">
                                        <button type="button" data-remove="1" id="remove-1" class="btn btn-remove-item btn-danger"
                                            style="margin-top: 30px;"><i class="fa fa-trash"></i></button>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="discount">Discount</label>
                                    <div class="input-group">
                                        <input type="number" name="discount" id="discount" class="form-control">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="tax">Tax</label>
                                    <input type="number" name="tax" id="tax" class="form-control"
                                        placeholder="Tax" value="{{ old('tax') }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="total">Shipping</label>
                                    <input type="number" name="shipping" id="shipping" class="form-control"
                                        placeholder="Shipping" value="{{ old('shipping') }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {{-- advance payment --}}
                                    <label for="advance_payment">Advance Payment</label>
                                    <input type="number" name="advance_payment" id="advance_payment" class="form-control"
                                        placeholder="Advance Payment" value="{{ old('advance_payment') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="button" id="add-invoice-item" class="btn btn-add-item btn-info">
                                    <i class="fa fa-plus"></i>
                                    Add Item
                                </button>
                                {{-- delete last item --}}
                                <button type="button" id="remove-invoice-item" class="btn btn-remove-item btn-danger">
                                    <i class="fa fa-trash"></i>
                                    Remove Last Item
                                </button>
                                {{-- btn submit --}}
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
