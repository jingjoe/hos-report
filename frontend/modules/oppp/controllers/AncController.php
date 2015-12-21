<?php

namespace frontend\modules\oppp\controllers;

use yii\web\Controller;
use yii\db\Query;
use Yii;
use yii\data\ArrayDataProvider;

class AncController extends Controller {  
    public function actionIndex() {
        $date1 = "";
        $date2 = "";
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }
          
        
        $sql = "SELECT pas.person_anc_service_id AS id
        ,p.person_id AS pid
        ,CONCAT(p.pname,p.fname,' ',p.lname) full_name
        ,pas.anc_service_date AS date_serv
        ,pa.preg_no AS gravida
        ,pas.anc_service_number AS ancno
        ,pas.pa_week AS ga 
        ,ao.anc_result AS ancresult
        ,ao.precare_hospcode AS ancplace
        ,pa.anc_register_staff AS provider
        FROM person_anc_service pas
        LEFT OUTER JOIN person_anc pa ON pa.person_anc_id=pas.person_anc_id
        LEFT OUTER JOIN person p ON p.person_id=pa.person_id
        LEFT OUTER JOIN person_anc_other_precare po ON po.person_anc_id=pa.person_anc_id
        LEFT OUTER JOIN ovst_seq o ON o.vn=pas.vn
        LEFT OUTER JOIN person_anc_other_precare ao ON ao.person_anc_id=pa.person_anc_id
        WHERE pas.anc_service_date BETWEEN '$date1' AND '$date2'
        AND (p.person_id is null  or p.person_id= ''
        OR pas.anc_service_date is null or pas.anc_service_date= '' 
        OR pa.preg_no is null or pa.preg_no =''
        OR pas.pa_week is null or pas.pa_week=''
        OR pa.last_update is null or pa.last_update='')";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);
    }  
    public function actionView($id=NULL ,$date1 = NULL, $date2 = NULL) {
        
        $sql = "SELECT pas.person_anc_service_id AS id
        ,(SELECT hospitalcode FROM opdconfig) AS hospcode
        ,p.person_id AS pid
        ,CONCAT(p.pname,p.fname,' ',p.lname) full_name
        ,o.seq_id AS seq
        ,pas.anc_service_date AS date_serv
        ,pa.preg_no AS gravida
        ,pas.anc_service_number AS ancno
        ,pas.pa_week AS ga 
        ,ao.anc_result AS ancresult
        ,ao.precare_hospcode AS ancplace
        ,pa.anc_register_staff AS provider
        ,pa.last_update AS d_update
        FROM person_anc_service pas
        LEFT OUTER JOIN person_anc pa ON pa.person_anc_id=pas.person_anc_id
        LEFT OUTER JOIN person p ON p.person_id=pa.person_id
        LEFT OUTER JOIN person_anc_other_precare po ON po.person_anc_id=pa.person_anc_id
        LEFT OUTER JOIN ovst_seq o ON o.vn=pas.vn
        LEFT OUTER JOIN person_anc_other_precare ao ON ao.person_anc_id=pa.person_anc_id
        WHERE pas.anc_service_date BETWEEN '$date1' AND '$date2'
        AND pas.person_anc_service_id='$id'
        AND (p.person_id is null  or p.person_id= ''
        OR pas.anc_service_date is null or pas.anc_service_date= '' 
        OR pa.preg_no is null or pa.preg_no =''
        OR pas.pa_week is null or pas.pa_week=''
        OR pa.last_update is null or pa.last_update='')";
        
       $data = Yii::$app->db->createCommand($sql)->queryAll();
        return $this->render('view', ['data_view' => $data]);
    }
}

