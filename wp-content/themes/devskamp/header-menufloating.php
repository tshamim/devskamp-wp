<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;
?>


<div class="header-wrapper navbar-fixed-top">
	<div class="container">
		<div class="header-floating-wrapper">
	    
		    <?php get_template_part('template-parts/header-topbar', 'wrapper');?>

		    <?php get_template_part('template-parts/site', 'navigation');?>

	    </div>
    </div> <!-- .container -->
</div> <!-- .header-wrapper -->