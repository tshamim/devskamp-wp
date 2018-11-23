<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    ob_start();


    // grid post $args
    $args = array(
       'post_type'      => 'post',
       'post_status'    => 'publish',
       'posts_per_page' => $tt_atts['post_limit'],
       'post__not_in'   => get_option( 'sticky_posts' ),
       'orderby'        => 'date'
    ); ?>

    <div class="blog-wrapper blog-grid content-wrapper <?php echo esc_attr($tt_atts['el_class'].' '.$css_class.' '.$tt_atts['post_style']); ?>">
        <div class="row">
            <div id="main" class="posts-content masonry-wrap clearfix" role="main">

                <?php $query = new WP_Query( $args ); ?>

                <?php if ( $query->have_posts() ) : ?>
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                        
                        <div class="col-md-4 col-sm-6 col-xs-12 masonry-column">
                            <article id="post-<?php the_ID(); ?>" <?php post_class('post-wrapper'); ?>>
                                <header class="featured-wrapper">
                                    <?php if ( has_post_thumbnail()) : ?>
                                        <div class="post-thumbnail waves-effect waves-block waves-light">
                                            <?php do_action( 'materialize_before_post_thumbnail'); ?>

                                                <?php the_post_thumbnail('materialize-blog-grid-thumbnail', array('alt' => get_the_title(), 'class' => 'img-responsive')); ?>
                                                
                                            <?php do_action( 'materialize_after_post_thumbnail'); ?>

                                            
                                            <?php if ($tt_atts['post_style'] == 'grid-style-default'): ?>
                                                <div class="entry-header">
                                                    <span class="posted-in">
                                                        <?php echo get_the_category_list(esc_html_x(', ', 'Used between list items, there is a space after the comma.', 'materialize'));
                                                        ?>
                                                    </span>

                                                    <span class="post-comments">
                                                        <?php comments_popup_link(
                                                                esc_html__('0', 'materialize'),
                                                                esc_html__('1', 'materialize'),
                                                                esc_html__('%', 'materialize'), '',
                                                                esc_html__('0', 'materialize')
                                                            ); ?>
                                                    </span>

                                                    <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                                                </div><!-- /.entry-header -->
                                            <?php endif; ?>
                                            
                                        </div><!-- .post-thumbnail -->
                                    <?php endif; ?>
                                </header><!-- /.featured-wrapper -->
                                
                                <div class="blog-content">

                                    <?php if ( !has_post_thumbnail() || $tt_atts['post_style'] == 'grid-style-two') : ?>
                                        <div class="entry-header">

                                            <span class="posted-in">
                                                <?php echo get_the_category_list(esc_html_x(', ', 'Used between list items, there is a space after the comma.', 'materialize'));
                                                ?>
                                            </span>

                                            <span class="post-comments">
                                                <?php
                                                    comments_popup_link(
                                                        esc_html__('0', 'materialize'),
                                                        esc_html__('1', 'materialize'),
                                                        esc_html__('%', 'materialize'), '',
                                                        esc_html__('0', 'materialize')
                                                    ); 
                                                ?>
                                            </span>
                                            
                                            <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

                                        </div><!-- /.entry-header -->
                                    <?php endif; ?>

                                    <div class="entry-content">
                                        <p><?php $tt_trim_word = $tt_atts['word_limit'];
                                            $content = get_the_content();
                                            echo wp_trim_words( $content, $tt_trim_word); ?></p>
                                    </div><!-- .entry-content -->
                                </div><!-- /.blog-content -->
                            </article>
                        </div>
                    <?php endwhile; ?> <!-- end of the loop -->

                <?php else : ?>
                    <p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'materialize' ); ?></p>
                <?php endif; ?>

                <?php wp_reset_postdata(); ?>
            </div> <!-- .posts-content -->
        </div> <!-- .row -->
    </div> <!-- .blog-wrapper -->
<?php echo ob_get_clean();