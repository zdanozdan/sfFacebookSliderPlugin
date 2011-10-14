$(function() {

    $("#facebook_slider").css("left","-210px");
    
    $("#facebook_slider").hover(
				function () {
				    $("#facebook_slider").animate({left: "0px"}, 1000 );
				    $(this).addClass("facebook_close");
				},
	
				function () {
				    $("#facebook_slider").animate({left: "-210px"}, 1000 );
				    $(this).removeClass("facebook_close");
				}
				);
    });
