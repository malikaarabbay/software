<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Advantage */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Advantage',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Advantages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="advantage-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
