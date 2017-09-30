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
    if($urls != ''){

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
    }

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




 add_action( 'rest_api_init', 'register_ad_route', 10 );

 function register_ad_route() {
     register_rest_route( 'wp/v2', '/get_random_ads', array(
         array(
             'methods'  => WP_REST_Server::READABLE,
             'callback' => 'get_random_ads',
         ),
     ) );
 }

  function get_random_ads( WP_REST_Request $request ) {
    $filter = $request->get_param( 'filter' );
    $data   = array();

    $args = array(
      'posts_per_page' => 3,
      'post_type'      => 'advanced_ads',
      'orderby'        => 'rand',
      'tax_query' => array(
          array(
              'taxonomy' => 'advanced_ads_groups',
              'field'    => 'slug',
              'terms'    => 'mobile'
          )
      )
    );

    if ( is_array( $filter ) && array_key_exists( 'category', $filter ) ) {
       $args['category_name'] = $filter['category'];
    }

    $ads = get_posts( $args );

    //write_log($ads);
    if ( ! empty( $ads ) ) {

      foreach( $ads as $ad ) {
        $img = end(get_attached_media('image', $ad->ID));
        $data['name'] = $ad->post_title;
        $img_uri = $img->guid;
        $img_uri = str_replace( 'http', 'https', $img_uri );
        $data['img_url'] = (strpos($img_uri, 'https:') !== false) ? $img_uri : "https://" . $img_uri;
        $data['slug'] = $ad->slug;
        $meta = get_post_meta( $ad->ID, 'advanced_ads_ad_options', true );
        $ad_url = $meta['tracking']['link'];
        $data['ad_url'] = (strpos($ad_url, 'http') !== false) ? $ad_url : "http://" . $ad_url;
        $ad_data[] = $data;
      }
    }

    return $ad_data;
 }


  add_action( 'rest_api_init', 'register_panels_route', 10 );

  function register_panels_route() {
      register_rest_route( 'wp/v2', '/panels', array(
          array(
              'methods'  => WP_REST_Server::READABLE,
              'callback' => 'get_panels',
          ),
      ) );
  }

   function get_panels( WP_REST_Request $request ) {
     $filter = $request->get_param( 'filter' );
     $data   = array();

     $args = array(
       'posts_per_page'	=> -1,
       'post_type'			=> 'marcato_contact',
       'category_name'   => 'panels'
     );

     if ( is_array( $filter ) && array_key_exists( 'category', $filter ) ) {
        $args['category_name'] = $filter['category'];
     }

     $posts = get_posts( $args );
     $post_data = [];
     if ( ! empty( $posts ) ) {

       foreach( $posts as $post ) {
         $data['slug'] = $post->post_name;
         $data['name'] = $post->post_title;
         $meta_fields = get_post_meta($post->ID);
         $data['panel_promotion'] = $meta_fields['marcato_contact_custom_field_Panel Fields_Brief Description of Panel'][0];
         $data['panel_name'] = $meta_fields['marcato_contact_custom_field_Panel Fields_Name of Panel'][0];
         $data['panel_host_name'] = $meta_fields['marcato_contact_name'][0];
         $data['panel_type'] = $meta_fields['marcato_contact_custom_field_Panel Fields_Type of Panel'][0];
         $data['photo_url'] = "";
         $img_uri = $meta_fields['marcato_contact_photo_url'][0];
         $post_data[] = $data;
       }
     }

     return $post_data;
  }


   add_action( 'rest_api_init', 'register_gaming_route', 10 );

   function register_gaming_route() {
       register_rest_route( 'wp/v2', '/gaming', array(
           array(
               'methods'  => WP_REST_Server::READABLE,
               'callback' => 'get_gaming',
           ),
       ) );
   }

  function get_gaming( WP_REST_Request $request ) {
    $filter = $request->get_param( 'filter' );
    $data   = array();

    $args = array(
      'posts_per_page'	=> -1,
      'post_type'			=> 'marcato_contact',
      'category_name'   => 'gaming'
    );

    if ( is_array( $filter ) && array_key_exists( 'category', $filter ) ) {
       $args['category_name'] = $filter['category'];
    }

    $posts = get_posts( $args );

    return $posts;
 }

   add_action( 'rest_api_init', 'register_vendors_route', 10 );

   function register_vendors_route() {
       register_rest_route( 'wp/v2', '/vendors', array(
           array(
               'methods'  => WP_REST_Server::READABLE,
               'callback' => 'get_vendors',
           ),
       ) );
   }

    function get_vendors( WP_REST_Request $request ) {
      $filter = $request->get_param( 'filter' );
      $data   = array();

      $args = array(
        'posts_per_page'	=> -1,
        'post_type'			=> 'marcato_vendor',
        'category_name'   => 'vendor'
      );

      if ( is_array( $filter ) && array_key_exists( 'category', $filter ) ) {
         $args['category_name'] = $filter['category'];
      }

      $posts = get_posts( $args );

      return $posts;
   }

   add_action( 'rest_api_init', 'register_artists_route', 10 );

   function register_artists_route() {
       register_rest_route( 'wp/v2', '/artists', array(
           array(
               'methods'  => WP_REST_Server::READABLE,
               'callback' => 'get_artists',
           ),
       ) );
   }

    function get_artists( WP_REST_Request $request ) {
      $filter = $request->get_param( 'filter' );
      $data   = array();

      $args = array(
        'posts_per_page'	=> -1,
        'post_type'			=> 'marcato_vendor',
        'category_name'   => 'artists'
      );

      if ( is_array( $filter ) && array_key_exists( 'category', $filter ) ) {
         $args['category_name'] = $filter['category'];
      }

      $posts = get_posts( $args );

      return $posts;
   }




 ?>
