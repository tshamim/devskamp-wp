<?php
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    $intro_font_size = $tt_atts['intro-font-size'];
    $intro_subtitle_font_size = $tt_atts['intro-subtitle-font-size'];
    if ($intro_font_size) :
        $intro_font_size = 'font-size: '.$tt_atts['intro-font-size'].'';
    endif;
    if ($intro_subtitle_font_size) :
        $intro_subtitle_font_size = 'font-size: '.$tt_atts['intro-subtitle-font-size'].'';
    endif;

    ob_start();

    $tt_link     = vc_build_link($tt_atts['custom_link']);
    $tt_a_href   = $tt_link['url'];
    $tt_a_title  = $tt_link['title'];


    $words = explode('-', $tt_atts['intro-title'], 2);
    if (isset($words[1])) :
        $words[1] = '<span>'.$words[1].'</span>';
    endif;

    ?>

    <li class="<?php echo esc_attr($tt_atts['el_class'].' '.$css_class); ?>">
        <?php $tt_image_src = wp_get_attachment_image_src( $tt_atts['slider_image'], 'full' ); ?>
        <img src="<?php echo esc_url($tt_image_src[0]); ?>" alt="<?php echo esc_attr($tt_atts['intro-title']); ?>"/>
        
        
        <div class="slider-caption <?php echo esc_attr($tt_atts['content_alignment']); ?>">
            <div class="container">
                <?php if ($tt_atts['intro-title']): ?>
                    <h2 class="animated <?php echo esc_attr($tt_atts['intro_title_animation'] .' '. $tt_atts['intro_title_ani_delay'] ); ?>" style="<?php echo esc_attr($intro_font_size);?>"><?php echo implode(' ', $words); ?></h2>
                <?php endif; ?>
                
                <?php if ($tt_atts['intro-subtitle']): ?>
                    <h3 class="animated <?php echo esc_attr($tt_atts['intro_subtitle_animation'] .' '. $tt_atts['intro_subtitle_ani_delay'] ); ?>" style="<?php echo esc_attr($intro_subtitle_font_size); ?>"><?php echo esc_html($tt_atts['intro-subtitle']);?></h3>
                <?php endif; ?>
                
                <?php if ($tt_atts['show_button'] == 'yes') : ?>
                    <a class="btn btn-primary learnmore-btn animated <?php echo esc_attr($tt_atts['button_animation'] .' '. $tt_atts['button_ani_delay'].' '. $tt_atts['button_class']); ?>" href="<?php echo esc_url($tt_a_href);?>" title="<?php echo esc_attr($tt_a_title);?>"><?php echo esc_html($tt_atts['button_text']); ?></a>
                <?php endif; ?>
            </div> <!-- .container -->
        </div>
        
    </li>

    <?php 
    echo ob_get_clean();