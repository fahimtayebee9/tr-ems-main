@extends("employee.layouts.shreyu")

@section("content")

<div class="row">
    <div class="col-md-12 col-xl-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="left-col">
                        <h5 class="page-title">Manage All Notes</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form id="meeting-note-form" action="{{ route('employee.meeting-notes.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div id="row-meeting-note">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="client_account">Client Account</label>
                                    <select name="client_account[]" class="form-control ca_accounts">
                                        <option value="">Select Client Account</option>
                                        @foreach(Auth::user()->employee->getAccountManagers as $account)
                                            <option value="{{ $account->caccount->id }}">{{ $account->caccount->account_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {{-- priority --}}
                                    <label for="priority">Priority</label>
                                    <select name="priority[]" class="form-control mn_priority">
                                        <option value="">Select Priority</option>
                                        <option value="3">Low</option>
                                        <option value="2">Medium</option>
                                        <option value="1">High</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                {{-- marketplace: Amazon [US], Amazon [CA], Walmart --}}
                                <div class="form-group">
                                    <label for="marketplace">Marketplace</label>
                                    <select name="marketplace[]" class="form-control mn_marketplace">
                                        <option value="">Select Marketplace</option>
                                        <option value="1">Amazon [US]</option>
                                        <option value="2">Amazon [CA]</option>
                                        <option value="3">Walmart</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="url">URL (Optional)</label>
                                    <input type="text" name="note_url[]" class="form-control mn_note_url">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="note">Note</label>
                                    <textarea name="note[]" cols="30" rows="5" class="form-control meeting-note-summer"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-primary" id="btn-add-meeting-note">Add New Note</button>
                            <button type="submit" class="btn btn-success">SAVE NOTES</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div><!-- end row-->

@endsection