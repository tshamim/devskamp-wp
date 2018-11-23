<?php 
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

get_header(); ?>

<div class="page-wrapper content-wrapper">
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="container">
			<div class="job-details-wrapper">
				<?php the_content(); ?>
			</div>
		</div> <!-- .container -->
	<?php endwhile; // End of the loop. ?>
</div> <!-- .content-wrapper -->
<?php get_footer(); ?>