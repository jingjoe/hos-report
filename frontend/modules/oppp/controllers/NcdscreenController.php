<?php

namespace frontend\modules\oppp\controllers;

use yii\web\Controller;
use yii\db\Query;
use Yii;
use yii\data\ArrayDataProvider;

class NcdscreenController extends Controller {  
    public function actionIndex() {

        $date1 = "";
        $date2 = "";
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }
          
        
        $sql = "SELECT ps.person_dmht_screen_summary_id AS id
        ,p.person_id AS pid
        ,CONCAT(p.pname,p.fname,' ',p.lname) full_name
        ,prs.screen_date AS date_serv
        ,prs.body_height AS height
        ,prs.body_weight AS weight
        ,prs.waist AS waist_cm
        ,prs.last_bps AS sbp_1
        ,prs.last_bpd AS dbp_1
        ,d.name AS provider
        FROM person_dmht_screen_summary  ps
        LEFT OUTER JOIN person_dmht_nhso_screen  pns ON pns.person_dmht_screen_summary_id=ps.person_dmht_screen_summary_id
        LEFT OUTER JOIN person_dmht_risk_screen_head prs ON prs.person_dmht_screen_summary_id=ps.person_dmht_screen_summary_id
        LEFT OUTER JOIN person p ON p.person_id=ps.person_id
        LEFT OUTER JOIN doctor d ON d.code=prs.doctor_code
        WHERE prs.screen_date BETWEEN '$date1' AND '$date2'
        AND (p.person_id is null  or p.person_id= ''
        OR prs.screen_date  is null or prs.screen_date = '' 
        OR prs.in_hospital is null or prs.in_hospital= '' 
        OR prs.body_height is null or prs.body_height= '' 
        OR prs.body_weight is null or prs.body_weight= '' 
        OR prs.waist is null or prs.waist =''
        OR prs.last_bps is null or prs.last_bps=''
        OR prs.last_bpd is null or prs.last_bpd=''
        OR ps.last_screen_datetime is null or ps.last_screen_datetime='')
        GROUP BY ps.person_dmht_screen_summary_id
        ORDER BY prs.screen_date ";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);
    }  
    public function actionView($id=NULL ,$date1 = NULL, $date2 = NULL) {
 
        $sql = "SELECT ps.person_dmht_screen_summary_id AS id
        ,(SELECT hospitalcode FROM opdconfig) AS hospcode
        ,p.person_id AS pid
        ,CONCAT(p.pname,p.fname,' ',p.lname) full_name
        ,p.cid AS seq
        ,prs.screen_date AS date_serv
        ,prs.in_hospital AS sprvplace
        ,pns.present_smoking AS smoke
        ,pns.present_drinking_alcohol AS alcohol
        ,'ไม่ตรวจสอบ' AS dmfamily
        ,'ไม่ตรวจสอบ' AS htfamily
        ,prs.body_height AS height
        ,prs.body_weight AS weight
        ,prs.waist AS waist_cm
        ,prs.last_bps AS sbp_1
        ,prs.last_bpd AS dbp_1
        ,'ไม่ตรวจสอบ' AS sbp_2
        ,'ไม่ตรวจสอบ' AS dbp_2
        ,prs.last_fgc_no_food_limit AS bslevel
        ,prs.last_fgc AS bstest
        ,prs.screen_hospcode AS screenplace
        ,d.name AS provider
        ,ps.last_screen_datetime AS d_update
        FROM person_dmht_screen_summary  ps
        LEFT OUTER JOIN person_dmht_nhso_screen  pns ON pns.person_dmht_screen_summary_id=ps.person_dmht_screen_summary_id
        LEFT OUTER JOIN person_dmht_risk_screen_head prs ON prs.person_dmht_screen_summary_id=ps.person_dmht_screen_summary_id
        LEFT OUTER JOIN person p ON p.person_id=ps.person_id
        LEFT OUTER JOIN doctor d ON d.code=prs.doctor_code
        WHERE prs.screen_date BETWEEN '$date1' AND '$date2'
        AND ps.person_dmht_screen_summary_id='$id'
        AND (p.person_id is null  or p.person_id= ''
        OR prs.screen_date  is null or prs.screen_date = '' 
        OR prs.in_hospital is null or prs.in_hospital= '' 
        OR prs.body_height is null or prs.body_height= '' 
        OR prs.body_weight is null or prs.body_weight= '' 
        OR prs.waist is null or prs.waist =''
        OR prs.last_bps is null or prs.last_bps=''
        OR prs.last_bpd is null or prs.last_bpd=''
        OR ps.last_screen_datetime is null or ps.last_screen_datetime='')
        GROUP BY ps.person_dmht_screen_summary_id
        ORDER BY prs.screen_date ";
        
       $data = Yii::$app->db->createCommand($sql)->queryAll();
        return $this->render('view', ['data_view' => $data]);
    }
}

