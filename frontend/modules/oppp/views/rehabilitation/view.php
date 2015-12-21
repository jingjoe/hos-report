
<?php
$this->title = Yii::t('app', 'ตรวจสอบแฟ้ม rehabilitation รายบุคคล');

use yii\helpers\Html;

?>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li> <?= Html::a('ตรวจสอบ 43 แฟ้ม', ['oppp/index']) ?></li>
    <li> <?= Html::a('ตรวจสอบแฟ้ม rehabilitation', ['rehabilitation/index']) ?></li>
    <li>ตรวจสอบแฟ้ม rehabilitation รายบุคคล</li>
</ol>


<?php foreach ($data_view as $chk) { ?>
<?php } ?>   

<div class="alert alert-success alert-dismissible">
    <h3 class="box-title"> 
        ชื่อ-นามสกุล : <font color="#F7FE2E"><?php echo $chk['full_name']; ?></font> &nbsp; &nbsp;  
        CID : <font color="#F7FE2E"><?php echo $chk['pid']; ?></font> &nbsp; &nbsp; 
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
                        <th scope="row"><code>AN [เลขที่ผู้ป่วยใน]</code></th>
                        <td><?php echo $chk['an']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['an'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบเลขที่ผู้ป่วยใน AN [เลขที่ผู้ป่วยใน (AN) กรณีเป็นผู้ป่วยใน]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <th scope="row"><code>DATE_ADMIT [วันที่รับผู้ป่วยไว้ในโรงพยาบาล]</code></th>
                        <td><?php echo $chk['date_admit']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['date_admit'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบวันเดือนปีที่มารับผู้ป่วยไว้ในโรงพยาบาล [วันเดือนปีที่มารับผู้ป่วยไว้ในโรงพยาบาล กำหนดเป็น ค.ศ.(YYYYMMDDHHMMSS)กรณีเป็นผู้ป่วยในให้ใช้วันที่ DATE_SERV ใน SERVICE หมายเหตุ : กรณีที่บันทีกข้อมูลย้อนหลัง ให้เปลี่ยนวันกลับเป็นวันที่รับบริการจริง]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                          <tr>
                        <td>6</td>
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
                        <td>7</td>
                        <th scope="row"><code>DATE_START [วันที่เริ่มรับบริการฟื้นฟูผู้ป่วยใน]</code></th>
                        <td><?php echo $chk['date_start']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['date_start'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบวันที่เริ่มรับบริการฟื้นฟูผู้ป่วยใน[วันเดือนปีที่เริ่มรับบริการฟื้นฟูสภาพ กรณีให้บริการต่อเนื่องแผนกผู้ป่วยในหมายเหตุ : กรณีที่บันทีกข้อมูลย้อนหลัง ให้เปลี่ยนวันกลับเป็นวันที่รับบริการจริง]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <th scope="row"><code>DATE_FINISH [วันที่สิ้นสุดบริการฟื้นฟู ผู้ป่วยใน]</code></th>
                        <td><?php echo $chk['date_finish']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['date_finish'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบวันที่สิ้นสุดบริการฟื้นฟู ผู้ป่วยใน [วันเดือนปีที่สิ้นสุดบริการฟื้นฟูสภาพ กรณีให้บริการต่อเนื่องแผนกผู้ป่วยใน]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <th scope="row"><code>REHABCODE [รหัสบริการฟื้นฟูสมรรถภาพ]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['rehabocde']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['rehabocde'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบรหัสบริการฟื้นฟูสมรรถภาพ[รหัสบริการฟื้นฟูสภาพที่ได้รับ]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <th scope="row"><code>AT_DEVICE [รหัสกายอุปกรณ์ที่ได้รับ]</code></th>
                        <td><?php echo $chk['at_device']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['at_device'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบจำนวนกายอุปกรณ์ที่ได้รับ [รหัสกายอุปกรณ์เครื่องช่วยคนพิการที่ได้รับ]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <th scope="row"><code>AT_NO [จำนวนกายอุปกรณ์ที่ได้รับ]</code></th>
                        <td><?php echo $chk['at_no']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['at_no'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบจำนวนกายอุปกรณ์ที่ได้รับ [จำนวนกายอุปกรณ์ที่ได้รับ (ชิ้น)]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <th scope="row"><code>REHABPLACE [สถานที่รับบริการ]</code></th>
                        <td><?php echo $chk['rehabplace']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['rehabplace'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบสถานที่รับบริการ [รหัสสถานพยาบาลที่ให้บริการ ตามรหัสมาตรฐาน สนย.]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>13</td>
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


