
<?php
$this->title = Yii::t('app', 'หญิงมีครรภ์ได้รับการฝากครรภ์ครั้งแรกก่อน 12 สัปดาห์');
use kartik\grid\GridView;
use yii\helpers\Html;

?>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li> <?= Html::a('ตรวจสอบ qof', ['qof/index']) ?></li>
    <li> <?= Html::a('หญิงมีครรภ์ได้รับการฝากครรภ์ครั้งแรกก่อน 12 สัปดาห์', ['qof/rep1_1']) ?></li>
</ol>

<div class="alert bg-navy alert-dismissible">
     <h4><font color="#FFFF00">ผลงานหญิงมีครรภ์ได้รับการฝากครรภ์ครั้งแรกก่อน 12 สัปดาห์</font></h4>
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
            'attribute' => 'anc_service_date',
            'header' => 'วันรับบริการ'
        ],
        [
            'attribute' => 'pa_week',
            'header' => 'GA'
        ],
        [
            'attribute' => 'anc_register_staff',
            'header' => 'ผู้ให้บริการ'
        ]
    ]
]);
?>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>
