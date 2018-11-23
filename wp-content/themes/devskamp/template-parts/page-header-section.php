<?php 
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif; 


$content_alignment = $margin_bottom = $padding_top = $padding_bottom = $parallax_background = $content_color = $overlay = "";
$header_background = 'background-image: url('.esc_url(materialize_page_header_background()).');';

if (function_exists('rwmb_meta')) : 
    $content_alignment = rwmb_meta('materialize_breadcrumb_content_alignment');
    if (rwmb_meta('materialize_page_header_margin_bottom')) :
        $margin_bottom = 'margin-bottom: '.rwmb_meta('materialize_page_header_margin_bottom').';';
    endif;
    if (rwmb_meta('materialize_header_padding_top')) :
        $padding_top = 'padding-top: '.rwmb_meta('materialize_header_padding_top').';';
    endif;
    if (rwmb_meta('materialize_header_padding_bottom')) :
        $padding_bottom = 'padding-bottom: '.rwmb_meta('materialize_header_padding_bottom').';';
    endif;

    // background options
    if (rwmb_meta('materialize_page_header_color')) :
        $header_background = 'background-color: '.rwmb_meta('materialize_page_header_color').';';
    endif;

    // parallax background
    if (rwmb_meta('materialize_parallax_header_image') == 'parallax_header_bg') :
        $parallax_background = "data-stellar-background-ratio= 0.1";
    endif;

    // content color
    if (rwmb_meta('materialize_header_content_color')) :
        $content_color = 'color: '.rwmb_meta('materialize_header_content_color').';';
    endif;

    // overlay
    if (rwmb_meta('materialize_background_overlay') == 'bg_overlay_enable' || materialize_option('blog-title-overlay') && ! is_page() && !is_singular('tt-portfolio') && !is_singular('tt-joblist') && !is_singular('tt-member') && !is_singular('tt-service')) : 
        $overlay = 'overlay-enable';
    endif;

    $breadcrumb = rwmb_meta('materialize_page_breadcrumb_show');
endif; ?>

<!--page title start-->
<section class="page-title <?php echo esc_attr($content_alignment.' '.$overlay)?>" <?php echo esc_attr($parallax_background);?> style="<?php echo esc_attr($header_background.' '.$margin_bottom.' '.$padding_top.' '.$padding_bottom); ?> "  role="banner">
    
    <?php if (function_exists('rwmb_meta')) : 
        if (rwmb_meta('materialize_background_overlay') == 'bg_overlay_enable') : ?>
            <div class="title-overlay-color"></div>
        <?php endif;
    endif; ?>

    <?php if (materialize_option('blog-title-overlay') && ! is_page() && !is_singular('tt-portfolio') && !is_singular('tt-joblist') && !is_singular('tt-member') && !is_singular('tt-service')): ?>
        <div class="title-overlay-color"></div>
    <?php endif ?>

    <div class="container">
        <h2 style="<?php echo esc_attr($content_color); ?>"><?php echo esc_html( materialize_page_header_section_title() ); ?></h2>
		<?php
			if (function_exists('rwmb_meta') and rwmb_meta('materialize_page_subtitle')) : ?>
				<span style="<?php echo esc_attr($content_color); ?>"><?php echo esc_html(rwmb_meta('materialize_page_subtitle'));?></span>
			<?php endif;
		?>

		<?php if(function_exists('rwmb_meta') and empty($breadcrumb) || $breadcrumb == 'page_breadcrumb_show') : ?>
            <div class="tt-breadcrumb" style="<?php echo esc_attr($content_color); ?>">
                <?php materialize_breadcrumbs(); ?>
            </div>
		<?php endif; ?>
    </div><!-- .container -->
</section> <!-- page-title -->