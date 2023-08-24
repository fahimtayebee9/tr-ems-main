

<?php $__env->startSection('content'); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <?php echo e(__('Profile')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="row">
        <div class="col-lg-12 col-xl-3">
            <div class="card m-b-30">
                <div class="card-body">
                    <?php if(Auth::user()->image != null): ?>
                        <img src="<?php echo e(asset('storage/uploads/users/'.Auth::user()->image)); ?>" alt=""
                            class="rounded-circle mx-auto d-block w-80">
                    <?php else: ?>
                        <img src="<?php echo e(asset('storage/employee/images/default.png')); ?>" alt=""
                            class="rounded-circle mx-auto d-block w-80">
                    <?php endif; ?>
                    
                    <div class="text-center">
                        <h5 class="mt-2 mb-0"><?php echo e(Auth::user()->first_name . " " . Auth::user()->last_name); ?></h5>
                        <small class="text-muted"><?php echo e($employee->designation->name); ?></small><br>
                        <small class="text-muted">Join Date: <?php echo e($employee->joining_date); ?></small>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="card m-b-30 contact">
                        <div class="card-body">
                            <h6 class="header-title pb-3">Contact</h6>
                            <ul class="list-unstyled mb-0">
                                <li class=""><i class="fas fa-phone mr-2"></i> <b>Phone </b>: <?php echo e($employee->user->phone); ?></li>
                                <li class="mt-2"><i class="far fa-envelope mt-2 mr-2"></i> <b>Email </b>:
                                    <?php echo e($employee->user->email); ?></li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-xl-9">
            <div class="card m-b-30">
                <div class="card-header profile-tabs pb-0">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active" href="#about" data-toggle="tab"
                                aria-expanded="false"><i class="ti-user mr-2"></i>About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab" aria-expanded="false"><i
                                    class="ti-settings mr-2"></i>Settings</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="">
                        <div class="tab-content">
                            <div class="tab-pane active pt-3" id="about">
                                <div class="row justify-content-start">
                                    <div class="col-md-12 profile-detail">
                                        <div class="">
                                            <h5 class="mb-0 py-2"><i class="fa fa-graduation-cap text-primary"></i>
                                                Personal Details</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-8 align-self-start">
                                        <ul class="list-unstyled presonal-inform mt-3">
                                            <li><b>National ID:</b>-</li>
                                            <li><b>Phone:</b>+91 23456 78910</li>
                                            <li><b>Email:</b>RoberCarlile@.com</li>
                                            <li><b>Date of Birth:</b> 6 January 1987</li>
                                            <li><b>Address:</b>Inox Box 1546, Sollins.</li>
                                            <li>
                                                <b>Nationality:</b> USA
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="settings">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="">
                                            <form method="post" action="<?php echo e(route('employee.profile.update')); ?>" class="form-horizontal form-material">
                                                <?php echo csrf_field(); ?>
                                                
                                                <div class="form-group">
                                                    <label for="current_password"><?php echo e(__('Current Password')); ?></label>
                                                    <input id="current_password" name="current_password" type="password" class="form-control mt-1 block w-full" autocomplete="current-password" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="password"><?php echo e(__('New Password')); ?></label>
                                                    <input id="password" name="password" type="password" class="form-control mt-1 block w-full" autocomplete="new-password" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="password_confirmation"><?php echo e(__('Confirm Password')); ?></label>
                                                    <input id="password_confirmation" name="password_confirmation" type="password" class="form-control  mt-1 block w-full" autocomplete="new-password" />
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary btn-sm text-light px-4 mt-2 float-right">Update Password</button>
                                                </div>
                                            </form>
                                        </div>

                                        <?php if(session('status') === 'password-updated'): ?>
                                            <p
                                                x-data="{ show: true }"
                                                x-show="show"
                                                x-transition
                                                x-init="setTimeout(() => show = false, 2000)"
                                                class="text-sm text-gray-600 dark:text-gray-400"
                                            ><?php echo e(__('Saved.')); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('employee.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/employee/pages/profile.blade.php ENDPATH**/ ?>