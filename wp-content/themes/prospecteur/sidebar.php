<?php if ( is_active_sidebar( 'sidebar-1' )  ) : ?>
	<br />
	<div id="woo-sidebar" class="sidebar widget-area thumbnail" role="complementary">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div><!-- .sidebar .widget-area -->
<?php endif; ?>
<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
