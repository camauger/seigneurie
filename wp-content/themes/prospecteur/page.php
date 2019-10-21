<?php get_header(); ?>
<body class="page-page">
<div class="container-fluid">
    <?php include( locate_template( 'nav-main.php' ) ); ?>
    <div class="row bg-content">
        <?php include( locate_template( 'col-gauche.php' ) ); ?>       
        <div class="col-lg-8 col-md-12">
            <div class="woo-fiche">               
                <div class="row">
                    <div class="col-lg-9 col-lg-offset-3">
                        <?php the_title( '<h1 class="h1-page-title">', '</h1>' ); ?>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <?php if( is_page( 'panier' ) || is_page( 'checkout' ) ) : ?>
                    <div class="row page-panier">
                        <div class="col-lg-12">
                            <?php include( locate_template( 'loop.php' ) ); ?>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                <?php else : ?>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="sidebar-nav-secondary">
                                <?php if ( is_active_sidebar( 'sidebar-2' )  ) : ?>
                                    <div class="" role="complementary">
                                        <?php dynamic_sidebar( 'sidebar-2' ); ?>
                                    </div><!-- .sidebar .widget-area -->
                                <?php endif; ?>
                            </div>
                            <!-- /.thumbnail -->
                        </div>
                        <!-- /.col -->
                        <div class="col-lg-9">
                            <?php include( locate_template( 'loop.php' ) ); ?>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                <?php endif; ?>
                
            </div> 
            <!-- /.woo-fiche -->           
        </div>
        <!-- /.col -->
        <?php include( locate_template( 'col-droite.php' ) ); ?> 
        <div class="clearfix">&nbsp;</div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
<?php get_footer(); ?>