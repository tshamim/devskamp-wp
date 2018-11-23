<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

	vc_map( array(
		'name'        => esc_html__( 'TT Latest Post (List style)', 'materialize'),
		'base'        => 'tt_latest_post_list',
		'icon'        => 'fa fa-qrcode',
		'category'    => esc_html__( 'TT Elements', 'materialize' ),
		'description' => esc_html__( 'Displays latest post with list style', 'materialize'),
		'params'      => array(

			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Post Limit', 'materialize'),
				'param_name'  => 'post_limit',
				'std'       => '3',
				'admin_label' => true,
				'description' => esc_html__( 'Enter number of post to show', 'materialize')
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
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Show/Hide read more', 'materialize'),
				'param_name'  => 'show_readmore',
				'value'		  => array(
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
				'std'		  => esc_html__( 'Read Full Post', 'materialize'),
				'dependency'  => array(
					'element' => 'show_readmore',
					'value'   => array('yes')
				),
				'description' => esc_html__( 'You can change readmore text', 'materialize')
			),

			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Hover color style', 'materialize'),
				'param_name'  => 'hover_color',
				'value'		  => array(
					esc_html__('Theme color', 'materialize') => 'theme-bg',
					esc_html__('Pink', 'materialize') => 'pink',
					esc_html__('Purple', 'materialize') => 'purple',
					esc_html__('Red', 'materialize') => 'materialize-red',
					esc_html__('Indigo', 'materialize') => 'indigo',
					esc_html__('Blue', 'materialize') => 'blue',
					esc_html__('Green', 'materialize') => 'green',
					esc_html__('Lime', 'materialize') => 'lime',
					esc_html__('Orange', 'materialize') => 'orange',
					esc_html__('Brown', 'materialize') => 'brown'
				),
				'std' => 'pink',
				'admin_label' => true,
				'description' => esc_html__( 'Select a hover color', 'materialize')
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
		class WPBakeryShortCode_tt_Latest_Post_List extends WPBakeryShortCode {
		}
	}
endif;