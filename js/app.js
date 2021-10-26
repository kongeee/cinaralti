$(document).foundation();


// Enable Scroll Reveal
var $scrollReveal = $('.scroll-reveal');

window.sr = ScrollReveal({
  distance: 0,
  scale: 1,
  duration: 1000,
  easing: 'cubic-bezier(0.77, 0, 0.175, 1)',
  mobile: true
});

sr.reveal('.scroll-reveal');

$.each($scrollReveal, function() {
  sr.reveal(this, $(this).data());
});



// Enable Smooth Scrolling ...  by Chris Coyier of CSS-Tricks.com
	$('a[href*="#"]:not([href="#"]):not([href="#show"]):not([href="#hide"]):not([href^="#panel"])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				$('html,body').animate({
					scrollTop: target.offset().top
				}, 1000);
				return false;
			}
		}
	});


// Back to top
jQuery(document).ready(function($){
	// browser window scroll (in pixels) after which the "back to top" link is shown
	var offset = 300,
		//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
		offset_opacity = 1200,
		//duration of the top scrolling animation (in ms)
		scroll_top_duration = 700,
		//grab the "back to top" link
		$back_to_top = $('.cd-top');

	//hide or show the "back to top" link
	$(window).scroll(function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
		if( $(this).scrollTop() > offset_opacity ) { 
			$back_to_top.addClass('cd-fade-out');
		}
	});

	//smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});

});

