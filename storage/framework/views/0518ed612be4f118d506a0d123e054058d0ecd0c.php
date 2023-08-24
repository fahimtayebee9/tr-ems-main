

<?php $__env->startSection("body"); ?>

<div class="page-header">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <?php echo $__env->make('admin.includes.breadcrumb-v2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-end">
            <a class="btn btn-primary" href="<?php echo e(route('permissions.create')); ?>"><i class="fa fa-plus"></i> Add New</a>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <?php
                        $columns = [
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
                    ?>
                    <?php if(!empty($permissions_list)): ?>
                    <table class="table table-hover attendance_list">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th width="320px">User</th>
                                <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <th width="240px" class="text-center"><?php echo e($column); ?></th>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- foreach loop for permissions -->
                            <?php $__currentLoopData = $permissions_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($permission->role->id != 1): ?>
                                <tr>
                                    <td><?php echo e($loop->iteration -1); ?></td>
                                    <td>
                                        
                                        <a href="">
                                            <?php echo e($permission->employee->user->first_name); ?> . " " . <?php echo e($permission->employee->user->last_name); ?>

                                        </a>
                                        <span><?php echo e($permission->employee->user->username); ?></span>
                                    </td>
                                    <td>
                                        <div style="display: grid!important;">
                                            <?php if($permission->employee_read == 1): ?>
                                            <p class="badge badge-success d-inline">Read <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Read <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>

                                            <?php if($permission->employee_create == 1): ?>
                                            <p class="badge badge-success">Create <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Create <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>

                                            <?php if($permission->employee_update == 1): ?>
                                            <p class="badge badge-success">Update <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Update <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>

                                            <?php if($permission->employee_delete == 1): ?>
                                            <p class="badge badge-success">Delete <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Delete <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="display: grid!important;">
                                            <?php if($permission->attendance_read == 1): ?>
                                            <p class="badge badge-success d-inline">Read <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Read <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>

                                            <?php if($permission->attendance_create == 1): ?>
                                            <p class="badge badge-success">Create <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Create <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>

                                            <?php if($permission->attendance_update == 1): ?>
                                            <p class="badge badge-success">Update <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Update <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>

                                            <?php if($permission->attendance_delete == 1): ?>
                                            <p class="badge badge-success">Delete <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Delete <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="display: grid!important;">
                                            <?php if($permission->holiday_read == 1): ?>
                                            <p class="badge badge-success d-inline">Read <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Read <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>

                                            <?php if($permission->holiday_create == 1): ?>
                                            <p class="badge badge-success">Create <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Create <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>

                                            <?php if($permission->holiday_update == 1): ?>
                                            <p class="badge badge-success">Update <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Update <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>

                                            <?php if($permission->holiday_delete == 1): ?>
                                            <p class="badge badge-success">Delete <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Delete <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="display: grid!important;">
                                            <?php if($permission->company_policy_read == 1): ?>
                                            <p class="badge badge-success d-inline">Read <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Read <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>

                                            <?php if($permission->company_policy_create == 1): ?>
                                            <p class="badge badge-success">Create <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Create <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>

                                            <?php if($permission->company_policy_update == 1): ?>
                                            <p class="badge badge-success">Update <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Update <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>

                                            <?php if($permission->company_policy_delete == 1): ?>
                                            <p class="badge badge-success">Delete <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Delete <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="display: grid!important;">
                                            <?php if($permission->launch_read == 1): ?>
                                            <p class="badge badge-success d-inline">Read <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Read <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>

                                            <?php if($permission->launch_create == 1): ?>
                                            <p class="badge badge-success">Create <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Create <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>

                                            <?php if($permission->launch_update == 1): ?>
                                            <p class="badge badge-success">Update <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Update <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>

                                            <?php if($permission->launch_delete == 1): ?>
                                            <p class="badge badge-success">Delete <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Delete <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="display: grid!important;">
                                            <?php if($permission->leaves_read == 1): ?>
                                            <p class="badge badge-success d-inline">Read <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Read <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>

                                            <?php if($permission->leaves_create == 1): ?>
                                            <p class="badge badge-success">Create <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Create <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>

                                            <?php if($permission->leaves_update == 1): ?>
                                            <p class="badge badge-success">Update <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Update <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>

                                            <?php if($permission->leaves_delete == 1): ?>
                                            <p class="badge badge-success">Delete <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Delete <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="display: grid!important;">
                                            <?php if($permission->departments_read == 1): ?>
                                            <p class="badge badge-success d-inline">Read <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Read <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>

                                            <?php if($permission->departments_create == 1): ?>
                                            <p class="badge badge-success">Create <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Create <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>

                                            <?php if($permission->departments_update == 1): ?>
                                            <p class="badge badge-success">Update <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Update <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>

                                            <?php if($permission->departments_delete == 1): ?>
                                            <p class="badge badge-success">Delete <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Delete <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="display: grid!important;">
                                            <?php if($permission->accounts_read == 1): ?>
                                            <p class="badge badge-success d-inline">Read <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Read <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>

                                            <?php if($permission->accounts_create == 1): ?>
                                            <p class="badge badge-success">Create <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Create <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>

                                            <?php if($permission->accounts_update == 1): ?>
                                            <p class="badge badge-success">Update <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Update <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>

                                            <?php if($permission->accounts_delete == 1): ?>
                                            <p class="badge badge-success">Delete <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Delete <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="display: grid!important;">
                                            <?php if($permission->payroll_read == 1): ?>
                                            <p class="badge badge-success d-inline">Read <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Read <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>

                                            <?php if($permission->payroll_create == 1): ?>
                                            <p class="badge badge-success">Create <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Create <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>

                                            <?php if($permission->payroll_update == 1): ?>
                                            <p class="badge badge-success">Update <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Update <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>

                                            <?php if($permission->payroll_delete == 1): ?>
                                            <p class="badge badge-success">Delete <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Delete <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="display: grid!important;">
                                            <?php if($permission->report_read == 1): ?>
                                            <p class="badge badge-success d-inline">Read <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Read <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>

                                            <?php if($permission->report_create == 1): ?>
                                            <p class="badge badge-success">Create <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Create <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>

                                            <?php if($permission->report_update == 1): ?>
                                            <p class="badge badge-success">Update <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Update <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>

                                            <?php if($permission->report_delete == 1): ?>
                                            <p class="badge badge-success">Delete <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Delete <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="display: grid!important;">
                                            <?php if($permission->report_read == 1): ?>
                                            <p class="badge badge-success d-inline">Read <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Read <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>

                                            <?php if($permission->report_create == 1): ?>
                                            <p class="badge badge-success">Create <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Create <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>

                                            <?php if($permission->report_update == 1): ?>
                                            <p class="badge badge-success">Update <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Update <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>

                                            <?php if($permission->report_delete == 1): ?>
                                            <p class="badge badge-success">Delete <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Delete <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="display: grid!important;">
                                            <?php if($permission->administration_read == 1): ?>
                                            <p class="badge badge-success d-inline">Read <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Read <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>

                                            <?php if($permission->administration_create == 1): ?>
                                            <p class="badge badge-success">Create <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Create <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>

                                            <?php if($permission->administration_update == 1): ?>
                                            <p class="badge badge-success">Update <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Update <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>

                                            <?php if($permission->administration_delete == 1): ?>
                                            <p class="badge badge-success">Delete <i class="icon-check text-success"></i></p>
                                            <?php else: ?>
                                            <p class="badge badge-danger">Delete <i class="icon-close text-danger"></i></p>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="<?php echo e(route('permissions.edit', $permission)); ?>"><i class="fa fa-edit"></i></a>
                                    </td>
                                </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php else: ?>
                    <div class="alert alert-info">
                        <strong>Info!</strong> No permissions found.
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/admin/permissions/index.blade.php ENDPATH**/ ?>