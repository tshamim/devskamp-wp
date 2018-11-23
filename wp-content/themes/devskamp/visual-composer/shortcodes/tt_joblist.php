<?php
	if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

	$tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

	ob_start();
?>

	<div class="joblist-wrapper <?php echo esc_attr($tt_atts['el_class'].' '.$css_class);?>">
		<ul class="job-menu">
        <?php
		$args = array(
			'post_type'      => 'tt-joblist',
			'posts_per_page' => $tt_atts['post_limit'],
			'post_status'    => 'publish',
		);

		$query = new WP_Query( $args ); ?>

		<?php if ( $query->have_posts() ) : ?>
			<!-- the loop -->
			<?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <li>
                    <a href="<?php the_permalink();?>" class="waves-effect waves-light">
                    <div class="job-content">
                        <?php 
                            $joblist_terms = wp_get_post_terms(get_the_ID(), 'tt-joblist-cat');

                            if (! empty( $joblist_terms ) && ! is_wp_error( $joblist_terms )) :
                                    
                                $count = count($joblist_terms);
                                $increament = 0;

                                if (! empty($joblist_terms) and $tt_atts['category_visibility'] == 'visible') :
                                    foreach ($joblist_terms as $term) :
                                        $increament++; ?>
                                            <span class="category">
    	                                          <?php echo esc_html($term->name); ?>
    	                                     </span>
                                        <?php if ($increament < $count) {
                                            echo ' , ';
                                    }
                                    endforeach; 
                                endif; 
                            endif; ?>

                            <h2 class="designation">
                                <?php if ($tt_atts['title_visibility'] == 'visible') : ?> 
                                    <?php the_title(); ?>
                                <?php endif; ?>
                            </h2>
                        </div>
                    </a>
                </li>
			<?php endwhile; ?>
			<!-- end of the loop -->
            
			<?php wp_reset_postdata(); ?>

		<?php else : ?>
			<p><?php esc_html_e( 'Sorry, portfolio not found !', 'materialize' ); ?></p>
		<?php endif; ?>
        </ul>
	</div> <!-- .portfolio-container -->

<?php echo ob_get_clean();