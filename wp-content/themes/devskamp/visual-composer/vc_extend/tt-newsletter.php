<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

    // TT Newsletter element
    vc_map( array(
        'name'        => esc_html__( 'TT Newsletter', 'materialize' ),
        'base'        => 'tt_newsletter',
        'icon'        => 'fa fa-envelope',
        'category'    => esc_html__( 'TT Elements', 'materialize' ),
        'description' => esc_html__( 'Newsletter subscribe form', 'materialize' ),
        'params'      => array(

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Newsletter style', 'materialize' ),
                'param_name'  => 'newsletter_style',
                'admin_label' => true,
                'value'       => array(
                    esc_html__('Style one', 'materialize') => 'newsletter-style-one',
                    esc_html__('Style two', 'materialize') => 'newsletter-style-two',
                ),
                'admin_label' => true,
                'description' => esc_html__( 'Select newsletter style', 'materialize' )
            ),

            array(
                'type'          => 'css_editor',
                'heading'       => esc_html__( 'Css', 'materialize' ),
                'param_name'    => 'css',
                'group'         => esc_html__( 'Design options', 'materialize' ),
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Extra class name', 'materialize' ),
                'param_name'  => 'el_class',
                'admin_label' => true,
                'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'materialize' )
            ),
        )
    ));

    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_TT_Newsletter extends WPBakeryShortCode {
        }
    }
endif;