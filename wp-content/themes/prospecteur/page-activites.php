<?php /* Template Name: Activites */ ?>
<?php get_header(); ?>
<body class="page-page page-single" style="background-image: url(<?php modifierBackground(); ?>);">
<div class="container-fluid">
    <?php include( locate_template( 'nav-main.php' ) ); ?>
    <div class="row bg-content">
        <?php include( locate_template( 'col-gauche.php' ) ); ?>       
        <div class="col-lg-8 col-md-12">
            <?php if ( is_page( 'activites' ) ) : ?>
            <div class="woo-fiche">               
                <div class="row">
                    <div class="col-lg-12">
                        <?php the_title( '<h1 class="h1-page-title">', '</h1>' ); ?>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <div class="row">
                  <div class="col-lg-12">
                     <?php include( locate_template( 'loop.php' ) ); ?> 
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
                <br />
                <div class="row">
                    <div class="col-lg-12">
                        <style>
                            .lg-8 { width: 66.6667%;  }
                        </style>
                        <?php echo do_shortcode( '[wpv-view name="dev-activites-parametric"]' ); ?>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div> 
            <!-- /.woo-fiche --> 
        <?php else : ?>
            <div class="row">
                    <div class="col-lg-9 col-lg-offset-3">
                        <?php the_title( '<h1 class="h1-page-title">', '</h1>' ); ?>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-3">
                        <div class="sidebar-nav-secondary">
                            <?php if ( is_active_sidebar( 'sidebar-5' )  ) : ?>
                                <div class="" role="complementary">
                                    <?php dynamic_sidebar( 'sidebar-5' ); ?>
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
        <!-- /.col -->
        <?php include( locate_template( 'col-droite.php' ) ); ?> 
        <div class="clearfix">&nbsp;</div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
<?php get_footer(); ?>