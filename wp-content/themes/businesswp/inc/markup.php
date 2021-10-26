<?php

/**************************************************
**** Adding new body classes
***************************************************/

if ( ! function_exists( 'businesswp_body_classes' ) ) :

    function businesswp_body_classes( $classes ) {

    	$content_layout = businesswp_get_option('content_layout_setting');

        $layout = businesswp_get_option('layout');

    	$classes[] = ( $content_layout ) ? $content_layout : 'separate-containers';

        if(is_single()){

           $classes[] = 'pagination-single-disable';

        }

        if($layout=='boxed'){

            $classes[] = 'boxed';

        }

    	return $classes;
    }

    add_filter( 'body_class', 'businesswp_body_classes' );

endif;

/**************************************************
**** Excerpt length
***************************************************/

if ( ! function_exists( 'businesswp_excerpt_length' ) ) :

    add_filter( 'excerpt_length', 'businesswp_excerpt_length', 15 );

    function businesswp_excerpt_length( $length ) {

        if( is_front_page() && is_home() ){
            return 10;
        }

        $excerpt_length = businesswp_get_option('archive_excerpt_length');

        return absint( apply_filters( 'businesswp_excerpt_length', $excerpt_length ) );

    }

endif;

/**************************************************
**** Excerpt Read More
***************************************************/

if ( ! function_exists( 'businesswp_blog_excerpt_more' ) ) :

    add_filter( 'excerpt_more', 'businesswp_blog_excerpt_more', 15 );

    function businesswp_blog_excerpt_more( $more ) {

        $excerpt_readmore = businesswp_get_option('archive_readmore_label');

        // If empty, return

        if ( '' == $excerpt_readmore ) {

            return '';

        }

        return apply_filters( 'businesswp_excerpt_more_output', sprintf( ' ... <a title="%1$s" class="more-link" href="%2$s">%3$s <i class="fa fa-long-arrow-right"></i></a>',
            the_title_attribute( 'echo=0' ),
            esc_url( get_permalink( get_the_ID() ) ),
            wp_kses_post( $excerpt_readmore )
        ) );

    }

endif;

/**************************************************
**** Content Read More
***************************************************/

if ( ! function_exists( 'businesswp_blog_content_more' ) ) :

    add_filter( 'the_content_more_link', 'businesswp_blog_content_more', 15 );

    function businesswp_blog_content_more( $more ) {

        $excerpt_readmore = businesswp_get_option('archive_readmore_label');

        // If empty, return

        if ( '' == $excerpt_readmore ) {

            return '';

        }

        return apply_filters( 'Businesswp_content_more_link_output', sprintf( '<p class="more-link-container"><a title="%1$s" class="more-link content-more-link" href="%2$s">%3$s%4$s <i class="fa fa-long-arrow-right"></i></a></p>',
            the_title_attribute( 'echo=0' ),
            esc_url( get_permalink( get_the_ID() ) . apply_filters( 'businesswp_more_jump','#more-' . get_the_ID() ) ),
            wp_kses_post( $excerpt_readmore ),
            '<span class="screen-reader-text">' . get_the_title() . '</span>'
        ) );

    }

endif;

add_filter( 'businesswp_excerpt_more_output', 'businesswp_blog_read_more_button' );
add_filter( 'Businesswp_content_more_link_output', 'businesswp_blog_read_more_button' );

function businesswp_blog_read_more_button( $output ) {

	$archive_readmore_button = businesswp_get_option('archive_readmore_label');

	$excerpt_readmore = businesswp_get_option('archive_readmore_label');

    $archive_readmore_button = businesswp_get_option('archive_readmore_button');

    $class='';

    if($archive_readmore_button){

        $class = 'button';

    }

	if ( !$archive_readmore_button ) {

		return $output;

	}

	return sprintf( '%5$s<p class="more-link-container"><a title="%1$s" class="more-link %6$s" href="%2$s">%3$s%4$s <i class="fa fa-long-arrow-right"></i></a></p>',
		the_title_attribute( 'echo=0' ),
		esc_url( get_permalink( get_the_ID() ) . apply_filters( 'businesswp_more_jump','#more-' . get_the_ID() ) ),
		wp_kses_post( $excerpt_readmore ),
		'<span class="screen-reader-text">' . get_the_title() . '</span>',
		'businesswp_excerpt_more_output' == current_filter() ? ' ... ' : '',
        esc_attr($class)
	);

}

if ( ! function_exists( 'businesswp_show_excerpt' ) ) :

    function businesswp_show_excerpt() {

        global $post;

        // If the more tag is used.

        $more_tag = apply_filters( 'Businesswp_more_tag', strpos( $post->post_content, '<!--more-->' ) );
        $postformat = ( false !== get_post_format() ) ? get_post_format() : 'standard';

        $show_excerpt = ( 'excerpt' === businesswp_get_option('archive_content_type') ) ? true : false;
        $show_excerpt = ( 'standard' !== $postformat ) ? false : $show_excerpt;
        $show_excerpt = ( $more_tag ) ? false : $show_excerpt;
        $show_excerpt = ( is_search() ) ? true : $show_excerpt;

        return apply_filters( 'businesswp_show_excerpt', $show_excerpt );

    }
    
endif;

if ( ! function_exists( 'businesswp_menu_cart_icon' ) ) {

    if(class_exists('woocommerce')){

        add_filter( 'wp_nav_menu_items', 'businesswp_menu_cart_icon', 15, 2 );
        
    }
    
    function businesswp_menu_cart_icon( $nav, $args ) {

        if(  !class_exists('woocommerce') ){
            return;
        }

        global $woocommerce;

        $cart_value = sprintf ( __( '<span class="cart-value">%d</span>', 'businesswp'), WC()->cart->get_cart_contents_count() );

        $new_menu_item = sprintf('<li class="menu-item menu-cart-icon"><a class="cart-total" href="%1$s" title="%2$s"><i class="fa fa-shopping-cart"></i>%3$s</a></li>',
                esc_url( wc_get_cart_url() ),
                esc_attr('View cart', 'businesswp'),
                $cart_value
            );

        return $nav . $new_menu_item;
    }
}