<?php /* Template Name: Full page */ ?>
<?php get_header(); ?>
<body class="page-full">
<div class="container-fluid">
    <?php include( locate_template( 'nav-main.php' ) ); ?>
    <div class="row bg-content">
        <?php include( locate_template( 'col-gauche.php' ) ); ?>       
        <div class="col-lg-8 col-md-12">
            <div class="woo-fiche">               
                <div class="row hidden">
                    <div class="col-lg-9 col-lg-offset-3">
                        <?php the_title( '<h1 class="h1-page-title" style="border-bottom: none;">', '</h1>' ); ?>
                        <div class="accueil-nouvelles">
                        <div class="caption">
                            <div class="thumbnail">
                                <div class="accueil-nouvelle">
                                    <h2>Le blogue de Mary</h2>
                                </div>
                                <!-- /.accueil-nouvelle -->
                                <div class="accueil-nouvelle">
                                <img class="img-responsive alignright" src="<?php bloginfo('template_directory'); ?>/images/huile.jpg" alt="Les activités" title="Les activités">
                                <h4>Les migraines et les céphalées</h4>                        
                                <p><sup><i class="fa fa-quote-left" style="color: #3F1C78;"></i></sup> &nbsp;Je souffre de migraines et de céphalées du plus loin que je me souvienne. Je me rappelle avoir pensé lors de mes accouchements et mon mariage, j'espère ne pas avoir mal à la tête!</p><p>Ma mère en souffre, mes enfants aussi! J'ai essayé plusieurs choses (vraiment beaucoup) et puisque j'essaie d'éviter les médicaments dans la mesure du possible, voici ce que j'utilise depuis des années avec un très grand succès. Il ...faut dire aussi que plus je prends de l'âge, moins pires elles sont.</p>
                                <p>On me demande souvent en boutique de fabriquer ce que j'utilise, alors c'est fait!</p>
                                <p>Je vous présente l'<a href="#">Élixir d'Hygie</a> (Hygie, déesse de la santé). C'est un mélange justicieux d'huiles essentielles qui vous apporteront une aide précieuse! Disponible en boutique dès le 17 août 2015 au prix de 18$.</p>
                                <p>Si vous avez des questions, n'hésitez pas à me contacter&hellip;<sub><i class="fa fa-quote-right" style="color: #3F1C78;"></i></sub></p>
                                <p class="text-right"><a href="#" class=""><i class="fa fa-angle-double-right"></i> Lire le blogue de Mary</a></p>
                                </div>
                            </div>
                            <!-- /.caption -->
                        </div>
                        <!-- /.caption -->
                    </div>
                    <!-- /.thumbnail -->

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <?php include( locate_template( 'loop.php' ) ); ?>                  
            </div> 
            <!-- /.woo-fiche --> 
            
<!-- CAROUSEL PRODUITS -->
<style type="text/css">
.carousel-inner .item a:first-child {
    float: left;
    width: 20%;
}
.carousel-accueil-produits .carousel-caption1 {
    float: left;
    width: 70%;
}
.carousel-accueil-produits h2 {
    color: #fff !important;
    margin-top: 0.125em;
}
</style>
<div class="carousel-accueil-produits hidden">
    <div id="carousel-example-generic-2" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic-2" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic-2" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic-2" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            
            <div class="item active">
                <a href="https://seigneurieiledorleans.com/hello-world/">
                    <img class="img-responsive" src="<?php bloginfo('template_directory'); ?>/images/sio-produit-secrets-helene.jpg" />
                </a>
                <div class="carousel-caption1">
                    <div class="inner-content-carousel-produit">
                    <h2>Les secrets d'Hélène</h2>
                    <p>En lien avec Hélène de Troie, dont la grande beauté enflamma la Grèce et entraina un joyeux désordre dont on parle encore aujourd'hui...</p>
                    <br />
                    <a href="#" class="btn btn-primary btn-vert">En savoir plus</a>
                    </div>
                </div>
            </div>

            <div class="item">
                <a href="https://seigneurieiledorleans.com/hello-world/">
                    <img class="img-responsive" src="<?php bloginfo('template_directory'); ?>/images/sio-produit-bain-cleopatre.jpg" />
                </a>
                <div class="carousel-caption1">
                    <div class="inner-content-carousel-produit">
                        <h2>Le Bain de Cléopâtre</h2>
                        <p>Une mousse de bain luxueuse au lait de chèvre. Laissez vous tremper pour avoir une peau de soie!</p>
                        <br />
                        <a href="#" class="btn btn-primary btn-vert">En savoir plus</a>
                    </div>
                </div>
            </div>
            <div class="item">
                <a href="https://seigneurieiledorleans.com/hello-world/">
                    <img class="img-responsive" src="<?php bloginfo('template_directory'); ?>/images/sio-produit-cadeau-isis.jpg" />
                </a>
                <div class="carousel-caption1">
                    <div class="inner-content-carousel-produit">
                        <h2>Le Cadeau d'Isis</h2>
                        <p>Le Cadeau d'Isis au lait de chèvre protégera votre peau tout en l'hydratant avec soin.</p>
                        <br />
                        <a href="#" class="btn btn-primary btn-vert">En savoir plus</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.carousel-inner -->
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic-2" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic-2" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- /.carousel-example-generic-2 -->
</div>
<!-- /.carousel -->           
        </div>
        <!-- /.col -->
        <?php include( locate_template( 'col-droite.php' ) ); ?> 
        <div class="clearfix">&nbsp;</div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
<?php get_footer(); ?>