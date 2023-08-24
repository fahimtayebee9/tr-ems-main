@extends('admin.layouts.app')

@section('body')

    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                @include('admin.includes.breadcrumb-v2')
            </div>
            <div class="col-auto float-end ms-auto">
                <a href="{{ route('administration.users.create') }}" class="btn add-btn">
                    <i class="fa fa-plus"></i> Add Employee
                </a>
                <div class="btn-group mr-2">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="fa fa-download mr-2"></i> ACTIONS
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="" data-toggle="modal" type="button" class="dropdown-item"
                            data-target="#md-upload-employees-bulk">
                            Upload Flat File
                        </a>
                        <a class="dropdown-item" href="">Export Data</a>
                        {{-- Download Template Button --}}
                        <a class="dropdown-item"
                            href="{{ URL::to('/') }}/storage/uploads/templates/Bulk-Users-Template.xlsx" download
                            target="_blank">
                            Download Template
                        </a>
                    </div>
                </div>

                @include('admin.includes.modals.md-bulk-import-employees')
                
                <div class="view-icons">
                    <a href="{{ route('admin.employees.grid-view') }}"
                        class="grid-view btn btn-link {{ session()->get('view_type') == 'grid_view' ? 'active' : '' }}"><i
                            class="fa fa-th"></i></a>
                    <a href="{{ route('admin.employees.index') }}"
                        class="list-view btn btn-link {{ session()->get('view_type') == 'list_view' ? 'active' : '' }}"><i
                            class="fa fa-bars"></i></a>
                </div>
            </div>
        </div>
    </div>


    <div class="row filter-row">
        <div class="col-md-12">
            {{-- <form action="{{ route('admin.employees.filterIndex') }}" method="post" id="employee_tbl_filter_form"> --}}
                <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-sm-6 col-md-5">
                        <div class="form-group form-focus">
                            <input type="hidden" name="department_url" value="{{ route('admin.employees.filter.department') }}">
                            <select class="select floating" id="flt-department" name="department_id">
                                <option>Select Department</option>
                                @if (\App\Models\Department::all()->count() > 0)
                                    @foreach (\App\Models\Department::all() as $item)
                                        <option value="{{$item->id}}">{{ $item->name }}</option>
                                    @endforeach    
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-5">
                        <div class="form-group form-focus select-focus focused">
                            <input type="hidden" name="designation_url" value="{{ route('admin.employees.filter.designation') }}">
                            <select class="select floating" id="flt-designation" name="designation_id">
                                <option>Select Designation</option>
                                @if (\App\Models\EmployeeRole::all()->count() > 0)
                                    @foreach (\App\Models\EmployeeRole::all() as $item)
                                        <option value="{{$item->id}}">{{ $item->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-2">
                        <div class="d-grid">
                            <a href="{{ route('admin.employees.index') }}" class="btn btn-warning w-100"> Refresh </a>
                        </div>
                    </div>
                </div>
            {{-- </form> --}}
        </div>
    </div>

    <div class="row">
        @if (!empty($employees))
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table style="width:100%!important; text-overflow: ellipsis;" id="employees_tbl"
                            aria-describedby="employees_tbl_info"
                            class="table table-bordered table-striped table-hover table-custom m-b-0 c_list no-footer dataTable js-exportable">
                            <thead>
                                <tr role="row">
                                    <th class="sorting text-center" tabindex="0" aria-controls="employees_tbl"
                                        rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
                                        Name</th>
                                    <th class="sorting text-center" tabindex="0" aria-controls="employees_tbl"
                                        rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending">
                                        Client Account</th>
                                    <th class="sorting text-center" tabindex="0" aria-controls="employees_tbl"
                                        rowspan="1" colspan="1"
                                        aria-label="Join Date: activate to sort column ascending">Join Date</th>
                                    <th class="sorting text-center" tabindex="0" aria-controls="employees_tbl"
                                        rowspan="1" colspan="1"
                                        aria-label="Designation: activate to sort column ascending">Designation</th>
                                    <th class="sorting text-center" tabindex="0" aria-controls="employees_tbl"
                                        rowspan="1" colspan="1"
                                        aria-label="Team Lead: activate to sort column ascending">Team Lead</th>
                                    <th class="sorting text-center" tabindex="0" aria-controls="employees_tbl"
                                        rowspan="1" colspan="1"
                                        aria-label="Salary: activate to sort column ascending">Salary</th>
                                    <th class="sorting text-center" tabindex="0" aria-controls="employees_tbl"
                                        rowspan="1" colspan="1"
                                        aria-label="Salary: activate to sort column ascending">Bank Info</th>
                                    <th class="sorting text-center" tabindex="0" aria-controls="employees_tbl"
                                        rowspan="1" colspan="1"
                                        aria-label="Action: activate to sort column ascending">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $user)
                                    <tr role="row" class="">
                                        <td class="d-flex justify-content-start align-items-center">
                                            <span class="mr-3">
                                                @if (empty($user->user->image))
                                                    <img src="{{ asset('storage/uploads/users/default.webp') }}" class="rounded-circle avatar" alt="">
                                                @else
                                                    <img src="{{ asset('storage/uploads/users/' . $user->user->image) }}"
                                                        class="rounded-circle avatar" alt="">
                                                @endif
                                            </span>
                                            <span>
                                                <h6 class="mb-0">
                                                    {{ $user->user->first_name . ' ' . $user->user->last_name }}
                                                </h6>
                                                <span>{{ $user->email }}</span>
                                                <span>{{ $user->user->username }}</span> <br>
                                                @if (!empty($user->department))
                                                    <span
                                                        class="badge bg-inverse-info">{{ $user->department->name }}</span>
                                                @else
                                                    <span class="badge bg-inverse-danger">No Department</span>
                                                @endif
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            @php
                                                $accountManagers = '';
                                                $list = $user->getAccountManagers;
                                                foreach ($user->getAccountManagers as $accountManager) {
                                                    $accountManagers .= $accountManager->caccount->account_name;
                                                
                                                    if ($list[count($list) - 1] != $accountManager) {
                                                        $accountManagers .= ', ';
                                                    }
                                                }
                                            @endphp
                                            @if (count($user->getAccountManagers))
                                                <span class="badge badge-info" data-title="{{ $accountManagers }}"
                                                    data-toggle="tooltip">{{ $accountManagers }}</span>
                                            @else
                                                <span class="badge badge-info" data-title="No Account Assigned"
                                                    data-toggle="tooltip">N/A</span>
                                            @endif

                                            <button type="button" class="btn btn-sm btn-outline-info"
                                                data-toggle="modal" data-target="#accountManager-{{ $user->id }}"
                                                data-empid="{{ $user->id }}" title="Update Accounts"><i
                                                    class="fa fa-file"></i></button>

                                            <div class="modal fade" id="accountManager-{{ $user->id }}"
                                                tabindex="-1" role="dialog"
                                                aria-labelledby="accountManager-{{ $user->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="departmentModalLabel">Bank
                                                                Client Accounts Assigned To: {{ $user->employee_id }}
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="" method="post">
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <select name="" id=""
                                                                        class="form-control" multiple>
                                                                        @foreach (\App\Models\ClientAccount::all() as $item)
                                                                            <option value="{{ $item->id }}">
                                                                                {{ $item->account_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary"
                                                                    style="margin-left: 15px!important;">SAVE
                                                                    CHANGES</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            {{ $user->getJoiningDateAttribute($user->joining_date) }}
                                        </td>
                                        <td class="text-center">
                                            @if (!empty($user->designation))
                                                {{ $user->designation->name }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            {{ !empty($user->teamLead) ? $user->teamLead->first_name . ' ' . $user->teamLead->last_name : 'N/A' }}
                                        </td>
                                        <td class="text-center">
                                            {{ 'BDT. ' . $user->monthly_salary }}
                                        </td>
                                        <td class="text-center">
                                            {{-- Modal Trigger for Bank details --}}
                                            <button type="button" class="btn btn-sm btn-outline-info"
                                                data-toggle="modal" data-target="#bankDetailsModal-{{ $user->id }}"
                                                data-empid="{{ $user->id }}" title="Bank Details"><i
                                                    class="fa fa-bank"></i></button>

                                            <div class="modal fade" id="bankDetailsModal-{{ $user->id }}"
                                                tabindex="-1" role="dialog"
                                                aria-labelledby="bankDetailsModal-{{ $user->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="departmentModalLabel">Bank
                                                                Account Details For: {{ $user->employee_id }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @if (isset($user->payrollAccount) && !empty($user->payrollAccount) && $user->payrollAccount != null)
                                                                <div class="table-responsive">
                                                                    <table class="table mb-0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Bank Name</td>
                                                                                <td class="text-info">
                                                                                    <span>{{ $user->payrollAccount->bank_name }}</span>
                                                                                </td>
                                                                                <td>Branch Name</td>
                                                                                <td class="text-info">
                                                                                    {{ $user->payrollAccount->bank_branch }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Account Name</td>
                                                                                <td class="text-info">
                                                                                    <span>{{ $user->payrollAccount->account_name }}</span>
                                                                                </td>
                                                                                <td>Account No</td>
                                                                                <td class="text-info">
                                                                                    {{ $user->payrollAccount->account_number }}
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            @else
                                                                <div class="alert alert-warning">
                                                                    <strong>Warning!</strong> No bank details
                                                                    found.
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            @if (isset($user->payrollAccount) && !empty($user->payrollAccount) && $user->payrollAccount != null)
                                                                <a type="button" data-toggle="modal"
                                                                    data-target="#mdl-update-payroll-account-{{ $user->id }}"
                                                                    class="btn btn-primary"
                                                                    style="margin-left: 15px!important;">EDIT</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="mdl-update-payroll-account-{{ $user->id }}"
                                                tabindex="-1" role="dialog"
                                                aria-labelledby="mdl-update-payroll-account-{{ $user->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="departmentModalLabel">
                                                                Update Bank Account Details For:
                                                                {{ $user->employee_id }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @if (isset($user->payrollAccount) && !empty($user->payrollAccount) && $user->payrollAccount != null)
                                                                <form
                                                                    action="{{ route('admin.employee.update.payrollaccount', $user->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="emp_id"
                                                                        value="{{ $user->id }}">
                                                                    <div class="form-group">
                                                                        <label for="bank_name">Bank Name</label>
                                                                        <input type="text" name="bank_name"
                                                                            id="bank_name" class="form-control"
                                                                            value="{{ $user->payrollAccount->bank_name }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="bank_branch">Branch
                                                                            Name</label>
                                                                        <input type="text" name="bank_branch"
                                                                            id="bank_branch" class="form-control"
                                                                            value="{{ $user->payrollAccount->bank_branch }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="account_name">Account
                                                                            Name</label>
                                                                        <input type="text" name="account_name"
                                                                            id="account_name" class="form-control"
                                                                            value="{{ $user->payrollAccount->account_name }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="account_number">Account
                                                                            No</label>
                                                                        <input type="text" name="account_number"
                                                                            id="account_number" class="form-control"
                                                                            value="{{ $user->payrollAccount->account_number }}">
                                                                    </div>
                                                                    <div class="form-group">

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            style="margin-left: 15px!important;"
                                                                            class="btn btn-primary">Update</button>
                                                                    </div>
                                                                </form>
                                                            @else
                                                                <div class="alert alert-warning">
                                                                    <strong>Warning!</strong> No bank details
                                                                    found.
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.employees.edit', $user) }}" data-toggle="tooltip"
                                                data-title="Edit" class="btn btn-sm btn-outline-secondary"
                                                title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-outline-danger btn-emp-delete"
                                                id="btn-emp-delete" data-empid="{{ $user->id }}"
                                                data-toggle="tooltip" data-title="Delete" data-type="confirm">
                                                <i class="fa fa-trash-o"></i>
                                            </button>

                                            {{-- ADD ACCOUNT MANAGER MODAL --}}
                                            <a href="" data-toggle="modal"
                                                data-target="#edit-client-account-management-{{ $user->id }}"
                                                data-title="Edit Client Accounts" class="btn btn-sm btn-outline-warning">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            {{-- modal area --}}
                                            <div class="modal fade"
                                                id="edit-client-account-management-{{ $user->id }}" tabindex="-1"
                                                role="dialog"
                                                aria-labelledby="edit-client-account-management-{{ $user->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="departmentModalLabel">
                                                                Update Client Account Managers:
                                                                {{ $user->employee_id }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('admin.client-accounts.assign') }}"
                                                            method="post">
                                                            <div class="modal-body">
                                                                @csrf
                                                                <input type="hidden" name="user_id"
                                                                    value="{{ $user->user_id }}">
                                                                <div class="form-group">
                                                                    <label for="caccounts"
                                                                        class="d-block text-left">Choose Client
                                                                        Accounts</label>
                                                                    <select name="caccounts[]"
                                                                        class="caccounts form-control" multiple>
                                                                        @foreach (\App\Models\ClientAccount::all() as $account)
                                                                            <option value="{{ $account->id }}">
                                                                                {{ $account->account_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary mr-3"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-info">No Employees Found</div>
        @endif
    </div>


@endsection
