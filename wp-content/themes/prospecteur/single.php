<?php get_header(); ?>
<body class="page-single preload">
<div class="container-fluid">
    <?php include( locate_template( 'nav-main.php' ) ); ?>
    <div class="row bg-content">
        <?php include( locate_template( 'col-gauche.php' ) ); ?>       
        <div class="col-lg-8 col-md-12">
<!-- mary-blog-article -->
            <?php if( is_singular( 'mary-blog-article' )): ?>
                <div class="woo-fiche">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php the_title( '<h1 class="h1-page-title">', '</h1>' ); ?>
                            <?php include( locate_template( 'loop.php' ) ); ?>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.woo-fiche -->
<!-- activity-details -->
            <?php else: ?>
                <div class="woo-fiche">
                    <!-- CPT - Activités -->
                    <?php if ( is_singular ( 'activite' ) ) : ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <?php the_title( '<h1 class="h1-page-title">', '</h1>' ); ?>
                                <?php //include( locate_template( 'loop.php' ) ); ?>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <?php echo do_shortcode( '[wpv-view name="activity-details"]' ); ?>

                    <!-- POSTS/ARTICLES - Nouvelles -->
                    <?php  elseif ( is_singular ( 'post' ) ) : ?>
                        <?php echo do_shortcode( '[wpv-view name="v-articles"]' ); ?>
                    <?php endif; ?>
                </div>
                <!-- /.woo-fiche -->
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