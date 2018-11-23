<?php 
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

get_header();

$blog_sidebar = materialize_option('blog-sidebar', false, 'right-sidebar');
    $grid_column = 'col-md-12';

    if ($blog_sidebar == 'right-sidebar') :
        $grid_column = (is_active_sidebar('materialize-blog-sidebar')) ? 'col-md-8 col-sm-8' : $grid_column;
    elseif ($blog_sidebar == 'left-sidebar') :
        $grid_column = (is_active_sidebar('materialize-blog-sidebar')) ? 'col-md-8 col-md-push-4 col-sm-8 col-sm-push-4' : $grid_column;
    endif;
?>
<div class="blog-wrapper content-wrapper">
    <div class="container">
        <div class="row">
            <div class="<?php echo esc_attr($grid_column); ?>">
                <div id="main" class="posts-content" role="main">
                    <?php while ( have_posts() ) : the_post(); 

                        get_template_part( 'template-parts/content', get_post_format() ); 

                        materialize_post_navigation(); 

                        // Author description will appear below in every single blog post.
                        if (get_the_author_meta( 'description' )) :
                            get_template_part( 'author-bio' ); 
                        endif; ?>

                        <?php if (materialize_option('facebook-comment') == true) : ?>
                            <div class="comments-tab">
                                <ul class="nav nav-tabs nav-justified" role="tablist">
                                    <li role="presentation" class="active"><a href="#default-comment" class="waves-effect waves-light"  role="tab" data-toggle="tab"><?php echo esc_html(materialize_option('tab-text-one', false, true)); ?></a></li>
                                    <li role="presentation"><a href="#facebook-comment" class="waves-effect waves-light" role="tab" data-toggle="tab"><?php echo esc_html(materialize_option('tab-text-two', false, true)); ?></a></li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="default-comment">
                        <?php endif; 
                                            // If comments are open or we have at least one comment, load up the comment template.
                                            if ( comments_open() || get_comments_number() ) :
                                                comments_template();
                                            endif; ?>
                        <?php if (materialize_option('facebook-comment') == true) : ?>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="facebook-comment">
                                            <?php echo do_shortcode('[fbcomments]');?>
                                        </div>
                                    </div><!-- /.tab-content -->
                                </div><!-- /.panel-body -->
                            </div><!-- /.comments-tab -->
                        <?php endif;
                    endwhile; // End of the loop. ?>
                </div> <!-- .posts-content -->
            </div> <!-- col-## -->

            <!-- Sidebar -->   
            <?php get_sidebar(); ?>

        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .content-wrapper -->
<?php get_footer(); ?>