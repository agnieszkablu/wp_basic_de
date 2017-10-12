/*
============ Bootstrap additional functions ===========
*/
(function ($) {
	'use strict';
	//============ Bootstrap Nav Walker hover effect ===========
	if ($(window).width() >= 1200) {
		$('.main-navigation .dropdown').hover(function () {
			$(this).find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();

		}, function () {
		$(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp();

		});

		$('#menu-primary .dropdown > a').click(function () {
			location.href = this.href;
		});
	}

	/*
	============ Click event to scroll to point ===========
	*/
	
	function scrollToPoint(){
		$('html, body').animate({
				scrollTop: $( $.attr(this, 'href') ).offset().top
			}, 1100);
			return false;
	}
	$('#menu-item-61 a').click(scrollToPoint);
	/*
	============ Click event to scroll to point - submenu items ===========
	*/
	var submenu = $('.dropdown-menu a[href*="#"]');
	$.each(submenu, function() {
		var i = $(this).attr('href').replace(/^.*?(?=#)/,''),
			x = $(this).attr('href', i);
		x.click(scrollToPoint);
	});


//============ lazy load slider ===========

	$(document).ready(function() {
		$('.soliloquy-container .soliloquy-image').animate({opacity: 1}, 1000);
	});

} )(jQuery);