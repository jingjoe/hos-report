<?php

namespace frontend\modules\oppp\controllers;
use yii\web\Controller;
use yii\db\Query;
use Yii;
use yii\data\ArrayDataProvider;

class DiagnosisopdController extends Controller {
    public function actionIndex() {
        $date1 = "";
        $date2 = "";
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }
          
        
        $sql = "SELECT  v.hn,v.vn,pt.cid,concat(pt.pname,pt.fname,' ',pt.lname) as full_name 
        ,(SELECT hospitalcode FROM opdconfig) AS hospcode
        ,o.seq_id AS seq
        ,od.vstdate AS date_serv
        FROM vn_stat v
        LEFT OUTER JOIN patient pt on pt.hn=v.hn
        INNER JOIN ovst_seq o ON o.vn=v.vn
        INNER JOIN ovstdiag  od ON od.vn=v.vn
        LEFT OUTER JOIN doctor d ON d.code=od.doctor
        LEFT OUTER JOIN spclty s ON s.spclty=v.spclty
        WHERE v.vstdate BETWEEN '$date1' AND '$date2'
        and(o.seq_id='' or o.seq_id is null  
        or od.vstdate='' or od.vstdate is null 
        or od.diagtype='' or od.diagtype is null 
        or od.icd10='' or od.icd10 is null
        or s.provis_code='' or s.provis_code is null
        or o.update_datetime='' or o.update_datetime is null)
        ORDER BY od.vstdate ";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);
    }
    public function actionView($id=NULL ,$date1 = NULL, $date2 = NULL) {
        $sql = "SELECT  v.vn,concat(pt.pname,pt.fname,' ',pt.lname) as full_name 
        ,(SELECT hospitalcode FROM opdconfig) AS hospcode
        ,v.cid AS pid
        ,v.hn
        ,o.seq_id AS seq
        ,od.vstdate AS date_serv
        ,od.diagtype
        ,od.icd10 AS diagecode
        ,s.provis_code AS clinic
        ,d.licenseno AS provider
        ,o.update_datetime AS d_update
        FROM vn_stat v
        LEFT OUTER JOIN patient pt on pt.hn=v.hn
        INNER JOIN ovst_seq o ON o.vn=v.vn
        INNER JOIN ovstdiag  od ON od.vn=v.vn
        LEFT OUTER JOIN doctor d ON d.code=od.doctor
        LEFT OUTER JOIN spclty s ON s.spclty=v.spclty
        WHERE o.seq_id='$id'
        and v.vstdate BETWEEN '$date1' AND '$date2'
        and(o.seq_id='' or o.seq_id is null  
        or od.vstdate='' or od.vstdate is null 
        or od.diagtype='' or od.diagtype is null 
        or od.icd10='' or od.icd10 is null
        or s.provis_code='' or s.provis_code is null
        or o.update_datetime='' or o.update_datetime is null) ";

        $data = Yii::$app->db->createCommand($sql)->queryAll();      
        return $this->render('view', ['data_view' => $data]);
    }
}

