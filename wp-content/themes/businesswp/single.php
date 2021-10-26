<?php 
get_header();
businesswp_breadcrumbs();

$sidebar_layout = businesswp_get_sidebar_layout();
$rightsidebar = array( 'right-sidebar', 'both-sidebars', 'both-right', 'both-left' );
$leftsidebar = array( 'left-sidebar', 'both-sidebars', 'both-right', 'both-left' );
$class = businesswp_get_content_area_classes();
?>
<main id="main_content" class="main_content">
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

					// Check if posts exist

			        if ( have_posts() ) :
						
							while ( have_posts() ) : the_post();
							
							get_template_part( 'template-parts/entry/layout', get_post_format());
								
							endwhile;

							// If comments are open or we have at least one comment, load up the comment template.

	                        if ( comments_open() || get_comments_number() ) :

	                            comments_template();

	                        endif;

							the_posts_pagination( array(
									'prev_text' => '<i class="fa fa-angle-double-left"></i>',
									'next_text' => '<i class="fa fa-angle-double-right"></i>',
								) );
						
					else :
						
						get_template_part( 'template-parts/none' );
						
					endif;
					?>

				<?php do_action( 'buisnesstrade_after_content_inner' ); ?>

				</div>

				<?php do_action( 'buisnesstrade_after_content' ); ?>

			</div>

			<?php 

			if ( in_array( $sidebar_layout, $rightsidebar ) ) {

				get_sidebar();

			}

			?>

      </div>
	</div>
</main><!-- End .theme-blog-area -->
<?php get_footer(); ?>