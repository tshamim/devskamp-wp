<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

    // Section title style element
    vc_map( array(
        'name'        => esc_html__( 'TT Popup', 'materialize' ),
        'base'        => 'tt_popup',
        'icon'        => 'fa fa-expand',
        'category'    => esc_html__( 'TT Elements', 'materialize' ),
        'description' => esc_html__( 'Showing youtube video or vimeo video with popup', 'materialize' ),
        'params'      => array(

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Video style', 'materialize' ),
                'param_name'  => 'video_style',
                'admin_label' => true,
                'value'       => array(
                    esc_html__('Style one', 'materialize') => 'video-style-one',
                    esc_html__('Style two', 'materialize') => 'video-style-two',
                    esc_html__('Style three', 'materialize') => 'video-style-three'
                ),
                'admin_label' => true,
                'description' => esc_html__( 'Select video style', 'materialize' )
            ),       

            array(
                'type'        => 'attach_image',
                'heading'     => esc_html__( 'Cover Image', 'materialize' ),
                'param_name'  => 'cover_image',
                'description' => esc_html__( 'Upload cover image from media library', 'materialize' )
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Enter URL', 'materialize' ),
                'param_name'  => 'source_url',
                'admin_label' => true,
                'description' => esc_html__( 'Enter youtube, vimeo or map url', 'materialize' )
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Video Text part one', 'materialize' ),
                'param_name'  => 'video_text_one',
                'admin_label' => true,
                'description' => esc_html__( 'Enter video text part one', 'materialize' ),
                'dependency'  => array(
                        'element' => 'video_style', 
                        'value'   => array('video-style-two')
                    )
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Video Text part two', 'materialize' ),
                'param_name'  => 'video_text_two',
                'admin_label' => true,
                'description' => esc_html__( 'Enter video text part two', 'materialize' ),
                'dependency'  => array(
                        'element' => 'video_style', 
                        'value'   => array('video-style-two')
                    )
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Video Title', 'materialize' ),
                'param_name'  => 'video_title',
                'admin_label' => true,
                'description' => esc_html__( 'Enter Video Title', 'materialize' ),
                'dependency'  => array(
                        'element' => 'video_style', 
                        'value'   => array('video-style-three')
                    )
            ),

            array(
                'type'        => 'textarea_html',
                'heading'     => esc_html__( 'Video Content', 'materialize' ),
                'param_name'  => 'content',
                'admin_label' => true,
                'description' => esc_html__( 'Enter Video Content', 'materialize' ),
                'dependency'  => array(
                        'element' => 'video_style', 
                        'value'   => array('video-style-three')
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
        class WPBakeryShortCode_tt_Popup extends WPBakeryShortCode {
        }
    }
endif;
