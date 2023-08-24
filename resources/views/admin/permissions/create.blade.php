@extends("admin.layouts.app")

@section("body")

<div class="page-header">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h2>{{ session('page_title') }}</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i>
                        Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item active">
                    Administrative Permissions
                </li>
            </ul>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-end">
            <!-- <button data-toggle="modal" type="button" class="btn btn-primary" data-target="#md-create-permission"><i class="fa fa-plus"></i> Add New</button> -->
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('permissions.store') }}" method="post" id="fr-permission-create">
                    @csrf
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="role_id">Choose Employee</label>
                                <select name="role_id" id="role_id" class="form-control">
                                    <option value="">Select Employee</option>
                                    @foreach(\App\Models\Employee::all() as $emp)
                                        <option value="{{ $emp->id }}">{{ $emp->user->first_name . " " . $emp->user->last_name }} </option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5">
                            {{-- <div class="form-group">
                                <label for="checkbox" style="display: block;">Grant All Access</label>
                                <!-- checkbox to toggle all as granted -->
                                <label class="fancy-checkbox">
                                    <input type="checkbox" name="checkbox" id="checkbox-toggle-all" required="" data-parsley-errors-container="#error-checkbox" data-parsley-multiple="checkbox">
                                    <span>Toggle all as Granted</span>
                                </label>
                            </div> --}}
                        </div>
                    </div>

                    @php
                        $systems = [
                            'Employee',
                            'Attendance',
                            'Holiday',
                            'Company Policy',
                            'Launch',
                            'Leave',
                            'Departments',
                            'Payroll',
                            'Accounts',
                            'Task',
                            'Report',
                            'Administration',
                        ];
                        $types = [
                            'Read',
                            'Create',
                            'Update',
                            'Delete',
                        ];
                    @endphp

                    <div class="row">
                        <div class="col-md-12">
                            {{-- add $types as column and $systems as rows --}}
                            <table class="table">
                                <tr>
                                    <th></th>
                                    @foreach($types as $column)
                                    <th class="text-center">{{$column}}</th>
                                    @endforeach
                                    <th class="text-center">Full Access</th>
                                </tr>
                                @foreach($systems as $row)
                                <tr>
                                    <td>{{$row}} Management</td>
                                    @foreach($types as $column)
                                    <td class="text-center">
                                        <label class="fancy-checkbox">
                                            <input type="checkbox" 
                                                name="{{ (str_contains($row, ' ')) ? str_replace(' ', '_', strtolower($row)) : strtolower($row) }}_{{strtolower($column)}}" 
                                                id="{{strtolower($row)}}_{{strtolower($column)}}" class="checkbox-toggle" 
                                                data-parsley-errors-container="#error-checkbox" data-parsley-multiple="checkbox">
                                            <span></span>
                                        </label>
                                    </td>
                                    @endforeach
                                    <td class="text-center">
                                        <label class="fancy-checkbox">
                                            <input type="checkbox" 
                                                name="{{ (str_contains($row, ' ')) ? str_replace(' ', '_', strtolower($row)) : strtolower($row) }}_full_access" 
                                                id="" class="checkbox-toggle" 
                                                data-parsley-errors-container="#error-checkbox" data-parsley-multiple="checkbox">
                                            <span></span>
                                        </label>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>

                    {{-- @foreach($systems as $column)
                    <div class="row column-info">
                        <div class="col-md-12">
                            <label for="title">{{$column}} Management</label>
                        </div>
                        @foreach($types as $type)
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="{{strtolower($column)}}_{{strtolower($type)}}">{{$type}} Access</label>
                                <select name="{{ (str_contains($column, ' ')) ? str_replace(' ', '_', strtolower($column)) : strtolower($column) }}_{{strtolower($type)}}" id="{{strtolower($column)}}_{{strtolower($type)}}" class="form-control">
                                    <option value="">Choose an option</option>
                                    <option value="1">Granted</option>
                                    <option value="0">Rejected</option>
                                </select>
                                @error('{{strtolower($column)}}_{{strtolower($type)}}')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endforeach --}}
                    <div class="footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include("admin.includes.modals.md-create-permisison")

@endsection