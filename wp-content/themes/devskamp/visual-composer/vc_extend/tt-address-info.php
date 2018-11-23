<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

    // Icon blog element
    vc_map( array(
        'name'        => esc_html__( 'TT Address Info', 'materialize' ),
        'base'        => 'tt_address_info',
        'icon'        => 'fa fa-map-marker',
        'category'    => esc_html__( 'TT Elements', 'materialize' ),
        'description' => esc_html__( 'Show off address information', 'materialize' ),
        'params'      => array(

            array(
                'type'        => 'dropdown',
                'class'       => '',
                'heading'     => esc_html__( 'Show info icon ?', 'materialize' ),
                'param_name'  => 'show_icon',
                'value' => array(
                    esc_html__('select option', 'materialize') => '',
                    esc_html__('Yes', 'materialize') => 'yes',
                    esc_html__('No', 'materialize') => 'no'
                ),
                'admin_label' => true,
                'description' => esc_html__( 'If you do not like to show info icon then select no', 'materialize' ),
            ),


            array(
                'type'        => 'dropdown',
                'class'       => '',
                'heading'     => esc_html__( 'Select icon type ?', 'materialize' ),
                'param_name'  => 'icon_type',
                'value' => array(
                    esc_html__('Fontawesome', 'materialize') => 'fontawesome-icon',
                    esc_html__('Flaticon', 'materialize') => 'flat-icon'
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
                'class'       => '',
                'heading'     => esc_html__( 'Icon position', 'materialize' ),
                'param_name'  => 'icon_position',
                'value' => array(
                    esc_html__('Left', 'materialize') => 'icon-position-left',
                    esc_html__('Top', 'materialize') => 'icon-position-top'
                ),
                'admin_label' => true,
                'description' => esc_html__( 'Change icon alignment using this option.', 'materialize'),
                'dependency'  => array(
                    'element' => 'show_icon',
                    'value'   => array( 'yes' )
                )
            ),
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Icon color', 'materialize' ),
                'param_name'  => 'icon_color_option',
                'value'       => array(
                    esc_html__('Default Color', 'materialize') => '',
                    esc_html__('Custom Color', 'materialize')  =>'custom-color',
                ),
                'description' => esc_html__( 'If you want to change default icon color then select custom color', 'materialize' ),
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
                'type'        => 'textarea_html',
                'heading'     => esc_html__( 'Address Info', 'materialize' ),
                'param_name'  => 'content',
                'description' => esc_html__( 'Enter address information here.', 'materialize' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Info color', 'materialize' ),
                'param_name'  => 'content_color_option',
                'value'       => array(
                    esc_html__('Default color', 'materialize') => '',
                    esc_html__('Custom color', 'materialize')  => 'custom-color',
                ),
                'std'         => 'default-color',
                'description' => esc_html__( 'If you want to change default information color then select custom color', 'materialize' )
            ),

            array(
                'type'        => 'colorpicker',
                'heading'     => esc_html__( 'Select color', 'materialize' ),
                'param_name'  => 'content_color',
                'description' => esc_html__( 'Change content color', 'materialize' ),
                'dependency'  => array(
                    'element' => 'content_color_option',
                    'value'   => array( 'custom-color' )
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
        class WPBakeryShortCode_TT_Address_Info extends WPBakeryShortCode {
        }
    }
endif;
