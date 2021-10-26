<?php
class Businesswp_Customize_Base_Control extends WP_Customize_Control {

	public function enqueue() {

		// Color picker alpha.
		wp_enqueue_script( 'wp-color-picker-alpha', BUSINESSWP_THEME_URI . '/customizer/customizer-base/js/wp-color-picker-alpha.js', array( 'wp-color-picker' ), '2.1.3', true );
		
		$color_picker_strings = array(
			'clear'            => __( 'Clear', 'businesswp' ),
			'clearAriaLabel'   => __( 'Clear color', 'businesswp' ),
			'defaultString'    => __( 'Default', 'businesswp' ),
			'defaultAriaLabel' => __( 'Select default color', 'businesswp' ),
			'pick'             => __( 'Select Color', 'businesswp' ),
			'defaultLabel'     => __( 'Color value', 'businesswp' ),
		);
		wp_localize_script( 'wp-color-picker-alpha', 'wpColorPickerL10n', $color_picker_strings );
		wp_enqueue_script( 'wp-color-picker-alpha' );

		// Scripts for nesting panel/section.
		wp_enqueue_script( 'businesswp-extend-customizer', BUSINESSWP_THEME_URI . '/customizer/customizer-base/js/extend-customizer.js', array( 'jquery' ), false, true );
		wp_enqueue_style( 'businesswp-extend-customizer', BUSINESSWP_THEME_URI . '/customizer/customizer-base/css/extend-customizer.css' );
	}

	public function to_json() {

		parent::to_json();

		$this->json['default'] = $this->setting->default;
		if ( isset( $this->default ) ) {
			$this->json['default'] = $this->default;
		}

		$this->json['id']      = $this->id;
		$this->json['value']   = $this->value();
		$this->json['choices'] = $this->choices;
		$this->json['link']    = $this->get_link();
		$this->json['l10n']    = $this->l10n();

		$this->json['inputAttrs'] = '';
		foreach ( $this->input_attrs as $attr => $value ) {
			$this->json['inputAttrs'] .= $attr . '="' . esc_attr( $value ) . '" ';
		}

	}

	protected function render_content() {
	}

	protected function content_template() {
	}

	protected function l10n() {
		return array();
	}

}