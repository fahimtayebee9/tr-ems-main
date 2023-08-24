

<?php $__env->startSection("body"); ?>

<div class="page-header">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <?php echo $__env->make('admin.includes.breadcrumb-v2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-md-6 text-right">
            <button class="btn btn-info" data-toggle="modal" data-target="#mdl-provider-add">Add New Provider</button>

            <?php echo $__env->make('admin.includes.modals.providers.mdl-provider-add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body attendance-table-box">
                <div class="t" id="attendance-tbl">
                    <?php
                        // dd($employees->count(), $users->count());
                    ?>
                    <?php if(!empty($launchProviderList)): ?>
                    <table style="width:100%!important; text-overflow: ellipsis;" class="table table-hover js-basic-example dataTable table-custom table-striped m-b-0 c_list no-footer" id="employees_tbl" role="grid" aria-describedby="employees_tbl_info">
                        <thead class="thead-light">
                            <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="employees_tbl" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" 
                                    style="width: 70px;">#</th>
                                <th class="sorting">Name</th>
                                <th class="sorting">Phone</th>
                                <th class="sorting">Address</th>
                                <th class="sorting">Unit Price</th>
                                <th class="sorting">Vehicle Rent</th>
                                <th class="sorting">Status</th>
                                <th class="" width="200px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $launchProviderList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td>
                                        <img src="assets/images/xs/avatar1.jpg" class="rounded-circle avatar" alt="">
                                        <p class="c_name">
                                            <?php echo e($item->name); ?>

                                        </p>
                                    </td>
                                    <td>
                                        <?php echo e($item->phone); ?>

                                    </td>
                                    <td>
                                        <?php echo e($item->address); ?>

                                    </td>
                                    <td>
                                        BDT. <?php echo e($item->unit_price); ?>

                                    </td>
                                    <td>
                                        BDT. <?php echo e($item->vehicle_cost); ?>

                                    </td>
                                    <td>
                                        <?php if($item->status == 1): ?>
                                            <span class="badge badge-info hidden-sm-down">ACTIVE</span>
                                        <?php else: ?>
                                            <span class="badge badge-info hidden-sm-down">Inactive</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        
                                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#mdl-provider-edit-<?php echo e($item->id); ?>">Edit</button>
                                        <?php echo $__env->make('admin.includes.modals.providers.mdl-provider-edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                        
                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#mdl-provider-delete-<?php echo e($item->id); ?>">Delete</button>
                                        
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php else: ?>
                    <div class="alert alert-info">No Proider Details Found</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/admin/launch-sheet/provider-index.blade.php ENDPATH**/ ?>