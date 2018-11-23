<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

    vc_map( array(
        'name'        => esc_html__( 'TT Process', 'materialize' ),
        'base'        => 'tt_process',
        'icon'        => 'fa fa-ellipsis-h',
        'category'    => esc_html__( 'TT Elements', 'materialize' ),
        'description' => esc_html__( 'Show off icon content with box', 'materialize' ),
        'params'      => array(
            
            array(
                'type'          => 'param_group',
                'heading'       => esc_html__('Process Info', 'materialize'),
                'param_name'    => 'process_info',
                'description'   => esc_html__('Enter process info', 'materialize'),
                'group'         => 'Process Info',
                'params' => array(
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__( 'Process Number', 'materialize' ),
                        'param_name'  => 'process_number',
                        'admin_label' => true,
                        'description' => esc_html__( 'Enter your process number', 'materialize' )
                    ), 

                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__( 'Process Number Color', 'materialize' ),
                        'param_name'  => 'process_number_color_option',
                        'group'       => 'Color Options',
                        'value'       => array(
                            esc_html__('Default color', 'materialize') => '',
                            esc_html__('Theme color', 'materialize')  =>'theme-color',
                            esc_html__('Custom color', 'materialize')  =>'custom-color',
                        ),
                        'admin_label' => true,
                        'description' => esc_html__( 'If you change default process number color then select custom color', 'materialize' )
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__( 'Select process number color', 'materialize' ),
                        'param_name'  => 'process_number_color',
                        'description' => esc_html__( 'change process number color', 'materialize' ),
                        'dependency'  => array(
                            'element' => 'process_number_color_option',
                            'value'   => array( 'custom-color' )
                        )
                    ),                                       

                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__( 'Process Title', 'materialize' ),
                        'param_name'  => 'process_title',
                        'admin_label' => true,
                        'description' => esc_html__( 'Enter your process title', 'materialize' )
                    ),

                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__( 'Process Title Color', 'materialize' ),
                        'param_name'  => 'title_color_option',
                        'group'       => 'Color Options',
                        'value'       => array(
                            esc_html__('Default color', 'materialize') => '',
                            esc_html__('Theme color', 'materialize')  =>'theme-color',
                            esc_html__('Custom color', 'materialize')  =>'custom-color',
                        ),
                        'admin_label' => true,
                        'description' => esc_html__( 'If you change default process title color then select custom color', 'materialize' )
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__( 'Process Title color', 'materialize' ),
                        'param_name'  => 'process_title_color',
                        'description' => esc_html__( 'change Title color', 'materialize' ),
                        'dependency'  => array(
                            'element' => 'title_color_option',
                            'value'   => array( 'custom-color' )
                        )
                    ),  

                    array(
                        'type'        => 'textarea',
                        'heading'     => esc_html__( 'Process Content', 'materialize' ),
                        'param_name'  => 'process_content',
                        'description' => esc_html__( 'Enter process content here.', 'materialize' )
                    ),                                      

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
        class WPBakeryShortCode_TT_Process extends WPBakeryShortCode {
        }
    }

endif; // function_exists( 'vc_map' )