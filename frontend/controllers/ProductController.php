<?php

namespace frontend\controllers;

use common\models\Article;
use common\models\Category;
use common\models\Product;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use Yii;
use common\models\Feedback;
class ProductController extends \yii\web\Controller
{

    public function actionView($slug){

        $model = $this->findProduct($slug);
        $feedbackModel = new Feedback();
        if ($feedbackModel->load(Yii::$app->request->post()) && $feedbackModel->validate()) {
//            $feedbackModel->status = 1;
            if ($feedbackModel->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Спасибо. Письмо успешно отправлено.');
            } else {
                Yii::$app->session->setFlash('error', 'Произошла ошибка.');
            }
            return $this->refresh();
        } else {
            return $this->render('view', [
                'model' => $model,
                'feedbackModel' => $feedbackModel,
            ]);
        }
    }

    protected function findProduct($slug)
    {
        if (($model = Product::find()->where(['slug' => $slug])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
