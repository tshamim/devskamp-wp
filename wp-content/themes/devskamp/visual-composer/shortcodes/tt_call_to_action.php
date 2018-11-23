<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    ob_start();

    // Color option
    $title_color = "";

    if ($tt_atts['title_color_option'] == 'custom-color') :
        $title_color = 'color:'.$tt_atts['title_color'].';';
    endif;


    $button_bg_color = "";

    if ($tt_atts['button_style'] == 'custom-color') :
        $button_bg_color = 'background-color:'.$tt_atts['button_custom_bg'].';';
    endif;


    // font size
    $title_font_size = "";
    $subtitle_font_size = "";
    if ($tt_atts['title_font_size']) :
        $title_font_size = 'font-size: '.$tt_atts['title_font_size'].';';
    endif;


    // font weight
    $title_font_style = "";
    if ($tt_atts['title_font_style']) :
        $title_font_style = 'font-weight: '.$tt_atts['title_font_style'].';';
    endif;


    // sub title
    if ($tt_atts['subtitle_font_size']) :
        $subtitle_font_size = 'font-size: '.$tt_atts['subtitle_font_size'].';';
    endif;


    // button margin
    $margin_top = "";
    $margin_bottom = "";

    if ($tt_atts['button_top_margin']) :
        $margin_top = 'margin-top:'.$tt_atts['button_top_margin'].';';
    endif;

    if ($tt_atts['button_bottom_margin']) :
        $margin_bottom = 'margin-bottom:'.$tt_atts['button_bottom_margin'].';';
    endif;

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    // link
    $link     = vc_build_link($tt_atts['button_link']);
    $a_href   = $link['url'];
    $a_title  = $link['title'];
    $a_target = trim($link['target']);
?>


    <div class="tt-cta-wrapper <?php echo esc_attr($tt_atts['el_class'] .' '.$css_class.' '.$tt_atts['content_alignment'] .' '.$tt_atts['button_position']); ?>">

        <div class="tt-cta-content">

            <?php if ($tt_atts['subtitle_position'] == 'sub-top') : ?>

                <?php if (wpb_js_remove_wpautop($content)) : ?>
                    <div class="sub-title sub-top" style="<?php echo esc_attr($subtitle_font_size); ?>"><?php echo wpb_js_remove_wpautop($content, true); ?></div>
                <?php endif; ?>

            <?php endif; ?>


            <h2 style="<?php echo esc_attr($title_color.' '.$title_font_size.' '.$title_font_style);?>" class="<?php echo esc_attr($tt_atts['title_text_transform'].' '.$tt_atts['title_color_option']);?>"><?php echo esc_html($tt_atts['title'])?></h2>


            <?php if ($tt_atts['subtitle_position'] == 'sub-bottom') : ?>

                <?php if (wpb_js_remove_wpautop($content)) : ?>
                    <div class="sub-title sub-bottom" style="<?php echo esc_attr($subtitle_font_size); ?>"><?php echo wpb_js_remove_wpautop($content, true); ?></div>
                <?php endif; ?>

            <?php endif; ?>


        </div><!-- /.tt-cta-content -->


        <div class="tt-cta-button" style="<?php echo esc_attr($margin_top.' '.$margin_bottom); ?>">
            <a class="waves-effect waves-light btn <?php echo esc_attr($tt_atts['button_style'].' '.$tt_atts['button_size']);?>" href="<?php echo esc_attr($a_href)?>" target="<?php echo esc_attr($a_target); ?>" style="<?php echo esc_attr($button_bg_color); ?>" ><?php echo esc_html($tt_atts['button_text'])?></a>
        </div><!-- /.tt-cta-button -->
               
    </div> <!-- .tt-cta-wrapper -->

<?php echo ob_get_clean();