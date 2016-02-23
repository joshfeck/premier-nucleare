<?php
/**
* Template Name: Past Event Archives
*/

get_header();
?>
  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
<?php
// Display the event status banner
  if ( EE_Registry::instance()->CFG->template_settings->EED_Events_Archive->display_status_banner ) {
    add_filter( 'the_title', array( 'EED_Events_Archive', 'the_title' ), 100, 2 );
  }

  // load in Event Espresso view helpers so event template tags can be used
  EE_Registry::instance()->load_helper( 'Event_View' );
  EE_Registry::instance()->load_helper( 'Venue_View' );

  $args = array(
    'limit'        => 10, // 10 per page
    'show_expired' => TRUE, // want to include expired events
    'sort'         => 'DESC', // start with the most recently expired event
  );

  // Apply the posts_where filter (see custom.php) to limit primary datetimes to before today
  add_filter( 'posts_where', 'custom_posts_where_sql_for_only_expired' );

  // the query
  global $wp_query;
  $wp_query = new EE_Event_List_Query( $args );

  // the loop
  if( have_posts() ) {

?>

  <ul class="nav nav-tabs nav-events" role="tablist">
    <li><a href="/events">Upcoming Events</a></li>
    <li class="active"><a href="/past-events">Past Events</a></li>
  </ul>

  <?php /* Event Search */ get_template_part( 'templates/searchform-events' ); ?>


  <?php

    // loop through posts
    while ( have_posts() ) : the_post();

    // Include the event content template.
    espresso_get_template_part( 'templates/content', 'espresso_events' );

    endwhile;

  }

  // Remove the posts_where filter to prevent SQL errors in other template parts
  remove_filter( 'posts_where', 'custom_posts_where_sql_for_only_expired' );

wp_reset_postdata();
?>
    </main><!-- #main -->
  </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>