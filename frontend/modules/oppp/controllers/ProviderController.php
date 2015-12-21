<?php

namespace frontend\modules\oppp\controllers;

use yii\web\Controller;
use yii\db\Query;
use Yii;
use yii\data\ArrayDataProvider;

class ProviderController extends Controller {  
    public function actionIndex() {
        $date1 = "";
        $date2 = "";
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }
          
        
        $sql = "SELECT d.code AS provider
        ,d.licenseno AS registerno
        ,d.pname 
        ,d.name AS doc_name
        ,d.start_date AS startdate
        FROM doctor d
        LEFT OUTER JOIN vn_stat v ON v.dx_doctor=d.code
        WHERE v.vstdate BETWEEN '$date1' AND '$date2'
        AND (d.code is null OR d.code=''
        OR d.cid  is null OR d.cid =''
        OR d.name is null OR d.name=''
        OR d.sex is null OR d.sex=''
        OR d.birth_date is null OR d.birth_date=''
        OR d.provider_type_code is null OR d.provider_type_code=''
        OR d.start_date is null OR d.start_date=''
        OR d.update_datetime  is null OR d.update_datetime =''
        OR d.council_code is null OR d.council_code =''
        OR d.licenseno  is null OR d.licenseno ='')
        GROUP BY v.dx_doctor
        ORDER BY v.vstdate";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);
    }  
    public function actionView($id=NULL ,$date1 = NULL, $date2 = NULL) {

        $sql = "SELECT 
        (SELECT hospitalcode FROM opdconfig )AS hospcode
        ,d.code AS provider
        ,d.licenseno AS registerno
        ,d.council_code AS council
        ,d.cid 
        ,d.pname 
        ,d.name AS doc_name
        ,d.sex
        ,d.birth_date AS birth
        ,d.provider_type_code AS providertype
        ,d.start_date AS startdate
        ,d.finish_date AS outdate
        ,d.move_from_hospcode AS movefrom
        ,d.move_to_hospcode AS moveto
        ,d.update_datetime AS d_update
        FROM doctor d
        LEFT OUTER JOIN vn_stat v ON v.dx_doctor=d.code
        WHERE v.vstdate BETWEEN '$date1' AND '$date2'
        AND d.code='$id'
        AND (d.code is null OR d.code=''
        OR d.cid  is null OR d.cid =''
        OR d.name is null OR d.name=''
        OR d.sex is null OR d.sex=''
        OR d.birth_date is null OR d.birth_date=''
        OR d.provider_type_code is null OR d.provider_type_code=''
        OR d.start_date is null OR d.start_date=''
        OR d.update_datetime  is null OR d.update_datetime =''
        OR d.council_code is null OR d.council_code =''
        OR d.licenseno  is null OR d.licenseno ='')
        GROUP BY v.dx_doctor
        ORDER BY v.vstdate";
        
       $data = Yii::$app->db->createCommand($sql)->queryAll();
        return $this->render('view', ['data_view' => $data]);
    }
}

