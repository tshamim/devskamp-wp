<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;
?>

<div class="post-share">
	<ul class="list-inline">
		

		<?php if ( materialize_option( 'tt-share-button', 'facebook', true ) ) : ?>
			<!--Facebook-->
			<li>
				<a class="facebook" href="//www.facebook.com/sharer.php?u=<?php echo rawurlencode( get_the_permalink() ) ?>&amp;t=<?php echo rawurlencode( get_the_title() ) ?>" title="<?php esc_html_e( 'Share on Facebook!', 'materialize' ); ?>" target="_blank" title="Share on Facebook" ><i class="fa fa-facebook"></i></a>
			</li>
		<?php endif; ?>

		<?php if ( materialize_option( 'tt-share-button', 'twitter', true ) ) : ?>
			<!--Twitter-->
			<li>
				<a class="twitter" href="//twitter.com/home?status=<?php echo rawurlencode( sprintf( esc_html__( 'Reading: %s', 'materialize' ), get_the_permalink() ) ) ?>" title="<?php esc_html_e( 'Share on Twitter!', 'materialize' ); ?>" target="_blank" title="Share on Twitter" ><i class="fa fa-twitter"></i></a>
			</li>
		<?php endif; ?>

		<?php if ( materialize_option( 'tt-share-button', 'google', true ) ) : ?>
			<!--Google Plus-->
			<li>
				<a class="google-plus" href="//plus.google.com/share?url=<?php echo rawurlencode( get_the_permalink() ) ?>" title="<?php esc_html_e( 'Share on Google+!', 'materialize' ); ?>" target="_blank" title="Share on Google Plus" ><i class="fa fa-google-plus"></i></a>
			</li>
		<?php endif; ?>

		<?php if ( materialize_option( 'tt-share-button', 'linkedin', true ) ) : ?>
			<!--Linkedin-->
			<li>
				<a class="linkedin" href="//www.linkedin.com/shareArticle?url=<?php echo rawurlencode( get_the_permalink() ) ?>&amp;mini=true&amp;title=<?php echo rawurlencode( get_the_title() ) ?>" title="<?php esc_html_e( 'Share on Linkedin!', 'materialize' ); ?>" target="_blank" title="Share on Linkedin" ><i class="fa fa-linkedin"></i></a>
			</li>
		<?php endif; ?>
	</ul>
</div> <!-- .post-share -->
