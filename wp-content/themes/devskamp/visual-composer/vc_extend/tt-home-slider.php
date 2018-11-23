<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if( function_exists('vc_map') ) :

	// Fade Animation for title and subtitle
	$tt_css_animation = array(
		esc_html__('Select animation', 'materialize') 	=> '',
		esc_html__('fadeIn', 'materialize') 			=> 'fadeIn',
		esc_html__('fadeInDown', 'materialize') 		=> 'fadeInDown',
		esc_html__('fadeInDownBig', 'materialize') 		=> 'fadeInDownBig',
		esc_html__('fadeInLeft', 'materialize') 		=> 'fadeInLeft',
		esc_html__('fadeInLeftBig', 'materialize') 		=> 'fadeInLeftBig',
		esc_html__('fadeInRight', 'materialize') 		=> 'fadeInRight',
		esc_html__('fadeInRightBig', 'materialize') 	=> 'fadeInRightBig',
		esc_html__('fadeInUp', 'materialize') 			=> 'fadeInUp',
		esc_html__('fadeInUpBig', 'materialize') 		=> 'fadeInUpBig'
	);

	// animation delay
	$tt_animation_delay = array(
		esc_html__('Select delay option', 'materialize') 	=> '',
		esc_html__('Delay 300ms', 'materialize') 			=> 'delay-1',
		esc_html__('Delay 600ms', 'materialize') 			=> 'delay-2',
		esc_html__('Delay 1200ms', 'materialize') 			=> 'delay-3',
		esc_html__('Delay 1500ms', 'materialize') 			=> 'delay-4',
		esc_html__('Delay 1800ms', 'materialize') 			=> 'delay-5'
	);

	// TT home slider element
	vc_map( array(
		'name'                    => esc_html__( 'Home Slider', 'materialize' ),
		'base'                    => 'tt_home_slides',
		'icon'                    => 'fa fa-picture-o',
		'description'             => esc_html__( 'Slider for home page, but you can use it any where in the page', 'materialize' ),
		'as_parent'               => array( 'only' => 'tt_home_slide' ),
		'content_element' 		  => true,
    	'show_settings_on_create' => false,
		'category'                => esc_html__( 'TT Elements', 'materialize' ),
		'params'                  => array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra class name', 'materialize' ),
				'param_name'  => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'materialize' )
			),

			// design option
			array(
                'type' => 'css_editor',
                'heading' => esc_html__( 'Css', 'materialize' ),
                'param_name' => 'css',
                'group' => esc_html__( 'Design options', 'materialize' ),
            )
		),
		'js_view'                 => 'VcColumnView',
	));


	vc_map( array(
		'name'            => esc_html__( 'Slide', 'materialize' ),
		'base'            => 'tt_home_slide',
		'as_child'        => array( 'only' => 'tt_home_slides' ),
		'content_element' => true,
		'icon'            => 'fa fa-picture-o',
		'class'			  => 'repeatable-content-wrap',
		'params'          => array(
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Image', 'materialize' ),
				'param_name'  => 'slider_image',
				'description' => esc_html__( 'Select images from media library, dimension: min 1700x900', 'materialize' )
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
                'description' => esc_html__( 'Select content alignment', 'materialize' )
            ),


			// intro title
			array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__( 'Intro title', 'materialize' ),
				'param_name'  	=> 'intro-title',
				'admin_label'	=> true,
				'description' 	=> esc_html__( 'Enter intro title', 'materialize' ),
				'group' 		=> esc_html__( 'Intro Title', 'materialize' )
			),
			
			array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__( 'Font size', 'materialize' ),
				'param_name'  	=> 'intro-font-size',
				'admin_label'	=> true,
				'description' 	=> esc_html__( 'Enter intro font size in px, e.g: 75px', 'materialize' ),
				'group' 		=> esc_html__( 'Intro Title', 'materialize' )
			),
			
			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Intro title animation', 'materialize' ),
				'param_name'  	=> 'intro_title_animation',
				'admin_label'	=> true,
				'value'			=> $tt_css_animation,
				'description' 	=> esc_html__( 'Select animation for intro title, e.g: fadeInDown', 'materialize' ),
				'group' 		=> esc_html__( 'Intro Title', 'materialize' )
			),

			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Animation delay', 'materialize' ),
				'param_name'  	=> 'intro_title_ani_delay',
				'admin_label'	=> true,
				'value'			=> $tt_animation_delay,
				'description' 	=> esc_html__( 'Select animation delay for intro title, e.g: Delay 300ms', 'materialize' ),
				'group' 		=> esc_html__( 'Intro Title', 'materialize' )
			),

			// intro subtitle
			array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__( 'Intro subtitle', 'materialize' ),
				'param_name'  	=> 'intro-subtitle',
				'admin_label'	=> true,
				'description' 	=> esc_html__( 'Enter intro subtitle', 'materialize' ),
				'group' 		=> esc_html__( 'Intro Subtitle', 'materialize' )
			),
			
			array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__( 'Font size', 'materialize' ),
				'param_name'  	=> 'intro-subtitle-font-size',
				'admin_label'	=> true,
				'description' 	=> esc_html__( 'Enter intro subtitle font size in px, e.g: 25px', 'materialize' ),
				'group' 		=> esc_html__( 'Intro Subtitle', 'materialize' )
			),
			
			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Intro subtitle animation', 'materialize' ),
				'param_name'  	=> 'intro_subtitle_animation',
				'admin_label'	=> true,
				'value'			=> $tt_css_animation,
				'description' 	=> esc_html__( 'Select animation for intro subtitle, e.g: fadeInDown', 'materialize' ),
				'group' 		=> esc_html__( 'Intro Subtitle', 'materialize' )
			),

			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Animation delay', 'materialize' ),
				'param_name'  	=> 'intro_subtitle_ani_delay',
				'admin_label'	=> true,
				'value'			=> $tt_animation_delay,
				'description' 	=> esc_html__( 'Select animation delay for intro subtitle, e.g: Delay 300ms', 'materialize' ),
				'group' 		=> esc_html__( 'Intro Subtitle', 'materialize' )
			),

			// button
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
                'description' => esc_html__( 'If you want to show button then select yes', 'materialize'),
                'group' 		=> esc_html__( 'Learn More', 'materialize' )
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
                ),
                'group' 		=> esc_html__( 'Learn More', 'materialize' )
            ),

            array(
                'type'        => 'vc_link',
                'heading'     => esc_html__( 'Button link', 'materialize' ),
                'param_name'  => 'custom_link',
                'description' => esc_html__( 'Enter custom link or select existing page as link', 'materialize' ),
                'dependency' => array(
                    'element' => 'show_button',
                    'value' => array('yes')
                ),
                'group' 		=> esc_html__( 'Learn More', 'materialize' )
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
                ),
                'group' 		=> esc_html__( 'Learn More', 'materialize' )
            ),

            array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Button animation', 'materialize' ),
				'param_name'  	=> 'button_animation',
				'admin_label'	=> true,
				'value'			=> $tt_css_animation,
				'description' 	=> esc_html__( 'Select animation for button, e.g: fadeInDown', 'materialize' ),
				'group' 		=> esc_html__( 'Learn More', 'materialize' )
			),

			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Animation delay', 'materialize' ),
				'param_name'  	=> 'button_ani_delay',
				'admin_label'	=> true,
				'value'			=> $tt_animation_delay,
				'description' 	=> esc_html__( 'Select animation delay for button, e.g: Delay 300ms', 'materialize' ),
				'group' 		=> esc_html__( 'Learn More', 'materialize' )
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
		class WPBakeryShortCode_tt_Home_Slides extends WPBakeryShortCodesContainer {
		}
	}

	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_tt_Home_Slide extends WPBakeryShortCode {
		}
	}
endif;