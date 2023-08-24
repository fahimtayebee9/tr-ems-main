

<?php $__env->startSection("body"); ?>

<div class="page-header">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <?php echo $__env->make('admin.includes.breadcrumb-v2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-end">
            <div class="btn-group ml-2">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-download mr-2"></i> ACTIONS
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="" data-toggle="modal" type="button" class="dropdown-item" data-target="#md-create-department">Add New</a>
                    <a href="" data-toggle="modal" type="button" class="dropdown-item" data-target="#md-upload-departments">
                        Upload Flat File
                    </a>
                    <a class="dropdown-item" href="">Export Data</a>
                    
                    <a class="dropdown-item" href="<?php echo e(URL::to('/')); ?>/storage/uploads/templates/Bulk-Departments-Template.xlsx" download target="_blank">Download Template</a>
                </div>
            </div>

            <?php echo $__env->make('admin.includes.modals.md-bulk-import-departments', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="table-header-actions row">
                    <div class="col-md-6">
                        <h4>All available departments list</h4>
                    </div>
                    <div class="col-md-6 justify-content-end d-flex">
                        
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <?php if(!empty($departments)): ?>
                    <table class="table table-hover m-b-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Department Name</th>
                                <th>Description</th>
                                <th>Assigned To</th>
                                <th width="160">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            

                            <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($department->name); ?></td>
                                <td><?php echo e($department->description); ?></td>
                                <td><?php echo e($department->assigned_to); ?></td>
                                <td>
                                    <button type="button" data-toggle="modal" type="button" data-target="#md-edit-department-<?php echo e(Illuminate\Support\Str::slug($department->name)); ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm js-sweetalert" data-element-id="md-delete-department-<?php echo e(Illuminate\Support\Str::slug($department->name)); ?>" data-type="confirm" id="md-delete-department-<?php echo e(Illuminate\Support\Str::slug($department->name)); ?>"><i class="fa fa-trash"></i></button>
                                    <input type="hidden" class="md-delete-department-<?php echo e(Illuminate\Support\Str::slug($department->name)); ?>" name="dlt_department_id" value="<?php echo e($department->id); ?>">
                                    <?php echo $__env->make("admin.includes.modals.md-edit-department", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php else: ?>
                    <div class="alert alert-info">No Departments Found</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $__env->make("admin.includes.modals.md-create-department", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/admin/settings/department.blade.php ENDPATH**/ ?>