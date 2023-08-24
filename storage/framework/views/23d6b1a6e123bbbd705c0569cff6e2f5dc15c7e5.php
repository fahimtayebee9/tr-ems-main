<div class="modal fade" id="download-multiple-account-modal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="edit-weekly-sales-rowLabel">Choose Account To Download Combined Report</h4>
            </div>
            <form action="<?php echo e(route('admin.reports.custom-weekly-report.view.combined.pdf')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-body text-dark text-left">
                    <div class="form-group">
                        
                        <label for="accounts" class="d-block">Choose Accounts</label>
                        <select class="form-control" name="accounts[]" id="download-multiple-report-accounts" multiple>
                            <?php $__currentLoopData = \App\Models\WeeklyReport::distinct()->get(['caccount_id']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $marketplace = ($report->clientAccount->marketplace == 1) ? 'US' : (($report->clientAccount->marketplace == 2) ? 'CA' : 'Walmart');
                                ?>
                                <option value="<?php echo e($report->clientAccount->id); ?>"><?php echo e($report->clientAccount->account_name); ?> [<?php echo e($marketplace); ?>]</option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="marketplace" class="d-block">Do you want to generate Meeting Notes?</label>
                        <select name="insert_meeting_notes" id="ins_meeting_notes" class="form-control">
                            <option value="">Select Option</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">SAVE CHANGES</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                </div>
            </form>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/admin/weekly-reports/modals/mdl-download-report-multiple.blade.php ENDPATH**/ ?>