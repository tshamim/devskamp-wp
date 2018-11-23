<?php 

    if ( ! defined( 'ABSPATH' ) ) :
      exit; // Exit if accessed directly
    endif;

    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    ob_start();

    // icon
    $icon_type = "";
    $icon = "";

    if ($tt_atts['icon_type'] == 'fontawesome-icon') :
        $icon_type = "fontawesome-icon";
        $icon = $tt_atts['fontawesome_icon'];
    elseif ($tt_atts['icon_type'] == 'flat-icon') :
        $icon_type = "flat-icon";
        $icon = $tt_atts['flat_icon'];
    endif;


    $box_bg = "";
    $color = "";

    if ($tt_atts['change_color'] == 'yes') {
      $box_bg = 'background-color: ' .$tt_atts['bg_color'] . ' !important';
      $color = 'color: ' .$tt_atts['text_color'];
    }
?>

    <div class="process-box text-center <?php echo esc_attr($tt_atts['el_class'].' '.$icon_type.' '.$css_class) ; ?>" style="<?php echo esc_attr($box_bg); ?>">
        <?php if ($tt_atts['show_icon'] == 'yes') : ?>
          <i class="<?php echo esc_attr($icon);?>" style="<?php echo esc_attr($color); ?>"></i>
        <?php endif; ?>
        <h3 style="<?php echo esc_attr($color); ?>"><?php echo esc_html($tt_atts['title']); ?></h3>
    </div>
<?php echo ob_get_clean();