<div class="modal fade" id="mdl-add-single-account" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="mdl-add-single-accountLabel">Add Account</h4>
            </div>
            <form action="<?php echo e(route('admin.client-accounts.store')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-body text-dark">
                    <div class="form-group">
                        <label for="client-name">Client Name</label>
                        <input type="text" class="form-control" id="client-name" name="account_name" placeholder="Enter Client Name">
                    </div>
                    <div class="form-group">
                        
                        <label for="marketplace">Marketplace</label>
                        <select class="form-control custom-select select2-hidden-accessible" name="marketplace" id="cacc-marketplace">
                            <option>Select Marketplace</option>
                            <option value="1">Amazon</option>
                            <option value="3">Walmart</option>
                        </select>
                    </div>
                    <div class="form-group">
                        
                        <label for="status">Status</label>
                        <select class="form-control custom-select select2-hidden-accessible" name="status" id="cacc-status">
                            <option>Select Status</option>
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">SAVE CHANGES</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                </div>
            </form>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/admin/includes/modals/md-add-client-account.blade.php ENDPATH**/ ?>