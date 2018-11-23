<?php
/*
Template Name: Blog Grid Right Sidebar
*/

if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

get_header(); ?>

<div class="blog-wrapper blog-grid blog-grid-sidebar content-wrapper">
	<?php if (materialize_option('blog-carousel-visibility') == true) : ?>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php get_template_part('template-parts/post', 'carousel');?>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-8">
				<div id="main" class="row posts-content masonry-wrap clearfix" role="main">

					<?php
					// grid post $args
					$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
					$args  = array(
						'posts_per_page' => get_option( 'posts_per_page' ),
						'post_type'      => 'post',
						'post_status'    => 'publish',
						'paged'          => $paged
					);
					$query = new WP_Query( $args );
					?>
					<?php if ( $query->have_posts() ) : ?>

						<?php while ( $query->have_posts() ) : $query->the_post(); ?>
							<div class="col-sm-6 col-xs-12 masonry-column">
								<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
							</div>
						<?php endwhile; ?>

						<div class="col-md-12 text-center">
							<?php echo materialize_list_posts_pagination(); ?>
						</div>

						<?php
					else :
						get_template_part( 'template-parts/content', 'none' );
					endif;
						wp_reset_postdata();
					?>
				</div><!-- .posts-content -->
			</div> <!-- .col -->

			<!-- Right sidebar -->
			<div class="col-md-4 col-sm-4">
	            <div class="tt-sidebar-wrapper right-sidebar" role="complementary">
	                <?php dynamic_sidebar('materialize-blog-sidebar'); ?>
	            </div>
	        </div>

		</div> <!-- .row -->
	</div> <!-- .container -->
</div> <!-- .blog-wrapper -->
<?php get_footer();