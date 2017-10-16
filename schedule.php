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
 				<?php eventstation_content_area_start();
        if( have_posts() ):
           ?>

          <div class="category-post-list post-list">
            <?php
              while( have_posts() ):
                the_post();

                the_content();
              endwhile;?>

          <div>
            <h1>Legend</h1>
            Panel: <i class="fa fa-users panel-icon" aria-hidden="true"></i>  |
            Event: <i class="fa fa-diamond event-icon" aria-hidden="true"></i>  |
            Gaming: <i class="fa fa-gamepad gaming-icon" aria-hidden="true"></i>  |
            Photo Session: <i class="fa fa-id-card photo-icon" aria-hidden="true"></i>  |
            Autographs: <i class="fa fa-pencil autograph-icon" aria-hidden="true"></i>  |
            Workshop: <i class="fa fa-heart workshop-icon" aria-hidden="true"></i>  |
            Demo: <i class="fa fa-gear demo-icon" aria-hidden="true"></i>  |
            Discussion: <i class="fa fa-microphone discussion-icon" aria-hidden="true"></i>  |
            qa: <i class="fa fa-question-circle-o qa-icon" aria-hidden="true"></i>
          </div>
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
            $sunday_slots = ["10:00 AM", "11:00 AM", "12:00 PM", "1:00 PM", "2:00 PM", "3:00 PM", "4:00 PM", "5:00 PM"];

            // Args
            $venues = get_posts(array(
              'posts_per_page'	=> -1,
              'post_type'			=> 'marcato_venue'
            ));

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

                $offset = false;
                $length = (strtotime($e_time) - strtotime($s_time))/60;
                if(strpos($s_time, '30') !== false) {
                  $offset = true;
                  $s_time = str_replace("30", "00", $s_time);
                }
                if(!array_key_exists(date('l', strtotime($date)), $schedule)){
                  $schedule[date('l', strtotime($date))] = [];
                }
                if(!array_key_exists($venue, $schedule[date('l', strtotime($date))])){
                  $schedule[date('l', strtotime($date))][$venue] = [];
                }
                if(!array_key_exists(trim($s_time), $schedule[date('l', strtotime($date))][$venue])){
                  $schedule[date('l', strtotime($date))][$venue][trim($s_time)] = [];
                }
                $schedule[date('l', strtotime($date))][$venue][trim($s_time)][] = array('name' => $name, 'url' => get_the_permalink(), 'length'=>$length, 'offset'=>$offset, 'categories'=>(get_the_category($post->ID)));

                ?>

                <?php wp_reset_postdata(); ?>
							<?php endforeach; ?>

              <div class="category-post-list post-list">
              <article>

                <h1>Friday</h1>
                <table class="schedule">
                	<tr>
                    <th>VENUE</th>
                    <?php foreach ($friday_slots as $time) { ?>
                      <th><?php echo $time; ?></th>
                    <?php } ?>
                  </tr>
                  <?php
                  foreach($venues as $venue) {
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
                            <?php foreach ($schedule['Friday'][$venue->post_title][$time] as $event){ ?>
                              <?php build_schedule_item($event); ?>
                            <?php }?>
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
                            <?php foreach ($schedule['Saturday'][$venue->post_title][$time] as $event){ ?>
                              <?php build_schedule_item($event); ?>
                            <?php }?>
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
                            <?php foreach ($schedule['Sunday'][$venue->post_title][$time] as $event){ ?>
                              <?php build_schedule_item($event); ?>
                            <?php }?>
                          <?php } ?>
                        </td>
                      <?php } ?>
                    </tr>
                  <?php } ?>
                </table>


              </article>
						</div>
          <?php endif; ?>
						<?php eventstation_pagination(); ?>
					<?php else : ?>
						<?php get_template_part( 'include/formats/content', 'none' ); ?>
					<?php endif; ?>
				<?php eventstation_content_area_end(); ?>

			<?php eventstation_alternative_row_after(); ?>

		<?php eventstation_container_fluid_after(); ?>
	<?php eventstation_site_sub_content_end(); ?>

<?php get_footer();
