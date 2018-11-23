<?php
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    ob_start();

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    $link     = vc_build_link($tt_atts['button_link']);
    $a_href   = $link['url'];
    $a_target   = $link['target'];

    $img_url = $bg_color = '';
    $img_src = wp_get_attachment_image_src($tt_atts['banner_image'], 'full');

    if ($img_src) :
        $img_url = 'background-image:url('.$img_src[0].');';
    endif;

    if ($tt_atts['bg_color']) :
        $bg_color = 'background-color: '.$tt_atts['bg_color'].';';
    endif;
?>

    <div class="shop-banner-wrapper <?php echo esc_attr($tt_atts['el_class'].' '.$css_class); ?>" style="<?php echo esc_attr($img_url.' '.$bg_color); ?>">

        <div class="banner-content">
            <?php if ($tt_atts['title_intro']): ?>
                <span class="intro-title"><?php echo esc_html($tt_atts['title_intro']); ?></span>
            <?php endif; ?>
            
            <?php if ($tt_atts['title']): ?>
                <h2><?php echo esc_html($tt_atts['title']); ?></h2>
            <?php endif; ?>

            <?php if ($tt_atts['button_show'] == 'yes'): ?>
                <a href="<?php echo esc_url($a_href); ?>" class="btn btn-sm white" target="<?php echo esc_attr($a_target); ?>"><?php echo esc_html($tt_atts['button_text']); ?></a>
            <?php endif; ?>
            
            <?php if ($tt_atts['offer']): ?>
                <span class="offer"><?php echo esc_html($tt_atts['offer']); ?></span>
            <?php endif; ?>
        </div>
    </div>
<?php echo ob_get_clean();