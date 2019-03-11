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
		if($(this).hasClass('open-last-subtitles')){
			$(this).addClass('close-last-subtitles')
			$(this).removeClass('open-last-subtitles')
		}else{
			$(this).removeClass('close-last-subtitles')
			$(this).addClass('open-last-subtitles')
		}
	});


})( jQuery );