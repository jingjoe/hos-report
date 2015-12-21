
<?php
$this->title = Yii::t('app', 'การสั่งใช้ยาสมุนไพรพื้นฐานมากกว่า 10 รายการ ');

use kartik\grid\GridView;
use yii\helpers\Html;
use kartik\date\DatePicker;
use yii\bootstrap\ActiveForm;

?>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li> <?= Html::a('ตรวจสอบ qof', ['qof/index']) ?></li>
</ol>

<div class="alert bg-navy alert-dismissible">
    <h4><font color="#FFFF00">หน่วยบริการมีการสั่งใช้ยาสมุนไพรพื้นฐานมากกว่า 10 รายการ (ผู้รับผิดชอบ จริญญา สันทะวา)</font></h4>
     <h6><p><font color="#FFFFFF">จ่ายยาสมุนไพรมากกว่า 10 รายการ นับยานอกและในบัญชี นับเฉพาะสิทธิ UC รหัสยาสมุนไพร ขึ้นต้นด้วย 41 และ 42(ช่วง 1 เมษายน 2558 ถึง 31 มีนาคม 2559) เกณฑ์เป้าหมายไม่น้อยกว่าร้อยละ 70 </font></p></h6>
</div>
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
            'attribute' => 'icode',
            'header' => 'รหัสยา'
        ],
        [
            'attribute' => 'name',
            'header' => 'ชื่อยา'
        ], 
        [
            'attribute' => 'did',
            'header' => 'รหัสยา 24 หลัก'
        ], 
        [
            'attribute' => 'strength',
            'header' => 'ขนาด'
        ], 
        [
            'attribute' => 'units',
            'header' => 'หน่วย'
        ],
        [
            'attribute' => 'cc_drug',
            'header' => 'สิทธิ UC (ครั้ง)'
        ]
    ]
]);
?>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>
