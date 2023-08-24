<div class="modal fade" id="mdl-edit-client-account" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="mdl-edit-client-accountLabel">Add Account</h4>
            </div>
            <form action="{{ route('admin.client-accounts.update', $item->id)}}" method="post">
                @csrf
                <div class="modal-body text-dark">
                    <div class="form-group">
                        <label for="client-name">Client Name</label>
                        <input type="text" class="form-control" id="client-name" name="account_name" placeholder="Enter Client Name" value="{{ $item->account_name }}">
                    </div>
                    <div class="form-group">
                        {{-- dropdown select for marketplace --}}
                        <label for="marketplace">Marketplace</label>
                        <select class="form-control" name="marketplace" id="cacc-marketplace-edit">
                            <option>Select Marketplace</option>
                            <option value="1" @if($item->marketplace == 1) selected @endif>Amazon</option>
                            <option value="3" @if($item->marketplace == 3) selected @endif>Walmart</option>
                        </select>
                    </div>
                    <div class="form-group">
                        {{-- dropdown select for status --}}
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="cacc-status-edit">
                            <option>Select Status</option>
                            <option value="1" @if($item->status == 1) selected @endif>Active</option>
                            <option value="2" @if($item->status == 2) selected @endif>Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">SAVE CHANGES</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                </div>
            </form>
        </div>
    </div>
</div>