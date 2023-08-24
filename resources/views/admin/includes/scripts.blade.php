<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
{{-- <script src="{{ asset('storage/assets-v2/js/jquery-3.6.0.min.js') }}"></script> --}}
<script src="{{ asset('storage/assets/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('storage/assets-v2/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('storage/assets-v2/js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('storage/assets-v2/plugins/morris/morris.min.js') }}"></script>
<script src="{{ asset('storage/assets-v2/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('storage/assets-v2/js/chart.js') }}"></script>
<script src="{{ asset('storage/assets-v2/js/task.js') }}"></script>
<script src="{{ asset('storage/assets-v2/js/greedynav.js') }}"></script>
<script src="{{ asset('storage/assets-v2/js/layout.js') }}"></script>
<script src="{{ asset('storage/assets-v2/js/theme-settings.js') }}"></script>
<script src="{{ asset('storage/assets-v2/js/app.js') }}"></script>

<script src="{{ asset('storage/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('storage/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('storage/assets/js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('storage/assets/plugins/morris/morris.min.js') }}"></script>
<script src="{{ asset('storage/assets/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('storage/assets/js/chart.js') }}"></script>
<script src="{{ asset('storage/assets/bundles/apexcharts.bundle.js') }}"></script>
<script src="{{ asset('storage/assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('storage/assets/bundles/chartist.bundle.js') }}"></script>
<script src="{{ asset('storage/assets/vendor/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('storage/assets/bundles/sweetalert2@11.js') }}"></script>
<script src="{{ asset('storage/assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('storage/employee/assets/plugins/select2/select2.min.js') }}"></script>
<script src="{{ asset('storage/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('storage/employee/assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('storage/assets/bundles/datatablescripts.bundle.js') }}"></script>
<script src="{{ asset('storage/assets/vendor/dropify/js/dropify.min.js') }}"></script>
<script src="{{ asset('storage/default/peity_chart.js') }}"></script>
<script src="{{ asset('storage/assets/bundles/c3.bundle.js')}}"></script>

<script src="{{ asset('storage/assets/bundles/custom.js') }}"></script>
<script src="{{ asset('storage/assets/bundles/dashboard.js') }}"></script>
<script src="{{ asset('storage/assets/customJs/dailySales.js') }}"></script>
<script src="{{ asset('storage/assets/customJs/invoicePage.js') }}"></script>
<script src="{{ asset('storage/assets/customJs/reportController.js') }}"></script>
<script src="{{ asset('storage/assets/customJs/employeesJs.js') }}"></script>
<script src="{{ asset('storage/assets/customJs/leaveApplications.js') }}"></script>
<script src="{{ asset('storage/assets/customJs/administration.js') }}"></script>
<script src="{{ asset('storage/assets/customJs/noticeBoard.js') }}"></script>
<script src="{{ asset('storage/assets/customJs/pcConfiguration.js')}}"></script>

<script>
    $(document).ready(function () {
    // auto generate username in format 1612001 on btn-generate-username click
    $("#btn-generate-username").on("click", function () {
        var username = generateUsername();
        $("#username").val(username);
    });
    
    function generateUsername() {
        // get last username from users table in database with ajax request
        var last_username = "";
        var new_username = "";
        var ajaxReq = $.ajax({
            type: "GET",
            url: "/admin/administration/users/lastUserName",
            dataType: "json",
            headers: {
                "X-CSRF-Token": "{{ csrf_token() }}",
            },
            enctype: 'multipart/form-data',
            processData: false,
            async: false,
            global: false,
            success: function (data) {
                console.log("IN :: " + data['username']);
                last_username = data['username'];
            }
        });

        console.log("OUT :: " + last_username);

        if (!last_username) {
            new_username = "1612000";
        } else {
            new_username = parseInt(last_username) + 1;
        }
        
        console.log("N :: " + new_username);

        return new_username;
    }

    
});
</script>

{{-- trigger sweetalert2 if session has message and alert-type --}}
@if (session()->has('message') && session()->has('alert-type'))
    <script>
        Swal.fire({
            title: "",
            icon: "{{ session()->get('alert-type') }}",
            showConfirmButton: true,
        });
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
            icon: "{{ session()->get('alert-type') }}",
            title: "{{ session()->get('message') }}",
        });
    </script>
@endif
