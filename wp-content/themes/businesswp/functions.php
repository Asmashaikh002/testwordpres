<?php

// Theme Core Constants

define( 'BUSINESSWP_THEME_DIR', get_template_directory() );

define( 'BUSINESSWP_THEME_URI', get_template_directory_uri() );

final class Businesswp_Main_Class {

	public function __construct(){

		add_action( 'after_setup_theme', array( $this, 'constants' ) );

		// Include all core theme function files
		add_action( 'after_setup_theme', array( $this, 'include_functions' ) );

		// theme setup
		add_action( 'after_setup_theme', array( $this, 'theme_setup' ) );

		// include classes
		add_action( 'after_setup_theme', array( $this, 'classes' ) );

		// register sidebars
		add_action( 'widgets_init', array( $this, 'register_sidebars' ) );

		if( ! is_admin() ){
			add_action( 'wp_enqueue_scripts', array( $this, 'theme_css_and_js' ) );
		}
	}

	public function constants(){

		$version = self::theme_version();
		$name = self::theme_name();

		// Theme Version
		define( 'BUSINESSWP_THEME_VERSION' , $version );
		define( 'BUSINESSWP_THEME_NAME', $name );

		define( 'BUSINESSWP_JS_DIR_URI', BUSINESSWP_THEME_URI .'/js/' );
		define( 'Businesswp_CSS_DIR_URI', BUSINESSWP_THEME_URI .'/css/' );

		// Includes Paths
		define( 'BUSINESSWP_INC_DIR', BUSINESSWP_THEME_DIR .'/inc/' );
		define( 'BUSINESSWP_INC_DIR_URI', BUSINESSWP_THEME_URI .'/inc/' );

		define( 'BUSINESSWP_CUSTOMIZER_DIR', BUSINESSWP_THEME_DIR .'/inc/customizer/' );
		define( 'BUSINESSWP_CUSTOMIZER_DIR_URI', BUSINESSWP_THEME_URI .'/inc/customizer/' );

		// Check if plugins are active
		define( 'BUSINESSWP_BC_ACTIVE', function_exists('bc_init') );
	}

	public static function theme_version(){
		$theme = wp_get_theme();
		return $theme->get( 'Version' );
	}

	public static function theme_name(){
		$theme = wp_get_theme();
		return $theme->get( 'Name' );
	}

	public static function include_functions(){

		$inc_dir = BUSINESSWP_INC_DIR;
		$customizer_dir = BUSINESSWP_CUSTOMIZER_DIR;

		// default theme data file
		require_once ( $inc_dir .'businesswp-theme-default-data.php');

		// template tags file include
		require_once ( $inc_dir .'template-tags.php');

		require_once ( $inc_dir .'markup.php' );

		// helpers functions file include
		require_once ( $inc_dir .'helpers.php');

		require_once ( $inc_dir .'front-page-helpers.php' );

		// classes file include
		require_once ( $inc_dir .'classes/class-businesswp-walker-page.php');
		
		require_once ( $inc_dir .'classes/class-frontend-css.php');

		require_once( $customizer_dir . '/core-custom-section-panel/businesswp-custom-base-customizer-settings.php');

		//customizer files include
		require_once ( $customizer_dir .'businesswp-theme-customizer.php');

		// Customizer Repeater Control include
		require_once ( $customizer_dir . '/customizer-repeater/functions.php');

		//Customizer Theme Options
		require_once ( $customizer_dir . '/theme-options/businesswp-theme-layout-settings.php');
		
		// front end dynamic css
		require_once ( $inc_dir .'css-output.php' );


		if( !class_exists('Businesswp_Premium_Setup') ){

			require_once ( $inc_dir .'install/customizer_recommended_plugin.php' );
		}
		
	}

	public static function theme_setup(){

		$GLOBALS['content_width'] = 700;

		// Load text domain
		load_theme_textdomain( 'businesswp', BUSINESSWP_INC_DIR .'/lang' );

		// Posts and comments RSS feed links to head
		add_theme_support( 'automatic-feed-links' );

		// Register menus
		register_nav_menus( array(
			'topbar'     => esc_html__( 'Top Bar', 'businesswp' ),
			'primary'    => esc_html__( 'Primary', 'businesswp' ),
			'footer'     => esc_html__( 'Footer', 'businesswp' ),
		) );

		// Custom logo.
		$logo_width  = 120;
		$logo_height = 90;

		// If the retina setting is active, double the recommended width and height.
		if ( get_theme_mod( 'retina_logo', false ) ) {
			$logo_width  = floor( $logo_width * 2 );
			$logo_height = floor( $logo_height * 2 );
		}

		add_theme_support(
			'custom-logo',
			array(
				'height'      => $logo_height,
				'width'       => $logo_width,
				'flex-height' => true,
				'flex-width'  => true,
			)
		);

		// Title tag supports
		add_theme_support( 'title-tag' );

		// Post Formats
		add_theme_support( 'post-formats', array( 
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'status',
			'audio',
		) );

		// Featured Thumbnails on posts and pages
		add_theme_support( 'post-thumbnails' );

		// Custom header image
		add_theme_support( 'custom-header', apply_filters( 'businesswp_custom_header', array(
			'width'              => 1900,
			'height'             => 1200,
			'flex-height'        => true,
			'header-text'        => false,
			'default-image' => get_template_directory_uri() . '/img/header-bg.png',
		) ) );

		// Core markup for search form, comment form, comments, galleries, captions and widgets for output valid HTML5.
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'widgets',
		) );

		// WooCommerce support.
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		// Add editor style
		add_editor_style( 'css/editor-style.css' );

		// Selective refreshing of widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		$recommend_plugins = array();

		if( ! class_exists('Businesswp_Premium_Setup') ){

			$recommend_plugins['britetechs-companion'] = array(
                'name' => esc_html__( 'Britetechs Companion', 'businesswp' ),
                'active_filename' => 'britetechs-companion/britetechs-companion.php',
				'desc' => esc_html__( 'We highly recommend that you install the britetechs companion plugin to gain access to the extra theme sections.', 'businesswp' ),
            );

            $recommend_plugins['contact-form-7'] = array(
                'name' => esc_html__( 'Contact Form 7', 'businesswp' ),
                'active_filename' => 'contact-form-7/wp-contact-form-7.php',
				'desc' => esc_html__( 'This is also recommended that you install the contact form plugin to show contact form on the contact page.', 'businesswp' )
            );

		}else{
			$recommend_plugins['wp-google-maps'] = array(
                'name' => esc_html__( 'WP Google Maps', 'businesswp' ),
                'active_filename' => 'wp-google-maps/wpGoogleMaps.php',
				'desc' => esc_html__( 'This is also recommended that you install the google map plugin to show google map on the contact us page.', 'businesswp' )
            );

			$recommend_plugins['mailchimp-for-wp'] = array(
                'name' => esc_html__( 'Mailchimp For WP', 'businesswp' ),
                'active_filename' => 'mailchimp-for-wp/mailchimp-for-wp.php',
				'desc' => esc_html__( 'This is also recommended that you install the newsletter form plugin to show subscribe form on the homepage newsletter section.', 'businesswp' )
            );

			$recommend_plugins['contact-form-7'] = array(
                'name' => esc_html__( 'Contact Form 7', 'businesswp' ),
                'active_filename' => 'contact-form-7/wp-contact-form-7.php',
				'desc' => esc_html__( 'This is also recommended that you install the contact form plugin to show contact form on the contact page.', 'businesswp' )
            );
		}

		add_theme_support( 'recommend-plugins', $recommend_plugins );

		// load starter Content.

		add_theme_support( 'starter-content', businesswp_wp_starter_pack() );
	}

	public static function classes(){
	}

	public static function register_sidebars(){

		$heading = 'h4';
		$heading = apply_filters( 'businesswp_sidebar_heading', $heading );

		// Default Sidebar
		register_sidebar( array(
			'name'			=> esc_html__( 'Right Sidebar', 'businesswp' ),
			'id'			=> 'sidebar',
			'description'	=> esc_html__( 'This sidebar will be displayed in the left or right sidebar area.', 'businesswp' ),
			'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
			'after_widget'	=> '</aside>',
			'before_title'	=> '<'. $heading .' class="widget-title">',
			'after_title'	=> '</'. $heading .'>',
		) );

		// Left Sidebar
		register_sidebar( array(
			'name'			=> esc_html__( 'Left Sidebar', 'businesswp' ),
			'id'			=> 'sidebar-2',
			'description'	=> esc_html__( 'This sidebar area are used in the left sidebar region if you use the Both Sidebars layout.', 'businesswp' ),
			'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
			'after_widget'	=> '</aside>',
			'before_title'	=> '<'. $heading .' class="widget-title">',
			'after_title'	=> '</'. $heading .'>',
		) );

		// Footer Sidebar 1
		register_sidebar( array(
			'name'			=> esc_html__( 'Footer Sidebar 1', 'businesswp' ),
			'id'			=> 'footer-1',
			'description'	=> esc_html__( 'Footer 1 Sidebar Area', 'businesswp' ),
			'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
			'after_widget'	=> '</aside>',
			'before_title'	=> '<'. $heading .' class="widget-title">',
			'after_title'	=> '</'. $heading .'>',
		) );

		// Footer Sidebar 2
		register_sidebar( array(
			'name'			=> esc_html__( 'Footer Sidebar 2', 'businesswp' ),
			'id'			=> 'footer-2',
			'description'	=> esc_html__( 'Footer 2 Sidebar Area', 'businesswp' ),
			'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
			'after_widget'	=> '</aside>',
			'before_title'	=> '<'. $heading .' class="widget-title">',
			'after_title'	=> '</'. $heading .'>',
		) );

		// Footer Sidebar 3
		register_sidebar( array(
			'name'			=> esc_html__( 'Footer Sidebar 3', 'businesswp' ),
			'id'			=> 'footer-3',
			'description'	=> esc_html__( 'Footer 3 Sidebar Area', 'businesswp' ),
			'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
			'after_widget'	=> '</aside>',
			'before_title'	=> '<'. $heading .' class="widget-title">',
			'after_title'	=> '</'. $heading .'>',
		) );

		// Footer Sidebar 4
		register_sidebar( array(
			'name'			=> esc_html__( 'Footer Sidebar 4', 'businesswp' ),
			'id'			=> 'footer-4',
			'description'	=> esc_html__( 'Footer 4 Sidebar Area', 'businesswp' ),
			'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
			'after_widget'	=> '</aside>',
			'before_title'	=> '<'. $heading .' class="widget-title">',
			'after_title'	=> '</'. $heading .'>',
		) );

		// Top Bar
		register_sidebar( array(
			'name'			=> esc_html__( 'Top Bar', 'businesswp' ),
			'id'			=> 'topbar',
			'description'	=> esc_html__( 'This sidebar will be displayed in the header area.', 'businesswp' ),
			'before_widget'	=> '<aside id="%1$s" class="widget mb-0 mt-5 %2$s">',
			'after_widget'	=> '</aside>',
			'before_title'	=> '<'. $heading .' class="widget-title">',
			'after_title'	=> '</'. $heading .'>',
		) );

		// Woocommerce
		register_sidebar( array(
			'name'			=> esc_html__( 'Woocommerce', 'businesswp' ),
			'id'			=> 'woocommerce',
			'description'	=> esc_html__( 'This sidebar will be displayed in the woocommerce pages.', 'businesswp' ),
			'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
			'after_widget'	=> '</aside>',
			'before_title'	=> '<'. $heading .' class="widget-title">',
			'after_title'	=> '</'. $heading .'>',
		) );
	}

	public static function theme_css_and_js() {

		$theme = wp_get_theme( 'businesswp' );
	    $version = $theme->get( 'Version' );

		$disableGoogleFonts = get_theme_mod('Businesswp_hide_g_font', 0 );

		if ( $disableGoogleFonts == false ) {
	    	wp_enqueue_style('google-fonts', businesswp_fonts_url(), array(), $version);
	    }

	    // CSS Enqueue
		
		wp_enqueue_style( 'bootstrap', get_template_directory_uri() .'/css/bootstrap.css', array(), $version );

		wp_enqueue_style( 'meanmenu', get_template_directory_uri() .'/css/meanmenu.css', array(), $version );

		wp_enqueue_style( 'carousel', get_template_directory_uri() .'/css/owl.carousel.css', array(), $version );
		
		wp_enqueue_style( 'animate', get_template_directory_uri() .'/css/animate.css', array(), $version );

		wp_enqueue_style( 'businesswp-woo', get_template_directory_uri() .'/css/woocommerce.css', array(), $version );

		wp_enqueue_style( 'fontawesome', get_template_directory_uri() .'/inc/customizer/customizer-repeater/css/font-awesome.css', array(), '4.6.3' );
		
		wp_enqueue_style( 'businesswp-style', get_template_directory_uri() .'/style.css', array(), $version );

		// JS Enqueue
		wp_enqueue_script( 'popper', get_template_directory_uri() . '/js/popper.js', array( 'jquery' ), $version, true );
		
		wp_enqueue_script( 'meanmenu', get_template_directory_uri() . '/js/jquery.meanmenu.js', array( 'jquery' ), $version, true );

		wp_enqueue_script( 'smooth-scroll', get_template_directory_uri() .'/js/smooth-scroll.js', array( 'jquery' ), $version, true );

		wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array( 'jquery' ), $version, true );
		
		wp_enqueue_script( 'carousel', get_template_directory_uri() . '/js/owl.carousel.js', array(), $version, true );

		wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/wow.js', array(), $version, true );
		
		wp_enqueue_script( 'parallaxie', get_template_directory_uri() . '/js/parallaxie.js', array(), $version, true );
		
		wp_enqueue_script( 'jquery-waypoints', get_template_directory_uri() .'/js/jquery.waypoints.js', array( 'jquery' ), $version, true );

		wp_enqueue_script( 'businesswp-main', get_template_directory_uri() . '/js/main.js', array(), $version, true );

		$businesswp_settings = array(
			'homeUrl'     => esc_url( home_url( '/' ) ),
			'nav_mobilebtn_breakpoint' => absint( businesswp_get_option('nav_mobilebtn_breakpoint') ),
			'nav_mobilebtn_label' => esc_attr( businesswp_get_option('nav_mobilebtn_label') ),
			'secondary_mobilebtn_label' => esc_attr( businesswp_get_option('secondary_mobilebtn_label') ),
			'sticky_nav' => esc_attr( businesswp_get_option('sticky_nav') ),
			'slider_nav' => ( businesswp_get_option('slider_nav_show') == false ? false : true ),
			'slider_dots' => ( businesswp_get_option('slider_pagination_show') == false ? false : true ),
			'slider_smart_speed' => esc_attr( businesswp_get_option('slider_smart_speed') ),
			'slide_scroll_speed' => esc_attr( businesswp_get_option('slider_scroll_speed') ),
			'slide_mouse_drag'	 =>	esc_attr( businesswp_get_option('slider_mouse_drag') ),
			'slide_animatein'	 => esc_attr( businesswp_get_option('slider_animatein') ),
			'slide_animateout'	 =>	esc_attr( businesswp_get_option('slider_animateout') ),
			'primary_color' => esc_attr( businesswp_get_option('primary_color') ),			 
		);

		wp_localize_script( 'businesswp-main', 'businesswp_settings', $businesswp_settings );
	}
}

new Businesswp_Main_Class;

/**
 * Register default Google fonts
 */

if ( ! function_exists( 'businesswp_fonts_url' ) ) :
	
	function businesswp_fonts_url() {
	    $fonts_url = '';

	    $Lato = _x( 'on', 'Lato font: on or off', 'businesswp' );
	    $Roboto = _x( 'on', 'Roboto font: on or off', 'businesswp' );

	    if ( 'off' !== $Roboto ) {
	        $font_families = array();

	        if ( 'off' !== $Roboto ) {
	            $font_families[] = 'Roboto:100,200,400,500,600,700,300,100,800,900,italic';
	        }

	        if ( 'off' !== $Lato ) {
	            $font_families[] = 'Lato:100,200,400,500,600,700,300,100,800,900,italic';
	        }
			
	        $query_args = array(
	            'family' => urlencode( implode( '|', $font_families ) ),
	            'subset' => urlencode( 'latin,latin-ext' ),
	        );

	        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	    }

	    return esc_url_raw( $fonts_url );
	}
	
endif;

require_once get_template_directory() . '/inc/jetpack.php';

if( class_exists('woocommerce') ){
	require get_parent_theme_file_path('/woocommerce/functions.php');
	require get_parent_theme_file_path('/woocommerce/hooks.php');
}

/* Include Pro Package File */
if( file_exists(get_template_directory() . '/pro/businesswp-pro.php') ){
	require get_template_directory() . '/pro/businesswp-pro.php';
}