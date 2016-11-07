(function($){
"use strict";

	$(".toggle-menu").delegate(".toggle", "click", function() {
		$("#header-menu").toggle("fast");
		$(".fa-bars").fadeToggle(0);
		$(".fa-times").fadeToggle(0);
		var range = 640;
		var windowW = $(window).width();
			if ( windowW > range ) {

			$("#post-navigation").fadeToggle("fast"); //znikanie post-nav menu
			$("#top-button a").fadeToggle("fast"); //znikanie top-nav menu
			$("#bottom-button a").fadeToggle("fast"); //znikanie bottom-nav menu
			$("#reading-progress").fadeToggle("fast"); //znikanie bottom-nav menu

			}

		$("#top-search").fadeToggle(0); //znikanie top-nav menu
	});
})( jQuery );
