// Policy Edit Script
$(document).ready(function () {
    $("#half-day-absent-rule").on("change", function () {
        if ($(this).val() == "1") {
            $("#half-day-absent-rule-value-type").value = "1";
        } else {
            $("#half-day-absent-rule-value-type").value = "2";
        }
    });
});



$(document).on("click", ".js-sweetalert", function (e) {
    e.preventDefault();
    var type = $(this).data("type");
    var element_id = $(this).data("element-id");
    var search_obj = "input[class='" + element_id + "']";
    var input_hidden_value = $(search_obj).val();

    Swal.fire({
        title: "Do you want to save the changes ? ",
        showDenyButton: true,
        confirmButtonText: "Yes, Delete it!",
        denyButtonText: `Don't Delete`,
    }).then((result) => {
        if (result.isConfirmed) {
            var url = `{{URL::route('departments.destroy', ${input_hidden_value})}}`;
            console.log(url);
            $.ajax({
                type: "GET",
                url: `{{URL::route('departments.destroy', ${input_hidden_value})}}`,
                dataType: "json",
                headers: {
                    "X-CSRF-Token": "{{ csrf_token() }}",
                },
                success: function (data) {
                    console.log(data);
                    if (data.status == "success") {
                        Swal.fire("Deleted!", "", "success");
                        location.reload();
                    } else {
                        Swal.fire("Error!", "", "error");
                    }
                },
            });
        } else if (result.isDenied) {
            Swal.fire("Changes are not saved", "", "info");
        }
    });
});

// toggle all select box as granted on checkbox state change
$(document).on("change", "#checkbox-toggle-all", function (e) {
    e.preventDefault();
    // get all select box and toggle their state as granted in fr-permission-create form
    var select_box = document.querySelectorAll(
        "#fr-permission-create .column-info select"
    );
    if (this.checked) {
        select_box.forEach(function (element) {
            element.value = "1";
        });
    } else {
        select_box.forEach(function (element) {
            element.value = "0";
        });
    }
});

$(document).ready(function () {
    $("#administrative_users_tbl").DataTable({
        processing: true,
    });

    
});

$(function () {
    $(".dropify").dropify();
    var drEvent = $("#dropify-event").dropify();
    drEvent.on("dropify.beforeClear", function (event, element) {
        return confirm(
            'Do you really want to delete "' + element.file.name + '" ?'
        );
    });
    drEvent.on("dropify.afterClear", function (event, element) {
        alert("File deleted");
    });
    $(".dropify-fr").dropify({
        messages: {
            default: "Glissez-dÃ©posez un fichier ici ou cliquez",
            replace: "Glissez-dÃ©posez un fichier ou cliquez pour remplacer",
            remove: "Supprimer",
            error: "DÃ©solÃ©, le fichier trop volumineux",
        },
    });
});

$(document).ready(function () {
    // auto generate password on btn click
    $("#btn-password-generate").on("click", function () {
        var password = generatePassword();
        $("#password").val(password);
        $("#password-confirm").val(password);
    });

    // show hide password on btn checkbox toggle
    $("#chk-password-visibility").on("change", function () {
        if (this.checked) {
            $("#password").attr("type", "text");
            $("#password-confirm").attr("type", "text");
        } else {
            $("#password").attr("type", "password");
            $("#password-confirm").attr("type", "password");
        }
    });
});

// generate password
function generatePassword() {
    var length = 8,charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789", retVal = "";
    for (var i = 0, n = charset.length; i < length; ++i) {
        retVal += charset.charAt(Math.floor(Math.random() * n));
    }
    return retVal;
}

