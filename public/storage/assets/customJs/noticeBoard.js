$(document).ready(function () {
    $("#tbl-notice-board").DataTable({
        processing: true,
        serverSide: false,
        searching: false,
    });

    // summer note
    $('#notice-description').summernote({
        height: 200,
        placeholder: 'Write your notice here...',
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['fontsize', ['fontsize']],
        ],
    });

    $('#nt-status').select2({
        placeholder: 'Select Status',
        allowClear: true,
        width: '100%',
        minimumResultsForSearch: Infinity,
    });

    $('#publish-date').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
    });

    $('#expiry-date').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
    });

    $(document).on('click', '.btn-dlt-notice', function (e) {
        e.preventDefault();
        let noticeId = $(this).attr('data-noticeId');
        let url = $(this).attr('data-url');

        Swal.fire({
            title: 'Are you sure?',
            text: "You want to delete this notice!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#dc3545',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $(`input[data-noticeId="${noticeId}"]`).val(),
                    }
                });
                $.ajax({
                    url: url,
                    type: 'post',
                    data: {
                        noticeId: noticeId,
                    },
                    success: function (response) {
                        console.log(response);
                        if (response.code == 200) {
                            Swal.fire({
                                title: 'Deleted!',
                                text: 'Notice has been deleted.',
                                icon: 'success',
                                confirmButtonColor: '#28a745',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        } else {
                            Swal.fire({
                                title: 'Failed!',
                                text: 'Notice has not been deleted. Please try again.',
                                icon: 'error',
                                confirmButtonColor: '#28a745',
                            });
                        }
                    },
                    error: function (error) {
                        Swal.fire({
                            title: 'Failed!',
                            text: 'Notice has not been deleted.' + error,
                            icon: 'error',
                            confirmButtonColor: '#28a745',
                        });
                    }
                });
            }
        });
    });
});