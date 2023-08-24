

<?php $__env->startSection("body"); ?>

<div class="page-header">
    <div class="row">
        <div class="col-md-12">
            <?php echo $__env->make('admin.includes.breadcrumb-v2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <form action="<?php echo e(route('admin.launch-sheet.createInvoice')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="row justify-content-between">
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group m-0">
                                        <label for="invoice_start_date">Select Month [Optional]</label>
                                        <select name="invoice_month" id="invoice_month" class="form-control">
                                            <option value="">Select Month</option>
                                            <option value="1">January</option>
                                            <option value="2">February</option>
                                            <option value="3">March</option>
                                            <option value="4">April</option>
                                            <option value="5">May</option>
                                            <option value="6">June</option>
                                            <option value="7">July</option>
                                            <option value="8">August</option>
                                            <option value="9">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group m-0">
                                        <label for="invoice_start_date">Select Start Date</label>
                                        <input type="date" class="form-control" name="invoice_start_date" id="invoice_start_date">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group m-0">
                                        <label for="invoice_end_date">Select End Date</label>
                                        <input type="date" class="form-control" name="invoice_end_date" id="invoice_end_date">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group m-0">
                                <label for="invoice_end_date">Generate Invoice</label>
                                <button type="submit" class="btn btn-success w-100">Generate</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body attendance-table-box">
                <div class="table-responsive" id="attendance-tbl">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>Invoice No</th>
                                <th>Invoice Date</th>
                                <th>Total Launch</th>
                                <th>Invoice Amount</th>
                                <th>Invoice Status</th>
                                <th>Invoice Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($invoice->invoice_number); ?></td>
                                    <td>
                                        <b><?php echo e(\Carbon\Carbon::parse($invoice->start_date)->format('d-m-Y')); ?></b> TO
                                        <b><?php echo e(\Carbon\Carbon::parse($invoice->end_date)->format('d-m-Y')); ?></b>
                                    </td>
                                    <td><?php echo e($invoice->total_launch); ?></td>
                                    <td>BDT. <?php echo e($invoice->total_cost); ?></td>
                                    <td>
                                        <?php if($invoice->status == 0): ?>
                                            <span class="badge badge-danger">Pending</span>
                                        <?php elseif($invoice->status == 1): ?>
                                            <span class="badge badge-success">Paid</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('admin.launch-sheet.showInvoice', $invoice->invoice_number)); ?>" class="btn btn-primary btn-sm">View</a>
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
<?php echo $__env->make("admin.layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/admin/launch-sheet/invoice.blade.php ENDPATH**/ ?>