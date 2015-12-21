<?php

namespace frontend\modules\oppp\controllers;

use yii\web\Controller;
use yii\db\Query;
use Yii;
use yii\data\ArrayDataProvider;

class PrenatalController extends Controller {  
    public function actionIndex() {

        
        $date1 = "";
        $date2 = "";
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }
          
        
        $sql = "SELECT pa.person_anc_id AS id
        ,p.person_id AS pid
        ,CONCAT(p.pname,p.fname,' ',p.lname) full_name
        ,pa.preg_no AS gravida
        ,pa.lmp
        ,pa.edc
        ,pa.blood_hiv1_result AS vdrl_result
        ,'ปกติ' AS hb_result
        ,pa.blood_hiv1_result AS hiv_result
        ,pa.blood_hct_result AS hct_result
        ,tr.thalassaemia_result_name AS thalassaemia
        FROM person_anc pa
        LEFT OUTER JOIN person p ON p.person_id=pa.person_id
        INNER JOIN thalassaemia_result tr ON tr.thalassaemia_result_id=pa.thalassaemia_result_id
        LEFT OUTER JOIN person_anc_service pas ON pas.person_anc_id=pa.person_anc_id
        LEFT OUTER JOIN person_anc_lab al ON al.person_anc_service_id=pas.person_anc_service_id
        WHERE pa.anc_register_date BETWEEN '$date1' AND '$date2'
        AND (p.person_id is null  or p.person_id= ''
        OR pa.preg_no is null or pa.preg_no= '' 
        OR pa.lmp is null or pa.lmp =''
        OR pa.blood_hiv1_result is null or pa.blood_hiv1_result=''
        OR pa.blood_hiv1_result is null or pa.blood_hiv1_result=''
        OR pa.thalassaemia_result_id is null or pa.thalassaemia_result_id='')
        GROUP BY pa.person_anc_id
        ORDER BY pa.anc_register_date DESC";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);
    }  
    public function actionView($id=NULL ,$date1 = NULL, $date2 = NULL) {

        $sql = "SELECT pa.person_anc_id AS id
        ,(SELECT hospitalcode FROM opdconfig) AS hospcode
        ,p.person_id AS pid
        ,CONCAT(p.pname,p.fname,' ',p.lname) full_name
        ,pa.preg_no AS gravida
        ,pa.lmp
        ,pa.edc
        ,pa.blood_hiv1_result AS vdrl_result
        ,'ปกติ' AS hb_result
        ,pa.blood_hiv1_result AS hiv_result
        ,pas.anc_service_date AS date_hct
        ,pa.blood_hct_result AS hct_result
        ,tr.thalassaemia_result_name AS thalassaemia
        ,pa.last_update AS d_update
        FROM person_anc pa
        LEFT OUTER JOIN person p ON p.person_id=pa.person_id
        INNER JOIN thalassaemia_result tr ON tr.thalassaemia_result_id=pa.thalassaemia_result_id
        LEFT OUTER JOIN person_anc_service pas ON pas.person_anc_id=pa.person_anc_id
        LEFT OUTER JOIN person_anc_lab al ON al.person_anc_service_id=pas.person_anc_service_id
        WHERE pa.anc_register_date BETWEEN '$date1' AND '$date2'
        AND pa.person_anc_id='$id'
        AND (p.person_id is null  or p.person_id= ''
        OR pa.preg_no is null or pa.preg_no= '' 
        OR pa.lmp is null or pa.lmp =''
        OR pa.blood_hiv1_result is null or pa.blood_hiv1_result=''
        OR pa.blood_hiv1_result is null or pa.blood_hiv1_result=''
        OR pa.thalassaemia_result_id is null or pa.thalassaemia_result_id='')
        GROUP BY pa.person_anc_id
        ORDER BY pa.anc_register_date DESC";
        
       $data = Yii::$app->db->createCommand($sql)->queryAll();
        return $this->render('view', ['data_view' => $data]);
    }
}

