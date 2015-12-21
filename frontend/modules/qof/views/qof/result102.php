
<?php
$this->title = Yii::t('app', 'ผลงานหญิงมีครรภ์ได้รับการฝากครรภ์ครบ 5 ครั้งตามเกณฑ์');
use kartik\grid\GridView;
use yii\helpers\Html;

?>

<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li> <?= Html::a('ตรวจสอบ qof', ['qof/index']) ?></li>
    <li> <?= Html::a('หญิงมีครรภ์ได้รับการฝากครรภ์ครบ 5 ครั้งตามเกณฑ์', ['qof/rep1_2']) ?></li>
</ol>
<div class="alert bg-navy alert-dismissible">
     <h4><font color="#FFFF00">ผลงานหญิงมีครรภ์ได้รับการฝากครรภ์ครบ 5 ครั้งตามเกณฑ์</font></h4>
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
            'attribute' => 'home',
            'header' => 'ที่อยู่'
        ],
        [
            'attribute' => 'date1',
            'header' => 'ครั้งที่1'
        ],
        [
            'attribute' => 'date2',
            'header' => 'ครั้งที่2'
        ],
        [
            'attribute' => 'date3',
            'header' => 'ครั้งที่3'
        ],
        [
            'attribute' => 'date4',
            'header' => 'ครั้งที่4'
        ],
        [
            'attribute' => 'date5',
            'header' => 'ครั้งที่5'
        ],
        [
            'attribute' => 'anc_register_staff',
            'header' => 'ผู้ให้บริการ'
        ]
    ]
]);
?>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>

