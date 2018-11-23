<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

    vc_map( array(
        'name'        => esc_html__( 'TT Case Study Block', 'materialize' ),
        'base'        => 'tt_case_study_block',
        'icon'        => 'fa fa-keyboard-o',
        'category'    => esc_html__( 'TT Elements', 'materialize' ),
        'description' => esc_html__( 'Show off simple case study block', 'materialize' ),
        'params'      => array(

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Title', 'materialize' ),
                'param_name'  => 'title',
                'holder' => 'h3',
                'description' => esc_html__( 'Enter intro title here', 'materialize' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Title color', 'materialize' ),
                'param_name'  => 'title_color_option',
                'value'       => array(
                    esc_html__('Default color', 'materialize') => '',
                    esc_html__('Custom color', 'materialize')  => 'custom-color',
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
                )
            ),

            array(
                'type'        => 'textarea_html',
                'heading'     => esc_html__( 'Content', 'materialize' ),
                'param_name'  => 'content',
                'description' => esc_html__( 'Enter content here.', 'materialize' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Content color', 'materialize' ),
                'param_name'  => 'content_color_option',
                'value'       => array(
                    esc_html__('Default color', 'materialize') => '',
                    esc_html__('Custom color', 'materialize')  => 'custom-color',
                ),
                'std'         => 'default-color',
                'description' => esc_html__( 'If you change default content color then select custom color', 'materialize' )
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
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Content Background', 'materialize' ),
                'param_name'  => 'content_background',
                'value'       => array(
                    esc_html__('Select background color', 'materialize') => '',
                    esc_html__('Theme Color', 'materialize') => 'theme-bg', 
                    esc_html__('Dark Color', 'materialize') => 'dark-bg',
                    esc_html__('Custom color', 'materialize')  => 'custom-color', 
                ),
                'description' => esc_html__( 'Select content background color', 'materialize' )
            ),

            array(
                'type'        => 'colorpicker',
                'heading'     => esc_html__( 'Select color', 'materialize' ),
                'param_name'  => 'content_background_color',
                'description' => esc_html__( 'Change content background color', 'materialize' ),
                'dependency'  => array(
                    'element' => 'content_background',
                    'value'   => array( 'custom-color' )
                )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Content position', 'materialize' ),
                'param_name'  => 'content_position',
                'value'       => array(
                    esc_html__('Select content position', 'materialize') => '',
                    esc_html__('Left section', 'materialize') => 'case-study-left',
                    esc_html__('Right section', 'materialize')  => 'case-study-right'
                ),
                'description' => esc_html__( 'Select content section position', 'materialize' )
            ),

			array(
                "type" => "dropdown",
                "heading" => esc_html__("Button visibility", 'materialize'),
                "param_name" => "button_visibility",
                "value" => array(
                    esc_html__('-- Select --', 'materialize') => '',
                    esc_html__('Visible', 'materialize') => 'visible',
                    esc_html__('Hidden', 'materialize') => 'hidden'
                ),
                'group' => esc_html__('Button', 'materialize'),
                "description" => esc_html__("Select button visibility option", 'materialize')
            ),

            array(
                "type" => "textfield",
                "heading" => esc_html__("Button text", 'materialize'),
                "param_name" => "button_text",
                "description" => esc_html__("Enter button text", 'materialize'),
                'group' => esc_html__('Button', 'materialize'),
                "dependency" => array(
                    'element' => "button_visibility",
                    'value' => array('visible')
                )
            ),

            array(
                "type" => "vc_link",
                "heading" => esc_html__("Button link", 'materialize'),
                "param_name" => "button_link",
                "description" => esc_html__("Enter button link", 'materialize'),
                'group' => esc_html__('Button', 'materialize'),
                "dependency" => array(
                    'element' => "button_visibility",
                    'value' => array('visible')
                )
            ),

            array(
                "type" => "dropdown",
                "heading" => esc_html__("Button style", 'materialize'),
                "param_name" => "button_style",
                "value" => array(
                    esc_html__('-- Select --', 'materialize') => '',
                    esc_html__('Primary', 'materialize') => 'btn-primary',
                    esc_html__('White', 'materialize') => 'btn-default',
                    esc_html__('Outline', 'materialize') => 'btn-outline',
                ),
                'group' => esc_html__('Button', 'materialize'),
                "description" => esc_html__("Select button position", 'materialize'),
                "dependency" => array(
                    'element' => "button_visibility",
                    'value' => array('visible')
                )
            ),

            array(
                "type" => "dropdown",
                "heading" => esc_html__("Button size", 'materialize'),
                "param_name" => "button_size",
                "value" => array(
                    esc_html__('-- Select --', 'materialize') => '',
                    esc_html__('Small', 'materialize') => 'btn-sm',
                    esc_html__('Normal', 'materialize') => 'btn-md',
                    esc_html__('Large', 'materialize') => 'btn-lg'
                ),
                "description" => esc_html__("Select button position", 'materialize'),
                'group' => esc_html__('Button', 'materialize'),
                "dependency" => array(
                    'element' => "button_visibility",
                    'value' => array('visible')
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
        class WPBakeryShortCode_TT_Case_Study_Block extends WPBakeryShortCode {
        }
    }
endif;
