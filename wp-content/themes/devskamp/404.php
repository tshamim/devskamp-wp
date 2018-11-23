<?php 
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

get_header(); ?>
<div class="error-page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-sm-5 col-sm-offset-1">
				<div class="not-found-icon text-center">
					<i class="fa fa-question-circle"></i>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="error-message">
					
					<h2><?php echo esc_html(materialize_option('404_text', false, '404')); ?></h2>
					<span class="error-sub"><?php echo esc_html(materialize_option('404_subtext', false, 'OOPS! PAGE NOT FOUND')); ?></span>
					<p><?php echo esc_html(materialize_option('404_desc', false, 'Sorry, we couldn\'t find the content you were looking for.')); ?></p>
				    <a class="btn waves-effect waves-light" href="<?php echo esc_url(home_url('/'));?>"><i class="fa fa-reply-all"></i><?php echo esc_html( materialize_option('404_button_text', false, 'Go Back Home') ); ?></a>
				</div> <!-- /notfound-page -->
			</div> <!-- .col -->
		</div> <!-- .row -->
	</div><!-- /.container -->
</div> <!-- /.content-wrapper -->
<?php get_footer(); ?>
