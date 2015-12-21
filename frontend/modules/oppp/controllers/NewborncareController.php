<?php

namespace frontend\modules\oppp\controllers;

use yii\web\Controller;
use yii\db\Query;
use Yii;
use yii\data\ArrayDataProvider;

class NewborncareController extends Controller {  
    public function actionIndex() {

        $date1 = "";
        $date2 = "";
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }
          
        
        $sql = "SELECT pc.person_wbc_post_care_id AS id
        ,p.person_id AS pid
        ,p.cid
        ,CONCAT(p.pname,p.fname,' ',p.lname) full_name
        ,pc.care_date AS bcare
        ,pb.labour_hospcode AS bcplace
        ,cr.person_wbc_post_care_result_type_name AS bcareresult
        ,nf.person_nutrition_food_type_name AS food
        ,doc.name AS provider
        FROM person_wbc_post_care pc
        LEFT OUTER JOIN person_wbc pw ON pw.person_wbc_id=pc.person_wbc_id
        LEFT OUTER JOIN person p ON p.person_id=pw.person_id
        LEFT OUTER JOIN vn_stat v ON v.cid=p.cid
        LEFT OUTER JOIN ovst_seq o ON o.vn=v.vn
        LEFT OUTER JOIN person_wbc_post_care_result_type cr ON cr.person_wbc_post_care_result_type_id=pc.person_wbc_post_care_result_type_id
        LEFT OUTER JOIN person_nutrition_food_type nf ON nf.person_nutrition_food_type_id=pc.person_nutrition_food_type_id
        LEFT OUTER JOIN doctor doc ON doc.code=pc.doctor_code
        LEFT OUTER JOIN person_labour pb ON pb.person_id=p.person_id
        WHERE pc.care_date BETWEEN '$date1' AND '$date2'
        AND (p.person_id is null  or p.person_id= ''
        OR p.birthdate is null or p.birthdate= '' 
        OR pc.care_date  is null or pc.care_date =''
        OR pc.person_wbc_post_care_result_type_id is null or pc.person_wbc_post_care_result_type_id=''
        OR pc.person_nutrition_food_type_id is null or pc.person_nutrition_food_type_id='')
        GROUP BY id
        ORDER BY pc.care_date";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);
    }  
    public function actionView($id=NULL ,$date1 = NULL, $date2 = NULL) {

        $sql = "SELECT pc.person_wbc_post_care_id AS id
        ,(SELECT hospitalcode FROM opdconfig) AS hospcode
        ,p.person_id AS pid
        ,CONCAT(p.pname,p.fname,' ',p.lname) full_name
        ,o.seq_id AS seq
        ,p.birthdate AS bdate
        ,pc.care_date AS bcare
        ,pb.labour_hospcode AS bcplace
        ,cr.person_wbc_post_care_result_type_name AS bcareresult
        ,nf.person_nutrition_food_type_name AS food
        ,doc.name AS provider
        ,pw.last_update AS d_update
        FROM person_wbc_post_care pc
        LEFT OUTER JOIN person_wbc pw ON pw.person_wbc_id=pc.person_wbc_id
        LEFT OUTER JOIN person p ON p.person_id=pw.person_id
        LEFT OUTER JOIN vn_stat v ON v.cid=p.cid
        LEFT OUTER JOIN ovst_seq o ON o.vn=v.vn
        LEFT OUTER JOIN person_wbc_post_care_result_type cr ON cr.person_wbc_post_care_result_type_id=pc.person_wbc_post_care_result_type_id
        LEFT OUTER JOIN person_nutrition_food_type nf ON nf.person_nutrition_food_type_id=pc.person_nutrition_food_type_id
        LEFT OUTER JOIN doctor doc ON doc.code=pc.doctor_code
        LEFT OUTER JOIN person_labour pb ON pb.person_id=p.person_id
        WHERE pc.care_date BETWEEN '$date1' AND '$date2'
        AND pc.person_wbc_post_care_id ='$id'
        AND (p.person_id is null  or p.person_id= ''
        OR p.birthdate is null or p.birthdate= '' 
        OR pc.care_date  is null or pc.care_date =''
        OR pc.person_wbc_post_care_result_type_id is null or pc.person_wbc_post_care_result_type_id=''
        OR pc.person_nutrition_food_type_id is null or pc.person_nutrition_food_type_id='')
        GROUP BY id
        ORDER BY pc.care_date ";
        
       $data = Yii::$app->db->createCommand($sql)->queryAll();
        return $this->render('view', ['data_view' => $data]);
    }
}

