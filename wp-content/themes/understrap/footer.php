<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod('understrap_container_type');
?>

<?php get_template_part('sidebar-templates/sidebar', 'footerfull'); ?>

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_attr($container); ?>">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer footer" id="colophon">


					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="visible-lg-block">
									<img class="img-responsive bg-footer" src="<?php bloginfo('template_directory'); ?>/images/bg-bottom-2.png" alt="" title="">
								</div>


								<div class="visible-xs-block">
									<div class="text-center">
										<p style="color: #fff; padding-top: .5em;"><?php bloginfo('name'); ?>
											<br />
											<?php echo (ICL_LANGUAGE_CODE == 'en') ? 'All rights reserved' : 'Tous droits réservés'; ?> &copy; <?php echo date('Y'); ?>
											<br />
											<a style="color: #fff;" href="mailto:info@seigneurieiledorleans.com" title="info@seigneurieiledorleans.com">info@seigneurieiledorleans.com</a>
											<br />
											<a style="color: #fff !important;" tabIndex="-1" href="tel:14188290476">418 829-0476</a>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</footer>



			</div>
			<!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>