<!-- jQuery  -->









<!-- DASHOR App js -->

<script src="<?php echo e(asset('storage/employee/assets/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('storage/employee/shreyu-assets/assets/js/vendor.min.js')); ?>"></script>
<script src="<?php echo e(asset('storage/employee/shreyu-assets/assets/libs/quill/quill.min.js')); ?>"></script>
<!-- Init js -->
<script src="assets/js/pages/form-editor.init.js"></script>
<!--SHREYU App js -->
<script src="<?php echo e(asset('storage/employee/shreyu-assets/assets/js/app.min.js')); ?>"></script>
<script src="<?php echo e(asset('storage/employee/shreyu-assets/assets/libs/select2/js/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('storage/employee/shreyu-assets/assets/libs/flatpickr/flatpickr.min.js')); ?>"></script>
<script src="<?php echo e(asset('storage/employee/shreyu-assets/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')); ?>"></script>
<script src="<?php echo e(asset('storage/employee/shreyu-assets/assets/libs/spectrum-colorpicker2/spectrum.min.js')); ?>"></script>
<script src="<?php echo e(asset('storage/employee/assets/plugins/summernote/summernote-bs4.min.js')); ?>"></script>


<script src="<?php echo e(asset('storage/employee/assets/js/custom.js')); ?>"></script>
<script src="<?php echo e(asset('storage/employee/assets/js/tasksPage.js')); ?>"></script>
<script src="<?php echo e(asset('storage/employee/assets/js/meetingNotes.js')); ?>"></script>
<script src="<?php echo e(asset('storage/employee/assets/custom-scripts/EmployeeController.js')); ?>"></script>
<script src="<?php echo e(asset('storage/employee/assets/customJs/PcConfiguration.js')); ?>"></script>
<script src="<?php echo e(asset('storage/employee/assets/customJs/Dashboard.js')); ?>"></script>
<script src="<?php echo e(asset('storage/employee/assets/customJs/Applications.js')); ?>"></script>
<script src="<?php echo e(asset('storage/employee/assets/customJs/TaskBoard.js')); ?>"></script>

<script>
    // Launch Management Invoices Data Table
    $('#tbl-launch-invocies').DataTable();

    $('#tbl-attendance-data').DataTable();

    // Launch Management update launch_sheet on lstatus change with data-employeeId using ajax
    $(document).on('change', '.lstatus', function(){
        var lstatus = $(this).val();
        var employeeId = $(this).data('employeeid');
        var _token = $('input[name="_token"]').val();
        var date = $('input[name="date"]').val();

        console.log(lstatus, employeeId, _token, date);

        $.ajax({
            url: '/employee/launch-management/update/' + employeeId,
            method: "POST",
            data: {
                status: lstatus, 
                employeeId: employeeId, 
                date: date
            },
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            },
            success: function(data){
                if(data.status == 200){
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Status Updated Successfully',
                    });
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                    });
                }
            },
            error: function(data){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong! ' + JSON.stringify(data),
                });
            }
        });
    });
</script>
<?php
    $message    = Session::get('message');
    $alert_type = Session::get('type');
    
    if($message != null){
        echo "<script>
            $(document).ready(function() {
                var messageTxt = '$message';
                var typeTxt = '$alert_type';
                var toastMixin = Swal.mixin({
                    toast: true,
                    position: 'top-right',
                    showConfirmButton: false,
                    timer: 2500,
                    timerProgressBar: false,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });

                toastMixin.fire({
                    icon: typeTxt,
                    title: messageTxt,
                });
            });
        </script>";

        Session::forget('message');
        Session::forget('type');
    }
?>
<?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/employee/includes/scripts.blade.php ENDPATH**/ ?>