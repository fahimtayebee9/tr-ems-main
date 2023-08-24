

<?php $__env->startSection("content"); ?>

<div class="row">
    <div class="col-md-12 col-xl-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="left-col">
                        <h5 class="page-title">Manage All Notes</h5>
                    </div>
                    <div class="right-col w-50 d-flex justify-content-end align-items-center">
                        <div class="leave-filter mr-3 w-50">
                            <select class="form-control custom-select select2-hidden-accessible w-100" name="leave_type" id="leave-type-filter">
                                <option>Select Account</option>
                                <?php $__currentLoopData = Auth::user()->employee->getAccountManagers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($account->caccount->id); ?>"><?php echo e($account->caccount->account_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <a href="<?php echo e(route('employee.meeting-notes.create')); ?>" class="btn btn-info btn-sm">
                            <i class="fas fa-plus" style="font-size: 10px;"></i>
                            Add New Note
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
                                <th width="10%">Client Account</th>
                                <th width="10%">Date</th>
                                <th width="35%">Note</th>
                                <th width="10%">URL</th>
                                <th width="10%">Priority</th>
                                <th width="6%">Action</th>
                            </tr>
                        </thead>
                        <tbody id="meetingNotes-table-emp">
                            <?php $__currentLoopData = $meetingNoteList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($item->clientAccount->account_name); ?></td>
                                    <td><?php echo e(\Carbon\Carbon::parse($item->created_at)->format('d M, Y')); ?></td>
                                    <td><?php echo e($item->note); ?></td>
                                    <td>
                                        <?php if($item->url != null): ?>
                                            <a href="<?php echo e($item->url); ?>" target="_blank" class="btn btn-primary btn-sm">View URL</a>
                                        <?php else: ?>
                                        <span class="badge badge-danger">N\A</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($item->priority == 1): ?>
                                            <span class="badge badge-danger">High</span>
                                        <?php elseif($item->priority == 2): ?>
                                            <span class="badge badge-warning">Medium</span>
                                        <?php else: ?>
                                            <span class="badge badge-success">Low</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        
                                        <a href="" class="btn btn-primary btn-sm">
                                            <i class="fas fa-edit" style="font-size: 14px;"></i>
                                        </a>
                                        
                                        <a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="deleteMeetingNotes(<?php echo e($item->id); ?>)">
                                            <i class="fas fa-trash-alt" style="font-size: 14px;"></i>
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
<?php echo $__env->make("employee.layouts.shreyu", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/employee/pages/meeting-notes/index.blade.php ENDPATH**/ ?>