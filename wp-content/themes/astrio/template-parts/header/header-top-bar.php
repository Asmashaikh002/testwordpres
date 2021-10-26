<?php
$is_topbar = businesswp_get_option('topbar_show');
$tb_width = businesswp_get_option('topbar_width');
$tb_inner_width = businesswp_get_option('topbar_inner_width');
$tb_alignment = businesswp_get_option('topbar_alignment');
$tb_office_time = businesswp_get_option('topbar_office_time');
$tb_email = businesswp_get_option('topbar_email');
$tb_phone = businesswp_get_option('topbar_phone');
$header_transparent = businesswp_get_option('header_transparent');

$items = array();
$items = businesswp_get_option('topbar_icons');

if(!$items){
  $items = businesswp_social_icons_default_contents();
}

if(is_string($items)){
  $items = json_decode($items);
}

if($is_topbar){ 
?>
<div class="header_area_main <?php if($header_transparent==1){ echo 'tranparent_header'; } ?> <?php if($tb_width=='container'){ echo 'grid-'.esc_attr($tb_width); } ?>">
    <div class="top-header top_header__wrap <?php if($tb_inner_width){ echo esc_attr($tb_inner_width); } ?>">
          <div class="row align-item-center <?php if($tb_alignment){ echo 'text-md-'.esc_attr($tb_alignment); } ?> text-center">
             <div class="col-lg-12 col-md-12 col-sm-12">
              <?php if($tb_office_time || $tb_email || $tb_phone){ ?>
              <ul class="header_contact_info">

                <?php if($tb_office_time){ ?>
                  <li><i class="fa fa-clock-o"></i> <?php echo esc_html($tb_office_time); ?> </li>
                <?php } ?>

                <?php if($tb_email){ ?>  
                 <li><a href="mailto:<?php echo esc_attr($tb_email); ?>"><i class="fa fa-envelope"></i><?php echo esc_html($tb_email); ?></a></li>
                <?php } ?>

                <?php if($tb_phone){ ?>
                 <li><a href="tel:<?php echo esc_attr($tb_phone); ?>"><i class="fa fa-phone"></i><?php echo esc_html($tb_phone); ?></a></li>
                <?php } ?>
              </ul>
              <?php } ?>
              <ul class="social_links">
                <?php foreach ($items as $key => $item) { 
                  $social_link = ! empty( $item->link ) ? $item->link : '';
                  $icon_value = ! empty( $item->icon_value ) ? $item->icon_value : '';

                  if( $social_link != '' ){
                ?>
                <li><a href="<?php echo esc_url($social_link); ?>"><i class="fa <?php echo esc_attr($icon_value); ?>"></i></a></li>
                <?php }
                } 
                ?>
              </ul>  
             </div>
          </div>
    </div><!-- End .top-header -->
<?php } ?>