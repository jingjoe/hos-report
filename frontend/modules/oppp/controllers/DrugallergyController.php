<?php

namespace frontend\modules\oppp\controllers;

use yii\web\Controller;
use yii\db\Query;
use Yii;
use yii\data\ArrayDataProvider;

class DrugallergyController extends Controller {  
    public function actionIndex() {
        $date1 = "";
        $date2 = "";
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }
          
        
        $sql = "SELECT oa.hn as id
        ,p.cid AS pid
        ,CONCAT(p.pname,p.fname,' ',p.lname) full_name
        ,oa.report_date AS daterecord
        ,oa.agent AS dname
        ,ar.relation_name AS typedx
        ,al.seiousness_name as alevel
        ,oa.symptom
        FROM opd_allergy oa
        LEFT OUTER JOIN patient p ON p.hn=oa.hn
        LEFT OUTER JOIN vn_stat v ON v.hn=oa.hn
        LEFT OUTER JOIN allergy_relation ar ON ar.allergy_relation_id=oa.allergy_relation_id
        LEFT OUTER JOIN allergy_seriousness al ON al.seriousness_id=oa.seriousness_id
        WHERE v.vstdate BETWEEN '$date1' AND '$date2'
        AND (p.cid is null  or p.cid= ''
        OR oa.report_date  is null or oa.report_date = '' 
        OR oa.agent_code24 is null or oa.agent_code24  =''
        OR oa.update_datetime is null or oa.update_datetime='')";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);
    }  
    public function actionView($id=NULL ,$date1 = NULL, $date2 = NULL) {

        $sql = "SELECT oa.hn as id
        ,(SELECT hospitalcode FROM opdconfig) AS hospcode
        ,p.cid AS pid
        ,CONCAT(p.pname,p.fname,' ',p.lname) full_name
        ,oa.report_date AS daterecord
        ,oa.agent_code24 AS drugallergy
        ,oa.agent AS dname
        ,ar.relation_name AS typedx
        ,al.seiousness_name as alevel
        ,oa.symptom
        ,'1' as informant
        ,(SELECT hospitalcode FROM opdconfig) AS informhosp
        ,oa.update_datetime AS d_update
        FROM opd_allergy oa
        LEFT OUTER JOIN patient p ON p.hn=oa.hn
        LEFT OUTER JOIN vn_stat v ON v.hn=oa.hn
        LEFT OUTER JOIN allergy_relation ar ON ar.allergy_relation_id=oa.allergy_relation_id
        LEFT OUTER JOIN allergy_seriousness al ON al.seriousness_id=oa.seriousness_id
        WHERE v.vstdate BETWEEN '$date1' AND '$date2'
        AND oa.hn='$id'
        AND (p.cid is null  or p.cid= ''
        OR oa.report_date  is null or oa.report_date = '' 
        OR oa.agent_code24 is null or oa.agent_code24  =''
        OR oa.update_datetime is null or oa.update_datetime='')";
        
       $data = Yii::$app->db->createCommand($sql)->queryAll();
        return $this->render('view', ['data_view' => $data]);
    }
}

