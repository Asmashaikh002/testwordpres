<?php 
get_header();
businesswp_breadcrumbs();

$sidebar_layout = businesswp_get_sidebar_layout();
$rightsidebar = array( 'right-sidebar', 'both-sidebars', 'both-right', 'both-left' );
$leftsidebar = array( 'left-sidebar', 'both-sidebars', 'both-right', 'both-left' );
$class = businesswp_get_content_area_classes();

if ( class_exists('woocommerce') && ! is_active_sidebar( 'woocommerce' ) ) {

	$class = 'col-lg-12 col-md-12 col-sm-12';

}
?>
<?php do_action( 'businesswp_before_main_content' ); ?>
<main id="main_content" class="main_content shop">

	<div class="container">

		<div class="row">

			<?php 

			if ( in_array( $sidebar_layout, $leftsidebar ) ) {

				get_sidebar('left');

			}

			?>
			
			<div class="<?php echo esc_attr($class); ?> primary">

				<?php do_action( 'businesswp_before_content' ); ?>

				<div id="site-content" class="site-content">

					<?php do_action( 'businesswp_before_content_inner' ); ?>

					<?php
					// woocommerce
					woocommerce_content();
					?>

					<?php do_action( 'businesswp_after_content_inner' ); ?>

				</div>

				<?php do_action( 'businesswp_after_content' ); ?>

			</div>

			<?php 

			if ( in_array( $sidebar_layout, $rightsidebar ) ) {

				get_sidebar('woocommerce');

			}

			?>
			      
		</div><!-- .row -->
	</div><!-- .container -->
</main><!-- .main_content -->
<?php do_action( 'businesswp_after_main_content' ); ?>
<?php get_footer(); ?>