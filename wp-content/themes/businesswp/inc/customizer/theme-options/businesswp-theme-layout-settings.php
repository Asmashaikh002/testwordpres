<?php

/**************************************************
**** Layout Sections Settings Register
***************************************************/

if ( ! class_exists( 'Businesswp_Customize_Layout_Sections_Settings' ) ) :

	class Businesswp_Customize_Layout_Sections_Settings extends Businesswp_Custom_Base_Customize_Settings {

		public function elements() {

			$option = businesswp_theme_default_data();

			$elements = array();

			// layout settings

			$elements['businesswp_option[layout]'] = array(
				'setting' => array(
					'default'           => $option['layout'],
					'sanitize_callback' => 'Businesswp_Customizer_Sanitize::sanitize_select',
					'type' => 'option',
				),
				'control' => array(
					'label'    => __( 'Layout', 'businesswp' ),
					'section'  => 'layout_section',
					'type'     => 'select',
					'choices'  => array(
						'wide' => __('Wide','businesswp'),
						'boxed' => __('Boxed','businesswp'),
					),
					'is_default_type' => true,
					'priority' => 1,
				),
			); 

			// container settings (container width)

			$elements['businesswp_option[container_width]'] = array(
				'setting' => array(
					'default'           => $option['container_width'],
					'sanitize_callback' => 'Businesswp_sanitize_range_value',
					'type' => 'option',
					'transport' => 'postMessage',
				),
				'control' => array(
					'label'    => sprintf(__( 'Container Width (px)', 'businesswp' )),
					'section'  => 'container_section',
					'type'     => 'range_value',
					'media_query' => false,
                    'input_attr' => array(
                        'mobile' => array(
                            'min' => 200,
                            'max' => 748,
                            'step' => 1,
                            'default_value' => 748,
                        ),
                        'tablet' => array(
                            'min' => 300,
                            'max' => 992,
                            'step' => 1,
                            'default_value' => 992,
                        ),
                        'desktop' => array(
                            'min' => 700,
                            'max' => 2000,
                            'step' => 1,
                            'default_value' => 1200,
                        ),
                    ),
					'is_default_type' => false,
					'priority' => 1,
				),
			);

			// container settings (content layout setting)

			$elements['businesswp_option[content_layout_setting]'] = array(
				'setting' => array(
					'default'           => $option['content_layout_setting'],
					'sanitize_callback' => 'Businesswp_Customizer_Sanitize::sanitize_select',
					'type' => 'option',
				),
				'control' => array(
					'label'    => sprintf(__( 'Content Layout', 'businesswp' )),
					'section'  => 'container_section',
					'type'     => 'select',
					'choices'     => array(
						'separate-containers' => __('Separate Containers', 'businesswp'),
						'one-container' => __('One Container', 'businesswp'),
					),
					'is_default_type' => true,
					'priority' => 4,
				),
			);

			// topbar (topbar show)

			$elements['businesswp_option[topbar_show]'] = array(
				'setting' => array(
					'default'           => $option['topbar_show'],
					'sanitize_callback' => 'Businesswp_Customizer_Sanitize::sanitize_checkbox',
					'type' => 'option',
				),
				'control' => array(
					'label'    => sprintf(__( 'Top Bar Enable', 'businesswp' )),
					'section'  => 'topbar_section',
					'type'     => 'toggle',
					'is_default_type' => false,
					'priority' => 1,
				),
			);

			// topbar (topbar width)

			$elements['businesswp_option[topbar_width]'] = array(
				'setting' => array(
					'default'           => $option['topbar_width'],
					'sanitize_callback' => 'Businesswp_Customizer_Sanitize::sanitize_select',
					'type' => 'option',
				),
				'control' => array(
					'label'    => sprintf(__( 'Top Bar Width', 'businesswp' )),
					'section'  => 'topbar_section',
					'type'     => 'select',
					'choices' => array(
						'container-fluid' => __('Full','businesswp'), 
						'container' => __('Contained','businesswp'),
					),
					'is_default_type' => true,
					'priority' => 2,
				),
			);

			// topbar (topbar inner width)

			$elements['businesswp_option[topbar_inner_width]'] = array(
				'setting' => array(
					'default'           => $option['topbar_inner_width'],
					'sanitize_callback' => 'Businesswp_Customizer_Sanitize::sanitize_select',
					'type' => 'option',
				),
				'control' => array(
					'label'    => sprintf(__( 'Top Bar Inner Width', 'businesswp' )),
					'section'  => 'topbar_section',
					'type'     => 'select',
					'choices' => array(
						'container-fluid' => __('Full','businesswp'), 
						'container' => __('Contained','businesswp'),
					),
					'is_default_type' => true,
					'priority' => 3,
				),
			);

			// topbar (topbar alignment)

			$elements['businesswp_option[topbar_alignment]'] = array(
				'setting' => array(
					'default'           => $option['topbar_alignment'],
					'sanitize_callback' => 'Businesswp_Customizer_Sanitize::sanitize_select',
					'type' => 'option',
				),
				'control' => array(
					'label'    => sprintf(__( 'Top Bar Alignment', 'businesswp' )),
					'section'  => 'topbar_section',
					'type'     => 'select',
					'choices' => array(
						'left' => __('Left','businesswp'), 
						'center' => __('Center','businesswp'),
						'right' => __('Right','businesswp'),
					),
					'is_default_type' => true,
					'priority' => 4,
				),
			);

			// topbar (topbar office time)

			$elements['businesswp_option[topbar_office_time]'] = array(
				'setting' => array(
					'default'           => $option['topbar_office_time'],
					'sanitize_callback' => 'sanitize_text_field',
					'type' => 'option',
				),
				'control' => array(
					'label'    => sprintf(__( 'Office Time', 'businesswp' )),
					'section'  => 'topbar_section',
					'type'     => 'text',
					'is_default_type' => true,
					'priority' => 5,
				),
			);

			// topbar (topbar email)

			$elements['businesswp_option[topbar_email]'] = array(
				'setting' => array(
					'default'           => $option['topbar_email'],
					'sanitize_callback' => 'sanitize_text_field',
					'type' => 'option',
				),
				'control' => array(
					'label'    => sprintf(__( 'Email', 'businesswp' )),
					'section'  => 'topbar_section',
					'type'     => 'text',
					'is_default_type' => true,
					'priority' => 6,
				),
			);

			// topbar (topbar phone)

			$elements['businesswp_option[topbar_phone]'] = array(
				'setting' => array(
					'default'           => $option['topbar_phone'],
					'sanitize_callback' => 'sanitize_text_field',
					'type' => 'option',
				),
				'control' => array(
					'label'    => sprintf(__( 'Phone', 'businesswp' )),
					'section'  => 'topbar_section',
					'type'     => 'text',
					'is_default_type' => true,
					'priority' => 7,
				),
			);

			//topbar (topbar tabs)
			$elements['businesswp_option[topbar_tabs]'] = array(
				'setting' => array(
					'default'           => '',
					'sanitize_callback' => 'sanitize_text_field',
					'type' => 'option',
				),
				'control' => array(
					'section'  => 'topbar_section',
					'type'     => 'tabs',
					'tabs'    => array(
                        'settings' => array(
                            'nicename' => esc_html__( 'Settings', 'businesswp' ),
                            'icon'     => 'list',
                            'controls' => array(
                              'businesswp_option[topbar_show',
			                  'businesswp_option[topbar_width]',
			                  'businesswp_option[topbar_alignment]',
			                  'businesswp_option[topbar_inner_width]',
			                  'businesswp_option[topbar_alignment]',
			                  'businesswp_option[topbar_office_time]',
			                  'businesswp_option[topbar_email]',
			                  'businesswp_option[topbar_phone]',
			                  'businesswp_option[topbar_padding]',
			                ),
                        ),
                        'contents'   => array(
                            'nicename' => esc_html__( 'Contents', 'businesswp' ),
                            'icon'     => 'file-text-o',
                            'controls' => array(
                                'businesswp_option[topbar_icons]',
                            ),
                        ),
                    ),
					'is_default_type' => false,
				),
			);

			// header setting
			$elements['businesswp_option[header_setting]'] = array(
				'setting' => array(
					'default'           => $option['header_setting'],
					'sanitize_callback' => 'Businesswp_Customizer_Sanitize::sanitize_select',
					'type' => 'option',
				),
				'control' => array(
					'label'    => sprintf(__( 'Header Presets', 'businesswp' )),
					'section'  => 'header_section',
					'type'     => 'select',
					'choices' => array(
						'default' => __('Default','businesswp'), 
						'nav_before' => __('Navigation Before','businesswp'),
						'nav_after' => __('Navigation After','businesswp'),
						'nav_before_center' => __('Navigation Before - Centered','businesswp'),
						'nav_after_center' => __('Navigation After - Centered','businesswp'),
						'nav_left' => __('Navigation left','businesswp'),
					),
					'is_default_type' => true,
					'priority' => 1,
				),
			);

			$elements['businesswp_option[header_transparent]'] = array(
					'setting' => array(
						'default'           => $option['header_transparent'],
						'sanitize_callback' => array( 'Businesswp_Customizer_Sanitize', 'sanitize_checkbox' ),
						'type' => 'option',
					),
					'control' => array(
						'label'    => sprintf(__( 'Transparent header', 'businesswp' )),
						'section'  => 'header_section',
						'type'     => 'toggle',
						'priority' => 5,
					),
			);

			// primary navigation width
			$elements['businesswp_option[nav_width]'] = array(
				'setting' => array(
					'default'           => $option['nav_width'],
					'sanitize_callback' => 'Businesswp_Customizer_Sanitize::sanitize_select',
					'type' => 'option',
				),
				'control' => array(
					'label'    => sprintf(__( 'Navigation Width', 'businesswp' )),
					'section'  => 'primary_section',
					'type'     => 'select',
					'choices' => array(
						'container-fluid' => __('Full','businesswp'), 
						'container' => __('Contained','businesswp'),
					),
					'is_default_type' => true,
					'priority' => 3,
				),
			);

			// primary navigation inner width
			$elements['businesswp_option[nav_inner_width]'] = array(
				'setting' => array(
					'default'           => $option['nav_inner_width'],
					'sanitize_callback' => 'Businesswp_Customizer_Sanitize::sanitize_select',
					'type' => 'option',
				),
				'control' => array(
					'label'    => sprintf(__( 'Navigation inner width', 'businesswp' )),
					'section'  => 'primary_section',
					'type'     => 'select',
					'choices' => array(
						'container-fluid' => __('Full','businesswp'), 
						'container' => __('Contained','businesswp'),
					),
					'is_default_type' => true,
					'priority' => 4,
				),
			);

			// primary navigation alignment
			$elements['businesswp_option[nav_alignment]'] = array(
				'setting' => array(
					'default'           => $option['nav_alignment'],
					'sanitize_callback' => 'Businesswp_Customizer_Sanitize::sanitize_select',
					'type' => 'option',
				),
				'control' => array(
					'label'    => sprintf(__( 'Navigation Alignment', 'businesswp' )),
					'section'  => 'primary_section',
					'type'     => 'select',
					'choices' => array(
						'left' => __('Left','businesswp'), 
						'center' => __('Center','businesswp'),
						'right' => __('Right','businesswp'),
					),
					'is_default_type' => true,
					'priority' => 5,
				),
			);

			// primary navigation dropdown
			$elements['businesswp_option[nav_dropdown]'] = array(
				'setting' => array(
					'default'           => $option['nav_dropdown'],
					'sanitize_callback' => 'Businesswp_Customizer_Sanitize::sanitize_select',
					'type' => 'option',
				),
				'control' => array(
					'label'    => sprintf(__( 'Navigation Dropdown', 'businesswp' )),
					'section'  => 'primary_section',
					'type'     => 'select',
					'choices' => array(
						'hover' => __('Hover','businesswp'), 
						'focus' => __('Click & Hover','businesswp'),
					),
					'is_default_type' => true,
					'priority' => 6,
				),
			);

			// primary navigation direction
			$elements['businesswp_option[nav_direction]'] = array(
				'setting' => array(
					'default'           => $option['nav_direction'],
					'sanitize_callback' => 'Businesswp_Customizer_Sanitize::sanitize_select',
					'type' => 'option',
				),
				'control' => array(
					'label'    => sprintf(__( 'Navigation Direction', 'businesswp' )),
					'section'  => 'primary_section',
					'type'     => 'select',
					'choices' => array(
						'left' => __('Left','businesswp'), 
						'right' => __('Right','businesswp'),
					),
					'is_default_type' => true,
					'priority' => 7,
				),
			);

			// primary navigation search icon show
			$elements['businesswp_option[nav_search_show]'] = array(
				'setting' => array(
					'default'           => $option['nav_search_show'],
					'sanitize_callback' => 'Businesswp_Customizer_Sanitize::sanitize_checkbox',
					'type' => 'option',
				),
				'control' => array(
					'label'    => sprintf(__( 'Navigation search icon show', 'businesswp' )),
					'section'  => 'primary_section',
					'type'     => 'toggle',
					'is_default_type' => false,
					'priority' => 8,
				),
			);
			
			// footer width
			$elements['businesswp_option[footer_width]'] = array(
				'setting' => array(
					'default'           => $option['footer_width'],
					'sanitize_callback' => 'Businesswp_Customizer_Sanitize::sanitize_select',
					'type' => 'option',
				),
				'control' => array(
					'label'    => sprintf(__( 'Footer Width', 'businesswp' )),
					'section'  => 'footer_section',
					'type'     => 'select',
					'choices' => array(
						'container-fluid' => __('Full','businesswp'), 
						'container' => __('Contained','businesswp'),
					),
					'is_default_type' => true,
					'priority' => 1,
				),
			);

			// footer inner width
			$elements['businesswp_option[footer_inner_width]'] = array(
				'setting' => array(
					'default'           => $option['footer_inner_width'],
					'sanitize_callback' => 'Businesswp_Customizer_Sanitize::sanitize_select',
					'type' => 'option',
				),
				'control' => array(
					'label'    => sprintf(__( 'Footer Inner Width', 'businesswp' )),
					'section'  => 'footer_section',
					'type'     => 'select',
					'choices' => array(
						'container-fluid' => __('Full','businesswp'), 
						'container' => __('Contained','businesswp'),
					),
					'is_default_type' => true,
					'priority' => 2,
				),
			);

			// footer widget settings
			$elements['businesswp_option[footer_widget_setting]'] = array(
				'setting' => array(
					'default'           => $option['footer_widget_setting'],
					'sanitize_callback' => 'Businesswp_Customizer_Sanitize::sanitize_select',
					'type' => 'option',
				),
				'control' => array(
					'label'    => sprintf(__( 'Footer Widget', 'businesswp' )),
					'section'  => 'footer_section',
					'type'     => 'select',
					'choices' => array(
						0 => 0, 
						1 => 1,
						2 => 2,
						3 => 3,
						4 => 4,
					),
					'is_default_type' => true,
					'priority' => 3,
				),
			);

			// footer back to top
			$elements['businesswp_option[footer_back_to_top]'] = array(
				'setting' => array(
					'default'           => $option['footer_back_to_top'],
					'sanitize_callback' => 'Businesswp_Customizer_Sanitize::sanitize_select',
					'type' => 'option',
				),
				'control' => array(
					'label'    => sprintf(__( 'Footer Back To Top', 'businesswp' )),
					'section'  => 'footer_section',
					'type'     => 'select',
					'choices' => array(
						'enable' => __('Enable','businesswp'), 
						'disable' => __('Disable','businesswp'), 
					),
					'is_default_type' => true,
					'priority' => 5,
				),
			);

			if( ! class_exists('Businesswp_Premium_Setup') ){

				// footer copyright
				$elements['businesswp_option[footer_copyright]'] = array(
					'setting' => array(
						'default'           => $option['footer_copyright'],
						'sanitize_callback' => 'wp_kses_post',
						'type' => 'option',
					),
					'control' => array(
						'label'    => sprintf(__( 'Footer Copyright', 'businesswp' )),
						'section'  => 'footer_section',
						'type'     => 'textarea',
						'is_default_type' => true,
						'priority' => 6,
					),
				);

			}
			
			// blog content type
			$elements['businesswp_option[archive_content_type]'] = array(
				'setting' => array(
					'default'           => $option['archive_content_type'],
					'sanitize_callback' => 'Businesswp_Customizer_Sanitize::sanitize_select',
					'type' => 'option',
				),
				'control' => array(
					'label'    => sprintf(__( 'Content Type', 'businesswp' )),
					'section'  => 'blog_section',
					'type'     => 'select',
					'choices' => array(
						'full' => __('Full Content','businesswp'), 
						'excerpt' => __('Excerpt','businesswp'), 
					),
					'is_default_type' => true,
					'priority' => 1,
				),
			);

			// sidebar layout
			$elements['businesswp_option[sidebar_layout]'] = array(
				'setting' => array(
					'default'           => $option['sidebar_layout'],
					'sanitize_callback' => 'Businesswp_Customizer_Sanitize::sanitize_select',
					'type' => 'option',
				),
				'control' => array(
					'label'    => sprintf(__( 'Sidebar Layout', 'businesswp' )),
					'section'  => 'sidebar_section',
					'type'     => 'select',
					'choices' => array(
						'left-sidebar' => __('Sidebar / Content','businesswp'), 
						'right-sidebar' => __('Content / Sidebar','businesswp'), 
						'no-sidebar' => __('Content ( No Sidebar )','businesswp'), 
						'both-sidebars' => __('Sidebar / Content / Sidebar','businesswp'), 
						'both-left' => __('Sidebar / Sidebar / Content','businesswp'), 
						'both-right' => __('Content / Sidebar / Sidebar','businesswp'), 
					),
					'is_default_type' => true,
					'priority' => 1,
				),
			);

			// Archive sidebar layout
			$elements['businesswp_option[sidebar_blog_layout]'] = array(
				'setting' => array(
					'default'           => $option['sidebar_blog_layout'],
					'sanitize_callback' => 'Businesswp_Customizer_Sanitize::sanitize_select',
					'type' => 'option',
				),
				'control' => array(
					'label'    => sprintf(__( 'Archive Sidebar Layout', 'businesswp' )),
					'section'  => 'sidebar_section',
					'type'     => 'select',
					'choices' => array(
						'left-sidebar' => __('Sidebar / Content','businesswp'), 
						'right-sidebar' => __('Content / Sidebar','businesswp'), 
						'no-sidebar' => __('Content ( No Sidebar )','businesswp'), 
						'both-sidebars' => __('Sidebar / Content / Sidebar','businesswp'), 
						'both-left' => __('Sidebar / Sidebar / Content','businesswp'), 
						'both-right' => __('Content / Sidebar / Sidebar','businesswp'), 
					),
					'is_default_type' => true,
					'priority' => 2,
				),
			);

			// Single sidebar layout
			$elements['businesswp_option[sidebar_single_layout]'] = array(
				'setting' => array(
					'default'           => $option['sidebar_single_layout'],
					'sanitize_callback' => 'Businesswp_Customizer_Sanitize::sanitize_select',
					'type' => 'option',
				),
				'control' => array(
					'label'    => sprintf(__( 'Single Post Sidebar Layout', 'businesswp' )),
					'section'  => 'sidebar_section',
					'type'     => 'select',
					'choices' => array(
						'left-sidebar' => __('Sidebar / Content','businesswp'), 
						'right-sidebar' => __('Content / Sidebar','businesswp'), 
						'no-sidebar' => __('Content ( No Sidebar )','businesswp'), 
						'both-sidebars' => __('Sidebar / Content / Sidebar','businesswp'), 
						'both-left' => __('Sidebar / Sidebar / Content','businesswp'), 
						'both-right' => __('Content / Sidebar / Sidebar','businesswp'), 
					),
					'is_default_type' => true,
					'priority' => 3,
				),
			);

			return $elements;

		}

	}

	new Businesswp_Customize_Layout_Sections_Settings();

endif;

//topbar (topbar icons)
function Businesswp_frontpage_topbar_sections_settings( $wp_customize ){

	if ( class_exists( 'Businesswp_Customizer_Repeater' ) ) {

		$wp_customize->add_setting('businesswp_option[topbar_icons]', 
		array(
    	'default'           => businesswp_social_icons_default_contents(),
		'sanitize_callback' => 'businesswp_customizer_repeater_sanitize',
		'type' => 'option',
		) );

	    $wp_customize->add_control( new Businesswp_Customizer_Repeater( $wp_customize,'businesswp_option[topbar_icons]', 
	    	array(
			'label'                             => esc_html__( 'Social Icons', 'businesswp' ),
			'section'                           => 'topbar_section',
			'priority' => 8,
			'add_field_label'                   => esc_html__( 'Add new social icon', 'businesswp' ),
			'item_name'                         => esc_html__( 'Social Icon', 'businesswp' ),
			'customizer_repeater_icon_control' => true,
			'customizer_repeater_link_control' => true,
			)
	    ) );

	    $wp_customize->add_setting('businesswp_option[transparent_header_logo]', array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
			'type' => 'option',
		) );
		$wp_customize->add_control( new wp_Customize_Image_Control( $wp_customize,'businesswp_option[transparent_header_logo]', array(
			'label' => sprintf(__( 'Transparent Header Logo', 'businesswp' )),
			'section' => 'header_section',
			'priority' => 6,
			)
		) );
	}
}
add_action( 'customize_register', 'Businesswp_frontpage_topbar_sections_settings' );


function businesswp_for_plus( $wp_customize ){

		if( ! class_exists('Businesswp_Premium_Setup') ){
			$section_title = sprintf(__('Upgrade to Pro','businesswp'));
		}else{
			$section_title = sprintf(__('Get Supports & Love it','businesswp'));
		}

		$wp_customize->add_section(
	        'upgrade_with_pro_section',
	        array(
	            'title' 		=> $section_title,
			)
	    );

	    if( class_exists('Businesswp_Premium_Setup') ){

		    $wp_customize->add_setting(
				'upgrade_with_pro_buttons',
				array(
				   'capability'     => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_text_field',
				)	
			);
			
			$wp_customize->add_control( new Businesswp_Button_Customize_Control( $wp_customize, 'upgrade_with_pro_buttons', array(
				'section' => 'upgrade_with_pro_section',
				'setting' => 'upgrade_with_pro_buttons',
		    ) ) );

		}
}
add_action( 'customize_register', 'businesswp_for_plus' );