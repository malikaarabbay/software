<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
$this->title = $model->title;

$this->registerMetaTag(['name'=> 'keywords', 'content' =>  $model->meta_keywords]);
$this->registerMetaTag(['name'=> 'description', 'content' => $model->meta_description]);

?>
<div class="container">

    <div class="content">
        <div class="cr">
            <div class="title ">
                <div class="title-big"><?= $model->title ?></div>
                <span><?= $model->title_sec ?></span>
            </div>
            <img src="<?= $model->image ?>" align="right" vspace="5" hspace="20" itemprop="image" alt="">
            <?= $model->function ?>
        </div>
        <div class="second-page-item-container-gray">
            <div class="cr">
                <div class="second-page-item">
                    <div class="second-page-item__img">
                        <?php
                        echo \himiklab\thumbnail\EasyThumbnailImage::thumbnailImg(
                            $model->imagePathBenefit, 570, 330, \himiklab\thumbnail\EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                            [
                                'class' => ''
                            ]
                        );
                        ?>
                    </div>
                </div>
                <div class="second-page-item">
                    <?= $model->benefit ?>
                </div>
            </div>
        </div>
        <div class="cr">
            <div class="second-page-item-container border-bottom">
                <div class="second-page-item">
                    <?= $model->advantage ?>
                </div>
                <div class="second-page-item">
                    <div class="second-page-item__img">
                        <?php
                        echo \himiklab\thumbnail\EasyThumbnailImage::thumbnailImg(
                            $model->imagePathAdvantage, 570, 430, \himiklab\thumbnail\EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                            [
                                'class' => ''
                            ]
                        );
                        ?>
                    </div>
                </div>

            </div>
        </div>
        <div class="cr">
            <?php if($model->images) { ?>
            <div class="scrin-product">
                <div class="scrin-product__title">
                    СКРИНШОТЫ ПРОДУКТА:
                </div>
                <ul class="scrin-list">
                    <?php foreach ($model->images as $image) {?>
                    <li>
                        <div class="scrin-item">
                            <?php
                            echo \himiklab\thumbnail\EasyThumbnailImage::thumbnailImg(
                                $image->imagePath, 370, 260, \himiklab\thumbnail\EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                                [
                                    'class' => ''
                                ]
                            );
                            ?>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <?php } ?>
            <?php if($model->reviews) { ?>
            <div class="title comapni-title">
                <div class="title-big">отзывы</div>
                <span>Дополнительное описание раздела, если будет требоваться</span>
            </div>
            <ul class="reviews-list">
                <?php foreach ($model->reviews as $review) {?>
                <li>
                    <div class="reviews-item">
                        <div class="reviews-item__img">
                            <?php
                            echo \himiklab\thumbnail\EasyThumbnailImage::thumbnailImg(
                                $review->imagePath, 52, 71, \himiklab\thumbnail\EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                                [
                                    'class' => ''
                                ]
                            );
                            ?>
                        </div>
                        <div class="reviews-item__name">
                            <?= $review->fio ?>
                        </div>
                        <div class="reviews-item__compani">
                            <?= $review->client ?>
                        </div>
                        <div class="reviews-item__text">
                            <?= $review->review ?>
                        </div>
                    </div>
                </li>
                <?php } ?>
            </ul>
            <?php } ?>
        </div>
    </div>
</div>
</div>
<footer class="footer-container" id="contact">
    <div>
        <div class="cr">
            <div class="footer">
                <div class="footer-form">
                    <div class="footer-title">
                        обратная связь
                    </div>
                    <?php $form = ActiveForm::begin(['id' => 'contact-form', 'layout' => 'horizontal']); ?>
                    <div class="footer-form__textarea">
                        <?= $form->field($feedbackModel, 'body',['inputOptions' => ['class' => '', 'placeholder' => 'Сообщение'],])->textarea(['cols' => 10, 'rows' => 5])->label(false) ?>
                    </div>
                    <div class="footer-form__input">
                        <?= $form->field($feedbackModel, 'name', ['inputOptions' => ['class' => '']])->textInput()->input('name', ['placeholder' => 'Имя'])->label(false); ?>
                    </div>
                    <div class="footer-form__input">
                        <?= $form->field($feedbackModel, 'email', ['inputOptions' => ['class' => '']])->textInput()->input('name', ['placeholder' => 'E-mail'])->label(false); ?>
                    </div>
                    <?= Html::submitButton('отправить сообщение', ['class' => 'button form-button', 'name' => 'contact-button']) ?>
                    <?php ActiveForm::end(); ?>
                </div>


                <div class="footer-item">
                    <div class="footer-title">
                        контакты
                    </div>
                    <ul class="footer-soc-seti">
                        <li class="address">
                            Название улицы, номер офиса
                        </li>
                        <li class="mail">
                            namesite@mail.kz
                        </li>
                        <li class="address phone">
                            +7 (7172) 71-72-71
                        </li>
                        <li class="address phone">
                            +7 (7172) 71-72-71
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>