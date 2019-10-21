<?php /* Template Name: Accueil */ ?>
<?php get_header(); ?> 

<body class="page-accueil preload">
<div class="container-fluid" style="background-color: #ccc;">
<h4>container-fuid</h4>
<div class="row-fluid" style="background-color: #444;">
    <h4>row-fluid</h4>
    <div class="col-lg-12" style="background: cyan;">
        <img class="img-responsive" src="http://dummyimage.com/2600x800/CCC/fff&text=LG12" />
    </div>
    <!-- /.col -->
</div>
<!-- /.row-fluid -->
<div class="row-fluid" style="background-color: #444;">
    <div class="col-lg-4" style="background: red;">
         <img class="img-responsive" src="http://dummyimage.com/1600x370/000/fff&text=LG4" />
    </div>
    <!-- /.col -->
    <div class="col-lg-4" style="background: blue;">
        <img class="img-responsive" src="http://dummyimage.com/1600x370/666/fff&text=LG4" />
    </div>
    <!-- /.col -->
    <div class="col-lg-4" style="background: blue;">
        <img class="img-responsive" src="http://dummyimage.com/1600x370/666/fff&text=LG4" />
    </div>
    <!-- /.col -->
</div>
<!-- /.row-fluid -->
<div class="row-fluid" style="background-color: #444;">
    <div class="col-lg-3 col-md-6" style="background: red;">
        <img class="img-responsive" src="http://dummyimage.com/1600x370/666/fff&text=LG3" />
    </div>
    <!-- /.Fcol -->
    <div class="col-lg-3 col-md-6" style="background: yellow;">
        <img class="img-responsive" src="http://dummyimage.com/1600x370/999/fff&text=LG3" />
    </div>
    <!-- /.col -->
    <div class="col-lg-3 col-md-6" style="background: gray;">
        <img class="img-responsive" src="http://dummyimage.com/1600x370/ccc/fff&text=LG3" />
    </div>
    <!-- /.col -->
    <div class="col-lg-3 col-md-6" style="background: magenta;">
        <img class="img-responsive" src="http://dummyimage.com/1600x370/444/fff&text=LG3" />
    </div>
    <!-- /.col -->
</div>
<!-- /.row-fluid -->
<div class="row" style="background-color: #999;">
    <h4>row</h4>

</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->
<?php get_footer(); ?>



<!--
<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : ?>
        <?php the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; ?>
<?php endif; ?>
-->