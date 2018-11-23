<?php

    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // ReduxFramework  Config File
    // For full documentation, please visit: https://docs.reduxframework.com
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // This is your option name where all the Redux data is stored.
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

    $opt_name = "materialize_theme_option";


    /**
     * SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => TRUE,
        // Show the sections below the admin menu item or not
        'menu_title'           => sprintf( esc_html__( '%s Options', 'materialize' ), $theme->get( 'Name' ) ),
        'page_title'           => sprintf( esc_html__( '%s Theme Options', 'materialize' ), $theme->get( 'Name' ) ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => FALSE,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => TRUE,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => TRUE,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-admin-generic',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => FALSE,
        // Show the time the page took to load, etc
        'update_notice'        => TRUE,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => TRUE,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => '40',
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => TRUE,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => FALSE,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => TRUE,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => TRUE,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => TRUE,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        'footer_credit'        => sprintf( esc_html__( '%s Theme Options', 'materialize' ), $theme->get( 'Name' ) ),
        // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => TRUE,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => TRUE,
                'rounded' => FALSE,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // START SECTIONS
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

    // General Settings
    Redux::setSection( $opt_name, array(
        'icon'   => 'el-icon-cogs',
        'title'  => esc_html__('General Settings', 'materialize'),
        'fields' => array(
            array(
                'id'       => 'tt-breadcrumb',
                'type'     => 'switch',
                'title'    => esc_html__('Breadcrumb', 'materialize'),
                'subtitle' => esc_html__('Show or Hide Your website Breadcrumb', 'materialize'),
                'on'       => esc_html__('Show', 'materialize'),
                'off'      => esc_html__('Hide', 'materialize'),
                'default'  => TRUE,
            ),
            array(
                'id'       => 'tt-login-redirect',
                'type'     => 'text',
                'title'    => esc_html__('Login Redirect Custom url', 'materialize'),
                'desc'     => esc_html__('Enter custom url to redirect after login successfully', 'materialize'),
                'default'  => home_url('/')
            )
        )
    ));

    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // Logo settings
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    Redux::setSection( $opt_name, array(
        'icon'   => 'el-icon-slideshare',
        'title'  => esc_html__('Logo Settings', 'materialize'),
        'fields' => array(
            array(
                'id'       => 'logo-type',
                'type'     => 'switch',
                'title'    => esc_html__('Logo Type', 'materialize'),
                'subtitle' => esc_html__('You can set text or image logo', 'materialize'),
                'on'       => esc_html__('Image Logo', 'materialize'),
                'off'      => esc_html__('Text Logo', 'materialize'),
                'default'  => TRUE,
            ),
            array(
                'id'       => 'text-logo',
                'type'     => 'text',
                'required' => array('logo-type', '=', '0'),
                'title'    => esc_html__('Logo Text', 'materialize'),
                'subtitle' => esc_html__('Change your logo text', 'materialize')
            ),
            array(
                'id'       => 'logo',
                'type'     => 'media',
                'preview'  => 'true',
                'required' => array('logo-type', '=', '1'),
                'title'    => esc_html__('Site Logo.', 'materialize'),
                'subtitle' => esc_html__('Change Site logo dimension: 210px &times; 50px', 'materialize')
            ),
            array(
                'id'       => 'retina-logo',
                'type'     => 'media',
                'preview'  => 'true',
                'required' => array('logo-type', '=', '1'),
                'title'    => esc_html__('Retina Logo Image (High Density)', 'materialize'),
                'subtitle' => esc_html__('Change Retina logo dimension: 420px &times; 100px', 'materialize'),
                'desc'     => esc_html__('Add a 420px &times; 100px pixels image that will be used as the logo in the header section. For the Retina Logo Image the even number of pixels is less important because it will be hardly noticable', 'materialize'),
            ),
            array(
                'id'       => 'mobile-logo',
                'type'     => 'media',
                'preview'  => 'true',
                'required' => array('logo-type', '=', '1'),
                'title'    => esc_html__('Site Mobile Logo.', 'materialize'),
                'subtitle' => esc_html__('Change site mobile logo dimension: 210px &times; 50px', 'materialize')
            ),
            array(
                'id'       => 'retina-mobile-logo',
                'type'     => 'media',
                'preview'  => 'true',
                'required' => array('logo-type', '=', '1'),
                'title'    => esc_html__('Retina Mobile Logo Image (High Density)', 'materialize'),
                'subtitle' => esc_html__('Change retina mobile logo dimension: 420px &times; 100px', 'materialize'),
                'desc'     => esc_html__('Add a 420px &times; 100px pixels image that will be used as the logo in the header section. For the Retina Logo Image the even number of pixels is less important because it will be hardly noticable', 'materialize'),
            ),
            array(
                'id'       => 'sticky-logo',
                'type'     => 'media',
                'preview'  => 'true',
                'required' => array('logo-type', '=', '1'),
                'title'    => esc_html__('Site Sticky Logo.', 'materialize'),
                'subtitle' => esc_html__('Change site sticky logo dimension: 210px &times; 50px', 'materialize')
            ),
            array(
                'id'       => 'retina-sticky-logo',
                'type'     => 'media',
                'preview'  => 'true',
                'required' => array('logo-type', '=', '1'),
                'title'    => esc_html__('Retina Sticky Logo Image (High Density)', 'materialize'),
                'subtitle' => esc_html__('Change retina sticky logo dimension: 420px &times; 100px', 'materialize'),
                'desc'     => esc_html__('Add a 420px &times; 100px pixels image that will be used as the logo in the header section. For the Retina Logo Image the even number of pixels is less important because it will be hardly noticable', 'materialize'),
            ),
            array(
                'id'       => 'sticky-mobile-logo',
                'type'     => 'media',
                'preview'  => 'true',
                'required' => array('logo-type', '=', '1'),
                'title'    => esc_html__('Site Sticky Mobile Logo.', 'materialize'),
                'subtitle' => esc_html__('Change site sticky mobile logo dimension: 210px &times; 50px', 'materialize')
            ),
            array(
                'id'       => 'retina-sticky-mobile-logo',
                'type'     => 'media',
                'preview'  => 'true',
                'required' => array('logo-type', '=', '1'),
                'title'    => esc_html__('Retina Sticky Mobile Logo Image (High Density)', 'materialize'),
                'subtitle' => esc_html__('Change retina sticky mobile logo dimension: 420px &times; 100px', 'materialize'),
                'desc'     => esc_html__('Add a 420px &times; 100px pixels image that will be used as the logo in the header section. For the Retina Logo Image the even number of pixels is less important because it will be hardly noticable', 'materialize'),
            ),
            
            array(
                'id'             => 'logo-margin',
                'type'           => 'spacing',
                'output'         => array('.navbar-brand'),
                'mode'           => 'margin',
                'units'          => 'px',
                'units_extended' => 'false',
                'title'          => esc_html__('Logo Margin Option', 'materialize'),
                'subtitle'       => esc_html__('You can change logo margin if needed.', 'materialize'),
                'desc'           => esc_html__('Change top, right, bottom and left value in px, e.g: 10', 'materialize')
            )
        )
    ));

    // Header settings
    Redux::setSection( $opt_name, array(
        'icon'   => 'el el-website',
        'title'  => esc_html__( 'Header Settings', 'materialize' ),
        'fields' => array(
            
            // header style
            array(
                'id'       => 'header-style',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Header styles', 'materialize' ),
                'subtitle' => esc_html__( 'Select Header Style.', 'materialize' ),
                'options'  => array(
                    'header-default'   => array(
                        'alt' => esc_html__('Header default', 'materialize'),
                        'img' => get_template_directory_uri() . '/images/header-default.jpg'
                    ),
                    'header-dark'   => array(
                        'alt' => esc_html__('Header dark', 'materialize'),
                        'img' => get_template_directory_uri() . '/images/header-dark.jpg'
                    ),
                    'header-brand-color'   => array(
                        'alt' => esc_html__('Header brand color', 'materialize'),
                        'img' => get_template_directory_uri() . '/images/header-brand-color.jpg'
                    ),
                    'header-transparent'   => array(
                        'alt' => esc_html__('Header transparent', 'materialize'),
                        'img' => get_template_directory_uri() . '/images/header-transparent.jpg'
                    ),
                    'header-semi-transparent'   => array(
                        'alt' => esc_html__('Header semi transparent', 'materialize'),
                        'img' => get_template_directory_uri() . '/images/header-semi-transparent.jpg'
                    ),
                    'header-center-menu'   => array(
                        'alt' => esc_html__('Header center menu', 'materialize'),
                        'img' => get_template_directory_uri() . '/images/header-center-menu.jpg'
                    ),
                    'header-bottom-menu'   => array(
                        'alt' => esc_html__('Header bottom menu', 'materialize'),
                        'img' => get_template_directory_uri() . '/images/header-bottom-menu.jpg'
                    ),
                    'header-floating-menu'   => array(
                        'alt' => esc_html__('Header floating menu', 'materialize'),
                        'img' => get_template_directory_uri() . '/images/header-floating-menu.jpg'
                    ),
                    'header-shop'   => array(
                        'alt' => esc_html__('Header shop', 'materialize'),
                        'img' => get_template_directory_uri() . '/images/header-shop.jpg'
                    ),
                    'no-header'   => array(
                        'alt' => esc_html__('No Header', 'materialize'),
                        'img' => get_template_directory_uri() . '/images/no-header.jpg'
                    )
                ),
                'default'  => 'header-default'
            ),

            array(
                'id'       => 'menu-hover-style',
                'type'     => 'select',
                'title'    => esc_html__('Menu Hover Style', 'materialize'),
                'desc'     => esc_html__('Select a menu hover style', 'materialize'),
                'options'  => array(
                    '1' => esc_html__('Default', 'materialize'),
                    '2' => esc_html__('Bottom border', 'materialize'),
                    '3' => esc_html__('Box', 'materialize'),
                    '4' => esc_html__('Border box', 'materialize')
                ),
                'default'  => '1'
            ),

            array(
                'id'             => 'navbar-margin',
                'type'           => 'spacing',
                'output'         => array('.main-menu-wrapper'),
                'mode'           => 'padding',
                'units'          => 'px',
                'units_extended' => 'false',
                'title'          => esc_html__('Main menu margin option', 'materialize'),
                'subtitle'       => esc_html__('You can change main menu margin if needed.', 'materialize'),
                'desc'           => esc_html__('Change top, right, bottom and left value in px, e.g: 10', 'materialize')
            ),

            array(
                'id'             => 'navbar-height',
                'type'           => 'spacing',
                'output'         => array('.navbar'),
                'mode'           => 'padding',
                'units'          => 'px',
                'units_extended' => 'false',
                'title'          => esc_html__('Navbar Padding Option', 'materialize'),
                'subtitle'       => esc_html__('You can change navbar padding if needed.', 'materialize'),
                'desc'           => esc_html__('Change top, right, bottom and left value in px, e.g: 10', 'materialize')
            ),

            // menu background color
            array(
                'id'       => 'menu-bg-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Menu background color', 'materialize' ),
                'subtitle' => esc_html__( 'Pick color for menu background.', 'materialize' )
            ),

            // menu color
            array(
                'id'       => 'menu-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Menu font color', 'materialize' ),
                'subtitle' => esc_html__( 'Pick color for menu.', 'materialize' )
            ),

            // mobile menu background color
            array(
                'id'       => 'mobile-menu-bg-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Mobile menu background color', 'materialize' ),
                'subtitle' => esc_html__( 'Pick color for mobile menu background.', 'materialize' )
            ),

            // mobile menu color
            array(
                'id'       => 'mobile-menu-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Mobile menu font color', 'materialize' ),
                'subtitle' => esc_html__( 'Pick color for mobile menu.', 'materialize' )
            ),

            // sticky menu visibility
            array(
                'id'       => 'sticky-menu-visibility',
                'type'     => 'switch',
                'title'    => esc_html__('Sticky menu visibility', 'materialize'),
                'subtitle' => esc_html__('Visible or Hidden sticky menu', 'materialize'),
                'on'       => esc_html__('Visible', 'materialize'),
                'off'      => esc_html__('Hidden', 'materialize'),
                'default'  => TRUE,
            ),

            // sticky menu background color
            array(
                'id'       => 'sticky-menu-bg-color',
                'type'     => 'color',
                'required' => array('sticky-menu-visibility', '=', '1'),
                'title'    => esc_html__( 'Sticky menu background color', 'materialize' ),
                'subtitle' => esc_html__( 'Pick color for sticky menu background.', 'materialize' )
            ),

            // sticky menu color
            array(
                'id'       => 'sticky-menu-color',
                'type'     => 'color',
                'required' => array('sticky-menu-visibility', '=', '1'),
                'title'    => esc_html__( 'Sticky menu font color', 'materialize' ),
                'subtitle' => esc_html__( 'Pick color for sticky menu.', 'materialize' )
            ),

            // header search visibility
            array(
                'id'       => 'search-visibility',
                'type'     => 'switch',
                'title'    => esc_html__('Search visibility', 'materialize'),
                'subtitle' => esc_html__('Visible or Hidden search button', 'materialize'),
                'on'       => esc_html__('Visible', 'materialize'),
                'off'      => esc_html__('Hidden', 'materialize'),
                'default'  => TRUE,
            ),

            array(
                'id'       => 'tt-search-result',
                'type'     => 'checkbox',
                'title'    => esc_html__( 'Search Settings', 'materialize' ),
                'required' => array('search-visibility', '=', '1'),
                'subtitle' => esc_html__( 'Check post type to show search result', 'materialize' ),
                'options'  => array(
                    'post-search'         => esc_html__( 'Post', 'materialize' ),
                    'portfolio-search'     => esc_html__( 'Portfolio', 'materialize' )
                ),
                'default'  => array(
                    'post-search' => '1',
                    'portfolio-search'   => '0'
                )
            ),

            // header top wrapper
            array(
                'id'       => 'header-top-visibility',
                'type'     => 'switch',
                'title'    => esc_html__('Header topbar visibility', 'materialize'),
                'subtitle' => esc_html__('Visible or Hidden header topbar', 'materialize'),
                'on'       => esc_html__('Visible', 'materialize'),
                'off'      => esc_html__('Hidden', 'materialize'),
                'default'  => FALSE,
            ),

            array(
                'id'       => 'header-contact',
                'type'     => 'editor',
                'required' => array('header-top-visibility', '=', '1'),
                'title'    => esc_html__('Header contact', 'materialize'),
                'subtitle' => esc_html__('Change header contact info', 'materialize'),
                'default'  => '<ul class="topbar-cta no-margin"><li class="mr-20"><a><i class="material-icons mr-10">&#xE0B9;</i>info@materialize.com</a></li><li><a><i class="material-icons mr-10">&#xE0CD;</i> +01 123 456 78</a></li></ul>'
            ),

            array(
                'id'       => 'header-social-button',
                'type'     => 'switch',
                'required' => array('header-top-visibility', '=', '1'),
                'title'    => esc_html__('Header social button visibility', 'materialize'),
                'subtitle' => esc_html__('Visible or Hidden header social button', 'materialize'),
                'on'       => esc_html__('Visible', 'materialize'),
                'off'      => esc_html__('Hidden', 'materialize'),
                'default'  => TRUE,
            )
        )
    ));

    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // Page header image settings
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    Redux::setSection( $opt_name, array(
        'icon'   => 'el-icon-picture',
        'title'  => esc_html__('Page Header Image', 'materialize'),
        'fields' => array(
            array(
                'id'       => 'page-header-visibility',
                'type'     => 'select',
                'title'    => esc_html__('Page header visibility', 'materialize'),
                'subtitle' => esc_html__('Visible or Hidden all page header section', 'materialize'),
                'options'  => array(
                    'header-section-show' => esc_html__('Page Header Section Show', 'materialize'),
                    'header-section-hide' => esc_html__('Page Header Section Hide', 'materialize')
                ),
                'desc'     => esc_html__('Will show/hide background image, title and breadcrumb', 'materialize'),
                'default'  => 'header-section-show'
            ),
            array(
                'id'             => 'header-bg-padding',
                'type'           => 'spacing',
                'output'         => array('.page-title'),
                'mode'           => 'padding',
                'units'          => 'px',
                'units_extended' => 'false',
                'required'       => array('page-header-visibility', '=', 'header-section-show'),
                'title'          => esc_html__('Header background padding option', 'materialize'),
                'subtitle'       => esc_html__('You can change header padding if needed.', 'materialize'),
                'desc'           => esc_html__('Change top, right, bottom and left value in px, e.g: 10', 'materialize')
            ),
            array(
                'id'       => 'page-header-image',
                'type'     => 'media',
                'preview'  => 'true',
                'required' => array('page-header-visibility', '=', 'header-section-show'),
                'title'    => esc_html__('Page Header Background.', 'materialize'),
                'desc'     => esc_html__('Upload image from media library, dimension: 1920px x 450px', 'materialize')
            ),
            array(
                'id'       => 'portfolio-header-image',
                'type'     => 'media',
                'preview'  => 'true',
                'required' => array('page-header-visibility', '=', 'header-section-show'),
                'title'    => esc_html__('portfolio Header Background.', 'materialize'),
                'desc'     => esc_html__('Upload image from media library, dimension: 1920px x 450px', 'materialize')
            ),
            array(
                'id'       => 'service-header-image',
                'type'     => 'media',
                'preview'  => 'true',
                'required' => array('page-header-visibility', '=', 'header-section-show'),
                'title'    => esc_html__('Service Header Background.', 'materialize'),
                'desc'     => esc_html__('Upload image from media library, dimension: 1920px x 450px', 'materialize')
            ),
            array(
                'id'       => 'member-header-image',
                'type'     => 'media',
                'preview'  => 'true',
                'required' => array('page-header-visibility', '=', 'header-section-show'),
                'title'    => esc_html__('Member Header Background.', 'materialize'),
                'desc'     => esc_html__('Upload image from media library, dimension: 1920px x 450px', 'materialize')
            ),
            array(
                'id'       => 'joblist-header-image',
                'type'     => 'media',
                'preview'  => 'true',
                'required' => array('page-header-visibility', '=', 'header-section-show'),
                'title'    => esc_html__('Joblist Header Background.', 'materialize'),
                'desc'     => esc_html__('Upload image from media library, dimension: 1920px x 450px', 'materialize')
            ),
            array(
                'id'       => 'product-header-image',
                'type'     => 'media',
                'preview'  => 'true',
                'required' => array('page-header-visibility', '=', 'header-section-show'),
                'title'    => esc_html__('Product Header Background.', 'materialize'),
                'desc'     => esc_html__('Upload image from media library, dimension: 1920px x 450px', 'materialize')
            ),
            array(
                'id'       => 'blog-header-image',
                'type'     => 'media',
                'preview'  => 'true',
                'required' => array('page-header-visibility', '=', 'header-section-show'),
                'title'    => esc_html__('Blog Header Background.', 'materialize'),
                'desc'     => esc_html__('Upload image from media library, dimension: 1920px x 450px', 'materialize')
            ),
            array(
                'id'       => 'author-header-image',
                'type'     => 'media',
                'preview'  => 'true',
                'required' => array('page-header-visibility', '=', 'header-section-show'),
                'title'    => esc_html__('Author Header Background.', 'materialize'),
                'desc'     => esc_html__('Upload image from media library, dimension: 1920px x 450px', 'materialize')
            ),
            array(
                'id'       => 'category-header-image',
                'type'     => 'media',
                'preview'  => 'true',
                'required' => array('page-header-visibility', '=', 'header-section-show'),
                'title'    => esc_html__('Category Header Background.', 'materialize'),
                'desc'     => esc_html__('Upload image from media library, dimension: 1920px x 450px', 'materialize')
            ),
            array(
                'id'       => 'tag-header-image',
                'type'     => 'media',
                'preview'  => 'true',
                'required' => array('page-header-visibility', '=', 'header-section-show'),
                'title'    => esc_html__('Tag Header Background.', 'materialize'),
                'desc'     => esc_html__('Upload image from media library, dimension: 1920px x 450px', 'materialize')
            ),
            array(
                'id'       => 'search-header-image',
                'type'     => 'media',
                'preview'  => 'true',
                'required' => array('page-header-visibility', '=', 'header-section-show'),
                'title'    => esc_html__('Search Header Background.', 'materialize'),
                'desc'     => esc_html__('Upload image from media library, dimension: 1920px x 450px', 'materialize')
            ),
            array(
                'id'       => 'archive-header-image',
                'type'     => 'media',
                'preview'  => 'true',
                'required' => array('page-header-visibility', '=', 'header-section-show'),
                'title'    => esc_html__('Archive Header Background.', 'materialize'),
                'desc'     => esc_html__('Upload image from media library, dimension: 1920px x 450px', 'materialize')
            )
        )
    ));

    
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // Presets settings
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    Redux::setSection( $opt_name, array(
        'icon'   => 'el-icon-brush',
        'title'  => esc_html__('Preset color', 'materialize'),
        'fields' => array(
            
            array(
                'id'       => 'body-bg-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Body Background color', 'materialize' ),
                'subtitle' => esc_html__( 'Pick color for the theme body color (default: #ffffff).', 'materialize' ),
                'default'  => '#ffffff',
            ),

            array(
                'id'       => 'accent-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Site Accent Color', 'materialize' ),
                'subtitle' => esc_html__( 'Pick color for the theme accent color (default: #03a9f4).', 'materialize' ),
                'default'  => '#03a9f4',
            ),

            array(
                'id'       => 'link-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Site Link Color', 'materialize' ),
                'subtitle' => esc_html__( 'Pick color for all link (default: #03a9f4).', 'materialize' ),
                'default'  => '#03a9f4',
            ),

            array(
                'id'       => 'tab-background',
                'type'     => 'color',
                'title'    => esc_html__( 'Tab active color', 'materialize' ),
                'subtitle' => esc_html__( 'The color apply only for vertical tab style', 'materialize' )
            )
        )
    ));


    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // Typography
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    Redux::setSection( $opt_name, array(
        'icon'   => 'el-icon-font',
        'title'  => esc_html__('Typography', 'materialize'),
        'fields' => array(
            
            // body typography
            array(
                'id'       => 'body-typography',
                'type'     => 'typography',
                'title'    => esc_html__( 'Body Font', 'materialize' ),
                'subtitle' => esc_html__( 'Specify the body font properties.', 'materialize' ),
                'google'   => true,
                'all_styles' => true,
                'text-align' => false,
                'default'  => array(
                    'color'       => '#999999',
                    'font-size'   => '14px',
                    'font-family' => 'Raleway',
                    'font-weight' => '500',
                    'line-height' => '29px'
                ),
            ),


            // Heading all typography
            array(
                'id'       => 'heading-typography',
                'type'     => 'typography',
                'title'    => esc_html__( 'Heading Font', 'materialize' ),
                'subtitle' => esc_html__( 'This settings for all heading font (h1, h2, h3, h4, h5, h6)', 'materialize' ),
                'google'   => true,
                'all_styles' => true,
                'text-align' => false,
                'font-size' => false,
                'line-height' => false,
                'default'  => array(
                    'color'       => '#202020',
                    'font-family' => 'Raleway',
                    'font-weight' => '400',
                ),
            ),

            // only H1 typography
            array(
                'id'       => 'h1-typography',
                'type'     => 'typography',
                'title'    => esc_html__( 'H1 (Heading one)', 'materialize' ),
                'subtitle' => esc_html__( 'This settings only for H1', 'materialize' ),
                'font-family' => false,
                'google'   => false,
                'text-align' => false,
                'font-size' => true,
                'line-height' => true,
                'color' => false,
                'font-weight' => false,
                'font-style' => false,
                'default'  => array(
                    'font-size'   => '40px',
                    'line-height' => '40px'
                ),
            ),


            // only H2 typography
            array(
                'id'       => 'h2-typography',
                'type'     => 'typography',
                'title'    => esc_html__( 'H2 (Heading two)', 'materialize' ),
                'subtitle' => esc_html__( 'This settings only for H2', 'materialize' ),
                'font-family' => false,
                'google'   => false,
                'text-align' => false,
                'font-size' => true,
                'line-height' => true,
                'color' => false,
                'font-weight' => false,
                'font-style' => false,
                'default'  => array(
                    'font-size'   => '20px',
                    'line-height' => '26px'
                ),
            ),


            // only H3 typography
            array(
                'id'       => 'h3-typography',
                'type'     => 'typography',
                'title'    => esc_html__( 'H3 (Heading three)', 'materialize' ),
                'subtitle' => esc_html__( 'This settings only for H3', 'materialize' ),
                'font-family' => false,
                'google'   => false,
                'text-align' => false,
                'font-size' => true,
                'line-height' => true,
                'color' => false,
                'font-weight' => false,
                'font-style' => false,
                'default'  => array(
                    'font-size'   => '18px',
                    'line-height' => '20px'
                ),
            ),

            // only H4 typography
            array(
                'id'       => 'h4-typography',
                'type'     => 'typography',
                'title'    => esc_html__( 'H4 (Heading four)', 'materialize' ),
                'subtitle' => esc_html__( 'This settings only for H4', 'materialize' ),
                'font-family' => false,
                'google'   => false,
                'text-align' => false,
                'font-size' => true,
                'line-height' => true,
                'color' => false,
                'font-weight' => false,
                'font-style' => false,
                'default'  => array(
                    'font-size'   => '16px',
                    'line-height' => '18px'
                ),
            ),

            // only H5 typography
            array(
                'id'       => 'h5-typography',
                'type'     => 'typography',
                'title'    => esc_html__( 'H5 (Heading five)', 'materialize' ),
                'subtitle' => esc_html__( 'This settings only for H5', 'materialize' ),
                'font-family' => false,
                'google'   => false,
                'text-align' => false,
                'font-size' => true,
                'line-height' => true,
                'color' => false,
                'font-weight' => false,
                'font-style' => false,
                'default'  => array(
                    'font-size'   => '14px',
                    'line-height' => '16px'
                ),
            ),

            // only H6 typography
            array(
                'id'       => 'h6-typography',
                'type'     => 'typography',
                'title'    => esc_html__( 'H6 (Heading six)', 'materialize' ),
                'subtitle' => esc_html__( 'This settings only for H6', 'materialize' ),
                'font-family' => false,
                'google'   => false,
                'text-align' => false,
                'font-size' => true,
                'line-height' => true,
                'color' => false,
                'font-weight' => false,
                'font-style' => false,
                'default'  => array(
                    'font-size'   => '12px',
                    'line-height' => '14px'
                ),
            ),

            array(
                'id'       => 'section-title-typography',
                'type'     => 'switch',
                'title'    => esc_html__('Custom section title typography', 'materialize'),
                'subtitle' => esc_html__('If you change default section tile typography then select custom', 'materialize'),
                'on'       => esc_html__('Default', 'materialize'),
                'off'      => esc_html__('Custom', 'materialize'),
                'default'  => TRUE
            ),

            // section title typography
            array(
                'id'       => 'section-title',
                'type'     => 'typography',
                'required' => array( 'section-title-typography', '=', '0' ),
                'title'    => esc_html__( 'Section title typography', 'materialize' ),
                'subtitle' => esc_html__( 'This settings for section title', 'materialize' ),
                'google'   => true,
                'all_styles' => true,
                'text-align' => false,
                'font-size' => true,
                'line-height' => true,
                'default'  => array(
                    'color'       => '#202020',
                    'font-family' => 'Raleway',
                    'font-weight' => '400',
                    'font-size'   => '40px',
                    'line-height' => '44px'
                ),
            ),

            array(
                'id'       => 'section-title-intro',
                'type'     => 'typography',
                'required' => array( 'section-title-typography', '=', '0' ),
                'title'    => esc_html__( 'Section title intro typography', 'materialize' ),
                'subtitle' => esc_html__( 'This settings for section title intro', 'materialize' ),
                'google'   => true,
                'all_styles' => true,
                'text-align' => false,
                'font-size' => true,
                'line-height' => true,
                'default'  => array(
                    'color'       => '#202020',
                    'font-family' => 'Great Vibes',
                    'font-weight' => '400',
                    'font-size'   => '24px',
                    'line-height' => '30px'
                ),
            ),

            // page header title typography
            array(
                'id'       => 'header-title-typography',
                'type'     => 'switch',
                'title'    => esc_html__('Custom page title typography', 'materialize'),
                'subtitle' => esc_html__('If you change default header title typography then select custom', 'materialize'),
                'on'       => esc_html__('Default', 'materialize'),
                'off'      => esc_html__('Custom', 'materialize'),
                'default'  => TRUE
            ),

            array(
                'id'       => 'header-title',
                'type'     => 'typography',
                'required' => array( 'header-title-typography', '=', '0' ),
                'title'    => esc_html__( 'Page title typography', 'materialize' ),
                'subtitle' => esc_html__( 'This settings for page title', 'materialize' ),
                'google'   => true,
                'all_styles' => true,
                'text-align' => false,
                'font-size' => true,
                'line-height' => true,
                'default'  => array(
                    'color'       => '#ffffff',
                    'font-family' => 'Raleway',
                    'font-weight' => '700',
                    'font-size'   => '36px',
                    'line-height' => '36px'
                )
            )
        )
    ));


    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // Blog settings
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    
    $rs_lists = "";
    
    // revolution slider lists
    if( class_exists('RevSlider') ) :
        $slider = new RevSlider();
        $rs_lists = $slider->getArrSlidersShort();
    endif;


    Redux::setSection( $opt_name, array(
        'icon'   => 'el-icon-file-edit',
        'title'  => esc_html__('Blog Settings', 'materialize'),
        'fields' => array(

            array(
                'id'       => 'blog-title',
                'type'     => 'text',
                'title'    => esc_html__('Blog Page Title', 'materialize'),
                'subtitle' => esc_html__('Enter Blog page title here, if leave blank then site title will appear', 'materialize')
            ),

            array(
                'id'       => 'blog-title-overlay',
                'type'     => 'switch',
                'title'    => esc_html__('Overlay', 'materialize'),
                'subtitle' => esc_html__('Enable or disable blog page title background overlay', 'materialize'),
                'on'       => esc_html__('Enable', 'materialize'),
                'off'      => esc_html__('Disable', 'materialize'),
                'default'  => TRUE
            ),

            array(
                'id'       => 'blog-sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__('Blog sidebar setting', 'materialize'),
                'subtitle' => esc_html__('Select blog sidebar', 'materialize'),
                'options'  => array(
                    'no-sidebar'    => array(
                        'alt' => 'No sidebar',
                        'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                    ),
                    'left-sidebar'  => array(
                        'alt' => 'Left sidebar',
                        'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                    ),
                    'right-sidebar' => array(
                        'alt' => 'Right sidebar',
                        'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                    )
                ),
                'default'  => 'right-sidebar'
            ),

            array(
                'id'       => 'tt-post-meta',
                'type'     => 'checkbox',
                'title'    => esc_html__( 'Post meta options', 'materialize' ),
                'subtitle' => esc_html__( 'Check to show post meta', 'materialize' ),
                'options'  => array(
                    'post-date'         => esc_html__( 'Post Date', 'materialize' ),
                    'post-author'       => esc_html__( 'Post Author', 'materialize' ),
                    'post-category'     => esc_html__( 'Post Category', 'materialize' ),
                    'post-comment' => esc_html__( 'Post Comment', 'materialize' )
                ),
                'default'  => array(
                    'post-date' => '1',
                    'post-author'  => '1',
                    'post-category'   => '1',
                    'post-comment' => '1'
                )
            ),

            array(
                'id'       => 'show-share-button',
                'type'     => 'switch',
                'title'    => esc_html__('Share button', 'materialize'),
                'subtitle' => esc_html__('Show or hide share button', 'materialize'),
                'on'       => esc_html__('Show', 'materialize'),
                'off'      => esc_html__('Hide', 'materialize'),
                'default'  => TRUE
            ),
            
            array(
                'id'       => 'tt-share-button',
                'type'     => 'checkbox',
                'required' => array( 'show-share-button', '=', '1' ),
                'title'    => esc_html__( 'Share button', 'materialize' ),
                'subtitle' => esc_html__( 'Check to show share button', 'materialize' ),
                'options'  => array(
                    'facebook' => esc_html__( 'Facebook', 'materialize' ),
                    'twitter'  => esc_html__( 'Twitter', 'materialize' ),
                    'google'   => esc_html__( 'Google+', 'materialize' ),
                    'linkedin' => esc_html__( 'Linkedin', 'materialize' )
                ),
                'default'  => array(
                    'facebook' => '1',
                    'twitter'  => '1',
                    'google'   => '1',
                    'linkedin' => '1'
                )
            ),

            array(
                'id'       => 'blog-page-nav',
                'type'     => 'switch',
                'title'    => esc_html__('Blog Pagination or Navigation', 'materialize'),
                'subtitle' => esc_html__('Blog pagination style, posts pagination or newer / older posts', 'materialize'),
                'on'       => esc_html__('Pagination', 'materialize'),
                'off'      => esc_html__('Navigation', 'materialize'),
                'default'  => TRUE
            ),

            array(
                'id'       => 'facebook-comment',
                'type'     => 'switch',
                'title'    => esc_html__('Facebook comment', 'materialize'),
                'subtitle' => esc_html__('Enable or disable facebook comment', 'materialize'),
                'on'       => esc_html__('Enable', 'materialize'),
                'off'      => esc_html__('Disable', 'materialize'),
                'default'  => FALSE
            ),

            array(
                'id'      => 'tab-text-one',
                'type'    => 'text',
                'required' => array( 'facebook-comment', '=', '1' ),
                'title'   => esc_html__( 'Comment tab text for one', 'materialize' ),
                'default' => esc_html__( 'Default Comment', 'materialize' ),
            ),
            array(
                'id'      => 'tab-text-two',
                'type'    => 'text',
                'required' => array( 'facebook-comment', '=', '1' ),
                'title'   => esc_html__( 'Comment tab text for two', 'materialize' ),
                'default' => esc_html__( 'Facebook Comment', 'materialize' ),
            ),

            array(
                'id'        => 'info_normal',
                'type'      => 'info',
                'style'     => 'warning',
                'required'  => array( 'facebook-comment', '=', '1' ),
                'desc'      => esc_html__('You must have installed and activated "Facebook Comments Plugin" to apply this above settings', 'materialize')
            ),

            array(
                'id'      => 'rev-slider',
                'type'    => 'select',
                'title'   => esc_html__( 'Select slider for Blog Grid Home', 'materialize' ),
                'options' => $rs_lists,
            )
        )
    ));


    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // Page settings
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    Redux::setSection( $opt_name, array(
        'icon'   => 'el-icon-file-edit',
        'title'  => esc_html__('Page Settings', 'materialize'),
        'fields' => array(

            array(
                'id'       => 'page-sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__('Page Sidebar', 'materialize'),
                'subtitle' => esc_html__('Select page sidebar', 'materialize'),
                'options'  => array(
                    'no-sidebar'    => array(
                        'alt' => 'No sidebar',
                        'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                    ),
                    'left-sidebar'  => array(
                        'alt' => 'Left sidebar',
                        'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                    ),
                    'right-sidebar' => array(
                        'alt' => 'Right sidebar',
                        'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                    )
                ),
                'default'  => 'right-sidebar'
            )
        )
    ));


    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // Portfolio settings
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    Redux::setSection( $opt_name, array(
        'icon'   => 'el-icon-th-large',
        'title'  => esc_html__('Portfolio Settings', 'materialize'),
        'fields' => array(
            array(
                'id'       => 'portfolio-navigation',
                'type'     => 'switch',
                'title'    => esc_html__('Portfolio navigation visibility', 'materialize'),
                'subtitle' => esc_html__('You can show or hide portfolio navigation bar from single portfolio page', 'materialize'),
                'on'       => esc_html__('Visible', 'materialize'),
                'off'      => esc_html__('Hidden', 'materialize'),
                'default'  => TRUE,
            ),

            array(
                'id'       => 'all-portfolio-link',
                'type'     => 'select',
                'required' => array('portfolio-navigation', '=', '1'),
                'title'    => esc_html__('All Portfolio page link', 'materialize'),
                'subtitle' => esc_html__('Select portfolio page to linking with all portfolio page', 'materialize'),
                'multi'    => false,
                'data'     => 'page'
            )
        )
    ));

    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // Portfolio category settings
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    Redux::setSection( $opt_name, array(
        'icon'   => 'el-icon-th-large',
        'title'  => esc_html__('Portfolio Category Settings', 'materialize'),
        'fields' => array(
            
            array(
                'id'       => 'portfolio_style',
                'type'     => 'select',
                'title'    => esc_html__('Portfolio style', 'materialize'), 
                'desc'     => esc_html__('Select a portfolio style', 'materialize'),
                'options'  => array(
                    'boxed_style'   => esc_html__('Boxed style', 'materialize'),
                    'card_style'    => esc_html__('Card style', 'materialize'),
                    'card_style'    => esc_html__('Card style', 'materialize'),
                    'masonry_style' => esc_html__('Masonry style', 'materialize')
                ),
                'default'  => 'boxed_style'
            ),

            array(
                'id'        => 'category-portfolio-limit',
                'type'      => 'text',
                'title'     => esc_html__('Category portfolio limit', 'materialize'),
                'desc'      => esc_html__('Enter the number of portfolio that you want to show', 'materialize'),
                'default'   => 6
            ),

            array(
                'id'        => 'word_limit',
                'type'      => 'text',
                'title'     => esc_html__('Word limit', 'materialize'),
                'desc'      => esc_html__('Put the number of word to show', 'materialize'),
                'default'   => 15
            ),

            array(
                'id'       => 'grid_column',
                'type'     => 'select',
                'title'    => esc_html__('Grid Column', 'materialize'), 
                'desc'     => esc_html__('Select grid column', 'materialize'),
                'options'  => array(
                    '6'     => esc_html__('2 Columns', 'materialize'),
                    '4'     => esc_html__('3 Columns', 'materialize'),
                    '3'     => esc_html__('4 Columns', 'materialize'),
                    '5'     => esc_html__('5 Columns', 'materialize'),
                    '2'     => esc_html__('6 Columns', 'materialize')
                ),
                'default'  => '4'
            ),

            array(
                'id'       => 'grid_padding',
                'type'     => 'switch',
                'title'    => esc_html__('Grid padding', 'materialize'), 
                'desc'     => esc_html__('Select padding option', 'materialize'),
                'on'       => esc_html__('Yes', 'materialize'),
                'off'      => esc_html__('No', 'materialize'),
                'default'  => TRUE
            ),

            array(
                'id'       => 'title_visibility',
                'type'     => 'switch',
                'title'    => esc_html__('Title visibility', 'materialize'),
                'desc'     => esc_html__('Show/hide portfolio title', 'materialize'),
                'on'       => esc_html__('Visible', 'materialize'),
                'off'      => esc_html__('Hidden', 'materialize'),
                'default'  => TRUE,
            ),

            array(
                'id'       => 'category_visibility',
                'type'     => 'switch',
                'title'    => esc_html__('Category visibility', 'materialize'),
                'desc'     => esc_html__('Show/hide portfolio category', 'materialize'),
                'on'       => esc_html__('Visible', 'materialize'),
                'off'      => esc_html__('Hidden', 'materialize'),
                'default'  => TRUE,
            ),

            array(
                'id'       => 'popup_button_visibility',
                'type'     => 'switch',
                'required' => array( 'portfolio_style', '=', array('boxed_style', 'title_style', 'masonry_style')),
                'title'    => esc_html__('Overlay icon visibility', 'materialize'),
                'desc'     => esc_html__('Show/hide popup link, image and video icon', 'materialize'),
                'on'       => esc_html__('Visible', 'materialize'),
                'off'      => esc_html__('Hidden', 'materialize'),
                'default'  => TRUE
            ),

            array(
                'id'       => 'link_button_visibility',
                'type'     => 'switch',
                'required' => array( 'portfolio_style', '=', array('card_style')),
                'title'    => esc_html__('Link icon visibility', 'materialize'),
                'desc'     => esc_html__('Show/hide link icon', 'materialize'),
                'on'       => esc_html__('Visible', 'materialize'),
                'off'      => esc_html__('Hidden', 'materialize'),
                'default'  => TRUE
            ),

            array(
                'id'       => 'like_visibility',
                'type'     => 'switch',
                'required' => array( 'portfolio_style', '=', array('card_style')),
                'title'    => esc_html__('Like visibility', 'materialize'),
                'desc'     => esc_html__('Show/hide like option', 'materialize'),
                'on'       => esc_html__('Visible', 'materialize'),
                'off'      => esc_html__('Hidden', 'materialize'),
                'default'  => TRUE
            ),

            array(
                'id'        => 'button_text',
                'type'      => 'text',
                'title'     => esc_html__('Button text', 'materialize'),
                'desc'      => esc_html__('Change button text', 'materialize'),
                'default'   => esc_html__('View full Project', 'materialize')
            )
        )
    ));


    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // Shop settings
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    if (class_exists('WooCommerce')) :
        Redux::setSection( $opt_name, array(
            'icon'   => 'el-icon-shopping-cart',
            'title'  => esc_html__('Shop Settings', 'materialize'),
            'fields' => array(

                array(
                    'id'       => 'shop-sidebar',
                    'type'     => 'image_select',
                    'title'    => esc_html__('Shop Sidebar', 'materialize'),
                    'subtitle' => esc_html__('Select shop sidebar', 'materialize'),
                    'options'  => array(
                        'no-sidebar'    => array(
                            'alt' => 'No sidebar',
                            'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                        ),
                        'left-sidebar'  => array(
                            'alt' => 'Left sidebar',
                            'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                        ),
                        'right-sidebar' => array(
                            'alt' => 'Right sidebar',
                            'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                        )
                    ),
                    'default'  => 'right-sidebar'
                ),

                array(
                    'id'       => 'product-per-page',
                    'type'     => 'text',
                    'title'    => esc_html__('Product per page', 'materialize'),
                    'subtitle' => esc_html__('Change number of products per page', 'materialize'),
                    'default'  => '6'
                ),

                array(
                    'id'       => 'product-column',
                    'type'     => 'select',
                    'title'    => esc_html__('Product per row', 'materialize'),
                    'subtitle' => esc_html__('Change number of products per row', 'materialize'),
                    'options'  => array(
                        '2' => 'Column 2',
                        '3' => 'Column 3',
                        '4' => 'Column 4'
                    ),
                    'default'  => '3'
                )
            )
        ));
    endif;


    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // Preloader settings
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    Redux::setSection( $opt_name, array(
        'icon'   => 'el-icon-repeat-alt',
        'title'  => esc_html__('Preloader Settings', 'materialize'),
        'fields' => array(
            array(
                'id'       => 'page-preloader',
                'type'     => 'switch',
                'title'    => esc_html__('Page Preloader', 'materialize'),
                'subtitle' => esc_html__('You can enable or disable page preloader from here.', 'materialize'),
                'on'       => esc_html__('Enable', 'materialize'),
                'off'      => esc_html__('Disable', 'materialize'),
                'default'  => TRUE,
            ),

            array(
                'id'       => 'loader-bg-color',
                'type'     => 'color',
                'required' => array( 'page-preloader', '=', '1' ),
                'title'    => esc_html__( 'Preloader background color', 'materialize' ),
                'subtitle' => esc_html__( 'Pick color for preloader background (default: #ffffff).', 'materialize' ),
                'default'  => '#ffffff',
            ),

            array(
                'id'       => 'tt-loader',
                'type'     => 'media',
                'preview'  => 'true',
                'required' => array( 'page-preloader', '=', '1' ),
                'title'    => esc_html__('Animation file', 'materialize'),
                'subtitle' => esc_html__('Upload loader gif animation file', 'materialize')
            )
        )
    ));


    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // Custom Style
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    Redux::setSection( $opt_name, array(
        'icon'   => 'el-icon-css',
        'title'  => esc_html__('Custom CSS', 'materialize'),
        'fields' => array(
            array(
                'id'       => 'custom_style',
                'type'     => 'textarea',
                'title'    => esc_html__('CSS Code', 'materialize'),
                'desc' => esc_html__('You can write your custom CSS here.', 'materialize')
            )
        )
    ));

    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // 404 page Style
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    Redux::setSection( $opt_name, array(
        'icon'   => 'el-icon-inbox-box',
        'title'  => esc_html__('404 Page', 'materialize'),
        'fields' => array(
            array(
                'id'       => '404_style',
                'type'     => 'switch',
                'title'    => esc_html__('404 page style', 'materialize'),
                'desc'     => esc_html__('Selec 404 page style', 'materialize'),
                'on'       => esc_html__('Default', 'materialize'),
                'off'      => esc_html__('Alternative style', 'materialize'),
                'default'  => TRUE,
            ),
            array(
                'id'        => '404_text',
                'type'      => 'text',
                'title'     => esc_html__('404 Text', 'materialize'),
                'desc'      => esc_html__('Change 404 text', 'materialize'),
                'default'   => esc_html__('404', 'materialize')
            ),
            array(
                'id'        => '404_subtext',
                'type'      => 'text',
                'title'     => esc_html__('404 Subtext', 'materialize'),
                'desc'      => esc_html__('Change 404 subtext', 'materialize'),
                'default'   => esc_html__('OOPS! PAGE NOT FOUND', 'materialize')
            ),
            array(
                'id'        => '404_desc',
                'type'      => 'text',
                'title'     => esc_html__('404 Description', 'materialize'),
                'desc'      => esc_html__('Change 404 description', 'materialize'),
                'default'   => esc_html__('Sorry, we couldn\'t find the content you were looking for.', 'materialize')
            ),
            array(
                'id'        => '404_button_text',
                'type'      => 'text',
                'title'     => esc_html__('Button text', 'materialize'),
                'desc'      => esc_html__('Change button text, leave blank to hide button', 'materialize'),
                'default'   => esc_html__('Go Back Home', 'materialize')
            )
        )
    ));


    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // Footer settings
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    Redux::setSection( $opt_name, array(
        'icon'   => 'el-icon-share',
        'title'  => esc_html__('Social Icon', 'materialize'),
        'fields' => array(

            array(
                'id'       => 'facebook-link',
                'type'     => 'text',
                'title'    => esc_html__('Facebook Link', 'materialize'),
                'subtitle' => esc_html__('Enter facebook page or profile link. Leave blank to hide icon.', 'materialize'),
                'default'  => "#"
            ),
            array(
                'id'       => 'twitter-link',
                'type'     => 'text',
                'title'    => esc_html__('Twitter Link', 'materialize'),
                'subtitle' => esc_html__('Enter twitter link. Leave blank to hide icon.', 'materialize'),
                'default'  => "#"
            ),
            array(
                'id'       => 'google-plus-link',
                'type'     => 'text',
                'title'    => esc_html__('Google Plus Link', 'materialize'),
                'subtitle' => esc_html__('Enter google plus page or profile link. Leave blank to hide icon.', 'materialize'),
                'default'  => "#"
            ),
            array(
                'id'       => 'youtube-link',
                'type'     => 'text',
                'title'    => esc_html__('Youtube Link', 'materialize'),
                'subtitle' => esc_html__('Enter youtube chanel link. Leave blank to hide icon.', 'materialize'),
            ),
            array(
                'id'       => 'pinterest-link',
                'type'     => 'text',
                'title'    => esc_html__('Pinterest Link', 'materialize'),
                'subtitle' => esc_html__('Enter pinterest link. Leave blank to hide icon.', 'materialize'),
                'default'  => "#"
            ),
            array(
                'id'       => 'flickr-link',
                'type'     => 'text',
                'title'    => esc_html__('Flickr Link', 'materialize'),
                'subtitle' => esc_html__('Enter flicker link. Leave blank to hide icon.', 'materialize'),
            ),
            array(
                'id'       => 'linkedin-link',
                'type'     => 'text',
                'title'    => esc_html__('Linkedin Link', 'materialize'),
                'subtitle' => esc_html__('Enter linkedin profile link. Leave blank to hide icon.', 'materialize'),
            ),
            array(
                'id'       => 'vimeo-link',
                'type'     => 'text',
                'title'    => esc_html__('Vimeo Link', 'materialize'),
                'subtitle' => esc_html__('Enter vimeo chanel link. Leave blank to hide icon.', 'materialize'),
            ),
            array(
                'id'       => 'instagram-link',
                'type'     => 'text',
                'title'    => esc_html__('Instagram Link', 'materialize'),
                'subtitle' => esc_html__('Enter instagram page or profile link. Leave blank to hide icon.', 'materialize'),
            ),
            array(
                'id'       => 'dribbble-link',
                'type'     => 'text',
                'title'    => esc_html__('Dribbble Link', 'materialize'),
                'subtitle' => esc_html__('Enter dribbble profile link. Leave blank to hide icon.', 'materialize'),
            ),
            array(
                'id'       => 'behance-link',
                'type'     => 'text',
                'title'    => esc_html__('Behance Link', 'materialize'),
                'subtitle' => esc_html__('Enter behance profile link. Leave blank to hide icon.', 'materialize'),
            ),
        )
    ));

    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // Footer settings
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    Redux::setSection( $opt_name, array(
        'icon'   => 'el-icon-photo',
        'title'  => esc_html__('Footer Settings', 'materialize'),
        'fields' => array(
            // footer style
            array(
                'id'       => 'footer-style',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Footer styles', 'materialize' ),
                'subtitle' => esc_html__( 'Select Footer Style.', 'materialize' ),
                'options'  => array(
                    'footer-default'   => array(
                        'alt' => esc_html__('Footer default', 'materialize'),
                        'img' => get_template_directory_uri() . '/images/footer-default.jpg'
                    ),
                    'footer-two'   => array(
                        'alt' => esc_html__('Footer two', 'materialize'),
                        'img' => get_template_directory_uri() . '/images/footer-two.jpg'
                    ),
                    'footer-three'   => array(
                        'alt' => esc_html__('Footer three', 'materialize'),
                        'img' => get_template_directory_uri() . '/images/footer-three.jpg'
                    ),
                    'footer-four'   => array(
                        'alt' => esc_html__('Footer four', 'materialize'),
                        'img' => get_template_directory_uri() . '/images/footer-four.jpg'
                    ),
                    'no-footer'   => array(
                        'alt' => esc_html__('No Footer', 'materialize'),
                        'img' => get_template_directory_uri() . '/images/no-footer.jpg'
                    )
                ),
                'default'  => 'footer-default'
            ),
            array(
                'id'       => 'footer_background',
                'type'     => 'color',
                'title'    => esc_html__( 'Footer background color', 'materialize' ),
                'subtitle' => esc_html__( 'Pick color for footer background', 'materialize' ),
                'default'  => '#03a9f4'
            ),
            array(
                'id'       => 'footer_text_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Footer text color', 'materialize' ),
                'subtitle' => esc_html__( 'Pick color for footer text', 'materialize' ),
                'default'  => '#ffffff'
            ),
            array(
                'id'       => 'footer_text_hover_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Footer text hover color', 'materialize' ),
                'subtitle' => esc_html__( 'Pick color for footer text hover', 'materialize' ),
                'default'  => '#81ddff'
            ),
            array(
                'id'       => 'footer-logo',
                'type'     => 'media',
                'preview'  => 'true',
                'required' => array('footer-style', '=', array('footer-two', 'footer-three', 'footer-four')),
                'title'    => esc_html__('Footer Logo.', 'materialize'),
                'subtitle' => esc_html__('Change footer logo dimension: 210px &times; 50px', 'materialize')
            ),
            array(
                'id'       => 'footer-retina-logo',
                'type'     => 'media',
                'preview'  => 'true',
                'required' => array('footer-style', '=', array('footer-two', 'footer-three', 'footer-four')),
                'title'    => esc_html__('Footer Retina Logo (High Density)', 'materialize'),
                'subtitle' => esc_html__('Change Footer Retina logo dimension: 420px &times; 100px', 'materialize'),
                'desc'     => esc_html__('Add a 420px &times; 100px pixels image that will be used as the logo in the header section. For the Retina Logo Image the even number of pixels is less important because it will be hardly noticable', 'materialize'),
            ),

            array(
                'id'       => 'footer-text-visibility',
                'type'     => 'switch',
                'title'    => esc_html__('Footer text visibility', 'materialize'),
                'required' => array('footer-style', '=', array('footer-three')),
                'subtitle' => esc_html__('Show or hide footer text from footer', 'materialize'),
                'on'       => esc_html__('Show', 'materialize'),
                'off'      => esc_html__('Hide', 'materialize'),
                'default'  => TRUE,
            ),

            array(
                'id'       => 'footer-intro-text',
                'type'     => 'editor',
                'required' => array('footer-text-visibility', '=', '1'),
                'title'    => esc_html__('Footer intro text', 'materialize'),
                'subtitle' => esc_html__('Enter footer intro text here', 'materialize'),
                'default'  => wp_kses( '<p>Assertively revolutionize diverse value before out-of-the-box opportunities. <br> Credibly deliver high-quality e-tailers with global mindshare.</p>', array(
                    'a'      => array(
                        'href'   => array(),
                        'title'  => array(),
                        'target' => array()
                    ),
                    'br'     => array(),
                    'em'     => array(),
                    'strong' => array(),
                    'ul'     => array(),
                    'li'     => array(),
                    'p'      => array(),
                    'span'   => array(
                        'class' => array()
                    )
                ) ),
            ),

            array(
                'id'       => 'footer-text',
                'type'     => 'editor',
                'title'    => esc_html__('Footer Copyright Text', 'materialize'),
                'subtitle' => esc_html__('Write footer copyright text here.', 'materialize')
            ),

            array(
                'id'       => 'footer-menu-visibility',
                'type'     => 'switch',
                'title'    => esc_html__('Footer menu visibility', 'materialize'),
                'required' => array('footer-style', '=', array('footer-three')),
                'subtitle' => esc_html__('Show or hide footer menu from footer', 'materialize'),
                'on'       => esc_html__('Show', 'materialize'),
                'off'      => esc_html__('Hide', 'materialize'),
                'default'  => TRUE,
            ),

            array(
                'id'       => 'totop-visibility',
                'type'     => 'switch',
                'title'    => esc_html__('Back-to-top button', 'materialize'),
                'subtitle' => esc_html__('Show or hide social icon from footer', 'materialize'),
                'on'       => esc_html__('Show', 'materialize'),
                'off'      => esc_html__('Hide', 'materialize'),
                'default'  => TRUE,
            ),

            array(
                'id'       => 'totop-background',
                'type'     => 'color',
                'title'    => esc_html__('To top button background', 'materialize'),
                'required' => array('totop-visibility', '=', '1'),
                'subtitle' => esc_html__('Select totop button background', 'materialize')
            ),

            array(
                'id'       => 'social-icon-visibility',
                'type'     => 'switch',
                'title'    => esc_html__('Social icon visibility', 'materialize'),
                'subtitle' => esc_html__('Show or hide social icon from footer', 'materialize'),
                'on'       => esc_html__('Show', 'materialize'),
                'off'      => esc_html__('Hide', 'materialize'),
                'default'  => TRUE,
            )
        )
    ));

    /*
     * <--- END SECTIONS
     */