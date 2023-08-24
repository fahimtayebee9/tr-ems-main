<div class="modal fade" id="download-multiple-account-modal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="edit-weekly-sales-rowLabel">Choose Account To Download Combined Report</h4>
            </div>
            <form action="{{route('admin.reports.custom-weekly-report.view.combined.pdf')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body text-dark text-left">
                    <div class="form-group">
                        {{-- choose accounts to download combined report --}}
                        <label for="accounts" class="d-block">Choose Accounts</label>
                        <select class="form-control" name="accounts[]" id="download-multiple-report-accounts" multiple>
                            @foreach (\App\Models\WeeklyReport::distinct()->get(['caccount_id']) as $report)
                                @php
                                    $marketplace = ($report->clientAccount->marketplace == 1) ? 'US' : (($report->clientAccount->marketplace == 2) ? 'CA' : 'Walmart');
                                @endphp
                                <option value="{{ $report->clientAccount->id }}">{{ $report->clientAccount->account_name }} [{{$marketplace}}]</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="marketplace" class="d-block">Do you want to generate Meeting Notes?</label>
                        <select name="insert_meeting_notes" id="ins_meeting_notes" class="form-control">
                            <option value="">Select Option</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    {{-- <div class="form-group">
                        <label for="marketplace" class="d-block">Do you want to generate Tasks?</label>
                        <select name="insert_tasks" id="ins_tasks" class="form-control">
                            <option value="">Select Option</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">SAVE CHANGES</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                </div>
            </form>
        </div>
    </div>
</div>