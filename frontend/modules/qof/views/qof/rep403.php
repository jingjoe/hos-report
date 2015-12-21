
<?php
$this->title = Yii::t('app', 'เด็กนักเรียน ป. 1 ได้รับบริการเคลือบหลุมร่องฟันในฟันกรามแท้ซี่ที่หนึ่ง');

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
    <h4><font color="#FFFF00">เด็กนักเรียน ป. 1 ได้รับบริการเคลือบหลุมร่องฟันในฟันกรามแท้ซี่ที่หนึ่ง (ผู้รับผิดชอบ นัชฒภัทร ปานอำพัน)</font></h4>
    <h6><p><font color="#FFFFFF">เด็กนักเรียนชั้น ป.1 ในโรงเรียนที่ตั้งอยู่ในเขตรับผิดชอบของ รพ. อายุ 6 ปีเต็ม ถึง 7 ปี 11 เดือน 29 วัน เป็นเด็กไทยทุกสิทธิประกันสุขภาพ ได้รับการตรวจช่องปาก 
                  (ช่วง 1 เมษายน 2558 ถึง 31 มีนาคม 2559) เกณฑ์เป้าหมายไม่น้อยกว่าร้อยละ 30 (เงื่อนไขรหัสที่ให้ ICD-10 TM "2387030" ชื่อ Prev-Sealantป.1)</font></p></h6>
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
            'attribute' => 'school_name',
            'header' => 'โรงเรียน'
        ],
        [
            'label' => 'เป้าหมาย (คน)',
            'format' => 'raw',
            'value' => function($model){
                return  Html::a(Html::encode($model['b']),['/qof/qof/goal403' ,'id'=>$model['village_school_id']]);
            }// end value
        ],
        [
            'label' => 'ผลงาน  (คน)',
            'format' => 'raw',
            'value' => function($model) use($date1,$date2){
                return  Html::a(Html::encode($model['a']),['/qof/qof/result403' ,'id'=>$model['village_school_id'], 'date1' => $date1, 'date2' => $date2]);
            }// end value
        ]
    ]
]);

