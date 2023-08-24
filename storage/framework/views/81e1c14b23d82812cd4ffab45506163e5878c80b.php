

<?php $__env->startSection("content"); ?>
<!-- mdl-leave-create -->

<div class="row">
    <div class="col-md-12 col-xl-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-8 d-flex justify-content-end align-items-center">
                        <div class="btn-group">
                            <a href="<?php echo e(route('employee.applications')); ?>" class="<?php echo e((Route::getCurrentRoute()->getActionName() == "employee.applications") ? 'active' : ''); ?>btn btn-info">All</a>
                            <a href="<?php echo e(route('employee.applications.leave-applicaitons')); ?>" class="<?php echo e((Route::getCurrentRoute()->getActionName() == "employee.applications.leave-applicaitons") ? 'active' : ''); ?>btn btn-info">Leave Applications</a>
                            <a href="<?php echo e(route('employee.applications.others-applicaitons')); ?>" class="<?php echo e((Route::getCurrentRoute()->getActionName() == "employee.applications.others-applicaitons") ? 'active' : ''); ?>btn btn-info">Others</a>
                        </div>
                        <div class="leave-filter w-50" style="margin-left: 15px; margin-right: 15px;">
                            <select class="form-control custom-select select2-hidden-accessible w-100" name="leave_type" id="leave-type-filter">
                                <option>Select Type</option>
                                <option value="1">Full Day Paid Leave</option>
                                <option value="2">Half Day Non-Paid Leave</option>
                                <option value="3">Full Day Non-Paid Leave</option>
                            </select>
                        </div>
                        <a href="<?php echo e(route('employee.applications.create')); ?>" class="btn btn-info width-md">
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
                                <th width="15%">Apply Date</th>
                                <th>Subject</th>
                                <th width="10%">Status</th>
                                <th width="10%">Type</th>
                                <th width="5%">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbl-leave-applications">
                            <?php $__currentLoopData = $applicationList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($leave->application_id); ?></td>
                                <td>
                                    <?php echo e(date('d M, Y', strtotime($leave->created_at))); ?>

                                </td>
                                <td><?php echo e($leave->subject); ?></td>
                                <td>
                                    <?php if($leave->status_by_astmanager == 1 && $leave->status_by_hr == 1): ?>
                                        <span class="badge badge-soft-warning">Pending</span>
                                    <?php elseif($leave->status_by_astmanager == 2 && $leave->status_by_hr == 1): ?>
                                        <span class="badge badge-pill badge-success">Approved by AST Manager</span>
                                    <?php elseif($leave->status_by_astmanager == 3 && $leave->status_by_hr == 1): ?>
                                        <span class="badge badge-pill badge-danger">Rejected by AST Manager</span>
                                    <?php elseif($leave->status_by_astmanager == 2 && $leave->status_by_hr == 2): ?>
                                        <span class="badge badge-pill badge-success">Approved</span>
                                    <?php elseif($leave->status_by_astmanager == 3 && $leave->status_by_hr == 3): ?>
                                        <span class="badge badge-pill badge-danger">Rejected</span>
                                    <?php else: ?>
                                        <span class="badge badge-soft-warning">Pending</span>
                                    <?php endif; ?>
                                </td>
                                
                                <td>
                                    <?php if($leave->application_type == 1): ?>
                                        <span class="badge badge-soft-warning">Leave</span>
                                    <?php elseif($leave->application_type == 2): ?>
                                        <span class="badge badge-pill badge-success">Salary Review</span>
                                    <?php elseif($leave->application_type == 3): ?>
                                        <span class="badge badge-pill badge-danger">General</span>
                                    <?php else: ?>
                                        <span class="badge badge-soft-warning">Others</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    
                                    <a href="<?php echo e(route('employee.applications.downloadPdf', $leave->application_id)); ?>" class="btn btn-warning btn-sm" 
                                        data-title="Download PDF" data-toggle="tooltip">
                                        <i data-feather="download"></i>
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
<?php echo $__env->make("employee.layouts.shreyu", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/employee/pages/applications/index.blade.php ENDPATH**/ ?>