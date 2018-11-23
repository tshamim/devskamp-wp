<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

get_header(); 

    wp_enqueue_style( 'isotope-css' );
    wp_enqueue_script( 'isotope' );

    $thumb_size = 'materialize-portfolio-thumb';
    $slide_direction = 'horizontal';

    $style_class = "";
    $portfolio_style = materialize_option('portfolio_style', false, 'boxed_style');
    $grid_column = materialize_option('grid_column', false, '4');
    $grid_padding = materialize_option('grid_padding', false, true);
    $title_visibility = materialize_option('title_visibility');
    $category_visibility = materialize_option('category_visibility');
    $popup_button_visibility = materialize_option('popup_button_visibility');
    $link_button_visibility = materialize_option('link_button_visibility');
    $like_visibility = materialize_option('like_visibility');
    $button_text = materialize_option('button_text', false, true);

    if ($portfolio_style == 'title-style') {
        $style_class = "portfolio-with-title";
    }
    if ($portfolio_style == 'masonry-style') {
        $thumb_size = "materialize-portfolio-masonry";
    }
?>
<div class="portfolio-container content-wrapper">
    <div class="container">
        
        <?php

        $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
        $paged = ( get_query_var('paged') ) ? absint( get_query_var('paged') ) : 1;
        $args = array(
            'post_type'      => 'tt-portfolio',
            'posts_per_page' => materialize_option('category-portfolio-limit', false, true),
            'tt-portfolio-cat'   => $term->slug,
            'post_status'    => 'publish',
            'paged'          => $paged
        );

        $query = new WP_Query( $args ); ?>

        <?php if ( $query->have_posts() ) : ?>

            <div class="tt-grid portfolio row <?php echo esc_attr($style_class); ?>">

                <?php while ( $query->have_posts() ) : $query->the_post(); 
                    
                    $tt_attachment_id = get_post_thumbnail_id(get_the_ID());
                    $tt_image_attr = wp_get_attachment_image_src($tt_attachment_id, 'full' ); 

                    if (function_exists('rwmb_meta')) :
                        $slides = rwmb_meta('materialize_portfolio_gallery','type=image_advanced');
                        $slide_direction = rwmb_meta('materialize_gallery_slide_direction');
                    endif; ?>

                    <div class="tt-item portfolio-item col-md-<?php echo esc_attr($grid_column); ?> col-sm-6 col-xs-12">
                        <?php if ($portfolio_style == 'boxed_style' || $portfolio_style == 'title_style' || $portfolio_style == 'masonry_style'): ?>
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
                                                      <img class="img-responsive" src="<?php echo esc_url($images_src[0]); ?>" alt="<?php esc_attr(materialize_alt_text()); ?>"></a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                <?php else : 
                                    echo get_the_post_thumbnail( get_the_ID(), $thumb_size, array( 'class' => 'img-responsive', 'alt' => materialize_alt_text()));
                                endif; ?>

                                <div class="portfolio-intro overlay-icon-<?php $popup_button_visibility == true ? 'visible' : 'hidden' ?>">
                                    <?php if (function_exists('rwmb_meta') && $popup_button_visibility == true): ?>
                                        <div class="action-btn">
                                            <?php $icon_action = rwmb_meta('materialize_image_popup_option'); ?>
                                            <?php if ($icon_action == 'link_with_post'): ?>
                                                <a href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>
                                            <?php elseif($icon_action == 'video_popup') : ?>
                                                <a class="popup-video" href="<?php echo rwmb_meta('materialize_video_url'); ?>"><i class="fa fa-play"></i></a>
                                            <?php else : ?>
                                                <a href="<?php echo esc_url($tt_image_attr[0]); ?>" class="tt-lightbox"><i class="fa fa-search"></i></a>
                                            <?php endif ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($portfolio_style == 'boxed_style' || $portfolio_style == 'masonry_style') : ?>
                                        <?php if ($title_visibility == true) : ?>
                                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                        <?php endif; ?>

                                        <?php if ($category_visibility == true) : ?>
                                           <p><?php materialize_portfolio_cat(); ?></p>
                                        <?php endif; ?>

                                    <?php endif; ?>
                                </div>
                            </div><!-- thumb -->

                            <?php if ($portfolio_style == 'title_style') : ?>
                                <div class="portfolio-title">
                                    <?php if ($title_visibility == true) : ?>
                                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <?php endif; ?>
                                    
                                    <?php if ($category_visibility == true) : ?>
                                       <p><?php materialize_portfolio_cat(); ?></p>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div><!-- /.portfolio-wrapper -->

                        <?php elseif($portfolio_style == 'card_style') : ?>
                            <div class="portfolio-wrapper">
                                <div class="card">
                                    <div class="card-image waves-effect waves-block waves-light">
                                        <?php if (function_exists('rwmb_meta') && $slides): ?>
                                            <div class="portfolio-slider" data-direction="<?php echo esc_attr($slide_direction);?>">
                                                <ul class="slides">
                                                    <?php foreach ($slides as $slide): ?>
                                                        <li>
                                                            <?php $images_src = wp_get_attachment_image_src( $slide['ID'], $thumb_size); ?>
                                                            <img class="img-responsive activator" src="<?php echo esc_url($images_src[0]); ?>" alt="<?php esc_attr(materialize_alt_text()); ?>">
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
                                            <?php if ($title_visibility == true) : ?>
                                                <?php the_title(); ?>
                                            <?php endif; ?><i class="fa fa-ellipsis-v right"></i>

                                            <?php if (function_exists('zilla_likes') && $like_visibility == true) : ?>
                                                <span class="right"><?php zilla_likes(); ?></span>
                                            <?php endif; ?>
                                        </span>

                                        <?php if ($category_visibility == true) : ?>
                                           <p><?php materialize_portfolio_cat(); ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="card-reveal">
                                        <span class="card-title">
                                        <?php if ($title_visibility == true): ?>
                                            <?php the_title(); ?>
                                        <?php endif; ?><i class="material-icons right">&#xE5CD;</i></span>

                                        <?php if ($category_visibility == true) : ?>
                                           <p><?php materialize_portfolio_cat(); ?></p>
                                        <?php endif; ?>

                                        <p><?php echo wp_trim_words( get_the_content(), materialize_option('category-portfolio-limit', false, true), '' ); ?></p>
                                        <?php if ($link_button_visibility == true): ?>
                                            <a href="<?php the_permalink(); ?>" class="readmore"><?php echo esc_html($button_text);?></a>
                                        <?php endif; ?>
                                    </div>
                                </div><!-- /.card -->
                            </div>
                        <?php endif; ?>
                    </div> <!-- .portfolio-item -->
                <?php endwhile; ?>
            </div><!-- .row -->

            <div class="pagination-wrap text-center">
                <?php materialize_pagination($query, $paged); ?>
            </div>

        <?php else : ?>
            <p><?php esc_html_e('Portfolio not found !', 'materialize');?></p>
        <?php endif;

        wp_reset_postdata(); ?>

    </div> <!-- .container -->
</div> <!-- .portfolio-wrapper -->
<?php get_footer();