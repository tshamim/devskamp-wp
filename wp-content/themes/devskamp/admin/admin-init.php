<?php
	
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
	//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // Getting theme option data
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

    if ( !function_exists('materialize_option')) :
        
        function materialize_option($index = FALSE, $index2 = FALSE, $default = NULL) {
            global $materialize_theme_option;

            if (empty($index)) {
                return $materialize_theme_option;
            }

            if ($index2) {
                $result = (isset($materialize_theme_option[ $index ]) and isset($materialize_theme_option[ $index ][ $index2 ])) ? $materialize_theme_option[ $index ][ $index2 ] : $default;
            } else {
                $result = isset($materialize_theme_option[ $index ]) ? $materialize_theme_option[ $index ] : $default;
            }

            if ($result == '1' or $result == '0') {
                return $result;
            }

            if (is_string($result) and empty($result)) {
                return $default;
            }

            return $result;
        }

    endif;

    // Load the TGM init if it exists
    require get_template_directory() . "/required-plugins/index.php";

    // Load the themes options
    require get_template_directory() . "/admin/theme-options-config.php";