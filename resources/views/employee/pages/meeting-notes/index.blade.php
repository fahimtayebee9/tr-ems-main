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
                    <div class="right-col w-50 d-flex justify-content-end align-items-center">
                        <div class="leave-filter mr-3 w-50">
                            <select class="form-control custom-select select2-hidden-accessible w-100" name="leave_type" id="leave-type-filter">
                                <option>Select Account</option>
                                @foreach(Auth::user()->employee->getAccountManagers as $account)
                                    <option value="{{ $account->caccount->id }}">{{ $account->caccount->account_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <a href="{{ route('employee.meeting-notes.create') }}" class="btn btn-info btn-sm">
                            <i class="fas fa-plus" style="font-size: 10px;"></i>
                            Add New Note
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th width="10%">Client Account</th>
                                <th width="10%">Date</th>
                                <th width="35%">Note</th>
                                <th width="10%">URL</th>
                                <th width="10%">Priority</th>
                                <th width="6%">Action</th>
                            </tr>
                        </thead>
                        <tbody id="meetingNotes-table-emp">
                            @foreach($meetingNoteList as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->clientAccount->account_name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d M, Y') }}</td>
                                    <td>{{ $item->note }}</td>
                                    <td>
                                        @if($item->url != null)
                                            <a href="{{ $item->url }}" target="_blank" class="btn btn-primary btn-sm">View URL</a>
                                        @else
                                        <span class="badge badge-danger">N\A</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->priority == 1)
                                            <span class="badge badge-danger">High</span>
                                        @elseif($item->priority == 2)
                                            <span class="badge badge-warning">Medium</span>
                                        @else
                                            <span class="badge badge-success">Low</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- Edit --}}
                                        <a href="" class="btn btn-primary btn-sm">
                                            <i class="fas fa-edit" style="font-size: 14px;"></i>
                                        </a>
                                        {{-- Delete --}}
                                        <a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="deleteMeetingNotes({{ $item->id }})">
                                            <i class="fas fa-trash-alt" style="font-size: 14px;"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div><!-- end row-->

@endsection