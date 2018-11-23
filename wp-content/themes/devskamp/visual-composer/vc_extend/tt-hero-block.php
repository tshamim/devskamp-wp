<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if( function_exists('vc_map') ) :

	vc_map( array(
		'name'          => esc_html__( 'Hero Block', 'materialize' ),
		'base'          => 'tt_hero_block',
		'icon'        	=> 'fa fa-align-center',
        'category'    	=> esc_html__( 'TT Elements', 'materialize' ),
        'description' 	=> esc_html__( 'Displays hero text block', 'materialize' ),
		'params'        => array(
			
			array(
				'type'        	=> 'textarea_html',
				'heading'     	=> esc_html__( 'Intro title', 'materialize' ),
				'param_name'  	=> 'content',
				'holder'		=> 'span',
				'class'			=> 'text-center',
				'description' 	=> esc_html__( 'Enter hero title and description here', 'materialize' )
			),

			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Alignment', 'materialize' ),
                'param_name'  => 'title_alignment',
                'value'       => array(
                    esc_html__('Select alignment', 'materialize') => '',
                    esc_html__('Left', 'materialize') => 'text-left',
                    esc_html__('Center', 'materialize')  =>'text-center',
                    esc_html__('Right', 'materialize')  =>'text-right' 
                ),
                'description' => esc_html__( 'Select content alignment', 'materialize' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Show learn more button ?', 'materialize' ),
                'param_name'  => 'show_button',
                'value'       => array(
                    esc_html__('Select an option', 'materialize') => '',
                    esc_html__('Yes', 'materialize') => 'yes',
                    esc_html__('No', 'materialize') => 'no'
                    
                ),
                'admin_label' => true,
                'description' => esc_html__( 'If you want to show button then select yes', 'materialize')
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Button text', 'materialize' ),
                'param_name'  => 'button_text',
                'value'       => esc_html__('Learn More', 'materialize' ),
                'description' => esc_html__( 'Change button text', 'materialize' ),
                'dependency' => array(
                    'element' => 'show_button', 
                    'value' => array('yes')
                )
            ),

            array(
                'type'        => 'vc_link',
                'heading'     => esc_html__( 'Button link', 'materialize' ),
                'param_name'  => 'custom_link',
                'description' => esc_html__( 'Enter custom link or select existing page as link', 'materialize' ),
                'dependency' => array(
                    'element' => 'show_button',
                    'value' => array('yes')
                )
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Button class', 'materialize' ),
                'param_name'  => 'button_class',
                'admin_label' => true,
                'description' => esc_html__( 'Use button class field to style particularly', 'materialize' ),
                'dependency' => array(
                    'element' => 'show_button', 
                    'value' => array('yes')
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
        class WPBakeryShortCode_tt_Hero_Block extends WPBakeryShortCode {
        }
    }
endif;