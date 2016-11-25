<?php
/* @var $this yii\web\View */
$this->title = 'Software';
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\widgets\SliderWidget;
use yii\bootstrap\ActiveForm;

?>
<?= SliderWidget::widget(); ?>
<div class="comapni-container" id="compani">
    <div class="cr">
        <div class="comapni">
            <div class="title comapni-title">
                <div class="title-big"><?= $company->title ?></div>
                <span><?= $company->anounce ?></span>
            </div>
            <div class="comapni-text">
                <?= $company->description ?>
            </div>
            <ul class="compani-icon-list">
                <li class="compani-icon-list__item">
                    <div class="compani-icon-item">
                        <div class="compani-icon-item__img">
                            <img src="img/icon1.png" alt="">
                        </div>
                        <div class="compani-icon-item__text">
                            <span class="grey">свыше</span>
                            <span class="figures">20</span>
                            авторских прав<br>
                            на разработку ПО
                        </div>
                    </div>
                </li>
                <li class="compani-icon-list__item">
                    <div class="compani-icon-item">
                        <div class="compani-icon-item__img">
                            <img src="img/icon1.png" alt="">
                        </div>
                        <div class="compani-icon-item__text">
                            <span class="grey">более</span>
                            <span class="figures">20</span>
                            высоквалифицированных<br>
                            специалистов
                        </div>
                    </div>
                </li>
                <li class="compani-icon-list__item">
                    <div class="compani-icon-item">
                        <div class="compani-icon-item__img">
                            <img src="img/icon1.png" alt="">
                        </div>
                        <div class="compani-icon-item__text">
                            <span class="grey">свыше</span>
                            <span class="figures">20</span>
                            довольных<br>
                            клиентов
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="product-container" id="product">
    <div class="cr">
        <div class="title product-title">
            <div class="title-big product-title-big">наши продукты</div>
            <span>Дополнительное описание раздела, если будет требоваться</span>
        </div>
        <ul class="product-list">
            <?php foreach ($products as $product) {?>
            <li class="product-list__item">
                <div class="product-item">
                    <div class="product-item__title">
                        <?= $product->title ?>
                        <span><?= $product->title_sec ?></span>
                    </div>
                    <div class="product-item__img">
                        <?php
                        echo \himiklab\thumbnail\EasyThumbnailImage::thumbnailImg(
                            $product->imagePath, 250, 205, \himiklab\thumbnail\EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                            [
                                'class' => ''
                            ]
                        );
                        ?>
                    </div>
                    <div class="product-item__content">
                        <p><?= $product->announce ?></p>
                        <a href="<?= Url::toRoute(['/product/view', 'slug' => $product->slug]) ?>" class="button">
                            узнать подробнее
                        </a>
                    </div>
                </div>
            </li>
            <?php } ?>
        </ul>
    </div>
</div>
<div class="preimushestva-container" id="preimushestva">
    <div class="cr">
        <div class="preimushestva">
            <div class="title preimushestva-title">
                <div class="title-big preimushestva-title-big"> преимущества </div>
                <span>Дополнительное описание раздела, если будет требоваться</span>
            </div>
            <ul class="preimushestva-list">
                <?php foreach ($advantages as $advantage) {?>
                <li class="preimushestva-list__item">
                    <div class="preimushestva-item">
                        <div class="preimushestva-item__title">
                            <?= $advantage->title ?>
                        </div>
                        <div class="preimushestva-item__img">
                            <?php
                            echo \himiklab\thumbnail\EasyThumbnailImage::thumbnailImg(
                                $advantage->imagePath, 73, 77, \himiklab\thumbnail\EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                                [
                                    'class' => ''
                                ]
                            );
                            ?>
                        </div>
                        <p class="preimushestva-item__text"><?= $advantage->description ?></p>
                    </div>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
<div class="client-container" id="client">
    <div class="cr">
        <div class="title client-title">
            <div class="title-big client-title-big"> наши клиенты </div>
            <span>Дополнительное описание раздела, если будет требоваться</span>
        </div>
        <div class="slider-client">
            <?php foreach ($banners as $banner) {?>
            <div class="slider-item">
                <div class="slider-item__img">
                    <img src="<?= $banner->image ?>" alt="">
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<div class="partner-container">
    <div class="cr">
        <div class="title partner">
            <div class="title-big partner-big"><?= $partner->title ?></div>
            <span><?= $partner->anounce ?></span>
        </div>
        <?= $partner->description ?>
    </div>
</div>
<div class="news-container">
    <div class="cr">
        <div class="title news">
            <div class="title-big news-big"> новости</div>
            <span>Дополнительное описание раздела, если будет требоваться</span>
        </div>
        <div class="news-slider">
            <?php foreach ($newsList as $news) {?>
            <div class="news-item">
                    <?php
                    echo \himiklab\thumbnail\EasyThumbnailImage::thumbnailImg(
                        $news->imagePath, 200, 204, \himiklab\thumbnail\EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                        [
                            'class' => ''
                        ]
                    );
                    ?>
                <div class="news-item__text">
                    <div class="news-item__text-title">
                        <?= $news->title ?>
                    </div>
                    <?= $news->description ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<div class="questions-container" id="questions">
    <div class="cr">
        <div class="title questions-title">
            <div class="title-big title-big"> ВОПРОСЫ И ОТВЕТЫ</div>
            <span>Дополнительное описание раздела, если будет требоваться</span>
        </div>
        <ul class="questions-list">
            <?php foreach ($questions as $question) {?>
            <li class="questions-item">
                <div class="questions-item__title">
                    <?= $question->question ?>
                </div>
                <div class="questions-item__text">
                    <?= $question->answer ?>
                </div>
            </li>
            <?php } ?>
        </ul>
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
                        <?= $form->field($model, 'body',['inputOptions' => ['class' => '', 'placeholder' => 'Сообщение'],])->textarea(['cols' => 10, 'rows' => 5])->label(false) ?>
                    </div>
                    <div class="footer-form__input">
                        <?= $form->field($model, 'name', ['inputOptions' => ['class' => '']])->textInput()->input('name', ['placeholder' => 'Имя'])->label(false); ?>
                    </div>
                    <div class="footer-form__input">
                        <?= $form->field($model, 'email', ['inputOptions' => ['class' => '']])->textInput()->input('name', ['placeholder' => 'E-mail'])->label(false); ?>
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
