<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

$tt_icon_block_attr = array();

// VC Custom shortcode dir
if (! function_exists('materialize_shortcodes_template_dir')) {
	function materialize_shortcodes_template_dir(){
		vc_set_shortcodes_templates_dir( get_template_directory() . '/visual-composer/shortcodes' );
	}
	materialize_shortcodes_template_dir();
}

// VC Admin element stylesheet
if ( ! function_exists( 'materialize_vc_admin_styles' ) ) :
	function materialize_vc_admin_styles() {
		wp_enqueue_style( 'materialize_vc_admin_style', get_template_directory_uri() . '/visual-composer/assets/css/vc-element-style.css', array(), time(), 'all' );
	}
	add_action( 'admin_enqueue_scripts', 'materialize_vc_admin_styles' );
endif;

// Remove vc default template
if ( ! function_exists( 'materialize_remove_default_templates' ) ) :
	function materialize_remove_default_templates( $data ) {
		return array(); 
	}
	add_filter( 'vc_load_default_templates', 'materialize_remove_default_templates' );
endif;

// set default editor post type
$posttype_list = array(
    'page',
    'tt-service'
);
vc_set_default_editor_post_types( $posttype_list );

// include custom template
require get_template_directory() . "/visual-composer/templates/home-default.php";
require get_template_directory() . "/visual-composer/templates/home-corporate.php";
require get_template_directory() . "/visual-composer/templates/home-creative.php";
require get_template_directory() . "/visual-composer/templates/home-app-landing.php";
require get_template_directory() . "/visual-composer/templates/home-portfolio.php";
require get_template_directory() . "/visual-composer/templates/home-portfolio-wide.php";
require get_template_directory() . "/visual-composer/templates/home-parallax.php";
require get_template_directory() . "/visual-composer/templates/onepage-default.php";
require get_template_directory() . "/visual-composer/templates/onepage-app-landing.php";

// include vc extend file
require get_template_directory() . "/visual-composer/vc_extend/tt-countdown.php";
require get_template_directory() . "/visual-composer/vc_extend/tt-icon-block.php";
require get_template_directory() . "/visual-composer/vc_extend/tt-intro-block.php";
require get_template_directory() . "/visual-composer/vc_extend/tt-hero-block.php";
require get_template_directory() . "/visual-composer/vc_extend/tt-home-slider.php";
require get_template_directory() . "/visual-composer/vc_extend/tt-gallery.php";
require get_template_directory() . "/visual-composer/vc_extend/tt-section-title.php";
require get_template_directory() . "/visual-composer/vc_extend/tt-testimonial.php";
require get_template_directory() . "/visual-composer/vc_extend/tt-count-up.php";
require get_template_directory() . "/visual-composer/vc_extend/tt-portfolio.php";
require get_template_directory() . "/visual-composer/vc_extend/tt-portfolio-loadmore.php";
require get_template_directory() . "/visual-composer/vc_extend/tt-workprocess.php";
require get_template_directory() . "/visual-composer/vc_extend/tt-process.php";
require get_template_directory() . "/visual-composer/vc_extend/tt-pricing.php";
require get_template_directory() . "/visual-composer/vc_extend/tt-carousel.php";
require get_template_directory() . "/visual-composer/vc_extend/tt-services.php";
require get_template_directory() . "/visual-composer/vc_extend/tt-job-list.php";
require get_template_directory() . "/visual-composer/vc_extend/tt-device-carousel.php";
require get_template_directory() . "/visual-composer/vc_extend/tt-member.php";
require get_template_directory() . "/visual-composer/vc_extend/tt-member-tab.php";
require get_template_directory() . "/visual-composer/vc_extend/tt-latest-posts.php";
require get_template_directory() . "/visual-composer/vc_extend/tt-latest-posts-default.php";
require get_template_directory() . "/visual-composer/vc_extend/tt-latest-posts-list.php";
require get_template_directory() . "/visual-composer/vc_extend/tt-featured-post.php";
require get_template_directory() . "/visual-composer/vc_extend/tt-partners.php";
require get_template_directory() . "/visual-composer/vc_extend/tt-newsletter.php";
require get_template_directory() . "/visual-composer/vc_extend/tt-google-map.php";
require get_template_directory() . "/visual-composer/vc_extend/tt-popup.php";
require get_template_directory() . "/visual-composer/vc_extend/tt-work-carousel.php";
require get_template_directory() . "/visual-composer/vc_extend/tt-content-carousel.php";
require get_template_directory() . "/visual-composer/vc_extend/tt-call-to-action.php";
require get_template_directory() . "/visual-composer/vc_extend/tt-case-study-block.php";
require get_template_directory() . "/visual-composer/vc_extend/tt-icon-content-box.php";
require get_template_directory() . "/visual-composer/vc_extend/tt-foodmenu.php";
require get_template_directory() . '/visual-composer/vc_extend/tt-address-info.php';
require get_template_directory() . '/visual-composer/vc_extend/tt-author-info.php';

function materialize_portfolio_category_addons(){
	require get_template_directory() . '/visual-composer/vc_extend/tt-portfolio-category.php';
}
add_action('init', 'materialize_portfolio_category_addons', 99999);


if (class_exists('WooCommerce')) :
	require get_template_directory() . '/visual-composer/vc_extend/tt-shop-category-list.php';
	require get_template_directory() . '/visual-composer/vc_extend/tt-shop-banner.php';
endif;

// include custom param
require get_template_directory() . "/visual-composer/params/vc_custom_params.php";

// include others file
require get_template_directory() . "/visual-composer/inc/flaticon-array-list.php";

// register flat icon type
if (!function_exists('vc_iconpicker_editor_flaticon_jscss')) :
	function vc_iconpicker_editor_flaticon_jscss() {
        wp_enqueue_style( 'flaticon' );
    }
	add_action( 'vc_backend_editor_enqueue_js_css', 'vc_iconpicker_editor_flaticon_jscss' );
    add_action( 'vc_frontend_editor_enqueue_js_css', 'vc_iconpicker_editor_flaticon_jscss' );
endif;

// vc_iconpicker_type_flaticon
if (!function_exists('vc_iconpicker_type_flaticon')) :
	function vc_iconpicker_type_flaticon( $icons ) {
        $materialize_flaticon_array = array(
			array('flaticon-communication'=>'communication'),
			array('flaticon-draw'=>'draw'),
			array('flaticon-arrows'=>'arrows'),
			array('flaticon-can'=>'can'),
			array('flaticon-book'=>'book'),
			array('flaticon-technology-2'=>'technology-2'),
			array('flaticon-lock'=>'lock'),
			array('flaticon-technology-1'=>'technology-1'),
			array('flaticon-technology'=>'technology'),
			array('flaticon-exit'=>'exit'),
			array('flaticon-multimedia'=>'multimedia'),
			array('flaticon-cogwheel-1'=>'cogwheel-1'),
			array('flaticon-folder-4'=>'folder-4'),
			array('flaticon-shapes-2'=>'shapes-2'),
			array('flaticon-link'=>'link'),
			array('flaticon-interface-7'=>'interface-7'),
			array('flaticon-shapes-1'=>'shapes-1'),
			array('flaticon-multimedia-12'=>'multimedia-12'),
			array('flaticon-technology-17'=>'technology-17'),
			array('flaticon-business-2'=>'business-2'),
			array('flaticon-multimedia-11'=>'multimedia-11'),
			array('flaticon-can-1'=>'can-1'),
			array('flaticon-signs-3'=>'signs-3'),
			array('flaticon-web'=>'web'),
			array('flaticon-multimedia-10'=>'multimedia-10'),
			array('flaticon-multimedia-9'=>'multimedia-9'),
			array('flaticon-interface-6'=>'interface-6'),
			array('flaticon-profile-1'=>'profile-1'),
			array('flaticon-technology-16'=>'technology-16'),
			array('flaticon-multimedia-8'=>'multimedia-8'),
			array('flaticon-lock-2'=>'lock-2'),
			array('flaticon-signs-2'=>'signs-2'),
			array('flaticon-location-1'=>'location-1'),
			array('flaticon-arrows-7'=>'arrows-7'),
			array('flaticon-technology-15'=>'technology-15'),
			array('flaticon-business-1'=>'business-1'),
			array('flaticon-play'=>'play'),
			array('flaticon-internet-2'=>'internet-2'),
			array('flaticon-weather'=>'weather'),
			array('flaticon-arrow-2'=>'arrow-2'),
			array('flaticon-direction'=>'direction'),
			array('flaticon-multimedia-7'=>'multimedia-7'),
			array('flaticon-power'=>'power'),
			array('flaticon-chain'=>'chain'),
			array('flaticon-profile'=>'profile'),
			array('flaticon-symbol-1'=>'symbol-1'),
			array('flaticon-technology-14'=>'technology-14'),
			array('flaticon-signs-1'=>'signs-1'),
			array('flaticon-technology-13'=>'technology-13'),
			array('flaticon-technology-12'=>'technology-12'),
			array('flaticon-check'=>'check'),
			array('flaticon-arrow-1'=>'arrow-1'),
			array('flaticon-attachment'=>'attachment'),
			array('flaticon-mark'=>'mark'),
			array('flaticon-technology-11'=>'technology-11'),
			array('flaticon-arrows-6'=>'arrows-6'),
			array('flaticon-message'=>'message'),
			array('flaticon-lock-1'=>'lock-1'),
			array('flaticon-communication-2'=>'communication-2'),
			array('flaticon-cogwheel'=>'cogwheel'),
			array('flaticon-clock-4'=>'clock-4'),
			array('flaticon-arrows-5'=>'arrows-5'),
			array('flaticon-arrows-4'=>'arrows-4'),
			array('flaticon-upload'=>'upload'),
			array('flaticon-multimedia-6'=>'multimedia-6'),
			array('flaticon-commerce'=>'commerce'),
			array('flaticon-technology-10'=>'technology-10'),
			array('flaticon-technology-9'=>'technology-9'),
			array('flaticon-layers-1'=>'layers-1'),
			array('flaticon-technology-8'=>'technology-8'),
			array('flaticon-target'=>'target'),
			array('flaticon-megaphone-1'=>'megaphone-1'),
			array('flaticon-hands'=>'hands'),
			array('flaticon-tool'=>'tool'),
			array('flaticon-folder-3'=>'folder-3'),
			array('flaticon-favorite-1'=>'favorite-1'),
			array('flaticon-interface-5'=>'interface-5'),
			array('flaticon-layers'=>'layers'),
			array('flaticon-multimedia-5'=>'multimedia-5'),
			array('flaticon-interface-4'=>'interface-4'),
			array('flaticon-arrows-3'=>'arrows-3'),
			array('flaticon-global'=>'global'),
			array('flaticon-arrows-2'=>'arrows-2'),
			array('flaticon-arrow'=>'arrow'),
			array('flaticon-vision'=>'vision'),
			array('flaticon-gestures'=>'gestures'),
			array('flaticon-photo'=>'photo'),
			array('flaticon-symbol'=>'symbol'),
			array('flaticon-business'=>'business'),
			array('flaticon-technology-7'=>'technology-7'),
			array('flaticon-music-1'=>'music-1'),
			array('flaticon-clock-3'=>'clock-3'),
			array('flaticon-interface-3'=>'interface-3'),
			array('flaticon-time-4'=>'time-4'),
			array('flaticon-multimedia-4'=>'multimedia-4'),
			array('flaticon-multimedia-3'=>'multimedia-3'),
			array('flaticon-favorite'=>'favorite'),
			array('flaticon-folder-2'=>'folder-2'),
			array('flaticon-time-3'=>'time-3'),
			array('flaticon-luxury'=>'luxury'),
			array('flaticon-interface-2'=>'interface-2'),
			array('flaticon-computer'=>'computer'),
			array('flaticon-clock-2'=>'clock-2'),
			array('flaticon-time-2'=>'time-2'),
			array('flaticon-agenda'=>'agenda'),
			array('flaticon-multimedia-2'=>'multimedia-2'),
			array('flaticon-technology-6'=>'technology-6'),
			array('flaticon-bars'=>'bars'),
			array('flaticon-draw-1'=>'draw-1'),
			array('flaticon-arrows-1'=>'arrows-1'),
			array('flaticon-technology-5'=>'technology-5'),
			array('flaticon-interface-1'=>'interface-1'),
			array('flaticon-clock-1'=>'clock-1'),
			array('flaticon-interface'=>'interface'),
			array('flaticon-location'=>'location'),
			array('flaticon-buildings'=>'buildings'),
			array('flaticon-folder-1'=>'folder-1'),
			array('flaticon-round'=>'round'),
			array('flaticon-search-1'=>'search-1'),
			array('flaticon-technology-4'=>'technology-4'),
			array('flaticon-gps-1'=>'gps-1'),
			array('flaticon-gps'=>'gps'),
			array('flaticon-multimedia-1'=>'multimedia-1'),
			array('flaticon-technology-3'=>'technology-3'),
			array('flaticon-music'=>'music'),
			array('flaticon-suitcase'=>'suitcase'),
			array('flaticon-internet-1'=>'internet-1'),
			array('flaticon-medical'=>'medical'),
			array('flaticon-signs'=>'signs'),
			array('flaticon-communication-1'=>'communication-1'),
			array('flaticon-time-1'=>'time-1'),
			array('flaticon-shapes'=>'shapes'),
			array('flaticon-like-1'=>'like-1'),
			array('flaticon-shopping-cart'=>'shopping-cart'),
			array('flaticon-idea'=>'idea'),
			array('flaticon-user-3'=>'user-3'),
			array('flaticon-home'=>'home'),
			array('flaticon-time'=>'time'),
			array('flaticon-success'=>'success'),
			array('flaticon-like'=>'like'),
			array('flaticon-search'=>'search'),
			array('flaticon-photo-camera'=>'photo-camera'),
			array('flaticon-clock'=>'clock'),
			array('flaticon-settings-2'=>'settings-2'),
			array('flaticon-user-2'=>'user-2'),
			array('flaticon-settings-1'=>'settings-1'),
			array('flaticon-smartphone'=>'smartphone'),
			array('flaticon-avatar'=>'avatar'),
			array('flaticon-next'=>'next'),
			array('flaticon-network'=>'network'),
			array('flaticon-placeholder-2'=>'placeholder-2'),
			array('flaticon-play-button'=>'play-button'),
			array('flaticon-magnifying-glass'=>'magnifying-glass'),
			array('flaticon-back'=>'back'),
			array('flaticon-internet'=>'internet'),
			array('flaticon-placeholder-1'=>'placeholder-1'),
			array('flaticon-envelope'=>'envelope'),
			array('flaticon-phone-call'=>'phone-call'),
			array('flaticon-market-1'=>'market-1'),
			array('flaticon-market'=>'market'),
			array('flaticon-coins'=>'coins'),
			array('flaticon-money'=>'money'),
			array('flaticon-graphic'=>'graphic'),
			array('flaticon-food-7'=>'food-7'),
			array('flaticon-up-arrow'=>'up-arrow'),
			array('flaticon-food-6'=>'food-6'),
			array('flaticon-pie-chart'=>'pie-chart'),
			array('flaticon-open'=>'open'),
			array('flaticon-rewind-time'=>'rewind-time'),
			array('flaticon-graph-1'=>'graph-1'),
			array('flaticon-time-passing'=>'time-passing'),
			array('flaticon-megaphone'=>'megaphone'),
			array('flaticon-price-tag-1'=>'price-tag-1'),
			array('flaticon-price-tag'=>'price-tag'),
			array('flaticon-time-is-money'=>'time-is-money'),
			array('flaticon-diagram'=>'diagram'),
			array('flaticon-cart'=>'cart'),
			array('flaticon-graph'=>'graph'),
			array('flaticon-presentation'=>'presentation'),
			array('flaticon-receipt'=>'receipt'),
			array('flaticon-get-money'=>'get-money'),
			array('flaticon-store'=>'store'),
			array('flaticon-stumbleupon'=>'stumbleupon'),
			array('flaticon-dribbble'=>'dribbble'),
			array('flaticon-flickr'=>'flickr'),
			array('flaticon-pinterest'=>'pinterest'),
			array('flaticon-apple'=>'apple'),
			array('flaticon-android'=>'android'),
			array('flaticon-google-chrome'=>'google-chrome'),
			array('flaticon-amazon'=>'amazon'),
			array('flaticon-blogger'=>'blogger'),
			array('flaticon-soundcloud'=>'soundcloud'),
			array('flaticon-behance'=>'behance'),
			array('flaticon-internet-connection'=>'internet-connection'),
			array('flaticon-vimeo'=>'vimeo'),
			array('flaticon-data-storage'=>'data-storage'),
			array('flaticon-tumblr'=>'tumblr'),
			array('flaticon-placeholder'=>'placeholder'),
			array('flaticon-dropbox'=>'dropbox'),
			array('flaticon-folder'=>'folder'),
			array('flaticon-email'=>'email'),
			array('flaticon-skype'=>'skype'),
			array('flaticon-google-plus'=>'google-plus'),
			array('flaticon-settings'=>'settings'),
			array('flaticon-database'=>'database'),
			array('flaticon-linkedin'=>'linkedin'),
			array('flaticon-youtube'=>'youtube'),
			array('flaticon-instagram'=>'instagram'),
			array('flaticon-user-1'=>'user-1'),
			array('flaticon-user'=>'user'),
			array('flaticon-twitter'=>'twitter'),
			array('flaticon-cursor'=>'cursor'),
			array('flaticon-facebook'=>'facebook'),
			array('flaticon-whatsapp'=>'whatsapp'),
			array('flaticon-tap'=>'tap'),
			array('flaticon-food-5'=>'food-5'),
			array('flaticon-food-4'=>'food-4'),
			array('flaticon-food-3'=>'food-3'),
			array('flaticon-food-2'=>'food-2'),
			array('flaticon-food-1'=>'food-1'),
			array('flaticon-drink-3'=>'drink-3'),
			array('flaticon-drink-2'=>'drink-2'),
			array('flaticon-food'=>'food'),
			array('flaticon-fruit'=>'fruit'),
			array('flaticon-drink-1'=>'drink-1'),
			array('flaticon-animals'=>'animals'),
			array('flaticon-smoking-barbecue'=>'smoking-barbecue'),
			array('flaticon-cutlery'=>'cutlery'),
			array('flaticon-nachos-and-dish'=>'nachos-and-dish'),
			array('flaticon-meat-pie'=>'meat-pie'),
			array('flaticon-strawberry'=>'strawberry'),
			array('flaticon-garlic'=>'garlic'),
			array('flaticon-pepper'=>'pepper'),
			array('flaticon-chicken-leg'=>'chicken-leg'),
			array('flaticon-hot-pepper-outline'=>'hot-pepper-outline'),
			array('flaticon-coffee-beans'=>'coffee-beans'),
			array('flaticon-hot-cup-of-tea'=>'hot-cup-of-tea'),
			array('flaticon-broccoli-outline'=>'broccoli-outline'),
			array('flaticon-soft-drink-with-straw'=>'soft-drink-with-straw'),
			array('flaticon-muffin'=>'muffin'),
			array('flaticon-bell-covering-hot-dish'=>'bell-covering-hot-dish'),
			array('flaticon-piece-of-cheese'=>'piece-of-cheese'),
			array('flaticon-knife-fork-and-plate'=>'knife-fork-and-plate'),
			array('flaticon-crossed-knife-and-fork'=>'crossed-knife-and-fork'),
			array('flaticon-drink'=>'drink'),
			array('flaticon-drink-glass-outline-with-lemon-slice-and-straw'=>'drink-glass-outline-with-lemon-slice-and-straw'),
			array('flaticon-coffee-beans-outline'=>'coffee-beans-outline'),
			array('flaticon-fresh-soda-glass-with-lemon-slice-and-straw'=>'fresh-soda-glass-with-lemon-slice-and-straw'),
			array('flaticon-wine-glass-full-of-drink'=>'wine-glass-full-of-drink'),
			array('flaticon-drink-set-outline-of-glass-with-a-straw'=>'drink-set-outline-of-glass-with-a-straw'),
			array('flaticon-coffee-cup-outline'=>'coffee-cup-outline'),
			array('flaticon-hot-coffee-rounded-cup-on-a-plate-from-side-view'=>'hot-coffee-rounded-cup-on-a-plate-from-side-view'),
			array('flaticon-cocktail-glass-with-lemon-slice'=>'cocktail-glass-with-lemon-slice'),
			array('flaticon-coffee-seeds'=>'coffee-seeds'),
			array('flaticon-cocktail'=>'cocktail')
		);

        return array_merge( $icons, $materialize_flaticon_array );
    }
    add_filter( 'vc_iconpicker-type-flaticon', 'vc_iconpicker_type_flaticon' );
endif;

// vc_iconpicker_base_register_flaticon_css
if (!function_exists('vc_iconpicker_base_register_flaticon_css')) :
	function vc_iconpicker_base_register_flaticon_css(){
        wp_register_style( 'flaticon', get_template_directory_uri() . '/fonts/flaticon/flaticon.css', false, WPB_VC_VERSION, 'screen' );
    }
    add_action( 'vc_base_register_front_css', 'vc_iconpicker_base_register_flaticon_css' );
    add_action( 'vc_base_register_admin_css', 'vc_iconpicker_base_register_flaticon_css' );
endif;

// post cateogry lists for narrow data by slug
function materialize_portfolio_category_slug(){
	$categories = get_terms(array('hide_empty' => false, 'taxonomy' => 'tt-portfolio-cat'));
	
	if ( ! empty( $categories ) && ! is_wp_error( $categories ) ){
	    $lists = array();
			foreach($categories as $category) {
				$lists[] = array(
					'value' => $category->slug,
		            'label' => $category->name,
				);
			}
		return $lists;
	}
}