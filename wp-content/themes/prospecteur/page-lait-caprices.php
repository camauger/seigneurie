<?php /* Template Name: Lait Caprices */ ?>
<?php get_header(); ?>
<style type="text/css">
#href-home {
    top: 22.5em;
}
</style>
<body class="page-page page-single" style="background-image: url(<?php modifierBackground(); ?>);">
<div class="container-fluid">
    <?php include( locate_template( 'nav-main-caprices.php' ) ); ?>
    <div class="row bg-content">
        <?php include( locate_template( 'col-gauche.php' ) ); ?>       
        <div class="col-lg-8 col-md-12">
            <div class="woo-fiche">               
                <div class="row">
                    <div class="col-lg-9 col-lg-offset-3">
                        <!-- h1 class="h1-page-title lait-caprices-tilde"><span>Lait</span><span class="tilde">&tilde;</span><span>Caprices</span></h1 -->
                        <?php the_title( '<h1 class="h1-page-title">', '</h1>' ); ?>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-3">
                        <div class="sidebar-nav-secondary">
                            <?php if ( is_active_sidebar( 'sidebar-6' )  ) : ?>
                                <div class="" role="complementary">
                                    <?php dynamic_sidebar( 'sidebar-6' ); ?>
                                </div><!-- .sidebar .widget-area -->
                            <?php endif; ?>
                        </div>
                        <?php include( locate_template( 'facebook.php' ) ); ?>
                        <!-- /.thumbnail -->
                        <div class="thumbnail">
                        <div style="padding: 1.5em;"> 
                            <img src="https://seigneurieiledorleans.com/wp-content/uploads/2017/07/sio-canada-150-experience.jpg" class="img-responsive" alt="La Seigneurie de l’île d’Orléans - Récipiendaire Expérience jardin Canada 150" title="La Seigneurie de l’île d’Orléans - Récipiendaire Expérience jardin Canada 150" />
                            
                            <p style="margin-top: 1.5em;">La <strong>Seigneurie de l’île d’Orléans</strong> est l’heureux récipiendaire d’une désignation <strong>« Expérience jardin Canada 150 »</strong> décernée par le Conseil canadien du jardin en collaboration avec l’Association canadienne des pépiniéristes et des paysagistes.</p>
                        </div>
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