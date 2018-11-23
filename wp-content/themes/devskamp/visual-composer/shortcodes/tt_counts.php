<?php
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

	ob_start();

	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

	?>

	<div class="counter-section fact-wrap <?php echo esc_attr($tt_atts['el_class'].' '.$tt_atts['style'].' '.$css_class); ?>">
		
		<?php echo wpb_js_remove_wpautop($content); ?>
		
	</div>
	<?php
	echo ob_get_clean();
