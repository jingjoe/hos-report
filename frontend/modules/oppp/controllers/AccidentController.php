<?php

namespace frontend\modules\oppp\controllers;

use yii\web\Controller;
use yii\db\Query;
use Yii;
use yii\data\ArrayDataProvider;

class AccidentController extends Controller {  
    public function actionIndex() {

        $date1 = "";
        $date2 = "";
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }
          
        
        $sql = "select p.hn,p.cid,en.vn,CONCAT(p.pname,p.fname,' ',p.lname) AS full_name,e.enter_er_time
        from er_nursing_detail en   
        inner join ovst o on o.vn=en.vn 
        inner join ovst_seq os on os.vn=en.vn 
        inner join er_regist e on e.vn=o.vn 
        inner join er_pt_type erpt on erpt.er_pt_type=e.er_pt_type and erpt.accident_code='Y' 
        inner join patient p on p.hn=o.hn  
        inner join pq_screen  pq on pq.vn=en.vn 
        inner join opduser ou on ou.loginname=pq.staff 
        where e.vstdate between '$date1'  and '$date2'
        and (en.accident_place_type_id='' or en.accident_place_type_id is null  
        or en.visit_type='' or en.visit_type is null  
        or en.accident_alcohol_type_id='' or en.accident_alcohol_type_id is null 
        or en.accident_drug_type_id='' or en.accident_drug_type_id is null 
        or en.accident_airway_type_id='' or en.accident_airway_type_id is null 
        or en.accident_bleed_type_id='' or en.accident_bleed_type_id is null 
        or en.accident_splint_type_id='' or en.accident_splint_type_id is null 
        or en.accident_fluid_type_id='' or en.accident_fluid_type_id is null 
        or en.er_emergency_type='' or en.er_emergency_type is null)  
        order by e.enter_er_time";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);
    }  
    public function actionView($id=NULL ,$date1 = NULL, $date2 = NULL) {

        $sql = "select CONCAT(p.pname,p.fname,' ',p.lname) AS full_name
        ,e.enter_er_time
        ,o.hn
        ,en.vn
        ,'11347'as hospcode
        ,p.cid as pid,os.seq_id as seq
        ,o.vstdate as datetime_serv
        ,e.vstdate as datetime_ae  
        ,en.er_accident_type_id as aetype
        ,en.accident_place_type_id as aeplace
        ,en.visit_type as typein_ae   
        ,en.accident_person_type_id as traffic
        ,en.accident_transport_type_id  as vehicle   
        ,en.accident_alcohol_type_id as alcohol
        ,en.accident_drug_type_id as nacrotic_drug  
        ,en.accident_belt_type_id as belt
        ,en.accident_helmet_type_id as helmet
        ,en.accident_airway_type_id as airway  
        ,en.accident_bleed_type_id as stopbleed
        ,en.accident_splint_type_id as splint
        ,en.accident_fluid_type_id as fluid
        ,en.er_emergency_type as urgency 
        ,en.pupil_l as coma_eye,en.pupil_r as coma_eye_r
        ,en.gcs_v as coma_speak,en.gcs_m as coma_movement  
        ,en.doctor_finish_time as d_update 
        from er_nursing_detail en   
        inner join ovst o on o.vn=en.vn 
        inner join ovst_seq os on os.vn=en.vn 
        inner join er_regist e on e.vn=o.vn 
        inner join er_pt_type erpt on erpt.er_pt_type=e.er_pt_type and erpt.accident_code='Y' 
        inner join patient p on p.hn=o.hn  
        inner join pq_screen  pq on pq.vn=en.vn 
        inner join opduser ou on ou.loginname=pq.staff 
        where e.vstdate between '$date1'  and '$date2'
        and en.vn= '$id'
        and (en.accident_place_type_id='' or en.accident_place_type_id is null  
        or en.visit_type='' or en.visit_type is null  
        or en.accident_alcohol_type_id='' or en.accident_alcohol_type_id is null 
        or en.accident_drug_type_id='' or en.accident_drug_type_id is null 
        or en.accident_airway_type_id='' or en.accident_airway_type_id is null 
        or en.accident_bleed_type_id='' or en.accident_bleed_type_id is null 
        or en.accident_splint_type_id='' or en.accident_splint_type_id is null 
        or en.accident_fluid_type_id='' or en.accident_fluid_type_id is null 
        or en.er_emergency_type='' or en.er_emergency_type is null)  
        order by  o.vstdate";
        
       $data = Yii::$app->db->createCommand($sql)->queryAll();
        return $this->render('view', ['data_view' => $data]);
    }
}

