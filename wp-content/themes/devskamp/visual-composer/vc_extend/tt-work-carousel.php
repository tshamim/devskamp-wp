<?php

if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

	vc_map( array(
        'name'        => esc_html__( 'TT Work Carousel', 'materialize' ),
        'base'        => 'tt_work_carousel',
        'icon'        => 'fa fa-picture-o',
        'category'    => esc_html__( 'TT Elements', 'materialize' ),
        'description' => esc_html__( 'Displays full wide work/portfolio with carousel', 'materialize' ),
        'params'      => array(

            array(
                'type' => 'attach_images',
                'heading' => esc_html__( 'Images', 'materialize' ),
                'param_name' => 'images',
                'description' => esc_html__( 'Select images from media library.', 'materialize' )
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
        class WPBakeryShortCode_TT_Work_Carousel extends WPBakeryShortCode {
        }
    }

endif; // function_exists( 'vc_map' )