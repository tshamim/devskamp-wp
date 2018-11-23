<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

    vc_map( array(
        'name'        => esc_html__( 'TT Icon Content Box', 'materialize' ),
        'base'        => 'tt_icon_content_box',
        'icon'        => 'fa fa-id-badge',
        'category'    => esc_html__( 'TT Elements', 'materialize' ),
        'description' => esc_html__( 'Show off icon content with box', 'materialize' ),
        'params'      => array(
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Show icon ?', 'materialize' ),
                'param_name'  => 'show_icon',
                'value' => array(
                    esc_html__('select option', 'materialize') => '',
                    esc_html__('Yes', 'materialize') => 'yes',
                    esc_html__('No', 'materialize') => 'no'
                ),
                'admin_label' => true,
                'description' => esc_html__( 'If you do not like to show icon then select no', 'materialize' ),
            ),
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Select icon type ?', 'materialize' ),
                'param_name'  => 'icon_type',
                'value' => array(
                    esc_html__('select option', 'materialize') => '',
                    esc_html__('Fontawesome', 'materialize') => 'fontawesome-icon',
                    esc_html__('Flaticon', 'materialize') => 'flat-icon'
                ),
                'admin_label' => true,
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
                )
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
                )
            ),
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Icon color', 'materialize' ),
                'param_name'  => 'icon_color_option',
                'value'       => array(
                    esc_html__('Default Color', 'materialize') => '',
                    esc_html__('Theme Color', 'materialize')  =>'theme-color',
                    esc_html__('Custom Color', 'materialize')  =>'custom-color',
                ),
                'description' => esc_html__( 'If you change default icon color then select custom color', 'materialize' ),
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
                )
            ),
            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Title', 'materialize' ),
                'param_name'  => 'title',
                'holder' => 'h3',
                'description' => esc_html__( 'Enter title here', 'materialize' )
            ),
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Title color', 'materialize' ),
                'param_name'  => 'title_color_option',
                'value'       => array(
                    esc_html__('Default color', 'materialize') => '',
                    esc_html__('Theme color', 'materialize')  =>'theme-color',
                    esc_html__('Custom color', 'materialize')  =>'custom-color',
                ),
                'admin_label' => true,
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
                'heading'     => esc_html__( 'Text', 'materialize' ),
                'param_name'  => 'content',
                'description' => esc_html__( 'Enter content here.', 'materialize' )
            ),
            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Box height', 'materialize' ),
                'param_name'  => 'block_height',
                'description' => esc_html__( 'Enter block height in px, e.g: 270px', 'materialize' )
            ),
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Set custom link ?', 'materialize' ),
                'param_name'  => 'custom_link',
                'value'       => array(
                    esc_html__('No', 'materialize') => 'no',
                    esc_html__('Yes', 'materialize')  =>'yes',
                ),
                'admin_label' => true,
                'description' => esc_html__( 'If you want to set custom link then select yes, the link will appear on title', 'materialize' )
            ),
            array(
                'type'        => 'vc_link',
                'heading'     => esc_html__( 'Link', 'materialize' ),
                'param_name'  => 'link',
                'description' => esc_html__( 'Enter link or select page as link', 'materialize' ),
                'dependency'  => array(
                    'element' => 'custom_link',
                    'value'   => array( 'yes' )
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
        class WPBakeryShortCode_TT_Icon_Content_Box extends WPBakeryShortCode {
        }
    }

endif; // function_exists( 'vc_map' )