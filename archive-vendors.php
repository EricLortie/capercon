<?php
/**
 * Template Name: Vendors
 *
 * @package WordPress
 * @subpackage Illdy
 * @since Illdy 1.0
 */

 get_header(); ?>

 	<?php
 		$author_heading_navigation = ot_get_option( 'author_heading_navigation' );
 		if( $author_heading_navigation == "on" or !$author_heading_navigation == "off" ) {
 			eventstation_heading_navigation();
 		} else {
 	?>
 		<?php eventstation_no_header_code(); ?>
 	<?php } ?>
 	<?php eventstation_site_sub_content_start(); ?>
 		<?php eventstation_container_fluid_before(); ?>
 			<?php eventstation_alternative_row_before(); ?>
 				<?php eventstation_content_area_start(); ?>
 					<?php

          // Args
          $vendors = get_posts(array(
            'posts_per_page'	=> -1,
            'post_type'			=> 'marcato_vendor',
            'category_name'   => 'vendor'
          ));
          if( $vendors ):
             ?>
						<div class="category-post-list post-list">
							<?php foreach( $vendors as $post ):
                setup_postdata( $post );
                $meta_fields = get_post_meta($post->ID);

                $vendor_promotion = $meta_fields['marcato_vendor_custom_field_Vendor Promo Notes_Short Description'][0];
                if ($vendor_promotion != '') {
                  $vendor_name = $meta_fields['marcato_vendor_company'][0];
                  $vendor_phone = $meta_fields['marcato_vendor_primary_phone_number'][0];
                  $photo_url = $meta_fields['marcato_vendor_photo_url'][0];
                  $facebook_url = $meta_fields['marcato_vendor_website_Facebook_url'][0];
                  $website_url = $meta_fields['marcato_vendor_website_Website_url'][0];
                  $main_website_url = $meta_fields['marcato_vendor_website'][0];
                  $twitter_url = $meta_fields['marcato_vendor_website_Twitter_url'][0];

                  $social_links = array();
                  if($facebook_url != ""){
                    $social_links[] = array('url' => $facebook_url, 'type' => 'facebook');
                  }
                  if($twitter_url != ""){
                    $social_links[] = array('url' => $twitter_url, 'type' => 'twitter');
                  }
                  if($website_url != ""){
                    $social_links[] = array('url' => $website_url, 'type' => 'website');
                  }

                  ?>
  								<article id="post-<?php the_ID(); ?>" <?php post_class( 'animate anim-fadeIn' ); ?>>

                    <div class="row animate anim-fadeIn">
                      <?php if ($photo_url != "") { ?>
                        <div class="col-sm-4">
                          <img src="<?php echo $photo_url; ?>" class="responsive-image archive-image" />
                        </div>
                      <?php } ?>
                      <div class="col-sm-<?php echo ($photo_url != "") ? 8 : 12 ?>">
                        <h1><?php echo $vendor_name; ?> <?php echo parse_social_links($social_links); ?></h1>
                        <h2>Phone #: <?php echo $vendor_phone; ?></h2>
                        <hr/>
                        <p><?php echo $vendor_promotion; ?></p>
                      </div>
                    </div>

  								</article>
                <?php } ?>
                <?php wp_reset_postdata(); ?>
							<?php endforeach; ?>
						</div>
						<?php eventstation_pagination(); ?>
					<?php else : ?>
						<?php get_template_part( 'include/formats/content', 'none' ); ?>
					<?php endif; ?>
				<?php eventstation_content_area_end(); ?>

				<?php get_sidebar(); ?>

			<?php eventstation_alternative_row_after(); ?>

		<?php eventstation_container_fluid_after(); ?>
	<?php eventstation_site_sub_content_end(); ?>

<?php get_footer();
