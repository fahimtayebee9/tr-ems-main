<div class="modal fade" id="mdl-generate-all-weekly" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="mdl-generate-all-weeklyLabel">All Weekly Report</h4>
            </div>
            <form action="<?php echo e(route('admin.reports.custom-weekly-report.generateAll')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-body text-dark text-left">
                    <div class="form-group">
                        <label for="marketplace" class="d-block">What is the Last Date?</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-calendar"></i></span>
                            </div>
                            <input type="text" name="last_ending_date" class="form-control date" placeholder="Ex: 30/07/2016">
                        </div>
                        <div class="form-group">
                            <label for="client_account">Client Account</label>
                            <select name="client_account" id="client_account" class="form-control">
                                <option value="">Select Client Account</option>
                                <?php $__currentLoopData = $clientAccountList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client_account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $marketplace = ($client_account->marketplace == 1) ? 'US' : 
                                            (($client_account->marketplace == 2) ? 'CA' : 'Walmart');
                                    ?>
                                    <option value="<?php echo e($client_account->id); ?>">
                                        <?php echo e($client_account->account_name); ?> [<?php echo e($marketplace); ?>]
                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="report_type" value="weekly">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">DOWNLOAD</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                </div>
            </form>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/admin/weekly-reports/modals/mdl-generate-all-weekly.blade.php ENDPATH**/ ?>