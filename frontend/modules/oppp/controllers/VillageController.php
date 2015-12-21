<?php

namespace frontend\modules\oppp\controllers;

use yii\web\Controller;
use yii\db\Query;
use Yii;
use yii\data\ArrayDataProvider;

class VillageController extends Controller {  
    public function actionIndex() {

        $sql = "SELECT vi.village_id AS id
        ,(SELECT hospitalcode FROM opdconfig) AS hospcode
        ,vi.village_name 
        ,vi.village_code AS vid
        ,d.name AS ntraditional
        ,vi.entry_datetime AS d_update
        FROM village vi
        INNER JOIN doctor d ON d.code=vi.doctor_code
        WHERE vi.village_id<>'1'";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider]);
    }  
    
}

