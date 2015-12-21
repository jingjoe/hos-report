
<?php
$this->title = Yii::t('app', 'ตรวจสอบแฟ้ม newborn รายบุคคล');

use yii\helpers\Html;

?>

<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li> <?= Html::a('ตรวจสอบ 43 แฟ้ม', ['oppp/index']) ?></li>
    <li> <?= Html::a('ตรวจสอบแฟ้ม newborn', ['newborn/index']) ?></li>
    <li>ตรวจสอบแฟ้ม newborn รายบุคคล</li>
</ol>
<?php foreach ($data_view as $chk) { ?>
<?php } ?>   

<div class="alert alert-success alert-dismissible">
    <h3 class="box-title"> 
        ชื่อ-นามสกุล : <font color="#F7FE2E"><?php echo $chk['full_name']; ?></font> &nbsp; &nbsp;  
        PID : <font color="#F7FE2E"><?php echo $chk['pid']; ?></font> &nbsp; &nbsp; 
        วันเกิด : <font color="#F7FE2E"><?php echo $chk['birth']; ?></font></h3>
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
                        <th scope="row"><code>PID [ทะเบียนบุคคล (เด็ก)]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
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
                        <th scope="row"><code>MPID [ทะเบียนบุคคล (แม่)]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['mpid']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['mpid'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบทะเบียนบุคคล (แม่)จากแฟ้ม PERSON [ทะเบียนบุคคลที่กำหนดโดยโปรแกรมจากแฟ้ม PERSON และทะเบียนนี้จะซ้ำกันได้หากบุคคลนั้น มีมารดาเป็นบุคคลเดียวกัน ใช้อ้างอิงในแฟ้ม Person]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <th scope="row"><code>GRAVIDA [ครรภ์ที่]</code></th>
                        <td><?php echo $chk['gravida']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['gravida'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบครรภ์ที่[การตั้งครรภ์ครั้ง ที่กรอกเป็นตัวเลข เช่น ครรภ์ที่ 1,2,10 เป็นต้น หมายเหตุ : ประมวลผลจาก labor]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <th scope="row"><code>GA [อายุครรภ์เมื่อคลอด]</code></th>
                        <td><?php echo $chk['ga']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['ga'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบอายุครรภ์ [อายุครรภ์ (สัปดาห์) เป็นเลขจำนวนเต็ม]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <th scope="row"><code>BDATE [วันที่คลอด]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['birth']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['birth'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบวันเดือนปีที่คลอด [วันเดือนปีที่คลอด กำหนดเป็น ค.ศ.(YYYYMMDD)]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <th scope="row"><code>BTIME [เวลาที่คลอด]</code></th>
                        <td><?php echo $chk['btime']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['btime'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบสถานที่เกิดอุบัติเหตุ [เวลาที่คลอด กำหนดเป็น ชั่วโมง นาที วินาที (HHMMSS)]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <th scope="row"><code>BPLACE [สถานที่คลอด]</code></th>
                        <td><?php echo $chk['bplace']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['bplace'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบสถานที่คลอด [1=โรงพยาบาล, 2=สถานีอนามัย, 3=บ้าน, 4=ระหว่างทาง, 5=อื่นๆ หมายเหตุ : ประมวลผลจาก labor]';
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
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบรหัสสถานพยาบาล 5 หลัก [รหัสมาตรฐานจาก สำนักนโยบายและยุทธศาสตร์]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <th scope="row"><code>BIRTHNO [ลำดับที่ของทารกที่คลอด]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['birthno']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['birthno'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบลำดับที่ของทารกที่คลอด [ลำดับที่ของการคลอด 1 = คลอดเดี่ยว, 2 = เป็นเด็กแฝดลำดับที่ 1,3 = เป็นเด็กแฝดลำดับที่ 2, 4 = เป็นเด็กแฝดลำดับที่ 3,5 = เป็นเด็กแฝดลำดับที่]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <th scope="row"><code>BTYPE [วิธีการคลอด]</code></th>
                        <td><?php echo $chk['btype']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['btype'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบวิธีการคลอด [1 = NORMAL, 2 = CESAREAN, 3 = VACUUM, 4 = FORCEPS,5 = ท่าก้นหมายเหตุ : ประมวลผลจาก labor]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?>      
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <th scope="row"><code>BDOCTOR [ประเภทของผู้ทำคลอด]</code></th>
                        <td><?php echo $chk['bdoctor']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['bdoctor'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบประเภทของผู้ทำคลอด [1 = แพทย์, 2 = พยาบาล, 3 = จนท.สาธารณสุข (ที่ไม่ใช่แพทย์ พยาบาล), 4 = ผดุงครรภ์โบราณ, 5 = คลอดเอง, 6 = อื่นๆ หมายเหตุ : ประมวลผลจาก labor]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <th scope="row"><code>BWEIGHT [น้ำหนักแรกคลอด(กรัม)]</code></th>
                        <td><?php echo $chk['bweight']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['bweight'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบน้ำหนักแรกคลอด [หน่วยนับเป็นกรัม]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>14</td>
                        <th scope="row"><code>ASPHYXIA [ภาวการณ์ขาดออกซิเจน]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['asphyxia']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['asphyxia'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบภาวการณ์ขาดออกซิเจน [1 = ขาด , 2 = ไม่ขาด, 9 = ไม่ทราบ]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>15</td>
                        <th scope="row"><code>VITK [ได้รับ VIT K หรือไม่]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['vitk']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['vitk'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบการได้รับ VIT K [1 = ได้รับ , 2 = ไม่ได้รับ, 9 = ไม่ทราบ]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>16</td>
                        <th scope="row"><code>TSH [ได้รับการตรวจ TSH หรือไม่]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['ths']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['ths'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบการได้รับการตรวจ TSH หรือไม่ [1 = ได้รับการตรวจ , 2 = ไม่ได้ตรวจ, 9 = ไม่ทราบ]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>17</td>
                        <th scope="row"><code>TSHRESULT [ผลการตรวจ TSH]</code></th>
                        <td><?php echo $chk['tshresult']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['tshresult'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบผลการตรวจ TSH [ผลการตรวจระดับ TSH บันทึกเป็นค่า (จุดทศนิยม 1 ตำแหน่ง)]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>18</td>
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


