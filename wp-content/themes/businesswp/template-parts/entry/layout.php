<?php 
$classes = businesswp_post_entry_classes();

$elements = businesswp_blog_entry_elements_positioning();

// getting blog post format
$format = get_post_format();

if ( 'quote' == $format ) {

	// Get quote entry contents
	get_template_part( 'template-parts/entry/quote' );

	return;

}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>
	<div class="inside-article">
		<?php 
		foreach ($elements as $key => $element) {
			
			if( $element == 'featured_image'){
				if( !is_search() ){
					get_template_part( 'template-parts/entry/media/blog-entry', $format );
				}
			}

			if( $element == 'title'){
				get_template_part( 'template-parts/entry/title' );
			}

			if( $element == 'meta'){
				get_template_part( 'template-parts/entry/meta' );
			}

			if( $element == 'content' ){
				get_template_part( 'template-parts/entry/content' );
			}

			if( $element == 'read_more'){
				get_template_part( 'template-parts/entry/readmore' );
			}

		} 
		?>
	</div>
</article><!-- #post-## -->

<?php
if ( post_type_supports( get_post_type( get_the_ID() ), 'author' ) && is_single() ) {

	get_template_part( 'template-parts/entry/author_bio' );

}

if ( is_single() ) {

	get_template_part( 'template-parts/entry/navigation' );

}