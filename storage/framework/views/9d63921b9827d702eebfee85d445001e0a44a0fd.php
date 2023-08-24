<div class="modal fade" id="mdl-add-bulk-account" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="mdl-add-bulk-accountLabel">Add Account</h4>
            </div>
            <form action="<?php echo e(route('admin.client-accounts.import.bulk-accounts')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-body text-dark">
                    <div class="form-group">
                        
                        <label for="marketplace">Upload Bulk Accounts</label>
                        <input type="file" class="dropify" required name="bulk_accounts">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">SAVE CHANGES</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/admin/includes/modals/md-bulk-import-client-accounts.blade.php ENDPATH**/ ?>