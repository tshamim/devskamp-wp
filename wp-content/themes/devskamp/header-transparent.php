<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;
?>

<div class="header-wrapper navbar-fixed-top">
    
    <?php get_template_part('template-parts/header-topbar', 'wrapper');?>

    <?php get_template_part('template-parts/site', 'navigation');?>

</div> <!-- .header-wrapper -->