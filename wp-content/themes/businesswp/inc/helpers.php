<?php

/**************************************************
**** Header Top
***************************************************/

if ( ! function_exists( 'businesswp_header_topbar_template' ) ) :

	function businesswp_header_topbar_template() {

		get_template_part( 'template-parts/header/header','top-bar');

	}

	add_action( 'businesswp_header_topbar', 'businesswp_header_topbar_template' );

endif;

/**************************************************
**** Header Navigation Primary
***************************************************/

$secondary_nav_position = businesswp_get_option('secondary_nav_position');

$main_nav_priority = 20;

$secondary_nav_priority = 10;

  if($secondary_nav_position=='above'){

    $main_nav_priority = 20;

    $secondary_nav_priority = 10;

  }else if($secondary_nav_position=='below'){

    $main_nav_priority = 10;

    $secondary_nav_priority = 20;

  }

if ( ! function_exists( 'businesswp_header_nav_template' ) ) :

	function businesswp_header_nav_template() {

		get_template_part( 'template-parts/header/header','navigation');

	}

	add_action( 'businesswp_header_nav', 'businesswp_header_nav_template', $main_nav_priority );

endif;


/**************************************************
**** Footer Widget
***************************************************/

if ( ! function_exists( 'businesswp_footer_template' ) ) :

	function businesswp_footer_template() {

		get_template_part( 'template-parts/footer/widget');

	}

	add_action( 'Businesswp_footer', 'businesswp_footer_template' );

endif;

/**************************************************
**** Footer Copyright
***************************************************/

if ( ! function_exists( 'businesswp_footer_copyright_template' ) ) :

	function businesswp_footer_copyright_template() {

		get_template_part( 'template-parts/footer/copyright');

	}

	add_action( 'Businesswp_footer', 'businesswp_footer_copyright_template' );

endif;

/**************************************************
**** Post Class
***************************************************/

if ( ! function_exists( 'businesswp_post_entry_classes' ) ) :

	function businesswp_post_entry_classes() {

		$classes = array();

		// Core classes
		$classes[] = 'post';

		// No Featured Image Class, don't add if oembed or self hosted meta are defined
		if ( ! has_post_thumbnail() ) {
			$classes[] = 'no-featured-image';
		}

		// Apply filters to entry post class for child theming
		$classes = apply_filters( 'Businesswp_blog_entry_classes', $classes );

		// Rturn classes array
		return $classes;
		
	}

endif;

if ( ! function_exists( 'businesswp_blog_entry_elements_positioning' ) ) :

	function businesswp_blog_entry_elements_positioning() {

		// Default sections
		$sections = array( 'featured_image', 'title', 'meta', 'content', 'read_more' );

		// convert string into an array
		if ( $sections && ! is_array( $sections ) ) {
			$sections = explode( ',', $sections );
		}

		// Apply filters for simple modification
		$sections = apply_filters( 'businesswp_blog_entry_elements_positioning', $sections );

		return $sections;

	}

endif;

if ( ! function_exists( 'businesswp_excerpt' ) ) :

	function businesswp_excerpt( $length = 30 ) {

		global $post;

		// custom excerpt

		if ( has_excerpt( $post->ID ) ) {

			$output = $post->post_excerpt;

		} else {

			// Check for more tag
			if ( strpos( $post->post_content, '<!--more-->' ) ) {

				$output = apply_filters( 'the_content', get_the_content() );

			} else {

				$output = wp_trim_words( strip_shortcodes( $post->post_content ), $length );

			}

		}

		$output = apply_filters('businesswp_excerpt', $output);

		return $output;

	}

endif;

/**************************************************
**** Positioning Output
***************************************************/

if(!function_exists('businesswp_blog_entry_elements_positioning_output')):

	function businesswp_blog_entry_elements_positioning_output($sections){

		$featured_image_position = businesswp_get_option('archive_feature_image_position');

		if( is_single() ){

			$featured_image_position = businesswp_get_option('single_feature_image_position');

		}

		$image_key = array_search ('featured_image', $sections);

		$title_key = array_search ('title', $sections);

		if( $featured_image_position=='below' ){

			$sections[$title_key] = 'featured_image';

			$sections[$image_key] = 'title';

		}

		return $sections;
	}

	add_filter('businesswp_blog_entry_elements_positioning','businesswp_blog_entry_elements_positioning_output');
	
endif;