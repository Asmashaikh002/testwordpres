<?php
/**
 * Jetpack function.
 *
 * Look: https://jetpack.com/support/infinite-scroll/
 * Look: https://jetpack.com/support/responsive-videos/
 */
function businesswp_jetpack_setup() {

	// Theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container' => 'site-content',
		'render'    => 'businesswp_infinite_scroll_render',
		'footer'    => 'page',
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', 'businesswp_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function businesswp_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/entry/layout', get_post_format() );
	}
}