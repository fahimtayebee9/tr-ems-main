

<?php $__env->startSection("body"); ?>
<div class="block-header">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h2><?php echo e(session('page_title')); ?></h2>
            <ul class="breadcrumb">
                <!-- get breadcrumb array from session -->
                <?php
                    $breadcrumbs = session()->get('breadcrumb');
                ?>

                <?php if(!empty($breadcrumbs)): ?>
                    <!-- loop through breadcrumb array -->
                    <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($key === array_search(end($breadcrumbs), $breadcrumbs)): ?>
                            <li class="breadcrumb-item active">
                                <?php echo e($key); ?>

                            </li>
                        <?php else: ?>
                            <li class="breadcrumb-item">
                                <a href="<?php echo e($value); ?>"><i class="fa fa-dashboard"></i>
                                    <?php echo e($key); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                <?php endif; ?>
                
            </ul>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-end">
            <button data-toggle="modal" type="button" class="btn btn-primary" data-target="#md-create-holidays"><i class="fa fa-plus"></i> Add New Holiday</button>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <div class="table-header-actions row  justify-content-between">
                    <div class="col-md-6">
                        <h2>Holidays List</h2>
                        <div class="holiday-scheme">
                            <label for="expired" class="expired-sp">
                                <span class=""></span>
                                Date Expired
                            </label>
                            <label for="available" class="available-sp">
                                <span></span>
                                Available
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control custom-select select2-hidden-accessible w-100" name="month-flt" id="month-filter">
                            <option>Select Month</option>
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
            </div>
            <div class="body">
                <div class="table-responsive">
                    <?php
                        $daysInMonth = Illuminate\Support\Carbon::createFromDate(date("Y"), date('m'), 1)->daysInMonth;
                        $date_in_month = Illuminate\Support\Carbon::create(date("Y"), date('m'), 1);
                        $count = 0;
                    ?>
                    <table class="table table-hover m-b-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Day</th>
                                <th>Holiday Title</th>
                                <th width="160">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            

                            <?php $__currentLoopData = $holidays_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $holiday): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="<?php echo e(Illuminate\Support\Carbon::now() > Illuminate\Support\Carbon::parse($holiday->date)->format('Y-m-d') ? 'text-danger' : 'text-success'); ?>">
                                    <td><?php echo e(++$count); ?></td>
                                    <td><?php echo e(Illuminate\Support\Carbon::parse($holiday->date)->format('d M, Y')); ?></td>
                                    <td><?php echo e(Illuminate\Support\Carbon::parse($holiday->date)->format('l')); ?></td>
                                    <td><?php echo e($holiday->name); ?></td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#md-delete-holidays" 
                                            data-id="<?php echo e($holiday->id); ?>" data-name="<?php echo e($holiday->name); ?>"><i class="fa fa-trash"></i></button>
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

<?php echo $__env->make("admin.includes.modals.md-create-holiday", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/admin/holidays/index.blade.php ENDPATH**/ ?>