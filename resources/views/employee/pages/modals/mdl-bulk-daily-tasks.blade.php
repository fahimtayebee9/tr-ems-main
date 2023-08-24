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
                    <div class="form-group">
                        <label for="name">Task Title</label>
                        <input type="text" name="task_title" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                        @error('task_title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="task_description">Description</label>
                        <textarea class="summernote" style="display: none;" name="task_description"></textarea>
                        <!-- <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea> -->
                        @error('task_description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="submitted_data">Result Data (Optional)</label>
                                <input type="text" class="form-control" name="submitted_data">
                                @error('submitted_data')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="screenshot_url">Screenshot Url (Use Google Drive Link )</label>
                                <input type="text" class="form-control" name="screenshot_url">
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>