<?php

/*
Template Name: Login and Register
*/

if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

get_header(); ?>

    <?php if (!is_user_logged_in()): ?>
    
    	<div class="login-wrapper">
            <div class="card-wrapper"></div>
            <div class="card-wrapper">
                <h2 class="title"><?php esc_html_e('Login', 'materialize');?></h2>

                <!-- login form -->
                <form id="login" class="ajax-auth" action="login" method="post">

                    <p class="status"></p>  
                    <?php wp_nonce_field('ajax-login-nonce', 'security'); ?>
                    
                    <!-- user name -->
                    <div class="input-container">
                        <input class="required" type="text" id="username" name="username" required="required" autocomplete="off" />
                        <label for="username"><?php esc_html_e('Username', 'materialize');?></label>
                        <div class="bar"></div>
                    </div>
                    
                    <!-- password -->
                    <div class="input-container">
                        <input class="required" type="password" id="password" name="password" required="required" autocomplete="off" />
                        <label for="password"><?php esc_html_e('Password', 'materialize');?></label>
                        <div class="bar"></div>
                    </div>

                    <div class="button-container">
                        <button class="submit_button btn btn-lg btn-block waves-effect waves-light" type="submit"><?php esc_html_e('LOGIN', 'materialize');?></button>
                    </div>
                    <div class="footer"><a href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Forgot your password?', 'materialize');?></a></div>  
                </form>
            </div> <!-- .card-wrapper -->

            <div class="card-wrapper alt">
                <div class="toggle"></div>
                <h2 class="title"><?php esc_html_e('Register', 'materialize');?>
                  <div class="close"></div>
                </h2>

                <!-- register form -->

                <form id="register" class="ajax-auth"  action="register" method="post">
                    
                    <p class="status"></p>
                    <?php wp_nonce_field('ajax-register-nonce', 'signonsecurity'); ?>
                    
                    <div class="input-container">
                        <input class="required" type="text" id="signonname" name="signonname" required="required" autocomplete="off" />
                        <label for="signonname"><?php esc_html_e('Username', 'materialize');?></label>
                        <div class="bar"></div>
                    </div>

                    <div class="input-container">
                        <input class="required email" type="email" id="email" name="email" required="required" autocomplete="off" />
                        <label for="email"><?php esc_html_e('Email', 'materialize');?></label>
                        <div class="bar"></div>
                    </div>

                    <div class="input-container">
                        <input class="required" type="password" id="signonpassword" name="signonpassword" required="required" autocomplete="off" />
                        <label for="signonpassword"><?php esc_html_e('Password', 'materialize');?></label>
                        <div class="bar"></div>
                    </div>

                    <div class="input-container">
                        <input class="required" type="password" id="password2" name="password2" required="required" autocomplete="off" />
                        <label for="password2"><?php esc_html_e('Repeat Password', 'materialize');?></label>
                        <div class="bar"></div>
                    </div>
                    <div class="button-container">
                        <button class="submit_button btn btn-lg btn-block waves-effect waves-light" type="submit"><?php esc_html_e('SIGNUP', 'materialize');?></button>
                    </div>
                    
                </form>
            </div> <!-- .card-wrapper -->
        </div> <!-- .login-wrapper -->

    <?php endif; ?>

<?php get_footer(); ?>