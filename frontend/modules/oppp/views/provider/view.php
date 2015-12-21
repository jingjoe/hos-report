
<?php
$this->title = Yii::t('app', 'ตรวจสอบแฟ้ม provider รายบุคคล');
use yii\helpers\Html;

?>

<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li> <?= Html::a('ตรวจสอบ 43 แฟ้ม', ['oppp/index']) ?></li>
    <li> <?= Html::a('ตรวจสอบแฟ้ม provider', ['provider/index']) ?></li>
    <li>ตรวจสอบแฟ้ม provider รายบุคคล</li>
</ol>

<?php foreach ($data_view as $chk) { ?>
<?php } ?>   

<div class="alert alert-success alert-dismissible">
    <h3 class="box-title"> 
        ชื่อ-นามสกุล : <font color="#F7FE2E"><?php echo $chk['doc_name']; ?></font> &nbsp; &nbsp;  
        เลขที่ผู้ให้บริการ : <font color="#F7FE2E"><?php echo $chk['provider']; ?></font> &nbsp; &nbsp; 
        วัน/เวลารับบริการ : <font color="#F7FE2E"><?php echo $chk['d_update']; ?></font></h3>
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
                        <th scope="row"><code>PROVIDER [เลขที่ผู้ให้บริการ]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['provider']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['provider'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบเลขที่ผู้ให้บริการของโปรแกรม [เลขที่ผู้ให้บริการ ออกโดยโปรแกรม ไม่ซ้ำ กันในสถานพยาบาลเดียวกัน]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <th scope="row"><code>REGISTERNO [หมายเลขทะเบียนวิชาชีพ]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['registerno']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['registerno'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบเลขใบประกอบวิชาชีพ[หมายเลขทะเบียนที่ออกให้โดยสภาวิชาชีพ';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <th scope="row"><code>COUNCIL [รหัสสภาวิชาชีพ]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['council']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['council'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบเลขสภาวิชาชีพ[หมายเลขทะเบียนที่ออกให้โดยสภาวิชาชีพ (01=แพทยสภา,02=สภาการพยาบาล,03=สภาเภสัชกรรม,04=ทันตแพทยสภา,05=สภากายภาพบำบัด,06=สภาเทคนิคการแพทย์,07=สัตวแพทยสภา)';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <th scope="row"><code>CID [เลขที่บัตรประชาชน]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['cid']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['cid'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบเลขประจำตัวประชาชน [เลขประจำตัวประชาชน ตามกรมการปกครองกำหนดเป็นรหัสประจำตัวบุคคล]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <th scope="row"><code>PNAME [คำนำหน้า]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['pname']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['pname'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบคำนำหน้าชื่อ[คำนำหน้าชื่อ มาตรฐานตามกรมการปกครอง';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>7-8</td>
                        <th scope="row"><code>NAME-LNAME [ชื่อ-นามสกุล]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['doc_name']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['doc_name'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบชื่อ-นามสกุล';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <th scope="row"><code>SEX [เพศ]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['sex']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['sex'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบเพศ 1 = ชาย , 2 = หญิง';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <th scope="row"><code>BIRTH [วันเกิด]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['birth']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['birth'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบวันเดือนปีเกิด(วันเดือนปีเกิด กำหนดเป็น ค.ศ. (YYYYMMDD) (หากไม่ทราบวันเดือนที่เกิด แต่ทราบ ค.ศ เกิด ให้กำหนดวันเกิดเป็นวันที่ 1 มกราคมของปี ค.ศ.นั้นๆ)]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <th scope="row"><code>PROVIDERTYPE [รหัสประเภทบุคลากร]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['providertype']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['providertype'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบรหัสประเภทบุคลากร [รหัสประเภทบุคลากร
                                01= แพทย์, 02= ทันตแพทย์,
                                03= พยาบาลวิชาชีพ (ที่ทำหน้าที่ตรวจรักษา),
                                04= เจ้าพนักงานสาธารณสุขชุมชน, 05= นักวิชาการสาธารณสุข,
                                06=เจ้าพนักงานทันตสาธารณสุข, 07= อสม. (ผู้ให้บริการในชุมชน),
                                08= บุคลากรแพทย์แผนไทย แพทย์พืน􀀒 บ้าน แพทย์ทางเลือก (ที่มีวุฒิการศกึ ษาหรือผ่าน
                                การอบรมตามเกณฑ์), 09= อื􀀦นๆ ]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <th scope="row"><code>STARTDATE [วันที่เริ่มปฏิบัติงาน]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['startdate']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['startdate'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบวันที่เริ่มปฏิบัติงาน [วันที่เริ่มปฏิบัติงานที่สถานพยาบาลนี้]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?>      
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <th scope="row"><code>OUTDATE [วันที่สิ้นสุดการปฏิบัติงาน]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['outdate']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['outdate'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบวันที่สิ้นสุดการปฏิบัติงาน [วันที่สิ้นสุดการปฏิบัติงานที่สถานพยาบาลนี';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>14</td>
                        <th scope="row"><code>MOVEFROM [รหัสสถานพยาบาลที่ย้ายมา]</code></th>
                        <td><?php echo $chk['movefrom']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['movefrom'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบรหัสสถานพยาบาลที่ย้ายมา [รหัสสถานพยาบาลที่ย้ายมา ตามมาตรฐานสำนักนโยบายและยุทธศาสตร์]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>15</td>
                        <th scope="row"><code>MOVETO [รหัสสถานพยาบาลที่ย้ายไป]</code></th>
                        <td><?php echo $chk['moveto']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['moveto'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบรหัสสถานพยาบาลที่ย้ายไป [รหัสสถานพยาบาลที่ย้ายไป ตามมาตรฐานสำนักนโยบายและยุทธศาสตร์]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>16</td>
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


