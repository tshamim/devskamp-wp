<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    ob_start(); ?>

    <div class="screenshot-carousel-wrapper <?php echo esc_attr($tt_atts['el_class'].' '.$css_class); ?>">
        <div class="device-mockup" data-device="ipad" data-color="white" data-orientation="landscape">
          <div class="device">
            <div class="screen">
              <!-- START BOOTSTRAP CAROUSEL -->
              <div id="screenshot-carousel" class="carousel slide screenshot-carousel" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">

                <!-- image galery -->
                <?php 
                    $count = 0;
                    $large_images = explode( ',', $tt_atts['images'] );
                    foreach ( $large_images as $image_id ) :
                        $img_src = wp_get_attachment_image_src( $image_id, 'materialize-device-thumbnail' ); ?>
                        <div class="item">
                            <img class="img-responsive" src="<?php echo esc_url( $img_src[ 0 ] ); ?>" alt="<?php echo wp_kses( get_the_title(), array() ); ?>">
                        </div>
                    <?php endforeach;
                 ?>

                </div>

              </div>
              <!-- END BOOTSTRAP CAROUSEL -->
            </div><!-- /.screen -->
          </div><!-- /.device -->
        </div><!-- /.device-mockup -->

        <!-- Controls -->
        <a class="left carousel-control z-depth-2 pink" href="#screenshot-carousel" role="button" data-slide="prev">
          <span class="fa fa-angle-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control pink" href="#screenshot-carousel" role="button" data-slide="next">
          <span class="fa fa-angle-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
    </div>    