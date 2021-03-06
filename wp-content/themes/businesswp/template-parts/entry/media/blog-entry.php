<?php

$is_featured_image = businesswp_get_option('archive_feature_image_show');
$featured_image_align = businesswp_get_option('archive_feature_image_alignment');

if(is_single()){
	$is_featured_image = businesswp_get_option('single_feature_image_show');
	$featured_image_align = businesswp_get_option('single_feature_image_alignment');
}

if( has_post_thumbnail() && $is_featured_image ):
?>
<div class="post-thumbnail post-thumbnail-<?php echo esc_attr( $featured_image_align ); ?>">


	<?php if( !is_single() ){ ?>

	<a href="<?php the_permalink(); ?>">
		<?php the_post_thumbnail('full'); ?>
	</a>

	<div class="blog_overlay">
      <div class="blog_overlay_inner">
        <a class="blog_overlay_icon" href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>
      </div>
    </div>

	<?php } else { ?>

		<?php the_post_thumbnail('full'); ?>

	<?php } ?>

</div>
<?php endif; ?>