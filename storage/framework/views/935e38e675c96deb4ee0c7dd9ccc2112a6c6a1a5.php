

<?php $__env->startSection('body'); ?>
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <?php echo $__env->make('admin.includes.breadcrumb-v2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-auto float-end ms-auto"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card-group m-b-30">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <h4 class="table-avatar d-flex align-items-center">
                                    <a href="" class="avatar">
                                        <?php if($application->employee->user->image): ?>
                                            <img src="<?php echo e(asset('storage/uploads/users/'.$application->employee->user->image)); ?>" alt="user" class="rounded-circle img-fluid">
                                        <?php else: ?>
                                            <img src="<?php echo e(asset('storage/uploads/users/default.webp')); ?>" alt="user" class="rounded-circle img-fluid">
                                        <?php endif; ?>
                                    </a>
                                    <?php echo e($application->employee->user->first_name . ' '. $application->employee->user->last_name); ?>

                                </h4>
                                <table style="width: 100%;">
                                    <tr>
                                        <td width="110px">Email</td>
                                        <td width="15px">:</td>
                                        <td><?php echo e($application->employee->user->email); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Employee ID</td>
                                        <td>:</td>
                                        <td><?php echo e($application->employee->user->username); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Designation</td>
                                        <td>:</td>
                                        <td><?php echo e($application->employee->designation->name); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Department</td>
                                        <td>:</td>
                                        <td><?php echo e($application->employee->department->name); ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <h4 class="text-info">Leave Details</h4>
                                
                                <table style="width: 100%;">
                                    <tr>
                                        <td width="110px">Leave Type</td>
                                        <td width="15px">:</td>
                                        <td>
                                            <?php if($application->leave_type == 1): ?>
                                                <span class="badge badge-primary">Full Day Paid</span>
                                            <?php elseif($application->leave_type == 2): ?>
                                                <span class="badge badge-success">Half Day Non-Paid</span>
                                            <?php elseif($application->leave_type == 3): ?>
                                                <span class="badge badge-warning">Full Day Non-Paid</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Leave Date</td>
                                        <td>:</td>
                                        <td>
                                            <?php echo e(date('d M, Y', strtotime($application->leave_from))); ?>

                                            <?php if(!empty($application->leave_to)): ?>
                                                - <?php echo e(date('d M, Y', strtotime($application->leave_to))); ?>

                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Total Days</td>
                                        <td>:</td>
                                        <td>
                                            <?php echo e(\Carbon\Carbon::parse($application->leave_from)->diffInDays($application->leave_to)); ?> Days    
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Reason</td>
                                        <td>:</td>
                                        <td>
                                            <?php echo e($application->subject); ?>    
                                        </td>
                                    </tr>
                                </table>

                                <div class="btn-list mt-3">
                                    <a href="<?php echo e(route('admin.application.exportPDF', $application)); ?>" data-title="Download PDF" data-toggle="tooltip" class="btn btn-info btn-sm">
                                        <i class="fa fa-download"></i> Download PDF
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <?php
                                    // dd(Auth::user()->role_id);
                                ?>
                                <?php if(Auth::user()->role_id != 1): ?>
                                    <?php if(Auth::user()->employee->employee_id == "1612004"): ?>
                                        <?php if(!isset($application->status_by_astmanager) || $application->status_by_astmanager == 1): ?>
                                            <p class="mb-2">
                                                Authorized By : <b><?php echo e(Auth::user()->first_name . ' '. Auth::user()->last_name); ?></b>
                                            </p>
                                            <form action="<?php echo e(route('admin.application.update', $application->leave_id)); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="status_by_astmanager">
                                                                Status By <?php echo e(Auth::user()->employee->designation->name); ?>

                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <h6>&nbsp;</h6>
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        <?php else: ?>
                                            <p>
                                                <b>
                                                    Status By 
                                                    <span style="cursor: pointer!important;"
                                                        data-title="<?php echo e(\App\Models\Employee::where('employee_id', "1612004")->first()->user->first_name . 
                                                        ' ' . \App\Models\Employee::where('employee_id', "1612004")->first()->user->last_name); ?>" 
                                                        data-toggle="tooltip">
                                                        <?php echo e(\App\Models\Employee::where('employee_id', "1612004")->first()->designation->name); ?>

                                                    </span>:
                                                </b>
                                                <?php if($application->status_by_astmanager == 2): ?>
                                                    <span class="badge badge-success">Approved</span>
                                                <?php elseif($application->status_by_astmanager == 3): ?>
                                                    <span class="badge badge-danger">Rejected</span>
                                                <?php else: ?>
                                                    <span class="badge badge-warning">Pending</span>
                                                <?php endif; ?>
                                                <select name="status_by_astmanager" class="form-control" id="status_by_astmanager">
                                                    <option value="">Select Status</option>
                                                    <option value="1" <?php if($application->status_by_astmanager == 1): ?> selected <?php endif; ?>>Pending</option>
                                                    <option value="2" <?php if($application->status_by_astmanager == 2): ?> selected <?php endif; ?>>Approved</option>
                                                    <option value="3" <?php if($application->status_by_astmanager == 3): ?> selected <?php endif; ?>>Rejected</option>
                                                </select>
                                            </p>
                                        <?php endif; ?>
                                    <?php elseif(Auth::user()->employee->employee_id == "1612001"): ?>
                                        <p class="mb-2">
                                            Authorized By : <b><?php echo e(Auth::user()->first_name . ' '. Auth::user()->last_name); ?></b>
                                        </p>
                                        <p>
                                            <b>
                                                Status By 
                                                <span style="cursor: pointer!important;"
                                                    data-title="<?php echo e(\App\Models\Employee::where('employee_id', "1612001")->first()->user->first_name . 
                                                    ' ' . \App\Models\Employee::where('employee_id', "1612001")->first()->user->last_name); ?>" 
                                                    data-toggle="tooltip">
                                                    <?php echo e(\App\Models\Employee::where('employee_id', "1612001")->first()->designation->name); ?>

                                                </span>:
                                            </b>
                                            <select name="status_by_hr" 
                                                <?php if($application->status_by_astmanager == 1 || $application->status_by_astmanager == 3): ?> 
                                                    disabled 
                                                <?php endif; ?> 
                                                class="form-control select ml-2" id="status_by_hr">
                                                <option value="0">Select Status</option>
                                                <option value="1" <?php if($application->status_by_hr == 1): ?> selected <?php endif; ?>>Pending</option>
                                                <option value="2" <?php if($application->status_by_hr == 2): ?> selected <?php endif; ?>>Approved</option>
                                                <option value="3" <?php if($application->status_by_hr == 3): ?> selected <?php endif; ?>>Rejected</option>
                                            </select>
                                        </p>
                                    <?php endif; ?>
                                    <p>
                                        <?php if(Auth::user()->employee->employee_id != "1612001" && Auth::user()->role_id != 1): ?>
                                            <b>
                                                Status By 
                                                <span style="cursor: pointer!important;"
                                                    data-title="<?php echo e(\App\Models\Employee::where('employee_id', "1612001")->first()->user->first_name . 
                                                    ' ' . \App\Models\Employee::where('employee_id', "1612001")->first()->user->last_name); ?>" 
                                                    data-toggle="tooltip">
                                                    <?php echo e(\App\Models\Employee::where('employee_id', "1612001")->first()->designation->name); ?>

                                                </span>:
                                            </b>
                                            <?php if($application->status_by_hr == 2): ?>
                                                <span class="badge badge-success">Approved</span>
                                            <?php elseif($application->status_by_hr == 3): ?>
                                                <span class="badge badge-danger">Rejected</span>
                                            <?php else: ?>
                                                <span class="badge badge-warning">Pending</span>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <hr>
                                        <?php if(Auth::user()->employee->employee_id != "1612004" && Auth::user()->role_id != 1): ?>
                                            <b>
                                                Status By 
                                                <span style="cursor: pointer!important;"
                                                    data-title="<?php echo e(\App\Models\Employee::where('employee_id', "1612004")->first()->user->first_name . 
                                                    ' ' . \App\Models\Employee::where('employee_id', "1612004")->first()->user->last_name); ?>" 
                                                    data-toggle="tooltip">
                                                    <?php echo e(\App\Models\Employee::where('employee_id', "1612004")->first()->designation->name); ?>

                                                </span>:
                                            </b>
                                            <?php if($application->status_by_astmanager == 2): ?>
                                                <span class="badge badge-success">Approved</span>
                                            <?php elseif($application->status_by_astmanager == 3): ?>
                                                <span class="badge badge-danger">Rejected</span>
                                            <?php elseif($application->status_by_astmanager == 1 || $application->status_by_astmanager == 0): ?>
                                                <span class="badge badge-warning">Pending</span>
                                            <?php endif; ?>
    
                                            <?php if($application->status_by_astmanager == 1 || $application->status_by_astmanager == 3): ?> 
                                                <div class="alert alert-warning mt-2">
                                                    <b>Note:</b> <?php echo e(\App\Models\Employee::where('employee_id', "1612004")->first()->designation->name); ?> hasn't approved yet.
                                                </div> 
                                            <?php endif; ?> 
                                        <?php endif; ?>
                                    </p>
                                <?php endif; ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card invoice1">
                <div class="card-body">
                    <p class="m-0">
                        <?php echo $application->description; ?>

                    </p>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/admin/applications/show.blade.php ENDPATH**/ ?>