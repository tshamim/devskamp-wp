<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

    vc_map( array(
        'name'        => __( 'Work Process', 'materialize' ),
        'base'        => 'tt_workprocess',
        'icon'        => 'fa fa-ellipsis-h',
        'category'    => __( 'TT Elements', 'materialize' ),
        'description' => __( 'Show off work process', 'materialize' ),
        'params'      => array(

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
                    esc_html__('select option', 'materialize') => '',
                    esc_html__('Fontawesome', 'materialize') => 'fontawesome-icon',
                    esc_html__('Flaticon', 'materialize') => 'flat-icon'
                ),
                'description' => esc_html__( 'There are two icon types fontawesome and flaticons, choose your type', 'materialize' ),
                'dependency'  => Array(
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
                'dependency'  => Array(
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
                'dependency'  => Array(
                    'element' => 'icon_type',
                    'value'   => array( 'flat-icon' )
                ),
            ),

            array(
                'type'        => 'textfield',
                'heading'     => __( 'Title', 'materialize' ),
                'param_name'  => 'title',
                'holder'      => 'h3',
                'class'       => 'text-center',
                'description' => __( 'Enter title here', 'materialize' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => __( 'Change color ?', 'materialize' ),
                'param_name'  => 'change_color',
                'value'       => array(
                    __('No', 'materialize') => 'no',
                    __('Yes', 'materialize') => 'yes'
                ),
                'description' => __( 'If you change background and text color then select yes', 'materialize' )
            ),

            array(
                'type'        => 'colorpicker',
                'heading'     => __( 'Background color', 'materialize' ),
                'param_name'  => 'bg_color',
                'description' => __( 'Change process box background color', 'materialize' ),
                'dependency' => Array(
                    'element' => 'change_color', 
                    'value' => array('yes')
                )
            ),

            array(
                'type'        => 'colorpicker',
                'heading'     => __( 'Text color', 'materialize' ),
                'param_name'  => 'text_color',
                'description' => __( 'Change text color', 'materialize' ),
                'dependency' => Array(
                    'element' => 'change_color', 
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
                'heading'     => __( 'Extra class name', 'materialize' ),
                'param_name'  => 'el_class',
                'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'materialize' )
            ),
        )
    ));


    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_TT_Workprocess extends WPBakeryShortCode {
        }
    }
endif;
