<?php
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    ob_start();

    ?>

    <div class="item <?php echo esc_attr($tt_atts['active_class'].' '.$css_class.' '.$tt_atts['el_class'].' '.$tt_atts['content_alignment']); ?>">
        <?php if ($tt_atts['title']): ?>
            <h3><?php echo esc_html($tt_atts['title']); ?></h3>
        <?php endif ?>
        
        <?php echo wpb_js_remove_wpautop($content, true);?>
    </div>

<?php echo ob_get_clean();