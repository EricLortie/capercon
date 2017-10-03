<?php
/**
 * Template Name: Events
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
          $events = get_posts(array(
            'posts_per_page'	=> -1,
            'post_type'			=> 'marcato_show',
            'category_name'   => 'event'
          ));
          if( $events ):
             ?>
						<div class="category-post-list post-list">
							<?php foreach( $events as $post ):
                setup_postdata( $post );
                $meta_fields = get_post_meta($post->ID);
                write_log($meta_fields);

                $long_description = $meta_fields["marcato_show_description_web"][0];
                $desc = $meta_fields["marcato_show_description_public"][0];
                $name = $meta_fields["marcato_show_name"][0];
                $date = $meta_fields["marcato_sshow_date"][0];
                $venue = $meta_fields["marcato_show_venue_name"][0];
                $price = $meta_fields["marcato_show_price"][0];
                $formatted_date = $meta_fields["marcato_show_formatted_date"][0];
                $s_time = $meta_fields["marcato_show_formatted_start_time"][0];
                $e_time = $meta_fields["marcato_show_formatted_end_time"][0];
                $s_time_unix = $meta_fields["marcato_show_start_time_unix"][0];
                $s_desc = $meta_fields["marcato_show_description_public"][0];
                $photo_url = $meta_fields["marcato_show_poster_url"][0];
                if ($desc != '') {

                  ?>
  								<article id="post-<?php the_ID(); ?>" <?php post_class( 'animate anim-fadeIn' ); ?>>

                    <div class="row animate anim-fadeIn">

                      <h1><a href="<?php the_permalink(); ?>"><?php echo $name; ?></a></h1>
                      <?php if ($photo_url != "") { ?>
                        <div class="col-sm-4">
                          <img src="<?php echo $photo_url; ?>" class="responsive-image" />
                        </div>
                      <?php } ?>
                      <div class="col-sm-<?php echo ($photo_url != "") ? 8 : 12 ?>">
                        <h2>Location: <?php echo $venue; ?></h2>
                        <h2>Price: <?php echo $price; ?></h2>
                        <h2><?php echo $formatted_date; ?>: <?php echo $s_time; ?> to <?php echo $e_time; ?></h2>
                        <hr/>
                        <p><?php echo $desc; ?></p>
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
