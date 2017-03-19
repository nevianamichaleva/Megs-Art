 $(document).ready(function() {
     $('.flexslider').flexslider({
         animation: 'fade',
         controlsContainer: '.flexslider'
     });
     $("#control-close").click(function(){
         $(".control-panel").toggle("slide", { direction: "left" }, 1000);
     });
      $("#control-panel-close").click(function(){
         $(".control-panel").toggle("slide", { direction: "left" }, 1000);
     });
     $(".control-panel a").click(function(ev){
         imageUrl = '../images/'+ev.target.id+'.png';
         $("body").css('background-image', 'url(' + imageUrl + ')');
     });
     $nav=$("#nav-main").html();
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
    $("#nav-mobile li.submenu").hover(function(){
        var $lenght = ($("#nav-mobile ul li").size());
        if ($lenght<=11){   
        $("#nav-mobile ul").append($submenu);
    }
    });  
 });