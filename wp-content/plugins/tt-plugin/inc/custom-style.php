<?php
    header('Content-type: text/css');
    $parse_uri = explode('wp-content', $_SERVER[ 'SCRIPT_FILENAME' ]);
    $wp_load = $parse_uri[ 0 ] . 'wp-load.php';
    require_once($wp_load);

    // color options
    $accent_color = materialize_option('accent-color', false, '#03a9f4');
    $link_color = materialize_option('link-color', false, '#03a9f4');
    $footer_bg = materialize_option('footer_background', false, '#03a9f4');

    // background color options
    $body_bg_color = materialize_option('body-bg-color', false, '#fff');
    
    // accent color darken
    $accent_darken = materialize_modify_color( $accent_color, -50 );
    $accent_darken2 = materialize_modify_color( $accent_color, -20 );
    $footer_bg_darken = materialize_modify_color( $footer_bg, -10 );
    $link_darken = materialize_modify_color( $link_color, -50 );

    // accent color lighten
    $footer_bg_lighten = materialize_modify_color( $footer_bg, 40 );

    // body typography
    $font_color = materialize_option('body-typography', 'color');
    $font_size = materialize_option('body-typography', 'font-size');
    $font_family = materialize_option('body-typography', 'font-family');
    $font_weight = materialize_option('body-typography', 'font-weight');
    $line_height = materialize_option('body-typography', 'line-height');

    // heading typography
    $heading_color = materialize_option('heading-typography', 'color');
    $heading_font_family = materialize_option('heading-typography', 'font-family');
    $heading_font_weight = materialize_option('heading-typography', 'font-weight');

    // specific title size and it's line height

    // for H1
    $h1_font_size = materialize_option('h1-typography', 'font-size');
    $h1_line_height = materialize_option('h1-typography', 'line-height');

    // for H2
    $h2_font_size = materialize_option('h2-typography', 'font-size');
    $h2_line_height = materialize_option('h2-typography', 'line-height');

    // for H3
    $h3_font_size = materialize_option('h3-typography', 'font-size');
    $h3_line_height = materialize_option('h3-typography', 'line-height');

    // for H4
    $h4_font_size = materialize_option('h4-typography', 'font-size');
    $h4_line_height = materialize_option('h4-typography', 'line-height'); 

    // for H5
    $h5_font_size = materialize_option('h5-typography', 'font-size');
    $h5_line_height = materialize_option('h5-typography', 'line-height');

    // for H6
    $h6_font_size = materialize_option('h6-typography', 'font-size');
    $h6_line_height = materialize_option('h6-typography', 'line-height');

    // section title typography
    $section_title_color = materialize_option('section-title', 'color');
    $section_title_size = materialize_option('section-title', 'font-size');
    $section_title_family = materialize_option('section-title', 'font-family');
    $section_title_weight = materialize_option('section-title', 'font-weight');
    $section_title_line_height = materialize_option('section-title', 'line-height');

    // section title intro typography
    $section_title_intro_color = materialize_option('section-title-intro', 'color');
    $section_title_intro_size = materialize_option('section-title-intro', 'font-size');
    $section_title_intro_family = materialize_option('section-title-intro', 'font-family');
    $section_title_intro_weight = materialize_option('section-title-intro', 'font-weight');
    $section_title_intro_line_height = materialize_option('section-title-intro', 'line-height');

    // header title typography
    $header_title_color = materialize_option('header-title', 'color');
    $header_title_size = materialize_option('header-title', 'font-size');
    $header_title_family = materialize_option('header-title', 'font-family');
    $header_title_weight = materialize_option('header-title', 'font-weight');
    $header_title_line_height = materialize_option('header-title', 'line-height');

    // default menu color
    $default_font_color = materialize_option('menu-color', false, false);
    if ($default_font_color) :
        $default_font_color = 'color:' .$default_font_color. '';
    endif;

    // mobile menu color
    $mobile_menu_font_color = materialize_option('mobile-menu-color', false, false);
    if ($mobile_menu_font_color) :
        $mobile_menu_font_color = 'color:' .$mobile_menu_font_color. '';
    endif;

    // sticky menu color
    $sticky_font_color = materialize_option('sticky-menu-color', false, false);
    if ($sticky_font_color) :
        $sticky_font_color = 'color:' .$sticky_font_color. '';
    endif;

    // menu background
    $menu_bg_color = materialize_option('menu-bg-color', false, false);
    if ($menu_bg_color) :
        $menu_bg_color = 'background-color:' .$menu_bg_color. '';
    endif;

    // mobile menu background
    $mobile_menu_bg_color = materialize_option('mobile-menu-bg-color', false, false);
    if ($mobile_menu_bg_color) :
        $mobile_menu_bg_color = 'background-color:' .$mobile_menu_bg_color. '';
    endif;

    // sticky menu background
    $sticky_menu_bg_color = materialize_option('sticky-menu-bg-color', false, false);
    if ($sticky_menu_bg_color) :
        $sticky_menu_bg_color = 'background-color:' .$sticky_menu_bg_color. '';
    endif;
?>

body{
    background-color: <?php echo esc_attr($body_bg_color) ?>;
    color: <?php echo esc_attr($font_color) ?>;
    font-size: <?php echo esc_attr($font_size) ?>;
    font-family: <?php echo esc_attr($font_family) ?>, sans-serif;
    font-weight: <?php echo esc_attr($font_weight) ?>;
    line-height: <?php echo esc_attr($line_height) ?>;
}

h1, 
h2, 
h3, 
h4, 
h5, 
h6{
    color: <?php echo esc_attr($heading_color) ?>;
    font-family: <?php echo esc_attr($heading_font_family) ?>, sans-serif;
    font-weight: <?php echo esc_attr($heading_font_weight) ?>;
}
h1{
    font-size: <?php echo esc_attr($h1_font_size) ?>;
    line-height: <?php echo esc_attr($h1_line_height) ?>;
}
h2{
    font-size: <?php echo esc_attr($h2_font_size) ?>;
    line-height: <?php echo esc_attr($h2_line_height) ?>;
}
h3{
    font-size: <?php echo esc_attr($h3_font_size) ?>;
    line-height: <?php echo esc_attr($h3_line_height) ?>;
}
h4{
    font-size: <?php echo esc_attr($h4_font_size) ?>;
    line-height: <?php echo esc_attr($h4_line_height) ?>;
}
h5{
    font-size: <?php echo esc_attr($h5_font_size) ?>;
    line-height: <?php echo esc_attr($h5_line_height) ?>;
}
h6{
    font-size: <?php echo esc_attr($h6_font_size) ?>;
    line-height: <?php echo esc_attr($h6_line_height) ?>;
}

<?php if (materialize_option('section-title-typography') == 0): ?>
    .section-title{
        color: <?php echo esc_attr($section_title_color) ?>;
        font-size: <?php echo esc_attr($section_title_size) ?>;
        font-family: <?php echo esc_attr($section_title_family) ?>, sans-serif;
        font-weight: <?php echo esc_attr($section_title_weight) ?>;
        line-height: <?php echo esc_attr($section_title_line_height) ?>;
    }
    .section-intro{
        color: <?php echo esc_attr($section_title_intro_color) ?>;
        font-size: <?php echo esc_attr($section_title_intro_size) ?>;
        font-family: <?php echo esc_attr($section_title_intro_family) ?>, cursive;
        font-weight: <?php echo esc_attr($section_title_intro_weight) ?>;
        line-height: <?php echo esc_attr($section_title_intro_line_height) ?>;
    }
<?php endif; ?>

<?php if (materialize_option('header-title-typography') == 0): ?>
    .page-title h2{
        color: <?php echo esc_attr($header_title_color) ?> !important;
        font-size: <?php echo esc_attr($header_title_size) ?>;
        font-family: <?php echo esc_attr($header_title_family) ?>, sans-serif;
        font-weight: <?php echo esc_attr($header_title_weight) ?>;
        line-height: <?php echo esc_attr($header_title_line_height) ?>;
    }

    .page-title .tt-breadcrumb{
        color: <?php echo esc_attr($header_title_color) ?> !important;
    }
<?php endif; ?>

<?php 
/**
* Color
*/
?>
a{
    color: <?php echo esc_attr($link_color) ?>;
}


<?php 
/**
* Color darken
*/
?>

a:focus,
a:hover{
    color: <?php echo esc_attr($link_darken) ?>;
}


<?php 
/**
*
* Background color
*/
?>

.btn,
.btn:hover,
button:focus,
.woocommerce a.button,
.woocommerce button.button.alt,
.woocommerce button.button.alt.disabled,
.woocommerce input.button,
.woocommerce input.button.alt,
.woocommerce #respond input#submit,
.woocommerce #respond input#submit.alt, 
.woocommerce a.button.alt, 
.woocommerce button.button.alt, 
.woocommerce input.button.alt,
.woocommerce .product .entry-summary a.single_add_to_cart_button,
.theme-bg,
.sction-title-wrapper .separator,
.header-top-wrapper,
.header-brand-color .navbar-default,
.dropdown>li>a::before,
.navbar-default .navbar-toggle:focus,
.navbar-default .navbar-toggle:hover,
.tt-home-slider .slides-navigation a:hover,
.brand-filter li:hover,
.brand-filter li.active,
ul.portfolio-filter.default-color li.active,
.icon-block:hover .tt-icon.icon-hover-default i,
.hover-block .icon-block:hover,
.border-plusbox.hover-block .icon-block-grid:hover,
.animated-block.hover-block .icon-block-grid:hover,
.booking-form-wrapper h3:before,
.process-box,
.tt-gallery-thumb .slides>li.flex-active-slide img,
.work-showcase .carousel-control:focus, 
.work-showcase .carousel-control:hover,
.work-showcase .carousel-indicators .active,
.entry-header .posted-in a,
.entry-header .posted-in a:hover,
.format-link .blog-link > a:hover,
.blog-gallery-carousel .carousel-control:focus, 
.blog-gallery-carousel .carousel-control:hover,
.blog-navigation a:hover,
.page-pagination a:hover,
.page-pagination a:hover span,
.page-pagination > span,
.single-post-navigation a:hover,
.widget.widget_mc4wp_form_widget,
.widget_tag_cloud a:hover,
.pager.comment-navigation li a:hover,
.comments-tab .nav-tabs>li.active>a, 
.comments-tab .nav-tabs>li.active>a:focus, 
.comments-tab .nav-tabs>li.active>a:hover, 
.comments-tab .nav-tabs.nav-justified>.active>a, 
.comments-tab .nav-tabs.nav-justified>.active>a:focus, 
.comments-tab .nav-tabs.nav-justified>.active>a:hover,
.basecamp-testimonial,
.pricing-table:hover .brand-hover,
.footer-section,
.backToTop i,
#toTop:hover,
.comments-wrapper .form-submit input,
.vc_tta-color-theme_default_color .vc_tta-panel.vc_active .vc_tta-panel-heading,
.feature-accordion.brand-accordion .panel-title a,
.project-carousel.owl-theme .owl-dots .owl-dot.active span, 
.project-carousel.owl-theme .owl-dots .owl-dot:hover span,
.job-menu li a:hover,
.icon-hover-blue:hover .icon,
.feature-background .featured-item.blue-hover:hover,
.seo-service .bg-overlay,
.brand-dot.owl-theme .owl-dots .owl-dot.active span, 
.brand-dot.owl-theme .owl-dots .owl-dot:hover span,
.card-wrapper .input-container .bar:before, 
.card-wrapper .input-container .bar:after,
.promo-info .promo-icon,
.btn-download.app-download:focus,
.btn-download.app-download:hover,
.picker__date-display,
.blog-carousel.owl-theme .owl-dots .owl-dot.active span, 
.blog-carousel.owl-theme .owl-dots .owl-dot:hover span,
.vc_general.vc_tta.vc_tta-tabs.vc_tta-style-icon-tab .vc_tta-tab.vc_active a,
.vc_general.vc_tta.vc_tta-tabs.vc_tta-style-border-tab-background .vc_tta-tab a,
.vc_general.vc_tta.vc_tta-tabs.vc_tta-style-square-tab .vc_tta-tab a:hover,
.vc_general.vc_tta.vc_tta-tabs.vc_tta-style-rounded-tab .vc_tta-tab a:hover,
.vc_general.vc_tta.vc_tta-tabs.vc_tta-style-square-tab .vc_tta-tab.vc_active a,
.vc_general.vc_tta.vc_tta-tabs.vc_tta-style-rounded-tab .vc_tta-tab.vc_active a,
.vc_general.vc_tta.vc_tta-tabs.vc_tta-style-vertical-tab .vc_tta-tab a,
.woocommerce .quantity .btn-quantity:hover,
.woocommerce div.product .woocommerce-tabs ul.tabs li.active > a{
    background-color: <?php echo esc_attr($accent_color) ?>;
}

.picker__weekday-display,
.food-menu-intro{
    background-color: <?php echo esc_attr($accent_darken2) ?>;
}

.brand-bg,
.btn-primary.focus, 
.btn-primary:focus,
.btn-primary.active, 
.btn-primary:active,
.btn-primary.active.focus, 
.btn-primary.active:focus, 
.btn-primary.active:hover, 
.btn-primary:active.focus, 
.btn-primary:active:focus, 
.btn-primary:active:hover,
.submit-brand .btn,
.brand-hover:hover,
.btn-menu a,
.btn-menu a:hover,
.pagination>li>a:hover, 
.pagination>li>span:hover, 
.pagination>li>a:focus, 
.pagination>li>span:focus,
.page-numbers .current,
.pagination .current,
.pagination>.active>a,
.pagination>.active>span,
.pagination>.active>a:hover,
.pagination>.active>span:hover,
.pagination>.active>a:focus,
.pagination>.active>span:focus,
.page-numbers>li>a:hover, 
.page-numbers>li>span:hover, 
.page-numbers>li>a:focus, 
.page-numbers>li>span:focus,
.vc_btn3-color-theme_primary_color,
.woocommerce a.button:hover,
.woocommerce a.button:focus,
.woocommerce a.button:active,
.woocommerce button.button.alt:hover,
.woocommerce button.button.alt:focus,
.woocommerce button.button.alt:active,
.woocommerce input.button:hover,
.woocommerce input.button:focus,
.woocommerce input.button:active,
.woocommerce input.button.alt:hover,
.woocommerce input.button.alt:focus,
.woocommerce input.button.alt:active,
.woocommerce #respond input#submit:hover,
.woocommerce #respond input#submit:focus,
.woocommerce #respond input#submit:active,
.woocommerce .product .entry-summary a.single_add_to_cart_button:hover,
.woocommerce .product .entry-summary a.single_add_to_cart_button:focus,
.woocommerce .product .entry-summary a.single_add_to_cart_button:active,
.featured-carousel.owl-theme .owl-dots .owl-dot.active span, 
.featured-carousel.owl-theme .owl-dots .owl-dot:hover span,
.vc_tta-color-theme_default_color.vc_tta-style-flat .vc_tta-panel .vc_tta-panel-heading,
.vc_tta-color-theme_default_color.vc_tta-style-flat .vc_tta-panel .vc_tta-panel-body, 
.vc_tta-color-theme_default_color.vc_tta-style-flat .vc_tta-panel.vc_active .vc_tta-panel-heading {
    background-color: <?php echo esc_attr($accent_color) ?>!important; 
}

@media (min-width: 768px) {
    .hover-box .navbar-nav>li.active>a,
    .hover-box .navbar-nav>li.active>a i,
    .hover-box .navbar-default .navbar-nav>.active>a, 
    .hover-box .navbar-default .navbar-nav>.active>a:focus, 
    .hover-box .navbar-default .navbar-nav>.active>a:hover,
    .hover-box .navbar-default .navbar-nav>li>a:focus, 
    .hover-box .navbar-default .navbar-nav>li>a:hover,
    .hover-box .navbar-default .navbar-nav>li.active>a,
    .hover-box .navbar-default .navbar-nav>li.current-menu-ancestor>a, 
    .hover-box .navbar-default .navbar-nav>li.current-menu-parent>a, 
    .hover-box .navbar-default .navbar-nav>li.current-menu-item>a
    .hover-box .header-transparent .navbar-default .navbar-nav>.active>a, 
    .hover-box .header-transparent .navbar-default .navbar-nav>.active>a:focus, 
    .hover-box .header-transparent .navbar-default .navbar-nav>.active>a:hover,
    .hover-box .header-transparent .header-wrapper.sticky .navbar-nav>li>a:focus, 
    .hover-box .header-transparent .header-wrapper.sticky .navbar-nav>li>a:hover,
    .hover-box .header-transparent .header-wrapper.sticky .navbar-nav>.active>a, 
    .hover-box .header-transparent .header-wrapper.sticky .navbar-nav>.active>a:focus, 
    .hover-box .header-transparent .header-wrapper.sticky .navbar-nav>.active>a:hover{
        background-color: <?php echo esc_attr($accent_color) ?>;
    }
}

@media(max-width: 767px){
    .vc_tta-panel.vc_active .vc_tta-panel-heading{
        background-color: <?php echo esc_attr($accent_color) ?>;
    }
}


<?php 
/**
*
* Color
*/
?>
.btn-white,
.btn-white:hover,
.btn-white:focus,
.address-wrapper .info-wrapper a:hover,
.check-circle-list li:hover i,
.theme-color,
.team-social-links li a:hover,
.navbar-default .navbar-nav>li>a:focus,
.navbar-default .navbar-nav>li>a:hover,
.navbar-default .navbar-nav>li.active>a, 
.navbar-default .navbar-nav>li.active>a:focus, 
.navbar-default .navbar-nav>li.active>a:hover,
.navbar-default .navbar-nav>.open>a, 
.navbar-default .navbar-nav>.open>a:focus, 
.navbar-default .navbar-nav>.open>a:hover,
.dropdown-menu>.active>a, 
.dropdown-menu>.active>a:focus, 
.dropdown-menu>.active>a:hover,
.dropdown-menu>li>a:focus, 
.dropdown-menu>li>a:hover,
.navbar-default .navbar-nav li.current-menu-ancestor.has-mega-menu-child>a:hover,
.navbar-default .navbar-nav li.current-menu-parent.has-mega-menu-child>a:hover,
.footer-nav ul.sub-menu li a:hover,
.search-trigger i:hover,
.header-transparent .sticky .search-trigger i:hover,
.hero-block-caption .btn:hover,
.intro .btn:hover,
.intro-block a.learn-more,
.portfolio-with-title .portfolio-title h2 a:hover,
.portfolio-with-title .portfolio-title p a:hover,
.portfolio-item .card .card-title i,
.portfolio-item .card .card-content p a:hover,
.portfolio-nav a:hover,
.project-overview .portfolio-title p a,
.portfolio-meta li a:hover,
.control-two:hover .carousel-control:hover,
.icon-block.icon-default:hover .tt-icon i,
.icon-block .tt-icon a.theme-color, 
.icon-block h3.theme-color,
.icon-block h3 a.theme-color,
.timer-brand-color .countdown li span,
.timer-multi-color .countdown li:nth-child(2) span,
.counter-wrap i,
.profile .available a:hover,
.booking-form-wrapper h3,
.icon-wrapper .mail a:hover,
.post-wrapper .entry-header .post-comments,
.entry-header .posted-on a:hover,
.tt-sidebar-wrapper .widget-title,
.tt-sidebar-wrapper .widget_categories ul li a:hover,
.tt-sidebar-wrapper .widget_archive ul li a:hover,
.tt-sidebar-wrapper .widget_meta ul li a:hover,
.tt-sidebar-wrapper .widget_pages ul li a:hover,
.tt-sidebar-wrapper .widget_nav_menu ul li a:hover,
.tt-sidebar-wrapper .widget_recent_comments ul li a:hover,
.tt-sidebar-wrapper .widget_recent_entries ul li a:hover,
.tt-popular-post .media-body h4 a:hover,
.tt-latest-post .media-body h4 a:hover,
.tt-recent-comments .media-body h4 a:hover,
.author-social-links ul li a:hover,
.widget_mc4wp_form_widget .btn,
.widget_mc4wp_form_widget .btn:hover,
.widget_mc4wp_form_widget .btn:focus,
.widget_calendar #today,
.single-post .header-wrap ul li a:hover,
.single-post .entry-footer .post-tags a:hover,
.authors-post a:hover,
.author-social ul li a:hover,
.comment-meta-wrapper a:hover,
.creative-testimonial .author-name,
.client-thumb-circle .client-info .client-name,
.food-menu-label,
.social-icon ul li a i:hover,
.footer-section .social-links-wrap li a i:hover,
#toTop,
.brand-icon,
.team-title h3 a:hover,
.card-wrapper .title,
.job-menu .category,
.project-carousel .number,
.flat-accordion .panel-title a,
.card-wrapper .footer a:hover,
.flat-accordion.brand-accordion .panel-title a,
.featured-item.flat-border-box .readmore:hover,
.featured.plus-box .featured-item:hover .icon,
.btn-download.app-download,
.erinyen .tp-tab-title,
.team-social-links li a:hover,
.vc_general.vc_tta.vc_tta-tabs.vc_tta-style-icon-tab .vc_tta-tab a,
.vc_general.vc_tta.vc_tta-tabs.vc_tta-style-border-box-tab .vc_tta-tab.vc_active>a,
.vc_general.vc_tta.vc_tta-tabs.vc_tta-style-border-tab-transparent .vc_tta-tab.vc_active>a,
.vc_tta-color-theme_default_color.vc_tta-style-outline .vc_tta-panel.vc_active .vc_tta-panel-title>a,
.flex-direction-nav a:before,
.carousel-testimonial .carousel-control:focus, 
.carousel-testimonial .carousel-control:hover,
.latest-featured-news .entry-title a:hover,
.latest-featured-news .entry-meta li .zilla-likes:hover::before,
.latest-featured-news .entry-meta li a:hover,
.latest-featured-news .blog-content a.readmore:hover,
.post-wrapper .entry-title a,
.post-wrapper .post-comments a,
.post-wrapper .entry-content .more-link,
.tt-gallery-nav .gallery-control,
.shop-category-wrapper h2 i,
.shop-category-wrapper ul li a:hover,
.entry-summary .yith-wcwl-add-to-wishlist .add_to_wishlist::before, 
.entry-summary .yith-wcwl-add-to-wishlist a, a.compare:hover:before,
.product_meta span a:hover {
    color: <?php echo esc_attr($accent_color) ?>;
}

.post-wrapper .entry-title a:hover,
.post-wrapper .post-comments a:hover,
.post-wrapper .entry-content .more-link:hover{
    color: <?php echo esc_attr($accent_darken) ?>;
}

.navbar-default .navbar-nav li.current-menu-ancestor>a,
.navbar-default .navbar-nav li.current-menu-parent>a,
.navbar-default .navbar-nav li.current-menu-item>a,
.counter-section.style-two .counter-wrap.selected i,
.header-transparent.hover-border-bottom .sticky .navbar-default .navbar-nav>li a:focus, 
.header-transparent.hover-border-bottom .sticky .navbar-default .navbar-nav>li a:hover,
.header-transparent.hover-border-bottom .sticky .navbar-default .navbar-nav>li.current-menu-ancestor>a, 
.header-transparent.hover-border-bottom .sticky .navbar-default .navbar-nav>li.current-menu-parent>a, 
.header-transparent.hover-border-bottom .sticky .navbar-default .navbar-nav>li.current-menu-item>a,
.icon-block:hover .tt-icon.icon-hover-white i,
.vc_tta-color-white.vc_tta-style-flat .vc_tta-panel.vc_active .vc_tta-panel-title>a,
input[type=text]:focus:not([readonly]) + label, 
input[type=password]:focus:not([readonly]) + label, 
input[type=email]:focus:not([readonly]) + label, 
input[type=url]:focus:not([readonly]) + label, 
input[type=time]:focus:not([readonly]) + label, 
input[type=date]:focus:not([readonly]) + label, 
input[type=datetime-local]:focus:not([readonly]) + label, 
input[type=tel]:focus:not([readonly]) + label, 
input[type=number]:focus:not([readonly]) + label, 
input[type=search]:focus:not([readonly]) + label, 
textarea.materialize-textarea:focus:not([readonly]) + label,
.woocommerce .product a.button:hover, .woocommerce .product a.button:focus {
     color: <?php echo esc_attr($accent_color) ?> !important;
}


@media (min-width: 768px) {
    .hover-box.header-brand-color .navbar-default .navbar-nav>li>a:hover,
    .hover-box.header-brand-color .navbar-default .navbar-nav>li.current-menu-ancestor>a, 
    .hover-box.header-brand-color .navbar-default .navbar-nav>li.current-menu-parent>a,
    .header-transparent.hover-border-box .header-wrapper.sticky .navbar-nav>li.active>a,
    .header-transparent.hover-border-box .header-wrapper.sticky .navbar-default .navbar-nav>li>a:focus, 
    .header-transparent.hover-border-box .header-wrapper.sticky .navbar-default .navbar-nav>li>a:hover, 
    .header-transparent.hover-border-box .header-wrapper.sticky .navbar-default .navbar-nav>li.current-menu-ancestor>a, 
    .header-transparent.hover-border-box .header-wrapper.sticky .navbar-default .navbar-nav>li.current-menu-parent>a {
        color: <?php echo esc_attr($accent_color) ?> !important;
    }
}

@media(max-width: 767px){
    .navbar-default .navbar-nav .open .dropdown-menu>li>a:focus, 
    .navbar-default .navbar-nav .open .dropdown-menu>li>a:hover,
    .navbar-default .navbar-nav .open .dropdown-menu>.active>a, 
    .navbar-default .navbar-nav .open .dropdown-menu>.active>a:focus, 
    .navbar-default .navbar-nav .open .dropdown-menu>.active>a:hover,
    .dropdown-menu-trigger.menu-collapsed{
        color: <?php echo esc_attr($accent_color) ?>;
    }
}

<?php 
/**
*
* Border color
*/
?>
.btn-primary,
.btn-primary:hover,
.btn-primary.focus, 
.btn-primary:focus,
.btn-primary.active, 
.btn-primary:active,
.btn-primary.active.focus, 
.btn-primary.active:focus, 
.btn-primary.active:hover, 
.btn-primary:active.focus, 
.btn-primary:active:focus, 
.btn-primary:active:hover,
.vc_btn3-color-theme_primary_color,
.woocommerce a.button,
.woocommerce button.button.alt,
.woocommerce input.button,
.woocommerce input.button.alt,
.woocommerce #respond input#submit,
.woocommerce #respond input#submit.alt, 
.woocommerce a.button.alt, 
.woocommerce button.button.alt, 
.woocommerce input.button.alt,
.woocommerce .product .entry-summary a.single_add_to_cart_button,
.form-control:focus,
.navbar-default .navbar-toggle:focus, 
.navbar-default .navbar-toggle:hover,
.project-overview blockquote,
.icon-block.icon-square:hover .tt-icon.icon-hover-default i.theme-color,
.icon-block.icon-round:hover .tt-icon.icon-hover-default i.theme-color,
.icon-block.icon-circle:hover .tt-icon.icon-hover-default i.theme-color,
.pagination .current,
.pagination>.active>a,
.pagination>.active>span,
.pagination>.active>a:hover,
.pagination>.active>span:hover,
.pagination>.active>a:focus,
.pagination>.active>span:focus,
.blog-navigation a:hover,
.widget select:focus,
.social-icon ul li a i:hover,
#toTop,
.project-carousel .number,
.vc_tta.vc_general.vc_tta-color-theme_default_color.vc_tta-style-outline .vc_tta-panel.vc_active .vc_tta-panel-heading{
    border-color: <?php echo esc_attr($accent_color) ?>;
}

.card-wrapper .title{
    border-left-color: <?php echo esc_attr($accent_color) ?>;
}
.vc_general.vc_tta.vc_tta-tabs.vc_tta-style-border-tab-transparent .vc_tta-tab.vc_active::after,
.vc_general.vc_tta.vc_tta-tabs.vc_tta-style-border-bottom-tab .vc_tta-tab.vc_active,
.vc_general.vc_tta.vc_tta-tabs.vc_tta-style-border-tab-background .vc_tta-tab.vc_active::after{
    border-bottom-color: <?php echo esc_attr($accent_color) ?>;
}

input[type=text]:focus:not([readonly]), 
input[type=password]:focus:not([readonly]), 
input[type=email]:focus:not([readonly]), 
input[type=url]:focus:not([readonly]), 
input[type=time]:focus:not([readonly]), 
input[type=date]:focus:not([readonly]), 
input[type=datetime-local]:focus:not([readonly]), 
input[type=tel]:focus:not([readonly]), 
input[type=number]:focus:not([readonly]), 
input[type=search]:focus:not([readonly]),
textarea:focus, 
textarea.materialize-textarea:focus:not([readonly]) {
    border-bottom: 1px solid <?php echo esc_attr($accent_color) ?>;
    box-shadow: 0 1px 0 0 <?php echo esc_attr($accent_color) ?>; 
}


.page-numbers .current,
.pagination .current,
.pagination>.active>a,
.pagination>.active>span,
.pagination>.active>a:hover,
.pagination>.active>span:hover,
.pagination>.active>a:focus,
.pagination>.active>span:focus,
.tt-popular-post .nav-tabs>li.active>a, 
.tt-popular-post .nav-tabs.nav-justified>li.active>a,
.woocommerce a.button:hover,
.woocommerce a.button:focus,
.woocommerce a.button:active,
.woocommerce button.button.alt:hover,
.woocommerce button.button.alt:focus,
.woocommerce button.button.alt:active,
.woocommerce input.button:hover,
.woocommerce input.button:focus,
.woocommerce input.button:active,
.woocommerce input.button.alt:hover,
.woocommerce input.button.alt:focus,
.woocommerce input.button.alt:active,
.woocommerce #respond input#submit:hover,
.woocommerce #respond input#submit:focus,
.woocommerce #respond input#submit:active,
.woocommerce .product .entry-summary a.single_add_to_cart_button:hover,
.woocommerce .product .entry-summary a.single_add_to_cart_button:focus,
.woocommerce .product .entry-summary a.single_add_to_cart_button:active{
    border-color: <?php echo esc_attr($accent_color) ?> !important;
}

@media (min-width: 768px) {
    .hover-border-bottom .navbar-nav>li.active>a, 
    .hover-border-bottom .navbar-nav>li:hover>a,
    .hover-border-bottom .navbar-nav>li.current-menu-parent>a,
    .hover-border-bottom .navbar-nav>li.current-menu-ancestor>a,
    .header-transparent.hover-border-bottom .sticky .navbar-nav>li.active>a, 
    .header-transparent.hover-border-bottom .sticky .navbar-nav>li:hover>a, 
    .header-transparent.hover-border-bottom .sticky .navbar-nav>li.current-menu-parent>a,
    .header-transparent.hover-border-bottom .sticky .navbar-nav>li.current-menu-ancestor>a {
        border-bottom: 3px solid <?php echo esc_attr($accent_color) ?>;
    }

    .hover-border-box .navbar-nav>li.active>a,
    .hover-border-box .navbar-default .navbar-nav>li>a:focus, 
    .hover-border-box .navbar-default .navbar-nav>li>a:hover,
    .hover-border-box .navbar-default .navbar-nav>li.current-menu-ancestor>a, 
    .hover-border-box .navbar-default .navbar-nav>li.current-menu-parent>a,
    .header-transparent.hover-border-box .header-wrapper.sticky .navbar-nav>li.active>a,
    .header-transparent.hover-border-box .header-wrapper.sticky .navbar-default .navbar-nav>li>a:focus, 
    .header-transparent.hover-border-box .header-wrapper.sticky .navbar-default .navbar-nav>li>a:hover, 
    .header-transparent.hover-border-box .header-wrapper.sticky .navbar-default .navbar-nav>li.current-menu-ancestor>a, 
    .header-transparent.hover-border-box .header-wrapper.sticky .navbar-default .navbar-nav>li.current-menu-parent>a,
    .woocommerce #reviews input:focus,
    .woocommerce #reviews textarea:focus,
    .woocommerce #review_form #respond textarea:focus,
    .woocommerce .select2-choice:focus,
    .woocommerce .input-text:focus{
        border-color: <?php echo esc_attr($accent_color) ?>;
    }
}


<?php 
/**
*
* hex2rgb and darken
*/
?>

.active-search .search-trigger .search-btn,
.team-tab .nav-tabs>li.active>a::before,
.portfolio-wrapper .bg-overlay{
    background-color: rgba(<?php echo materialize_hex2rgb($accent_color)?>,.9);
}

.portfolio-item .card .card-reveal,
.latest-news-card .card-reveal.overlay-blue{
    background-color: rgba(<?php echo materialize_hex2rgb($accent_color)?>,.95);
}



<?php
/**
*
* Media query
*/
?>

@media (max-width : 767px) {
    .header-transparent .navbar-default,
    .navbar-default{
        <?php echo esc_attr($mobile_menu_bg_color)?> !important;
    }
    .header-wrapper.sticky .navbar-default {
        <?php echo esc_attr($sticky_menu_bg_color) ?> !important;
    }
    .header-transparent .navbar-default .navbar-nav li a,
    .navbar-default .navbar-nav li a{
        <?php echo esc_attr($mobile_menu_font_color) ?>;
    }
    .navbar-default .navbar-nav .open .dropdown-menu>li>a:focus, 
    .navbar-default .navbar-nav .open .dropdown-menu>li>a:hover,
    .navbar-default .navbar-nav .open .dropdown-menu>.active>a, 
    .navbar-default .navbar-nav .open .dropdown-menu>.active>a:focus, 
    .navbar-default .navbar-nav .open .dropdown-menu>.active>a:hover{
        color: <?php echo esc_attr($accent_color) ?>;
    }
}


<?php
/**
*
* Footer style
*/
?>
.footer-section{
    background-color: <?php echo esc_attr($footer_bg)?>;
    color: <?php echo esc_attr(materialize_option('footer_text_color', false, '#ffffff'))?>;
}

.footer-menu,
.footer-copyright{
    background-color: <?php echo esc_attr($footer_bg_darken)?>;
}

<?php if (materialize_option('totop-background')): ?>
    .back-top{
        background-color: <?php echo esc_attr(materialize_option('totop-background'))?> !important;
    }
<?php endif; ?>


.copyright,
.copyright a,
.footer-sidebar,
.footer-sidebar a,
.footer-intro-text,
.footer-sidebar input,
.footer-sidebar strong,
.footer-menu ul li a,
.tt-flickr-photo li a::after,
.footer-sidebar .widget-title,
.footer-sidebar .input-field label,
.footer-sidebar .subscribe-form label,
.footer-sidebar .widget_nav_menu ul li a,
.footer-section .social-links-wrap li a i,
.footer-sidebar .subscribe-form label.active,
.footer-sidebar .tt-latest-post .media-body h4 a,
.tt-sidebar-wrapper.footer-sidebar .widget-title a,
.footer-sidebar .widget_calendar .calendar_wrap table caption,
.tt-sidebar-wrapper.footer-sidebar .widget_categories ul li a, 
.tt-sidebar-wrapper.footer-sidebar .widget_archive ul li a, 
.tt-sidebar-wrapper.footer-sidebar .widget_meta ul li a, 
.tt-sidebar-wrapper.footer-sidebar .widget_pages ul li a, 
.tt-sidebar-wrapper.footer-sidebar .widget_nav_menu ul li a, 
.tt-sidebar-wrapper.footer-sidebar .widget_recent_comments ul li a, 
.tt-sidebar-wrapper.footer-sidebar .widget_recent_entries ul li a,
.tt-sidebar-wrapper.footer-sidebar .widget_product_categories ul li a,
.tt-sidebar-wrapper.footer-sidebar .widget_layered_nav ul li a{
    color: <?php echo esc_attr(materialize_option('footer_text_color', false, '#ffffff'))?>;
}

.copyright a:hover,
.footer-sidebar a:hover,
.footer-menu ul li a:hover,
.footer-sidebar .widget_nav_menu ul li a:hover,
.footer-sidebar .tt-latest-post .media-body h4 a:hover,
.tt-sidebar-wrapper.footer-sidebar .widget-title a:hover,
.tt-sidebar-wrapper.footer-sidebar .widget_categories ul li a:hover, 
.tt-sidebar-wrapper.footer-sidebar .widget_archive ul li a:hover, 
.tt-sidebar-wrapper.footer-sidebar .widget_meta ul li a:hover, 
.tt-sidebar-wrapper.footer-sidebar .widget_pages ul li a:hover, 
.tt-sidebar-wrapper.footer-sidebar .widget_nav_menu ul li a:hover, 
.tt-sidebar-wrapper.footer-sidebar .widget_recent_comments ul li a:hover, 
.tt-sidebar-wrapper.footer-sidebar .widget_recent_entries ul li a:hover,
.tt-sidebar-wrapper.footer-sidebar .widget_product_categories ul li a:hover,
.tt-sidebar-wrapper.footer-sidebar .widget_layered_nav ul li a:hover{
    color: <?php echo esc_attr(materialize_option('footer_text_hover_color', false, '#81ddff'))?>;
}

<?php if (materialize_option('tab-background')): ?>
    .vc_general.vc_tta.vc_tta-tabs.vc_tta-style-vertical-tab .vc_tta-tab.vc_active a{
        background-color: <?php echo esc_attr(materialize_option('tab-background'))?>;
    }
<?php endif; ?>


<?php
/**
*
* Menu styles
*/
?>
.header-transparent .navbar-default,
.navbar-default {
    <?php echo esc_attr($menu_bg_color) ?>;
}

.header-transparent .header-wrapper.sticky .navbar-default,
.header-wrapper.sticky .navbar-default {
    <?php echo esc_attr($sticky_menu_bg_color) ?>;
}

.header-transparent .navbar-default .navbar-nav>li>a,
.navbar-default .navbar-nav>li>a{
    <?php echo esc_attr($default_font_color) ?>;
}

.header-wrapper.sticky .navbar-default .navbar-nav>li>a{
    <?php echo esc_attr($sticky_font_color) ?>;
}


<?php
/**
*
* custom css code
*/
?>

<?php echo esc_attr(materialize_option('custom_style'));?>