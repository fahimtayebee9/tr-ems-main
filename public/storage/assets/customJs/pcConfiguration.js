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

    // TABLE ROW EXPANDER
    $(".exploder").click(function () {
        $(this).toggleClass("btn-primary btn-danger");
        $(this).children("i").toggleClass("fa-eye fa-eye-slash");
        if ($(this).children("span").text() == "View") {
            $(this).children("span").text("Hide");
        }
        else {
            $(this).children("span").text("View");
        }

        $(this).closest("tr").next("tr").toggleClass("hide");
        if ($(this).closest("tr").next("tr").hasClass("hide")) {
            $(this).closest("tr").next("tr").children("td").slideUp(250);
        }
        else {
            $(this).closest("tr").next("tr").children("td").slideDown(250);
        }
    });

    $(".rqst-item-object-tbody select[name='acc-item-request-status']").each(function (item) {
        $(this).change(function () {
            var status = $(this).val();
            var id = $(this).attr("data-rid");
            var url = $(this).attr("data-url");
            var csrf_token = $(this).attr("data-csrf");
            
            var data = {
                "status": status,
                "request_id": id
            };
            $.ajax({
                type: "POST",
                url: '/admin/computer-configurations/requests/update',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': csrf_token
                },
                success: function (data) {
                    if (data.status == 200) {
                        toastMixin.fire({
                            animation: true,
                            title: data.message,
                            icon: data.icon,
                        });
                    }
                    else {
                        toastMixin.fire({
                            animation: true,
                            title: data.message,
                            icon: data.icon,
                        });
                    }
                }
            });
        });
    });
});