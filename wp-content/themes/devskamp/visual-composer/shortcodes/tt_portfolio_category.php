<?php
	if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

	$tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

	ob_start();

    $slides = "";

	$thumb_size = 'materialize-portfolio-thumb';
	$slide_direction = 'horizontal';

    wp_enqueue_style( 'isotope-css' );
    wp_enqueue_script( 'isotope' );

    $portfolio_tax = $tt_atts['taxonomies'];
    $portfolio_cat_array = explode(',', str_replace(' ', '', $portfolio_tax));

    $style_class = "";

	if ($tt_atts['portfolio_style'] == 'title-style' || $tt_atts['portfolio_style'] == 'foodmenu-style') {
		$style_class = "portfolio-with-title";
	}
	if ($tt_atts['portfolio_style'] == 'masonry-style') {
		$thumb_size = "materialize-portfolio-masonry";
	}
?>
		
	<div class="portfolio-container <?php echo esc_attr($tt_atts['el_class'].' '.$css_class);?>">
		<?php if ($tt_atts['filter_visibility'] == 'visible') : ?>
			
			<ul class="portfolio-filter list-inline <?php echo esc_attr($tt_atts['filter_style'].' '.$tt_atts['filter_alignment'].' '.$tt_atts['filter_color']); ?>">

				<li class="waves-effect waves-light active" data-filter="*"><?php echo esc_html($tt_atts['default_text']);?></li>
				
				<?php foreach ( $portfolio_cat_array as $term_id ) : ?>
					<li class="waves-effect waves-light" data-filter=".<?php echo esc_attr($term_id); ?>">
						<?php echo esc_html($term_id); ?>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>

		<div class="tt-grid portfolio row <?php echo esc_attr($style_class.' '.$tt_atts['grid_padding']); ?>">
			<?php
			$args = array(
				'post_type'      => 'tt-portfolio',
				'posts_per_page' => $tt_atts['post_limit'],
                'tax_query' => array(
                    array(
                        'taxonomy' => 'tt-portfolio-cat',
                        'field'    => 'slug',
                        'terms'    => $portfolio_cat_array,
                    ),
                ),
				'post_status'    => 'publish',
			);

			$query = new WP_Query( $args ); ?>

			<?php if ( $query->have_posts() ) : ?>

				<!-- the loop -->
				<?php while ( $query->have_posts() ) : $query->the_post(); 

				$terms = wp_get_post_terms( get_the_ID(), 'tt-portfolio-cat' );
                
				$term = array();

                if (! empty( $terms ) && ! is_wp_error( $terms )) :
    				foreach ( $terms as $t ) :
    					$term[ ] = $t->slug;
    				endforeach;
                endif;

            	$tt_attachment_id = get_post_thumbnail_id(get_the_ID());
				$tt_image_attr = wp_get_attachment_image_src($tt_attachment_id, 'full' );

				if (function_exists('rwmb_meta')) :
					$slides = rwmb_meta('materialize_portfolio_gallery','type=image_advanced');
					$slide_direction = rwmb_meta('materialize_gallery_slide_direction');
				endif;

                $popup_class = "tt-lightbox";

                if ($slides) {
                    $popup_class = "slider-popup";
                }
        	
				?>
				<div class="tt-item portfolio-item col-md-<?php echo esc_attr($tt_atts['grid_column']);?> col-sm-6 col-xs-12 <?php echo esc_attr(implode( ' ', $term )); ?>">

                    <?php if ($tt_atts['portfolio_style'] == 'boxed-style' || $tt_atts['portfolio_style'] == 'title-style' || $tt_atts['portfolio_style'] == 'masonry-style' || $tt_atts['portfolio_style'] == 'foodmenu-style'): ?>
                        <div class="portfolio-wrapper">
                            <div class="thumb">
                                <div class="bg-overlay brand-overlay"></div>
                                
                                <?php if (function_exists('rwmb_meta') && $slides): ?>
                                    <div class="portfolio-slider" data-direction="<?php echo esc_attr($slide_direction);?>">
                                        <ul class="slides">
                                            <?php foreach ($slides as $slide): ?>
                                                <li>
                                                    <?php $images_src = wp_get_attachment_image_src( $slide['ID'], $thumb_size); ?>
                                                    <a href="<?php echo esc_url($images_src[0]); ?>">
                                                      <img class="img-responsive" src="<?php echo esc_url($images_src[0]); ?>" alt="<?php echo get_the_title(); ?>"></a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                <?php else : 
                                    echo get_the_post_thumbnail( get_the_ID(), $thumb_size, array( 'class' => 'img-responsive', 'alt' => materialize_alt_text()));
                                endif; ?>

                                <div class="portfolio-intro overlay-icon-<?php echo esc_attr($tt_atts['popup_button_visibility']); ?>">
                                    <?php if (function_exists('rwmb_meta') && $tt_atts['popup_button_visibility'] == 'visible'): ?>
                                        <div class="action-btn">
                                            <?php $icon_action = rwmb_meta('materialize_image_popup_option'); ?>
                                            <?php if ($icon_action == 'link_with_post'): ?>
                                                <a href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>
                                            <?php elseif($icon_action == 'video_popup') : ?>
                                                <a class="popup-video" href="<?php echo rwmb_meta('materialize_video_url'); ?>"><i class="fa fa-play"></i></a>
                                            <?php else : ?>
                                                <a href="<?php echo esc_url($tt_image_attr[0]); ?>" class="<?php echo esc_attr($popup_class); ?>"><i class="fa fa-search"></i></a>
                                            <?php endif ?>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <?php if ($tt_atts['portfolio_style'] == 'boxed-style' || $tt_atts['portfolio_style'] == 'masonry-style') : ?>
                                        <?php if ($tt_atts['title_visibility'] == 'visible') : ?>
                                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                        <?php endif; ?>

                                        <?php if ($tt_atts['category_visibility'] == 'visible') : ?>
                                           <p><?php materialize_portfolio_cat(); ?></p>
                                        <?php endif; ?>

                                    <?php endif; ?>
                                </div>
                            </div><!-- thumb -->

                            <?php if ($tt_atts['portfolio_style'] == 'title-style' || $tt_atts['portfolio_style'] == 'foodmenu-style') : ?>
                                <div class="portfolio-title <?php echo esc_attr($tt_atts['title_alignment']); ?>">
                                    <?php if ($tt_atts['title_visibility'] == 'visible') : ?>
                                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <?php endif; ?>
                                    
                                    <?php if ($tt_atts['portfolio_style'] == 'title-style' && $tt_atts['category_visibility'] == 'visible') : ?>
                                       <p><?php materialize_portfolio_cat(); ?></p>
                                    <?php endif; ?>

                                    <?php if (function_exists('rwmb_meta') && $tt_atts['portfolio_style'] == 'foodmenu-style' && rwmb_meta('materialize_portfolio_price')) : ?>
                                       <p><?php echo esc_html(rwmb_meta('materialize_portfolio_price')); ?></p>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div><!-- /.portfolio-wrapper -->
                    <?php elseif($tt_atts['portfolio_style'] == 'card-style') : ?>
                        <div class="portfolio-wrapper">
                            <div class="card">
                                <div class="card-image waves-effect waves-block waves-light">
                                    <?php if (function_exists('rwmb_meta') && $slides): ?>
                                        <div class="portfolio-slider" data-direction="<?php echo esc_attr($slide_direction);?>">
                                            <ul class="slides">
                                                <?php foreach ($slides as $slide): ?>
                                                    <li>
                                                        <?php $images_src = wp_get_attachment_image_src( $slide['ID'], $thumb_size); ?>
                                                        <img class="img-responsive activator" src="<?php echo esc_url($images_src[0]); ?>" alt="<?php echo get_the_title(); ?>">
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php else : 
                                        echo get_the_post_thumbnail( get_the_ID(), $thumb_size, array( 'class' => 'img-responsive activator', 'alt' => materialize_alt_text()));
                                    endif; ?>
                                </div>
                                <div class="card-content">
                                    <span class="card-title activator">
                                        <?php if ($tt_atts['title_visibility'] == 'visible') : ?>
                                            <?php the_title(); ?>
                                        <?php endif; ?><i class="fa fa-ellipsis-v right"></i>

                                        <?php if (function_exists('zilla_likes') && $tt_atts['like_visibility'] == 'visible') : ?>
                                            <span class="right"><?php zilla_likes(); ?></span>
                                        <?php endif; ?>
                                    </span>

                                    <?php if ($tt_atts['category_visibility'] == 'visible') : ?>
                                       <p><?php materialize_portfolio_cat(); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="card-reveal">
                                    <span class="card-title">
                                    <?php if ($tt_atts['title_visibility'] == 'visible'): ?>
                                        <?php the_title(); ?>
                                    <?php endif; ?><i class="material-icons right">&#xE5CD;</i></span>

                                    <?php if ($tt_atts['category_visibility'] == 'visible') : ?>
                                       <p><?php materialize_portfolio_cat(); ?></p>
                                    <?php endif; ?>

                                    <p><?php echo wp_trim_words( get_the_content(), $tt_atts['word_limit'], '' ); ?></p>
                                    <?php if ($tt_atts['link_button_visibility'] == 'visible'): ?>
                                        <a href="<?php the_permalink(); ?>" class="readmore"><?php echo esc_html($tt_atts['button_text']);?></a>
                                    <?php endif; ?>
                                </div>
                            </div><!-- /.card -->
                        </div>
                    <?php endif; ?>
                </div> <!-- .tt-item -->
			<?php endwhile; ?> <!-- end of the loop -->
				<?php wp_reset_postdata(); ?>
			<?php else : ?>
				<p><?php esc_html_e( 'Sorry, portfolio not found !', 'materialize' ); ?></p>
			<?php endif; ?>
		</div> <!-- .tt-grid -->
	</div> <!-- .portfolio-container -->
<?php echo ob_get_clean();