<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :
   
    vc_map( array(
        'name'        => esc_html__( 'TT Services', 'materialize' ),
        'base'        => 'tt_services',
        'icon'        => 'fa fa-th',
        'category'    => esc_html__( 'TT Elements', 'materialize' ),
        'description' => esc_html__( 'To showcase your services with thumbnail', 'materialize' ),
        'params'      => array(
            
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Post style', 'materialize'),
                'param_name' => 'post_style',
                'value' => array(
                    esc_html__('Normal Post', 'materialize') => 'normal-post',
                    esc_html__('Carousel Post', 'materialize') => 'carousel-post'
                ),
                'admin_label' => true,
                'description' => esc_html__('Select post style', 'materialize')
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Post Limit', 'materialize'),
                'param_name'  => 'post_limit',
                'std'       => '3',
                'admin_label' => true,
                'description' => esc_html__( 'Enter number of post to show', 'materialize')
            ),

            array(
                 'type'         => 'dropdown',
                 'heading'      => esc_html__('Select grid column', 'materialize'),
                 'param_name'   => 'grid_column',
                 'value'        => array(
                      esc_html__('2 Columns', 'materialize') => '6',
                      esc_html__('3 Columns', 'materialize') => '4',
                      esc_html__('4 Columns', 'materialize') => '3',
                  ),
                 'admin_label'  => true,
                 'std'          => '4',
                 'dependency'  => array(
                    'element' => 'post_style',
                    'value'   => array( 'normal-post' )
                ),
                 'description'  => esc_html__('Select grid column', 'materialize'),
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Show read more?', 'materialize'),
                'param_name'  => 'show_readmore',
                'value'       => array(
                    esc_html__('Yes', 'materialize') => 'yes',
                    esc_html__('No', 'materialize') => 'no',
                    ),
                'std' => 'yes',
                'admin_label' => true,
                'description' => esc_html__( 'You can show or hide readmore option', 'materialize')
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Change readmore text', 'materialize'),
                'param_name'  => 'readmore_text',
                'std'         => esc_html__( 'Learn More', 'materialize'),
                'dependency'  => array(
                    'element' => 'show_readmore',
                    'value'   => array('yes')
                ),
                'description' => esc_html__( 'You can change readmore text', 'materialize')
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
        class WPBakeryShortCode_TT_Services extends WPBakeryShortCode {
        }
    }
endif;