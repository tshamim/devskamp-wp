<?php


    //---------------------------------------------------------------------------
    // Popular Post widget
    //---------------------------------------------------------------------------

    class TT_Popular_Post_Widget extends WP_Widget {
        public function __construct() {
            parent::__construct(
                'tt_popular_post', // Base ID
                __('Materialize Popular Posts', 'tt-pl-textdomain'), // Name
                array('description' => __('Your site\'s most popular and recent posts.', 'tt-pl-textdomain')) // Args
            );
        }

        public function form($instance) {
            $defaults = array(
                'title'            => '',
                'post_limit'       => '5',
                'show_meta'        => '',
                'thumb'            => '',
                'post_view'        => ''
            );

            $instance = wp_parse_args( (array) $instance, $defaults ); ?>

            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title: ', 'tt-pl-textdomain'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>">
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('post_limit'); ?>"><?php esc_html_e('Number of posts to show: ', 'tt-pl-textdomain'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('post_limit'); ?>" name="<?php echo $this->get_field_name('post_limit'); ?>" type="text" value="<?php echo esc_attr($instance['post_limit']); ?>">
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('show_meta'); ?>"><?php esc_html_e('Show meta ? ', 'tt-pl-textdomain'); ?></label>
                <select class="widefat" id="<?php echo $this->get_field_id('show_meta'); ?>" name="<?php echo $this->get_field_name('show_meta'); ?>" style="width:100%;">
                    <option value="yes" <?php selected($instance['show_meta'], 'yes'); ?>><?php esc_html_e('Yes', 'tt-pl-textdomain') ?></option>
                    <option value="no" <?php selected($instance['show_meta'], 'no'); ?>><?php esc_html_e('No', 'tt-pl-textdomain') ?></option>
                </select>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('thumb'); ?>"><?php esc_html_e('Show Post thumbnail ? ', 'tt-pl-textdomain'); ?></label>
                <select class="widefat" id="<?php echo $this->get_field_id('thumb'); ?>" name="<?php echo $this->get_field_name('thumb'); ?>" style="width:100%;">
                    <option value="yes" <?php selected($instance['thumb'], 'yes'); ?>><?php esc_html_e('Yes', 'tt-pl-textdomain') ?></option>
                    <option value="no" <?php selected($instance['thumb'], 'no'); ?>><?php esc_html_e('No', 'tt-pl-textdomain') ?></option>
                </select>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('post_view'); ?>"><?php esc_html_e('Show Post view ? ', 'tt-pl-textdomain'); ?></label>
                <select class="widefat" id="<?php echo $this->get_field_id('post_view'); ?>" name="<?php echo $this->get_field_name('post_view'); ?>" style="width:100%;">
                    <option value="yes" <?php selected($instance['post_view'], 'yes'); ?>><?php esc_html_e('Yes', 'tt-pl-textdomain') ?></option>
                    <option value="no" <?php selected($instance['post_view'], 'no'); ?>><?php esc_html_e('No', 'tt-pl-textdomain') ?></option>
                </select>
            </p>

        <?php }

        public function update($new_instance, $old_instance)
        {
            $instance = $old_instance;

            $instance[ 'title' ] = (!empty($new_instance[ 'title' ])) ? strip_tags($new_instance[ 'title' ]) : '';
            $instance[ 'post_limit' ] = (!empty($new_instance[ 'post_limit' ])) ? strip_tags($new_instance[ 'post_limit' ]) : '5';
            $instance[ 'show_meta' ] = (!empty($new_instance[ 'show_meta' ])) ? strip_tags($new_instance[ 'show_meta' ]) : '';
            $instance[ 'post_view' ] = (!empty($new_instance[ 'post_view' ])) ? strip_tags($new_instance[ 'post_view' ]) : '';
            $instance[ 'thumb' ] = (!empty($new_instance[ 'thumb' ])) ? strip_tags($new_instance[ 'thumb' ]) : '';

            return $instance;
        }

        public function widget($args, $instance) {
            $id = $args[ 'widget_id' ];

            echo $args[ 'before_widget' ];
            $title = apply_filters('widget_title', $instance[ 'title' ]);
            if (!empty($title)) {
                echo $args[ 'before_title' ] . $title . $args[ 'after_title' ];
            }
            ?>

            <div class="tt-popular-post">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#<?php echo esc_attr($id); ?>_tab-1" data-toggle="tab"><?php esc_html_e('Latest', 'tt-pl-textdomain'); ?></a>
                    </li>
                    <li>
                        <a href="#<?php echo esc_attr($id); ?>_tab-2" data-toggle="tab"><?php esc_html_e('Popular', 'tt-pl-textdomain'); ?></a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- latest post tab -->
                    <div id="<?php echo $id ?>_tab-1" class="tab-pane fade in active">
                        <?php
                            $pargs = array(
                                'post_type'      => 'post',
                                'posts_per_page' => $instance[ 'post_limit' ],
                                'post_status'    => 'publish',
                                'post__not_in'   => get_option('sticky_posts')
                            );

                            $the_query = new WP_Query($pargs);
                            if ($the_query->have_posts()) {
                                while ($the_query->have_posts()) {
                                    $the_query->the_post(); ?>
                                    <div class="media">
                                        <?php
                                            
                                            $thumb_id = get_post_thumbnail_id(); // Get the featured image id.
                                            $image = wp_get_attachment_image_src($thumb_id, 'materialize-popular-post-thumb'); // Get img URL.
                                            //
                                            if ($instance[ 'thumb' ] == 'yes') {
                                                if (has_post_thumbnail()) { ?>
                                                    <a class="media-left" href="<?php the_permalink(); ?>">
                                                        <img class="recent-post-tab-thumb-image" src="<?php echo esc_url($image[ 0 ]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                                                    </a>
                                            <?php }
                                        } ?>

                                        <div class="media-body">
                                            
                                            <h4>
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h4>
                                            <?php if ($instance[ 'show_meta' ] == 'yes') { ?>
                                                <div class="entry-meta">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <?php printf('<a class="url fn n" href="%1$s">%2$s</a>', esc_url(get_author_posts_url(get_the_author_meta('ID'))), esc_html(get_the_author())) ?>
                                                        </li>
                                                        <li>
                                                            <?php the_time('j M Y'); ?>
                                                        </li>
                                                    </ul>
                                                </div>
                                            <?php } ?>
                                        </div> <!-- /.media-body -->
                                    </div> <!-- /.media -->

                                <?php }

                            } else { ?>

                                <p><?php _e('Post Not Found!', 'tt-pl-textdomain') ?></p>

                            <?php }
                            wp_reset_postdata(); ?>
                    </div>

                    <!-- popular post tab-->
                    <div id="<?php echo $id ?>_tab-2" class="tab-pane fade">
                        <?php
                            $qargs = array(
                                'post_type'      => 'post',
                                'meta_key'       => 'materialize_post_views_count',
                                'posts_per_page' => $instance['post_limit'],
                                'orderby'        => 'meta_value_num',
                                'order'          => 'DESC',
                                'post__not_in'   => get_option( 'sticky_posts' )
                            );

                            $the_query = new WP_Query($qargs);

                            if ($the_query->have_posts()) {
                                while ($the_query->have_posts()) {
                                    $the_query->the_post();
                                    ?>

                                    <div class="media">
                                        <?php 
                                            $thumb_id = get_post_thumbnail_id(); // Get the featured image id.
                                            $image = wp_get_attachment_image_src($thumb_id, 'materialize-popular-post-thumb'); // Get img URL.

                                         if ($instance[ 'thumb' ] == 'yes') {
                                            if (has_post_thumbnail()) { ?>
                                                <a class="media-left" href="<?php the_permalink(); ?>">
                                                    <img class="recent-post-tab-thumb-image" src="<?php echo esc_url($image[ 0 ]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">

                                                </a>
                                            <?php }
                                        } ?>
                                        <div class="media-body">
                                            <h4>
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h4>
                                            <?php if ($instance[ 'post_view' ] == 'yes') { ?>
                                                <span>(<?php echo materialize_get_post_views(get_the_ID()) ?>)</span>
                                            <?php } ?>

                                            <?php if ($instance[ 'show_meta' ] == 'yes') { ?>
                                                <div class="entry-meta">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <?php printf('<a class="url fn n" href="%1$s">%2$s</a>', esc_url(get_author_posts_url(get_the_author_meta('ID'))), esc_html(get_the_author())) ?>
                                                        </li>
                                                        <li>
                                                            <?php the_time('j M Y'); ?>
                                                        </li>
                                                    </ul>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>

                                <?php }
                            }
                            wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
            <?php
            echo $args[ 'after_widget' ];
        }
    }


    // register widgets
    if (!function_exists('tt_popular_post_widget_register')) {
        function tt_popular_post_widget_register() {
            register_widget('TT_Popular_Post_Widget');
        }

        add_action('widgets_init', 'tt_popular_post_widget_register');
    }