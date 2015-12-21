<?php

namespace frontend\modules\oppp\controllers;

use yii\web\Controller;
use yii\db\Query;
use Yii;
use yii\data\ArrayDataProvider;

class AppointmentController extends Controller {  
    public function actionIndex() {
    
        $date1 = "";
        $date2 = "";
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }
          
        
        $sql = "SELECT op.oapp_id AS id
        ,pt.cid AS pid
        ,CONCAT(pt.pname,pt.fname,' ',pt.lname) full_name
        ,op.vstdate AS date_serv
        ,c.name AS clinic
        ,pa.name AS aptype
        ,d.name AS provider
        FROM oapp op
        LEFT OUTER JOIN ovst_seq o ON o.vn=op.vn
        LEFT OUTER JOIN provis_aptype pa ON pa.code=op.provis_aptype_code
        LEFT OUTER JOIN doctor d ON d.code=op.doctor
        LEFT OUTER JOIN patient pt ON pt.hn=op.hn
        LEFT OUTER JOIN clinic c ON c.clinic=op.clinic
        WHERE op.vstdate BETWEEN '$date1' AND '$date2'
        AND (pt.cid is null  or pt.cid= ''
        OR o.seq_id is null or o.seq_id= '' 
        OR op.vstdate  is null or op.vstdate  =''
        OR op.clinic is null or op.clinic=''
        OR op.nextdate is null or op.nextdate=''
        OR op.provis_aptype_code is null or op.provis_aptype_code='')
        GROUP BY op.vn
        ORDER BY op.vstdate DESC";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);
    }  
    public function actionView($id=NULL ,$date1 = NULL, $date2 = NULL) {

        $sql = "SELECT op.oapp_id AS id
        ,(SELECT hospitalcode FROM opdconfig) AS hospcode 
        ,pt.cid AS pid
        ,CONCAT(pt.pname,pt.fname,' ',pt.lname) full_name
        ,op.an
        ,o.seq_id AS seq
        ,op.vstdate AS date_serv
        ,c.name AS clinic
        ,op.nextdate AS apdate
        ,pa.name AS aptype
        ,'' AS apdiag
        ,d.name AS provider
        ,op.update_datetime AS d_update
        FROM oapp op
        LEFT OUTER JOIN ovst_seq o ON o.vn=op.vn
        LEFT OUTER JOIN provis_aptype pa ON pa.code=op.provis_aptype_code
        LEFT OUTER JOIN doctor d ON d.code=op.doctor
        LEFT OUTER JOIN patient pt ON pt.hn=op.hn
        LEFT OUTER JOIN clinic c ON c.clinic=op.clinic
        WHERE op.vstdate BETWEEN '$date1' AND '$date2'
        AND op.oapp_id='$id'
        AND (pt.cid is null  or pt.cid= ''
        OR o.seq_id is null or o.seq_id= '' 
        OR op.vstdate  is null or op.vstdate  =''
        OR op.clinic is null or op.clinic=''
        OR op.nextdate is null or op.nextdate=''
        OR op.provis_aptype_code is null or op.provis_aptype_code='')
        GROUP BY op.vn
        ORDER BY op.vstdate DESC";
        
       $data = Yii::$app->db->createCommand($sql)->queryAll();
        return $this->render('view', ['data_view' => $data]);
    }
}

