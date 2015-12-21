<?php

namespace frontend\modules\oppp\controllers;

use yii\web\Controller;
use yii\db\Query;
use Yii;
use yii\data\ArrayDataProvider;

class ChronicController extends Controller {  
    public function actionIndex() {
        $date1 = "";
        $date2 = "";
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }
          
        
        $sql = "SELECT p.person_id,c.hn,p.cid,CONCAT(p.pname,p.fname,' ',p.lname) AS full_name
        ,c.regdate AS date_diag
        ,i.icd10 AS chronic
        ,ms.clinic_member_status_name AS status
        FROM clinicmember c
        LEFT OUTER JOIN clinic_persist_icd i ON i.hn=c.hn
        LEFT OUTER JOIN patient pt ON pt.hn=c.hn
        LEFT OUTER JOIN person p ON p.cid=pt.cid
        LEFT OUTER JOIN vn_stat v ON v.cid=p.cid
        INNER JOIN clinic_member_status ms ON ms.clinic_member_status_id=c.clinic_member_status_id
        WHERE v.vstdate BETWEEN '$date1' AND '$date2'
        AND i.dxtype='1' 
        AND (i.icd10='' or i.icd10 is null  
        or p.person_id='' or p.person_id is null 
        or c.clinic_member_status_id='' or c.clinic_member_status_id is null 
        or c.lastupdate='' or c.lastupdate is null)  
        GROUP BY c.hn
        ORDER BY c.hn";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);
    }  
    public function actionView($id=NULL ,$date1 = NULL, $date2 = NULL) {
        
        $sql = "SELECT c.hn,CONCAT(p.pname,p.fname,' ',p.lname) AS full_name
        ,v.vstdate
        ,(SELECT hospitalcode FROM opdconfig )AS hospcode
        ,p.person_id AS pid
        ,c.regdate AS date_diag
        ,i.icd10 AS chronic
        ,(SELECT hospitalcode FROM opdconfig )AS hosp_dx
        ,(SELECT hospitalcode FROM opdconfig )AS hosp_rx
        ,c.dchdate AS date_disch
        ,c.clinic_member_status_id AS typedisch
        ,c.lastupdate AS d_update
        FROM clinicmember c
        LEFT OUTER JOIN clinic_persist_icd i ON i.hn=c.hn
        LEFT OUTER JOIN patient pt ON pt.hn=c.hn
        LEFT OUTER JOIN person p ON p.cid=pt.cid
        LEFT OUTER JOIN vn_stat v ON v.cid=p.cid
        WHERE v.vstdate BETWEEN '$date1' AND '$date2'
        AND c.hn='$id'
        AND i.dxtype='1' 
        AND (i.icd10='' or i.icd10 is null  
        or p.person_id='' or p.person_id is null 
        or c.clinic_member_status_id='' or c.clinic_member_status_id is null 
        or c.lastupdate='' or c.lastupdate is null)  
        GROUP BY c.hn
        ORDER BY c.hn ";
        
       $data = Yii::$app->db->createCommand($sql)->queryAll();
        return $this->render('view', ['data_view' => $data]);
    }
}

