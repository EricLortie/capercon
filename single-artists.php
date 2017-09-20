<?php
/**
 * Template Name: Single Artist
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

          if( have_posts() ):
             ?>

						<div class="category-post-list post-list">
							<?php
                while( have_posts() ):
                the_post();
                $fields = get_fields(); ?>
								<article id="post-<?php the_ID(); ?>" <?php post_class( 'animate anim-fadeIn' ); ?>>

                  <h1><?php echo the_title(); ?><?php echo parse_social_links($fields['urls']); ?></h1>

                  <img src="<?php echo $fields['photo']; ?>" class="single-image" /></a>
                  <?php if($fields['featured'] == 1) { ?>
                    <h4>FEATURED ARTIST</h4>
                  <?php } ?>
                  <?php the_content(); ?>

								</article>

                <?php eventstation_post_content_social_share(); ?>

							<?php endwhile; ?>

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
