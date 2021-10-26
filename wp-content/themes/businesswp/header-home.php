<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
	  <meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<?php wp_head(); ?>	
  </head>
<body <?php body_class(); ?>>
	
	<?php 
      if ( function_exists( 'wp_body_open' ) ) {
        wp_body_open();
      }
    ?>

<div class="wrapper">

			<a class="skip-link screen-reader-text" href="#slider"><?php esc_html_e( 'Skip to content', 'businesswp' ); ?></a>
	
      <?php do_action( 'businesswp_before_wrap' ); ?>

      <?php do_action( 'businesswp_header_topbar' ); ?>

      <?php do_action( 'businesswp_header_nav' ); ?>