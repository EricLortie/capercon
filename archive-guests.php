<?php
/**
 * Template Name: Guests
 *
 * @package WordPress
 * @subpackage Illdy
 * @since Illdy 1.0
 */

 write_log("LALALALA");

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
          $guests = get_posts(array(
            'posts_per_page'	=> -1,
            'post_type'			=> 'guests'
          ));

          if( $guests ):
             ?>
						<div class="category-post-list post-list">
							<?php foreach( $guests as $post ):
                write_log($post);
                setup_postdata( $post );
                $fields = get_fields(); ?>
								<article id="post-<?php the_ID(); ?>" <?php post_class( 'animate anim-fadeIn' ); ?>>

                  <div class="row animate anim-fadeIn">

                    <div class="col-sm-4">
                      <a href="<?php echo the_permalink(); ?>"><img src="<?php echo $fields['photo']; ?>" /></a>
                    </div>
                    <div class="col-sm-8">
                      <h1><a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a><?php echo parse_social_links($fields['urls']); ?></h1>
                      <?php if($fields['signing_autographs'] == 1) { ?>
                        <h4>Signing autographs. (Schedule TBD)</h4>
                      <?php } ?>
                      <p><?php the_excerpt(); ?></p>
                    </div>
                  </div>

								</article>

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
