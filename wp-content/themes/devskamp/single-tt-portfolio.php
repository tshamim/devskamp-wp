<?php 
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

get_header(); 

?>

<div class="single-portfolio-wrapper">
    <div class="container">
    	<?php while ( have_posts() ) : the_post(); 

    	$tt_attachment_id = get_post_thumbnail_id(get_the_ID());
		$tt_image_attr = wp_get_attachment_image_src($tt_attachment_id, 'full' );

    	if (function_exists('rwmb_meta')) :
			$slides = rwmb_meta('materialize_portfolio_gallery','type=image_advanced');
			$portfolio_layout = rwmb_meta('materialize_portfolio_single_layout');

			$more_images = rwmb_meta('materialize_extra_images','type=image_advanced');
		endif; ?>

    		<?php if (materialize_option('portfolio-navigation', false, true)) : ?>
    			<div class="portfolio-nav">
	        	
		            <?php previous_post_link('<span class="prev">%link</span>', '<i class="fa fa-angle-left"></i>' . esc_html__( 'Prev', 'materialize' )); ?>
		            
		            <?php $portfolio_page_link = materialize_option('all-portfolio-link'); ?>
		            <a href="<?php echo esc_url(get_page_link($portfolio_page_link)); ?>"><i class="fa fa-th-large"></i></a>

		            <?php next_post_link('<span class="next">%link</span>', esc_html__( 'Next', 'materialize' ) . '<i class="fa fa-angle-right"></i>'); ?>
		        </div>
    		<?php endif; ?>
	        
			<?php
			$indicators = 0;
			$slide_count = 1;
			?>

			<?php if (empty($portfolio_layout) || $portfolio_layout == 'portfolio-layout-default') :
				if (function_exists('rwmb_meta') && $slides) : ?>
					<div class="portfolio-slider carousel slide trendy-slider control-two" data-ride="carousel">
			          	<!-- Indicators -->
			          	<ol class="carousel-indicators">
				          	<?php foreach ($slides as $indicator): ?>
								<li data-target=".portfolio-slider" data-slide-to="<?php echo esc_attr($indicators);?>" class="<?php if($indicators == 0) echo 'active'; ?>"></li>
							<?php 
							$indicators++;
							endforeach; ?>
			          	</ol>

			          	<!-- Wrapper for slides -->
			          	<div class="carousel-inner" role="listbox">
			          		<?php foreach ($slides as $slide): ?>
					            <div class="item <?php if($slide_count == 1) echo 'active'; ?>">
			                        <?php $images_src = wp_get_attachment_image_src( $slide['ID'], 'materialize-single-portfolio-thumbnail'); ?>
			                        <a href="<?php echo esc_url($images_src[0]); ?>" class="image-link"><img class="img-responsive" src="<?php echo esc_url($images_src[0]); ?>" alt="<?php materialize_alt_text(); ?>"></a>
			                    </div>
			          		<?php 
			          		$slide_count++;	
			          		endforeach; ?>
			          	</div>

			          	<!-- Controls -->
			          	<a class="left carousel-control" href=".portfolio-slider" role="button" data-slide="prev">
				            <span class="fa fa-angle-left" aria-hidden="true"></span>
			          	</a>
			          	<a class="right carousel-control" href=".portfolio-slider" role="button" data-slide="next">
				            <span class="fa fa-angle-right" aria-hidden="true"></span>
			          	</a>
			        </div>
			    <?php else : ?>
			    	<div class="portfolio-thumbnail">
						<a href="<?php echo esc_url($tt_image_attr[0]); ?>" class="image-link"><?php echo get_the_post_thumbnail( get_the_ID(), 'materialize-single-portfolio-thumbnail', array( 'class' => 'img-responsive', 'alt' => materialize_alt_text())); ?></a>
			    	</div>
		    	<?php endif; 
			endif; ?>


		    <?php
		    	$content_grid_class = "col-md-8";
		    	$sidebar_grid_class = "col-md-4";

		    	if ($portfolio_layout == 'portfolio-layout-sidebar') :
		    		$content_grid_class = "col-md-9";
		    		$sidebar_grid_class = "col-md-3";
		    	endif;
		    ?>

	        <div class="project-overview">
	            <div class="row">
	                <div class="<?php echo esc_attr($content_grid_class); ?>">
						
						<?php if (function_exists('rwmb_meta') && $slides && $portfolio_layout == 'portfolio-layout-sidebar') : ?>
							<div class="portfolio-slider carousel slide trendy-slider control-two" data-ride="carousel">
					          	<!-- Indicators -->
					          	<ol class="carousel-indicators">
						          	<?php foreach ($slides as $indicator): ?>
										<li data-target=".portfolio-slider" data-slide-to="<?php echo esc_attr($indicators);?>" class="<?php if($indicators == 0) echo 'active'; ?>"></li>
									<?php 
									$indicators++;
									endforeach; ?>
					          	</ol>

					          	<!-- Wrapper for slides -->
					          	<div class="carousel-inner" role="listbox">
					          		<?php foreach ($slides as $slide): ?>
							            <div class="item <?php if($slide_count == 1) echo 'active'; ?>">
					                        <?php $images_src = wp_get_attachment_image_src( $slide['ID'], 'materialize-single-portfolio-thumbnail'); ?>
					                        <a href="<?php echo esc_url($images_src[0]); ?>" class="image-link"><img class="img-responsive" src="<?php echo esc_url($images_src[0]); ?>" alt="<?php get_the_title();?>"></a>
					                    </div>
					          		<?php 
					          		$slide_count++;	
					          		endforeach; ?>
					          	</div>

					          	<!-- Controls -->
					          	<a class="left carousel-control" href=".portfolio-slider" role="button" data-slide="prev">
						            <span class="fa fa-angle-left" aria-hidden="true"></span>
					          	</a>
					          	<a class="right carousel-control" href=".portfolio-slider" role="button" data-slide="next">
						            <span class="fa fa-angle-right" aria-hidden="true"></span>
					          	</a>
					        </div>
					    <?php elseif(empty($slides) && $portfolio_layout == 'portfolio-layout-sidebar') : ?>
							<a href="<?php echo esc_url($tt_image_attr[0]); ?>" class="image-link"><?php echo get_the_post_thumbnail( get_the_ID(), 'materialize-single-portfolio-thumbnail', array( 'class' => 'img-responsive', 'alt' => materialize_alt_text())); ?></a>
					    <?php endif; ?>

	                    <?php if (empty($portfolio_layout) || $portfolio_layout == 'portfolio-layout-default') : ?>
	                    	
	                    	<div class="portfolio-title">
	                            <p><?php materialize_portfolio_cat(); ?></p>
	                      	</div>

	                    	<?php the_content();
	                    endif; ?>

	                    <?php if (function_exists('rwmb_meta') && $more_images) : ?>
							<div class="portfolio-more-images">
								<?php foreach ($more_images as $image): ?>
						            <div class="single-image">
				                        <?php $images_src = wp_get_attachment_image_src( $image['ID'], 'full'); ?>
				                        <a href="<?php echo esc_url($images_src[0]); ?>" class="image-link"><img class="img-responsive" src="<?php echo esc_url($images_src[0]); ?>" alt="<?php get_the_title();?>"></a>
				                    </div>
				          		<?php endforeach ?>
							</div>
						<?php endif; ?>
	                </div> <!-- .col-# -->

	                <div class="<?php echo esc_attr($sidebar_grid_class); ?> quick-overview">
	                	
	                	<?php if (function_exists('rwmb_meta') and $portfolio_layout == 'portfolio-layout-sidebar') : ?>
	                		<div class="portfolio-title">
	                            <p><?php materialize_portfolio_cat(); ?></p>
	                      	</div>

	                    	<?php the_content();
	                    endif; ?>

						<?php if (function_exists('rwmb_meta')) : ?>
		                    <ul class="portfolio-meta">
		                    	<?php 
		                    		$portfolio_overview = rwmb_meta('materialize_portfolio_overview');
			                    	if ($portfolio_overview) :
			                    		foreach ($portfolio_overview as $value): ?>
				                    		<li><span> <?php echo esc_html($value[0]); ?> </span> <?php echo esc_html($value[1]); ?></li>
				                    	<?php endforeach; 
			                    	endif;
		                    	?>

								<?php
								if (rwmb_meta('materialize_portfolio_share') == 'show_share'): ?>
			                        <li><span> <?php esc_html_e('Share', 'materialize'); ?> </span>
				                        <a class="facebook" href="//www.facebook.com/sharer.php?u=<?php echo rawurlencode( get_the_permalink() ) ?>&amp;t=<?php echo rawurlencode( get_the_title() ) ?>" title="<?php esc_html_e( 'Share on Facebook!', 'materialize' ); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
				                        
				                        <a class="twitter" href="//twitter.com/home?status=<?php echo rawurlencode( sprintf( esc_html__( 'Reading: %s', 'materialize' ), get_the_permalink() ) ) ?>" title="<?php esc_html_e( 'Share on Twitter!', 'materialize' ); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
				                        
				                        <a class="google-plus" href="//plus.google.com/share?url=<?php echo rawurlencode( get_the_permalink() ) ?>" title="<?php esc_html_e( 'Share on Google+!', 'materialize' ); ?>" target="_blank"><i class="fa fa-google-plus"></i></a>

				                        <a class="linkedin" href="//www.linkedin.com/shareArticle?url=<?php echo rawurlencode( get_the_permalink() ) ?>&amp;mini=true&amp;title=<?php echo rawurlencode( get_the_title() ) ?>" title="<?php esc_html_e( 'Share on Linkedin!', 'materialize' ); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
			                        </li>
		                        <?php endif ?>
		                    </ul>

							<?php if (rwmb_meta('materialize_portfolio_link_text')) : ?>
								<a href="<?php echo esc_url(rwmb_meta('materialize_portfolio_link')); ?>" class="btn btn-primary"> <?php echo esc_html(rwmb_meta('materialize_portfolio_link_text')); ?></a>
							<?php endif; ?>

		                <?php endif; ?>
	                </div> <!-- /quick-overview -->
	            </div><!-- .row -->
	        </div><!-- .project-overview -->
        <?php endwhile; // End of the loop. ?>
    </div><!-- .container -->
</div> <!-- .single-project-section -->

<?php get_footer(); ?>