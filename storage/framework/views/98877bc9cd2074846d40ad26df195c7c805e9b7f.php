

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo e(route('employee.task-management.filterData')); ?>" method="GET">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-4">
                                <select class="select2 form-control custom-select select2-hidden-accessible"
                                    name="client_account_flt" id="client_account_flt">
                                    <option value="*" <?php if(isset($request) && $request->task_month == '*'): ?> selected <?php endif; ?>>Choose Accounts
                                    </option>
                                    <?php $__currentLoopData = $employee->getAccountManagers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($account->caccount->id); ?>"
                                            <?php if(isset($request) && $request->client_account_id == $account->caccount->id): ?> selected <?php endif; ?>>
                                            <?php echo e($account->caccount->account_name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="" id="datepicker-autoclose">
                                    <div class="input-group-append bg-custom b-0">
                                        <span class="input-group-text">
                                            <i class="mdi mdi-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 d-flex align-items-center justify-content-between">
                                <button type="submit" class="btn btn-primary w-100">Filter</button>
                                
                                <a href="<?php echo e(route('employee.task-management')); ?>"
                                    class="btn btn-outline-danger w-100 ml-2">Reset</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date </th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="tasksubmission-table-emp">
                                <?php
                                    $total_lunch = 0;
                                ?>
                                <?php $__currentLoopData = $taskList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e(\Carbon\Carbon::parse($item->created_at)->format('d M, Y')); ?></td>
                                        <td><?php echo e($item->task_title); ?></td>
                                        <td>
                                            
                                            <?php echo $item->task_description; ?>

                                        </td>
                                        <td>
                                            <?php if($item->screenshot_url != null): ?>
                                                
                                                <a href="<?php echo e($item->screenshot_url); ?>" target="_blank"
                                                    class="btn btn-primary btn-sm">View Image</a>
                                            <?php else: ?>
                                                <span class="badge badge-danger">No Image</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>

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

<?php echo $__env->make('employee.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/employee/pages/task-index.blade.php ENDPATH**/ ?>