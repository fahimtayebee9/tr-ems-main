

<?php $__env->startSection("body"); ?>

<?php
    $total_payable_salary = 0;
    $total_deduction = 0;
    $total_salary = 0;
    
    foreach ($employeeList as $emp) {
        $total_salary += $emp->monthly_salary;
        
        $total_days_in_month = \Carbon\Carbon::now()->daysInMonth;
        $emp_id = $emp->id;
        $total_ontime_attendance = \App\Models\Attendance::where('employee_id', $emp->id)->where('status', 1)->count();
        $total_late_attendance = \App\Models\Attendance::where('employee_id', $emp->id)->where('status', 6)->count();
        
        $leave_applications = \App\Models\LeaveApplication::where('employee_id', $emp->id)->where('leave_type', 1)->where('approved_by_astmanager', 2)->where('approved_by_hr',2)->get();
        $total_leave = 0;
        foreach ($leave_applications as $leave) {
            $lstart = \Carbon\Carbon::parse($leave->start_date);
            $lend = \Carbon\Carbon::parse($leave->end_date);
            $total_leave += $lstart->diffInDays($lend);
        }
        
        $total_absent = $total_days_in_month - ($total_ontime_attendance + $total_late_attendance + $total_leave);

        $emp_daily_salary = $emp->monthly_salary / $total_days_in_month;

        $total_deduction = 0;
        if ($total_late_attendance > 0) {
            if($companyPolicy->late_attendance_rule == 1){
                if($companyPolicy->half_day_absent_rule == 1){
                    $total_deduction += $total_late_attendance * ($emp_daily_salary * $companyPolicy->half_day_absent_rule_value);
                }
                else{
                    $total_deduction += $total_late_attendance * $half_day_absent_rule_value;
                }
            }
            else if($companyPolicy->late_attendance_rule == 2){
                if($companyPolicy->full_day_absent_rule == 1){
                    $total_deduction += $total_late_attendance * ($emp_daily_salary * $companyPolicy->full_day_absent_rule_value);
                }
                else{
                    $total_deduction += $total_late_attendance * $half_day_absent_rule_value;
                }
            }
        }

        if ($total_absent > 0) {
            if($companyPolicy->full_day_absent_rule == 1){
                $total_deduction += $total_absent * ($emp_daily_salary * $companyPolicy->full_day_absent_rule_value);
            }
            else{
                $total_deduction += $total_absent * $half_day_absent_rule_value;
            }
        }

        $total_payable_salary += $emp->monthly_salary - $total_deduction;
        $total_salary += $emp->monthly_salary;

        // dd($total_deduction);
    }
?>

<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <?php echo $__env->make('admin.includes.breadcrumb-v2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-auto float-end ms-auto">
            
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
                            <span class="d-block">Total Employee's</span>
                        </div>
                    </div>
                    <h3 class="mb-3">
                        <?php echo e(count($employeeList)); ?>

                    </h3>
                </div>
            </div>
            <div class="card bg-inverse-info">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <span class="d-block">Total Salary</span>
                        </div>
                    </div>
                    <h3 class="mb-3">
                        BDT. <?php echo e(number_format($total_salary, 2, '.')); ?>

                    </h3>
                    <p class="mb-0">
                        Previous Month Bdt. <?php echo e(__('0')); ?></p>
                </div>
            </div>
            <div class="card bg-inverse-warning">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <span class="d-block">Total Deductions</span>
                        </div>
                    </div>
                    <h3 class="mb-3">
                        BDT. <?php echo e(number_format($total_deduction, 2, '.')); ?>

                    </h3>
                    <p class="mb-0">
                        Previous Month <?php echo e(__('0')); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <form action="<?php echo e(route('admin.payroll.generate')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-4">
                            <select name="salary_month" id="payroll-month" class="form-control">
                                <option value="">Select Month</option>
                                <?php $__currentLoopData = $months; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $month): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>"><?php echo e($month); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select name="salary_year" id="payroll-year" class="form-control">
                                <option value="">Select Year</option>
                                <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($year); ?>"><?php echo e($year); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary" class="form-control">Generate Payroll</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="body">
                <?php if(!empty($monthlySalaryReport)): ?>
                <div class="table-responsive">
                    <table class="table table-hover m-b-0">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Total Salary</th>
                                <th class="text-center">Total Deduction</th>
                                <th class="text-center">Net Payable Salary</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Payment Date</th>
                                <th class="text-center" width="160">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $monthlySalaryReport; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sheet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-center"><?php echo e($loop->iteration); ?></td>
                                    <td class="text-center">
                                        <?php echo e($sheet->report_name); ?>

                                    </td>
                                    <td class="text-center"><?php echo e($months['0'.$sheet->salary_month] . ", " . $sheet->salary_year); ?></td>
                                    <td class="text-center">BDT. <?php echo e($sheet->total_salary); ?></td>
                                    <td class="text-center">BDT. <?php echo e($sheet->total_deduction); ?></td>
                                    <td class="text-center">BDT. <?php echo e($sheet->net_payable_salary); ?></td>
                                    <td class="text-center">
                                        <?php if($sheet->status == 1): ?>
                                            <span class="badge badge-success">Paid</span>
                                        <?php else: ?>
                                            <span class="badge badge-danger">Unpaid</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center"><?php echo e(( $sheet->payment_date != null ) ? date('d M, Y', strtotime($sheet->payment_date)) : "-"); ?></td>
                                    <td class="text-center">
                                        <a href="<?php echo e(route('admin.payroll.show', $sheet->id)); ?>" class="btn btn-sm btn-primary">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        
                                        <a href="<?php echo e(route('admin.payroll.downloadPdf', $sheet->id)); ?>" class="btn btn-sm btn-success" data-toggle="tooltip" data-title="PDF Report">
                                            <i class="fa fa-download"></i>
                                        </a>
                                        
                                        <form action="<?php echo e(route('admin.payroll.downloadExcel')); ?>" method="post" class="d-inline">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="salary_month" value="<?php echo e($sheet->salary_month); ?>">
                                            <input type="hidden" name="salary_year" value="<?php echo e($sheet->salary_year); ?>">
                                            <input type="hidden" name="report_name" value="<?php echo e($sheet->report_name); ?>">
                                            <button type="submit" class="btn btn-sm btn-info" data-toggle="tooltip" data-title="Excel Report">
                                                <i class="fa fa-download"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <?php else: ?> 
                    <div class="alert alert-info">No Salary Sheets Found</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.layouts.app-v2", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/admin/payroll/index.blade.php ENDPATH**/ ?>