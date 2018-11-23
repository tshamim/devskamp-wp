<?php 

if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// MATERIALIZE FUNCTIONS AND DEFINITIONS
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

    if ( ! defined( 'MATERIALIZE_THEME_NAME' ) ) {
        define( 'MATERIALIZE_THEME_NAME', wp_get_theme()->get( 'Name' ) );
    }
    

    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // admin-init, metabox, bootstrap-navwalker, jetpack
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

	require get_template_directory() . "/admin/admin-init.php";
	require get_template_directory() . "/inc/metabox.php";
	require get_template_directory() . "/inc/tt-navwalker.php";
    require get_template_directory() . "/inc/tt-mobile-navwalker.php";
    require get_template_directory() . "/inc/portfolio-loadmore.php";
    if (!is_user_logged_in()) {
        require get_template_directory() . "/inc/login-register.php";
    }


    if (class_exists('Vc_Manager')) {
        require get_template_directory() . "/visual-composer/visual-composer.php";
    }


if (!function_exists('materialize_theme_setup')) :

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Sets up theme defaults and registers support for various WordPress features.
// Note that this function is hooked into the after_setup_theme hook, which
// runs before the init hook. The init hook is too late for some features, such
// as indicating support for post thumbnails.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

    function materialize_theme_setup(){
       
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // Make theme available for translation.
        // Translations can be filed in the /languages/ directory.
        // If you're building a theme based on materialize, use a find and replace
        // to change 'materialize' to the name of your theme in all the template files
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        load_theme_textdomain('materialize', get_template_directory() . '/languages');
        

        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // Add default posts and comments RSS feed links to head.
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        add_theme_support('automatic-feed-links');


        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // Supporting title tag
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        add_theme_support('title-tag');


        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // WooCommerce support
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        add_theme_support('woocommerce');


        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // Enable support for Post Thumbnails on posts and pages.
        // See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-          
        add_theme_support('post-thumbnails');


        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // default post thumbnail size
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        set_post_thumbnail_size(1140);
        
        add_image_size('materialize-blog-thumbnail', 750, 350, TRUE);
        add_image_size('materialize-blog-grid-thumbnail', 326, 290, TRUE);
        add_image_size('materialize-latest-post-thumb', 360, 250, TRUE);
        add_image_size('materialize-list-post-thumb', 178, 228, TRUE);
        add_image_size('materialize-portfolio-thumb', 800, 600, TRUE);
        add_image_size('materialize-portfolio-masonry', 800, 9999, TRUE);
        add_image_size('materialize-single-portfolio-thumbnail', 1140, 640, TRUE);
        add_image_size('materialize-gallery-thumbnail', 1140, 550, TRUE);
        add_image_size('materialize-gallery-thumb', 185, 125, TRUE);
        add_image_size('materialize-device-thumbnail', 710, 530, TRUE);
        add_image_size('materialize-popular-post-thumb', 50, 50, true);
        add_image_size('materialize-member', 270, 270, array('center','top'));
        add_image_size('materialize-members', 370, 480, array('center','top'));
        add_image_size('materialize-style-two-member', 358, 291, array('center','top'));


        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // This theme uses wp_nav_menu() in one locations.
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        register_nav_menus(array(
           'primary' => esc_html__('Primary Menu', 'materialize'),
           'footer'  => esc_html__('Footer Menu', 'materialize')
        ) );


        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // Switch default core markup for search form, comment form, and comments
        // to output valid HTML5.
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ));


        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // Enable support for Post Formats.
        // See: https://codex.wordpress.org/Post_Formats
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-          
        add_theme_support('post-formats', array('aside', 'status', 'image', 'audio', 'video', 'gallery', 'quote', 'link', 'chat' ));


        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // Support editor style
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

        add_editor_style( array( 'css/editor-style.css', 'css/font-awesome.min.css'));

    }

    add_action('after_setup_theme', 'materialize_theme_setup');

endif; // materialize_theme_setup


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Set the content width in pixels, based on the theme's design and stylesheet.
// Priority 0 to make it available to lower priority callbacks.
// @global int $content_width
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (!function_exists('materialize_content_width')) :
    function materialize_content_width() {
        $GLOBALS['content_width'] = apply_filters( 'materialize_content_width', 1140 );
    }
    add_action( 'after_setup_theme', 'materialize_content_width', 0 );
endif;
    

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Register widget area.
// @link https://codex.wordpress.org/Function_Reference/register_sidebar
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (!function_exists('materialize_widgets_init')) :

    function materialize_widgets_init() {

    	do_action('materialize_before_register_sidebar');

        register_sidebar( apply_filters( 'materialize_blog_sidebar', array(
            'name'          => esc_html__('Blog Sidebar', 'materialize'),
            'id'            => 'materialize-blog-sidebar',
            'description'   => esc_html__('Appears in the blog sidebar.', 'materialize'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )));

        register_sidebar( apply_filters( 'materialize_page_sidebar', array(
            'name'          => esc_html__('Page Sidebar Area', 'materialize'),
            'id'            => 'materialize-page-sidebar',
            'description'   => esc_html__('Appears in the Page sidebar.', 'materialize'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )));

        if (class_exists('WooCommerce')) {
            register_sidebar( apply_filters( 'materialize_shop_sidebar', array(
                'name'          => esc_html__('Shop Sidebar Area', 'materialize'),
                'id'            => 'materialize-shop-sidebar',
                'description'   => esc_html__('Appears in the shop sidebar sidebar.', 'materialize'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            )));
        }

        register_sidebar( apply_filters( 'materialize_footer_sidebar', array(
            'name'          => esc_html__('Footer Sidebar Four Column', 'materialize'),
            'id'            => 'materialize-footer-sidebar',
            'description'   => esc_html__('Appears in the footer', 'materialize'),
            'before_widget' => '<div id="%1$s" class="col-md-3 col-sm-6 widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )));

        register_sidebar( apply_filters( 'materialize_footer_three_column', array(
            'name'          => esc_html__('Footer Sidebar Three Column', 'materialize'),
            'id'            => 'materialize-footer-three-column',
            'description'   => esc_html__('Appears in the footer three column (N.B: You have to select footer style four from theme options)', 'materialize'),
            'before_widget' => '<div id="%1$s" class="col-md-4 col-sm-4 widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )));

        do_action('materialize_after_register_sidebar');
    }

    add_action('widgets_init', 'materialize_widgets_init');
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Load Google Font If Redux framework is not activated.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'materialize_fonts_url' ) ):
    function materialize_fonts_url() {
        $font_url = '';
        if ( 'off' !== esc_html_x( 'on', 'Google font: on or off', 'materialize' ) ) :
            $font_url = add_query_arg(
                array(
                    'family' => urlencode( 'Open Sans:300,400,600,700,800,900|Roboto Slab:400,700' ),
                    'subset' => 'latin',
                ), "//fonts.googleapis.com/css" );
        endif;
        return apply_filters( 'materialize_google_font_url', esc_url( $font_url ) );
    }
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Enqueue scripts and styles.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (!function_exists('materialize_scripts')) :
    
    function materialize_scripts() {

        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // Styles
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        if ( ! materialize_option( 'body-typography', 'font-family' ) ) :
            wp_enqueue_style('google-font', materialize_fonts_url(), array(), NULL);
        endif;
        wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.6.3');
        wp_enqueue_style('flaticon', get_template_directory_uri() . '/fonts/flaticon/flaticon.css', array(), NULL);
        wp_enqueue_style('iconfont', get_template_directory_uri() . '/fonts/iconfont/material-icons.css', array(), NULL);
        wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7');
        wp_enqueue_style('materialize', get_template_directory_uri() . '/css/materialize.min.css', array(), NULL);
        wp_enqueue_style('swiper', get_template_directory_uri() . '/css/swiper.min.css', array(), NULL);
        wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css', array(), NULL);
        wp_enqueue_style('owl-theme', get_template_directory_uri() . '/css/owl.theme.css', array(), NULL);
        wp_enqueue_style('flexslider', get_template_directory_uri() . '/css/flexslider.css', array(), NULL);
        wp_enqueue_style('superslides', get_template_directory_uri() . '/css/superslides.css', array(), NULL);
        wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.css', array(), NULL);
        wp_enqueue_style('textrotator', get_template_directory_uri() . '/css/simpletextrotator.css', array(), NULL);
        wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/css/magnific-popup.css', array(), NULL);
        wp_enqueue_style('stylesheet', get_stylesheet_uri());
        wp_enqueue_style('materialize-shortcodes', get_template_directory_uri() . '/css/shortcodes.css', array(), NULL);
        wp_enqueue_style('materialize-responsive-css', get_template_directory_uri() . '/css/responsive.css', array(), NULL);
        

        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // scripts
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.7', TRUE);
        wp_enqueue_script('materialize', get_template_directory_uri() . '/js/materialize.min.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script('swiper', get_template_directory_uri() . '/js/swiper.min.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script('flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script('superslides', get_template_directory_uri() . '/js/jquery.superslides.min.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script('google-map', '//maps.googleapis.com/maps/api/js', array(), NULL, TRUE );
        wp_enqueue_script('count-to', get_template_directory_uri() . '/js/jquery.countTo.min.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script('coundown-timer', get_template_directory_uri() . '/js/coundown-timer.min.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script('inview', get_template_directory_uri() . '/js/jquery.inview.min.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script('easing', get_template_directory_uri() . '/js/jquery.easing.min.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script('classie', get_template_directory_uri() . '/js/classie.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script('magnific', get_template_directory_uri() . '/js/magnific-popup.min.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script('stellar', get_template_directory_uri() . '/js/jquery.stellar.min.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script('retina', get_template_directory_uri() . '/js/retina.min.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script('twitter-fetcher', get_template_directory_uri() . '/js/twitter-fetcher.min.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script('flicker', get_template_directory_uri() . '/js/flicker-photo.min.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script('imagesloaded', get_template_directory_uri() . '/js/imagesloaded.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script( 'jquery-masonry' );
        wp_enqueue_script('materialize-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), NULL, TRUE);

        wp_localize_script( 'materialize-scripts', 'materializeJSObject', apply_filters( 'materialize_js_object', array(
            'materialize_sticky_menu'=> materialize_option('sticky-menu-visibility', false, true),
            'count_day'              => esc_html__('Days', 'materialize'),
            'count_hour'             => esc_html__('Hour', 'materialize'),
            'count_minutes'          => esc_html__('Minutes', 'materialize'),
            'count_second'           => esc_html__('Second', 'materialize'),
            'ajaxurl'                => admin_url( 'admin-ajax.php' ),
            'redirecturl'            => materialize_option('tt-login-redirect', false, home_url('/')),
            'loadingmessage'         => esc_html__('Sending user info, please wait...', 'materialize')
		) ) );

        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }

    add_action('wp_enqueue_scripts', 'materialize_scripts');
endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Custom template tags for this theme.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
require get_template_directory() . "/inc/template-tags.php";

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Custom functions that act independently of the theme templates.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
require get_template_directory() . "/inc/extras.php";

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Load Jetpack compatibility file.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
require get_template_directory() . "/inc/jetpack.php";