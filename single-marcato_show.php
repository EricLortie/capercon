<?php
/*
	* The main template file
*/
get_header(); ?>

	<?php
		$archive_heading_navigation = ot_get_option( 'archive_heading_navigation' );
		if( $archive_heading_navigation == "on" or !$archive_heading_navigation == "off" ) {
			eventstation_heading_navigation();
		} else {
	?>
		<?php eventstation_no_header_code(); ?>
	<?php } ?>

	<?php eventstation_site_sub_content_start(); ?>
		<?php eventstation_container_fluid_before(); ?>
			<?php eventstation_alternative_row_before(); ?>
				<?php eventstation_content_area_start(); ?>
					<?php if ( have_posts() ) : ?>
						<div class="category-post-list post-list">
							<?php while ( have_posts() ) : the_post();

              ?>
								<article id="post-<?php the_ID(); ?>" <?php post_class( 'animate anim-fadeIn' ); ?>>
									<div class="post-wrapper">
										<div class="post-header">
											<?php
												$archive_post_information = ot_get_option( 'archive_post_information' );
												if( $archive_post_information == "on" or !$archive_post_information == "off" ) {
											?>
											<?php } ?>
											<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
										</div>

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

										<div class="post-bottom">
											<?php
												$archive_post_share_buttons = ot_get_option( 'archive_post_share_buttons' );
												if( $archive_post_share_buttons == "on" or !$archive_post_share_buttons == "off" ) {
											?>
												<?php eventstation_post_content_social_share(); ?>
											<?php } ?>
										</div>
									</div>
								</article>
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
