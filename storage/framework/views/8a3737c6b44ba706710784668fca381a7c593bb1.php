<div class="modal fade" id="attendance_info_<?php echo e($item->employee_id); ?>" tabindex="-1" role="dialog" aria-labelledby="attendanceInfo" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-left">
                <?php if(isset($item->employee_id)): ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card top_counter">
                                <div class="body">
                                    <div class="icon text-success"><i class="fa fa-sign-in"></i> </div>
                                    <div class="content">
                                        <div class="text">PUNCH IN</div>
                                        <h5 class="number"><?php echo e(\Carbon\Carbon::parse($attendance->in_time)->format('h:i a')); ?></h5>
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
                                        <h5 class="number"><?php echo e(\Carbon\Carbon::parse($attendance->out_time)->format('h:i a')); ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                <div class="alert alert-danger text-center">
                    <strong>Sorry!</strong> No data found.
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/admin/includes/modals/mdl_daily_attendance.blade.php ENDPATH**/ ?>