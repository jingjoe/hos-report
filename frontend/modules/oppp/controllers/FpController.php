<?php

namespace frontend\modules\oppp\controllers;

use yii\web\Controller;
use yii\db\Query;
use Yii;
use yii\data\ArrayDataProvider;

class FpController extends Controller {  
    public function actionIndex() {

        $date1 = "";
        $date2 = "";
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }
          
        $sql = "SELECT pw.person_women_id AS id
        ,p.person_id AS pid
        ,CONCAT(p.pname,p.fname,' ',p.lname) full_name
        ,ws.service_date AS date_serv
        ,wb.women_birth_control_name AS fptype
        ,ws.doctor_code AS provider
        FROM person_women pw
        LEFT OUTER JOIN person p ON p.person_id=pw.person_id
        LEFT OUTER JOIN person_women_service ws ON ws.person_women_service_id=pw.person_women_id
        LEFT OUTER JOIN  ovst_seq o ON o.vn=ws.vn
        LEFT OUTER JOIN women_birth_control wb ON wb.women_birth_control_id=ws.women_birth_control_id
        WHERE ws.service_date BETWEEN '$date1' AND '$date2'
        AND (p.person_id is null  or p.person_id= ''
        OR ws.service_date is null or ws.service_date= '' 
        OR ws.women_birth_control_id is null or ws.women_birth_control_id ='')
        GROUP BY pw.person_women_id 
        ORDER BY ws.service_date DESC ";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);
    }  
    public function actionView($id=NULL ,$date1 = NULL, $date2 = NULL) {

        $sql = "SELECT pw.person_women_id AS id
        ,(SELECT hospitalcode FROM opdconfig) AS hospcode
        ,p.person_id AS pid
        ,CONCAT(p.pname,p.fname,' ',p.lname) full_name
        ,o.seq_id AS seq
        ,ws.service_date AS date_serv
        ,wb.women_birth_control_name AS fptype
        ,ws.provider_hospcode AS fpplace
        ,ws.doctor_code AS provider
        ,pw.last_update AS d_update
        FROM person_women pw
        LEFT OUTER JOIN person p ON p.person_id=pw.person_id
        LEFT OUTER JOIN person_women_service ws ON ws.person_women_service_id=pw.person_women_id
        LEFT OUTER JOIN  ovst_seq o ON o.vn=ws.vn
        LEFT OUTER JOIN women_birth_control wb ON wb.women_birth_control_id=ws.women_birth_control_id
        WHERE ws.service_date BETWEEN '$date1' AND '$date2'
        AND pw.person_women_id='$id'
        AND (p.person_id is null  or p.person_id= ''
        OR ws.service_date is null or ws.service_date= '' 
        OR ws.women_birth_control_id is null or ws.women_birth_control_id ='')
        GROUP BY pw.person_women_id 
        ORDER BY ws.service_date DESC";
        
       $data = Yii::$app->db->createCommand($sql)->queryAll();
        return $this->render('view', ['data_view' => $data]);
    }
}

