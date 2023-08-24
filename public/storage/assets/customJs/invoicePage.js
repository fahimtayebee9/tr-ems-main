$(document).ready(function () {
    $('#tbl-invoices-list').DataTable({
        "processing": true,
    });
});

$(document).ready(function () {
    // remove last row from invoice items list on click of remove-invoice-item button
    $('#remove-invoice-item').click(function () {
        $('#inv-items-list > .row').last().remove();
    });

    // update item_total on change of item_quantity or unit_price input
    $(document).on('change', 'input[name="item_quantity[]"], input[name="item_price[]"]', function () {
        var itemQuantity = $(this).closest('.row').find('input[name="item_quantity[]"]').val();
        var itemPrice = $(this).closest('.row').find('input[name="item_price[]"]').val();
        $(this).closest('.item-price-qty').find('input[name="item_total[]"]').val(itemQuantity * itemPrice);
    });

    $('#add-invoice-item').click(function () {
        var lastRowId = $('#inv-items-list > .row').last().data('row');
        var newRowId = lastRowId + 1;
        console.log(newRowId);
        var invoiceItemRow = `<div class="row" data-row="${newRowId}">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="item_name">Item Name</label>
                                        <input type="text" name="item_name[]" class="form-control"
                                            placeholder="Item Name" value="">
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
                                                <input type="number" name="item_price[]" class="form-control"
                                                    placeholder="Price" value="{{ old('item_price') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="item_total">Total</label>
                                        <input type="number" name="item_total[]" class="form-control"
                                            placeholder="Total" value="{{ old('item_total') }}">
                                    </div>
                                </div>
                            </div>`;
        $('#inv-items-list').append(invoiceItemRow);
    });

    $('#invoice_date').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
    });

    $('#due_date').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
    });

});