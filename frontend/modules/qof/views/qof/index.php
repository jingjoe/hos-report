<?php
$this->title = Yii::t('app', 'ตรวจสอบ qof สปสช');

use yii\helpers\Html;
?>
<div class="alert bg-navy alert-dismissible">
    <h4><font color="#FFFF00">ตัวชี้วัดเกณฑ์คุณภาพและผลงานบริการปฐมภูมิ QOF ปี 2559</font></h4>
    <h6><p><font color="#FFFFFF">อ้างอิงจากแนวทางและตัวชี้วัดเกณฑ์คุณภาพและผลงานบริการปฐมภูมิ (Quality and Outcome Framework: QOF) ปีงบประมาณ 2559 สำนักงานหลักประกันสุขภาพแห่งชาติ เขต 11 สุราษฏร์ธานี</font></p></h6>
</div>

<div class="box box-danger box-solid direct-chat direct-chat-primary">
    <div class="box-header">
        <h3 class="box-title">รายงานตัวชี้วัดกลาง</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div><!-- /.box-header -->
    <div class="box-body">
      <!-- box-1 -->
        <div class="box-header with-border">
            <h3 class="box-title">ตัวชี้วัดด้านที่ 1 : คุณภาพและผลงานการจัด บริการสร้างเสิมสุขภาพและป้องกันโรค PP</h3>
        </div>
        <ol>
            <?php echo Html::a('1.1 ร้อยละของหญิงตั้งครรภ์ได้รับการฝากครรภ์ครั้งแรกก่อน 12 สัปดาห์', ['qof/rep1_1']); ?> <br>
            <?php echo Html::a('1.2 ร้อยละของหญิงตั้งครรภ์ได้รับการฝากครรภ์ครบ 5 ครั้งตามเกณฑ์', ['qof/rep1_2']); ?>  <br>
            <?php echo Html::a('1.3 ร้อยละสะสมความครอบคลุมการตรวจคัดกรองมะเร็งปากมดลูกในสตรีอายุ 30-60 ปี ภายใน 5 ปี ', ['qof/rep1_3']); ?>  <br>
        </ol>
          
      
        <!-- box-2 -->
        <div class="box-header with-border">
            <h3 class="box-title">ตัวชี้วัดด้านที่ 2 : คุณภาพและผลงานการจัดบริการปฐมภูมิ</h3>
        </div>
        <ol>
            <?php echo Html::a('2.1 สัดส่วนการใช้บริการที่หน่วยบริการปฐมภูมิต่อการใช้บริการที่โรงพยาบาล', ['qof/rep2_1']); ?> <br>
            <?php echo Html::a('2.2 อัตราการรับไว้รักษาในโรงพยาบาลผู้ป่วยโรคหืด สิทธิ UC ', ['qof/rep2_2']); ?>  <br>
            <?php echo Html::a('2.3 อัตราการใช้บริการของผู้ป่วยในด้วยโรคเบาหวานที่มีภาวะแทรกซ้อนระยะสั้น สิทธิ UC', ['qof/rep2_3']); ?>  <br>
            <?php echo Html::a('2.4 อัตราการรับไว้รักษาในโรงพยาบาลด้วยโรคความดันโลหิตสูงหรือภาวะแทรกซ้อนของความดันโลหิตสูง สิทธิ UC', ['qof/rep2_4']); ?>  <br>
        </ol>
        <!-- box-3 -->
        <div class="box-header with-border">
            <h3 class="box-title">ตัวชี้วัดด้านที่ 3 : คุณภาพและผลงานด้านการพัฒนาองค์กร การเชื่อมโยงบริการ ระบบส่งต่อ และการบริหารระบบ</h3>
        </div>
        <ol>
            <?php echo Html::a('3.1 ร้อยละประชาชนมีหมอใกล้บ้านใกล้ใจดูแล <font color="red">ไม่สามารถประมวลผลได้</font>', ['qof/rep3_1']); ?> <br>
            <?php echo Html::a('3.2 ร้อยละหน่วยบริการปฐมภูมิผ่านเกณฑ์ขึ้นทะเบียน <font color="red">ไม่สามารถประมวลผลได้</font>', ['qof/rep3_2']); ?>  <br>
        </ol>
    </div><!-- /.box-body -->

</div>

<div class="box box-danger box-solid direct-chat direct-chat-primary">
    <div class="box-header">
        <h3 class="box-title">รายงานตัวชี้วัดของเขตพื้นที่ (คณะทำงาน ฯ ระดับเขตเลือก)</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div><!-- /.box-header -->
    <div class="box-body">
        <!-- box-1 -->
        <div class="box-header with-border">
            <h3 class="box-title">ตัวชี้วัดด้านที่ 1 : คุณภาพและผลงานการจัดบริการสร้างเสิมสุขภาพและป้องกันโรค PP</h3>
        </div>
        <ol>
            <?php echo Html::a('4.1 ร้อยละของเด็กอายุ 1 ปี ที่ได้รับวัคซีนโรคหัด ', ['qof/rep4_1']); ?> <br>
            <?php echo Html::a('4.2 ร้อยละของเด็กนักเรียน ป. 1 ได้รับการตรวจช่องปาก ', ['qof/rep4_2']); ?>  <br>
      <!--  <?php echo Html::a('4.3 ร้อยละของเด็กนักเรียน ป. 1 ได้รับบริการเคลือบหลุมร่องฟันในฟันกรามแท้ซี่ที่หนึ่ง ', ['qof/rep4_3']); ?>  <br>        -->
        </ol>
        <!-- box-2 -->
        <div class="box-header with-border">
            <h3 class="box-title">ตัวชี้วัดด้านที่ 2 : คุณภาพและผลงานการจัดบริการปฐมภูมิ</h3>
        </div>
        <ol>
            <?php echo Html::a('5.1 ร้อยละหน่วยบริการปฐมภูมิ(รพ.สต.)ที่มีแพทย์แผนไทยปฏิบัติงานประจำและมีการสั่งใช้ยาสมุนไพรพื้นฐานมากกว่า 10 รายการ', ['qof/rep5_1']); ?> <br>
        </ol>
         <!-- box-3 -->
        <div class="box-header with-border">
            <h3 class="box-title">ตัวชี้วัดด้านที่ 3 : คุณภาพและผลงานด้านการพัฒนาองค์กร การเชื่อมโยงบริการ ระบบส่งต่อ และการบริหารระบบ</h3>
        </div>
        <ol>
            <?php echo Html::a('6.1 CUP ผ่านเกณฑ์การประเมินมาตรฐานการบริหารและพัฒน์นาเครือข่ายบริการปฐมภูมิ (Primary Care Award) : PCA <font color="red">ไม่สามารถประมวลผลได้</font>', ['qof/rep6_1']); ?> <br>
        </ol>
    </div>
</div>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>



