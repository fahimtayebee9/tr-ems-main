<div class="modal fade" id="attendance_info_{{ $item->employee_id }}" tabindex="-1" role="dialog" aria-labelledby="attendanceInfo" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-left">
                @if(isset($item->employee_id))
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card top_counter">
                                <div class="body">
                                    <div class="icon text-success"><i class="fa fa-sign-in"></i> </div>
                                    <div class="content">
                                        <div class="text">PUNCH IN</div>
                                        <h5 class="number">{{ \Carbon\Carbon::parse($attendance->in_time)->format('h:i a') }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card top_counter">
                                <div class="body">
                                    <div class="icon text-danger"><i class="fa fa-sign-out"></i> </div>
                                    <div class="content">
                                        <div class="text">PUNCH OUT</div>
                                        <h5 class="number">{{ \Carbon\Carbon::parse($attendance->out_time)->format('h:i a') }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                <div class="alert alert-danger text-center">
                    <strong>Sorry!</strong> No data found.
                </div>
                @endif
            </div>
        </div>
    </div>
</div>