

<?php $__env->startSection('body'); ?>
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <?php echo $__env->make('admin.includes.breadcrumb-v2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-auto float-end ms-auto">

            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <form action="<?php echo e(route('admin.computer-configurations.store')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8">
                                <h4 class="card-title mb-0">
                                    Computer Configuration For 
                                    <span id="emp-name-pc-configuration"></span>
                                </h4>
                            </div>
                            <div class="col-md-4 text-right">
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Employee Name</label>
                                    <select name="employee_id" id="" class="form-control select2 pc-configuration-select2">
                                        <option value="">Select</option>
                                        <?php $__currentLoopData = \App\Models\Employee::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->id); ?>">
                                                <?php echo e($item->user->first_name . " " . $item->user->last_name); ?>

                                                [<?php echo e($item->user->username); ?>]
                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Processor</label>
                                    <input type="text" class="form-control" name="processor">
                                </div>
                                <div class="form-group">
                                    <label>Motherboard</label>
                                    <input type="text" name="motherboard" id="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="d-block">Ram</label>
                                    <select name="ram" id="" class="form-control select2 pc-configuration-select2">
                                        <option value="">Select Memory</option>
                                        <?php $rams = [ '2 GB', '4 GB', '8 GB', '16 GB', '32 GB', '64 GB', '128 GB' ]; ?>
                                        <?php $__currentLoopData = $rams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item); ?>"><?php echo e($item); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>SSD</label>
                                    <select name="ssd" id="" class="form-control select2 pc-configuration-select2">
                                        <option value="">Select Memory</option>
                                        <?php $ssds = [ '120 GB', '128 GB', '240 GB', '250 GB', '256 GB', '500 GB', '512 GB', '1 TB' ]; ?>
                                        <?php $__currentLoopData = $ssds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item); ?>"><?php echo e($item); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Monitor</label>
                                    <input type="text" class="form-control" name="monitor">
                                </div>
                                <div class="form-group">
                                    <label>Headphone</label>
                                    <input type="text" class="form-control" name="headphone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Power Supply</label>
                                    <input type="text" class="form-control" name="power_supply">
                                </div>
                                <div class="form-group">
                                    <label>Graphics Card</label>
                                    <input type="text" class="form-control" name="graphics_card">
                                </div>
                                <div class="form-group">
                                    <label>Keyboard</label>
                                    <input type="text" class="form-control" name="keyboard">
                                </div>
                                <div class="form-group">
                                    <label>Mouse</label>
                                    <input type="text" class="form-control" name="mouse">
                                </div>
                                <div class="form-group">
                                    <label>HDD</label>
                                    <select name="hard_disk" id="" class="form-control select2 pc-configuration-select2">
                                        <option value="">Select Memory</option>
                                        <?php $hdds = [ '512 GB', '1 TB', '2 TB', '4 TB']; ?>
                                        <?php $__currentLoopData = $hdds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item); ?>"><?php echo e($item); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Mouse Pad</label>
                                    <select name="mouse_pad" id="" class="form-control select2 pc-configuration-select2">
                                        <option value="">Select </option>
                                        <?php $pads = [ 'YES', 'NO']; ?>
                                        <?php $__currentLoopData = $pads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item); ?>"><?php echo e($item); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Casing</label>
                                    <input type="text" class="form-control" name="casing">
                                </div>
                                <div class="form-group">
                                    <label>UPS</label>
                                    <select name="ups" id="" class="form-control select2 pc-configuration-select2">
                                        <option value="">Select </option>
                                        <?php $ups = [ 'YES', 'NO']; ?>
                                        <?php $__currentLoopData = $ups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item); ?>"><?php echo e($item); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app-v2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/admin/pc_configurations/create.blade.php ENDPATH**/ ?>