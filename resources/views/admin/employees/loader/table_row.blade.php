@if (!empty($employees))
    @foreach ($employees as $user)
        <tr role="row" class="">
            <td class="d-flex justify-content-start align-items-center">
                <span class="mr-3">
                    {{-- check if user has image --}}
                    @if (empty($user->user->image))
                        <img src="{{ asset('storage/uploads/users/default.png') }}" class="rounded-circle avatar"
                            alt="">
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
                        <span class="badge bg-inverse-info">{{ $user->department->name }}</span>
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
                    <span class="badge badge-info" data-title="No Account Assigned" data-toggle="tooltip">N/A</span>
                @endif

                <button type="button" class="btn btn-sm btn-outline-info" data-toggle="modal"
                    data-target="#accountManager-{{ $user->id }}" data-empid="{{ $user->id }}"
                    title="Update Accounts"><i class="fa fa-file"></i></button>

                <div class="modal fade" id="accountManager-{{ $user->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="accountManager-{{ $user->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="departmentModalLabel">Bank
                                    Client Accounts Assigned To: {{ $user->employee_id }}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <select name="" id="" class="form-control" multiple>
                                            @foreach (\App\Models\ClientAccount::all() as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->account_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                {{ $user->designation->name }}
            </td>
            <td class="text-center">
                {{ !empty($user->teamLead) ? $user->teamLead->first_name . ' ' . $user->teamLead->last_name : 'N/A' }}
            </td>
            <td class="text-center">
                {{ 'BDT. ' . $user->monthly_salary }}
            </td>
            <td class="text-center">
                {{-- Modal Trigger for Bank details --}}
                <button type="button" class="btn btn-sm btn-outline-info" data-toggle="modal"
                    data-target="#bankDetailsModal-{{ $user->id }}" data-empid="{{ $user->id }}"
                    title="Bank Details"><i class="fa fa-bank"></i></button>

                <div class="modal fade" id="bankDetailsModal-{{ $user->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="bankDetailsModal-{{ $user->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="departmentModalLabel">Bank
                                    Account Details For: {{ $user->employee_id }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                @if (isset($user->payrollAccount) && !empty($user->payrollAccount) && $user->payrollAccount != null)
                                    <a type="button" data-toggle="modal"
                                        data-target="#mdl-update-payroll-account-{{ $user->id }}"
                                        class="btn btn-primary" style="margin-left: 15px!important;">EDIT</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="mdl-update-payroll-account-{{ $user->id }}" tabindex="-1"
                    role="dialog" aria-labelledby="mdl-update-payroll-account-{{ $user->id }}"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="departmentModalLabel">
                                    Update Bank Account Details For:
                                    {{ $user->employee_id }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @if (isset($user->payrollAccount) && !empty($user->payrollAccount) && $user->payrollAccount != null)
                                    <form action="{{ route('admin.employee.update.payrollaccount', $user->id) }}"
                                        method="post">
                                        @csrf
                                        <input type="hidden" name="emp_id" value="{{ $user->id }}">
                                        <div class="form-group">
                                            <label for="bank_name">Bank Name</label>
                                            <input type="text" name="bank_name" id="bank_name"
                                                class="form-control" value="{{ $user->payrollAccount->bank_name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="bank_branch">Branch
                                                Name</label>
                                            <input type="text" name="bank_branch" id="bank_branch"
                                                class="form-control"
                                                value="{{ $user->payrollAccount->bank_branch }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="account_name">Account
                                                Name</label>
                                            <input type="text" name="account_name" id="account_name"
                                                class="form-control"
                                                value="{{ $user->payrollAccount->account_name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="account_number">Account
                                                No</label>
                                            <input type="text" name="account_number" id="account_number"
                                                class="form-control"
                                                value="{{ $user->payrollAccount->account_number }}">
                                        </div>
                                        <div class="form-group">

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" style="margin-left: 15px!important;"
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
                <a href="{{ route('admin.employees.edit', $user) }}" data-toggle="tooltip" data-title="Edit"
                    class="btn btn-sm btn-outline-secondary" title="Edit">
                    <i class="fa fa-edit"></i>
                </a>
                <button type="button" class="btn btn-sm btn-outline-danger btn-emp-delete" id="btn-emp-delete"
                    data-empid="{{ $user->id }}" data-toggle="tooltip" data-title="Delete" data-type="confirm">
                    <i class="fa fa-trash-o"></i>
                </button>

                {{-- ADD ACCOUNT MANAGER MODAL --}}
                <a href="" data-toggle="modal"
                    data-target="#edit-client-account-management-{{ $user->id }}"
                    data-title="Edit Client Accounts" class="btn btn-sm btn-outline-warning">
                    <i class="fa fa-edit"></i>
                </a>

                {{-- modal area --}}
                <div class="modal fade" id="edit-client-account-management-{{ $user->id }}" tabindex="-1"
                    role="dialog" aria-labelledby="edit-client-account-management-{{ $user->id }}"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="departmentModalLabel">
                                    Update Client Account Managers:
                                    {{ $user->employee_id }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('admin.client-accounts.assign') }}" method="post">
                                <div class="modal-body">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $user->user_id }}">
                                    <div class="form-group">
                                        <label for="caccounts" class="d-block text-left">Choose Client
                                            Accounts</label>
                                        <select name="caccounts[]" class="caccounts form-control" multiple>
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
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    @endforeach

@endif
