@extends("admin.layouts.app")

@section("body")

<div class="page-header">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            @include('admin.includes.breadcrumb-v2')
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-end">
            <div class="btn-group ml-2">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-download mr-2"></i> ACTIONS
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="{{ route('administration.users.create') }}" class="dropdown-item">Add New</a>
                    <a href="" data-toggle="modal" type="button" class="dropdown-item" data-target="#md-upload-users-bulk">
                        Upload Flat File
                    </a>
                    <a class="dropdown-item" href="">Export Data</a>
                    {{-- Download Template Button --}}
                    <a class="dropdown-item" href="{{URL::to('/')}}/storage/uploads/templates/Bulk-Users-Template.xlsx" download target="_blank">Download Template</a>
                </div>
            </div>

            @include('admin.includes.modals.md-bulk-import-users')
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="table-header-actions row">
                    <div class="col-md-6">
                        <h2>Administrative Users List</h2>
                    </div>
                    <div class="col-md-6 justify-content-end d-flex">

                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="">
                    @if(!empty($users))
                    <table style="width:100%!important; text-overflow: ellipsis;" class="table table-hover js-basic-example dataTable table-custom table-striped m-b-0 c_list no-footer" id="administrative_users_tbl" role="grid" aria-describedby="administrative_users_tbl_info">
                        <thead class="thead-dark">
                            <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="administrative_users_tbl" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 245.812px;">Name</th>
                                <th class="sorting" tabindex="0" aria-controls="administrative_users_tbl" rowspan="1" colspan="1" aria-label="Employee ID: activate to sort column ascending" style="width: 168.344px;">Employee ID</th>
                                <th class="sorting" tabindex="0" aria-controls="administrative_users_tbl" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 181.422px;">Phone</th>
                                <th class="sorting" tabindex="0" aria-controls="administrative_users_tbl" rowspan="1" colspan="1" aria-label="Join Date: activate to sort column ascending" style="width: 143.297px;">Blood Group</th>
                                <th class="sorting" tabindex="0" aria-controls="administrative_users_tbl" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 199.969px;">Role</th>
                                <th class="sorting" tabindex="0" aria-controls="administrative_users_tbl" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 108.172px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                @if($loop->iteration % 2 == 0)
                                    <tr role="row" class="even">
                                        <td class="d-flex justify-content-start align-items-center">
                                            <span class="mr-3">
                                                @if (!empty($user->image))
                                                    <img src="{{asset('storage/uploads/users/' . $user->image)}}" class="rounded-circle avatar" alt="">
                                                @else
                                                    <img src="{{asset('storage/uploads/users/default.webp')}}" class="rounded-circle avatar" alt="">
                                                @endif
                                            </span>
                                            <span>
                                                <h6 class="mb-0">{{$user->first_name . ' '. $user->last_name}}</h6>
                                                <span>{{$user->email}}</span>
                                            </span>
                                        </td>
                                        <td><span>{{$user->username}}</span></td>
                                        <td><span>{{$user->phone}}</span></td>
                                        <td>
                                            {{ $user->blood_group }}
                                        </td>
                                        <td>
                                            {{ $user->role->name }}
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-sm btn-outline-danger js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                        </td>
                                    </tr>
                                @else
                                    <tr role="row" class="odd">
                                        <td class="d-flex justify-content-start align-items-center">
                                            <span class="mr-3">
                                                <img src="{{asset('storage/uploads/users/' . $user->image)}}" class="rounded-circle avatar" alt="">
                                            </span>
                                            <span>
                                                <h6 class="mb-0">{{$user->first_name . ' '. $user->last_name}}</h6>
                                                <span>{{$user->email}}</span>
                                            </span>
                                        </td>
                                        <td><span>{{$user->username}}</span></td>
                                        <td><span>{{$user->phone}}</span></td>
                                        <td>
                                            {{ $user->blood_group }}
                                        </td>
                                        <td>
                                            {{ $user->role->name }}
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-sm btn-outline-danger js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    @else 
                    <div class="alert alert-info">No Administrative Roles Found</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection