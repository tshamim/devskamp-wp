<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    ob_start();

    $post_class = array();

    $post_class[] = 'featured-news';

    if ($tt_atts['post_style'] == 'small-post') :
        $post_class[] = 'post-wrapper list-article';
    endif;

    // image size
    $image_size = 'materialize-blog-thumbnail';

    if ($tt_atts['post_style'] == 'medium-post') :
        $image_size = 'materialize-latest-post-thumb';
    elseif($tt_atts['post_style'] == 'small-post') :
        $image_size = 'materialize-list-post-thumb';
    else : 
       $image_size;
    endif;

    $content_height = '';
    if ($tt_atts['content_height']) :
        $content_height = 'min-height: ' .$tt_atts['content_height']. ';';
    endif;


    // grid post $args
    $args = array(
        'p'             => $tt_atts['post_id'],
        'post_type'      => 'post',
        'post_status'    => 'publish',
    ); ?>

    <div class="blog-wrapper latest-featured-news <?php echo esc_attr($tt_atts['el_class'].' '.$css_class.' '.$tt_atts['post_style']); ?>">

        <?php $query = new WP_Query( $args ); ?>

        <?php if ( $query->have_posts() ) : ?>
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <article <?php post_class($post_class); ?>>
                
                    <?php if ($tt_atts['post_style'] == 'small-post'): ?>
                    
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
                        </div>

                    <?php else : ?>

                        <header class="featured-wrapper">
                            <?php if ( has_post_thumbnail()) : ?>
                                <div class="thumb-wrapper waves-effect waves-block waves-light">
                                    
                                    <?php do_action( 'materialize_before_post_thumbnail'); ?>
                                            
                                        <?php the_post_thumbnail($image_size, array('alt' => get_the_title(), 'class' => 'img-responsive')); ?>
                                        
                                    <?php do_action( 'materialize_after_post_thumbnail'); ?>

                                </div><!-- .post-thumbnail -->
                            <?php endif; ?>
                        </header><!-- /.featured-wrapper -->
                        
                        <div class="blog-content" style="<?php echo esc_attr($content_height); ?>">
                            <header class="entry-header-wrapper">
                                <div class="entry-header">
                                    <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

                                    <?php if ($tt_atts['post_style'] == 'large-post'): ?>
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
                                                    <?php if (function_exists('zilla_likes')) :
                                                        zilla_likes();
                                                    endif; ?>
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
                                    <?php endif; ?>
                                </div> <!-- .entry-header -->
                            </header><!-- .entry-header-wrapper -->
                            
                            <?php if ($tt_atts['post_style'] == 'large-post'): ?>
                                <div class="entry-content">
                                    <p><?php $tt_trim_word = $tt_atts['word_limit'];
                                        $content = get_the_content();
                                        echo wp_trim_words( $content, $tt_trim_word); ?></p>
                                        
                                    <?php if ($tt_atts['show_readmore'] == 'yes') : ?>
                                        <a href="<?php the_permalink(); ?>" class="readmore"><?php echo esc_html($tt_atts['readmore_text']); ?> <i class="fa fa-long-arrow-right"></i></a>
                                    <?php endif; ?>
                                </div><!-- .entry-content -->
                            <?php endif; ?>

                        </div><!-- /.blog-content -->
                    <?php endif; ?>
                </article>

            <?php endwhile; ?> <!-- end of the loop -->

        <?php else : ?>
            <p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'materialize' ); ?></p>
        <?php endif; ?>

        <?php wp_reset_postdata(); ?>
    </div> <!-- .blog-wrapper -->
<?php echo ob_get_clean();