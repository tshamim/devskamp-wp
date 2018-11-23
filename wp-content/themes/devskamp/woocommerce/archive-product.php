<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header(); 


$shop_sidebar = materialize_option('shop-sidebar', false, 'right-sidebar');
	$grid_column = 'col-md-12';
	
	if ($shop_sidebar == 'right-sidebar') :
		$grid_column = (is_active_sidebar('materialize-shop-sidebar')) ? 'col-md-8' : $grid_column;
	elseif ($shop_sidebar == 'left-sidebar') :
		$grid_column = (is_active_sidebar('materialize-shop-sidebar')) ? 'col-md-8 col-md-push-4' : $grid_column;
	endif;
?>

	<div class="materialize-shop">
		<div class="container">


		    <header class="woocommerce-products-header">


				<?php
					/**
					 * woocommerce_archive_description hook.
					 *
					 * @hooked woocommerce_taxonomy_archive_description - 10
					 * @hooked woocommerce_product_archive_description - 10
					 */
					do_action( 'woocommerce_archive_description' );
				?>

		    </header>


			<div class="row">
				<div class="<?php echo esc_attr($grid_column); ?>">
					
					<?php if ( have_posts() ) : ?>
						<?php
							/**
							 * woocommerce_before_shop_loop hook.
							 *
							 * @hooked wc_print_notices - 10
							 * @hooked woocommerce_result_count - 20
							 * @hooked woocommerce_catalog_ordering - 30
							 */
							do_action( 'woocommerce_before_shop_loop' );
						?>

						<?php woocommerce_product_loop_start(); ?>

							<?php woocommerce_product_subcategories(); ?>

							<?php while ( have_posts() ) : the_post(); ?>
								<?php
									/**
									 * woocommerce_shop_loop hook.
									 *
									 * @hooked WC_Structured_Data::generate_product_data() - 10
									 */
									do_action( 'woocommerce_shop_loop' );
								?>
					
								<?php wc_get_template_part( 'content', 'product' ); ?>
							<?php endwhile; // end of the loop. ?>

						<?php woocommerce_product_loop_end(); ?>

						<?php
							/**
							 * woocommerce_after_shop_loop hook.
							 *
							 * @hooked woocommerce_pagination - 10
							 */
							do_action( 'woocommerce_after_shop_loop' );
						?>

					<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
						<?php wc_get_template( 'loop/no-products-found.php' ); ?>
					<?php endif; ?>
				</div> <!-- .col-## -->

				<!-- Sidebar -->
				<?php get_sidebar('shop'); ?>

			</div> <!-- .row -->
		</div> <!-- .container -->
	</div> <!-- .materialize-shop -->
<?php get_footer(); ?>