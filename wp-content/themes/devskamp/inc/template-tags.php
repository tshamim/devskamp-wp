<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  Single blog post navigation
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('materialize_post_navigation')) :

    function materialize_post_navigation() {

        $prev_post = (is_attachment()) ? get_post(get_post()->post_parent) : get_adjacent_post(false, '', true);
        $next_post = get_adjacent_post(false, '', false);

        if (!$next_post && !$prev_post) :
            return;
        endif;
        ?>
        <?php do_action('materialize_before_single_post_navigation' );?>
        <nav class="single-post-navigation" role="navigation">
            <div class="row">
                <?php if ($prev_post): ?>
                    <!-- Previous Post -->
                    <div class="col-xs-6">
                        <div class="previous-post-link">
                            <?php previous_post_link('<div class="previous">%link</div>', '<i class="fa fa-long-arrow-left"></i>' . esc_html__( 'Previous Post', 'materialize' )); ?>
                        </div>
                    </div>
                <?php endif ?>
                
                <?php if ($next_post): ?>
                    <!-- Next Post -->
                    <div class="col-xs-6">
                        <div class="next-post-link">
                            <?php next_post_link('<div class="next">%link</div>', esc_html__( 'Next Post', 'materialize' ) . '<i class="fa fa-long-arrow-right"></i>'); ?>
                        </div>
                    </div>
                <?php endif ?>
            </div> <!-- .row -->
        </nav> <!-- .single-post-navigation -->
        <?php do_action('materialize_after_single_post_navigation' );?>
    <?php
    }
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  Blog posts navigation
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('materialize_posts_navigation')) :

    function materialize_posts_navigation() { ?>
        <div class="blog-navigation clearfix">
            <?php if (get_next_posts_link()) : ?>
                <div class="col-xs-6 pull-left">
                    <div class="previous-page">
                        <?php next_posts_link('<i class="fa fa-long-arrow-left"></i>' . esc_html('Older Posts', 'materialize')); ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (get_previous_posts_link()) : ?>
                <div class="col-xs-6 pull-right">
                    <div class="next-page">
                        <?php previous_posts_link(esc_html__('Newer Posts', 'materialize') . '<i class="fa fa-long-arrow-right"></i>'); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    <?php }
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  Blog posts pagination for default blog layout
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('materialize_posts_pagination')) :
    function materialize_posts_pagination() {
        global $wp_query;
        if ($wp_query->max_num_pages > 1) {
            $big = 999999999; // need an unlikely integer
            $items = paginate_links(array(
                'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format'    => '?paged=%#%',
                'prev_next' => true,
                'current'   => max(1, get_query_var('paged')),
                'total'     => $wp_query->max_num_pages,
                'type'      => 'array',
                'prev_text' => esc_html__('Prev.', 'materialize'),
                'next_text' => esc_html__('Next', 'materialize')
            ));

            $pagination = "<ul class=\"pagination\">\n\t<li>";
            $pagination .= join("</li>\n\t<li>", $items);
            $pagination .= "</li>\n</ul>\n";

            return $pagination;
        }
    }
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  Blog list style posts pagination
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if ( ! function_exists( 'materialize_list_posts_pagination' ) ):

    function materialize_list_posts_pagination() {
        global $query;

        $big   = 999999999; // need an unlikely integer
        $items = paginate_links(array(
            'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format'    => '?paged=%#%',
            'prev_next' => TRUE,
            'current'   => max( 1, get_query_var( 'paged' ) ),
            'total'     => $query->max_num_pages,
            'type'      => 'array',
            'prev_text' => esc_html__( 'Prev.', 'materialize' ),
            'next_text' => esc_html__( 'Next', 'materialize' )
        ) );

        $pagination = '<ul class="pagination"><li>';
        $pagination .= join( "</li><li>", (array) $items );
        $pagination .= "</li></ul>";

        return $pagination;
    }
endif;


//========================================================================================
//  Prints HTML with meta information for the current post-date/time, author & others.
//=======================================================================================

if (!function_exists('materialize_posted_on')) :
    function materialize_posted_on() { ?>

        <ul class="entry-meta clearfix">

            <?php if ( materialize_option( 'tt-post-meta', 'post-author', TRUE ) ) : ?>
                <li>
                    <span class="author vcard">
                        <i class="fa fa-user"></i><?php printf('<a class="url fn n" href="%1$s">%2$s</a>',
                            esc_url(get_author_posts_url(get_the_author_meta('ID'))),
                            esc_html(get_the_author())
                        ) ?>
                    </span>
                </li>
            <?php endif; ?>


            <?php if ( materialize_option( 'tt-post-meta', 'post-date', TRUE ) ) : ?>
                <li>
                    <i class="fa fa-clock-o"></i><a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark"><?php the_time( get_option( 'date_format' ) ); ?></a>
                </li>
            <?php endif; ?>

            <?php if ( materialize_option( 'tt-post-meta', 'post-category', TRUE ) ) : ?>
                <li>
                    <span class="posted-in">
                        <i class="fa fa-folder-open"></i><?php echo get_the_category_list(esc_html_x(', ', 'Used between list items, there is a space after the comma.', 'materialize'));
                        ?>
                    </span>
                </li>
            <?php endif; ?>

            <?php if ( materialize_option( 'tt-post-meta', 'post-comment', TRUE ) ) : ?>
                <li>
                    <span class="post-comments">
                        <?php comments_popup_link(
                            esc_html__('0', 'materialize'),
                            esc_html__('1', 'materialize'),
                            esc_html__('%', 'materialize'), '',
                            esc_html__('0', 'materialize')
                        ); ?>
                    </span>
                </li>
            <?php endif; ?>

            <?php echo edit_post_link(esc_html__('Edit Post', 'materialize'), '<li class="edit-link">', '</li>') ?>
        </ul>
    <?php
    }
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  Post meta for grid style post
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (!function_exists('materialize_grid_posted_on')) :
    function materialize_grid_posted_on() { ?>

        <ul class="post-meta">

            <?php if ( materialize_option( 'tt-post-meta', 'post-author', TRUE ) ) : ?>
                <li>
                    <span class="author vcard">
                        <i class="fa fa-user"></i><?php printf('<a class="url fn n" href="%1$s">%2$s</a>',
                            esc_url(get_author_posts_url(get_the_author_meta('ID'))),
                            esc_html(get_the_author())
                        ) ?>
                    </span>
                </li>
            <?php endif; ?>
            
            <?php if ( materialize_option( 'tt-post-meta', 'post-date', TRUE ) ) : ?>
                <li>
                    <i class="fa fa-calendar"></i><a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark"><?php the_time( get_option( 'date_format' ) ); ?></a>
                </li>
            <?php endif; ?>

            <?php echo edit_post_link(esc_html__('Edit Post', 'materialize'), '<li class="edit-link">', '</li>') ?>
        </ul>
    <?php
    }
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  Get item scope meta
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (! function_exists('materialize_item_scope_meta')) :
    function materialize_item_scope_meta(){
        // don't display meta on pages
        if (!is_single()) {
            return '';
        }

        $post_id = get_the_ID();

        // publisher name
        $tt_publisher_name = get_bloginfo('name');
        if (empty($tt_publisher_name)){
            $tt_publisher_name = esc_attr(get_the_author());
        }
        // publisher logo
        $tt_publisher_logo = materialize_option('logo', 'url', get_template_directory_uri() . '/images/logo.png');

        $meta = '';

        // author
        $meta .= '<span style="display: none;" itemprop="author" itemscope itemtype="https://schema.org/Person">' ;
        $meta .= '<meta itemprop="name" content="' . esc_attr(get_the_author()) . '">' ;
        $meta .= '</span>' ;

        // datePublished
        $tt_post_date_unix = get_the_time('U', $post_id);
        $meta .= '<meta itemprop="datePublished" content="' . date(DATE_W3C, $tt_post_date_unix) . '">';

        // dateModified
        $meta .= '<meta itemprop="dateModified" content="' . the_modified_date('c', '', '', false) . '">';

        // mainEntityOfPage
        $meta .= '<meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="' . get_permalink($post_id) .'"/>';

        // publisher
        $meta .= '<span style="display: none;" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">';
        $meta .= '<span style="display: none;" itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">';
        $meta .= '<meta itemprop="url" content="' . $tt_publisher_logo . '">';
        $meta .= '</span>';
        $meta .= '<meta itemprop="name" content="' . $tt_publisher_name . '">';
        $meta .= '</span>';

        // headline
        $meta .= '<meta itemprop="headline " content="' . esc_attr(get_the_title($post_id)) . '">';

        // featured image
        $tt_image = array();
        $post_thumbnail_id = get_post_thumbnail_id( $post_id );

        if (!is_null($post_thumbnail_id)) {
            $tt_image = wp_get_attachment_image_src($post_thumbnail_id, 'full');
        } else {
            // when the post has no image use the placeholder
            $tt_image[0] = get_template_directory_uri() . '/images/750x350.png';
            $tt_image[1] = '750';
            $tt_image[2] = '350';
        }

        // ImageObject meta
        if (!empty($tt_image[0])) {
            $meta .= '<span style="display: none;" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">';
            $meta .= '<meta itemprop="url" content="' . $tt_image[0] . '">';
            $meta .= '<meta itemprop="width" content="' . $tt_image[1] . '">';
            $meta .= '<meta itemprop="height" content="' . $tt_image[2] . '">';
            $meta .= '</span>';
        }

        return $meta;
    }
endif;

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  Returns true if a blog has more than 1 category.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('materialize_categorized_blog')) :
    
    function materialize_categorized_blog() {
        if (false === ($all_the_cool_cats = get_transient('materialize_categories'))) :
            // Create an array of all the categories that are attached to posts.
            $all_the_cool_cats = get_categories(array(
                'fields'     => 'ids',
                'hide_empty' => 1,

                // We only need to know if there is more than one category.
                'number'     => 2,
            ));

            // Count the number of categories that are attached to the posts.
            $all_the_cool_cats = count($all_the_cool_cats);

            set_transient('materialize_categories', $all_the_cool_cats);
        endif;

        if ($all_the_cool_cats > 1) :
            // This blog has more than 1 category so materialize_categorized_blog should return true.
            return true;
        else :
            // This blog has only 1 category so materialize_categorized_blog should return false.
            return false;
        endif;
    }

endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  Flush out the transients used in materialize_categorized_blog.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('materialize_category_transient_flusher')) :

    function materialize_category_transient_flusher() {
        // Like, beat it. Dig?
        delete_transient('materialize_categories');
    }

    add_action('edit_category', 'materialize_category_transient_flusher');
    add_action('save_post', 'materialize_category_transient_flusher');

endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  Post Password form
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('materialize_post_password_form')) :

    function materialize_post_password_form() {
        global $post;
        $materialize_label_text = 'pwbox-' . (empty($post->ID) ? rand() : $post->ID);

        return '
        <div class="row">
            <form class="clearfix" action="' . esc_url(site_url('wp-login.php?action=postpass', 'login_post')) . '" method="post">
                <div class="col-md-12">
                    <label for="' . $materialize_label_text . '">' . esc_html__("This post is password protected. To view it please enter your password below:", 'materialize') . '</label>
                    <div class="input-group">
                        <input class="form-control" name="post_password" placeholder="' . esc_attr__("Password:", 'materialize') . '" id="' . $materialize_label_text . '" type="password" /><div class="input-group-btn"><button class="btn btn-primary" type="submit" name="Submit">' . esc_attr__("Submit", 'materialize') . '</button></div>
                    </div>
                </div>
            </form>
        </div>';
    }

    add_filter('the_password_form', 'materialize_post_password_form');
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Breadcrumb
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('materialize_breadcrumbs')) :

    function materialize_breadcrumbs(){ ?>
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo esc_url(site_url()); ?>"><?php esc_html_e('Home', 'materialize') ?></a>
            </li>
            <li class="active">
                <?php if( is_tag() ) { ?>
                <?php esc_html_e('Posts Tagged ', 'materialize') ?><span class="raquo">/</span><?php single_tag_title(); echo('/'); ?>
                <?php } elseif (is_day()) { ?>
                <?php esc_html_e('Posts made in', 'materialize') ?> <?php echo get_the_time('F jS, Y'); ?>
                <?php } elseif (is_month()) { ?>
                <?php esc_html_e('Posts made in', 'materialize') ?> <?php echo get_the_time('F, Y'); ?>
                <?php } elseif (is_year()) { ?>
                <?php esc_html_e('Posts made in', 'materialize') ?> <?php echo get_the_time('Y'); ?>
                <?php } elseif (is_search()) { ?>
                <?php esc_html_e('Search results for', 'materialize') ?> <?php the_search_query() ?>
                <?php } elseif (is_404()) { ?>
                <?php esc_html_e('404', 'materialize') ?>
                <?php } elseif (is_single()) { ?>
                <?php $category = get_the_category();
                if ( $category ) {
                    $catlink = get_category_link( $category[0]->cat_ID );
                    echo ('<a href="'.esc_url($catlink).'">'.esc_html($category[0]->cat_name).'</a> '.'<span class="raquo"> /</span> ');
                }
                echo get_the_title(); ?>
                <?php } elseif (is_category()) { ?>
                <?php single_cat_title(); ?>
                <?php } elseif (is_tax()) { ?>
                <?php 
                $materialize_taxonomy_links = array();
                $materialize_term = get_queried_object();
                $materialize_term_parent_id = $materialize_term->parent;
                $materialize_term_taxonomy = $materialize_term->taxonomy;

                while ( $materialize_term_parent_id ) {
                    $materialize_current_term = get_term( $materialize_term_parent_id, $materialize_term_taxonomy );
                    $materialize_taxonomy_links[] = '<a href="' . esc_url( get_term_link( $materialize_current_term, $materialize_term_taxonomy ) ) . '" title="' . esc_attr( $materialize_current_term->name ) . '">' . esc_html( $materialize_current_term->name ) . '</a>';
                    $materialize_term_parent_id = $materialize_current_term->parent;
                }

                if ( !empty( $materialize_taxonomy_links ) ) echo implode( ' <span class="raquo">/</span> ', array_reverse( $materialize_taxonomy_links ) ) . ' <span class="raquo">/</span> ';

                echo esc_html( $materialize_term->name ); 
                } elseif (is_author()) { 
                    global $wp_query;
                    $curauth = $wp_query->get_queried_object();

                    esc_html_e('Posts by: ', 'materialize'); echo ' ',$curauth->nickname; 
                } elseif (is_page()) { 
                    echo get_the_title(); 
                } elseif (is_home()) { 
                    esc_html_e('Blog', 'materialize');
                } elseif (class_exists('WooCommerce') and (is_shop())){
                    esc_html_e('Shop', 'materialize');
                }?>
            </li>
        </ul>
    <?php
    }
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Page header section background title
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('materialize_page_header_section_title')) :
    function materialize_page_header_section_title() {
        $materialize_query = get_queried_object();

        if (is_archive()) :
            if (is_day()) :
                $archive_title = get_the_time('d F, Y');
                $page_header_title = sprintf(esc_html__('Archive of: %s', 'materialize'), $archive_title);
            elseif (is_month()) :
                $archive_title = get_the_time('F Y');
                $page_header_title = sprintf(esc_html__('Archive of: %s', 'materialize'), $archive_title);
            elseif (is_year()) :
                $archive_title = get_the_time('Y');
                $page_header_title = sprintf(esc_html__('Archive of: %s', 'materialize'), $archive_title);
            endif;
        endif;

        if (is_404()) :
            $page_header_title = esc_html__('404 Not Found', 'materialize');
        endif;

        if (is_search()) :
            $page_header_title = sprintf(esc_html__('Search result for: "%s"', 'materialize'), get_search_query());
        endif;

        if (is_category()) :
            $page_header_title = sprintf(esc_html__('Category: %s', 'materialize'), $materialize_query->name);
        endif;

        if (is_tag()) :
            $page_header_title = sprintf(esc_html__('Tag: %s', 'materialize'), $materialize_query->name);
        endif;

        if (is_author()) :
            $page_header_title = sprintf(esc_html__('Posts of: %s', 'materialize'), $materialize_query->display_name);
        endif;

        if (is_tax('tt-portfolio-cat')) :
            $page_header_title = sprintf(esc_html__('Category: %s', 'materialize'), $materialize_query->name);
        endif;

        if (is_page()) :
            $page_header_title = $materialize_query->post_title;
        endif;

        if (is_home() or is_single()) :
            $page_header_title = materialize_option('blog-title');
        endif;

        if (is_single()) :
            $page_header_title = get_the_title();
        endif;

        if (is_singular('tt-event')) :
            $page_header_title = get_the_title();
        endif;

        if (is_singular('tt-portfolio')) :
            $page_header_title = get_the_title();
        endif;

        if (class_exists( 'WooCommerce' ) ) :
            if ( is_post_type_archive( 'product' ) ) {
                $page_header_title = post_type_archive_title( '', FALSE );
            }

            if ( is_product_category() ) {
                $page_header_title = sprintf( __( '%s', 'materialize' ), $materialize_query->name );
            }

            if ( is_product_tag() ) {
                $page_header_title = sprintf( __( '%s', 'materialize' ), $materialize_query->name );
            }
        endif;

        $page_header_title = apply_filters('materialize_page_header_section_title', $page_header_title, $page_header_title);

        if (empty($page_header_title)) :
            $page_header_title = get_bloginfo('name');
        endif;

        return $page_header_title;
    }
endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Page header section background image
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('materialize_page_header_background')) :

    function materialize_page_header_background() {

        $page_header_image = false;

        if (is_archive()) :
            $page_header_image = materialize_option('archive-header-image', 'url');
        endif;

        if (is_404()) :
            $page_header_image = materialize_option('header-404-image', 'url');
        endif;

        if (is_search()) :
            $page_header_image = materialize_option('search-header-image', 'url');
        endif;

        if (is_category()) :
            $page_header_image = materialize_option('category-header-image', 'url');
        endif;

        if (is_tag()) :
            $page_header_image = materialize_option('tag-header-image', 'url');
        endif;

        if (is_author()) :
            $page_header_image = materialize_option('author-header-image', 'url');
        endif;


        if (is_page()) :
            
            $page_header_image = materialize_option('page-header-image', 'url');
            
            if (function_exists('rwmb_meta')) :
                $single_image = rwmb_meta('materialize_page_header_image', 'type=image_advanced');
            endif;

            if (!empty($single_image)) {
                foreach ($single_image as $image) {
                    $page_header_image = $image['full_url'];
                }
            }

        endif;


        if (is_single()) :

            $page_header_image = materialize_option('blog-header-image', 'url');
            
            if (function_exists('rwmb_meta')) :
                $single_image = rwmb_meta('materialize_page_header_image', 'type=image_advanced');
            endif;

            if (!empty($single_image)) {
                foreach ($single_image as $image) {
                    $page_header_image = $image['full_url'];
                }
            }
        endif;

        if (empty ($single_image)) :
            if (is_singular('tt-portfolio')) :
                $page_header_image = materialize_option('portfolio-header-image', 'url');
            endif;
            if (is_singular('tt-service')) :
                $page_header_image = materialize_option('service-header-image', 'url');
            endif;
            if (is_singular('tt-joblist')) :
                $page_header_image = materialize_option('joblist-header-image', 'url');
            endif;
            if (is_singular('tt-member')) :
                $page_header_image = materialize_option('member-header-image', 'url');
            endif;
            if (class_exists('WooCommerce')) :
                if (is_singular('product')) :
                    $page_header_image = materialize_option('product-header-image', 'url');
                endif;
            endif;
        endif;

        if (class_exists( 'WooCommerce' ) ) :
            if ( is_post_type_archive( 'product' ) || is_tax('product_cat') || is_tax('product_tag')) {
                $page_header_image = materialize_option('product-header-image', 'url');
            }
        endif;

        if (is_home()) :
            $page_header_image = materialize_option('blog-header-image', 'url');
        endif;

        if (!$page_header_image) :
            $page_header_image = materialize_option('blog-header-image', 'url');
        endif;

        $image_src = apply_filters('materialize_page_header_background', $page_header_image, $page_header_image);

        return $image_src;
    }

endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Comments list
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists("materialize_comments_list")) :

    function materialize_comments_list($comment, $args, $depth) {
        $GLOBALS[ 'comment' ] = $comment;
        switch ($comment->comment_type) {
            // Display trackbacks differently than normal comments.
            case 'pingback' :
            case 'trackback' :
                ?>

                <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
                <p><?php esc_html_e('Pingback:', 'materialize'); ?> <?php comment_author_link(); ?> <?php edit_comment_link(esc_html__('(Edit)', 'materialize'), '<span class="edit-link">', '</span>'); ?></p>

                <?php
                break;

            default :
                // Proceed with normal comments.
                global $post;
                ?>
                <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                <div id="comment-<?php comment_ID(); ?>" class="comment media">
                    <div class="comment-author clearfix">

                        <div class="comment-meta media-heading">

                            <div class="media-left">
                                <?php
                                    $get_avatar = get_avatar($comment, apply_filters('materialize_post_comment_avatar_size', 60));
                                    $avatar_img = materialize_get_avatar_url($get_avatar);
                                    //Comment author avatar
                                ?>

                                <img class="avatar" src="<?php echo esc_url($avatar_img); ?>" alt="<?php echo get_comment_author(); ?>">
                            </div>

                            <div class="media-body">
                                <div class="comment-info">
                                    <div class="comment-author">
                                        <?php echo get_comment_author(); ?>
                                    </div>

                                    <time datetime="<?php echo get_comment_date(); ?>">
                                        <?php echo get_comment_date(); ?> <?php echo get_comment_time(); ?>
                                    </time>


                                    <div class="comment-meta-wrapper">

                                        <?php edit_comment_link(esc_html__('Edit', 'materialize')); //edit link
                                        ?>
                                        
                                        <?php comment_reply_link(array_merge($args, array(
                                            'reply_text' => esc_html__('Reply', 'materialize'),
                                            'depth'      => $depth,
                                            'max_depth'  => $args[ 'max_depth' ]
                                        ))); ?>

                                    </div>
                                    
                                </div>


                                <?php if ('0' == $comment->comment_approved) { ?>
                                    <div class="alert alert-info">
                                        <?php esc_html_e('Your comment is awaiting moderation.', 'materialize'); ?>
                                    </div>
                                <?php } ?>

                                <p>
                                    <?php comment_text(); //Comment text ?>
                                </p>

                            </div>

                        </div> <!-- .comment-meta -->
                    </div> <!-- .comment-author -->
                </div> <!-- #comment-## -->
                <?php
                break;
        } // end comment_type check

    }

endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Fetching Avatar URL
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('materialize_get_avatar_url')) :

    function materialize_get_avatar_url($get_avatar) {
        preg_match("/src='(.*?)'/i", $get_avatar, $matches);

        return $matches[ 1 ];
    }

endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Search form
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('materialize_blog_search_form')) :

    function materialize_blog_search_form($form) {
        $form = '<form role="search" method="get" id="searchform" class="search-form" action="' . esc_url(home_url('/')) . '">
        <div class="input-field">
            <input type="text" value="' . get_search_query() . '" name="s" id="s"/>
            <label for="s">'.esc_html__('Search', 'materialize').'</label>
        </div>
        <button type="submit"><i class="fa fa-search"></i></button>
        <input type="hidden" value="post" name="post_type" id="post_type" />
    </form>';

        return $form;
    }

    add_filter('get_search_form', 'materialize_blog_search_form');

endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Associative array to html attribute conversion
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('materialize_array2attr')) :
  
    function materialize_array2attr($attr, $filter = '') {
        $attr = wp_parse_args($attr, array());
        if ($filter) {
            $attr = apply_filters($filter, $attr);
        }
        $html = '';
        foreach ($attr as $name => $value) {
            $html .= " $name=" . '"' . $value . '"';
        }

        return $html;
    }

endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Hex to RGB color
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('materialize_hex2rgb')) :
    
    function materialize_hex2rgb($hex) {
       $hex = str_replace("#", "", $hex);

       if(strlen($hex) == 3) {
          $r = hexdec(substr($hex,0,1).substr($hex,0,1));
          $g = hexdec(substr($hex,1,1).substr($hex,1,1));
          $b = hexdec(substr($hex,2,1).substr($hex,2,1));
       } else {
          $r = hexdec(substr($hex,0,2));
          $g = hexdec(substr($hex,2,2));
          $b = hexdec(substr($hex,4,2));
       }
       $rgb = array($r, $g, $b);

       return $rgb[0].','.$rgb[1].','.$rgb[2];
    }

endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// color modify for darken/lighten
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (!function_exists('materialize_modify_color')) :
    
    function materialize_modify_color( $hex, $steps ) {
        $steps = max( -255, min( 255, $steps ) );
        // Format the hex color string
        $hex = str_replace( '#', '', $hex );
        if ( strlen( $hex ) == 3 ) {
            $hex = str_repeat( substr( $hex,0,1 ), 2 ).str_repeat( substr( $hex,1,1 ), 2 ).str_repeat( substr( $hex,2,1 ), 2 );
        }
        // Get decimal values
        $r = hexdec( substr( $hex,0,2 ) );
        $g = hexdec( substr( $hex,2,2 ) );
        $b = hexdec( substr( $hex,4,2 ) );
        // Adjust number of steps and keep it inside 0 to 255
        $r = max( 0,min( 255,$r + $steps ) );
        $g = max( 0,min( 255,$g + $steps ) );  
        $b = max( 0,min( 255,$b + $steps ) );
        $r_hex = str_pad( dechex( $r ), 2, '0', STR_PAD_LEFT );
        $g_hex = str_pad( dechex( $g ), 2, '0', STR_PAD_LEFT );
        $b_hex = str_pad( dechex( $b ), 2, '0', STR_PAD_LEFT );
        return '#'.$r_hex.$g_hex.$b_hex;
    }

endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Portfolio category
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (! function_exists('materialize_portfolio_cat')) :
    function materialize_portfolio_cat(){
        $portfolio_terms = wp_get_post_terms(get_the_ID(), 'tt-portfolio-cat');
        if (! empty( $portfolio_terms ) && ! is_wp_error( $portfolio_terms )) :
            $count = count($portfolio_terms);
            $increament = 0;
            foreach ($portfolio_terms as $term) :
                $increament++;?>
                <a class="links" href="<?php echo esc_url(get_term_link($term, 'tt-portfolio')) ?>">
                    <?php echo esc_html($term->name);?>
                </a>
                <?php if ($increament < $count):
                    echo ',';
                endif;
            endforeach;
        endif;
    }
endif;

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Joblist category
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (! function_exists('materialize_joblist_cat')) :
    function materialize_joblist_cat(){
        $job_terms = wp_get_post_terms(get_the_ID(), 'tt-joblist-cat');
        if (! empty( $job_terms ) && ! is_wp_error( $job_terms )) :
            $count = count($job_terms);
            $increament = 0;
            foreach ($job_terms as $term) :
                $increament++; ?>
                <a class="links" href="<?php echo esc_url(get_term_link($term, 'tt-joblist')) ?>">
                    <?php echo esc_html($term->name);?>
                </a>
                <?php if ($increament < $count):
                    echo ",";
                endif;
            endforeach;
        endif;
    }
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Post thumbnail alt text
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (! function_exists( 'materialize_alt_text' )) :
    function materialize_alt_text(){
        $id = get_the_ID();
        $thumbnail_id = get_post_thumbnail_id($id);

        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);

        if ($alt) :
            return $alt;
        else :
            return get_the_title();
        endif;
    }
endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// WOOOCOMMERCE
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

// WISHLIST
if(!function_exists('materialize_wishlist_btn')) {
    function materialize_wishlist_btn() {
        if(!class_exists('YITH_WCWL_Shortcode')){
            return;
        }
        echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );
    }
}

if( get_option('yith_wcwl_button_position') == 'shortcode' ) {
    add_action( 'woocommerce_after_add_to_cart_button', 'materialize_wishlist_btn', 30 );
}


if( !function_exists('materialize_wishlist_text')):
    function materialize_wishlist_text(){
        return '<i class="fa fa-heart" aria-hidden="true"></i>';
    }
    add_filter('yith-wcwl-browse-wishlist-label', 'materialize_wishlist_text');
endif;



// Cart contents update when products are added to the cart via AJAX
if (! function_exists('materialize_header_add_to_cart_fragment')) :
    function materialize_header_add_to_cart_fragment( $fragments ) {
        ob_start(); ?>
        <a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_html_e( 'View your shopping cart', 'materialize' ); ?>"><i class="material-icons">&#xE8CB;</i><span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span></a>
        <?php
        $fragments['a.cart-contents'] = ob_get_clean();
        return $fragments;
    }
    add_filter( 'woocommerce_add_to_cart_fragments', 'materialize_header_add_to_cart_fragment' );
endif;


// update wishlist count
function materialize_update_wishlist_count(){
    if( function_exists( 'YITH_WCWL' ) ){
        wp_send_json( YITH_WCWL()->count_products() );
    }
}
add_action( 'wp_ajax_update_wishlist_count', 'materialize_update_wishlist_count' );
add_action( 'wp_ajax_nopriv_update_wishlist_count', 'materialize_update_wishlist_count' );


// pagination
if(!function_exists('materialize_pagination')) {
    function materialize_pagination($wp_query, $paged, $pages = '', $range = 2) {
         $showitems = ($range * 2)+1;  

         if(empty($paged)) $paged = 1;

         if($pages == '')
         {
             $pages = $wp_query->max_num_pages;
             if(!$pages)
             {
                 $pages = 1;
             }
         }   

         if(1 != $pages)
         {
            echo '<ul class="pagination">';
                 if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."' class='prev page-numbers'><i class='fa fa-angle-double-left'></i></a></li>";
        
                 for ($i=1; $i <= $pages; $i++)
                 {
                     if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
                     {
                         echo ($paged == $i)? "<li><span class='page-numbers current'>".$i."</span></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a></li>";
                     }
                 }
        
                 if ($paged < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged + 1)."' class='next page-numbers'><i class='fa fa-angle-double-right'></i></a></li>";
            echo '</ul>';
         }
    }
}