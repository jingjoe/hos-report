<?php

namespace frontend\modules\oppp\controllers;

use yii\web\Controller;
use yii\db\Query;
use Yii;
use yii\data\ArrayDataProvider;

class EpiController extends Controller { 
    public function actionMain() {
        return $this->render('main');
    }
    public function actionEpi3() {

        $date1 = "";
        $date2 = "";
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }

        $sql = "select wv.person_wbc_vaccine_detail_id AS id
        ,(SELECT hospitalcode FROM opdconfig) AS hospcode
        ,CONCAT(p.pname,p.fname,' ',p.lname) full_name
        ,ps.age_m AS ym
        ,p.person_id AS pid
        ,o.seq_id AS seq
        ,ps.service_date AS date_serv
        ,CONCAT(va.export_vaccine_code ,' : ',va.wbc_vaccine_name) AS vaccinetype
        ,pl.person_id AS vaccineplace
        ,doc.name AS provider
        ,CONCAT(ps.service_date,' ',ps.service_time) AS d_update
        from person_wbc_vaccine_detail    wv
        inner join person_wbc_service ps ON ps.person_wbc_service_id=wv.person_wbc_service_id
        inner join person_wbc pw ON pw.person_wbc_id=ps.person_wbc_id
        inner join person p ON p.person_id=pw.person_id
        INNER JOIN vn_stat v ON v.cid=p.cid
        LEFT OUTER JOIN  ovst_seq o ON o.vn=v.vn
        INNER JOIN wbc_vaccine va ON va.wbc_vaccine_id=wv.wbc_vaccine_id
        LEFT OUTER JOIN person_vaccine_list pl ON pl.person_vaccine_id=wv.wbc_vaccine_id
        INNER JOIN doctor doc ON doc.code=wv.doctor_code
        WHERE ps.service_date BETWEEN '$date1' AND '$date2'
        GROUP BY id
        ORDER BY p.person_id ,ps.service_date ";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);
    } 
    
    public function actionEpi4() {

        $date1 = "";
        $date2 = "";
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }
                 
        $sql = "SELECT evl.person_epi_vaccine_list_id AS id
        ,(SELECT hospitalcode FROM opdconfig) AS hospcode
        ,CONCAT(p.pname,p.fname,' ',p.lname) full_name
        ,e.age_y AS ym
        ,p.person_id AS pid
        ,o.seq_id AS seq
        ,ev.vaccine_date AS date_serv
        ,CONCAT(ec.export_vaccine_code ,' : ',ec.epi_vaccine_name) AS vaccinetype
        ,pl.person_id AS vaccineplace
        ,doc.name AS provider
        ,CONCAT(ev.vaccine_date,' ',ev.vaccine_time) AS d_update
        FROM person_epi_vaccine_list evl
        INNER JOIN person_epi_vaccine ev ON ev.person_epi_vaccine_id =evl.person_epi_vaccine_id
        INNER JOIN person_epi e ON e.person_epi_id=ev.person_epi_id
        INNER JOIN person p ON p.person_id=e.person_id
        INNER JOIN vn_stat v ON v.cid=p.cid
        LEFT OUTER JOIN  ovst_seq o ON o.vn=v.vn
        INNER JOIN epi_vaccine ec ON ec.epi_vaccine_id =evl.epi_vaccine_id
        LEFT OUTER JOIN person_vaccine_list pl ON pl.person_vaccine_id=evl.epi_vaccine_id
        INNER JOIN doctor doc ON doc.code=evl.doctor_code
        WHERE ev.vaccine_date BETWEEN '$date1' AND '$date2'
        GROUP BY id
        ORDER BY p.person_id ,ev.vaccine_date";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);
    }

    public function actionEpiopd() {

        $date1 = "";
        $date2 = "";
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }
        
        $sql = "SELECT ov.ovst_vaccine_id AS id
        ,(SELECT hospitalcode FROM opdconfig) AS hospcode
        ,pt.hn AS pid
        ,CONCAT(pt.pname,pt.fname,' ',pt.lname) full_name
        ,v.age_y AS ym
        ,o.seq_id AS seq
        ,v.vstdate AS date_serv
        ,CONCAT(pc.export_vaccine_code,' : ',pc.vaccine_name) AS vaccinetype
        ,pl.person_id AS vaccineplace
        ,doc.name AS provider
        ,o.update_datetime AS d_update
        FROM ovst_vaccine ov
        LEFT OUTER JOIN person_vaccine pc ON pc.person_vaccine_id=ov.person_vaccine_id
        LEFT OUTER JOIN vn_stat v ON v.vn=ov.vn
        LEFT OUTER JOIN patient pt ON pt.cid=v.cid
        LEFT OUTER JOIN  ovst_seq o ON o.vn=v.vn
        LEFT OUTER JOIN doctor doc ON doc.code=ov.staff
        LEFT OUTER JOIN person_vaccine_list pl ON pl.person_vaccine_id=ov.person_vaccine_id
        WHERE v.vstdate BETWEEN '$date1' AND '$date2'
        GROUP BY id
        ORDER BY pt.hn,v.vstdate ";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);
        return $this->render('index', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);
    } 
    
    public function actionEpier() {

        $date1 = "";
        $date2 = "";
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }
        
        $sql = "SELECT pv.patient_vaccine_id AS id
        ,(SELECT hospitalcode FROM opdconfig) AS hospcode
        ,pt.hn AS pid
        ,CONCAT(pt.pname,pt.fname,' ',pt.lname) full_name
        ,v.age_y AS ym
        ,o.seq_id AS seq
        ,pv.vaccine_date AS date_serv
        ,CONCAT(pc.export_vaccine_code,' : ',pc.vaccine_name) AS vaccinetype
        ,pl.person_id AS vaccineplace
        ,u.name AS provider
        ,o.update_datetime AS d_update
        FROM patient_vaccine pv
        INNER JOIN person_vaccine pc ON pc.person_vaccine_id=pv.baby_code
        INNER JOIN patient pt ON pt.hn=pv.hn
        INNER JOIN vn_stat v ON v.cid=pt.cid
        LEFT OUTER JOIN  ovst_seq o ON o.vn=v.vn
        INNER JOIN opduser u ON u.loginname=pv.staff
        LEFT OUTER JOIN person_vaccine_list pl ON pl.person_vaccine_id=pv.baby_code
        WHERE pv.vaccine_date BETWEEN '$date1' AND '$date2'
        GROUP BY id
        ORDER BY pt.hn,pv.vaccine_date";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);
        return $this->render('index', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);
    } 
   
}

