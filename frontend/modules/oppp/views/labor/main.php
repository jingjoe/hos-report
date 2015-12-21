<?php
$this->title = Yii::t('app', 'ตรวจสอบแฟ้ม labor');

use yii\helpers\Html;
?>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li> <?= Html::a('ตรวจสอบ 43 แฟ้ม', ['oppp/index']) ?></li>
    <li>ตรวจสอบแฟ้ม labor</li>
</ol>

<div class="alert alert-success alert-dismissible">
    <h4><font color="#FFFF00">ตรวจสอบ แฟ้ม LABOR</font></h4>
    <h6><p><font color="#FFFFFF">ข้อมูลประวัติการคลอด ของหญิงคลอดในเขตรับผิดชอบ และหญิงคลอดผ้มูารับบริการ ประกอบด้วย 1) หญิงตั้งครรภ์ที่คลอดทุกคนที่อาศัยอยู่ในเขตรับผิดชอบ
        2) หญิงตั้งครรภ์ที่คลอดที่อาศัยอยู่นอกเขตรับผิดชอบ ที่มาใช้บริการคลอด เป็นแฟ้มสะสมการจัดสง่ ข้อมูลให้ส่วนกลาง ให้ส่งครั้งเดียวเมื่อมีการจัดเก็บข้อมูลครบทุกกิจกรรมในแฟ้ม</font></p></h6>
</div>
    <?php echo Html::a('ตรวจสอบบัญชี 2', ['labor/labor1'], ['class' => 'btn bg-purple btn-flat']); ?>  
    <?php echo Html::a('ตรวจสอบทะเบียนคลอด', ['labor/labor2'], ['class' => 'btn bg-purple btn-flat']); ?> <br>
 



