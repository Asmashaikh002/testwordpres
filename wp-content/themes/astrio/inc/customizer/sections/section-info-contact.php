<?php

/*
 * Homepage Info Contact Section
 */

function astrio_frontpage_info_contact_sections_settings( $wp_customize ){

	$wp_customize->add_section( new Businesswp_Custom_Section( $wp_customize, 
		'businesswp_info_contact_section', 
			array(
				'title'    => esc_html__( 'Info Contact', 'astrio' ),
				'panel'    => 'frontpage_panel',
				'priority' => apply_filters( 'businesswp_section_priority', 2, 'businesswp_info_contact_section' ),
			)
	 ) );

	if ( class_exists( 'Businesswp_Customizer_Repeater' ) ) {

			$wp_customize->add_setting('businesswp_option[info_contact_content]', array(
				'default'           => astrio_info_contact_default_contents(),
				'sanitize_callback' => 'businesswp_customizer_repeater_sanitize',
				'type' => 'option',
			) );

		    $wp_customize->add_control( new Businesswp_Customizer_Repeater( $wp_customize,'businesswp_option[info_contact_content]', array(
				'label'                             => esc_html__( 'Info Items Content', 'astrio' ),
				'section'                           => 'businesswp_info_contact_section',
				'priority' 							=> 100,
				'add_field_label'                   => esc_html__( 'Add new slide item', 'astrio' ),
				'item_name'                         => esc_html__( 'Slide Item', 'astrio' ),
				'customizer_repeater_image_control' => false,
				'customizer_repeater_icon_control' => true,
				'customizer_repeater_title_control' => true,
				'customizer_repeater_subtitle_control' => false,
				'customizer_repeater_text_control'  => true,
				'customizer_repeater_button_text_control' => false,
				'customizer_repeater_link_control'  => false,
				'customizer_repeater_checkbox_control' => false,
				'customizer_repeater_content_align' => false,
				)
		    ) );

		}

	}

add_action( 'customize_register', 'astrio_frontpage_info_contact_sections_settings', 40 );

if ( ! class_exists( 'astrio_Customize_Frontpage_Info_Contact_Section_Common_Settings' )  ) :

	class astrio_Customize_Frontpage_Info_Contact_Section_Common_Settings extends Businesswp_Custom_Base_Customize_Settings {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			$option = businesswp_theme_default_data();

			$elements = array();

			$section_names = array(
				'info_contact',
			);

			foreach ($section_names as $key => $name) {

				$title = ucwords($name);


				$elements['businesswp_option['.$name.'_show]'] = array(
					'setting' => array(
						'default'           => $option[$name.'_show'],
						'sanitize_callback' => array( 'Businesswp_Customizer_Sanitize', 'sanitize_checkbox' ),
						'type' => 'option',
					),
					'control' => array(
						'label'    => sprintf(__( '%s Enable', 'astrio' ),$title),
						'section'  => 'businesswp_'.$name.'_section',
						'type'     => 'toggle',
						'priority' => 5,
					),
				);

				$elements['businesswp_option['.$name.'_container_width]'] = array(
					'setting' => array(
						'default'           => $option[$name.'_container_width'],
						'sanitize_callback' => array( 'Businesswp_Customizer_Sanitize', 'sanitize_select' ),
						'type' => 'option',
					),
					'control' => array(
						'label'    => sprintf(__( 'Container Width', 'astrio' )),
						'section'  => 'businesswp_'.$name.'_section',
						'type'     => 'select',
						'is_default_type' => true,
						'choices' => array(
							'container'=>'Container',
							'container-fluid'=>'Full',
						),
						'priority' => 45,
					),
				);

				$elements['businesswp_option[businesswp_'.$name.'_upgrade]'] = array(
					'setting' => array(
						'type' => 'option',
					),
					'control' => array(
						'label'    => sprintf(esc_html__( '%s', 'astrio' ), $name ),
						'section'  => 'businesswp_'.$name.'_section',
						'type'     => 'upgrade',
						'priority' => 101,
						'is_default_type' => false,
					),
				);
			}

			return $elements;

		}

	}

	 new astrio_Customize_Frontpage_Info_Contact_Section_Common_Settings();
	
endif;

if ( ! function_exists( 'astrio_info_contact_default_contents' ) ):

      function astrio_info_contact_default_contents(){

            return json_encode( array(
                  array(
                  'icon_value'  => 'fa-american-sign-language-interpreting',
                  'title'      => esc_html__( 'Quick Response', 'astrio' ),
                  'text'       => esc_html__( 'Lorem ipsum dolor sit amet consectetur.', 'astrio' ),
                  'link'       => '#',
                  'id'         => 'customizer_repeater_58d7gh7f20b10',
                  ),
                  array(
                  'icon_value'  => 'fa-user',
                  'title'      => esc_html__( 'Experience Team', 'astrio' ),
                  'text'       => esc_html__( 'Lorem ipsum dolor sit amet consectetur.', 'astrio' ),
                  'link'       => '#',
                  'id'         => 'customizer_repeater_58d7gh7f20b20',
                  ),
                  array(
                  'icon_value'  => 'fa-commenting',
                  'title'      => esc_html__( '24x7 Supports', 'astrio' ),
                  'text'       => esc_html__( 'Lorem ipsum dolor sit amet consectetur.', 'astrio' ),
                  'link'       => '#',
                  'id'         => 'customizer_repeater_58d7gh7f20b30',
                  ),
              ) );

      }

endif;