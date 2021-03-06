<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\AdvantageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Advantages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advantage-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Advantage'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'photo',
                'format' => 'html',
                'value' => function($data) {
                    return Html::img($data->image,['width'=>50]);
                },
            ],
            'title',
            'description:ntext',
//            'photo',
//            'slug',
            // 'is_published',
            // 'created',
            // 'updated',
            'created:datetime',
            [
                'attribute' => 'is_published',
                'class' => 'yii\grid\DataColumn',
                'label' => 'Опубликован',
                'value' => function ($data) {
                    return ($data->is_published) ? Yii::$app->params['published'][$data->is_published] : '';
                },
                'filter' => Yii::$app->params['published']
            ],
            [
                'header' => 'Действия',
                'class' => 'yii\grid\ActionColumn'
            ],
        ],
    ]); ?>
</div>
