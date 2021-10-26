<?php
class Businesswp_Button_Customize_Control extends WP_Customize_Control {
    public $type = 'upgrade_premium_buttons';

    public function enqueue() {
        wp_enqueue_style(
            'businesswp-additional-controls',
            get_template_directory_uri() . '/inc/customizer/customizer-base/css/additional-controls.css',
            array( 'wp-color-picker' )
        );
    }

    function render_content() {
        $support_url = '';
        if( ! class_exists('Businesswp_Premium_Setup') ){
            $support_url = 'https://wordpress.org/support/theme/businesswp/';
        }else{
            $support_url = 'https://www.britetechs.com/support/';
        }
    ?>
        <div class="upgrade_premium_buttons_info">
            <ul>
                <?php if( ! class_exists('Businesswp_Premium_Setup') ){ ?>
                <li><a href="<?php echo esc_url( admin_url('themes.php?page=bt_themepage&tab=free_vs_pro') ); ?>" target="_blank"><i class="dashicons dashicons-list-view"></i><?php _e( 'Premium Features','businesswp' ); ?> </a></li>
                <?php } ?>

                <li><a href="<?php echo esc_url( $support_url ); ?>" target="_blank"><i class="dashicons dashicons-lightbulb"></i><?php _e( 'Get Support','businesswp' ); ?> </a></li>

                <?php if( ! class_exists('Businesswp_Premium_Setup') ){ ?>
                <li><a href="<?php echo esc_url('https://www.britetechs.com/businesswp-pro-wordpress-theme/'); ?>" target="_blank"><i class="dashicons dashicons-update-alt"></i><?php _e( 'Upgrade to PRO','businesswp' ); ?> </a></li>
                <?php } ?>

                <li><a href="<?php echo esc_url('https://wordpress.org/support/theme/businesswp/reviews/#new-post'); ?>" target="_blank"><i class="dashicons dashicons-smiley"></i><?php _e( 'Love it','businesswp' ); ?> </a></li>
            </ul>
        </div>
    <?php
   }
}


class Businesswp_Customize_Upgrade_Control extends WP_Customize_Control {

    public $type = 'businesswp-upgrade';

    protected function content_template() {
        $link = 'https://www.britetechs.com/businesswp-pro-wordpress-theme/';
        ?>
        <div class="businesswp-upgrade-premium-message" style="display:none;">
            <# if ( data.label ) { #><h4 class="customize-control-title"><?php echo wp_kses_post( 'Upgrade to <a href="'.$link.'" target="_blank" > Businesswp Pro </a> theme to add', 'businesswp'); ?> {{{ data.label }}} <?php esc_html_e( 'and get the more advanced premium styling features.', 'businesswp') ?></h4><# } #>
        </div>
        <?php
    }
}