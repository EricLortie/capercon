<?php
/**
 * Template Name: Schedule By Venue
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

            $schedule = [];
            $schedule['Friday'] = [];
            $schedule['Saturday'] = [];
            $schedule['Saturday'] = [];

            $friday_hours = [];
            $friday_hours['3:00 PM'] = [];
            $friday_hours['4:00 PM'] = [];
            $friday_hours['5:00 PM'] = [];
            $friday_hours['6:00 PM'] = [];
            $friday_hours['7:00 PM'] = [];
            $friday_hours['8:00 PM'] = [];
            $friday_hours['9:00 PM'] = [];
            $friday_hours['10:00 PM'] = [];
            $friday_hours['11:00 PM'] = [];
            $friday_slots = [ "3:00 PM", "4:00 PM", "5:00 PM", "6:00 PM", "7:00 PM", "8:00 PM", "9:00 PM", "10:00 PM", "11:00 PM"];

            $saturday_hours = [];
            $friday_hours['10:00 AM'] = [];
            $friday_hours['11:00 AM'] = [];
            $friday_hours['12:00 PM'] = [];
            $friday_hours['1:00 PM'] = [];
            $friday_hours['2:00 PM'] = [];
            $friday_hours['3:00 PM'] = [];
            $friday_hours['4:00 PM'] = [];
            $friday_hours['5:00 PM'] = [];
            $friday_hours['6:00 PM'] = [];
            $friday_hours['7:00 PM'] = [];
            $friday_hours['8:00 PM'] = [];
            $friday_hours['9:00 PM'] = [];
            $friday_hours['10:00 PM'] = [];
            $friday_hours['11:00 PM'] = [];
            $saturday_slots = ["10:00 AM", "11:00 AM", "12:00 PM", "1:00 PM", "2:00 PM", "3:00 PM", "4:00 PM", "5:00 PM", "6:00 PM", "7:00 PM", "8:00 PM", "9:00 PM", "10:00 PM", "11:00 PM"];

            $sunday_hours = [];
            $friday_hours['10:00 AM'] = [];
            $friday_hours['11:00 AM'] = [];
            $friday_hours['12:00 PM'] = [];
            $friday_hours['1:00 PM'] = [];
            $friday_hours['2:00 PM'] = [];
            $friday_hours['3:00 PM'] = [];
            $friday_hours['4:00 PM'] = [];
            $sunday_slots = ["10:00 AM", "11:00 AM", "12:00 PM", "1:00 PM", "2:00 PM", "3:00 PM", "4:00 PM"];


            // Args
            $venues = get_posts(array(
              'posts_per_page'	=> -1,
              'post_type'			=> 'marcato_venue'
            ));

            // if( $venues ):
            //   foreach ($venues as $venue) {
            //       setup_postdata( $venue );
            //       $schedule['Friday'][$venue->post_title] = $friday_hours;
            //       $schedule['Saturday'][$venue->post_title] = $saturday_hours;
            //       $schedule['Sunday'][$venue->post_title] = $sunday_hours;
            //       wp_reset_postdata();
            //   }
            // endif;

            // Args
            $events = get_posts(array(
              'posts_per_page'	=> -1,
              'post_type'			=> 'marcato_show'
            ));

            if( $events ):
             ?>
							<?php foreach( $events as $post ):
                setup_postdata( $post );
                $meta_fields = get_post_meta($post->ID);

                $long_description = $meta_fields["marcato_show_description_web"][0];
                $desc = $meta_fields["marcato_show_description_public"][0];
                $name = $meta_fields["marcato_show_name"][0];
                $date = $meta_fields["marcato_show_date"][0];
                $venue = $meta_fields["marcato_show_venue_name"][0];
                $price = $meta_fields["marcato_show_price"][0];
                $formatted_date = $meta_fields["marcato_show_formatted_date"][0];
                $s_time = $meta_fields["marcato_show_formatted_start_time"][0];
                $e_time = $meta_fields["marcato_show_formatted_end_time"][0];
                $s_time_unix = $meta_fields["marcato_show_start_time_unix"][0];
                $s_desc = $meta_fields["marcato_show_description_public"][0];
                $photo_url = $meta_fields["marcato_show_poster_url"][0];
                $schedule[date('l', strtotime($date))][$venue][trim($s_time)]['name'] = $name;
                $schedule[date('l', strtotime($date))][$venue][trim($s_time)]['url'] = get_the_permalink();

                ?>

                <?php wp_reset_postdata(); ?>
							<?php endforeach; ?>

              <?php write_log($schedule); ?>

              <div class="category-post-list post-list">
              <article>

                <h1>Friday</h1>
                <table class="schedule">
                	<tr>
                    <th>VENUE</th>
                    <?php foreach ($friday_slots as $time) { ?>
                      <?php write_log($time); ?>
                      <th><?php echo $time; ?></th>
                    <?php } ?>
                  </tr>
                  <?php foreach($venues as $venue) {
                    setup_postdata( $venue );

                    if(!array_key_exists($venue->post_title, $schedule['Friday'])){
                      continue;
                    }
                    ?>
                    <tr>
                      <td><?php echo $venue->post_title; ?></td>
                      <?php foreach ($friday_slots as $time) { ?>
                        <td>
                          <?php if(array_key_exists($time, $schedule['Friday'][$venue->post_title])){ ?>
                            <?php write_log($schedule['Friday'][$venue->post_title][$time]); ?>
                            <a href="<?php echo $schedule['Friday'][$venue->post_title][$time]['url']; ?>"><?php echo $schedule['Friday'][$venue->post_title][$time]['name']; ?></a>
                          <?php } ?>
                        </td>
                      <?php } ?>
                    </tr>
                  <?php } ?>
                </table>

                <h1>Saturday</h1>
                <table class="schedule">
                	<tr>
                    <th>VENUE</th>
                    <?php foreach ($saturday_slots as $time) { ?>
                      <th><?php echo $time; ?></th>
                    <?php } ?>
                  </tr>
                  <?php foreach($venues as $venue) {
                    setup_postdata( $venue );
                    if(!array_key_exists($venue->post_title, $schedule['Saturday'])){
                      continue;
                    }
                    ?>
                    <tr>
                      <td><?php echo $venue->post_title; ?></td>
                      <?php foreach ($saturday_slots as $time) { ?>
                        <td>
                          <?php if(array_key_exists($time, $schedule['Saturday'][$venue->post_title])){ ?>
                          <a href="<?php echo $schedule['Saturday'][$venue->post_title][$time]['url']; ?>"><?php echo $schedule['Saturday'][$venue->post_title][$time]['name']; ?></a>
                          <?php } ?>
                        </td>
                      <?php } ?>
                    </tr>
                  <?php } ?>
                </table>

                <h1>Sunday</h1>
                <table class="schedule">
                	<tr>
                    <th>VENUE</th>
                    <?php foreach ($sunday_slots as $time) { ?>
                      <th><?php echo $time; ?></th>
                    <?php } ?>
                  </tr>
                  <?php foreach($venues as $venue) {
                    setup_postdata( $venue );

                    if(!array_key_exists($venue->post_title, $schedule['Sunday'])){
                      continue;
                    }
                    ?>
                    <tr>
                      <td><?php echo $venue->post_title; ?></td>
                      <?php foreach ($sunday_slots as $time) { ?>
                        <td>
                          <?php if(array_key_exists($time, $schedule['Sunday'][$venue->post_title])){ ?>
                            <a href="<?php echo $schedule['Sunday'][$venue->post_title][$time]['url']; ?>"><?php echo $schedule['Sunday'][$venue->post_title][$time]['name']; ?></a>
                          <?php } ?>
                        </td>
                      <?php } ?>
                    </tr>
                  <?php } ?>
                </table>


              </article>
						</div>
						<?php eventstation_pagination(); ?>
					<?php else : ?>
						<?php get_template_part( 'include/formats/content', 'none' ); ?>
					<?php endif; ?>
				<?php eventstation_content_area_end(); ?>

			<?php eventstation_alternative_row_after(); ?>

		<?php eventstation_container_fluid_after(); ?>
	<?php eventstation_site_sub_content_end(); ?>

<?php get_footer();