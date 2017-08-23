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
            'post_type'			=> 'panels'
          ));

          if( $panels ):
             ?>
						<div class="category-post-list post-list">
							<?php foreach( $panels as $post ):
                setup_postdata( $post );
                $fields = get_fields(); ?>
                <?php write_log($fields); ?>
								<article id="post-<?php the_ID(); ?>" <?php post_class( 'animate anim-fadeIn' ); ?>>

                  <div class="row animate anim-fadeIn">

                    <div class="col-sm-4">
                      <a href="<?php echo the_permalink(); ?>"><img src="<?php echo $fields['photo']; ?>" /></a>
                    </div>
                    <div class="col-sm-8">
                      <h1><a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a><?php echo parse_social_links($fields['urls']); ?></h1>
                      <?php if($fields['over_18'] == 1) { ?>
                        <h4>This panel is 18+</h4>
                      <?php } ?>
                      <h4>Panel Host: <?php echo $fields['panel_host']; ?></h4>
                      <p><?php echo $fields['panel_host_details']; ?></p>
                      <hr/>
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
