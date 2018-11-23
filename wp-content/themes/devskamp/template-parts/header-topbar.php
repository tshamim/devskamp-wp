<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;
?>

<div class="header-top-wrapper top-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if (materialize_option('header-social-button')): ?>
                    <div class="social-links-wrap pull-left social-top tt-animate btt">
                        <?php get_template_part('template-parts/social', 'icons');?>
                    </div> <!-- /social-links-wrap -->
                <?php endif ?>
                
                <?php if (materialize_option('header-contact')) : ?>
                    <div class="contact-info pull-right hidden-xs">
                        <?php echo wp_kses(materialize_option('header-contact', false, true), array(
                            'a'  => array(
                                'href'   => array(),
                                'title'  => array(),
                                'target' => array()
                            ),
                            'br' => array(),
                            'i'  => array('class' => array()),
                            'ul' => array('class' => array()),
                            'li' => array(),
                        )); ?>
                    </div>
                <?php endif; ?>
            </div> <!-- .col-md-12 -->
        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .header-top-wrapper -->