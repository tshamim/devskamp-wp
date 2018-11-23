<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

    vc_map( array(
        'name'                    => esc_html__( 'TT Icon Block', 'materialize' ),
        'base'                    => 'tt_icon_blocks',
        'icon'                    => 'fa fa-bell',
        'description'             => esc_html__( 'Show off text with icon', 'materialize' ),
        'as_parent'               => array( 'only' => 'tt_icon_block' ),
        'content_element'         => true,
        'show_settings_on_create' => true,
        'category'                => esc_html__( 'TT Elements', 'materialize' ),
        'params'                  => array(
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Select gid column', 'materialize'),
                'param_name' => 'grid_column',
                'value' => array(
                    esc_html__('Select grid column', 'materialize') => '',
                    esc_html__('No Columns', 'materialize') => '12',
                    esc_html__('2 Columns', 'materialize') => '6',
                    esc_html__('3 Columns', 'materialize') => '4',
                    esc_html__('4 Columns', 'materialize') => '3'
                ),
                'std'         => '4',
                'admin_label' => true,
                'description' => esc_html__('Select grid column', 'materialize'),
            ),


            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Choose Block Style', 'materialize'),
                'param_name' => 'featured_block_style',
                'value' => array(
                    esc_html__('Default Block Style', 'materialize') => 'default-block',
                    esc_html__('Outline Border Style', 'materialize') => 'outline-border',
                    esc_html__('Plus Box Style', 'materialize') => 'border-plusbox',
                    esc_html__('Animated Box Style', 'materialize') => 'animated-block',
                    esc_html__('Animated Box Style with carousel', 'materialize') => 'animated-carousel'
                ),
                'admin_label' => true,
                'description' => esc_html__('Select Featured Block Style', 'materialize'),
            ),


            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Block Background Hover', 'materialize'),
                'param_name' => 'block_hover_style',
                'value' => array(
                    esc_html__('No', 'materialize') => '',
                    esc_html__('Yes', 'materialize') => 'hover-block',
                ),
                'admin_label' => true,
                'description' => esc_html__('Select block hover background', 'materialize'),
            ),


            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Block height', 'materialize' ),
                'param_name'  => 'block_height',
                'description' => esc_html__( 'Enter block height in px, e.g: 350px', 'materialize' )
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
        ),
        'js_view'                 => 'VcColumnView',
    ));

    // Icon block element
    vc_map( array(
        'name'        => esc_html__( 'Add icon and details', 'materialize' ),
        'base'        => 'tt_icon_block',
        'icon'        => 'fa fa-align-center',
        'as_child'        => array( 'only' => 'tt_icon_blocks' ),
        'content_element' => true,
        'class'           => 'repeatable-content-wrap',

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
                'admin_label' => true,
                'description' => esc_html__( 'If you do not like to show icon then select no', 'materialize' ),
            ),

            array(
                'type'        => 'dropdown',
                'class'       => '',
                'heading'     => esc_html__( 'Icon Style', 'materialize' ),
                'param_name'  => 'icon_style',
                'value' => array(
                    esc_html__('Default Style', 'materialize') => 'icon-default',
                    esc_html__('Square Style', 'materialize') => 'icon-square',
                    esc_html__('Round Style', 'materialize') => 'icon-round',
                    esc_html__('Circle Style', 'materialize') => 'icon-circle'
                ),
                'std'         => 'icon-default',
                'admin_label' => true,
                'description' => esc_html__( 'Select an icon style', 'materialize' ),
                'dependency'  => array(
                    'element' => 'show_icon',
                    'value'   => array( 'yes' )
                )
            ),

            array(
                'type'        => 'dropdown',
                'class'       => '',
                'heading'     => esc_html__( 'Select icon type ?', 'materialize' ),
                'param_name'  => 'icon_type',
                'value' => array(
                    esc_html__('select option', 'materialize') => '',
                    esc_html__('Fontawesome', 'materialize') => 'fontawesome-icon',
                    esc_html__('Material', 'materialize') => 'material-icon',
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
                ),
            ),
            array(
                'type'       => 'iconpicker',
                'heading'    => esc_html__('Material', 'materialize'),
                'param_name' => 'material_icon',
                'settings'   => array(
                    'type' => 'material'
                ),
                'description' => esc_html__( 'Material icon list. Pickup your choice.', 'materialize'
                ),
                'dependency'  => array(
                    'element' => 'icon_type',
                    'value'   => array( 'material-icon' )
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
                    esc_html__('Select alginment', 'materialize') => '',
                    esc_html__('Left', 'materialize') => 'icon-position-left',
                    esc_html__('Right', 'materialize') => 'icon-position-right',
                    esc_html__('Top Center', 'materialize') => 'icon-position-center',
                    esc_html__('Top Left', 'materialize') => 'icon-position-top-left'
                    
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
                ),
            ),

            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Icon hover background color', 'materialize'),
                'param_name' => 'icon_hover_bg_color',
                'value' => array(
                    esc_html__('Select icon hover background color', 'materialize') => '',
                    esc_html__('Theme color', 'materialize') => 'icon-hover-default',
                    esc_html__('White color', 'materialize') => 'icon-hover-white',
                    esc_html__('Black color', 'materialize') => 'icon-hover-black'
                ),
                'admin_label' => true,
                'dependency'  => array(
                    'element' => 'icon_style',
                    'value'   => array( 'icon-square', 'icon-round', 'icon-circle' )
                ),
                'description' => esc_html__('Select icon hover background color', 'materialize'),
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Icon size', 'materialize' ),
                'param_name'  => 'icon_size',
                'description' => esc_html__( 'Enter icon size, e.g: 40px', 'materialize' ),
                'dependency'  => array(
                    'element' => 'show_icon',
                    'value'   => array( 'yes' )
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
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Title font size', 'materialize' ),
                'param_name'  => 'title_size',
                'description' => esc_html__( 'Enter title font size here, e.g: 20px', 'materialize' )
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Title bottom margin', 'materialize' ),
                'param_name'  => 'title_margin',
                'description' => esc_html__( 'Enter title bottom margin, e.g: 20px', 'materialize' )
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
                ),
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

    if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
        class WPBakeryShortCode_tt_Icon_Blocks extends WPBakeryShortCodesContainer {
        }
    }

    if ( class_exists( 'WPBakeryShortCode' ) ) {
        class WPBakeryShortCode_tt_Icon_Block extends WPBakeryShortCode {
        }
    }
endif;
