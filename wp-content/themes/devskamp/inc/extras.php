<?php

if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Adds custom classes to the array of body classes.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'materialize_body_classes' ) ) :

	function materialize_body_classes( $classes ) {
		
		// header style classes
		if (function_exists('rwmb_meta')) :
			$page_header = rwmb_meta('materialize_header_style');
			if ($page_header == 'header-default') :
				$classes[] = 'header-default';
			elseif ($page_header == 'header-dark') :
				$classes[] = 'header-dark';
            elseif ($page_header == 'header-brand-color') :
            	$classes[] = 'header-brand-color';
            elseif ($page_header == 'header-transparent') :
            	$classes[] = 'header-transparent';
            elseif ($page_header == 'header-semi-transparent') :
            	$classes[] = 'header-semi-transparent';
            elseif ($page_header == 'header-center-menu') :
            	$classes[] = 'header-center-menu';
            elseif ($page_header == 'header-bottom-menu') :
            	$classes[] = 'header-bottom-menu';
            elseif ($page_header == 'header-floating-menu') :
            	$classes[] = 'header-floating-menu';
            elseif ($page_header == 'header-onepage-menu') :
            	$classes[] = 'header-onepage-menu';
            elseif ($page_header == 'header-shop') :
            	$classes[] = 'header-shop';
			else :
				$classes[] = materialize_option('header-style', false, 'header-default');
			endif;
		endif;

		if (function_exists('rwmb_meta')) :
			$header_page_topbar = rwmb_meta('materialize_header_topbar');
			$header_option = materialize_option('header-top-visibility', false, false);

			if ($header_page_topbar == 'header-topbar-show' || $header_page_topbar == 'inherit-theme-option' && $header_option == true) :
				$classes[] = 'has-header-topbar';
			endif;
		endif;

		if (materialize_option('search-visibility', false, true)) :
			$classes[] = 'has-header-search';
		endif;

		// footer style classes
		if (function_exists('rwmb_meta')) :
			$page_footer = rwmb_meta('materialize_footer_style');
			if ($page_footer == 'footer-default') :
				$classes[] = 'footer-default';
			elseif ($page_footer == 'footer-two') :
				$classes[] = 'footer-two';
			elseif ($page_footer == 'footer-three') :
				$classes[] = 'footer-three';
			elseif ($page_footer == 'footer-four') :
				$classes[] = 'footer-four';
			else :
				$classes[] = materialize_option('footer-style', false, 'footer-default');
			endif;
		endif;
		
		// menu hover
		$hover_style = materialize_option('menu-hover-style');
		if ($hover_style == 2) :
			$classes[] = 'hover-border-bottom';
		elseif($hover_style == 3) : 
			$classes[] = 'hover-box';
		elseif($hover_style == 4) : 
			$classes[] = 'hover-border-box';
		endif;

		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) :
			$classes[ ] = 'group-blog';
		endif;

		// logo class
		if (materialize_option('logo', 'url') || function_exists('rwmb_meta') && rwmb_meta('materialize_page_logo', 'type=image_advanced')) {
			$classes[] = 'has-site-logo';
		}
		if (materialize_option('mobile-logo', 'url') || function_exists('rwmb_meta') && rwmb_meta('materialize_page_mobile_logo', 'type=image_advanced')) {
			$classes[] = 'has-mobile-logo';
		}
		if (materialize_option('sticky-logo', 'url') || function_exists('rwmb_meta') && rwmb_meta('materialize_page_sticky_logo', 'type=image_advanced')) {
			$classes[] = 'has-sticky-logo';
		}
		if (materialize_option('sticky-mobile-logo', 'url') || function_exists('rwmb_meta') && rwmb_meta('materialize_page_mobile_sticky_logo', 'type=image_advanced')) {
			$classes[] = 'has-sticky-mobile-logo';
		}

		// page header section class
		if (function_exists('rwmb_meta')) :
			$header_page_settings = rwmb_meta('materialize_page_header_visibility');
			if ($header_page_settings == 'header-section-show') :
				$classes[] = 'header-section-show';
			elseif($header_page_settings == 'header-section-hide'):
				$classes[] = 'header-section-hide';
			else :
				$classes[] = materialize_option('page-header-visibility', false, true);
			endif;
		endif;

		return $classes;
	}
	add_filter( 'body_class', 'materialize_body_classes' );

endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'materialize_page_menu_args' ) ) :

	function materialize_page_menu_args( $args ) {

		$args[ 'show_home' ] = TRUE;

		return $args;
	}

	add_filter( 'wp_page_menu_args', 'materialize_page_menu_args' );

endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Sets the authordata global when viewing an author archive.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'materialize_setup_author' ) ) :
	function materialize_setup_author() {
		global $wp_query;

		if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
			$GLOBALS[ 'authordata' ] = get_userdata( $wp_query->post->post_author );
		}
	}

	add_action( 'wp', 'materialize_setup_author' );

endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Page break button in editor
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'materialize_wp_page_pagination' ) ) :

	function materialize_wp_page_pagination( $mce_buttons ) {
		if ( get_post_type() == 'post' or get_post_type() == 'page' ) {
			$pos = array_search( 'wp_more', $mce_buttons, TRUE );
			if ( $pos !== FALSE ) {
				$buttons     = array_slice( $mce_buttons, 0, $pos + 1 );
				$buttons[ ]  = 'wp_page';
				$mce_buttons = array_merge( $buttons, array_slice( $mce_buttons, $pos + 1 ) );
			}
		}

		return $mce_buttons;
	}

	add_filter( 'mce_buttons', 'materialize_wp_page_pagination' );

endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Extend user contact
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (!function_exists('materialize_extend_user_contact')) :
    function materialize_extend_user_contact( $materialize_user_contact) {
        
        $materialize_user_contact['facebook_profile'] = esc_html__('Facebook Profile URL', 'materialize');
        $materialize_user_contact['twitter_profile'] = esc_html__('Twitter Profile URL', 'materialize');
        $materialize_user_contact['google_profile'] = esc_html__('Google Profile URL', 'materialize');
        $materialize_user_contact['linkedin_profile'] = esc_html__('Linkedin Profile URL', 'materialize');
        $materialize_user_contact['instagram_profile'] = esc_html__('Instagram Profile URL', 'materialize');
        
        return $materialize_user_contact;
    }

    add_filter( 'user_contactmethods', 'materialize_extend_user_contact');

endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Set post view on single page
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'materialize_put_post_view_function' ) ) :

    function materialize_put_post_view_function( $contents ) {
        if ( function_exists( 'materialize_set_post_views' ) and is_single() ) {
            materialize_set_post_views(get_the_ID());
        }

        return $contents;
    }

    add_filter( 'the_content', 'materialize_put_post_view_function', 9999 );

endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Get site url by replacing 'http://site_url/' for one page menu
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'materialize_get_site_url' ) ) :

	function materialize_get_site_url($output) {

		global $post;
		$front_id = get_option('page_on_front');
		
		if(is_object($post)) :
			$output = str_replace( 'http://site_url/', get_permalink($front_id), $output);	
			$output = str_replace( get_permalink($post->ID).'#', '#', $output );
		else :
			$output = str_replace( 'http://site_url/', get_permalink($front_id), $output);
		endif;

	    return $output;
	}
	add_filter( 'walker_nav_menu_start_el', 'materialize_get_site_url', 10, 4);
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Redux News Flash Remove 
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! class_exists( 'reduxNewsflash' ) ):
	class reduxNewsflash {
		public function __construct( $parent, $params ) {

		}
	}
endif;

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Redux Ads Remove
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

add_filter( 'redux/' . 'materialize_theme_option' . '/aURL_filter', '__return_empty_string' );



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Product per row
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'materialize_product_per_row' ) ) :
	function materialize_product_per_row() {
		$product_per_row = 3;

		if (materialize_option('product-column')) :
			return materialize_option('product-column', false, true); // products per row
		else :
			return $product_per_row;
		endif;
	}
	add_filter('loop_shop_columns', 'materialize_product_per_row');
endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Product per page
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (!function_exists('materialize_shop_per_page')) :
	function materialize_shop_per_page(){
		$product_per_page = 6;

		if (materialize_option('product-per-page')) :
			return materialize_option('product-per-page', false, true); // products per page
		else :
			return $product_per_page;
		endif;
	}
	add_filter( 'loop_shop_per_page', 'materialize_shop_per_page');
endif;