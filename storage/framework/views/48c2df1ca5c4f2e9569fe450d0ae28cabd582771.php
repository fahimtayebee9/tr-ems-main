

<?php $__env->startSection("body"); ?>
<div class="page-header">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <?php echo $__env->make('admin.includes.breadcrumb-v2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-end">
            <div class="d-flex justify-content-end">
                <a href="<?php echo e(route('admin.launch.seedDatabase')); ?>" class="btn btn-primary">Seed Database</a>
                <a href="<?php echo e(route('admin.launch-sheet.calculate')); ?>" type="submit" class="btn btn-outline-info ml-2">Calculate Launch</a>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="table-header-actions row justify-content-between">
                    <div class="col-md-6">
                        <p class="m-0"><?php echo e(session()->get('page_title_description')); ?></p>
                    </div>
                    <div class="col-md-4">
                        <form action="" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
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
                                <div class="col-md-6 d-flex justify-content-between align-items-center">
                                    <button type="submit"  class="btn btn-success">Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-2">
                        
                    </div>
                </div>
            </div>
            <?php
                $current_month = (session()->get('month_filter')) ? session()->get('month_filter') : date('m');
                $current_year = (session()->get('year_filter')) ? session()->get('year_filter') : date('Y');   
            ?>
            <div class="card-body attendance-table-box">
                <div class="table-responsive" id="attendance-tbl">
                    <?php
                        // dd($employees->count(), $users->count());
                    ?>
                    <?php if(!empty($users)): ?>
                        <table style="width:100%!important;" class="table table-hover js-basic-example dataTable table-custom table-bordered m-b-0 c_list no-footer" id="launch_sheet_table" role="grid" aria-describedby="launch_sheet_table_info">
                            <thead class="thead-light">
                                <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="launch_sheet_table" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" 
                                        style="width: 120.812px;">Employee</th>
                                    <?php
                                    // get total days in current month
                                    $total_days = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
                                    ?>
                                    
                                    <?php for($i = 1; $i <= $total_days; $i++): ?> 
                                        <th rowspan="1" colspan="1" style="width: 140px!important;" class="text-center p-1"><?php echo e(date($i . ' M')); ?></th>
                                    <?php endfor; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(!empty($item)): ?>
                                    <tr role="row" class="even">
                                        <td class="d-flex justify-content-start align-items-center">
                                            <span>
                                                <h6 class="mb-0"><?php echo e($item->first_name . ' '. $item->last_name); ?></h6>
                                                <span><?php echo e($item->employee_id); ?></span>
                                            </span>
                                        </td>
                                        <?php for($i = 1; $i <= $total_days; $i++): ?>
                                            <?php
                                                // create carbon date from $i
                                                $date = \Carbon\Carbon::create(date('Y'), date('m'), $i);
                                                
                                                // check if date is holiday from weekly_holiday day name in company policy table
                                                $week_days = ['saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday'];
                                                $company_policy = \App\Models\CompanyPolicy::all();
                                                $day = $week_days[$company_policy->where('policy_id', 'POLICY-WH')->first()->value - 1];
                                                $ldate_sheet = \App\Models\LaunchSheet::where('user_id', $item->id)->where('date', $date->format('Y-m-d') . " 00:00:00")->first();
                                            ?>
                                            <?php if(strtolower($date->format('l')) == $day): ?>
                                                <td class="text-center p-1">
                                                    <span class="badge bg-inverse-warning" data-toggle="tooltip" data-title="Weekly Holiday">W</span>
                                                </td>
                                            <?php elseif($ldate_sheet != null): ?>
                                                <td class="text-center p-1">
                                                    <?php if($ldate_sheet->status == 1): ?>
                                                        <span class="" data-toggle="tooltip" data-title="Yes">
                                                            <i class="fa fa-check text-success"></i>
                                                        </span>
                                                    <?php elseif($ldate_sheet->status == 0): ?>
                                                        <span class="" data-toggle="tooltip" data-title="No">
                                                            <i class="fa fa-close text-danger"></i>
                                                        </span>
                                                    <?php endif; ?>
                                                </td>
                                            <?php elseif($ldate_sheet == null): ?>
                                                <td class="text-center p-1">
                                                    <span class="">
                                                        <i class="fa fa-close text-danger"></i>
                                                    </span>
                                                </td>
                                            <?php endif; ?>
                                        <?php endfor; ?>
                                    </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>
                                        <h6 class="mb-0">Extra Launch</h6>
                                    </td>
                                    <?php for($i = 1; $i <= $total_days; $i++): ?>
                                        <?php
                                            $ext_launch = \App\Models\ExtraLaunch::whereDate('date', $current_year.'-'.$current_month.'-'.$i)->first(); 
                                        ?>
                                        <td>
                                            <!-- Ajax Form with select box -->
                                            <?php
                                                $disabled = '';
                                                if($i < date('d')){
                                                    $disabled = 'disabled';
                                                }
                                            ?>
                                            <form action="<?php echo e(route('admin.launchSheets.update')); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="date_day" value="<?php echo e($i); ?>">
                                                <div class="form-group">
                                                    <select class="extra-launch-select form-control" <?php echo e($disabled); ?> name="extra_launch" id="extra-launch-<?php echo e($i); ?>" >
                                                        <option value="0"  <?php if(!empty($ext_launch) && $ext_launch->count == 0): ?> selected <?php endif; ?>>0</option>
                                                        <option value="1"  <?php if(!empty($ext_launch) && $ext_launch->count == 1): ?> selected <?php endif; ?>>1</option>
                                                        <option value="2"  <?php if(!empty($ext_launch) && $ext_launch->count == 2): ?> selected <?php endif; ?>>2</option>
                                                        <option value="3"  <?php if(!empty($ext_launch) && $ext_launch->count == 3): ?> selected <?php endif; ?>>3</option>
                                                        <option value="4"  <?php if(!empty($ext_launch) && $ext_launch->count == 4): ?> selected <?php endif; ?>>4</option>
                                                        <option value="5"  <?php if(!empty($ext_launch) && $ext_launch->count == 5): ?> selected <?php endif; ?>>5</option>
                                                        <option value="6"  <?php if(!empty($ext_launch) && $ext_launch->count == 6): ?> selected <?php endif; ?>>6</option>
                                                        <option value="7"  <?php if(!empty($ext_launch) && $ext_launch->count == 7): ?> selected <?php endif; ?>>7</option>
                                                        <option value="8"  <?php if(!empty($ext_launch) && $ext_launch->count == 8): ?> selected <?php endif; ?>>8</option>
                                                        <option value="9"  <?php if(!empty($ext_launch) && $ext_launch->count == 9): ?> selected <?php endif; ?>>9</option>
                                                        <option value="10" <?php if(!empty($ext_launch) && $ext_launch->count == 10): ?> selected <?php endif; ?>>10</option>
                                                    </select>
                                                </div>
                                                <button class="btn btn-sm btn-success" type="submit">Update</button>
                                            </form>
                                        </td>
                                    <?php endfor; ?>
                                </tr>
                                <tr>
                                    <td>
                                        <h6 class="mb-0">Total</h6>
                                    </td>
                                    <?php for($i = 1; $i <= $total_days; $i++): ?>
                                        <?php
                                            $extLaunchInfo = \App\Models\ExtraLaunch::whereDate('date', \Carbon\Carbon::create($current_year, $current_month, $i))->first();
                                            if($i == 12){
                                                // dd($extLaunchInfo);
                                            }
                                        ?>
                                        <?php if(!empty($extLaunchInfo)): ?>
                                            <td class="text-center p-1">
                                                <b><?php echo e($extLaunchInfo->total_launch); ?></b>
                                            </td>
                                        <?php else: ?>
                                        <td class="text-center p-1">
                                            <b>0</b>
                                        </td>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                    <!-- Summary of attendance -->
                                </tr>
                            </tfoot>
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
<?php echo $__env->make("admin.layouts.app-v2", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/admin/launch-sheet/index.blade.php ENDPATH**/ ?>