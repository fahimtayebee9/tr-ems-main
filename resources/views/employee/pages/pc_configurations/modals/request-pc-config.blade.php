<div class="modal fade" id="request-pc-config-modal" tabindex="-1" role="dialog" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="mdl-accessories-request-label">
                    Request Accessories
                </h4>
                <div class="button-list">
                    <button id="add-new-item-form" class="btn btn-info" type="button">
                        Add Item
                    </button>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <form action="{{route('employee.computer-configurations.request-accessories.store')}}" method="post">
                <div class="modal-body" id="form-request-emp-accessory">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="mdl-accessories-item">Accessory</label>
                                <select name="accessories[]" id="fm-select-accessories" class="form-control select2 fm-select-accessories">
                                    <option value="">Select Accessory</option>
                                    @foreach (\App\Models\AccessoriesItem::all() as $item)
                                        <option value="{{ $item->id }}">{{ $item->item_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <label for="mdl-accessories-description">Reason For Upgrade</label>
                            <textarea name="issues[]" id="" cols="30" rows="1" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btn-request-emp-accessory" class="btn btn-primary">Send Request</button>
                </div>
            </form>
        </div>
    </div>
</div>
