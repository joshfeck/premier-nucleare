<?php
/**
 * Template Name: Event List
 *
 * This template will display a list of your events
 *
 **/

get_header();

// echo '<br/><h6 style="color:#2EA2CC;">'. __FILE__ . ' &nbsp; <span style="font-weight:normal;color:#E76700"> Line #: ' . __LINE__ . '</span></h6>';
?>
<ul class="nav nav-tabs nav-events" role="tablist">
  <li <?php echo ( ! is_search() ? 'class="active"' : ''); ?>><a href="/events">Upcoming Events</a></li>
  <li <?php echo ( is_search() ? 'class="active"' : ''); ?>><a href="/past-events">Past Events</a></li>
</ul>

<?php if ( is_search() ) { get_template_part( 'templates/searchform-events' ); } ?>

<?php
		// Start the Loop.

    if ( have_posts() ) :

    // allow other stuff
    do_action( 'AHEE__archive_espresso_events_template__before_loop' );

		while ( have_posts() ) : the_post();

			// Include the post TYPE-specific template for the content.
			espresso_get_template_part( 'templates/content', 'espresso_events' );

		endwhile;

		// Previous/next page navigation.
		// espresso_pagination();

		// allow moar other stuff
		do_action( 'AHEE__archive_espresso_events_template__after_loop' );

	else :

		// If no content, include the "No posts found" template.
		espresso_get_template_part( 'templates/content', 'espresso_events-noposts' );
    // Event Search
    get_template_part( 'templates/searchform-events' );

	endif;

get_footer();