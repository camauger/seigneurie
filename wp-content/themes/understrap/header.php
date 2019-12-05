<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="site" id="page">
	<!-- image header -->
	<?php $bannerUrl = get_post_meta($post->ID, 'banniere-photo', true); ?>
	<?php if ($bannerUrl === '') { ?>
		<div class="top-header-banner__image" style="background-image: url('https://seigneurieiledorleans.com/wp-content/themes/understrapimages/bg-champ-lavande.jpg');">
	<?php } else { ?>

		<div class="top-header-banner__image" style="background-image: url('<?php echo $bannerUrl; ?>');">
	<?php
	}
	 ?>
	<div class="top-header-banner">
		<div class="top-header-banner__text">
			<span>La santé et la beauté<br>
se conjuguent au même temps... au présent!</span>
		</div>
		<div class="top-header-banner__logo">
			<a href="/">
			<img src="https://seigneurieiledorleans.com/wp-content/themes/understrapimages/sio-logo.png" alt="Seigneurie de l'Île d'Orélans">
			</a>
		</div>
		<div class="top-header-banner__above-menu">
			<div class="above-menu__text--small">
			</div>
			<div class="above-menu__text--big">
			</div>
		</div>
			</div>
					</div>

					<div class="clearfix">

					</div>
	<!-- ******************* The Navbar Area ******************* -->
	<div class="container">
		<?php wp_nav_menu(
			array(
				'theme_location'  => 'topmenu',
				'container_class' => 'top-menu-nav__lg',
				'menu_class'      => 'nav',
				'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
			)
		); ?>
	</div>
	<div class="container fixed-top">
		<?php wp_nav_menu(
			array(
				'theme_location'  => 'topmenu',
				'container_class' => 'top-menu-nav__sm',
				'menu_class'      => 'nav',
				'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
			)
		); ?>
	</div>



	<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

		<div class="deco-left">
			<img src="https://seigneurieiledorleans.com/wp-content/themes/understrapimages/sio-ferronerie-gauche-1.png" alt="">
		</div>
		<div class="deco-right">
			<img src="https://seigneurieiledorleans.com/wp-content/themes/understrapimages/sio-ferronerie-droite-1.png" alt="">
		</div>

		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>





		<nav class="navbar navbar-expand-md navbar-dark bg-primary container">

		<?php if ( 'container' == $container ) : ?>
			<div class="container">
		<?php endif; ?>

					<!-- Your site title as branding in the menu -->
					<?php if ( ! has_custom_logo() ) { ?>

						<?php if ( is_front_page() && is_home() ) : ?>

							<!-- <h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1> -->

						<?php else : ?>

							<!-- <a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a> -->

						<?php endif; ?>


					<?php } else {
						the_custom_logo();
					} ?><!-- end custom logo -->

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
					<span class="navbar-toggler-icon"></span>
				</button>

				<!-- The WordPress Menu goes here -->
				<div class="navbar-brand">

				</div>
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav justify-content-center',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				); ?>
			<?php if ( 'container' == $container ) : ?>
			</div><!-- .container -->
			<?php endif; ?>

		</nav><!-- .site-navigation -->

	</div><!-- #wrapper-navbar end -->
