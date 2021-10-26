<?php 
$mobile_toggle_label = businesswp_get_option('nav_mobilebtn_label');
$nav_width = businesswp_get_option('nav_width');
$nav_inner_width = businesswp_get_option('nav_inner_width');
$nav_alignment = businesswp_get_option('nav_alignment');
$nav_dropdown = businesswp_get_option('nav_dropdown');
$nav_direction = businesswp_get_option('nav_direction');
$header_setting = businesswp_get_option('header_setting');
$sticky_nav = businesswp_get_option('sticky_nav');

$navbar_nav_class = 'mr-auto';
if($nav_alignment=='right'){
  $navbar_nav_class = 'ml-auto';
}else if($nav_alignment=='center'){
  $navbar_nav_class = 'ml-auto mr-auto';
}

$logo_column_class ='';
$nav_column_class ='';
switch ($header_setting) {
  case 'nav_before':
    $logo_column_class .='col-xl-12 col-lg-12 col-12 pb-4 text-lg-left text-md-center text-sm-center text-center order-2';
    $nav_column_class .='col-xl-12 col-lg-12 col-12 order-1';
    $navbar_nav_class = 'mr-auto';
    break;

  case 'nav_after':
    $logo_column_class .='col-xl-12 col-lg-12 col-12 pt-4 text-lg-left text-md-center text-sm-center text-center order-1';
    $nav_column_class .='col-xl-12 col-lg-12 col-12 order-2';
    $navbar_nav_class = 'mr-auto';
    break;

  case 'nav_before_center':
    $logo_column_class .='col-xl-12 col-lg-12 col-12 pb-4 text-lg-center text-md-center text-sm-center text-center order-2';
    $nav_column_class .='col-xl-12 col-lg-12 col-12 order-1';
    $navbar_nav_class = 'mr-auto ml-auto';
    break;

  case 'nav_after_center':
    $logo_column_class .='col-xl-12 col-lg-12 col-12 pt-4 text-lg-center text-md-center text-sm-center text-center order-1';
    $nav_column_class .='col-xl-12 col-lg-12 col-12 order-2';
    $navbar_nav_class = 'mr-auto ml-auto';
    break;

  case 'nav_left':
    $logo_column_class .='col-xl-3 col-lg-3 col-12 text-lg-right text-md-center text-sm-center text-center order-2';
    $nav_column_class .='col-xl-9 col-lg-9 col-12 order-1';
    $navbar_nav_class = 'mr-auto';
    break;
  
  default:
    $logo_column_class .='col-xl-3 col-lg-3 col-12 text-lg-left text-md-center text-sm-center text-center';
    $nav_column_class .='col-xl-9 col-lg-9 col-12';
    break;
}

if($nav_dropdown=='hover'){
  $navbar_nav_class .= ' hover';
}else if($nav_dropdown=='focus'){
  $navbar_nav_class .= ' focus hover';
}

$navbar_nav_class .= ' direction-'.$nav_direction;

if ( is_active_sidebar( 'topbar' ) ) {
?>
<nav id="site-navigation" class="navbar navbar-expand-lg navbar-light d-block navbar-header-wrap <?php if($nav_width=='container'){ echo 'grid-'.esc_attr($nav_width); } ?>">
  <div class="<?php if($nav_inner_width){ echo esc_attr($nav_inner_width); } ?> d-block">
    <div class="row header-widget">
      <div class="col-lg-6"></div>
      <div class="col-lg-6">
        <?php
          dynamic_sidebar( 'topbar' );
        ?>
      </div>
    </div>
  </div>
</nav>
<?php } ?>

<nav id="site-navigation" class="navbar navbar-expand-lg navbar-light d-block navbar-header-wrap primary_menu <?php if($nav_width=='container'){ echo 'grid-'.esc_attr($nav_width); } if($sticky_nav==1){ echo ' sticky-top'; } if($sticky_nav=='mobile'){ echo ' sticky-mobile sticky-top'; } if($sticky_nav=='desktop'){ echo ' sticky-desktop sticky-top'; } ?>">
  <div class="<?php if($nav_inner_width){ echo esc_attr($nav_inner_width); } ?> d-block">
    <div class="row align-items-center">
      <div class="<?php echo esc_attr($logo_column_class); ?>">
        <div class="logo-area">
        <?php 
        // theme logo here
        businesswp_logo();
        ?>
        </div>                        
      </div>
      <div class="<?php echo esc_attr($nav_column_class); ?>">
        <div class="collapse navbar-collapse main-menu" id="navbarSupportedContent">
          <?php if ( has_nav_menu( 'primary' ) || ! has_nav_menu( 'expanded' ) ) { ?>
            <ul class="nav navbar-nav nav-menus main-menu <?php echo esc_attr($navbar_nav_class); ?>">
              <?php
                if ( has_nav_menu( 'primary' ) ) {

                  wp_nav_menu(
                    array(
                      'container'  => '',
                      'items_wrap' => '%3$s',
                      'theme_location' => 'primary',
                    )
                  );

                } elseif ( ! has_nav_menu( 'expanded' ) ) {

                  wp_list_pages(
                    array(
                      'match_menu_classes' => true,
                      'show_sub_menu_icons' => true,
                      'title_li' => false,
                      'walker'   => new Businesswp_Walker_Page(),
                    )
                  );
                }
                ?>
            </ul>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
 <div class="theme_mobile_menu w-100">
    <div class="theme_mobile_container">
      <header>
        <nav id="primary">
          <?php 
          wp_nav_menu( array( 
            'theme_location' => 'primary',
            'container' => '',
            'menu_class'=> '',
          ) );
          ?>
        </nav>
      </header>
    </div>
  </div><!-- End .theme_mobile_menu -->
</nav><!-- .navbar -->
<?php
$secondary_nav_position = businesswp_get_option('secondary_nav_position');
if ($secondary_nav_position=='none') {
  echo "</div><!-- End .header_area_main -->";
}
?>