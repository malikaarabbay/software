<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\Product;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ReviewSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Reviews');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="review-index">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> '.Yii::t('app', 'Create Review'), ['create'], ['class' => 'btn btn-success']) ?>
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
            'fio',
            'client',
            [
                'attribute' => 'product_id',
                'class' => 'yii\grid\DataColumn',
                'label' => 'Продукт',
                'value' => function ($data) {
                    return ($data->product) ? $data->product->title : '-';
                },
                'filter' => ArrayHelper::map(Product::find()->all(), 'id', 'title')
            ],
//            'user_id',
//            'model_id',
            'review:ntext',
            'created:datetime',
            [
                'attribute' => 'is_published',
                'class' => 'yii\grid\DataColumn',
                'label' => 'Опубликован',
                'value' => function ($data) {
                    return Yii::$app->params['published'][$data->is_published];
                },
                'filter' => Yii::$app->params['published']
            ],
            // 'created',
            // 'updated',

            [
                'header' => 'Действия',
                'class' => 'yii\grid\ActionColumn'
            ],
        ],
    ]); ?>

</div>
