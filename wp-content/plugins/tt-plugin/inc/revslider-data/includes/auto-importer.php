<?php

	$absolute_path = __FILE__;
	$path_to_file = explode( 'wp-content', $absolute_path );
	$path_to_wp = $path_to_file[0];
	
	require_once( $path_to_wp.'/wp-load.php' );
	require_once( $path_to_wp.'/wp-includes/functions.php');
	require_once( $path_to_wp.'/wp-admin/includes/file.php');
	
	echo ''.esc_html__('Import Files loaded', 'tt-pl-textdomain').'<br />'; 
	echo ''.esc_html__('Import Sliders:', 'tt-pl-textdomain').' <br />'; 
	
	$slider_array = array(
		'slider_zips/app-landing-slider.zip',
		'slider_zips/book-landing-slider.zip',
		'slider_zips/canvas-slider.zip',
		'slider_zips/charity-slider.zip',
		'slider_zips/coffeeshop-slider.zip',
		'slider_zips/construction-slider.zip',
		'slider_zips/consulting-slider.zip',
		'slider_zips/corporate-slider.zip',
		'slider_zips/creative-slider.zip',
		'slider_zips/default-slider.zip',
		'slider_zips/digital-agency.zip',
		'slider_zips/elegant-slider.zip',
		'slider_zips/event-slider.zip',
		'slider_zips/onepage-default.zip',
		'slider_zips/personal-profile.zip',
		'slider_zips/portfolio-slider.zip',
		'slider_zips/restaurant-about-page.zip',
		'slider_zips/restaurant-menu-page.zip',
		'slider_zips/restaurant-slider.zip',
		'slider_zips/seo-slider.zip',
		'slider_zips/startup-slider.zip',
		'slider_zips/shop-slider.zip'
	);
	
	$slider = new RevSlider();
	echo '<br />';
	 
	foreach($slider_array as $filepath) {
		echo RS_ZIP_FOLDER_PATH.$filepath . '<br />';
		$slider->importSliderFromPost(true, true, RS_ZIP_FOLDER_PATH.$filepath);
	}
	 
	echo ' <br />'.esc_html__('Sliders processed', 'tt-pl-textdomain').'<br /><br />';
	
	ob_start(); ?>
	<a href="<?php echo admin_url() . 'admin.php?page=revslider'; ?>"><?php esc_html_e(esc_html__('View Sliders', 'tt-pl-textdomain'))?></a>
<?php echo ob_get_clean();