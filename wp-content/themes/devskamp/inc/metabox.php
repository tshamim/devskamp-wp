<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Register meta boxes
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (! function_exists('materialize_register_meta_boxes')) :

	function materialize_register_meta_boxes( $meta_boxes ) {
		/**
		 * Prefix of meta keys (optional)
		 */

		$prefix = 'materialize_';

		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Meta for post format quote
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

		$meta_boxes[] = array(
			'id' => 'tt-post-format-quote',
			// Meta box title - Will appear at the drag and drop handle bar. Required.
			'title' => esc_html__( 'Post Quote Settings', 'materialize' ),
			// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
			'pages' => array( 'post'),
			// Where the meta box appear: normal (default), advanced, side. Optional.
			'context' => 'normal',
			// Order of meta box: high (default), low. Optional.
			'priority' => 'high',
			// Auto save: true, false (default). Optional.
			'autosave' => true,

			// List of meta fields
			'fields' => array(
				array(
					// Field name - Will be used as label
					'name'  => esc_html__( 'Qoute Text', 'materialize' ),
					// Field ID, i.e. the meta key
					'id'    => "{$prefix}qoute",
					'desc'  => esc_html__( 'Write Your Qoute Here', 'materialize' ),
					'type'  => 'textarea',
					// Default value (optional)
					'std'   => ''
				),
				array(
					// Field name - Will be used as label
					'name'  => esc_html__( 'Qoute Author/Company', 'materialize' ),
					// Field ID, i.e. the meta key
					'id'    => "{$prefix}qoute_author",
					'desc'  => esc_html__( 'Write Qoute Author or Company name', 'materialize' ),
					'type'  => 'text',
					// Default value (optional)
					'std'   => ''
				),
				array(
					// Field name - Will be used as label
					'name'  => esc_html__( 'Author/Company URL', 'materialize' ),
					// Field ID, i.e. the meta key
					'id'    => "{$prefix}qoute_author_url",
					'desc'  => esc_html__( 'Write Qoute Author or Company URL', 'materialize' ),
					'type'  => 'text',
					// Default value (optional)
					'std'   => ''
				)
			)
		);


		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Meta for post format link
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		$meta_boxes[] = array(
			'id' => 'tt-post-format-link',
			'title' => esc_html__( 'Post Link Settings', 'materialize' ),
			'pages' => array( 'post'),
			'context' => 'normal',
			'priority' => 'high',
			'autosave' => true,
			'fields' => array(
				array(
					'name'  => esc_html__( 'Link text', 'materialize' ),
					'id'    => "{$prefix}link_text",
					'desc'  => esc_html__( 'Write Your Link Text, leave blank to show only url', 'materialize' ),
					'type'  => 'text',
					'std'   => ''
				),

				array(
					'name'  => esc_html__( 'Link URL*', 'materialize' ),
					'id'    => "{$prefix}link",
					'desc'  => esc_html__( 'Write Your Link, e.g: http://yourlink.com', 'materialize' ),
					'type'  => 'text',
					'std'   => ''
				),

				array(
					'name'     => esc_html__( 'Link title', 'materialize' ),
					'id'       => "{$prefix}link_title",
					'desc'     => esc_html__( 'Write link title, appear as link title attribute', 'materialize' ),
					'type'     => 'text',
					'std'      => ''
				),

				array(
					'name'     => esc_html__( 'Link target', 'materialize' ),
					'id'       => "{$prefix}link_target",
					'type'     => 'select',
					'options'  => array(
						'_self' => esc_html__( 'Self', 'materialize' ),
						'_blank' => esc_html__( 'New Window', 'materialize' )
					),
					'std'         => 'self'
				)
			)
		);

		
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Meta for post format audio
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		$meta_boxes[] = array(
			'id' => 'tt-post-format-audio',
			'title' => esc_html__( 'Post Audio Settings', 'materialize' ),
			'pages' => array( 'post'),
			'context' => 'normal',
			'priority' => 'high',
			'autosave' => true,
			'fields' => array(
				array(
					'name'  => esc_html__( 'Featured Audio (.mp3)', 'materialize' ),
					'id'    => "{$prefix}featured_mp3",
					'desc'  => esc_html__( 'Upload Audio like: your-file-name.mp3', 'materialize' ),
					'type'  => 'file_input',
					'std'   => ''
				),

				array(
					'name'  => esc_html__( 'Featured Audio (.ogg)', 'materialize' ),
					'id'    => "{$prefix}featured_ogg",
					'desc'  => esc_html__( 'Upload Audio like: your-file-name.ogg', 'materialize' ),
					'type'  => 'file_input',
					'std'   => ''
				),

				array(
					'name'  => esc_html__( 'Featured Audio (.wav)', 'materialize' ),
					'id'    => "{$prefix}featured_wav",
					'desc'  => esc_html__( 'Upload Audio like: your-file-name.wav', 'materialize' ),
					'type'  => 'file_input',
					'std'   => ''
				),

				array(
					'name'  => esc_html__( 'Embed Audio', 'materialize' ),
					'id'    => "{$prefix}embed_audio",
					'desc'  => esc_html__( 'Input URL for sounds, audios from Youtube, Soundcloud and all supported sites by WordPress, Supported list: http://codex.wordpress.org/Embeds', 'materialize' ),
					'type'  => 'oembed',
					'std'   => ''
				)
			)
		);


		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Meta for post format video
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		$meta_boxes[] = array(
			'id' => 'tt-post-format-video',
			'title' => esc_html__( 'Post Video Settings', 'materialize' ),
			'pages' => array( 'post'),
			'context' => 'normal',
			'priority' => 'high',
			'autosave' => true,
			'fields' => array(
				array(
					'name'  => esc_html__( 'Featured Video (.mp4)', 'materialize' ),
					'id'    => "{$prefix}featured_mp4",
					'desc'  => esc_html__( 'Upload Video like: your-file-name.mp4', 'materialize' ),
					'type'  => 'file_input',
					'std'   => ''
				),

				array(
					'name'  => esc_html__( 'Featured Video (.webm)', 'materialize' ),
					'id'    => "{$prefix}featured_webm",
					'desc'  => esc_html__( 'Upload Video like: your-file-name.webm', 'materialize' ),
					'type'  => 'file_input',
					'std'   => ''
				),

				array(
					'name'  => esc_html__( 'Featured Video (.ogv)', 'materialize' ),
					'id'    => "{$prefix}featured_ogv",
					'desc'  => esc_html__( 'Upload Video like: your-file-name.ogv', 'materialize' ),
					'type'  => 'file_input',
					'std'   => ''
				),

				array(
					'name'  => esc_html__( 'Embed Video', 'materialize' ),
					'id'    => "{$prefix}embed_video",
					'desc'  => esc_html__( 'Enter embed code here.', 'materialize' ),
					//'type'  => 'oembed',
					'type'  => 'textarea',
					'std'   => ''
				)	
			)
		);


		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Meta for post format gallery
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		$meta_boxes[] = array(
			'id' => 'tt-post-format-gallery',
			'title' => esc_html__( 'Post Gallery Settings', 'materialize' ),
			'pages' => array( 'post'),
			'context' => 'normal',
			'priority' => 'high',
			'autosave' => true,
			'fields' => array(
				array(
					'name'             => esc_html__( 'Upload image from media library', 'materialize' ),
					'id'               => "{$prefix}post_gallery",
					'type'             => 'image_advanced',
					'max_file_uploads' => 6,
				)			
			)
		);



		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Meta for portfolio
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		$meta_boxes[] = array(
			'id' => 'portfolio-meta-settings',
			'title' => esc_html__( 'Portfolio Settings', 'materialize' ),
			'pages' => array('tt-portfolio'),
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'name'        => esc_html__( 'Select single portfolio layout', 'materialize' ),
					'id'          => "{$prefix}portfolio_single_layout",
					'type'        => 'select_advanced',
					'options'     => array(
						'portfolio-layout-default' => esc_html__( 'Default layout', 'materialize' ),
						'portfolio-layout-sidebar' => esc_html__( 'Details on sidebar', 'materialize' ),
					),
					'multiple'    => false,
					'std'         => 'portfolio-layout-default', // Default value, optional
					'placeholder' => esc_html__( 'Select a layout', 'materialize' )
				),

				array(
					'name' 	=> esc_html__( 'Divider', 'materialize' ),
					'id'  	=> "{$prefix}portfolio_divider_one",
					'type' 	=> 'divider'
				),
				
                array(
					'name'    	=> esc_html__( 'Portfolio Overview', 'materialize' ),
					'id'   => "{$prefix}portfolio_overview",
					'type'    	=> 'text_list',
					// Number of rows
					'rows'    	=> 1,
					'options' 	=> array(
						'Label' => esc_html__( 'Label', 'materialize' ),
						'Value' => esc_html__( 'Value', 'materialize' )
					),
					'clone'		=> true,
				),

				array(
					'name' 	=> esc_html__( 'Divider', 'materialize' ),
					'id'  	=> "{$prefix}portfolio_divider_three",
					'type' 	=> 'divider'
				),

				array(
					'name'    	=> esc_html__( 'Show/hide social share button', 'materialize' ),
					'id'   		=> "{$prefix}portfolio_share",
					'type'    	=> 'radio',
					'options' 	=> array(
						'show_share' => esc_html__( 'Show', 'materialize' ),
						'hide_share' => esc_html__( 'Hide', 'materialize' )
					),
					'std'		=> 'show_share'
				),

				array(
					'name' 	=> esc_html__( 'Divider', 'materialize' ),
					'id'  	=> "{$prefix}portfolio_divider_four",
					'type' 	=> 'divider'
				),

				array(
					'name'    	=> esc_html__( 'Portfolio link text', 'materialize' ),
					'id'   		=> "{$prefix}portfolio_link_text",
					'type'    	=> 'text',
					'desc'     	=> esc_html__( 'Enter link text', 'materialize' ),
					
				),
				array(
					'name'    	=> esc_html__( 'Portfolio link', 'materialize' ),
					'id'   		=> "{$prefix}portfolio_link",
					'type'    	=> 'text',
					'desc'     	=> esc_html__( 'Enter portfolio link', 'materialize' ),
					
				),
				array(
					'name'    	=> esc_html__( 'Image hover icon actions', 'materialize' ),
					'id'   		=> "{$prefix}image_popup_option",
					'type'    	=> 'radio',
					'class'		=> 'image-popup-option',
					'options' 	=> array(
						'post_image_popup' => esc_html__( 'Popup with post image', 'materialize' ),
						'link_with_post' => esc_html__( 'Link with post', 'materialize' ),
						'video_popup' => esc_html__( 'Popup video', 'materialize' ),
					),
					'std'		=> 'post_image_popup'
				),

				array(
					'name'    	=> esc_html__( 'Video URL', 'materialize' ),
					'id'   		=> "{$prefix}video_url",
					'type'    	=> 'text',
					'class'		=> 'popup-video-url',
					'desc'     	=> esc_html__( 'Enter youtube or vimeo url to popup', 'materialize' )
				),
				array(
					'name'             => esc_html__( 'Extra images', 'materialize' ),
					'id'               => "{$prefix}extra_images",
					'type'             => 'image_advanced',
					'max_file_uploads' => 10,
					'desc'  => esc_html__( 'Upload extra image to show on single portfolio', 'materialize' ),
				),
				array(
					'name'    	=> esc_html__( 'Portfolio price', 'materialize' ),
					'id'   		=> "{$prefix}portfolio_price",
					'type'    	=> 'text',
					'desc'     	=> esc_html__( 'Enter portfolio price for food demo only', 'materialize' ),
					
				)
			)
		);


		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Meta for portfolio gallery
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		$meta_boxes[] = array(
			'id' => 'portfolio-gallery-settings',
			'title' => esc_html__( 'Portfolio Gallery', 'materialize' ),
			'pages' => array('tt-portfolio'),
			'context' => 'side',
			'priority' => 'low',
			'fields' => array(
				
				array(
					'name'             => esc_html__( 'Portfolio Gallery', 'materialize' ),
					'id'               => "{$prefix}portfolio_gallery",
					'type'             => 'image_advanced',
					'max_file_uploads' => 5,
					'desc'  => esc_html__( 'Upload gallery image to show gallery on single portfolio', 'materialize' ),
				),

				array(
					'name'    	=> esc_html__( 'Gallery slide direction', 'materialize' ),
					'id'   		=> "{$prefix}gallery_slide_direction",
					'type'    	=> 'radio',
					'options' 	=> array(
						'horizontal' => esc_html__( 'Horizontal', 'materialize' ),
						'vertical' => esc_html__( 'Vertical', 'materialize' )
					),
					'std'		=> 'horizontal'
				)
			)
		);


				//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Meta for team post type
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		$meta_boxes[] = array(
			'id' => 'team-meta-settings',
			'title' => esc_html__( 'Team member Settings', 'materialize' ),
			'pages' => array( 'tt-member'),
			'fields' => array(
				array(
					'name'     => esc_html__( 'Team Designation', 'materialize' ),
					'id'       => "{$prefix}team_designation",
					'desc'     => esc_html__( 'Enter team designation', 'materialize' ),
					'type'     => 'text'
				)
			)
		);


		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Team social settings
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		$meta_boxes[] = array(
			'id' => 'team-social-settings',
			'title' => esc_html__( 'Team Social Settings', 'materialize' ),
			'pages' => array( 'tt-member'),
			'fields' => array(
				array(
					'name'     => esc_html__( 'Facebook Link', 'materialize' ),
					'id'       => "{$prefix}facebook_link",
					'desc'     => esc_html__( 'Enter facebook page or profile link', 'materialize' ),
					'type'     => 'text'
				),
				array(
					'name'     => esc_html__( 'Twitter Link', 'materialize' ),
					'id'       => "{$prefix}twitter_link",
					'desc'     => esc_html__( 'Enter twitter profile link', 'materialize' ),
					'type'     => 'text'
				),
				array(
					'name'     => esc_html__( 'Google Plus Link', 'materialize' ),
					'id'       => "{$prefix}google_plus_link",
					'desc'     => esc_html__( 'Enter google plus profile or page link', 'materialize' ),
					'type'     => 'text'
				),
				array(
					'name'     => esc_html__( 'Linkedin Link', 'materialize' ),
					'id'       => "{$prefix}linkedin_link",
					'desc'     => esc_html__( 'Enter linkedin profile link', 'materialize' ),
					'type'     => 'text'
				),
				array(
					'name'     => esc_html__( 'Dribbble Link', 'materialize' ),
					'id'       => "{$prefix}dribbble_link",
					'desc'     => esc_html__( 'Enter dribbble profile link', 'materialize' ),
					'type'     => 'text'
				),
				array(
					'name'     => esc_html__( 'Email Address', 'materialize' ),
					'id'       => "{$prefix}envelope_link",
					'desc'     => esc_html__( 'Enter member Email address', 'materialize' ),
					'type'     => 'text'
				)
			)
		);


		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Team bar chart
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		$meta_boxes[] = array(
			'id' => 'member-bar-settings',
			'title' => esc_html__( 'Team Bar chart Settings', 'materialize' ),
			'pages' => array( 'tt-member'),
			'fields' => array(

				array(
					'name'    	=> esc_html__( 'Barchart Details', 'materialize' ),
					'id'   => "{$prefix}barchart_details",
					'type'    	=> 'text_list',
					// Number of rows
					'rows'    	=> 1,
					'options' 	=> array(
						'Title' => esc_html__( 'Enter Bar Title, e.g: Management', 'materialize' ),
						'Value' => esc_html__( 'Enter Skill Amount, e.g: 80', 'materialize' )
					),
					'clone'		=> true,
					'sort_clone' => true
				)
			)
		);


		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Meta for page logo
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		$meta_boxes[] = array(
			'id' => 'page-logo-settings',
			'title' => esc_html__( 'Page Logo Settings', 'materialize' ),
			'pages' => array( 'page', 'tt-portfolio', 'tt-member', 'tt-joblist', 'tt-service'),
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(

				// logo
				array(
					'name'             => esc_html__( 'Page Logo', 'materialize' ),
					'id'               => "{$prefix}page_logo",
					'type'             => 'image_advanced',
					'max_file_uploads' => 1,
					'desc'  => esc_html__( 'This logo option only for this page, dimension: 210px &times; 50px', 'materialize' ),
				),

				// logo sticky
				array(
					'name'             => esc_html__( 'Page sticky Logo ', 'materialize' ),
					'id'               => "{$prefix}page_sticky_logo",
					'type'             => 'image_advanced',
					'max_file_uploads' => 1,
					'desc'  => esc_html__( 'This logo option only for this page, dimension: 210px &times; 50px', 'materialize' ),
				),

				// mobile logo
				array(
					'name'             => esc_html__( 'Page Mobile Logo', 'materialize' ),
					'id'               => "{$prefix}page_mobile_logo",
					'type'             => 'image_advanced',
					'max_file_uploads' => 1,
					'desc'  => esc_html__( 'This logo option only for this page, dimension: 210px &times; 50px', 'materialize' ),
				),

				// mobile logo
				array(
					'name'             => esc_html__( 'Page Mobile Sticky Logo', 'materialize' ),
					'id'               => "{$prefix}page_mobile_sticky_logo",
					'type'             => 'image_advanced',
					'max_file_uploads' => 1,
					'desc'  => esc_html__( 'This logo option only for this page, dimension: 210px &times; 50px', 'materialize' ),
				)
			)
		);

		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Meta for page header
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		$meta_boxes[] = array(
			'id' => 'page-meta-settings',
			'title' => esc_html__( 'Page Settings', 'materialize' ),
			'pages' => array( 'page', 'tt-portfolio', 'tt-member', 'tt-joblist', 'tt-service', 'product'),
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(

				// header visibility option
				array(
					'name'        => esc_html__( 'Enable/Disable Page Header', 'materialize' ),
					'id'          => "{$prefix}page_header_visibility",
					'type'        => 'select_advanced',
					// Array of 'value' => 'Label' pairs for select box
					'options'     => array(
						'header-inherite-option' => esc_html__( 'Inherit from theme option', 'materialize' ),
						'header-section-show' => esc_html__( 'Header Section Show', 'materialize' ),
						'header-section-hide' => esc_html__( 'Header Section Hide', 'materialize' )
					),
					// Default selected value
					'std'         => 'header-inherite-option',
					// Placeholder
					'placeholder' => esc_html__( 'Select header visibility option', 'materialize' )
				),

				array(
					'name'             => esc_html__( 'Subtitle', 'materialize' ),
					'id'               => "{$prefix}page_subtitle",
					'type'             => 'text',
					'desc'  		   => esc_html__( 'Enter page subtitle', 'materialize' ),
				),

				// Divider
				array(
					'name'             => esc_html__( 'Divider', 'materialize' ),
					'id'               => "{$prefix}breadcumb_divider_one",
					'type'             => 'divider'
				),

				// Section padding
				array(
					'name'             => esc_html__( 'Padding top', 'materialize' ),
					'id'               => "{$prefix}header_padding_top",
					'type'             => 'text',
					'desc'  		   => esc_html__( 'Enter page header section top padding in px', 'materialize' ),
				),

				array(
					'name'             => esc_html__( 'Padding bottom', 'materialize' ),
					'id'               => "{$prefix}header_padding_bottom",
					'type'             => 'text',
					'desc'  => esc_html__( 'Enter page header section bottom padding in px', 'materialize' ),
				),

				// Divider
				array(
					'name'             => esc_html__( 'Divider', 'materialize' ),
					'id'               => "{$prefix}breadcumb_divider_two",
					'type'             => 'divider'
				),

				// Background image
				array(
					'name'             => esc_html__( 'Background image', 'materialize' ),
					'id'               => "{$prefix}page_header_image",
					'type'             => 'image_advanced',
					'max_file_uploads' => 1,
					'desc'  => esc_html__( 'Upload background image, dimension: 1920px x 450px', 'materialize' ),
				),

				// Parallax background
				array(
					'name'             	=> esc_html__( 'Parallax background', 'materialize' ),
					'id'               	=> "{$prefix}parallax_header_image",
					'type'             	=> 'radio',
					'options'     		=> array(
						'parallax_header_bg' => esc_html__( 'Enable', 'materialize' ),
						'default_header_bg' => esc_html__( 'Disable', 'materialize' )
					),
					'std'				=> 'default_header_bg',
					'desc'  => esc_html__( 'Select parallax background option', 'materialize' ),
				),

				// Background overlay option
				array(
					'name'             	=> esc_html__( 'Enable background overlay color', 'materialize' ),
					'id'               	=> "{$prefix}background_overlay",
					'type'             	=> 'radio',
					'options'     		=> array(
						'bg_overlay_enable' => esc_html__( 'Enable', 'materialize' ),
						'bg_overlay_disable' => esc_html__( 'Disable', 'materialize' )
					),
					'std'				=> 'bg_overlay_disable',
					'desc'  => esc_html__( 'Select background overlay option', 'materialize' ),
				),

				// Background color
				array(
					'name'             => esc_html__( 'Background color', 'materialize' ),
					'id'               => "{$prefix}page_header_color",
					'type'             => 'color',
					'desc'  => esc_html__( 'Select backgroud color if do not like to use background image', 'materialize' ),
				),

				// title color
				array(
					'name'             => esc_html__( 'Title color', 'materialize' ),
					'id'               => "{$prefix}header_content_color",
					'type'             => 'color',
					'desc'  => esc_html__( 'Select content color if needed', 'materialize' ),
				),

				// Divider
				array(
					'name'             => esc_html__( 'Divider', 'materialize' ),
					'id'               => "{$prefix}breadcumb_divider_three",
					'type'             => 'divider'
				),

				// Content alignment
				array(
					'name'        => esc_html__( 'Content alignment', 'materialize' ),
					'id'          => "{$prefix}breadcrumb_content_alignment",
					'type'        => 'select_advanced',
					// Array of 'value' => 'Label' pairs for select box
					'options'     => array(
						'text-center' => esc_html__( 'Content center', 'materialize' ),
						'text-left' => esc_html__( 'Content left', 'materialize' ),
						'text-right' => esc_html__( 'Content right', 'materialize' ),
						'title-left' => esc_html__( 'Title left', 'materialize' ),
						'title-right' => esc_html__( 'Title Right', 'materialize' )
					),
					// Default selected value
					'std'         => 'title-left',
					// Placeholder
					'placeholder' => esc_html__( 'Select breadcrumb alignment', 'materialize' ),
				),

				// Divider
				array(
					'name'             => esc_html__( 'Divider', 'materialize' ),
					'id'               => "{$prefix}breadcumb_divider_four",
					'type'             => 'divider'
				),

				// Hide breadcrumb
				array(
					'name'             	=> esc_html__( 'Show/hide breadcrumb', 'materialize' ),
					'id'               	=> "{$prefix}page_breadcrumb_show",
					'type'             	=> 'radio',
					'options'     		=> array(
						'page_breadcrumb_show' => esc_html__( 'Show', 'materialize' ),
						'page_breadcrumb_hide' => esc_html__( 'Hide', 'materialize' )
					),
					'std'				=> 'page_breadcrumb_show',
					'desc'  => esc_html__( 'Select breadcrumb show/hide option', 'materialize' ),
				),

				// Divider
				array(
					'name'             => esc_html__( 'Divider', 'materialize' ),
					'id'               => "{$prefix}breadcumb_divider_five",
					'type'             => 'divider'
				),

				// Page Header Margin Bottom
				array(
					'name'             => esc_html__( 'Page Header Margin Bottom', 'materialize' ),
					'id'               => "{$prefix}page_header_margin_bottom",
					'type'             => 'text',
					'desc'  => esc_html__( 'Enter margin bottom value in px', 'materialize' ),
				)
			)
		);


		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Meta for header style
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		$meta_boxes[] = array(
			'id' => 'page-header-style',
			'title' => esc_html__( 'Page Header Styles', 'materialize' ),
			'pages' => array( 'page', 'tt-portfolio'),
			'context' => 'side',
			'priority' => 'low',
			'fields' => array(
				array(
					'name'        => esc_html__( 'Header style', 'materialize' ),
					'id'          => "{$prefix}header_style",
					'type'        => 'select_advanced',
					// Array of 'value' => 'Label' pairs for select box
					'options'     => array(
						'inherit-theme-option' => esc_html__( 'Inherit from theme option', 'materialize' ),
						'header-default' => esc_html__( 'Header Default', 'materialize' ),
						'header-dark' => esc_html__( 'Header Dark', 'materialize' ),
						'header-brand-color' => esc_html__( 'Header Brand Color', 'materialize' ),
						'header-transparent' => esc_html__( 'Header Transparent', 'materialize' ),
						'header-semi-transparent' => esc_html__( 'Header Semi Transparent', 'materialize' ),
						'header-center-menu' => esc_html__( 'Header Center Menu', 'materialize' ),
						'header-bottom-menu' => esc_html__( 'Header Bottom Menu', 'materialize' ),
						'header-floating-menu' => esc_html__( 'Header Floating Menu', 'materialize' ),
						'header-shop' => esc_html__( 'Header Shop', 'materialize' ),
						'no-header' => esc_html__( 'No Header', 'materialize' )
					),
					// Default selected value
					'std'         => 'inherit-theme-option',
					// Placeholder
					'placeholder' => esc_html__( 'Select header style', 'materialize' ),
				)
			)
		);


		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Meta for header topbar
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		$meta_boxes[] = array(
			'id' => 'page-header-topbar',
			'title' => esc_html__( 'Page Header Topbar', 'materialize' ),
			'pages' => array( 'page', 'tt-portfolio'),
			'context' => 'side',
			'priority' => 'low',
			'fields' => array(
				array(
					'name'        => esc_html__( 'Header topbar', 'materialize' ),
					'id'          => "{$prefix}header_topbar",
					'type'        => 'select_advanced',
					// Array of 'value' => 'Label' pairs for select box
					'options'     => array(
						'inherit-theme-option' => esc_html__( 'Inherit from theme option', 'materialize' ),
						'header-topbar-show' => esc_html__( 'Header topbar show', 'materialize' ),
						'header-topbar-hide' => esc_html__( 'Header topbar hide', 'materialize' )
					),
					// Default selected value
					'std'         => 'inherit-theme-option',
					// Placeholder
					'placeholder' => esc_html__( 'Select header topbar', 'materialize' ),
				)
			)
		);


		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Meta for footer style
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		$meta_boxes[] = array(
			'id' => 'page-footer-style',
			'title' => esc_html__( 'Page Footer Styles', 'materialize' ),
			'pages' => array( 'page', 'tt-portfolio', 'product', 'tt-member'),
			'context' => 'side',
			'priority' => 'low',
			'fields' => array(
				array(
					'name'        => esc_html__( 'Footer style', 'materialize' ),
					'id'          => "{$prefix}footer_style",
					'type'        => 'select_advanced',
					// Array of 'value' => 'Label' pairs for select box
					'options'     => array(
						'inherit-theme-option' => esc_html__( 'Inherit from theme option', 'materialize' ),
						'footer-default' => esc_html__( 'Footer default', 'materialize' ),
						'footer-two' => esc_html__( 'Footer two', 'materialize' ),
						'footer-three' => esc_html__( 'Footer three', 'materialize' ),
						'footer-four' => esc_html__( 'Footer four', 'materialize' ),
						'no-footer' => esc_html__( 'No Footer', 'materialize' )
					),
					// Default selected value
					'std'         => 'inherit-theme-option',
					// Placeholder
					'placeholder' => esc_html__( 'Select footer style', 'materialize' ),
					'desc'     => esc_html__( 'This settings apply only for this page', 'materialize' )
				)
			)
		);

		$the_sidebars = '';

		if (function_exists('smk_get_all_sidebars')) :
			$the_sidebars = smk_get_all_sidebars();
			if( is_array($the_sidebars) ){
	            $select_str = esc_html__('-- Select a sidebar --', 'materialize');
	            $the_sidebars = array_merge( array( '' => $select_str ), $the_sidebars );
	        }
		endif;
		

		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Meta for sidebar style
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		$meta_boxes[] = array(
			'id' => 'page-sidebar-style',
			'title' => esc_html__( 'Sidebar Settings', 'materialize' ),
			'pages' => array( 'page'),
			'context' => 'side',
			'priority' => 'low',
			'fields' => array(
				array(
					'name'        => esc_html__( 'Sidebars', 'materialize' ),
					'id'          => "{$prefix}page_sidebars",
					'type'        => 'select_advanced',
					// Array of 'value' => 'Label' pairs for select box
					'options'     => $the_sidebars,
					// Default selected value
					'std'         => 'materialize-page-sidebar',
					// Placeholder
					'placeholder' => esc_html__( 'Select sidebar', 'materialize' ),
					'desc'     => esc_html__( 'This settings apply only for this page', 'materialize' )
				)
			)
		);
		

		return $meta_boxes;
	}

	add_filter( 'rwmb_meta_boxes', 'materialize_register_meta_boxes' );

endif;