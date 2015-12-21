
<?php
$this->title = Yii::t('app', 'สัดส่วนการใช้บริการที่หน่วยบริการปฐมภูมิต่อการใช้บริการที่โรงพยาบาล');

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
     <h4><font color="#FFFF00">สัดส่วนการใช้บริการที่หน่วยบริการปฐมภูมิต่อการใช้บริการที่โรงพยาบาล (ผู้รับผิดชอบ วิเชียร นุ่นศรี)</font></h4>
     <h6><p><font color="#FFFFFF">จำนวนครั้งของผู้ป่วยสิทธิ UC ในเขตรับผิดชอบไปใช้บริการที่หน่วยบริการปฐมภูมิ/เทียบกับจำนวนผู้มีสิทธิ์ UC ในเขตรับผิดชอบที่ไปใช้บริการที่โรงพยาบา
     ช่วง 1 เมษายน 2558 ถึง 31 มีนาคม 2559) เกณฑ์เป้าหมายไม่น้อยกว่า 1.51 </font></p></h6>
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
        'after' => 'จำนวนประชากรสิทธิ UC ของหน่วยบริการ ที่มา : สำนักบริหารงานทะเบียนหลักประกันสุขภาพ สำนักงานหลักประกันสุขภาพแห่งชาติ ข้อมูล ณ วันที่ : ต.ค. 2558 ',
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
            'attribute' => 'hos_name',
            'header' => 'หน่วยบริการ'
        ],
         [
            'attribute' => 'a',
            'header' => 'จำนวน (คน)สิทธิ UC'
        ],
         [
            'attribute' => 'b',
            'header' => 'รับบริการ (คน)'
        ]
    ]
]);
?>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>
