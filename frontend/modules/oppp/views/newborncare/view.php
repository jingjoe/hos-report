
<?php
$this->title = Yii::t('app', 'ตรวจสอบแฟ้ม newborncare รายบุคคล');

use yii\helpers\Html;

?>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li> <?= Html::a('ตรวจสอบ 43 แฟ้ม', ['oppp/index']) ?></li>
    <li> <?= Html::a('ตรวจสอบแฟ้ม newborncare', ['newborncare/index']) ?></li>
    <li>ตรวจสอบแฟ้ม newborncare รายบุคคล</li>
</ol>

<?php foreach ($data_view as $chk) { ?>
<?php } ?>   

<div class="alert alert-success alert-dismissible">
    <h3 class="box-title"> 
        ชื่อ-นามสกุล : <font color="#F7FE2E"><?php echo $chk['full_name']; ?></font> &nbsp; &nbsp;  
        PID : <font color="#F7FE2E"><?php echo $chk['pid']; ?></font> &nbsp; &nbsp; 
        วันดูแลลูก : <font color="#F7FE2E"><?php echo $chk['bcare']; ?></font></h3>
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
                        <th scope="row"><code>SEQ [ลำดับที่]</code></th>
                        <td><?php echo $chk['seq']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['seq'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบลำดับที่ SEQ [ลำดับที่ของการบริการที่กำหนดโดยโปรแกรมเรียงลำดับโดยไม่ซ้ำกัน สำหรับการมารับ บริการแต่ละครั้ง (visit) หมายเหตุ : ในกรณีที่มารับบริการ (visit) หลายคลินิคใน 1 ครั้งให้มีลำดับการให้บริการ]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <th scope="row"><code>BDATE [วันที่คลอด]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['bdate']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['bdate'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบวันที่คลอด [วันเดือนปีที่คลอด กำหนดเป็น ค.ศ.(YYYYMMDD)]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <th scope="row"><code>BCARE [วันที่ดูแลลูก]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['bcare']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['bcare'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบวันที่ดูแลลูก [วันเดือนปีที่ลูกได้รับการดูแล กำหนดเป็น ค.ศ.(YYYYMMDD)หมายเหตุ : กรณีที่บันทีกข้อมูลย้อนหลัง ให้เปลี่ยนวันกลับเป็นวันที่รับบริการจริง]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <th scope="row"><code>BCPLACE [รหัสสถานพยาบาลที่ดูแลลูก]</code></th>
                        <td><?php echo $chk['bcplace']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['bcplace'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบรหัสสถานพยาบาลที่ดูแลลูก 5 หลัก [รหัสสถานพยาบาลที่ให้บริการ ตามรหัสมาตรฐาน สนย.]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>     
                    <tr>
                        <td>10</td>
                        <th scope="row"><code>BCARERESULT [ผลการตรวจทารกหลังคลอด]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['bcareresult']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['bcareresult'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบผลการตรวจทารกหลังคลอด [1=ปกติ, 2=ผิดปกติ, 9 = ไม่ทราบ]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <th scope="row"><code>FOOD [อาหารที่รับประทาน]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['food']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['food'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบอาหารที่รับประทาน[1 = นมแม่อย่างเดียว, 2 = นมแม่และน้ำ, 3 = นมแม่และนมผสม,4 = นมผสมอย่างเดียว]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?>      
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>17</td>
                        <th scope="row"><code>PROVIDER [เลขที่ผู้ให้บริการ]</code></th>
                        <td><?php echo $chk['provider']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['provider'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบเลขที่ผู้ให้บริการ [เลขที่ผู้ให้บริการ ออกโดยโปรแกรม ไม่ซ้ำกันในสถานพยาบาลเดียวกัน]';
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


