<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <?php if ($post->slideImgTwo != '') { ?>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <?php } ?>
        <?php if ($post->slideImgThree != '') { ?>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        <?php } ?>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <a href="<?php echo ($post->slideUrlOne) ?>">
                <img src="<?php echo ($post->slideImgOne) ?>" class="d-block w-100" alt="<?php echo ($post->slideTitleOne) ?>">
                <div class="carousel-caption d-none d-md-block">
                    <h5><?php echo ($post->slideTitleOne) ?></h5>
                    <p><?php echo ($post->slideTextOne) ?></p>
                </div>
            </a>
        </div>
        <?php if ($post->slideImgTwo != '') { ?>
            <div class="carousel-item">
                <a href="<?php echo ($post->slideUrlTwo) ?>">
                    <img src="<?php echo ($post->slideImgTwo) ?>" class="d-block w-100" alt="<?php echo ($post->slideTitleTwo) ?>">
                    <div class="carousel-caption d-none d-md-block">
                        <h5><?php echo ($post->slideTitleTwo) ?></h5>
                        <p><?php echo ($post->slideTextTwo) ?></p>
                    </div>
                </a>
            </div>
        <?php } ?>
        <?php if ($post->slideImgThree != '') { ?>
        <div class="carousel-item">
            <a href="<?php echo ($post->slideUrlThree) ?>">
                <img src="<?php echo ($post->slideImgThree) ?>" class="d-block w-100" alt="<?php echo ($post->slideTitleThree) ?>">
                <div class="carousel-caption d-none d-md-block">
                    <h5><?php echo ($post->slideTitleThree) ?></h5>
                    <p><?php echo ($post->slideTextThree) ?></p>
                </div>
            </a>
        </div>
        <?php } ?>
    </div>
    <?php if ($post->slideImgTwo != '') { ?>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only"><?php __('Previous', 'Carousel') ?></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only"><?php __('Next', 'Carousel') ?></span>
    </a>
    <?php } ?>
</div>