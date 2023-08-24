<div class="modal fade" id="md-upload-users-bulk" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="md-upload-users-bulkLabel">Import Data</h4>
            </div>
            <form action="{{ route('admin.administration.import.bulk') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body text-dark">
                    <div class="form-group">
                        {{-- dropdown select for marketplace --}}
                        <label for="marketplace">Upload Bulk Accounts</label>
                        <input type="file" class="dropify" required name="bulk_data">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">UPLOAD</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                </div>
            </form>
        </div>
    </div>
</div>
