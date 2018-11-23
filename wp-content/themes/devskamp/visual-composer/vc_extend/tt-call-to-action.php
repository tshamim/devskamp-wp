<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

    vc_map( array(
        'name'        => esc_html__( 'TT Simple call to action', 'materialize' ),
        'base'        => 'tt_call_to_action',
        'icon'        => 'fa fa-align-center',
        'category'    => esc_html__( 'TT Elements', 'materialize' ),
        'description' => esc_html__( 'Simple call to action block', 'materialize' ),
        'params'      => array(

            // main title
            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Title', 'materialize' ),
                'param_name'  => 'title',
                'holder'      => 'h3',
                'description' => esc_html__( 'Enter title here', 'materialize' )
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Title font size', 'materialize' ),
                'param_name'  => 'title_font_size',
                'description' => esc_html__( 'Enter title font size in px', 'materialize' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Title text transform', 'materialize' ),
                'param_name'  => 'title_text_transform',
                'value'       => array(
                    esc_html__('Uppercase ', 'materialize') => 'text-uppercase',
                    esc_html__('Capitalize', 'materialize')  =>'text-capitalize',
                ),
                'description' => esc_html__( 'Choose Title Text Transform', 'materialize' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Title Font Style', 'materialize' ),
                'param_name'  => 'title_font_style',
                'value'       => array(
                    esc_html__('300 ', 'materialize') => '300',
                    esc_html__('400 ', 'materialize') => '400',
                    esc_html__('500', 'materialize')  =>'500',
                    esc_html__('700', 'materialize')  =>'700',
                    esc_html__('900', 'materialize')  =>'900',
                ),
                'std'         => '700',
                'description' => esc_html__( 'Choose Title Text Transform', 'materialize' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Title color option', 'materialize' ),
                'param_name'  => 'title_color_option',
                'value'       => array(
                    esc_html__('Default Color', 'materialize') => '',
                    esc_html__('Theme Color', 'materialize')  =>'theme-color',
                    esc_html__('Custom Color', 'materialize')  =>'custom-color',
                ),
                'description' => esc_html__( 'If you change default title color then select theme color or select any custom color', 'materialize' )
            ),

            array(
                'type'        => 'colorpicker',
                'heading'     => esc_html__( 'Custom color', 'materialize' ),
                'param_name'  => 'title_color',
                'description' => esc_html__( 'Change title color', 'materialize' ),
                'dependency'  => Array(
                    'element' => 'title_color_option',
                    'value'   => array( 'custom-color' )
                )
            ),

            // sub title
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Sub Title Position', 'materialize' ),
                'param_name'  => 'subtitle_position',
                "value" => array(
                    esc_html__('Top', 'materialize') => 'sub-top',
                    esc_html__('Bottom', 'materialize') => 'sub-bottom'
                ),
                'std'         => 'sub-bottom',
                'description' => esc_html__( 'Choose subtitle position Top or Bottom', 'materialize' )
            ),

            array(
                'type'        => 'textarea_html',
                'heading'     => esc_html__( 'Sub title description', 'materialize' ),
                'param_name'  => 'content',
                'holder'      => 'span',
                'description' => esc_html__( 'Description will appear on after title bottom separator', 'materialize' )
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Subtitle font size', 'materialize' ),
                'param_name'  => 'subtitle_font_size',
                'description' => esc_html__( 'Enter subtitle font size in px', 'materialize' )
            ),

            array(
                "type" => "dropdown",
                "heading" => esc_html__("Content alignment", 'materialize'),
                "param_name" => "content_alignment",
                "value" => array(
                    esc_html__('Left', 'materialize') => 'text-left',
                    esc_html__('Center', 'materialize') => 'text-center',
                    esc_html__('Right', 'materialize') => 'text-right'
                ),
                "description" => esc_html__("Select content alignment", 'materialize')
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
                "dependency" => Array(
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
                "dependency" => Array(
                    'element' => "button_visibility",
                    'value' => array('visible')
                )
            ),

            array(
                "type" => "dropdown",
                "heading" => esc_html__("Button style", 'materialize'),
                "param_name" => "button_style",
                "value" => array(
                    esc_html__('Primary', 'materialize') => 'btn-primary',
                    esc_html__('Pink', 'materialize') => 'btn-pink',
                    esc_html__('White', 'materialize') => 'btn-white',
                    esc_html__('Custom Color', 'materialize')  =>'custom-color',
                ),
                'group' => esc_html__('Button', 'materialize'),
                "description" => esc_html__("Select button position", 'materialize'),
                "dependency" => Array(
                    'element' => "button_visibility",
                    'value' => array('visible')
                )
            ),

            array(
                'type'        => 'colorpicker',
                'heading'     => esc_html__( 'Custom Background', 'materialize' ),
                'param_name'  => 'button_custom_bg',
                'group' => esc_html__('Button', 'materialize'),
                "dependency" => Array(
                    'element' => "button_style",
                    'value' => array('custom-color')
                ),
                'description' => esc_html__( 'Change button background color', 'materialize' ),
            ),


            array(
                "type" => "dropdown",
                "heading" => esc_html__("Button size", 'materialize'),
                "param_name" => "button_size",
                "value" => array(
                    esc_html__('Default', 'materialize') => '',
                    esc_html__('Small', 'materialize') => 'btn-sm',
                    esc_html__('Large', 'materialize') => 'btn-lg'
                ),
                "description" => esc_html__("Select button position", 'materialize'),
                'group' => esc_html__('Button', 'materialize'),
                "dependency" => Array(
                    'element' => "button_visibility",
                    'value' => array('visible')
                )
            ),

            array(
                "type" => "textfield",
                "heading" => esc_html__("Button top margin", 'materialize'),
                "param_name" => "button_top_margin",
                'group' => esc_html__('Button', 'materialize'),
                "description" => esc_html__("Enter button to margin in px", 'materialize'),
                "dependency" => Array(
                    'element' => "button_visibility",
                    'value' => array('visible')
                )
            ),

            array(
                "type" => "textfield",
                "heading" => esc_html__("Button bottom margin", 'materialize'),
                "param_name" => "button_bottom_margin",
                'group' => esc_html__('Button', 'materialize'),
                "description" => esc_html__("Enter button bottom margin in px", 'materialize'),
                "dependency" => Array(
                    'element' => "button_visibility",
                    'value' => array('visible')
                )
            ),

            array(
                "type" => "dropdown",
                "heading" => esc_html__("Button position", 'materialize'),
                "param_name" => "button_position",
                "value" => array(
                    esc_html__('-- Select --', 'materialize') => '',
                    esc_html__('Botton', 'materialize') => 'button-bottom',
                    esc_html__('Right', 'materialize') => 'button-right'
                ),
                'group' => esc_html__('Button', 'materialize'),
                "description" => esc_html__("Select button position", 'materialize'),
                "dependency" => Array(
                    'element' => "button_visibility",
                    'value' => array('visible')
                )
            ),

            array(
                'type' => 'css_editor',
                'heading' => esc_html__( 'Css', 'materialize' ),
                'param_name' => 'css',
                'group' => esc_html__( 'Design options', 'materialize' )
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
        class WPBakeryShortCode_TT_Call_To_Action extends WPBakeryShortCode {

        }

    }
    endif;
















