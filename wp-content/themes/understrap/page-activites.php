<?php
/**
* Template Name: Activites
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
<div class="container">
  <div class="row">
    <?php $args = array( 'post_type' => 'activite', 'posts_per_page' => 10 );
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post();

      get_template_part( 'loop-templates/content-activite', get_post_format() );

    endwhile; ?>
  </div>  
</div>




				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer(); ?>
