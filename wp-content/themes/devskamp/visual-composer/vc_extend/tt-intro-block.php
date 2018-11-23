<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

    vc_map( array(
        'name'        => esc_html__( 'Intro Block', 'materialize' ),
        'base'        => 'tt_intro_block',
        'icon'        => 'fa fa-keyboard-o',
        'category'    => esc_html__( 'TT Elements', 'materialize' ),
        'description' => esc_html__( 'Introduction Block', 'materialize' ),
        'params'      => array(

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Intro Title', 'materialize' ),
                'param_name'  => 'title',
                'holder' => 'h3',
                'description' => esc_html__( 'Enter intro title here', 'materialize' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Intro Title color', 'materialize' ),
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
                'dependency'  => Array(
                    'element' => 'title_color_option',
                    'value'   => array( 'custom-color' )
                )
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
                'description' => esc_html__( 'Select content alignment', 'materialize' )
            ),


            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Content color', 'materialize' ),
                'param_name'  => 'content_color_option',
                'value'       => array(
                    esc_html__('Default color', 'materialize') => '',
                    esc_html__('Custom color', 'materialize')  =>'custom-color',
                ),
                'std'         => 'default-color',
                'description' => esc_html__( 'If you change default content color then select custom color', 'materialize' )
            ),

            array(
                'type'        => 'colorpicker',
                'heading'     => esc_html__( 'Select color', 'materialize' ),
                'param_name'  => 'content_color',
                'description' => esc_html__( 'Change content color', 'materialize' ),
                'dependency'  => Array(
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
                    esc_html__('Custom color', 'materialize')  =>'custom-color', 
                ),
                'description' => esc_html__( 'Select content background color', 'materialize' )
            ),

            array(
                'type'        => 'colorpicker',
                'heading'     => esc_html__( 'Select color', 'materialize' ),
                'param_name'  => 'content_background_color',
                'description' => esc_html__( 'Change content background color', 'materialize' ),
                'dependency'  => Array(
                    'element' => 'content_background',
                    'value'   => array( 'custom-color' )
                )
            ),


            array(
                'type'        => 'textarea_html',
                'heading'     => esc_html__( 'Text', 'materialize' ),
                'param_name'  => 'content',
                'description' => esc_html__( 'Enter content here.', 'materialize' )
            ),



            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Set custom link ?', 'materialize' ),
                'param_name'  => 'custom_link',
                'value'       => array(
                    esc_html__('No', 'materialize') => 'no',
                    esc_html__('Yes', 'materialize')  =>'yes',
                ),
                'description' => esc_html__( 'If you want to set custom link then select yes, the link will appear on title', 'materialize' )
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Readmore Text', 'materialize' ),
                'param_name'  => 'readmore_title',
                'holder' => 'span',
                'description' => esc_html__( 'Enter readmore text here', 'materialize' ),
                'dependency'  => Array(
                    'element' => 'custom_link',
                    'value'   => array( 'yes' )
                )
            ),


            array(
                'type'        => 'vc_link',
                'heading'     => esc_html__( 'Link', 'materialize' ),
                'param_name'  => 'link',
                'description' => esc_html__( 'Enter link or select page as link', 'materialize' ),
                'dependency'  => Array(
                    'element' => 'custom_link',
                    'value'   => array( 'yes' )
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
        class WPBakeryShortCode_tt_Intro_Block extends WPBakeryShortCode {
        }
    }
endif;
