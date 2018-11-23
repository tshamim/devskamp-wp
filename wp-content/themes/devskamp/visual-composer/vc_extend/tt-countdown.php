<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

    vc_map( array(
        'name'        => esc_html__( 'TT Countdown', 'materialize' ),
        'base'        => 'tt_countdown',
        'icon'        => 'fa fa-calendar',
        'category'    => esc_html__( 'TT Elements', 'materialize' ),
        'description' => esc_html__( 'Show only one event as featured or upcomming event', 'materialize' ),
        'params'      => array(

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Countdown Date', 'materialize' ),
                'param_name'  => 'countdown_time',
                'admin_label' => true,
                'description' => esc_html__( 'Add your countdown time here. Formate YYYY/MM/DD', 'materialize' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Timer Color Option', 'materialize' ),
                'param_name'  => 'timer_color_option',
                'value'       => array(
                    esc_html__('Default Color ', 'materialize') => '',
                    esc_html__('Theme Color ', 'materialize') => 'timer-brand-color',
                    esc_html__('White Color ', 'materialize') => 'timer-white-color',
                    esc_html__('Multi Color ', 'materialize') => 'timer-multi-color'
                ),
                'description' => esc_html__( 'Choose Timer Color Option', 'materialize' )
            ),


            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Countdown Timer Alignment', 'materialize' ),
                'param_name'  => 'countdown_timer_alignment',
                'value'       => array(
                    esc_html__('Align Left ', 'materialize') => 'text-left',
                    esc_html__('Align Right ', 'materialize') => 'text-right',
                    esc_html__('Align Center ', 'materialize') => 'text-center'
                ),
                'description' => esc_html__( 'Countdown Timer Alignment', 'materialize' )
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
        class WPBakeryShortCode_tt_countdown extends WPBakeryShortCode {
        }
    }
endif;