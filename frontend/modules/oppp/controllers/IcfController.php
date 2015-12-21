<?php

namespace frontend\modules\oppp\controllers;

use yii\web\Controller;
use yii\db\Query;
use Yii;
use yii\data\ArrayDataProvider;

class IcfController extends Controller {  
    public function actionIndex() {

        $date1 = "";
        $date2 = "";
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }
          
        
        $sql = "SELECT oi.ovst_icf_id AS id
        ,pd.deformed_no AS disabid
        ,p.person_id AS pid
        ,CONCAT(p.pname,p.fname,' ',p.lname) full_name
        ,v.vstdate AS date_serv
        ,it.ovst_icf_type_name AS icf
        ,fl.ovst_icf_level_type_name AS qualifier
        ,d.name AS provider
        FROM ovst_icf oi
        LEFT OUTER JOIN vn_stat v ON v.vn=oi.vn
        LEFT OUTER JOIN ovst_seq o ON o.vn=oi.vn
        LEFT OUTER JOIN person p ON p.cid=v.cid
        LEFT OUTER JOIN person_deformed pd ON pd.person_id=p.person_id
        LEFT OUTER JOIN doctor d ON d.code=oi.doctor
        LEFT OUTER JOIN ovst_icf_level_type fl ON fl.ovst_icf_level_type_id=oi.ovst_icf_level_type_id
        LEFT OUTER JOIN ovst_icf_type it ON it.ovst_icf_type_id=oi.ovst_icf_type_id
        WHERE v.vstdate BETWEEN '$date1' AND '$date2' 
        AND (p.person_id is null  or p.person_id= ''
        OR o.seq_id is null or o.seq_id= '' 
        OR v.vstdate is null or v.vstdate =''
        OR oi.ovst_icf_type_id is null or oi.ovst_icf_type_id=''
        OR oi.ovst_icf_level_type_id is null or oi.ovst_icf_level_type_id=''
        OR oi.entry_datetime is null or oi.entry_datetime='') ";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);
    }  
    public function actionView($id=NULL ,$date1 = NULL, $date2 = NULL) {

        $sql = "SELECT oi.ovst_icf_id AS id
        ,(SELECT hospitalcode FROM opdconfig) AS hospcode
        ,pd.deformed_no AS disabid
        ,p.person_id AS pid
        ,CONCAT(p.pname,p.fname,' ',p.lname) full_name
        ,o.seq_id AS seq
        ,v.vstdate AS date_serv
        ,it.ovst_icf_type_name AS icf
        ,fl.ovst_icf_level_type_name AS qualifier
        ,d.name AS provider
        ,oi.entry_datetime AS d_update
        FROM ovst_icf oi
        LEFT OUTER JOIN vn_stat v ON v.vn=oi.vn
        LEFT OUTER JOIN ovst_seq o ON o.vn=oi.vn
        LEFT OUTER JOIN person p ON p.cid=v.cid
        LEFT OUTER JOIN person_deformed pd ON pd.person_id=p.person_id
        LEFT OUTER JOIN doctor d ON d.code=oi.doctor
        LEFT OUTER JOIN ovst_icf_level_type fl ON fl.ovst_icf_level_type_id=oi.ovst_icf_level_type_id
        LEFT OUTER JOIN ovst_icf_type it ON it.ovst_icf_type_id=oi.ovst_icf_type_id
        WHERE v.vstdate BETWEEN '$date1' AND '$date2'
        AND oi.ovst_icf_id='$id'
        AND (p.person_id is null  or p.person_id= ''
        OR o.seq_id is null or o.seq_id= '' 
        OR v.vstdate is null or v.vstdate =''
        OR oi.ovst_icf_type_id is null or oi.ovst_icf_type_id=''
        OR oi.ovst_icf_level_type_id is null or oi.ovst_icf_level_type_id=''
        OR oi.entry_datetime is null or oi.entry_datetime='')";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        return $this->render('view', ['data_view' => $data]);
    }
}

