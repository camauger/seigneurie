<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
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
        <div class="carousel-item">
            <a href="<?php echo ($post->slideUrlOne) ?>">
                <img src="<?php echo ($post->slideImgOne) ?>" class="d-block" alt="<?php echo ($post->slideTitleOne) ?>">
                <div class="carousel-caption d-none d-md-block">
                    <h5><?php echo ($post->slideTitleOne) ?></h5>
                    <p><?php echo ($post->slideTextOne) ?></p>
                </div>
            </a>
        </div>
        <div class="carousel-item">
            <a href="<?php echo ($post->slideUrlOne) ?>">
                <img src="<?php echo ($post->slideImgOne) ?>" class="d-block w-100" alt="<?php echo ($post->slideTitleOne) ?>">
                <div class="carousel-caption d-none d-md-block">
                    <h5><?php echo ($post->slideTitleOne) ?></h5>
                    <p><?php echo ($post->slideTextOne) ?></p>
                </div>
            </a>
        </div>
    </div>

    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>