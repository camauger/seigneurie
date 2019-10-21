<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">
		<!-- <img class="img-responsive bg-footer" src="https://seigneurieiledorleans.com/wp-content/themes/prospecteur/images/bg-bottom-2.png" alt="" title=""> -->
		<div class="row">

			<div class="col footer-note">
<ul>
	<li>Tous droits réservés © 2019 Seigneurie île d'Orléans </li>
	<li> - <a href="mailto:info@seigneurieiledorleans.com" title="info@seigneurieiledorleans.com">info@seigneurieiledorleans.com</a> - </li>
	<li>(418) 829-0476</li>
</ul>



            </div>

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>
