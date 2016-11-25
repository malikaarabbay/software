<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use vova07\fileapi\Widget as FileAPI;
/* @var $this yii\web\View */
/* @var $model common\models\Advantage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="advantage-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'full',
        'clientOptions' => [
            'filebrowserBrowseUrl' => '/elfinder/manager?filter=image&'
        ]
    ]) ?>

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

    <?= $form->field($model, 'is_published')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
