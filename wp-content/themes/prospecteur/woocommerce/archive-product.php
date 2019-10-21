<?php 
	/* Template Name: Woo Boutique */ 



/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */
	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly
	}

	get_header(); 
?>
<body class="page-index page-boutique preload archive-product">
<div class="container-fluid">
    <?php include( locate_template( 'nav-main.php' ) ); ?>
    <div class="row bg-content">
        <?php include( locate_template( 'col-gauche.php' ) ); ?>       
        <div class="col-lg-8 col-md-12">
        	<div class="row">	
				<div class="col-md-4 col-lg-3">
					<?php get_sidebar(); ?>
				</div>
				<!-- /.col -->
				<div class="col-md-8 col-lg-9">
					<br />
					<div class="youpla 22222">					
						<?php
							/**
							 * woocommerce_archive_description hook.
							 *
							 * @hooked woocommerce_taxonomy_archive_description - 10
							 * @hooked woocommerce_product_archive_description - 10
							 */
							do_action( 'woocommerce_archive_description' );

						?>
						<!-- CAROUSEL PRODUITS -->
                    <?php echo do_shortcode( '[wpv-view name="v-slider-woo-produits-accueil"]' ); ?>
						<?php if ( have_posts() ) : ?>

							<?php
								/**
								 * woocommerce_before_shop_loop hook.
								 *
								 * @hooked woocommerce_result_count - 20
								 * @hooked woocommerce_catalog_ordering - 30
								 */
								echo '<div style="background-color: #fff; border: 1px solid #ccc; padding: 1.5em;">';
									do_action( 'woocommerce_before_shop_loop' );
								echo '</div>';
							?>

							<?php woocommerce_product_loop_start(); ?>

								<?php woocommerce_product_subcategories();  ?>

								<?php while ( have_posts() ) : the_post(); ?>

									<?php wc_get_template_part( 'content', 'product' ); ?>

								<?php endwhile; // end of the loop. ?>

							<?php woocommerce_product_loop_end(); ?>

							<?php
								/**
								 * woocommerce_after_shop_loop hook.
								 *
								 * @hooked woocommerce_pagination - 10
								 */
								do_action( 'woocommerce_after_shop_loop' );
							?>

						<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

							<?php wc_get_template( 'loop/no-products-found.php' ); ?>

						<?php endif; ?>
						

						<?php
						/**
						 * woocommerce_after_main_content hook.
						 *
						 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
						 */
						do_action( 'woocommerce_after_main_content' );
						?>
					</div>
					<!-- /.youpla -->
				</div>
				<!-- /.col -->
			</div>
        	<!-- /.row -->	
        </div>
        <!-- /.col -->
        <?php include( locate_template( 'col-droite.php' ) ); ?> 
        <div class="clearfix">&nbsp;</div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
<?php get_footer(); ?>