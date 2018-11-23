<?php
/*
Template Name: Blog Card Style
*/

if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

get_header(); ?>

<div class="latest-news-card blog-card-style">
	<div class="container">
		<div class="row">
			<div id="main" class="masonry-wrap clearfix" role="main">
				<?php
				// grid post $args
				$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
				$args  = array(
					'posts_per_page' => get_option( 'posts_per_page' ),
					'post_type'      => 'post',
					'post_status'    => 'publish',
					'paged'          => $paged
				);
				$query = new WP_Query( $args ); ?>

				<?php if ( $query->have_posts() ) : ?>

					<?php while ( $query->have_posts() ) : $query->the_post(); ?>
						<div class="col-md-4 col-sm-6 col-xs-12 masonry-column">
							<article class="card">
                                
                                    <div class="card-image waves-effect waves-block waves-light">
                                    	<?php if (has_post_thumbnail()) :
                                        	the_post_thumbnail('materialize-latest-post-thumb', array('class' => 'img-responsive activator', 'alt' => get_the_title()));
                                        else : ?>
                                        	<img class="img-responsive activator" src="<?php echo get_template_directory_uri() . '/images/post-default-thumb.jpg'?>" alt="<?php echo get_the_title(); ?>">
                                        <?php endif; ?>
                                    </div>
                                

                                <div class="card-content">
                                    <h2 class="entry-title activator"><?php the_title(); ?></h2>
                                </div>

                                <div class="card-reveal overlay-blue">
                                    <span class="card-title close-button"><i class="fa fa-times"></i></span>
                                    <span class="posted-on"><?php echo get_the_category_list(esc_html_x(', ', 'Used between list items, there is a space after the comma.', 'materialize')); ?></span>
                                    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <p><?php echo wp_trim_words( get_the_content(), 25); ?></p>
                                    
                                    <a href="<?php the_permalink(); ?>" class="readmore"><?php esc_html_e('Read Full Post', 'materialize'); ?> <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </article>
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
			</div><!-- #main -->
		</div> <!-- .row -->
	</div> <!-- .container -->
</div> <!-- .blog-wrapper -->
<?php get_footer();