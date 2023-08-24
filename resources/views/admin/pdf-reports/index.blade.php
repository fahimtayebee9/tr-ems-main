@extends('admin.layouts.app')

@section('body')
    <div class="page-header">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                @include('admin.includes.breadcrumb-v2')
            </div>

            <div class="col-lg-8 col-md-8 col-sm-12 d-flex align-items-center justify-content-end">
                <a class="btn btn-danger" href="" id="delete-all-account-btn" data-target="#delete-all-account-modal" data-toggle="modal">
                    Delete All PDFs
                </a>

                <div class="modal fade" id="delete-all-account-modal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="title" id="edit-weekly-sales-rowLabel">Confirmation</h4>
                            </div>
                            <form action="{{ route('admin.reports.pdf.destroy.allReport') }}" method="post">
                                @csrf
                                <div class="modal-body text-dark text-left">
                                    <p style="font-size: 20px;">
                                        Do you want to <b>Delete</b> the generated PDF report? X
                                    </p>
                                    @php
                                        $pdfReportIds = App\Models\PdfReport::all()->pluck('id')->toArray();
                                        $pdfReportIds = implode(',', $pdfReportIds);
                                    @endphp
                                    <input type="hidden" name="accounts_id" value="{{ $pdfReportIds }}">
                                </div>
                                <div class="modal-footer text-center">
                                    <button type="submit" class="btn btn-primary btn-lg">Yes, Delete All!</button>
                                    <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">CLOSE</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @php
        $file_size = 0;
        $units = array('B', 'KB', 'MB', 'GB', 'TB');
        $files = Storage::disk('pdfs')->files();
        $precision = 2;

        foreach ($files as $key => $file) {
            $file_size += Storage::disk('pdfs')->size($file);
        }

        $pow = floor(($file_size ? log($file_size) : 0) / log(1024)); 
        $pow = min($pow, count($units) - 1); 
        $totalSize = formatSize($file_size, $pow, $units, $precision);

        function formatSize($size, $pow, $unit, $precision) {
            if($unit[$pow] == "KB")
            {
                return (number_format(round($size / 1024,4), 2) > 0) ? number_format(round($size / 1024,4), 2) : 0 . ' KB';	
            }
            if($unit[$pow] == "MB")
            {
                return (number_format(round($size / 1024 / 1024,4), 2) > 0) ? number_format(round($size / 1024 / 1024,4), 2) : 0 . ' MB';	
            }
            if($unit[$pow] == "GB")
            {
                return (number_format(round($size / 1024 / 1024 / 1024,4), 2) > 0) ? number_format(round($size / 1024 / 1024 / 1024,4), 2) : 0 . ' GB';	
            }
            return 0;
        }
    @endphp   

    <div class="row">
        <div class="col-md-12">
            <div class="card-group m-b-30">
                <div class="card bg-inverse-primary">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <span class="d-block">Total PDF's</span>
                            </div>
                        </div>
                        <h3 class="mb-3">
                            {{ count($pdfReportsList) }}
                        </h3>
                        <p class="mb-0">
                            Previous Month
                            <span class="text-muted">
                                0
                            </span>    
                        </p>
                    </div>
                </div>
                <div class="card bg-inverse-warning">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <span class="d-block">Directory Size</span>
                            </div>
                        </div>
                        <h3 class="mb-3">
                            {{ $totalSize }}
                        </h3>
                        <p class="mb-0">
                            Size Limit
                            <span class="text-muted">
                                0
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="body">
                    <div class="table-responsivex">
                        <table class="table table-striped custom-table mb-0" id="tbl-reports-list">
                            <thead>
                                <tr class="align-items-center">
                                    <th class="align-middle text-left" width="5%">#</th>
                                    <th class="align-middle text-center" width="10%">Week</th>
                                    <th class="align-middle text-center" width="10%">File Name</th>
                                    <th class="align-middle text-center">Accounts Included</th>
                                    <th class="align-middle text-center">
                                        PDFs Theme
                                    </th>
                                    <th class="align-middle text-center">
                                        Paper Size    
                                    </th>
                                    <th class="align-middle text-center">
                                        Page Orientation    
                                    </th>
                                    <th class="align-middle text-center" width="5%">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tbd-weekly-reports">
                                @if(count($pdfReportsList) > 0)
                                    @foreach ($pdfReportsList as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="text-center">
                                                {{ $item->date_range }}
                                            </td>
                                            <td class="text-center">
                                                {{ $item->file_name }}
                                            </td>
                                            <td class="text-center">
                                                {{ $item->accounts_name }}
                                            </td>
                                            <td class="text-center total_sales_td">
                                                {{ $item->report_theme }}
                                            </td>
                                            <td class="text-center total_sales_units_td">
                                                {{ $item->paper_size }}
                                            </td>
                                            <td class="text-center">
                                                {{ $item->orientation }}
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.reports.pdf.download', $item->id) }}" data-reportPdfId="{{ $item->report_id }}" 
                                                    id="btn-download-{{$item->report_id}}" type="button" class="btn btn-info btn-download">
                                                    <i class="fa fa-download"></i>
                                                </a>

                                                <a href="" type="button" class="btn btn-danger" data-target="#mdl-delete-report-form-{{ $item->id }}" 
                                                        data-toggle="modal">
                                                    <i class="fa fa-trash"></i>
                                                </a>

                                                <div class="modal fade" id="mdl-delete-report-form-{{ $item->id }}" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="title" id="edit-weekly-sales-rowLabel">Confirmation</h4>
                                                            </div>
                                                            <form action="{{ route('admin.reports.pdf.destroy', $item->id) }}" method="post">
                                                                @csrf
                                                                <div class="modal-body text-dark text-left">
                                                                    <p style="font-size: 20px;">
                                                                        Do you want to <b>Delete</b> the generated PDF report?
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer text-center">
                                                                    <button type="submit" class="btn btn-primary btn-lg">Yes, Delete All!</button>
                                                                    <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">CLOSE</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="14" class="text-center">No Data Found</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
