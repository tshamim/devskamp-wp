<?php
/*
Template Name: Blog Grid Home
*/

if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

get_header(); 

if (class_exists('RevSlider') && materialize_option('rev-slider')) : ?>
	<div class="slider-wrapper">
		<?php 
			$rev_slider = materialize_option('rev-slider', false, false);
			RevSliderOutput::putSlider( $rev_slider );
		?>
	</div>
<?php endif; ?>

<div class="blog-wrapper blog-grid content-wrapper">
	<div class="container">
		<div class="row">
			<div id="main" class="posts-content masonry-wrap clearfix" role="main">
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
						<div class="col-md-4 col-sm-6 col-xs-12 masonry-column">
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
		</div> <!-- .row -->
	</div> <!-- .container -->
</div> <!-- .blog-wrapper -->
<?php get_footer();