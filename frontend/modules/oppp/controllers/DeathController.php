<?php

namespace frontend\modules\oppp\controllers;

use yii\web\Controller;
use yii\db\Query;
use Yii;
use yii\data\ArrayDataProvider;

class DeathController extends Controller {
    
    public function actionIndex() {
        $date1 = "";
        $date2 = "";
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }
          
        
        $sql = "SELECT d.hn,CONCAT(p.pname,p.fname,' ',p.lname) AS full_name,p.cid ,d.death_date
        FROM death   d
        LEFT OUTER JOIN patient p ON p.hn=d.hn
        LEFT OUTER JOIN vn_stat v ON v.hn=d.hn
        INNER JOIN ovst_seq os ON os.vn=v.vn
        LEFT OUTER JOIN doctor dt ON dt.code=d.death_cert_doctor
        WHERE   d.death_date BETWEEN '$date1' AND '$date2'
        AND (p.cid='' or p.cid is null  
        or d.death_date='' or d.death_date is null  
        or d.death_diag_1='' or d.death_diag_1 is null 
        or d.death_cause_text='' or d.death_cause_text is null 
        or d.death_place='' or d.death_place is null 
        or d.last_update='' or d.last_update is null) 
        GROUP BY d.cid
        ORDER BY d.death_date DESC";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);
    }   
    public function actionView($id=NULL ,$date1 = NULL, $date2 = NULL) {

        $sql = "SELECT
        d.hn,
        CONCAT(p.pname,p.fname,' ',p.lname) AS full_name,
        (SELECT hospitalcode FROM opdconfig) AS hospcode,
        p.cid AS pid,
        d.hcode AS hospdeath,
        d.an,
        os.seq_id AS seq ,
        d.death_date  AS ddeath,
        d.death_diag_1 AS cdeath_a,
        d.death_diag_2 AS cdeath_b,
        d.death_diag_3 AS cdeath_c,
        d.death_diag_4 AS cdeath_d,
        d.death_diag_other AS odisease,
        d.death_cause_text AS  cdeath,
        d.newborn_death_cause_id AS pregdeath,
        d.death_place AS pdeath,
        dt.licenseno AS provider,
        d.last_update AS d_update
        FROM death   d
        LEFT OUTER JOIN patient p ON p.hn=d.hn
        LEFT OUTER JOIN vn_stat v ON v.hn=d.hn
        INNER JOIN ovst_seq os ON os.vn=v.vn
        LEFT OUTER JOIN doctor dt ON dt.code=d.death_cert_doctor
        WHERE   d.death_date BETWEEN '$date1' AND '$date2'
        AND d.hn='$id'
        AND (p.cid='' or p.cid is null  
        or d.death_date='' or d.death_date is null  
        or d.death_diag_1='' or d.death_diag_1 is null 
        or d.death_cause_text='' or d.death_cause_text is null 
        or d.death_place='' or d.death_place is null 
        or d.last_update='' or d.last_update is null) 
        GROUP BY d.cid
        ORDER BY d.death_date DESC ";
        
       $data = Yii::$app->db->createCommand($sql)->queryAll();
        return $this->render('view', ['data_view' => $data]);
    }
}

