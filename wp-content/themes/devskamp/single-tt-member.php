<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

$classes = array();
$classes[] = 'clearfix';
$classes[] = 'team-tab';

get_header(); ?>
<div class="page-wrapper single-member-page">
	<div class="container">
		<div class="row">
			<?php while ( have_posts() ) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>
					<div class="col-md-4 col-sm-3">
                        <figure class="team-img text-center">
                            <?php the_post_thumbnail('materialize-members', array('alt'=> get_the_title(), 'class' => 'img-responsive' ));?>
                              	
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
                          </figure>
                      </div><!-- /.col-md-4 -->

                      <div class="col-md-8 col-sm-9">
                          	<div class="team-intro">
                                <?php
                                $team_designation = "";
                                if (function_exists('rwmb_meta')) :
                                    $team_designation = rwmb_meta('materialize_team_designation'); 
                                endif; ?>

                                <h3><?php the_title(); ?> <small><?php echo esc_html($team_designation); ?></small></h3>
                              	<p><?php the_content(); ?></p>
                          	</div>

                          	<div class="team-skill">
                              	<div class="row">
	                                <div class="progress-section">
	                                    <?php if (function_exists("rwmb_meta")) : ?>
	                                        <?php $bartitle = rwmb_meta('materialize_barchart_details');
	                                            if ($bartitle) :
	                                                foreach ($bartitle as $bar) { ?>

	                                                <?php if ($bar[1]): ?>
	                                                	<div class="col-sm-6">
		                                                    <span class="progress-title"><?php echo esc_html($bar[0]); ?></span>
		                                                    <div class="progress">
		                                                        <div class="progress-bar brand-bg six-sec-ease-in-out" role="progressbar" aria-valuenow="<?php echo esc_html($bar[1]); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo esc_html($bar[1]); ?>%;">
		                                                            <span><?php echo esc_html($bar[1]); ?>%</span>
		                                                        </div>
		                                                    </div>
		                                                </div>
	                                                <?php endif; ?>
	                                                
	                                            <?php } 
	                                        endif; 
	                                    endif; ?>     
	                                </div> <!-- progress-section end -->
                              	</div><!-- /.row -->
                          	</div> <!--team-skill end -->
                      </div> <!-- col-md-8 -->
				</div> <!-- #post-# -->
			<?php endwhile; // end of the loop. ?>
		</div> <!-- .row -->

		<div class="row">
			<?php
				$args = array(
					'post_type' => 'tt-member',
					'post_status' => 'publish',
					'posts_per_page' => 4, // you may edit this number
					'orderby' => 'rand',
					'post__not_in' => array ($post->ID)
				);
				$member_post = new WP_Query( $args ); ?>

				<?php if ( $member_post->have_posts() ) : ?>
					<div class="more-member member-wrapper clearfix">
						<div class="section-intro">
							<h2><?php esc_html_e('More Member', 'materialize');?></h2>
						</div>
						<?php while ( $member_post->have_posts() ) : $member_post->the_post(); ?>
							
							<div class="col-md-3 col-sm-6">
		                        <div class="team-wrapper text-center">
		                            <div class="team-img">
		                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('materialize-style-two-member', array('alt'=> get_the_title(), 'class' => 'img-responsive' ));?></a>
		                            </div><!-- /.team-img -->

		                            <div class="team-title">
		                                <?php if (function_exists('rwmb_meta')) :
		                                    $team_name = rwmb_meta('materialize_team_name');
		                                    $team_designation = rwmb_meta('materialize_team_designation');
		                                    if ($team_designation || $team_name ) : ?>
		                                        <h3><a href="<?php the_permalink(); ?>"><?php echo esc_html($team_name); ?></a></h3>
		                                        <span><?php echo esc_html($team_designation); ?></span>
		                                    <?php endif; 
		                                endif; ?>
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
						<?php endwhile; ?>
					</div> <!-- .more-member -->
					<?php wp_reset_postdata(); ?>
				<?php else : ?>
					<p><?php esc_html_e( 'Member not found !', 'materialize' ); ?></p>
				<?php endif; ?>
		</div> <!-- .row -->
	</div> <!-- .container -->
</div><!-- .single-member-page -->

<?php get_footer(); ?>