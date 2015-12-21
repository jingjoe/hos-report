<?php

namespace frontend\modules\oppp\controllers;

use yii\web\Controller;
use yii\db\Query;
use Yii;
use yii\data\ArrayDataProvider;

class SurveillanceController extends Controller {  
    public function actionIndex() {

        
        $date1 = "";
        $date2 = "";
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }
          
        
        $sql = "SELECT sm.sv_number AS id
        ,p.cid AS pid
        ,CONCAT(p.pname,p.fname,' ',p.lname) full_name
        ,sm.vstdate AS date_serv
        ,sm.pdx AS diagcode
        ,sm.code506
        ,u.name AS provider
        FROM surveil_member sm
        LEFT OUTER JOIN ovst_seq o ON o.vn=sm.vn
        LEFT OUTER JOIN patient p ON p.hn=sm.hn
        LEFT OUTER JOIN opduser u ON u.loginname=sm.staff
        WHERE sm.vstdate BETWEEN '$date1' AND '$date2'
        AND (p.cid  is null  or p.cid = ''
        OR o.seq_id is null or o.seq_id= '' 
        OR sm.vstdate is null or sm.vstdate =''
        OR sm.pdx is null or sm.pdx=''
        OR sm.code506 is null or sm.code506=''
        OR sm.pat_moo is null or sm.pat_moo=''
        OR sm.pat_tmbpart is null or sm.pat_tmbpart=''
        OR sm.pat_amppart is null or sm.pat_amppart=''
        OR sm.pat_chwpart  is null or sm.pat_chwpart =''
        OR sm.ptstat  is null or sm.ptstat =''
        OR sm.last_update is null or sm.last_update='') ";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);
    }  
    public function actionView($id=NULL ,$date1 = NULL, $date2 = NULL) {

        $sql = "SELECT sm.sv_number AS id
        ,(SELECT hospitalcode FROM opdconfig) AS hospcode
        ,p.cid AS pid
        ,CONCAT(p.pname,p.fname,' ',p.lname) full_name
        ,o.seq_id AS seq
        ,sm.vstdate AS date_serv
        ,'ไม่ระบุ' AS an
        ,'ไม่ระบุ' AS datetime_admit
        ,'ไม่ระบุ' AS syndrome
        ,sm.pdx AS diagcode
        ,sm.code506
        ,sm.pdx AS diagcodelast
        ,sm.code506 AS code506last
        ,sm.vstdate AS illdate
        ,sm.pat_addr AS illhouse
        ,sm.pat_moo AS illvillage
        ,sm.pat_tmbpart AS illtambon
        ,sm.pat_amppart AS illampur
        ,sm.pat_chwpart AS illchangwat
        ,sm.house_lat AS latitude
        ,sm.house_long AS longitude
        ,sm.ptstat AS ptstatus
        ,sm.death_date AS date_death
        ,sm.complication
        ,sm.organism
        ,u.name AS provider
        ,sm.last_update AS d_update
        FROM surveil_member sm
        LEFT OUTER JOIN ovst_seq o ON o.vn=sm.vn
        LEFT OUTER JOIN patient p ON p.hn=sm.hn
        LEFT OUTER JOIN opduser u ON u.loginname=sm.staff
        WHERE sm.vstdate BETWEEN '$date1' AND '$date2'
        AND sm.sv_number='$id'
        AND (p.cid  is null  or p.cid = ''
        OR o.seq_id is null or o.seq_id= '' 
        OR sm.vstdate is null or sm.vstdate =''
        OR sm.pdx is null or sm.pdx=''
        OR sm.code506 is null or sm.code506=''
        OR sm.pat_moo is null or sm.pat_moo=''
        OR sm.pat_tmbpart is null or sm.pat_tmbpart=''
        OR sm.pat_amppart is null or sm.pat_amppart=''
        OR sm.pat_chwpart  is null or sm.pat_chwpart =''
        OR sm.ptstat  is null or sm.ptstat =''
        OR sm.last_update is null or sm.last_update='')";
        
       $data = Yii::$app->db->createCommand($sql)->queryAll();
        return $this->render('view', ['data_view' => $data]);
    }
}

