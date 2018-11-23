<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    ob_start();

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );
?>

<div class="tt-popup-wrapper <?php echo esc_attr($tt_atts['el_class'].' '.$css_class); ?>">
    <?php if ($tt_atts['video_style'] == 'video-style-one'): ?>
        <div class="tt-popup-wrapper">
            <?php $tt_image_src = wp_get_attachment_image_src( $tt_atts['cover_image'], 'full' ); ?>
            <img class="img-responsive" src="<?php echo esc_url($tt_image_src[0]); ?>" alt/>
            <?php $source_url = $tt_atts['source_url'];
                if ($source_url) : ?>
                    <a class="tt-popup" href="<?php echo esc_url($source_url); ?>"><i class="material-icons">&#xE038;</i></a>
                <?php endif;
            ?>
        </div> <!-- .tt-popup-wrapper -->
    <?php endif; ?>

    <?php if ($tt_atts['video_style'] == 'video-style-two'): ?>
        <div class="video-wrapper">
            <div class="valign-cell">
                <div class="text-center">
                    <?php $source_url = $tt_atts['source_url']; ?>
                      <div class="video-trigger"><?php echo esc_html($tt_atts['video_text_one']); ?> <a  class="popup-video" href="<?php echo esc_url($source_url); ?>"><i class="material-icons">&#xE038;</i></a><?php echo esc_html($tt_atts['video_text_two']); ?></div>
                </div>
            </div>            
        </div> <!-- .tt-popup-wrapper -->
    <?php endif; ?>

    <?php if ($tt_atts['video_style'] == 'video-style-three'): ?>
        <div class="video-wrapper">
            <div class="valign-cell">
                <div class="text-center">
                    <?php $source_url = $tt_atts['source_url']; ?>

                    <h2 class="section-title text-uppercase white-text"><?php echo esc_html($tt_atts['video_title']); ?></h2>
                    <span class="section-sub"><?php echo wpb_js_remove_wpautop($content, true);?></span>

                    <div class="video-triggerr"><a class="popup-video" href="<?php echo esc_url($source_url); ?>"><i class="material-icons">&#xE038;</i></a></div>
                </div>
            </div>
        </div>        
    <?php endif; ?>
</div> <!-- .tt-popup-wrapper -->
<?php echo ob_get_clean();