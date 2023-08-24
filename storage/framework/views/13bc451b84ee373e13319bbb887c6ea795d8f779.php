

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo e(route('employee.applications.store')); ?>" method="post" id="emp-application-form">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <input type="hidden" name="employee_id" value="<?php echo e($employee->id); ?>">
                            <div class="row mb-3">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="name">Subject</label>
                                        <input type="text" name="subject" id="name"
                                            class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('name')); ?>"
                                            required>
                                        <?php $__errorArgs = ['subject'];
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="apply_to">Apply To</label>
                                        <select name="apply_to" data-plugin="customselect" id="" class="form-control">
                                            <option value="0">None</option>
                                            <option value="1">HR Manager</option>
                                            <option value="2">CEO</option>
                                        </select>
                                        
                                        <?php $__errorArgs = ['apply_to'];
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
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="application_type">
                                            Application Type
                                        </label>
                                        <select class="form-control custom-select" data-plugin="customselect" name="application_type" id="application-type-mdl">
                                            <option>Select Type</option>
                                            <option value="1">Leave</option>
                                            <option value="2">Salary Review</option>
                                            <option value="3">General</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 leave-type-open">
                                    <div class="form-group">
                                        <label for="leave_from">Start Date</label>
                                        <input type="text" class="form-control" name="leave_from"
                                            placeholder="mm/dd/yyyy" id="leave-start-date">
                                        <?php $__errorArgs = ['leave_from'];
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
                                <div class="col-md-3 leave-type-open">
                                    <div class="form-group">
                                        <label for="leave_to">End Date</label>
                                        <input type="text" class="form-control" name="leave_to" placeholder="mm/dd/yyyy"
                                            id="leave-end-date">
                                        <?php $__errorArgs = ['leave_to'];
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
                                <div class="col-md-3 leave-type-open">
                                    <div class="form-group">
                                        <label for="leave_type">
                                            Leave Type
                                        </label>
                                        <select class="form-control custom-select" data-plugin="customselect"
                                            name="leave_type" id="leave-type-mdl">
                                            <option>Select Type</option>
                                            <option value="1" 
                                                <?php if(\Carbon\Carbon::parse($employee->joining_date)->diffInMonths(\Carbon\Carbon::now()) >= 6 && 
                                                    $totalPaidLeavesTaken < App\Models\CompanyPolicy::where('policy_id', "POLICY-YPL")->first()->value ): ?>
                                                    disabled
                                                <?php endif; ?>>Full Day Paid</option>
                                            <option value="2">Half Day Unpaid</option>
                                            <option value="3">Full Day Unpaid</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="d-none" name="description" id="application-desc-editor"></textarea>
                                <?php $__errorArgs = ['description'];
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
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('employee.layouts.shreyu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/employee/pages/applications/create.blade.php ENDPATH**/ ?>