@extends("admin.layouts.app")

@section("body")

<div class="page-header">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            @include('admin.includes.breadcrumb-v2')
        </div>
        <div class="col-md-6 text-right">
            <button class="btn btn-info" data-toggle="modal" data-target="#mdl-provider-add">Add New Provider</button>

            @include('admin.includes.modals.providers.mdl-provider-add')
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body attendance-table-box">
                <div class="t" id="attendance-tbl">
                    @php
                        // dd($employees->count(), $users->count());
                    @endphp
                    @if(!empty($launchProviderList))
                    <table style="width:100%!important; text-overflow: ellipsis;" class="table table-hover js-basic-example dataTable table-custom table-striped m-b-0 c_list no-footer" id="employees_tbl" role="grid" aria-describedby="employees_tbl_info">
                        <thead class="thead-light">
                            <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="employees_tbl" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" 
                                    style="width: 70px;">#</th>
                                <th class="sorting">Name</th>
                                <th class="sorting">Phone</th>
                                <th class="sorting">Address</th>
                                <th class="sorting">Unit Price</th>
                                <th class="sorting">Vehicle Rent</th>
                                <th class="sorting">Status</th>
                                <th class="" width="200px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($launchProviderList as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="assets/images/xs/avatar1.jpg" class="rounded-circle avatar" alt="">
                                        <p class="c_name">
                                            {{ $item->name }}
                                        </p>
                                    </td>
                                    <td>
                                        {{ $item->phone}}
                                    </td>
                                    <td>
                                        {{ $item->address}}
                                    </td>
                                    <td>
                                        BDT. {{ $item->unit_price}}
                                    </td>
                                    <td>
                                        BDT. {{ $item->vehicle_cost }}
                                    </td>
                                    <td>
                                        @if($item->status == 1)
                                            <span class="badge badge-info hidden-sm-down">ACTIVE</span>
                                        @else
                                            <span class="badge badge-info hidden-sm-down">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- modal trigger for edit --}}
                                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#mdl-provider-edit-{{ $item->id }}">Edit</button>
                                        @include('admin.includes.modals.providers.mdl-provider-edit')

                                        {{-- modal trigger for delete --}}
                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#mdl-provider-delete-{{ $item->id }}">Delete</button>
                                        {{-- @include('admin.includes.modals.mdl-provider-delete') --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="alert alert-info">No Proider Details Found</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection