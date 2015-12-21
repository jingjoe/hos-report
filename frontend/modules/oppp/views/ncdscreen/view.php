
<?php
$this->title = Yii::t('app', 'ตรวจสอบแฟ้ม ncdscreen รายบุคคล');

use yii\helpers\Html;

?>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li> <?= Html::a('ตรวจสอบ 43 แฟ้ม', ['oppp/index']) ?></li>
    <li> <?= Html::a('ตรวจสอบแฟ้ม ncdscreen', ['ncdscreen/index']) ?></li>
    <li>ตรวจสอบแฟ้ม ncdscreen รายบุคคล</li>
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
                        <th scope="row"><code>DATE_SERV [วันที่ตรวจ]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['date_serv']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['date_serv'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบวันที่ตรวจ [วันเดือนปีที่ตรวจ กำหนดเป็น ค.ศ.(YYYYMMDD)หมายเหตุ : กรณีที่บันทีกข้อมูลย้อนหลัง ให้เปลี่ยนวันกลับเป็นวันที่รับบริการจริง]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <th scope="row"><code>SERVPLACE [บริการใน-นอกสถานบริการ]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['sprvplace']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['sprvplace'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบสถานที่ให้บริการ [1 = ในสถานบริการ , 2 = นอกสถานบริการ]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <th scope="row"><code>SMOKE [ประวัติสูบบุหรี่]</code></th>
                        <td><?php echo $chk['smoke']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['smoke'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบประวัติสูบบุหรี่ [1 = ไม่สูบ, 2 = สูบนานๆครั้ง , 3 = สูบเป็นครั้งคราว, 4 = สูบเป็นประจำ,9 = ไม่ทราบ]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <th scope="row"><code>ALCOHOL [ประวัติดื่มเครี่องดี่มแอลกอฮอลล์]</code></th>
                        <td><?php echo $chk['alcohol']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['alcohol'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบประวัติดื่มเครี่องดี่มแอลกอฮอลล์ [1 = ไม่ดี่ม, 2 = ดี่มนานๆครั้ง, 3 = ด􀀞ืมเป็นครั้งคราว, 4 = ดี่มเป็นประจำ,9 = ไม่ทราบ]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <th scope="row"><code>DMFAMILY [ประวัติเบาหวานในญาติสายตรง]</code></th>
                        <td><?php echo $chk['dmfamily']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['dmfamily'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบประวัติเบาหวานในญาติสายตรง [1 = มีประวัติเบาหวานในญาติสายตรง, 2 = ไม่มี, 9 = ไม่ทราบ]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <th scope="row"><code>HTFAMILY [ประวัติความดันสูงในญาติสายตรง]</code></th>
                        <td><?php echo $chk['htfamily']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['htfamily'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบประวัติความดันสูงในญาติสายตรง [1 = มีประวัติความดันโลหิตสูงในญาติสายตรง, 2 = ไม่มี, 9 = ไม่ทราบ]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <th scope="row"><code>WEIGHT [น้ำหนัก]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['weight']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['weight'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบน้ำหนัก [น้ำหนัก (กก.) จุดทศนิยม 1 ตำแหน่ง]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <th scope="row"><code>HEIGHT [ส่วนสูง]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['height']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['height'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบส่วนสูง [ส่วนสูง (ซม.)]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?>      
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <th scope="row"><code>WAIST_CM [เส้นรอบเอว (ซ.ม.)]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['waist_cm']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['waist_cm'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบเส้นรอบเอว [เส้นรอบเอว (ซ.ม.)]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <th scope="row"><code>SBP_1 [ความดันโลหิต ซิสโตลิก ครั้งที่1]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['sbp_1']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['sbp_1'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบความดันโลหิต ซิสโตลิก [ความดันโลหิตซิสโตลิก การวัดครั้งที่1 (มม.ปรอท)]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>14</td>
                        <th scope="row"><code>DBP_1 [ความดันโลหิต ไดแอสโตลิกครั้งที่1]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['dbp_1']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['dbp_1'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'การสอบความดันโลหิต ไดแอสโตลิก [ความดันโลหิตไดแอสโตลิก การวัดครั้งที่1 (มม.ปรอท)]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                        <tr>
                        <td>15</td>
                        <th scope="row"><code>SBP_2 [ความดันโลหิต ซิสโตลิก ครั้งที่2]</code></th>
                        <td><?php echo $chk['sbp_2']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['sbp_2'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบความดันโลหิต ซิสโตลิก [ความดันโลหิตซิสโตลิก การวัดครั้งที่2 (มม.ปรอท)]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>16</td>
                        <th scope="row"><code>DBP_2 [ความดันโลหิต ไดแอสโตลิกครั้งที่2]</code></th>
                        <td><?php echo $chk['dbp_2']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['dbp_2'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'การสอบความดันโลหิต ไดแอสโตลิก [ความดันโลหิตไดแอสโตลิก การวัดครั้งที่2 (มม.ปรอท)]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>17</td>
                        <th scope="row"><code>BSLEVEL [ระดับน้ำตาลในเลือด]</code></th>
                        <td><?php echo $chk['bslevel']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['bslevel'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบระดับน้ำตาลในเลือด [ผลการตรวจน้ำตาลในเลือด (มก./ดล.) จุดทศนิยม 2 หลัก]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>18</td>
                        <th scope="row"><code>BSTEST [วิธีการตรวจน้ำตาลในเลือด]</code></th>
                        <td><?php echo $chk['bstest']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['bstest'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบวิธีการตรวจน้ำตาลในเลือด [รหัสการตรวจทางห้องปฏิบัติการ 1 = ตรวจน้ำตาลในเลือด จากหลอดเลือดดำหลังอดอาหาร 
                                    2 = ตรวจน้ำตาลในเลือด จากหลอดเลือดดำ โดยไม่อดอาหาร 3 =ตรวจน้ำตาลในเลือด จากเส้นเลือดฝอย หลังอดอาหาร 4 = ตรวจน้ำตาลในเลือด จากเส้นเลือดฝอย โดยไม่อดอาหาร]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>19</td>
                        <th scope="row"><code>SCREENPLACE [สถานที่รับบริการคัดกรอง]</code></th>
                        <td><?php echo $chk['screenplace']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['screenplace'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบการใส่ splint / slab [รหัสสถานพยาบาลที่ให้บริการ ตามรหัสมาตรฐาน สนย.หมายเหตุ : ไม่เป็นค่าว่างและอ้างอิงรหัสสถานบริการ สนย.]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    
                    <tr>
                        <td>20</td>
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
                        <td>21</td>
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


