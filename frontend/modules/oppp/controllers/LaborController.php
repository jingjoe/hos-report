<?php

namespace frontend\modules\oppp\controllers;

use yii\web\Controller;
use yii\db\Query;
use Yii;
use yii\data\ArrayDataProvider;

class LaborController extends Controller {
    public function actionIndex() {
        return $this->render('main');
    }
    public function actionLabor1() {

        $date1 = "";
        $date2 = "";
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }
          
        $sql = "SELECT pa.person_anc_id AS id
        ,p.cid
        ,CONCAT(p.pname,p.fname,' ',p.lname) full_name
        ,pa.preg_no AS gravida
        ,pa.lmp
        ,pa.edc
        ,pa.labor_date AS bdate
        ,pa.labor_icd10 AS bresult
        ,pa.last_update AS d_update
        FROM person_anc pa
        LEFT OUTER JOIN person p ON p.person_id=pa.person_id
        LEFT OUTER JOIN labour_place lp ON lp.labour_place_id=pa.labor_place_id
        LEFT OUTER JOIN person_labor_type lt ON lt.person_labor_type_id=pa.labour_type_id
        LEFT OUTER JOIN person_labour_doctor_type pd ON pd.person_labour_doctor_type_id=pa.labor_doctor_type_id
        WHERE pa.force_complete_date BETWEEN '$date1' AND '$date2'
        AND (p.person_id is null  or p.person_id= ''
        OR pa.preg_no is null or pa.preg_no= '' 
        OR pa.lmp  is null or pa.lmp =''
        OR pa.labor_date is null or pa.labor_date=''
        OR pa.labor_icd10 is null or pa.labor_icd10=''
        OR pa.labor_place_id is null or pa.labor_place_id=''
        OR pa.labour_type_id is null or pa.labour_type_id=''
        OR pa.labor_doctor_type_id is null or pa.labor_doctor_type_id=''
        OR pa.alive_child_count is null or pa.alive_child_count=''
        OR pa.dead_child_count is null or pa.dead_child_count=''
        OR pa.last_update is null or pa.last_update='')";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('index1', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);
    } 
    public function actionLabor2() {

        $date1 = "";
        $date2 = "";
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }
          
        
        $sql = "SELECT il.an AS id
        ,p.cid 
        ,CONCAT(p.pname,p.fname,' ',p.lname) full_name
        ,il.anc_count AS gravida
        ,il.lmp
        ,il.edc
        ,a.regdate AS bdate
        ,a.pdx AS bresult
        ,il.entry_datetime AS d_update
        FROM ipt_labour il
        LEFT OUTER JOIN ipt_pregnancy ip ON ip.an=il.an
        LEFT OUTER JOIN an_stat a ON a.an=il.an
        LEFT OUTER JOIN labour_place lp ON lp.labour_place_id=il.labour_place_id
        LEFT OUTER JOIN patient p ON p.hn=a.hn
        WHERE a.regdate BETWEEN '$date1' AND '$date2'
        AND (p.cid is null  or p.cid= ''
        OR il.anc_count is null or il.anc_count= '' 
        OR il.lmp  is null or il.lmp =''
        OR a.regdate is null or a.regdate=''
        OR a.pdx  is null or a.pdx =''
        OR lp.place_name is null or lp.place_name=''
        OR ip.deliver_type is null or ip.deliver_type=''
        OR il.entry_datetime  is null or il.entry_datetime ='')";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('index2', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);
    }  
    public function actionView1($id=NULL ,$date1 = NULL, $date2 = NULL) {

        $sql = "SELECT pa.person_anc_id AS id
        ,(SELECT hospitalcode FROM opdconfig) AS hospcode
        ,pa.person_id AS pid
        ,CONCAT(p.pname,p.fname,' ',p.lname) full_name
        ,pa.preg_no AS gravida
        ,pa.lmp
        ,pa.edc
        ,pa.labor_date AS bdate
        ,pa.labor_icd10 AS bresult
        ,lp.place_name AS bplace
        ,pa.labour_hospcode AS bhosp
        ,lt.person_labor_type_name AS btype
        ,pd.person_labour_doctor_type_name AS bdoctor
        ,pa.alive_child_count AS lborn
        ,pa.dead_child_count AS sborn
        ,pa.last_update AS d_update
        FROM person_anc pa
        LEFT OUTER JOIN person p ON p.person_id=pa.person_id
        LEFT OUTER JOIN labour_place lp ON lp.labour_place_id=pa.labor_place_id
        LEFT OUTER JOIN person_labor_type lt ON lt.person_labor_type_id=pa.labour_type_id
        LEFT OUTER JOIN person_labour_doctor_type pd ON pd.person_labour_doctor_type_id=pa.labor_doctor_type_id
        WHERE pa.force_complete_date BETWEEN '$date1' AND '$date2'
        AND pa.person_anc_id='$id'
        AND (p.person_id is null  or p.person_id= ''
        OR pa.preg_no is null or pa.preg_no= '' 
        OR pa.lmp  is null or pa.lmp =''
        OR pa.labor_date is null or pa.labor_date=''
        OR pa.labor_icd10 or pa.labor_icd10=''
        OR pa.labor_place_id is null or pa.labor_place_id=''
        OR pa.labour_type_id is null or pa.labour_type_id=''
        OR pa.labor_doctor_type_id is null or pa.labor_doctor_type_id=''
        OR pa.alive_child_count is null or pa.alive_child_count=''
        OR pa.dead_child_count is null or pa.dead_child_count=''
        OR pa.last_update is null or pa.last_update='')";
        
       $data = Yii::$app->db->createCommand($sql)->queryAll();
        return $this->render('view', ['data_view' => $data]);
    }
      public function actionView2($id=NULL ,$date1 = NULL, $date2 = NULL) {

        $sql = "SELECT il.an AS id
        ,(SELECT hospitalcode FROM opdconfig) AS hospcode
        ,p.cid AS pid
        ,CONCAT(p.pname,p.fname,' ',p.lname) full_name
        ,il.anc_count AS gravida
        ,il.lmp
        ,il.edc
        ,a.regdate AS bdate
        ,a.pdx AS bresult
        ,lp.place_name AS bplace
        ,(SELECT hospitalcode FROM opdconfig)  AS bhosp
        ,ip.deliver_type AS btype
        ,'2' AS bdoctor
        ,'0' AS lborn
        ,'0' AS sborn
        ,il.entry_datetime AS d_update
        FROM ipt_labour il
        LEFT OUTER JOIN ipt_pregnancy ip ON ip.an=il.an
        LEFT OUTER JOIN an_stat a ON a.an=il.an
        LEFT OUTER JOIN labour_place lp ON lp.labour_place_id=il.labour_place_id
        LEFT OUTER JOIN patient p ON p.hn=a.hn
        WHERE a.regdate BETWEEN '$date1' AND '$date2'
        AND il.an='$id'
        AND (p.cid is null  or p.cid= ''
        OR il.anc_count is null or il.anc_count= '' 
        OR il.lmp  is null or il.lmp =''
        OR a.regdate is null or a.regdate=''
        OR a.pdx  is null or a.pdx =''
        OR lp.place_name is null or lp.place_name=''
        OR ip.deliver_type is null or ip.deliver_type=''
        OR il.entry_datetime  is null or il.entry_datetime ='')";
        
       $data = Yii::$app->db->createCommand($sql)->queryAll();
        return $this->render('view', ['data_view' => $data]);
    }
}

