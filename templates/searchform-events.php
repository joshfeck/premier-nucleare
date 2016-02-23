<div class="search-events">

  <p class="lead">We’ve archived our past events so you can access resources, downloads and information 24/7. If you don’t see the event you’re looking for, try searching for it. Or check out the <a href="/events-calendar">Events Calendar</a> for more sorting and filtering options.</p>

  <div class="search-events-form">
    <form class="search-navbar" role="search" method="get" action="<?php echo home_url('/'); ?>">
      <div class="input-group">
        <input class="form-control"  type="search" value="<?php if (is_search()) { echo get_search_query(); } ?>" name="s" placeholder="Search Events">
        <input type="hidden" name="post_type" value="espresso_events" />
        <label class="sr-only"><?php _e('Search for:', 'roots'); ?></label>
        <span class="input-group-btn">
          <button class="btn btn-default" type="submit"><span class="fa fa-search"></span></button>
        </span>
      </div>
    </form>
  </div>

<?php if ( is_search() ) : ?>

  <h2>Your event search results for: "<?php echo get_search_query(); ?>"</h2>

<?php endif; ?>

</div>