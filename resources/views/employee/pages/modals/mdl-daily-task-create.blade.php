<div class="modal fade" id="mdl-daily-task-create" tabindex="-1" role="dialog" aria-labelledby="mdl-daily-task-create" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered text-left" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="departmentModalLabel">Submit Daily Tasks that You have Completed</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('employee.task-management.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="emp_id" value="{{ $employee->id }}">
                    <div class="row p-3" id="task-row" style="border: 1px dashed #d4a1fd; margin: 3px;">
                        <div class="col-md-4 pl-0">
                            <div class="form-group">
                                <label for="name">Task Title</label>
                                <input type="text" name="task_title[]" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                                @error('task_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="task_status">Status</label>
                                <select name="task_status[]" id="task_status" class="form-control @error('task_status') is-invalid @enderror">
                                    <option value="1">Pending</option>
                                    <option value="2">In Progress</option>
                                    <option value="3">Completed</option>
                                </select>
                            </div>
                            {{-- @if ($employee->department->slug != "graphics")
                            <div class="form-group">
                                <label for="client_account_id">Client Account</label>
                                @php
                                    $clientAccountsList = ($employee->department->slug == "graphics") ? \App\Models\ClientAccount::all() : $employee->getAccountManagers;
                                    @endphp
                                <select name="client_account_id[]" id="client_account_id" class="form-control @error('client_account_id') is-invalid @enderror">
                                    <option value="">Select Account</option>
                                    @foreach($clientAccountsList as $client_account)
                                    <option value="{{ $client_account->caccount->id }}">{{ $client_account->caccount->account_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endif --}}
                        </div>
                        <div class="col-md-8 pr-0">
                            <div class="form-group">
                                <label for="task_description">Description</label>
                                <textarea class="summernote task-description" style="display: none;" name="task_description[]"></textarea>
                                @error('task_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="task_drive_link">Screenshot Url (Use Google Drive Folder Link)</label>
                                <input type="text" class="form-control" name="task_drive_link">
                                @error('task_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" id="add-task-row">Add Another Row</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>