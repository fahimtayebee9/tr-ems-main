<div class="modal fade" id="md-upload-employees-bulk" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="md-upload-employees-bulkLabel">Import Data</h4>
            </div>
            <form action="<?php echo e(route('admin.employees.import.bulk')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-body text-dark">
                    <div class="form-group">
                        <label for="marketplace">Upload Bulk Accounts</label>
                        <input type="file" class="dropify form-control" required name="bulk_data">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">UPLOAD</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/admin/includes/modals/md-bulk-import-employees.blade.php ENDPATH**/ ?>