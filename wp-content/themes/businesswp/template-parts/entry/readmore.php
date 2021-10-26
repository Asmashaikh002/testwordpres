<?php 

if( is_page() ){
	return;
}

return;

$readmore_text = businesswp_get_option('archive_readmore_label');

$readmore_text = apply_filters( 'Businesswp_post_readmore_link_text', $readmore_text );

do_action( 'Businesswp_before_blog_entry_readmore' );

if( !is_single() ){
?>
<p><div><a href="<?php the_permalink(); ?>" class="more-link" title="<?php echo esc_attr( $readmore_text ); ?>"><?php echo wp_kses_post( $readmore_text ); ?> <i class="fas fa-long-arrow-alt-right"></i></a><span class="screen-reader-text"><?php the_title(); ?></span></div></p>

<?php }
do_action( 'Businesswp_before_blog_entry_readmore' ); ?>

<?php 

edit_post_link();