<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

    // Section title style element
    vc_map( array(
        'name'        => esc_html__( 'Section Title style', 'materialize' ),
        'base'        => 'tt_section_title',
        'icon'        => 'fa fa-align-center',
        'category'    => esc_html__( 'TT Elements', 'materialize' ),
        'description' => esc_html__( 'To customize section title style', 'materialize' ),
        'params'      => array(

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Title', 'materialize' ),
                'param_name'  => 'title',
                'holder'      => 'h3',
                'description' => esc_html__( 'Enter title here', 'materialize' )
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Title intro', 'materialize' ),
                'param_name'  => 'title_intro',
                'holder'      => 'span',
                'description' => esc_html__( 'Enter title intro text here, it will be displayed top of the title', 'materialize' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Alignment', 'materialize' ),
                'param_name'  => 'title_alignment',
                'value'       => array(
                    esc_html__('Left', 'materialize') => 'text-left',
                    esc_html__('Center', 'materialize')  =>'text-center',
                    esc_html__('Right', 'materialize')  =>'text-right' 
                ),
                'description' => esc_html__( 'Select title alignment', 'materialize' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Title Font Weight', 'materialize' ),
                'param_name'  => 'font_weight',
                'value'       => array(
                    esc_html__('Light', 'materialize') => '300',
                    esc_html__('Regular', 'materialize')  =>'400',
                    esc_html__('Medium', 'materialize')  =>'500',
                    esc_html__('Bold', 'materialize')  =>'700', 
                    esc_html__('Extra Bold', 'materialize')  =>'900'
                ),
                'std'       => '400',
                'description' => esc_html__( 'Select title text transform', 'materialize' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Title Text Transform', 'materialize' ),
                'param_name'  => 'text_transform',
                'value'       => array(
                    esc_html__('Default', 'materialize') => '',
                    esc_html__('Uppercase', 'materialize') => 'uppercase',
                    esc_html__('Capitalize', 'materialize')  =>'capitalize',
                    esc_html__('Lowercase', 'materialize')  =>'lowercase' 
                ),
                'std'         => 'uppercase',
                'description' => esc_html__( 'Select title text transform', 'materialize' )
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
                'dependency'  => array(
                    'element' => 'title_color_option',
                    'value'   => array( 'custom-color' )
                ),
            ),

            array(
                'type'        => 'textarea_html',
                'heading'     => esc_html__( 'Sub title description', 'materialize' ),
                'param_name'  => 'content',
                'holder'      => 'span',
                'description' => esc_html__( 'Description will appear on after title bottom separator', 'materialize' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Description color option', 'materialize' ),
                'param_name'  => 'description_color_option',
                'value'       => array(
                    esc_html__('Default color', 'materialize') => '',
                    esc_html__('Custom color', 'materialize')  =>'custom-color',
                ),
                'description' => esc_html__( 'If you change default description text color then select custom color', 'materialize' )
            ),

            array(
                'type'        => 'colorpicker',
                'heading'     => esc_html__( 'Custom color', 'materialize' ),
                'param_name'  => 'description_color',
                'description' => esc_html__( 'Change description text color', 'materialize' ),
                'dependency'  => array(
                    'element' => 'description_color_option',
                    'value'   => array( 'custom-color' )
                ),
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Separator show/hide', 'materialize' ),
                'param_name'  => 'section_separator',
                'value'       => array(
                    esc_html__('Select an option', 'materialize') => '',
                    esc_html__('Show', 'materialize') => 'yes',
                    esc_html__('Hide', 'materialize')  =>'no' ,
                    ),
                'description' => esc_html__( 'If you want to hide section separator then select hide', 'materialize' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Separator position', 'materialize' ),
                'param_name'  => 'separator_position',
                'value'       => array(
                    esc_html__('Select separator position', 'materialize') => '',
                    esc_html__('Between the title and description', 'materialize') => 'after_title',
                    esc_html__('Bottom of the description', 'materialize')  =>'after_description',
                ),
                'description' => esc_html__( 'You can change separator postion from here', 'materialize' ),
                'dependency'  => array(
                    'element' => 'section_separator',
                    'value'   => array( 'yes' )
                ),
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Separator color', 'materialize' ),
                'param_name'  => 'separator_color_option',
                'value'       => array(
                    esc_html__('Default color', 'materialize') => '',
                    esc_html__('Custom color', 'materialize')  =>'custom-color',
                ),
                'description' => esc_html__( 'If you change default separator color then select custom color', 'materialize' ),
                'dependency'  => array(
                    'element' => 'section_separator',
                    'value'   => array( 'yes' )
                ),
            ),

            array(
                'type'        => 'colorpicker',
                'heading'     => esc_html__( 'Custom color', 'materialize' ),
                'param_name'  => 'separator_color',
                'description' => esc_html__( 'change border color', 'materialize' ),
                'dependency'  => array(
                    'element' => 'separator_color_option',
                    'value'   => array( 'custom-color' )
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
        class WPBakeryShortCode_TT_Section_Title extends WPBakeryShortCode {
        }
    }
endif;