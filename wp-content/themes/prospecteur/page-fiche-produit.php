<?php /* Template Name: Fiche produit */ ?>
<?php get_header(); ?>
<body class="page-fiche-produit page-single">
<div class="container-fluid">
    <?php include( locate_template( 'nav-main.php' ) ); ?>
    <div class="row bg-content">
        <?php include( locate_template( 'col-gauche.php' ) ); ?>
        <div class="col-lg-8 col-md-12">
            <div>
                <br />
                 
                 <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <h2>Détails du produit</h2>
                    </div>
                </div>
               
                <div class="row">
                    <div class="col-lg-2">
                        <?php 
                            array(
                                  'number' => 'null',
                                  'orderby' => 'title',
                                  'order' => 'ASC',
                                  'columns' => '4',
                                  'hide_empty' => '1',
                                  'parent' => '',
                                  'ids' => ''
                             );

                          echo do_shortcode( '[product_categories number="12" parent="0"]' );
                          echo do_shortcode( '[sale_products per_page="12"]' );
                          echo do_shortcode( '[recent_products per_page="12" columns="1"]' );
                        ?>
                    </div>
                    <!-- /.col -->
                    <div class="col-lg-8">
                         <div class="row">
                            <div class="col-lg-12">
                                <div class="woo-fiche">
            	                   <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); the_content(); endwhile; endif; ?>
            			        </div>
            			        <!-- /.woo-fiche -->
                              </div>
                        </div>
                        <!-- /.row-->
                        <br />
                         <div class="row">
                            <div class="col-lg-12">
                                <?php include( locate_template( 'carousel-produits.php' ) ); ?>
                            </div>
                        </div>
                        <!-- /.row-->
                    </div>
                    <!-- /.col -->
                    <div class="col-lg-2">
                        <div class="thumbnail">
                            <h4 class="text-center">Your cart <i class="fa fa-shopping-cart"></i></h4>
                            <a class="cart-contednts btn btn-mauve btn-block" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php echo sprintf (_n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a>
                        </div>
                        <a class="btn btn-vert btn-block" href="xxx" title="xxx"><i class="fa fa-arrow-circle-right"></i> Continue shopping</a>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div> 
            <!-- /.border -->     
        </div>
        <!-- /.col -->
        <?php include( locate_template( 'col-droite.php' ) ); ?>
        <div class="clearfix">&nbsp;</div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
<?php // get_sidebar(); ?>
<?php get_footer(); ?> 