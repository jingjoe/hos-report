<?php

namespace frontend\modules\oppp\controllers;

use yii\web\Controller;
use yii\db\Query;
use Yii;
use yii\data\ArrayDataProvider;

class CommunityservController extends Controller {  
    public function actionIndex() {
        $date1 = "";
        $date2 = "";
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }
          
        
        $sql = "SELECT cs.ovst_community_service_id AS com_id
        ,(SELECT hospitalcode FROM opdconfig) AS hospcode
        ,p.person_id AS pid
        ,CONCAT(p.pname,p.fname,' ',p.lname) AS full_name
        ,o.seq_id AS seq
        ,v.vstdate AS date_serv
        ,ct.ovst_community_service_type_name AS communservice
        ,doc.name AS  provider
        ,cs.entry_datetime AS d_update
        FROM ovst_community_service cs
        INNER JOIN ovst_community_service_type ct ON ct.ovst_community_service_type_id=cs.ovst_community_service_type_id
        LEFT OUTER JOIN vn_stat v On v.vn=cs.vn
        LEFT OUTER JOIN  ovst_seq o ON o.vn=v.vn
        LEFT OUTER JOIN person p ON p.cid=v.cid
        INNER JOIN doctor doc ON doc.code=cs.doctor
        WHERE v.vstdate  BETWEEN '$date1' AND '$date2' ";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);
    }  
}

