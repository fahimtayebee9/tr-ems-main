$(document).ready(function () {
    var toastMixin = Swal.mixin({
        toast: true,
        icon: 'success',
        title: 'General Title',
        animation: false,
        position: 'top-right',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });

    $('#chk-add-bank-info').change(function () {
        if ($(this).is(":checked")) {
            $('#row-bank-details').removeClass('d-none');
        } else {
            $('#row-bank-details').addClass('d-none');
        }
    });

    $('#launch_sheet_table').DataTable({
        "order": [[0, "desc"]],
        "pageLength": 50,
    });

    // on pcy-btn click show closest pcy-edit-{id} div and hide pcy-view-{id} div
    $('.pcy-btn').each(function (btn) {
        $(this).click(function () {           
            $(this).parent().removeClass('d-block').addClass('d-none');
            $(this).parent().next('div[class^="pcy-edit-"]').removeClass('d-none').addClass('d-block');
        });
    });

    $('#lar_submit').click(function (e) {
        e.preventDefault();
        var new_rule = $('#late_attendance_rule').val();
        var csrf_token = $('input[name="_token"]').val();

        var submti_btn = $(this);
        console.log($(this).closest('div[class^="pcy-edit-"]').prev('div[class^="pcy-view-"]'));

        $.ajax({
            url: '/admin/company-policy/update/attendance-rule',
            type: 'POST',
            data: {
                new_rule: new_rule
            },
            headers: {
                'X-CSRF-TOKEN': csrf_token
            },
            success: function (data) {
                if (data.success == true) {
                    toastMixin.fire({
                        animation: true,
                        title: data.message,
                    });
                    $(submti_btn).closest('div[class^="pcy-edit-"]').removeClass('d-block').addClass('d-none');
                    $(submti_btn).closest('div[class^="pcy-edit-"]').prev('div[class^="pcy-view-"]').removeClass('d-none').addClass('d-block');
                    location.reload();
                } else {
                    $('#late_attendance_rule').val('');
                    $('#late_attendance_rule').attr('placeholder', 'Error Adding New Rule');
                }
            },
            error: function (data) {
                $('#late_attendance_rule').val('');
                $('#late_attendance_rule').attr('placeholder', 'Error Adding New Rule');
            }
        });
    });

    $('#hdar_submit').click(function (e) {
        e.preventDefault();
        var new_rule = $('#half_day_absent_rule').val();
        var new_rule_value = $('#half_day_absent_rule_value').val();
        var csrf_token = $('input[name="_token"]').val();

        var submti_btn = $(this);

        $.ajax({
            url: '/admin/company-policy/update/hdar',
            type: 'POST',
            data: {
                new_rule: new_rule,
                new_rule_value: new_rule_value
            },
            headers: {
                'X-CSRF-TOKEN': csrf_token
            },
            success: function (data) {
                if (data.success == true) {
                    toastMixin.fire({
                        animation: true,
                        title: data.message,
                    });
                    $(submti_btn).closest('div[class^="pcy-edit-"]').removeClass('d-block').addClass('d-none');
                    $(submti_btn).closest('div[class^="pcy-edit-"]').prev('div[class^="pcy-view-"]').removeClass('d-none').addClass('d-block');
                    location.reload();
                } else {
                    toastMixin.fire({
                        animation: true,
                        title: "Error! There was an error updating the rule.",
                    });
                }
            },
            error: function (data) {
                toastMixin.fire({
                    animation: true,
                    title: "Error! There was an error updating the rule.",
                });
            }
        });
    });

    $('#fdar_submit').click(function (e) {
        e.preventDefault();
        var new_rule = $('#full_day_absent_rule').val();
        var new_rule_value = $('#full_day_absent_rule_value').val();
        var csrf_token = $('input[name="_token"]').val();

        var submti_btn = $(this);

        $.ajax({
            url: '/admin/company-policy/update/fdar',
            type: 'POST',
            data: {
                new_rule: new_rule,
                new_rule_value: new_rule_value
            },
            headers: {
                'X-CSRF-TOKEN': csrf_token
            },
            success: function (data) {
                if (data.success == true) {
                    toastMixin.fire({
                        animation: true,
                        title: data.message,
                    });
                    $(submti_btn).closest('div[class^="pcy-edit-"]').removeClass('d-block').addClass('d-none');
                    $(submti_btn).closest('div[class^="pcy-edit-"]').prev('div[class^="pcy-view-"]').removeClass('d-none').addClass('d-block');
                    location.reload();
                } else {
                    toastMixin.fire({
                        animation: true,
                        title: "Error! There was an error updating the rule.",
                    });
                }
            },
            error: function (data) {
                toastMixin.fire({
                    animation: true,
                    title: "Error! There was an error updating the rule.",
                });
            }
        });
    });

    $('#pdlr_submit').click(function (e) {
        e.preventDefault();
        var new_rule = $('#paid_leave_rule').val();
        var csrf_token = $('input[name="_token"]').val();

        var submti_btn = $(this);
        console.log($(this).closest('div[class^="pcy-edit-"]').prev('div[class^="pcy-view-"]'));

        $.ajax({
            url: '/admin/company-policy/update/pdlr',
            type: 'POST',
            data: {
                new_rule: new_rule
            },
            headers: {
                'X-CSRF-TOKEN': csrf_token
            },
            success: function (data) {
                if (data.success == true) {
                    toastMixin.fire({
                        animation: true,
                        title: data.message,
                    });
                    $(submti_btn).closest('div[class^="pcy-edit-"]').removeClass('d-block').addClass('d-none');
                    $(submti_btn).closest('div[class^="pcy-edit-"]').prev('div[class^="pcy-view-"]').removeClass('d-none').addClass('d-block');
                    location.reload();
                } else {
                    $('#late_attendance_rule').val('');
                    $('#late_attendance_rule').attr('placeholder', 'Error Adding New Rule');
                }
            },
            error: function (data) {
                $('#late_attendance_rule').val('');
                $('#late_attendance_rule').attr('placeholder', 'Error Adding New Rule');
            }
        });
    });
    
});