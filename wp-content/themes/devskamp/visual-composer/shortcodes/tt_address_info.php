<?php
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    ob_start();


    // icon
    $icon_type = $icon = $icon_color = $content_color = "";

    if ($tt_atts['icon_type'] == 'fontawesome-icon') :
        $icon_type = "fontawesome-icon";
        $icon = $tt_atts['fontawesome_icon'];
    elseif ($tt_atts['icon_type'] == 'flat-icon') :
        $icon_type = "flat-icon";
        $icon = $tt_atts['flat_icon'];
    endif;

    // colors
    if ($tt_atts['icon_color_option'] == 'custom-color') :
        $icon_color = 'color:'.$tt_atts['icon_color'].';';
    endif;

    if ($tt_atts['content_color_option'] == 'custom-color') :
        $content_color = 'color:'.$tt_atts['content_color'].'';
    endif;

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );
?>

<address class="address-wrapper <?php echo esc_attr($tt_atts['el_class'].' '.$css_class); ?>">
    <?php if ($tt_atts['show_icon'] == 'yes') : ?>
        <div class="icon-wrapper <?php echo esc_attr($icon_type.' '.$tt_atts['icon_position']); ?> " >
            <i class="<?php echo esc_attr($icon.' '.$tt_atts['icon_color_option']) ;?> " style="<?php echo esc_attr($icon_color)?>"></i>
        </div>
    <?php endif; ?>

    <div class="info-wrapper" style="<?php echo esc_attr($content_color)?>">
        <?php echo wpb_js_remove_wpautop($content, true);?>
    </div>
</address>
<?php echo ob_get_clean();