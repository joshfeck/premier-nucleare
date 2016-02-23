<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package nucleare
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'nucleare' ); ?></a>
	
	<div class="theNavigationBar">
		<div class="theNavigationBlock">
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><i class="fa fa-bars"></i></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- #site-navigation -->
			<?php 
				$hideRss = get_theme_mod('nucleare_theme_options_rss', '1');
				$hideSearch = get_theme_mod('nucleare_theme_options_hidesearch', '1');
				$facebookURL = get_theme_mod('nucleare_theme_options_facebookurl', '#');
				$twitterURL = get_theme_mod('nucleare_theme_options_twitterurl', '#');
				$googleplusURL = get_theme_mod('nucleare_theme_options_googleplusurl', '#');
				$linkedinURL = get_theme_mod('nucleare_theme_options_linkedinurl', '#');
				$instagramURL = get_theme_mod('nucleare_theme_options_instagramurl', '#');
				$youtubeURL = get_theme_mod('nucleare_theme_options_youtubeurl', '#');
				$pinterestURL = get_theme_mod('nucleare_theme_options_pinteresturl', '#');
				$tumblrURL = get_theme_mod('nucleare_theme_options_tumblrurl', '#');
				$vkURL = get_theme_mod('nucleare_theme_options_vkurl', '#');
			?>
			<div class="theNavigationSocial">
				<?php if (!empty($facebookURL)) : ?>
					<a href="<?php echo esc_url($facebookURL); ?>" title="<?php esc_attr_e( 'Facebook', 'nucleare' ); ?>"><i class="fa fa-facebook"><span class="screen-reader-text"><?php esc_attr_e( 'Facebook', 'nucleare' ); ?></span></i></a>
				<?php endif; ?>
				<?php if (!empty($twitterURL)) : ?>
					<a href="<?php echo esc_url($twitterURL); ?>" title="<?php esc_attr_e( 'Twitter', 'nucleare' ); ?>"><i class="fa fa-twitter"><span class="screen-reader-text"><?php esc_attr_e( 'Twitter', 'nucleare' ); ?></span></i></a>
				<?php endif; ?>
				<?php if (!empty($googleplusURL)) : ?>
					<a href="<?php echo esc_url($googleplusURL); ?>" title="<?php esc_attr_e( 'Google Plus', 'nucleare' ); ?>"><i class="fa fa-google-plus"><span class="screen-reader-text"><?php esc_attr_e( 'Google Plus', 'nucleare' ); ?></span></i></a>
				<?php endif; ?>
				<?php if (!empty($linkedinURL)) : ?>
					<a href="<?php echo esc_url($linkedinURL); ?>" title="<?php esc_attr_e( 'Linkedin', 'nucleare' ); ?>"><i class="fa fa-linkedin"><span class="screen-reader-text"><?php esc_attr_e( 'Linkedin', 'nucleare' ); ?></span></i></a>
				<?php endif; ?>
				<?php if (!empty($instagramURL)) : ?>
					<a href="<?php echo esc_url($instagramURL); ?>" title="<?php esc_attr_e( 'Instagram', 'nucleare' ); ?>"><i class="fa fa-instagram"><span class="screen-reader-text"><?php esc_attr_e( 'Instagram', 'nucleare' ); ?></span></i></a>
				<?php endif; ?>
				<?php if (!empty($youtubeURL)) : ?>
					<a href="<?php echo esc_url($youtubeURL); ?>" title="<?php esc_attr_e( 'YouTube', 'nucleare' ); ?>"><i class="fa fa-youtube"><span class="screen-reader-text"><?php esc_attr_e( 'YouTube', 'nucleare' ); ?></span></i></a>
				<?php endif; ?>
				<?php if (!empty($pinterestURL)) : ?>
					<a href="<?php echo esc_url($pinterestURL); ?>" title="<?php esc_attr_e( 'Pinterest', 'nucleare' ); ?>"><i class="fa fa-pinterest"><span class="screen-reader-text"><?php esc_attr_e( 'Pinterest', 'nucleare' ); ?></span></i></a>
				<?php endif; ?>
				<?php if (!empty($tumblrURL)) : ?>
					<a href="<?php echo esc_url($tumblrURL); ?>" title="<?php esc_attr_e( 'Tumblr', 'nucleare' ); ?>"><i class="fa fa-tumblr"><span class="screen-reader-text"><?php esc_attr_e( 'Tumblr', 'nucleare' ); ?></span></i></a>
				<?php endif; ?>
				<?php if (!empty($vkURL)) : ?>
					<a href="<?php echo esc_url($vkURL); ?>" title="<?php esc_attr_e( 'VK', 'nucleare' ); ?>"><i class="fa fa-vk"><span class="screen-reader-text"><?php esc_attr_e( 'VK', 'nucleare' ); ?></span></i></a>
				<?php endif; ?>
				
				<?php if ($hideRss == 1 ) : ?>
					<a href="<?php bloginfo( 'rss2_url' ); ?>" title="<?php esc_attr_e( 'RSS', 'nucleare' ); ?>"><i class="fa fa-rss"><span class="screen-reader-text"><?php esc_attr_e( 'RSS', 'nucleare' ); ?></span></i></a>
				<?php endif; ?>
			
				
				<?php if ($hideSearch == 1 ) : ?>
					<div id="open-search" class="top-search"><i class="fa fa-search"><span class="screen-reader-text"><?php esc_attr_e( 'Search', 'nucleare' ); ?></span></i></div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	
	<?php if ($hideSearch == 1 ) : ?>
	<!-- Start: Search Form -->
		<div id="search-full">
			<div class="search-container">
				<?php get_search_form(); ?>
				<span><a id="close-search"><i class="fa fa-close spaceRight"></i><?php _e('Close', 'nucleare'); ?></a></span>
			</div>
		</div>
	<!-- End: Search Form -->
	<?php endif; ?>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<p class="site-description"><?php bloginfo( 'description' ); ?></p>
		</div><!-- .site-branding -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
