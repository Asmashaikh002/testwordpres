<?php

require get_template_directory() . '/inc/customizer/customizer-notify/businesswp-customizer-notify.php';

$config_customizer = array(
	'recommended_plugins'       => array(
		'britetechs-companion' => array(
			'recommended' => true,
			'description' => sprintf('Install and activate <strong>Britetechs Companion</strong> plugin for taking full advantage of all the features this theme has to offer %s.', 'businesswp'),
		),
	),
	'recommended_actions'       => array(),
	'recommended_actions_title' => esc_html__( 'Recommended Actions', 'businesswp' ),
	'recommended_plugins_title' => esc_html__( 'Recommended Plugin', 'businesswp' ),
	'install_button_label'      => esc_html__( 'Install and Activate', 'businesswp' ),
	'activate_button_label'     => esc_html__( 'Activate', 'businesswp' ),
	'deactivate_button_label'   => esc_html__( 'Deactivate', 'businesswp' ),
);

Businesswp_Customizer_Notify::init( apply_filters( 'businesswp_customizer_notify_array', $config_customizer ) );