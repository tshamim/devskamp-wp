<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

	vc_map( array(
        'name'        => esc_html__( 'TT Author Info', 'materialize' ),
        'base'        => 'tt_author_info',
        'icon'        => 'fa fa-user',
        'category'    => esc_html__( 'TT Elements', 'materialize' ),
        'description' => esc_html__( 'Displays author short info', 'materialize' ),
        'params'      => array(

            array(
                'type'          => 'textfield',
                'heading'       => esc_html__( 'Name', 'materialize'),
                'param_name'    => 'name',
                'admin_label'   => true,
                'description'   => esc_html__( 'Enter author name', 'materialize' ),
            ),

            array(
                'type'          => 'textfield',
                'heading'       => esc_html__( 'Designation', 'materialize'),
                'param_name'    => 'designation',
                'description'   => esc_html__( 'Enter author designation', 'materialize' ),
            ),

            array(
                'type' => 'attach_image',
                'heading' => esc_html__( 'Profile image', 'materialize'),
                'param_name' => 'profile_image',
                'description' => esc_html__( 'Select profile image from media library.', 'materialize' ),
            ),

            array(
				'type' => 'attach_image',
				'heading' => esc_html__( 'Cover image', 'materialize'),
				'param_name' => 'cover_image',
				'description' => esc_html__( 'Select cover image from media library.', 'materialize' ),
			),

			array(
                'type' => 'param_group',
                'heading' => esc_html__('Contents', 'materialize'),
                'param_name' => 'author_bio',
                'description' => esc_html__('Enter personal info', 'materialize'),
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Title', 'materialize'),
                        'param_name' => 'title',
                        'description' => esc_html__( 'Enter info title', 'materialize' )
                    ),
                    array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Value', 'materialize'),
						'param_name' => 'value',
						'description' => esc_html__( 'Enter info title value', 'materialize' )
					)
                )
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Footer text', 'materialize' ),
                'param_name'  => 'footer_text',
                'description' => esc_html__( 'Enter footer text', 'materialize' )
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Footer text link', 'materialize' ),
                'param_name'  => 'footer_text_link',
                'description' => esc_html__( 'Enter footer text link', 'materialize' )
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
        class WPBakeryShortCode_tt_Author_Info extends WPBakeryShortCode {
        }
    }

endif; // function_exists( 'vc_map' )