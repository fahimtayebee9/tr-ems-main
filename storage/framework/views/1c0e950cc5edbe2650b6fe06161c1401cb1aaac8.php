

<?php $__env->startSection('content'); ?>
    <?php
        $str = "12345678";
        echo Hash::make($str);
    ?>
    <div class="account-box">
        <div class="account-wrapper">
            <h3 class="account-title">
                Login <br>
                <strong>Tech Rajshahi EMS</strong>
            </h3>
            <p class="account-subtitle">Access to our dashboard</p>

            

            <form method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group first">
                    <label for="username">Username</label>
                    <input id="text" type="text" class="form-control <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        name="username" value="<?php echo e(old('username')); ?>" required autocomplete="username" autofocus>

                    <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label>Password</label>
                        </div>
                        <div class="col-auto">
                            <?php if(Route::has('password.request')): ?>
                                <a class="text-muted" href="<?php echo e(route('password.request')); ?>">
                                    <?php echo e(__('Forgot Your Password?')); ?>

                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="position-relative">
                        <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            name="password" required autocomplete="current-password">
                        <span class="fa fa-eye-slash" id="toggle-password" style="position: absolute; top: 50%; right: 3%; transform: translate(0%, -50%);"></span>
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="d-flex mb-5 align-items-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            <?php echo e(old('remember') ? 'checked' : ''); ?>>

                        <label class="form-check-label" for="remember">
                            <?php echo e(__('Remember Me')); ?>

                        </label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary account-btn">
                    <?php echo e(__('Login')); ?>

                </button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
            

<?php echo $__env->make('layouts.cauth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/auth/login.blade.php ENDPATH**/ ?>