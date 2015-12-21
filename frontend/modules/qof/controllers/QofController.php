<?php
namespace frontend\modules\qof\controllers;

use yii\web\Controller;
use yii\db\Query;
use Yii;
use yii\data\ArrayDataProvider;

class QofController extends Controller {

    public function actionIndex() {
        return $this->render('index');
    }
    
//1.1 ร้อยละของหญิงมีครรภ์ได้รับการฝากครรภ์ครั้งแรก 12 สัปดาห์
    public function actionRep1_1() {
        
        $date1 = "2015-04-01";
        $date2 = date('Y-m-d');
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }
          
        $sql = "SELECT vi1.village_name,vi1.village_id,
        (select count(DISTINCT p3.person_anc_service_id) AS cc
        from person_anc p1
        INNER JOIN person p2 ON p2.person_id=p1.person_id
        INNER JOIN person_anc_service p3 ON p3.person_anc_id=p1.person_anc_id
        INNER JOIN village vi1 ON vi1.village_id=p2.village_id
        WHERE  p1.anc_register_date between '$date1'and '$date2'
        and p2.house_regist_type_id in ('1','3')
        and p2.village_id='2'
        and p3.anc_service_number = '1') AS b
        ,count(DISTINCT p3.person_anc_service_id) AS a
        FROM person_anc p1
        INNER JOIN person p2 ON p2.person_id=p1.person_id
        INNER JOIN person_anc_service p3 ON p3.person_anc_id=p1.person_anc_id
        INNER JOIN village vi1 ON vi1.village_id=p2.village_id
        WHERE  p1.anc_register_date BETWEEN '$date1'AND '$date2'
        and p2.house_regist_type_id in ('1','3')
        and p2.village_id='2'
        AND p3.anc_service_number = '1' 
        AND p3.pa_week <= '12'

        UNION
        SELECT vi1.village_name,vi1.village_id,
        (select count(DISTINCT p3.person_anc_service_id) AS cc
        from person_anc p1
        INNER JOIN person p2 ON p2.person_id=p1.person_id
        INNER JOIN person_anc_service p3 ON p3.person_anc_id=p1.person_anc_id
        INNER JOIN village vi1 ON vi1.village_id=p2.village_id
        WHERE  p1.anc_register_date between '$date1'and '$date2'
        and p2.house_regist_type_id in ('1','3')
        and p2.village_id='3'
        and p3.anc_service_number = '1') AS b
        ,count(DISTINCT p3.person_anc_service_id) AS a
        FROM person_anc p1
        INNER JOIN person p2 ON p2.person_id=p1.person_id
        INNER JOIN person_anc_service p3 ON p3.person_anc_id=p1.person_anc_id
        INNER JOIN village vi1 ON vi1.village_id=p2.village_id
        WHERE  p1.anc_register_date BETWEEN '$date1'and '$date2'
        and p2.house_regist_type_id in ('1','3')
        and p2.village_id='3'
        AND p3.anc_service_number = '1' 
        AND p3.pa_week <= '12'

        UNION
        SELECT vi1.village_name,vi1.village_id,
        (select count(DISTINCT p3.person_anc_service_id) AS cc
        from person_anc p1
        INNER JOIN person p2 ON p2.person_id=p1.person_id
        INNER JOIN person_anc_service p3 ON p3.person_anc_id=p1.person_anc_id
        INNER JOIN village vi1 ON vi1.village_id=p2.village_id
        WHERE  p1.anc_register_date between '$date1'and '$date2'
        and p2.house_regist_type_id in ('1','3')
        and p2.village_id='4'
        and p3.anc_service_number = '1') AS b
        ,count(DISTINCT p3.person_anc_service_id) AS a
        FROM person_anc p1
        INNER JOIN person p2 ON p2.person_id=p1.person_id
        INNER JOIN person_anc_service p3 ON p3.person_anc_id=p1.person_anc_id
        INNER JOIN village vi1 ON vi1.village_id=p2.village_id
        WHERE  p1.anc_register_date BETWEEN '$date1'and '$date2'
        and p2.house_regist_type_id in ('1','3')
        and p2.village_id='4'
        AND p3.anc_service_number = '1' 
        AND p3.pa_week <= '12'

        UNION
        SELECT vi1.village_name,vi1.village_id,
        (select count(DISTINCT p3.person_anc_service_id) AS cc
        from person_anc p1
        INNER JOIN person p2 ON p2.person_id=p1.person_id
        INNER JOIN person_anc_service p3 ON p3.person_anc_id=p1.person_anc_id
        INNER JOIN village vi1 ON vi1.village_id=p2.village_id
        WHERE  p1.anc_register_date between '$date1'and '$date2'
        and p2.house_regist_type_id in ('1','3')
        and p2.village_id='5'
        and p3.anc_service_number = '1') AS b
        ,count(DISTINCT p3.person_anc_service_id) AS a
        FROM person_anc p1
        INNER JOIN person p2 ON p2.person_id=p1.person_id
        INNER JOIN person_anc_service p3 ON p3.person_anc_id=p1.person_anc_id
        INNER JOIN village vi1 ON vi1.village_id=p2.village_id
        WHERE  p1.anc_register_date BETWEEN '$date1'and '$date2'
        and p2.house_regist_type_id in ('1','3')
        and p2.village_id='5'
        AND p3.anc_service_number = '1' 
        AND p3.pa_week <= '12'

        UNION
        SELECT vi1.village_name,vi1.village_id,
        (select count(DISTINCT p3.person_anc_service_id) AS cc
        from person_anc p1
        INNER JOIN person p2 ON p2.person_id=p1.person_id
        INNER JOIN person_anc_service p3 ON p3.person_anc_id=p1.person_anc_id
        INNER JOIN village vi1 ON vi1.village_id=p2.village_id
        WHERE  p1.anc_register_date between '$date1'and '$date2'
        and p2.house_regist_type_id in ('1','3')
        and p2.village_id='6'
        and p3.anc_service_number = '1') AS b
        ,count(DISTINCT p3.person_anc_service_id) AS a
        FROM person_anc p1
        INNER JOIN person p2 ON p2.person_id=p1.person_id
        INNER JOIN person_anc_service p3 ON p3.person_anc_id=p1.person_anc_id
        INNER JOIN village vi1 ON vi1.village_id=p2.village_id
        WHERE  p1.anc_register_date BETWEEN '$date1'and '$date2'
        and p2.house_regist_type_id in ('1','3')
        and p2.village_id='6'
        AND p3.anc_service_number = '1' 
        AND p3.pa_week <= '12'

        UNION
        SELECT vi1.village_name,vi1.village_id,
        (select count(DISTINCT p3.person_anc_service_id) AS cc
        from person_anc p1
        INNER JOIN person p2 ON p2.person_id=p1.person_id
        INNER JOIN person_anc_service p3 ON p3.person_anc_id=p1.person_anc_id
        INNER JOIN village vi1 ON vi1.village_id=p2.village_id
        WHERE  p1.anc_register_date between '$date1'and '$date2'
        and p2.house_regist_type_id in ('1','3')
        and p2.village_id='7'
        and p3.anc_service_number = '1') AS b
        ,count(DISTINCT p3.person_anc_service_id) AS a
        FROM person_anc p1
        INNER JOIN person p2 ON p2.person_id=p1.person_id
        INNER JOIN person_anc_service p3 ON p3.person_anc_id=p1.person_anc_id
        INNER JOIN village vi1 ON vi1.village_id=p2.village_id
        WHERE  p1.anc_register_date BETWEEN '$date1'and '$date2'
        and p2.house_regist_type_id in ('1','3')
        and p2.village_id='7'
        AND p3.anc_service_number = '1' 
        AND p3.pa_week <= '12'

        UNION
        SELECT vi1.village_name,vi1.village_id,
        (select count(DISTINCT p3.person_anc_service_id) AS cc
        from person_anc p1
        INNER JOIN person p2 ON p2.person_id=p1.person_id
        INNER JOIN person_anc_service p3 ON p3.person_anc_id=p1.person_anc_id
        INNER JOIN village vi1 ON vi1.village_id=p2.village_id
        WHERE  p1.anc_register_date between '$date1'and '$date2'
        and p2.house_regist_type_id in ('1','3')
        and p2.village_id='8'
        and p3.anc_service_number = '1') AS b
        ,count(DISTINCT p3.person_anc_service_id) AS a
        FROM person_anc p1
        INNER JOIN person p2 ON p2.person_id=p1.person_id
        INNER JOIN person_anc_service p3 ON p3.person_anc_id=p1.person_anc_id
        INNER JOIN village vi1 ON vi1.village_id=p2.village_id
        WHERE  p1.anc_register_date BETWEEN '$date1'and '$date2'
        and p2.house_regist_type_id in ('1','3')
        and p2.village_id='8'
        AND p3.anc_service_number = '1' 
        AND p3.pa_week <= '12'

        UNION
        SELECT vi1.village_name,vi1.village_id,
        (select count(DISTINCT p3.person_anc_service_id) AS cc
        from person_anc p1
        INNER JOIN person p2 ON p2.person_id=p1.person_id
        INNER JOIN person_anc_service p3 ON p3.person_anc_id=p1.person_anc_id
        INNER JOIN village vi1 ON vi1.village_id=p2.village_id
        WHERE  p1.anc_register_date between '$date1'and '$date2'
        and p2.house_regist_type_id in ('1','3')
        and p2.village_id='9'
        and p3.anc_service_number = '1') AS b
        ,count(DISTINCT p3.person_anc_service_id) AS a
        FROM person_anc p1
        INNER JOIN person p2 ON p2.person_id=p1.person_id
        INNER JOIN person_anc_service p3 ON p3.person_anc_id=p1.person_anc_id
        INNER JOIN village vi1 ON vi1.village_id=p2.village_id
        WHERE  p1.anc_register_date BETWEEN '$date1'and '$date2'
        and p2.house_regist_type_id in ('1','3')
        and p2.village_id='9'
        AND p3.anc_service_number = '1' 
        AND p3.pa_week <= '12'

        UNION
        SELECT vi1.village_name,vi1.village_id,
        (select count(DISTINCT p3.person_anc_service_id) AS cc
        from person_anc p1
        INNER JOIN person p2 ON p2.person_id=p1.person_id
        INNER JOIN person_anc_service p3 ON p3.person_anc_id=p1.person_anc_id
        INNER JOIN village vi1 ON vi1.village_id=p2.village_id
        WHERE  p1.anc_register_date between '$date1'and '$date2'
        and p2.house_regist_type_id in ('1','3')
        and p2.village_id='1'
        and p3.anc_service_number = '1') AS b
        ,count(DISTINCT p3.person_anc_service_id) AS a
        FROM person_anc p1
        INNER JOIN person p2 ON p2.person_id=p1.person_id
        INNER JOIN person_anc_service p3 ON p3.person_anc_id=p1.person_anc_id
        INNER JOIN village vi1 ON vi1.village_id=p2.village_id
        WHERE  p1.anc_register_date BETWEEN '$date1'and '$date2'
        and p2.house_regist_type_id in ('1','3')
        and p2.village_id='1'
        AND p3.anc_service_number = '1' 
        AND p3.pa_week <= '12' ";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('rep101', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);       
    }
    public function actionGoal101($id=NULL,$date1 = NULL, $date2 = NULL) {

        $sql = "select p2.person_id AS pid,p2.cid,CONCAT(p2.pname,p2.fname,' ',p2.lname) AS full_name,p2.age_y
        ,concat('บ้านเลขที่',' ',pt.addrpart,' ','หมู่',' ',pt.moopart,' ',th.full_name)as home
        ,p1.anc_register_date,p3.anc_service_number,p1.anc_register_staff
        from person_anc p1
        INNER JOIN person p2 ON p2.person_id=p1.person_id
        INNER JOIN person_anc_service p3 ON p3.person_anc_id=p1.person_anc_id
        INNER JOIN village vi1 ON vi1.village_id=p2.village_id
        LEFT OUTER JOIN patient pt ON pt.cid=p2.cid
        LEFT OUTER JOIN thaiaddress th ON th.addressid=vi1.address_id
        WHERE  p1.anc_register_date between '$date1'and '$date2'
        AND p2.house_regist_type_id in ('1','3')
        AND p2.village_id='$id'
        AND p3.anc_service_number = '1'";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('goal101', ['dataProvider' => $dataProvider]);       
    }
    public function actionResult101($id=NULL,$date1 = NULL, $date2 = NULL) {
   
        $sql = "select p2.person_id AS pid,p2.cid,CONCAT(p2.pname,p2.fname,' ',p2.lname) AS full_name,p2.age_y
        ,concat('บ้านเลขที่',' ',pt.addrpart,' ','หมู่',' ',pt.moopart,' ',th.full_name)as home
        ,p3.anc_service_date ,p3.pa_week,p1.anc_register_staff
        from person_anc p1
        INNER JOIN person p2 ON p2.person_id=p1.person_id
        INNER JOIN person_anc_service p3 ON p3.person_anc_id=p1.person_anc_id
        INNER JOIN village vi1 ON vi1.village_id=p2.village_id
        LEFT OUTER JOIN patient pt ON pt.cid=p2.cid
        LEFT OUTER JOIN thaiaddress th ON th.addressid=vi1.address_id
        WHERE  p1.anc_register_date between '$date1'and '$date2'
        AND p2.house_regist_type_id in ('1','3')
        AND p2.village_id='$id'
        AND p3.anc_service_number = '1'
        AND p3.pa_week <= '12'";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('result101', ['dataProvider' => $dataProvider]);       
    } 
 
//1.2 ร้อยละของหญิงมีครรภ์ได้รับการฝากครรภ์ครบ 5 ครั้งตามเกณฑ์ 
    public function actionRep1_2() {
        
        $date1 = "2015-04-01";
        $date2 = date('Y-m-d');
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }
          
        $sql = "select vi.village_name,vi.village_id,
        (select count(distinct p1.person_anc_id) from person_anc p1,person p2 ,village vi
        where p1.person_id = p2.person_id and p2.village_id=vi.village_id and p1.labor_date between '$date1' and '$date2'  
        and  p2.house_regist_type_id in ('1','3')and p2.village_id='2' ) AS b,
        count(distinct p2.person_id) AS a
        from person_anc p1,person p2 , village vi
        where p1.person_id = p2.person_id and p2.village_id=vi.village_id

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 1 and person_anc_service.pa_week <= 12)

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 2 and person_anc_service.pa_week between 16 and 20)

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 3 and person_anc_service.pa_week between 24 and 28)

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 4 and person_anc_service.pa_week between 30 and 34)

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 5 and person_anc_service.pa_week between 36 and 40)

        and p1.labor_date between '$date1' and '$date2' 
        and p2.house_regist_type_id in ('1','3')
        and p2.village_id='2'

        UNION
        select vi.village_name,vi.village_id,
        (select count(distinct p1.person_anc_id) from person_anc p1,person p2 ,village vi
        where p1.person_id = p2.person_id and p2.village_id=vi.village_id and p1.labor_date between '$date1' and '$date2'   
        and  p2.house_regist_type_id in ('1','3')and p2.village_id='3' ) AS b,
        count(distinct p2.person_id) AS a
        from person_anc p1,person p2 , village vi
        where p1.person_id = p2.person_id and p2.village_id=vi.village_id

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 1 and person_anc_service.pa_week <= 12)

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 2 and person_anc_service.pa_week between 16 and 20)

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 3 and person_anc_service.pa_week between 24 and 28)

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 4 and person_anc_service.pa_week between 30 and 34)

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 5 and person_anc_service.pa_week between 36 and 40)

        and p1.labor_date between '$date1' and '$date2' 
        and p2.house_regist_type_id in ('1','3')
        and p2.village_id='3'

        UNION
        select vi.village_name,vi.village_id,
        (select count(distinct p1.person_anc_id) from person_anc p1,person p2 ,village vi
        where p1.person_id = p2.person_id and p2.village_id=vi.village_id and p1.labor_date between '$date1' and '$date2'   
        and  p2.house_regist_type_id in ('1','3')and p2.village_id='4' ) AS b,
        count(distinct p2.person_id) AS a
        from person_anc p1,person p2 , village vi
        where p1.person_id = p2.person_id and p2.village_id=vi.village_id

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 1 and person_anc_service.pa_week <= 12)

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 2 and person_anc_service.pa_week between 16 and 20)

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 3 and person_anc_service.pa_week between 24 and 28)

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 4 and person_anc_service.pa_week between 30 and 34)

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 5 and person_anc_service.pa_week between 36 and 40)

        and p1.labor_date between '$date1' and '$date2' 
        and p2.house_regist_type_id in ('1','3')
        and p2.village_id='4'

        UNION
        select vi.village_name,vi.village_id,
        (select count(distinct p1.person_anc_id) from person_anc p1,person p2 ,village vi
        where p1.person_id = p2.person_id and p2.village_id=vi.village_id and p1.labor_date between '$date1' and '$date2' 
        and  p2.house_regist_type_id in ('1','3')and p2.village_id='5' ) AS b,
        count(distinct p2.person_id) AS a
        from person_anc p1,person p2 , village vi
        where p1.person_id = p2.person_id and p2.village_id=vi.village_id

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 1 and person_anc_service.pa_week <= 12)

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 2 and person_anc_service.pa_week between 16 and 20)

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 3 and person_anc_service.pa_week between 24 and 28)

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 4 and person_anc_service.pa_week between 30 and 34)

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 5 and person_anc_service.pa_week between 36 and 40)

        and p1.labor_date between '$date1' and '$date2' 
        and p2.house_regist_type_id in ('1','3')
        and p2.village_id='5'

        UNION
        select vi.village_name,vi.village_id,
        (select count(distinct p1.person_anc_id) from person_anc p1,person p2 ,village vi
        where p1.person_id = p2.person_id and p2.village_id=vi.village_id and p1.labor_date between '$date1' and '$date2'   
        and  p2.house_regist_type_id in ('1','3')and p2.village_id='6' ) AS b,
        count(distinct p2.person_id) AS a
        from person_anc p1,person p2 , village vi
        where p1.person_id = p2.person_id and p2.village_id=vi.village_id

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 1 and person_anc_service.pa_week <= 12)

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 2 and person_anc_service.pa_week between 16 and 20)

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 3 and person_anc_service.pa_week between 24 and 28)

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 4 and person_anc_service.pa_week between 30 and 34)

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 5 and person_anc_service.pa_week between 36 and 40)

        and p1.labor_date between '$date1' and '$date2' 
        and p2.house_regist_type_id in ('1','3')
        and p2.village_id='6'

        UNION
        select vi.village_name,vi.village_id,
        (select count(distinct p1.person_anc_id) from person_anc p1,person p2 ,village vi
        where p1.person_id = p2.person_id and p2.village_id=vi.village_id and p1.labor_date between '$date1' and '$date2'   
        and  p2.house_regist_type_id in ('1','3')and p2.village_id='7' ) AS b,
        count(distinct p2.person_id) AS a
        from person_anc p1,person p2 , village vi
        where p1.person_id = p2.person_id and p2.village_id=vi.village_id

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 1 and person_anc_service.pa_week <= 12)

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 2 and person_anc_service.pa_week between 16 and 20)

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 3 and person_anc_service.pa_week between 24 and 28)

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 4 and person_anc_service.pa_week between 30 and 34)

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 5 and person_anc_service.pa_week between 36 and 40)

        and p1.labor_date between '$date1' and '$date2'  
        and p2.house_regist_type_id in ('1','3')
        and p2.village_id='7'

        UNION
        select vi.village_name,vi.village_id,
        (select count(distinct p1.person_anc_id) from person_anc p1,person p2 ,village vi
        where p1.person_id = p2.person_id and p2.village_id=vi.village_id and p1.labor_date between '$date1' and '$date2'   
        and  p2.house_regist_type_id in ('1','3')and p2.village_id='8' ) AS b,
        count(distinct p2.person_id) AS a
        from person_anc p1,person p2 , village vi
        where p1.person_id = p2.person_id and p2.village_id=vi.village_id

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 1 and person_anc_service.pa_week <= 12)

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 2 and person_anc_service.pa_week between 16 and 20)

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 3 and person_anc_service.pa_week between 24 and 28)

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 4 and person_anc_service.pa_week between 30 and 34)

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 5 and person_anc_service.pa_week between 36 and 40)

        and p1.labor_date between '$date1' and '$date2' 
        and p2.house_regist_type_id in ('1','3')
        and p2.village_id='8'

        UNION
        select vi.village_name,vi.village_id,
        (select count(distinct p1.person_anc_id) from person_anc p1,person p2 ,village vi
        where p1.person_id = p2.person_id and p2.village_id=vi.village_id and p1.labor_date between '$date1' and '$date2'   
        and  p2.house_regist_type_id in ('1','3')and p2.village_id='9' ) AS b,
        count(distinct p2.person_id) AS a
        from person_anc p1,person p2 , village vi
        where p1.person_id = p2.person_id and p2.village_id=vi.village_id

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 1 and person_anc_service.pa_week <= 12)

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 2 and person_anc_service.pa_week between 16 and 20)

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 3 and person_anc_service.pa_week between 24 and 28)

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 4 and person_anc_service.pa_week between 30 and 34)

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 5 and person_anc_service.pa_week between 36 and 40)

        and p1.labor_date between '$date1' and '$date2' 
        and p2.house_regist_type_id in ('1','3')
        and p2.village_id='9'

        UNION
        select vi.village_name,vi.village_id,
        (select count(distinct p1.person_anc_id) from person_anc p1,person p2 ,village vi
        where p1.person_id = p2.person_id and p2.village_id=vi.village_id and p1.labor_date between '$date1' and '$date2'   
        and  p2.house_regist_type_id in ('1','3')and p2.village_id='1' ) AS b,
        count(distinct p2.person_id) AS a
        from person_anc p1,person p2 , village vi
        where p1.person_id = p2.person_id and p2.village_id=vi.village_id

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 1 and person_anc_service.pa_week <= 12)

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 2 and person_anc_service.pa_week between 16 and 20)

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 3 and person_anc_service.pa_week between 24 and 28)

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 4 and person_anc_service.pa_week between 30 and 34)

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 5 and person_anc_service.pa_week between 36 and 40)

        and p1.labor_date between '$date1' and '$date2' 
        and p2.house_regist_type_id in ('1','3')
        and p2.village_id='1'";

        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('rep102', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);       
    }
    public function actionGoal102($id=NULL,$date1 = NULL, $date2 = NULL) {

        $sql = "select p2.person_id AS pid,p2.cid,CONCAT(p2.pname,p2.fname,' ',p2.lname) AS full_name,p2.age_y
        ,concat('บ้านเลขที่',' ',pt.addrpart,' ','หมู่',' ',pt.moopart,' ',th.full_name)as home
         ,p1.anc_register_date,p1.anc_register_staff
        from person_anc p1
        INNER JOIN person p2 ON p2.person_id=p1.person_id
        INNER JOIN village vi ON vi.village_id=p2.village_id
        LEFT OUTER JOIN patient pt ON pt.cid=p2.cid
        LEFT OUTER JOIN thaiaddress th ON th.addressid=vi.address_id
        where  p1.labor_date between '$date1' and '$date2'  
        and  p2.house_regist_type_id in ('1','3')
        and p2.village_id='$id' ";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('goal102', ['dataProvider' => $dataProvider]);       
    }
    public function actionResult102($id=NULL,$date1 = NULL, $date2 = NULL) {

        $sql = "select p2.person_id AS pid,p2.cid,CONCAT(p2.pname,p2.fname,' ',p2.lname) AS full_name,p2.age_y
        ,concat('บ้านเลขที่',' ',pt.addrpart,' ','หมู่',' ',pt.moopart,' ',th.full_name)as home
        ,p1.lmp
        ,p1.pre_labor_service1_date AS date1
        ,p1.pre_labor_service2_date AS date2
        ,p1.pre_labor_service3_date AS date3
        ,p1.pre_labor_service4_date AS date4
        ,p1.pre_labor_service5_date AS date5
        ,p1.anc_register_staff
        from person_anc p1
        INNER JOIN person p2 ON p2.person_id=p1.person_id
        INNER JOIN village vi ON vi.village_id=p2.village_id
        LEFT OUTER JOIN patient pt ON pt.cid=p2.cid
        LEFT OUTER JOIN thaiaddress th ON th.addressid=vi.address_id
        where p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 1 and person_anc_service.pa_week <= 12)

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 2 and person_anc_service.pa_week between 16 and 20)

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 3 and person_anc_service.pa_week between 24 and 28)

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 4 and person_anc_service.pa_week between 30 and 34)

        and p1.person_anc_id in (select person_anc_id from person_anc_service where
        person_anc_service.person_anc_id = p1.person_anc_id and
        person_anc_service.anc_service_number = 5 and person_anc_service.pa_week between 36 and 40)

        and p1.labor_date between '$date1' and '$date2' 
        and p2.house_regist_type_id in ('1','3')
        and p2.village_id='$id'";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('result102', ['dataProvider' => $dataProvider]);       
    } 
    
//1.3 ร้อยละสะสมความคลอบคลุมการตรวจคัดกรองมะเร็งปากมดลูกในสตรี 30-60 ปี ภายใน 5 ปี
    public function actionRep1_3() {
        
        $date1 = "2015-04-01";
        $date2 = date('Y-m-d');
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }
          
        $sql = "SELECT vi.village_name,vi.village_id,
        (SELECT count(DISTINCT pe.person_id) FROM person pe 
        WHERE pe.house_regist_type_id in ('1','3')
        AND pe.age_y BETWEEN '30' AND '60' AND pe.sex='2' AND pe.village_id='2') AS b, count(o.hn) AS a
        from ovstdiag o
        INNER JOIN vn_stat v on v.vn=o.vn
        INNER JOIN patient pt on pt.hn=v.hn
        LEFT OUTER JOIN person p ON p.cid=pt.cid
        INNER JOIN village vi ON vi.village_id=p.village_id
        WHERE  pt.cid IN (SELECT pe.cid FROM person pe 
        INNER JOIN village vi ON vi.village_id=pe.village_id
        WHERE  pe.house_regist_type_id IN ('1','3') and age_y BETWEEN '30' AND '60' AND pe.sex='2')
        AND v.vstdate BETWEEN '$date1' AND '$date2' AND o.icd10 IN ('Z014','Z124') AND p.village_id='2'

        UNION
        SELECT vi.village_name,vi.village_id,
        (SELECT count(DISTINCT pe.person_id) FROM person pe 
        WHERE pe.house_regist_type_id in ('1','3')
        AND pe.age_y BETWEEN '30' AND '60' AND pe.sex='2' AND pe.village_id='3') AS b, count(o.hn) AS a
        from ovstdiag o
        INNER JOIN vn_stat v on v.vn=o.vn
        INNER JOIN patient pt on pt.hn=v.hn
        LEFT OUTER JOIN person p ON p.cid=pt.cid
        INNER JOIN village vi ON vi.village_id=p.village_id
        WHERE  pt.cid IN (SELECT pe.cid FROM person pe 
        INNER JOIN village vi ON vi.village_id=pe.village_id
        WHERE  pe.house_regist_type_id IN ('1','3') and age_y BETWEEN '30' AND '60' AND pe.sex='2')
        AND v.vstdate BETWEEN '$date1' AND '$date2' AND o.icd10 IN ('Z014','Z124') AND p.village_id='3'

        UNION
        SELECT vi.village_name,vi.village_id,
        (SELECT count(DISTINCT pe.person_id) FROM person pe 
        WHERE pe.house_regist_type_id in ('1','3')
        AND pe.age_y BETWEEN '30' AND '60' AND pe.sex='2' AND pe.village_id='3') AS b, count(o.hn) AS a
        from ovstdiag o
        INNER JOIN vn_stat v on v.vn=o.vn
        INNER JOIN patient pt on pt.hn=v.hn
        LEFT OUTER JOIN person p ON p.cid=pt.cid
        INNER JOIN village vi ON vi.village_id=p.village_id
        WHERE  pt.cid IN (SELECT pe.cid FROM person pe 
        INNER JOIN village vi ON vi.village_id=pe.village_id
        WHERE  pe.house_regist_type_id IN ('1','3') and age_y BETWEEN '30' AND '60' AND pe.sex='2')
        AND v.vstdate BETWEEN '$date1' AND '$date2' AND o.icd10 IN ('Z014','Z124') AND p.village_id='3'

        UNION
        SELECT vi.village_name,vi.village_id,
        (SELECT count(DISTINCT pe.person_id) FROM person pe 
        WHERE pe.house_regist_type_id in ('1','3')
        AND pe.age_y BETWEEN '30' AND '60' AND pe.sex='2' AND pe.village_id='4') AS b, count(o.hn) AS a
        from ovstdiag o
        INNER JOIN vn_stat v on v.vn=o.vn
        INNER JOIN patient pt on pt.hn=v.hn
        LEFT OUTER JOIN person p ON p.cid=pt.cid
        INNER JOIN village vi ON vi.village_id=p.village_id
        WHERE  pt.cid IN (SELECT pe.cid FROM person pe 
        INNER JOIN village vi ON vi.village_id=pe.village_id
        WHERE  pe.house_regist_type_id IN ('1','3') and age_y BETWEEN '30' AND '60' AND pe.sex='2')
        AND v.vstdate BETWEEN '$date1' AND '$date2' AND o.icd10 IN ('Z014','Z124') AND p.village_id='4'

        UNION
        SELECT vi.village_name,vi.village_id,
        (SELECT count(DISTINCT pe.person_id) FROM person pe 
        WHERE pe.house_regist_type_id in ('1','3')
        AND pe.age_y BETWEEN '30' AND '60' AND pe.sex='2' AND pe.village_id='5') AS b, count(o.hn) AS a
        from ovstdiag o
        INNER JOIN vn_stat v on v.vn=o.vn
        INNER JOIN patient pt on pt.hn=v.hn
        LEFT OUTER JOIN person p ON p.cid=pt.cid
        INNER JOIN village vi ON vi.village_id=p.village_id
        WHERE  pt.cid IN (SELECT pe.cid FROM person pe 
        INNER JOIN village vi ON vi.village_id=pe.village_id
        WHERE  pe.house_regist_type_id IN ('1','3') and age_y BETWEEN '30' AND '60' AND pe.sex='2')
        AND v.vstdate BETWEEN '$date1' AND '$date2' AND o.icd10 IN ('Z014','Z124') AND p.village_id='5'

        UNION
        SELECT vi.village_name,vi.village_id,
        (SELECT count(DISTINCT pe.person_id) FROM person pe 
        WHERE pe.house_regist_type_id in ('1','3')
        AND pe.age_y BETWEEN '30' AND '60' AND pe.sex='2' AND pe.village_id='6') AS b, count(o.hn) AS a
        from ovstdiag o
        INNER JOIN vn_stat v on v.vn=o.vn
        INNER JOIN patient pt on pt.hn=v.hn
        LEFT OUTER JOIN person p ON p.cid=pt.cid
        INNER JOIN village vi ON vi.village_id=p.village_id
        WHERE  pt.cid IN (SELECT pe.cid FROM person pe 
        INNER JOIN village vi ON vi.village_id=pe.village_id
        WHERE  pe.house_regist_type_id IN ('1','3') and age_y BETWEEN '30' AND '60' AND pe.sex='2')
        AND v.vstdate BETWEEN '$date1' AND '$date2' AND o.icd10 IN ('Z014','Z124') AND p.village_id='6'

        UNION
        SELECT vi.village_name,vi.village_id,
        (SELECT count(DISTINCT pe.person_id) FROM person pe 
        WHERE pe.house_regist_type_id in ('1','3')
        AND pe.age_y BETWEEN '30' AND '60' AND pe.sex='2' AND pe.village_id='7') AS b, count(o.hn) AS a
        from ovstdiag o
        INNER JOIN vn_stat v on v.vn=o.vn
        INNER JOIN patient pt on pt.hn=v.hn
        LEFT OUTER JOIN person p ON p.cid=pt.cid
        INNER JOIN village vi ON vi.village_id=p.village_id
        WHERE  pt.cid IN (SELECT pe.cid FROM person pe 
        INNER JOIN village vi ON vi.village_id=pe.village_id
        WHERE  pe.house_regist_type_id IN ('1','3') and age_y BETWEEN '30' AND '60' AND pe.sex='2')
        AND v.vstdate BETWEEN '$date1' AND '$date2' AND o.icd10 IN ('Z014','Z124') AND p.village_id='7'

        UNION
        SELECT vi.village_name,vi.village_id,
        (SELECT count(DISTINCT pe.person_id) FROM person pe 
        WHERE pe.house_regist_type_id in ('1','3')
        AND pe.age_y BETWEEN '30' AND '60' AND pe.sex='2' AND pe.village_id='8') AS b, count(o.hn) AS a
        from ovstdiag o
        INNER JOIN vn_stat v on v.vn=o.vn
        INNER JOIN patient pt on pt.hn=v.hn
        LEFT OUTER JOIN person p ON p.cid=pt.cid
        INNER JOIN village vi ON vi.village_id=p.village_id
        WHERE  pt.cid IN (SELECT pe.cid FROM person pe 
        INNER JOIN village vi ON vi.village_id=pe.village_id
        WHERE  pe.house_regist_type_id IN ('1','3') and age_y BETWEEN '30' AND '60' AND pe.sex='2')
        AND v.vstdate BETWEEN '$date1' AND '$date2' AND o.icd10 IN ('Z014','Z124') AND p.village_id='8'

        UNION
        SELECT vi.village_name,vi.village_id,
        (SELECT count(DISTINCT pe.person_id) FROM person pe 
        WHERE pe.house_regist_type_id in ('1','3')
        AND pe.age_y BETWEEN '30' AND '60' AND pe.sex='2' AND pe.village_id='9') AS b, count(o.hn) AS a
        from ovstdiag o
        INNER JOIN vn_stat v on v.vn=o.vn
        INNER JOIN patient pt on pt.hn=v.hn
        LEFT OUTER JOIN person p ON p.cid=pt.cid
        INNER JOIN village vi ON vi.village_id=p.village_id
        WHERE  pt.cid IN (SELECT pe.cid FROM person pe 
        INNER JOIN village vi ON vi.village_id=pe.village_id
        WHERE  pe.house_regist_type_id IN ('1','3') and age_y BETWEEN '30' AND '60' AND pe.sex='2')
        AND v.vstdate BETWEEN '$date1' AND '$date2' AND o.icd10 IN ('Z014','Z124') AND p.village_id='9'

        UNION
        SELECT vi.village_name,vi.village_id,
        (SELECT count(DISTINCT pe.person_id) FROM person pe 
        WHERE pe.house_regist_type_id in ('1','3')
        AND pe.age_y BETWEEN '30' AND '60' AND pe.sex='2' AND pe.village_id='1') AS b, count(o.hn) AS a
        from ovstdiag o
        INNER JOIN vn_stat v on v.vn=o.vn
        INNER JOIN patient pt on pt.hn=v.hn
        LEFT OUTER JOIN person p ON p.cid=pt.cid
        INNER JOIN village vi ON vi.village_id=p.village_id
        WHERE  pt.cid IN (SELECT pe.cid FROM person pe 
        INNER JOIN village vi ON vi.village_id=pe.village_id
        WHERE  pe.house_regist_type_id IN ('1','3') and age_y BETWEEN '30' AND '60' AND pe.sex='2')
        AND v.vstdate BETWEEN '$date1' AND '$date2' AND o.icd10 IN ('Z014','Z124') AND p.village_id='1'";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('rep103', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);       
    }
    public function actionGoal103($id=NULL) {
 
        $sql = "SELECT pe.person_id AS pid,pe.cid,CONCAT(pe.pname,pe.fname,' ',pe.lname) AS full_name,pe.age_y
        ,concat('บ้านเลขที่',' ',pt.addrpart,' ','หมู่',' ',pt.moopart,' ',th.full_name)as home
        FROM person pe
        INNER JOIN village vi1 ON vi1.village_id=pe.village_id
        LEFT OUTER JOIN patient pt ON pt.cid=pe.cid
        LEFT OUTER JOIN thaiaddress th ON th.addressid=vi1.address_id 
        WHERE pe.house_regist_type_id in ('1','3')
        AND pe.age_y BETWEEN '30' AND '60' AND pe.sex='2' 
        AND pe.village_id='$id'";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('goal103', ['dataProvider' => $dataProvider]);       
    }
    public function actionResult103($id=NULL,$date1 = NULL, $date2 = NULL) {
  
        $sql = "SELECT p.person_id AS pid,p.cid,CONCAT(p.pname,p.fname,' ',p.lname) AS full_name,v.age_y
        ,concat('บ้านเลขที่',' ',pt.addrpart,' ','หมู่',' ',pt.moopart,' ',th.full_name)as home
        ,v.vstdate,o.icd10,doc.name AS doc_name
        from ovstdiag o
        INNER JOIN vn_stat v on v.vn=o.vn
        INNER JOIN patient pt on pt.hn=v.hn
        LEFT OUTER JOIN person p ON p.cid=pt.cid
        INNER JOIN village vi ON vi.village_id=p.village_id
        LEFT OUTER JOIN thaiaddress th ON th.addressid=vi.address_id 
        INNER JOIN doctor doc ON doc.code=o.doctor
        WHERE  pt.cid IN (SELECT pe.cid FROM person pe 
        INNER JOIN village vi ON vi.village_id=pe.village_id
        WHERE  pe.house_regist_type_id IN ('1','3') and age_y BETWEEN '30' AND '60' AND pe.sex='2')
        AND v.vstdate BETWEEN '$date1' AND '$date2' AND o.icd10 IN ('Z014','Z124') AND p.village_id='$id' ";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('result103', ['dataProvider' => $dataProvider]);       
    } 

//2.1 สัดส่วนการใช้บริการที่หน่วยบริการปฐมภูมิต่อการใช้บริการที่โรงพยาบาล
    public function actionRep2_1() {
        $date1 = "2015-04-01";
        $date2 = date('Y-m-d');
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }
          
        $sql = "select h.name AS hos_name,count(DISTINCT v.hn) AS b ,'4,108' AS a
        from vn_stat   v
        inner join pttype pt ON pt.pttype=v.pttype
        INNER JOIN hospcode h ON h.hospcode=v.hospmain
        where  v.vstdate BETWEEN '$date1' AND '$date2'
        AND pt.pttype_spp_id IN ('3','4')
        AND v.hospmain='11347'

        UNION
        select h.name AS hos_name,count(DISTINCT v.hn) AS b ,'637' AS a
        from vn_stat   v
        inner join pttype pt ON pt.pttype=v.pttype
        INNER JOIN hospcode h ON h.hospcode=v.hospmain
        where  v.vstdate BETWEEN '$date1' AND '$date2'
        AND pt.pttype_spp_id IN ('3','4')
        AND v.hospmain ='09070'

        UNION
        select h.name AS hos_name,count(DISTINCT v.hn) AS b ,'2,319' AS a
        from vn_stat   v
        inner join pttype pt ON pt.pttype=v.pttype
        INNER JOIN hospcode h ON h.hospcode=v.hospmain
        where  v.vstdate BETWEEN '$date1' AND '$date2'
        AND pt.pttype_spp_id IN ('3','4')
        AND v.hospmain='09069'

        UNION
        select h.name AS hos_name,count(DISTINCT v.hn) AS b ,'4,220' AS a
        from vn_stat   v
        inner join pttype pt ON pt.pttype=v.pttype
        INNER JOIN hospcode h ON h.hospcode=v.hospmain
        where  v.vstdate BETWEEN '$date1' AND '$date2'
        AND pt.pttype_spp_id IN ('3','4')
        AND v.hospmain='09071' ";

        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('rep201', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);       
    }
    
//2.2  อัตราการรับไว้รักษาในโรงพยาบาลผู้ป่วยโรคหืด สิทธิ UC  
    public function actionRep2_2() {
        
        $date1 = "2015-04-01";
        $date2 = date('Y-m-d');
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }
          
        $sql = "select vi.village_name,vi.village_id,(select COUNT(DISTINCT cl.hn) 
        from clinicmember    cl
        left outer join  clinic c on c.clinic=cl.clinic
        left outer join  clinic_member_status cm on cm.clinic_member_status_id= cl.clinic_member_status_id
        left outer join  clinic_subtype  cs on cs.clinic_subtype_id=cl.clinic_subtype_id
        left outer join  patient pt on pt.hn=cl.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where c.chronic='Y'
        and c.no_export<>'Y'
        and   cl.clinic_member_status_id='3'
        and cl.clinic = '011'
        AND pe.house_regist_type_id in ('1','3')
        AND pe.village_id='2') AS b,
        COUNT(DISTINCT a.hn) AS a
        from an_stat a
        inner join pttype p on p.pttype=a.pttype
        inner join pttype_spp ps on ps.pttype_spp_id=p.pttype_spp_id
        inner join patient pt on pt.hn=a.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where  a.dchdate between   '$date1' AND '$date2'
        AND  p.pttype_spp_id in ('3','4')
        and a.pdx between 'J45' AND 'J46'
        AND pe.house_regist_type_id in ('1','3')
        AND pe.village_id='2'

        UNION
        select vi.village_name,vi.village_id,(select COUNT(DISTINCT cl.hn) 
        from clinicmember    cl
        left outer join  clinic c on c.clinic=cl.clinic
        left outer join  clinic_member_status cm on cm.clinic_member_status_id= cl.clinic_member_status_id
        left outer join  clinic_subtype  cs on cs.clinic_subtype_id=cl.clinic_subtype_id
        left outer join  patient pt on pt.hn=cl.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where c.chronic='Y'
        and c.no_export<>'Y'
        and   cl.clinic_member_status_id='3'
        and cl.clinic = '011'
        AND pe.house_regist_type_id in ('1','3')
        AND pe.village_id='3') AS b,
        COUNT(DISTINCT a.hn) AS a
        from an_stat a
        inner join pttype p on p.pttype=a.pttype
        inner join pttype_spp ps on ps.pttype_spp_id=p.pttype_spp_id
        inner join patient pt on pt.hn=a.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where  a.dchdate between  '$date1' AND '$date2'
        AND  p.pttype_spp_id in ('3','4')
        and a.pdx between 'J45' AND 'J46'
        AND pe.house_regist_type_id in ('1','3')
        AND pe.village_id='3'

        UNION
        select vi.village_name,vi.village_id,(select COUNT(DISTINCT cl.hn)
        from clinicmember    cl
        left outer join  clinic c on c.clinic=cl.clinic
        left outer join  clinic_member_status cm on cm.clinic_member_status_id= cl.clinic_member_status_id
        left outer join  clinic_subtype  cs on cs.clinic_subtype_id=cl.clinic_subtype_id
        left outer join  patient pt on pt.hn=cl.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where c.chronic='Y'
        and c.no_export<>'Y'
        and   cl.clinic_member_status_id='3'
        and cl.clinic = '011'
        AND pe.house_regist_type_id in ('1','3')
        AND pe.village_id='4') AS b,
        COUNT(DISTINCT a.hn) AS a
        from an_stat a
        inner join pttype p on p.pttype=a.pttype
        inner join pttype_spp ps on ps.pttype_spp_id=p.pttype_spp_id
        inner join patient pt on pt.hn=a.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where  a.dchdate between  '$date1' AND '$date2'
        AND  p.pttype_spp_id in ('3','4')
        and a.pdx between 'J45' AND 'J46'
        AND pe.house_regist_type_id in ('1','3')
        AND pe.village_id='4'

        UNION
        select vi.village_name,vi.village_id,(select COUNT(DISTINCT cl.hn) 
        from clinicmember    cl
        left outer join  clinic c on c.clinic=cl.clinic
        left outer join  clinic_member_status cm on cm.clinic_member_status_id= cl.clinic_member_status_id
        left outer join  clinic_subtype  cs on cs.clinic_subtype_id=cl.clinic_subtype_id
        left outer join  patient pt on pt.hn=cl.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where c.chronic='Y'
        and c.no_export<>'Y'
        and   cl.clinic_member_status_id='3'
        and cl.clinic = '011'
        AND pe.house_regist_type_id in ('1','3')
        AND pe.village_id='5') AS b,
        COUNT(DISTINCT a.hn) AS a
        from an_stat a
        inner join pttype p on p.pttype=a.pttype
        inner join pttype_spp ps on ps.pttype_spp_id=p.pttype_spp_id
        inner join patient pt on pt.hn=a.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where  a.dchdate between  '$date1' AND '$date2'
        AND  p.pttype_spp_id in ('3','4')
        and a.pdx between 'J45' AND 'J46'
        AND pe.house_regist_type_id in ('1','3')
        AND pe.village_id='5'

        UNION
        select vi.village_name,vi.village_id,(select COUNT(DISTINCT cl.hn) 
        from clinicmember    cl
        left outer join  clinic c on c.clinic=cl.clinic
        left outer join  clinic_member_status cm on cm.clinic_member_status_id= cl.clinic_member_status_id
        left outer join  clinic_subtype  cs on cs.clinic_subtype_id=cl.clinic_subtype_id
        left outer join  patient pt on pt.hn=cl.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where c.chronic='Y'
        and c.no_export<>'Y'
        and   cl.clinic_member_status_id='3'
        and cl.clinic = '011'
        AND pe.house_regist_type_id in ('1','3')
        AND pe.village_id='6') AS b,
        COUNT(DISTINCT a.hn) AS a
        from an_stat a
        inner join pttype p on p.pttype=a.pttype
        inner join pttype_spp ps on ps.pttype_spp_id=p.pttype_spp_id
        inner join patient pt on pt.hn=a.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where  a.dchdate between  '$date1' AND '$date2'
        AND  p.pttype_spp_id in ('3','4')
        and a.pdx between 'J45' AND 'J46'
        AND pe.house_regist_type_id in ('1','3')
        AND pe.village_id='6'

        UNION
        select vi.village_name,vi.village_id,(select COUNT(DISTINCT cl.hn) 
        from clinicmember    cl
        left outer join  clinic c on c.clinic=cl.clinic
        left outer join  clinic_member_status cm on cm.clinic_member_status_id= cl.clinic_member_status_id
        left outer join  clinic_subtype  cs on cs.clinic_subtype_id=cl.clinic_subtype_id
        left outer join  patient pt on pt.hn=cl.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where c.chronic='Y'
        and c.no_export<>'Y'
        and   cl.clinic_member_status_id='3'
        and cl.clinic = '011'
        AND pe.house_regist_type_id in ('1','3')
        AND pe.village_id='7') AS b,
        COUNT(DISTINCT a.hn) AS a
        from an_stat a
        inner join pttype p on p.pttype=a.pttype
        inner join pttype_spp ps on ps.pttype_spp_id=p.pttype_spp_id
        inner join patient pt on pt.hn=a.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where  a.dchdate between  '$date1' AND '$date2'
        AND  p.pttype_spp_id in ('3','4')
        and a.pdx between 'J45' AND 'J46'
        AND pe.house_regist_type_id in ('1','3')
        AND pe.village_id='7'

        UNION
        select vi.village_name,vi.village_id,(select COUNT(DISTINCT cl.hn) 
        from clinicmember    cl
        left outer join  clinic c on c.clinic=cl.clinic
        left outer join  clinic_member_status cm on cm.clinic_member_status_id= cl.clinic_member_status_id
        left outer join  clinic_subtype  cs on cs.clinic_subtype_id=cl.clinic_subtype_id
        left outer join  patient pt on pt.hn=cl.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where c.chronic='Y'
        and c.no_export<>'Y'
        and   cl.clinic_member_status_id='3'
        and cl.clinic = '011'
        AND pe.house_regist_type_id in ('1','3')
        AND pe.village_id='8') AS b,
        COUNT(DISTINCT a.hn) AS a
        from an_stat a
        inner join pttype p on p.pttype=a.pttype
        inner join pttype_spp ps on ps.pttype_spp_id=p.pttype_spp_id
        inner join patient pt on pt.hn=a.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where  a.dchdate between '$date1' AND '$date2'
        AND  p.pttype_spp_id in ('3','4')
        and a.pdx between 'J45' AND 'J46'
        AND pe.house_regist_type_id in ('1','3')
        AND pe.village_id='8'

        UNION
        select vi.village_name,vi.village_id,(select COUNT(DISTINCT cl.hn) 
        from clinicmember    cl
        left outer join  clinic c on c.clinic=cl.clinic
        left outer join  clinic_member_status cm on cm.clinic_member_status_id= cl.clinic_member_status_id
        left outer join  clinic_subtype  cs on cs.clinic_subtype_id=cl.clinic_subtype_id
        left outer join  patient pt on pt.hn=cl.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where c.chronic='Y'
        and c.no_export<>'Y'
        and   cl.clinic_member_status_id='3'
        and cl.clinic = '011'
        AND pe.house_regist_type_id in ('1','3')
        AND pe.village_id='9') AS b,
        COUNT(DISTINCT a.hn) AS a
        from an_stat a
        inner join pttype p on p.pttype=a.pttype
        inner join pttype_spp ps on ps.pttype_spp_id=p.pttype_spp_id
        inner join patient pt on pt.hn=a.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where  a.dchdate between  '$date1' AND '$date2'
        AND  p.pttype_spp_id in ('3','4')
        and a.pdx between 'J45' AND 'J46'
        AND pe.house_regist_type_id in ('1','3')
        AND pe.village_id='9'

        UNION
        select vi.village_name,vi.village_id,(select COUNT(DISTINCT cl.hn) 
        from clinicmember    cl
        left outer join  clinic c on c.clinic=cl.clinic
        left outer join  clinic_member_status cm on cm.clinic_member_status_id= cl.clinic_member_status_id
        left outer join  clinic_subtype  cs on cs.clinic_subtype_id=cl.clinic_subtype_id
        left outer join  patient pt on pt.hn=cl.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where c.chronic='Y'
        and c.no_export<>'Y'
        and   cl.clinic_member_status_id='3'
        and cl.clinic = '011'
        AND pe.house_regist_type_id in ('1','3')
        AND pe.village_id='1') AS b,
        COUNT(DISTINCT a.hn) AS a
        from an_stat a
        inner join pttype p on p.pttype=a.pttype
        inner join pttype_spp ps on ps.pttype_spp_id=p.pttype_spp_id
        inner join patient pt on pt.hn=a.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where  a.dchdate between  '$date1' AND '$date2'
        AND  p.pttype_spp_id in ('3','4')
        and a.pdx between 'J45' AND 'J46'
        AND pe.house_regist_type_id in ('1','3')
        AND pe.village_id='1'";

        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('rep202', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);       
    }
    public function actionGoal202($id=NULL) {
  
        $sql = "select pe.person_id AS pid,pe.cid,CONCAT(pe.pname,pe.fname,' ',pe.lname) AS full_name,pe.age_y
        ,concat('บ้านเลขที่',' ',pt.addrpart,' ','หมู่',' ',pt.moopart,' ',th.full_name)as home
        ,c.name AS clinic_name
        from clinicmember    cl
        left outer join  clinic c on c.clinic=cl.clinic
        left outer join  clinic_member_status cm on cm.clinic_member_status_id= cl.clinic_member_status_id
        left outer join  clinic_subtype  cs on cs.clinic_subtype_id=cl.clinic_subtype_id
        left outer join  patient pt on pt.hn=cl.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        LEFT OUTER JOIN thaiaddress th ON th.addressid=vi.address_id 
        where c.chronic='Y'
        and c.no_export<>'Y'
        and   cl.clinic_member_status_id='3'
        and cl.clinic = '011'
        AND pe.house_regist_type_id in ('1','3')
        AND pe.village_id='$id' ";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('goal202', ['dataProvider' => $dataProvider]);       
    }
    public function actionResult202($id=NULL,$date1 = NULL, $date2 = NULL) {
   
        $sql = "select a.an,a.hn,pt.cid,CONCAT(pt.pname,pt.fname,' ',pt.lname) AS full_name,a.age_y
        ,pt.informaddr
        ,a.dchdate,ps.pttype_spp_name AS pttype,a.pdx
        ,doc.name AS doc_name
        ,COUNT(a.hn) visit
        from an_stat a
        inner join pttype p on p.pttype=a.pttype
        inner join pttype_spp ps on ps.pttype_spp_id=p.pttype_spp_id
        inner join patient pt on pt.hn=a.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        INNER JOIN doctor doc ON doc.code=a.dx_doctor
        where  a.dchdate between   '$date1' AND '$date2'
        AND  p.pttype_spp_id in ('3','4')
        and a.pdx between 'J45' AND 'J46'
        AND pe.house_regist_type_id in ('1','3')
        AND pe.village_id='$id' ";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('result202', ['dataProvider' => $dataProvider]);       
    }  
 
//2.3 อัตราการใช้บริการของผู้ป่วยในด้วยโรคเบาหวานที่มีภาวะแทรกซ้อนระยะสั้น สิทธิ UC
    public function actionRep2_3() {
        
        $date1 = "2015-04-01";
        $date2 = date('Y-m-d');
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }
          
        $sql = "SELECT vi.village_name,vi.village_id,(SELECT COUNT(DISTINCT cl.hn) 
        from clinicmember cl
        left outer join  clinic c on c.clinic=cl.clinic
        left outer join  clinic_member_status cm on cm.clinic_member_status_id= cl.clinic_member_status_id
        left outer join  clinic_subtype  cs on cs.clinic_subtype_id=cl.clinic_subtype_id
        left outer join  patient pt on pt.hn=cl.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where cl.clinic_member_status_id='3'
        and cl.clinic = '001'
        AND pe.age_y>='15'
        AND pe.village_id='2') AS b
        ,COUNT(DISTINCT a.an) AS a
        from an_stat a
        inner join pttype p on p.pttype=a.pttype
        inner join pttype_spp ps on ps.pttype_spp_id=p.pttype_spp_id
        inner join patient pt on pt.hn=a.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where  a.dchdate between  '$date1' AND '$date2'
        AND  p.pttype_spp_id in ('3','4')
        AND (a.pdx between 'E100' AND 'E101' 
        OR a.pdx between 'E110' AND 'E111' 
        OR a.pdx between 'E120' AND 'E121' 
        OR a.pdx between 'E130' AND 'E131' 
        OR a.pdx between 'E140' AND 'E141' )
        AND a.age_y>='15'
        AND pe.village_id='2'

        UNION
        SELECT vi.village_name,vi.village_id,(SELECT COUNT(DISTINCT cl.hn) 
        from clinicmember cl
        left outer join  clinic c on c.clinic=cl.clinic
        left outer join  clinic_member_status cm on cm.clinic_member_status_id= cl.clinic_member_status_id
        left outer join  clinic_subtype  cs on cs.clinic_subtype_id=cl.clinic_subtype_id
        left outer join  patient pt on pt.hn=cl.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where cl.clinic_member_status_id='3'
        and cl.clinic = '001'
        AND pe.age_y>='15'
        AND pe.village_id='3') AS b
        ,COUNT(DISTINCT a.an) AS a
        from an_stat a
        inner join pttype p on p.pttype=a.pttype
        inner join pttype_spp ps on ps.pttype_spp_id=p.pttype_spp_id
        inner join patient pt on pt.hn=a.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where  a.dchdate between  '$date1' AND '$date2'
        AND  p.pttype_spp_id in ('3','4')
        AND (a.pdx between 'E100' AND 'E101' 
        OR a.pdx between 'E110' AND 'E111' 
        OR a.pdx between 'E120' AND 'E121' 
        OR a.pdx between 'E130' AND 'E131' 
        OR a.pdx between 'E140' AND 'E141' )
        AND a.age_y>='15'
        AND pe.village_id='3'

        UNION
        SELECT vi.village_name,vi.village_id,(SELECT COUNT(DISTINCT cl.hn) 
        from clinicmember cl
        left outer join  clinic c on c.clinic=cl.clinic
        left outer join  clinic_member_status cm on cm.clinic_member_status_id= cl.clinic_member_status_id
        left outer join  clinic_subtype  cs on cs.clinic_subtype_id=cl.clinic_subtype_id
        left outer join  patient pt on pt.hn=cl.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where cl.clinic_member_status_id='3'
        and cl.clinic = '001'
        AND pe.age_y>='15'
        AND pe.village_id='4') AS b
        ,COUNT(DISTINCT a.an) AS a
        from an_stat a
        inner join pttype p on p.pttype=a.pttype
        inner join pttype_spp ps on ps.pttype_spp_id=p.pttype_spp_id
        inner join patient pt on pt.hn=a.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where  a.dchdate between  '$date1' AND '$date2'
        AND  p.pttype_spp_id in ('3','4')
        AND (a.pdx between 'E100' AND 'E101' 
        OR a.pdx between 'E110' AND 'E111' 
        OR a.pdx between 'E120' AND 'E121' 
        OR a.pdx between 'E130' AND 'E131' 
        OR a.pdx between 'E140' AND 'E141' )
        AND a.age_y>='15'
        AND pe.village_id='4'

        UNION
        SELECT vi.village_name,vi.village_id,(SELECT COUNT(DISTINCT cl.hn) 
        from clinicmember cl
        left outer join  clinic c on c.clinic=cl.clinic
        left outer join  clinic_member_status cm on cm.clinic_member_status_id= cl.clinic_member_status_id
        left outer join  clinic_subtype  cs on cs.clinic_subtype_id=cl.clinic_subtype_id
        left outer join  patient pt on pt.hn=cl.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where cl.clinic_member_status_id='3'
        and cl.clinic = '001'
        AND pe.age_y>='15'
        AND pe.village_id='5') AS b
        ,COUNT(DISTINCT a.an) AS a
        from an_stat a
        inner join pttype p on p.pttype=a.pttype
        inner join pttype_spp ps on ps.pttype_spp_id=p.pttype_spp_id
        inner join patient pt on pt.hn=a.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where  a.dchdate between  '$date1' AND '$date2'
        AND  p.pttype_spp_id in ('3','4')
        AND (a.pdx between 'E100' AND 'E101' 
        OR a.pdx between 'E110' AND 'E111' 
        OR a.pdx between 'E120' AND 'E121' 
        OR a.pdx between 'E130' AND 'E131' 
        OR a.pdx between 'E140' AND 'E141' )
        AND a.age_y>='15'
        AND pe.village_id='5'

        UNION
        SELECT vi.village_name,vi.village_id,(SELECT COUNT(DISTINCT cl.hn) 
        from clinicmember cl
        left outer join  clinic c on c.clinic=cl.clinic
        left outer join  clinic_member_status cm on cm.clinic_member_status_id= cl.clinic_member_status_id
        left outer join  clinic_subtype  cs on cs.clinic_subtype_id=cl.clinic_subtype_id
        left outer join  patient pt on pt.hn=cl.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where cl.clinic_member_status_id='3'
        and cl.clinic = '001'
        AND pe.age_y>='15'
        AND pe.village_id='6') AS b
        ,COUNT(DISTINCT a.an) AS a
        from an_stat a
        inner join pttype p on p.pttype=a.pttype
        inner join pttype_spp ps on ps.pttype_spp_id=p.pttype_spp_id
        inner join patient pt on pt.hn=a.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where  a.dchdate between  '$date1' AND '$date2'
        AND  p.pttype_spp_id in ('3','4')
        AND (a.pdx between 'E100' AND 'E101' 
        OR a.pdx between 'E110' AND 'E111' 
        OR a.pdx between 'E120' AND 'E121' 
        OR a.pdx between 'E130' AND 'E131' 
        OR a.pdx between 'E140' AND 'E141' )
        AND a.age_y>='15'
        AND pe.village_id='6'

        UNION
        SELECT vi.village_name,vi.village_id,(SELECT COUNT(DISTINCT cl.hn) 
        from clinicmember cl
        left outer join  clinic c on c.clinic=cl.clinic
        left outer join  clinic_member_status cm on cm.clinic_member_status_id= cl.clinic_member_status_id
        left outer join  clinic_subtype  cs on cs.clinic_subtype_id=cl.clinic_subtype_id
        left outer join  patient pt on pt.hn=cl.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where cl.clinic_member_status_id='3'
        and cl.clinic = '001'
        AND pe.age_y>='15'
        AND pe.village_id='7') AS b
        ,COUNT(DISTINCT a.an) AS a
        from an_stat a
        inner join pttype p on p.pttype=a.pttype
        inner join pttype_spp ps on ps.pttype_spp_id=p.pttype_spp_id
        inner join patient pt on pt.hn=a.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where  a.dchdate between  '$date1' AND '$date2'
        AND  p.pttype_spp_id in ('3','4')
        AND (a.pdx between 'E100' AND 'E101' 
        OR a.pdx between 'E110' AND 'E111' 
        OR a.pdx between 'E120' AND 'E121' 
        OR a.pdx between 'E130' AND 'E131' 
        OR a.pdx between 'E140' AND 'E141' )
        AND a.age_y>='15'
        AND pe.village_id='7'

        UNION
        SELECT vi.village_name,vi.village_id,(SELECT COUNT(DISTINCT cl.hn) 
        from clinicmember cl
        left outer join  clinic c on c.clinic=cl.clinic
        left outer join  clinic_member_status cm on cm.clinic_member_status_id= cl.clinic_member_status_id
        left outer join  clinic_subtype  cs on cs.clinic_subtype_id=cl.clinic_subtype_id
        left outer join  patient pt on pt.hn=cl.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where cl.clinic_member_status_id='3'
        and cl.clinic = '001'
        AND pe.age_y>='15'
        AND pe.village_id='8') AS b
        ,COUNT(DISTINCT a.an) AS a
        from an_stat a
        inner join pttype p on p.pttype=a.pttype
        inner join pttype_spp ps on ps.pttype_spp_id=p.pttype_spp_id
        inner join patient pt on pt.hn=a.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where  a.dchdate between  '$date1' AND '$date2'
        AND  p.pttype_spp_id in ('3','4')
        AND (a.pdx between 'E100' AND 'E101' 
        OR a.pdx between 'E110' AND 'E111' 
        OR a.pdx between 'E120' AND 'E121' 
        OR a.pdx between 'E130' AND 'E131' 
        OR a.pdx between 'E140' AND 'E141' )
        AND a.age_y>='15'
        AND pe.village_id='8'

        UNION
        SELECT vi.village_name,vi.village_id,(SELECT COUNT(DISTINCT cl.hn) 
        from clinicmember cl
        left outer join  clinic c on c.clinic=cl.clinic
        left outer join  clinic_member_status cm on cm.clinic_member_status_id= cl.clinic_member_status_id
        left outer join  clinic_subtype  cs on cs.clinic_subtype_id=cl.clinic_subtype_id
        left outer join  patient pt on pt.hn=cl.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where cl.clinic_member_status_id='3'
        and cl.clinic = '001'
        AND pe.age_y>='15'
        AND pe.village_id='9') AS b
        ,COUNT(DISTINCT a.an) AS a
        from an_stat a
        inner join pttype p on p.pttype=a.pttype
        inner join pttype_spp ps on ps.pttype_spp_id=p.pttype_spp_id
        inner join patient pt on pt.hn=a.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where  a.dchdate between  '$date1' AND '$date2'
        AND  p.pttype_spp_id in ('3','4')
        AND (a.pdx between 'E100' AND 'E101' 
        OR a.pdx between 'E110' AND 'E111' 
        OR a.pdx between 'E120' AND 'E121' 
        OR a.pdx between 'E130' AND 'E131' 
        OR a.pdx between 'E140' AND 'E141' )
        AND a.age_y>='15'
        AND pe.village_id='9'

        UNION
        SELECT vi.village_name,vi.village_id,(SELECT COUNT(DISTINCT cl.hn) 
        from clinicmember cl
        left outer join  clinic c on c.clinic=cl.clinic
        left outer join  clinic_member_status cm on cm.clinic_member_status_id= cl.clinic_member_status_id
        left outer join  clinic_subtype  cs on cs.clinic_subtype_id=cl.clinic_subtype_id
        left outer join  patient pt on pt.hn=cl.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where cl.clinic_member_status_id='3'
        and cl.clinic = '001'
        AND pe.age_y>='15'
        AND pe.village_id='1') AS b
        ,COUNT(DISTINCT a.an) AS a
        from an_stat a
        inner join pttype p on p.pttype=a.pttype
        inner join pttype_spp ps on ps.pttype_spp_id=p.pttype_spp_id
        inner join patient pt on pt.hn=a.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where  a.dchdate between  '$date1' AND '$date2'
        AND  p.pttype_spp_id in ('3','4')
        AND (a.pdx between 'E100' AND 'E101' 
        OR a.pdx between 'E110' AND 'E111' 
        OR a.pdx between 'E120' AND 'E121' 
        OR a.pdx between 'E130' AND 'E131' 
        OR a.pdx between 'E140' AND 'E141' )
        AND a.age_y>='15'
        AND pe.village_id='1'";

        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('rep203', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);       
    }
    public function actionGoal203($id=NULL) {
 
        $sql = "SELECT pe.person_id AS pid,pe.cid,CONCAT(pe.pname,pe.fname,' ',pe.lname) AS full_name,pe.age_y
        ,concat('บ้านเลขที่',' ',pt.addrpart,' ','หมู่',' ',pt.moopart,' ',th.full_name)as home
        ,c.name AS clinic_name
        FROM clinicmember cl
        LEFT OUTER JOIN  clinic c ON c.clinic=cl.clinic
        LEFT OUTER JOIN  clinic_member_status cm ON cm.clinic_member_status_id= cl.clinic_member_status_id
        LEFT OUTER JOIN  clinic_subtype  cs ON cs.clinic_subtype_id=cl.clinic_subtype_id
        LEFT OUTER JOIN  patient pt ON pt.hn=cl.hn
        INNER JOIN person pe ON pe.cid=pt.cid
        INNER JOIN village  vi ON vi.village_id=pe.village_id
        LEFT OUTER JOIN thaiaddress th ON th.addressid=vi.address_id 
        WHERE cl.clinic_member_status_id='3'
        AND cl.clinic = '001'
        AND pe.age_y>='15'
        AND pe.village_id='$id'";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('goal203', ['dataProvider' => $dataProvider]);       
    }
    public function actionResult203($id=NULL,$date1 = NULL, $date2 = NULL) {
 
        $sql = "SELECT a.an,a.hn,pt.cid,CONCAT(pt.pname,pt.fname,' ',pt.lname) AS full_name,a.age_y
        ,pt.informaddr
        ,a.dchdate,ps.pttype_spp_name AS pttype,a.pdx
        ,doc.name AS doc_name
        ,COUNT(a.hn) visit
        from an_stat a
        inner join pttype p on p.pttype=a.pttype
        inner join pttype_spp ps on ps.pttype_spp_id=p.pttype_spp_id
        inner join patient pt on pt.hn=a.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        INNER JOIN doctor doc ON doc.code=a.dx_doctor
        where  a.dchdate between  '$date1' AND '$date2'
        AND  p.pttype_spp_id in ('3','4')
        AND (a.pdx between 'E100' AND 'E101' 
        OR a.pdx between 'E110' AND 'E111' 
        OR a.pdx between 'E120' AND 'E121' 
        OR a.pdx between 'E130' AND 'E131' 
        OR a.pdx between 'E140' AND 'E141' )
        AND a.age_y>='15'
        AND pe.village_id='$id' ";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('result203', ['dataProvider' => $dataProvider]);       
    }  
    
//2.4 อัตราการรับไว้รักษาในโรงพยาบาล (Admission rate) ด้วยโรคความดันโลหิตสูงหรือภาวะแทรกซ้อนของความดันโลหิตสูง สิทธิ UC
    public function actionRep2_4() {
        
        $date1 = "2015-04-01";
        $date2 = date('Y-m-d');
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }
          
        $sql = "SELECT vi.village_name,vi.village_id,(SELECT COUNT(DISTINCT cl.hn) 
        from clinicmember cl
        left outer join  clinic c on c.clinic=cl.clinic
        left outer join  clinic_member_status cm on cm.clinic_member_status_id= cl.clinic_member_status_id
        left outer join  clinic_subtype  cs on cs.clinic_subtype_id=cl.clinic_subtype_id
        left outer join  patient pt on pt.hn=cl.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where cl.clinic_member_status_id='3'
        and cl.clinic = '002'
        AND pe.age_y>='15'
        AND pe.village_id='2') AS b, 
        COUNT(DISTINCT a.an) AS a
        from an_stat a
        inner join pttype p on p.pttype=a.pttype
        inner join pttype_spp ps on ps.pttype_spp_id=p.pttype_spp_id
        inner join patient pt on pt.hn=a.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where  a.dchdate between  '$date1' AND '$date2'
        AND  p.pttype_spp_id in ('3','4')
        AND ((a.pdx BETWEEN 'I10' AND 'I15' OR a.pdx='I674')
        OR (a.pdx BETWEEN 'I60' AND 'I62' AND a.dx0 BETWEEN 'I10' AND 'I15' OR a.dx0='I674' AND a.pdx NOT IN (a.pdx BETWEEN 'S00' AND 'T99'))
        OR (a.pdx='H350' AND a.dx0 BETWEEN 'I10' AND 'I15' OR a.dx0='I674'))
        AND a.age_y>='15'
        AND pe.village_id='2'

        UNION
        SELECT vi.village_name,vi.village_id,(SELECT COUNT(DISTINCT cl.hn) 
        from clinicmember cl
        left outer join  clinic c on c.clinic=cl.clinic
        left outer join  clinic_member_status cm on cm.clinic_member_status_id= cl.clinic_member_status_id
        left outer join  clinic_subtype  cs on cs.clinic_subtype_id=cl.clinic_subtype_id
        left outer join  patient pt on pt.hn=cl.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where cl.clinic_member_status_id='3'
        and cl.clinic = '002'
        AND pe.age_y>='15'
        AND pe.village_id='3') AS b, 
        COUNT(DISTINCT a.an) AS a
        from an_stat a
        inner join pttype p on p.pttype=a.pttype
        inner join pttype_spp ps on ps.pttype_spp_id=p.pttype_spp_id
        inner join patient pt on pt.hn=a.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where  a.dchdate between '$date1' AND '$date2'
        AND  p.pttype_spp_id in ('3','4')
        AND ((a.pdx BETWEEN 'I10' AND 'I15' OR a.pdx='I674')
        OR (a.pdx BETWEEN 'I60' AND 'I62' AND a.dx0 BETWEEN 'I10' AND 'I15' OR a.dx0='I674' AND a.pdx NOT IN (a.pdx BETWEEN 'S00' AND 'T99'))
        OR (a.pdx='H350' AND a.dx0 BETWEEN 'I10' AND 'I15' OR a.dx0='I674'))
        AND a.age_y>='15'
        AND pe.village_id='3'

        UNION
        SELECT vi.village_name,vi.village_id,(SELECT COUNT(DISTINCT cl.hn) 
        from clinicmember cl
        left outer join  clinic c on c.clinic=cl.clinic
        left outer join  clinic_member_status cm on cm.clinic_member_status_id= cl.clinic_member_status_id
        left outer join  clinic_subtype  cs on cs.clinic_subtype_id=cl.clinic_subtype_id
        left outer join  patient pt on pt.hn=cl.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where cl.clinic_member_status_id='3'
        and cl.clinic = '002'
        AND pe.age_y>='15'
        AND pe.village_id='4') AS b, 
        COUNT(DISTINCT a.an) AS a
        from an_stat a
        inner join pttype p on p.pttype=a.pttype
        inner join pttype_spp ps on ps.pttype_spp_id=p.pttype_spp_id
        inner join patient pt on pt.hn=a.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where  a.dchdate between  '$date1' AND '$date2'
        AND  p.pttype_spp_id in ('3','4')
        AND ((a.pdx BETWEEN 'I10' AND 'I15' OR a.pdx='I674')
        OR (a.pdx BETWEEN 'I60' AND 'I62' AND a.dx0 BETWEEN 'I10' AND 'I15' OR a.dx0='I674' AND a.pdx NOT IN (a.pdx BETWEEN 'S00' AND 'T99'))
        OR (a.pdx='H350' AND a.dx0 BETWEEN 'I10' AND 'I15' OR a.dx0='I674'))
        AND a.age_y>='15'
        AND pe.village_id='4'

        UNION
        SELECT vi.village_name,vi.village_id,(SELECT COUNT(DISTINCT cl.hn) 
        from clinicmember cl
        left outer join  clinic c on c.clinic=cl.clinic
        left outer join  clinic_member_status cm on cm.clinic_member_status_id= cl.clinic_member_status_id
        left outer join  clinic_subtype  cs on cs.clinic_subtype_id=cl.clinic_subtype_id
        left outer join  patient pt on pt.hn=cl.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where cl.clinic_member_status_id='3'
        and cl.clinic = '002'
        AND pe.age_y>='15'
        AND pe.village_id='5') AS b, 
        COUNT(DISTINCT a.an) AS a
        from an_stat a
        inner join pttype p on p.pttype=a.pttype
        inner join pttype_spp ps on ps.pttype_spp_id=p.pttype_spp_id
        inner join patient pt on pt.hn=a.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where  a.dchdate between  '$date1' AND '$date2'
        AND  p.pttype_spp_id in ('3','4')
        AND ((a.pdx BETWEEN 'I10' AND 'I15' OR a.pdx='I674')
        OR (a.pdx BETWEEN 'I60' AND 'I62' AND a.dx0 BETWEEN 'I10' AND 'I15' OR a.dx0='I674' AND a.pdx NOT IN (a.pdx BETWEEN 'S00' AND 'T99'))
        OR (a.pdx='H350' AND a.dx0 BETWEEN 'I10' AND 'I15' OR a.dx0='I674'))
        AND a.age_y>='15'
        AND pe.village_id='5'

        UNION
        SELECT vi.village_name,vi.village_id,(SELECT COUNT(DISTINCT cl.hn) 
        from clinicmember cl
        left outer join  clinic c on c.clinic=cl.clinic
        left outer join  clinic_member_status cm on cm.clinic_member_status_id= cl.clinic_member_status_id
        left outer join  clinic_subtype  cs on cs.clinic_subtype_id=cl.clinic_subtype_id
        left outer join  patient pt on pt.hn=cl.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where cl.clinic_member_status_id='3'
        and cl.clinic = '002'
        AND pe.age_y>='15'
        AND pe.village_id='6') AS b, 
        COUNT(DISTINCT a.an) AS a
        from an_stat a
        inner join pttype p on p.pttype=a.pttype
        inner join pttype_spp ps on ps.pttype_spp_id=p.pttype_spp_id
        inner join patient pt on pt.hn=a.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where  a.dchdate between  '$date1' AND '$date2'
        AND  p.pttype_spp_id in ('3','4')
        AND ((a.pdx BETWEEN 'I10' AND 'I15' OR a.pdx='I674')
        OR (a.pdx BETWEEN 'I60' AND 'I62' AND a.dx0 BETWEEN 'I10' AND 'I15' OR a.dx0='I674' AND a.pdx NOT IN (a.pdx BETWEEN 'S00' AND 'T99'))
        OR (a.pdx='H350' AND a.dx0 BETWEEN 'I10' AND 'I15' OR a.dx0='I674'))
        AND a.age_y>='15'
        AND pe.village_id='6'

        UNION
        SELECT vi.village_name,vi.village_id,(SELECT COUNT(DISTINCT cl.hn) 
        from clinicmember cl
        left outer join  clinic c on c.clinic=cl.clinic
        left outer join  clinic_member_status cm on cm.clinic_member_status_id= cl.clinic_member_status_id
        left outer join  clinic_subtype  cs on cs.clinic_subtype_id=cl.clinic_subtype_id
        left outer join  patient pt on pt.hn=cl.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where cl.clinic_member_status_id='3'
        and cl.clinic = '002'
        AND pe.age_y>='15'
        AND pe.village_id='7') AS b, 
        COUNT(DISTINCT a.an) AS a
        from an_stat a
        inner join pttype p on p.pttype=a.pttype
        inner join pttype_spp ps on ps.pttype_spp_id=p.pttype_spp_id
        inner join patient pt on pt.hn=a.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where  a.dchdate between  '$date1' AND '$date2'
        AND  p.pttype_spp_id in ('3','4')
        AND ((a.pdx BETWEEN 'I10' AND 'I15' OR a.pdx='I674')
        OR (a.pdx BETWEEN 'I60' AND 'I62' AND a.dx0 BETWEEN 'I10' AND 'I15' OR a.dx0='I674' AND a.pdx NOT IN (a.pdx BETWEEN 'S00' AND 'T99'))
        OR (a.pdx='H350' AND a.dx0 BETWEEN 'I10' AND 'I15' OR a.dx0='I674'))
        AND a.age_y>='15'
        AND pe.village_id='7'

        UNION
        SELECT vi.village_name,vi.village_id,(SELECT COUNT(DISTINCT cl.hn) 
        from clinicmember cl
        left outer join  clinic c on c.clinic=cl.clinic
        left outer join  clinic_member_status cm on cm.clinic_member_status_id= cl.clinic_member_status_id
        left outer join  clinic_subtype  cs on cs.clinic_subtype_id=cl.clinic_subtype_id
        left outer join  patient pt on pt.hn=cl.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where cl.clinic_member_status_id='3'
        and cl.clinic = '002'
        AND pe.age_y>='15'
        AND pe.village_id='8') AS b, 
        COUNT(DISTINCT a.an) AS a
        from an_stat a
        inner join pttype p on p.pttype=a.pttype
        inner join pttype_spp ps on ps.pttype_spp_id=p.pttype_spp_id
        inner join patient pt on pt.hn=a.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where  a.dchdate between  '$date1' AND '$date2'
        AND  p.pttype_spp_id in ('3','4')
        AND ((a.pdx BETWEEN 'I10' AND 'I15' OR a.pdx='I674')
        OR (a.pdx BETWEEN 'I60' AND 'I62' AND a.dx0 BETWEEN 'I10' AND 'I15' OR a.dx0='I674' AND a.pdx NOT IN (a.pdx BETWEEN 'S00' AND 'T99'))
        OR (a.pdx='H350' AND a.dx0 BETWEEN 'I10' AND 'I15' OR a.dx0='I674'))
        AND a.age_y>='15'
        AND pe.village_id='8'


        UNION
        SELECT vi.village_name,vi.village_id,(SELECT COUNT(DISTINCT cl.hn) 
        from clinicmember cl
        left outer join  clinic c on c.clinic=cl.clinic
        left outer join  clinic_member_status cm on cm.clinic_member_status_id= cl.clinic_member_status_id
        left outer join  clinic_subtype  cs on cs.clinic_subtype_id=cl.clinic_subtype_id
        left outer join  patient pt on pt.hn=cl.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where cl.clinic_member_status_id='3'
        and cl.clinic = '002'
        AND pe.age_y>='15'
        AND pe.village_id='9') AS b, 
        COUNT(DISTINCT a.an) AS a
        from an_stat a
        inner join pttype p on p.pttype=a.pttype
        inner join pttype_spp ps on ps.pttype_spp_id=p.pttype_spp_id
        inner join patient pt on pt.hn=a.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where  a.dchdate between  '$date1' AND '$date2'
        AND  p.pttype_spp_id in ('3','4')
        AND ((a.pdx BETWEEN 'I10' AND 'I15' OR a.pdx='I674')
        OR (a.pdx BETWEEN 'I60' AND 'I62' AND a.dx0 BETWEEN 'I10' AND 'I15' OR a.dx0='I674' AND a.pdx NOT IN (a.pdx BETWEEN 'S00' AND 'T99'))
        OR (a.pdx='H350' AND a.dx0 BETWEEN 'I10' AND 'I15' OR a.dx0='I674'))
        AND a.age_y>='15'
        AND pe.village_id='9'

        UNION
        SELECT vi.village_name,vi.village_id,(SELECT COUNT(DISTINCT cl.hn) 
        from clinicmember cl
        left outer join  clinic c on c.clinic=cl.clinic
        left outer join  clinic_member_status cm on cm.clinic_member_status_id= cl.clinic_member_status_id
        left outer join  clinic_subtype  cs on cs.clinic_subtype_id=cl.clinic_subtype_id
        left outer join  patient pt on pt.hn=cl.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where cl.clinic_member_status_id='3'
        and cl.clinic = '002'
        AND pe.age_y>='15'
        AND pe.village_id='1') AS b, 
        COUNT(DISTINCT a.an) AS a
        from an_stat a
        inner join pttype p on p.pttype=a.pttype
        inner join pttype_spp ps on ps.pttype_spp_id=p.pttype_spp_id
        inner join patient pt on pt.hn=a.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        where  a.dchdate between  '$date1' AND '$date2'
        AND  p.pttype_spp_id in ('3','4')
        AND ((a.pdx BETWEEN 'I10' AND 'I15' OR a.pdx='I674')
        OR (a.pdx BETWEEN 'I60' AND 'I62' AND a.dx0 BETWEEN 'I10' AND 'I15' OR a.dx0='I674' AND a.pdx NOT IN (a.pdx BETWEEN 'S00' AND 'T99'))
        OR (a.pdx='H350' AND a.dx0 BETWEEN 'I10' AND 'I15' OR a.dx0='I674'))
        AND a.age_y>='15'
        AND pe.village_id='1'";

        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('rep204', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);       
    }
    public function actionGoal204($id=NULL) {

        $sql = "SELECT pe.person_id AS pid,pe.cid,CONCAT(pe.pname,pe.fname,' ',pe.lname) AS full_name,pe.age_y
        ,concat('บ้านเลขที่',' ',pt.addrpart,' ','หมู่',' ',pt.moopart,' ',th.full_name)as home
        ,c.name AS clinic_name
        FROM clinicmember cl
        LEFT OUTER JOIN  clinic c ON c.clinic=cl.clinic
        LEFT OUTER JOIN  clinic_member_status cm ON cm.clinic_member_status_id= cl.clinic_member_status_id
        LEFT OUTER JOIN  clinic_subtype  cs ON cs.clinic_subtype_id=cl.clinic_subtype_id
        LEFT OUTER JOIN  patient pt ON pt.hn=cl.hn
        INNER JOIN person pe ON pe.cid=pt.cid
        INNER JOIN village  vi ON vi.village_id=pe.village_id
        LEFT OUTER JOIN thaiaddress th ON th.addressid=vi.address_id 
        WHERE cl.clinic_member_status_id='3'
        AND cl.clinic = '002'
        AND pe.age_y>='15'
        AND pe.village_id='$id'";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('goal204', ['dataProvider' => $dataProvider]);       
    }
    public function actionResult204($id=NULL,$date1 = NULL, $date2 = NULL) {

        $sql = "SELECT  a.an,a.hn,pt.cid,CONCAT(pt.pname,pt.fname,' ',pt.lname) AS full_name,a.age_y
        ,pt.informaddr
        ,a.dchdate,ps.pttype_spp_name AS pttype,a.pdx
        ,doc.name AS doc_name
        ,COUNT(a.hn) visit
        from an_stat a
        inner join pttype p on p.pttype=a.pttype
        inner join pttype_spp ps on ps.pttype_spp_id=p.pttype_spp_id
        inner join patient pt on pt.hn=a.hn
        inner join person pe on pe.cid=pt.cid
        INNER JOIN village  vi on vi.village_id=pe.village_id
        INNER JOIN doctor doc ON doc.code=a.dx_doctor
        where  a.dchdate between  '$date1' AND '$date2'
        AND  p.pttype_spp_id in ('3','4')
        AND ((a.pdx BETWEEN 'I10' AND 'I15' OR a.pdx='I674')
        OR (a.pdx BETWEEN 'I60' AND 'I62' AND a.dx0 BETWEEN 'I10' AND 'I15' OR a.dx0='I674' AND a.pdx NOT IN (a.pdx BETWEEN 'S00' AND 'T99'))
        OR (a.pdx='H350' AND a.dx0 BETWEEN 'I10' AND 'I15' OR a.dx0='I674'))
        AND a.age_y>='15'
        AND pe.village_id='$id' ";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('result204', ['dataProvider' => $dataProvider]);       
    }  
    
//4.1 ร้อยละของเด็กอายุ 1 ปี ที่ได้รับวัคซีนโรคหัด
    public function actionRep4_1() {
        $date1 = "2014-04-01";
        $date2 = date('Y-m-d');
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }
          
        $sql = "select vi.village_name,vi.village_id,(select count(distinct pe.person_id ) 
        from person pe
        INNER JOIN village vi ON vi.village_id=pe.village_id
        where  pe.birthdate between '$date1' and '$date2'
        and pe.village_id='2'
        and pe.house_regist_type_id in ('1','3')) AS b,
        count(distinct pe.person_id )   as a
        from person pe
        inner join person_wbc pw on pw.person_id=pe.person_id
        inner join person_wbc_service pws on pws.person_wbc_id=pw.person_wbc_id
        inner join person_wbc_vaccine_detail pwv on pwv.person_wbc_service_id=pws.person_wbc_service_id
        inner join wbc_vaccine wv on wv.wbc_vaccine_id=pwv.wbc_vaccine_id
        INNER JOIN village vi ON vi.village_id=pe.village_id
        where  pe.birthdate between '$date1' and '$date2'
        and pe.village_id='2'
        and pe.house_regist_type_id in ('1','3')
        and wv.export_vaccine_code='061'

        UNION
        select vi.village_name,vi.village_id,(select count(distinct pe.person_id ) 
        from person pe
        INNER JOIN village vi ON vi.village_id=pe.village_id
        where  pe.birthdate between '$date1' and '$date2'
        and pe.village_id='3'
        and pe.house_regist_type_id in ('1','3')) AS b,
        count(distinct pe.person_id )   as a
        from person pe
        inner join person_wbc pw on pw.person_id=pe.person_id
        inner join person_wbc_service pws on pws.person_wbc_id=pw.person_wbc_id
        inner join person_wbc_vaccine_detail pwv on pwv.person_wbc_service_id=pws.person_wbc_service_id
        inner join wbc_vaccine wv on wv.wbc_vaccine_id=pwv.wbc_vaccine_id
        INNER JOIN village vi ON vi.village_id=pe.village_id
        where  pe.birthdate between '$date1' and '$date2'
        and pe.village_id='3'
        and pe.house_regist_type_id in ('1','3')
        and wv.export_vaccine_code='061'

        UNION
        select vi.village_name,vi.village_id,(select count(distinct pe.person_id ) 
        from person pe
        INNER JOIN village vi ON vi.village_id=pe.village_id
        where  pe.birthdate between '$date1' and '$date2'
        and pe.village_id='4'
        and pe.house_regist_type_id in ('1','3')) AS b,
        count(distinct pe.person_id )   as a
        from person pe
        inner join person_wbc pw on pw.person_id=pe.person_id
        inner join person_wbc_service pws on pws.person_wbc_id=pw.person_wbc_id
        inner join person_wbc_vaccine_detail pwv on pwv.person_wbc_service_id=pws.person_wbc_service_id
        inner join wbc_vaccine wv on wv.wbc_vaccine_id=pwv.wbc_vaccine_id
        INNER JOIN village vi ON vi.village_id=pe.village_id
        where  pe.birthdate between '$date1' and '$date2'
        and pe.village_id='4'
        and pe.house_regist_type_id in ('1','3')
        and wv.export_vaccine_code='061'

        UNION
        select vi.village_name,vi.village_id,(select count(distinct pe.person_id ) 
        from person pe
        INNER JOIN village vi ON vi.village_id=pe.village_id
        where  pe.birthdate between '$date1' and '$date2'
        and pe.village_id='5'
        and pe.house_regist_type_id in ('1','3')) AS b,
        count(distinct pe.person_id )   as a
        from person pe
        inner join person_wbc pw on pw.person_id=pe.person_id
        inner join person_wbc_service pws on pws.person_wbc_id=pw.person_wbc_id
        inner join person_wbc_vaccine_detail pwv on pwv.person_wbc_service_id=pws.person_wbc_service_id
        inner join wbc_vaccine wv on wv.wbc_vaccine_id=pwv.wbc_vaccine_id
        INNER JOIN village vi ON vi.village_id=pe.village_id
        where  pe.birthdate between '$date1' and '$date2'
        and pe.village_id='5'
        and pe.house_regist_type_id in ('1','3')
        and wv.export_vaccine_code='061'

        UNION
        select vi.village_name,vi.village_id,(select count(distinct pe.person_id ) 
        from person pe
        INNER JOIN village vi ON vi.village_id=pe.village_id
        where  pe.birthdate between '$date1' and '$date2'
        and pe.village_id='6'
        and pe.house_regist_type_id in ('1','3')) AS b,
        count(distinct pe.person_id )   as a
        from person pe
        inner join person_wbc pw on pw.person_id=pe.person_id
        inner join person_wbc_service pws on pws.person_wbc_id=pw.person_wbc_id
        inner join person_wbc_vaccine_detail pwv on pwv.person_wbc_service_id=pws.person_wbc_service_id
        inner join wbc_vaccine wv on wv.wbc_vaccine_id=pwv.wbc_vaccine_id
        INNER JOIN village vi ON vi.village_id=pe.village_id
        where  pe.birthdate between '$date1' and '$date2'
        and pe.village_id='6'
        and pe.house_regist_type_id in ('1','3')
        and wv.export_vaccine_code='061'

        UNION
        select vi.village_name,vi.village_id,(select count(distinct pe.person_id ) 
        from person pe
        INNER JOIN village vi ON vi.village_id=pe.village_id
        where  pe.birthdate between '$date1' and '$date2'
        and pe.village_id='7'
        and pe.house_regist_type_id in ('1','3')) AS b,
        count(distinct pe.person_id )   as a
        from person pe
        inner join person_wbc pw on pw.person_id=pe.person_id
        inner join person_wbc_service pws on pws.person_wbc_id=pw.person_wbc_id
        inner join person_wbc_vaccine_detail pwv on pwv.person_wbc_service_id=pws.person_wbc_service_id
        inner join wbc_vaccine wv on wv.wbc_vaccine_id=pwv.wbc_vaccine_id
        INNER JOIN village vi ON vi.village_id=pe.village_id
        where  pe.birthdate between '$date1' and '$date2'
        and pe.village_id='7'
        and pe.house_regist_type_id in ('1','3')
        and wv.export_vaccine_code='061'

        UNION
        select vi.village_name,vi.village_id,(select count(distinct pe.person_id ) 
        from person pe
        INNER JOIN village vi ON vi.village_id=pe.village_id
        where  pe.birthdate between '$date1' and '$date2'
        and pe.village_id='8'
        and pe.house_regist_type_id in ('1','3')) AS b,
        count(distinct pe.person_id )   as a
        from person pe
        inner join person_wbc pw on pw.person_id=pe.person_id
        inner join person_wbc_service pws on pws.person_wbc_id=pw.person_wbc_id
        inner join person_wbc_vaccine_detail pwv on pwv.person_wbc_service_id=pws.person_wbc_service_id
        inner join wbc_vaccine wv on wv.wbc_vaccine_id=pwv.wbc_vaccine_id
        INNER JOIN village vi ON vi.village_id=pe.village_id
        where  pe.birthdate between '$date1' and '$date2'
        and pe.village_id='8'
        and pe.house_regist_type_id in ('1','3')
        and wv.export_vaccine_code='061'

        UNION
        select vi.village_name,vi.village_id,(select count(distinct pe.person_id ) 
        from person pe
        INNER JOIN village vi ON vi.village_id=pe.village_id
        where  pe.birthdate between '$date1' and '$date2'
        and pe.village_id='9'
        and pe.house_regist_type_id in ('1','3')) AS b,
        count(distinct pe.person_id )   as a
        from person pe
        inner join person_wbc pw on pw.person_id=pe.person_id
        inner join person_wbc_service pws on pws.person_wbc_id=pw.person_wbc_id
        inner join person_wbc_vaccine_detail pwv on pwv.person_wbc_service_id=pws.person_wbc_service_id
        inner join wbc_vaccine wv on wv.wbc_vaccine_id=pwv.wbc_vaccine_id
        INNER JOIN village vi ON vi.village_id=pe.village_id
        where  pe.birthdate between '$date1' and '$date2'
        and pe.village_id='9'
        and pe.house_regist_type_id in ('1','3')
        and wv.export_vaccine_code='061'   
        
        UNION
        select vi.village_name,vi.village_id,(select count(distinct pe.person_id ) 
        from person pe
        INNER JOIN village vi ON vi.village_id=pe.village_id
        where  pe.birthdate between '$date1' and '$date2'
        and pe.village_id='1'
        and pe.house_regist_type_id in ('1','3')) AS b,
        count(distinct pe.person_id )   as a
        from person pe
        inner join person_wbc pw on pw.person_id=pe.person_id
        inner join person_wbc_service pws on pws.person_wbc_id=pw.person_wbc_id
        inner join person_wbc_vaccine_detail pwv on pwv.person_wbc_service_id=pws.person_wbc_service_id
        inner join wbc_vaccine wv on wv.wbc_vaccine_id=pwv.wbc_vaccine_id
        INNER JOIN village vi ON vi.village_id=pe.village_id
        where  pe.birthdate between '$date1' and '$date2'
        and pe.village_id='1'
        and pe.house_regist_type_id in ('1','3')
        and wv.export_vaccine_code='061' ";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('rep401', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);  

    }
    public function actionGoal401($id=NULL,$date1=NULL,$date2=NULL) {
  
        $sql = "select pe.person_id AS pid,pe.cid,CONCAT(pe.pname,pe.fname,' ',pe.lname) AS full_name
        ,pe.birthdate,CONCAT(pe.age_y,'ปี',pe.age_m,'เดือน',pe.age_d,'วัน') AS age_y
        from person pe
        LEFT OUTER JOIN person_wbc pw on pw.person_id=pe.person_id
        LEFT OUTER JOIN person_wbc_service pws on pws.person_wbc_id=pw.person_wbc_id
        LEFT OUTER JOIN person_wbc_vaccine_detail pwv on pwv.person_wbc_service_id=pws.person_wbc_service_id
        LEFT OUTER JOIN wbc_vaccine wv on wv.wbc_vaccine_id=pwv.wbc_vaccine_id
        LEFT OUTER JOIN village vi ON vi.village_id=pe.village_id
        LEFT OUTER JOIN doctor doc ON doc.code=pwv.doctor_code
        where  pe.birthdate between '$date1' and '$date2'
        and pe.village_id='$id'
        and pe.house_regist_type_id in ('1','3')
        GROUP BY pw.person_id ";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('goal401', ['dataProvider' => $dataProvider]);       
    }
    public function actionResult401($id=NULL,$date1=NULL,$date2=NULL) {

        $sql = "select pe.person_id AS pid,pe.cid,CONCAT(pe.pname,pe.fname,' ',pe.lname) AS full_name
        ,pe.birthdate
        ,CONCAT(pe.age_y,'ปี',pe.age_m,'เดือน',pe.age_d,'วัน') AS age_y
        ,wv.export_vaccine_code AS  vcc_code
        ,wv.wbc_vaccine_name AS vcc_name
        ,pws.service_date
        ,doc.name AS doc_name
        from person pe
        LEFT OUTER JOIN person_wbc pw on pw.person_id=pe.person_id
        LEFT OUTER JOIN person_wbc_service pws on pws.person_wbc_id=pw.person_wbc_id
        LEFT OUTER JOIN person_wbc_vaccine_detail pwv on pwv.person_wbc_service_id=pws.person_wbc_service_id
        LEFT OUTER JOIN wbc_vaccine wv on wv.wbc_vaccine_id=pwv.wbc_vaccine_id
        LEFT OUTER JOIN village vi ON vi.village_id=pe.village_id
        LEFT OUTER JOIN doctor doc ON doc.code=pwv.doctor_code
        where  pe.birthdate between '$date1' and '$date2'
        and pe.village_id='$id'
        and pe.house_regist_type_id in ('1','3')
        AND wv.export_vaccine_code='061' 
        GROUP BY pw.person_id
        ORDER BY age_y DESC ";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('result401', ['dataProvider' => $dataProvider]);       
    } 
    
//4.2 ร้อยละของเด็กนักเรียน ป. 1 ได้รับการตรวจช่องปาก
    public function actionRep4_2() {
        
        $date1 = "2015-04-01";
        $date2 = date('Y-m-d');
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }
          
        $sql = "select vc1.school_name,vc1.village_school_id,(select COUNT(DISTINCT v.person_id)
        from village_student  v
        INNER JOIN person p on p.person_id=v.person_id
        INNER JOIN village_student vs1 ON vs1.person_id=p.person_id
        INNER JOIN village_school vc1 ON vc1.village_school_id=vs1.village_school_id
        where v.village_school_class_id='4'  and vc1.village_school_id in ('1') ) AS b,COUNT(DISTINCT d.hn) AS a
        from dtmain d  
        INNER JOIN vn_stat v ON v.vn=d.vn
        INNER JOIN person pe ON pe.cid=v.cid
        INNER JOIN dttm dt ON dt.code=d.tmcode
        INNER JOIN icd101 i ON i.code=d.icd
        INNER JOIN village_student vs1 ON vs1.person_id=pe.person_id
        INNER JOIN village_school vc1 ON vc1.village_school_id=vs1.village_school_id
        where d.vstdate between '$date1'and '$date2'
        and vc1.village_school_id in ('1')
        and d.hn in (select pt.hn
        from village_student  v
        left outer join person p on p.person_id=v.person_id
        LEFT OUTER JOIN patient pt ON pt.cid=p.cid
        where v.village_school_class_id='4')
        and d.vn in (SELECT dc.vn FROM dental_care dc WHERE 
        dental_care_type_id is not null  
        or dc.dental_care_type_id<>''
        or dc.dental_care_service_place_type_id is not null 
        or dc.dental_care_service_place_type_id<>'')

        UNION
        select vc1.school_name,vc1.village_school_id,(select COUNT(DISTINCT  v.person_id)
        from village_student  v
        INNER JOIN person p on p.person_id=v.person_id
        INNER JOIN village_student vs1 ON vs1.person_id=p.person_id
        INNER JOIN village_school vc1 ON vc1.village_school_id=vs1.village_school_id
        where v.village_school_class_id='4'  and vc1.village_school_id in ('2') ) AS b,COUNT(DISTINCT d.hn) AS a
        from dtmain d  
        INNER JOIN vn_stat v ON v.vn=d.vn
        INNER JOIN person pe ON pe.cid=v.cid
        INNER JOIN dttm dt ON dt.code=d.tmcode
        INNER JOIN icd101 i ON i.code=d.icd
        INNER JOIN village_student vs1 ON vs1.person_id=pe.person_id
        INNER JOIN village_school vc1 ON vc1.village_school_id=vs1.village_school_id
        where d.vstdate between '$date1'and '$date2'
        and vc1.village_school_id in ('2')
        and d.hn in (select pt.hn
        from village_student  v
        left outer join person p on p.person_id=v.person_id
        LEFT OUTER JOIN patient pt ON pt.cid=p.cid
        where v.village_school_class_id='4')
        and d.vn in (SELECT dc.vn FROM dental_care dc WHERE 
        dental_care_type_id is not null  
        or dc.dental_care_type_id<>''
        or dc.dental_care_service_place_type_id is not null 
        or dc.dental_care_service_place_type_id<>'')

        UNION
        select vc1.school_name,vc1.village_school_id,(select COUNT(DISTINCT  v.person_id)
        from village_student  v
        INNER JOIN person p on p.person_id=v.person_id
        INNER JOIN village_student vs1 ON vs1.person_id=p.person_id
        INNER JOIN village_school vc1 ON vc1.village_school_id=vs1.village_school_id
        where v.village_school_class_id='4'  and vc1.village_school_id in ('3') ) AS b,COUNT(DISTINCT d.hn) AS a
        from dtmain d  
        INNER JOIN vn_stat v ON v.vn=d.vn
        INNER JOIN person pe ON pe.cid=v.cid
        INNER JOIN dttm dt ON dt.code=d.tmcode
        INNER JOIN icd101 i ON i.code=d.icd
        INNER JOIN village_student vs1 ON vs1.person_id=pe.person_id
        INNER JOIN village_school vc1 ON vc1.village_school_id=vs1.village_school_id
        where d.vstdate between '$date1'and '$date2'
        and vc1.village_school_id in ('3')
        and d.hn in (select pt.hn
        from village_student  v
        left outer join person p on p.person_id=v.person_id
        LEFT OUTER JOIN patient pt ON pt.cid=p.cid
        where v.village_school_class_id='4')
        and d.vn in (SELECT dc.vn FROM dental_care dc WHERE 
        dental_care_type_id is not null  
        or dc.dental_care_type_id<>''
        or dc.dental_care_service_place_type_id is not null 
        or dc.dental_care_service_place_type_id<>'')

        UNION
        select vc1.school_name,vc1.village_school_id,(select COUNT(DISTINCT  v.person_id)
        from village_student  v
        INNER JOIN person p on p.person_id=v.person_id
        INNER JOIN village_student vs1 ON vs1.person_id=p.person_id
        INNER JOIN village_school vc1 ON vc1.village_school_id=vs1.village_school_id
        where v.village_school_class_id='4'  and vc1.village_school_id in ('4') ) AS b,COUNT(DISTINCT d.hn) AS a
        from dtmain d  
        INNER JOIN vn_stat v ON v.vn=d.vn
        INNER JOIN person pe ON pe.cid=v.cid
        INNER JOIN dttm dt ON dt.code=d.tmcode
        INNER JOIN icd101 i ON i.code=d.icd
        INNER JOIN village_student vs1 ON vs1.person_id=pe.person_id
        INNER JOIN village_school vc1 ON vc1.village_school_id=vs1.village_school_id
        where d.vstdate between '$date1'and '$date2'
        and vc1.village_school_id in ('4')
        and d.hn in (select pt.hn
        from village_student  v
        left outer join person p on p.person_id=v.person_id
        LEFT OUTER JOIN patient pt ON pt.cid=p.cid
        where v.village_school_class_id='4')
        and d.vn in (SELECT dc.vn FROM dental_care dc WHERE 
        dental_care_type_id is not null  
        or dc.dental_care_type_id<>''
        or dc.dental_care_service_place_type_id is not null 
        or dc.dental_care_service_place_type_id<>'')

        UNION
        select vc1.school_name,vc1.village_school_id,(select COUNT(DISTINCT  v.person_id)
        from village_student  v
        INNER JOIN person p on p.person_id=v.person_id
        INNER JOIN village_student vs1 ON vs1.person_id=p.person_id
        INNER JOIN village_school vc1 ON vc1.village_school_id=vs1.village_school_id
        where v.village_school_class_id='4'  and vc1.village_school_id in ('11') ) AS b,COUNT(DISTINCT d.hn) AS a
        from dtmain d  
        INNER JOIN vn_stat v ON v.vn=d.vn
        INNER JOIN person pe ON pe.cid=v.cid
        INNER JOIN dttm dt ON dt.code=d.tmcode
        INNER JOIN icd101 i ON i.code=d.icd
        INNER JOIN village_student vs1 ON vs1.person_id=pe.person_id
        INNER JOIN village_school vc1 ON vc1.village_school_id=vs1.village_school_id
        where d.vstdate between '$date1'and '$date2'
        and vc1.village_school_id in ('11')
        and d.hn in (select pt.hn
        from village_student  v
        left outer join person p on p.person_id=v.person_id
        LEFT OUTER JOIN patient pt ON pt.cid=p.cid
        where v.village_school_class_id='4')
        and d.vn in (SELECT dc.vn FROM dental_care dc WHERE 
        dental_care_type_id is not null  
        or dc.dental_care_type_id<>''
        or dc.dental_care_service_place_type_id is not null 
        or dc.dental_care_service_place_type_id<>'' )";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('rep402', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);       
    }   
    public function actionGoal402($id=NULL) {

        $sql = "SELECT p.person_id AS pid,p.cid,CONCAT(p.pname,p.fname,' ',p.lname) AS full_name
        ,p.age_y
        ,concat('บ้านเลขที่',' ',pt.addrpart,' ','หมู่',' ',pt.moopart,' ',th.full_name)as home
        ,vc1.school_name AS school
        ,vsc.village_school_class_name AS class
        FROM village_student  v
        INNER JOIN person p ON p.person_id=v.person_id
        INNER JOIN village_student vs1 ON vs1.person_id=p.person_id
        INNER JOIN village_school vc1 ON vc1.village_school_id=vs1.village_school_id
        INNER JOIN village_school_class vsc ON vsc.village_school_class_id=vs1.village_school_class_id
        INNER JOIN village vi ON vi.village_id=p.village_id
        LEFT OUTER JOIN patient pt ON pt.cid=p.cid
        LEFT OUTER JOIN thaiaddress th ON th.addressid=vi.address_id
        WHERE v.village_school_class_id= '4'
        AND vc1.village_school_id='$id'
        GROUP BY p.person_id ";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('goal402', ['dataProvider' => $dataProvider]);       
    }
    public function actionResult402($id=NULL,$date1 = NULL, $date2 = NULL) {
  
        $sql = "select pe.person_id AS pid,pe.cid,CONCAT(pe.pname,pe.fname,' ',pe.lname) AS full_name,
        v.age_y,
        vc1.school_name AS school,
        vsc.village_school_class_name AS class,
        d.vstdate,
        dct.dental_care_type_name AS  type_care,
        doc.name AS doc_name
        from dtmain d  
        INNER JOIN vn_stat v ON v.vn=d.vn
        INNER JOIN person pe ON pe.cid=v.cid
        INNER JOIN dttm dt ON dt.code=d.tmcode
        INNER JOIN icd101 i ON i.code=d.icd
        INNER JOIN village_student vs1 ON vs1.person_id=pe.person_id
        INNER JOIN village_school vc1 ON vc1.village_school_id=vs1.village_school_id
        INNER JOIN village_school_class vsc ON vsc.village_school_class_id=vs1.village_school_class_id
        INNER JOIN doctor doc ON doc.code=d.doctor
        INNER JOIN dental_care dc ON dc.vn=d.vn
        INNER JOIN dental_care_type dct ON dct.dental_care_type_id=dc.dental_care_type_id
        where d.vstdate between '$date1'and '$date2'
        and vc1.village_school_id='$id'
        and d.hn in (select pt.hn
        from village_student  v
        INNER JOIN person p on p.person_id=v.person_id
        INNER JOIN patient pt ON pt.cid=p.cid
        where v.village_school_class_id='4')
        and d.vn in (SELECT dc.vn FROM dental_care dc WHERE 
        dental_care_type_id is not null  or dc.dental_care_type_id<>''or dc.dental_care_service_place_type_id is not null  or dc.dental_care_service_place_type_id<>'')
        GROUP BY d.vn ";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('result402', ['dataProvider' => $dataProvider]);       
    }   

//4.3 ร้อยละของเด็กนักเรียน ป. 1 ได้รับบริการเคลือบหลุมร่องฟันในฟันกรามแท้ซี่ที่หนึ่ง
    public function actionRep4_3() {
        
        $date1 = "2015-04-01";
        $date2 = date('Y-m-d');
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }
          
        $sql = "select vc.school_name ,vc.village_school_id,(select count(vs1.person_id) 
        from  person pe1
        INNER JOIN village_student vs1 ON vs1.person_id=pe1.person_id
        INNER JOIN village_school vc1 ON vc1.village_school_id=vs1.village_school_id
        where vs1.village_school_class_id='4'
        and vs1.village_school_id='1') AS  b ,count(d.hn) AS a
        from dtmain d  
        INNER JOIN vn_stat v ON v.vn=d.vn
        INNER JOIN person pe ON pe.cid=v.cid
        INNER JOIN village_student vs ON vs.person_id=pe.person_id
        INNER JOIN village_school vc ON vc.village_school_id=vs.village_school_id
        where d.vstdate between '$date1'and '$date2'
        and vs.village_school_class_id= '4'
        and d.tmcode in ('307','002131') 
        and vc.village_school_id='1'

        UNION
        select vc.school_name,vc.village_school_id,(select count(vs1.person_id) 
        from  person pe1
        INNER JOIN village_student vs1 ON vs1.person_id=pe1.person_id
        INNER JOIN village_school vc1 ON vc1.village_school_id=vs1.village_school_id
        where vs1.village_school_class_id='4'
        and vs1.village_school_id='2') AS  b ,count(d.hn) AS a
        from dtmain d  
        INNER JOIN vn_stat v ON v.vn=d.vn
        INNER JOIN person pe ON pe.cid=v.cid
        INNER JOIN village_student vs ON vs.person_id=pe.person_id
        INNER JOIN village_school vc ON vc.village_school_id=vs.village_school_id
        where d.vstdate between '$date1'and '$date2'
        and vs.village_school_class_id= '4'
        and d.tmcode in ('307','002131') 
        and vc.village_school_id='2'

        UNION
        select vc.school_name,vc.village_school_id,(select count(vs1.person_id) 
        from  person pe1
        INNER JOIN village_student vs1 ON vs1.person_id=pe1.person_id
        INNER JOIN village_school vc1 ON vc1.village_school_id=vs1.village_school_id
        where vs1.village_school_class_id='4'
        and vs1.village_school_id='3') AS  b ,count(d.hn) AS a
        from dtmain d  
        INNER JOIN vn_stat v ON v.vn=d.vn
        INNER JOIN person pe ON pe.cid=v.cid
        INNER JOIN village_student vs ON vs.person_id=pe.person_id
        INNER JOIN village_school vc ON vc.village_school_id=vs.village_school_id
        where d.vstdate between '$date1'and '$date2'
        and vs.village_school_class_id= '4'
        and d.tmcode in ('307','002131') 
        and vc.village_school_id='3'

        UNION
        select vc.school_name,vc.village_school_id,(select count(vs1.person_id) 
        from  person pe1
        INNER JOIN village_student vs1 ON vs1.person_id=pe1.person_id
        INNER JOIN village_school vc1 ON vc1.village_school_id=vs1.village_school_id
        where vs1.village_school_class_id='4'
        and vs1.village_school_id='4') AS  b ,count(d.hn) AS a
        from dtmain d  
        INNER JOIN vn_stat v ON v.vn=d.vn
        INNER JOIN person pe ON pe.cid=v.cid
        INNER JOIN village_student vs ON vs.person_id=pe.person_id
        INNER JOIN village_school vc ON vc.village_school_id=vs.village_school_id
        where d.vstdate between '$date1'and '$date2'
        and vs.village_school_class_id= '4'
        and d.tmcode in ('307','002131') 
        and vc.village_school_id='4'

        UNION
        select vc.school_name,vc.village_school_id,(select count(vs1.person_id) 
        from  person pe1
        INNER JOIN village_student vs1 ON vs1.person_id=pe1.person_id
        INNER JOIN village_school vc1 ON vc1.village_school_id=vs1.village_school_id
        where vs1.village_school_class_id='4'
        and vs1.village_school_id='11') AS  b ,count(d.hn) AS a
        from dtmain d  
        INNER JOIN vn_stat v ON v.vn=d.vn
        INNER JOIN person pe ON pe.cid=v.cid
        INNER JOIN village_student vs ON vs.person_id=pe.person_id
        INNER JOIN village_school vc ON vc.village_school_id=vs.village_school_id
        where d.vstdate between '$date1'and '$date2'
        and vs.village_school_class_id= '4'
        and d.tmcode in ('307','002131') 
        and vc.village_school_id='11'";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('rep403', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);       
    } 
    public function actionGoal403($id=NULL) {
   
        $sql = "SELECT p.person_id AS pid,p.cid,CONCAT(p.pname,p.fname,' ',p.lname) AS full_name
        ,p.age_y
        ,concat('บ้านเลขที่',' ',pt.addrpart,' ','หมู่',' ',pt.moopart,' ',th.full_name)as home
        ,vc1.school_name AS school
        ,vsc.village_school_class_name AS class
        FROM village_student  v
        INNER JOIN person p ON p.person_id=v.person_id
        INNER JOIN village_student vs1 ON vs1.person_id=p.person_id
        INNER JOIN village_school vc1 ON vc1.village_school_id=vs1.village_school_id
        INNER JOIN village_school_class vsc ON vsc.village_school_class_id=vs1.village_school_class_id
        INNER JOIN village vi ON vi.village_id=p.village_id
        LEFT OUTER JOIN patient pt ON pt.cid=p.cid
        LEFT OUTER JOIN thaiaddress th ON th.addressid=vi.address_id
        WHERE v.village_school_class_id= '4'
        AND vc1.village_school_id='$id'
        GROUP BY p.person_id ";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('goal403', ['dataProvider' => $dataProvider]);       
    }
    public function actionResult403($id=NULL,$date1 = NULL, $date2 = NULL) {
  
        $sql = "SELECT pe.person_id AS pid,pe.cid,CONCAT(pe.pname,pe.fname,' ',pe.lname) AS full_name
        ,pe.age_y
        ,vc.school_name AS school
        ,vsc.village_school_class_name AS class
        ,d.vstdate
        ,m.icd10tm_operation_code AS icd10tm
        ,doc.name AS doc_name
        FROM dtmain    d
        LEFT OUTER JOIN vn_stat v ON v.vn=d.vn
        LEFT OUTER JOIN person pe ON pe.cid=v.cid
        LEFT OUTER JOIN village_student vs ON vs.person_id=pe.person_id
        LEFT OUTER JOIN village_school vc ON vc.village_school_id=vs.village_school_id
        LEFT OUTER JOIN village_school_class   vsc ON vsc.village_school_class_id=vs.village_school_class_id
        INNER JOIN doctor doc ON doc.code=d.doctor
        INNER JOIN dttm   m ON m.code=d.tmcode
        WHERE d.vstdate BETWEEN  '$date1' AND '$date2'
        AND d.tmcode IN ('307','002131')
        AND vc.village_school_id='$id'
        AND vs.village_school_class_id= '4'";
        
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('result403', ['dataProvider' => $dataProvider]);       
    } 
    
//5.1 ร้อยละหน่วยบริการปฐมภูมิ(รพ.สต.)ที่มีแพทย์แผนไทยปฏิบัติงานประจำและมีการสั่งใช้ยาสมุนไพรพื้นฐานมากกว่า 10 รายการ
    public function actionRep5_1() {
        
        $date1 = "2015-04-01";
        $date2 = date('Y-m-d');
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }
          
        $sql = "select d.icode,d.name,d.strength,d.units,d.did,COUNT(d.icode) AS cc_drug
        from  opitemrece o
        inner join drugitems d on d.icode=o.icode
        inner join vn_stat v on v.vn=o.vn
        inner join pttype p on p.pttype=v.pttype
        inner join pttype_spp ps on ps.pttype_spp_id=p.pttype_spp_id
        WHERE v.vstdate between '$date1' AND '$date2'
        AND (d.did LIKE '41%' OR d.did LIKE '42%')
        AND  p.pttype_spp_id in ('3','4')
        GROUP BY  d.icode";

        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('rep501', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);       
    } 
}
