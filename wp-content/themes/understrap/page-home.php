<?php
/**
* Template Name: Accueil
*
*
* @package understrap
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>






<div class="wrapper" id="index-wrapper">

    <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

        <div class="row">



            <main class="site-main" id="main">
                <?php get_template_part( 'global-templates/carousel' ); ?>
                <div class="home-cards-wrapper">
                    <div class="home-cards">
                        <div class="home-cards__half">
                            <!-- première moitié de la grille -->
                            <div class="row">
                                <div class="box--large-1">
                                    <a href="/activites">
                                        <span>Prenez part</span>
                                        <strong>aux activités</strong>
                                    </a>
                                </div>
                                <div class="box--small-1">
                                    <a href="https://www.facebook.com/seigneurieiledorleans/">
                                        <i class="fa fa-facebook"></i>
                                        <span>Suivez-nous</span>
                                        <strong>sur Facebook</strong>
                                    </a>
                                </div>
                                <div class="box--small-2">
                                    <a href="#">
                                        <i class="fa fa-paper-plane"></i>
                                        <span>Inscrivez-vous</span>
                                        <strong>à l'infolettre</strong>
                                    </a>

                                </div>
                                <div class="box--large-2">
                                    <a href="/la-lavande">
                                        <span>Apprenez-en plus</span>
                                        <strong>sur la lavande</strong>
                                    </a>
                                </div>
                            </div>
                        </div> <!-- fin de la première moitié de la grille -->
                        <div class="home-cards__quarter shop">
                            <a href="/boutique">
                                <span class="mauve">La boutique</span>
                                <strong class="mauve">en ligne</strong>
                                <img src="https://seigneurieiledorleans.com/wp-content/themes/understrap/images/accueil/sio-bg-boutique.jpg"
                                    class="img-responsive" alt="La boutique en ligne" title="La boutique en ligne">
                                <span class="uppercase primary">Livraison gratuite</span>
                                <span>à l'achat de 80$ et +<br>
                                    <small>avant taxes</small> </span>
                            </a>

                        </div>
                        <div class="home-cards__quarter visit">
                            <a href="/la-seigneurie/visites-et-forfaits/">
                                <span>Planifiez une visite pour découvrir</span>
                                <strong>la Seigneurie</strong>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <?php get_template_part( 'loop-templates/content', 'page' ); ?>
                </div>



            </main><!-- #main -->



        </div><!-- .row -->

    </div><!-- #content -->

</div><!-- #index-wrapper -->

<?php get_footer(); ?>