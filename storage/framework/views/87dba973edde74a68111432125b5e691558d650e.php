<div class="card" id="punch-info-atd">
    <div class="card-body">
        <div class="d-flex">
            <div class="flex-grow-1">
                <span class="text-muted text-uppercase fs-12 fw-bold">
                    Today's Attendance
                    <small class="text-muted"><?php echo e(date('d M, Y')); ?></small>
                </span>
                

                <?php if(!empty($attendance)): ?>
                    <div class="statistics mb-3">
                        <div class="row">
                            <div class="col-md-6 col-6 text-center">
                                <?php
                                    $statusClass = null;
                                    
                                    if (intval($attendance->status) == 6) {
                                        $statusClass = 'stats-box-warning';
                                    } elseif (intval($attendance->status) == 1) {
                                        $statusClass = 'stats-box-success';
                                    } else {
                                        $statusClass = 'stats-box-danger';
                                    }
                                ?>

                                <div class="stats-box <?php echo e($statusClass); ?>">
                                    <p class="font-weight-bold">Punch In</p>
                                    <h6><?php echo e(date('h:i A', strtotime($attendance->in_time))); ?></h6>
                                </div>
                            </div>
                            <div class="col-md-6 col-6 text-center">
                                <div class="stats-box">
                                    <p>Break</p>
                                    <h6>
                                        <?php
                                            $break = \App\Models\AttendanceBreak::where('attendance_id', $attendance->id)->first();
                                            $totalDuration = 0;
                                            if (!empty($break)) {
                                                $startTime = \Carbon\Carbon::parse($break->break_in);
                                                $finishTime = \Carbon\Carbon::parse($break->break_out);
                                            
                                                $totalDuration = $finishTime->diffInMinutes($startTime, true);
                                            }
                                        ?>
                                        <?php echo e(floor($totalDuration / 60)); ?> mins
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="punch-info" >
                        <div class="punch-hours">
                            <span>
                                <?php
                                    $startTime = \Carbon\Carbon::parse($attendance->in_time);
                                    $finishTime = !empty($attendance->out_time) ? \Carbon\Carbon::parse($attendance->out_time) : \Carbon\Carbon::now();
                                    
                                    $totalDuration = $finishTime->diffInMinutes($startTime, true);
                                ?>
                                <?php echo e(floor($totalDuration / 60)); ?> Hrs <?php echo e($totalDuration % 60); ?> Mins
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <?php if(
                            \App\Models\Attendance::where('id', $attendance->id)->exists() &&
                                !empty(\App\Models\Attendance::where('id', $attendance->id)->first()->out_time)): ?>
                            <div class="col-md-12">
                                <div class="alert alert-warning">
                                    <p class="text-center m-0">You have already punched out at
                                        <b><?php echo e(date('h:i A', strtotime(\Carbon\Carbon::parse(\App\Models\Attendance::where('id', $attendance->id)->first()->out_time)))); ?></b>.
                                    </p>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="col-md-6">
                                <?php if(\App\Models\AttendanceBreak::where('attendance_id', $attendance->id)->where('break_out', null)->exists()): ?>
                                    <?php
                                        $break = \App\Models\AttendanceBreak::where('attendance_id', $attendance->id)
                                            ->where('break_out', null)
                                            ->first();
                                    ?>
                                    <form action="<?php echo e(route('employee.attendance.break.update')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="break_id" value="<?php echo e($break->id); ?>">
                                        <div class="punch-btn-section text-center">
                                            <button type="submit" class="btn btn-success punch-btn w-100">Back
                                                In</button>
                                        </div>
                                    </form>
                                <?php else: ?>
                                    <form action="<?php echo e(route('employee.attendance.break.store')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="attendance_id" value="<?php echo e($attendance->id); ?>">
                                        <div class="punch-btn-section text-center">
                                            <button type="submit"
                                                class="btn btn-warning punch-btn w-100">Break</button>
                                        </div>
                                    </form>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
                                

                                
                                <button type="button" class="btn w-100 btn-primary punch-btn w-100" data-toggle="modal"
                                    data-target="#punchOutModal">
                                    Punch Out
                                </button>

                                <?php echo $__env->make('employee.pages.modals.mdl-punch-out', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php else: ?>
                    <form action="<?php echo e(route('employee.attendance.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="employee_id" value="<?php echo e($employee->id); ?>">
                        <input type="hidden" name="date" value="<?php echo e(date('Y-m-d')); ?>">
                        <div class="form-group mt-2 mb-2">
                            <label for="sign_in_from">Sign In Location</label>
                            <select data-plugin="customselect" name="sign_in_from" id="sign_in_from" class="form-control mt-2">
                                <option value="0">Office</option>
                                <option value="1">Home</option>
                            </select>
                        </div>
                        <div class="form-group mt-2 mb-2">
                            <label for="attendance_note">Attendance Note <span>(OPTIONAL)</span></label>
                            <input type="text" name="attendance_note" id="attendance_note" class="form-control"
                                placeholder="Enter attendance note">
                        </div>
                        <div class="punch-btn-section text-center">
                            <button type="submit" class="btn btn-primary punch-btn">Punch In</button>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/employee/partials/attendance-card.blade.php ENDPATH**/ ?>