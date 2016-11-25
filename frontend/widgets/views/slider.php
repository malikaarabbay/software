<?php

?>
<div class="slider-top" id="index">
    <div class="slider" >
        <?php foreach($sliders as $slider) {?>
        <div class="slider__item">
            <div class="slider__item-text">
                <div class="slider-item-text__title">
                    <?= $slider->title?>
                </div>
                <?= $slider->description?>
                <a href="<?= $slider->link ?>" class="button">
                    узнать подробнее
                </a>
            </div>
            <div class="slider_item_img">
                <img src="<?= $slider->image ?>" alt="">
            </div>
        </div>
        <?php } ?>
    </div>
</div>
