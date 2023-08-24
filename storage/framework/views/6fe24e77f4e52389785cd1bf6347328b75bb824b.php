

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="modal-title" id="departmentModalLabel">Your Current PC Configuration</h5>
                        </div>
                        <div class="col-md-6">
                            <?php if(\App\Models\ComputerConfiguration::where('employee_id', Auth::user()->id)->count() == 0): ?>
                                <div class="float-right">
                                    <a href="<?php echo e(route('employee.computer-configurations.create')); ?>"
                                        class="btn btn-sm btn-primary">Add New</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php echo $__env->make('employee.pages.pc_configurations.modals.request-pc-config', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th width="25%">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo e(asset('storage/employee/ICONS_SET/cpu.png')); ?>" width="30" alt="">
                                    <span class="text-left text-muted text-uppercase ml-2">Processor</span>
                                </div>
                            </th>
                            <td><?php echo e($pc_configuration->processor); ?></td>
                            <td>
                                <?php if($pc_configuration->processor_change_date == null): ?>
                                    <button data-bs-toggle="modal" data-bs-target="#request-pc-config-modal"
                                        class="btn btn-sm btn-primary">Request For Upgrade</button>
                                <?php else: ?>
                                    <?php echo e(date('d M, Y', strtotime($pc_configuration->processor_change_date))); ?>

                                <?php endif; ?>
                            </td>
                        </tr>   
                        <tr>
                            <th width="25%">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo e(asset('storage/employee/ICONs_SET/motherboard.png')); ?>" width="30" alt="">
                                    <span class="text-left text-muted text-uppercase ml-2">Motherboard</span>
                                </div>
                            </th>
                            <td><?php echo e($pc_configuration->motherboard); ?></td>
                            <td>
                                <?php if($pc_configuration->motherboard_change_date == null): ?>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#request-pc-config-modal"
                                        class="btn btn-sm btn-primary">Request For Upgrade</a>
                                <?php else: ?>
                                    <?php echo e(date('d M, Y', strtotime($pc_configuration->motherboard_change_date))); ?>

                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th width="25%">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo e(asset('storage/employee/ICONs_SET/ram-memory.png')); ?>" width="30" alt="">
                                    <span class="text-left text-muted text-uppercase ml-2">RAM</span>
                                </div>
                            </th>
                            <td><?php echo e($pc_configuration->ram); ?></td>
                            <td>
                                <?php if($pc_configuration->ram_change_date == null): ?>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#request-pc-config-modal"
                                        class="btn btn-sm btn-primary">Request For Upgrade</a>
                                <?php else: ?>
                                    <?php echo e(date('d M, Y', strtotime($pc_configuration->ram_change_date))); ?>

                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th width="25%">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo e(asset('storage/employee/ICONs_SET/power-supply.png')); ?>" width="30" alt="">
                                    <span class="text-left text-muted text-uppercase ml-2">Power Supply</span>
                                </div>
                            </th>
                            <td><?php echo e($pc_configuration->power_supply); ?></td>
                            <td>
                                <?php if($pc_configuration->psu_change_date == null): ?>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#request-pc-config-modal"
                                        class="btn btn-sm btn-primary">Request For Upgrade</a>
                                <?php else: ?>
                                    <?php echo e(date('d M, Y', strtotime($pc_configuration->psu_change_date))); ?>

                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th width="25%">
                                <img src="<?php echo e(asset('storage/employee/ICONs_SET/gpu.png')); ?>" width="30" alt="">
                                <span class="text-left text-muted text-uppercase ml-2">Graphics Card</span>
                            </th>
                            <td><?php echo e($pc_configuration->graphics_card); ?></td>
                            <td>
                                <?php if($pc_configuration->gpu_change_date == null): ?>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#request-pc-config-modal"
                                        class="btn btn-sm btn-primary">Request For Upgrade</a>
                                <?php else: ?>
                                    <?php echo e(date('d M, Y', strtotime($pc_configuration->gpu_change_date))); ?>

                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th width="25%">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo e(asset('storage/employee/ICONs_SET/hard-drive.png')); ?>" width="30" alt="">
                                    <span class="text-left text-muted text-uppercase ml-2">HDD</span>
                                </div>
                            </th>
                            <td><?php echo e($pc_configuration->hard_disk); ?></td>
                            <td>
                                <?php if($pc_configuration->hdd_change_date == null): ?>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#request-pc-config-modal"
                                        class="btn btn-sm btn-primary">Request For Upgrade</a>
                                <?php else: ?>
                                    <?php echo e(date('d M, Y', strtotime($pc_configuration->hdd_change_date))); ?>

                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th width="25%">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo e(asset('storage/employee/ICONs_SET/ssd.png')); ?>" width="30" alt="">
                                    <span class="text-left text-muted text-uppercase ml-2">SSD</span>
                                </div>
                            </th>
                            <td><?php echo e($pc_configuration->ssd); ?></td>
                            <td>
                                <?php if($pc_configuration->ssd_change_date == null): ?>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#request-pc-config-modal"
                                        class="btn btn-sm btn-primary">Request For Upgrade</a>
                                <?php else: ?>
                                    <?php echo e(date('d M, Y', strtotime($pc_configuration->ssd_change_date))); ?>

                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th width="25%">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo e(asset('storage/employee/ICONs_SET/keyboard.png')); ?>" width="30" alt="">
                                    <span class="text-left text-muted text-uppercase ml-2">Keyboard</span>
                                </div>
                            </th>
                            <td><?php echo e($pc_configuration->keyboard); ?></td>
                            <td>
                                <?php if($pc_configuration->keyboard_change_date == null): ?>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#request-pc-config-modal"
                                        class="btn btn-sm btn-primary">Request For Upgrade</a>
                                <?php else: ?>
                                    <?php echo e(date('d M, Y', strtotime($pc_configuration->keyboard_change_date))); ?>

                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th width="25%">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo e(asset('storage/employee/ICONs_SET/right-click.png')); ?>" width="30" alt="">
                                    <span class="text-left text-muted text-uppercase ml-2">Mouse</span>
                                </div>
                            </th>
                            <td><?php echo e($pc_configuration->mouse); ?></td>
                            <td>
                                <?php if($pc_configuration->mouse_change_date == null): ?>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#request-pc-config-modal"
                                        class="btn btn-sm btn-primary">Request For Upgrade</a>
                                <?php else: ?>
                                    <?php echo e(date('d M, Y', strtotime($pc_configuration->mouse_change_date))); ?>

                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th width="25%">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo e(asset('storage/employee/ICONs_SET/uninterrupted-power-supply.png')); ?>" width="30" alt="">
                                    <span class="text-left text-muted text-uppercase ml-2">UPS</span>
                                </div>
                            </th>
                            <td><?php echo e($pc_configuration->ups); ?></td>
                            <td>
                                <?php if($pc_configuration->processor_change_date == null): ?>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#request-pc-config-modal"
                                        class="btn btn-sm btn-primary">Request For Upgrade</a>
                                <?php else: ?>
                                    <?php echo e(date('d M, Y', strtotime($pc_configuration->ups_change_date))); ?>

                                <?php endif; ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <th width="25%">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo e(asset('storage/employee/ICONs_SET/monitor.png')); ?>" width="30" alt="">
                                    <span class="text-left text-muted text-uppercase ml-2">Monitor</span>
                                </div>
                            </th>
                            <td><?php echo e($pc_configuration->monitor); ?></td>
                            <td>
                                <?php if($pc_configuration->monitor_change_date == null): ?>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#request-pc-config-modal"
                                        class="btn btn-sm btn-primary">Request For Upgrade</a>
                                <?php else: ?>
                                    <?php echo e(date('d M, Y', strtotime($pc_configuration->monitor_change_date))); ?>

                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th width="25%">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo e(asset('storage/employee/ICONs_SET/headphones.png')); ?>" width="30" alt="">
                                    <span class="text-left text-muted text-uppercase ml-2">Headphone</span>
                                </div>
                            </th>
                            <td><?php echo e($pc_configuration->headphone); ?></td>
                            <td>
                                <?php if($pc_configuration->headphone_change_date == null): ?>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#request-pc-config-modal"
                                        class="btn btn-sm btn-primary">Request For Upgrade</a>
                                <?php else: ?>
                                    <?php echo e(date('d M, Y', strtotime($pc_configuration->headphone_change_date))); ?>

                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th width="25%">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo e(asset('storage/employee/ICONs_SET/case.png')); ?>" width="30" alt="">
                                    <span class="text-left text-muted text-uppercase ml-2">Casing</span>
                                </div>
                            </th>
                            <td><?php echo e($pc_configuration->casing); ?></td>
                            <td>
                                <?php if($pc_configuration->processor_change_date == null): ?>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#request-pc-config-modal"
                                        class="btn btn-sm btn-primary">Request For Upgrade</a>
                                <?php else: ?>
                                    <?php echo e(date('d M, Y', strtotime($pc_configuration->casing_change_date))); ?>

                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th width="25%">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo e(asset('storage/employee/ICONs_SET/mouse-pad.png')); ?>" width="30" alt="">
                                    <span class="text-left text-muted text-uppercase ml-2">Mouse Pad</span>
                                </div>
                            </th>
                            <td><?php echo e($pc_configuration->mouse_pad); ?></td>
                            <td>
                                <?php if($pc_configuration->mouse_pad_change_date == null): ?>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#request-pc-config-modal"
                                        class="btn btn-sm btn-primary">Request For Upgrade</a>
                                <?php else: ?>
                                    <?php echo e(date('d M, Y', strtotime($pc_configuration->mouse_pad_change_date))); ?>

                                <?php endif; ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('employee.layouts.shreyu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/employee/pages/pc_configurations/index.blade.php ENDPATH**/ ?>