<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if( function_exists('vc_map') ) :

	vc_map( array(
        'name'        => esc_html__( 'TT Shop Banner', 'materialize' ),
        'base'        => 'tt_shop_banner',
        'icon'        => 'fa fa-picture-o',
        'category'    => esc_html__( 'TT Elements', 'materialize' ),
        'description' => esc_html__( 'Show shop banner', 'materialize' ),
        'params'      => array(

            array(
                'type'        => 'attach_image',
                'heading'     => esc_html__( 'Image', 'materialize' ),
                'param_name'  => 'banner_image',
                'description' => esc_html__( 'Select images from media library', 'materialize' )
            ),

        	array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Background color', 'materialize' ),
				'param_name'  => 'bg_color',
				'description' => esc_html__( 'Select color for background', 'materialize' )
			),

        	array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__( 'Title intro', 'materialize' ),
				'param_name'  	=> 'title_intro',
				'description' 	=> esc_html__( 'Enter title intro', 'materialize' )
			),

        	array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__( 'Title', 'materialize' ),
				'param_name'  	=> 'title',
				'holder'		=> 'h3',
				'description' 	=> esc_html__( 'Enter title', 'materialize' )
			),

        	array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__( 'Offer value', 'materialize' ),
				'param_name'  	=> 'offer',
				'description' 	=> esc_html__( 'Enter offer text, e.g: -25%', 'materialize' )
			),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Show button ?', 'materialize' ),
                'param_name'  => 'button_show',
                'value'       => array(
                    esc_html__( 'Yes', 'materialize' ) => 'yes',
                    esc_html__( 'No', 'materialize' )  => 'no'
                ),
                'description' => esc_html__( 'If you do not like to show button then select no to hide', 'materialize' )
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Button Text', 'materialize' ),
                'param_name'  => 'button_text',
                'value'       => esc_html__( 'DISOVER US', 'materialize' ),
                'description' => esc_html__( 'Change Button Text', 'materialize' ),
                'dependency'  => array(
                    'element' => 'button_show',
                    'value'   => array( 'yes' )
                )
            ),

            array(
                'type'        => 'vc_link',
                'heading'     => esc_html__( 'Button Link', 'materialize' ),
                'param_name'  => 'button_link',
                'description' => esc_html__( 'Enter Button Link', 'materialize' ),
                'dependency'  => array(
                    'element' => 'button_show',
                    'value'   => array( 'yes' )
                )
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
        class WPBakeryShortCode_TT_Shop_Banner extends WPBakeryShortCode {
        }
    }
endif;