<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if( function_exists('vc_map') ) :

	vc_map( array(
        'name'        => esc_html__( 'Testimonial Carousel', 'materialize' ),
        'base'        => 'tt_testimonial',
        'icon'        => 'fa fa-quote-left',
        'category'    => esc_html__( 'TT Elements', 'materialize' ),
        'description' => esc_html__( 'Show off testimonial', 'materialize' ),
        'params'      => array(
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Carousel Type', 'materialize' ),
				'param_name'  => 'carousel_type',
				'admin_label' => true,
				'value' 	  => array(
					esc_html__('Bootstrap Carousel', 'materialize') => 'bootstrap-carousel',
					esc_html__('Flex Carousel', 'materialize') => 'flex-carousel'
				),
				'admin_label' => true,
				'description' => esc_html__( 'Select carousel type', 'materialize' )
			),

			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Carousel Style', 'materialize' ),
				'param_name'  => 'carousel_style',
				'admin_label' => true,
				'value' 	  => array(
					esc_html__('Client Thumb Circle', 'materialize') => 'client-thumb-circle',
					esc_html__('Client Thumb Square', 'materialize') => 'client-thumb-square',
					esc_html__('Client Thumb Grid', 'materialize') => 'client-thumb-grid',
					esc_html__('Client Thumb Half Grid', 'materialize') => 'client-thumb-half-grid'
				),
				'dependency'	=> array(
					'element'	=> 'carousel_type',
					'value'		=> array('flex-carousel')
					),
				'description' => esc_html__( 'Select carousel style', 'materialize' )
			),

			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Carousel style', 'materialize' ),
				'param_name'  => 'carousel_style2',
				'admin_label' => true,
				'value' 	  => array(
					esc_html__('Flat Testimonial', 'materialize') => 'carousel-style-one',
					esc_html__('Creative Testimonial', 'materialize') => 'carousel-style-two'
				),
				'dependency'	=> array(
					'element'	=> 'carousel_type',
					'value'		=> array('bootstrap-carousel')
					),
				'description' => esc_html__( 'Select carousel style', 'materialize' )
			),

			array(
                'type'          => 'param_group',
                'heading'       => esc_html__('Testimonial info', 'materialize'),
                'param_name'    => 'testimonial_info',
                'description'   => esc_html__('Enter testimonial info (click toggle row to input data)', 'materialize'),
                'group'         => 'Testimonial Info',
                'params' => array(
                    
                	array(
						'type'        => 'dropdown',
						'heading'     => esc_html__( 'Use photo?', 'materialize' ),
						'param_name'  => 'photo_option',
						'admin_label' => true,
						'value' 	  => array(
							esc_html__('No', 'materialize') => 'no',
							esc_html__('Yes', 'materialize') => 'yes'
						),
						'description' => esc_html__( 'If you want to use photo then select yes', 'materialize' )
					),

					array(
						'type'        => 'attach_image',
						'heading'     => esc_html__( 'Image', 'materialize' ),
						'param_name'  => 'client_image',
						'description' => esc_html__( 'Select images from media library, dimension: 100x100', 'materialize' ),
						'dependency'  => array(
							'element' => 'photo_option', 
							'value'   => array('yes')
						)
					),

					array(
						'type'        	=> 'textfield',
						'heading'     	=> esc_html__( 'Name', 'materialize' ),
						'param_name'  	=> 'client_name',
						'holder'		=> 'h3',
						'description' 	=> esc_html__( 'Enter name', 'materialize' )
					),

					array(
						'type'        	=> 'textfield',
						'heading'     	=> esc_html__( 'Organization/Designation', 'materialize' ),
						'param_name'  	=> 'client_org',
						'description' 	=> esc_html__( 'Enter Organization name or designation' , 'materialize' )
					),

					array(
						'type'        	=> 'textarea',
						'heading'     	=> esc_html__( 'Quote', 'materialize' ),
						'param_name'  	=> 'content',
						'description' 	=> esc_html__( 'Enter testimonial quote', 'materialize' )
					)
                ),
            ),

			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Client name text color', 'materialize' ),
				'param_name'  => 'client_text_color',
				'group' 	  => 'Color Options',
				'description' => esc_html__( 'Change client text color', 'materialize' )
			),

			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Client Organization/Designation text color', 'materialize' ),
				'param_name'  => 'client_org_text_color',
				'group' 	  => 'Color Options',
				'description' => esc_html__( 'Change client organization/designation text color', 'materialize' )
			),

			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Client quote text background color', 'materialize' ),
				'param_name'  => 'client_quote_text_bg_color',
				'group' 	  => 'Color Options',
				'description' => esc_html__( 'Change client quote text background color', 'materialize' )
			),

			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Client quote text color', 'materialize' ),
				'param_name'  => 'client_quote_text_color',
				'group' 	  => 'Color Options',
				'description' => esc_html__( 'Change client quote text color', 'materialize' )
			),

			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Quote Icon', 'materialize' ),
				'param_name'  => 'quote_icon',
				'description' => esc_html__( 'Select Quote Icon from media library, dimension: 100x100', 'materialize' )
			),

			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra class name', 'materialize' ),
				'param_name'  => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'materialize' )
			),

			array(
                'type' => 'css_editor',
                'heading' => esc_html__( 'Css', 'materialize' ),
                'param_name' => 'css',
                'group' => esc_html__( 'Design options', 'materialize' ),
            )
		)
	));

	if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_tt_Testimonial extends WPBakeryShortCode {
        }
    }
endif;