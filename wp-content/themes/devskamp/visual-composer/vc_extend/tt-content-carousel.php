<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if( function_exists('vc_map') ) :

	vc_map( array(
		'name'                    => esc_html__( 'TT Content Carousel', 'materialize' ),
		'base'                    => 'tt_content_carousels',
		'icon'                    => 'fa fa-align-left',
		'description'             => esc_html__( 'Show off simple content carousel', 'materialize' ),
		'as_parent'               => array( 'only' => 'tt_content_carousel' ),
		'content_element' 		  => true,
    	'show_settings_on_create' => false,
		'category'                => esc_html__( 'TT Elements', 'materialize' ),
		'params'                  => array(
			// title
			array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__( 'Title', 'materialize' ),
				'param_name'  	=> 'title',
				'holder'      	=> 'h2',
				'description' 	=> esc_html__( 'Enter title', 'materialize' )
			),

			// design option
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
		),
		'js_view'                 => 'VcColumnView',
	));


	vc_map( array(
		'name'            => esc_html__( 'Add content', 'materialize' ),
		'base'            => 'tt_content_carousel',
		'as_child'        => array( 'only' => 'tt_content_carousels' ),
		'content_element' => true,
		'icon'            => 'fa fa-align-center',
		'class'			  => 'repeatable-content-wrap',
		'params'          => array(
			
			// title
			array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__( 'Title', 'materialize' ),
				'param_name'  	=> 'title',
				'holder'      	=> 'h3',
				'description' 	=> esc_html__( 'Enter title', 'materialize' )
			),

			// content
			array(
                'type'        => 'textarea_html',
                'heading'     => esc_html__( 'Content', 'materialize' ),
                'param_name'  => 'content',
                'description' => esc_html__( 'Enter carousel content here', 'materialize' )
            ),

			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Content alignment', 'materialize' ),
                'param_name'  => 'content_alignment',
                'value'       => array(
                    esc_html__('Select content alignment', 'materialize') => '',
                    esc_html__('Left', 'materialize') => 'text-left',
                    esc_html__('Center', 'materialize')  =>'text-center',
                    esc_html__('Right', 'materialize')  =>'text-right' 
                ),
                'std'		  => 'text-left',
                'admin_label'	=> true,
                'description' => esc_html__( 'Select content alignment', 'materialize' )
            ),

			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Active this slide ?', 'materialize' ),
                'param_name'  => 'active_class',
                'value'       => array(
                    esc_html__('Select an option', 'materialize') => '',
                    esc_html__('Yes', 'materialize') => 'active',
                    esc_html__('No', 'materialize')  =>''
                ),
                'admin_label'	=> true,
                'description' => esc_html__( 'If want to active active this slide then select yes, only one slide you need to active', 'materialize' )
            ),

            // design option
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

	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_tt_Content_Carousels extends WPBakeryShortCodesContainer {
		}
	}

	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_tt_Content_Carousel extends WPBakeryShortCode {
		}
	}
endif;