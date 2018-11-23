<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

function tt_vc_template_home_portfolio( $data ) {
	$template                   = array();
	$template[ 'name' ]         = esc_html__( 'Home Portfolio', 'materialize');
	$template[ 'custom_class' ] = 'tt_vc_template_home_portfolio';

	ob_start();
	?>[vc_row full_height="yes" css=".vc_custom_1461532361163{padding-top: 80px !important;background-image: url(http://trendytheme.net/demo2/wp/69/multipage/wp-content/uploads/2016/04/protfolio-slider-2.jpg?id=3042) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" apply_overlay="true"][vc_column][tt_text_rotator animation="dissolve" animation_speed="3000" title_alignment="text-center" show_button="yes" title="69Studio | we design | we develope | quality template" custom_link="url:%23||"]
<h3>A DIGITAL CREATIVE DESIGN AND DEVELOPMENT AGENCY</h3>
[/tt_text_rotator][/vc_column][/vc_row][vc_row css=".vc_custom_1461533062547{border-bottom-width: 1px !important;padding-top: 100px !important;padding-bottom: 60px !important;background-color: #fafafa !important;border-bottom-color: #d2d2d2 !important;border-bottom-style: solid !important;}"][vc_column width="1/3"][vc_custom_heading text="Work Required" google_fonts="font_family:Roboto%20Slab%3A100%2C300%2Cregular%2C700|font_style:700%20bold%20regular%3A700%3Anormal" css=".vc_custom_1461530782497{margin-bottom: 10px !important;}"][vc_column_text]Messenger bag gentrify pitchfork tattooed craft beer iphone skateboard locavore carles etsy viny Photo booth beard raw denim letterpress vegan messenger bag stumptown. American apparel have a terry richardson vinyl chambray.[/vc_column_text][/vc_column][vc_column width="1/3"][vc_custom_heading text="Our Strategy" google_fonts="font_family:Roboto%20Slab%3A100%2C300%2Cregular%2C700|font_style:700%20bold%20regular%3A700%3Anormal" css=".vc_custom_1461530864744{margin-bottom: 10px !important;}"][vc_column_text]Messenger bag gentrify pitchfork tattooed craft beer iphone skateboard locavore carles etsy viny Photo booth beard raw denim letterpress vegan messenger bag stumptown. American apparel have a terry richardson vinyl chambray.[/vc_column_text][/vc_column][vc_column width="1/3"][vc_custom_heading text="The Challenge" google_fonts="font_family:Roboto%20Slab%3A100%2C300%2Cregular%2C700|font_style:700%20bold%20regular%3A700%3Anormal" css=".vc_custom_1461530883320{margin-bottom: 10px !important;}"][vc_column_text]Messenger bag gentrify pitchfork tattooed craft beer iphone skateboard locavore carles etsy viny Photo booth beard raw denim letterpress vegan messenger bag stumptown. American apparel have a terry richardson vinyl chambray.[/vc_column_text][/vc_column][/vc_row][vc_row css=".vc_custom_1461531052706{padding-top: 100px !important;padding-bottom: 100px !important;}"][vc_column][tt_section_title title_color_option="theme-color" title="Work Showcase" css=".vc_custom_1461534674457{margin-bottom: 60px !important;}"]Messenger bag gentrify pitchfork tattooed craft beer iphone skateboard locavore carles etsy viny Photo booth beard raw denim letterpress vegan messenger bag stumptown. American apparel have a terry richardson vinyl chambray.[/tt_section_title][tt_portfolio post_limit="9" grid_column="4" filter_style="filter-transparent" filter_alignment="text-left" hover_style="hover-two"][/vc_column][/vc_row][vc_row css=".vc_custom_1461534387292{border-top-width: 1px !important;padding-top: 100px !important;padding-bottom: 100px !important;background-color: #fafafa !important;border-top-color: #d2d2d2 !important;border-top-style: solid !important;}"][vc_column][tt_section_title title_color_option="theme-color" title="Clients Saying..." css=".vc_custom_1461533115567{margin-bottom: 60px !important;}"]Messenger bag gentrify pitchfork tattooed craft beer iphone skateboard locavore carles etsy viny Photo booth beard raw denim letterpress vegan messenger bag stumptown. American apparel have a terry richardson vinyl chambray.[/tt_section_title][tt_testimonial carousel_type="flex-carousel" testimonial_info="%5B%7B%22photo_option%22%3A%22yes%22%2C%22client_image%22%3A%222734%22%2C%22client_name%22%3A%22E.%20A.%20Siblu%22%2C%22client_org%22%3A%22Five%20Grid%22%2C%22content%22%3A%22Nemo%20enim%20ipsam%20voluptatem%20quia%20voluptas%20sit%20aspernatur%20aut%20odit%20aut%20fugit%2C%20sed%20quia%20consequuntur%20magni%20dolores%20eos%20qui%20ratione%20voluptatem%20sequi%20nesciunt%20magni%20dolores%20eos%20qui%20ratione%20voluptatem.%22%7D%2C%7B%22photo_option%22%3A%22yes%22%2C%22client_image%22%3A%222732%22%2C%22client_name%22%3A%22Farhana%20Bithi%22%2C%22client_org%22%3A%22TrendyTheme%22%2C%22content%22%3A%22Nemo%20enim%20ipsam%20voluptatem%20quia%20voluptas%20sit%20aspernatur%20aut%20odit%20aut%20fugit%2C%20sed%20quia%20consequuntur%20magni%20dolores%20eos%20qui%20ratione%20voluptatem%20sequi%20nesciunt%20magni%20dolores%20eos%20qui%20ratione%20voluptatem.%22%7D%2C%7B%22photo_option%22%3A%22yes%22%2C%22client_image%22%3A%222733%22%2C%22client_name%22%3A%22Ahmed%20Faruk%22%2C%22client_org%22%3A%22Five%20Grid%22%2C%22content%22%3A%22Nemo%20enim%20ipsam%20voluptatem%20quia%20voluptas%20sit%20aspernatur%20aut%20odit%20aut%20fugit%2C%20sed%20quia%20consequuntur%20magni%20dolores%20eos%20qui%20ratione%20voluptatem%20sequi%20nesciunt%20magni%20dolores%20eos%20qui%20ratione%20voluptatem.%22%7D%5D"][/vc_column][/vc_row][vc_row css=".vc_custom_1461534613709{padding-top: 100px !important;}"][vc_column][tt_call_to_action title_color_option="custom-color" content_alignment="text-left" button_visibility="visible" button_style="btn-outline" button_size="btn-md" button_position="button-right" title="Start Building Your Project With 69Studio" title_font_size="25px" button_text="Contact Us" css=".vc_custom_1461543088264{margin-bottom: 100px !important;padding-top: 40px !important;padding-right: 40px !important;padding-bottom: 20px !important;padding-left: 40px !important;background-color: #ff2a40 !important;}" title_color="#ffffff" subtitle_font_size="18px"]<span style="color: #ffffff;">We truly care about our users and our product.</span>[/tt_call_to_action][/vc_column][/vc_row]
	<?php
	$template[ 'content' ] = ob_get_clean();
	array_unshift( $data, $template );
	return $data;
}
add_filter( 'vc_load_default_templates', 'tt_vc_template_home_portfolio' );