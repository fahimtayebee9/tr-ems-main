<div class="modal fade" id="mdl-provider-add" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="mdl-provider-addLabel">Edit Launch Provider Details</h4>
            </div>
            <form action="<?php echo e(route('admin.launch-sheet.provider.store')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-body text-dark">
                    <div class="row p-0">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="client-name">Name</label>
                                <input type="text" class="form-control" id="client-name" name="name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="client-name">Email</label>
                                <input type="text" class="form-control" id="client-name" name="email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="client-name">Phone</label>
                                <input type="text" class="form-control" id="client-name" name="phone">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="client-name">Address</label>
                                <input type="text" class="form-control" id="client-name" name="address">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="client-name">Unit Price</label>
                                <input type="number" class="form-control" id="client-name" name="unit_price">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="client-name">Vehicle Rent</label>
                                <input type="number" class="form-control" id="client-name" name="vehicle_cost">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="status" class="d-block">Status</label>
                                <select class="form-control custom-select select2-hidden-accessible" name="status" id="cacc-status">
                                    <option>Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="2">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="client-name">Contact Person Name</label>
                                <input type="text" class="form-control" id="client-name" name="contact_person" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="client-name">Contact Person Phone</label>
                                <input type="text" class="form-control" id="client-name" name="contact_person_phone">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" style="margin-right: 10px!important;">SAVE</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                </div>
            </form>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/admin/includes/modals/providers/mdl-provider-add.blade.php ENDPATH**/ ?>