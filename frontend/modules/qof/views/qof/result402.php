
<?php
$this->title = Yii::t('app', 'ผลงานเด็กนักเรียน ป. 1 ได้รับการตรวจช่องปาก');

use kartik\grid\GridView;
use yii\helpers\Html;

?>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li> <?= Html::a('ตรวจสอบ qof', ['qof/index']) ?></li>
    <li> <?= Html::a('เด็กนักเรียน ป. 1 ได้รับการตรวจช่องปาก', ['qof/rep4_2']) ?></li>
</ol>
<div class="alert bg-navy alert-dismissible">
     <h4><font color="#FFFF00">ผลงานเด็กนักเรียน ป. 1 ได้รับการตรวจช่องปาก</font></h4>
</div>
<?php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'panel' => [
        'type' => GridView::TYPE_DEFAULT,
        //'before' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reload', ['/dental/index'], ['class' => 'btn btn-info']),
        //'after' => 'วันที่ประมวลผล '.date('Y-m-d H:i:s').' น.',
    ],
    //'showFooter'=>TRUE,
    'responsive' => TRUE,
    'hover' => TRUE,
    'floatHeader' => TRUE,
    'pjax'=>TRUE,
    'pjaxSettings'=>[
        'neverTimeout'=> TRUE,
        'beforeGrid'=>'',
        'afterGrid'=>'',
    ],
    'columns' => [
        [
            'class'=>'yii\grid\SerialColumn'
        ],
        [
            'attribute' => 'pid',
            'header' => 'PID'
        ],
        [
            'attribute' => 'cid',
            'header' => 'CID'
        ],
        [
            'attribute' => 'full_name',
            'header' => 'ชื่อ-นามสกุล'
        ],
        [
            'attribute' => 'age_y',
            'header' => 'อายุ/ปี'
        ],
        [
            'attribute' => 'school',
            'header' => 'โรงเรียน'
        ],
        [
            'attribute' => 'class',
            'header' => 'ชั้นเรียน'
        ],
        [
            'attribute' => 'vstdate',
            'header' => 'วันรับบริการ'
        ],
        [
            'attribute' => 'type_care',
            'header' => 'ประเภทให้บริการ'
        ],
        [
            'attribute' => 'doc_name',
            'header' => 'ผู้ให้บริการ'
        ]
    ]
]);
?>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>
