<?php
	if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

	$tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

	ob_start(); 

	$masonry_class = "";

	if ($tt_atts['post_style'] == 'normal-post') :
		$masonry_class = "masonry-wrap";
	endif;

	?>

<div class="seo-service-wrapper <?php echo esc_attr($tt_atts['el_class'].' '.$css_class); ?>">
    <div class="row <?php echo esc_attr($masonry_class); ?>">
		<?php
		$args = array(
			'post_type'      => 'tt-service',
			'posts_per_page' => $tt_atts['post_limit'],
			'post_status'    => 'publish',
		);

		$query = new WP_Query( $args ); ?>

		<?php if ( $query->have_posts() ) : ?>
			<?php if ($tt_atts['post_style'] == 'carousel-post'): ?>
				<div class="seo-featured-carousel">
			<?php endif; ?>
			<!-- the loop -->
			<?php while ( $query->have_posts() ) : $query->the_post();  ?>
				
				<?php if ($tt_atts['post_style'] == 'normal-post'): ?>
					<div class="col-md-<?php echo esc_attr($tt_atts['grid_column']); ?> col-sm-6 masonry-column">
				<?php endif; ?>
                
                  	<div class="featured-item seo-service">

                      	<div class="icon">
                          <?php echo get_the_post_thumbnail( get_the_ID(), 'materialize-latest-post-thumb', array( 'class' => 'img-responsive', 'alt' => materialize_alt_text()));  ?>
                      	</div>

                      	<div class="desc">
                          	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                          	
                          	<?php if (has_excerpt()): ?>
                          		<div class="entry-content">
                          			<?php the_excerpt(); ?>
                          		</div>
                          	<?php endif; ?>
                          	
							<?php if ($tt_atts['show_readmore'] == 'yes'): ?>
								<div class="bg-overlay"></div>

								<p><a class="learn-more" href="<?php the_permalink(); ?>"><?php echo esc_html($tt_atts['readmore_text']); ?> <i class="fa fa-long-arrow-right"></i></a></p>
							<?php endif; ?>
                      	</div>
                  	</div><!-- /.featured-item -->
                <?php if ($tt_atts['post_style'] == 'normal-post'): ?>
					</div><!-- /.col-# -->
				<?php endif; ?>
				
			<?php endwhile; ?> <!-- end of the loop -->
			
			<?php if ($tt_atts['post_style'] == 'carousel-post'): ?>
				</div> <!-- .seo-featured-carousel -->
			<?php endif; ?>
			
			<?php wp_reset_postdata(); ?>

		<?php else : ?>
			<p><?php esc_html_e( 'Sorry, services not found !', 'materialize' ); ?></p>
		<?php endif; ?>

    </div><!-- /.row -->
</div> <!-- Featured Services End -->

<?php echo ob_get_clean();