/*
============ Bootstrap additional functions ===========
*/
(function ($) {
	jQuery(function ($) {
	//============ Bootstrap Nav Walker hover effect ===========
		if ($(window).width() >= 1200) {
			$('.navbar .dropdown').hover(function () {
				$(this).find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();

			}, function () {
				$(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp();

			});

			$('.navbar .dropdown > a').click(function () {
				location.href = this.href;
			});

		}
	
	
	});

//============ All images add two Bootstrap Classes ===========
	
	
	//$( '.site-content img' ).not( '.img-responsive ' ).addClass( 'img-responsive center-block' );

$(document).ready(function() {
	$('.soliloquy-container .soliloquy-image').animate({opacity: 1}, 1000);//.fadeIn(8500);
});

	
})( jQuery );