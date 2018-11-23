<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if( function_exists('vc_map') ) :

	// TT Carousel element
	vc_map( array(
        'name'        => esc_html__( 'TT Carousel', 'materialize' ),
        'base'        => 'tt_carousel',
        'icon'        => 'fa fa-picture-o',
        'category'    => esc_html__( 'TT Elements', 'materialize' ),
        'description' => esc_html__( 'Show off Carousel', 'materialize' ),
        'params'      => array(

        	array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Carousel Style', 'materialize' ),
				'param_name'  => 'carousel_style',
				'value' 	  => array(
					esc_html__('Style one', 'materialize') => 'style-one',
					esc_html__('Style two', 'materialize') => 'style-two'
				),
				'admin_label' => true,
				'description' => esc_html__( 'If you want to use photo then select yes', 'materialize' )
			),

        	array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Carousel number visibility', 'materialize' ),
				'param_name'  => 'number_visibility',
				'value' 	  => array(
					esc_html__('Show', 'materialize') => 'number-show',
					esc_html__('Hide', 'materialize') => 'number-hide'
				),
				'admin_label' => true,
				'std'			=> 'number-hide',
				'dependency'  => array(
					'element'	=> 'carousel_style',
					'value'		=> array('style-two')
				),
				'description' => esc_html__( 'If you want hide number then select hide', 'materialize' )
			),

			array(
                'type'          => 'param_group',
                'heading'       => esc_html__('Carousel info', 'materialize'),
                'param_name'    => 'carousel_info',
                'description'   => esc_html__('Enter Carousel info (click toggle row to input data)', 'materialize'),
                'group'         => 'Carousel Info',
                'params' => array(
                    
                	array(
						'type'        => 'dropdown',
						'heading'     => esc_html__( 'Use photo?', 'materialize' ),
						'param_name'  => 'photo_option',
						'admin_label' => true,
						'group'       => 'Carousel info',
						'value' 	  => array(
							esc_html__('No', 'materialize') => 'no',
							esc_html__('Yes', 'materialize') => 'yes'
						),
						'description' => esc_html__( 'If you want to use photo then select yes', 'materialize' )
					),

					array(
						'type'        => 'attach_image',
						'heading'     => esc_html__( 'Image', 'materialize' ),
						'param_name'  => 'carousel_image',
						'group'       => 'Carousel info',
						'description' => esc_html__( 'Select images from media library, dimension: 100x100', 'materialize' ),
						'dependency'  => array(
							'element' => 'photo_option', 
							'value'   => array('yes')
						)
					),

					array(
						'type'        	=> 'textfield',
						'heading'     	=> esc_html__( 'Carousel Title', 'materialize' ),
						'param_name'  	=> 'car_title',
						'holder'		=> 'h3',
						'group'       => 'Carousel info',
						'description' 	=> esc_html__( 'Enter Title', 'materialize' )
					),

					array(
						'type'        	=> 'textarea',
						'heading'     	=> esc_html__( 'Carousel Content', 'materialize' ),
						'param_name'  	=> 'car_content',
						'group'       => 'Carousel info',
						'description' 	=> esc_html__( 'Enter Carousel Content', 'materialize' )
					),

                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__( 'Show button ?', 'materialize' ),
                        'param_name'  => 'button_show',
                        'value'       => array(
                            esc_html__( 'Yes', 'materialize' )              => 'yes',
                            esc_html__( 'No', 'materialize' )               => 'no'
                        ),
                        'group'       => 'Carousel info',
                        'description' => esc_html__( 'If you do not like to show button then select no to hide', 'materialize' )
                    ),

                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__( 'Button Text', 'materialize' ),
                        'param_name'  => 'button_text',
                        'value'       => 'View Case Study',
                        'description' => esc_html__( 'Change Button Text', 'materialize' ),
                        'group'       => 'Carousel info',
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
                        'group'       => 'Carousel info',
                        'dependency'  => array(
                            'element' => 'button_show',
                            'value'   => array( 'yes' )
                        )
                    )					
                ),
            ),

			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Carousel title color', 'materialize' ),
				'param_name'  => 'car_title_color',
				'group' 	  => 'Color Options',
				'description' => esc_html__( 'Change Carousel title color', 'materialize' )
			),

			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Carousel content text color', 'materialize' ),
				'param_name'  => 'car_content_color',
				'group' 	  => 'Color Options',
				'description' => esc_html__( 'Change Carousel content text color', 'materialize' )
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
        class WPBakeryShortCode_TT_Carousel extends WPBakeryShortCode {
        }
    }

endif;