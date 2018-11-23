<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    ob_start();

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );
?>

<div class="shop-category-wrapper <?php echo esc_attr($tt_atts['el_class'].' '.$css_class); ?>">
    <?php if ($tt_atts['title']): ?>
        <h2><i class="fa fa-align-right"></i><?php echo esc_html($tt_atts['title']); ?></h2>
    <?php endif; ?>

    <ul>
        <?php
            $taxonomy     = 'product_cat';
            $orderby      = 'name';
            $show_count   = 0;      // 1 for yes, 0 for no
            $pad_counts   = 0;      // 1 for yes, 0 for no
            $hierarchical = 1;      // 1 for yes, 0 for no  
            $title        = '';
            $empty        = 0;

            $args = array(
                 'taxonomy'     => $taxonomy,
                 'orderby'      => $orderby,
                 'show_count'   => $show_count,
                 'pad_counts'   => $pad_counts,
                 'hierarchical' => $hierarchical,
                 'title_li'     => $title,
                 'hide_empty'   => $empty
            );
            $all_categories = get_categories( $args );
            
            foreach ($all_categories as $cat) :
                if($cat->category_parent == 0) :
                    $category_id = $cat->term_id;

                    $args2 = array(
                        'taxonomy'     => $taxonomy,
                        'child_of'     => 0,
                        'parent'       => $category_id,
                        'orderby'      => $orderby,
                        'show_count'   => $show_count,
                        'pad_counts'   => $pad_counts,
                        'hierarchical' => $hierarchical,
                        'title_li'     => $title,
                        'hide_empty'   => $empty
                    );
                    $sub_cats = get_categories( $args2 );

                    $cat_parent = ($sub_cats ? 'has-child-category parent-category' : '');

                    echo '<li class="'.esc_attr($cat_parent).'">';
                    echo '<a href="'. get_term_link($cat->slug, 'product_cat') .'">'. esc_html($cat->name) .'</a>';

                        if($sub_cats) :
                            echo '<ul class="child-category">';
                                foreach($sub_cats as $sub_category) {
                                    echo '<li>';
                                    echo '<a href="'. get_term_link($sub_category->slug, 'product_cat') .'">'. esc_html($sub_category->name) .'</a>';
                                    echo '</li>';
                                }
                            echo '</ul>';
                        endif;
                    echo '</li>';
                endif;      
            endforeach;
        ?>
    </ul>
</div> <!-- .shop-category-wrapper -->
<?php echo ob_get_clean();