
<?php
$this->title = Yii::t('app', 'ผลงานการรับไว้รักษาในโรงพยาบาลผู้ป่วยโรคหืด สิทธิ UC');
use kartik\grid\GridView;
use yii\helpers\Html;

?>

<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li> <?= Html::a('ตรวจสอบ qof', ['qof/index']) ?></li>
    <li> <?= Html::a('อัตราการรับไว้รักษาในโรงพยาบาลผู้ป่วยโรคหืด สิทธิ UC', ['qof/rep2_2']) ?></li>
</ol>
<div class="alert bg-navy alert-dismissible">
     <h4><font color="#FFFF00">ผลงานการรับไว้รักษาในโรงพยาบาลผู้ป่วยโรคหืด สิทธิ UC</font></h4>
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
            'attribute' => 'an',
            'header' => 'AN'
        ],
        [
            'attribute' => 'hn',
            'header' => 'HN'
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
            'attribute' => 'informaddr',
            'header' => 'ที่อยู่'
        ],
        [
            'attribute' => 'dchdate',
            'header' => 'วันรับบริการ'
        ],
        [
            'attribute' => 'pttype',
            'header' => 'สิทธิ'
        ],
        [
            'attribute' => 'pdx',
            'header' => 'ICD10'
        ],
        [
            'attribute' => 'doc_name',
            'header' => 'ผู้ให้บริการ'
        ],
        [
            'attribute' => 'visit',
            'header' => 'ครั้ง'
        ]
    ]
]);
?>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>
