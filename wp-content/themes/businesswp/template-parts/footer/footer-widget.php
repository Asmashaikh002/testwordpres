<?php 
$ft_width = businesswp_get_option('footer_width');
$ft_inner_width = businesswp_get_option('footer_inner_width');
$ft_widget_setting = businesswp_get_option('footer_widget_setting');

if($ft_widget_setting==0){
  return;
}

$col = '';
switch ($ft_widget_setting) {
  case 1:
    $col = 'col-lg-12 col-md-12 col-12';
    break;

  case 2:
    $col = 'col-lg-6 col-md-6 col-12';
    break;

  case 3:
    $col = 'col-lg-4 col-md-6 col-12';
    break;
  
  default:
    $col = 'col-lg-3 col-md-6 col-12';
    break;
}
?>
<div id="footer" class="footer-widget footer__wrap <?php if($ft_width=='container'){ echo 'grid-'.esc_attr($ft_width); } ?>">
  <div class="<?php if($ft_inner_width){ echo esc_attr($ft_inner_width); } ?> inside-footer-widgets">
    <div class="row">
      <?php for ($i=1; $i <= $ft_widget_setting; $i++) { ?>
      <div class="<?php echo esc_attr($col); ?>">
        <?php 
        if ( is_active_sidebar( 'footer-'.$i ) ) {
          dynamic_sidebar( 'footer-'.$i );
        } 
        ?>
      </div>
      <?php } ?>
    </div>
  </div>
</div><!-- .footer__wrap -->