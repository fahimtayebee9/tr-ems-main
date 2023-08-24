<div class="modal fade" id="mdl-provider-edit-{{ $item->id }}" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="mdl-provider-edit-{{ $item->id }}Label">Edit Launch Provider Details</h4>
            </div>
            <form action="{{ route('admin.launch-sheet.provider.update', $item)}}" method="post">
                @csrf
                <div class="modal-body text-dark text-left">
                    <div class="row p-0 text-left">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="client-name">Name</label>
                                <input type="text" class="form-control" id="client-name" name="name" value="{{ $item->name }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="client-name">Email</label>
                                <input type="text" class="form-control" id="client-name" name="email" value="{{ $item->email }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="client-name">Phone</label>
                                <input type="text" class="form-control" id="client-name" name="phone" value="{{ $item->phone }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="client-name">Address</label>
                                <input type="text" class="form-control" id="client-name" name="address" value="{{ $item->address }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="client-name">Unit Price</label>
                                <input type="number" class="form-control" id="client-name" name="unit_price" value="{{ $item->unit_price }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="client-name">Vehicle Rent</label>
                                <input type="number" class="form-control" id="client-name" name="vehicle_cost" value="{{ $item->vehicle_cost }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="status" class="d-block">Status</label>
                                <select class="form-control custom-select select2-hidden-accessible" name="status" id="cacc-status">
                                    <option>Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="2">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="client-name">Contact Person Name</label>
                                <input type="text" class="form-control" id="client-name" name="contact_person" value="{{ $item->contact_person }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="client-name">Contact Person Phone</label>
                                <input type="text" class="form-control" id="client-name" name="contact_person_phone" value="{{ $item->contact_person_phone }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" style="margin-right: 10px!important;">SAVE CHANGES</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                </div>
            </form>
        </div>
    </div>
</div>