<div class="modal fade" id="mdl-generate-all-weekly" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="mdl-generate-all-weeklyLabel">All Weekly Report</h4>
            </div>
            <form action="{{ route('admin.reports.custom-weekly-report.generateAll') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body text-dark text-left">
                    <div class="form-group">
                        <label for="marketplace" class="d-block">What is the Last Date?</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-calendar"></i></span>
                            </div>
                            <input type="text" name="last_ending_date" class="form-control date" placeholder="Ex: 30/07/2016">
                        </div>
                        <div class="form-group">
                            <label for="client_account">Client Account</label>
                            <select name="client_account" id="client_account" class="form-control">
                                <option value="">Select Client Account</option>
                                @foreach ($clientAccountList as $client_account)
                                    @php
                                        $marketplace = ($client_account->marketplace == 1) ? 'US' : 
                                            (($client_account->marketplace == 2) ? 'CA' : 'Walmart');
                                    @endphp
                                    <option value="{{ $client_account->id }}">
                                        {{ $client_account->account_name }} [{{ $marketplace }}]
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="report_type" value="weekly">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">DOWNLOAD</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                </div>
            </form>
        </div>
    </div>
</div>