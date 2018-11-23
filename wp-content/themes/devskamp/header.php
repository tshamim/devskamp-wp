<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php esc_url( bloginfo( 'pingback_url' ) ); ?>">
    <?php wp_head(); ?>
</head>

<body id="home" <?php body_class(); ?> data-spy="scroll" data-target=".navbar" data-offset="100" itemscope="itemscope" itemtype="http://schema.org/WebPage">
    
    <?php if (materialize_option('page-preloader', false, true)) : ?>
        <div id="preloader" style="background-color: <?php echo esc_attr(materialize_option('loader-bg-color', false, '#ffffff'));?>">
            <div id="status">
                <div class="status-mes" style="background-image: url(<?php echo esc_url(materialize_option('tt-loader', 'url', get_template_directory_uri() . '/images/preloader.gif'));?>);"></div>
            </div>
        </div>
    <?php endif; ?>
    
    <?php $tt_header_style = materialize_option('header-style', false, 'header-default');
        
        $page_header = "";

        if (function_exists('rwmb_meta')) : 
            $page_header = rwmb_meta('materialize_header_style');
        endif;

        if ($page_header == 'inherit-theme-option' || empty($page_header)) :
            if ($tt_header_style == 'header-dark') :
                get_header('dark');
            elseif ($tt_header_style == 'header-brand-color') :
                get_header('brand-color');
            elseif ($tt_header_style == 'header-transparent') :
                get_header('transparent');
            elseif ($tt_header_style == 'header-semi-transparent') :
                get_header('semitransparent');
            elseif ($tt_header_style == 'header-center-menu') :
                get_header('menucenter');
            elseif ($tt_header_style == 'header-bottom-menu') :
                get_header('menubottom');
            elseif ($tt_header_style == 'header-floating-menu') :
                get_header('menufloating');
            elseif ($tt_header_style == 'header-shop') :
                get_header('shop');
            elseif ($tt_header_style == 'no-header') :
            else :
                get_header('default');
            endif;
        else :
            if ($page_header == 'header-dark') :
                get_header('dark');
            elseif ($page_header == 'header-brand-color') :
                get_header('brand-color');
            elseif ($page_header == 'header-transparent') :
                get_header('transparent');
            elseif ($page_header == 'header-semi-transparent') :
                get_header('semitransparent');
            elseif ($page_header == 'header-center-menu') :
                get_header('menucenter');
            elseif ($page_header == 'header-bottom-menu') :
                get_header('menubottom');
            elseif ($page_header == 'header-floating-menu') :
                get_header('menufloating');
            elseif ($page_header == 'header-shop') :
                get_header('shop');
            elseif ($page_header == 'no-header') :
            else :
                get_header('default');
            endif;
        endif;
    ?>

<?php get_template_part( 'page', 'header' );