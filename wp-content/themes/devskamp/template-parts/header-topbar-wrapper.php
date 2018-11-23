<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;


$header_topbar_option = materialize_option('header-top-visibility');

$header_page_topbar = "";

if (function_exists('rwmb_meta')) : 
    $header_page_topbar = rwmb_meta('materialize_header_topbar');
endif;

if ($header_topbar_option == "1" and $header_page_topbar == 'inherit-theme-option' || empty($header_page_topbar)) :
    get_template_part('template-parts/header', 'topbar');
elseif($header_page_topbar == 'header-topbar-show') :
    get_template_part('template-parts/header', 'topbar');
elseif($header_page_topbar == 'header-topbar-hide' and $header_topbar_option == "0") :
endif;
?>