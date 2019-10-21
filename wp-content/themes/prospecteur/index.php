<?php get_header(); ?>
<body class="page-index preload">
<div class="container-fluid">
    <?php include( locate_template( 'nav-main.php' ) ); ?>
    <div class="row bg-content">
        <?php include( locate_template( 'col-gauche.php' ) ); ?>       
        <div class="col-lg-8 col-md-12">            
             <div class="row">
                <div class="col-lg-12">
                    <?php echo do_shortcode( '[wpv-view name="v-diaporama-accueil"]' ); ?> 
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-sm-4 col-md-3 col-md-offset-0 col-lg-3 col-lg-offset-0 ">
<!-- VERSION EN -->
<?php if ( is_front_page() && ICL_LANGUAGE_CODE=='en' ) : ?>                    
                    <div class="thumbnail">
                         <a href="/en/shop/" title="Shop"><img class="img-boutique" src="<?php bloginfo('template_directory'); ?>/images/btn-shop.png" alt="Shop online" title="Visit the online store"></a>
                         <div class="caption">
                            <p><a href="/en/shop/" class="btn btn-mauve center-block" role="button"><i class="fa fa-angle-double-right"></i> Visit the online store</a></p>
                         </div>
                        <!-- /.caption -->
                    </div>
                    <!-- /.thumbnail -->
                    <div class="thumbnail">
                        <a href="/en/seigneurie-ile-dorleans-demo/" title="La lavande"><img src="<?php bloginfo('template_directory'); ?>/images/btn-accueil-seigneurie.png" alt="Les jardins de la Seigneurie" title="Les jardins de la Seigneurie"></a>
                        <div class="caption">
                            <p>Learn all about us, discover your story and our attractions</p>
                            <p><a href="/en/seigneurie-ile-dorleans-demo/" class="btn btn-mauve center-block" role="button"><i class="fa fa-angle-double-right"></i> Read more</a></p>
                        </div>
                        <!-- /.caption -->
                    </div>
                    <!-- /.thumbnail -->
                    <div class="thumbnail">
                        <a href="/en/lavander/" title="La lavande">
                            <img class="img-responsive" src="<?php bloginfo('template_directory'); ?>/images/btn-accueil-lavande.png" alt="La lavande" title="La lavande">
                        </a>
                        <div class="caption">
                            <p>Enjoy an unforgettable experience by visiting our gardens.</p>
                            <p>
                                <a href="/en/lavander/" class="btn btn-mauve center-block" role="button"><i class="fa fa-angle-double-right"></i> Read more</a>
                            </p>
                         </div>
                        <!-- /.caption -->
                    </div>
                    <!-- /.thumbnail -->
                    <div class="thumbnail">
                        <a href="/en/activities/" title="Les activités"><img class="img-responsive" src="<?php bloginfo('template_directory'); ?>/images/btn-accueil-experience.png" alt="Les activités" title="Les activités"></a> 
                        <div class="caption">
                            <p>Learn more about its properties and processing</p>
                            <p>
                                <a href="/en/activities/" class="btn btn-mauve center-block" role="button"><i class="fa fa-angle-double-right"></i> Read more</a>
                            </p>
                        </div>
                        <!-- /.caption -->
                    </div>
                    <!-- /.thumbnail -->
                </div>
                <!-- /.col -->
                <div class="col-md-8 col-md-offset-0 col-lg-9 col-lg-offset-0 ">
                    <br />
    <!-- EN BREF - NOUVELLE -->                   
                    <div class="accueil-nouvelles">
                        <div class="caption">
                            <div class="thumbnail">
                                <div class="accueil-nouvelle">
                                    <h2>At a glance&hellip;</h2>
                                    <p class="lead" style="margin-bottom: 0;">See all our articles, our news!</p>
                                </div>
                                <?php echo do_shortcode( '[wpv-view name="v-articles-homepage"]' ); ?> 
                            </div>
                            <!-- /.thumbnail -->
                        </div>
                        <!-- /.caption -->
                    </div>
                    <!-- /.thumbnail -->
                    <div class="accueil-nouvelles">
                        <div class="caption">
                            <div class="thumbnail">
                                <div class="accueil-nouvelle">
                                    <h2>Mary's blog</h2>
                                </div>
                                <!-- /.accueil-nouvelle -->
                                <div class="accueil-nouvelle">
                                    <?php echo do_shortcode( '[wpv-view name="v-accueil-article-blogue"]' ); ?> 
                                    
                                    <p class="text-right"><a href="/en/marys-blog/" class="">
                                        <i class="fa fa-angle-double-right"></i> Read Mary's blog</a>
                                    </p>
                                </div>
                            </div>
                            <!-- /.caption -->
                        </div>
                        <!-- /.caption -->
                    </div>
                    <!-- /.thumbnail -->
    <!-- CAROUSEL PRODUITS -->
                    <?php echo do_shortcode( '[wpv-view name="v-slider-woo-produits-accueil"]' ); ?>               
                </div>
                <!-- /.col -->
                <div class="col-md-8 col-md-offset-4 col-lg-3 col-lg-offset-0">
                    <br />
    <!-- COL DROITE - ON SPECIAL / EN PROMOTION -->
                    <?php echo do_shortcode( '[wpv-view name="v-on-special-homepage"]' ); ?>  
    <!-- COL DROITE  - FOURRE-TOUT -->
                    
                    <div class="thumbnail">
                        <div class="padding-infolettre"> 
                            <h2>Newsletter</h2>
                            <p>Do not miss any of our activities&nbsp;! Enjoy our promotions&nbsp;!</p>             
                            <a target="_blank" href="http://seigneurieiledorleans.us13.list-manage1.com/subscribe?u=a7847b8ac2e027fc215f0d4f4&id=e32ba69d4f" class="btn btn-mauve center-block" role="button"><i class="fa fa-newspaper-o"></i> Subscribe!</a>                   
                            <p class="hidden">Calendar</p>
                            <p class="hidden"><a class="btn-subnav-interieure hidden-md" id="btn-boutique" href="#" title="xxx">&nbsp;</a></p>
                        </div>
                    </div>
                    <?php include( locate_template( 'facebook.php' ) ); ?>
                    <style type="text/css">
                        #TA_cdswritereviewlg922 { border: 1px solid #ccc !important; }
                        #CDSWIDWRL {
                            max-width: inherit !important;
                            padding: 1em;
                            width: inherit !important;
                        }
                        #CDSWIDWRL .widWRLData { border: none !important;  }
                    </style>
                    <div id="TA_cdswritereviewlg922" class="TA_cdswritereviewlg">
                        <ul id="dMB3b0PMNkW" class="TA_links crIgxkS3">
                            <li id="5KlTmsu03cS" class="SdYnUumL7">
                                <a target="_blank" href="https://fr.tripadvisor.ca/">
                                    <img src="https://fr.tripadvisor.ca/img/cdsi/img2/branding/medium-logo-12097-2.png" alt="TripAdvisor"/>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <script src="https://www.jscache.com/wejs?wtype=cdswritereviewlg&amp;uniq=922&amp;locationId=6725574&amp;lang=fr_CA&amp;lang=fr_CA&amp;display_version=2"></script>
                </div>
                <!-- /.col -->
<!-- VERSION FR -->
<?php else : ?>     
                    <div class="thumbnail">
                         <a href="/boutique/" title="La boutique"><img class="img-boutique" src="<?php bloginfo('template_directory'); ?>/images/btn-boutique.png" alt="La boutique" title="La boutique"></a>
                         <div class="caption text-center">
                            <p><a href="/boutique/" class="btn btn-mauve center-block" role="button"><i class="fa fa-angle-double-right"></i> Visitez la boutique</a></p>
                         </div>
                        <!-- /.caption -->
                    </div>
                    <!-- /.thumbnail -->
                    <div class="thumbnail">
                         <a href="/la-seigneurie/" title="La lavande"><img src="<?php bloginfo('template_directory'); ?>/images/btn-accueil-seigneurie.png" alt="Les jardins de la Seigneurie" title="Les jardins de la Seigneurie"></a>
                        <div class="caption text-center">
                            <p>Pour tout savoir sur nous, découvrir notre histoire et nos attraits</p>
                            <p><a href="/la-seigneurie/" class="btn btn-mauve center-block" role="button"><i class="fa fa-angle-double-right"></i> En savoir plus</a></p>
                        </div>
                        <!-- /.caption -->
                    </div>
                    <!-- /.thumbnail -->
                    <div class="thumbnail">
                        <a href="/la-lavande/" title="La lavande"><img class="img-responsive" src="<?php bloginfo('template_directory'); ?>/images/btn-accueil-lavande.png" alt="La lavande" title="La lavande"></a>
                        <div class="caption text-center">
                            <p>Vivez une expérience inoubliable en visitant nos jardins</p>
                            <p><a href="/la-lavande/" class="btn btn-mauve center-block" role="button"><i class="fa fa-angle-double-right"></i> En savoir plus</a></p>
                         </div>
                        <!-- /.caption -->
                    </div>
                    <!-- /.thumbnail -->
                    <div class="thumbnail"
                        <a href="/activites/" title="Les activités"><img class="img-responsive" src="<?php bloginfo('template_directory'); ?>/images/btn-accueil-experience.png" alt="Les activités" title="Les activités"></a> 
                        <div class="caption text-center">
                            <p>Apprenez-en davantage sur ses propriétés et sa transformation</p>
                            <p><a href=">/en/activities/" class="btn btn-mauve center-block" role="button"><i class="fa fa-angle-double-right"></i> En savoir plus</a></p>
                        </div>
                        <!-- /.caption -->
                    </div>
                    <!-- /.thumbnail -->
                </div>
                <!-- /.col -->
                <div class="col-sm-8 col-md-9 col-md-offset-0 col-lg-9 col-lg-offset-0 ">
                    <div class="row">
                        <div class="col-lg-8">
                            <!-- EN BREF - NOUVELLE -->                   
                            <div class="accueil-nouvelles">
                                <div class="caption">
                                    <div class="thumbnail">
                                        <div class="accueil-nouvelle">
                                            <h2>En bref&hellip;</h2>
                                            <p class="lead" style="margin-bottom: 0;">Consultez tous nos articles, toutes nos nouvelles!</p>
                                        </div>
                                        <?php echo do_shortcode( '[wpv-view name="v-articles-homepage"]' ); ?>
                                    </div>
                                    <!-- /.thumbnail -->
                                </div>
                                <!-- /.caption -->
                            </div>
                            <!-- /.thumbnail -->
                            <div class="accueil-nouvelles">
                                <div class="caption">
                                    <div class="thumbnail">
                                        <div class="accueil-nouvelle">
                                            <h2>Le blogue de Mary</h2>
                                        </div>
                                        <!-- /.accueil-nouvelle -->
                                        <div class="accueil-nouvelle">
                                            <style>
                                                .accueil-nouvelle .img-responsive, 
                                                .accueil-nouvelle .thumbnail a > img, 
                                                .accueil-nouvelle .thumbnail > img {
                                                    display: block;
                                                    height: auto;
                                                    max-width: 38%;
                                                }                                            
                                            </style>
                                            <?php echo do_shortcode( '[wpv-view name="v-accueil-article-blogue"]' ); ?> 
                                            <br /><br />
                                            <p class="text-right"><a href="/le-blogue-de-mary/" class=""><i class="fa fa-angle-double-right"></i> Lire le blogue de Mary</a></p>
                                        </div>
                                    </div>
                                    <!-- /.caption -->
                                </div>
                                <!-- /.caption -->
                            </div>
                            <!-- /.thumbnail -->
                            <!-- CAROUSEL PRODUITS -->
                            <?php echo do_shortcode( '[wpv-view name="v-slider-woo-produits-accueil"]' ); ?> 
                            <br /> 
                        </div>
                        <div class="col-lg-4">                           
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- COL DROITE - EN PROMOTION -->
                                    <?php echo do_shortcode( '[wpv-view name="v-on-special-homepage"]' ); ?> 
                                </div>
                                <!-- /.col -->
                                <div class="col-lg-12">
                                     <div class="row">
                                        <div class="col-md-7 col-lg-12">
                    

                    <div class="thumbnail">
                        <div style="padding: 1.5em;"> 
                            <img src="https://seigneurieiledorleans.com/wp-content/uploads/2017/07/sio-canada-150-experience.jpg" class="img-responsive" alt="La Seigneurie de l’île d’Orléans - Récipiendaire Expérience jardin Canada 150" title="La Seigneurie de l’île d’Orléans - Récipiendaire Expérience jardin Canada 150" />
                            
                            <p style="margin-top: 1.5em;">La <strong>Seigneurie de l’île d’Orléans</strong> est l’heureux récipiendaire d’une désignation <strong>« Expérience jardin Canada 150 »</strong> décernée par le Conseil canadien du jardin en collaboration avec l’Association canadienne des pépiniéristes et des paysagistes.</p>
                        </div>
                    </div>
                    <!-- /.thumbnail -->







                    <div class="thumbnail">
                        <div style="padding: 0 1.5em 1.5em;"> 
                            <h2>Infolettre</h2>
                            <p>Ne manquez aucune de nos activités&nbsp;! Profitez de nos promotions&nbsp;!</p>           
                            <a target="_blank" href="http://seigneurieiledorleans.us13.list-manage1.com/subscribe?u=a7847b8ac2e027fc215f0d4f4&id=e32ba69d4f" class="btn btn-mauve center-block" role="button"><i class="fa fa-newspaper-o"></i> Inscrivez-vous!</a>
                            <p class="hidden">Calendrier</p>
                            <p class="hidden"><a class="btn-subnav-interieure hidden-md" id="btn-boutique" href="#" title="">&nbsp;</a></p>
                        </div>
                    </div>
                    <!-- /.thumbnail -->
                </div>
                <!-- /.col -->
                <div class="col-md-5 col-lg-12">
                    <?php include( locate_template( 'facebook.php' ) ); ?>
                    <style type="text/css">
                        #TA_cdswritereviewlg922 { border: 1px solid #ccc !important; }
                        #CDSWIDWRL {
                            max-width: inherit !important;
                            padding: 1em;
                            width: inherit !important;
                        }
                        #CDSWIDWRL .widWRLData { border: none !important;  }
                    </style>
                                <div id="TA_cdswritereviewlg922" class="TA_cdswritereviewlg">
                                    <ul id="dMB3b0PMNkW" class="TA_links crIgxkS3">
                                        <li id="5KlTmsu03cS" class="SdYnUumL7">
                                            <a target="_blank" href="https://fr.tripadvisor.ca/">
                                                <img src="https://fr.tripadvisor.ca/img/cdsi/img2/branding/medium-logo-12097-2.png" alt="TripAdvisor"/>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <script src="https://www.jscache.com/wejs?wtype=cdswritereviewlg&amp;uniq=922&amp;locationId=6725574&amp;lang=fr_CA&amp;lang=fr_CA&amp;display_version=2"></script>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.col -->
<?php endif; ?>
<!-- COL GAUCHE --> 
            </div>
            <!-- /.row -->                   
        </div>
        <!-- /.col -->
        <?php include( locate_template( 'col-droite.php' ) ); ?> 
        <div class="clearfix"></div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
<?php get_footer(); ?>