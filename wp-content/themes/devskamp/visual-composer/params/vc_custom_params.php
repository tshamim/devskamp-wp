<?php
	if ( ! defined( 'ABSPATH' ) ) :
	    exit; // Exit if accessed directly
	endif;

	// remove vc element
	vc_remove_element( 'vc_tta_tour' );

	// vc remove param
	vc_remove_param( 'vc_row', 'gap' );
	vc_remove_param( 'vc_row', 'equal_height' );
	vc_remove_param( 'vc_row', 'el_class' );
	vc_remove_param( 'vc_column', 'el_class' );
	vc_remove_param( 'vc_row', 'full_width' );
	vc_remove_param( 'vc_tta_accordion', 'color' );
	vc_remove_param( 'vc_tta_accordion', 'style' );
	vc_remove_param( 'vc_tta_tabs', 'style' );
	vc_remove_param( 'vc_btn', 'color' );
	vc_remove_param( 'vc_btn', 'el_class' );


	// add param on row
	$row_attr = array(
		array(
			'type' 			=> 'dropdown',
			'heading' 		=> esc_html__( 'Content Width', 'materialize'),
			'param_name' 	=> 'section_content_width',
			'value' 		=> array(
				esc_html__( 'Fixed Width', 'materialize' ) => 'container',
				esc_html__( 'Full Width', 'materialize' ) => 'container-fullwidth',
			),
			'description' 	=> esc_html__( 'Select content width', 'materialize' ),
			'weight'		=> 1
		),

		array(
			'type'        => 'checkbox',
			'heading'     => esc_html__( 'Apply overlay ?', 'materialize' ),
			'param_name'  => 'apply_overlay',
			'description' => esc_html__( 'If you want to apply overlay color then check this option', 'materialize' ),
		),

		array(
	        'type'        =>'colorpicker',
	        'heading'     => esc_html__( 'Select color', 'materialize' ),
	        'param_name'  => 'overlay_color',
	        'description' => esc_html__( 'Select section overlay color', 'materialize' ),
	        'dependency'  => array(
	            'element'   => 'apply_overlay',
	            'not_empty' => true
	        )
	    ),

		array(
			'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'materialize' ),
				'param_name' => 'el_class',
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'materialize' )
		)
	);
	vc_add_params( 'vc_row', $row_attr );



	// add param on column
	$col_attr = array(
		array(
			'type'        => 'checkbox',
			'heading'     => esc_html__( 'Apply box shadow ?', 'materialize' ),
			'param_name'  => 'box_shadow',
			'description' => esc_html__( 'You can apply box shadow on content wrapper', 'materialize' ),
		),

		array(
	        'type'        =>'colorpicker',
	        'heading'     => esc_html__( 'Select color', 'materialize' ),
	        'param_name'  => 'shadow_bg_color',
	        'description' => esc_html__( 'Select shadow background color', 'materialize' ),
	        'dependency'  => array(
	            'element'   => 'box_shadow',
	            'not_empty' => true
	        )
	    ),

	    array(
			'type'        => 'checkbox',
			'heading'     => esc_html__( 'Apply box padding ?', 'materialize' ),
			'param_name'  => 'box_padding',
			'description' => esc_html__( 'You can apply box padding', 'materialize' ),
			'dependency'  => array(
	            'element'   => 'box_shadow',
	            'not_empty' => true
	        )
		),

		array(
			'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'materialize' ),
				'param_name' => 'el_class',
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'materialize' )
		)
	);
	vc_add_params( 'vc_column', $col_attr );



	// add param on accordion
	$accordion_attr = array(

		array(
			'type' => 'dropdown',
			'param_name' => 'color',
			'value' => array(
				esc_html__('Theme Default', 'materialize' ) => 'theme_default_color',
				esc_html__('Blue', 'materialize' ) => 'blue',
				esc_html__('Turquoise', 'materialize' ) => 'turquoise',
				esc_html__('Pink', 'materialize' ) => 'pink',
				esc_html__('Violet', 'materialize' ) => 'violet',
				esc_html__('Peacoc', 'materialize' ) => 'peacoc',
				esc_html__('Chino', 'materialize' ) => 'chino',
				esc_html__('Mulled Wine', 'materialize' ) => 'mulled_wine',
				esc_html__('Vista Blue', 'materialize' ) => 'vista_blue',
				esc_html__('Grey', 'materialize' ) => 'grey',
				esc_html__('Black', 'materialize' ) => 'black',
				esc_html__('Orange', 'materialize' ) => 'orange',
				esc_html__('Sky', 'materialize' ) => 'sky',
				esc_html__('Green', 'materialize' ) => 'green',
				esc_html__('Juicy pink', 'materialize' ) => 'juicy_pink',
				esc_html__('Sandy brown', 'materialize' ) => 'sandy_brown',
				esc_html__('Purple', 'materialize' ) => 'purple',
				esc_html__('White', 'materialize' ) => 'white'
			),
			'std' => 'grey',
			'heading' => esc_html__( 'Color', 'materialize' ),
			'description' => esc_html__( 'Select accordion color.', 'materialize' ),
			'param_holder_class' => 'vc_colored-dropdown'
		),

		array(
			'type' => 'dropdown',
			'param_name' => 'style',
			'value' => array(
				esc_html__( 'Default', 'materialize' ) => 'default',
				esc_html__( 'Classic', 'materialize' ) => 'classic',
				esc_html__( 'Modern', 'materialize' ) => 'modern',
				esc_html__( 'Flat', 'materialize' ) => 'flat',
				esc_html__( 'Outline', 'materialize' ) => 'outline',
			),
			'heading' => esc_html__( 'Style', 'materialize' ),
			'description' => esc_html__( 'Select accordion display style.', 'materialize' ),
		)

	);
	vc_add_params( 'vc_tta_accordion', $accordion_attr );



	// add param on tab
	$tab_attr = array(

		array(
			'type' => 'dropdown',
			'param_name' => 'style',
			'value' => array(
				esc_html__( 'Default Tab', 'materialize' ) => 'tab-default',
				esc_html__( 'Border Bottom Tab', 'materialize' ) => 'border-bottom-tab',
				esc_html__( 'Border Tab Background', 'materialize' ) => 'border-tab-background',
				esc_html__( 'Border Tab Transparent', 'materialize' ) => 'border-tab-transparent',
				esc_html__( 'Border Box Tab', 'materialize' ) => 'border-box-tab',
				esc_html__( 'Rounded Tab', 'materialize' ) => 'rounded-tab',
				esc_html__( 'Square Tab', 'materialize' ) => 'square-tab',
				esc_html__( 'Vertical Tab', 'materialize' ) => 'vertical-tab',
				esc_html__( 'Icon Tab', 'materialize' ) => 'icon-tab',
				esc_html__( 'Classic', 'materialize' ) => 'classic',
				esc_html__( 'Modern', 'materialize' ) => 'modern',
				esc_html__( 'Flat', 'materialize' ) => 'flat',
				esc_html__( 'Outline', 'materialize' ) => 'outline',
			),
			'heading' => esc_html__( 'Style', 'materialize' ),
			'weight'  => 1,
			'description' => esc_html__( 'Select tabs display style.', 'materialize' ),
		),

		array(
			'heading' => esc_html__( 'Tab equal width', 'materialize' ),
			'type' => 'dropdown',
			'param_name' => 'tab_grid_column',
			'value' => array(
				esc_html__( 'Use default width', 'materialize' ) => '',
				esc_html__( '2 Column', 'materialize' ) => 'tabs-grid-column-2',
				esc_html__( '3 Column', 'materialize' ) => 'tabs-grid-column-3',
				esc_html__( '4 Column', 'materialize' ) => 'tabs-grid-column-4'
			),
			'description' => esc_html__( 'Select tab widht', 'materialize' )
		)

	);
	vc_add_params( 'vc_tta_tabs', $tab_attr );


	// add param on button
	$btn_attr = array(
		array(
			'type' 					=> 'dropdown',
			'heading' 				=> __( 'Color', 'materialize' ),
			'param_name' 			=> 'color',
			'description' 			=> __( 'Select button color.', 'materialize' ),
			'param_holder_class' 	=> 'vc_colored-dropdown vc_btn3-colored-dropdown',
			'value' => array(
				esc_html__('Theme Primary', 'materialize' ) => 'theme_primary_color',
				esc_html__('Theme Pink', 'materialize' ) => 'theme_pink_color',
				esc_html__('Blue', 'materialize' ) => 'blue',
				esc_html__('Turquoise', 'materialize' ) => 'turquoise',
				esc_html__('Pink', 'materialize' ) => 'pink',
				esc_html__('Violet', 'materialize' ) => 'violet',
				esc_html__('Peacoc', 'materialize' ) => 'peacoc',
				esc_html__('Chino', 'materialize' ) => 'chino',
				esc_html__('Mulled Wine', 'materialize' ) => 'mulled_wine',
				esc_html__('Vista Blue', 'materialize' ) => 'vista_blue',
				esc_html__('Grey', 'materialize' ) => 'grey',
				esc_html__('Black', 'materialize' ) => 'black',
				esc_html__('Orange', 'materialize' ) => 'orange',
				esc_html__('Sky', 'materialize' ) => 'sky',
				esc_html__('Green', 'materialize' ) => 'green',
				esc_html__('Juicy pink', 'materialize' ) => 'juicy_pink',
				esc_html__('Sandy brown', 'materialize' ) => 'sandy_brown',
				esc_html__('Purple', 'materialize' ) => 'purple',
				esc_html__('White', 'materialize' ) => 'white'
			),
			'std' => 'theme_primary_color',
			
			'dependency' => array(
				'element' => 'style',
				'value_not_equal_to' => array(
					'custom',
					'outline-custom',
					'gradient',
					'gradient-custom',
				),
			)
		),

		array(
			'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'materialize' ),
				'param_name' => 'el_class',
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'materialize' )
		)
	);
	vc_add_params( 'vc_btn', $btn_attr );