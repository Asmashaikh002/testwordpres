<?php
if ( ! class_exists( 'Businesswp_Customizer_Partials' ) ) {

	class Businesswp_Customizer_Partials {

		private static $instance;

		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public static function blogname() {
			return get_bloginfo( 'name' );
		}

		public static function description() {
			return get_bloginfo( 'description' );
		}

		public static function service_subtitle() {
			return businesswp_get_option( 'service_subtitle' );
		}

		public static function service_title() {
			return businesswp_get_option( 'service_title' );
		}

		public static function service_desc() {
			return businesswp_get_option( 'service_desc' );
		}

		public static function portfolio_subtitle() {
			return businesswp_get_option( 'portfolio_subtitle' );
		}

		public static function portfolio_title() {
			return businesswp_get_option( 'portfolio_title' );
		}

		public static function portfolio_desc() {
			return businesswp_get_option( 'service_desc' );
		}

		public static function testimonial_subtitle() {
			return businesswp_get_option( 'testimonial_subtitle' );
		}

		public static function testimonial_title() {
			return businesswp_get_option( 'testimonial_title' );
		}

		public static function testimonial_desc() {
			return businesswp_get_option( 'testimonial_desc' );
		}

		public static function team_subtitle() {
			return businesswp_get_option( 'team_subtitle' );
		}

		public static function team_title() {
			return businesswp_get_option( 'team_title' );
		}

		public static function team_desc() {
			return businesswp_get_option( 'team_desc' );
		}

		public static function blog_subtitle() {
			return businesswp_get_option( 'blog_subtitle' );
		}

		public static function blog_title() {
			return businesswp_get_option( 'blog_title' );
		}

		public static function blog_desc() {
			return businesswp_get_option( 'blog_desc' );
		}

		public static function pricing_subtitle() {
			return businesswp_get_option( 'pricing_subtitle' );
		}

		public static function pricing_title() {
			return businesswp_get_option( 'pricing_title' );
		}

		public static function pricing_desc() {
			return businesswp_get_option( 'pricing_desc' );
		}

		public static function client_subtitle() {
			return businesswp_get_option( 'client_subtitle' );
		}

		public static function client_title() {
			return businesswp_get_option( 'client_title' );
		}

		public static function client_desc() {
			return businesswp_get_option( 'client_desc' );
		}

		public static function contact_subtitle() {
			return businesswp_get_option( 'contact_subtitle' );
		}

		public static function contact_title() {
			return businesswp_get_option( 'contact_title' );
		}

		public static function contact_desc() {
			return businesswp_get_option( 'contact_desc' );
		}
	}

}

Businesswp_Customizer_Partials::get_instance();

function businesswp_get_range_slider_value($control_value){

	if( is_string( $control_value ) && is_array( json_decode( $control_value, true ) ) ){

    $json = json_decode( $control_value );
        return $json;
        /* it will return an array like this:
            array(
                'mobile' => 312,
                'tablet' => 754,
                'desktop' => 1123,
            );
        */
    } else {
        /* Media queries are disabled so it will return a simple value */
        return $control_value;
    }

}