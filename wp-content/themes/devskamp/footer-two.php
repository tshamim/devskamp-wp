<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif; ?>

<footer class="footer-section footer-two-wrapper">
    <div class="footer-logo-wrapper text-center">
        <div class="container">
            <div class="footer-logo">
                <?php if (materialize_option('totop-visibility') && materialize_option('totop-style', false, true)): ?>
                    <a href="#home" class="tt-scroll btn-floating btn-large pink back-top waves-effect waves-light tt-animate btt"><i class="fa fa-angle-up"></i></a>
                <?php endif; ?>

                <a href="<?php echo esc_url(site_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>">
                    <img src="<?php echo esc_url(materialize_option('footer-logo', 'url', get_template_directory_uri() . '/images/logo-white.png')); ?>" data-at2x="<?php echo esc_url(materialize_option('footer-retina-logo', 'url', get_template_directory_uri() . '/images/logo-white2x.png')); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"/>
                </a>
            </div> <!-- .footer-logo -->
        </div> <!-- .container -->
    </div> <!-- .footer-logo-wrapper -->

    <div class="footer-copyright">
        <div class="container">
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    <div class="copyright">
                        <?php if (materialize_option('footer-text', false, false)) : ?>
                            <?php echo wp_kses(materialize_option('footer-text'), array(
                                'a'      => array(
                                    'href'   => array(),
                                    'title'  => array(),
                                    'target' => array()
                                ),
                                'br'     => array(),
                                'em'     => array(),
                                'strong' => array(),
                                'ul'     => array(),
                                'li'     => array(),
                                'p'      => array(),
                                'span'   => array(
                                    'class' => array()
                                )
                            )); 
                            
                            else : ?>
                            <?php printf(
                                esc_html__('Copyright &copy; %1$s | %2$s Theme by %3$s | Powered by %4$s', 'materialize'),
                                date('Y'), 
                                esc_html__('Materialize', 'materialize'),
                                "<a href='http://trendytheme.net'>".esc_html__('TrendyTheme', 'materialize')."</a>",
                                "<a href='https://wordpress.org'>".esc_html__('WordPress', 'materialize')."</a>"
                            ); ?>
                        <?php endif; ?>
                    </div> <!-- .copyright -->
                </div> <!-- .col-# -->

                <?php if (materialize_option('social-icon-visibility', false, true)) : ?>
                    <div class="col-sm-6">
                        <div class="social-links-wrap text-right tt-animate ltr">
                            <?php get_template_part('template-parts/social', 'icons');?>
                        </div> <!-- /social-links-wrap -->
                    </div>
                <?php endif; ?>
            </div> <!-- .row -->
        </div> <!-- .container -->
    </div> <!-- .footer-copyright -->
</footer> <!-- .footer-section -->