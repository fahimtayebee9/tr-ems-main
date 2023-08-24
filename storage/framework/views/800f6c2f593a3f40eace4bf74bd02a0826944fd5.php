

<?php $__env->startSection('body'); ?>
    <div class="page-header">
        <div class="row">
            <div class="col-md-6">
                <?php echo $__env->make('admin.includes.breadcrumb-v2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-end">
                <a class="btn btn-primary" href="<?php echo e(route('admin.invoice-management.create')); ?>"><i
                        class="fa fa-plus mr-2"></i> Create Invoice</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card-group m-b-30">
                <div class="card bg-inverse-success">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <span class="d-block">ZonHack Invoices</span>
                            </div>
                        </div>
                        <h3 class="mb-3">
                            <?php echo e(\App\Models\Invoice::where('theme_id', 1)->get()->count()); ?>

                        </h3>
                        <p class="mb-0">
                            Previous Month 
                            <span class="text-muted">
                                0
                            </span>    
                        </p>
                    </div>
                </div>
                <div class="card bg-inverse-primary">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <span class="d-block">NuDawn Invoices</span>
                            </div>
                        </div>
                        <h3 class="mb-3">
                            <?php echo e(\App\Models\Invoice::where('theme_id', 2)->get()->count()); ?>

                        </h3>
                        <p class="mb-0">
                            Previous Month 
                            <span class="text-muted">
                                0
                            </span>
                        </p>
                    </div>
                </div>
                <div class="card bg-inverse-warning">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <span class="d-block">Other Invoices</span>
                            </div>
                        </div>
                        <h3 class="mb-3">
                            <?php echo e(\App\Models\Invoice::where('theme_id', 4)->get()->count()); ?>

                        </h3>
                        <p class="mb-0">
                            Previous Month 
                            <span class="text-muted">
                                0
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div>
                        <table class="table table-bordered table-hover js-basic-example dataTable table-custom"
                            id="tbl-invoices-list" role="grid" aria-describedby="tbl-invoices-list">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0"
                                        rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"
                                        style="width: 237.281px;" aria-sort="descending">#</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" aria-label="Position: activate to sort column ascending"
                                        style="width: 376.719px;">Client Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" aria-label="Office: activate to sort column ascending"
                                        style="width: 174.562px;">Invocie Date</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" aria-label="Age: activate to sort column ascending"
                                        style="width: 92.9688px;">Total Amount</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" aria-label="Start date: activate to sort column ascending"
                                        style="width: 170.219px;">Discount</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" aria-label="Start date: activate to sort column ascending"
                                        style="width: 170.219px;">Balance</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" aria-label="Salary: activate to sort column ascending"
                                        style="width: 150.25px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(count($invoiceList) > 0): ?>
                                    <?php $__currentLoopData = $invoiceList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1"><?php echo e($invoice->id); ?></td>
                                            <td><?php echo e($invoice->client_name); ?></td>
                                            <td><?php echo e(date('d M, Y', strtotime($invoice->invoice_date))); ?></td>
                                            <td>$<?php echo e($invoice->total_payable); ?></td>
                                            <td>$<?php echo e($invoice->discount); ?></td>
                                            <td>$<?php echo e($invoice->balance); ?></td>
                                            <td>
                                                
                                                <a href="<?php echo e(route('admin.invoice-management.show', $invoice->id)); ?>"
                                                    class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                                <a href="<?php echo e(route('admin.invoice-management.destroy', $invoice->id)); ?>"
                                                    class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                <a href="<?php echo e(route('admin.invoice-management.downloadPdf', $invoice->id)); ?>"
                                                    class="btn btn-success btn-sm"><i class="fa fa-file-pdf-o"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr role="row" class="odd">
                                        <td class="sorting_1" colspan="6">No data found</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/admin/invoices/index.blade.php ENDPATH**/ ?>