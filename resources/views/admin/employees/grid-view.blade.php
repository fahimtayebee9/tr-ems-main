@extends('admin.layouts.app')

@section('body')

    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                @include('admin.includes.breadcrumb-v2')
            </div>
            <div class="col-auto float-end ms-auto">
                <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_employee"><i
                        class="fa fa-plus"></i> Add Employee</a>
                <div class="btn-group mr-2">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-download mr-2"></i> ACTIONS
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{ route('administration.users.create') }}" class="dropdown-item">Add New</a>
                        <a href="" data-toggle="modal" type="button" class="dropdown-item"
                            data-target="#md-upload-employees-bulk">
                            Upload Flat File
                        </a>
                        <a class="dropdown-item" href="">Export Data</a>
                        {{-- Download Template Button --}}
                        <a class="dropdown-item"
                            href="{{ URL::to('/') }}/storage/uploads/templates/Bulk-Users-Template.xlsx" download
                            target="_blank">Download Template</a>
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

    <div class="row staff-grid-row">
        @if (!empty($employees))
            @foreach ($employees as $user)
                <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                    <div class="profile-widget">
                        <div class="profile-img">
                            <a href="#" class="avatar">
                                {{-- <img src="{{ asset('storage/uploads/users/' . $user->user->image) }}" alt=""> --}}
                                @if (empty($user->user->image))
                                    <img src="{{ asset('storage/uploads/users/default.webp') }}" class="rounded-circle avatar" alt="">
                                @else
                                    <img src="{{ asset('storage/uploads/users/' . $user->user->image) }}"
                                        class="rounded-circle avatar" alt="">
                                @endif
                            </a>
                        </div>
                        <div class="dropdown profile-action">
                            <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                    data-bs-target="#edit_employee"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                    data-bs-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                            </div>
                        </div>
                        <h4 class="user-name m-t-10 mb-0 text-ellipsis">
                            <a href="profile.html">
                                {{ $user->user->first_name . ' ' . $user->user->last_name }}
                            </a>
                        </h4>
                        <div class="small text-muted">
                            @if (!empty($user->department))
                                {{ $user->department->name }}
                            @else
                                N/A
                            @endif
                        </div>
                        <div class="small text-muted">
                            {{ $user->designation->name }}
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="alert alert-info">No Administrative Roles Found</div>
        @endif

    </div>


@endsection
