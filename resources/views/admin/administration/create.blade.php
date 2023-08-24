@extends("admin.layouts.app")

@section("body")

<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            @include('admin.includes.breadcrumb-v2')
        </div>
        <div class="col-auto float-end ms-auto">
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card flex-fill">
            <div class="card-header">
                <h5 class="card-title mb-0">Add New User</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('administration.users.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" required>
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" id="btn-generate-username" type="button">Auto Generate</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Email Address</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email Address" required>
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Phone Numebr</label>
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter phone number" required>
                                @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="blood_group">Blood Group</label>
                                <select name="blood_group" id="blood_group" class="form-control">
                                    <option value="">Choose an option</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>    
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                                @error('blood_group')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="role_id">Role</label>
                                <select name="role_id" id="role_id" class="form-control">
                                    <option value="">Choose an option</option>
                                    @foreach (App\Models\RoleManager::where('id', '!=', 1)->where('slug', '!=', 'launch-manager')->get() as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">Choose an option</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row alert alert-info">
                        <div class="col-md-4">
                            <div class="checkbox">
                                <label class="m-0">
                                    <input type="checkbox" name="chk_add_bank_info" id="chk-add-bank-info"> Add Bank Details
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="checkbox">
                                <label class="m-0">
                                    <input type="checkbox" name="chk_add_clientAccount" id="chk_add_clientAccount"> Add Client Accounts
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            {{-- <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="chk_add_bank_info" id="chk-add-bank-info"> Add Bank Details
                                </label>
                            </div> --}}
                        </div>
                    </div>
                    <div class="row d-none" id="row-bank-details">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="bank_name">Bank Name</label>
                                <input type="text" name="bank_name" id="bank_name" class="form-control" placeholder="Enter bank name">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="bank_branch">Branch Name</label>
                                <input type="text" name="bank_branch" id="bank_branch" class="form-control" placeholder="Enter branch name">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="bank_account_name">Account Name</label>
                                <input type="text" name="bank_account_name" id="bank_account_name" class="form-control" placeholder="Enter account name">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="bank_account_number">Account Number</label>
                                <input type="text" name="bank_account_number" id="bank_account_number" class="form-control" placeholder="Enter account number">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="checkbox" id="chk-password-visibility">Show Password
                                <div class="input-group mb-3">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" id="btn-password-generate" type="button">Auto Generate</button>
                                    </div>
                                </div>
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="awards_won">Awards Won</label>
                                <input type="number" name="awards_won" id="awards_won" class="form-control" placeholder="Enter Number of Awards Won">
                                @error('awards_won')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="monthly_salary">Monthly Salary</label>
                                <input type="number" name="monthly_salary" id="monthly_salary" class="form-control" placeholder="Enter Monthly Salary">
                                @error('monthly_salary')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="joining_date">Join Date</label>
                                <input type="date" name="joining_date" id="joining_date" class="form-control" placeholder="Enter Joining Date">
                                @error('joining_date')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="department_id">Department</label>
                                <select name="department_id" id="department_id" class="form-control">
                                    <option value="">Choose an option</option>
                                    @foreach (App\Models\Department::all() as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                                @error('department_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="designation_id">Designation</label>
                                <select name="designation_id" id="designation_id" class="form-control">
                                    <option value="">Choose an option</option>
                                    @foreach (App\Models\EmployeeRole::all() as $designation)
                                        <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                                    @endforeach
                                </select>
                                @error('designation_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="team_lead_id">Team Lead</label>
                                <select name="team_lead_id" id="team_lead_id" class="form-control">
                                    <option value="">Choose an option</option>
                                    @foreach (App\Models\User::all() as $user)
                                        <option value="{{ $user->id }}">{{ $user->first_name . ' ' . $user->last_name }}</option>
                                    @endforeach
                                </select>
                                @error('team_lead_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="image">Profile Image</label>
                                <input type="file" class="dropify" name="image" id="dp-image" data-default-file="url_of_your_file" />
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-3 text-center">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection