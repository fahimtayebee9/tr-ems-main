

<?php $__env->startSection("body"); ?>

<div class="page-header">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h2><?php echo e(session('page_title')); ?></h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fa fa-dashboard"></i>
                        Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?php echo e(route('administration.index')); ?>">
                        Administrative Users
                    </a>
                </li>
                <li class="breadcrumb-item active">
                    Create
                </li>
            </ul>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-end">

        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="<?php echo e(route('admin.employees.update', $item->id)); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" required value="<?php echo e($item->user->first_name . ' ' . $item->user->last_name); ?>">
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="username" id="username" disabled value="<?php echo e($item->user->username); ?>" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" id="btn-generate-username" disabled type="button">Auto Generate</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Email Address</label>
                                <input type="text" value="<?php echo e($item->user->email); ?>" name="email" id="email" class="form-control" placeholder="Enter Email Address" required>
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Phone Numebr</label>
                                <input type="text" value="<?php echo e($item->user->phone); ?>" name="phone" id="phone" class="form-control" placeholder="Enter phone number" required>
                                <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="blood_group">Blood Group</label>
                                <select name="blood_group" id="blood_group" class="form-control">
                                    <option value="">Choose an option</option>
                                    <option value="A+" <?php if($item->user->blood_group == "A+"): ?> selected <?php endif; ?>>A+</option>
                                    <option value="A-" <?php if($item->user->blood_group == "A-"): ?> selected <?php endif; ?>>A-</option>
                                    <option value="B+" <?php if($item->user->blood_group == "B+"): ?> selected <?php endif; ?>>B+</option>
                                    <option value="B-" <?php if($item->user->blood_group == "B-"): ?> selected <?php endif; ?>>B-</option>
                                    <option value="AB+" <?php if($item->user->blood_group == "AB+"): ?> selected <?php endif; ?>>AB+</option>    
                                    <option value="AB-" <?php if($item->user->blood_group == "AB-"): ?> selected <?php endif; ?>>AB-</option>
                                    <option value="O+" <?php if($item->user->blood_group == "O+"): ?> selected <?php endif; ?>>O+</option>
                                    <option value="O-" <?php if($item->user->blood_group == "O-"): ?> selected <?php endif; ?>>O-</option>
                                </select>
                                <?php $__errorArgs = ['blood_group'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="role_id">Role</label>
                                <select name="role_id" id="role_id" class="form-control">
                                    <option value="">Choose an option</option>
                                    <?php $__currentLoopData = App\Models\RoleManager::where('id', '!=', 1)->where('slug', '!=', 'launch-manager')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($role->id); ?>" <?php if($item->user->role_id == $role->id): ?> selected <?php endif; ?>><?php echo e($role->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">Choose an option</option>
                                    <option value="1" <?php if($item->user->status == 1): ?> selected <?php endif; ?>>Active</option>
                                    <option value="0" <?php if($item->user->status == 0): ?> selected <?php endif; ?>>Inactive</option>
                                </select>
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="checkbox" id="chk-password-visibility">Show Password
                                <div class="input-group mb-3">
                                    <input type="password" name="password"  id="password" class="form-control" placeholder="Enter password" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" id="btn-password-generate" type="button">Auto Generate</button>
                                    </div>
                                </div>
                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="awards_won">Awards Won</label>
                                <input type="number" value="<?php echo e($item->awards_won); ?>" name="awards_won" id="awards_won" class="form-control" placeholder="Enter Number of Awards Won">
                                <?php $__errorArgs = ['awards_won'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="monthly_salary">Monthly Salary</label>
                                <input type="number" value="<?php echo e($item->monthly_salary); ?>" name="monthly_salary" id="monthly_salary" class="form-control" placeholder="Enter Monthly Salary">
                                <?php $__errorArgs = ['monthly_salary'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="joining_date">Join Date</label>
                                <input type="date" value="<?php echo e($item->joining_date); ?>" name="joining_date" id="joining_date" class="form-control" placeholder="Enter Joining Date">
                                <?php $__errorArgs = ['joining_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="department_id">Department</label>
                                <select name="department_id" id="department_id" class="form-control">
                                    <option value="">Choose an option</option>
                                    <?php $__currentLoopData = App\Models\Department::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($department->id); ?>" <?php if($item->department_id == $department->id): ?> selected <?php endif; ?> ><?php echo e($department->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['department_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="designation_id">Designation</label>
                                <select name="designation_id" id="designation_id" class="form-control">
                                    <option value="">Choose an option</option>
                                    <?php $__currentLoopData = App\Models\EmployeeRole::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $designation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($designation->id); ?>" <?php if($item->designation_id == $designation->id): ?> selected <?php endif; ?>><?php echo e($designation->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['designation_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="team_lead_id">Team Lead</label>
                                <select name="team_lead_id" id="team_lead_id" class="form-control">
                                    <option value="">Choose an option</option>
                                    <?php $__currentLoopData = App\Models\User::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($user->id); ?>" <?php if($item->team_lead_id == $user->id): ?> selected <?php endif; ?>><?php echo e($user->first_name . ' ' . $user->last_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['team_lead_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="image">Profile Image</label>
                                <input type="file" class="dropify" name="image" id="dp-image" data-default-file="url_of_your_file" />
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-3 text-center">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/admin/employees/edit.blade.php ENDPATH**/ ?>