jQuery(function($){
	'use strict';

	$('.theme_mobile_menu nav').meanmenu({
		meanScreenWidth:991,
        meanMenuContainer: ".theme_mobile_container",
        meanMenuClose: "X",
        meanMenuOpen: "<div class='meanToggleIcon'><span></span><span></span><span></span></div> Menu",
        meanRevealPosition: "center",
        meanExpand: "+",
		meanContract: "-",
		meanRevealClass: ".theme_mobile_container .meanmenu-reveal",
    });

    // Navigation Accessibility
    $(document).on('blur','.mean-last a', function(){
    	$('#site-navigation .meanclose').focus();
    });

    $(document).on('blur','.mean-expand',function(){
    	$(this).parent('li').find('.sub-menu a:first').focus();
    });

	/* back to top*/
    $(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			$('.back-to-top').fadeIn();
		} else {
			$('.back-to-top').fadeOut();
		}
	});

	$('.back-to-top').click(function () {
		$("html, body").animate({
			scrollTop: 0
		}, 600);
		return false;
	});

	/* Slider */
	$('.main_slider').owlCarousel({
		navigation : true, // is true across all sizes
		slideSpeed : 2500,
		animateIn: businesswp_settings.slide_animatein,
		animateOut: businesswp_settings.slide_animateout,
		autoplay : true,
		smartSpeed: businesswp_settings.slider_smart_speed,
		autoplayTimeout: businesswp_settings.slide_scroll_speed,
		autoplayHoverPause:true,
		singleItem:true,
		mouseDrag: businesswp_settings.slide_mouse_drag,
		loop:true, // loop is true up to 1199px screen.
		nav: businesswp_settings.slider_nav, // Show next and prev buttons
		margin:-1, // margin 10px till 960 breakpoint
		autoHeight: true,
		responsiveClass:true, // Optional helper class. Add 'owl-reponsive-' + 'breakpoint' class to main element.
		items: 1,
		dots: businesswp_settings.slider_dots,
		navText: ['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>'],
	});

	/* testimonial slider */
	$('.testimonial_slider').owlCarousel({
		navigation : true, // Show next and prev buttons
		slideSpeed : 300,
		animateIn: '',
		animateOut: '',
		autoplay : 7000,
		smartSpeed: 1000,
		autoplayTimeout: 2500,
		autoplayHoverPause:true,
		singleItem:true,
		mouseDrag: true,
		loop:true, // loop is true up to 1199px screen.
		nav: true, // is true across all sizes
		margin:30, // margin 10px till 960 breakpoint
		autoHeight: true,
		responsiveClass:true, // Optional helper class. Add 'owl-reponsive-' + 'breakpoint' class to main element.
		items: 1,
		dots: false,
		navText: ['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>'],
		responsive:{
			100:{ items:1 },
			480:{ items:1 },
			768:{ items:2 },
			1000:{ items:3 }
		},
	});

	/* blog slider */
	$('.blog_slider').owlCarousel({
		navigation : true, // Show next and prev buttons
		slideSpeed : 300,
		animateIn: '',
		animateOut: '',
		autoplay : 7000,
		smartSpeed: 1000,
		autoplayTimeout: 2500,
		autoplayHoverPause:true,
		singleItem:true,
		mouseDrag: true,
		loop:true, // loop is true up to 1199px screen.
		nav: true, // is true across all sizes
		margin:30, // margin 10px till 960 breakpoint
		autoHeight: true,
		responsiveClass:true, // Optional helper class. Add 'owl-reponsive-' + 'breakpoint' class to main element.
		items: 1,
		dots: false,
		navText: ['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>'],
		responsive:{
			100:{ items:1 },
			480:{ items:1 },
			768:{ items:2 },
			1000:{ items:3 }
		},
	});

	var adminbarh = $('#wpadminbar').outerHeight();
	$(window).scroll(function () {
		if ($(window).scrollTop() >= 200){
			$('.sticky-top').addClass('sticky-fixed').css('top',adminbarh + 'px');
		}else {
			$('.sticky-top').removeClass('sticky-fixed').css('top',0);
		}
	});

	/* Smooth scroll */
    $(document).on('click', '.main-menu a', function (e) {

    	var scrollSectionTop = 0;

    	if($('#wpadminbar').length>0){
    		scrollSectionTop = scrollSectionTop + adminbarh;
    	}

    	if($('.primary_menu.sticky-top').length>0){
    		scrollSectionTop = scrollSectionTop + $('.primary_menu.sticky-top').outerHeight();
    	}

        if ($(e.target).is('a[href*="#"]:not([href="#"]')) {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                || location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top - scrollSectionTop + 'px'
                    }, 1500);
                    return false;
                }
            }
        }
    });
	
});

// WOW js calling
new WOW().init();

(function($){
	if($(".background_image").length>0){
		$(".background_image").parallaxie({
         speed: 0.55,
         offset: 0,
         size: 'cover',
         pos_x: 'center',
      });
	}
})(jQuery);