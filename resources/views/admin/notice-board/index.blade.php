@extends('admin.layouts.app')

@section('body')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                @include('admin.includes.breadcrumb-v2')
            </div>
            <div class="col-auto float-end ms-auto">
                <a href="" type="button" class="btn btn-primary float-end" data-toggle="modal" data-target="#add-notice-board">
                    Add Notice
                </a>

                <div class="modal fade" id="add-notice-board" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="title" id="add-notice-boardLabel">Add New Notice</h4>
                            </div>
                            <form action="{{ route('admin.notice-board.store')}}" method="post">
                                @csrf
                                <div class="modal-body text-dark">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Notice Title">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="notice-description" rows="3" name="description" placeholder="Notice Description"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select class="form-control custom-select select2-hidden-accessible" name="status" id="nt-status">
                                                    <option>Select Status</option>
                                                    <option value="active">Active</option>
                                                    <option value="inactive">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="publish-date">Publish Date</label>
                                                <input type="date" class="form-control" id="publish-date" name="publish_date" placeholder="Publish Date">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="expiry-date">Expire Date</label>
                                                <input type="date" class="form-control" id="expiry-date" name="expiry_date" placeholder="Expiry Date">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">SAVE CHANGES</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0" id="tbl-notice-board">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th class="text-center">Title</th>
                                    <th class="text-center" width="15%">Description</th>
                                    <th class="text-center">Publish Date</th>
                                    <th class="text-center">Expiry Date</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Published By</th>
                                    <th class="text-center" width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tbd-notice-board">
                                @foreach ($noticeList as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>
                                            <div class="ellipsis">
                                                {!! $item->description !!}
                                            </div> 
                                        </td>
                                        <td class="text-center">{{ $item->notice_date }}</td>
                                        <td class="text-center">{{ $item->expiry_date }}</td>
                                        <td class="text-center">
                                            @if ($item->status == 'active')
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="text-center">{{ $item->createdBy->first_name . ' ' . $item->createdBy->last_name }}</td>
                                        <td>
                                            <a href="" type="button" data-toggle="modal" class="btn bg-inverse-primary" data-target="#mdl-view-notice-board-{{$item->id}}">
                                                <i class="fa fa-eye"></i>
                                            </a>

                                            <a href="" type="button" data-toggle="modal" class="btn bg-inverse-warning" data-target="#mdl-edit-notice-board-{{$item->id}}">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <div class="modal fade" id="mdl-edit-notice-board-{{$item->id}}" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="title" id="add-notice-boardLabel">Add New Notice</h4>
                                                        </div>
                                                        <form action="{{ route('admin.notice-board.store')}}" method="post">
                                                            @csrf
                                                            <div class="modal-body text-dark">
                                                                <div class="form-group">
                                                                    <label for="title">Title</label>
                                                                    <input type="text" class="form-control" value="{{$item->title}}" id="title" name="title" placeholder="Notice Title">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="description">Description</label>
                                                                    <textarea class="form-control" id="notice-description" rows="3" name="description" placeholder="Notice Description">{{$item->description}}</textarea>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="status">Status</label>
                                                                            <select class="form-control custom-select select2-hidden-accessible" name="status" id="nt-status">
                                                                                <option>Select Status</option>
                                                                                <option @if($item->status == 'active') selected @endif value="active">Active</option>
                                                                                <option @if($item->status == 'inactive') selected @endif value="inactive">Inactive</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="publish-date">Publish Date</label>
                                                                            <input type="date" class="form-control"  value="{{$item->notice_date}}" id="publish-date" name="publish_date" placeholder="Publish Date">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="expiry-date">Expire Date</label>
                                                                            <input type="date" class="form-control" id="expiry-date" value="{{$item->expiry_date}}" name="expiry_date" placeholder="Expiry Date">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-success">SAVE CHANGES</button>
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="_token" data-noticeId="{{$item->id}}" value="{{ csrf_token() }}">
                                            <a href="" type="button" class="btn bg-inverse-danger btn-dlt-notice" 
                                                data-url="{{ route('admin.notice-board.destroy', $item->id) }}" 
                                                data-noticeId="{{$item->id}}">
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
