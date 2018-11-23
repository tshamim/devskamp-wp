<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;
?>

<a href="<?php echo esc_url(site_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>">
    <?php
    if (materialize_option('logo-type', false, true)) : 

        $fallback_logo = get_template_directory_uri() . '/images/logo.png';
        $fallback_retina_logo = get_template_directory_uri() . '/images/logo2x.png';

        $default_logo = materialize_option('logo', 'url', $fallback_logo);
        $default_ratina_logo = materialize_option('retina-logo', 'url', $fallback_retina_logo);
        
        // site logo
        $site_logo = $default_logo;
        $site_mobile_logo = $default_logo;
        $site_sticky_logo = $default_logo;
        $site_sticky_mobile_logo = $default_logo;

        // site retina logo
        $site_retina_logo = $default_ratina_logo;
        $site_retina_mobile_logo = $default_ratina_logo;
        $site_retina_sticky_logo = $default_ratina_logo;
        $site_retina_sticky_mobile_logo = $default_ratina_logo;

        // mobile logo
        if (materialize_option('mobile-logo', 'url')) :
            $site_mobile_logo = materialize_option('mobile-logo', 'url', $fallback_logo);
        endif;

        if (materialize_option('retina-mobile-logo', 'url')) :
            $site_retina_mobile_logo = materialize_option('retina-mobile-logo', 'url', $fallback_retina_logo);
        endif;

        // Sticky logo
        if (materialize_option('sticky-logo', 'url')) :
            $site_sticky_logo = materialize_option('sticky-logo', 'url', $fallback_logo);
        endif;

        if (materialize_option('retina-sticky-logo', 'url')) :
            $site_retina_sticky_logo = materialize_option('retina-sticky-logo', 'url', $fallback_retina_logo);
        endif;

        // Sticky Mobile
        if (materialize_option('sticky-mobile-logo', 'url')) :
            $site_sticky_mobile_logo = materialize_option('sticky-mobile-logo', 'url', $fallback_logo);
        endif;

        if (materialize_option('retina-sticky-mobile-logo', 'url')) :
            $site_retina_sticky_mobile_logo = materialize_option('retina-sticky-mobile-logo', 'url', $fallback_retina_logo);
        endif; 

        if (function_exists('rwmb_meta') && rwmb_meta('materialize_page_logo', 'type=image_advanced')) :
            $page_logo = rwmb_meta('materialize_page_logo', 'type=image_advanced');
            foreach ($page_logo as $logo) : 
                $img_src = wp_get_attachment_image_src( $logo['ID'], 'full');
            ?>
                <img class="site-logo hidden-xs" src="<?php echo esc_url($img_src['0']) ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"/>
            <?php endforeach; ?>
        <?php else : ?>
            <img class="site-logo hidden-xs" src="<?php echo esc_url($site_logo) ?>" data-at2x="<?php echo esc_url($site_retina_logo) ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"/>
        <?php endif;


        if (function_exists('rwmb_meta') && rwmb_meta('materialize_page_mobile_logo', 'type=image_advanced')) :
            $page_mobile_logo = rwmb_meta('materialize_page_mobile_logo', 'type=image_advanced');
            foreach ($page_mobile_logo as $logo) : 
                $img_src = wp_get_attachment_image_src( $logo['ID'], 'full');
            ?>
                <img class="mobile-logo visible-xs" src="<?php echo esc_url($img_src['0']) ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"/>
            <?php endforeach; ?>
        <?php else : ?>
            <img class="mobile-logo visible-xs" src="<?php echo esc_url($site_mobile_logo) ?>" data-at2x="<?php echo esc_url($site_retina_mobile_logo) ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"/>
        <?php endif; 

        
        if (function_exists('rwmb_meta') && rwmb_meta('materialize_page_sticky_logo', 'type=image_advanced')) :
            $page_sticky_logo = rwmb_meta('materialize_page_sticky_logo', 'type=image_advanced');
            foreach ($page_sticky_logo as $logo) : 
                $img_src = wp_get_attachment_image_src( $logo['ID'], 'full');
            ?>
                <img class="sticky-logo" src="<?php echo esc_url($img_src['0']) ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"/>
            <?php endforeach; ?>
        <?php else : ?>
            <?php if (materialize_option('sticky-logo', 'url')): ?>
                <img class="sticky-logo" src="<?php echo esc_url($site_sticky_logo) ?>" data-at2x="<?php echo esc_url($site_retina_sticky_logo) ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"/>
            <?php endif; ?>
        <?php endif;


        if (function_exists('rwmb_meta') && rwmb_meta('materialize_page_mobile_sticky_logo', 'type=image_advanced')) :
            $page_mobile_sticky_logo = rwmb_meta('materialize_page_mobile_sticky_logo', 'type=image_advanced');
            foreach ($page_mobile_sticky_logo as $logo) : 
                $img_src = wp_get_attachment_image_src( $logo['ID'], 'full');
            ?>
                <img class="sticky-mobile-logo" src="<?php echo esc_url($img_src['0']) ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"/>
            <?php endforeach; ?>
        <?php else : ?>
            <?php if (materialize_option('sticky-mobile-logo', 'url')): ?>
                <img class="sticky-mobile-logo" src="<?php echo esc_url($site_sticky_mobile_logo) ?>" data-at2x="<?php echo esc_url($site_retina_sticky_mobile_logo) ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"/>
            <?php endif; ?>
        <?php endif; ?>

    <?php else : ?>
        <?php if (materialize_option('text-logo')) :
            echo esc_html(materialize_option('text-logo'));
        else :
            echo esc_html(get_bloginfo('name'));
        endif;
        ?>
    <?php endif; ?>
</a>