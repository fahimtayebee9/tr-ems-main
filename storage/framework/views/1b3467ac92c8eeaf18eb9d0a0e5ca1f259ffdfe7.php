<div class="modal fade" id="mdl-daily-task-create" tabindex="-1" role="dialog" aria-labelledby="mdl-daily-task-create" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered text-left" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="departmentModalLabel">Submit Daily Tasks that You have Completed</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo e(route('employee.task-management.store')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <input type="hidden" name="emp_id" value="<?php echo e($employee->id); ?>">
                    <div class="row p-3" id="task-row" style="border: 1px dashed #d4a1fd; margin: 3px;">
                        <div class="col-md-4 pl-0">
                            <div class="form-group">
                                <label for="name">Task Title</label>
                                <input type="text" name="task_title[]" id="name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('name')); ?>" required>
                                <?php $__errorArgs = ['task_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <label for="task_status">Status</label>
                                <select name="task_status[]" id="task_status" class="form-control <?php $__errorArgs = ['task_status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <option value="1">Pending</option>
                                    <option value="2">In Progress</option>
                                    <option value="3">Completed</option>
                                </select>
                            </div>
                            
                        </div>
                        <div class="col-md-8 pr-0">
                            <div class="form-group">
                                <label for="task_description">Description</label>
                                <textarea class="summernote task-description" style="display: none;" name="task_description[]"></textarea>
                                <?php $__errorArgs = ['task_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="task_drive_link">Screenshot Url (Use Google Drive Folder Link)</label>
                                <input type="text" class="form-control" name="task_drive_link">
                                <?php $__errorArgs = ['task_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" id="add-task-row">Add Another Row</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/employee/pages/modals/mdl-daily-task-create.blade.php ENDPATH**/ ?>