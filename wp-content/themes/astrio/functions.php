<?php

/*
 * Enqueue theme scripts
 */

function astrio_enqueue_scripts() {

  $astrio_parent_style = 'astrio-parent-style';

  wp_enqueue_style( 'astrio-style', get_stylesheet_directory_uri(). '/style.css', $astrio_parent_style  );

}

add_action( 'wp_enqueue_scripts' , 'astrio_enqueue_scripts', 99 );

/*
 * Theme settings
 */

function astrio_new_default_data( $data ){

  $data['primary_color'] = '#0189CA';
  $data['archive_readmore_button'] = true;
  $data['info_contact_show'] = true;
  $data['info_contact_container_width'] = 'container';

	// Returns the new theme data
	return $data;
}

add_filter('businesswp_theme_default_data','astrio_new_default_data', 20 );

/*
 * Theme Setup
 */

if( ! function_exists('astrio_setup') ){

  function astrio_setup(){
    
    $args = array(
      'width'        => 1900,
      'flex-width'   => true,
      'default-image' => get_stylesheet_directory_uri() . '/images/sub-header.jpg',
      // Header text
      'header-text'   => false,
    );
    add_theme_support( 'custom-header', $args );
    
    add_theme_support( 'recommend-plugins', array(
      'britetechs-companion' => array(
                'name' => esc_html__( 'Britetechs Companion', 'astrio' ),
                'desc' => esc_html__( 'We highly recommend that you install the brietechs companion plugin to gain access to the team and testimonial sections.', 'astrio' ),
                'active_filename' => 'brietechs-companion/brietechs-companion.php',
            ),
            'contact-form-7' => array(
                'name' => esc_html__( 'Contact Form 7', 'astrio' ),
        'desc' => esc_html__( 'This is also recommended that you install the contact form plugin to show contact form on Front Page contact section and Contact custom page template.', 'astrio' ),
                'active_filename' => 'contact-form-7/wp-contact-form-7.php',
            ),
        ) );
  }

}

add_action( 'after_setup_theme', 'astrio_setup' );


/*
 * Homepage info section
 */

if( ! function_exists('astrio_info_section') ){

  function astrio_info_section(){

    get_template_part('inc/sections/section','info');

  }

}

if( function_exists('astrio_info_section') ){

  $section_priority = apply_filters( 'businesswp_section_priority', 6, 'astrio_info_section' );

  add_action('businesswp_sections','astrio_info_section', absint($section_priority));

}

/*
 * Include customizer file
 */

function astrio_customizer_init(){

  get_template_part('inc/customizer/sections/section-info-contact');

}

add_action('init','astrio_customizer_init', 20 );