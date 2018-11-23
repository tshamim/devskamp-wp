<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

	vc_map( array(
		'name'        => esc_html__( 'TT Latest Post (Default style)', 'materialize'),
		'base'        => 'tt_latest_post_default',
		'icon'        => 'fa fa-qrcode',
		'category'    => esc_html__( 'TT Elements', 'materialize' ),
		'description' => esc_html__( 'Displays latest post with default style', 'materialize'),
		'params'      => array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Post style', 'materialize'),
				'param_name' => 'post_style',
				'value' => array(
				 	esc_html__('Grid style default', 'materialize') => 'grid-style-default',
				 	esc_html__('Grid style two', 'materialize') => 'grid-style-two'
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
		         'type' 		=> 'dropdown',
		         'heading' 		=> esc_html__('Select grid column', 'materialize'),
		         'param_name' 	=> 'grid_column',
		         'value' 		=> array(
		              esc_html__('2 Columns', 'materialize') => '6',
		              esc_html__('3 Columns', 'materialize') => '4',
		              esc_html__('4 Columns', 'materialize') => '3',
		          ),
		         'admin_label' 	=> true,
		         'std'			=> '4',
		         'description' 	=> esc_html__('Select grid column', 'materialize'),
		    ),

			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Word Limit', 'materialize'),
				'param_name'  => 'word_limit',
				'value'       => 15,
				'admin_label' => true,
				'description' => esc_html__( 'How many word would you like to show ?', 'materialize')
			),

			array(
                'type'          => 'css_editor',
                'heading'       => esc_html__( 'Css', 'materialize' ),
                'param_name'    => 'css',
                'group'         => esc_html__( 'Design options', 'materialize' ),
            ),

			array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__( 'Extra class name', 'materialize'),
				'param_name'  	=> 'el_class',
				'admin_label' 	=> true,
				'description' 	=> esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'materialize')
			)
		)
	));


	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_tt_Latest_Post_Default extends WPBakeryShortCode {
		}
	}
endif;