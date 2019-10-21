<?php /* Template Name: Blogue */ ?>
<?php get_header(); ?>
<body class="page-page page-single" style="background-image: url(<?php modifierBackground(); ?>);">
<div class="container-fluid">
    <?php include( locate_template( 'nav-main.php' ) ); ?>
    <div class="row bg-content">
        <?php include( locate_template( 'col-gauche.php' ) ); ?>       
        <div class="col-lg-8 col-md-12">
            <div class="woo-fiche">               
                <div class="row">
                    <div class="col-lg-9 col-lg-offset-3">
                        <?php the_title( '<h1 class="h1-page-title" style="border-bottom: none;">', '</h1>' ); ?>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <?php include( locate_template( 'loop.php' ) ); ?>  
                    <div class="col-md-6 col-md-offset-3 col-lg-3 col-lg-offset-0">
                        <?php if ( is_active_sidebar( 'sidebar-3' )  ) : ?>
                            <div id="woo-sidebar" class="sidebar widget-area" role="complementary">
                                <div class="padding" style="padding-top: 0;"><?php dynamic_sidebar( 'sidebar-3' ); ?></div>
                            </div><!-- /.sidebar .widget-area -->
                        <?php endif; ?>
                        <?php include( locate_template( 'facebook.php' ) ); ?>
                    </div> 
                    <!-- /.col -->
                </div>
                <!-- /.row -->               
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