<!-- jQuery  -->
{{-- 
<script src="{{ asset('storage/employee/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('storage/employee/assets/js/modernizr.min.js') }}"></script>
<script src="{{ asset('storage/employee/assets/js/detect.js') }}"></script>
<script src="{{ asset('storage/employee/assets/js/fastclick.js') }}"></script>
<script src="{{ asset('storage/employee/assets/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('storage/employee/assets/js/jquery.blockUI.js') }}"></script>
<script src="{{ asset('storage/employee/assets/js/waves.js') }}"></script>
<script src="{{ asset('storage/employee/assets/js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('storage/employee/assets/js/jquery.scrollTo.min.js') }}"></script> --}}

{{-- <script src="{{ asset('storage/employee/assets/plugins/datatables/jquery.datatables.min.js') }}"></script>
<script src="{{ asset('storage/employee/assets/plugins/datatables/datatables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('storage/employee/assets/plugins/datatables/datatables.responsive.min.js') }}"></script>
<script src="{{ asset('storage/employee/assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('storage/employee/assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script> --}}

{{-- <script src="{{ asset('storage/employee/assets/plugins/metro/MetroJs.min.js') }}"></script>
<script src="{{ asset('storage/employee/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('storage/employee/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('storage/employee/assets/plugins/sparkline-chart/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('storage/employee/assets/plugins/morris/morris.min.js') }}"></script>
<script src="{{ asset('storage/employee/assets/plugins/raphael/raphael-min.js') }}"></script>
<script src="{{ asset('storage/employee/assets/pages/dashboard.js') }}"></script> --}}
{{-- <script src="{{ asset('storage/assets/bundles/sweetalert2@11.js') }}"></script> --}}
{{-- <script src="{{ asset('storage/employee/assets/plugins/select2/select2.min.js') }}"></script> --}}
{{-- <script src="{{ asset('storage/employee/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script> --}}

<!-- DASHOR App js -->
{{-- <script src="{{ asset('storage/employee/assets/js/app.js') }}"></script> --}}
<script src="{{ asset('storage/employee/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('storage/employee/shreyu-assets/assets/js/vendor.min.js') }}"></script>
<script src="{{ asset('storage/employee/shreyu-assets/assets/libs/quill/quill.min.js') }}"></script>
<!-- Init js -->
<script src="assets/js/pages/form-editor.init.js"></script>
<!--SHREYU App js -->
<script src="{{ asset('storage/employee/shreyu-assets/assets/js/app.min.js') }}"></script>
<script src="{{ asset('storage/employee/shreyu-assets/assets/libs/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('storage/employee/shreyu-assets/assets/libs/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('storage/employee/shreyu-assets/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
<script src="{{ asset('storage/employee/shreyu-assets/assets/libs/spectrum-colorpicker2/spectrum.min.js') }}"></script>
<script src="{{ asset('storage/employee/assets/plugins/summernote/summernote-bs4.min.js') }}"></script>

{{-- CUSTOM CSS --}}
<script src="{{ asset('storage/employee/assets/js/custom.js') }}"></script>
<script src="{{ asset('storage/employee/assets/js/tasksPage.js') }}"></script>
<script src="{{ asset('storage/employee/assets/js/meetingNotes.js') }}"></script>
<script src="{{ asset('storage/employee/assets/custom-scripts/EmployeeController.js') }}"></script>
<script src="{{ asset('storage/employee/assets/customJs/PcConfiguration.js') }}"></script>
<script src="{{ asset('storage/employee/assets/customJs/Dashboard.js') }}"></script>
<script src="{{ asset('storage/employee/assets/customJs/Applications.js') }}"></script>
<script src="{{ asset('storage/employee/assets/customJs/TaskBoard.js') }}"></script>

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
@php
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
@endphp
