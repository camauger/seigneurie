<?php /* Template Name: CustomPageT1 */ ?>
<?php get_header(); ?> <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : ?>
                <?php the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; ?>
        <?php endif; ?>
<body class="page-index preload">
<div class="container-fluid">
    <div class="row bg-head">
        <div class="col-xs-12 col-sm-6 col-md-3 bg-success">
        </div>
        <!-- /.col -->
         <div class="col-xs-12 col-md-6 col-sm-6">
            <div class="row">
                <div class="col-md-3">
                    <div class="fade-in one" style="margin-top: 1.5em;">
                        <h2 class="head-citation">La beauté</h2>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-4 col-md-offset-1" style="margin-bottom: 6em;">
                    <div class="fade-in two">
                        <h2 class="head-citation">grandeur nature</h2>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <a href="#" title="Accueil"><img class="sio-logo" src="<?php bloginfo('template_directory'); ?>/images/sio-logo.png" alt="" title=""></a>
            <img class="img-responsive" src="<?php bloginfo('template_directory'); ?>/images/bg-top-nav.png" alt="" title="">

            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#">Visites et forfaits <span class="sr-only">(current)</span></a></li>
                            <li><a href="#">Activités jeunesse</a></li>
                            <li><a href="#">Mariages et événements</a></li>  
                            <li><a href="#">Albums photos</a></li>  
                            <li><a href="#">Nous joindre</a></li>     
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>
        </div>
        <!-- /.col -->
         <div class="col-xs-12 col-sm-6 col-md-3 bg-info">
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    
    <div class="row bg-content">
        <div class="col-xs-12 col-sm-6 col-md-3 hidden-xs">
            <img class="center-block sio-ferronerie-gauche" src="<?php bloginfo('template_directory'); ?>/images/sio-ferronerie-gauche-1.png" alt="" title="">
            <div class="clearfix">&nbsp;</div>
        </div>
        <!-- /.col -->
        <div class="col-md-6 col-sm-6 col-xs-12" style=" background-color: #fff; padding: 0;">
            <div class="border-vertical padding-horizontal">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <br />
                        <div class="thumbnail">
                            <img src="<?php bloginfo('template_directory'); ?>/images/btn-accueil-seigneurie.png" alt="Les jardins de la Seigneurie" title="Les jardins de la Seigneurie">
                            <div class="caption">
                                <p>Pour tout savoir sur nous, découvrir notre histoire et nos attraits</p>
                                <p><a href="#" class="btn btn-mauve center-block" role="button"><i class="fa fa-angle-double-right"></i> En savoir plus</a></p>
                            </div>
                            <!-- /.caption -->
                        </div>
                        <!-- /.thumbnail -->
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-12 col-sm-6 col-md-4"> <br />
                        <div class="thumbnail">
                            <a href="#" title="La lavande"><img class="img-responsive" src="<?php bloginfo('template_directory'); ?>/images/btn-accueil-lavande.png" alt="La lavande" title="La lavande"></a>
                            <div class="caption">
                                <p>Vivez une expérience inoubliable en visitant nos jardins</p>
                                <p><a href="#" class="btn btn-mauve center-block" role="button"><i class="fa fa-angle-double-right"></i> En savoir plus</a></p>
                             </div>
                            <!-- /.caption -->
                        </div>
                        <!-- /.thumbnail -->
                    </div>
                    <!-- /.col -->
                     <div class="col-xs-12 col-sm-6 col-md-4"> <br />
                        <div class="thumbnail">
                        <a href="#" title="Les activités"><img class="img-responsive" src="<?php bloginfo('template_directory'); ?>/images/btn-accueil-experience.png" alt="Les activités" title="Les activités"></a> <div class="caption">
                        <p>Apprenez-en davantage sur ses propriétés et sa transformation</p>
                        <p><a href="#" class="btn btn-mauve center-block" role="button"><i class="fa fa-angle-double-right"></i> En savoir plus</a></p>
                        </div>
                            <!-- /.caption -->
                        </div>
                    </div>
                    <!-- /.col -->
                     <div class="col-xs-12 col-sm-6 col-md-3 hidden">
                        <a class="btn-subnav-interieure" id="btn-boutique" href="#" title="xxx">&nbsp;</a>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <div class="accueil-nouvelles">
                            <div class="caption">
                                <div class="accueil-nouvelle thumbnail">
                                    <h2>En bref&hellip;</h2>
                                    <h4>La saison approche à grand pas!</h4>
                                    <p class="nouvelle-date"><i class="fa fa-calendar"></i> 23 mars 2016</p>
                                    <p>Apprenez-en davantage sur ses propriétés et sa transformation. Pour tout savoir sur nous, découvrir notre histoire et nos attraits</p>
                                    <p><a href="#" class="btn btn-sm btn-vert" role="button"><i class="fa fa-angle-double-right"></i> En savoir plus</a></p>
                                </div>
                                <!-- /.accueil-nouvelle -->
                                 <div class="accueil-nouvelle thumbnail">
                                    <h2>À ne pas manquer</h2>
                                    <h4>Nouvelle lorem ipsum dolor sit amet</h4>
                                    <p class="nouvelle-date"><i class="fa fa-calendar"></i> 18 février 2016</p>
                                    <p>Parcourez notre piste d’hébertisme en tant que coureur des bois ou amérindien et partez à la découverte de la nature! Jeux, activités physiques, contes et légendes... La magie est au rendez-vous pour les élèves du primaire de 6 à 10 ans.</p>
                                    <p><a href="#" class="btn btn-sm btn-vert" role="button"><i class="fa fa-angle-double-right"></i> En savoir plus</a></p>
                                
                                    <h4>Lorem ipsumé doloris acta rus</h4>
                                    <p class="nouvelle-date"><i class="fa fa-calendar"></i> 14 janvier 2016</p>
                                    <p>Découvrir notre histoire et nos attraits. Vivez une expérience inoubliable en visitant nos jardins</p>
                                    <p><a href="#" class="btn btn-sm btn-vert" role="button"><i class="fa fa-angle-double-right"></i> En savoir plus</a></p>
                                </div>
                                <!-- /.accueil-nouvelle -->
                            </div>
                            <!-- /.caption -->
                        </div>
                        <!-- /.thumbnail -->
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-12 col-md-6">
                         <div class="">
                            <div class="caption">
                                 <p class="lead"><span style="font-family: Georgia, serif;">Les pensées de Marie</span></p>
                                <img class="img-responsive alignright" src="<?php bloginfo('template_directory'); ?>/images/huile.jpg" alt="Les activités" title="Les activités">                               
                                <p><sup><i class="fa fa-quote-left" style="color: #3F1C78;"></i></sup> &nbsp;Ce jardin est aménagé aux couleurs de la Provence : mauve, jaune et vert. Les 75 000 plants de lavande sont plantés en diagonale pour donner l'illusion aux visiteurs d'une mer mauve balayée par le vent du fleuve.</p>
                                <p>Le pourtour du jardin de quatre hectares est composé d'une rangée de 500 sureaux jaunes et d'une deuxième rangée de 500 cèdres verts. Au centre, une fontaine d'eau coule en permanence.</p>
                                <p>Tout près, des bancs victoriens permettent de prendre le temps de respirer le doux parfum de la lavande et de contempler les beautés du paysage, tels que le fleuve Saint-Laurent, le mont Sainte-Anne et le clocher de l'Église de Saint-François. <sub><i class="fa fa-quote-right" style="color: #3F1C78;"></i></sub></p>
                                <p><a href="#" class="btn btn-mauve" role="button"><i class="fa fa-angle-double-right"></i> Lire la suite</a></p>
                            </div>
                            <!-- /.caption -->
                        </div>
                        <!-- /.thumbnail -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                 <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <a class="img-responsive" id="btn-calendrier" href="#" title="xxx">&nbsp;</a>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-12 col-sm-4">
                        <a class="img-responsive" id="btn-calendrier" href="#" title="xxx">&nbsp;</a>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-12 col-sm-4">
                        <a class="img-responsive" id="btn-calendrier" href="#" title="xxx">&nbsp;</a>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->        
            </div> 
            <!-- /.border -->           
        </div>
        <!-- /.col -->
         <div class="col-xs-12 col-sm-6 col-md-3 hidden-xs">
            <img class="center-block sio-ferronerie-droite" src="<?php bloginfo('template_directory'); ?>/images/sio-ferronerie-droite-1.png" alt="" title="">
            <div class="clearfix">&nbsp;</div>
        </div>
        <!-- /.col -->
        <div class="clearfix">&nbsp;</div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
<?php // get_sidebar(); ?>
<?php get_footer(); ?>