<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

    vc_map( array(
        'name'                    => esc_html__( 'Team Member', 'materialize' ),
        'base'                    => 'tt_member',
        'icon'                    => 'fa fa-user',
        'category'                => esc_html__( 'TT Elements', 'materialize' ),
        'description'             => esc_html__( 'Show off member', 'materialize' ),
        'params'                  => array(

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Team style', 'materialize' ),
                'param_name'  => 'team_style',
                'admin_label' => true,
                'value'       => array(
                    esc_html__('Style one', 'materialize') => 'team-style-one',
                    esc_html__('Style two', 'materialize') => 'team-style-two'
                ),
                'admin_label' => true,
                'description' => esc_html__( 'Select team style', 'materialize' )
            ),       

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Member Limit', 'materialize' ),
                'param_name'  => 'post_limit',
                'value'       => -1,
                'admin_label' => true,
                'description' => esc_html__( 'Enter member post number to display member, -1 for no limit', 'materialize' )
            ),            

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Member Order', 'materialize' ),
                'param_name'  => 'member_order',
                'value'       => array(
                    esc_html__('Select an option', 'materialize') => '',
                    esc_html__('ASC', 'materialize') => 'ASC',
                    esc_html__('DESC', 'materialize')  =>'DESC'
                    ),
                'admin_label' => true,
                'description' => esc_html__( 'You can change default order, Default is DESC', 'materialize' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Member name visibility', 'materialize' ),
                'param_name'  => 'team_visibility',
                'value'       => array(
                    esc_html__('Visible', 'materialize') => 'visible-name',
                    esc_html__('Hidden', 'materialize')  =>'hiddden-name'
                    ),
                'std'         => 'visible-name',
                'admin_label' => true,
                'description' => esc_html__( 'If do not want to show member name option then select hidden', 'materialize' )
            ),


            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Member designation visibility', 'materialize' ),
                'param_name'  => 'designation_visibility',
                'value'       => array(
                    esc_html__('Visible', 'materialize') => 'visible-designation',
                    esc_html__('Hidden', 'materialize')  =>'hiddden-designation'
                    ),
                'std'         => 'visible-designation',
                'admin_label' => true,
                'description' => esc_html__( 'If do not want to show member designation option then select hidden', 'materialize' )
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Word Limit', 'materialize'),
                'param_name'  => 'word_limit',
                'value'       => 25,
                'admin_label' => true,
                'description' => esc_html__( 'How many word would you like to show ?', 'materialize')
            ),  

            array(
                'type'          => 'css_editor',
                'heading'       => esc_html__( 'Css', 'materialize' ),
                'param_name'    => 'css',
                'group'         => esc_html__( 'Design options', 'materialize' ),
            ),          

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Extra class name', 'materialize' ),
                'param_name'  => 'el_class',
                'admin_label' => true,
                'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'materialize' )
            )
        )
    ));

    if ( class_exists( 'WPBakeryShortCode' ) ) {
        class WPBakeryShortCode_TT_Member extends WPBakeryShortCode {
        }
    }

endif;