var FollowingController = function () {
    var button;
    var init = function () {
        $('.js-toggle-following').click(toggleFollowing);
    };
    
    var toggleFollowing = function (e) {
        e.preventDefault();
        button = $(e.target);
        $.post("/api/followings", { FolloweeId: button.attr("data-following-id") })
            .done(done)
            .fail(failed);
    };
    var done = function (res) {
        var text = (button.text() == "Following") ? "Follow" : "Following";
        button.toggleClass("btn-info").toggleClass("btn-default").text(text);
    };

    var failed = function () {
        toastr.error(res.responseJSON.Message);
    };
    return {
        init: init
    }
}();

FollowingController.init();
