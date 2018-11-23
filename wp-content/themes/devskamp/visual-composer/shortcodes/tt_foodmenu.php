<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    ob_start(); 

    // icon
    $icon_type = "";
    $icon = "";

    if ($tt_atts['icon_type'] == 'fontawesome-icon') :
        $icon_type = "fontawesome-icon";
        $icon = $tt_atts['fontawesome_icon'];
    elseif ($tt_atts['icon_type'] == 'material-icon') :
        $icon_type = "material-icon";
        $icon = $tt_atts['material_icon'];
    elseif ($tt_atts['icon_type'] == 'flat-icon') :
        $icon_type = "flat-icon";
        $icon = $tt_atts['flat_icon'];
    endif;

    // food content
    $food_contens = (array) vc_param_group_parse_atts( $tt_atts['food_content'] );
    $contens = array();

    foreach ( $food_contens as $data ) :
        $food_data = $data;
        $food_data['title'] = isset( $data['title'] ) ? $data['title'] : '';
        $food_data['subtitle'] = isset( $data['subtitle'] ) ? $data['subtitle'] : '';
        $food_data['price'] = isset( $data['price'] ) ? $data['price'] : '';
        $food_data['label'] = isset( $data['label'] ) ? $data['label'] : '';

        $contens[] = $food_data;
    endforeach; 

    wp_enqueue_style( 'vc_material' );
    ?>


    <div class="food-menu-wrapper theme-bg <?php echo esc_attr($tt_atts['el_class'].' '.$css_class); ?>">

        <div class="food-menu-intro text-center <?php echo esc_attr($icon_type);?>">
            <?php if ($tt_atts['show_icon'] == 'yes'): ?>
                <i class="<?php echo esc_attr($icon); ?>"></i>
            <?php endif; ?>
            
            <?php if ($tt_atts['cat_name']): ?>
                <h2 class="text-uppercase white-text no-margin"><?php echo esc_html($tt_atts['cat_name']); ?></h2>
            <?php endif; ?>
        </div> <!-- .food-menu-intro -->

        <div class="food-menu-list">
            <?php if ($food_contens) :
                foreach ( $contens as $content ) : ?>
                    <div class="food-menu">
                        <div class="row">
                            <div class="col-md-9 col-sm-8">
                                <?php if ($content['title']): ?>
                                    <h3 class="food-menu-title white-text text-bold"><?php echo esc_html($content['title']); ?></h3>
                                <?php endif; ?>
                                
                                <?php if ($content['subtitle']): ?>
                                    <div class="food-menu-detail white-text"><?php echo esc_html($content['subtitle']); ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-3 col-sm-4 food-menu-price-detail">
                                <?php if ($content['price']): ?>
                                    <h3 class="food-menu-price white-text text-medium"><?php echo esc_html($content['price']); ?></h3>
                                <?php endif; ?>
                                
                                <?php if ($content['label']): ?>
                                    <div class="food-menu-label brand-color"><?php echo esc_html($content['label']); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>       
                <?php endforeach;
            endif; ?>
        </div><!-- /.food-menu-list -->
    </div> <!-- .food-menu-wrapper -->

<?php echo ob_get_clean();