

<?php $__env->startSection('body'); ?>
    <?php
        $company_policy = \App\Models\CompanyPolicy::all();
    ?>
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <?php echo $__env->make('admin.includes.breadcrumb-v2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-end">
                <a class="btn btn-primary" href="<?php echo e(route('admin.attendance.seedDatabase')); ?>"><i class="fa fa-plus mr-2"></i>
                    Seed Database</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo e(route('admin.attendance.export')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group m-0">
                                    <?php
                                        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                                    ?>
                                    <select name="month" class="form-control show-tick">
                                        <?php $__currentLoopData = $months; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $month): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($key + 1); ?>"
                                                <?php echo e($key + 1 == date('m') ? 'selected' : ''); ?>><?php echo e($month); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group m-0">
                                    <?php
                                        $years = ['2019', '2020', '2021', '2022', '2023', '2024', '2025', '2026', '2027', '2028', '2029', '2030'];
                                    ?>
                                    <select name="year" class="form-control show-tick">
                                        <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($year); ?>" <?php echo e($year == date('Y') ? 'selected' : ''); ?>>
                                                <?php echo e($year); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group m-0">
                                    <select name="submission_type" class="form-control show-tick">
                                        <option value="1">Export</option>
                                        <option value="2">Preview</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary w-100" data-toggle="tooltip"
                                    data-title="Export Excel">
                                    <i class="fa fa-file-excel-o mr-2"></i>
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body attendance-table-box">
                    <div class="table-responsive" id="attendance-tbl">
                        <?php if(!empty($employees)): ?>
                            <table class="table table-striped custom-table table-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th>Employee</th>
                                        <?php
                                            $total_days = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
                                        ?>
                                        
                                        <?php for($i = 1; $i <= $total_days; $i++): ?>
                                            <th tabindex="0" aria-controls="employees_tbl" class="text-center">
                                                <?php echo e(date('d M', strtotime(date('Y-m-'. $i)))); ?>

                                            </th>
                                        <?php endfor; ?>
                                        <th class="sorting" aria-controls="employees_tbl">Summary</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr role="row" class="even">
                                            <td class="d-flex justify-content-start align-items-center">
                                                <span>
                                                    <h6 class="mb-0">
                                                        <?php echo e($item->user->first_name . ' ' . $item->user->last_name); ?>

                                                    </h6>
                                                    <span><?php echo e($item->employee_id); ?></span>
                                                </span>
                                            </td>
                                            <?php for($i = 1; $i <= $total_days; $i++): ?>
                                                <?php
                                                    $date = \Carbon\Carbon::create(date('Y'), date('m'), $i);
                                                    $week_days = ['saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday'];
                                                    $day = $week_days[$company_policy->where('policy_id','POLICY-WH')->first()->value-1];
                                                    
                                                    $attendance = \App\Models\Attendance::where('employee_id', $item->id)
                                                        ->whereDate('date', $date)
                                                        ->first();
                                                    
                                                ?>
                                                <?php if(strtolower($date->format('l')) == $day): ?>
                                                    <td>
                                                        <span class="badge badge-warning">WK</span>
                                                    </td>
                                                <?php elseif(empty($attendance)): ?>
                                                    <td class="text-center">
                                                        <span class="badge bg-inverse-danger">
                                                            <i class="fa fa-close text-danger"></i>
                                                        </span>
                                                    </td>
                                                <?php elseif(!empty($attendance)): ?>
                                                    <td class="text-center p-1">
                                                        <?php if($attendance->status == 1): ?>
                                                            <a href="javascript:void(0);"
                                                                class="m-0 text-center"
                                                                data-toggle="modal"
                                                                data-target="#attendance_info_<?php echo e($item->employee_id); ?>">
                                                                <i class="fa fa-check text-success"></i>
                                                            </a>
                                                        <?php elseif($attendance->status == 2): ?>
                                                            <a href="javascript:void(0);"
                                                                class="text-center" data-toggle="modal"
                                                                data-target="#attendance_info_<?php echo e($item->employee_id); ?>">
                                                                <i class="fa fa-close text-danger"></i>
                                                            </a>
                                                        <?php elseif($attendance->status == 3): ?>
                                                            <span class="text-center">
                                                                <a href="javascript:void(0);" data-toggle="modal"
                                                                    data-target="#attendance_info_<?php echo e($item->employee_id); ?>">
                                                                    <i class="fa fa-close text-danger"></i>
                                                                </a>
                                                            </span>
                                                        <?php elseif($attendance->status == 5): ?>
                                                            <a href="javascript:void(0);"
                                                                class="text-center" data-toggle="modal"
                                                                data-target="#attendance_info_<?php echo e($item->employee_id); ?>">
                                                                LV
                                                            </a>
                                                        <?php elseif($attendance->status == 6): ?>
                                                            <div class="text-center">
                                                                <a href="javascript:void(0);" data-bs-toggle="modal" data-target="#attendance_info_<?php echo e($item->employee_id); ?>">
                                                                    
                                                                        <i class="fa fa-check text-success"></i>
                                                                        <i class="fa fa-close text-danger"></i>
                                                                    
                                                                </a>
                                                            </div>
                                                        <?php endif; ?>

                                                        <?php echo $__env->make('admin.includes.modals.mdl_daily_attendance', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    </td>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                            <!-- Summary of attendance -->
                                            <td class="text-center">
                                                <a href="javascript:void(0);" class="btn btn-sm btn-primary"
                                                    data-toggle="modal"
                                                    data-target="#attendance_summary_<?php echo e($item->employee_id); ?>">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <?php echo $__env->make('admin.includes.modals.mdl-attendance-summary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                
                            </table>
                            <table style="width:100%!important; text-overflow: ellipsis;"
                                class="table table-hover js-basic-example dataTable table-custom table-striped m-b-0 c_list no-footer"
                                id="employees_tbl" role="grid" aria-describedby="employees_tbl_info">
                                
                                <tbody>
                                    
                                </tbody>
                            </table>
                        <?php else: ?>
                            <div class="alert alert-info">No Attendance Details Found</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app-v2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/admin/attendances/index.blade.php ENDPATH**/ ?>