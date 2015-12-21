
<?php
$this->title = Yii::t('app', 'ตรวจสอบแฟ้ม chronic รายบุคคล');
use yii\helpers\Html;

?>

<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li> <?= Html::a('ตรวจสอบ 43 แฟ้ม', ['oppp/index']) ?></li>
    <li> <?= Html::a('ตรวจสอบแฟ้ม chronic', ['chronic/index']) ?></li>
    <li>ตรวจสอบแฟ้ม chronic รายบุคคล</li>
</ol>

<?php foreach ($data_view as $chk) { ?>
<?php } ?>   

<div class="alert alert-success alert-dismissible">
    <h3 class="box-title"> 
        ชื่อ-นามสกุล : <font color="#F7FE2E"><?php echo $chk['full_name']; ?></font> &nbsp; &nbsp;  
        HN : <font color="#F7FE2E"><?php echo $chk['hn']; ?></font> &nbsp; &nbsp; 
        วัน/เวลารับบริการ : <font color="#F7FE2E"><?php echo $chk['vstdate']; ?></font></h3>
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
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบทะเบียนของบุคคล [ทะเบียนของบุคคลที่มาขึ้น ทะเบียนในสถานบริการนั้น ๆ ใช้สำหรับเชี่อมโยงหาตัวบุคคลในแฟ้มอื่น ๆ (สามารถกำหนดได้ตั้ง แต่ 1-15 หลัก)(program generate)]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <th scope="row"><code>DATE_DIAG [วันที่ตรวจพบครั้งแรก]</code></th>
                        <td><?php echo $chk['date_diag']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['date_diag'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบวันเดือนปีที่ตรวจพบครั้ง แรก[วันเดือนปีที่ตรวจพบครั้งแรก หมายเหตุ : วันเดือนปีที่ได้รับการวินิจฉัย/ตรวจพบครั้ง แรก';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <th scope="row"><code>CHRONIC [รหัสวินิฉัยโรคเรื้อรัง]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['chronic']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['chronic'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบรหัสโรค ICD - 10 โรคเรื้อรัง [รหัสโรค ICD - 10 - TM (โรคเรื้อรัง)';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <th scope="row"><code>HOSP_DX [สถานพยาบาลที่วินิจฉัยครั้งแรก]</code></th>
                        <td><?php echo $chk['hosp_dx']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['hosp_dx'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบรหัสพยาบาลที่วินิจฉัยครั้งแรก ';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <th scope="row"><code>HOSP_RX [สถานพยาบาลที่รับบริการประจำ]</code></th>
                        <td><?php echo $chk['hosp_rx']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['hosp_rx'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบรหัสสถานพยาบาลที่ไปรับบริการประจำ';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <th scope="row"><code>DATE_DISCH [วันที่จำหน่าย]</code></th>
                        <td><?php echo $chk['date_disch']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['date_disch'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบวันเดือนปีที่จำหน่าย[วันเดือนปีที่จำหน่าย กำหนดเป็น ค.ศ.(YYYYMMDD)
                                หมายเหตุ : บันทึกกรณีที่สามารถระบุประเภทการจำหน่าย หรือ สถานะของผู้ป่วยที่ทราบผลหลังสุด (No. 8) ยกเว้น 03 = ยังรักษาอยู่, 05 = รอจำหน่าย/เฝ้ าระวัง]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <th scope="row"><code>TYPEDISCH [ประเภทการจำหน่าย หรือสถานะ ของผู้ป่วยที่ทราบผลหลังสุด]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['typedisch']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['typedisch'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบประเภทการจำหน่าย[01 = หาย , 02 = ตาย , 03 = ยังรักษาอยู่ , 04 = ไม่ทราบ(ไม่มีข้อมูล) ,
                                05 = รอจำหน่าย/เฝ้าระวัง, 06 = ขาดการรักษาไม่มาติดต่ออีก(ทราบว่าขาดการรักษา), 07 = ครบการรักษา, 08 =โรคอยู่ในภาวะสงบ(inactive) ไม่มีความจำเป็นต้องรักษา, 09 = ปฏิเสธการรักษา,10 = ออกจากพื้นที่]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>9</td>
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


