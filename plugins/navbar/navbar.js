$(document).ready(function() {
    $("#navul > li").not(".navhome").hover(function() {
        $(this).addClass("navmoon");
    }, function() {
        $(this).removeClass("navmoon");
    });
});