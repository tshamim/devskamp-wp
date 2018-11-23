<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    ob_start();

    // Color option
    $title_color = "";
    $description_color = "";
    $separator_color = "";

    if ($tt_atts['title_color_option'] == 'custom-color') :
        $title_color = 'color:'.$tt_atts['title_color'].';';
    endif;

    if ($tt_atts['description_color_option'] == 'custom-color') :
        $description_color = 'color:'.$tt_atts['description_color'].';';
    endif;

    if ($tt_atts['separator_color_option'] == 'custom-color') :
        $separator_color = 'background-color:'.$tt_atts['separator_color'].';';
    endif;

    if ($tt_atts['separator_color_option'] == 'custom-color') :
        $separator_color = 'background-color:'.$tt_atts['separator_color'].';';
    endif;

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

?>


    <div class="sction-title-wrapper <?php echo esc_attr($tt_atts['el_class'] .' '. $tt_atts['title_alignment'].' '.$css_class); ?>">
        <?php if ($tt_atts['title_intro']) : ?>
            <span class="section-intro theme-color"><?php echo esc_html($tt_atts['title_intro']); ?></span>
        <?php endif; ?>
        
        <h2 style="<?php echo esc_attr($title_color);?> text-transform:<?php echo esc_attr($tt_atts['text_transform']);?>; font-weight:<?php echo esc_attr($tt_atts['font_weight']);?>" class="section-title <?php echo esc_attr($tt_atts['title_color_option']);?>"><?php echo esc_html($tt_atts['title'])?></h2>

        <?php if ($tt_atts['section_separator'] == 'yes' and $tt_atts['separator_position'] == 'after_title') : ?>
            <span class="separator" style="<?php echo esc_attr($separator_color);?>"></span>
        <?php endif; ?>

        <?php if (wpb_js_remove_wpautop($content)) : ?>
            <div class="sub-title" style="<?php echo esc_attr($description_color);?>"><?php echo wpb_js_remove_wpautop($content, true); ?></div>
        <?php endif; ?>

        <?php if ($tt_atts['section_separator'] == 'yes' and $tt_atts['separator_position'] == 'after_description') : ?>
            <span class="separator" style="<?php echo esc_attr($separator_color);?>"></span>
        <?php endif; ?>
    </div> <!-- .section-intro -->

<?php echo ob_get_clean();