
<?php
$this->title = Yii::t('app', 'ตรวจสอบแฟ้ม prenatal รายบุคคล');

use yii\helpers\Html;

?>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li> <?= Html::a('ตรวจสอบ 43 แฟ้ม', ['oppp/index']) ?></li>
    <li> <?= Html::a('ตรวจสอบแฟ้ม prenatal', ['prenatal/index']) ?></li>
    <li>ตรวจสอบแฟ้ม prenatal รายบุคคล</li>
</ol>

<?php foreach ($data_view as $chk) { ?>
<?php } ?>   

<div class="alert alert-success alert-dismissible">
    <h3 class="box-title"> 
        ชื่อ-นามสกุล : <font color="#F7FE2E"><?php echo $chk['full_name']; ?></font> &nbsp; &nbsp;  
        PID : <font color="#F7FE2E"><?php echo $chk['pid']; ?></font> &nbsp; &nbsp; 
        วัน/เวลารับบริการ : <font color="#F7FE2E"><?php echo $chk['date_hct']; ?></font></h3>
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
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบครรภ์ที่ [การตั้งครรภ์ครั้งที่กรอกเป็นตัวเลข เช่น ครรภ์ที่ 1,2,10 เป็นต้น]';
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
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบวันแรกของการมีประจำเดือนครั้งสุดท้าย [วันแรกของการมีประจำเดือนครั้งสุดท้าย กำหนดเป็น ค.ศ.(YYYYMMDD)]';
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
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบวันที่กำหนดคลอด [วันเดือนปี ที่กำหนดคลอด กำหนดเป็น ค.ศ. (YYYYMMDD)หมายเหตุ : ถ้าบันทึกค่า LMP]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
               
                    <tr>
                        <td>6</td>
                        <th scope="row"><code>VDRL_RESULT [ผลการตรวจ VDRL_RS]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['vdrl_result']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['vdrl_result'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบผลการตรวจ VDRL ที่ระบุ [1 = ปกติ, 2 = ผิดปกติ, 3=ไม่ตรวจ, 4=รอผลตรวจ, 9 =ไม่ทราบ]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <th scope="row"><code>HB_RESULT [ผลการตรวจ HB_RS]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['hb_result']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['hb_result'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบผลการตรวจ HB ที่ระบุ [1 = ปกติ, 2 = ผิดปกติ, 3=ไม่ตรวจ, 4=รอผลตรวจ, 9 =ไม่ทราบ]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <th scope="row"><code>HIV_RESULT [ผลการตรวจ HIV_RS]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['hiv_result']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['hiv_result'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบผลการตรวจ HIV ที่ระบุ [1 = ปกติ, 2 = ผิดปกติ, 3=ไม่ตรวจ, 4=รอผลตรวจ, 9 =ไม่ทราบ]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <th scope="row"><code>DATE_HCT [วันที่ตรวจ HCT.]</code></th>
                        <td><?php echo $chk['date_hct']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['date_hct'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบวันที่ตรวจ HCT.[วันเดือนปีที่ตรวจ กำหนดเป็น ค.ศ.(YYYYMMDD)หมายเหตุ : กรณีที่บันทีกข้อมูลย้อนหลัง ให้เปลี่ยนวันกลับเป็นวันที่รับบริการจริง]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <th scope="row"><code>HCT_RESULT [ผลการตรวจ HCT]</code></th>
                        <td><?php echo $chk['hct_result']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['hct_result'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบการให้ระดับฮีมาโตคริค (หน่วยเป็น %) [ระดับฮีมาโตคริค (%)]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                      <tr>
                        <td>11</td>
                        <th scope="row"><code>THALASSEMIA [ผลการตรวจ THALASSAEMIA]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['thalassaemia']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['thalassaemia'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบผลการตรวจ THALASSAEMIA [1 = ปกติ, 2 = ผิดปกติ, 3=ไม่ตรวจ, 4=รอผลตรวจ, 9 =ไม่ทราบ]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>12</td>
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


