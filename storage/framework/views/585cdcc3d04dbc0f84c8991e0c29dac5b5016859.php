<div class="modal fade" id="mdl-accessories-request-total" tabindex="-1" role="dialog" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="mdl-accessories-request-label">
                    Total Requested Accessories
                </h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                    $accessoriesList = \App\Models\AccessoriesItem::all();
                    $totalCount = [];
                    foreach ($accessoriesList as $item) {
                        $totalCount[$item->slug] = \App\Models\AccessoriesRequestItem::where('accessory_id', $item->id)->where('status', 'approved')->count();
                    }
                ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Accessories</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Keyboard</td>
                            <td><?php echo e($totalCount['keyboard']); ?></td>
                        </tr>
                        <tr>
                            <td>Mouse</td>
                            <td><?php echo e($totalCount['mouse']); ?></td>
                        </tr>
                        <tr>
                            <td>Headset</td>
                            <td><?php echo e($totalCount['headphone']); ?></td>
                        </tr>
                        <tr>
                            <td>Mouse Pad</td>
                            <td><?php echo e($totalCount['mouse-pad']); ?></td>
                        </tr>
                        <tr>
                            <td>Monitor</td>
                            <td><?php echo e($totalCount['monitor']); ?></td>
                        </tr>
                        <tr>
                            <td>UPS</td>
                            <td><?php echo e($totalCount['ups']); ?></td>
                        </tr>
                        <tr>
                            <td>Processor</td>
                            <td><?php echo e($totalCount['processor']); ?></td>
                        </tr>
                        <tr>
                            <td>Motherboard</td>
                            <td><?php echo e($totalCount['motherboard']); ?></td>
                        </tr>
                        <tr>
                            <td>RAM</td>
                            <td><?php echo e($totalCount['ram']); ?></td>
                        </tr>
                        <tr>
                            <td>PSU</td>
                            <td><?php echo e($totalCount['psu']); ?></td>
                        </tr>
                        <tr>
                            <td>GPU</td>
                            <td><?php echo e($totalCount['gpu']); ?></td>
                        </tr>
                        <tr>
                            <td>HDD</td>
                            <td><?php echo e($totalCount['hdd']); ?></td>
                        </tr>
                        <tr>
                            <td>SSD</td>
                            <td><?php echo e($totalCount['ssd']); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/admin/pc_configurations/modals/emp-accessories-request.blade.php ENDPATH**/ ?>