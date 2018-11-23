<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

	vc_map( array(
		'name'        => esc_html__( 'TT Food Menu', 'materialize'),
		'base'        => 'tt_foodmenu',
		'icon'        => 'fa fa-cutlery',
		'category'    => esc_html__( 'TT Elements', 'materialize' ),
		'description' => esc_html__( 'Displays restaurant foodmenu post', 'materialize'),
		'params'      => array(
			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Show icon ?', 'materialize' ),
                'param_name'  => 'show_icon',
                'value' => array(
                    esc_html__('Yes', 'materialize') => 'yes',
                    esc_html__('No', 'materialize') => 'no'
                ),
                'std'		  => 'yes',
                'description' => esc_html__( 'If you do not like to show icon then select no', 'materialize' ),
            ),

			array(
                'type'        => 'dropdown',
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
				'type' => 'textfield',
				'heading' => esc_html__('Category Name', 'materialize'),
				'param_name' => 'cat_name',
				'admin_label'	=> true,
				'description' => esc_html__('Enter a category to show it\'s post', 'materialize')
		    ),

		    array(
                'type' 			=> 'param_group',
                'heading' 		=> esc_html__('Food Menu content', 'materialize'),
                'param_name' 	=> 'food_content',
                'description' 	=> esc_html__('Enter food content', 'materialize'),
                'group'			=> esc_html__('Contents', 'materialize'),
                'params' => array(
                    array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Title', 'materialize'),
						'param_name' => 'title',
						'admin_label'	=> true,
						'description' => esc_html__( 'Enter title', 'materialize' )
					),
                    array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Subtitle', 'materialize'),
						'param_name' => 'subtitle',
						'description' => esc_html__( 'Enter subtitle', 'materialize' )
					),
                    array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Price', 'materialize'),
						'param_name' => 'price',
						'admin_label'	=> true,
						'description' => esc_html__( 'Enter price', 'materialize' )
					),
                    array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Label', 'materialize'),
						'param_name' => 'label',
						'description' => esc_html__( 'Enter label', 'materialize' )
					)
                )
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
		class WPBakeryShortCode_TT_Foodmenu extends WPBakeryShortCode {
		}
	}
endif;