(function($) {

	$('a.tlacitko').click(function(e) {
		let cil = $(this).attr('href');
		let menu = $('#menu');
		let rychlost = 1000;

		$("html, body").stop().animate(
			{ scrollTop: $(cil).offset().top - menu.height() },
			rychlost);

		e.preventDefault();
	});

	$('#last-subtitles').click(function() {
		$(this).siblings().slideToggle('slow');
		if($(this).hasClass('aside__open-last-subtitles')){
			$(this).addClass('aside__close-last-subtitles')
			$(this).removeClass('aside__open-last-subtitles')
		}else{
			$(this).removeClass('aside__close-last-subtitles')
			$(this).addClass('aside__open-last-subtitles')
		}
	});

	$('#open-contact-form').click(function() {
		$('#contact-form').css({'display':'block'});
	});

	$('#close-contact-form').click(function() {
		$('#contact-form').css({'display':'none'});
	});

	$(window).scroll(function() {
		var top_of_element = $("#uvodnik").offset().top;
		var bottom_of_element = $("#uvodnik").offset().top + $("#uvodnik").outerHeight();
		var bottom_of_screen = $(window).scrollTop() + $(window).innerHeight();
		var top_of_screen = $(window).scrollTop();

		if ((bottom_of_screen > top_of_element) && (top_of_screen < bottom_of_element)){
			$('#up').css('display', 'block');
		} else {
			$('#up').slideToggle('fast');
		}
	});



})( jQuery );