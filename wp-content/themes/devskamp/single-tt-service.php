<?php 
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

get_header(); ?>

<div class="page-wrapper content-wrapper">
	
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="single-service-page">
			<div class="container">
				<?php the_post_thumbnail( 'materialize-gallery-thumbnail', array( 'class' => 'img-responsive', 'alt' => materialize_alt_text())); ?>
			</div> <!-- .container -->
			
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</div>
	<?php endwhile; // End of the loop. ?>

</div> <!-- .content-wrapper -->
<?php get_footer(); ?>