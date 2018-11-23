<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

    vc_map( array(
        'name'        => esc_html__( 'TT Job List', 'materialize' ),
        'base'        => 'tt_joblist',
        'icon'        => 'fa fa-bandcamp',
        'category'    => esc_html__( 'TT Elements', 'materialize' ),
        'description' => esc_html__( 'To showcase joblist', 'materialize' ),
        'params'      => array(
            
            array(
                'type'          => 'textfield',
                'heading'       => esc_html__('Post Limit', 'materialize'),
                'param_name'    => 'post_limit',
                'admin_label'   => true,
                'value'         => -1,
                'description'   => esc_html__('Put the number of posts to show, -1 for no limit', 'materialize'),
            ),

            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Category visibility', 'materialize' ),
                'param_name'    => 'category_visibility',
                'value'         => array(
                    esc_html__('Visible', 'materialize') => 'visible',
                    esc_html__('Hidden', 'materialize')  =>'hidden' ,
                ),
                'std'           => 'visible',
                'admin_label'   => true,
                'group'         => esc_html__( 'Visibility Options', 'materialize' ),
                'description'   => esc_html__( 'If do not like to show category then select hidden', 'materialize' ),
            ), 

            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Title visibility', 'materialize' ),
                'param_name'    => 'title_visibility',
                'value'         => array(
                    esc_html__('Visible', 'materialize') => 'visible',
                    esc_html__('Hidden', 'materialize')  =>'hidden' ,
                ),
                'std'           => 'visible',
                'group'         => esc_html__( 'Visibility Options', 'materialize' ),
                'description'   => esc_html__( 'If do not like to show title then select hidden', 'materialize' )
            ),

            array(
                'type'          => 'css_editor',
                'heading'       => esc_html__( 'Css', 'materialize' ),
                'param_name'    => 'css',
                'group'         => esc_html__( 'Design options', 'materialize' ),
            ),

            array(
                'type'          => 'textfield',
                'heading'       => esc_html__( 'Extra class name', 'materialize' ),
                'param_name'    => 'el_class',
                'description'   => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'materialize' )
            )
        )
    ));


    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_tt_joblist extends WPBakeryShortCode {
        }
    }
endif;