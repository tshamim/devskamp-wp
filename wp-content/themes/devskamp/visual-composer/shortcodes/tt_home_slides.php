<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    ob_start(); ?>

    <div class="tt-home-slider trendy-slider <?php echo esc_attr($tt_atts['el_class'].' '.$css_class);?>">
        <ul class="slides-container">
            <?php echo wpb_js_remove_wpautop( $content ); ?>
        </ul>

        <nav class="slides-navigation">
          <a href="#" class="next">
            <i class="fa fa-angle-right"></i>
          </a>
          <a href="#" class="prev">
            <i class="fa fa-angle-left"></i>
          </a>
        </nav>
    </div>

<?php echo ob_get_clean();