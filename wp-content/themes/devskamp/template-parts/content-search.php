<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif; ?>


<article id="post-<?php the_ID(); ?>" <?php post_class('post-wrapper'); ?>>
    <header class="featured-wrapper">
        <?php if ( has_post_thumbnail() ) : ?>
            <div class="post-thumbnail">
                <?php do_action( 'materialize_before_post_thumbnail'); ?>

                    <?php the_post_thumbnail('materialize-blog-thumbnail', array('alt' => get_the_title(), 'class' => 'img-responsive'));

                    if ( materialize_option( 'post-lightbox-visibility' ) ) : ?>
                        <div class="post-overlay">
                            <?php $tt_full_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' ); ?>

                            <a href="<?php echo esc_url( $tt_full_image[ 0 ] ); ?>" class="blog-popup" ><i class="fa fa-expand"></i></a>
                        </div>
                    <?php endif; ?>
                    
                <?php do_action( 'materialize_after_post_thumbnail'); ?>

                <?php if ( ! is_single() ) : ?>
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
            </div><!-- .post-thumbnail -->
        <?php endif; ?>
    </header><!-- /.featured-wrapper -->
    
    <div class="blog-content">
        <?php if ( !has_post_thumbnail() ) : ?>
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
            </div><!-- /.entry-header -->
        <?php endif; ?>

        <div class="entry-content">
            <?php 
                if (is_single() || !has_excerpt()) :
                    the_content( '<span class="readmore">' . esc_html__( 'Read More', 'materialize' ) . '<i class="fa fa-arrow-right" aria-hidden="true"></i></span>' );
                else :
                    the_excerpt();
                endif;

                wp_link_pages(array(
                    'before'      => '<div class="page-pagination"><span class="page-links-title">' . esc_html__('Pages:', 'materialize') . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                ));
            ?>
        </div><!-- .entry-content -->
    </div><!-- /.blog-content -->
</article>