<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );
    $tt_custom_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts ); 

    ob_start();

    // partner wrapper class
    $partner_style = $tt_atts['style'];
    $wrapper_class = "partner-carousel";
    $carousel_data = "";
    $grid_class = "";
    $partner_gutter = "";
    $min_height = "";

    if ($tt_atts['item_height']) :
        $min_height = 'min-height: '.$tt_atts['item_height'].';';
    endif;
    
    if ($partner_style == "without_carousel") :
        $wrapper_class = "partners-wrapper clearfix";
        $grid_class = "col-md-3 col-sm-6 client";
        $partner_gutter = $tt_atts['partner_gutter'];
        
    endif;

    // image effect
    $image_effect = $tt_atts['image_effect'];
    $image_effect_class = "";
    if ($image_effect == 'black_white') :
        $image_effect_class = "tt-bh-effect";
    endif;

    if ($partner_style == 'with_carousel') :
        $carousel_data = 'data-largescreen='.intval($tt_atts['large_screen']).' data-desktop='.intval($tt_atts['items_desktop']).' data-desktopsmall='.intval($tt_atts['items_desktop_small']).' data-tablet="'.intval($tt_atts['items_tablet']).'';
    endif;
    
    ?>

    <div class="<?php echo esc_attr($wrapper_class.' '.$tt_atts['el_class'].' '. $tt_custom_css);?>" <?php echo esc_attr($carousel_data); ?>>
        <?php $tt_custom_links = '';
        
        if($tt_atts['on_click_action'] == 'custom_link') :
            $tt_custom_links = explode(',',$tt_atts['links']);
        endif;

        $images = explode( ',', $tt_atts['images'] );
        $i = -1; 
        
        foreach ( $images as $attach_id ) :
            $i++;

            $tt_img_src = wp_get_attachment_image_src($attach_id, 'tt-client-logo'); ?>
            
            <div class="item partner-item <?php echo esc_attr($grid_class.' '.$partner_gutter.' '.$image_effect_class); ?>">

                <div class="boxed-item" style="<?php echo esc_attr($min_height); ?>">
                    <?php if($tt_atts['on_click_action'] == 'custom_link' and isset($tt_custom_links[$i])) : ?>
                        <a href="<?php echo esc_url($tt_custom_links[$i]);?>"><img src="<?php echo esc_url($tt_img_src[0]); ?>" alt=""></a>
                    <?php else : ?>
                        <img class="img-responsive" src="<?php echo esc_url($tt_img_src[0]); ?>" alt="">
                    <?php endif; ?>
                </div><!-- /.boxed-item -->

            </div><!-- /.partner-item -->
        <?php endforeach; ?>
    </div> <!-- .partner-carousel -->
<?php echo ob_get_clean();