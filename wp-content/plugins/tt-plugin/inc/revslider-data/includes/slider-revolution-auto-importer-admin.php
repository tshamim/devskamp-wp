<?php function slider_revolution_auto_importer_admin() {
		ob_start(); ?>
        
		<div class="wrap">
			<form action="<?php echo plugins_url('tt-plugin'); ?>/inc/revslider-data/includes/auto-importer.php">
            	<input type="submit" value="<?php esc_html_e('Import Sliders', 'tt-pl-textdomain');?>" />
            </form>
		</div>

		<?php echo ob_get_clean();
	}
	
	function slider_revolution_auto_importer_add_admin() {
		
		add_theme_page('Import Sliders', 'Import Sliders', 'read', 'slider_revolution_auto_importer_admin', 'slider_revolution_auto_importer_admin');
	}
	
	add_action('admin_menu', 'slider_revolution_auto_importer_add_admin');