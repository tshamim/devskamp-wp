<?php
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    ob_start();


    // color
    $title_color = "";
    $content_color = "";
    $content_background = "";

    if ($tt_atts['title_color_option'] == 'custom-color') :
        $title_color = 'color:'.$tt_atts['title_color'].'';
    endif;

    if ($tt_atts['content_color_option'] == 'custom-color') :
        $content_color = 'color:'.$tt_atts['content_color'].'';
    endif;

    if ($tt_atts['content_background'] == 'custom-color') :
        $content_background = 'background-color:'.$tt_atts['content_background_color'].'';
    endif;


    // link
    $link     = vc_build_link($tt_atts['link']);
    $a_href   = $link['url'];
    $a_title  = $link['title'];
    $a_target = trim($link['target']);

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

?>

    <div class="intro-block <?php echo esc_attr($tt_atts['content_alignment'].' '.$tt_atts['content_background'].' '.$tt_atts['el_class'].' '.$css_class); ?>" style="<?php echo esc_attr($content_background)?>">
        <div class="intro-content" style="<?php echo esc_attr($content_color)?>" >
            
            <h2 style="<?php echo esc_attr($title_color)?>" ><?php echo esc_html($tt_atts['title'])?></h2>

            <?php echo wpb_js_remove_wpautop($content, true);?>
        </div>

        <?php
            if ($a_href) : ?>
                <a href="<?php echo esc_attr($a_href)?>" class="learn-more"> <?php echo esc_html($tt_atts['readmore_title'])?> <i class="fa fa-long-arrow-right"></i></a>
            <?php endif;
        ?>
        
    </div><!-- /.intro-block -->


<?php echo ob_get_clean();