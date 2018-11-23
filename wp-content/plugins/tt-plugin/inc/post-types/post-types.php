<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Register portfolio post type
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    function tt_portfolio_post_type() {

        $labels = array(
            'name'               => esc_html_x('Portfolio', 'tt-pl-textdomain'),
            'singular_name'      => esc_html_x('Portfolio', 'tt-pl-textdomain'),
            'menu_name'          => esc_html__('Portfolio', 'tt-pl-textdomain'),
            'parent_item_colon'  => esc_html__('Parent Portfolio:', 'tt-pl-textdomain'),
            'all_items'          => esc_html__('All Portfolio', 'tt-pl-textdomain'),
            'view_item'          => esc_html__('View Portfolio', 'tt-pl-textdomain'),
            'add_new_item'       => esc_html__('Add New Portfolio', 'tt-pl-textdomain'),
            'add_new'            => esc_html__('Add New', 'tt-pl-textdomain'),
            'edit_item'          => esc_html__('Edit Portfolio', 'tt-pl-textdomain'),
            'update_item'        => esc_html__('Update Portfolio', 'tt-pl-textdomain'),
            'search_items'       => esc_html__('Search Portfolio', 'tt-pl-textdomain'),
            'not_found'          => esc_html__('No Portfolio found', 'tt-pl-textdomain'),
            'not_found_in_trash' => esc_html__('No Portfolio found in Trash', 'tt-pl-textdomain'),
        );
        $args = array(
            'description'         => esc_html__('Portfolio', 'tt-pl-textdomain'),
            'labels'              => $labels,
            'supports'            => array('title', 'editor', 'page-attributes','thumbnail', 'comments'),
            'taxonomies'          => array('tt-portfolio-cat'),
            'hierarchical'        => TRUE,
            'public'              => TRUE,
            'show_ui'             => TRUE,
            'show_in_menu'        => TRUE,
            'show_in_nav_menus'   => TRUE,
            'show_in_admin_bar'   => TRUE,
            'menu_position'       => 6,
            'menu_icon'           => 'dashicons-schedule',
            'can_export'          => TRUE,
            'has_archive'         => FALSE,
            'exclude_from_search' => FALSE,
            'publicly_queryable'  => TRUE,
            'rewrite'             => array( 'slug' => 'portfolio' ),
            'capability_type'     => 'post',
        );

        register_post_type('tt-portfolio', $args);
    }

    add_action('init', 'tt_portfolio_post_type');



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Register taxonomy for portfolio 
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    function tt_register_taxonomy_portfolio_cat() {

        $labels = array(
            'name'                          => esc_html_x( 'Category', 'tt-pl-textdomain' ),
            'singular_name'                 => esc_html_x( 'Category', 'tt-pl-textdomain' ),
            'search_items'                  => esc_html_x( 'Search Category', 'tt-pl-textdomain' ),
            'popular_items'                 => esc_html_x( 'Popular Category', 'tt-pl-textdomain' ),
            'all_items'                     => esc_html_x( 'All Categories', 'tt-pl-textdomain' ),
            'parent_item'                   => esc_html_x( 'Parent Category', 'tt-pl-textdomain' ),
            'parent_item_colon'             => esc_html_x( 'Parent Category:', 'tt-pl-textdomain' ),
            'edit_item'                     => esc_html_x( 'Edit Category', 'tt-pl-textdomain' ),
            'update_item'                   => esc_html_x( 'Update Category', 'tt-pl-textdomain' ),
            'add_new_item'                  => esc_html_x( 'Add New Category', 'tt-pl-textdomain' ),
            'new_item_name'                 => esc_html_x( 'New Category', 'tt-pl-textdomain' ),
            'separate_items_with_commas'    => esc_html_x( 'Separate categories with commas', 'tt-pl-textdomain' ),
            'add_or_remove_items'           => esc_html_x( 'Add or remove categories', 'tt-pl-textdomain' ),
            'choose_from_most_used'         => esc_html_x( 'Choose from most used categories', 'tt-pl-textdomain' ),
            'menu_name'                     => esc_html_x( 'Categories', 'tt-pl-textdomain' ),
        );

        $args = array(
            'labels'            => $labels,
            'public'            => true,
            'show_in_nav_menus' => true,
            'show_ui'           => true,
            'show_tagcloud'     => false,
            'show_admin_column' => true,
            'hierarchical'      => true,
            'rewrite'           => array( 'slug' => 'portfolio-category' ),
            'query_var'         => true
        );

        register_taxonomy( 'tt-portfolio-cat', array('tt-portfolio'), $args );
    }

    add_action( 'init', 'tt_register_taxonomy_portfolio_cat' );




//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Register Job List post type
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    function tt_joblist_post_type() {

        $labels = array(
            'name'               => esc_html_x('Joblist', 'tt-pl-textdomain'),
            'singular_name'      => esc_html_x('Joblist', 'tt-pl-textdomain'),
            'menu_name'          => esc_html__('Joblist', 'tt-pl-textdomain'),
            'parent_item_colon'  => esc_html__('Parent Joblist:', 'tt-pl-textdomain'),
            'all_items'          => esc_html__('All Joblist', 'tt-pl-textdomain'),
            'view_item'          => esc_html__('View Joblist', 'tt-pl-textdomain'),
            'add_new_item'       => esc_html__('Add New Joblist', 'tt-pl-textdomain'),
            'add_new'            => esc_html__('Add New', 'tt-pl-textdomain'),
            'edit_item'          => esc_html__('Edit Joblist', 'tt-pl-textdomain'),
            'update_item'        => esc_html__('Update Joblist', 'tt-pl-textdomain'),
            'search_items'       => esc_html__('Search Joblist', 'tt-pl-textdomain'),
            'not_found'          => esc_html__('No Joblist found', 'tt-pl-textdomain'),
            'not_found_in_trash' => esc_html__('No Joblist found in Trash', 'tt-pl-textdomain'),
        );
        $args = array(
            'description'         => esc_html__('Joblist', 'tt-pl-textdomain'),
            'labels'              => $labels,
            'supports'            => array('title', 'editor', 'page-attributes','thumbnail', 'comments'),
            'taxonomies'          => array('tt-joblist-cat'),
            'hierarchical'        => FALSE,
            'public'              => TRUE,
            'show_ui'             => TRUE,
            'show_in_menu'        => TRUE,
            'show_in_nav_menus'   => TRUE,
            'show_in_admin_bar'   => TRUE,
            'menu_position'       => 6,
            'menu_icon'           => 'dashicons-welcome-learn-more',
            'can_export'          => TRUE,
            'has_archive'         => FALSE,
            'exclude_from_search' => TRUE,
            'publicly_queryable'  => TRUE,
            'rewrite'             => array( 'slug' => 'joblist' ),
            'capability_type'     => 'post',
        );

        register_post_type('tt-joblist', $args);
    }

    add_action('init', 'tt_joblist_post_type');



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Register taxonomy for joblist 
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    function tt_register_taxonomy_joblist_cat() {

        $labels = array(
            'name'                          => esc_html_x( 'Category', 'tt-pl-textdomain' ),
            'singular_name'                 => esc_html_x( 'Category', 'tt-pl-textdomain' ),
            'search_items'                  => esc_html_x( 'Search Category', 'tt-pl-textdomain' ),
            'popular_items'                 => esc_html_x( 'Popular Category', 'tt-pl-textdomain' ),
            'all_items'                     => esc_html_x( 'All Categories', 'tt-pl-textdomain' ),
            'parent_item'                   => esc_html_x( 'Parent Category', 'tt-pl-textdomain' ),
            'parent_item_colon'             => esc_html_x( 'Parent Category:', 'tt-pl-textdomain' ),
            'edit_item'                     => esc_html_x( 'Edit Category', 'tt-pl-textdomain' ),
            'update_item'                   => esc_html_x( 'Update Category', 'tt-pl-textdomain' ),
            'add_new_item'                  => esc_html_x( 'Add New Category', 'tt-pl-textdomain' ),
            'new_item_name'                 => esc_html_x( 'New Category', 'tt-pl-textdomain' ),
            'separate_items_with_commas'    => esc_html_x( 'Separate categories with commas', 'tt-pl-textdomain' ),
            'add_or_remove_items'           => esc_html_x( 'Add or remove categories', 'tt-pl-textdomain' ),
            'choose_from_most_used'         => esc_html_x( 'Choose from most used categories', 'tt-pl-textdomain' ),
            'menu_name'                     => esc_html_x( 'Categories', 'tt-pl-textdomain' ),
        );

        $args = array(
            'labels'            => $labels,
            'public'            => true,
            'show_in_nav_menus' => true,
            'show_ui'           => true,
            'show_tagcloud'     => false,
            'show_admin_column' => true,
            'hierarchical'      => true,
            'rewrite'           => array( 'slug' => 'joblist-category' ),
            'query_var'         => true
        );

        register_taxonomy( 'tt-joblist-cat', array('tt-joblist'), $args );
    }

    add_action( 'init', 'tt_register_taxonomy_joblist_cat' );



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Register member post type
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    function tt_member_post_type() {

        $labels = array(
            'name'               => esc_html_x('Member', 'tt-pl-textdomain'),
            'singular_name'      => esc_html_x('Member', 'tt-pl-textdomain'),
            'menu_name'          => esc_html__('Members', 'tt-pl-textdomain'),
            'parent_item_colon'  => esc_html__('Parent Member:', 'tt-pl-textdomain'),
            'all_items'          => esc_html__('All Members', 'tt-pl-textdomain'),
            'view_item'          => esc_html__('View Member', 'tt-pl-textdomain'),
            'add_new_item'       => esc_html__('Add New Member', 'tt-pl-textdomain'),
            'add_new'            => esc_html__('Add New', 'tt-pl-textdomain'),
            'edit_item'          => esc_html__('Edit Member', 'tt-pl-textdomain'),
            'update_item'        => esc_html__('Update Member', 'tt-pl-textdomain'),
            'search_items'       => esc_html__('Search Member', 'tt-pl-textdomain'),
            'not_found'          => esc_html__('No Member found', 'tt-pl-textdomain'),
            'not_found_in_trash' => esc_html__('No Member found in Trash', 'tt-pl-textdomain'),
        );
        $args = array(
            'description'         => esc_html__('Member', 'tt-pl-textdomain'),
            'labels'              => $labels,
            'supports'            => array('title', 'editor', 'page-attributes','thumbnail', 'comments'),
            'taxonomies'          => array(),
            'hierarchical'        => FALSE,
            'public'              => TRUE,
            'show_ui'             => TRUE,
            'show_in_menu'        => TRUE,
            'show_in_nav_menus'   => TRUE,
            'show_in_admin_bar'   => TRUE,
            'menu_position'       => 6,
            'menu_icon'           => 'dashicons-admin-users',
            'can_export'          => TRUE,
            'has_archive'         => FALSE,
            'exclude_from_search' => TRUE,
            'publicly_queryable'  => TRUE,
            'rewrite'             => array( 'slug' => 'member' ),
            'capability_type'     => 'post',
        );

        register_post_type('tt-member', $args);
    }

    add_action('init', 'tt_member_post_type');



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Register Services Post Type
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    function tt_service_post_type() {

        $labels = array(
            'name'               => esc_html_x('Services', 'tt-pl-textdomain'),
            'singular_name'      => esc_html_x('Service', 'tt-pl-textdomain'),
            'menu_name'          => esc_html__('Services', 'tt-pl-textdomain'),
            'parent_item_colon'  => esc_html__('Parent Service:', 'tt-pl-textdomain'),
            'all_items'          => esc_html__('All Services', 'tt-pl-textdomain'),
            'view_item'          => esc_html__('View Service', 'tt-pl-textdomain'),
            'add_new_item'       => esc_html__('Add New Service', 'tt-pl-textdomain'),
            'add_new'            => esc_html__('Add New', 'tt-pl-textdomain'),
            'edit_item'          => esc_html__('Edit Service', 'tt-pl-textdomain'),
            'update_item'        => esc_html__('Update Service', 'tt-pl-textdomain'),
            'search_items'       => esc_html__('Search Service', 'tt-pl-textdomain'),
            'not_found'          => esc_html__('No Service found', 'tt-pl-textdomain'),
            'not_found_in_trash' => esc_html__('No Service found in Trash', 'tt-pl-textdomain'),
        );
        $args = array(
            'description'         => esc_html__('Service', 'tt-pl-textdomain'),
            'labels'              => $labels,
            'supports'            => array('title', 'editor', 'page-attributes','thumbnail', 'comments', 'excerpt'),
            'taxonomies'          => array(),
            'hierarchical'        => FALSE,
            'public'              => TRUE,
            'show_ui'             => TRUE,
            'show_in_menu'        => TRUE,
            'show_in_nav_menus'   => TRUE,
            'show_in_admin_bar'   => TRUE,
            'menu_position'       => 6,
            'menu_icon'           => 'dashicons-analytics',
            'can_export'          => TRUE,
            'has_archive'         => FALSE,
            'exclude_from_search' => TRUE,
            'publicly_queryable'  => TRUE,
            'rewrite'             => array( 'slug' => 'service' ),
            'capability_type'     => 'post',
        );

        register_post_type('tt-service', $args);
    }

    add_action('init', 'tt_service_post_type');