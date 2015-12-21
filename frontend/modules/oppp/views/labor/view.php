
<?php
$this->title = Yii::t('app', 'ตรวจสอบแฟ้ม labor รายบุคคล');

use yii\helpers\Html;

?>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li> <?= Html::a('ตรวจสอบ 43 แฟ้ม', ['oppp/index']) ?></li>
    <li> <?= Html::a('ตรวจสอบแฟ้ม labor', ['labor/index']) ?></li>
    <li>ตรวจสอบแฟ้ม labor รายบุคคล</li>
</ol>

<?php foreach ($data_view as $chk) { ?>
<?php } ?>   

<div class="alert alert-success alert-dismissible">
    <h3 class="box-title"> 
        ชื่อ-นามสกุล : <font color="#F7FE2E"><?php echo $chk['full_name']; ?></font> &nbsp; &nbsp;  
        PID : <font color="#F7FE2E"><?php echo $chk['pid']; ?></font> &nbsp; &nbsp; 
        วัน/เวลารับบริการ : <font color="#F7FE2E"><?php echo $chk['bdate']; ?></font></h3>
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
                        <th scope="row"><code>GRAVIDA [ครรภ์ที่]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['gravida']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['gravida'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบการตั้งครรภ์ครั้งที่กรอกเป็นตัวเลข ครรภ์ที่[การตั้งครรภ์ครั้งที่กรอกเป็นตัวเลข เช่น ครรภ์ที่ 1,2,10 เป็นต้น]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <th scope="row"><code>LMP [วันแรกของการมีประจำเดือนครั้งสุดท้าย]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['lmp']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['lmp'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบวันแรกของการมีประจำเดือนครั้งสุดท้าย [วันแรกของการมีประจำเดือนครั้ง สุดท้าย กำหนดเป็น ค.ศ.(YYYYMMDD)]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <th scope="row"><code>EDC [วันที่กำหนดคลอด]</code></th>
                        <td><?php echo $chk['edc']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['edc'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบวันที่กำหนดคลอด [วันเดือนปี ที่กำหนดคลอด กำหนดเป็น ค.ศ. (YYYYMMDD)]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <th scope="row"><code>BDATE [วันคลอด/วันสิ้นสุดการตั้งครรภ์]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['bdate']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['bdate'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบวันคลอด/วันสิ้นสุดการตั้งครรภ์[วันเดือนปีที่คลอด / วันสิ้นสุดการตั้งครรภ์ กำหนดเป็น ค.ศ.(YYYYMMDD)]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <th scope="row"><code>BRESULT [ผลสิ้นสุดการตั้งครรภ์]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['bresult']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['bresult'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบการให้รหัสโรค ICD-10 [รหัสโรค ICD - 10 TM]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <th scope="row"><code>BPLACE [สถานที่คลอด]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['bplace']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['bplace'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบสถานที่คลอด [1=โรงพยาบาล, 2=สถานีอนามัย, 3=บ้าน, 4=ระหว่างทาง, 5=อื่นๆ]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <th scope="row"><code>BHOSP [รหัสสถานพยาบาลที่คลอด]</code></th>
                        <td><?php echo $chk['bhosp']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['bhosp'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบรหัสสถานพยาบาลที่คลอด [รหัสมาตรฐานจาก สำนักนโยบายและยุทธศาสตร์]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <th scope="row"><code>BTYPE [วิธีการคลอด/สิ้นสุดการตั้งครรภ์]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['btype']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['btype'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบวิธีการคลอด/สิ้นสุดการตั้งครรภ์ [1 = NORMAL, 2 = CESAREAN, 3 = VACUUM, 4 = FORCEPS,5 = ท่าก้น, 6 = ABORTION]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <th scope="row"><code>BDOCTOR [ประเภทของผู้ทำคลอด]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['bdoctor']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['bdoctor'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบประเภทของผู้ทำคลอด [1 = แพทย์, 2 = พยาบาล,3 = จนท.สาธารณสุข(ที่ไม่ใช่แพทย์ พยาบาล),4 = ผดุงครรภ์โบราณ, 5 = คลอดเอง, 6 = อื่นๆ]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <th scope="row"><code>LBORN [จำนวนเกิดมีชีพ]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['lborn']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['lborn'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบจำนวนเกิดมีชีพ [จำนวนเด็กเกิดมีชีพจากการคลอด ไม่มีให้ใส่ 0]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?>      
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <th scope="row"><code>SBORN [จำนวนตายคลอด]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['sborn']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['sborn'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบจำนวนตายคลอด [จำนวนเด็กเกิดมีชีพจากการคลอด ไม่มีให้ใส่ 0]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>14</td>
                        <th scope="row"><code>D_UPDATE [วันเดือนปีที่ปรับปรุงข้อมูล]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['d_update']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['d_update'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบวันเดือนปีที่ปรับปรุงข้อมูล [วันที่เพิ่มและปรับปรุงข้อมูล  กำหนดรูปแบบเป็น ปีเดือนวันชั่วโมงนาทีวินาที (YYYYMMDDHHMMSS) และเป็นปีคริสตศักราช]';
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


