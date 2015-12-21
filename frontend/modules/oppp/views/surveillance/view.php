
<?php
$this->title = Yii::t('app', 'ตรวจสอบแฟ้ม surveillance รายบุคคล');

use yii\helpers\Html;

?>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li> <?= Html::a('ตรวจสอบ 43 แฟ้ม', ['oppp/index']) ?></li>
    <li> <?= Html::a('ตรวจสอบแฟ้ม surveillance', ['surveillance/index']) ?></li>
    <li>ตรวจสอบแฟ้ม surveillance รายบุคคล</li>
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
                        <th scope="row"><code>DATE_SERV [วันที่และเวลามารับบริการ]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['date_serv']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['date_serv'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบวันที่และเวลามารับบริการ [วันเดือนปีที่มารับบริการ กำหนดเป็น ค.ศ.(YYYYMMDDHHMMSS)]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <th scope="row"><code>DATETIME_AE [เลขที่ผู้ป่วยใน (AN)]</code></th>
                        <td><?php echo $chk['an']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['an'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบเลขที่ผู้ป่วยใน (AN) [เลขที่ผู้ป่ วยใน (AN) กรณีเป็นผู้ป่วยในหมายเหตุ : บันทึกเฉพาะกรณีที่นอนโรงพยาบาลเท่านั้น]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <th scope="row"><code>DATETIME_ADMIT [วันที่และเวลารับผู้ป่วยไว้ในโรงพยาบาล]</code></th>
                        <td><?php echo $chk['datetime_admit']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['datetime_admit'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบวันที่ Admit [วันเดือนปีและเวลาที่รับผู้ป่วยไว้ในโรงพยาบาล กำหนดเป็น ค.ศ.(YYYYMMDDHHMMSS)หมายเหตุ : บันทึกเฉพาะกรณีที่นอนโรงพยาบาลเท่านั]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <th scope="row"><code>SYNDROME [รหัสกลุ่มอาการที่เฝ้าระวัง]</code></th>
                        <td><?php echo $chk['syndrome']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['syndrome'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบรหัสกลุ่มอาการที่เฝ้าระวัง [รหัสกลุ่มอาการหรืออาการที่ต้องเฝ้ าระวัง (syndromic surveillance) สำหรับโรคติดต่อและโรคจากการประกอบอาชีพและสิ่งแวดล้อม]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <th scope="row"><code>DIAGCODE [รหัสการวินิจฉัยแรกรับ]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['diagcode']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['diagcode'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบรหัสการวินิจฉัยแรกรับ [รหัสโรค ICD - 10 - TM (โรคที่เฝ้าระวังทางระบาดวิทยา) เมื่อแรกรับ]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <th scope="row"><code>CODE506 [รหัส 506 แรกรับ]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['code506']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['code506'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบรหัส 506 แรกรับ [รหัสโรคที่ต้องเฝ้าระวังจากสำนักระบาดวิทยา เมื่อแรกรับ หมายเหตุ : อ้างอิงรหัสโรคที่ต้องเฝ้าระวังจากสำนักระบาดวิทยา]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <th scope="row"><code>DIAGCODELAST [รหัสการวินิจฉัยล่าสุด]</code></th>
                        <td><?php echo $chk['diagcodelast']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['diagcodelast'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบรหัสการวินิจฉัยล่าสุด [รหัสโรค ICD - 10 - TM (โรคทีเฝ้าระวังทางระบาดวิทยา) จากวินิจฉัยล่าสุด]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <th scope="row"><code>CODE506LAST [รหัส 506 ล่าสุด]</code></th>
                        <td><?php echo $chk['code506last']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['code506last'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบรหัส 506 ล่าสุด [รหัสโรคที่ต้องเฝ้าระวังจากสำนักระบาดวิทยา จากวินิจฉัยล่าสุด หมายเหตุ : อ้างอิงรหัสโรคที่ต้องเฝ้าระวังจากสำนักระบาดวิทยา]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?>      
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <th scope="row"><code>ILLDATE [วันที่เริ่มป่วย]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['illdate']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['illdate'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบวันที่เริ่มป่วย [วันเดือนปีที่เริ่มป่วย กำหนดเป็น ค.ศ.(YYYYMMDD)]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <th scope="row"><code>ILLHOUSE [บ้านเลขที]</code></th>
                        <td><?php echo $chk['illhouse']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['illhouse'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบบ้านเลขที [บ้านเลขที่และถนน หรือซอย หมายเหตุ : ขณะป่วย]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>14</td>
                        <th scope="row"><code>ILLVILLAGE [รหัสหมู่บ้าน]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['illvillage']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['illvillage'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบรหัสหมู่บ้านขณะป่วย [รหัสเลขหมู่ที่ เช่น 01 คือหมู่ที่ 1 เป็นต้น (ใช้ 99 แทนไม่ทราบ)หมายเหตุ : ขณะป่วย]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>15</td>
                        <th scope="row"><code>ILLTAMBON [รหัสตำบล]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['illtambon']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['illtambon'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบรหัสตำบล [รหัสตำบลตามกรมการปกครอง (ใช้ 99 แทนไม่ทราบ) ขณะป่วย]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>16</td>
                        <th scope="row"><code>ILLAMPUR [รหัสอำเภอ]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['illampur']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['illampur'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบรหัสอำเภอ [รหัสอำเภอตามกรมการปกครอง (ใช้ 99 แทนไม่ทราบ) ขณะป่วย]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>17</td>
                        <th scope="row"><code>ILLCHANGWAT [รหัสจังหวัด]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['illchangwat']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['illchangwat'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบรหัสจังหวัด [รหัสจังหวัดตามกรมการปกครอง (ใช้ 99 แทนไม่ทราบ) ขณะป่วย]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>18</td>
                        <th scope="row"><code>LATITUDE [พิกัดที่อยู่(ละติจูด)]</code></th>
                        <td><?php echo $chk['latitude']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['latitude'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบพิกัดที่อยู่(ละติจูด) [พิกัดละติจูดของที่อยู่ขณะป่ วย จุดทศนิยม 6 ตำแหน่ง]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>19</td>
                        <th scope="row"><code>LONGITUDE [พิกัดที่อยู่(ลองจิจูด)]</code></th>
                        <td><?php echo $chk['longitude']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['longitude'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบพิกัดที่อยู่(ลองจิจูด) [พิกัดลองจิจูดของที่อยู่ขณะป่วย จุดทศนิยม 6 ตำแหน่ง]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>20</td>
                        <th scope="row"><code>PTSTATUS [สภาพผู้ป่วย]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['ptstatus']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['ptstatus'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบสภาพผู้ป่วย [1 = หาย , 2 = ตาย , 3 = ยังรักษาอยู่ , 9 = ไม่ทราบ]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>21</td>
                        <th scope="row"><code>DATE_DEATH [วันที่ตาย]</code></th>
                        <td><?php echo $chk['date_death']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['date_death'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบวันที่ตาย [วันเดือนปีที่เสียชีวิต กำหนดเป็น ค.ศ.(YYYYMMDD)]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>22</td>
                        <th scope="row"><code>COMPLICATION [สาเหตุการป่วย]</code></th>
                        <td><?php echo $chk['complication']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['complication'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบสาเหตุการป่วย [รหัสแยกสาเหตุการป่วย ของกลุ่มโรคที่มีการแยกสาเหตุการป่วย เช่น อุบัติเหตุ ฯลฯ]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>23</td>
                        <th scope="row"><code>ORGANISM [ชนิดของเชื้อโรค]</code></th>
                        <td><?php echo $chk['organism']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['organism'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบชนิดของเชื้อโรค [รหัสชนิดของเชื้อโรค ของกลุ่มโรคที่ต้องการบ่งชี้ชนิดของเชื้อโรค เช่น บิด ฯลฯ]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>24</td>
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
                        <td>25</td>
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

