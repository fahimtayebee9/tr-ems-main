<div class="modal fade" id="mdl-configuration-<?php echo e($sheet->id); ?>" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="mdl-configuration-<?php echo e($sheet->id); ?>-label">Pc Configuration for <?php echo e($sheet->employee->user->first_name . " " . $sheet->employee->user->last_name); ?></h4>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tr>
                        <th width="25%">
                            <div class="d-flex align-items-center">
                                <img src="<?php echo e(asset('storage/employee/ICONS_SET/cpu.png')); ?>" width="30" alt="">
                                <span class="text-left text-muted text-uppercase ml-2">Processor</span>
                            </div>
                        </th>
                        <td><?php echo e($sheet->processor); ?></td>
                    </tr>   
                    <tr>
                        <th width="25%">
                            <div class="d-flex align-items-center">
                                <img src="<?php echo e(asset('storage/employee/ICONs_SET/motherboard.png')); ?>" width="30" alt="">
                                <span class="text-left text-muted text-uppercase ml-2">Motherboard</span>
                            </div>
                        </th>
                        <td><?php echo e($sheet->motherboard); ?></td>
                    </tr>
                    <tr>
                        <th width="25%">
                            <div class="d-flex align-items-center">
                                <img src="<?php echo e(asset('storage/employee/ICONs_SET/ram-memory.png')); ?>" width="30" alt="">
                                <span class="text-left text-muted text-uppercase ml-2">RAM</span>
                            </div>
                        </th>
                        <td><?php echo e($sheet->ram); ?></td>
                    </tr>
                    <tr>
                        <th width="25%">
                            <div class="d-flex align-items-center">
                                <img src="<?php echo e(asset('storage/employee/ICONs_SET/power-supply.png')); ?>" width="30" alt="">
                                <span class="text-left text-muted text-uppercase ml-2">Power Supply</span>
                            </div>
                        </th>
                        <td><?php echo e($sheet->power_supply); ?></td>
                    </tr>
                    <tr>
                        <th width="25%">
                            <img src="<?php echo e(asset('storage/employee/ICONs_SET/gpu.png')); ?>" width="30" alt="">
                            <span class="text-left text-muted text-uppercase ml-2">Graphics Card</span>
                        </th>
                        <td><?php echo e($sheet->graphics_card); ?></td>
                    </tr>
                    <tr>
                        <th width="25%">
                            <div class="d-flex align-items-center">
                                <img src="<?php echo e(asset('storage/employee/ICONs_SET/hard-drive.png')); ?>" width="30" alt="">
                                <span class="text-left text-muted text-uppercase ml-2">HDD</span>
                            </div>
                        </th>
                        <td><?php echo e($sheet->hard_disk); ?></td>
                    </tr>
                    <tr>
                        <th width="25%">
                            <div class="d-flex align-items-center">
                                <img src="<?php echo e(asset('storage/employee/ICONs_SET/ssd.png')); ?>" width="30" alt="">
                                <span class="text-left text-muted text-uppercase ml-2">SSD</span>
                            </div>
                        </th>
                        <td><?php echo e($sheet->ssd); ?></td>
                    </tr>
                    <tr>
                        <th width="25%">
                            <div class="d-flex align-items-center">
                                <img src="<?php echo e(asset('storage/employee/ICONs_SET/keyboard.png')); ?>" width="30" alt="">
                                <span class="text-left text-muted text-uppercase ml-2">Keyboard</span>
                            </div>
                        </th>
                        <td><?php echo e($sheet->keyboard); ?></td>
                    </tr>
                    <tr>
                        <th width="25%">
                            <div class="d-flex align-items-center">
                                <img src="<?php echo e(asset('storage/employee/ICONs_SET/right-click.png')); ?>" width="30" alt="">
                                <span class="text-left text-muted text-uppercase ml-2">Mouse</span>
                            </div>
                        </th>
                        <td><?php echo e($sheet->mouse); ?></td>
                    </tr>
                    <tr>
                        <th width="25%">
                            <div class="d-flex align-items-center">
                                <img src="<?php echo e(asset('storage/employee/ICONs_SET/uninterrupted-power-supply.png')); ?>" width="30" alt="">
                                <span class="text-left text-muted text-uppercase ml-2">UPS</span>
                            </div>
                        </th>
                        <td><?php echo e($sheet->processor); ?></td>
                    </tr>
                    
                    <tr>
                        <th width="25%">
                            <div class="d-flex align-items-center">
                                <img src="<?php echo e(asset('storage/employee/ICONs_SET/monitor.png')); ?>" width="30" alt="">
                                <span class="text-left text-muted text-uppercase ml-2">Monitor</span>
                            </div>
                        </th>
                        <td><?php echo e($sheet->monitor); ?></td>
                    </tr>
                    <tr>
                        <th width="25%">
                            <div class="d-flex align-items-center">
                                <img src="<?php echo e(asset('storage/employee/ICONs_SET/headphones.png')); ?>" width="30" alt="">
                                <span class="text-left text-muted text-uppercase ml-2">Headphone</span>
                            </div>
                        </th>
                        <td><?php echo e($sheet->mouse_pad); ?></td>
                    </tr>
                    <tr>
                        <th width="25%">
                            <div class="d-flex align-items-center">
                                <img src="<?php echo e(asset('storage/employee/ICONs_SET/case.png')); ?>" width="30" alt="">
                                <span class="text-left text-muted text-uppercase ml-2">Casing</span>
                            </div>
                        </th>
                        <td><?php echo e($sheet->mouse_pad); ?></td>
                    </tr>
                    <tr>
                        <th width="25%">
                            <div class="d-flex align-items-center">
                                <img src="<?php echo e(asset('storage/employee/ICONs_SET/mouse-pad.png')); ?>" width="30" alt="">
                                <span class="text-left text-muted text-uppercase ml-2">Mouse Pad</span>
                            </div>
                        </th>
                        <td><?php echo e($sheet->mouse_pad); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/admin/pc_configurations/modals/emp-configurations.blade.php ENDPATH**/ ?>