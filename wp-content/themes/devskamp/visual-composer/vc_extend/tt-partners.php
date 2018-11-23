<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

    vc_map( array(
        'name'        => esc_html__( 'TT Partners', 'materialize' ),
        'base'        => 'tt_partners',
        'icon'        => 'fa fa-users',
        'category'    => esc_html__( 'TT Elements', 'materialize' ),
        'description' => esc_html__( 'Show off partners logo', 'materialize' ),
        'params'      => array(
            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Style', 'materialize' ),
                'param_name'    => 'style',
                'value'         => array(
                    esc_html__( 'With Carousel', 'materialize' ) => 'with_carousel',
                    esc_html__( 'Without Carousel', 'materialize' ) => 'without_carousel'
                ),
                'admin_label'   => true,
                'description'   => esc_html__( 'Select partner style', 'materialize' )
            ),

            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Partner Gutter', 'materialize' ),
                'param_name'    => 'partner_gutter',
                'value'         => array(
                    esc_html__( 'Gutter Less', 'materialize' ) => 'no-gutter',
                    esc_html__( 'Gutter Style', 'materialize' ) => 'item-gutter',
                ),
                'admin_label'   => true,
                'description'   => esc_html__( 'Select gutter style for clients item', 'materialize' )
            ),

            array(
                'type'          => 'attach_images',
                'heading'       => esc_html__( 'Images', 'materialize'),
                'param_name'    => 'images',
                'description'   => esc_html__( 'Select images from media library.', 'materialize' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Apply image effect ?', 'materialize' ),
                'param_name'  => 'image_effect',
                'value'         => array(
                    esc_html__( 'Black and White image', 'materialize' ) => 'black_white',
                    esc_html__( 'Original Image', 'materialize' ) => 'original_image'
                ),
                'admin_label'   => true,
                'description' => esc_html__( 'Select image effect', 'materialize' ),
            ),

            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'On click action', 'materialize' ),
                'param_name'    => 'on_click_action',
                'value'         => array(
                    esc_html__( 'Do nothing', 'materialize' ) => '',
                    esc_html__( 'Open custom link', 'materialize' ) => 'custom_link'
                ),
                'admin_label'   => true,
                'description'   => esc_html__( 'Define action for onclick event if needed.', 'materialize' )
            ),

            array(
                'type'          => 'exploded_textarea',
                'heading'       => esc_html__( 'Custom links', 'materialize'),
                'param_name'    => 'links',
                'description'   => esc_html__( 'Enter links for each logo here. Divide links with linebreaks (Enter)', 'materialize' ),
                'dependency'    => array(
                    'element'   => 'on_click_action', 
                    'value'     => array( 'custom_link' )
                )
            ),


            // item settings
            array(
                'type'          => 'textfield',
                'heading'       => esc_html__( 'Default large screen item, e.g: min width 1200px', 'materialize'),
                'param_name'    => 'large_screen',
                'description'   => esc_html__( 'Put the number of amount that you want to show at a time', 'materialize'),
                'group'         => esc_html__('Item Settings', 'materialize'),
                'dependency'    => array(
                    'element'   => 'style', 
                    'value'     => array( 'with_carousel' )
                ),
                'value'         => 4
            ),

            array(
                'type'          => 'textfield',
                'heading'       => esc_html__( 'Items Desktop e.g: max width 1199px', 'materialize'),
                'param_name'    => 'items_desktop',
                'description'   => esc_html__( 'Put the number of amount that you want to show at a time', 'materialize'),
                'group'         => esc_html__('Item Settings', 'materialize'),
                'dependency'    => array(
                    'element'   => 'style', 
                    'value'     => array( 'with_carousel' )
                ),
                'value'         => 4
            ),

            array(
                'type'          => 'textfield',
                'heading'       => esc_html__( 'Items Desktop Small e.g: max width 979px', 'materialize' ),
                'param_name'    => 'items_desktop_small',
                'description'   => esc_html__( 'Put the number of amount that you want to show at a time', 'materialize' ),
                'group'         => esc_html__('Item Settings', 'materialize'),
                'dependency'    => array(
                    'element'   => 'style', 
                    'value'     => array( 'with_carousel' )
                ),
                'value'         => 3
            ),

            array(
                'type'          => 'textfield',
                'heading'       => esc_html__( 'Items Tablet e.g: max width 768px', 'materialize' ),
                'param_name'    => 'items_tablet',
                'description'   => esc_html__( 'Put the number of amount that you want to show at a time', 'materialize' ),
                'group'         => esc_html__('Item Settings', 'materialize'),
                'dependency'    => array(
                    'element'   => 'style', 
                    'value'     => array( 'with_carousel' )
                ),
                'value'         => 2
            ),

            array(
                'type'          => 'textfield',
                'heading'       => esc_html__( 'Item height', 'materialize' ),
                'param_name'    => 'item_height',
                'description'   => esc_html__( 'Enter item height in px, e.g: 200px', 'materialize' )
            ),

            array(
                'type' => 'css_editor',
                'heading' => esc_html__( 'Css', 'materialize' ),
                'param_name' => 'css',
                'group' => esc_html__( 'Design options', 'materialize' ),
            ),

            array(
                "type"          => "textfield",
                "heading"       => esc_html__( "Extra class name", 'materialize' ),
                "param_name"    => "el_class",
                "description"   => esc_html__( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'materialize' )
            )
        )
    ));


    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_tt_Partners extends WPBakeryShortCode {
        }
    }
endif;