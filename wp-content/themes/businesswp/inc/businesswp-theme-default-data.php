<?php

/**************************************************
**** Theme Default Data
***************************************************/

if( ! function_exists('businesswp_theme_default_data') ):

	function businesswp_theme_default_data(){

		$data = array(
                  'layout' => 'wide', // wide or boxed
                  'primary_color' => '#f50057',
                  'container_width' => 1200,
                  'content_padding' => '0, 0, 0, 0',
                  'footer_widget_padding' => '40, 0, 40, 0',
                  'footer_padding' => '40, 40, 40, 40', 
                  'topbar_padding' => '12, 12, 12, 12',
                  'sidebar_widget_padding' => '0, 0, 0, 0',
                  'separating_space' => 50,
                  'content_separating_space' => 1.125,
                  'content_layout_setting' => 'separate-containers', // one-container
			'topbar_show' => true,
                  'topbar_width' => 'container-fluid', // conatiner-fluid
                  'topbar_inner_width' => 'container',
                  'topbar_alignment' => 'right',
                  'topbar_office_time' => '',
                  'topbar_email' => '',
                  'topbar_phone' => '',
                  'topbar_icons' => '',
                  'header_setting' => 'default',
                  'header_transparent' => false,
                  'transparent_header_logo' => '',
                  'footer_width' => 'container-fluid',
                  'footer_inner_width' => 'container',
                  'footer_widget_setting' => 4,
                  'footer_bar_alignment' => 'center',
                  'footer_back_to_top' => 'enable',
                  'footer_copyright' => '',
                  'archive_content_type' => 'excerpt',
                  'archive_excerpt_length' => 20,
                  'archive_readmore_label' => __('Read More','businesswp'),
                  'archive_readmore_button' => false,
                  'archive_date_show' => true,
                  'archive_author_show' => true,
                  'archive_categories_show' => true,
                  'archive_tags_show' => true,
                  'archive_comment_count_show' => true,
                  'archive_feature_image_show' => true,
                  'archive_feature_image_position' => 'above', // below
                  'archive_feature_image_alignment' => 'center', // left, right
                  'archive_feature_image_title' => '',
                  'single_date_show' => true,
                  'single_author_show' => true,
                  'single_categories_show' => true,
                  'single_tags_show' => true,
                  'single_navigation_show' => true,
                  'single_feature_image_show' => true,
                  'single_feature_image_position' => 'above', // below, above-content-area
                  'single_feature_image_alignment' => 'center', // left, right
                  'single_feature_image_title' => '',
                  'sidebar_layout' => 'right-sidebar',
                  'sidebar_blog_layout' => 'right-sidebar',
                  'sidebar_single_layout' => 'right-sidebar',
                  'nav_mobilebtn_label' => __('Menu','businesswp'),
                  'nav_mobilebtn_breakpoint' => 991,
                  'nav_width' => 'container-fluid',
                  'nav_inner_width' => 'container',
                  'nav_alignment' => 'right',
                  'nav_dropdown' => 'focus', // hover, focus-arrow
                  'nav_direction' => 'right', // left
                  'nav_search_show' => false,
                  'nav_menu_item_width' => 15,
                  'nav_menu_item_height' => 90,
                  'nav_submenu_item_height' => 20,
                  'nav_submenu_width' => 200,
                  'secondary_mobilebtn_label' => __('Menu','businesswp'),
                  'secondary_menu_item_width' => 15,
                  'secondary_menu_item_height' => 40,
                  'secondary_submenu_item_height' => 20,
                  'secondary_nav_position' => 'none', // below, above
                  'sticky_nav' => '1',
                  'sticky_menu_item_height' => 15,

                  'nav_custom_btn' => false,
                  'nav_custom_btn_label' => __('Buy Now','businesswp'),
                  'nav_custom_btn_url' => '#',
                  
                  'body_bg_color' => '#ffffff',
                  'body_text_color' => '',
                  'body_link_color' => '',
                  'body_link_hover_color' => '',
                  'tb_bg_color' => '#f2f2f2',
                  'tb_text_color' => '',
                  'tb_link_color' => '',
                  'tb_link_hover_color' => '',
                  'p_nav_bg_color' => '#ffffff',
                  'p_nav_text_color' => '#0b2341',
                  'p_nav_bg_hover_color' => '#f50057',
                  'p_nav_text_hover_color' => '#ffffff',
                  'p_nav_bg_current_color' => '#f50057',
                  'p_nav_text_current_color' => '#ffffff',   

                  'slider_show' => true,
                  'slider_nav_show' => true,
                  'slider_pagination_show' => true,
                  'slider_mouse_drag' => true,
                  'slider_smart_speed' => 1000,
                  'slider_scroll_speed' => 2500,
                  'slider_animatein' => '',
                  'slider_animateout' => '',
                  'slider_container_width' => 'container',
                  'slider_content' => '',
                  'slider_subtitle_color' => '',
                  'slider_title_color' => '',
                  'slider_desc_color' => '',
                  'slider_overlay_show' => true,
                  'slider_overlay_color' => '',

                  'about_layout'=>'layout1',
                  'counter_layout'=>'layout1',
                  'contact_layout'=>'layout1',
                  'portfolio_layout'=>'layout1',
                  'blog_layout'=>'layout1',
                  'team_layout'=>'layout2',
                  'pricing_layout'=>'layout1',
                  'testimonial_layout'=>'layout1',
                  'service_layout'=>'layout1',

                  'service_content' => '',
                  'team_content' => '',
                  'testimonial_content' => '',
                  'portfolio_content' => '',

                  'contact_content' => '',

                  'f_widget_bg_color' => '#2a303c',
                  'f_widget_text_color' => '#a5adbb',
                  'f_widget_link_color' => '#a5adbb',
                  'f_widget_link_hover_color' => '',
                  'f_widget_title_color' => '#ffffff',
                  'f_bg_color' => '#ffffff',
                  'f_text_color' => '#a5adbb',
                  'f_link_color' => '#f50057',
                  'f_link_hover_color' => '#f50057',
                  'f_btt_bg_color' => '',
                  'f_btt_text_color' => '',
                  'f_btt_bg_hover_color' => '',
                  'f_btt_text_hover_color' => '',
                  );

		$section_names = array( 
                  'service',
                  'portfolio',
                  'blog',
                  'contact',
                  'team',
                  'testimonial'
            );

		foreach ($section_names as $key => $name) {
			$data[$name.'_show'] = true;
                  $data[$name.'_back_animation_show'] = false;
			$data[$name.'_subtitle'] = __('Section Subtitle','businesswp');
                  $data[$name.'_subtitle_color'] = '';
			$data[$name.'_title'] = __('Section Title Here','businesswp');
			$data[$name.'_title_color'] = '';
			$data[$name.'_desc'] = __('Section Description Here','businesswp');
			$data[$name.'_desc_color'] = '';
			$data[$name.'_bg_color'] = '';
			$data[$name.'_bg_image'] = '';
                  $data[$name.'_about_image'] = '';
			$data[$name.'_container_width'] = 'container';
			$data[$name.'_divider_show'] = true;
			$data[$name.'_divider_type'] = 'center-diamond';
                  $data[$name.'_item_bg_color'] = '';
                  $data[$name.'_item_title_color'] = '';
                  $data[$name.'_item_text_color'] = '';
                  $data[$name.'_overlay_show'] = true;
                  $data[$name.'_overlay_color'] = '';

			if( $name=='blog' ){
				$data[$name.'_no_to_show'] = 2;
				$data[$name.'_column_layout'] = 4;
				$data[$name.'_category'] = '';
				$data[$name.'_orderby'] = '';
				$data[$name.'_order'] = '';
			}
                  
                  if( $name=='contact' ){
                        $data[$name.'_button_text'] = __('Message Us','businesswp');
                        $data[$name.'_button_url'] = '#';
                  }
		}

		$data = apply_filters( 'businesswp_theme_default_data', $data );

		return $data;

	}   

endif;

/**************************************************
**** Social Icons Defults Contents
***************************************************/

if ( ! function_exists( 'businesswp_social_icons_default_contents' ) ):

      function businesswp_social_icons_default_contents(){

            return json_encode( array(
                  array(
                  'icon_value'      => 'fa fa-facebook',
                  'link'      => '',
                  'id'         => 'customizer_repeater_58d7gh7f20b10',
                  ),
                  array(
                  'icon_value'      => 'fa fa-twitter',
                  'link'      => '',
                  'id'         => 'customizer_repeater_58d7gh7f20b20',
                  ),
                  array(
                  'icon_value'      => 'fa fa-linkedin',
                  'link'      => '',
                  'id'         => 'customizer_repeater_58d7gh7f20b30',
                  ),
                  array(
                  'icon_value'      => 'fa fa-instagram',
                  'link'      => '',
                  'id'         => 'customizer_repeater_58d7gh7f20b40',
                  ),
                  array(
                  'icon_value'      => 'fa fa-google-plus',
                  'link'      => '',
                  'id'         => 'customizer_repeater_58d7gh7f20b50',
                  ),
              ) );
      }

endif;