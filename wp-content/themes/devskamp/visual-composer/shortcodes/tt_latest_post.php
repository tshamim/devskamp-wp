<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    ob_start();

    $args = array(
       'post_type'      => 'post',
       'post_status'    => 'publish',
       'posts_per_page' => $tt_atts['post_limit'],
       'post__not_in'   => get_option( 'sticky_posts' ),
       'orderby'        => 'date'
    ); ?>

    <div class="latest-news-card <?php echo esc_attr($tt_atts['el_class'].' '.$css_class); ?>">
        <?php if ($tt_atts['post_style'] == 'carousel-post'): ?>
            <div class="blog-carousel">
        <?php else : ?>
            <div class="row">
        <?php endif; ?>
                <?php $query = new WP_Query( $args ); ?>

                <?php if ( $query->have_posts() ) : ?>

                    <!-- the loop -->
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                        <?php if ($tt_atts['post_style'] == 'normal-post'): ?>
                            <div class="col-md-<?php echo esc_attr($tt_atts['grid_column']); ?> col-sm-6">
                        <?php endif; ?>
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
                                    <p><?php $tt_trim_word = $tt_atts['word_limit'];
                                            $content = get_the_content();
                                            echo wp_trim_words( $content, $tt_trim_word); ?></p>
                                    
                                    <?php if ($tt_atts['show_readmore'] == 'yes'): ?>
                                        <a href="<?php the_permalink(); ?>" class="readmore"><?php echo esc_html($tt_atts['readmore_text']); ?> <i class="fa fa-long-arrow-right"></i></a>
                                    <?php endif; ?>
                                </div>
                            </article>
                        <?php if ($tt_atts['post_style'] == 'normal-post'): ?>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                    <!-- end of the loop -->

                    <?php wp_reset_postdata(); ?>

                <?php else : ?>
                    <p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'materialize' ); ?></p>
                <?php endif; ?>
        <?php if ( ! $tt_atts['post_style'] == 'carousel-post'): ?>
            </div> <!-- .row -->
        <?php else: ?>
            </div> <!-- .blog-carousel -->
        <?php endif; ?>
    </div> <!-- .press-release-wrapper -->
<?php echo ob_get_clean();