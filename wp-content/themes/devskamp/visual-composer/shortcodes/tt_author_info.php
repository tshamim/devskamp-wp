<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    ob_start();


    $author_bio = (array) vc_param_group_parse_atts( $tt_atts['author_bio'] );
    $contents = array();

    foreach ( $author_bio as $data ) :
        $bio_data = $data;
        $bio_data['title'] = isset( $data['title'] ) ? $data['title'] : '';
        $bio_data['value'] = isset( $data['value'] ) ? $data['value'] : '';

        $contents[] = $bio_data;
    endforeach; 

    $profile_image = wp_get_attachment_image_src( $tt_atts['profile_image'], 'full' );
    $cover_image = wp_get_attachment_image_src( $tt_atts['cover_image'], 'full' );

    ?>

    
    <div class="author-wrapper profile <?php echo esc_attr($tt_atts['el_class'].' '.$css_class); ?>">
        <?php if ($cover_image): ?>
            <div class="author-cover">
                <img class="img-responsive" src="<?php echo esc_url($cover_image[0]); ?>" alt="<?php echo esc_attr($tt_atts['name']); ?>">
            </div>
        <?php endif; ?>
        
        <div class="author-avatar">
            <?php if ($profile_image): ?>
                <img class="img-responsive" src="<?php echo esc_url($profile_image[0]); ?>" alt="<?php echo esc_attr($tt_atts['name']); ?>">
            <?php endif; ?>
            
            <?php if ($tt_atts['name']): ?>
                <h2 class="text-extrabold text-uppercase no-margin"><?php echo esc_html($tt_atts['name']); ?></h2>
            <?php endif; ?>

            <?php if ($tt_atts['designation']): ?>
                <span><?php echo esc_html($tt_atts['designation']); ?></span>
            <?php endif; ?>
        </div>

        <ul class="author-meta mb-30">
            <?php if ($author_bio): ?>
                <?php foreach ($contents as $content): ?>
                    <li><span class="title"><?php echo esc_html($content['title']); ?></span><span class="value"> <?php echo esc_html($content['value']); ?></span></li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
        <?php if ($tt_atts['footer_text']): ?>
            <span class="available"><a class="tt-scroll" href="<?php echo esc_html($tt_atts['footer_text_link']); ?>"><?php echo esc_html($tt_atts['footer_text']); ?></a></span>
        <?php endif; ?>
    </div>