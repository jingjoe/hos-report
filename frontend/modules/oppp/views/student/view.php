
<?php
$this->title = Yii::t('app', 'ตรวจสอบแฟ้ม student รายบุคคล');

use yii\helpers\Html;

?>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li> <?= Html::a('ตรวจสอบ 43 แฟ้ม', ['oppp/index']) ?></li>
    <li> <?= Html::a('ตรวจสอบแฟ้ม student', ['student/index']) ?></li>
    <li>ตรวจสอบแฟ้ม student รายบุคคล</li>
</ol>

<?php foreach ($data_view as $chk) { ?>
<?php } ?>   

<div class="alert alert-success alert-dismissible">
    <h3 class="box-title"> 
        ชื่อ-นามสกุล : <font color="#F7FE2E"><?php echo $chk['full_name']; ?></font> &nbsp; &nbsp;  
        เลขทะเบียนบุคคล : <font color="#F7FE2E"><?php echo $chk['pid']; ?></font> &nbsp; &nbsp; 
        ปีที่สำรวจ : <font color="#F7FE2E"><?php echo $chk['educationyear']; ?></font></h3>
</div><!-- /.box-header -->

<div class="box box-solid">                     
    <div class="box-body">                          
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover display">
                <colgroup>
                    <col class="col-xs-1">
                    <col class="col-xs-2">
                    <col class="col-xs-2">
                    <col class="col-xs-5">
                </colgroup>
                <thead>
                <th>ลำดับที่</th>
                <th>โครงสร้างข้อมูล 43 แฟ้ม</th>
                <th>ข้อมูลหน่วยบริการ</th>
                <th>ผลการตรวจสอบ</th>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <th scope="row"><code>HOSPCODE [รหัสสถานบริการ]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['hospcode']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['hospcode'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบรหัสสถานบริการ [รหัสสถานพยาบาล ตามมาตรฐานสำนักนโยบายและยุทธศาสตร์]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <th scope="row"><code>PID [ทะเบียนบุคคล]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['pid']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['pid'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบทะเบียนบุคคล [ทะเบียนของบุคคลที่มาขึ้นทะเบียนในสถานบริการนั้นๆ ใช้สำหรับเชื่อมโยงหาตัวบุคคลในแฟ้มอื่น ๆ (สามารถกำหนดได้ตั้งแต่ 1-15 หลัก)]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <th scope="row"><code>SCHOOLCODE [รหัสโรงเรียน]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['schoolcode']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['schoolcode'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบรหัสหมู่บ้านและรหัสลำดับโรงเรียน [รหัสหมู่บ้าน+รหัสลำดับโรงเรียนในสถานบริการนั้น ๆ ใช้สำหรับเช่อมโยงหานักเรียนในแฟ้มอื่น ๆ ]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <th scope="row"><code>EDUCATIONYEAR [ปีการศึกษา]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['educationyear']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['educationyear'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบปีการศึกษาที่นักเรียนคนนั้นกำลังศึกษา[รูปแบบปีการศึกษา (เลขจำนวนเต็ม 4 หลัก เป็นปีพุทธศักราช)]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <th scope="row"><code>CLASS [ชั้นเรียน]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['class']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['class'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบชั้นเรียน';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <th scope="row"><code>D_UPDATE [วันเดือนปีที่ปรับปรุง]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['d_update']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['d_update'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบวันที่พิ่มและปรับปรุงข้อมูล ไม่เป็นค่าว่าง[วันที่พิ่มและปรับปรุงข้อมูล กำหนดรูปแบบเป็น ปีเดือนวันชั่วโมงนาทีวินาที (YYYY-MM-DD HH:MM:SS)และเป็นปีคริสตศักราช]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <th scope="row"><code>GRUDATE_DATE [วันจำหน่ายในปีการศึกษานั้น]</code></th>
                        <td><?php echo $chk['grudate_date']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['grudate_date'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบวันที่เด็กออกจากโรงเรียน หรือจบการศึกษา [วันที่เด็กออกจากโรงเรียน หรือจบการศึกษา กำหนดรูปแบบเป็น ค.ศ. (YYYYMMDD)]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <th scope="row"><code>ID [เลขที่จำลองของบุคคล]</code></th>
                        <td><?php echo $chk['id']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['id'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบเลขที่จำลองของบุคคล [ในระยะแรกเป็นเลขบัตรประจำตัวประชาชนไปก่อน ในระยะต่อไปจะเป็นเลขประจำตัว MOPH_ID]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                </tbody>
            </table>
        </div>                           
    </div><!-- box-footer -->
</div><!-- /.box -->            
<?= \bluezed\scrollTop\ScrollTop::widget() ?>


