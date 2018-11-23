<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;
?>

<div class="header-wrapper navbar-fixed-top">
    <?php get_template_part('template-parts/header-topbar', 'wrapper');?>

    <nav class="navbar navbar-default">
    
	    <div class="woo-action-button visible-lg">
	        <?php if( function_exists( 'YITH_WCWL' ) ): ?>
	            <div class="tt-wishlist-count pull-left">
	                <a href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url()); ?>" title="<?php esc_attr_e('View your wishlist', 'materialize');?>"><i class="material-icons">&#xE87E;</i><span><?php echo intval(YITH_WCWL()->count_products()); ?></span></a>
	            </div>
	        <?php endif; ?>

	        <?php if (class_exists('woocommerce')): ?>
	            <div class="tt-cart-count pull-left">
	                <a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_html_e( 'View your shopping cart', 'materialize' ); ?>"><i class="material-icons">&#xE8CB;</i><span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span></a>
	            </div>
	        <?php endif; ?>
	    </div>

	    <div class="container">
	    
	        <?php if (materialize_option('search-visibility', false, true)):
	            get_template_part('template-parts/header', 'search');
	        endif; ?>
	        
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

	        <div class="main-menu-wrapper hidden-xs clearfix">
	            <div class="main-menu">
	                <?php wp_nav_menu( apply_filters( 'materialize_primary_wp_nav_menu', array(
	                        'container'      => false,
	                        'theme_location' => 'primary',
	                        'items_wrap'     => '<ul id="%1$s" class="%2$s nav navbar-nav navbar-right">%3$s</ul>',
	                        'walker'         => new Materialize_Navwalker(),
	                        'fallback_cb'    => 'Materialize_Navwalker::fallback'
	                    )));
	                ?>
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
	                    ))); 
	                ?>
	            </div> <!-- /.navbar-collapse -->
	        </div>
	    </div><!-- .container-->
	</nav>
</div> <!-- .header-wrapper -->