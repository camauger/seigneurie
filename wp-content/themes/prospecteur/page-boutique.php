<?php /* Template Name: Demo Boutique 2018 */ ?>
<?php get_header(); ?>
<body class="page-page">
    <style type="text/css">
        #boutiqueDemo {
            margin-top: 0; 
            margin-bottom: 4.5em;
        }
        #boutiqueDemo a {
            text-decoration: none;
        }
        #boutiqueDemo, 
        #boutiqueDemo span.intro, 
        #boutiqueDemo span.libelle {
            color : #fff; 
            display: block; 
            font-family: 'Open Sans', sans-serif;
        }
        #boutiqueDemo span.intro { 
            font-size: 1.5em;
            font-weight: 300; 
        }
        #boutiqueDemo span.libelle {              
            font-size: 1.5em;
            font-weight: 700; 
            letter-spacing: 1px; 
            text-decoration: none;
            text-transform: uppercase;
        }
        #boutiqueDemo .padding { 
            padding: 6em 2.5em 2.5em;
        }
        #boutiqueDemo .metroBoutique span.accroche { 
            display: block;
            text-align: center;
            margin-bottom: 3em;
            text-transform: uppercase;
            font-weight: 700;
        }
        #boutiqueDemo .metroBoutique span.intro, 
        #boutiqueDemo .metroBoutique span.libelle {
            color: rgba( 88, 70, 137, 1 ); 
            display: block; 
            font-size: 2em; 
            text-align: center; 
            white-space: nowrap;
        }
        #boutiqueDemo .metroBoutique { 
            display: block; 
            padding: 3em 2.5em 2.5em;
        }
        #boutiqueDemo .metroActivites .padding { 
             display: block; 
            padding: 9em 2.5em 2.5em;
        }
        #boutiqueDemo .metroBoutique img { 
            margin: 0 auto; 
            padding-top: 3em;
        }
        #boutiqueDemo .metroSeigneurie { 
            /*background-image: url( "https://seigneurieiledorleans.com/wp-content/themes/undertrap/images/accueil/sio-bg-seigneurie-fontaine.jpg" ); */
            background-position: center; 
            background-repeat: no-repeat;
            background-size: cover; 
            border-bottom: 3px solid #fff; 
            display: block;
        }
        .metroSuivezNous, 
        .metroInfolettre { 
            color: #fff; 
            display: block;
            font-size: .75em; 
            padding: 2.5em;
        }
        .metroSuivezNous i, 
        .metroInfolettre i {
            float: left; 
            height: 1.5em; 
            line-height: 1.5em; 
            margin-right: .75em; 
            width: 10%; 
        } 
        .metroSuivezNous {        
            border-right: 3px solid #fff;
        }
        #boutiqueDemo .metroLavande { 
            /*background-image: url( "https://seigneurieiledorleans.com/wp-content/themes/undertrap/images/accueil/sio-lavande-2.jpg" ); */ 
            background-repeat: no-repeat;
            background-size: cover; 
            border-top: 3px solid #fff; 
            display: block; 
        }
        .metroActivites { 
            /*background-image: url( "https://seigneurieiledorleans.com/wp-content/themes/undertrap/images/accueil/sio-banc.jpg" );*/
            background-repeat: no-repeat;
            background-size: cover;
            display: block; 
            text-align: center;
        }
        /* no-gutters Class Rules */
        #boutiqueDemo .row.no-gutters {
            margin-right: 0;
            margin-left: 0;
        }
        #boutiqueDemo .row.no-gutters > [class^="col-"],
        #boutiqueDemo .row.no-gutters > [class*=" col-"] {
            padding-right: 0;
            padding-left: 0;
        }
        #carousel-example-generic-1 {
            margin-bottom: 3px;
        }
        .slide p {
            color: #000;
        }
        #boutiqueDemo  h4 { 
            color: rgba(107,134,18,1);
            font-family: 'Open Sans', sans-serif; 
            margin: 1.5em 0 0.75em;
        }
        #boutiqueDemo .libelleLivraison {
            color: #666; 
            font-family: 'Open Sans', sans-serif; 
        }
        
        
@media only screen and (max-width : 1200px) {
    .metroSuivezNous {
        border-right: 0;
        border-bottom: 3px solid #fff;
    }
}

/* Medium Devices, Desktops */
@media only screen and (max-width : 992px) {
    .metroSuivezNous {
        border-right: 3px solid #fff;
        border-bottom: 0;
    }
}

/* Small Devices, Tablets */
@media only screen and (max-width : 768px) {
    .metroSuivezNous {
        border-right: 0;
        border-bottom: 3px solid #fff;
    }
}

/* Extra Small Devices, Phones */ 
@media only screen and (max-width : 480px) {

}

/* Custom, iPhone Retina */ 
@media only screen and (max-width : 320px) {

}

    </style>
    <script type="text/javascript">
        $( document ).ready( function() 
        {   
            $('.jColHeight').equalHeights();
            $('.jSocialHeight').equalHeights();
            $('.carouselAccueil').carousel();
        }); // ready 

        $(window).load(function() 
        { 
            $('.jColHeight').equalHeights();
            $('.jSocialHeight').equalHeights();
        }); // load

        $(window).resize(function()
        { 
            $('.jColHeight').equalHeights();
            $('.jSocialHeight').equalHeights();
        }); // resize


    </script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet"> 
    <link href="https://seigneurieiledorleans.com/wp-content/themes/undertrap/js/web-fonts-with-css/css/fontawesome-all.css" rel="stylesheet">
<div class="container-fluid">
    <?php include( locate_template( 'nav-main.php' ) ); ?>
    <div class="row">
        <?php include( locate_template( 'col-gauche.php' ) ); ?>
        <div class="col-lg-8" id="boutiqueDemo">
            <div class="row no-gutters">
                <div class="col-xs-12 col-sm-12 col-col-md-12 col-lg-12">
                    <?php echo do_shortcode( '[wpv-view name="v-diaporama-accueil"]' ); ?>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row no-gutters">                
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-6 jColHeight" style="background-color: #fff;">
                    <div class="row no-gutters">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <?php echo do_shortcode( '[wpv-view name="accueil-section-activite"]' ); ?>
                            <!-- /.padding -->
                        </div>
                        <!-- /.col -->                        
                        <div class="col-xs-12 col-sm-6 col-md-12 col-lg-6" style="background: #779121;">
                            <a href="https://www.facebook.com/pages/Seigneurie-de-lIle-dOrl%C3%A9ans/168814096507915" target="_blank" class="metroSuivezNous jSocialHeight">
                                <i class="fab fa-facebook fa-3x"></i>
                                <span class="intro">Suivez-nous</span>
                                <span class="libelle">sur&nbsp;Facebook</span>
                            </a>
                            <!-- /.padding -->
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-12 col-sm-6 col-md-12 col-lg-6" style="background: rgba(88,70,137,1);">
                            <a href="http://seigneurieiledorleans.us13.list-manage1.com/subscribe?u=a7847b8ac2e027fc215f0d4f4&id=e32ba69d4f" class="metroInfolettre jSocialHeight">
                                <i class="fal fa-paper-plane fa-3x"></i>
                                <span class="intro">Inscrivez-vous</span>
                                <span class="libelle">à&nbsp;l'infolettre</span>
                            </a>
                            <!-- /.padding -->
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-12 col-sm-12 col-col-md-12 col-lg-12" >
                            <?php echo do_shortcode( '[wpv-view name="accueil-section-lavande"]' ); ?>
                            <!-- /.padding -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.col -->
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 jColHeight">
                    <a href="https://seigneurieiledorleans.com/boutique/" class="padding metroBoutique text-center" >
                        <div class="text-center hidden"><i class="fal fa-shopping-basket fa-4x"></i></div>
                        <span class="intro">La boutique</span>
                        <span class="libelle">en ligne</span>
                        <img src="https://seigneurieiledorleans.com/wp-content/themes/undertrap/images/accueil/sio-bg-boutique.jpg" class="img-responsive" alt="La boutique en ligne" title="La boutique en ligne">
                        <h4>LIVRAISON GRATUITE</h4>
                        <div class="libelleLivraison">
                            à l’achat de 80 $ et + <br><small>avant taxes</small>
                        </div>
                    </a>
                    <!-- /.padding -->
                </div>
                <!-- /.col -->
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 ">
                    <?php echo do_shortcode( '[wpv-view name="accueil-section-seigneurie"]' ); ?>
                    <!-- /.padding -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row hidden">
                <div class="col-lg-3" style="background: gray;">
                    <div class="padding">
                        <h2>Suivez-nous</h2>
                        <a target="_blank" href="https://www.facebook.com/pages/Seigneurie-de-lIle-dOrl%C3%A9ans/168814096507915">Facebook</a>
                    </div>
                    <!-- /.padding -->
                </div>
                <!-- /.col -->
                <div class="col-lg-3" style="background: blue;">
                    <div class="padding">
                        <i class="fas fa-user"></i>
                        <h2>Inscrivez-vous</h2>
                        <a href="http://seigneurieiledorleans.us13.list-manage1.com/subscribe?u=a7847b8ac2e027fc215f0d4f4&id=e32ba69d4f">à l'infolettre</a>
                    </div>
                    <!-- /.padding -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-col-md-12 col-lg-12">
                    <div class="padding text-center">
                        
                    </div>
                    <!-- /.padding -->
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