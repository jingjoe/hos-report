
<?php
$this->title = Yii::t('app', 'ตรวจสอบแฟ้ม student');
use kartik\grid\GridView;
use yii\helpers\Html;

?>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li> <?= Html::a('ตรวจสอบ 43 แฟ้ม', ['oppp/index']) ?></li>
    <li>ตรวจสอบแฟ้ม student</li>
</ol>
<?php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'panel' => [
        'type' => GridView::TYPE_SUCCESS,
        //'before' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reload', ['/dental/index'], ['class' => 'btn btn-info']),
        //'after' => 'วันที่ประมวลผล '.date('Y-m-d H:i:s').' น.',
        'type' => 'success',   
    ],
    'responsive' => true,
    'hover' => true,
    'floatHeader' => true,
    'pjax'=>true,
    'pjaxSettings'=>[
        'neverTimeout'=> true,
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
            'header' => 'เลข 13 หลัก'
        ],
        [
            'attribute' => 'full_name',
            'header' => 'ชื่อ-นามสกุล'
        ],
        [
            'attribute' => 'home',
            'header' => 'ที่อยู่'
        ],
        [
            'attribute' => 'school_name',
            'header' => 'ชื่อโรงเรียน'
        ],
        [
            'attribute' => 'class',
            'header' => 'ชั้นเรียน'
        ], 
        [
            'attribute' => 'd_update',
            'header' => 'วันเวลาอัพเดท'
        ],
        [
            'label' => 'ตรวจสอบ',
            'format' => 'raw',
            'value' => function($data) {
                return  Html::a('<i class="glyphicon glyphicon-ok"></i>',['/oppp/student/view' ,'id'=>$data['pid'],]);
            }// end value
        ]
]
]);
?>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>


