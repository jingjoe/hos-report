<?php

namespace frontend\modules\oppp\controllers;

use yii\web\Controller;
use yii\db\Query;
use Yii;
use yii\data\ArrayDataProvider;

class PersonController extends Controller { 
    public function actionMain() {
        return $this->render('main');
    }
    public function actionIndex1() {

        $date1 = "";
        $date2 = "";
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }

        $sql = "SELECT v.hn,pe.person_id as pid,pe.cid,CONCAT(pe.pname,pe.fname,' ',pe.lname) full_name,v.vstdate
        FROM vn_stat v
        INNER JOIN person pe ON pe.cid=v.cid
        WHERE v.vstdate BETWEEN '$date1' AND '$date2'
        AND (pe.person_id='' OR pe.person_id is null
        OR pe.cid='' OR pe.cid is null
        OR pe.pname='' OR pe.pname is null 
        OR pe.fname='' OR pe.fname is null
        OR pe.lname='' OR pe.lname is null 
        OR pe.sex='' OR pe.sex is null
        OR pe.birthdate='' OR pe.birthdate is null
        OR pe.nationality='' OR pe.nationality is null 
        OR pe.house_regist_type_id='' OR pe.house_regist_type_id is null)
        GROUP BY v.hn
        ORDER BY  v.vstdate";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('index1', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);
    } 
    public function actionIndex2() {

        $date1 = "";
        $date2 = "";
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }
                 
        $sql = "SELECT v.hn,pt.cid as pid,pt.cid,CONCAT(pt.pname,pt.fname,' ',pt.lname) full_name,v.vstdate
        FROM  vn_stat v 
        INNER JOIN patient   pt on pt.cid=v.cid
        where v.vstdate between '$date1' AND '$date2'
        AND (pt.cid='' OR pt.cid is null
        OR pt.pname='' OR pt.pname is null 
        OR pt.fname='' OR pt.fname is null
        OR pt.lname='' OR pt.lname is null 
        OR pt.sex='' OR pt.sex is null
        OR pt.birthday='' OR pt.birthday is null
        OR pt.nationality='' OR pt.nationality is null 
        OR pt.type_area='' OR pt.type_area is null )
        GROUP BY v.hn
        order by   v.vstdate ";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('index2', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);
    } 
    public function actionView1($id=NULL ,$date1 = NULL, $date2 = NULL) {

        
        $sql = "SELECT CONCAT(pe.pname,pe.fname,' ',pe.lname) full_name,v.vstdate
        ,(SELECT hospitalcode FROM opdconfig ) AS hospcode
        ,pe.cid
        ,pe.person_id AS pid
        ,pe.house_id AS hid 
        ,pe.pname AS prename
        ,pe.fname AS name
        ,pe.lname 
        ,pe.patient_hn AS hn
        ,pe.sex
        ,pe.birthdate AS birth
        ,pe.marrystatus AS mstatus
        ,pe.occupation
        ,pe.citizenship AS race
        ,pe.nationality AS nation
        ,pe.religion
        ,pe.education
        ,pe.person_house_position_id AS fstatus
        ,pe.father_cid AS father
        ,pe.mother_cid AS mother
        ,pe.sps_cid AS couple
        ,'ไม่แสดงข้อมูล' AS vstatus
        ,pe.movein_date AS movein
        ,pe.person_discharge_id AS discharge
        ,pe.discharge_date AS ddischarge
        ,pe.blood_group AS abogroup
        ,pe.bloodgroup_rh AS rhgroup
        ,pe.person_labor_type_id AS labor
        ,pe.cid AS passport
        ,pe.house_regist_type_id AS typearea
        ,pe.last_update AS d_update
        FROM vn_stat v
        INNER JOIN person pe ON pe.cid=v.cid
        WHERE v.vstdate BETWEEN '$date1' AND '$date2'
        AND pe.person_id= '$id'
        AND (pe.person_id='' OR pe.person_id is null
        OR pe.cid='' OR pe.cid is null
        OR pe.pname='' OR pe.pname is null 
        OR pe.fname='' OR pe.fname is null
        OR pe.lname='' OR pe.lname is null 
        OR pe.sex='' OR pe.sex is null
        OR pe.birthdate='' OR pe.birthdate is null
        OR pe.nationality='' OR pe.nationality is null 
        OR pe.house_regist_type_id='' OR pe.house_regist_type_id is null )
        ORDER BY  v.vstdate";
        
       $data = Yii::$app->db->createCommand($sql)->queryAll();
        return $this->render('view', ['data_view' => $data]);
    } 
    public function actionView2($id=NULL ,$date1 = NULL, $date2 = NULL) {

        
        $sql = "select CONCAT(pt.pname,pt.fname,' ',pt.lname) full_name,v.vstdate
        ,(SELECT hospitalcode FROM opdconfig ) AS hospcode
        ,pt.cid
        ,pt.cid as pid
        ,pt.hid as hid
        ,pt.pname as prename
        ,pt.fname as name
        ,pt.lname
        ,pt.hn
        ,pt.sex
        ,pt.birthday   as birth
        ,pt.marrystatus   as mstatus
        ,pt.occupation
        ,pt.citizenship as race
        ,pt.nationality as nation
        ,pt.religion
        ,pt.educate as education
        ,pt.marrystatus as fstatus
        ,pt.father_cid as father
        ,pt.mother_cid as mother
        ,pt.couple_cid as couple
        ,pt.person_type as vstatus
        ,'ไม่แสดงข้อมูล' as movein
        ,'ไม่แสดงข้อมูล' as discharge
        ,'ไม่แสดงข้อมูล' as ddischarge
        ,pt.bloodgroup_rh as abogroup
        ,'ไม่แสดงข้อมูล' as rhgroup
        ,pt.labor_type as labor
        ,pt.passport_no as passport
        ,pt.type_area  as typearea
        ,pt.last_update   as d_update
        from  vn_stat v 
        INNER JOIN patient   pt on pt.cid=v.cid
        where v.vstdate between '$date1' AND '$date2'
        AND pt.cid = '$id'
        AND (pt.cid='' OR pt.cid is null
        OR pt.pname='' OR pt.pname is null 
        OR pt.fname='' OR pt.fname is null
        OR pt.lname='' OR pt.lname is null 
        OR pt.sex='' OR pt.sex is null
        OR pt.birthday='' OR pt.birthday is null
        OR pt.nationality='' OR pt.nationality is null 
        OR pt.type_area='' OR pt.type_area is null )
        order by   v.vstdate";
        
       $data = Yii::$app->db->createCommand($sql)->queryAll();
        return $this->render('view', ['data_view' => $data]);
    }
}

