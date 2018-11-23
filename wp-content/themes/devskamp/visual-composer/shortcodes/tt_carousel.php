<?php
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    ob_start();

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    $grid_class_one = "col-md-12";
    $grid_class_two = "col-md-12";

    if ($tt_atts['carousel_style'] == 'style-one') {
        $grid_class_one = "col-md-7";
        $grid_class_two = "col-md-5";
    }

    // color options
    $car_title_color = "";
    $car_content_color = "";

    if ($tt_atts['car_title_color']) :
        $car_title_color = 'color: ' .$tt_atts['car_title_color']. ';';
    endif;

    if ($tt_atts['car_content_color']) :
        $car_content_color = 'color: ' .$tt_atts['car_content_color']. ';';
    endif; ?>

    <?php
        $carousel_info = (array)vc_param_group_parse_atts($tt_atts['carousel_info']);
        $carousel_info_data = array();
        foreach ($carousel_info as $data) :
            $tt_carousel_info = $data;

            $tt_carousel_info['photo_option'] = isset($data['photo_option']) ? $data['photo_option'] : '';
            $tt_carousel_info['carousel_image'] = isset($data['carousel_image']) ? $data['carousel_image'] : '';
            $tt_carousel_info['car_title'] = isset($data['car_title']) ? $data['car_title'] : '';
            $tt_carousel_info['car_content'] = isset($data['car_content']) ? $data['car_content'] : '';
            $tt_carousel_info['button_text'] = isset($data['button_text']) ? $data['button_text'] : '';

            $carousel_info_data[] = $tt_carousel_info;
        endforeach;
    ?>

    <div class="project-carousel <?php echo esc_attr($tt_atts['el_class'].' '.$css_class.' '.$tt_atts['carousel_style']); ?>">
        <?php 
        $count = 1;

        foreach ($carousel_info_data as $carousel_content) : 

            $link     = vc_build_link($carousel_content['button_link']);
            $a_href   = $link['url']; ?>

            <div class="carousel-item">
                <div class="row">
                    <div class="<?php echo esc_attr($grid_class_one);?>">
                        
                        <?php if ($tt_atts['number_visibility'] == 'number-show'): ?>
                            <span class="number"><?php echo esc_html_e('No. ', 'materialize');?><?php echo esc_html($count);?></span>
                        <?php endif; ?>
                        
                        <h2 style="<?php echo esc_attr($car_title_color); ?>" class="text-bold font-35 mb-30"><?php echo esc_html($carousel_content['car_title']); ?></h2>
                        <p style="<?php echo esc_attr($car_content_color); ?>" class="mb-60"><?php echo esc_html($carousel_content['car_content']); ?></p>

                        <?php if ($carousel_content['button_show'] == 'yes') : ?>
                            <a href="<?php echo esc_url($a_href); ?>" class="btn waves-effect waves-light"><?php echo esc_html($carousel_content['button_text']);?></a>
                        <?php endif; ?>
                    </div>
                    <?php $img_src = wp_get_attachment_image_src($carousel_content['carousel_image'], 'full');
                    if ($carousel_content['photo_option'] == 'yes' && $img_src) : ?>
                        <div class="<?php echo esc_attr($grid_class_two);?>">
                            <img class="img-responsive" src="<?php echo esc_url($img_src[0]); ?>" alt="">
                        </div>
                    <?php endif; ?>
                </div>
            </div><!-- /.carousel-item -->
        <?php 
        $count++;
        endforeach; ?>
    </div>
<?php echo ob_get_clean();