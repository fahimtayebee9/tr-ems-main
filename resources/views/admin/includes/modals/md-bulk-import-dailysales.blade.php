<div class="modal fade" id="md-upload-sailysales-bulk" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="md-upload-employees-bulkLabel">Import Data</h4>
            </div>
            <form action="{{ route('admin.reports.custom-daily-report.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body text-dark">
                    <div class="form-group">
                        <label for="marketplace">Select Account</label>
                        <select name="caccount_id" id="caccount_id" class="form-control">
                            <option value="">Select Client Account</option>
                            @foreach ($clientAccountList as $item)
                                <option value="{{ $item->id }}">{{ $item->account_name }}</option>
                            @endforeach
                        </select>
                    </div>
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
