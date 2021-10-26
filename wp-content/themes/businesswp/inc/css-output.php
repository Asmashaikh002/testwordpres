<?php

/**************************************************
**** Get Dynamic Css
***************************************************/

if ( ! function_exists( 'businesswp_get_dynamic_css' ) ) :

	function businesswp_get_dynamic_css() {

		$option = wp_parse_args(  get_option( 'businesswp_option', array() ), businesswp_theme_default_data() );

		// Calling Businesswp_Pro_CSS class for generate dynamic css
		$pro_css = new Businesswp_Pro_CSS;

		$content_padding = explode(', ', $option['content_padding']);
		$topbar_padding = explode(', ', $option['topbar_padding']);
		$fwidget_padding = explode(', ', $option['footer_widget_padding']);
		$footer_padding = explode(', ', $option['footer_padding']);
		$widget_padding = explode(', ', $option['sidebar_widget_padding']);
		$nav_menu_item_width = $option['nav_menu_item_width'];
		$nav_menu_item_height = $option['nav_menu_item_height'];
		$nav_submenu_item_height = $option['nav_submenu_item_height'];
		$nav_submenu_width = $option['nav_submenu_width'];
		$nav_mobilebtn_breakpoint = businesswp_get_option('nav_mobilebtn_breakpoint');
		$secondary_menu_item_width = $option['secondary_menu_item_width'];
		$secondary_menu_item_height = $option['secondary_menu_item_height'];
		$secondary_submenu_item_height = $option['secondary_submenu_item_height'];
		$sticky_menu_item_height = $option['sticky_menu_item_height'];

		// Primary Color 
		$primary_color = businesswp_get_option('primary_color');
		list($r, $g, $b) = sscanf($primary_color, "#%02x%02x%02x");

		$pro_css->set_selector( ':root' );
		$pro_css->add_property( '--primary-color', $primary_color );
		$pro_css->add_property( '--primary-r-color', $r );
		$pro_css->add_property( '--primary-g-color', $g );
		$pro_css->add_property( '--primary-b-color', $b );
		$pro_css->add_property( '--body-color', '#858d9a' );
		$pro_css->add_property( '--border-color', '#f5f5f5' );
		$pro_css->add_property( '--heading-color', '#0b2341' );

		// slider
		$pro_css->set_selector( '.slide.overlay::before' );
		$pro_css->add_property( 'background-color', $option['slider_overlay_color'] );

		$pro_css->set_selector( '.slide .slide-subtitle' );
		$pro_css->add_property( 'color', $option['slider_subtitle_color'] );

		$pro_css->set_selector( '.slide .slide-title' );
		$pro_css->add_property( 'color', $option['slider_title_color'] );

		$pro_css->set_selector( '.slide .slide-content' );
		$pro_css->add_property( 'color', $option['slider_desc_color'] );

		// service
		$pro_css->set_selector( '.service-wrap' );
		$pro_css->add_property( 'background-color', $option['service_item_bg_color'] );

		$pro_css->set_selector( '.service-wrap .service-wrap-title a' );
		$pro_css->add_property( 'color', $option['service_item_title_color'] );

		$pro_css->set_selector( '.service-wrap .service-wrap-desc' );
		$pro_css->add_property( 'color', $option['service_item_text_color'] );

		$pro_css->set_selector( '.service.overlay::before' );
		$pro_css->add_property( 'background-color', $option['service_overlay_color'] );

		// testimonial
		$pro_css->set_selector('.testimonial-wrap');
		$pro_css->add_property('background-color', $option['testimonial_item_bg_color']);

		$pro_css->set_selector('.testimonial-wrap .testimonial-auther-name');
		$pro_css->add_property('color', $option['testimonial_item_title_color']);

		$pro_css->set_selector('.testimonial-wrap .testimonial-description');
		$pro_css->add_property('color', $option['testimonial_item_text_color']);

		$pro_css->set_selector('.testimonial.overlay::before');
		$pro_css->add_property('background-color', $option['testimonial_overlay_color']);

		// team
		$pro_css->set_selector('.team-wrap, .team-img-2, .team-wrap-2');
		$pro_css->add_property('background-color', $option['team_item_bg_color']);
		$pro_css->add_property('color', $option['team_item_bg_color']);

		$pro_css->set_selector('.team-wrap .team-title a, .team-wrap-2 .team-title a');
		$pro_css->add_property('color', $option['team_item_title_color']);

		$pro_css->set_selector('.team-wrap .team-designation, .team-wrap-2 .team-designation');
		$pro_css->add_property('color', $option['team_item_text_color']);

		$pro_css->set_selector('.team.overlay::before');
		$pro_css->add_property('background-color', $option['team_overlay_color']);

		// blog
		$pro_css->set_selector('.blog-wrap');
		$pro_css->add_property('background-color', $option['blog_item_bg_color']);

		$pro_css->set_selector('.blog-wrap .blog-content-title a');
		$pro_css->add_property('color', $option['blog_item_title_color']);

		$pro_css->set_selector('.blog-wrap .blog-content p');
		$pro_css->add_property('color', $option['blog_item_text_color']);

		$pro_css->set_selector('.news.overlay::before');
		$pro_css->add_property('background-color', $option['blog_overlay_color']);

		// contact
		$pro_css->set_selector('.contact-area');
		$pro_css->add_property('background-color', $option['contact_item_bg_color']);

		$pro_css->set_selector('.contact-area .contact-content span');
		$pro_css->add_property('color', $option['contact_item_title_color']);

		$pro_css->set_selector('.contact-area .contact-content p');
		$pro_css->add_property('color', $option['contact_item_text_color']);

		$pro_css->set_selector('.contact.overlay::before');
		$pro_css->add_property('background-color', $option['contact_overlay_color']);

		// container
		$pro_css->set_selector('.container, .grid-container');
		$pro_css->add_property('max-width', absint($option['container_width']) . 'px' );

		// widget
		$pro_css->set_selector('.widget');
		$pro_css->add_property('margin-bottom', absint($option['separating_space']) . 'px' );

		// blog post spacing
		$pro_css->set_selector('.site-content .blog, .site-content .post');
		$pro_css->add_property('margin-bottom', absint($option['separating_space']) . 'px' );

		$pro_css->set_selector('.post-thumbnail-left, .single .post-thumbnail-left');
		$pro_css->add_property('margin-right', '40px' );

		$pro_css->set_selector('.post-thumbnail-right, .single .post-thumbnail-right');
		$pro_css->add_property('margin-left', '40px' );

		$pro_css->set_selector('.entry-meta');
		$pro_css->add_property('margin-bottom', floatval($option['content_separating_space']) . 'em' );

		$pro_css->set_selector('.separate-containers .inside-article');
		$pro_css->add_property('padding-top', absint( $content_padding[0] ) . 'px' );
		$pro_css->add_property('padding-bottom', absint( $content_padding[2] ) . 'px' );
		$pro_css->add_property('padding-left', absint( $content_padding[3] ) . 'px' );
		$pro_css->add_property('padding-right', absint( $content_padding[1] ) . 'px' );

		$pro_css->set_selector('.one-container .main_content .container');
		$pro_css->add_property('padding-top', absint( $content_padding[0] ) . 'px' );
		$pro_css->add_property('padding-bottom', absint( $content_padding[2] ) . 'px' );
		$pro_css->add_property('padding-left', absint( $content_padding[3] ) . 'px' );
		$pro_css->add_property('padding-right', absint( $content_padding[1] ) . 'px' );

		$pro_css->set_selector('.top_header__wrap');
		$pro_css->add_property('padding-top', absint( $topbar_padding[0] ) . 'px' );
		$pro_css->add_property('padding-bottom', absint( $topbar_padding[2] ) . 'px' );
		$pro_css->add_property('padding-left', absint( $topbar_padding[3] ) . 'px' );
		$pro_css->add_property('padding-right', absint( $topbar_padding[1] ) . 'px' );

		$pro_css->set_selector('.footer__wrap');
		$pro_css->add_property('padding-top', absint( $fwidget_padding[0] ) . 'px' );
		$pro_css->add_property('padding-bottom', absint( $fwidget_padding[2] ) . 'px' );
		$pro_css->add_property('padding-left', absint( $fwidget_padding[3] ) . 'px' );
		$pro_css->add_property('padding-right', absint( $fwidget_padding[1] ) . 'px' );

		$pro_css->set_selector('.copyright__wrap');
		$pro_css->add_property('padding-top', absint( $footer_padding[0] ) . 'px' );
		$pro_css->add_property('padding-bottom', absint( $footer_padding[2] ) . 'px' );
		$pro_css->add_property('padding-left', absint( $footer_padding[3] ) . 'px' );
		$pro_css->add_property('padding-right', absint( $footer_padding[1] ) . 'px' );

		$pro_css->set_selector('.sidebar .widget');
		$pro_css->add_property('padding-top', absint( $widget_padding[0] ) . 'px' );
		$pro_css->add_property('padding-bottom', absint( $widget_padding[2] ) . 'px' );
		$pro_css->add_property('padding-left', absint( $widget_padding[3] ) . 'px' );
		$pro_css->add_property('padding-right', absint( $widget_padding[1] ) . 'px' );

		$pro_css->set_selector('#site-navigation .main-menu > li > a');
		$pro_css->add_property('padding', '0 '. $nav_menu_item_width . 'px' );
		$pro_css->add_property('line-height', absint( $nav_menu_item_height ) . 'px' );

		$pro_css->set_selector('.main-menu ul a');
		$pro_css->add_property('line-height', absint( $nav_submenu_item_height ) . 'px' );

		$pro_css->set_selector('.main-menu ul');
		$pro_css->add_property('min-width', absint( $nav_submenu_width ) . 'px' );

		$pro_css->set_selector('.search-nav input[type="search"]');
		$pro_css->add_property('bottom', '-' . $nav_menu_item_height . 'px' );

		$pro_css->set_selector('#site-navigation.secondary_menu .main-menu >li > a');
		$pro_css->add_property('padding', '0 '. $secondary_menu_item_width . 'px' );
		$pro_css->add_property('line-height', absint( $secondary_menu_item_height ) . 'px' );

		$pro_css->set_selector('.secondary_menu .main-menu ul a');
		$pro_css->add_property('line-height', absint( $secondary_submenu_item_height ) . 'px' );

		// Mobile query start
		$pro_css->start_media_query( apply_filters( 'businesswp_mobile_menu_media_query', '(min-width:'.absint($nav_mobilebtn_breakpoint).'px)' ) );
		$pro_css->set_selector('.mobile_secondary_menu');
		$pro_css->add_property('display', 'none' );
		$pro_css->stop_media_query();

		$pro_css->start_media_query( apply_filters( 'businesswp_mobile_menu_media_query', '(max-width:'.absint($nav_mobilebtn_breakpoint).'px)' ) );
		$pro_css->set_selector('.mobile_secondary_menu li .fa-caret-down, .secondary_menu .collapse');
		$pro_css->add_property('display', 'none !important' );
		$pro_css->stop_media_query(); 

		$pro_css->start_media_query( apply_filters( 'businesswp_mobile_menu_media_query', '(min-width:'.absint($nav_mobilebtn_breakpoint).'px)' ) );
		$pro_css->set_selector('.theme_mobile_menu');
		$pro_css->add_property('display', 'none' );
		$pro_css->stop_media_query(); 

		$pro_css->start_media_query( apply_filters( 'businesswp_mobile_menu_media_query', '(max-width:'.absint($nav_mobilebtn_breakpoint).'px)' ) );
		$pro_css->set_selector('.theme_mobile_menu li .fa-caret-down, .primary_menu .collapse');
		$pro_css->add_property('display', 'none !important' );
		$pro_css->stop_media_query();

		// Mobile query end

		return apply_filters( 'businesswp_dynamic_css', $pro_css );
	}

endif;

/**************************************************
**** Enqueue CSS Styling
***************************************************/

if ( ! function_exists( 'businesswp_enqueue_dynamic_css' ) ) :

	function businesswp_enqueue_dynamic_css() {

		$css = businesswp_get_dynamic_css();

		wp_register_style( 'businesswp-style', false );

		wp_enqueue_style( 'businesswp-style' );

		wp_add_inline_style( 'businesswp-style', wp_strip_all_tags( $css->css_output() ) );

	}

	add_action( 'wp_enqueue_scripts', 'businesswp_enqueue_dynamic_css', 10 );
	
endif;