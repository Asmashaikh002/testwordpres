<?php get_header(); ?>

<div id="site-content" class="site-content">
	<div class="container">		
		<div class="row">
			<div class="col-md-12 error-page text-center">
				<h2 class="wow animated fadeInDown"><?php _e('404','businesswp'); ?></h2>
				<h4 class="wow animated fadeInLeft"><?php _e('Oops! Page not found','businesswp'); ?></h4>
				<p class="wow animated fadeInUp"><?php _e('We`re sorry, but the page you are looking for doesn`t exist.','businesswp'); ?></p>
				<a class="error-button wow animate__animated animate__fadeInUp" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e('Home Page','businesswp'); ?></a>
			</div>
		</div>				
	</div>
</div><!-- .site-content -->
	
<?php get_footer(); ?>