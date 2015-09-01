<!-- Slider Section Starts -->
<div class="slider">
    <div class="container">
        <div id="main-carousel" class="carousel slide" data-ride="carousel">
            <!-- Wrapper For Slides Starts -->
                <div class="carousel-inner">
                    <?php foreach ($sliders as $key => $slider) : ?>

                        <?php $class = !$key ? 'active' : ''; ?>

                        <div class="item <?php echo $class;?>">
                            <?php echo $this->Html->image('../uploads/sliders/image/big.'. $slider['AttachmentImage']['filename'], array('alt' => 'Slider', 'class' => 'img-responsive'))?>
                        </div>

                    <?php endforeach; ?>
                </div>
            <!-- Wrapper For Slides Ends -->
            <!-- Controls Starts -->
                <a class="left carousel-control" href="#main-carousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#main-carousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            <!-- Controls Ends -->
        </div>              
    </div>
</div>
<!-- Slider Section Ends -->