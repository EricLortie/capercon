<?php

// like get_post_custom_values but only returns the first item. Handy for CPT elements

if ( ! function_exists('get_post_custom_value')) {
  function get_post_custom_value( $key = '', $post_id = 0 ) {
    if ( !$key )
      return null;

    $custom = get_post_custom($post_id);

    $value = isset($custom[$key]) ? $custom[$key] : null;

    return $value[0];

  }
}


if ( ! function_exists('write_log')) {
   function write_log ( $log )  {
      if ( is_array( $log ) || is_object( $log ) ) {
         error_log( print_r( $log, true ) );
      } else {
         error_log( $log );
      }
   }
}

if ( ! function_exists('parse_social_links')) {
  function parse_social_links ( $urls ) {
    $link_html = "";
    foreach ($urls as $url):

      switch ($url['type']) {
        case 'website':
          $icon = 'fa-link';
          break;
        default:
          $icon = 'fa-'.$url['type'];
      }

      $link_html .= ' | <a class="header-social-link" href="http://'.$url['url'].'" target="_blank"><i class="fa '.$icon.'" aria-hidden="true"></i></a>';

    endforeach;

    return $link_html;
  }
}


/**
 * Add REST API support to an already registered post type.
 */
 add_action( 'init', 'advanced_ads_rest_support', 25 );
 function advanced_ads_rest_support() {
   global $wp_post_types;
   //be sure to set this to the name of your post type!
   $post_type_name = 'advanced_ads';
   if( isset( $wp_post_types[ $post_type_name ] ) ) {
     $wp_post_types[$post_type_name]->show_in_rest = true;
     $wp_post_types[$post_type_name]->rest_base = $post_type_name;
     $wp_post_types[$post_type_name]->rest_controller_class = 'WP_REST_Posts_Controller';
   }

 }
 ?>
