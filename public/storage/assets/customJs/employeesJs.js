$(document).ready(function () {
    $('#employees_tbl').DataTable({
        processing: true,
        searching: false,
    });

    $('select[name="department_id"]').on('change', function (e) {
        // e.preventDefault();
        var department_id = $(this).val();
        var url = $('input[name="department_url"]').val();
        console.log(department_id);
        
        $.ajax({
            type: "POST",
            url: "/admin/employees/filter/by-department",
            headers: {
                'X-CSRF-TOKEN': $('input[name="csrf_token"]').val()
            },
            data: {
                department_id: department_id
            },
            dataType: "json",
            success: function (data) {
                console.log(data);
                if (data.status == 200) {
                    $('#employees_tbl').DataTable().destroy();
                    $('#employees_tbl tbody').empty();
                    $('#employees_tbl tbody').append(data.data);
                    $('#employees_tbl').DataTable({
                        processing: true,
                        searching: false,
                    });
                } else {
                    Swal.fire("Error!", data.responseText , "error");
                }
            },
            error: function (data) {
                Swal.fire("Error!", data.responseText , "error");
            }
        });
    });

    $('select[name="designation_id"]').on('change', function (e) {
        // e.preventDefault();
        var designation_id = $(this).val();
        var url = $('input[name="designation_url"]').val();
        console.log(designation_id);
        
        $.ajax({
            type: "POST",
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('input[name="csrf_token"]').val()
            },
            data: {
                designation_id: designation_id
            },
            dataType: "json",
            success: function (data) {
                console.log(data);
                if (data.status == 200) {
                    $('#employees_tbl').DataTable().destroy();
                    $('#employees_tbl tbody').empty();
                    $('#employees_tbl tbody').append(data.data);
                    $('#employees_tbl').DataTable({
                        processing: true,
                        searching: false,
                    });
                } else {
                    Swal.fire("Error!", data.responseText , "error");
                }
            },
            error: function (data) {
                Swal.fire("Error!", data.responseText , "error");
            }
        });
    });

    $('input[name="employee_id"]').on('keyup', function (e) {
        // e.preventDefault();
        var employee_id = $(this).val();
        var url = $('input[name="empId_url"]').val();
        console.log(employee_id);
        
        $.ajax({
            type: "POST",
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('input[name="csrf_token"]').val()
            },
            data: {
                employee_id: employee_id
            },
            dataType: "json",
            success: function (data) {
                console.log(data);
                if (data.status == 200) {
                    $('#employees_tbl').DataTable().destroy();
                    $('#employees_tbl tbody').empty();
                    $('#employees_tbl tbody').append(data.data);
                    $('#employees_tbl').DataTable({
                        processing: true,
                        searching: false,
                    });
                } else {
                    Swal.fire("Error!", data.responseText , "error");
                }
            },
            error: function (data) {
                Swal.fire("Error!", data.responseText , "error");
            }
        });
    });
});