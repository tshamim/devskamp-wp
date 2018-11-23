<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    ob_start();

    $images = explode( ',', $tt_atts['images'] );
    $i = 0;
?>

<div class="work-showcase-section <?php echo esc_attr($tt_atts['el_class'].' '.$css_class); ?>">
    <div class="work-showcase carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php foreach ( $images as $key => $indicator ) : ?>
                <li data-target=".work-showcase" data-slide-to="<?php echo intval($key); ?>" class="<?php if($key == 0) echo "active"; ?>"></li>
            <?php endforeach; ?>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <?php foreach ($images as $key => $image_id): 
                $tt_img_src = wp_get_attachment_image_src($image_id, 'full'); ?>

                <div class="item <?php if($key == 0) echo "active"; ?>">
                    <img src="<?php echo esc_url($tt_img_src[0]);?>" alt="">
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href=".work-showcase" role="button" data-slide="prev">
            <span class="fa fa-angle-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href=".work-showcase" role="button" data-slide="next">
            <span class="fa fa-angle-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div><!-- /#work-showcase -->
</div><!-- /.Work Showcase Section -->