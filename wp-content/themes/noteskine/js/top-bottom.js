(function($){
	"use strict";

	//Check to see if the window is top if not then display button
	$(window).scroll(function() {
		if ($(this).scrollTop() > $(document).height()*0.7) {
			$('#bottom-button').fadeOut("fast");
		}
		if ($(this).scrollTop() < $(document).height()*0.7) {
			$('#bottom-button').fadeIn("fast");
		}
	} );

	//Click event to scroll to pagination
	$('#bottom-button').click(function() {
		$('html, body').animate( {scrollTop : $("#footer-wrapper").offset().top-156 },0);
		return false;
	} );

	//Check to see if the window is top if not then display button
	$(window).scroll(function() {
		if ($(this).scrollTop() > $(document).height()*0.7) {
			$('#top-button').fadeIn("fast");
		}
		if ($(this).scrollTop() < $(document).height()*0.7) {
			$('#top-button').fadeOut("fast");
		}
	} );

	//Click event to scroll to top
	$('#top-button').click(function() {
		$('html, body').animate( {scrollTop : 0 },0);
		return false;
	} );

} ) ( jQuery );
