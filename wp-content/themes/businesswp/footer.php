<div class="theme_footer">

  <?php

    get_template_part('template-parts/footer/footer','widget');

  	get_template_part('template-parts/footer/footer','copyright');

  ?>

</div><!-- End .theme_footer-->

<?php do_action( 'businesswp_after_outer_wrap' ); ?>

<?php get_template_part( 'template-parts/back-to-top' ); ?>

<?php wp_footer(); ?>
</body>
</html>