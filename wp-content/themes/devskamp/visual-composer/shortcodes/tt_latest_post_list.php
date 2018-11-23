<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    ob_start();

    $post_class = array();
    $post_class[] = 'featured-news post-wrapper list-article';

    // image size
    $image_size = 'materialize-list-post-thumb';



    // grid post $args
    $args = array(
        'post_type'         => 'post',
        'posts_per_page'    => $tt_atts['post_limit'],
        'post_status'       => 'publish'
    ); ?>

    <div class="blog-wrapper latest-featured-news <?php echo esc_attr($tt_atts['el_class'].' '.$css_class); ?>">
        <div class="row masonry-wrap">
            <?php $query = new WP_Query( $args ); ?>

            <?php if ( $query->have_posts() ) : ?>
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="col-md-6 col-sm-12 col-xs-12 masonry-column">
                        <article <?php post_class($post_class); ?>>
                            <div class="hover-overlay <?php echo esc_attr($tt_atts['hover_color']); ?>"></div>

                            <?php if ( has_post_thumbnail()) : ?>
                                <div class="thumb-wrapper waves-effect waves-block waves-light">
                                    
                                    <?php do_action( 'materialize_before_post_thumbnail'); ?>
                                            
                                        <?php the_post_thumbnail($image_size, array('alt' => get_the_title(), 'class' => 'img-responsive')); ?>
                                        
                                    <?php do_action( 'materialize_after_post_thumbnail'); ?>

                                </div><!-- .post-thumbnail -->
                            <?php endif; ?>

                            <div class="blog-content">
                                <header class="entry-header-wrapper">
                                    <div class="entry-header-wrap">
                                        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                                        <div class="entry-meta">
                                            <ul class="list-inline">
                                                <li>
                                                    <span class="author vcard">
                                                        <i class="fa fa-user"></i><?php printf('<a class="url fn n" href="%1$s">%2$s</a>',
                                                            esc_url(get_author_posts_url(get_the_author_meta('ID'))),
                                                            esc_html(get_the_author())
                                                        ) ?>
                                                    </span>
                                                </li>

                                                <li>
                                                    <i class="fa fa-clock-o"></i><a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark"><?php the_time( get_option( 'date_format' ) ); ?></a>
                                                </li>

                                                <li>
                                                    <i class="fa fa-comment-o"></i>
                                                    <?php
                                                        comments_popup_link(
                                                            esc_html__('0', 'materialize'),
                                                            esc_html__('1', 'materialize'),
                                                            esc_html__('%', 'materialize'), '',
                                                            esc_html__('0', 'materialize')
                                                        ); 
                                                    ?>
                                                </li>
                                            </ul>
                                        </div><!-- .entry-meta -->
                                    </div><!-- /.entry-header -->
                                </header><!-- /.entry-header-wrapper -->

                                <div class="entry-content">
                                    <p><?php $tt_trim_word = $tt_atts['word_limit'];
                                        $content = get_the_content();
                                        echo wp_trim_words( $content, $tt_trim_word); ?></p>
                                        
                                    <?php if ($tt_atts['show_readmore'] == 'yes') : ?>
                                        <a href="<?php the_permalink(); ?>" class="readmore"><?php echo esc_html($tt_atts['readmore_text']); ?> <i class="fa fa-long-arrow-right"></i></a>
                                    <?php endif; ?>
                                </div><!-- .entry-content -->
                            </div> <!-- .blog-content -->
                        </article>
                    </div> <!-- .col-# -->

                <?php endwhile; ?> <!-- end of the loop -->

            <?php else : ?>
                <p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'materialize' ); ?></p>
            <?php endif; ?>

            <?php wp_reset_postdata(); ?>
        </div> <!-- .row -->
    </div> <!-- .blog-wrapper -->
<?php echo ob_get_clean();