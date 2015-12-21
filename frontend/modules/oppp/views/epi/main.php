<?php
$this->title = Yii::t('app', 'ตรวจสอบแฟ้ม epi');

use yii\helpers\Html;
?>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li> <?= Html::a('ตรวจสอบ 43 แฟ้ม', ['oppp/index']) ?></li>
    <li>ตรวจสอบแฟ้ม epi</li>
</ol>

<div class="alert alert-success alert-dismissible">
    <h4><font color="#FFFF00">ตรวจสอบ แฟ้ม EPI</font></h4>
    <h6><p><font color="#FFFFFF">ข้อมูลการวัดระดับโภชนาการและพัฒนาการเด็กอายุ 0-5 ปี และนักเรียนในเขตรับผิดชอบ (การเก็บข้อมูล 1.เด็ก 0-5 ปี เก็บข้อมูลปีละ 4 ครั้ง ครั้งที่ 1 เดือนตุลาคม ,ครั้งที่ 2 เดือนมกราคม ครั้งที่ 3 เดือนเมษายน,ครั้งที่ 4 เดือนกรกฎาคม 2.อายุ 6 -18 ปี เก็บข้อมูลปีละ 2 ครั้ง ครั้งที่ 1 เทอมที่ 1 เดือนกรกฎาคม,ครั้งที่ 2 เทอมที่ 2 เดือนมกราคม)
            ตรวจสอบบัญชี 2,3,4,5,กลุ่มเป้าหมายอื่นๆ (ห้องฉุกเฉิน,ซักประวัติ Active Proplem)</font></p></h6>
</div>
    <?php echo Html::a('ตรวจสอบบัญชี 2', ['epi/epi2'], ['class' => 'btn bg-purple btn-flat']); ?>  
    <?php echo Html::a('ตรวจสอบบัญชี 3 ', ['epi/epi3'], ['class' => 'btn bg-purple btn-flat']); ?> 
    <?php echo Html::a('ตรวจสอบบัญชี 4', ['epi/epi4'], ['class' => 'btn bg-purple btn-flat']); ?>  
    <?php echo Html::a('ตรวจสอบบัญชี 5', ['epi/epi5'], ['class' => 'btn bg-purple btn-flat']); ?> 
    <?php echo Html::a('ตรวจสอบ ER', ['epi/epier'], ['class' => 'btn bg-purple btn-flat']); ?>  
    <?php echo Html::a('ตรวจสอบ OPD', ['epi/epiopd'], ['class' => 'btn bg-purple btn-flat']); ?> <br>
