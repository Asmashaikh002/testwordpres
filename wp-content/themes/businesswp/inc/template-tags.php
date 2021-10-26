<?php 

/**************************************************
**** Logo
***************************************************/

if ( ! function_exists( 'businesswp_logo' ) ) :

    function businesswp_logo(){
        $class = array();
        $theme_logo = '';
        $html = '';
        
        if ( function_exists( 'has_custom_logo' ) ) {
            if ( has_custom_logo()  ) {
                $theme_logo .= get_custom_logo();
            }
        }

        // Site Identity Logo Display Here
        echo wp_kses_post( $theme_logo );

        if(businesswp_get_option('header_transparent') == true && businesswp_get_option('transparent_header_logo')!='' && businesswp_get_option('sticky_nav') == true ){
          echo '<a class="site-logo tranparent_logo '.esc_attr( join( ' ', $class ) ).'" href="' . esc_url(home_url('/')) . '" rel="home">';
          echo '<img width="222" height="54" src="'.esc_url(businesswp_get_option('transparent_header_logo')).'" class="custom-logo" alt="'.get_bloginfo('name').'">';
          echo '</a>';
        }

        if( !has_custom_logo() ){

            $html = '<a class="site-logo '.esc_attr( join( ' ', $class ) ).'" href="' . esc_url(home_url('/')) . '" rel="home">';
            $html .= '<h1 class="site-title mb-1">' . get_bloginfo('name') . '</h1>';
            $html .= '</a>';
            
            $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) {
                $html .= '<p class="site-description pb-0">'.$description.'</p>';
            }
        }

        echo wp_kses_post( $html );
    }

endif;

/**************************************************
**** About Functions
***************************************************/

if ( ! function_exists( 'businesswp_about_layout1' ) ) :

  function businesswp_about_layout1(){

    $section = 'about';
    $button_text = businesswp_get_option($section.'_button_text');
    $button_url = businesswp_get_option($section.'_button_url');
    $section_content = businesswp_get_option($section.'_content');
    $section_featured_image = businesswp_get_option($section.'_featured_image');
    ?>
      <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center">
            <div class="about-wrap">
              <a href="<?php echo esc_url($button_url); ?>"><img class="theme-images" src="<?php echo esc_html($section_featured_image); ?>"></a>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="about-wrap-content">
               <?php if($section_content): ?>
              <p class="about-desc"><?php echo wp_kses_post( html_entity_decode($section_content) ); ?></p>
               <?php endif; ?>
              <div class="wow animate__animated animate__fadeInUp">
                  <?php if($button_url !=''){ ?>
                  <a class="button" href="<?php echo esc_url($button_url); ?>"><?php echo esc_html($button_text); ?> <i class="fa fa-long-arrow-right"></i></a>
                   <?php } ?>
              </div>
            </div>
          </div>
    <?php
  }

endif;

if ( ! function_exists( 'businesswp_about_layout2' ) ) :

  function businesswp_about_layout2(){

    $section = 'about';
    $button_text = businesswp_get_option($section.'_button_text');
    $button_url = businesswp_get_option($section.'_button_url');
    $section_content = businesswp_get_option($section.'_content');
    $section_featured_image = businesswp_get_option($section.'_featured_image');
    ?>
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="about-wrap-content">
           <?php if($section_content): ?>
          <p class="about-desc"><?php echo wp_kses_post( html_entity_decode($section_content) ); ?></p>
           <?php endif; ?>
          <div class="wow animate__animated animate__fadeInUp">
              <?php if($button_url !=''){ ?>
              <a class="button" href="<?php echo esc_url($button_url); ?>"><?php echo esc_html($button_text); ?> <i class="fa fa-long-arrow-right"></i></a>
               <?php } ?>
          </div>
        </div>
      </div>

      <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center">
            <div class="about-wrap">
              <a href="<?php echo esc_url($button_url); ?>"><img class="theme-images" src="<?php echo esc_html($section_featured_image); ?>"></a>
            </div>
      </div>
      
    <?php
  }
endif;

/**************************************************
**** Service Functions
***************************************************/

if ( ! function_exists( 'businesswp_service_layout1' ) ) :

  function businesswp_service_layout1(){

    $section = 'service';
    $items = array();
    $items = businesswp_get_option($section.'_content');
    if(!$items){
      $items = businesswp_service_default_contents();
    }

    if(is_string($items)){
      $items = json_decode($items);
    }
   foreach ($items as $key => $item) { 
    $title = ! empty( $item->title ) ? apply_filters( 'businesswp_translate_single_string', $item->title, 'Service section' ) : '';
    $button_text = ! empty( $item->button_text ) ? apply_filters( 'businesswp_translate_single_string', $item->button_text, 'Service section' ) : '';
    $text = ! empty( $item->text ) ? apply_filters( 'businesswp_translate_single_string', $item->text, 'Service section' ) : '';
    $icon = ! empty( $item->icon_value ) ? $item->icon_value : '';
    $link = ! empty( $item->link ) ? apply_filters( 'businesswp_translate_single_string', $item->link, 'Service section' ) : '';
    $item->image_url = ! empty( $item->image_url ) ? $item->image_url : '';
    ?>
    <div class="col-lg-4 col-md-6 col-12 wow animate__animated animate__fadeInUp">
        <div class="service-wrap">
          <?php if( $item->image_url != ''){ ?>
          <div class="service-wrap-without-bg">
              <div class="service-wrap-overlay">
                <img src="<?php echo esc_url($item->image_url); ?>">
              </div>
              <?php if($icon): ?>
              <div class="service-wrap-icon"><a href="<?php echo $link; ?>"><i class="fa <?php echo esc_attr( $icon ); ?>"></i></a></div>
              <?php endif; ?>
              <?php if($title): ?>
              <h3 class="service-wrap-title"><a href="<?php echo $link; ?>"><?php echo wp_kses_post( html_entity_decode( $title ) ); ?></a></h3>
              <?php endif; ?>
              <?php if($text): ?>
              <p class="service-wrap-desc"><?php echo wp_kses_post( html_entity_decode( $text ) ); ?></p>
              <?php endif; 
              if($button_text!=''){
              ?>
              <a class="button" href="<?php echo esc_url($link);?>" > <?php echo esc_html($button_text); ?> </a>
              <?php } ?>
          </div>
          <?php
          }else{
            ?>
            <?php if($icon): ?>
            <div class="service-wrap-icon"><a href="<?php echo $link; ?>"><i class="fa <?php echo esc_attr( $icon ); ?>"></i></a></div>
            <?php endif; ?>
            <?php if($title): ?>
            <h3 class="service-wrap-title"><a href="<?php echo $link; ?>"><?php echo wp_kses_post( html_entity_decode( $title ) ); ?></a></h3>
            <?php endif; ?>
            <?php if($text): ?>
            <p class="service-wrap-desc"><?php echo wp_kses_post( html_entity_decode( $text ) ); ?></p>
            <?php endif; 
            if($button_text!=''){
            ?>
            <a class="button" href="<?php echo esc_url($link);?>" > <?php echo esc_html($button_text); ?> </a>
            <?php
            }
          }
          ?>
        </div>
    </div>
    <?php }
  }

endif;

if ( ! function_exists( 'businesswp_service_layout2' ) ) :

  function businesswp_service_layout2(){

    $section = 'service';
    $items = array();
    $items = businesswp_get_option($section.'_content');
    if(!$items){
      $items = businesswp_service_default_contents();
    }

    if(is_string($items)){
      $items = json_decode($items);
    }
    foreach ($items as $key => $item) { 
    $title = ! empty( $item->title ) ? apply_filters( 'businesswp_translate_single_string', $item->title, 'Service section' ) : '';
    $button_text = ! empty( $item->button_text ) ? apply_filters( 'businesswp_translate_single_string', $item->button_text, 'Service section' ) : '';
    $text = ! empty( $item->text ) ? apply_filters( 'businesswp_translate_single_string', $item->text, 'Service section' ) : '';
    $icon = ! empty( $item->icon_value ) ? $item->icon_value : '';
    $link = ! empty( $item->link ) ? apply_filters( 'businesswp_translate_single_string', $item->link, 'Service section' ) : '';
    $item->image_url = ! empty( $item->image_url ) ? $item->image_url : '';
    ?>
  <div class="col-lg-4 col-md-6 col-12 wow animate__animated animate__fadeInUp">
    <div class="service-wrap">
        <?php if( $item->image_url != ''){ ?>
        <div class="service-wrap-without-bg">
          <div class="service-wrap-overlay">
            <img src="<?php echo esc_url($item->image_url); ?>">
          </div>
          <ul class="list-unstyled">
            <li class="media">
               <?php if($icon): ?>
                <div class="service-wrap-icon mr-3">
                  <a href="<?php echo $link; ?>"><i class="fa <?php echo esc_attr( $icon ); ?>"></i></a>
                </div>
                <?php endif; ?>
                <div class="media-body layout2">
                  <?php if($title): ?>
                  <h3 class="service-wrap-title"><a href="<?php echo $link; ?>"><?php echo wp_kses_post( html_entity_decode( $title ) ); ?></a></h3>
                  <?php endif; ?>
                  <?php if($text): ?>
                  <p class="service-wrap-desc"><?php echo wp_kses_post( html_entity_decode( $text ) ); ?></p>
                  <?php endif; 
                  if($button_text!=''){
                  ?>
                  <a class="button" href="<?php echo esc_url($link);?>" > <?php echo esc_html($button_text); ?> </a>
                  <?php } ?>
                </div>
              </li>
          </ul>
        </div>
      <?php } else { ?>
      <ul class="list-unstyled">
        <li class="media">
           <?php if($icon): ?>
            <div class="service-wrap-icon mr-3">
              <a href="<?php echo $link; ?>"><i class="fa <?php echo esc_attr( $icon ); ?>"></i></a>
            </div>
            <?php endif; ?>
            <div class="media-body layout2">
              <?php if($title): ?>
              <h3 class="service-wrap-title"><a href="<?php echo $link; ?>"><?php echo wp_kses_post( html_entity_decode( $title ) ); ?></a></h3>
              <?php endif; ?>
              <?php if($text): ?>
              <p class="service-wrap-desc"><?php echo wp_kses_post( html_entity_decode( $text ) ); ?></p>
              <?php endif; 
              if($button_text!=''){
              ?>
              <a class="button" href="<?php echo esc_url($link);?>" > <?php echo esc_html($button_text); ?> </a>
              <?php } ?> 
            </div>
          </li>
      </ul>
      <?php
      }
      ?>
    </div>
  </div>
  <?php }

  }

endif;

if ( ! function_exists( 'businesswp_service_layout3' ) ) :

  function businesswp_service_layout3(){

    $section = 'service';
    $items = array();
    $items = businesswp_get_option($section.'_content');
    if(!$items){
      $items = businesswp_service_default_contents();
    }

    if(is_string($items)){
      $items = json_decode($items);
    }
    foreach ($items as $key => $item) { 
    $title = ! empty( $item->title ) ? apply_filters( 'businesswp_translate_single_string', $item->title, 'Service section' ) : '';
    $button_text = ! empty( $item->button_text ) ? apply_filters( 'businesswp_translate_single_string', $item->button_text, 'Service section' ) : '';
    $text = ! empty( $item->text ) ? apply_filters( 'businesswp_translate_single_string', $item->text, 'Service section' ) : '';
    $icon = ! empty( $item->icon_value ) ? $item->icon_value : '';
    $link = ! empty( $item->link ) ? apply_filters( 'businesswp_translate_single_string', $item->link, 'Service section' ) : '';
    $item->image_url = ! empty( $item->image_url ) ? $item->image_url : '';
    ?>
  <div class="col-lg-4 col-md-6 col-12 wow animate__animated animate__fadeInUp">
    <div class="service-wrap">
      <?php if( $item->image_url != '')
          { ?>
      <div class="service-wrap-without-bg">
          <div class="service-wrap-overlay">
            <img src="<?php echo esc_url($item->image_url); ?>">
          </div>
      <ul class="list-unstyled">
        <li class="media">
            <div class="media-body layout3">
              <?php if($title): ?>
              <h3 class="service-wrap-title"><a href="<?php echo $link; ?>"><?php echo wp_kses_post( html_entity_decode( $title ) ); ?></a></h3>
              <?php endif; ?>
              <?php if($text): ?>
              <p class="service-wrap-desc"><?php echo wp_kses_post( html_entity_decode( $text ) ); ?></p>
              <?php endif; ?>
              <?php if($button_text!=''){ ?>
              <a class="button" href="<?php echo esc_url($link);?>" > <?php echo esc_html($button_text); ?></a>
              <?php } ?>
            </div>
            <?php if($icon): ?>
            <div class="service-wrap-icon ml-3">
              <a href="<?php echo $link; ?>"><i class="fa <?php echo esc_attr( $icon ); ?>"></i></a>
            </div>
            <?php endif; ?>                     
          </li>
      </ul>
      </div>
      <?php
      }else{
      ?>
      <ul class="list-unstyled">
        <li class="media">
            <div class="media-body layout3">
              <?php if($title): ?>
              <h3 class="service-wrap-title"><a href="<?php echo $link; ?>"><?php echo wp_kses_post( html_entity_decode( $title ) ); ?></a></h3>
              <?php endif; ?>
              <?php if($text): ?>
              <p class="service-wrap-desc"><?php echo wp_kses_post( html_entity_decode( $text ) ); ?></p> 
              <?php endif; ?>
              <?php if($button_text!=''){ ?>
              <a class="button" href="<?php echo esc_url($link);?>" > <?php echo esc_html($button_text); ?></a>
              <?php } ?>
            </div>
            <?php if($icon): ?>
            <div class="service-wrap-icon ml-3">
              <a href="<?php echo $link; ?>"><i class="fa <?php echo esc_attr( $icon ); ?>"></i></a>
            </div>
            <?php endif; ?>                     
          </li>
      </ul>
      <?php
      }
      ?>
    </div>
  </div>
  <?php }

  }

endif;

/**************************************************
**** Counter Functions
***************************************************/

if ( ! function_exists( 'businesswp_counter_layout1' ) ) :

  function businesswp_counter_layout1(){

    $section = 'counter';
    $items = array();
    $items = businesswp_get_option($section.'_content');
    if(!$items){
      $items = businesswp_counter_default_contents();
    }

    if(is_string($items)){
      $items = json_decode($items);
    }
    foreach ($items as $key => $item) { 
          $title = ! empty( $item->title ) ? apply_filters( 'businesswp_translate_single_string', $item->title, 'Counter section' ) : '';
          $text = ! empty( $item->text ) ? apply_filters( 'businesswp_translate_single_string', $item->text, 'Counter section' ) : '';
          $icon = ! empty( $item->icon_value ) ? $item->icon_value : '';
        ?>
        
        <div class="col-lg-3 col-md-6 col-12 align-items-center justify-content-center wow animate__animated animate__pulse">
            <div class="counter-wrap counter-wrap-1">
              <div class="media">
                <div class="media-body">
                <?php if($icon): ?>
                <div class="text-center"><i class="fa <?php echo esc_attr( $icon ); ?>"></i></div>
                <?php endif; ?>
                  <?php if($text): ?>
                  <h5 class="text-center counter-number mt-0"><?php echo wp_kses_post( $text ); ?></h5>
                  <?php endif; ?>
                  <?php if($title): ?>
                  <p class="text-center counter-detail"><?php echo wp_kses_post( $title ); ?></p>
                  <?php endif; ?>
                  <div class="counter-wrap-decor"></div>
                </div>
              </div>
            </div>
        </div>
    <?php } 

  }

endif;

if ( ! function_exists( 'businesswp_counter_layout2' ) ) :

  function businesswp_counter_layout2(){

    $section = 'counter';
    $items = array();
    $items = businesswp_get_option($section.'_content');
    if(!$items){
      $items = businesswp_counter_default_contents();
    }

    if(is_string($items)){
      $items = json_decode($items);
    }
    foreach ($items as $key => $item) { 
          $title = ! empty( $item->title ) ? apply_filters( 'businesswp_translate_single_string', $item->title, 'Counter section' ) : '';
          $text = ! empty( $item->text ) ? apply_filters( 'businesswp_translate_single_string', $item->text, 'Counter section' ) : '';
          $icon = ! empty( $item->icon_value ) ? $item->icon_value : '';
        ?>
        <div class="col-lg-3 col-md-6 col-12 d-flex align-items-center justify-content-center wow animate__animated animate__pulse">
            <div class="counter-wrap counter-wrap-2">
              <div class="media">
                <?php if($icon): ?>
                  <i class=" mr-4 fa <?php echo esc_attr( $icon ); ?>"></i>
                  <?php endif; ?>
                <div class="media-body">
                  <?php if($text): ?>
                  <h5 class="text-left counter-number mt-0"><?php echo wp_kses_post( $text ); ?></h5>
                  <?php endif; ?>
                  <?php if($title): ?>
                  <p class="text-left counter-detail"><?php echo wp_kses_post( $title ); ?></p>
                  <?php endif; ?>
                  <div class="counter-wrap-decor"></div>
                </div>
              </div>
            </div>
        </div>
    <?php } 

  }

endif;

if ( ! function_exists( 'businesswp_counter_layout3' ) ) :

  function businesswp_counter_layout3(){

    $section = 'counter';
    $items = array();
    $items = businesswp_get_option($section.'_content');
    if(!$items){
      $items = businesswp_counter_default_contents();
    }

    if(is_string($items)){
      $items = json_decode($items);
    }
    foreach ($items as $key => $item) { 
          $title = ! empty( $item->title ) ? apply_filters( 'businesswp_translate_single_string', $item->title, 'Counter section' ) : '';
          $text = ! empty( $item->text ) ? apply_filters( 'businesswp_translate_single_string', $item->text, 'Counter section' ) : '';
          $icon = ! empty( $item->icon_value ) ? $item->icon_value : '';
        ?>
        
        <div class="col-lg-3 col-md-6 col-12 d-flex align-items-center justify-content-center wow animate__animated animate__pulse">
            <div class="counter-wrap counter-wrap-3">
              <div class="media">
                <div class="media-body">
                  <?php if($text): ?>
                  <h5 class="text-right counter-number mt-0"><?php echo wp_kses_post( $text ); ?></h5>
                  <?php endif; ?>
                  <?php if($title): ?>
                  <p class="text-right counter-detail"><?php echo wp_kses_post( $title ); ?></p>
                  <?php endif; ?>
                  <div class="counter-wrap-decor"></div>
                </div>
                <?php if($icon): ?>
                <i class=" ml-4 fa <?php echo esc_attr( $icon ); ?>"></i>
                <?php endif; ?>
              </div>
            </div>
        </div>
    <?php } 

  }

endif;

/**************************************************
**** Portfolio Functions
***************************************************/

if ( ! function_exists( 'businesswp_portfolio_layout1' ) ) :

 function businesswp_portfolio_layout1( $colum = 'col-lg-4 col-md-6 col-12' ){

  global $post;
  $postId = get_the_ID();
  $imageid = wp_get_attachment_image_src( get_post_thumbnail_id($postId), 'full' );
  $featimage = $imageid['0'];
  $port_categories = get_the_term_list(get_the_ID(), 'portfolio_categories' ,' ', ' ' ,' ');
  $pot_cat = wp_get_object_terms( $postId, 'portfolio_categories');
  $pot_cat = array_column($pot_cat, 'slug');
  $pot_cat = implode(' ', $pot_cat);

  $permalink = get_the_permalink();
  ?>
  <div class="<?php echo $colum ; ?> project-item <?php echo $pot_cat; ?> wow animate__animated animate__pulse">
    <div class="portfolio-wrap">
      <a href="<?php echo $permalink; ?>"><img src="<?php echo $featimage; ?>"></a>
      <div class="portfolio-overlay">
        <a href="<?php echo $permalink; ?>"><i class="portfolio-icon fa fa-plus"></i></a>
        <h6 class="portfolio-title"><a href="<?php echo $permalink; ?>"><?php echo get_the_title(); ?></a></h6>
        <div class="portfolio-category">
          <?php echo $port_categories;?>
        </div>                  
      </div>
    </div>
  </div>
  <?php 
}

endif;

if ( ! function_exists( 'businesswp_portfolio_layout2' ) ) :

  function businesswp_portfolio_layout2( $colum = 'col-lg-4 col-md-6 col-12' ){

  global $post;
  $postId = get_the_ID();
  $imageid = wp_get_attachment_image_src( get_post_thumbnail_id($postId), 'full' );
  $featimage = $imageid['0'];
  $port_categories = get_the_term_list(get_the_ID(), 'portfolio_categories', '', ', ', '');
  $pot_cat = wp_get_object_terms( $postId, 'portfolio_categories');
  $pot_cat = array_column($pot_cat, 'slug');
  $pot_cat = implode(' ', $pot_cat);


  $permalink = get_the_permalink();
  ?>
  <div class="<?php echo $colum ; ?> project-item <?php echo $pot_cat; ?> wow animate__animated animate__zoomIn">
    <div class="portfolio-wrap-2">
      <div class="portfolio-thumbnail">
        <img src="<?php echo $featimage; ?>">
        <div class="portfolio-overlay-2">
          <a class="photobox_item" href="<?php echo $featimage; ?>"><i class="fa fa-search"></i></a>
          <a href="<?php echo $permalink; ?>"><i class="fa fa-link"></i></a>
        </div>
      </div>
      <div class="portfolio-content-area">
        <h6 class="portfolio-title-2"><a href="<?php echo $permalink; ?>"><?php echo get_the_title(); ?></a></h6>
        <div class="portfolio-category-2">
          <?php echo $port_categories;?>
        </div>  
      </div>
    </div>
  </div>
  <?php 

}

endif;

/**************************************************
**** Pricing Functions
***************************************************/

if ( ! function_exists( 'businesswp_pricing_layout1' ) ) :

 function businesswp_pricing_layout1(){ 

  $section = 'pricing';
  $items = array();
  $items = businesswp_get_option($section.'_content');
  if(!$items){
    $items = businesswp_pricing_default_contents();
  }

  if(is_string($items)){
    $items = json_decode($items);
  }

  foreach ($items as $key => $item) { 
        $icon = ! empty( $item->icon_value ) ? $item->icon_value : '';
        $title = ! empty( $item->title ) ? apply_filters( 'businesswp_translate_single_string', $item->title, 'Pricing section' ) : '';
        $text = ! empty( $item->text ) ? apply_filters( 'businesswp_translate_single_string', $item->text, 'Pricing section' ) : '';
        $button_text = ! empty( $item->button_text ) ? apply_filters( 'businesswp_translate_single_string', $item->button_text, 'Pricing section' ) : '';
        $link = ! empty( $item->link ) ? apply_filters( 'businesswp_translate_single_string', $item->link, 'Pricing section' ) : '';
        $checkbox_val = ! empty( $item->checkbox_val ) ? $item->checkbox_val : false;
        $currency = ! empty( $item->currency ) ? $item->currency : '';
        $price = ! empty( $item->price ) ? $item->price : '';
        $price_time = ! empty( $item->price_time ) ? apply_filters( 'businesswp_translate_single_string', $item->price_time, 'Pricing section' ) : '';
        $featured = ! empty( $item->featured ) ? $item->featured : false;
  ?>
  <div class="col-lg-4 col-md-4 col-sm-12  wow animate__animated animate__pulse">
   <div class="pricing-wrap  <?php if($featured==true || $featured== '1') { echo "featured"; } ?>">
          <?php if($icon != ''){ ?>
          <i class="fa <?php echo esc_attr( $icon ); ?>"></i>
          <?php } ?>
          <h3 class="pricing-title"><?php echo wp_kses_post( html_entity_decode( $title ) ); ?></h3>
          <h2 class="pricing-price"><sup><?php echo esc_html($currency); ?></sup><?php echo esc_html($price); ?></h2>
          <span><?php echo esc_html($price_time); ?></span>
          <ul class="pricing-detail">
           <?php echo wp_kses_post( html_entity_decode( $text ) ); ?>
          </ul>
          <div class="wow animate__animated animate__fadeInUp">
            <a class="button" href="<?php echo esc_url($link); ?>" <?php if($checkbox_val==true || $checkbox_val== '1') { echo "target='_blank'"; } ?>><?php echo esc_html($button_text); ?></a>
          </div>
          <div class="pricing-wrap-decor"></div>
    </div>
  </div>
  <?php }

  }

endif;

if ( ! function_exists( 'businesswp_pricing_layout2' ) ) :

 function businesswp_pricing_layout2(){

  $section = 'pricing';
  $items = array();
  $items = businesswp_get_option($section.'_content');
  if(!$items){
    $items = businesswp_pricing_default_contents();
  }

  if(is_string($items)){
    $items = json_decode($items);
  }
  foreach ($items as $key => $item) { 
        $icon = ! empty( $item->icon_value ) ? $item->icon_value : '';
        $title = ! empty( $item->title ) ? apply_filters( 'businesswp_translate_single_string', $item->title, 'Pricing section' ) : '';
        $text = ! empty( $item->text ) ? apply_filters( 'businesswp_translate_single_string', $item->text, 'Pricing section' ) : '';
        $button_text = ! empty( $item->button_text ) ? apply_filters( 'businesswp_translate_single_string', $item->button_text, 'Pricing section' ) : '';
        $link = ! empty( $item->link ) ? apply_filters( 'businesswp_translate_single_string', $item->link, 'Pricing section' ) : '';
        $checkbox_val = ! empty( $item->checkbox_val ) ? $item->checkbox_val : false;
        $currency = ! empty( $item->currency ) ? $item->currency : '';
        $price = ! empty( $item->price ) ? $item->price : '';
        $price_time = ! empty( $item->price_time ) ? apply_filters( 'businesswp_translate_single_string', $item->price_time, 'Pricing section' ) : '';
        $featured = ! empty( $item->featured ) ? $item->featured : false;
    ?>

  <div class="col-lg-4 col-md-6 col-12  wow animate__animated animate__pulse">
   <div class="pricing-wrap p-0">
          <div class="pricing-top <?php if($featured==true || $featured== '1') { echo "featured"; } ?>">
            <h3 class="pricing-title"><?php echo wp_kses_post( html_entity_decode( $title ) ); ?></h3>
            <?php if($icon != ''){ ?>
            <i class="fa <?php echo esc_attr( $icon ); ?>"></i>
            <?php } ?>
            <h2 class="pricing-price"><sup><?php echo esc_html($currency); ?></sup><?php echo esc_html($price); ?></h2>
            <span><?php echo esc_html($price_time); ?></span>
          </div>
          <div class="pricing-contents">
            <ul class="pricing-detail">
             <?php echo wp_kses_post( html_entity_decode( $text ) ); ?>
            </ul>
            <div class="wow animate__animated animate__fadeInUp">
              <a class="button" href="<?php echo esc_url($link); ?>" <?php if($checkbox_val==true || $checkbox_val== '1') { echo "target='_blank'"; } ?>><?php echo esc_html($button_text); ?></a>
            </div>
          </div>
          <div class="pricing-wrap-decor"></div>
    </div>
  </div>
  <?php }

}

endif;

/**************************************************
**** Testimonial Functions
***************************************************/

if ( ! function_exists( 'businesswp_testimonial_layout1' ) ) :

 function businesswp_testimonial_layout1(){

  $section = 'testimonial';
  $items = array();
  $items = businesswp_get_option($section.'_content');
  if(!$items){
    $items = businesswp_testimonial_default_contents();
  }
  if(is_string($items)){
  $items = json_decode($items);
  }
   foreach ($items as $key => $item) { 
            $title = ! empty( $item->title ) ? apply_filters( 'businesswp_translate_single_string', $item->title, 'Testimonial section' ) : '';
            $designation = ! empty( $item->designation ) ? apply_filters( 'businesswp_translate_single_string', $item->designation, 'Testimonial section' ) : '';
            $text = ! empty( $item->text ) ? apply_filters( 'businesswp_translate_single_string', $item->text, 'Testimonial section' ) : '';
    
  ?>
  <div class="item wow animate__animated animate__fadeInUp">
      <div class="testimonial-wrap text-center">
        <figure class="testimonial-pic">
          <a><img src="<?php echo esc_url($item->image_url); ?>" alt="<?php echo esc_attr($title); ?>"></a>
        </figure>
         <div class="testimonial-description">
          <h3><?php echo wp_kses_post( html_entity_decode( $text ) ); ?></h3>
        </div>
        <figcaption class="testimonial-auther">
          <cite class="testimonial-auther-name"><a><?php echo wp_kses_post( html_entity_decode( $title ) ); ?></a></cite> /
          <span class="testimonial-auther-post"><?php echo wp_kses_post( html_entity_decode( $designation ) ); ?></span>
        </figcaption>
         <i class="testimonial-bg-icon fa fa-quote-right"></i>
      </div>
  </div>
  <?php }

  }

endif;

if ( ! function_exists( 'businesswp_testimonial_layout2' ) ) :

 function businesswp_testimonial_layout2(){

  $section = 'testimonial';
  $items = array();
  $items = businesswp_get_option($section.'_content');
  if(!$items){
    $items = businesswp_testimonial_default_contents();
  }
  if(is_string($items)){
  $items = json_decode($items);
  }
   foreach ($items as $key => $item) { 
            $title = ! empty( $item->title ) ? apply_filters( 'businesswp_translate_single_string', $item->title, 'Testimonial section' ) : '';
            $designation = ! empty( $item->designation ) ? apply_filters( 'businesswp_translate_single_string', $item->designation, 'Testimonial section' ) : '';
            $text = ! empty( $item->text ) ? apply_filters( 'businesswp_translate_single_string', $item->text, 'Testimonial section' ) : '';
    
  ?>
  <div class="item">
      <div class="testimonial-wrap text-center">
        <i class="testimonial-bg-icon2 fa fa-quote-right"></i>
          <div class="testimonial-description">
            <h3><?php echo wp_kses_post( html_entity_decode( $text ) ); ?></h3>
          </div>    
          <figure class="testimonial-pic">
            <a><img src="<?php echo esc_url($item->image_url); ?>" alt="<?php echo esc_attr($title); ?>"></a>
          </figure>
          <figcaption class="testimonial-auther">
          <cite class="testimonial-auther-name"><a><?php echo wp_kses_post( html_entity_decode( $title ) ); ?></a></cite> /
          <span class="testimonial-auther-post"><?php echo wp_kses_post( html_entity_decode( $designation ) ); ?></span>
          </figcaption>
      </div>
  </div>
  <?php }

  }

endif;

/**************************************************
**** News Functions
***************************************************/

if ( ! function_exists( 'businesswp_blog_layout1' ) ) :

 function businesswp_blog_layout1(){

  global $post;
    $category = businesswp_get_option('archive_categories_show');
    ?>
      <div class="item">
        <div class="blog-wrap">
          <?php if( has_post_thumbnail() ): ?>
          <div class="blog-img">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
          </div>
           <?php endif; ?>
          <div class="blog-header">
              <figure class="blog-author-image mr-2">
                <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><img src="<?php echo esc_url( get_avatar_url( get_the_author_meta( 'ID' ) ) ); ?>" alt="<?php echo esc_attr(get_the_author_link());?>"></a>
              </figure>
              <h6 class="blog-author"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><?php echo get_the_author_link();?></a></h6>
              <time class="blog-date"><?php the_time( get_option('date_format') ); ?></time>
          </div>
          <div class="blog-content">
            <h3 class="blog-content-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
            <?php the_excerpt(); ?>
          </div>
          <div class="blog-cat-tag">
            <?php if( has_category() && $category ) { ?>
              <span class="post-category"><i class="fa fas fa-list-alt"></i> <?php the_category( ' <span class="swp-sep">,</span> ', get_the_ID() ); ?></span>
              <?php } ?>
          </div>
        </div>
      </div>
  <?php
}

endif;

if ( ! function_exists( 'businesswp_blog_layout2' ) ) :

  function businesswp_blog_layout2(){ 

    global $post;
    $category = businesswp_get_option('archive_categories_show');
    ?>
      <div class="item">
        <div class="blog-wrap">  
          <?php if( has_post_thumbnail() ): ?>
          <div class="blog-img">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
            <div class="blog_overlay">
              <div class="blog_overlay_inner">
                <a class="blog_overlay_icon" href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>
              </div>
            </div>
            <div class="blog_time_date">
              <span><?php the_time('d'); ?></span>
              <span><?php the_time('M'); ?></span>
            </div>
          </div>
           <?php endif; ?>
          <div class="blog-content">
            <h3 class="blog-content-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
            <?php the_excerpt(); ?>
          </div>
          <div class="blog-cat-tag">
            <?php if( has_category() && $category ) { ?>
              <span class="post-category"><i class="fa fas fa-list-alt"></i> <?php the_category( ' <span class="swp-sep">,</span> ', get_the_ID() ); ?></span>
              <?php } ?>
          </div>
        </div>
      </div>
  <?php

  }

endif;

/**************************************************
**** Team Functions
***************************************************/

if ( ! function_exists( 'businesswp_team_layout1' ) ) :

    function businesswp_team_layout1(){

    $section = 'team';
    $items = array();
    $items = businesswp_get_option($section.'_content');
    if(!$items){
      $items = businesswp_team_default_contents();
      }

    if(is_string($items)){
      $items = json_decode($items);
      }

    foreach ($items as $key => $item) {  

    $title = ! empty( $item->title ) ? apply_filters( 'businesswp_translate_single_string', $item->title, 'Team section' ) : '';
    $designation = ! empty( $item->designation ) ? apply_filters( 'businesswp_translate_single_string', $item->designation, 'Team section' ) : '';
    $text = ! empty( $item->text ) ? apply_filters( 'businesswp_translate_single_string', $item->text, 'Team section' ) : '';
    $link = ! empty( $item->link ) ? apply_filters( 'businesswp_translate_single_string', $item->link, 'Team section' ) : '#';
    ?>
    <div class="col-lg-4 col-md-6 col-12  wow animate__animated animate__pulse">
      <div class="team-wrap">
        <div class="media">
          <div class="team-img mt-3 mr-4">
            <a href="<?php echo esc_url($link); ?>">
            <img class="align-self-start" src="<?php echo esc_url($item->image_url); ?>" alt="<?php echo esc_attr($title); ?>"/></a>
          </div>
          <div class="media-body">
            <h5 class="team-title"><a href="<?php echo esc_url($link); ?>"><?php echo wp_kses_post( html_entity_decode( $title ) ); ?></a></h5>

             <div class="team-designation"><?php echo wp_kses_post( html_entity_decode( $designation ) ); ?></div>
             <p class="team-description"><?php echo wp_kses_post( html_entity_decode( $text ) ); ?></p>
            <div class="team-social-icon">
              <ul class="list-none team-social-link">
               <?php 
               if ( ! empty( $item->social_repeater ) ) {
                  $icons = html_entity_decode( $item->social_repeater );
                  $icons_decoded = json_decode( $icons, true );
                     if ( ! empty( $icons_decoded ) ) {
                      foreach( $icons_decoded as $value ){ 
                        $social_icon = ! empty( $value['icon'] ) ? $value['icon'] : '';
                        $social_link = ! empty( $value['link'] ) ? $value['link'] : '';

                        if($social_icon==''){
                          continue;
                        }
                      ?>
                      <li><a href="<?php echo esc_url( $value['link'] ); ?>"><i class="fa <?php echo esc_attr( $value['icon'] ); ?>"></i></a></li>
                  <?php } 
                    } 
                }else{ ?>
                  <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                  <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
      <?php 
      }

    }

endif;

if ( ! function_exists( 'businesswp_team_layout2' ) ) :

  function businesswp_team_layout2(){

  $section = 'team';
  $items = array();
  $items = businesswp_get_option($section.'_content');
  if(!$items){
    $items = businesswp_team_default_contents();
  }

  if(is_string($items)){
    $items = json_decode($items);
  }

  foreach ($items as $key => $item) {  

    $title = ! empty( $item->title ) ? apply_filters( 'businesswp_translate_single_string', $item->title, 'Team section' ) : '';
    $designation = ! empty( $item->designation ) ? apply_filters( 'businesswp_translate_single_string', $item->designation, 'Team section' ) : '';
    $text = ! empty( $item->text ) ? apply_filters( 'businesswp_translate_single_string', $item->text, 'Team section' ) : '';
    $link = ! empty( $item->link ) ? apply_filters( 'businesswp_translate_single_string', $item->link, 'Team section' ) : '#';
 ?>
  <div class="col-lg-3 col-md-6 col-12 wow animate__animated animate__fadeInUp">
              <div class="team-wrap-2">
                <div class="team-img-2 text-center">
                 <a href="<?php echo esc_url($link); ?>">
                  <img class="align-self-start" src="<?php echo esc_url($item->image_url); ?>" alt="<?php echo esc_attr($title); ?>"/></a>
                </div>
                <div class="team-detail">
                   <h5 class="team-title"><a href="<?php echo esc_url($link); ?>"><?php echo wp_kses_post( html_entity_decode( $title ) ); ?></a></h5>
                   <span class="team-designation"><?php echo wp_kses_post( html_entity_decode( $designation ) ); ?></span>
                    <div class="team-social-icon">
                      <ul class="list-none team-social-link">
                       <?php 
                       if ( ! empty( $item->social_repeater ) ) {
                          $icons = html_entity_decode( $item->social_repeater );
                          $icons_decoded = json_decode( $icons, true );
                             if ( ! empty( $icons_decoded ) ) {
                              foreach( $icons_decoded as $value ){ 
                                $social_icon = ! empty( $value['icon'] ) ? $value['icon'] : '';
                                $social_link = ! empty( $value['link'] ) ? $value['link'] : '';

                                if($social_icon==''){
                                  continue;
                                }
                              ?>
                              <li><a href="<?php echo esc_url( $value['link'] ); ?>"><i class="fa <?php echo esc_attr( $value['icon'] ); ?>"></i></a></li>
                          <?php } 
                            } 
                        }else{ ?>
                          <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                          <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                          <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <?php } ?>
                      </ul>
                    </div>
                </div>
              </div>
          </div>
         <?php 
    }
}

endif;

/**************************************************
**** Contact Functions
***************************************************/

if ( ! function_exists( 'businesswp_contact_layout1' ) ) :

  function businesswp_contact_layout1(){

    $section = 'contact';
    $items = array();
    $items = businesswp_get_option($section.'_content');
    if(!$items){
      $items = businesswp_contact_default_contents();
    }

    if(is_string($items)){
      $items = json_decode($items);
    }
   foreach ($items as $key => $item) { 
    $icon = ! empty( $item->icon_value ) ? $item->icon_value : '';
    $title = ! empty( $item->title ) ? apply_filters( 'businesswp_translate_single_string', $item->title, 'Contact section' ) : '';
    $text = ! empty( $item->text ) ? apply_filters( 'businesswp_translate_single_string', $item->text, 'Contact section' ) : '';
    ?>

    <div class="col-lg-3 col-md-6 col-12  wow animate__animated animate__pulse d-flex justify-content-center justify-content-md-center">
      <div class="contact-wrap">
        <div class="media">
            <div class="media-body">
            <?php if($icon): ?>
            <div class="contact-icon">
              <i class="m-auto fa <?php echo esc_attr( $icon ); ?>"></i>
            </div>
            <?php endif; ?>
            <div class="contact-content">
               <?php if($title): ?>
                <span><?php echo wp_kses_post( html_entity_decode( $title ) ); ?></span>
              <?php endif; ?>

              <?php if($text): ?>
              <p><?php echo wp_kses_post( html_entity_decode( $text ) ); ?></p>
               <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } 

  }

endif;

if ( ! function_exists( 'businesswp_contact_layout2' ) ) :

  function businesswp_contact_layout2(){

    $section = 'contact';
    $items = array();
    $items = businesswp_get_option($section.'_content');
    if(!$items){
      $items = businesswp_contact_default_contents();
    }

    if(is_string($items)){
      $items = json_decode($items);
    }
   foreach ($items as $key => $item) { 
    $icon = ! empty( $item->icon_value ) ? $item->icon_value : '';
    $title = ! empty( $item->title ) ? apply_filters( 'businesswp_translate_single_string', $item->title, 'Contact section' ) : '';
    $text = ! empty( $item->text ) ? apply_filters( 'businesswp_translate_single_string', $item->text, 'Contact section' ) : '';
    ?>

    <div class="col-lg-3 col-md-6 col-12  wow animate__animated animate__pulse d-flex justify-content-center justify-content-md-center">
      <div class="contact-wrap">
        <div class="media">
            <?php if($icon): ?>
            <div class="contact-icon">
              <i class=" mr-3 fa <?php echo esc_attr( $icon ); ?>"></i>
            </div>
            <?php endif; ?>
            <div class="media-body">
            <div class="contact-content">
               <?php if($title): ?>
                <span><?php echo wp_kses_post( html_entity_decode( $title ) ); ?></span>
              <?php endif; ?>

              <?php if($text): ?>
              <p><?php echo wp_kses_post( html_entity_decode( $text ) ); ?></p>
               <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } 

  }

endif;

if ( ! function_exists( 'businesswp_contact_layout3' ) ) :

  function businesswp_contact_layout3(){

    $section = 'contact';
    $items = array();
    $items = businesswp_get_option($section.'_content');
    if(!$items){
      $items = businesswp_contact_default_contents();
    }

    if(is_string($items)){
      $items = json_decode($items);
    }
   foreach ($items as $key => $item) { 
    $icon = ! empty( $item->icon_value ) ? $item->icon_value : '';
    $title = ! empty( $item->title ) ? apply_filters( 'businesswp_translate_single_string', $item->title, 'Contact section' ) : '';
    $text = ! empty( $item->text ) ? apply_filters( 'businesswp_translate_single_string', $item->text, 'Contact section' ) : '';
    ?>

    <div class="col-lg-3 col-md-6 col-12  wow animate__animated animate__pulse d-flex justify-content-center justify-content-md-center">
      <div class="contact-wrap">
        <div class="media">
            <div class="media-body">
            <div class="contact-content">
               <?php if($title): ?>
                <span><?php echo wp_kses_post( html_entity_decode( $title ) ); ?></span>
              <?php endif; ?>

              <?php if($text): ?>
              <p><?php echo wp_kses_post( html_entity_decode( $text ) ); ?></p>
               <?php endif; ?>
            </div>
          </div>
          <?php if($icon): ?>
            <div class="contact-icon">
              <i class=" ml-3 fa <?php echo esc_attr( $icon ); ?>"></i>
            </div>
            <?php endif; ?>
        </div>
      </div>
    </div>
    <?php } 

  }

endif;

/**************************************************
**** Theme Page Header Functions
***************************************************/

if ( ! function_exists( 'businesswp_theme_page_header_title' ) ) :

  function businesswp_theme_page_header_title(){

  if( is_archive() ){

    if ( is_day() ) :

      /* translators: %1$s %2$s: day */
      printf( esc_html__( '%1$s %2$s', 'businesswp' ), esc_html__('Archives','businesswp'), get_the_date() );  

    elseif ( is_month() ) :

      /* translators: %1$s %2$s: month */
      printf( esc_html__( '%1$s %2$s', 'businesswp' ), esc_html__('Archives','businesswp'), get_the_date( 'F Y' ) );

    elseif ( is_year() ) :

      /* translators: %1$s %2$s: year */
      printf( esc_html__( '%1$s %2$s', 'businesswp' ), esc_html__('Archives','businesswp'), get_the_date( 'Y' ) );

    elseif( is_author() ):

      /* translators: %1$s %2$s: author */
      printf( esc_html__( '%1$s %2$s', 'businesswp' ), esc_html__('All posts by','businesswp'), get_the_author() );

    elseif( is_category() ):

      /* translators: %1$s %2$s: category */
      printf( esc_html__( '%1$s %2$s', 'businesswp' ), esc_html__('Category','businesswp'), single_cat_title( '', false ) );

    elseif( is_tag() ):

      /* translators: %1$s %2$s: tag */
      printf( esc_html__( '%1$s %2$s', 'businesswp' ), esc_html__('Tag','businesswp'), single_tag_title( '', false ) );

    elseif( class_exists( 'WooCommerce' ) && is_shop() ):

      /* translators: %1$s %2$s: WooCommerce */
      printf( esc_html__( '%1$s %2$s', 'businesswp' ), esc_html__('Shop','businesswp'), single_tag_title( '', false ));

    elseif( is_archive() ): 

      the_archive_title( '<h1 class="text-white">', '</h1>' );

    endif;

  }elseif( is_404() ){
    
    /* translators: %1$s: 404 */
    printf( esc_html__( 'Error: %1$s', 'businesswp' ) , esc_html__('404','businesswp') );
   
  }elseif( is_search() ){
    
    /* translators: %1$s %2$s: search */
    printf( esc_html__( '%1$s %2$s', 'businesswp' ), esc_html__('Search results for','businesswp'), get_search_query() );

  } else {

    echo esc_html( get_the_title() );

  }
}

endif;

/**************************************************
**** CurpageURL Functions
***************************************************/

if ( ! function_exists( 'businesswp_curPageURL' ) ) :

  function businesswp_curPageURL() {

    $page_url = 'http';

    if ( key_exists("HTTPS", $_SERVER) && ( $_SERVER["HTTPS"] == "on" ) ){

      $page_url .= "s";

    }

    $page_url .= "://";

    if ($_SERVER["SERVER_PORT"] != "80") {

      $page_url .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];

    } else {

      $page_url .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];

     }

    return $page_url;

  }

endif;

/**************************************************
**** Menu Search Icon
***************************************************/

if ( ! function_exists( 'businesswp_menu_search_icon' ) ) :

    add_filter( 'wp_nav_menu_items', 'businesswp_menu_search_icon', 10, 2 );

    function businesswp_menu_search_icon( $nav, $args ) {

        $search_icon = businesswp_get_option('nav_search_show');

        $form = sprintf(__('<form method="get" class="search-form search-nav" action="%1$s">
            <input type="search" class="search-field" placeholder="%2$s" value="%3$s" name="s" />
          </form>','businesswp'),
        esc_url( home_url( '/' ) ),
        esc_attr_x( 'Search &hellip;', 'placeholder', 'businesswp' ),
        get_search_query()
        );

        if ( $search_icon && 'primary' === $args->theme_location ) {
            return sprintf(__('%1$s<li class="menu-search-icon"><a href="#"><i class="fa fa-search"></i></a>%2$s</li>','businesswp'),
                $nav,
                $form
            );
        }

        return $nav;
    }

endif;

/**************************************************
**** Menus Custom Button
***************************************************/

if ( ! function_exists( 'businesswp_menu_custom_button' ) ) :

    add_filter( 'wp_nav_menu_items', 'businesswp_menu_custom_button', 10, 2 );

    function businesswp_menu_custom_button( $nav, $args ) {

        $is_btn = businesswp_get_option('nav_custom_btn');
        $label = businesswp_get_option('nav_custom_btn_label');
        $url = businesswp_get_option('nav_custom_btn_url');

        if ( $is_btn && 'primary' === $args->theme_location ) {
            return $nav . '<li class="menus-btn"><a class="" href="'.esc_url($url).'" target="_blank">'.esc_html($label).'</a></li>';
        }

        return $nav;
    }

endif;


/**************************************************
**** Get Sidebar Layout
***************************************************/

if ( ! function_exists( 'businesswp_get_sidebar_layout' ) ) :

  function businesswp_get_sidebar_layout() {

        $sidebar_layout = businesswp_get_option( 'sidebar_layout' );

        // For single page template
        if ( is_single() ) {
            $sidebar_layout = businesswp_get_option( 'sidebar_single_layout' );
        }

        // For singular page template
        if ( is_singular() ) {
            $meta = get_post_meta( get_the_ID(), '_businesswp-sidebar-layout-meta', true );

            if ( $meta ) {
                $sidebar_layout = $meta;
            }
        }

        // For archive page template
        if ( is_home() || is_archive() || is_search() || is_tax() ) {
            $sidebar_layout = businesswp_get_option( 'sidebar_blog_layout' );
        }

        // woocommerce
        if( class_exists('woocommerce') ){
          if ( is_woocommerce() || is_shop() || is_cart() || is_product() || is_checkout() || is_account_page() ) {
               $sidebar_layout = 'right-sidebar';
          }
        }


        return apply_filters( 'Businesswp_sidebar_layout', $sidebar_layout );
  }

endif;

/**************************************************
**** Get Content Area Classes
***************************************************/

if ( ! function_exists( 'businesswp_get_content_area_classes' ) ) :

  function businesswp_get_content_area_classes(){

     $sidebar_layout = businesswp_get_sidebar_layout();
      $class = '';
      if($sidebar_layout=='left-sidebar' || $sidebar_layout=='right-sidebar'){
          $class = 'col-lg-8 col-md-8 col-sm-8';
      }else if($sidebar_layout=='no-sidebar'){
          $class = 'col-lg-12 col-md-12 col-sm-12';
      }else{
          $class = 'col-lg-6 col-md-6 col-sm-6';
      }
      if($sidebar_layout=='both-left'){
          $class .= ' order-3';
      }else if($sidebar_layout=='both-right'){
          $class .= ' order-1';
      }else if($sidebar_layout=='both-sidebars'){
          $class .= ' order-2';
      }
      return $class;
  }

endif;

/**************************************************
**** Get Right Sidebar Classes
***************************************************/

if ( ! function_exists( 'businesswp_get_right_sidebar_classes' ) ) :

  function businesswp_get_right_sidebar_classes(){

      $sidebar_layout = businesswp_get_sidebar_layout();

      $class = '';

      if($sidebar_layout=='left-sidebar' || $sidebar_layout=='right-sidebar'){

          $class = 'col-lg-4 col-md-4 col-sm-4';

      }else{

          $class = 'col-lg-3 col-md-3 col-sm-3';

      }

      if($sidebar_layout=='both-left'){

          $class .= ' order-2';

      }else if($sidebar_layout=='both-right'){

          $class .= ' order-3';

      }else if($sidebar_layout=='both-sidebars'){

          $class .= ' order-1';

      }

      return $class;
  }

endif;

/**************************************************
**** Get Left Sidebar Classes
***************************************************/

if ( ! function_exists( 'businesswp_get_left_sidebar_classes' ) ) :

  function businesswp_get_left_sidebar_classes(){

     $sidebar_layout = businesswp_get_sidebar_layout();

      $class = '';

      if($sidebar_layout=='left-sidebar' || $sidebar_layout=='right-sidebar'){

          $class = 'col-lg-4 col-md-4 col-sm-4';

      }else{

          $class = 'col-lg-3 col-md-3 col-sm-3';

      }

      if($sidebar_layout=='both-left'){

          $class .= ' order-1';

      }else if($sidebar_layout=='both-right'){

          $class .= ' order-2';

      }else if($sidebar_layout=='both-sidebars'){

          $class .= ' order-3';

      }

      return $class;
  }

endif;

/**************************************************
**** Get Option
***************************************************/

if(!function_exists('businesswp_get_option')):

    function businesswp_get_option( $key = 'top_header_show' ){

        $option = wp_parse_args(  get_option( 'businesswp_option', array() ), businesswp_theme_default_data() );

        return $option[$key];
    }

endif;

/**************************************************
**** Frontpage Section Header
***************************************************/

if(!function_exists('businesswp_frontpage_section_header')):

  function businesswp_frontpage_section_header($sub_title='',$subtitle_color='',$title='',$title_color='',$description='',$description_color='',$divider_show=false,$divider_type='divider div-transparent',$divider_width='w-30'){

      ?>
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-8 col-12 text-center offset-md-3 offset-sm-2 offset-0">
           <?php if($sub_title){ ?>
          <span class="section-subtitle" <?php if($subtitle_color){ echo 'style="color:'.$subtitle_color.';"'; } ?>><?php echo esc_html($sub_title); ?></span>
          <?php } ?>

          <?php if($title){ ?>
          <h2 class="section-title" <?php if($title_color){ echo 'style="color:'.$title_color.';"'; } ?>><?php echo wp_kses_post($title); ?></h2> <!-- <b> for primary color -->
          <?php } ?>

          <?php if($divider_show){ ?> 
          <div class="divider div-transparent <?php echo esc_attr($divider_type); ?>"></div>
          <?php } ?>


          <?php if($description){ ?>
          <p class="section-description" <?php if($title_color){ echo 'style="color:'.$description_color.';"'; } ?>><?php echo wp_kses_post($description); ?></p>
          <?php } ?>
        </div>
      </div>
      <?php
  }

  add_action('businesswp_frontpage_section_header','businesswp_frontpage_section_header',10,9);

endif;

/**************************************************
**** Breadcrumbs
***************************************************/

if(!function_exists('businesswp_breadcrumbs')):

  function businesswp_breadcrumbs(){

      $header_image = $header_class = '';
      
      if(has_header_image()){

          $header_image =  get_header_image();

          $header_class = 'background_image overlay';
      }

      ?>
      <section class="page-header <?php echo esc_attr( $header_class ); ?>"  style="background-image: url('<?php echo esc_url( $header_image ); ?>');">
        <div class="container">
          <div class="row">        
            <div class="col-xl-8 col-lg-8 col-md-8 col-12 text-lg-left text-sm-left text-center">
              <h3>
                  <?php 
                  if ( is_day() ) : 
                          
                      printf( __( 'Daily Archives: %s', 'businesswp' ), get_the_date() );
                  
                  elseif ( is_month() ) :
                  
                      printf( __( 'Monthly Archives: %s', 'businesswp' ), (get_the_date( 'F Y' ) ));
                      
                  elseif ( is_year() ) :
                  
                      printf( __( 'Yearly Archives: %s', 'businesswp' ), (get_the_date( 'Y' ) ) );
                      
                  elseif ( is_category() ) :
                  
                      printf( __( 'Category Archives: %s', 'businesswp' ), (single_cat_title( '', false ) ));

                  elseif ( is_tag() ) :
                  
                      printf( __( 'Tag Archives: %s', 'businesswp' ), (single_tag_title( '', false ) ));
                      
                  elseif ( is_404() ) :

                      printf( __( 'Error 404', 'businesswp' ));
                      
                  elseif ( is_author() ) :
                  
                      printf( __( 'Author: %s', 'businesswp' ), (get_the_author( '', false ) ));

                  elseif ( is_archive() ):        
                      
                      printf( __( 'Archive: %s ', 'businesswp' ), (get_the_archive_title( '', false ) ));

                  else :
                          the_title();
                  endif;
                  ?>
              </h3>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-12 text-lg-right text-sm-right text-center">
              <ul>
              <?php 
               if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb();
              }else{

                  $showOnHome = esc_html__('1','businesswp');

                  $delimiter  = '';

                  $home       = esc_html__('Home','businesswp');

                  $showCurrent= esc_html__('1','businesswp');

                  $before     = '<li class="active">';
                  
                  $after      = '</li>';
               
                  global $post;
                  $homeLink = home_url();

                  if ( is_home() || is_front_page() ) {
               
                  if ($showOnHome == 1) echo '<li><a href="' . esc_url($homeLink) . '">' . esc_html($home) . '</a></li>';
               
                  } else {
               
                  echo '<li><a href="' . esc_url($homeLink) . '">' . esc_html($home) . '</a></li>';
               
                  if ( is_category() ) {

                      $thisCat = get_category(get_query_var('cat'), false);
                      if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . ' ');
                      echo $before . esc_html__('Archive by category','businesswp').' "' . esc_html(single_cat_title('', false)) . '"' .$after;
                      
                  } elseif ( is_search() ) {

                      echo $before . esc_html__('Search results for ','businesswp').' "' . esc_html(get_search_query()) . '"' . $after;
                  
                  } elseif ( is_day() ) {

                      echo '<li><a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . esc_html(get_the_time('Y')) . '</a></li> ';
                      echo '<li><a href="' . esc_url(get_month_link(get_the_time('Y'),get_the_time('m'))) . '">' . esc_html(get_the_time('F')) . '</a></li> ';
                      echo $before . esc_html(get_the_time('d')) . $after;

                  } elseif ( is_month() ) {

                      echo '<li><a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . esc_html(get_the_time('Y')) . '</a> ' . esc_attr($delimiter);
                      echo $before . esc_html(get_the_time('F')) . $after;

                  } elseif ( is_year() ) {

                      echo $before . esc_html(get_the_time('Y')) . $after;

                  } elseif ( is_single() && !is_attachment() ) {

                      if ( get_post_type() != 'post' ) {

                          $post_type = get_post_type_object(get_post_type());
                          $slug = $post_type->rewrite;
                          echo '<li><a href="' . esc_url($homeLink) . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
                          if ($showCurrent == 1) echo ' ' . esc_attr($delimiter) . $before . esc_html(get_the_title()) . $after;
                      
                      } else {

                          $cat = get_the_category(); $cat = $cat[0];
                          $cats = get_category_parents($cat, TRUE, '' . esc_attr($delimiter) . '');
                          if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
                          echo $before . $cats . $after;
                          if ($showCurrent == 1) echo $before . esc_html(get_the_title()) . $after;

                      }
               
                  } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {

                      if ( class_exists( 'WooCommerce' ) ) {

                          if ( is_shop() ) {

                              echo $before . woocommerce_page_title( false ) . $after;

                          }else{
                              if(get_post_type() == 'product'){
                                  $terms = get_the_terms(get_the_ID(), 'product_cat', '' , '' );
                                  if($terms) {
                                      echo '<li>';
                                      the_terms( get_the_ID() , 'product_cat' , '' , ' </li><li>' );
                                      echo ' ' . $delimiter . '<i class="fa fa-angle-double-right"></i> ' . '<span class="current">' . get_the_title() . '</span>';
                                  }else{
                                      echo '<span class="current">' . get_the_title() . '</span>';
                                  }
                              }
                          }           

                      } else {

                          $post_type = get_post_type_object(get_post_type());
                          echo $before . $post_type->labels->singular_name . $after;

                      }   

                  } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {

                      $post_type = get_post_type_object(get_post_type());
                      echo $before . $post_type->labels->singular_name . $after;

                  } elseif ( is_attachment() ) {

                      $parent = get_post($post->post_parent);
                      $cat = get_the_category($parent->ID); 
                      if(!empty($cat)){
                      $cat = $cat[0];
                      echo get_category_parents($cat, TRUE, ' ' . esc_attr($delimiter) . '');
                      }
                      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
                      if ($showCurrent == 1) echo ' ' . esc_attr($delimiter) . ' ' . $before . esc_html(get_the_title()) . $after;
               
                  } elseif ( is_page() && !$post->post_parent ) {

                      if ($showCurrent == 1) echo $before . esc_html(get_the_title()) . $after;

                  } elseif ( is_page() && $post->post_parent ) {

                      $parent_id  = $post->post_parent;
                      $breadcrumbs = array();

                      while ($parent_id) {
                          $page = get_page($parent_id);
                          $breadcrumbs[] = '<a href="' . esc_url(get_permalink($page->ID)) . '">' . esc_html(get_the_title($page->ID)) . '</a>' . '';
                          $parent_id  = $page->post_parent;
                      }
                      
                      $breadcrumbs = array_reverse($breadcrumbs);

                      for ($i = 0; $i < count($breadcrumbs); $i++) {
                          echo $breadcrumbs[$i];
                          if ($i != count($breadcrumbs)-1) echo ' ' . esc_attr($delimiter) . '';
                      }

                      if ($showCurrent == 1) echo ' ' . esc_attr($delimiter) . ' ' . $before . esc_html(get_the_title()) . $after;
               
                  } elseif ( is_tag() ) {

                      echo $before . esc_html__('Posts tagged ','businesswp').' "' . single_tag_title('', false) . '"' . $after;
                  
                  } elseif ( is_author() ) {

                      global $author;
                      $userdata = get_userdata($author);
                      echo $before . esc_html__('Article posted by ','businesswp').'' . $userdata->display_name . $after;
                  
                  } elseif ( is_404() ) {

                      echo $before . esc_html__('Error 404 ','businesswp'). $after;

                  }
                  
                  if ( get_query_var('paged') ) {

                      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo '';
                      echo ' ( ' . esc_html__('Page','businesswp') . '' . esc_html(get_query_var('paged')). ' )';
                      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo '';
                  
                  }
               
                  echo '</li>';
               
                }

              }
               ?>
              </ul>
            </div>
          </div>
        </div>
      </section>
      <?php
  }
endif;


/**************************************************
**** Content starter pack data
***************************************************/
if(!function_exists('businesswp_wp_starter_pack')):

  function businesswp_wp_starter_pack() {

      // Define and register starter contents
      $starter_content = array(
          'widgets'     => array(
              'sidebar'   => array(
                  'search',
                  'categories',
                  'tag',
                  'meta',
              ),
              'footer-1'    => array(
                  'my_text' => array( 'text', 
                      array(
                      'title' => _x('About US', 'My text starter contents', 'businesswp'),
                      'text'  => _x('Lorem ipsum dolor sit amet consectetur dipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Ut enim ad minim veniam.', 'My text starter contents', 'businesswp')
                  ) ) ),
              'footer-2'    => array(
                  'search' => array(
                      'search',
                      array(
                          'title' => _x( 'search', 'My text starter contents', 'businesswp' ),
                      )
                  ),
              ),
              'footer-3'    => array(
                  'categories'=> array(
                      'categories',
                      array(
                          'title' => _x( 'categories', 'My text starter contents', 'businesswp' ),
                      )
                  ),
              ),
              'footer-4'    => array(
                  'calendar'=> array(
                      'calendar',
                      array(
                          'title' => _x( 'calendar', 'My text starter contents', 'businesswp' ),
                      )
                  ),
              ),
              'sidebar-2' => array(
                  'my_text' => array(
                      'text',
                      array(
                          'title' => _x('About US', 'My text starter contents', 'businesswp'),
                          'text'  =>  _x('Lorem ipsum dolor sit amet consectetur dipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Ut enim ad minim veniam.', 'My text starter contents', 'businesswp'),
                      ),
                  ),
              ),
          ),
          'posts'       => array(
              'home',
              'about',
              'contact',
              'blog',
          ),
          'options'     => array(
              'show_on_front'  => 'page',
              'page_on_front'  => '{{home}}',
              'page_for_posts' => '{{blog}}',
              'header_image'   => '',
          ),
          'nav_menus'   => array(
              'primary'    => array(
                  'name'  => __( 'Primary Menu', 'businesswp' ),
                  'items' => array(
                      'link_home',
                      'page_about',
                      'page_blog',
                      'page_contact',
                      'page_loremuipsum' => array(
                          'type'      => 'post_type',
                          'object'    => 'page',
                          'object_id' => '{{loremipsum}}',
                      ),
                  ),
              ),
          ),
      );

      return apply_filters( 'businesswp_wp_starter_pack', $starter_content );

  }

endif;

/**************************************************
**** Edit Link
***************************************************/

if ( ! function_exists( 'businesswp_edit_link' ) ) :

    function businesswp_edit_link() {

        edit_post_link(
            sprintf(
                /* translators: %s: Post title. */
                __( 'Edit<span class="screen-reader-text"> "%s"</span>', 'businesswp' ),
                get_the_title()
            ),
            '<span class="edit-link">',
            '</span>'
        );

    }

endif;

/**************************************************
**** Edit Post Link
***************************************************/

if ( ! function_exists( 'businesswp_edit_post_link' ) ) :

  function businesswp_edit_post_link( $link, $post_id, $text ) {

      if ( is_admin() ) {
          return $link;
      }

      $edit_url = get_edit_post_link( $post_id );

      if ( ! $edit_url ) {
          return;
      }

      $text = sprintf(
          wp_kses(
              /* translators: %s: Post title. Only visible to screen readers. */
              __( 'Edit <span class="screen-reader-text">%s</span>', 'businesswp' ),
              array(
                  'span' => array(
                      'class' => array(),
                  ),
              )
          ),
          get_the_title( $post_id )
      );

      return '<div class="post-meta-wrapper post-meta-edit-link-wrapper"><span class="fa fa-edit mr-2"></span><span class="meta-text"><a href="' . esc_url( $edit_url ) . '">' . $text . '</a></span><!-- .post-meta --></div><!-- .post-meta-wrapper -->';
  }

  add_filter( 'edit_post_link', 'businesswp_edit_post_link', 10, 3 );

endif;

/**************************************************
**** Filter Wp List Pages item Class
***************************************************/
if ( ! function_exists( 'businesswp_filter_wp_list_pages_item_classes' ) ) :

    function businesswp_filter_wp_list_pages_item_classes( $css_class, $page, $depth, $args, $current_page ) {


        // Only apply to wp_list_pages() calls with match_menu_classes set to true.
        $match_menu_classes = isset( $args['match_menu_classes'] );

        if ( ! $match_menu_classes ) {
            return $css_class;
        }

        // Add current menu item class.
        if ( in_array( 'current_page_item', $css_class, true ) ) {
            $css_class[] = 'current-menu-item';
        }

        // Add menu item has children class.
        if ( in_array( 'page_item_has_children', $css_class, true ) ) {
            $css_class[] = 'menu-item-has-children';
        }

        return $css_class;
    }

    add_filter( 'page_css_class', 'businesswp_filter_wp_list_pages_item_classes', 10, 5);

endif;

/**************************************************
**** Add Sub Toggles to Main Menu
***************************************************/

if ( ! function_exists( 'businesswp_add_sub_toggles_to_main_menu' ) ) :

  function businesswp_add_sub_toggles_to_main_menu( $args, $item, $depth ) {

      // Add sub menu toggles to the Expanded Menu with toggles.
      if ( isset( $args->show_toggles ) && $args->show_toggles ) {

          // Wrap the menu item link contents in a div, used for positioning.
          $args->before = '<div class="ancestor-wrapper">';
          $args->after  = '';

          // Add a toggle to items with children.
          if ( in_array( 'menu-item-has-children', $item->classes, true ) ) {

              $toggle_target_string = '.menu-modal .menu-item-' . $item->ID . ' > .sub-menus';
              $toggle_duration      = businesswp_toggle_duration();

              // Add the sub menu toggle.
              $args->after .= '<button class="toggle sub-menu-toggle fill-children-current-color" data-toggle-target="' . $toggle_target_string . '" data-toggle-type="slidetoggle" data-toggle-duration="' . absint( $toggle_duration ) . '" aria-expanded="false"><span class="screen-reader-text">' . __( 'Show sub menu', 'businesswp' ) . '</span></button>';

          }

          // Close the wrapper.
          $args->after .= '</div><!-- .ancestor-wrapper -->';

          // Add sub menu icons to the primary menu without toggles.
      } elseif ( 'primary' === $args->theme_location || 'secondary' === $args->theme_location ) {
          if ( in_array( 'menu-item-has-children', $item->classes, true ) ) {
              $args->after = '';
          } else {
              $args->after = '';
          }
      }

      return $args;
  }

  add_filter( 'nav_menu_item_args', 'businesswp_add_sub_toggles_to_main_menu', 10, 3 );

endif;

/**************************************************
**** Toggle Duration
***************************************************/

if ( ! function_exists( 'businesswp_toggle_duration' ) ) :

  function businesswp_toggle_duration() {

      $duration = apply_filters( 'businesswp_toggle_duration', 250 );

      return $duration;
  }
  
endif;

// Check if pro exist
if( ! class_exists('Businesswp_Premium_Setup') ){

  // String translation

  function businesswp_pll_string_register_helper( string $theme_mod = '', bool $default = false, string $name = '' ) {

      if ( ! function_exists( 'pll_register_string' ) ) {
          return;
      }

      $option = wp_parse_args(  get_option( 'businesswp_option', array() ), businesswp_theme_default_data() );

      $repeater_content = $option[$theme_mod];

      $repeater_content = json_decode( $repeater_content );
      if ( ! empty( $repeater_content ) ) {
          foreach ( $repeater_content as $repeater_item ) {
              foreach ( $repeater_item as $field_name => $field_value ) {

                  if(
                      $field_name == 'content_align' ||
                      $field_name == 'image_url' ||
                      $field_name == 'currency' ||
                      $field_name == 'price' ||
                      $field_name == 'icon_value'
                  ){
                      continue;
                  }

                  if ( $field_value !== 'undefined' ) {
                      if ( $field_name === 'social_repeater' ) {
                          $social_repeater_value = json_decode( $field_value );
                          if ( ! empty( $social_repeater_value ) ) {
                              foreach ( $social_repeater_value as $social ) {
                                  foreach ( $social as $key => $value ) {
                                      if ( $key === 'link' ) {
                                          pll_register_string( 'Social link', $value, $name );
                                      }
                                      if ( $key === 'icon' ) {
                                          pll_register_string( 'Social icon', $value, $name );
                                      }
                                  }
                              }
                          }
                      } else {
                          if ( $field_name !== 'id' ) {
                              $f_n = ucfirst( $field_name );
                              pll_register_string( $f_n, $field_value, $name );
                          }
                      }
                  }
              }
          }
      }
  }

  function businesswp_register_strings() {
      businesswp_pll_string_register_helper( 'slider_content', $default = false, 'Slider section' );
      businesswp_pll_string_register_helper( 'service_content', $default = false, 'Service section' );
      businesswp_pll_string_register_helper( 'testimonial_content', $default = false, 'Testimonial section' );
      businesswp_pll_string_register_helper( 'team_content', $default = false, 'Team section' );
      businesswp_pll_string_register_helper( 'contact_content', $default = false, 'Contact section' );
      businesswp_pll_string_register_helper( 'portfolio_content', $default = false, 'Portfolio section' );
  }

  add_action( 'after_setup_theme', 'businesswp_register_strings', 30 );

  function businesswp_translate_single_string( $original_value, $domain ) {
    if ( is_customize_preview() ) {
      $wpml_translation = $original_value;
    } else {
      $wpml_translation = apply_filters( 'wpml_translate_single_string', $original_value, $domain, $original_value );
      if ( $wpml_translation === $original_value && function_exists( 'pll__' ) ) {
        return pll__( $original_value );
      }
    }
    return $wpml_translation;
  }

  add_filter( 'businesswp_translate_single_string', 'businesswp_translate_single_string', 10, 2 );


  // Get started notice

  // AJAX handler to store the state of dismissible notices
  function businesswp_ajax_notice_handler() {

      if ( isset( $_POST['type'] ) ) {

          // Pick up the notice "type" - passed via jQuery (the "data-notice" attribute on the notice)
          $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );

          // Update it in the options
          update_option( 'dismissed-' . $type, TRUE );
      }
  }
  add_action( 'wp_ajax_businesswp_dismissed_notice_handler', 'businesswp_ajax_notice_handler' );

  function businesswp_deprecated_hook_admin_notice() {

          // Check if it's been dismissed...
          if ( ! get_option('dismissed-get_started', FALSE ) ) {

              // Added the class "notice-get-started-class" so jQuery pick it up and pass via AJAX,
              // and added "data-notice" attribute in order to track multiple / different notices
              // multiple dismissible notice states
              ?>
              <div class="updated notice notice-get-started-class is-dismissible" data-notice="get_started">
                  <div class="businesswp-getting-started-notice clearfix">
                      <div class="businesswp-theme-screenshot">
                          <img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/screenshot.png" class="screenshot" alt="<?php esc_attr_e( 'Theme Screenshot', 'businesswp' ); ?>" />
                      </div><!-- /.businesswp-theme-screenshot -->
                      <div class="businesswp-theme-notice-content">
                          <h2 class="businesswp-notice-h2">
                              <?php
                          printf(
                          /* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
                              esc_html__( 'Welcome! Thank you for choosing %1$s!', 'businesswp' ), '<strong>'. wp_get_theme()->get('Name'). '</strong>' );
                          ?>
                          </h2>

                          <p class="plugin-install-notice"><?php echo sprintf(__('To take full advantage of all the features of this theme, please install and activate the <strong>Britetechs Companion</strong> plugin, then enjoy this theme.', 'businesswp')) ?></p>

                          <a class="businesswp-btn-get-started button button-primary button-hero businesswp-button-padding" href="#" data-name="" data-slug="">
                          <?php
                          printf(
                          /* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
                              esc_html__( 'Get started with %1$s', 'businesswp' ), '<strong>'. wp_get_theme()->get('Name'). '</strong>' );
                          ?>
                          
                          </a><span class="businesswp-push-down">
                          <?php
                              /* translators: %1$s: Anchor link start %2$s: Anchor link end */
                              printf(
                                  'or %1$sCustomize theme%2$s</a></span>',
                                  '<a target="_blank" href="' . esc_url( admin_url( 'customize.php' ) ) . '">',
                                  '</a>'
                              );
                          ?>
                      </div><!-- /.businesswp-theme-notice-content -->
                  </div>
              </div>
          <?php }
  }
  add_action( 'admin_notices', 'businesswp_deprecated_hook_admin_notice' );

  // Theme Plugin installer
  function businesswp_admin_install_plugin() {

      // Install Plugin
      include_once ABSPATH . '/wp-admin/includes/file.php';
      include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
      include_once ABSPATH . 'wp-admin/includes/plugin-install.php';

      if ( ! file_exists( WP_PLUGIN_DIR . '/britetechs-companion' ) ) {
          $api = plugins_api( 'plugin_information', array(
              'slug'   => sanitize_key( wp_unslash( 'britetechs-companion' ) ),
              'fields' => array(
                  'sections' => false,
              ),
          ) );

          $skin     = new WP_Ajax_Upgrader_Skin();
          $upgrader = new Plugin_Upgrader( $skin );
          $result   = $upgrader->install( $api->download_link );
      }

      // Activate the theme plugin
      if ( current_user_can( 'activate_plugin' ) ) {
          $result = activate_plugin( 'britetechs-companion/britetechs-companion.php' );
      }
  }
  add_action( 'wp_ajax_install_act_plugin', 'businesswp_admin_install_plugin' );

  // Enqueue admin scripts and styles
  function businesswp_admin_enqueue_scripts(){

      wp_enqueue_style('businesswp-admin-style', get_template_directory_uri() . '/css/admin/admin.css');
      wp_enqueue_script( 'businesswp-admin-script', get_template_directory_uri() . '/js/businesswp-admin-script.js', array( 'jquery' ), '', true );
      wp_localize_script( 'businesswp-admin-script', 'businesswp_ajax_object',
          array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
      );
  }
  add_action( 'admin_enqueue_scripts', 'businesswp_admin_enqueue_scripts' );

}