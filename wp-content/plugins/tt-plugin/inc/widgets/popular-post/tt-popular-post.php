<?php

    //---------------------------------------------------------------------
    // Post view
    //---------------------------------------------------------------------
    if (!function_exists('materialize_set_post_views')) {
        function materialize_set_post_views($postID) {
            $count_key = 'materialize_post_views_count';
            $count = get_post_meta($postID, $count_key, true);
            if($count==''){
                $count = 0;
                delete_post_meta($postID, $count_key);
                add_post_meta($postID, $count_key, '0');
            }else{
                $count++;
                update_post_meta($postID, $count_key, $count);
            }
        }
    }


    if (!function_exists('materialize_get_post_views')) {
        function materialize_get_post_views($postID){
            $count_key = 'materialize_post_views_count';
            $count = get_post_meta($postID, $count_key, true);
            if($count==''){
                delete_post_meta($postID, $count_key);
                add_post_meta($postID, $count_key, '0');
                return 0;
            }
            return $count;
        }
    }


    //---------------------------------------------------------------------
    // Loading widget
    //---------------------------------------------------------------------

    require_once "widget.php";