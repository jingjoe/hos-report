
<?php
$this->title = Yii::t('app', 'ตรวจสอบแฟ้ม anc รายบุคคล');

use yii\helpers\Html;

?>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li> <?= Html::a('ตรวจสอบ 43 แฟ้ม', ['oppp/index']) ?></li>
    <li> <?= Html::a('ตรวจสอบแฟ้ม anc', ['anc/index']) ?></li>
    <li>ตรวจสอบแฟ้ม anc รายบุคคล</li>
</ol>

<?php foreach ($data_view as $chk) { ?>
<?php } ?>   

<div class="alert alert-success alert-dismissible">
    <h3 class="box-title"> 
        ชื่อ-นามสกุล : <font color="#F7FE2E"><?php echo $chk['full_name']; ?></font> &nbsp; &nbsp;  
        PID : <font color="#F7FE2E"><?php echo $chk['pid']; ?></font> &nbsp; &nbsp; 
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
                        <th scope="row"><code>SEQ [ลำดับที่]</code></th>
                        <td><?php echo $chk['seq']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['seq'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบลำดับที่ของการให้บริการ [ลำดับที่ของการบริการที่กำหนดโดยโปรแกรมเรียงลำดับโดยไม่ซ้ำกัน สำหรับการมารับบริการแต่ละครั้ง (visit)หมายเหตุ : ในกรณีที่มารับบริการ (visit) หลายคลินิคใน 1 ครั้ง ให้มีลำดับการให้บริการเป็นตัวเลข เดียวกัน]';
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
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบวันที่ให้บริการ [วันเดือนปีที่มารับบริการ กำหนดเป็น ค.ศ.(YYYYMMDD)หมายเหตุ : กรณีที่บันทีกข้อมูลย้อนหลัง ให้เปลี่ยนวันกลับเป็นวันที่รับบริการจริง]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <th scope="row"><code>GRAVIDA [ครรภ์ที่]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['gravida']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['gravida'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบครรภ์ที่ [การตั้งครรภ์ครั้งที่กรอกเป็นตัวเลข เช่น ครรภ์ท􀀞ี 1,2,10 เป็นต้น]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <th scope="row"><code>ANCNO [ANC ช่วงที]</code></th>
                        <td><?php echo $chk['ancno']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['ancno'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบANC ช่วงทีระบุ [การนัดช่วงที่ 1 เมื่ออายุครรภ์ ≤12 สัปดาห์การนัดช่วงที่ 2 เมื่ออายุครรภ์  18 สัปดาห์
                                การนัดช่วงที่ 3 เมื่ออายุครรภ์  26 สัปดาห์การนัดช่วงที่ 4 เมื่ออายุครรภ์  32 สัปดาห์ การนัดช่วงที่ 5 เมื่ออายุครรภ์ 38 สัปดาห์ หมายเหตุ กรณีอายคุ รรภ์ไม่อยู่ในช่วงของการฝากครรภ์ให้ หมายเหตุ : บันทึกเฉพาะอายุครรภ์ บันทึกช่วงครรภ์ กรณีมาตรงช่วงการนัดฝากครรภ์]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <th scope="row"><code>GA [อายุครรภ์]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['ga']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['ga'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบอายุครรภ์ [อายุครรภ์ ( สัปดาห์) เป็นเลขจำนวนเต็ม]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <th scope="row"><code>ANCRESULT [ผลการตรวจ]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['ancresult']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['ancresult'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบผลการตรวจ [1 = ปกติ, 2 = ผิดปกติ, 9 = ไม่ทราบ]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <th scope="row"><code>ANCPLACE [สถานที่รับบริการฝากครรภ์]</code></th>
                        <td><?php echo $chk['ancplace']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['ancplace'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบสถานที่รับบริการฝากครรภ์[รหัสสถานพยาบาลที่ให้บริการ ตามรหัสมาตรฐาน สนย.]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <th scope="row"><code>PROVIDER [เลขที่ผู้ให้บริการ]</code></th>
                        <td><?php echo $chk['provider']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['provider'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบเลขที่ผู้ให้บริการ [เลขทีผู้ให้บริการ ออกโดยโปรแกรม ไม่ซ้ำกันในสถานพยาบาลเดียวกัน]';
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


