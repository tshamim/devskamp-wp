<?php
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    ob_start();

    $tt_link     = vc_build_link($tt_atts['custom_link']);
    $tt_a_href   = $tt_link['url'];
    $tt_a_title  = $tt_link['title'];

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );
?>

    <div  class="hero-section <?php echo esc_attr($tt_atts['el_class'].' '.$css_class);?>">
        <div class="hero-block-caption <?php echo esc_attr($tt_atts['title_alignment']); ?>">
      
            <?php echo wpb_js_remove_wpautop($content, true)?>

            <?php if ($tt_atts['show_button'] == 'yes') : ?>
                <a class="btn <?php echo esc_attr($tt_atts['button_class']); ?>" href="<?php echo esc_url($tt_a_href);?>" title="<?php echo esc_attr($tt_a_title);?>"><?php echo esc_html($tt_atts['button_text']);?></a>
            <?php endif; ?>

        </div>
    </div>

<?php echo ob_get_clean();