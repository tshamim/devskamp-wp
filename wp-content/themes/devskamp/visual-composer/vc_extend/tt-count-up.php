<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if( function_exists('vc_map') ) :

	vc_map( array(
		'name'              => esc_html__( 'TT Counting', 'materialize' ),
		'base'              => 'tt_counts',
		'controls'          => 'full',
		'icon'              => 'fa fa-history',
		'show_settings_on_create'   => TRUE,
		'description'       => esc_html__( 'Display Counting', 'materialize' ),
		'as_parent'         => array( 'only' => 'tt_count' ),
		'content_element'   => TRUE,
		'category'          => esc_html__( 'TT Elements', 'materialize' ),
		'default_content'   => "[tt_count counted_number='' subtitle=''/]",
		'params'            => array(
			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Style', 'materialize' ),
				'param_name'  	=> 'style',
				'admin_label'	=> true,
				'value'			=> array(
					esc_html__('Default Style', 'materialize')	=> 'default-style',
                    esc_html__('Background Style', 'materialize')   => 'background-style',
                    esc_html__('Plus Box Style', 'materialize') => 'plusbox-style',
					esc_html__('Title Count Style', 'materialize')	=> 'title-style'
				),
				'description' 	=> esc_html__( 'Select style', 'materialize' )
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
		),
		'js_view'                 => 'VcColumnView',
	));


	vc_map( array(
		'name'                      => esc_html__( 'Single counting', 'materialize' ),
		'base'                      => 'tt_count',
		'content_element'           => true,
		'show_settings_on_create'   => TRUE,
		'as_child'                  => array( 'only' => 'tt_counts' ),
		'is_container'              => TRUE,
		'params'                    => array(
			
			array(
                'type'        => 'dropdown',
                'class'       => '',
                'heading'     => esc_html__( 'Show icon ?', 'materialize' ),
                'param_name'  => 'show_icon',
                'value' => array(
                    esc_html__('select option', 'materialize') => '',
                    esc_html__('Yes', 'materialize') => 'yes',
                    esc_html__('No', 'materialize') => 'no'
                ),
                'description' => esc_html__( 'If you do not like to show icon then select no', 'materialize' ),
            ),

			array(
                'type'        => 'dropdown',
                'class'       => '',
                'heading'     => esc_html__( 'Select icon type ?', 'materialize' ),
                'param_name'  => 'icon_type',
                'value' => array(
                    esc_html__('Fontawesome', 'materialize') => 'fontawesome-icon',
                    esc_html__('Flaticon', 'materialize') => 'flat-icon',
                    esc_html__('Material Icon', 'materialize') => 'material-icon'
                ),
                'description' => esc_html__( 'There are two icon types fontawesome and flaticons, choose your type', 'materialize' ),
                'dependency'  => array(
                    'element' => 'show_icon',
                    'value'   => array( 'yes' )
                )
            ),
            array(
                'type'       => 'iconpicker',
                'heading'    => esc_html__('Fontawesome', 'materialize'),
                'param_name' => 'fontawesome_icon',
                'settings'   => array(
                    'type' => 'fontawesome'
                ),
                'description' => esc_html__( 'Fontawesome list. Pickup your choice.', 'materialize'
                ),
                'dependency'  => array(
                    'element' => 'icon_type',
                    'value'   => array( 'fontawesome-icon' )
                ),
            ),

            array(
                'type'       => 'iconpicker',
                'heading'    => esc_html__('Material', 'materialize'),
                'param_name' => 'material_icon',
                'settings'   => array(
                    'type' => 'material'
                ),
                'description' => esc_html__( 'Material icon list. Pickup your choice.', 'materialize'
                ),
                'dependency'  => array(
                    'element' => 'icon_type',
                    'value'   => array( 'material-icon' )
                ),
            ),

            array(
                'type'       => 'iconpicker',
                'heading'    => esc_html__('Flaticon', 'materialize'),
                'param_name' => 'flat_icon',
                'settings'   => array(
                    'type' => 'flaticon'
                ),
                'description' => esc_html__( 'Flaticon list. Pickup your choice.', 'materialize'
                ),
                'dependency'  => array(
                    'element' => 'icon_type',
                    'value'   => array( 'flat-icon' )
                ),
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Icon color', 'materialize' ),
                'param_name'  => 'icon_color_option',
                'value'       => array(
                    esc_html__('Default Color', 'materialize') => '',
                    esc_html__('Theme Color', 'materialize')  =>'theme-color',
                    esc_html__('Custom Color', 'materialize')  =>'custom-color'
                ),
                'description' => esc_html__( 'If you change default icon color then select custom color', 'materialize' ),
                'dependency'  => array(
                    'element' => 'show_icon',
                    'value'   => array( 'yes' )
                )
            ),

            array(
                'type'        => 'colorpicker',
                'heading'     => esc_html__( 'Select color', 'materialize' ),
                'param_name'  => 'icon_color',
                'description' => esc_html__( 'change icon color', 'materialize' ),
                'dependency'  => array(
                    'element' => 'icon_color_option',
                    'value'   => array( 'custom-color' )
                ),
            ),

			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Counted Number', 'materialize' ),
				'param_name'  => 'counted_number',
				'admin_label'=> true,
				'description' => esc_html__( 'Put your counted number', 'materialize' )
			),

			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Counted number color', 'materialize' ),
                'param_name'  => 'counted_number_color_option',
                'value'       => array(
                    esc_html__('Default color', 'materialize') => '',
                    esc_html__('Custom color', 'materialize')  =>'custom-color',
                ),
                'description' => esc_html__( 'If you change default title color then select custom color', 'materialize' )
            ),

            array(
                'type'        => 'colorpicker',
                'heading'     => esc_html__( 'Select color', 'materialize' ),
                'param_name'  => 'counted_number_color',
                'description' => esc_html__( 'change counted number color', 'materialize' ),
                'dependency'  => array(
                    'element' => 'counted_number_color_option',
                    'value'   => array( 'custom-color' )
                ),
            ),

			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Subtitle', 'materialize' ),
				'param_name'  => 'subtitle',
				'admin_label' => true,
				'description' => esc_html__( 'Enter subtitle', 'materialize' )
			),

			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Title color', 'materialize' ),
                'param_name'  => 'title_color_option',
                'value'       => array(
                    esc_html__('Default color', 'materialize') => '',
                    esc_html__('Custom color', 'materialize')  =>'custom-color',
                ),
                'description' => esc_html__( 'If you change default title color then select custom color', 'materialize' )
            ),

            array(
                'type'        => 'colorpicker',
                'heading'     => esc_html__( 'Select color', 'materialize' ),
                'param_name'  => 'title_color',
                'description' => esc_html__( 'change title color', 'materialize' ),
                'dependency'  => array(
                    'element' => 'title_color_option',
                    'value'   => array( 'custom-color' )
                ),
            ),


            array(
                'type'        => 'colorpicker',
                'heading'     => esc_html__( 'Grid Background Color', 'materialize' ),
                'param_name'  => 'background_color',
                'description' => esc_html__( 'change background color', 'materialize' ),
            ),



			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Grid Class', 'materialize' ),
				'param_name'  => 'grid_class',
				'description' => esc_html__( 'Enter bootstrap grid class', 'materialize' ),
				'value' => 'col-sm-3',
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


	//Your 'container' content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_Tt_Counts extends WPBakeryShortCodesContainer {
		}
	}


	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Tt_Count extends WPBakeryShortCode {
		}
	}
endif;