<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

    // Section title style element
    vc_map( array(
        'name'        => esc_html__( 'TT Category list', 'materialize' ),
        'base'        => 'tt_shop_category_list',
        'icon'        => 'fa fa-list',
        'category'    => esc_html__( 'TT Elements', 'materialize' ),
        'description' => esc_html__( 'Showing shop category list', 'materialize' ),
        'params'      => array(
            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Category Title', 'materialize' ),
                'param_name'  => 'title',
                'value'       => esc_html__( 'All Categories', 'materialize' ),
                'description' => esc_html__( 'Enter category title', 'materialize' )
            ),

            array(
                'type' => 'css_editor',
                'heading' => esc_html__( 'Css', 'materialize' ),
                'param_name' => 'css',
                'group' => esc_html__( 'Design options', 'materialize' ),
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Extra class name', 'materialize' ),
                'param_name'  => 'el_class',
                'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'materialize' )
            )
        )
    ));

    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_TT_Shop_Category_List extends WPBakeryShortCode {
        }
    }
endif;