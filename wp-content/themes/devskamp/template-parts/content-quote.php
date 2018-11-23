<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('rwmb_meta')) :
    $quote = rwmb_meta( 'materialize_qoute' );
    $quote_class = $quote ? 'has-quote' : '';
endif;

$header_page_visibility = materialize_option('page-header-visibility', false, true);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-wrapper'); ?> itemscope itemtype="http://schema.org/Article">
    <header class="featured-wrapper">
        <div class="post-thumbnail blog-quote">
            <?php if (function_exists('rwmb_meta')) :
                $author_url = rwmb_meta( 'materialize_qoute_author_url' );

                if ($quote) : ?>
                    <blockquote>
                        <p><?php echo esc_html($quote);?></p>
                        
                        <?php 
                            if ($author_url) : ?>
                                <small><a href="<?php echo esc_url($author_url)?>"><?php echo esc_html(rwmb_meta( 'materialize_qoute_author' )); ?></a></small>
                                <?php else : ?>
                                    <small><?php echo esc_html(rwmb_meta( 'materialize_qoute_author' )); ?></small>
                                <?php 
                            endif;
                        ?>
                        
                    </blockquote>
                <?php endif; 
            endif; ?>
        </div>

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