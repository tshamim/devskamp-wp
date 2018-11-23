<?php 

function tt_import_files() {
    return array(
        array(
            'import_file_name'           => 'Multipage Demo',
            'categories'                 => array( 'Multipage Full Demo'),
            'import_file_url'            => TT_PLUGIN_URL.'inc/demo-data/multipage/contents.xml',
            'import_widget_file_url'     => TT_PLUGIN_URL.'inc/demo-data/multipage/widgets-data.wie',
            'import_redux'               => array(
                array(
                    'file_url'    => TT_PLUGIN_URL.'inc/demo-data/multipage/theme-options.json',
                    'option_name' => 'materialize_theme_option',
                )
            ),
            'import_preview_image_url'   => TT_PLUGIN_URL. 'images/default.jpg',
            'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately. It can be found under appearance menu(Import Sliders)', 'tt-pl-textdomain' ),
        ),
        array(
            'import_file_name'           => 'Agency Demo',
            'categories'                 => array( 'Full Demo', 'Corporate' ),
            'import_file_url'            => TT_PLUGIN_URL.'inc/demo-data/agency-demo/agency-contents.xml',
            'import_widget_file_url'     => TT_PLUGIN_URL.'inc/demo-data/multipage/widgets-data.wie',
            'import_redux'               => array(
                array(
                    'file_url'    => TT_PLUGIN_URL.'inc/demo-data/agency-demo/agency-options.json',
                    'option_name' => 'materialize_theme_option',
                )
            ),
            'import_preview_image_url'   => TT_PLUGIN_URL.'images/agency.jpg',
            'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately. It can be found under appearance menu(Import Sliders)', 'tt-pl-textdomain' ),
        ),
        array(
            'import_file_name'           => 'App Landing One',
            'categories'                 => array( 'Onepage', 'Landing' ),
            'import_file_url'            => TT_PLUGIN_URL.'inc/demo-data/app-landing-one/applandingone-contents.xml',
            'import_widget_file_url'     => TT_PLUGIN_URL.'inc/demo-data/multipage/widgets-data.wie',
            'import_redux'               => array(
                array(
                    'file_url'    => TT_PLUGIN_URL.'inc/demo-data/app-landing-one/applandingone-options.json',
                    'option_name' => 'materialize_theme_option',
                )
            ),
            'import_preview_image_url'   => TT_PLUGIN_URL.'images/app-landing-one.jpg',
            'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately. It can be found under appearance menu(Import Sliders)', 'tt-pl-textdomain' ),
        ),
        array(
            'import_file_name'           => 'App Landing Two',
            'categories'                 => array( 'Onepage', 'Landing' ),
            'import_file_url'            => TT_PLUGIN_URL.'inc/demo-data/app-landing-two/applandingtwo-contents.xml',
            'import_widget_file_url'     => TT_PLUGIN_URL.'inc/demo-data/multipage/widgets-data.wie',
            'import_redux'               => array(
                array(
                    'file_url'    => TT_PLUGIN_URL.'inc/demo-data/app-landing-two/applandingtwo-options.json',
                    'option_name' => 'materialize_theme_option',
                )
            ),
            'import_preview_image_url'   => TT_PLUGIN_URL.'images/app-landing-two.jpg',
            'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately. It can be found under appearance menu(Import Sliders)', 'tt-pl-textdomain' ),
        ),
        array(
            'import_file_name'           => 'Coffee Shop',
            'categories'                 => array( 'Onepage', 'Corporate' ),
            'import_file_url'            => TT_PLUGIN_URL.'inc/demo-data/coffee-shop/coffeeshop-contents.xml',
            'import_widget_file_url'     => TT_PLUGIN_URL.'inc/demo-data/multipage/widgets-data.wie',
            'import_redux'               => array(
                array(
                    'file_url'    => TT_PLUGIN_URL.'inc/demo-data/coffee-shop/coffeeshop-options.json',
                    'option_name' => 'materialize_theme_option',
                )
            ),
            'import_preview_image_url'   => TT_PLUGIN_URL.'images/coffee.jpg',
            'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately. It can be found under appearance menu(Import Sliders)', 'tt-pl-textdomain' ),
        ),
        array(
            'import_file_name'           => 'Construction Demo',
            'categories'                 => array( 'Full Demo', 'Corporate' ),
            'import_file_url'            => TT_PLUGIN_URL.'inc/demo-data/construction-demo/construction-contents.xml',
            'import_widget_file_url'     => TT_PLUGIN_URL.'inc/demo-data/multipage/widgets-data.wie',
            'import_redux'               => array(
                array(
                    'file_url'    => TT_PLUGIN_URL.'inc/demo-data/construction-demo/construction-options.json',
                    'option_name' => 'materialize_theme_option',
                )
            ),
            'import_preview_image_url'   => TT_PLUGIN_URL.'images/construction.jpg',
            'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately. It can be found under appearance menu(Import Sliders)', 'tt-pl-textdomain' ),
        ),
        array(
            'import_file_name'           => 'Corporate Demo',
            'categories'                 => array( 'Full Demo', 'Corporate' ),
            'import_file_url'            => TT_PLUGIN_URL.'inc/demo-data/corporate-demo/corporate-contents.xml',
            'import_widget_file_url'     => TT_PLUGIN_URL.'inc/demo-data/multipage/widgets-data.wie',
            'import_redux'               => array(
                array(
                    'file_url'    => TT_PLUGIN_URL.'inc/demo-data/corporate-demo/corporate-options.json',
                    'option_name' => 'materialize_theme_option',
                )
            ),
            'import_preview_image_url'   => TT_PLUGIN_URL.'images/corporate.jpg',
            'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately. It can be found under appearance menu(Import Sliders)', 'tt-pl-textdomain' ),
        ),
        array(
            'import_file_name'           => 'Creative Demo',
            'categories'                 => array( 'Full Demo', 'Corporate' ),
            'import_file_url'            => TT_PLUGIN_URL.'inc/demo-data/creative-demo/creative-contents.xml',
            'import_widget_file_url'     => TT_PLUGIN_URL.'inc/demo-data/multipage/widgets-data.wie',
            'import_redux'               => array(
                array(
                    'file_url'    => TT_PLUGIN_URL.'inc/demo-data/creative-demo/creative-options.json',
                    'option_name' => 'materialize_theme_option',
                )
            ),
            'import_preview_image_url'   => TT_PLUGIN_URL.'images/creative.jpg',
            'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately. It can be found under appearance menu(Import Sliders)', 'tt-pl-textdomain' ),
        ),
        array(
            'import_file_name'           => 'Book Landing',
            'categories'                 => array( 'Onepage', 'Landing' ),
            'import_file_url'            => TT_PLUGIN_URL.'inc/demo-data/onepage-book-landing/booklanding-contents.xml',
            'import_widget_file_url'     => TT_PLUGIN_URL.'inc/demo-data/multipage/widgets-data.wie',
            'import_redux'               => array(
                array(
                    'file_url'    => TT_PLUGIN_URL.'inc/demo-data/onepage-book-landing/booklanding-options.json',
                    'option_name' => 'materialize_theme_option',
                )
            ),
            'import_preview_image_url'   => TT_PLUGIN_URL.'images/book.jpg',
            'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately. It can be found under appearance menu(Import Sliders)', 'tt-pl-textdomain' ),
        ),
        array(
            'import_file_name'           => 'Onepage Default',
            'categories'                 => array( 'Onepage', 'Portfolio' ),
            'import_file_url'            => TT_PLUGIN_URL.'inc/demo-data/onepage-default/onepage-default-contents.xml',
            'import_widget_file_url'     => TT_PLUGIN_URL.'inc/demo-data/multipage/widgets-data.wie',
            'import_redux'               => array(
                array(
                    'file_url'    => TT_PLUGIN_URL.'inc/demo-data/onepage-default/onepage-default-options.json',
                    'option_name' => 'materialize_theme_option',
                )
            ),
            'import_preview_image_url'   => TT_PLUGIN_URL.'images/onepage-default.jpg',
            'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately. It can be found under appearance menu(Import Sliders)', 'tt-pl-textdomain' ),
        ),
        array(
            'import_file_name'           => 'Onepage Event',
            'categories'                 => array( 'Onepage', 'Landing' ),
            'import_file_url'            => TT_PLUGIN_URL.'inc/demo-data/onepage-event/event-contents.xml',
            'import_widget_file_url'     => TT_PLUGIN_URL.'inc/demo-data/multipage/widgets-data.wie',
            'import_redux'               => array(
                array(
                    'file_url'    => TT_PLUGIN_URL.'inc/demo-data/onepage-event/event-options.json',
                    'option_name' => 'materialize_theme_option',
                )
            ),
            'import_preview_image_url'   => TT_PLUGIN_URL.'images/event.jpg',
            'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately. It can be found under appearance menu(Import Sliders)', 'tt-pl-textdomain' ),
        ),
        array(
            'import_file_name'           => 'Onepage Portfolio',
            'categories'                 => array( 'Onepage', 'Portfolio' ),
            'import_file_url'            => TT_PLUGIN_URL.'inc/demo-data/onepage-portfolio/portfolio-contents.xml',
            'import_widget_file_url'     => TT_PLUGIN_URL.'inc/demo-data/multipage/widgets-data.wie',
            'import_redux'               => array(
                array(
                    'file_url'    => TT_PLUGIN_URL.'inc/demo-data/onepage-portfolio/portfolio-options.json',
                    'option_name' => 'materialize_theme_option',
                )
            ),
            'import_preview_image_url'   => TT_PLUGIN_URL.'images/portfolio.jpg',
            'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately. It can be found under appearance menu(Import Sliders)', 'tt-pl-textdomain' ),
        ),
        array(
            'import_file_name'           => 'Restaurant Demo',
            'categories'                 => array( 'Corporate', 'Full Demo' ),
            'import_file_url'            => TT_PLUGIN_URL.'inc/demo-data/restaurant/restaurant-contents.xml',
            'import_widget_file_url'     => TT_PLUGIN_URL.'inc/demo-data/multipage/widgets-data.wie',
            'import_redux'               => array(
                array(
                    'file_url'    => TT_PLUGIN_URL.'inc/demo-data/restaurant/restaurant-options.json',
                    'option_name' => 'materialize_theme_option',
                )
            ),
            'import_preview_image_url'   => TT_PLUGIN_URL.'images/restaurant.jpg',
            'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately. It can be found under appearance menu(Import Sliders)', 'tt-pl-textdomain' ),
        ),
        array(
            'import_file_name'           => 'SEO Demo',
            'categories'                 => array( 'Corporate', 'Full Demo' ),
            'import_file_url'            => TT_PLUGIN_URL.'inc/demo-data/seo-demo/seo-contents.xml',
            'import_widget_file_url'     => TT_PLUGIN_URL.'inc/demo-data/multipage/widgets-data.wie',
            'import_redux'               => array(
                array(
                    'file_url'    => TT_PLUGIN_URL.'inc/demo-data/seo-demo/seo-options.json',
                    'option_name' => 'materialize_theme_option',
                )
            ),
            'import_preview_image_url'   => TT_PLUGIN_URL.'images/seo.jpg',
            'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately. It can be found under appearance menu(Import Sliders)', 'tt-pl-textdomain' ),
        )
    );
}
add_filter( 'pt-ocdi/import_files', 'tt_import_files' );



// set primary menu front page and blog page
function tt_after_import( $selected_import ) {
 
    if ( 'Multipage Demo' === $selected_import['import_file_name'] ) {
        //Set Menu
        $primary_menu = get_term_by('name', 'Primary Menu', 'nav_menu');
        $footer_menu = get_term_by('name', 'Footer Menu', 'nav_menu');
        set_theme_mod( 'nav_menu_locations' , array( 
              'primary' => $primary_menu->term_id,
              'footer' => $footer_menu->term_id
             ) 
        );

        // Assign front page and posts page (blog page).
        $front_page_id = get_page_by_title( 'Home' );
        $blog_page_id  = get_page_by_title( 'Blog' );

        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );
        update_option( 'page_for_posts', $blog_page_id->ID );

    } elseif ( 'Agency Demo' === $selected_import['import_file_name'] ) {
        //Set Menu
        $primary_menu = get_term_by('name', 'Primary Menu', 'nav_menu');
        $footer_menu = get_term_by('name', 'Footer Menu', 'nav_menu');
        set_theme_mod( 'nav_menu_locations' , array( 
              'primary' => $primary_menu->term_id,
              'footer' => $footer_menu->term_id
             ) 
        );
 
        // Assign front page and posts page (blog page).
        $front_page_id = get_page_by_title( 'Home' );

        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );

    } elseif ( 'App Landing One' === $selected_import['import_file_name'] ) {
        //Set Menu
        $primary_menu = get_term_by('name', 'Primary Menu', 'nav_menu');
        set_theme_mod( 'nav_menu_locations' , array( 
              'primary' => $primary_menu->term_id
             ) 
        );
 
        // Assign front page and posts page (blog page).
        $front_page_id = get_page_by_title( 'App Landing Page 1' );

        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );

    } elseif ( 'App Landing Two' === $selected_import['import_file_name'] ) {
        //Set Menu
        $footer_menu = get_term_by('name', 'Footer Menu', 'nav_menu');
        set_theme_mod( 'nav_menu_locations' , array( 
              'footer' => $footer_menu->term_id
             ) 
        );
 
        // Assign front page and posts page (blog page).
        $front_page_id = get_page_by_title( 'App Landing Page 2' );

        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );

    } elseif ( 'Coffee Shop' === $selected_import['import_file_name'] ) {
        //Set Menu
        $primary_menu = get_term_by('name', 'Primary Menu', 'nav_menu');
        $footer_menu = get_term_by('name', 'Footer Menu', 'nav_menu');
        set_theme_mod( 'nav_menu_locations' , array( 
              'primary' => $primary_menu->term_id,
              'footer' => $footer_menu->term_id
             ) 
        );
 
        // Assign front page and posts page (blog page).
        $front_page_id = get_page_by_title( 'Home Coffee Shop' );

        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );

    } elseif ( 'Construction Demo' === $selected_import['import_file_name'] ) {
        //Set Menu
        $primary_menu = get_term_by('name', 'Primary Menu', 'nav_menu');
        set_theme_mod( 'nav_menu_locations' , array( 
              'primary' => $primary_menu->term_id
             ) 
        );
 
        // Assign front page and posts page (blog page).
        $front_page_id = get_page_by_title( 'Home' );

        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );

    } elseif ( 'Corporate Demo' === $selected_import['import_file_name'] ) {
        //Set Menu
        $primary_menu = get_term_by('name', 'Primary Menu', 'nav_menu');
        $footer_menu = get_term_by('name', 'Footer Menu', 'nav_menu');
        set_theme_mod( 'nav_menu_locations' , array( 
              'primary' => $primary_menu->term_id,
              'footer' => $footer_menu->term_id
             ) 
        );
 
        // Assign front page and posts page (blog page).
        $front_page_id = get_page_by_title( 'Home' );

        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );

    } elseif ( 'Creative Demo' === $selected_import['import_file_name'] ) {
        //Set Menu
        $primary_menu = get_term_by('name', 'Primary Menu', 'nav_menu');
        set_theme_mod( 'nav_menu_locations' , array( 
              'primary' => $primary_menu->term_id
             ) 
        );
 
        // Assign front page and posts page (blog page).
        $front_page_id = get_page_by_title( 'Home' );

        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );

    } elseif ( 'Book Landing' === $selected_import['import_file_name'] ) {
        // Assign front page and posts page (blog page).
        $front_page_id = get_page_by_title( 'Book Landing Page' );

        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );

    } elseif ( 'Onepage Default' === $selected_import['import_file_name'] ) {
        //Set Menu
        $primary_menu = get_term_by('name', 'Primary Menu', 'nav_menu');
        set_theme_mod( 'nav_menu_locations' , array( 
              'primary' => $primary_menu->term_id
             ) 
        );
        
        // Assign front page and posts page (blog page).
        $front_page_id = get_page_by_title( 'Onepage Default' );

        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );

    } elseif ( 'Onepage Event' === $selected_import['import_file_name'] ) {
        //Set Menu
        $primary_menu = get_term_by('name', 'Primary Menu', 'nav_menu');
        $footer_menu = get_term_by('name', 'Footer Menu', 'nav_menu');
        set_theme_mod( 'nav_menu_locations' , array( 
              'primary' => $primary_menu->term_id,
              'footer' => $footer_menu->term_id
             ) 
        );

        // Assign front page and posts page (blog page).
        $front_page_id = get_page_by_title( 'Onepage Event' );

        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );

    } elseif ( 'Onepage Portfolio' === $selected_import['import_file_name'] ) {
        //Set Menu
        $primary_menu = get_term_by('name', 'Primary Menu', 'nav_menu');
        set_theme_mod( 'nav_menu_locations' , array( 
              'primary' => $primary_menu->term_id
             ) 
        );

        // Assign front page and posts page (blog page).
        $front_page_id = get_page_by_title( 'Onepage Portfolio' );

        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );

    } elseif ( 'Restaurant Demo' === $selected_import['import_file_name'] ) {
        //Set Menu
        $primary_menu = get_term_by('name', 'Primary Menu', 'nav_menu');
        $footer_menu = get_term_by('name', 'Footer Menu', 'nav_menu');
        set_theme_mod( 'nav_menu_locations' , array( 
              'primary' => $primary_menu->term_id,
              'footer' => $footer_menu->term_id
             ) 
        );

        // Assign front page and posts page (blog page).
        $front_page_id = get_page_by_title( 'Home' );

        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );

    } elseif ( 'SEO Demo' === $selected_import['import_file_name'] ) {
        //Set Menu
        $primary_menu = get_term_by('name', 'Primary Menu', 'nav_menu');
        $footer_menu = get_term_by('name', 'Footer Menu', 'nav_menu');
        set_theme_mod( 'nav_menu_locations' , array( 
              'primary' => $primary_menu->term_id,
              'footer' => $footer_menu->term_id
             ) 
        );

        // Assign front page and posts page (blog page).
        $front_page_id = get_page_by_title( 'Home' );

        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );
    }
}

add_action( 'pt-ocdi/after_import', 'tt_after_import' );


// disable notice
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );





function tt_plugin_intro_text( $default_text ) {
    $default_text .= '<div class="ocdi__intro-notice  notice  notice-warning"><p><strong>Before install the demo you need to increase those limits to a minimum as follows:</strong><br>
	<code>max_execution_time=300, max_input_time=600, max_input_vars=5000, memory_limit=256M, post_max_size=48M, upload_max_filesize=48M.</code><br><span>You can verify your PHP configuration limits by installing a simple plugin found <a href="http://wordpress.org/extend/plugins/wordpress-php-info/" target="_blank">here</a>. In addition, you can always contact your host and ask them what the current settings are and have them adjust them if needed</span></p></div>';

    return $default_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'tt_plugin_intro_text' );