@extends('employee.layouts.shreyu')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('employee.applications.store') }}" method="post" id="emp-application-form">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                            <div class="row mb-3">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="name">Subject</label>
                                        <input type="text" name="subject" id="name"
                                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                            required>
                                        @error('subject')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="apply_to">Apply To</label>
                                        <select name="apply_to" data-plugin="customselect" id="" class="form-control">
                                            <option value="0">None</option>
                                            <option value="1">HR Manager</option>
                                            <option value="2">CEO</option>
                                        </select>
                                        
                                        @error('apply_to')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="application_type">
                                            Application Type
                                        </label>
                                        <select class="form-control custom-select" data-plugin="customselect" name="application_type" id="application-type-mdl">
                                            <option>Select Type</option>
                                            <option value="1">Leave</option>
                                            <option value="2">Salary Review</option>
                                            <option value="3">General</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 leave-type-open">
                                    <div class="form-group">
                                        <label for="leave_from">Start Date</label>
                                        <input type="text" class="form-control" name="leave_from"
                                            placeholder="mm/dd/yyyy" id="leave-start-date">
                                        @error('leave_from')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3 leave-type-open">
                                    <div class="form-group">
                                        <label for="leave_to">End Date</label>
                                        <input type="text" class="form-control" name="leave_to" placeholder="mm/dd/yyyy"
                                            id="leave-end-date">
                                        @error('leave_to')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3 leave-type-open">
                                    <div class="form-group">
                                        <label for="leave_type">
                                            Leave Type
                                        </label>
                                        <select class="form-control custom-select" data-plugin="customselect"
                                            name="leave_type" id="leave-type-mdl">
                                            <option>Select Type</option>
                                            <option value="1" 
                                                @if(\Carbon\Carbon::parse($employee->joining_date)->diffInMonths(\Carbon\Carbon::now()) >= 6 && 
                                                    $totalPaidLeavesTaken < App\Models\CompanyPolicy::where('policy_id', "POLICY-YPL")->first()->value )
                                                    disabled
                                                @endif>Full Day Paid</option>
                                            <option value="2">Half Day Unpaid</option>
                                            <option value="3">Full Day Unpaid</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="d-none" name="description" id="application-desc-editor"></textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
    </div>
@endsection
