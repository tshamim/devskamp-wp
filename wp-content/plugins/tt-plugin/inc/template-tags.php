<?php


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Page break pagination
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('materialize_link_pages')) :

    function materialize_link_pages($args = '') {
        $defaults = array(
            'before'           => '',
            'after'            => '',
            'link_before'      => '',
            'link_after'       => '',
            'next_or_number'   => 'number',
            'nextpagelink'     => esc_html__('Next page', 'materialize'),
            'previouspagelink' => esc_html__('Previous page', 'materialize'),
            'pagelink'         => '%',
            'echo'             => 1
        );

        $r = wp_parse_args($args, $defaults);
        $r = apply_filters('wp_link_pages_args', $r);
        extract($r, EXTR_SKIP);

        global $page, $numpages, $multipage, $more, $pagenow;

        $output = '';
        if ($multipage) {
            if ('number' == $next_or_number) {
                $output .= $before . '<ul class="pagination">';
                $laquo = $page == 1 ? 'class="disabled"' : '';
                $output .= '<li ' . $laquo . '>' . _wp_link_page($page - 1) . '&laquo; </a></li>';
                for ($i = 1; $i < ($numpages + 1); $i = $i + 1) {
                    $j = str_replace('%', $i, $pagelink);

                    if (($i != $page) || ((!$more) && ($page == 1))) {
                        $output .= '<li>';
                        $output .= _wp_link_page($i);
                    } else {
                        $output .= '<li class="active">';
                        $output .= _wp_link_page($i);
                    }
                    $output .= $link_before . $j . $link_after;

                    $output .= '</a></li>';
                }
                $raquo = $page == $numpages ? 'class="disabled"' : '';
                $output .= '<li ' . $raquo . '>' . _wp_link_page($page + 1) . '&raquo;</a></li>';
                $output .= '</ul>' . $after;
            } else {
                if ($more) {
                    $output .= $before . '<ul class="pager">';
                    $i = $page - 1;
                    if ($i && $more) {
                        $output .= '<li class="previous">' . _wp_link_page($i);
                        $output .= $link_before . $previouspagelink . $link_after . '</li>';
                    }
                    $i = $page + 1;
                    if ($i <= $numpages && $more) {
                        $output .= '<li class="next">' . _wp_link_page($i);
                        $output .= $link_before . $nextpagelink . $link_after . '</a></li>';
                    }
                    $output .= '</ul>' . $after;
                }
            }
        }

        if ($echo) {
            echo $output;
        } else {
            return $output;
        }
    }
endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Comment form
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('materialize_comment_form')) :

    function materialize_comment_form($args = array(), $post_id = NULL) {
        if (NULL === $post_id) {
            $post_id = get_the_ID();
        } else {
            $id = $post_id;
        }

        $commenter = wp_get_current_commenter();
        $user = wp_get_current_user();
        $user_identity = $user->exists() ? $user->display_name : '';

        if (!isset($args[ 'format' ])) {
            $args[ 'format' ] = current_theme_supports('html5', 'comment-form') ? 'html5' : 'xhtml';
        }

        $req = get_option('require_name_email');
        $aria_req = ($req ? " aria-required='true'" : '');
        $html5 = 'html5' === $args[ 'format' ];
        $fields = array(
            'author' => '
            <div class="form-group">
                <div class="col-sm-6 comment-form-author input-field">
                    <input id="author" name="author" type="text"
                    value="" ' . $aria_req . ' />
                    <label for="author">' . esc_html__('Your Name*','materialize') . '</label>
                </div>',
            'email'  => '<div class="col-sm-6 comment-form-email input-field">
                <input id="email" name="email" ' . ($html5 ? 'type="email"' : 'type="text"') . '
                value="" ' . $aria_req . ' />
                <label for="email">' . esc_html__('Your Email*','materialize') . '</label>
            </div>
        </div>',
            'url'    => '<div class="form-group">
        <div class=" col-sm-12 comment-form-url input-field">' .
                '<input id="url" name="url" ' . ($html5 ? 'type="url"' : 'type="text"') . ' value=""  />
                <label for="url">' . esc_html__('Your Website','materialize') . '</label>
        </div></div>',

        );

        $required_text = sprintf(' ' . esc_html__('Required fields are marked %s', 'materialize'), '<span class="required">*</span>');
        $defaults = array(
            'fields'               => apply_filters('comment_form_default_fields', $fields),
            'comment_field'        => '
            <div class="form-group comment-form-comment">
                <div class="col-sm-12">

                  <div class="input-field">
                    <textarea name="comment" id="comment" class="materialize-textarea"  rows="8" aria-required="true"></textarea>
                    <label for="comment">' . esc_html__('Your Comment','materialize') . '</label>
                  </div>

                </div>
            </div>
            ',
            'must_log_in'          => '
            
            <div class="alert alert-danger must-log-in">' 
            . sprintf( wp_kses( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'materialize' ), array( 'a' => array( 'href' => array() ) ) ), wp_login_url( apply_filters( 'the_permalink', esc_url( get_permalink( $post_id ) ) ) ) ) . '</div>',
            'logged_in_as'         => '<div class="alert alert-info logged-in-as">' . sprintf( wp_kses( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'materialize' ), array( 'a' => array( 'href' => array() ) ) ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', esc_url( get_permalink( $post_id ) ) ) ) ) . '</div>',
            'comment_notes_before' => '<div class="alert alert-info comment-notes">' . esc_html__( 'Your email address will not be published.', 'materialize' ) . ( $req ? $required_text : '' ) . '</div>',
            'comment_notes_after'  => '<div class="form-allowed-tags">' . sprintf( wp_kses( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s', 'materialize' ), array( 'abbr' => array( 'title' => array() ) ) ), ' <code>' . allowed_tags() . '</code>' ) . '</div>',
            'id_form'              => 'commentform',
            'id_submit'            => 'submit',
            'title_reply'          => esc_html__( 'Leave a Reply', 'materialize' ),
            'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'materialize' ),
            'cancel_reply_link'    => esc_html__( 'Cancel reply', 'materialize' ),
            'label_submit'         => esc_html__( 'Submit', 'materialize' ),
            'format'               => 'xhtml',
        );

        $args = wp_parse_args($args, apply_filters('comment_form_defaults', $defaults));

        if (comments_open($post_id)) {
            ?>
            <?php do_action('comment_form_before'); ?>
            <div id="respond" class="comment-respond">
                <h3 id="reply-title" class="comment-reply-title">
                    <?php comment_form_title($args[ 'title_reply' ], $args[ 'title_reply_to' ]); ?>
                    <small><?php cancel_comment_reply_link($args[ 'cancel_reply_link' ]); ?></small>
                </h3>

                <?php if (get_option('comment_registration') && !is_user_logged_in()) { ?>
                    <?php echo $args[ 'must_log_in' ]; ?>
                    <?php do_action('comment_form_must_log_in_after'); ?>
                <?php } else { ?>
                    <form action="<?php echo site_url('/wp-comments-post.php'); ?>" method="post"
                          id="<?php echo esc_attr($args[ 'id_form' ]); ?>"
                          class="form-horizontal comment-form"<?php echo esc_attr($html5 ? ' novalidate' : ''); ?>
                          role="form">
                        <?php do_action('comment_form_top'); ?>
                        <?php if (is_user_logged_in()) { ?>
                            <?php echo apply_filters('comment_form_logged_in', $args[ 'logged_in_as' ], $commenter, $user_identity); ?>
                            <?php do_action('comment_form_logged_in_after', $commenter, $user_identity); ?>
                        <?php } else { ?>
                            <?php echo $args[ 'comment_notes_before' ]; ?>
                            <?php
                            do_action('comment_form_before_fields');
                            foreach ((array) $args[ 'fields' ] as $name => $field) {
                                echo apply_filters("comment_form_field_{$name}", $field) . "\n";
                            }
                            do_action('comment_form_after_fields');
                        }

                            echo apply_filters('comment_form_field_comment', $args[ 'comment_field' ]);

                            echo $args[ 'comment_notes_after' ]; ?>

                        <div class="form-submit">
                            <input class="btn btn-primary" name="submit" type="submit"
                                   id="<?php echo esc_attr($args[ 'id_submit' ]); ?>"
                                   value="<?php echo esc_attr($args[ 'label_submit' ]); ?>"/>
                            <?php comment_id_fields($post_id); ?>
                        </div>
                        <?php do_action('comment_form', $post_id); ?>
                    </form>
                <?php } ?>
            </div><!-- #respond -->
            <?php do_action('comment_form_after'); ?>
        <?php } else { ?>
            <?php do_action('comment_form_comments_closed'); ?>
        <?php } ?>
    <?php
    }
endif;