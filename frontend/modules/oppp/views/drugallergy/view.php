
<?php
$this->title = Yii::t('app', 'ตรวจสอบแฟ้ม drugallergy รายบุคคล');
use yii\helpers\Html;

?>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li> <?= Html::a('ตรวจสอบ 43 แฟ้ม', ['oppp/index']) ?></li>
    <li> <?= Html::a('ตรวจสอบแฟ้ม drugallergy', ['drugallergy/index']) ?></li>
     <li>ตรวจสอบแฟ้ม drugallergy รายบุคคล</li>
</ol>

<?php foreach ($data_view as $chk) { ?>
<?php } ?>   

<div class="alert alert-success alert-dismissible">
    <h3 class="box-title"> 
        ชื่อ-นามสกุล : <font color="#F7FE2E"><?php echo $chk['full_name']; ?></font> &nbsp; &nbsp;  
        PID : <font color="#F7FE2E"><?php echo $chk['pid']; ?></font> &nbsp; &nbsp; 
        วัน/เวลารับบริการ : <font color="#F7FE2E"><?php echo $chk['daterecord']; ?></font></h3>
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
                        <th scope="row"><code>DATERECORD [วันที่บันทึกประวัติการแพ้ยา]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['daterecord']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['daterecord'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบวันที่บันทึกประวัติการแพ้ยา [วันที่บันทึกข้อมูลประวัติการแพ้ยาหมายเหตุ : วันที่ตรวจพบอาการแพ้ และ กรณีบันทึกย้อนหลัง ให้บันทึกวันที่รับบริการจริง]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <th scope="row"><code>DRUGALLERGY [รหัสยาที่มีประวัติการแพ้ยา]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['drugallergy']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['drugallergy'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบรหัสยามาตรฐานที่กำหนดเป็น 24 หลัก [รหัสยามาตรฐานที่กำหนดเป็น 24 หลัก หรือรหัสยาของสถานพยาบาลในกรณีที่ยังไม่มีรหัสมาตรฐาน 24 หลัก]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <th scope="row"><code>DNAME [ชื่อยา]</code></th>
                        <td><?php echo $chk['dname']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['dname'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบชื่อยา';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <th scope="row"><code>TYPEDX [ประเภทการวินิจฉัยการแพ้ยา]</code></th>
                        <td><?php echo $chk['typedx']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['typedx'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบประเภทการวินิจฉัยการแพ้ยา [ประเภทการวินิจฉัยการแพ้ยา 5 ประเภท (1= certain, 2= probable,3= possible, 4= unlikely, 5= unclassified)]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <th scope="row"><code>ALEVEL [ระดับความรุนแรงของการแพ้ยา]</code></th>
                        <td><?php echo $chk['alevel']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['alevel'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบระดับความรุนแรงของการแพ้ยา [ระดับความรุนแรงของการแพ้ยา 8 ระดับ  ALEVEL C 1
                                1.ไม่ร้ายแรง (Non-serious)
                                2.ร้ายแรง - เสียชีวิต (Death)
                                3.ร้ายแรง - อัตรายถึงชีวิต (Life-threatening)
                                4.ร้ายแรง - ต้องเข้ารับการรักษาในโรงพยาบาล (Hospitalization-initial)
                                5.ร้ายแรง - ทำให้เพิ่มระยะเวลาในการรักษานานขึน􀀒 (Hospitalization-prolonged)
                                6.ร้ายแรง - พิการ (Disability)
                                7.ร้ายแรง - เป็นเหตุให้เกิดความผิดปกติแต่กำเนิด (Congenital anomaly)
                                8.ร้ายแรง-อื่นๆ]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <th scope="row"><code>SYMPTOM [ลักษณะอาการของการแพ้ยาที]</code></th>
                        <td><?php echo $chk['symptom']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['symptom'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบลักษณะอาการของการแพ้ยาที [ลักษณะอาการของการแพ้ยา (20 ลักษณะ)]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <th scope="row"><code>INFORMANT [ผู้ให้ประวัติการแพ้ยา]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['informant']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['informant'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบผู้ให้ประวัติการแพ้ยา [1= ผู้ป่วยให้ประวัติเอง, 2= ผู้ป่วยให้ประวัติจากการให้ข้อมูลของสถานพยาบาลอืน, 3=สถานพยาบาลอืนเป็นผู้ให้ข้อมูล, 4= สถานพยาบาลแห่งนี้เป็นผู้พบการแพ้ยาเอง]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <th scope="row"><code>INFORMHOSP [รหัสสถานพยาบาลผู้ให้ประวัติการแพ้ยา]</code></th>
                        <td><?php echo $chk['informhosp']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['informhosp'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบรหัสสถานพยาบาลผู้ให้ประวัติการแพ้ยา [รหัสสถานพยาบาล ผู้ให้ข้อมูลประวัติการแพ้ยา ตามมาตรฐานสำนักนโยบายและยุทธศาสตร์]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>11</td>
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


