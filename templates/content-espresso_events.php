<?php
	global $post;
	$event_class = has_excerpt( $post->ID ) ? ' has-excerpt' : '';
	$event_class = apply_filters( 'FHEE__content_espresso_events__event_class', $event_class );
  // Get the event status and set a class name
  $event_status = 'espresso-events-status-' . $post->EE_Event->get_active_status();
	do_action( 'AHEE_event_details_before_post', $post );

  // Josh - The commented approach below worked fine in search prior to 4.8.32.p
  // That being said, I believe the get_active_status() to be a better overall
  // approach to getting a more accurate event status and would like to use that.
  // I have intentionally left out the if ($event instanceof EE_Event)
  // check above just so I can see the error - I understand why I would use it otherwise.

	// if( $post->EE_Event->is_expired() ) {
	//   $event_status = ' ee-event-expired';
	// }
	// else {
	//   $event_status = ' ee-event-upcoming';
	// }

	$event = EEH_Event_View::get_event();
	if ( $event instanceof EE_Event ){
		$event_status = $event->get_active_status();
	} else {
		$event_status = '';
	}
	// display the status for debugging purposes
	echo '<h1>Event Status is ' . $event_status . '</h1>';



?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $event_class . $event_status ); ?>>

<?php if ( is_single() ) : ?>

	<div id="espresso-event-header-dv-<?php echo $post->ID;?>" class="espresso-event-header-dv">
		<?php espresso_get_template_part( 'templates/content', 'espresso_events-thumbnail' ); ?>
		<?php //espresso_get_template_part( 'templates/content', 'espresso_events-header' ); ?>
	</div>

	<div class="espresso-event-wrapper-dv">
		<?php espresso_get_template_part( 'templates/content', 'espresso_events-datetimes' ); ?>
		<?php espresso_get_template_part( 'templates/content', 'espresso_events-details' ); ?>
		<?php espresso_get_template_part( 'templates/content', 'espresso_events-tickets' ); ?>
		<?php espresso_get_template_part( 'templates/content', 'espresso_events-venues' ); ?>
		<footer class="event-meta">
			<?php do_action( 'AHEE_event_details_footer_top', $post ); ?>
			<?php do_action( 'AHEE_event_details_footer_bottom', $post ); ?>
		</footer>
	</div>

<?php elseif ( is_archive() ) : ?>

	<div id="espresso-event-list-header-dv-<?php echo $post->ID;?>" class="espresso-event-header-dv">
		<?php espresso_get_template_part( 'templates/content', 'espresso_events-thumbnail' ); ?>
		<div class="events-header"><?php espresso_get_template_part( 'templates/content', 'espresso_events-header' ); ?></div>
	</div>

	<div class="espresso-event-list-wrapper-dv">
		<?php espresso_get_template_part( 'templates/content', 'espresso_events-datetimes' ); ?>
		<?php espresso_get_template_part( 'templates/content', 'espresso_events-details' ); ?>
		<?php //espresso_get_template_part( 'templates/content', 'espresso_events-tickets' ); ?>
		<?php espresso_get_template_part( 'templates/content', 'espresso_events-venues' ); ?>
	</div>

<?php endif; ?>

</article>

<!-- #post -->

<?php do_action( 'AHEE_event_details_after_post', $post ); ?>