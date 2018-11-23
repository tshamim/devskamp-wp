<?php
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    ob_start(); 

    $map_contents = (array) vc_param_group_parse_atts( $tt_atts['map_content'] );
    $maps = array();

    foreach ( $map_contents as $data ) :
        $map_data = $data;

        $map_data['tt_latitude'] = isset( $data['tt_latitude'] ) ? $data['tt_latitude'] : '';
        $map_data['tt_longitude'] = isset( $data['tt_longitude'] ) ? $data['tt_longitude'] : '';
        $map_data['info_content'] = isset( $data['info_content'] ) ? $data['info_content'] : '';
        $map_data['map_marker'] = isset( $data['map_marker'] ) ? $data['map_marker'] : '';

        $maps[] = $map_data;
    endforeach;
?>

    <div class="map-section <?php echo esc_attr($tt_atts['el_class'].' '.$css_class);?>">

        <div id="ttmap" style="height: <?php echo esc_attr($tt_atts['map_height']);?>" data-landcolor="<?php echo esc_attr($tt_atts['landscape_color']);?>" data-landcolor-opacity="<?php echo intval($tt_atts['landscape_color_opacity']);?>" data-watercolor="<?php echo esc_attr($tt_atts['water_color']);?>" data-watercolor-opacity="<?php echo intval($tt_atts['water_color_opacity']);?>" data-zoom="<?php echo esc_attr($tt_atts['map_zoom']); ?>"></div>

        <div class="map-content">
            <ul>
                <?php foreach ( $maps as $key => $map_info ): 
                    $image_src = wp_get_attachment_image_src($map_info['map_marker'], 'full'); ?>
                    <li class="address address-<?php echo esc_attr($key);?>" data-lat="<?php echo esc_attr($map_info['tt_latitude']);?>" data-lng="<?php echo esc_attr($map_info['tt_longitude']);?>" data-marker="<?php echo esc_url($image_src[0]);?>" data-info="<?php echo esc_attr($map_info['info_content']);?>" >
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div> <!-- .tt-map-wrapper -->
<?php echo ob_get_clean();