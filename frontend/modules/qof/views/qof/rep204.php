
<?php
$this->title = Yii::t('app', 'อัตราการรับไว้รักษาในโรงพยาบาลด้วยโรคความดันโลหิตสูงหรือภาวะแทรกซ้อนของความดันโลหิตสูง สิทธิ UC');

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
     <h4><font color="#FFFF00">อัตราการรับไว้รักษาในโรงพยาบาลด้วยโรคความดันโลหิตสูงหรือภาวะแทรกซ้อนของความดันโลหิตสูง สิทธิ UC (ผู้รับผิดชอบ รจนา   จันทรักษ์)</font></h4>
     <h6><p><font color="#FFFFFF">จำนวนครั้งของผู้ป่วยในด้วยโรคความดันโลหิตสูงหรือภาวะแทรกซ้อนของความดันโลหิตสูง อายุ 15 ปีขึ้นไป สิทธิ UC ที่ลงทะเบียนสิทธิหน่วยบริการประจำ
     ช่วง 1 เมษายน 2558 ถึง 31 มีนาคม 2559) เกณฑ์เป้าหมายน้อยกว่า 1.00 
    (รหัสที่ให้ Pdx 'I10'-'I15' OR Pdx='I674') OR (Pdx 'I60'-'I62' AND Sdx 'I10'-'I15' OR Sdx='I674' AND Pdx <> 'S00'-'T99')OR (Pdx='H350' AND Sdx'I10'-'I15' OR Sdx='I674')</font></p></h6>
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
            'attribute' => 'village_name',
            'header' => 'หมู่บ้าน'
        ],
        [
            'label' => 'เป้าหมาย (คน)',
            'format' => 'raw',
            'value' => function($model){
                return  Html::a(Html::encode($model['b']),['/qof/qof/goal204' ,'id'=>$model['village_id']]);
            }// end value
        ],
        [
            'label' => 'ผลงาน  (คน)',
            'format' => 'raw',
            'value' => function($model) use($date1,$date2){
                return  Html::a(Html::encode($model['a']),['/qof/qof/result204' ,'id'=>$model['village_id'], 'date1' => $date1, 'date2' => $date2]);
            }// end value
        ]
    ]
]);

