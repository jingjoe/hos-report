
<?php
$this->title = Yii::t('app', 'ตรวจสอบแฟ้ม community_service');

use kartik\grid\GridView;
use yii\helpers\Html;
use kartik\date\DatePicker;
use yii\bootstrap\ActiveForm;

?>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li> <?= Html::a('ตรวจสอบ 43 แฟ้ม', ['oppp/index']) ?></li>
    <li>ตรวจสอบแฟ้ม community_service</li>
</ol>
<?php $form = ActiveForm::begin(['layout' => 'inline']); ?>
<div class="form-group">
<label class="control-label"> เลือกวันที่ </label>
    <?php echo DatePicker::widget([
        'name' => 'date1',
        'value' => $date1,
        'language' => 'th',
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'changeMonth' => true,
            'changeYear' => true,
            'todayHighlight' => true
        ]
    ]);
    ?>

</div>
<div class="form-group">
    <label class="control-label"> ถึง </label>
    <?php echo DatePicker::widget([
        'name' => 'date2',
        'value' => $date2,
        'language' => 'th',
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'changeMonth' => true,
            'changeYear' => true,
            'todayHighlight' => true
        ]
    ]);
    ?>
</div>
<div class="form-group">
    <?= Html::submitButton('ประมวลผล', ['class' => 'btn btn-warning btn-flat']) ?>
</div><!-- /.input group -->
<?php ActiveForm::end(); ?>
<br>

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
            'attribute' => 'hospcode',
            'header' => 'HCODE'
        ],
        [
            'attribute' => 'pid',
            'header' => 'PID'
        ],
        [
            'attribute' => 'full_name',
            'header' => 'ชื่อ-นามสกุล'
        ],
        [
            'attribute' => 'seq',
            'header' => 'SEQ'
        ],
        [
            'attribute' => 'date_serv',
            'header' => 'วันให้บริการ'
        ], 
        [
            'attribute' => 'communservice',
            'header' => 'บริการในชุมชน'
        ],
        [
            'attribute' => 'provider',
            'header' => 'ผู้ให้บริการ'
        ],
        [
            'attribute' => 'd_update',
            'header' => 'วันอับเดท'
        ],
        [
            'label' => 'ตรวจสอบ',
            'format' => 'raw',
            'value' => function($data) use($date1,$date2) {
                return  Html::a('<i class="glyphicon glyphicon-ok"></i>',['/oppp/communityserv/view' ,'id'=>$data['com_id'], 'date1' => $date1, 'date2' => $date2,]);
            }// end value
        ]
]
]);
?>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>


