<?php
/**
 * Activité post partial template.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article class="activite" id="post-<?php the_ID(); ?>">
	<div class="activite-wrapper">


		<?php echo '<div class="date-evenement">' ?>
			<i class="fa fa-calendar"></i>
			<span>
		<?php echo get_post_meta($post->ID, 'date_evenement', true); ?>
		</span>
		<?php echo '</div>'?>

		<div class="entry-meta">
			<a href="<?php echo get_post_permalink( $id ); ?>">
			<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
			</a>
		</div><!-- .entry-meta -->
</div>

</article><!-- #post-## -->
