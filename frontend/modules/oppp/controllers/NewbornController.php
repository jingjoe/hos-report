<?php

namespace frontend\modules\oppp\controllers;

use yii\web\Controller;
use yii\db\Query;
use Yii;
use yii\data\ArrayDataProvider;

class NewbornController extends Controller {  
    public function actionIndex() {

        $date1 = "";
        $date2 = "";
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }
          
        
        $sql = "SELECT p.person_id AS pid
        ,p.cid 
        ,CONCAT(p.pname,p.fname,' ',p.lname) full_name
        ,pl.gravida 
        ,pl.ga
        ,p.birthdate AS birth
        FROM person_labour  pl
        LEFT OUTER JOIN person p ON p.person_id=pl.person_id
        INNER JOIN person_labour_place pp ON pp.person_labor_place_id=pl.person_labour_place_id
        INNER JOIN labor_ba ba ON ba.labor_ba_id=pl.labor_ba_id
        INNER JOIN person_labour_doctor_type ld ON ld.person_labour_doctor_type_id=pl.person_labour_doctor_type_id
        INNER JOIN person_labour_type lt On lt.person_labour_type_id=pl.person_labour_type_id
        INNER JOIN person_labour_birth_no lo ON lo.person_labour_birth_no_id=pl.person_labour_birth_no_id
        WHERE p.birthdate BETWEEN '$date1' AND '$date2'
        AND (p.person_id is null  or p.person_id= ''
        OR p.mother_person_id is null or p.mother_person_id= '' 
        OR p.birthdate is null or p.birthdate=''
        OR lo.person_labour_birth_no_name is null or lo.person_labour_birth_no_name=''
        OR ba.labor_ba_name is null or ba.labor_ba_name=''
        OR pl.has_vitk is null or pl.has_vitk=''
        OR pl.thalassaemia_wife_location_type_id is null or pl.thalassaemia_wife_location_type_id='')";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);
    }  
    public function actionView($id=NULL ,$date1 = NULL, $date2 = NULL) {

        $sql = "SELECT (SELECT hospitalcode FROM opdconfig) AS hospcode
        ,p.person_id AS pid
        ,p.mother_person_id AS mpid
        ,CONCAT(p.pname,p.fname,' ',p.lname) full_name
        ,pl.gravida 
        ,pl.ga
        ,p.birthdate AS birth
        ,p.birthtime AS btime
        ,pp.person_labour_place_name AS bplace
        ,pl.labour_hospcode AS bhosp
        ,lo.person_labour_birth_no_name AS birthno
        ,lt.person_labour_type_name AS btype
        ,ld.person_labour_doctor_type_name AS bdoctor
        ,pl.birth_weight AS bweight
        ,ba.labor_ba_name AS asphyxia
        ,pl.has_vitk AS vitk
        ,pl.thalassaemia_wife_location_type_id AS ths
        ,pl.tsh_result AS tshresult
        ,p.last_update AS d_update
        FROM person_labour  pl
        LEFT OUTER JOIN person p ON p.person_id=pl.person_id
        INNER JOIN person_labour_place pp ON pp.person_labor_place_id=pl.person_labour_place_id
        INNER JOIN labor_ba ba ON ba.labor_ba_id=pl.labor_ba_id
        INNER JOIN person_labour_doctor_type ld ON ld.person_labour_doctor_type_id=pl.person_labour_doctor_type_id
        INNER JOIN person_labour_type lt On lt.person_labour_type_id=pl.person_labour_type_id
        INNER JOIN person_labour_birth_no lo ON lo.person_labour_birth_no_id=pl.person_labour_birth_no_id
        WHERE p.birthdate BETWEEN '$date1' AND '$date2'
        AND pl.person_id='$id'
        AND (p.person_id is null  or p.person_id= ''
        OR p.mother_person_id is null or p.mother_person_id= '' 
        OR p.birthdate is null or p.birthdate=''
        OR lo.person_labour_birth_no_name is null or lo.person_labour_birth_no_name=''
        OR ba.labor_ba_name is null or ba.labor_ba_name=''
        OR pl.has_vitk is null or pl.has_vitk=''
        OR pl.thalassaemia_wife_location_type_id is null or pl.thalassaemia_wife_location_type_id='')";
        
       $data = Yii::$app->db->createCommand($sql)->queryAll();
        return $this->render('view', ['data_view' => $data]);
    }
}

