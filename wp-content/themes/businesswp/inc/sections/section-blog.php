<?php 
$section = 'blog';
$blog_layout = businesswp_get_option($section.'_layout');
$show = businesswp_get_option($section.'_show');
$back_animation_show = businesswp_get_option($section.'_back_animation_show');
$subtitle = businesswp_get_option($section.'_subtitle');
$subtitle_color = businesswp_get_option($section.'_subtitle_color');
$section_title = businesswp_get_option($section.'_title');
$title_color = businesswp_get_option($section.'_title_color');
$desc = businesswp_get_option($section.'_desc');
$desc_color = businesswp_get_option($section.'_desc_color');
$divider_show = businesswp_get_option($section.'_divider_show');
$divider_type = businesswp_get_option($section.'_divider_type');
$container = businesswp_get_option($section.'_container_width');
$bg_color = businesswp_get_option($section.'_bg_color');
$bg_image = businesswp_get_option($section.'_bg_image');
$no_of_blog_to_display = businesswp_get_option($section.'_no_to_show');
$column_layout = businesswp_get_option($section.'_column_layout');
$category = businesswp_get_option($section.'_category');
$blog_orderby = businesswp_get_option($section.'_orderby');
$blog_order = businesswp_get_option($section.'_order');

$col = '';
if( $column_layout == 12){
  $col = 1;
}else if( $column_layout == 6){
  $col = 2;
}else if( $column_layout == 4){
  $col = 3;
}else{
  $col = 4;
}

$section_attributes = '';
$class = '';

if($bg_color && $bg_image==''){
    $section_attributes .= 'style="';
    $section_attributes .= 'background-color:'.esc_attr($bg_color).';';
    $section_attributes .= '"';
}

if($bg_image){
    $section_attributes .= 'style="background-image:url('.esc_url_raw($bg_image).');"';
    $class .= 'background_image overlay';
}

if($show){
?>
<section id="news" class="home_section theme_blog news <?php echo esc_attr($class); ?>" <?php echo $section_attributes; ?>>
 <?php if ($back_animation_show) { ?>
  <div class="animation-area">
    <div class="shape_box_1"></div>
    <div class="shape_box_2"></div>
    <div class="shape_box_3"></div>
    <div class="shape_box_4"></div>
    <div class="shape_box_5"></div>
    <div class="shape_box_6"></div>
    <div class="shape_box_7"></div>
    <div class="shape_box_8"></div>
  </div>
   <?php } ?>
  <div class="<?php echo esc_attr($container); ?>">
    
    <?php do_action('businesswp_frontpage_section_header',$subtitle,$subtitle_color,$section_title,$title_color,$desc,$desc_color,$divider_show,$divider_type); ?>
          
    <div class="row">
       <div class="col-12 wow animate__animated animate__pulse">
          <div class="blog_slider owl-carousel owl-theme">
            <?php
            $args = array(
              'posts_per_page' => absint($no_of_blog_to_display),
              'post_status' => 'publish'
            );

            if ( $category > 0 ) {
                $args['category__in'] = array( $category );
            }
                  
            if ( $blog_orderby && $blog_orderby != 'default' ) {
              $args['orderby'] = $blog_orderby;
            }

            if ( $blog_order) {
              $args['order'] = $blog_order;
            }

            $query = new WP_Query( $args );
            ?>
            
            <?php if ( $query->have_posts() ) : ?>
            
            <?php /* Start the Loop */ ?>
            <?php 
            while ( $query->have_posts() ) : $query->the_post();
              switch ($blog_layout) {
                    case 'layout1':
                      businesswp_blog_layout1();
                      break;
                    
                    default:
                      businesswp_blog_layout2();
                      break;
                  }
            endwhile;
            endif;
            ?>           
        </div>
      </div>
    </div>
  </div>
</section><!-- End .theme_blog -->
<?php
}