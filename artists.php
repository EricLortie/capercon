<?php
/**
 * Template Name: Artists
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
          $artists = get_posts(array(
            'posts_per_page'	=> -1,
            'post_type'			=> 'marcato_vendor',
            'category_name'   => 'artists'
          ));

          if( $artists ):
             ?>
						<div class="category-post-list post-list">
							<?php foreach( $artists as $post ):
                setup_postdata( $post );
                $meta_fields = get_post_meta($post->ID);
                $promo_notes = $meta_fields['marcato_vendor_custom_field_Vendor Promo Notes_Short Promo Notes'][0];
                if ($promo_notes != '') {
                  $name = $meta_fields['marcato_vendor_company'][0];
                  $photo = $meta_fields['marcato_vendor_photo_url'][0];
                  //$vendor_product = $meta_fields['marcato_vendor_product_description'][0];
                  ?>

  								<article id="post-<?php the_ID(); ?>" <?php post_class( 'animate anim-fadeIn' ); ?>>

                    <div class="row animate anim-fadeIn">

                      <div class="col-sm-4">
                        <img src="<?php echo $photo; ?>" />
                      </div>
                      <div class="col-sm-8">
                        <h1><?php echo $name; ?></h1>
                        <p><?php echo $promo_notes; ?></p>
                      </div>

                    </div>

  								</article>

                  <hr />
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
