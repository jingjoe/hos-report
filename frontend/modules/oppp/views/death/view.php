
<?php
$this->title = Yii::t('app', 'ตรวจสอบแฟ้ม death รายบุคคล');
use yii\helpers\Html;

?>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li> <?= Html::a('ตรวจสอบ 43 แฟ้ม', ['oppp/index']) ?></li>
    <li> <?= Html::a('ตรวจสอบแฟ้ม death', ['death/index']) ?></li>
     <li>ตรวจสอบแฟ้ม death รายบุคคล</li>
</ol>

<?php foreach ($data_view as $chk) { ?>
<?php } ?>   

<div class="alert alert-success alert-dismissible">
    <h3 class="box-title"> 
        ชื่อ-นามสกุล : <font color="#F7FE2E"><?php echo $chk['full_name']; ?></font> &nbsp; &nbsp;  
        HN : <font color="#F7FE2E"><?php echo $chk['hn']; ?></font> &nbsp; &nbsp; 
        วัน/เวลารับบริการ : <font color="#F7FE2E"><?php echo $chk['ddeath']; ?></font></h3>
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
                        <th scope="row"><code>HOSPDEATH [สถานบริการที่เสียชีวิต]</code></th>
                        <td><?php echo $chk['hospdeath']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['hospdeath'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบรหัสสถานพยาบาล[รหัสสถานพยาบาล ที่เป็นสถานที่เสียชีวิต กรณีเสียชีวิตในสถานพยาบาลกรณีไม่ทราบว่าตายในสถานพยาบาลใดให้บันทึก "00000"]';
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
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบAN [เลขที่ผู้ป่วยใน กรณีที่ผู้เสียชีวิต เป็นผู้ป่วยในของโรงพยาบาล]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <th scope="row"><code>SEQ [ลำดับที่]</code></th>
                        <td><?php echo $chk['seq']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['seq'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ลำดับที่ของการบริการที่กำหนดโดยโปรแกรมเรียงลำดับโดยไม่ซ้ำกัน สำหรับการมารับบริการแต่ละครั้ง (visit) โดยเป็นครั้งที่เสียชีวิต';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <th scope="row"><code>DDEATH [วันที่ตาย]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['ddeath']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['ddeath'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'วันเดือนปีที่ตาย กำหนดเป็น ค.ศ.(YYYYMMDD)';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>14</td>
                        <th scope="row"><code>CDEATH_A [รหัสโรคที่เป็นสาเหตุการตาย_A]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['cdeath_a']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['cdeath_a'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบการให้ICD-10TM [ตามหนังสือรับรองการตาย รหัส ICD - 10 - TM 6 หลัก(ไม่รวมจุด)]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>15</td>
                        <th scope="row"><code>CDEATH_B [รหัสโรคที่เป็นสาเหตุการตาย_B]</code></th>
                        <td><?php echo $chk['cdeath_b']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['cdeath_b'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบการให้ICD-10TM [ตามหนังสือรับรองการตาย รหัส ICD - 10 - TM 6 หลัก(ไม่รวมจุด)]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>16</td>
                        <th scope="row"><code>CDEATH_C [รหัสโรคที่เป็นสาเหตุการตาย_C]</code></th>
                        <td><?php echo $chk['cdeath_c']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['cdeath_c'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบการให้ICD-10TM [ตามหนังสือรับรองการตาย รหัส ICD - 10 - TM 6 หลัก(ไม่รวมจุด)]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>17</td>
                        <th scope="row"><code>CDEATH_D [รหัสโรคที่เป็นสาเหตุการตาย_D]</code></th>
                        <td><?php echo $chk['cdeath_d']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['cdeath_d'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบการให้ICD-10TM [ตามหนังสือรับรองการตาย รหัส ICD - 10 - TM 6 หลัก(ไม่รวมจุด)]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>18</td>
                        <th scope="row"><code>ODISEASE [รหัสโรคหรือภาวะอื่นที่เป็นเหตุ]</code></th>
                        <td><?php echo $chk['odisease']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['odisease'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบการให้ICD-10TM [ตามหนังสือรับรองการตาย รหัส ICD - 10 - TM 6 หลัก(ไม่รวมจุด)]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>19</td>
                        <th scope="row"><code>CDEATH [สาเหตุการตาย]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['cdeath']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['cdeath'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบสาเหตุการตาย [ตามหนังสือรับรองการตาย รหัส ICD - 10 - TM 6 หลัก(ไม่รวมจุด)หมายเหตุ : ไม่เป็นค่าว่างและอ้างอิงตามรหัส ICD10TM ยกเว้นรหัส S,T,Z เนื่องจากรหัส S,T เป็นการให้รหัสการบาดเจ็บและการเป็นพิษ ส่วนรหัส Z เป็นรหัสการให้บริการด้านสุขภาพ]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>20</td>
                        <th scope="row"><code>PREGDEATH [การตั้งครรภ์และการคลอด]</code></th>
                        <td><?php echo $chk['pregdeath']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['pregdeath'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบการตั้งครรภ์และการคลอด [1 = เสียชีวิตระหว่างตัง้ครรภ์, 2= เสียชีวิตระหว่างคลอดหรือหลังคลอดภายใน 42 วัน, 3= ไม่ตัง􀀒 ครรภ์ , 4 = ผู้ชาย ,9 = ไม่ทราบ (ตัด 3 4 9 ออก)หมายเหตุ : เฉพาะหญิงตัง้ครรภ์]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>21</td>
                        <th scope="row"><code>PDEEATH [สถานที่ตาย]</code></th>
                        <td><?php echo $chk['pdeath']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['pdeath'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบสถานที่ตาย[1=ในสถานพยาบาล, 2=นอกสถานพยาบาล]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>22</td>
                        <th scope="row"><code>PROVIDER [เลขที่ผู้ให้บริการ]</code></th>
                        <td><?php echo $chk['provider']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['provider'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบเลขที่ผู้ให้บริการ[เลขที่ผู้ให้บริการ ออกโดยโปรแกรม ไม่ซ้ำกันในสถานพยาบาลเดียวกัน]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>23</td>
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


