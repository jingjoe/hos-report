
<?php
$this->title = Yii::t('app', 'ตรวจสอบแฟ้ม procedure_opd รายบุคคล');

use yii\helpers\Html;

?>

<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li> <?= Html::a('ตรวจสอบ 43 แฟ้ม', ['oppp/index']) ?></li>
    <li> <?= Html::a('ตรวจสอบแฟ้ม procedure_opd', ['procedureopd/index']) ?></li>
    <li>ตรวจสอบแฟ้ม procedure_opd รายบุคคล</li>
</ol>
<?php foreach ($data_view as $chk) { ?>
<?php } ?>   

<div class="alert alert-success alert-dismissible">
    <h3 class="box-title"> 
        ชื่อ-นามสกุล : <font color="#F7FE2E"><?php echo $chk['full_name']; ?></font> &nbsp; &nbsp;  
        HN : <font color="#F7FE2E"><?php echo $chk['hn']; ?></font> &nbsp; &nbsp; 
        วัน/เวลารับบริการ : <font color="#F7FE2E"><?php echo $chk['date_serv']; ?></font></h3>
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
                        <th scope="row"><code>SEQ [ลำดับที่]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['seq']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['seq'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบลำดับที่การให้บริการ [ลำดับที่ของการบริการที่กำหนดโดยโปรแกรมเรียงลำดับโดยไม่ซ้ำกัน สำหรับการมารับบริการแต่ละครั้ง (visit)]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <th scope="row"><code>DATE_SERV [วันที่ให้บริการ]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['date_serv']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['date_serv'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบวันเดือนปีที่มารับบริการ [วันเดือนปีที่มารับบริการ กำหนดเป็น ค.ศ.(YYYYMMDD)หมายเหตุ : กรณีที่บันทีกข้อมูลย้อนหลัง ให้เปลี่ยนวันกลับเป็นวันที่รับบริการจริง]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <th scope="row"><code>CLINIC [แผนกที่รับบริการ]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['clinic']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['clinic'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบรหัสแผนกที่รับบริการ [รหัสแผนกที่รับบริการ อ้างอิงตามมาตรฐาน สนย.หมายเหตุ : กรณี รพ.สต. ให้ลงรหัสแผนกบริการ ตามการให้บริการจริง';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <th scope="row"><code>PROCEDCODE [รหัสหัตถการ]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['procedcode']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['procedcode'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบการให้รหัสหัตถการ[รหัสมาตรฐาน ICD-9-CM หรือ ICD-10-TM (รหัสหัตถการ)]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <th scope="row"><code>SERVICEPRICE [ราคาค่าหัตถการ]</code></th>
                        <td><?php echo $chk['serviceprice']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['serviceprice'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบราคาค่าบริการหัตถการ [ราคาค่าบริการหัตถการ มีทศนิยม 2 ตำแหน่ง]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <th scope="row"><code>PROVIDER [เลขที่ผู้ให้บริการ]</code></th>
                        <td><?php echo $chk['provider']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['provider'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบเลขที่ผู้ให้บริการ [เลขที่ผู้ให้บริการ ออกโดยโปรแกรม ไม่ซ้ำ กันในสถานพยาบาลเดียวกัน]';
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


