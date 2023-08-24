

<?php $__env->startSection('body'); ?>
    <div class="page-header">
        <div class="row">
            <?php echo $__env->make('admin.includes.breadcrumb-v2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-end">
                <a class="btn btn-primary" href="<?php echo e(route('admin.tasks.forms.create')); ?>"><i class="fa fa-plus"></i> Add New
                    Form</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card-group m-b-30">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <span class="d-block">TOTAL EMPLOYEES</span>
                            </div>
                        </div>
                        <h3 class="mb-3"><?php echo e(count($employeesList)); ?></h3>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <?php
                            $todays_task = \App\Models\DailyTask::whereDate('created_at', \Carbon\Carbon::today())->count();
                            $yestar_day_task = \App\Models\DailyTask::whereDate('created_at', \Carbon\Carbon::yesterday())->count();
                            $task_diff = ( $yestar_day_task == 0 ) ? 0 : (($todays_task - $yestar_day_task)/$yestar_day_task) * 100 ;
                            // check if $task_diff is negative
                            $class = ($task_diff < 0) ? 'text-danger' : 'text-success';
                        ?>
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <span class="d-block">TASKS SUBMITTED TODAY</span>
                            </div>
                            <div>
                                <span class="<?php echo e($class); ?>"><?php echo e($task_diff); ?>%</span>
                            </div>
                        </div>
                        <h3 class="mb-3">
                            <?php echo e($todays_task); ?>

                        </h3>
                        <div class="progress mb-2" style="height: 5px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="mb-0">Yesterday <span class="text-muted"><?php echo e($yestar_day_task); ?></span></p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <span class="d-block">Expenses</span>
                            </div>
                            <div>
                                <span class="text-danger">-2.8%</span>
                            </div>
                        </div>
                        <h3 class="mb-3">$8,500</h3>
                        <div class="progress mb-2" style="height: 5px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="mb-0">Previous Month <span class="text-muted">$7,500</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="table-header-actions row justify-content-between">
                        <div class="col-md-4">
                            <h4><?php echo e(session()->get('page_title_description')); ?></h4>
                        </div>
                        <div class="col-md-6">
                            <!-- filter by date, designation, status -->
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <select class="w-100 form-control custom-select select2-hidden-accessible"
                                        name="filter_by_designation" id="filter_by_designation">
                                        <option></option>
                                        <?php $__currentLoopData = $designations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $designation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            
                                            <?php if($designation->id == 1 || $designation->id == 2 || $designation->id == 3): ?>
                                                <?php continue; ?>
                                            <?php else: ?>
                                                <option value="<?php echo e($designation->id); ?>"><?php echo e($designation->name); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <input type="date" class="form-control" name="filter_by_date" id="filter_by_date">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover m-b-0" id="tbl-tasks-submissions">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Employee</th>
                                    <th>Date</th>
                                    <th>Tasks Completed</th>
                                    <th>Account</th>
                                    <th width="160" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tby-tasks-submissions">
                                <?php
                                    $count = 1;
                                ?>

                                <?php $__currentLoopData = $taskSubmissions_dates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sdate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="bg-light">
                                        <td colspan="6">
                                            <p class="mb-0 font-weight-bold  text-center">
                                                <?php echo e(\Carbon\Carbon::parse($sdate->submission_date)->format('d M, Y')); ?>

                                            </p>
                                            <p class="m-0 text-center">
                                                Total Submissions:
                                                <?php echo e(\App\Models\DailyTask::whereDate('submission_date', $sdate->submission_date)->distinct('emp_id')->count()); ?>

                                            </p>
                                        </td>
                                    </tr>
                                    <?php $__currentLoopData = $employeesList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $taskSubmissionsByDate = \App\Models\DailyTask::whereDate('submission_date', $sdate->submission_date)
                                                ->where('emp_id', $emp_item->id)
                                                ->get();
                                            $total_tasks_completed = 0;
                                            $total_percentage = 0;
                                            foreach ($taskSubmissionsByDate as $tsItem) {
                                                $total_tasks_completed++;
                                                $total_percentage += $tsItem->task_completion_percentage;
                                            }
                                        ?>
                                        <?php if($total_tasks_completed > 0): ?>
                                            <tr class="">
                                                <td><?php echo e($count++); ?></td>
                                                <td class="d-flex justify-content-start align-items-center">
                                                    <span>
                                                        <h6 class="mb-0">
                                                            <?php echo e($emp_item->user->first_name . ' ' . $emp_item->user->last_name); ?>

                                                        </h6>
                                                        <small>
                                                            Employee ID: <?php echo e($emp_item->employee_id); ?> <br>
                                                            Designation: <?php echo e($emp_item->designation->name); ?>

                                                        </small>
                                                    </span>
                                                </td>
                                                <td>
                                                    <?php echo e(\Carbon\Carbon::parse($sdate->submission_date)->format('d M, Y')); ?>

                                                </td>
                                                <td>
                                                    <p class="m-0">
                                                        <?php echo e($total_tasks_completed); ?> Tasks Completed
                                                    </p>
                                                </td>
                                                <td>
                                                    <?php
                                                        $total_percentage = $total_percentage / $total_tasks_completed;
                                                    ?>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            style="width: <?php echo e($total_percentage); ?>%" aria-valuenow="25"
                                                            aria-valuemin="0" aria-valuemax="100">
                                                            <?php echo e($total_percentage); ?>%
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <a href="<?php echo e(route('admin.tasks.submissions.show', [$sdate->submission_date, $emp_item->employee_id])); ?>"
                                                        class="btn btn-sm btn-primary">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        data-toggle="modal" data-target="#md-delete-holidays">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/admin/tasks/index.blade.php ENDPATH**/ ?>