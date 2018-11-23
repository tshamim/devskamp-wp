<?php
add_action('wp_ajax_nopriv_materialize_more_post_ajax', 'materialize_more_post_ajax');
add_action('wp_ajax_materialize_more_post_ajax', 'materialize_more_post_ajax');
 
if (!function_exists('materialize_more_post_ajax')) {
    function materialize_more_post_ajax(){
 
        $ppp                = (isset($_POST['perpage'])) ? $_POST['perpage'] : 6;
        $portfolio_style    = (isset($_POST['portfolioStyle'])) ? $_POST['portfolioStyle'] : 'boxed-style';
        $grid_column        = (isset($_POST['gridColumn'])) ? $_POST['gridColumn'] : 4;
        $grid_padding       = (isset($_POST['gridPadding'])) ? $_POST['gridPadding'] : '';
        $popup_button       = (isset($_POST['popupbuttonVisibility'])) ? $_POST['popupbuttonVisibility'] : 'visible';
        $title              = (isset($_POST['titleVisibility'])) ? $_POST['titleVisibility'] : 'visible';
        $category           = (isset($_POST['categoryVisibility'])) ? $_POST['categoryVisibility'] : 'visible';
        $like               = (isset($_POST['likeVisibility'])) ? $_POST['likeVisibility'] : 'visible';
        $word_limit         = (isset($_POST['wordLimit'])) ? $_POST['wordLimit'] : '15';
        $link_button        = (isset($_POST['linkButtonVisibility'])) ? $_POST['linkButtonVisibility'] : 'visible';
        $button_text        = (isset($_POST['buttonText'])) ? $_POST['buttonText'] : 'View full Project';
        $offset             = (isset($_POST['offset'])) ? $_POST['offset'] : 0;


        $thumb_size = 'materialize-portfolio-thumb';
        $slide_direction = 'horizontal';

        $portfolio_tax = $tt_atts['taxonomies'];
        $portfolio_cat_array = explode(',', str_replace(' ', '', $portfolio_tax));
 
        $args = array(
            'post_type'      => 'tt-portfolio',
            'post_status'    => 'publish',
            'posts_per_page' => $ppp,
            'tax_query' => array(
                array(
                    'taxonomy' => 'tt-portfolio-cat',
                    'field'    => 'slug',
                    'terms'    => $portfolio_cat_array,
                ),
            ),
            'offset'         => $offset
        );
 
        $loop = new WP_Query($args);
 
        if ($loop -> have_posts()) :
            while ($loop -> have_posts()) :
                $loop -> the_post();
                
                $terms = wp_get_post_terms( get_the_ID(), 'tt-portfolio-cat' );
                $term = array();

                foreach ( $terms as $t ) :
                    $term[ ] = $t->slug;
                endforeach;

                $style_class = "";

                if ($portfolio_style == 'title-style') {
                    $style_class = "portfolio-with-title";
                }
                if ($portfolio_style == 'masonry-style') {
                    $thumb_size = "materialize-portfolio-masonry";
                }

                $tt_attachment_id = get_post_thumbnail_id(get_the_ID());
                $tt_image_attr = wp_get_attachment_image_src($tt_attachment_id, 'full' );

                if (function_exists('rwmb_meta')) :
                    $slides = rwmb_meta('materialize_portfolio_gallery','type=image_advanced');
                    $slide_direction = rwmb_meta('materialize_gallery_slide_direction');
                endif;
            ?>

                <div class="tt-item portfolio-item col-md-<?php echo esc_attr($grid_column);?> col-sm-6 col-xs-12 <?php echo esc_attr(implode( ' ', $term ).' '.$grid_padding); ?>">

                    <?php if ($portfolio_style == 'boxed-style' || $portfolio_style == 'title-style' || $portfolio_style == 'masonry-style'): ?>
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

                                <div class="portfolio-intro overlay-icon-<?php echo esc_attr($popup_button); ?>">
                                    <?php if (function_exists('rwmb_meta') && $popup_button == 'visible'): ?>
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

                                    <?php if ($portfolio_style == 'boxed-style' || $portfolio_style == 'masonry-style') : ?>
                                        <?php if ($title == 'visible') : ?>
                                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                        <?php endif; ?>

                                        <?php if ($category == 'visible') : ?>
                                           <p><?php materialize_portfolio_cat(); ?></p>
                                        <?php endif; ?>

                                    <?php endif; ?>
                                </div>
                            </div><!-- thumb -->

                            <?php if ($portfolio_style == 'title-style') : ?>
                                <div class="portfolio-title">
                                    <?php if ($title == 'visible') : ?>
                                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <?php endif; ?>
                                    
                                    <?php if ($category == 'visible') : ?>
                                       <p><?php materialize_portfolio_cat(); ?></p>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div><!-- /.portfolio-wrapper -->
                    <?php elseif($portfolio_style == 'card-style') : ?>
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
                                        <?php if ($title == 'visible') : ?>
                                            <?php the_title(); ?>
                                        <?php endif; ?><i class="fa fa-ellipsis-v right"></i>

                                        <?php if (function_exists('zilla_likes') && $like == 'visible') : ?>
                                            <span class="right"><?php zilla_likes(); ?></span>
                                        <?php endif; ?>
                                    </span>

                                    <?php if ($category == 'visible') : ?>
                                       <p><?php materialize_portfolio_cat(); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="card-reveal">
                                    <span class="card-title">
                                    <?php if ($title == 'visible'): ?>
                                        <?php the_title(); ?>
                                    <?php endif; ?><i class="material-icons right">&#xE5CD;</i></span>

                                    <?php if ($category == 'visible') : ?>
                                       <p><?php materialize_portfolio_cat(); ?></p>
                                    <?php endif; ?>

                                    <p><?php echo wp_trim_words( get_the_content(), $word_limit, '' ); ?></p>
                                    <?php if ($link_button == 'visible'): ?>
                                        <a href="<?php the_permalink(); ?>" class="readmore"><?php echo esc_html($button_text);?></a>
                                    <?php endif; ?>
                                </div>
                            </div><!-- /.card -->
                        </div>
                    <?php endif; ?>
                </div> <!-- .tt-item -->
 
            <?php endwhile;
        endif;
 
        wp_reset_postdata();

        die();
    }
}