

<?php $__env->startSection("body"); ?>

<div class="page-header">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <?php echo $__env->make('admin.includes.breadcrumb-v2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-end">
            <button data-toggle="modal" type="button" class="btn btn-primary" data-target="#md-create-admin-role"><i class="fa fa-plus"></i> Add New</button>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="table-header-actions row">
                    <div class="col-md-6">
                        <h2>Administrative Roles List</h2>
                    </div>
                    <div class="col-md-6 justify-content-end d-flex">

                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <?php if(!empty($roles_list)): ?>
                    <table class="table table-hover m-b-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Shown As</th>
                                <th width="160">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $roles_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($role->id != 1): ?>
                                <tr>
                                    <td><?php echo e($loop->iteration - 1); ?></td>
                                    <td><?php echo e($role->name); ?></td>
                                    <td><?php echo e($role->description); ?></td>
                                    <td>
                                        <!-- badge for super admin -->
                                        <?php if($role->name == "Super Admin"): ?>
                                        <span class="badge badge-success font-weight-bold">Super Admin</span>
                                        <?php elseif($role->name == "Admin"): ?>
                                        <span class="badge badge-primary font-weight-bold">Admin</span>
                                        <?php elseif($role->name == "Launch Manager"): ?>
                                        <span class="badge badge-warning font-weight-bold">Launch Manager</span>
                                        <?php endif; ?>

                                    </td>
                                    <td>
                                        <button type="button" data-toggle="modal" type="button" data-target="#md-edit-role-<?php echo e(Illuminate\Support\Str::slug($role->name)); ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm js-sweetalert" data-element-id="md-delete-role-<?php echo e(Illuminate\Support\Str::slug($role->name)); ?>" data-type="confirm" id="md-delete-role-<?php echo e(Illuminate\Support\Str::slug($role->name)); ?>"><i class="fa fa-trash"></i></button>
                                        <input type="hidden" class="md-delete-role-<?php echo e(Illuminate\Support\Str::slug($role->name)); ?>" name="dlt_department_id" value="<?php echo e($role->id); ?>">

                                        <?php echo $__env->make("admin.includes.modals.md-edit-admin-role", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    </td>
                                </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php else: ?>
                    <div class="alert alert-info">No Administrative Roles Found</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $__env->make("admin.includes.modals.md-create-admin-role", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/admin/settings/role.blade.php ENDPATH**/ ?>