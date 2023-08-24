

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xl-8">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#add_new_task" class="btn btn-primary" >
                                        <i class="uil uil-plus me-1"></i>Add New
                                    </a>

                                    <div class="modal fade" id="add_new_task" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myCenterModalLabel">Add New Task</h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?php echo e(route('employee.task-management.store')); ?>" method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <div class="mb-3">
                                                            <label for="task-title" class="form-label">Task Title</label>
                                                            <input type="text" class="form-control" id="task-title" name="title" placeholder="Task Title">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="task-desc" class="form-label">Task Description</label>
                                                            <textarea class="form-control" id="task-desc" name="description" rows="3" placeholder="Task Description"></textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="assigned_by">Assigned By</label>
                                                            <select class="form-control" id="assigned_by" name="assigned_by" data-plugin="customselect">
                                                                <option value="">Select</option>
                                                                <?php $__currentLoopData = \App\Models\User::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($employee->id); ?>"><?php echo e($employee->first_name . " " . $employee->last_name); ?> </option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="priority">Priority</label>
                                                            <select name="priority" id="task-priority" data-plugin="customselect">
                                                                <option value="0">Low</option>
                                                                <option value="1">Medium</option>
                                                                <option value="2">High</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="client_id">Client Account</label>
                                                            <select name="client_id" id="client_id" data-plugin="customselect">
                                                                <option value="">Select</option>
                                                                
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <button class="btn btn-success" type="submit">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-9">
                                    <div class="float-sm-end mt-3 mt-sm-0">

                                        <div class="task-search d-inline-block mb-3 mb-sm-0 me-sm-1">
                                            <form>
                                                <div class="input-group">
                                                    <input type="text" class="form-control search-input"
                                                        placeholder="Search...">
                                                    <span class="uil uil-search icon-search"></span>
                                                    <button class="btn btn-soft-primary input-group-text" type="button">
                                                        <i class="uil uil-file-search-alt"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="dropdown d-inline-block">
                                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="uil uil-sort-amount-down"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Due Date</a>
                                                <a class="dropdown-item" href="#">Added Date</a>
                                                <a class="dropdown-item" href="#">Assignee</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col">
                                    <?php if($todaysTasks->count() > 0): ?>
                                        <a class="text-dark" data-bs-toggle="collapse" href="#todayTasks"
                                            aria-expanded="false" aria-controls="todayTasks">
                                            <h5 class="mb-0"><i class="uil uil-angle-down"></i>Today
                                                <span class="text-muted fs-14">(<?php echo e($todaysTasks->count()); ?>)</span>
                                            </h5>
                                        </a>

                                        <div class="collapse show" id="todayTasks">
                                            <div class="card mb-0 border-0">
                                                <div class="card-body">
                                                    <!-- task -->
                                                    <?php $__currentLoopData = $todaysTasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="row justify-content-sm-between border-bottom" id="<?php echo e($item->task_uid); ?>">
                                                            <div class="col-lg-6 mb-2 mb-lg-0">
                                                                <div class="form-check task-title-checker" data-pid="<?php echo e($item->task_uid); ?>">
                                                                    <input type="checkbox" class="form-check-input task-checkbox">
                                                                    <label class="form-check-label" for="<?php echo e($item->task_uid); ?>">
                                                                        <?php echo e($item->title); ?>

                                                                    </label>
                                                                </div> <!-- end checkbox -->
                                                            </div> <!-- end col -->
                                                            <div class="col-lg-6">
                                                                <div class="d-sm-flex justify-content-between">
                                                                    <div>
                                                                        <img src="<?php echo e(asset('storage/employee/shreyu-assets/assets/images/users/avatar-9.jpg')); ?>"
                                                                            alt="image" class="avatar-xs rounded-circle"
                                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                            title=""
                                                                            data-bs-original-title="Assigned to <?php echo e($item->assignedTo->first_name); ?>"
                                                                            aria-label="Assigned to <?php echo e($item->assignedTo->first_name); ?>">
                                                                    </div>
                                                                    <div class="mt-3 mt-sm-0">
                                                                        <ul class="list-inline text-sm-end">
                                                                            <li class="list-inline-item pe-1 
                                                                                <?php if(\Carbon\Carbon::parse($item->due_date)->format('d M, Y') < \Carbon\Carbon::today()->format('d M, Y')): ?> text-danger <?php endif; ?>">
                                                                                <i class="uil uil-schedule me-1"></i>
                                                                                <?php echo e(\Carbon\Carbon::parse($item->due_date)->format('d M, Y')); ?>

                                                                            </li>
                                                                            <li class="list-inline-item pe-1">
                                                                                <i class="uil uil-align-alt me-1"></i>
                                                                                <?php
                                                                                    // count total subtasks and completed subtasks for this task
                                                                                    $total_subtasks = $item->checkLists->count();
                                                                                    $completed_subtasks = $item->checkLists->where('status', 1)->count();
                                                                                ?>
                                                                                <?php echo e($completed_subtasks . " / " . $total_subtasks); ?>

                                                                            </li>
                                                                            <li class="list-inline-item pe-2">
                                                                                <i class="uil uil-comment-message me-1"></i>
                                                                                <?php echo e($item->comments->count()); ?>

                                                                            </li>
                                                                            <li class="list-inline-item">
                                                                                <?php if($item->priority == 0): ?>
                                                                                    <span class="badge badge-soft-success p-1">Low</span>
                                                                                <?php elseif($item->priority == 1): ?>
                                                                                    <span class="badge badge-soft-warning p-1">Medium</span>
                                                                                <?php elseif($item->priority == 2): ?>
                                                                                    <span class="badge badge-soft-danger p-1">High</span>
                                                                                <?php endif; ?>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div> <!-- end .d-flex-->
                                                            </div> <!-- end col -->
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <!-- end task -->
                                                </div> <!-- end card-body-->
                                            </div> <!-- end card -->
                                        </div> 
                                    <?php else: ?>
                                        <a class="text-dark" data-bs-toggle="collapse" href="#todayTasks"
                                            aria-expanded="false" aria-controls="todayTasks">
                                            <h5 class="mb-0"><i class="uil uil-angle-down"></i>Others
                                                <span class="text-muted fs-14">(10)</span>
                                            </h5>
                                        </a>

                                        <div class="collapse show" id="todayTasks">
                                            <div class="card mb-0 border-0">
                                                <div class="card-body">
                                                    <!-- task -->
                                                    <div class="row justify-content-sm-between border-bottom">
                                                        <div class="col-lg-6 mb-2 mb-lg-0">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="task1">
                                                                <label class="form-check-label" for="task1">
                                                                    Draft the new contract document for sales team
                                                                </label>
                                                            </div> <!-- end checkbox -->
                                                        </div> <!-- end col -->
                                                        <div class="col-lg-6">
                                                            <div class="d-sm-flex justify-content-between">
                                                                <div>
                                                                    <img src="assets/images/users/avatar-9.jpg"
                                                                        alt="image" class="avatar-xs rounded-circle"
                                                                        data-bs-toggle="tooltip"
                                                                        data-bs-placement="bottom" title=""
                                                                        data-bs-original-title="Assigned to Arya S"
                                                                        aria-label="Assigned to Arya S">
                                                                </div>
                                                                <div class="mt-3 mt-sm-0">
                                                                    <ul class="list-inline text-sm-end">
                                                                        <li class="list-inline-item pe-1">
                                                                            <i class="uil uil-schedule me-1"></i>Today 10am
                                                                        </li>
                                                                        <li class="list-inline-item pe-1">
                                                                            <i class="uil uil-align-alt me-1"></i>3/7
                                                                        </li>
                                                                        <li class="list-inline-item pe-2">
                                                                            <i class="uil uil-comment-message me-1"></i>21
                                                                        </li>
                                                                        <li class="list-inline-item">
                                                                            <span
                                                                                class="badge badge-soft-danger p-1">High</span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div> <!-- end .d-flex-->
                                                        </div> <!-- end col -->
                                                    </div>
                                                    <!-- end task -->
                                                </div> <!-- end card-body-->
                                            </div> <!-- end card -->
                                        </div> <!-- end .collapse-->
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row mb-3 mt-4">
                                <div class="col-12">
                                    <div class="text-center">
                                        <a href="javascript:void(0);" class="btn btn-white mb-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-loader icon-dual icon-xs me-2">
                                                <line x1="12" y1="2" x2="12" y2="6">
                                                </line>
                                                <line x1="12" y1="18" x2="12" y2="22">
                                                </line>
                                                <line x1="4.93" y1="4.93" x2="7.76" y2="7.76">
                                                </line>
                                                <line x1="16.24" y1="16.24" x2="19.07" y2="19.07">
                                                </line>
                                                <line x1="2" y1="12" x2="6" y2="12">
                                                </line>
                                                <line x1="18" y1="12" x2="22" y2="12">
                                                </line>
                                                <line x1="4.93" y1="19.07" x2="7.76" y2="16.24">
                                                </line>
                                                <line x1="16.24" y1="7.76" x2="19.07" y2="4.93">
                                                </line>
                                            </svg>Load more
                                        </a>
                                    </div>
                                </div> <!-- end col-->
                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- task details -->
        <div class="col-xl-4">
            <?php $__currentLoopData = $taskList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card task-viewer" data-pvid="<?php echo e($item->task_uid); ?>-viewer">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="dropdown float-end">
                                    <a href="#" class="dropdown-toggle arrow-none text-muted" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="uil uil-ellipsis-h"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            <i class="uil uil-edit me-1"></i>Edit
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item text-danger">
                                            <i class="uil uil-trash-alt me-1"></i>Delete
                                        </a>
                                    </div> <!-- end dropdown menu-->
                                </div> <!-- end dropdown-->

                                <div class="form-check float-start">
                                    <input type="checkbox" class="form-check-input mark-complete" id="<?php echo e($item->task_uid); ?>">
                                    <label class="form-check-label" for="completedCheck">
                                        Mark as completed
                                    </label>
                                </div> <!-- end form-checkbox-->
                            </div>
                        </div>

                        <hr class="my-2">

                        <div class="row">
                            <div class="col">
                                <h4 class="mt-0">
                                    <?php echo e($item->title); ?>

                                </h4>

                                <div class="row">
                                    <div class="col-6">
                                        <!-- assignee -->
                                        <p class="mt-2 mb-1 text-muted">Assigned By</p>
                                        <div class="d-flex">
                                            <?php if($item->assigned_by): ?>
                                                <?php if($item->assigned_by->image): ?>
                                                    <img src="<?php echo e(asset('storage/uploads/users/'.$item->assigned_by->image)); ?>" alt="<?php echo e($item->assigned_by->first_name); ?>"
                                                        class="rounded-circle me-2" height="24">
                                                <?php else: ?>
                                                    <img src="<?php echo e(asset('assets/images/users/avatar-1.jpg')); ?>" alt="user" class="rounded-circle">
                                                <?php endif; ?>
                                                <div class="flex-grow-1">
                                                    <h5 class="mt-1 fs-14"><?php echo e($item->assigned_by->first_name); ?></h5>
                                                </div>
                                            <?php else: ?>
                                                <div class="flex-grow-1">
                                                    <h5 class="mt-1 fs-14">Not Assigned</h5>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <!-- end assignee -->
                                    </div> <!-- end col -->

                                    <div class="col-6">
                                        <!-- start due date -->
                                        <p class="mt-2 mb-1 text-muted">Due Date</p>
                                        <div class="d-flex">
                                            <i class="uil uil-schedule text-success me-1"></i>
                                            <div class="flex-grow-1">
                                                <h5 class="mt-1 fs-14">
                                                    <?php echo e(\Carbon\Carbon::parse($item->due_date)->format('d M, Y')); ?>

                                                </h5>
                                            </div>
                                        </div>
                                        <!-- end due date -->
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <!-- task description -->
                                <div class="row mt-3">
                                    <div class="col">
                                        <textarea name="description" class="task-desc-viewer" id="task-desc-<?php echo e($item->task_uid); ?>" cols="30" rows="10"><?php echo e($item->description); ?></textarea>
                                    </div> <!-- end col -->
                                </div>
                                <!-- end task description -->

                                <?php if($item->checkLists->count() > 0): ?>
                                    <!-- start sub tasks/checklists -->
                                    <h5 class="mt-4 mb-2 fs-15">Checklists/Sub-tasks</h5>
                                    <?php $__currentLoopData = $item->checkLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $checklist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-check mt-1">
                                        <input type="checkbox" class="form-check-input" id="checklist1">
                                        <label class="form-check-label strikethrough" for="checklist1">
                                            Find out the old contract documents
                                        </label>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                                <!-- end sub tasks/checklists -->

                                <!-- start attachments -->
                                
                                <!-- end attachments -->

                                <?php if($item->comments->count() > 0): ?>
                                <!-- comments -->
                                <div class="row mt-3">
                                    <div class="col">
                                        <h5 class="mb-2 fs-16">Comments</h5>

                                        <?php $__currentLoopData = $item->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="d-flex mt-3 p-1">
                                                <?php if($comment->user->image): ?>
                                                    <img src="<?php echo e(asset('storage/uploads/users/'.$comment->user->image)); ?>" alt="<?php echo e($comment->user->first_name); ?>"
                                                        class="rounded-circle me-2" height="24">
                                                <?php else: ?>
                                                    <img src="<?php echo e(asset('assets/images/users/avatar-1.jpg')); ?>" alt="user" class="rounded-circle">
                                                <?php endif; ?>
                                                <div class="flex-grow-1">
                                                    <h5 class="mt-0 mb-0 fs-14">
                                                        <span class="float-end text-muted fs-12">
                                                            <?php
                                                                $commented_at = (\Carbon\Carbon::now()->diffInHours(\Carbon\Carbon::parse($comment->commented_at)) < 24) ?
                                                                    \Carbon\Carbon::parse($comment->commented_at)->diffForHumans(\Carbon\Carbon::now(), Carbon\CarbonInterface::DIFF_RELATIVE_AUTO, true) :
                                                                    \Carbon\Carbon::parse($comment->commented_at)->format('d M, Y [h:i A]');
                                                            ?>
                                                            <?php echo e($commented_at); ?>

                                                        </span>
                                                        <?php echo e($comment->user->first_name); ?>

                                                    </h5>
                                                    <p class="mt-1 mb-0 text-muted">
                                                        <?php echo e($comment->comment); ?>

                                                    </p>
                                                </div>
                                            </div> <!-- end comment -->
                                            <hr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                                <?php endif; ?>

                                <div class="row mt-1">
                                    <div class="col">
                                        <div class="border rounded">
                                            <form action="<?php echo e(route('employee.task-comment.store')); ?>" method="POST" class="comment-area-box">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="task_id" value="<?php echo e($item->id); ?>">

                                                <textarea rows="3" name="comment" class="form-control border-0 resize-none" placeholder="Your comment..."></textarea>
                                                <div class="p-2 bg-light">
                                                    <div class="float-end">
                                                        <button type="submit" class="btn btn-sm btn-success">
                                                            <i class="uil uil-message me-1"></i>Submit
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> <!-- end .border-->
                                    </div> <!-- end col-->
                                </div> <!-- end row-->
                                <!-- end comments -->
                                
                            </div> <!-- end col -->
                        </div> <!-- end row-->
                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div> <!-- end col -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('employee.layouts.shreyu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/employee/pages/task-board/index.blade.php ENDPATH**/ ?>