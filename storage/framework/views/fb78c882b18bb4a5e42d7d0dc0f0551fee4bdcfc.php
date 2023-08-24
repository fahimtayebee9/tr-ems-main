

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
                    <a href="<?php echo e(route('administration.users.create')); ?>" class="dropdown-item">Add New</a>
                    <a href="" data-toggle="modal" type="button" class="dropdown-item" data-target="#md-upload-users-bulk">
                        Upload Flat File
                    </a>
                    <a class="dropdown-item" href="">Export Data</a>
                    
                    <a class="dropdown-item" href="<?php echo e(URL::to('/')); ?>/storage/uploads/templates/Bulk-Users-Template.xlsx" download target="_blank">Download Template</a>
                </div>
            </div>

            <?php echo $__env->make('admin.includes.modals.md-bulk-import-users', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="table-header-actions row">
                    <div class="col-md-6">
                        <h2>Administrative Users List</h2>
                    </div>
                    <div class="col-md-6 justify-content-end d-flex">

                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="">
                    <?php if(!empty($users)): ?>
                    <table style="width:100%!important; text-overflow: ellipsis;" class="table table-hover js-basic-example dataTable table-custom table-striped m-b-0 c_list no-footer" id="administrative_users_tbl" role="grid" aria-describedby="administrative_users_tbl_info">
                        <thead class="thead-dark">
                            <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="administrative_users_tbl" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 245.812px;">Name</th>
                                <th class="sorting" tabindex="0" aria-controls="administrative_users_tbl" rowspan="1" colspan="1" aria-label="Employee ID: activate to sort column ascending" style="width: 168.344px;">Employee ID</th>
                                <th class="sorting" tabindex="0" aria-controls="administrative_users_tbl" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 181.422px;">Phone</th>
                                <th class="sorting" tabindex="0" aria-controls="administrative_users_tbl" rowspan="1" colspan="1" aria-label="Join Date: activate to sort column ascending" style="width: 143.297px;">Blood Group</th>
                                <th class="sorting" tabindex="0" aria-controls="administrative_users_tbl" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 199.969px;">Role</th>
                                <th class="sorting" tabindex="0" aria-controls="administrative_users_tbl" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 108.172px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($loop->iteration % 2 == 0): ?>
                                    <tr role="row" class="even">
                                        <td class="d-flex justify-content-start align-items-center">
                                            <span class="mr-3">
                                                <?php if(!empty($user->image)): ?>
                                                    <img src="<?php echo e(asset('storage/uploads/users/' . $user->image)); ?>" class="rounded-circle avatar" alt="">
                                                <?php else: ?>
                                                    <img src="<?php echo e(asset('storage/uploads/users/default.webp')); ?>" class="rounded-circle avatar" alt="">
                                                <?php endif; ?>
                                            </span>
                                            <span>
                                                <h6 class="mb-0"><?php echo e($user->first_name . ' '. $user->last_name); ?></h6>
                                                <span><?php echo e($user->email); ?></span>
                                            </span>
                                        </td>
                                        <td><span><?php echo e($user->username); ?></span></td>
                                        <td><span><?php echo e($user->phone); ?></span></td>
                                        <td>
                                            <?php echo e($user->blood_group); ?>

                                        </td>
                                        <td>
                                            <?php echo e($user->role->name); ?>

                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-sm btn-outline-danger js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <tr role="row" class="odd">
                                        <td class="d-flex justify-content-start align-items-center">
                                            <span class="mr-3">
                                                <img src="<?php echo e(asset('storage/uploads/users/' . $user->image)); ?>" class="rounded-circle avatar" alt="">
                                            </span>
                                            <span>
                                                <h6 class="mb-0"><?php echo e($user->first_name . ' '. $user->last_name); ?></h6>
                                                <span><?php echo e($user->email); ?></span>
                                            </span>
                                        </td>
                                        <td><span><?php echo e($user->username); ?></span></td>
                                        <td><span><?php echo e($user->phone); ?></span></td>
                                        <td>
                                            <?php echo e($user->blood_group); ?>

                                        </td>
                                        <td>
                                            <?php echo e($user->role->name); ?>

                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-sm btn-outline-danger js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/admin/administration/index.blade.php ENDPATH**/ ?>