
<?php
$this->title = Yii::t('app', 'ตรวจสอบแฟ้ม card รายบุคคล');
use yii\helpers\Html;

?>

<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li> <?= Html::a('ตรวจสอบ 43 แฟ้ม', ['oppp/index']) ?></li>
    <li> <?= Html::a('ตรวจสอบแฟ้ม card', ['card/index']) ?></li>
    <li>ตรวจสอบแฟ้ม card รายบุคคล</li>
</ol>

<?php foreach ($data_view as $chk) { ?>
<?php } ?>   

<div class="alert alert-success alert-dismissible">
    <h3 class="box-title"> 
        ชื่อ-นามสกุล : <font color="#F7FE2E"><?php echo $chk['full_name']; ?></font> &nbsp; &nbsp;  
        CID : <font color="#F7FE2E"><?php echo $chk['cid']; ?></font> &nbsp; &nbsp; 
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
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบทะเบียนบุคคล [ทะเบียนของบุคคลที่มาขึ้นทะเบียนในสถานบริการนั้นๆ ใช้สำหรับเชื่อมโยงหาตัวบุคคลในแฟ้มอื่น ๆ (สามารถกำหนดได้ตั้งแต่ 1-15 หลัก)]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <th scope="row"><code>INSTYPE_OLD [ประเภทสิทธิการรักษา (รหัสเดิม)]</code></th>
                        <td><?php echo $chk['instype_old']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['instype_old'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบรหัสสิทธิมาตรฐาน เดิม';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <th scope="row"><code>INSTYPE_NEW [ประเภทสิทธิการรักษา]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['instype_new']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['instype_new'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบประเภทสิทธิการรักษา [รหัสสิทธิมาตรฐานที􀀦กำหนดโดยหน่วยงานที่เกี่ยวข้อง]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <th scope="row"><code>INSID [เลขที่บัตรสิทธิ]</code></th>
                        <td><?php echo $chk['insid']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['insid'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบหมายเลขของบัตร ตามประเภทสิทธิการรักษา';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <th scope="row"><code>STARTDATE [วันที่ออกบัตร]</code></th>
                        <td><?php echo $chk['startdate']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['startdate'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบวันเดือนปีที่ออกบัตร กำหนดเป็น ค.ศ. (YYYYMMDD)';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <th scope="row"><code>EXPIREDATE [วันที่หมดอายุ]</code></th>
                        <td><?php echo $chk['exppiredate']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['exppiredate'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบวันเดือนปีที่บัตรหมดอายุ กำหนดเป็น ค.ศ. (YYYYMMDD)';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <th scope="row"><code>MAIN [สถานบริการหลัก]</code></th>
                        <td><?php echo $chk['main']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['main'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบรหัสสถานพยาบาลหลัก [รหัสสถานพยาบาลหลักคู่สัญญา กรณี หลักประกันสุขภาพถ้วนหน้า และประกันสังคมตามมาตรฐานสำนักนโยบายและยุทธศาสตร์หมายเหตุ : บันทึกกรณีประเภทสิทธิการรักษา เป็นสิทธิ UC';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <th scope="row"><code>SUB [สถานบริการรอง]</code></th>
                        <td><?php echo $chk['sub_spclty']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['sub_spclty'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบรหัสสถานพยาบาลรอง [รหัสสถานพยาบาลปฐมภูมิ กรณี หลักประกันสุขภาพถ้วนหน้า และสถานพยาบาลใน
                                เครือข่าย 1 แห่ง (ถ้ามี) สำหรับประกันสังคม ตามมาตรฐานจาก สำนักนโยบายและยุทธศาสตร์หมายเหตุ : บันทึกกรณีประเภทสิทธิการรักษา เป็นสิทธิ UC]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>10</td>
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


