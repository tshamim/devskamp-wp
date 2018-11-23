<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    ob_start();
    ?>


    <div class="content-carousel-wrapper <?php echo esc_attr($tt_atts['el_class'].' '.$css_class); ?>">
        <?php if ($tt_atts['title']): ?>
            <h2><?php echo esc_html($tt_atts['title']); ?></h2>
        <?php endif; ?>
        <div class="content-carousel carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <?php echo wpb_js_remove_wpautop( $content ); ?>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href=".content-carousel" role="button" data-slide="prev">
                <span class="fa fa-angle-left" aria-hidden="true"></span>
            </a>
            <a class="right carousel-control" href=".content-carousel" role="button" data-slide="next">
                <span class="fa fa-angle-right" aria-hidden="true"></span>
            </a>
        </div>
    </div> <!-- .content-carousel-wrapper -->
    
<?php echo ob_get_clean();