@extends("admin.layouts.app")

@section("body")

<div class="page-header">
    <div class="row">
        <div class="col-md-6">
            @include('admin.includes.breadcrumb-v2')
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-end">
            <div class="btn-group ml-2">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-plus mr-2"></i> ADD
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="" data-toggle="modal" data-target="#mdl-add-single-account">Add Single Account</a>
                    <a class="dropdown-item" href="" data-toggle="modal" data-target="#mdl-add-bulk-account">Bulk Import Accounts</a>
                </div>
            </div>

            {{-- EXPORT DROPDOWN --}}
            <div class="btn-group ml-2">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-download mr-2"></i> ACTIONS
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="">Export Accounts</a>
                    {{-- Download Template Button --}}
                    <a class="dropdown-item" href="{{URL::to('/')}}/storage/uploads/templates/Bulk-Client-Account-Template.xlsx" download target="_blank">Download Template</a>
                </div>
            </div>

            @include('admin.includes.modals.md-bulk-import-client-accounts')
            @include('admin.includes.modals.md-add-client-account')
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table custom-table mb-0" id="tbl-leave-applications">
                        <thead class="thead-light">
                            <tr>
                                <th width="5%">#</th>
                                <th>Account Name</th>
                                <th width="10%">Marketplace</th>
                                <th width="10%">Status</th>
                                <th width="5%" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbd-client-accounts">
                            @foreach($listItems as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->account_name }}</td>
                                    <td>
                                        @if($item->marketplace == 1)
                                            <span class="badge badge-warning">AMAZON</span>
                                        @else
                                            <span class="badge badge-blue">WALMART</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->status == 1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-warning" href="" data-toggle="modal" data-target="#mdl-edit-client-account">
                                            <i class="fa fa-pencil"></i>
                                        </a>

                                        @include('admin.includes.modals.md-edit-client-account')

                                        <a class="btn btn-sm btn-danger" href="" data-toggle="modal" data-target="#mdl-delete-client-account">
                                            <i class="fa fa-trash"></i>
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
</div>


@endsection