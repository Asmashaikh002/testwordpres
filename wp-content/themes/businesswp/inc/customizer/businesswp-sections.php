<?php

/**************************************************
**** Layout Sections
***************************************************/

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'container_section', 
		array(
			'title'    => esc_html__( 'Container', 'businesswp' ),
			'panel'    => 'layout',
			'priority' => 2,
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'layout_section', 
		array(
			'title'    => esc_html__( 'Layout', 'businesswp' ),
			'panel'    => 'layout',
			'priority' => 1,
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'topbar_section', 
		array(
			'title'    => esc_html__( 'Top Bar', 'businesswp' ),
			'panel'    => 'layout',
			'priority' => 3,
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'header_section', 
		array(
			'title'    => esc_html__( 'Header', 'businesswp' ),
			'panel'    => 'layout',
			'priority' => 3,
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'primary_section', 
		array(
			'title'    => esc_html__( 'Primary Navigation', 'businesswp' ),
			'panel'    => 'layout',
			'priority' => 4,
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'secondary_section', 
		array(
			'title'    => esc_html__( 'Secondary Navigation', 'businesswp' ),
			'panel'    => 'layout',
			'priority' => 5,
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'sticky_section', 
		array(
			'title'    => esc_html__( 'Sticky Navigation', 'businesswp' ),
			'panel'    => 'layout',
			'priority' => 6,
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'canvas_section', 
		array(
			'title'    => esc_html__( 'Off Canvas Navigation', 'businesswp' ),
			'panel'    => 'layout',
			'priority' => 7,
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'sidebar_section', 
		array(
			'title'    => esc_html__( 'Sidebars', 'businesswp' ),
			'panel'    => 'layout',
			'priority' => 7,
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'blog_section', 
		array(
			'title'    => esc_html__( 'Blog', 'businesswp' ),
			'panel'    => 'layout',
			'priority' => 8,
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'footer_section', 
		array(
			'title'    => esc_html__( 'Footer', 'businesswp' ),
			'panel'    => 'layout',
			'priority' => 9,
		)
 ) );


/**************************************************
**** Front Page Sections
***************************************************/

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'businesswp_slider_section', 
		array(
			'title'    => esc_html__( 'Slider', 'businesswp' ),
			'panel'    => 'frontpage_panel',
			'priority' => apply_filters( 'businesswp_section_priority', 1, 'buisnesstrade_slider_section' ),
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'businesswp_about_section', 
		array(
			'title'    => esc_html__( 'About', 'businesswp' ),
			'panel'    => 'frontpage_panel',
			'priority' => apply_filters( 'businesswp_section_priority', 2, 'businesswp_about_section' ),
		)
 ) );


$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'businesswp_service_section', 
		array(
			'title'    => esc_html__( 'Service', 'businesswp' ),
			'panel'    => 'frontpage_panel',
			'priority' => apply_filters( 'businesswp_section_priority', 3, 'businesswp_service_section' ),
		)
 ) );


$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'businesswp_newsletter_section', 
		array(
			'title'    => esc_html__( 'Newsletter', 'businesswp' ),
			'panel'    => 'frontpage_panel',
			'priority' => apply_filters( 'businesswp_section_priority', 4, 'businesswp_newsletter_section' ),
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'businesswp_counter_section', 
		array(
			'title'    => esc_html__( 'Counter', 'businesswp' ),
			'panel'    => 'frontpage_panel',
			'priority' => apply_filters( 'businesswp_section_priority', 5, 'businesswp_counter_section' ),
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'businesswp_portfolio_section', 
		array(
			'title'    => esc_html__( 'Portfolio', 'businesswp' ),
			'panel'    => 'frontpage_panel',
			'priority' => apply_filters( 'businesswp_section_priority', 6, 'businesswp_portfolio_section' ),
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'businesswp_callout_section', 
		array(
			'title'    => esc_html__( 'Callout', 'businesswp' ),
			'panel'    => 'frontpage_panel',
			'priority' => apply_filters( 'businesswp_section_priority', 7, 'businesswp_callout_section' ),
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'businesswp_pricing_section', 
		array(
			'title'    => esc_html__( 'Pricing', 'businesswp' ),
			'panel'    => 'frontpage_panel',
			'priority' => apply_filters( 'businesswp_section_priority', 8, 'businesswp_pricing_section' ),
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'businesswp_testimonial_section', 
		array(
			'title'    => esc_html__( 'Testimonial', 'businesswp' ),
			'panel'    => 'frontpage_panel',
			'priority' => apply_filters( 'businesswp_section_priority', 9, 'businesswp_testimonial_section' ),
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'businesswp_team_section', 
		array(
			'title'    => esc_html__( 'Team', 'businesswp' ),
			'panel'    => 'frontpage_panel',
			'priority' => apply_filters( 'businesswp_section_priority', 10, 'businesswp_team_section' ),
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'businesswp_blog_section', 
		array(
			'title'    => esc_html__( 'News', 'businesswp' ),
			'panel'    => 'frontpage_panel',
			'priority' => apply_filters( 'businesswp_section_priority', 11, 'businesswp_blog_section' ),
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'businesswp_client_section', 
		array(
			'title'    => esc_html__( 'Client', 'businesswp' ),
			'panel'    => 'frontpage_panel',
			'priority' => apply_filters( 'businesswp_section_priority', 12, 'businesswp_client_section' ),
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'businesswp_contact_section', 
		array(
			'title'    => esc_html__( 'Contact', 'businesswp' ),
			'panel'    => 'frontpage_panel',
			'priority' => apply_filters( 'businesswp_section_priority', 13, 'businesswp_contact_section' ),
		)
 ) );

/**************************************************
**** Theme Templates Section
***************************************************/

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'aboutus_page_sections', 
		array(
			'title'    => esc_html__( 'About Us Template', 'businesswp' ),
			'panel'    => 'theme_templates_panel',
			'priority' => 1,
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'services_page_sections', 
		array(
			'title'    => esc_html__( 'Services Template', 'businesswp' ),
			'panel'    => 'theme_templates_panel',
			'priority' => 2,
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'contactus_page_sections', 
		array(
			'title'    => esc_html__( 'Contact Us Template', 'businesswp' ),
			'panel'    => 'theme_templates_panel',
			'priority' => 3,
		)
 ) );

/**************************************************
**** Theme Colors Section
***************************************************/

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'primary_colors', 
		array(
			'title'    => esc_html__( 'Primary Color', 'businesswp' ),
			'panel'    => 'theme_color_panel',
			'priority' => 1,
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'body_colors', 
		array(
			'title'    => esc_html__( 'Body', 'businesswp' ),
			'panel'    => 'theme_color_panel',
			'priority' => 1,
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'tb_colors', 
		array(
			'title'    => esc_html__( 'Top Bar', 'businesswp' ),
			'panel'    => 'theme_color_panel',
			'priority' => 2,
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'header_colors', 
		array(
			'title'    => esc_html__( 'Header', 'businesswp' ),
			'panel'    => 'theme_color_panel',
			'priority' => 3,
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'p_nav_colors', 
		array(
			'title'    => esc_html__( 'Primary Navigation', 'businesswp' ),
			'panel'    => 'theme_color_panel',
			'priority' => 4,
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	's_nav_colors', 
		array(
			'title'    => esc_html__( 'Secondary Navigation', 'businesswp' ),
			'panel'    => 'theme_color_panel',
			'priority' => 5,
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'c_nav_colors', 
		array(
			'title'    => esc_html__( 'Off Canvas Navigation', 'businesswp' ),
			'panel'    => 'theme_color_panel',
			'priority' => 6,
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'button_colors', 
		array(
			'title'    => esc_html__( 'Button', 'businesswp' ),
			'panel'    => 'theme_color_panel',
			'priority' => 7,
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'content_colors', 
		array(
			'title'    => esc_html__( 'Content', 'businesswp' ),
			'panel'    => 'theme_color_panel',
			'priority' => 8,
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'sidebar_colors', 
		array(
			'title'    => esc_html__( 'Sidebar Widgets', 'businesswp' ),
			'panel'    => 'theme_color_panel',
			'priority' => 9,
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'form_colors', 
		array(
			'title'    => esc_html__( 'Form', 'businesswp' ),
			'panel'    => 'theme_color_panel',
			'priority' => 10,
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'footer_colors', 
		array(
			'title'    => esc_html__( 'Footer', 'businesswp' ),
			'panel'    => 'theme_color_panel',
			'priority' => 11,
		)
 ) );

/**************************************************
**** Background Images Section
***************************************************/

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'body_image', 
		array(
			'title'    => esc_html__( 'Body', 'businesswp' ),
			'panel'    => 'background_images_panel',
			'priority' => 1,
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'content_image', 
		array(
			'title'    => esc_html__( 'Content', 'businesswp' ),
			'panel'    => 'background_images_panel',
			'priority' => 2,
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'sidebar_image', 
		array(
			'title'    => esc_html__( 'Sidebar', 'businesswp' ),
			'panel'    => 'background_images_panel',
			'priority' => 3,
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'footer_widget_image', 
		array(
			'title'    => esc_html__( 'Footer Widget', 'businesswp' ),
			'panel'    => 'background_images_panel',
			'priority' => 4,
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'footer_image', 
		array(
			'title'    => esc_html__( 'Footer', 'businesswp' ),
			'panel'    => 'background_images_panel',
			'priority' => 5,
		)
 ) );

/**************************************************
**** Typography Section
***************************************************/

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'body_typography', 
		array(
			'title'    => esc_html__( 'Body', 'businesswp' ),
			'panel'    => 'typography_panel',
			'priority' => 1,
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'topbar_typography', 
		array(
			'title'    => esc_html__( 'Top Bar', 'businesswp' ),
			'panel'    => 'typography_panel',
			'priority' => 2,
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'header_typography', 
		array(
			'title'    => esc_html__( 'Header', 'businesswp' ),
			'panel'    => 'typography_panel',
			'priority' => 3,
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'primary_nav_typography', 
		array(
			'title'    => esc_html__( 'Primary Navigation', 'businesswp' ),
			'panel'    => 'typography_panel',
			'priority' => 4,
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'secondary_nav_typography', 
		array(
			'title'    => esc_html__( 'Secondary Navigation', 'businesswp' ),
			'panel'    => 'typography_panel',
			'priority' => 5,
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'canvas_nav_typography', 
		array(
			'title'    => esc_html__( 'Off Canvas Navigation', 'businesswp' ),
			'panel'    => 'typography_panel',
			'priority' => 6,
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'button_typography', 
		array(
			'title'    => esc_html__( 'Button', 'businesswp' ),
			'panel'    => 'typography_panel',
			'priority' => 7,
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'heading_typography', 
		array(
			'title'    => esc_html__( 'Headings', 'businesswp' ),
			'panel'    => 'typography_panel',
			'priority' => 8,
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'widget_typography', 
		array(
			'title'    => esc_html__( 'Widgets', 'businesswp' ),
			'panel'    => 'typography_panel',
			'priority' => 9,
		)
 ) );

$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
	'footer_typography', 
		array(
			'title'    => esc_html__( 'Footer', 'businesswp' ),
			'panel'    => 'typography_panel',
			'priority' => 10,
		)
 ) );