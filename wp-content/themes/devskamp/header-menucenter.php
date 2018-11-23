<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;
?>

<div class="header-wrapper navbar-fixed-top">
    
    <?php get_template_part('template-parts/header-topbar', 'wrapper');?>

    <nav class="navbar navbar-default">
	    <div class="container">
	        
	        <!-- Brand and toggle get grouped for better mobile display -->
	        <div class="navbar-header">
	            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".mobile-toggle">
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	            </button>

	            <div class="navbar-brand">
	                <h1>
	                    <?php get_template_part('template-parts/site', 'logo');?>
	                </h1>
	            </div> <!-- .navbar-brand -->
	        </div> <!-- .navbar-header -->

	        <?php if (materialize_option('search-visibility', false, true)):
	            get_template_part('template-parts/header', 'search');
	        endif; ?>

	        <div class="main-menu-wrapper hidden-xs clearfix">
	            <div class="main-menu">                   
	                <?php wp_nav_menu( apply_filters( 'materialize_primary_wp_nav_menu', array(
	                    'container'      => false,
	                    'theme_location' => 'primary',
	                    'items_wrap'     => '<ul id="%1$s" class="%2$s nav navbar-nav">%3$s</ul>',
	                    'walker'         => new Materialize_Navwalker(),
	                    'fallback_cb'    => 'Materialize_Navwalker::fallback'
	                ))); ?>
	            </div>
	        </div> <!-- /navbar-collapse -->

	        <!-- Collect the nav links, forms, and other content for toggling -->
	        <div class="visible-xs">
	            <div class="mobile-menu collapse navbar-collapse mobile-toggle">
	                <?php wp_nav_menu( apply_filters( 'materialize_primary_wp_nav_menu', array(
	                      'container'      => false,
	                      'theme_location' => 'primary',
	                      'items_wrap'     => '<ul id="%1$s" class="%2$s nav navbar-nav">%3$s</ul>',
	                      'walker'         => new Materialize_Mobile_Navwalker(),
	                      'fallback_cb'    => 'Materialize_Mobile_Navwalker::fallback'
	                ))); ?>
	            </div> <!-- /.navbar-collapse -->
	        </div>
	    </div><!-- .container-->
	</nav>

</div> <!-- .header-wrapper -->