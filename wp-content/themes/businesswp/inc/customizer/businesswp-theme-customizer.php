<?php

if ( !class_exists( 'Businesswp_Theme_Customizer' ) ) :
	
	class Businesswp_Theme_Customizer {
		
		public function __construct() {

			add_action( 'customize_register', array( $this, 'customizer_panel_control' ) );

			add_action( 'customize_register', array( $this, 'customizer_register' ) );

			add_action( 'customize_register', array( $this, 'customizer_selective_refresh' ) );

			add_action( 'customize_preview_init', array( $this, 'customizer_preview_js' ) );

			add_action( 'after_setup_theme', array( $this, 'customizer_settings' ) );

			add_action( 'customize_controls_enqueue_scripts', array( $this, 'Businesswp_customizer_sections_script') );

		}

		public function customizer_panel_control( $wp_customize ) {

			/*** path ***/
			$customizer_dir = BUSINESSWP_CUSTOMIZER_DIR;

			require $customizer_dir . '/additional-customizer-controls.php';

			/*** Add customizer options extending classes ***/
			require $customizer_dir . '/core-custom-section-panel/businesswp-custom-panel.php';
			require $customizer_dir . '/core-custom-section-panel/businesswp-custom-section.php';

			/*** Register custom section panel ***/
			$wp_customize->register_panel_type( 'Businesswp_Custom_Panel' );
			$wp_customize->register_section_type( 'Businesswp_Custom_Section' );

			require_once( $customizer_dir . '/customizer-base/class/class-customize-base-control.php');
			require_once( $customizer_dir . '/customizer-toggle/class/class-customize-toggle.php');
			require_once( $customizer_dir . '/customizer-range/class/class-customize-range-value-control.php');
			require_once( $customizer_dir . '/customizer-tabs/class/class-customizer-tabs-control.php');
			require_once( $customizer_dir . '/customizer-alpha-color/class/class-customizer-alpha-color-control.php');

			$wp_customize->register_control_type( 'Businesswp_Customize_Toggle_Control' );
			$wp_customize->register_control_type( 'Businesswp_Customize_Range_Value_Control' );
			$wp_customize->register_control_type( 'Businesswp_Customize_Title_Control' );
			$wp_customize->register_section_type( 'Businesswp_Customize_Upgrade_Control' );
		}

		public function customizer_selective_refresh() {

			require_once BUSINESSWP_CUSTOMIZER_DIR . '/businesswp-customizer-sanitize.php';
			require_once BUSINESSWP_CUSTOMIZER_DIR . '/businesswp-customizer-partials.php';

		}


		public function customizer_register( $wp_customize ) {

			/*** Customizer selective ***/
			require BUSINESSWP_CUSTOMIZER_DIR . '/businesswp-customizer-selective.php';

			/*** Panels ***/
			require BUSINESSWP_CUSTOMIZER_DIR . '/businesswp-panels.php';

			/*** Sections ***/
			require BUSINESSWP_CUSTOMIZER_DIR . '/businesswp-sections.php';

		}

		public function customizer_settings() {

		}

		public function customizer_preview_js() {
			wp_enqueue_script( 'businesswp-customizer-preview', BUSINESSWP_CUSTOMIZER_DIR_URI . 'customizer-base/js/customizer.js', array( 'customize-preview' ), 999, true );
		}

		public function Businesswp_customizer_sections_script(){

			wp_enqueue_script( 'businesswp-customizer-sections-scroll-js', BUSINESSWP_CUSTOMIZER_DIR_URI .'customizer-base/js/customizer-section.js', array(),'', true  );

		}

	}

endif;

new Businesswp_Theme_Customizer();