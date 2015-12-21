<?php

namespace frontend\modules\oppp\controllers;

use yii\web\Controller;
use yii\db\Query;
use Yii;
use yii\data\ArrayDataProvider;

class NutritionController extends Controller { 
    public function actionMain() {
        return $this->render('main');
    }
    public function actionNutri3() {

        $date1 = "";
        $date2 = "";
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }

        $sql = "SELECT wn.person_wbc_nutrition_id AS nu_id
        ,(SELECT hospitalcode FROM opdconfig) AS hospcode
        ,CONCAT(p.pname,p.fname,' ',p.lname) full_name
        ,p.person_id AS pid
        ,o.seq_id AS seq
        ,wn.nutrition_date AS date_serv
        ,ep.person_epi_place_name AS nutritionplace
        ,wn.body_weight AS weight
        ,wn.height 
        ,wn.head_circum_cm AS headcircum
        ,nt.person_nutrition_childdevelop_type_name AS childdevelop
        ,nf.person_nutrition_food_type_name AS food
        ,nb.person_nutrition_bottle_type_name AS bottle
        ,doc.name AS provider
        ,wn.update_datetime AS d_update
        FROM person_wbc_nutrition wn
        INNER JOIN person_wbc pw ON pw.person_wbc_id=wn.person_wbc_id
        INNER JOIN person p ON p.person_id=pw.person_id
        LEFT OUTER JOIN  ovst_seq o ON o.vn=wn.vn
        INNER JOIN doctor doc ON doc.code=wn.doctor_code
        INNER JOIN person_epi_place ep ON ep.person_epi_place_id=wn.person_epi_place_id
        INNER JOIN person_nutrition_childdevelop_type  nt ON nt.person_nutrition_childdevelop_type_id=wn.person_nutrition_childdevelop_type_id
        INNER JOIN person_nutrition_food_type nf ON nf.person_nutrition_food_type_id=wn.person_nutrition_food_type_id
        INNER JOIN person_nutrition_bottle_type nb ON nb.person_nutrition_bottle_type_id=wn.person_nutrition_bottle_type_id
        WHERE wn.nutrition_date BETWEEN '$date1' AND '$date2'";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);
    } 
    public function actionNutri4() {

        $date1 = "";
        $date2 = "";
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }
                 
        $sql = "SELECT en.person_epi_nutrition_id AS en_id
        ,(SELECT hospitalcode FROM opdconfig) AS hospcode
        ,p.person_id AS pid
        ,CONCAT(p.pname,p.fname,' ',p.lname) full_name 
        ,o.seq_id AS seq
        ,en.nutrition_date AS date_serv
        ,ep.person_epi_place_name AS nutritionplace
        ,en.body_weight AS weight
        ,en.height 
        ,en.head_circum_cm AS headcircum
        ,nt.person_nutrition_childdevelop_type_name AS childdevelop
        ,nf.person_nutrition_food_type_name AS food
        ,nb.person_nutrition_bottle_type_name AS bottle
        ,doc.name AS provider
        ,en.update_datetime AS d_update
        FROM person_epi_nutrition en
        INNER JOIN person_epi pe ON pe.person_epi_id=en.person_epi_id
        INNER JOIN person p ON p.person_id=pe.person_id
        LEFT OUTER JOIN  ovst_seq o ON o.vn=en.vn
        INNER JOIN doctor doc ON doc.code=en.doctor_code
        INNER JOIN person_epi_place ep ON ep.person_epi_place_id=en.person_epi_place_id
        INNER JOIN person_nutrition_childdevelop_type  nt ON nt.person_nutrition_childdevelop_type_id=en.person_nutrition_childdevelop_type_id
        INNER JOIN person_nutrition_food_type nf ON nf.person_nutrition_food_type_id=en.person_nutrition_food_type_id
        INNER JOIN person_nutrition_bottle_type nb ON nb.person_nutrition_bottle_type_id=en.person_nutrition_bottle_type_id
        WHERE en.nutrition_date BETWEEN '$date1' AND '$date2'";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);
    } 
    public function actionNutri5() {

        $date1 = "";
        $date2 = "";
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }
        
        $sql = "SELECT us.village_student_screen_id AS us_id
        ,(SELECT hospitalcode FROM opdconfig) AS hospcode
        ,CONCAT(p.pname,p.fname,' ',p.lname) full_name
        ,p.person_id AS pid
        ,o.seq_id AS seq
        ,us.screen_date AS date_serv
        ,us.screen_hospcode AS nutritionplace
        ,us.body_weight AS weight
        ,us.height 
        ,us.head_circum_cm AS headcircum
        ,nt.person_nutrition_childdevelop_type_name AS childdevelop
        ,nf.person_nutrition_food_type_name AS food
        ,nb.person_nutrition_bottle_type_name AS bottle
        ,doc.name AS provider
        ,us.update_datetime AS d_update
        FROM village_student_screen us
        INNER JOIN village_student vs ON vs.village_student_id=us.village_student_id
        INNER JOIN person p ON p.person_id=vs.person_id
        LEFT OUTER JOIN  ovst_seq o ON o.vn=us.vn
        INNER JOIN doctor doc ON doc.code=us.doctor_code
        INNER JOIN person_nutrition_childdevelop_type  nt ON nt.person_nutrition_childdevelop_type_id=us.person_nutrition_childdevelop_type_id
        INNER JOIN person_nutrition_food_type nf ON nf.person_nutrition_food_type_id=us.person_nutrition_food_type_id
        INNER JOIN person_nutrition_bottle_type nb ON nb.person_nutrition_bottle_type_id=us.person_nutrition_bottle_type_id
        WHERE us.screen_date BETWEEN '$date1' AND '$date2'";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);
        return $this->render('index', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);
    } 
   
}

