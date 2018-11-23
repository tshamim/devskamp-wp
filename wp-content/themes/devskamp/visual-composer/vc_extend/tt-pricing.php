<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

	vc_map( array(
        'name'        => esc_html__( 'TT Pricing Table', 'materialize' ),
        'base'        => 'tt_pricing',
        'icon'        => 'fa fa-usd',
        'category'    => esc_html__( 'TT Elements', 'materialize' ),
        'description' => esc_html__( 'Displays pricing table', 'materialize' ),
        'params'      => array(

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Background hover Color', 'materialize' ),
                'param_name'  => 'background_color_option',
                'value'       => array(
                    esc_html__('Theme color', 'materialize')  =>'brand-hover',
                    esc_html__('Custom color', 'materialize')  =>'custom-color',
                ),
                'admin_label' => true,
                'description' => esc_html__( 'If you change default backgroundhover color then select custom color', 'materialize' )
            ),

            array(
                'type'        => 'colorpicker',
                'heading'     => esc_html__( 'Select background hover color', 'materialize' ),
                'param_name'  => 'background_color',
                'description' => esc_html__( 'change background hover color', 'materialize' ),
                'dependency'  => array(
                    'element' => 'background_color_option',
                    'value'   => array( 'custom-color' )
                )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Price tag background color', 'materialize' ),
                'param_name'  => 'price_bg_option',
                'value'       => array(
                    esc_html__('Default color', 'materialize') => '',
                    esc_html__('Custom color', 'materialize')  =>'custom-color',
                ),
                'description' => esc_html__( 'If you change default background color of price then select custom color', 'materialize' )
            ),

            array(
                'type'        => 'colorpicker',
                'heading'     => esc_html__( 'Background color', 'materialize' ),
                'param_name'  => 'price_bg',
                'description' => esc_html__( 'Change price background color', 'materialize' ),
                'dependency'  => array(
                    'element' => 'price_bg_option',
                    'value'   => array( 'custom-color' )
                )
            ),

            array(
                 'type' => 'dropdown',
                 'heading' => esc_html__('Select grid column', 'materialize'),
                 'param_name' => 'grid_column',
                 'value' => array(
                      esc_html__('Select grid column', 'materialize') => '',
                      esc_html__('2 Columns', 'materialize') => '6',
                      esc_html__('3 Columns', 'materialize') => '4',
                      esc_html__('4 Columns', 'materialize') => '3',
                  ),
                 'admin_label' => true,
                 'description' => esc_html__('Select grid column', 'materialize'),
            ),

            array(
                'type' => 'param_group',
                'heading' => esc_html__('Table content', 'materialize'),
                'param_name' => 'table_content',
                'description' => esc_html__('Enter table content', 'materialize'),
                'group'       => 'Table info',
                'params' => array(
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__( 'Package name', 'materialize' ),
                        'param_name'  => 'package_name',
                        'admin_label' => true,
                        'group'       => 'Table info',
                        'description' => esc_html__( 'Enter package name', 'materialize' )
                    ),

                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__( 'Currency symbol', 'materialize' ),
                        'param_name'  => 'currency_symbol',
                        'value'       => '$',
                        'group'       => 'Table info',
                        'description' => esc_html__( 'Enter Package Rate Currency symbol, e.g: $ (enter only currency symbol)', 'materialize' )
                    ),


                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__( 'Package Rate', 'materialize' ),
                        'param_name'  => 'package_rate',
                        'admin_label' => true,
                        'group'       => 'Table info',
                        'description' => esc_html__( 'Enter Package Rate, e.g: 99 (enter only number)', 'materialize' )
                    ),

                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__( 'Package duration', 'materialize' ),
                        'param_name'  => 'package_duration',
                        'value'       => 'Day',
                        'group'       => 'Table info',
                        'description' => esc_html__( 'Enter Package Duration, e.g: monthly', 'materialize' )
                    ),

                    array(
                        'type'        => 'textarea_safe',
                        'heading'     => esc_html__( 'Pricing Plan Details', 'materialize' ),
                        'param_name'  => 'details',
                        'group'       => 'Table info',
                        'description' => esc_html__( 'Enter Yor Pricing Plan Details', 'materialize' )
                    ),

                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__( 'Show purchase button ?', 'materialize' ),
                        'param_name'  => 'purchase_button_show',
                        'value'       => array(
                            esc_html__( 'Yes', 'materialize' )              => 'yes',
                            esc_html__( 'No', 'materialize' )               => 'no'
                        ),
                        'group'       => 'Table info',
                        'description' => esc_html__( 'If you do not like to show purchase button then select no to hide', 'materialize' )
                    ),

                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__( 'Button Background Color', 'materialize' ),
                        'param_name'  => 'button_background_option',
                        'value'       => array(
                            esc_html__('Select Button Background Color', 'materialize') => 'btn-primary',
                            esc_html__('Theme color', 'materialize')  =>'btn-primary',
                            esc_html__('Custom color', 'materialize')  =>'custom-color',
                        ),
                        'description' => esc_html__( 'If you change default Button Background Color then select custom color', 'materialize' ),
                        'group'       => 'Table info',
                        'dependency'  => array(
                            'element' => 'purchase_button_show','purchase_button_show',
                            'value'   => array( 'yes' )
                        )
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__( 'Select Button Background Color', 'materialize' ),
                        'param_name'  => 'button_color',
                        'description' => esc_html__( 'change Button Background Color', 'materialize' ),
                        'dependency'  => array(
                            'element' => 'button_background_option',
                            'value'   => array( 'custom-color' )
                        ),
                        'group'       => 'Table info',
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__( 'Select Button text Color', 'materialize' ),
                        'param_name'  => 'button_text_color',
                        'description' => esc_html__( 'change Button text Color', 'materialize' ),
                        'dependency'  => array(
                            'element' => 'button_background_option',
                            'value'   => array( 'custom-color' )
                        ),
                        'group'       => 'Table info',
                    ),

                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__( 'Button Text', 'materialize' ),
                        'param_name'  => 'purchase_button_text',
                        'value'       => 'Buy Now',
                        'description' => esc_html__( 'Change Button Text', 'materialize' ),
                        'group'       => 'Table info',
                        'dependency'  => array(
                            'element' => 'purchase_button_show',
                            'value'   => array( 'yes' )
                        )
                    ),

                    array(
                        'type'        => 'vc_link',
                        'heading'     => esc_html__( 'Button Link', 'materialize' ),
                        'param_name'  => 'purchase_button_link',
                        'description' => esc_html__( 'Enter Button Link', 'materialize' ),
                        'group'       => 'Table info',
                        'dependency'  => array(
                            'element' => 'purchase_button_show',
                            'value'   => array( 'yes' )
                        )
                    )
                ),
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
        class WPBakeryShortCode_tt_Pricing extends WPBakeryShortCode {
        }
    }

endif; // function_exists( 'vc_map' )