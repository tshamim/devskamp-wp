<?php
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    ob_start();

    // color options
    $client_name_color = "";
    $client_org_color = "";
    $client_quote_bg_color = "";
    $client_quote_text_color = "";

    if ($tt_atts['client_text_color']) :
        $client_name_color = 'color: ' .$tt_atts['client_text_color']. ';';
    endif;

    if ($tt_atts['client_org_text_color']) :
        $client_org_color = 'color: ' .$tt_atts['client_org_text_color']. ';';
    endif;

    if ($tt_atts['client_quote_text_bg_color']) :
        $client_quote_bg_color = 'background-color: ' .$tt_atts['client_quote_text_bg_color']. ';';
    endif;

    if ($tt_atts['client_quote_text_color']) :
        $client_quote_text_color = 'color: ' .$tt_atts['client_quote_text_color']. ';';
    endif;

    $carousel_id = rand(5, 99999);
    
    $carousel_style = "";

    if ($tt_atts['carousel_type'] == 'bootstrap-carousel' && $tt_atts['carousel_style2'] == 'carousel-style-one') :
        $carousel_style = 'flat-testimonial';
    elseif ($tt_atts['carousel_type'] == 'bootstrap-carousel' && $tt_atts['carousel_style2'] == 'carousel-style-two') :
        $carousel_style = 'creative-testimonial';
    elseif ($tt_atts['carousel_type'] == 'flex-carousel' && $tt_atts['carousel_style'] == 'client-thumb-circle') :
        $carousel_style = 'client-thumb-circle';
    elseif ($tt_atts['carousel_type'] == 'flex-carousel' && $tt_atts['carousel_style'] == 'client-thumb-square') :
        $carousel_style = 'client-thumb-square';
    elseif ($tt_atts['carousel_type'] == 'flex-carousel' && $tt_atts['carousel_style'] == 'client-thumb-grid') :
        $carousel_style = 'client-thumb-grid';
    elseif ($tt_atts['carousel_type'] == 'flex-carousel' && $tt_atts['carousel_style'] == 'client-thumb-half-grid') :
        $carousel_style = 'client-thumb-half-grid';
    endif;

    $testimonial_info = (array)vc_param_group_parse_atts($tt_atts['testimonial_info']);
    $testimonial_info_data = array();
    foreach ($testimonial_info as $data) :
        $tt_testimonial_info = $data;

        $tt_testimonial_info['photo_option'] = isset($data['photo_option']) ? $data['photo_option'] : '';
        $tt_testimonial_info['client_image'] = isset($data['client_image']) ? $data['client_image'] : '';
        $tt_testimonial_info['client_name'] = isset($data['client_name']) ? $data['client_name'] : '';
        $tt_testimonial_info['client_org'] = isset($data['client_org']) ? $data['client_org'] : '';
        $tt_testimonial_info['content'] = isset($data['content']) ? $data['content'] : '';

        $testimonial_info_data[] = $tt_testimonial_info;
    endforeach; ?>


<div class="testimonial-carousel-wrapper <?php echo esc_attr($tt_atts['el_class'].' '.$css_class); ?>">
    <?php if ($tt_atts['carousel_type'] == 'bootstrap-carousel'): ?>
        <div class="<?php echo esc_attr($carousel_style); ?> carousel slide testimonial-carousel-<?php echo intval($carousel_id); ?>" data-ride="carousel">
            
            <?php if ($tt_atts['carousel_type'] == 'bootstrap-carousel' && $tt_atts['carousel_style2'] == 'carousel-style-one'): ?>
                <!-- Bottom Carousel Indicators -->
                <ol class="carousel-indicators">
                    <?php foreach ($testimonial_info_data as $key => $indicators) : ?>
                        <li class="<?php if($key == 0){echo 'active';} ?>" data-target=".testimonial-carousel-<?php echo intval($carousel_id); ?>" data-slide-to="<?php echo intval($key);?>"></li>
                    <?php endforeach; ?>
                </ol>
            <?php endif; ?>
            
            <!-- Carousel Slides / Quotes -->
            <div class="carousel-inner text-center">
                <?php foreach ($testimonial_info_data as $key => $carousel_content) : ?>
                    <div class="item <?php if($key == 0){echo 'active';} ?>">
                        <div class="testimonial-content" style="<?php echo esc_attr($client_quote_bg_color); ?>">

                            <?php $img_src = wp_get_attachment_image_src($tt_atts['quote_icon']); 
                                if ($img_src) { ?>
                                    <div class="quote-img">
                                        <img src="<?php echo esc_url($img_src[0]); ?>" alt="">
                                    </div>
                                <?php }
                            ?>

                            <div class="quote-content" style="<?php echo esc_attr($client_quote_text_color); ?>">
                                <p><?php echo esc_html($carousel_content['content']); ?></p>
                            </div>
                            <?php 
                                $client_name = $carousel_content['client_name'];

                                if ($client_name) : ?>
                                    <span class="author-info">
                                        <span class="author-name" style="<?php echo esc_attr($client_name_color); ?>">
                                            <?php echo esc_html($carousel_content['client_name']); ?>
                                        </span>
                                        
                                        <?php if ($carousel_content['client_org']): ?>
                                            <span class="author-meta" style="<?php echo esc_attr($client_org_color); ?>">, <?php echo esc_html($carousel_content['client_org']); ?>
                                            </span>
                                        <?php endif; ?>
                                        
                                    </span>
                                <?php endif;
                            ?>
                            
                        </div> <!-- .testimonial-content -->
                    </div> <!-- .item -->
                <?php endforeach; ?>
            </div> <!-- .carousel-inner -->
            
            <!-- Carousel Buttons Next/Prev -->
            <a data-slide="prev" href=".testimonial-carousel-<?php echo intval($carousel_id); ?>" class="left carousel-control"><span class="material-icons" aria-hidden="true">&#xE5C4;</span></a>
            <a data-slide="next" href=".testimonial-carousel-<?php echo intval($carousel_id); ?>" class="right carousel-control"><span class="material-icons" aria-hidden="true">&#xE5C8;</span></a>
        </div>
    <?php endif ?>
    
    <?php if ($tt_atts['carousel_type'] == 'flex-carousel'): ?>

        <div  class="<?php echo esc_attr($carousel_style); ?> flex-testimonial clearfix">
            <ul class="slides">

                <?php foreach ($testimonial_info_data as $key => $carousel_content): ?>
                    
                <?php $img_src = wp_get_attachment_image_src($carousel_content['client_image']); ?>
                    
                    <li data-thumb="<?php echo esc_url($img_src[0]); ?>">
                        <div class="quote-wrapper">
                            
                            <?php $img_src = wp_get_attachment_image_src($tt_atts['quote_icon']); 
                                if ($img_src) { ?>
                                    <div class="quote-img">
                                        <img src="<?php echo esc_url($img_src[0]); ?>" alt="">
                                    </div>
                                <?php }
                            ?>

                            <div class="quote-content" style="<?php echo esc_attr($client_quote_text_color); ?>">
                                <p><?php echo esc_html($carousel_content['content']); ?></p>
                            </div><!-- /.quote-content -->

                            <div class="client-info clearfix">
                                <?php 
                                $client_name = $carousel_content['client_name'];
                                $client_designation = $carousel_content['client_org'];

                                if ($client_name) : ?>
                                    <span class="client-name" style="<?php echo esc_attr($client_name_color); ?>"><?php echo esc_html($client_name); ?></span>
                                <?php endif; 
                                
                                if ($client_designation) : ?>
                                    <span class="client-title" style="<?php echo esc_attr($client_org_color); ?>"><?php echo esc_html($client_designation); ?></span>
                                <?php endif; ?>
                            </div><!-- /.client-info -->

                        </div><!-- /.quote-wrapper -->
                    </li>
                <?php endforeach; ?>
            </ul>
        </div><!-- /#client-slider-v3 -->
    <?php endif; ?>
</div>
<?php echo ob_get_clean();