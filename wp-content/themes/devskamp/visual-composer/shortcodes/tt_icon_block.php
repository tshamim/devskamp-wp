<?php
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );
    
    global $tt_icon_block_attr;

    ob_start();

    $icon_type = $icon = $icon_color = $title_color = $block_height = $title_size = $title_margin = $icon_size = "";

    // icon
    if ($tt_atts['icon_type'] == 'fontawesome-icon') :
        $icon_type = "fontawesome-icon";
        $icon = $tt_atts['fontawesome_icon'];
    elseif ($tt_atts['icon_type'] == 'material-icon') :
        $icon_type = "material-icon";
        $icon = $tt_atts['material_icon'];
    elseif ($tt_atts['icon_type'] == 'flat-icon') :
        $icon_type = "flat-icon";
        $icon = $tt_atts['flat_icon'];
    endif;

    // color
    if ($tt_atts['icon_color_option'] == 'custom-color') :
        $icon_color = 'color:'.$tt_atts['icon_color'].'';
    endif;

    if ($tt_atts['title_color_option'] == 'custom-color') :
        $title_color = 'color:'.$tt_atts['title_color'].'';
    endif;

    // block height
    if ($tt_icon_block_attr['block_height']) {
        $block_height = 'min-height:'.$tt_icon_block_attr['block_height'].'';
    }

    // link
    $link     = vc_build_link($tt_atts['link']);
    $a_href   = $link['url'];
    $a_title  = $link['title'];
    $a_target = trim($link['target']);

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    $inner_wrapper = 'col-sm-6 col-md-'.$tt_icon_block_attr['grid_column'];

    if ($tt_icon_block_attr['featured_block_style'] == 'animated-carousel') {
        $inner_wrapper = 'featured-item';
    }

    if ($tt_icon_block_attr['grid_column'] == '12') {
        $inner_wrapper = 'col-sm-12 col-md-'.$tt_icon_block_attr['grid_column'];
    }

    if ($tt_atts['icon_size']) {
        $icon_size = 'font-size:'.$tt_atts['icon_size'].';';
    }

    if ($tt_atts['title_size']) {
        $title_size = 'font-size:'.$tt_atts['title_size'].';';
    }

    if ($tt_atts['title_margin']) {
        $title_margin = 'margin-bottom:'.$tt_atts['title_margin'].';';
    }

    wp_enqueue_style( 'vc_material' );
?>


    <div class="icon-block-grid <?php echo esc_attr($inner_wrapper.' '.$tt_atts['el_class'].' '.$css_class); ?>" style="<?php echo esc_attr($block_height); ?>">
        
        <div class="icon-block <?php echo esc_attr($tt_atts['icon_style'].' '.$tt_atts['icon_position']); ?>">
            <?php if ($tt_atts['show_icon'] == 'yes') : ?>
                <div class="tt-icon <?php echo esc_attr($icon_type.' '.$tt_atts['icon_hover_bg_color']);?>">
                    <?php if ($tt_atts['custom_link'] == 'yes') : ?>
                        <a href="<?php echo esc_attr($a_href)?>"><i class="<?php echo esc_attr($icon);?>" style="<?php echo esc_attr($icon_color.' '.$icon_size)?>"></i></a>
                    <?php else : ?>
                        <i class="<?php echo esc_attr($icon.' '.$tt_atts['icon_color_option']) ;?> " style="<?php echo esc_attr($icon_color.' '.$icon_size)?>"></i>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            
            <div class="tt-content">
                <h3 class="<?php echo esc_attr($tt_atts['title_color_option']); ?>" style="<?php echo esc_attr($title_color.' '.$title_size.' '.$title_margin)?>">
                    <?php if ($tt_atts['custom_link'] == 'yes') : ?>
                        <a class="<?php echo esc_attr($tt_atts['title_color_option']); ?>" href="<?php echo esc_attr($a_href)?>" style="<?php echo esc_attr($title_color)?>"><?php echo esc_html($tt_atts['title'])?></a>
                    <?php else : ?>
                        <?php echo esc_html($tt_atts['title'])?>
                    <?php endif; ?>
                </h3>
                <?php echo wpb_js_remove_wpautop($content, true);?>
            </div>
        </div> <!-- .icon-block -->

    </div> <!-- .icon-block-grid -->
    

<?php echo ob_get_clean();