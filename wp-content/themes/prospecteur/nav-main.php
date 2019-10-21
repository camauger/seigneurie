<div class="row bg-head" style="background-image: url(<?php modifierBackground(); ?>); padding-top: .75em;">
     <div class="col-lg-12 entete-noel" style="display: none;">
        <?php /*
        <!-- La boutique en ligne est présentement fermée pour la période des Fêtes et sera à nouveau ouverte le 9 janvier.<br />À la vôtre et on se revoit très bientôt en 2017! -->
        <!-- small>La boutique fait son inventaire!<br>
        Veuillez prendre note qu’aucune commande ne sera envoyée entre le 11 et le 21 octobre 2018.<br> 
        Nous reprendrons les envois à partir du 22 octobre. Merci de votre compréhension.</small -->
         */ ?>
     </div>
     <!-- -->
     <div class="col-lg-8 col-lg-offset-2 col-md-12 col-sm-12 col-xs-12">
        <div class="row">
            <div class="col-lg-12">                
                <div id="href-home">
                    <?php wp_nav_menu( array( 'theme_location' => 'switcher-menu' ) ); ?>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <?php echo do_shortcode( '[wpv-view name="v-header-quotes"]' ); ?>

        <a href="<?php echo ( ICL_LANGUAGE_CODE == 'en' ) ? '/en/' : '/'; ?>" title="Accueil"><img class="sio-logo" src="<?php bloginfo('template_directory'); ?>/images/sio-logo.png" alt="" title=""></a>
        <img class="img-responsive hidden-xs" src="<?php bloginfo('template_directory'); ?>/images/bg-sous-logo-1240.png" alt="" title="">

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
                    <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'menu_class' => 'nav navbar-nav' ) ); ?>
                   
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->