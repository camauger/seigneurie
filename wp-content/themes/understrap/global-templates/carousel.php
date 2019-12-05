<!-- Carousel Homepage -->
<!-- <div id="carousel-example-generic-1" class="carousel slide carousel-accueil" data-ride="carousel">
    <div class="carousel-inner" role="listbox">

        <div class="item active">


            <img class="img-responsive"
                src="https://seigneurieiledorleans.com/wp-content/themes/understrap/uploads/2018/06/bandeau-2019.png" alt=""
                title="">

        </div>

        <div class="item">
            <img class="img-responsive" src="<?php echo get_post_meta($post->ID, 'homeslider1', true); ?>" alt=""
                title="">
        </div>

    </div>
    <a class="left carousel-control" href="#carousel-example-generic-1" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic-1" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div> -->
<!-- end of carousel -->
<!-- <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="<?php echo get_post_meta($post->ID, 'slide1', true); ?>" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="<?php echo get_post_meta($post->ID, 'slide2', true); ?>" alt="Second slide">
            <div class="carousel-caption caption-left d-none d-md-block">
                <h5><?php echo get_post_meta($post->ID, 'slide2-title', true); ?></h5>
                <p><?php echo get_post_meta($post->ID, 'slide2-caption', true); ?></p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="<?php echo get_post_meta($post->ID, 'slide3', true); ?>" alt="Third slide">
            <div class="carousel-caption caption-right d-none d-md-block">
                <h5><?php echo get_post_meta($post->ID, 'slide3-title', true); ?></h5>
                <p><?php echo get_post_meta($post->ID, 'slide3-caption', true); ?></p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div> -->


<!-- CAROUSEL PRODUITS -->
<div class="carousel-accueil-produits">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->

        <div class="carousel-inner" role="listbox">

            <!-- <div class="carousel-item active">

                <img class="img-fluid" src="<?php echo get_post_meta($post->ID, 'slide1', true); ?>" />

                <div class="carousel-caption d-none d-md-block">
                    <div class="inner-content-carousel-produit">
                        <h4><?php echo get_post_meta($post->ID, 'slide1-title', true); ?></h4>
                        <p><?php echo get_post_meta($post->ID, 'slide1-caption', true); ?></p>
                        <a href="<?php echo get_post_meta($post->ID, 'slide1-link', true); ?>"
                            class="btn btn-primary btn-vert pull-right"><?php echo get_post_meta($post->ID, 'slide1-button', true); ?></a>
                    </div>
                </div>
            </div> -->

            <div class="carousel-item active">

                <img style="float: right" class="img-fluid" src="<?php echo get_post_meta($post->ID, 'slide2', true); ?>" />

                <div class="carousel-caption d-none d-md-block">
                    <div style="max-width: 300px" class="inner-content-carousel-produit text-left">
                        <h4><?php echo get_post_meta($post->ID, 'slide2-title', true); ?></h4>
                        <p><?php echo get_post_meta($post->ID, 'slide2-caption', true); ?></p>
                        <a href="<?php echo get_post_meta($post->ID, 'slide2-link', true); ?>"
                            class="btn btn-primary btn-vert pull-left"><?php echo get_post_meta($post->ID, 'slide2-button', true); ?></a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">

                <img style="float: right; max-height: 300px; padding: 20px;" class="img-fluid" src="<?php echo get_post_meta($post->ID, 'slide3', true); ?>" />

                <div class="carousel-caption d-none d-md-block">
                    <div style="max-width: 300px" class="inner-content-carousel-produit text-right">
                        <h4><?php echo get_post_meta($post->ID, 'slide3-title', true); ?></h4>
                        <p><?php echo get_post_meta($post->ID, 'slide3-caption', true); ?></p>
                        <a href="<?php echo get_post_meta($post->ID, 'slide3-link', true); ?>"
                            class="btn btn-primary btn-vert pull-right"><?php echo get_post_meta($post->ID, 'slide3-button', true); ?></a>
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