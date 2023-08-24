

<?php $__env->startSection("content"); ?>
<!-- mdl-leave-create -->

<div class="row">
    <div class="col-md-12 col-xl-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="left-col">
                        <h5 class="page-title">Leave Application</h5>
                    </div>
                    <div class="right-col w-50 d-flex justify-content-end align-items-center">
                        <div class="leave-filter mr-3 w-50">
                            <select class="form-control custom-select select2-hidden-accessible w-100" name="leave_type" id="leave-type-filter">
                                <option>Select Type</option>
                                <option value="1">Full Day Paid Leave</option>
                                <option value="2">Half Day Non-Paid Leave</option>
                                <option value="3">Full Day Non-Paid Leave</option>
                            </select>
                        </div>
                        <a href="<?php echo e(route('employee.leave-management.create')); ?>" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus" style="font-size: 10px;"></i>
                            Apply Leave
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th width="10%">Application ID</th>
                                <th width="15%">Date </th>
                                <th>Subject</th>
                                <th width="10%">Status</th>
                                <th width="10%">Leave Type</th>
                                <th width="5%">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbl-leave-applications">
                            <?php $__currentLoopData = $leaveApplicationList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($leave->leave_id); ?></td>
                                <td>
                                    <?php if($leave->leave_to == null): ?>
                                    <b><?php echo e(Carbon\Carbon::parse($leave->leave_from)->format('d M, Y')); ?></b>
                                    <?php else: ?>
                                    <b><?php echo e(Carbon\Carbon::parse($leave->leave_from)->format('d M, Y')); ?></b> 
                                    to 
                                    <b><?php echo e(Carbon\Carbon::parse($leave->leave_to)->format('d M, Y')); ?></b>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($leave->subject); ?></td>
                                <td>
                                    <?php if($leave->status_by_astmanager == 1 && $leave->status_by_hr == 1 ): ?>
                                    <span class="badge badge-pill badge-success">Approved</span>
                                    <?php elseif($leave->status == 2): ?>
                                    <span class="badge badge-pill badge-danger">Rejected</span>
                                    <?php else: ?>
                                    <span class="badge badge-pill badge-warning">Pending</span>
                                    <?php endif; ?>
                                </td>
                                
                                <td>
                                    <?php if($leave->leave_type == 1): ?>
                                    <span class="badge badge-pill badge-success">Full Day Paid Leave</span>
                                    <?php elseif($leave->leave_type == 2): ?>
                                    <span class="badge badge-pill badge-danger">Half Day Non-Paid Leave</span>
                                    <?php else: ?>
                                    <span class="badge badge-pill badge-warning">Full Day Non-Paid Leave</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    
                                    <a href="<?php echo e(route('employee.leave.downloadPdf', $leave->leave_id)); ?>" class="btn btn-info btn-sm" data-title="Download PDF" data-toggle="tooltip">
                                        <i class="fas fa-download"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div><!-- end row-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make("employee.layouts.shreyu", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/employee/pages/leaves-index.blade.php ENDPATH**/ ?>