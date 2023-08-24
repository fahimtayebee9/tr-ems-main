<div class="modal fade" id="attendance_summary_<?php echo e($item->employee_id); ?>" tabindex="-1" role="dialog" aria-labelledby="attendanceInfo" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="holidayModalLabel">Monthly Attendance Summary</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">
                <?php if(isset($item->employee_id)): ?>
                    <?php
                        // create carbon date from $i
                        $start_date = \Carbon\Carbon::create(date('Y'), date('m'), 1);
                        $end_date = \Carbon\Carbon::create(date('Y'), date('m'), cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y')));
                        
                        // check if date is holiday from weekly_holiday day name in company policy table
                        // $week_days = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
                        $day = $week_days[$company_policy->where('policy_id','POLICY-WH')->first()->value-1];

                        $sundays_list = [];
                        while ($start_date->lte($end_date)) {
                            if ($start_date->format('l') == ucfirst($day)) {
                                $sundays_list[] = $start_date->format('Y-m-d');
                            }
                            $start_date->addDay();
                        }

                        $total_working_days = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y')) - count($sundays_list);
                        $total_present_days = count(\App\Models\Attendance::where('employee_id', $item->id)
                                                ->whereMonth('date', date('m'))->where('status', 1)->get());
                        $total_half_days    = count(\App\Models\Attendance::where('employee_id', $item->id)
                                                ->whereMonth('date', date('m'))->where('status', 6)->get());
                        $total_absent_days  = $total_working_days - $total_present_days - $total_half_days;
                    ?>
                <table class="table table-hover mb-0">
                    <tbody>
                        <tr>
                            <td width="30%">Employee ID</td>
                            <td width="20px"><span>:</span></td>
                            <td><?php echo e($item->employee_id); ?></td>
                        </tr>
                        <tr>
                            <td width="30%">Employee Name</td>
                            <td width="20px"><span>:</span></td>
                            <td><?php echo e($item->user->first_name); ?> <?php echo e($item->user->last_name); ?></td>
                        </tr>
                        <tr>
                            <td width="30%">Total Present Days</td> 
                            <td width="20px"><span>:</span></td>
                            <td>
                                <?php echo e($total_present_days); ?> / <?php echo e($total_working_days); ?>

                            </td>
                        </tr>
                        <tr>
                            <td width="30%">Total Absent Days</td>
                            <td width="20px"><span>:</span></td>
                            <td>
                                <?php echo e($total_absent_days); ?> / <?php echo e($total_working_days); ?>

                            </td>
                        </tr>
                        <tr>
                            <td width="30%">Total Half Days</td>
                            <td width="20px"><span>:</span></td>
                            <td>
                                <?php echo e($total_half_days); ?> / <?php echo e($total_working_days); ?>

                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php else: ?>
                <div class="alert alert-danger text-center">
                    <strong>Sorry!</strong> No data found.
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/admin/includes/modals/mdl-attendance-summary.blade.php ENDPATH**/ ?>