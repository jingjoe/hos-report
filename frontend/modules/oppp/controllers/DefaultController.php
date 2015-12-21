<?php

namespace frontend\modules\oppp\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        return $this->redirect(['oppp/index']);
    }
    
}
