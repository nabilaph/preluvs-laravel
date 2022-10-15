$(document).ready(function () {
    $(".notification_icon .fa-bell").click(function () {
        $(".dropdown").toggleClass("active");
    });
});
document.getElementById("notify_img").addEventListener(
    "click",
    function () {
        location.href = "notification-page-detail.html";
    },
    false
);
