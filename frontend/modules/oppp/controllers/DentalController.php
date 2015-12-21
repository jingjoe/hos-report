<?php

namespace frontend\modules\oppp\controllers;

use yii\web\Controller;
use yii\db\Query;
use Yii;
use yii\data\ArrayDataProvider;

class DentalController extends Controller {
    public function actionIndex() {
        
        $date1 = "";
        $date2 = "";
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }
          
        $sql = "select pt.hn
        ,v.vn
        ,pt.cid
        ,concat(pt.pname,pt.fname,'',pt.lname) as full_name 
        ,v.vstdate
        from dental_care dc
        inner join vn_stat v on v.vn=dc.vn
        inner join patient pt on pt.hn=v.hn
        where dc.vn in (select vn from dtmain where vstdate  between '$date1' and '$date2' ) 
        and (dc.dental_care_type_id is null  or dc.dental_care_type_id= ''
        OR dc.dental_care_service_place_type_id is null or dc.dental_care_service_place_type_id= ''
        OR dc.entry_datetime is null or dc.entry_datetime='')
        order by v.vstdate";

        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);
    }
    public function actionView($id=NULL ,$date1 = NULL, $date2 = NULL) {

        
        $sql = "select pt.hn,concat(pt.pname,pt.fname,' ',pt.lname) as full_name 
        ,'11347' as hospcode
        ,pt.cid as pid
        ,os.seq_id as seq
        ,v.vstdate as date_serv
        ,dc.dental_care_type_id as denttype
        ,dc.dental_care_service_place_type_id as servplace
        ,dc.pteeth 
        ,dc.pcaries 
        ,dc.pfilling 
        ,dc.pextract
        ,dc.dteeth 
        ,dc.dcaries 
        ,dc.dfilling 
        ,dc.dextract 
        ,dc.need_fluoride 
        ,dc.need_scaling 
        ,dc.need_sealant 
        ,dc.need_pfilling 
        ,dc.need_dfilling 
        ,dc.need_pextract 
        ,dc.need_dextract
        ,dc.dental_care_nprosthesis_id as nprosthesis
        ,dc.permanent_perma as permanent_permanent
        ,dc.permanent_prost as permanent_prosthesis
        ,dc.prosthesis_prost as prosthesis_prosthesis
        ,concat(dc.dental_care_gum_type_id 
        ,dc.dental_care_gum_type_id_1 
        ,dc.dental_care_gum_type_id_2 
        ,dc.dental_care_gum_type_id_3 
        ,dc.dental_care_gum_type_id_4 
        ,dc.dental_care_gum_type_id_5 
        ,dc.dental_care_gum_type_id_6 ) as gum
        ,dc.dental_care_school_type_id  as schooltype
        ,dc.dental_care_school_class_type_id as class
        ,dc.doctor as provider
        ,dc.entry_datetime as d_update
        from dental_care dc
        inner join vn_stat v on v.vn=dc.vn
        inner join ovst_seq os on os.vn=v.vn 
        inner join patient pt on pt.hn=v.hn
        where dc.vn in (select vn from dtmain where vstdate  between '$date1' and '$date2' ) 
        and dc.vn='$id'
        and (dc.dental_care_type_id is null  or dc.dental_care_type_id= ''
        OR dc.dental_care_service_place_type_id is null or dc.dental_care_service_place_type_id= '' 
        OR dc.entry_datetime is null or dc.entry_datetime='')
        order by v.vstdate";
               
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        return $this->render('view', ['data_view' => $data]);

    }

}
