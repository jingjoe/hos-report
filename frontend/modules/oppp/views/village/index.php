
<?php
$this->title = Yii::t('app', 'ตรวจสอบแฟ้ม village');
use kartik\grid\GridView;
use yii\helpers\Html;

?>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li> <?= Html::a('ตรวจสอบ 43 แฟ้ม', ['oppp/index']) ?></li>
    <li>ตรวจสอบแฟ้ม village</li>
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
            'attribute' => 'vid',
            'header' => 'รหัสชุมชนในเขตรับผิดชอบ'
        ],
        [
            'attribute' => 'village_name',
            'header' => 'ชื่อชุมชน/หมู่บ้าน'
        ],
        [
            'attribute' => 'ntraditional',
            'header' => 'จนท.สาธารณสุข'
        ],
        [
            'attribute' => 'd_update',
            'header' => 'วันเดือนปีที่ปรับปรุง'
        ]
]
]);



