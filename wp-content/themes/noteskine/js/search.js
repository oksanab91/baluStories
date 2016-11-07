(function($){
	"use strict";

	$(".toggle-search").delegate(".toggle", "click", function() {
		$(".top-search-box").fadeToggle("fast");
		$(".fa-search").fadeToggle(0);
		$(".fa-times").fadeToggle(0);
		var range = 640;
		var windowW = $(window).width();
			if ( windowW > range ) {

			$("#post-navigation").fadeToggle("fast"); //znikanie post-nav menu
			$("#top-button a").fadeToggle("fast"); //znikanie top-nav menu
			$("#bottom-button a").fadeToggle("fast"); //znikanie bottom-nav menu

			}

		$("#primary-navigation").fadeToggle(0); //znikanie top-nav menu
	});
})( jQuery );
