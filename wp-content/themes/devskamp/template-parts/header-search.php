<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;
?>

<div class="search-wrapper">
    <div class="search-trigger pull-right">
        <div class='search-btn'></div>
        <i class="material-icons">&#xE8B6;</i>
    </div>

    <!-- Modal Search Form -->
    <i class="search-close material-icons">&#xE5CD;</i>
    <div class="search-form-wrapper">
        <form role="search" method="get" class="white-form" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
            <div class="input-field">
                <input type="search" id="header-search-field" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'materialize' ); ?>" />
                <label for="header-search-field"><?php esc_html_e( 'Search Here...', 'materialize' ); ?></label>
            </div>

            <button class="btn pink search-button waves-effect waves-light" type="submit"><i class="material-icons">&#xE8B6;</i></button>

            <?php if (materialize_option( 'tt-search-result', 'post-search') ) : ?>
                <input type="hidden" value="post" name="post_type[]" /> 
            <?php endif;

            if (materialize_option( 'tt-search-result', 'portfolio-search') ) : ?>
                <input type="hidden" value="tt-portfolio" name="post_type[]" /> 
            <?php endif;

            if (! materialize_option( 'tt-search-result', 'post-search') && ! materialize_option( 'tt-search-result', 'portfolio-search')) : ?>
                <input type="hidden" value="post" name="post_type" /> 
            <?php endif; ?>
        </form>
    </div>
</div><!-- /.search-wrapper -->