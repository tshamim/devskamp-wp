<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    ob_start();
?>

    <div class="member-wrapper <?php echo esc_attr($tt_atts['el_class'].' '.$css_class); ?>">
        <div class="row">
            <?php 
            $args = array(
               'post_type'      => 'tt-member',
               'posts_per_page' => $tt_atts['post_limit'],
               'post_status'    => 'publish',
               'order'          => $tt_atts['member_order']
            );

            $query = new WP_Query($args);

            if ( $query->have_posts() ) : ?>
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <?php if ($tt_atts['team_style'] == 'team-style-one'): ?>
                        <div class="col-md-3 col-sm-6">
                            <div class="team-wrapper text-center">
                                <div class="team-img">
                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('materialize-member', array('alt'=> get_the_title(), 'class' => 'img-responsive' ));?></a>
                                </div><!-- /.team-img -->

                                <div class="team-title">
                                    <?php if ($tt_atts['team_visibility'] == 'visible-name') : ?>
                                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <?php endif; 

                                    if (function_exists('rwmb_meta') && $tt_atts['designation_visibility'] == 'visible-designation') : ?>
                                        <span><?php echo esc_html(rwmb_meta('materialize_team_designation')); ?></span>
                                    <?php endif; ?>
                                </div><!-- /.team-title -->

                                <?php if (function_exists('rwmb_meta')): ?>
                                    <ul class="team-social-links list-inline">
                                    <?php
                                    $facebook_link = rwmb_meta('materialize_facebook_link');
                                    if ($facebook_link) : ?>
                                        <li>
                                            <a href="<?php echo esc_url($facebook_link); ?>"><i class="fa fa-facebook"></i></a>
                                        </li>
                                    <?php endif; 

                                    $twitter_link = rwmb_meta('materialize_twitter_link');
                                    if ($twitter_link) : ?>
                                        <li>
                                            <a href="<?php echo esc_url($twitter_link); ?>"><i class="fa fa-twitter"></i></a>
                                        </li>
                                    <?php endif; 

                                    $google_plus_link = rwmb_meta('materialize_google_plus_link');
                                    if ($google_plus_link) : ?>
                                        <li>
                                            <a href="<?php echo esc_url($google_plus_link); ?>"><i class="fa fa-google-plus"></i></a>
                                        </li>
                                    <?php endif; 

                                    $linkedin_link = rwmb_meta('materialize_linkedin_link');

                                    if ($linkedin_link) : ?>
                                        <li>
                                            <a href="<?php echo esc_url($linkedin_link); ?>"><i class="fa fa-linkedin"></i></a>
                                        </li>
                                    <?php endif; 

                                    $dribbble_link = rwmb_meta('materialize_dribbble_link');

                                    if ($dribbble_link) : ?>
                                        <li>
                                            <a href="<?php echo esc_url($dribbble_link); ?>"><i class="fa fa-dribbble"></i></a>
                                        </li>
                                    <?php endif; 

                                    $envelope_link = rwmb_meta('materialize_envelope_link');

                                    if ($envelope_link) : ?>
                                        <li>
                                            <a href="<?php echo esc_url($envelope_link); ?>"><i class="fa fa-envelope-o"></i></a>
                                        </li>
                                    <?php endif; ?>
                                  </ul>
                              <?php endif; ?>
                          </div><!-- /.team-wrapper -->
                        </div><!-- /.col-md-3 --> 
                    <?php endif ?> 

                    <?php if ($tt_atts['team_style'] == 'team-style-two'): ?>

                        <div class="col-md-4 col-sm-6">
                            <div class="team-wrapper">
                                <div class="team-img">
                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('materialize-style-two-member', array('alt'=> get_the_title(), 'class' => 'img-responsive' ));?></a>
                                </div><!-- /.team-img -->

                                <div class="team-title">
                                    <?php if ($tt_atts['team_visibility'] == 'visible-name') : ?>
                                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <?php endif; 

                                    if (function_exists('rwmb_meta') && $tt_atts['designation_visibility'] == 'visible-designation') : ?>
                                        <span><?php echo esc_html(rwmb_meta('materialize_team_designation')); ?></span>
                                    <?php endif; ?>

                                    <p>         
                                        <?php
                                            $tt_trim_word = $tt_atts['word_limit'];
                                            $content = get_the_content();
                                            echo wp_trim_words( $content, $tt_trim_word);
                                        ?>
                                    </p>
                                </div><!-- /.team-title -->

                                <?php if (function_exists('rwmb_meta')): ?>
                                    <ul class="team-social-links list-inline text-center">
                                        <?php
                                        $facebook_link = rwmb_meta('materialize_facebook_link');
                                        if ($facebook_link) : ?>
                                            <li>
                                                <a href="<?php echo esc_url($facebook_link); ?>"><i class="fa fa-facebook"></i></a>
                                            </li>
                                        <?php endif; 

                                        $twitter_link = rwmb_meta('materialize_twitter_link');
                                        if ($twitter_link) : ?>
                                            <li>
                                                <a href="<?php echo esc_url($twitter_link); ?>"><i class="fa fa-twitter"></i></a>
                                            </li>
                                        <?php endif; 

                                        $google_plus_link = rwmb_meta('materialize_google_plus_link');
                                        if ($google_plus_link) : ?>
                                            <li>
                                                <a href="<?php echo esc_url($google_plus_link); ?>"><i class="fa fa-google-plus"></i></a>
                                            </li>
                                        <?php endif; 

                                        $linkedin_link = rwmb_meta('materialize_linkedin_link');

                                        if ($linkedin_link) : ?>
                                            <li>
                                                <a href="<?php echo esc_url($linkedin_link); ?>"><i class="fa fa-linkedin"></i></a>
                                            </li>
                                        <?php endif; 

                                        $dribbble_link = rwmb_meta('materialize_dribbble_link');

                                        if ($dribbble_link) : ?>
                                            <li>
                                                <a href="<?php echo esc_url($dribbble_link); ?>"><i class="fa fa-dribbble"></i></a>
                                            </li>
                                        <?php endif; 

                                        $envelope_link = rwmb_meta('materialize_envelope_link');

                                        if ($envelope_link) : ?>
                                            <li>
                                                <a href="<?php echo esc_url($envelope_link); ?>"><i class="fa fa-envelope-o"></i></a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                <?php endif; ?>
                            </div><!-- /.team-wrapper -->
                        </div><!-- /.col-md-4 -->
                    <?php endif ?>                                    
                <?php endwhile; ?>

            <?php wp_reset_postdata(); ?>

            <?php else : ?>
                <p><?php esc_html_e( 'Member not found !', 'materialize' ); ?></p>
            <?php endif; ?>
        </div><!-- .row -->
    </div><!-- .member-wrapper -->
<?php echo ob_get_clean();