

<?php $__env->startSection("body"); ?>

<div class="page-header">
    <div class="row">
        <div class="col-md-6">
            <?php echo $__env->make('admin.includes.breadcrumb-v2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-end">
            <div class="btn-group ml-2">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-plus mr-2"></i> ADD
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="" data-toggle="modal" data-target="#mdl-add-single-account">Add Single Account</a>
                    <a class="dropdown-item" href="" data-toggle="modal" data-target="#mdl-add-bulk-account">Bulk Import Accounts</a>
                </div>
            </div>

            
            <div class="btn-group ml-2">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-download mr-2"></i> ACTIONS
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="">Export Accounts</a>
                    
                    <a class="dropdown-item" href="<?php echo e(URL::to('/')); ?>/storage/uploads/templates/Bulk-Client-Account-Template.xlsx" download target="_blank">Download Template</a>
                </div>
            </div>

            <?php echo $__env->make('admin.includes.modals.md-bulk-import-client-accounts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('admin.includes.modals.md-add-client-account', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table custom-table mb-0" id="tbl-leave-applications">
                        <thead class="thead-light">
                            <tr>
                                <th width="5%">#</th>
                                <th>Account Name</th>
                                <th width="10%">Marketplace</th>
                                <th width="10%">Status</th>
                                <th width="5%" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbd-client-accounts">
                            <?php $__currentLoopData = $listItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($item->account_name); ?></td>
                                    <td>
                                        <?php if($item->marketplace == 1): ?>
                                            <span class="badge badge-warning">AMAZON</span>
                                        <?php else: ?>
                                            <span class="badge badge-blue">WALMART</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($item->status == 1): ?>
                                            <span class="badge badge-success">Active</span>
                                        <?php else: ?>
                                            <span class="badge badge-danger">Inactive</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-warning" href="" data-toggle="modal" data-target="#mdl-edit-client-account">
                                            <i class="fa fa-pencil"></i>
                                        </a>

                                        <?php echo $__env->make('admin.includes.modals.md-edit-client-account', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                        <a class="btn btn-sm btn-danger" href="" data-toggle="modal" data-target="#mdl-delete-client-account">
                                            <i class="fa fa-trash"></i>
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
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/admin/administration/clients-index.blade.php ENDPATH**/ ?>