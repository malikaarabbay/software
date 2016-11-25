<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\fileapi\Widget as FileAPI;
use dosamigos\ckeditor\CKEditor;
/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="<?= ($image_tab) ? '' : 'active'?>">
                <a href="#tab_1" data-toggle="tab">Данные</a>
            </li>
            <li class="<?= ($image_tab) ? 'active' : ''?>">
                <a href="#tab_2" data-toggle="tab">Изображении</a>
            </li>
            <li class="pull-right">
                <?= Html::submitButton($model->isNewRecord ?
                    '<span class="glyphicon glyphicon-plus"></span> '.Yii::t('app', 'Create') :
                    '<span class="glyphicon glyphicon-floppy-disk"></span> '.Yii::t('app', 'Save'),
                    ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </li>
        </ul>
        <div class="tab-content">

            <div class="tab-pane <?= ($image_tab) ? '' : 'active'?>" id="tab_1">

                <div class="row">
                    <div class="col-md-8 col-xs-12">
                        <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($model, 'title_sec')->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($model, 'announce')->textarea(['rows' => 4]) ?>

                        <?= $form->field($model, 'function')->widget(CKEditor::className(), [
                            'options' => ['rows' => 6],
                            'preset' => 'full',
                            'clientOptions' => [
                                'filebrowserBrowseUrl' => '/elfinder/manager?filter=image&'
                            ]
                        ]) ?>

                        <?= $form->field($model, 'benefit')->widget(CKEditor::className(), [
                            'options' => ['rows' => 6],
                            'preset' => 'full',
                            'clientOptions' => [
                                'filebrowserBrowseUrl' => '/elfinder/manager?filter=image&'
                            ]
                        ]) ?>

                        <?= $form->field($model, 'advantage')->widget(CKEditor::className(), [
                            'options' => ['rows' => 6],
                            'preset' => 'full',
                            'clientOptions' => [
                                'filebrowserBrowseUrl' => '/elfinder/manager?filter=image&'
                            ]
                        ]) ?>

                        <?= $form->field($model, 'is_published')->checkbox() ?>

                    </div>

                    <div class="col-md-4 col-xs-12">
                        <?= $form->field($model, 'photo')->widget(
                            FileAPI::className(),
                            [
                                'settings' => [
                                    'url' => ['fileapi-upload'],
                                    'elements' => [
                                        'preview' => [
                                            'width' => 250,
                                            'height' => 200
                                        ]
                                    ],
                                ],
                            ])
                        ?>

                        <?= $form->field($model, 'photo_banefit')->widget(
                            FileAPI::className(),
                            [
                                'settings' => [
                                    'url' => ['fileapi-upload'],
                                    'elements' => [
                                        'preview' => [
                                            'width' => 250,
                                            'height' => 200
                                        ]
                                    ],
                                ],
                            ])
                        ?>

                        <?= $form->field($model, 'photo_advantage')->widget(
                            FileAPI::className(),
                            [
                                'settings' => [
                                    'url' => ['fileapi-upload'],
                                    'elements' => [
                                        'preview' => [
                                            'width' => 250,
                                            'height' => 200
                                        ]
                                    ],
                                ],
                            ])
                        ?>

                        <?= $form->field($model, 'meta_keywords')->textarea(['rows' => 4]) ?>

                        <?= $form->field($model, 'meta_description')->textarea(['rows' => 4]) ?>

                        <?= $form->field($model, 'slug')->textInput(['maxlength' => 255]) ?>

                    </div>
                </div>

            </div><!-- /.tab-pane -->

            <div class="tab-pane <?= ($image_tab) ? 'active' : ''?> " id="tab_2">

                <?= $form->field($model, 'file[]')->fileInput(['multiple' => true]) ?>
                <hr/>

                <div class="row">
                    <?= $this->render('_modelImages',[
                        'images' => $model->images,
                    ]) ?>
                </div>

            </div><!-- /.tab-pane -->
        </div><!-- /.tab-content -->
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
