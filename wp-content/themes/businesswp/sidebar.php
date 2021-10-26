<?php 
/**
 * The sidebar containing the main widget area
 */

if ( ! is_active_sidebar( 'sidebar' ) ) {

	return;
	
}

$class = businesswp_get_right_sidebar_classes();
?>
<div class="<?php echo esc_attr($class); ?> secondary">
	<div class="sidebar">
		<?php dynamic_sidebar( 'sidebar' ); ?>
	</div>
</div><!-- .secondary -->