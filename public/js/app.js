$(document).ready(function () {
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    const inputDate = $('.datetimepicker');
    const summernote = $('.summernote');

    if (inputDate) {
        inputDate.datetimepicker({ format: 'DD/MM/YYYY HH:MM' });
        inputDate.on('keydown', () => { return false; });
    }

    if (summernote)
        summernote.summernote();

    $('#logoff').on('click', function () {
        document.getElementById('logoutForm').submit();
        localStorage.removeItem('name');
        localStorage.removeItem('email');
    });

    $.getJSON("/api/notifications", function (notifications) {
        $(".js-notifications-count")
            .text(notifications.length)
            .removeClass("hide")
            .addClass("animated bounceInDown");

        $(".notifications").popover({
            html: true,
            title: "Notifications",
            content: function () {
                var complied = _.template($("#notifications-template").html());
                return complied({ notifications: notifications });
            },
            placement: "bottom",
            template: '<div class="popover popover-notifications" role="tooltip"><div class="arrow"></div><h2 class="popover-title"></h2><div class="popover-content"></div></div>'
        }).on('shown.bs.popover', function () {
            $.post("/api/notifications/markAsRead")
                .done(function () {
                    $(".js-notifications-count").text("").addClass("hide");
                })
        });
    });
})
