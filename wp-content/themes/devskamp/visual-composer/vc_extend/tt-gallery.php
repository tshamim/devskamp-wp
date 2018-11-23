<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

	vc_map( array(
        'name'        => esc_html__( 'TT Gallery', 'materialize' ),
        'base'        => 'tt_gallery',
        'icon'        => 'fa fa-picture-o',
        'category'    => esc_html__( 'TT Elements', 'materialize' ),
        'description' => esc_html__( 'Displays gallery with image or video', 'materialize' ),
        'params'      => array(

        	array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Gallery type', 'materialize' ),
                'param_name'  => 'gallery_type',
                'value'       => array(
                    esc_html__('Select gallery type', 'materialize') => '',
                    esc_html__('Image Gallery', 'materialize') => 'image-gallery',
                    esc_html__('Video Gallery', 'materialize')  =>'video-gallery'
                ),
                'admin_label' => true,
                'description' => esc_html__( 'Select gallery type', 'materialize' )
            ),

            array(
				'type' => 'attach_images',
				'heading' => esc_html__( 'Images', 'materialize'),
				'param_name' => 'images',
				'description' => esc_html__( 'Select images from media library.', 'materialize' ),
				'dependency'  => Array(
	                'element' => 'gallery_type',
	                'value'   => array( 'image-gallery' )
	            )
			),

			array(
                'type' => 'param_group',
                'heading' => esc_html__('Video content', 'materialize'),
                'param_name' => 'video_content',
                'description' => esc_html__('Enter video content', 'materialize'),
                'dependency'  => Array(
	                'element' => 'gallery_type',
	                'value'   => array( 'video-gallery' )
	            ),
                'params' => array(
                    array(
						'type' => 'attach_image',
						'heading' => esc_html__( 'Video Cover', 'materialize'),
						'param_name' => 'video_cover',
						'description' => esc_html__( 'Select images from media library.', 'materialize' )
					),

					array(
		                "type"        => "textarea_safe",
		                "heading"     => esc_html__( "Embed iframe", 'materialize' ),
		                "param_name"  => "embed_iframe",
		                "description" => esc_html__( "Give your emded iframe code here, recommended size is: 1140x640.", 'materialize' )
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
        class WPBakeryShortCode_tt_Gallery extends WPBakeryShortCode {
        }
    }

endif; // function_exists( 'vc_map' )