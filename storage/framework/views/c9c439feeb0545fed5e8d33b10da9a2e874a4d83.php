

<?php $__env->startSection("body"); ?>

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
            <div class="card-body">
                <?php if(!empty($list_of_configurations)): ?>
                <div class="table-responsive">
                    <table class="table table-hover m-b-0">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Employee</th>
                                <th class="text-center">Last Changed Date</th>
                                <th class="text-center">Last Updated</th>
                                
                                <th class="text-center" width="160">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $list_of_configurations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sheet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-center"><?php echo e($loop->iteration); ?></td>
                                    <td class="text-left">
                                        <?php echo e($sheet->employee->user->first_name . " " . $sheet->employee->user->last_name); ?>

                                        <span class="d-block text-small">
                                            <?php echo e($sheet->employee->user->username); ?>

                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <?php    
                                            $parts_list = [
                                                'processor', 'motherboard', 'ram', 'psu', 'gpu', 'hdd', 'ssd', 'keyboard', 'mouse', 'ups', 'monitor', 'headphone', 'casing', 'mouse_pad'
                                            ];
                                            // generate column name dynamically using array $parts_list
                                            $change_dates_list = [];
                                            foreach($parts_list as $part) {
                                                if(!empty($sheet->$part)) {
                                                    $column_name = $part . "_change_date";
                                                    $change_dates_list[] = [
                                                        'part' => $part,
                                                        'date' => $sheet->$column_name
                                                    ];
                                                }
                                            }
                                            // sort the array by date
                                            usort($change_dates_list, function($a, $b) {
                                                return $a['date'] <=> $b['date'];
                                            });
                                            // get the first element of the array
                                            $last_change_date = end($change_dates_list);
                                        ?>
                                        <?php echo e(date('d M, Y', strtotime($last_change_date['date']))); ?> 
                                    </td>
                                    <td class="text-center">
                                        <?php echo e(strtoupper($last_change_date['part'])); ?>

                                    </td>
                                    
                                    <td class="text-center">
                                        <a href="" type="button" data-target="#mdl-configuration-<?php echo e($sheet->id); ?>" data-toggle="modal" class="btn btn-sm btn-primary">
                                            <i class="fa fa-eye"></i> Configuration
                                        </a>

                                        <?php echo $__env->make('admin.pc_configurations.modals.emp-configurations', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <?php else: ?> 
                    <div class="alert alert-info">No Salary Sheets Found</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.layouts.app-v2", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/admin/pc_configurations/index.blade.php ENDPATH**/ ?>