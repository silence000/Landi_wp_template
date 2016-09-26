var t = n = 0, count;
$(document).ready(function () {
    count = $("#smallslide_list a").length;
    $("#smallslide_list a:not(:first-child)").hide();
    $("#smallslide_info").html($("#smallslide_list a:first-child").find("img").attr('alt'));
    $("#smallslide_info").click(function () {
        window.open($("#smallslide_list a:first-child").attr('href'), "_blank")
    });
    $("#smallslide li").click(function () {
        var i = $(this).text() - 1;//获取Li元素内的值，即1，2，3，4
        n = i;
        if (i >= count) return;
        $("#smallslide_info").html($("#smallslide_list a").eq(i).find("img").attr('alt'));
        $("#smallslide_info").unbind().click(function () {
            window.open($("#smallslide_list a").eq(i).attr('href'), "_blank")
        })
        $("#smallslide_list a").filter(":visible").fadeOut(500).parent().children().eq(i).fadeIn(1000);
        document.getElementById("smallslide").style.background = "";
        $(this).toggleClass("on");
        $(this).siblings().removeAttr("class");
    });
    t = setInterval("showAuto()", 4000);
    $("#smallslide").hover(function () {
        clearInterval(t)
    }, function () {
        t = setInterval("showAuto()", 4000);
    });
})

function showAuto() {
    n = n >= (count - 1) ? 0 : ++n;
    $("#smallslide li").eq(n).trigger('click');
}