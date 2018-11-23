<?php 
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

$pagesidebar = 'materialize-page-sidebar';

if (function_exists('rwmb_meta')) :
	$pagesidebar = rwmb_meta('materialize_page_sidebars');

	$page_sidebar = materialize_option( 'page-layout', false, 'right-sidebar' );

	if ( $page_sidebar == 'right-sidebar' and is_active_sidebar( 'materialize-page-sidebar' ) || function_exists('smk_sidebar') && rwmb_meta('materialize_page_sidebars')) : ?>
		<div class="col-md-4 col-sm-4">
			<div class="tt-sidebar-wrapper right-sidebar" role="complementary">
				<?php if (function_exists('smk_sidebar') && rwmb_meta('materialize_page_sidebars')) :
					smk_sidebar($pagesidebar);
				else :
					dynamic_sidebar( 'materialize-page-sidebar' );
				endif; ?>
			</div>
		</div>
	<?php elseif ( $page_sidebar == 'left-sidebar' and is_active_sidebar( 'materialize-page-sidebar' ) || function_exists('smk_sidebar') && rwmb_meta('materialize_page_sidebars')) : ?>
		<div class="col-md-4 col-md-pull-8 col-sm-4 col-sm-pull-8">
			<div class="tt-sidebar-wrapper left-sidebar" role="complementary">
				<?php if (function_exists('smk_sidebar') && rwmb_meta('materialize_page_sidebars')) :
					smk_sidebar($pagesidebar);
				else :
					dynamic_sidebar( 'materialize-page-sidebar' );
				endif; ?>
			</div>
		</div>
	<?php endif;
endif;