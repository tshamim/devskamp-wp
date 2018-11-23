<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

    // TT Portfolio element
    vc_map( array(
        'name'        => esc_html__( 'TT Portfolio', 'materialize' ),
        'base'        => 'tt_portfolio',
        'icon'        => 'fa fa-th',
        'category'    => esc_html__( 'TT Elements', 'materialize' ),
        'description' => esc_html__( 'To showcase your portfolio with grid view', 'materialize' ),
        'params'      => array(
            
            // style
            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Style', 'materialize' ),
                'param_name'    => 'portfolio_style',
                'value'         => array(
                    esc_html__('Boxed style', 'materialize')      => 'boxed-style',
                    esc_html__('Card style', 'materialize')       => 'card-style',
                    esc_html__('Title style', 'materialize')     => 'title-style',
                    esc_html__('Masonry style', 'materialize')     => 'masonry-style',
                    esc_html__('Food menu style', 'materialize')     => 'foodmenu-style'
                ),
                'std'           => 'boxed-style',
                'admin_label'   => true,
                'description'   => esc_html__( 'Select porfolio style', 'materialize' )
            ),

            array(
                'type'          => 'textfield',
                'heading'       => esc_html__('Post Limit', 'materialize'),
                'param_name'    => 'post_limit',
                'admin_label'   => true,
                'value'         => -1,
                'description'   => esc_html__('Put the number of posts to show, -1 for no limit', 'materialize'),
            ),

            array(
                'type'          => 'textfield',
                'heading'       => esc_html__('Word Limit', 'materialize'),
                'param_name'    => 'word_limit',
                'admin_label'   => true,
                'value'         => '15',
                'description'   => esc_html__('Put the number of word to show', 'materialize'),
                'dependency'    => array(
                    'element'   => 'portfolio_style',
                    'value'     => array('card-style')
                )
            ),

            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Grid column', 'materialize' ),
                'param_name'    => 'grid_column',
                'value'         => array(
                    esc_html__('2 Columns', 'materialize') => 6,
                    esc_html__('3 Columns', 'materialize') => 4,
                    esc_html__('4 Columns', 'materialize') => 3,
                    esc_html__('5 Columns', 'materialize') => 5,
                    esc_html__('6 Columns', 'materialize') => 2,
                ),
                'std'           => 4,
                'description'   => esc_html__( 'Select post grid column', 'materialize' ),
            ),

            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Grid padding', 'materialize' ),
                'param_name'    => 'grid_padding',
                'value'         => array(
                    esc_html__('Yes', 'materialize') => '',
                    esc_html__('No', 'materialize')  =>'no-padding' ,
                ),
                'admin_label'   => true,
                'description'   => esc_html__( 'Grid padding will appear between item', 'materialize' ),
            ),

            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Title alignment', 'materialize' ),
                'param_name'    => 'title_alignment',
                'value'         => array(
                    esc_html__('Left', 'materialize')      => 'text-left',
                    esc_html__('Center', 'materialize')       => 'text-center',
                    esc_html__('Right', 'materialize')     => 'text-right'
                ),
                'std'           => 'text-center',
                'dependency'    => array(
                    'element'   => 'portfolio_style',
                    'value'     => array('title-style', 'foodmenu-style')
                ),
                'description'   => esc_html__( 'Select title alignment', 'materialize' )
            ),

            // Filter options
            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Filter visibility ', 'materialize' ),
                'param_name'    => 'filter_visibility',
                'value'         => array(
                    esc_html__('Visible', 'materialize') => 'visible',
                    esc_html__('Hidden', 'materialize')  =>'hidden',
                ),
                'std'           => 'visible',
                'admin_label'   => true,
                'group'         => esc_html__( 'Filter style', 'materialize' ),
                'description'   => esc_html__( 'If you do not like to show filter then select hidden', 'materialize' )
            ),

            array(
                'type'          => 'textfield',
                'heading'       => esc_html__( 'Filter default text', 'materialize' ),
                'param_name'    => 'default_text',
                'value'         => esc_html__('All', 'materialize'),
                'group'         => esc_html__( 'Filter style', 'materialize' ),
                'description'   => esc_html__( 'Change filter default text', 'materialize' ),
                'dependency'    => array(
                    'element'   => 'filter_visibility',
                    'value'     => array('visible')
                )
            ),

            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Filter style', 'materialize' ),
                'param_name'    => 'filter_style',
                'value'         => array(
                    esc_html__('Square', 'materialize')      => 'filter-square',
                    esc_html__('Round', 'materialize')       => 'filter-round',
                    esc_html__('Rounded', 'materialize')     => 'filter-rounded',
                    esc_html__('Outline', 'materialize')     => 'filter-outline',
                    esc_html__('Transparent', 'materialize') => 'filter-transparent'
                ),
                'std'           => 'filter-rounded',
                'admin_label'   => true,
                'group'         => esc_html__( 'Filter style', 'materialize' ),
                'description'   => esc_html__( 'Select filter style', 'materialize' ),
                'dependency'    => array(
                    'element'   => 'filter_visibility',
                    'value'     => array('visible')
                )
            ),

            // Filter alignment
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Filter alignment', 'materialize' ),
                'param_name'  => 'filter_alignment',
                'value'       => array(
                    esc_html__('Left', 'materialize') => 'text-left',
                    esc_html__('Center', 'materialize')  =>'text-center',
                    esc_html__('Right', 'materialize')  =>'text-right' 
                ),
                'std'         => 'text-center',
                'admin_label'   => true,
                'group'         => esc_html__( 'Filter style', 'materialize' ),
                'description' => esc_html__( 'Select filter alignment', 'materialize' ),
                'dependency'    => array(
                    'element'   => 'filter_visibility',
                    'value'     => array('visible')
                )
            ),

            // Filter color
            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Filter color', 'materialize' ),
                'param_name'    => 'filter_color',
                'value'         => array(
                    esc_html__('Default color', 'materialize') => 'brand-filter',
                    esc_html__('Dark color', 'materialize')    => 'dark-color'
                ),
                'std'           => 'brand-filter',
                'admin_label'   => true,
                'group'         => esc_html__( 'Filter style', 'materialize' ),
                'description'   => esc_html__( 'Select filter color', 'materialize' ),
                'dependency'    => array(
                    'element'   => 'filter_visibility',
                    'value'     => array('visible')
                )
            ),

            // visibility option
            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Title visibility', 'materialize' ),
                'param_name'    => 'title_visibility',
                'value'         => array(
                    esc_html__('Visible', 'materialize') => 'visible',
                    esc_html__('Hidden', 'materialize')  =>'hidden' ,
                ),
                'std'           => 'visible',
                'group'         => esc_html__( 'Visibility options', 'materialize' ),
                'description'   => esc_html__( 'If do not like to show title then select hidden', 'materialize' )
            ),

            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Category visibility', 'materialize' ),
                'param_name'    => 'category_visibility',
                'value'         => array(
                    esc_html__('Visible', 'materialize') => 'visible',
                    esc_html__('Hidden', 'materialize')  =>'hidden' ,
                ),
                'std'           => 'visible',
                'group'         => esc_html__( 'Visibility options', 'materialize' ),
                'description'   => esc_html__( 'If do not like to show category then select hidden', 'materialize' )
            ),

            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Overlay button visibility', 'materialize' ),
                'param_name'    => 'popup_button_visibility',
                'value'         => array(
                    esc_html__('Visible', 'materialize') => 'visible',
                    esc_html__('Hidden', 'materialize')  =>'hidden' ,
                ),
                'std'           => 'visible',
                'group'         => esc_html__( 'Visibility options', 'materialize' ),
                'description'   => esc_html__( 'If do not like to show link icon, popup image icon and video icon then select hidden', 'materialize' ),
                'dependency'    => array(
                    'element'   => 'portfolio_style',
                    'value'     => array('boxed-style', 'title-style', 'masonry-style')
                )
            ),

            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Link button visibility', 'materialize' ),
                'param_name'    => 'link_button_visibility',
                'value'         => array(
                    esc_html__('Visible', 'materialize') => 'visible',
                    esc_html__('Hidden', 'materialize')  =>'hidden' ,
                ),
                'std'           => 'visible',
                'group'         => esc_html__( 'Visibility options', 'materialize' ),
                'description'   => esc_html__( 'If do not like to show link button then select hidden', 'materialize' ),
                'dependency'    => array(
                    'element'   => 'portfolio_style',
                    'value'     => array('card-style')
                )
            ),

            // button text
            array(
                'type'          => 'textfield',
                'heading'       => esc_html__( 'Button text', 'materialize' ),
                'param_name'    => 'button_text',
                'value'         => esc_html__('View full Project', 'materialize'),
                'group'         => esc_html__( 'Button text', 'materialize' ),
                'description'   => esc_html__( 'Enter button text', 'materialize' ),
                'dependency'    => array(
                    'element'   => 'link_button_visibility',
                    'value'     => array('visible')
                )
            ),

            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Like visibility', 'materialize' ),
                'param_name'    => 'like_visibility',
                'value'         => array(
                    esc_html__('Visible', 'materialize') => 'visible',
                    esc_html__('Hidden', 'materialize')  =>'hidden' ,
                ),
                'std'           => 'visible',
                'group'         => esc_html__( 'Visibility options', 'materialize' ),
                'description'   => esc_html__( 'If do not like to show like then select hidden', 'materialize' ),
                'dependency'    => array(
                    'element'   => 'portfolio_style',
                    'value'     => array('card-style')
                )
            ),

            array(
                'type'          => 'css_editor',
                'heading'       => esc_html__( 'Css', 'materialize' ),
                'param_name'    => 'css',
                'group'         => esc_html__( 'Design options', 'materialize' ),
            ),

            array(
                'type'          => 'textfield',
                'heading'       => esc_html__( 'Extra class name', 'materialize' ),
                'param_name'    => 'el_class',
                'description'   => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'materialize' )
            )
        )
    ));


    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_tt_Portfolio extends WPBakeryShortCode {
        }
    }
endif;