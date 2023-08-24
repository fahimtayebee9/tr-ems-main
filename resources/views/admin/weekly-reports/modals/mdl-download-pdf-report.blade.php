<div class="modal fade" id="download-pdf-report-modal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="edit-weekly-sales-rowLabel">Confirmation</h4>
            </div>
            <form action="{{route('admin.reports.custom-weekly-report.view.combined.pdf')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body text-dark text-left">
                    {{-- ask user if he wants to download the generated pdf report --}}
                    <p>Do you want to download the generated PDF report?</p>
                    <input type="hidden" name="pdf_report_id" value="{{ session()->get('pdf_report_id') }}">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">DOWNLOAD</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                </div>
            </form>
        </div>
    </div>
</div>