$(document).ready(function () {
 
    var currentColor = localStorage.getItem('background') ? localStorage.getItem('background') : '../images/body-bg.png';
        $("body").css('background-image', 'url(' + currentColor + ')');
    $('.closebtn').click(function(){
        $(this).parent().css('display','none');
    });

    $('.flexslider').flexslider({
        animation: 'fade',
        controlsContainer: '.flexslider'
    });
    $("#control-close").click(function () {
        $(".control-panel").toggle("slide", {direction: "left"}, 1000);
    });
    $("#control-panel-close").click(function () {
        $(".control-panel").toggle("slide", {direction: "left"}, 1000);
    });
    $(".control-panel a.note-back").click(function (ev) {
        imageUrl = '../images/' + ev.target.id + '.png';
        localStorage.setItem('background', imageUrl);
        $("body").css('background-image', 'url(' + imageUrl + ')');
    });
    $nav = $("#nav-main").html();
    $("#nav-mobile").html($nav);
    $("#nav-trigger span").click(function () {
        if ($("nav#nav-mobile ul").hasClass("expanded")) {
            $("nav#nav-mobile ul.expanded").removeClass("expanded").slideUp(250);
            $(this).removeClass("open");
            $("#nav-trigger img").css({
                "-webkit-transform": "rotate(360deg)",
                "-moz-transform": "rotate(360deg)",
                "transform": "rotate(360deg)"
            });
        } else {
            $("nav#nav-mobile ul").addClass("expanded").slideDown(250);
            $(this).addClass("open");
            $("#nav-trigger img").css({
                "-webkit-transform": "rotate(180deg)",
                "-moz-transform": "rotate(180deg)",
                "transform": "rotate(180deg)"
            });
        }
    });
    var $submenu = $("#nav-mobile li.submenu ul#sub-menu").html();
    $("#nav-mobile li.submenu").hover(function () {
        var $lenght = ($("#nav-mobile ul li").size());
        if ($lenght <= 11) {
            $("#nav-mobile ul").append($submenu);
        }
    });
    
//    var conHeight = $(".note-img").height();
//    var imgHeight = $(".note-img img").height();
//    var gap = (imgHeight - conHeight)/2;
//    $(".note-img img").css("margin-top",-gap);
});