<?php

/**************************************************
**** blog
***************************************************/

if( !function_exists('businesswp_blog_section') ){

	function businesswp_blog_section(){

		get_template_part('inc/sections/section','blog');

	}

}

if( ! class_exists('Businesswp_Premium_Setup') && function_exists('businesswp_blog_section') ){

	$section_priority = apply_filters( 'businesswp_section_priority', 24, 'businesswp_blog_section' );

	add_action('businesswp_sections','businesswp_blog_section', absint($section_priority));

}