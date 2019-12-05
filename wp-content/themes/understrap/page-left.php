<?php
/**
* Template Name: Gauche
*
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<?php get_template_part( 'sidebar-templates/sidebar', 'left' ); ?>

			<div
				class="<?php if ( is_active_sidebar( 'left-sidebar' ) ) : ?>col-md-8<?php else : ?>col-md-12<?php endif; ?> content-area"
				id="primary">

				<main class="site-main" id="main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'loop-templates/content', 'page' ); ?>



					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer(); ?>
