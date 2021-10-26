<?php
$section = 'info_contact';
$show = businesswp_get_option($section.'_show');
$container = businesswp_get_option($section.'_container_width');

if($show){
?>
<section id="info-section" class="info-section">
	<div class="<?php echo esc_attr($container); ?>">
		<div class="row">
			<div class="col-12 wow fadeInUp">
				<div class="row info-wrap-row">
					<?php 
					$items = array();
				    $items = businesswp_get_option($section.'_content');
				    if(!$items){
				      $items = astrio_info_contact_default_contents();
				      }

				    if(is_string($items)){
				      $items = json_decode($items);
				      }

				    foreach ($items as $key => $item) {  

				    $title = ! empty( $item->title ) ? apply_filters( 'businesswp_translate_single_string', $item->title, 'Info Contact section' ) : '';
				    $text = ! empty( $item->text ) ? apply_filters( 'businesswp_translate_single_string', $item->text, 'Info Contact section' ) : '';
				    $link = ! empty( $item->link ) ? apply_filters( 'businesswp_translate_single_string', $item->link, 'Info Contact section' ) : '#';
				    $icon = ! empty( $item->icon_value ) ? $item->icon_value : '';
					?>
					<div class="col-lg-4 col-md-4 col-12">
						<aside class="widget-info-wrap">
							<div class="info-area">
								<?php if($icon): ?>
								<div class="info-icon">
									<span><a href="#"><i class="fa <?php echo esc_attr( $icon ); ?>"></i></a></span>
								</div>
								<?php endif; ?>
								<div class="info-content">
									<?php if($title): ?>
									<h6 class="info-title"><a href="<?php echo esc_url( $link ); ?>"><?php echo wp_kses_post( $title ); ?></a></h6>
									<?php endif; ?>
									<?php if($text): ?>
									<p class="info-text"><?php echo wp_kses_post( html_entity_decode( $text ) ); ?></p>
									<?php endif; ?>
								</div>
							</div>
						</aside>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php } ?>