<?php
class Businesswp_Customize_Toggle_Control extends Businesswp_Customize_Base_Control {

	public $type = 'businesswp-toggle';

	public function enqueue() {
		wp_enqueue_style( 'businesswp-toggle-control', get_template_directory_uri() . '/inc/customizer/customizer-toggle/css/toggle.css', array(), 999 );

		wp_enqueue_style( 'businesswp-toggle-control', get_template_directory_uri() . '/inc/customizer/customizer-toggle/css/toggle.css', array(), 999 );
	}

	protected function content_template() {
		?>

		<label for="toggle_{{ data.id }}">
			<span class="customize-control-title">
				{{{ data.label }}}
			</span>
			<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
			<# } #>
			<input class="screen-reader-text" {{{ data.inputAttrs }}} name="toggle_{{ data.id }}"
					id="toggle_{{ data.id }}" type="checkbox" value="{{ data.value }}" {{{ data.link }}}<# if ( true === data.value ) { #> checked<# } #> hidden />
			<span class="switch"></span>
		</label>

		<?php
	}

	protected function render_content() {

	}
}