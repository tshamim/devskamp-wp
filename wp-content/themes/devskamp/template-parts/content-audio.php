<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif; ?>

<?php $page_template = get_post_meta(get_queried_object_id(), '_wp_page_template', true); 
$header_page_visibility = materialize_option('page-header-visibility', false, true);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-wrapper'); ?> itemscope itemtype="http://schema.org/Article">
    <header class="featured-wrapper">

        <div class="post-thumbnail blog-audio">
            <?php if (function_exists('rwmb_meta')) :
                $audio_mp3 = rwmb_meta( 'materialize_featured_mp3', 'type=file_input' );
                $audio_ogg = rwmb_meta( 'materialize_featured_ogg', 'type=file_input' );
                $audio_wav = rwmb_meta( 'materialize_featured_wav', 'type=file_input' );
                $embed_audio = rwmb_meta( 'materialize_embed_audio', 'type=oembed' );
                        
                if ( !empty($embed_audio) or !empty($audio_mp3) or !empty($audio_ogg) or !empty($audio_wav) ) : ?>
                    
                    <?php do_action( 'materialize_before_post_thumbnail');

                        if ($embed_audio and (empty($audio_mp3) or empty($audio_ogg) or empty($audio_wav))) :

                            echo rwmb_meta( 'materialize_embed_audio', 'type=oembed' );

                        elseif (!empty($audio_mp3) or !empty($audio_ogg) or !empty($audio_wav)) : ?>

                        <audio preload="auto" controls="controls">

                            <?php if (!empty($audio_mp3)) : ?>
                                <source src="<?php echo esc_url($audio_mp3); ?>" type="audio/mpeg"/>
                            <?php endif; ?>

                            <?php if (!empty($audio_ogg)) : ?>
                                <source src="<?php echo esc_url($audio_ogg); ?>" type="audio/ogg"/>
                            <?php endif; ?>

                            <?php if (!empty($audio_wav)) : ?>
                                <source src="<?php echo esc_url($audio_wav); ?>" type="audio/wav"/>
                            <?php endif; ?>
                            
                        </audio>

                    <?php endif; ?>

                    <?php do_action( 'materialize_after_post_thumbnail'); ?>
                <?php endif;
            endif; ?>

            <?php if ( ! is_single() ) : ?>
                <div class="entry-header">
                    <span class="posted-in">
                        <?php echo get_the_category_list(esc_html_x(', ', 'Used between list items, there is a space after the comma.', 'materialize'));
                        ?>
                    </span>
                    <span class="posted-on">
                        <i class="fa fa-clock-o"></i><a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark"><?php the_time( get_option( 'date_format' ) ); ?></a>
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
        </div> <!-- .blog-audio -->

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
            <?php if (is_single() || !has_excerpt()) :
                the_content( '<span class="readmore">' . esc_html__( 'Read More', 'materialize' ) . '<i class="fa fa-arrow-right" aria-hidden="true"></i></span>' );
            else :
                the_excerpt();
            endif;

            wp_link_pages(array(
                'before'      => '<div class="page-pagination"><span class="page-links-title">' . esc_html__('Pages:', 'materialize') . '</span>',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
            )); ?>
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
                    <?php endif; 
                ?>
            </div> <!-- .post-tags -->

            <?php if (materialize_option('show-share-button', false, true)): ?>
                <?php get_template_part( 'template-parts/post', 'share'); ?>
            <?php endif; ?>
            <?php echo materialize_item_scope_meta(); ?>
        </footer>
    <?php endif; ?>
</article>