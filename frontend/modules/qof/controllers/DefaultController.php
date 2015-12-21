<?php

namespace frontend\modules\qof\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
     public function actionIndex()
    {
        return $this->redirect(['qof/index']);
    }
}
