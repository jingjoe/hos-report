<?php

namespace frontend\modules\oppp\controllers;

use yii\web\Controller;
use yii\db\Query;
use Yii;
use yii\data\ArrayDataProvider;

class DisabilityController extends Controller {  
    public function actionIndex() {
        $date1 = "";
        $date2 = "";
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }
          
        
        $sql = "SELECT pd.person_deformed_id as id
        ,pd.deformed_no as disabid
        ,p.person_id AS pid
        ,CONCAT(p.pname,p.fname,' ',p.lname) full_name
        ,pdt.person_deformed_type_name AS disabtype
        ,pdc.person_deformed_cause_type_name AS disabcause
        ,pd.register_date AS date_detect
        ,pdl.deformed_date AS date_disab
        FROM person_deformed pd
        LEFT OUTER JOIN person_deformed_detail pdl ON pdl.person_deformed_id=pd.person_deformed_id
        LEFT OUTER JOIN  person_deformed_type pdt ON pdt.person_deformed_type_id=pdl.person_deformed_type_id
        LEFT OUTER JOIN  person_deformed_cause_type pdc ON pdc.person_deformed_cause_type_id=pdl.person_deformed_cause_type_id
        LEFT OUTER JOIN person p ON p.person_id=pd.person_id
        WHERE pd.register_date BETWEEN '$date1' AND '$date2'
        AND (p.person_id is null  or p.person_id= ''
        OR pdt.person_deformed_type_name is null or pdt.person_deformed_type_name=''
        OR pd.register_date is null or pd.register_date=''
        OR pdl.entry_datetime is null or pdl.entry_datetime='')";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);
    }  
    public function actionView($id=NULL ,$date1 = NULL, $date2 = NULL) {

        $sql = "SELECT pd.person_deformed_id as id
        ,(SELECT hospitalcode FROM opdconfig) AS hospcode
        ,pd.deformed_no as disabid
        ,p.person_id AS pid
        ,CONCAT(p.pname,p.fname,' ',p.lname) full_name
        ,pdt.person_deformed_type_name AS disabtype
        ,pdc.person_deformed_cause_type_name AS disabcause
        ,pdl.icd10 AS diagcode
        ,pd.register_date AS date_detect
        ,pdl.deformed_date AS date_disab
        ,pdl.entry_datetime AS d_update
        FROM person_deformed pd
        LEFT OUTER JOIN person_deformed_detail pdl ON pdl.person_deformed_id=pd.person_deformed_id
        LEFT OUTER JOIN  person_deformed_type pdt ON pdt.person_deformed_type_id=pdl.person_deformed_type_id
        LEFT OUTER JOIN  person_deformed_cause_type pdc ON pdc.person_deformed_cause_type_id=pdl.person_deformed_cause_type_id
        LEFT OUTER JOIN person p ON p.person_id=pd.person_id
        WHERE pd.register_date BETWEEN '$date1' AND '$date2'
        AND pd.person_deformed_id='$id'
        AND (p.person_id is null  or p.person_id= ''
        OR pdt.person_deformed_type_name is null or pdt.person_deformed_type_name=''
        OR pd.register_date is null or pd.register_date=''
        OR pdl.entry_datetime is null or pdl.entry_datetime='')";
        
       $data = Yii::$app->db->createCommand($sql)->queryAll();
        return $this->render('view', ['data_view' => $data]);
    }
}

