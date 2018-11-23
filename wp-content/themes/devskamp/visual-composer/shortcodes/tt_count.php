<?php
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

	ob_start();

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

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


    // colors
    $icon_color = "";
    $number_color = "";
    $title_color = "";
    $background_color = "";

    if ($tt_atts['icon_color_option'] == 'custom-color') :
        $icon_color = 'color:'.$tt_atts['icon_color'].'';
    endif;

    if ($tt_atts['counted_number_color_option'] == 'custom-color') :
        $number_color = 'color:'.$tt_atts['counted_number_color'].'';
    endif;

    if ($tt_atts['title_color_option'] == 'custom-color') :
        $title_color = 'color:'.$tt_atts['title_color'].'';
    endif;

    if ($tt_atts['background_color']) :
        $background_color = 'background-color:'.$tt_atts['background_color'].'';
    endif;

    wp_enqueue_style( 'vc_material' );
    
	?>
	
	<div class="counter-wrap text-center <?php echo esc_attr($tt_atts['grid_class'] .' '. $tt_atts['el_class'].' '.$css_class); ?>" style="<?php echo esc_attr($background_color); ?>">
		
		<?php if ($tt_atts['show_icon'] == 'yes') : ?>
            <div class="tt-icon <?php echo esc_attr($icon_type);?>">
                <span class="icon"><i class="<?php echo esc_attr($icon.' '.$tt_atts['icon_color_option']) ;?> " style="<?php echo esc_attr($icon_color)?>"></i></span>
            </div>
        <?php endif; ?>

		<strong style="<?php echo esc_attr($number_color); ?>"><span class="timer"><?php echo intval($tt_atts['counted_number']); ?></span>+</strong>
		
		<?php if ($tt_atts['subtitle']) : ?>
			<span class="count-description" style="<?php echo esc_attr($title_color); ?>"><?php echo esc_html($tt_atts['subtitle']); ?></span>
		<?php endif; ?>

	</div>

	<?php
	echo ob_get_clean();