<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('rwmb_meta')) :
    $video_mp4 = rwmb_meta( 'materialize_featured_mp4', 'type=file_input' );
    $video_webm = rwmb_meta( 'materialize_featured_webm', 'type=file_input' );
    $video_ogv = rwmb_meta( 'materialize_featured_ogv', 'type=file_input' );
    $embed_video = rwmb_meta( 'materialize_embed_video');

    $video_class = '';

    if (!empty($video_mp4) || !empty($video_webm) || !empty($video_ogv) || !empty($embed_video)) {
        $video_class = 'has-video';
    }
endif;

$header_page_visibility = materialize_option('page-header-visibility', false, true);

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-wrapper'); ?> itemscope itemtype="http://schema.org/Article">
    <header class="featured-wrapper">
        <div class="post-thumbnail blog-video">
            <?php if (function_exists('rwmb_meta')) :
                if ( !empty($embed_video) or !empty($video_mp4) or !empty($video_webm) or !empty($video_ogv) ) : ?>
                    
                    <?php do_action( 'materialize_before_post_thumbnail'); ?>

                    <div class="embed-responsive embed-responsive-16by9">
                        <?php if ($embed_video and (empty($video_mp4) or empty($video_webm) or empty($video_ogv))) :
                            echo rwmb_meta( 'materialize_embed_video');
                        elseif (!empty($video_mp4) or !empty($video_webm) or !empty($video_ogv)) : ?>
                            <video preload="auto" controls="controls">
                                <?php if (!empty($video_mp4)) : ?>
                                    <source src="<?php echo esc_url($video_mp4); ?>" type="video/mp4"/>
                                <?php endif; ?>

                                <?php if (!empty($video_webm)) : ?>
                                    <source src="<?php echo esc_url($video_webm); ?>" type="video/webm"/>
                                <?php endif; ?>

                                <?php if (!empty($video_ogv)) : ?>
                                    <source src="<?php echo esc_url($video_ogv); ?>" type="video/ogv"/>
                                <?php endif; ?>
                            </video>
                        <?php endif; ?>
                    </div>

                    <?php do_action( 'materialize_after_post_thumbnail'); ?>
                <?php endif;
            endif; ?>

            <?php if ( ! is_single() ) : ?>
                <div class="entry-header <?php echo esc_attr($video_class); ?>">
                    <span class="posted-in">
                        <?php echo get_the_category_list(esc_html_x(', ', 'Used between list items, there is a space after the comma.', 'materialize'));
                        ?>
                    </span>
                    <span class="posted-on">
                        <i class="fa fa-clock-o"></i><a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark"><?php the_time( get_option( 'date_format' ) ); ?></a>
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
        </div> <!-- .post-thumbnail -->

        <?php if ( is_single() ) : ?>
            <div class="header-wrap">
                <?php if ($header_page_visibility == 'header-section-hide') :
                    the_title('<h2 class="entry-title">', '</h2>');
                endif; ?>
                <!-- post meta for single post -->
                <?php materialize_posted_on(); ?>
            </div><!-- /.entry-header -->
        <?php endif; ?>
    </header><!-- .entry-header -->

    <div class="blog-content">
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


    <?php if (is_single()): ?>
        <footer class="entry-footer clearfix">
            <div class="post-tags">
                <?php $tags_list = get_the_tag_list('', esc_html__(', ', 'materialize'));
                if ($tags_list) : ?>
                    <span class="tags-links">
                        <?php printf(esc_html__('%1$s', 'materialize'), $tags_list); ?>
                    </span>
                <?php endif; ?>
            </div> <!-- .post-tags -->

            <?php if (materialize_option('show-share-button', false, true)): ?>
                <?php get_template_part( 'template-parts/post', 'share'); ?>
            <?php endif; ?>
        </footer>
        <?php echo materialize_item_scope_meta(); ?>
    <?php endif; ?>
</article>