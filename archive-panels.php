<?php
/**
 * Template Name: Panels
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
          $panels = get_posts(array(
            'posts_per_page'	=> -1,
            'post_type'			=> 'marcato_contact',
            'category_name'   => 'panels'
          ));
          if( $panels ):
             ?>
						<div class="category-post-list post-list">
							<?php foreach( $panels as $post ):
                setup_postdata( $post );
                $meta_fields = get_post_meta($post->ID);

                $panel_promotion = $meta_fields['marcato_contact_custom_field_Panel Promotion _Panel Promotion '][0];
                if ($panel_promotion != '') {
                  $panel_name = $meta_fields['marcato_contact_custom_field_Panel Fields_Name of Panel'][0];
                  $panel_host_name = $meta_fields['marcato_contact_name'][0];
                  $panel_type = $meta_fields['marcato_contact_custom_field_Panel Fields_Type of Panel'][0];
                  $photo_url = $meta_fields['marcato_contact_photo_url'][0];

                  ?>
  								<article id="post-<?php the_ID(); ?>" <?php post_class( 'animate anim-fadeIn' ); ?>>

                    <div class="row animate anim-fadeIn">
                      <?php if ($photo_url != "") { ?>
                        <div class="col-sm-4">
                          <img src="<?php echo $photo_url; ?>" class="responsive-image" />
                        </div>
                      <?php } ?>
                      <div class="col-sm-<?php echo ($photo_url != "") ? 8 : 12 ?>">
                        <h1><?php echo $panel_name; ?></h1>
                        <h2>Hosted By: <?php echo $panel_host_name; ?></h2>
                        <h4><?php echo $panel_type; ?></h4>
                        <hr/>
                        <p><?php echo $panel_promotion; ?></p>
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
