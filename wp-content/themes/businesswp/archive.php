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
					$archive_title    = '';
					$archive_subtitle = '';

					if ( is_search() ) {
						global $wp_query;

						$archive_title = sprintf(
							'%1$s %2$s',
							'<span class="color-accent">' . __( 'Search:', 'businesswp' ) . '</span>',
							'&ldquo;' . get_search_query() . '&rdquo;'
						);

						if ( $wp_query->found_posts ) {
							$archive_subtitle = sprintf(
								/* translators: %s: Number of search results. */
								_n(
									'We found %s result for your search.',
									'We found %s results for your search.',
									$wp_query->found_posts,
									'businesswp'
								),
								number_format_i18n( $wp_query->found_posts )
							);
						} else {
							$archive_subtitle = __( 'We could not find any results for your search. You can give it another try through the search form below.', 'businesswp' );
						}
					} elseif ( is_archive() && ! have_posts() ) {
						$archive_title = __( 'Nothing Found', 'businesswp' );
					} elseif ( ! is_home() ) {
						$archive_title    = get_the_archive_title();
						$archive_subtitle = get_the_archive_description();
					}

					if ( $archive_title || $archive_subtitle ) {
						?>
						<header class="archive-header has-text-align-center header-footer-group">
							<div class="archive-header-inner section-inner medium">
								<?php if ( $archive_title ) { ?>
									<h2 class="archive-title"><?php echo wp_kses_post( $archive_title ); ?></h2>
								<?php } ?>
								<?php if ( $archive_subtitle ) { ?>
									<div class="archive-subtitle section-inner thin max-percentage intro-text"><?php echo wp_kses_post( wpautop( $archive_subtitle ) ); ?></div>
								<?php } ?>
							</div><!-- .archive-header-inner -->
						</header><!-- .archive-header -->
						<?php
					}

			        // Check if posts exist
			        if ( have_posts() ) :
						
							while ( have_posts() ) : the_post();
							
							get_template_part( 'template-parts/entry/layout', get_post_format());
								
							endwhile;

							the_posts_pagination( array(
									'prev_text' => '<i class="fa fa-angle-double-left"></i>',
									'next_text' => '<i class="fa fa-angle-double-right"></i>',
								) );
						
					else :
						
						get_template_part( 'template-parts/none' );
						
					endif;

					?>

					<?php do_action( 'businesswp_after_content_inner' ); ?>

				</div>

				<?php do_action( 'businesswp_after_content' ); ?>

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