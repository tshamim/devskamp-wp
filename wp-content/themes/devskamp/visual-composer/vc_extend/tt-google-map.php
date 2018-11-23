<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

    // TT Google mp element
    vc_map( array(
        'name'        => esc_html__( 'TT Google map', 'materialize' ),
        'base'        => 'tt_google_map',
        'icon'        => 'fa fa-map-marker',
        'category'    => esc_html__( 'TT Elements', 'materialize' ),
        'description' => esc_html__( 'Custom google map', 'materialize' ),
        'params'      => array(
            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Extra class name', 'materialize' ),
                'param_name'  => 'el_class',
                'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'materialize' )
            ),
            array(
                'type'          => 'textfield',
                'heading'       => esc_html__( 'Map Height', 'materialize' ),
                'param_name'    => 'map_height',
                'admin_label'   => true,
                'value'         => '450px',
                'group'         => 'Map Settings',
                'description'   => esc_html__( 'Enter map height in px, e.g: 450px', 'materialize' )
            ),

            array(
                'type'          => 'textfield',
                'heading'       => esc_html__( 'Zoom', 'materialize' ),
                'param_name'    => 'map_zoom',
                'admin_label'   => true,
                'value'         => '14',
                'group'         => 'Map Settings',
                'description'   => esc_html__( 'Enter map zoom', 'materialize' )
            ),

            array(
                'type'          => 'param_group',
                'heading'       => esc_html__('Map info', 'materialize'),
                'param_name'    => 'map_content',
                'group'         => 'Map info',
                'description'   => esc_html__('Enter map info', 'materialize'),
                'params' => array(
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__( 'Latitude', 'materialize' ),
                        'param_name'  => 'tt_latitude',
                        'admin_label' => true,
                        'description' => esc_html__( 'Enter address latitude number, If you unable to find latitude and longitude of your address. Please visit http://www.latlong.net/convert-address-to-lat-long.html you can easily generate.', 'materialize' )
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__( 'Longitude', 'materialize' ),
                        'param_name'  => 'tt_longitude',
                        'admin_label' => true,
                        'description' => esc_html__( 'Enter address longitude number', 'materialize' )
                    ),
                    array(
                        'type'        => 'textarea_safe',
                        'heading'     => esc_html__( 'Info content', 'materialize' ),
                        'param_name'  => 'info_content',
                        'description' => esc_html__( 'Enter info content here', 'materialize' )
                    ),
                    array(
                        'type'        => 'attach_image',
                        'heading'     => esc_html__( 'Map marker', 'materialize' ),
                        'param_name'  => 'map_marker',
                        'description' => esc_html__( 'Upload map marker from media library', 'materialize' )
                    )
                ),
            ),

            array(
                'type'              => 'colorpicker',
                'heading'           => esc_html__( 'Landscape color', 'materialize' ),
                'param_name'        => 'landscape_color',
                'group'             => esc_html__( 'Color options', 'materialize' ),
                'description'       => esc_html__( 'Change the map landscape color', 'materialize' )
            ),

            array(
                'type'              => 'textfield',
                'heading'           => esc_html__( 'Landscape color opacity', 'materialize' ),
                'param_name'        => 'landscape_color_opacity',
                'group'             => esc_html__( 'Color options', 'materialize' ),
                'std'               => '10',
                'description'       => esc_html__( 'Change the map landscape color opacity value', 'materialize' )
            ),

            array(
                'type'              => 'colorpicker',
                'heading'           => esc_html__( 'Water color', 'materialize' ),
                'param_name'        => 'water_color',
                'group'             => esc_html__( 'Color options', 'materialize' ),
                'description'       => esc_html__( 'Change the map water color', 'materialize' )
            ),

            array(
                'type'              => 'textfield',
                'heading'           => esc_html__( 'Water color opacity', 'materialize' ),
                'param_name'        => 'water_color_opacity',
                'group'             => esc_html__( 'Color options', 'materialize' ),
                'std'               => '10',
                'description'       => esc_html__( 'Change the map water color opacity value', 'materialize' )
            ),

            array(
                'type' => 'css_editor',
                'heading' => esc_html__( 'Css', 'materialize' ),
                'param_name' => 'css',
                'group' => esc_html__( 'Design options', 'materialize' ),
            )
        )
    ));

    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_tt_Google_Map extends WPBakeryShortCode {
        }
    }
endif;