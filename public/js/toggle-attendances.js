
var AttendanceController = function () {
    var button;
    var init = function () {
        $('.js-toggle-attendance').click(attendancesToggle);
    };
    var attendancesToggle = function (e) {
        e.preventDefault();
        button = $(e.target);
        $.post("/api/attendances", { gigId: button.attr("data-gig-id") })
            .done(done)
            .fail(failed);
    };
    var failed = function () {
        toastr.error(res.responseJSON.Message);
    };
    var done = function (res) {
        var text = (button.text() == "Going") ? "Going?" : "Going";
        button.toggleClass("btn-info").toggleClass("btn-default").text(text);
    };
    return {
        init: init
    };
}();

AttendanceController.init();