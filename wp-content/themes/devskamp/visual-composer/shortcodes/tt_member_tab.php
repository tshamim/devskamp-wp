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

            $count = 0;
            $the_query = new WP_Query($args);

            if ( $the_query->have_posts() ) : ?>
                <!-- the loop -->

                <div class="team-tab" role="tabpanel">
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs nav-justified" role="tablist">

                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>                 
                      <li class="<?php echo esc_attr($count == 0 ? 'active' : '' );?>">
                          <a href="#team-<?php echo get_the_ID(); ?>" data-toggle="tab">
                            <?php the_post_thumbnail('materialize-member', array('alt'=> get_the_title(), 'class' => 'img-responsive' ));?>
                          </a>
                      </li>
                    <?php $count++; endwhile; ?> 
                
                  </ul>

                  <!-- Tab panes -->
                  <div class="panel-body">
                    <div class="tab-content">

                      <?php 
                      $quote_count = 0;

                      while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                      <div role="tabpanel" class="tab-pane <?php echo esc_attr($quote_count == 0 ? 'active' : '' ); ?> fade in" id="team-<?php echo get_the_ID(); ?>">
                          <div class="row">
                              <div class="col-md-4 col-sm-3">
                                  <figure class="team-img text-center">
                                      <?php the_post_thumbnail('materialize-members', array('alt'=> get_the_title(), 'class' => 'img-responsive' ));?>

                                      <ul class="team-social-links list-inline">

                                            <?php if(function_exists('rwmb_meta')):
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
                                                <?php endif;
                                            endif; ?>
                                      </ul>
                                  </figure>
                              </div><!-- /.col-md-4 -->

                              <div class="col-md-8 col-sm-9">

                                  <div class="team-intro">
                                        <?php if (function_exists('rwmb_meta')) :
                                            $team_name = rwmb_meta('materialize_team_name');
                                            $team_designation = rwmb_meta('materialize_team_designation');
                                            if ($team_designation and $tt_atts['designation_visibility'] == 'visible-designation' || $team_name and $tt_atts['team_visibility'] == 'visible-name') : ?>
                                                <h3><?php echo esc_html($team_name); ?> <small><?php echo esc_html($team_designation); ?></small></h3>
                                            <?php endif; 
                                        endif; ?>
                                        <?php the_content(); ?>
                                  </div>

                                
                                  <div class="team-skill">
                                      <div class="row">
                                        <div class="progress-section">
                                            <?php if (function_exists("rwmb_meta")) : ?>
                                                <?php $bartitle = rwmb_meta('materialize_barchart_details');
                                                    if ($bartitle) :
                                                        foreach ($bartitle as $bar) { ?>
                                                        <div class="col-sm-6">
                                                            <span class="progress-title"><?php echo esc_html($bar[0]); ?></span>
                                                            <div class="progress">
                                                                <div class="progress-bar brand-bg six-sec-ease-in-out" role="progressbar" aria-valuenow="<?php echo esc_html($bar[1]); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo esc_html($bar[1]); ?>%;">
                                                                    <span><?php echo esc_html($bar[1]); ?>%</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    <?php } 

                                                endif; 

                                            endif; ?>     
                                        </div> <!-- progress-section end -->

                                      </div><!-- /.row -->

                                  </div> <!--team-skill end -->
                              </div> <!-- col-md-8 -->
                          </div> <!-- row -->
                      </div> <!--team-1 end-->

                      <?php $quote_count++;  endwhile; ?>

                    </div> <!--tab-content end -->
                  </div>

                </div> <!--tab-pan end -->               

                <!-- end of the loop -->

            <?php wp_reset_postdata(); ?>

            <?php else : ?>
                <p><?php esc_html_e( 'Member not found !', 'materialize' ); ?></p>
            <?php endif; ?>
        </div><!-- .row -->
    </div><!-- .member-wrapper -->
<?php echo ob_get_clean();