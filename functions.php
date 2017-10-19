<?php


function child_eventstation_header() {
	$hide_header = ot_get_option( 'hide_header' );
	$default_header_layout = ot_get_option( 'default_header_layout' );

	if( !$hide_header == 'off' or $hide_header == 'on' ) {
		if ( is_page() or is_single() ) {
			global $post;
			$header_style = get_post_meta( $post->ID, 'header_layout_select_meta_box_text', true);
			$header_status = get_post_meta( $post->ID, 'header_status', true);
		}
		else {
			$header_style = "";
			$header_status = "";
		}

		function eventstation_headerstyle1() {
			if ( is_page() or is_single() ) {
				global $post;
				$menu_slot_select = get_post_meta( $post->ID, 'alternative_menu_slot_select', true);
			}
			else {
				$menu_slot_select = "";
			}

			if ( $menu_slot_select == "menuslot1" ) {
				$menu_location = 'menuslot1';
			} elseif ( $menu_slot_select == "menuslot2" ) {
				$menu_location = "menuslot2";
			} else {
				$menu_location = "mainmenu";
			}
		?>
			<div class="header-wrapper header-default">
				<div class="container-fluid">
					<header class="header">
						<?php eventstation_site_logo(); ?>
						<?php eventstation_site_logo_alternative(); ?>
						<?php eventstation_header_search(); ?>
						<div class="menu-area">
							<nav class="navbar">
								<div class="navbar-header">
								  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
									<span class="sr-only"><?php echo esc_html__( 'Toggle Navigation', 'eventstation' ); ?></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								  </button>
								</div>
								<?php wp_nav_menu( array( 'menu' => esc_attr( $menu_location ), 'theme_location' => esc_attr( $menu_location ), 'depth' => 5, 'container' => 'div', 'container_class' => 'collapse navbar-collapse', 'container_id' => 'bs-example-navbar-collapse-1', 'menu_class' => 'nav navbar-nav', 'fallback_cb' => 'eventstation_walker::fallback', 'walker' => new eventstation_walker()) ); ?>

								<?php wp_nav_menu( array( 'menu' => esc_attr( 'Submenu' ), 'theme_location' => esc_attr( 'menuslot1' ), 'depth' => 5, 'container' => 'div', 'container_class' => 'collapse navbar-collapse', 'container_id' => 'bs-example-navbar-collapse-1', 'menu_class' => 'nav navbar-nav', 'fallback_cb' => 'eventstation_walker::fallback', 'walker' => new eventstation_walker()) ); ?>
							</nav>
						</div>
					</header>
				</div>
			</div>
		<?php
		}

		function eventstation_headerstyle2() {
			if ( is_page() or is_single() ) {
				global $post;
				$menu_slot_select = get_post_meta( $post->ID, 'alternative_menu_slot_select', true);
			}
			else {
				$menu_slot_select = "";
			}

			if ( $menu_slot_select == "menuslot1" ) {
				$menu_location = 'menuslot1';
			} elseif ( $menu_slot_select == "menuslot2" ) {
				$menu_location = "menuslot2";
			} else {
				$menu_location = "mainmenu";
			}
		?>
			<div class="header-wrapper header-alternative">
				<div class="container-fluid">
					<header class="header">
						<?php eventstation_site_logo(); ?>
						<?php eventstation_site_logo_alternative(); ?>
						<?php eventstation_header_search(); ?>
						<div class="menu-area">
							<nav class="navbar">
								<div class="navbar-header">
								  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
									<span class="sr-only"><?php echo esc_html__( 'Toggle Navigation', 'eventstation' ); ?></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								  </button>
								</div>
								<?php wp_nav_menu( array( 'menu' => esc_attr( $menu_location ), 'theme_location' => esc_attr( $menu_location ), 'depth' => 5, 'container' => 'div', 'container_class' => 'collapse navbar-collapse', 'container_id' => 'bs-example-navbar-collapse-1', 'menu_class' => 'nav navbar-nav', 'fallback_cb' => 'eventstation_walker::fallback', 'walker' => new eventstation_walker()) ); ?>
							</nav>
						</div>
					</header>
				</div>
			</div>
		<?php
		}

		function eventstation_headerstyle3() {
			if ( is_page() or is_single() ) {
				global $post;
				$menu_slot_select = get_post_meta( $post->ID, 'alternative_menu_slot_select', true);
			}
			else {
				$menu_slot_select = "";
			}

			if ( $menu_slot_select == "menuslot1" ) {
				$menu_location = 'menuslot1';
			} elseif ( $menu_slot_select == "menuslot2" ) {
				$menu_location = "menuslot2";
			} else {
				$menu_location = "mainmenu";
			}
		?>
			<div class="header-wrapper header-alternative header-alternative2">
				<div class="container">
					<header class="header">
						<?php eventstation_site_logo(); ?>
						<?php eventstation_site_logo_alternative(); ?>
						<?php eventstation_header_search(); ?>
						<div class="menu-area">
							<nav class="navbar">
								<div class="navbar-header">
								  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
									<span class="sr-only"><?php echo esc_html__( 'Toggle Navigation', 'eventstation' ); ?></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								  </button>
								</div>
								<?php wp_nav_menu( array( 'menu' => esc_attr( $menu_location ), 'theme_location' => esc_attr( $menu_location ), 'depth' => 5, 'container' => 'div', 'container_class' => 'collapse navbar-collapse', 'container_id' => 'bs-example-navbar-collapse-1', 'menu_class' => 'nav navbar-nav', 'fallback_cb' => 'eventstation_walker::fallback', 'walker' => new eventstation_walker()) ); ?>
							</nav>
						</div>
					</header>
				</div>
			</div>
		<?php
		}

		if( !$header_status == 'off' or $header_status == "on" ) {

			if ( is_page() or is_single() ) {

				if( $header_style == "alternativestylev1" ) {
					eventstation_headerstyle2();
				} elseif( $header_style == "alternativestylev2" ) {
					eventstation_headerstyle3();
				} elseif( $header_style == "default" ) {
					eventstation_headerstyle1();
				} else {

					if( $default_header_layout == "alternativestylev1" ) {
						eventstation_headerstyle2();
					} elseif( $default_header_layout == "alternativestylev2" ) {
						eventstation_headerstyle3();
					} else {
						eventstation_headerstyle1();
					}

				}

			} elseif( is_category() ) {

				$cat = get_queried_object();
				$cat_id = $cat->term_id;
				$eventstation_category_header_style = get_term_meta( $cat_id, 'eventstation_category_header_style', true );

				if( $eventstation_category_header_style == "alternativestylev1" ) {
					eventstation_headerstyle2();
				} elseif( $eventstation_category_header_style == "alternativestylev2" ) {
					eventstation_headerstyle3();
				} elseif( $eventstation_category_header_style == "default" ) {
					eventstation_headerstyle1();
				} else {

					if( $default_header_layout == "alternativestylev1" ) {
						eventstation_headerstyle2();
					} elseif( $default_header_layout == "alternativestylev2" ) {
						eventstation_headerstyle3();
					} else {
						eventstation_headerstyle1();
					}

				}

			} else {

				if( $default_header_layout == "alternativestylev1" ) {
					eventstation_headerstyle2();
				} elseif( $default_header_layout == "alternativestylev2" ) {
					eventstation_headerstyle3();
				} else {
					eventstation_headerstyle1();
				}

			}

		}

	}
}
/*------------- HEADER STYLES START END -------------*/

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

if ( ! function_exists('build_schedule_item')) {
  function build_schedule_item ( $event ) {
    $offset_class = "";
    if($event['offset']) {
      $offset_class = "offset";
    }

    ?>
    <div class="<?php echo $offset_class; ?> length_<?php echo $event['length'];?> schedule_item" data-toggle="modal" data-target="#myModal">
      <!-- <a href="<?php echo $event['url']; ?>"><?php echo $event['name']; ?></a> -->
      <?php set_cat_icons($event['categories']); ?>
      <span class="title"><?php echo $event['name']; ?></span> (<?php echo $event['length']; ?> mins)
      <span class="info" style="display: none"><?php echo $event['desc']; ?></span>
      <span class="photo_url" style="display: none"><?php echo $event['photo_url']; ?></span>
    </div>
<?php }
}


if ( ! function_exists('set_cat_icons')) {
  function set_cat_icons ( $cats ) {
    $html = "";
    //panel event gaming photo-session autographs workshop demo discussion qa
    foreach ($cats as $cat) {
      switch ($cat->slug) {
        case 'panels':
          $html .= '<i class="fa fa-users panel-icon" aria-hidden="true"></i>&nbsp;';
          break;
        case 'events':
          $html .= '<i class="fa fa-diamond event-icon" aria-hidden="true"></i>&nbsp;';
          break;
        case 'gaming':
          $html .= '<i class="fa fa-gamepad gaming-icon" aria-hidden="true"></i>&nbsp;';
          break;
        case 'photo-session':
          $html .= '<i class="fa fa-camera photo-icon" aria-hidden="true"></i>&nbsp;';
          break;
        case 'autographs':
          $html .= '<i class="fa fa-pencil autograph-icon" aria-hidden="true"></i>&nbsp;';
          break;
        case 'workshop':
          $html .= '<i class="fa fa-heart workshop-icon" aria-hidden="true"></i>&nbsp;';
          break;
        case 'demo':
          $html .= '<i class="fa fa-gear demo-icon" aria-hidden="true"></i>&nbsp;';
          break;
        case 'discussion':
          $html .= '<i class="fa fa-microphone discussion-icon" aria-hidden="true"></i>&nbsp;';
          break;
        case 'qa':
          $html .= '<i class="fa fa-question-circle-o qa-icon" aria-hidden="true"></i>&nbsp;';
          break;
      }
    }
    echo $html;
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
       'category_name'   => 'panels',
       'meta_key' => 'marcato_contact_custom_field_Panel Fields_Name of Panel',
       'orderby' => 'meta_value',
       'order' => 'ASC'
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
         $data['panel_promotion'] = str_replace( "\n", "", wpautop($meta_fields['marcato_contact_custom_field_Panel Promotion _Panel Promotion '][0]));
         $data['panel_name'] = $meta_fields['marcato_contact_custom_field_Panel Fields_Name of Panel'][0];
         $data['panel_host_name'] = $meta_fields['marcato_contact_name'][0];
         $data['panel_type'] = $meta_fields['marcato_contact_custom_field_Panel Fields_Type of Panel'][0];
         $data['photo_url'] = "";
         $data['photo_url'] = $meta_fields['marcato_contact_photo_url'][0];
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
      'category_name'   => 'gaming',
      'order'           => 'ASC',
      'orderby'         => 'post_title'
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
         $data['promotion'] = str_replace( "\n", "", wpautop($meta_fields['marcato_contact_custom_field_Event Description _Program Description'][0]));
         $data['company'] = $meta_fields['marcato_contact_company'][0];
         if($data['company'] != ""){
           $data['company'] = $data['name'];
         }
         $data['photo_url'] = $meta_fields['marcato_contact_photo_url'][0];
         $post_data[] = $data;
       }
     }

     return $post_data;
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
        'category_name'   => 'vendor',
        'order'           => 'ASC',
        'orderby'         => 'post_title'
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
           $data['promotion'] = str_replace( "\n", "", wpautop($meta_fields['marcato_vendor_product_description'][0]));
           $data['company'] = $meta_fields['marcato_vendor_company'][0];
           $data['photo_url'] = $meta_fields['marcato_vendor_photo_url'][0];
           $data['website'] = $meta_fields['marcato_vendor_website'][0];
           $data['facebook'] = $meta_fields['marcato_vendor_website_Facebook_url'][0];
           $data['twitter'] = $meta_fields['marcato_vendor_website_Twitter_url'][0];
           $post_data[] = $data;
         }
       }

       return $post_data;
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
         'category_name'   => 'artist',
         'order'           => 'ASC',
         'orderby'         => 'post_title'
       );

       if ( is_array( $filter ) && array_key_exists( 'category', $filter ) ) {
          $args['category_name'] = $filter['category'];
       }

       $post_data = [];
      $posts = get_posts( $args );
       if ( ! empty( $posts ) ) {

         foreach( $posts as $post ) {
           $data['slug'] = $post->post_name;
           $data['name'] = $post->post_title;
           $meta_fields = get_post_meta($post->ID);
           $data['promotion'] = str_replace( "\n", "", wpautop($meta_fields['marcato_vendor_product_description'][0]));
           $data['company'] = $meta_fields['marcato_vendor_company'][0];
           $data['photo_url'] = $meta_fields['marcato_vendor_photo_url'][0];
           $data['website'] = $meta_fields['marcato_vendor_website'][0];
           $data['facebook'] = $meta_fields['marcato_vendor_website_Facebook_url'][0];
           $data['twitter'] = $meta_fields['marcato_vendor_website_Twitter_url'][0];

           $post_data[] = $data;
         }
       }

       return $post_data;
    }


    add_action( 'rest_api_init', 'register_schedule_by_time_route', 10 );

    function register_schedule_by_time_route() {
        register_rest_route( 'wp/v2', '/schedule_by_time', array(
            array(
                'methods'  => WP_REST_Server::READABLE,
                'callback' => 'get_schedule_by_time',
            ),
        ) );
    }

     function get_schedule_by_time( WP_REST_Request $request ) {
       $filter = $request->get_param( 'filter' );
       $data   = array();

       $args = array(
         'posts_per_page'	=> -1,
         'post_type'			=> 'marcato_show'
       );

       if ( is_array( $filter ) && array_key_exists( 'category', $filter ) ) {
          $args['category_name'] = $filter['category'];
       }

       $post_data = [];
      $posts = get_posts( $args );
       if ( ! empty( $posts ) ) {

         foreach( $posts as $post ) {
           $data['slug'] = $post->post_name;
           $data['name'] = $post->post_title;
           $meta_fields = get_post_meta($post->ID);
           $data['promotion'] = str_replace( "\n", "", wpautop($meta_fields['marcato_show_description_web'][0]));
           $data['start_time'] = $meta_fields['marcato_show_formatted_start_time'][0];
           $data['end_time'] = $meta_fields['marcato_show_formatted_end_time'][0];
           $data['unix_start'] = $meta_fields['marcato_show_start_time_unix'][0];
           $data['photo_url'] = $meta_fields['marcato_show_poster_url'][0];
           $data['date'] = $meta_fields['marcato_show_formatted_date'][0];
           $data['venue'] = $meta_fields['marcato_show_venue_name'][0];
           $data = array_merge($data, $meta_fields);
           $post_data[$data['date']][$data['unix_start']][] = $data;
         }
       }

       return $post_data;
    }


    add_action( 'rest_api_init', 'register_schedule_by_venue_route', 10 );

    function register_schedule_by_venue_route() {
        register_rest_route( 'wp/v2', '/schedule_by_venue', array(
            array(
                'methods'  => WP_REST_Server::READABLE,
                'callback' => 'get_schedule_by_venue',
            ),
        ) );
    }

     function get_schedule_by_venue( WP_REST_Request $request ) {
       $filter = $request->get_param( 'filter' );
       $data   = array();

       $args = array(
         'posts_per_page'	=> -1,
         'post_type'			=> 'marcato_show'
       );

       if ( is_array( $filter ) && array_key_exists( 'category', $filter ) ) {
          $args['category_name'] = $filter['category'];
       }

       $post_data = [];
      $posts = get_posts( $args );
       if ( ! empty( $posts ) ) {

         foreach( $posts as $post ) {
           $data['slug'] = $post->post_name;
           $data['name'] = $post->post_title;
           $meta_fields = get_post_meta($post->ID);
           $data['promotion'] = str_replace( "\n", "", wpautop($meta_fields['marcato_show_description_web'][0], false));
           $data['start_time'] = $meta_fields['marcato_show_formatted_start_time'][0];
           $data['end_time'] = $meta_fields['marcato_show_formatted_end_time'][0];
           $data['unix_start'] = $meta_fields['marcato_show_start_time_unix'][0];
           $data['photo_url'] = $meta_fields['marcato_show_poster_url'][0];
           $data['date'] = $meta_fields['marcato_show_formatted_date'][0];
           $data['venue'] = $meta_fields['marcato_show_venue_name'][0];
           $data = array_merge($data, $meta_fields);
           $post_data[$data['venue']][$data['date']][$data['unix_start']][] = $data;
         }
       }

       return $post_data;
    }


    add_action( 'rest_api_init', 'register_api_version_route', 10 );

    function register_api_version_route() {
        register_rest_route( 'wp/v2', '/api_version', array(
            array(
                'methods'  => WP_REST_Server::READABLE,
                'callback' => 'get_api_version',
            ),
        ) );
    }

     function get_api_version( WP_REST_Request $request ) {
       $value = get_field( "api_version", 634 );

       return $value;
    }


 ?>
