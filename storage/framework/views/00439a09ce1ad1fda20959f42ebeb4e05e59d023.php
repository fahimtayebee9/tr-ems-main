

<?php $__env->startSection("body"); ?>

<div class="page-header">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h2><?php echo e(session('page_title')); ?></h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fa fa-dashboard"></i>
                        Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item active">
                    Administrative Permissions
                </li>
            </ul>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-end">
            <!-- <button data-toggle="modal" type="button" class="btn btn-primary" data-target="#md-create-permission"><i class="fa fa-plus"></i> Add New</button> -->
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="<?php echo e(route('permissions.store')); ?>" method="post" id="fr-permission-create">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="role_id">Choose Employee</label>
                                <select name="role_id" id="role_id" class="form-control">
                                    <option value="">Select Employee</option>
                                    <?php $__currentLoopData = \App\Models\Employee::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($emp->id); ?>"><?php echo e($emp->user->first_name . " " . $emp->user->last_name); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['role_id'];
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
                        <div class="col-md-5">
                            
                        </div>
                    </div>

                    <?php
                        $systems = [
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
                        $types = [
                            'Read',
                            'Create',
                            'Update',
                            'Delete',
                        ];
                    ?>

                    <div class="row">
                        <div class="col-md-12">
                            
                            <table class="table">
                                <tr>
                                    <th></th>
                                    <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <th class="text-center"><?php echo e($column); ?></th>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <th class="text-center">Full Access</th>
                                </tr>
                                <?php $__currentLoopData = $systems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($row); ?> Management</td>
                                    <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td class="text-center">
                                        <label class="fancy-checkbox">
                                            <input type="checkbox" 
                                                name="<?php echo e((str_contains($row, ' ')) ? str_replace(' ', '_', strtolower($row)) : strtolower($row)); ?>_<?php echo e(strtolower($column)); ?>" 
                                                id="<?php echo e(strtolower($row)); ?>_<?php echo e(strtolower($column)); ?>" class="checkbox-toggle" 
                                                data-parsley-errors-container="#error-checkbox" data-parsley-multiple="checkbox">
                                            <span></span>
                                        </label>
                                    </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td class="text-center">
                                        <label class="fancy-checkbox">
                                            <input type="checkbox" 
                                                name="<?php echo e((str_contains($row, ' ')) ? str_replace(' ', '_', strtolower($row)) : strtolower($row)); ?>_full_access" 
                                                id="" class="checkbox-toggle" 
                                                data-parsley-errors-container="#error-checkbox" data-parsley-multiple="checkbox">
                                            <span></span>
                                        </label>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </div>
                    </div>

                    
                    <div class="footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php echo $__env->make("admin.includes.modals.md-create-permisison", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/admin/permissions/create.blade.php ENDPATH**/ ?>