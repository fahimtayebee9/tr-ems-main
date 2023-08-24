

<?php $__env->startSection('body'); ?>

    <div class="page-header">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <?php echo $__env->make('admin.includes.breadcrumb-v2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-end">
                <div class="btn-group ml-2">
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-cog mr-2"></i> Generate Report
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="<?php echo e(route('admin.reports.custom-weekly-report.generateReport')); ?>" class="dropdown-item">
                            Weekly
                        </a>
                        <a class="dropdown-item" href="">Monthly</a>
                        <a class="dropdown-item" href="">Monthly Comparison</a>
                    </div>
                </div>
                <div class="btn-group ml-2">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-cog mr-2"></i> ACTIONS
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="" data-toggle="modal" type="button" class="dropdown-item" data-target="#md-upload-sailysales-bulk">
                            Upload Flat File
                        </a>
                        <a class="dropdown-item" href="">Export Data</a>
                    </div>
                </div>
    
                <?php echo $__env->make('admin.includes.modals.md-bulk-import-dailysales', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-end mb-5">
                        <div class="col-md-9">
                            <form action="" method="post" class="w-100" id="chart-loader-form">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select name="caccount_id" id="caccount-id" class="form-control">
                                                <option value="">Select Client Account</option>
                                                <?php $__currentLoopData = $clientAccountList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->account_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-secondary active">
                                                <input type="radio" class="radio_days_length" name="options" id="last_7_days" data-days="7" autocomplete="off" checked> Last 7 Days
                                            </label>
                                            <label class="btn btn-secondary">
                                                <input type="radio" class="radio_days_length" name="options" id="last_14_days" data-days="14" autocomplete="off"> Last 14 Days
                                            </label>
                                            <label class="btn btn-secondary">
                                                <input type="radio" class="radio_days_length" name="options" id="last_30_days" data-days="30" autocomplete="off"> Last 30 Days
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary w-100">Load</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="d-flex w-100 justify-content-between align-items-center">
                        <div class="daily-stat">
                            <div class="stat-header">
                                <h6 class="m-1 text-center">All Sales</h6>
                            </div>
                            <h4 class="m-0 text-center" id="all-sales">$1999</h4>
                        </div>
                        <div class="daily-stat">
                            <div class="stat-header">
                                <h6 class="m-1 text-center">TACOS</h6>
                            </div>
                            <h4 class="m-0 text-center" id="tacos">9.8%</h4>
                        </div>
                        <div class="daily-stat">
                            <div class="stat-header">
                                <h6 class="m-1 text-center">Ads Sales</h6>
                            </div>
                            <h4 class="m-0 text-center" id="ads-sales">$1999</h4>
                        </div>
                        <div class="daily-stat">
                            <div class="stat-header">
                                <h6 class="m-1 text-center">ACOS</h6>
                            </div>
                            <h4 class="m-0 text-center" id="acos">15.9%</h4>
                        </div>
                        <div class="daily-stat">
                            <div class="stat-header">
                                <h6 class="m-1 text-center">COST</h6>
                            </div>
                            <h4 class="m-0 text-center" id="cost">$1999</h4>
                        </div>
                        <div class="daily-stat">
                            <div class="stat-header">
                                <h6 class="m-1 text-center">Clicks</h6>
                            </div>
                            <h4 class="m-0 text-center" id="clicks">1999</h4>
                        </div>
                        <div class="daily-stat">
                            <div class="stat-header">
                                <h6 class="m-1 text-center">Impressions</h6>
                            </div>
                            <h4 class="m-0 text-center" id="impressions">1999</h4>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-12">
                            <div id="chart-area-spline" style="height: 16rem; max-height: 256px; position: relative;" class="morris"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/admin/dailySales/index.blade.php ENDPATH**/ ?>