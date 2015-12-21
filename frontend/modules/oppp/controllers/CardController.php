<?php

namespace frontend\modules\oppp\controllers;

use yii\web\Controller;
use yii\db\Query;
use Yii;
use yii\data\ArrayDataProvider;

class CardController extends Controller {  
    public function actionIndex() {

        $date1 = "";
        $date2 = "";
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }

        $sql = "SELECT p.person_id ,p.cid ,CONCAT(p.pname,p.fname,' ',p.lname) AS full_name
        ,v.vstdate
        ,v.vn
        ,pt.name AS instype
        FROM person p 
        INNER JOIN provis_instype pi ON pi.code=p.pttype
        INNER JOIN pttype pt ON pt.pttype=p.pttype
        LEFT OUTER JOIN vn_stat v ON v.cid=p.cid
        WHERE v.vstdate  between '$date1' and '$date2' 
        AND (p.person_id is null OR p.person_id=''
        OR pi.pttype_std_code is null OR pi.pttype_std_code=''
        OR p.last_update is null OR p.last_update='') ";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);
    }  
    public function actionView($id=NULL ,$date1 = NULL, $date2 = NULL) {

        $sql = "SELECT CONCAT(p.pname,p.fname,' ',p.lname) AS full_name
        ,p.cid
        ,v.vstdate
        ,(SELECT hospitalcode FROM opdconfig )AS hospcode
        ,p.person_id as pid
        ,p.pttype AS instype_old
        ,pi.pttype_std_code AS instype_new
        ,p.pttype_no AS insid
        ,p.pttype_begin_date AS startdate
        ,p.pttype_expire_date AS exppiredate
        ,p.pttype_hospmain AS main
        ,p.pttype_hospsub AS sub_spclty
        ,p.last_update AS d_update
        FROM person p 
        INNER JOIN provis_instype pi ON pi.code=p.pttype
        LEFT OUTER JOIN vn_stat v ON v.cid=p.cid
        WHERE v.vstdate  between '$date1' and '$date2'
        AND v.vn='$id'
        AND (p.person_id is null OR p.person_id=''
        OR pi.pttype_std_code is null OR pi.pttype_std_code=''
        OR p.last_update is null OR p.last_update='')
        ORDER BY v.vstdate ";
        
       $data = Yii::$app->db->createCommand($sql)->queryAll();
        return $this->render('view', ['data_view' => $data]);
    }
}

