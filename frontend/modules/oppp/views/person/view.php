
<?php
$this->title = Yii::t('app', 'ตรวจสอบแฟ้ม person รายบุคคล');
use yii\helpers\Html;

?>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li> <?= Html::a('ตรวจสอบ 43 แฟ้ม', ['oppp/index']) ?></li>
    <li> <?= Html::a('ตรวจสอบแฟ้ม person และ patient', ['person/main']) ?></li>
     <li>ตรวจสอบแฟ้ม person รายบุคคล</li>
</ol>

<?php foreach ($data_view as $chk) { ?>
<?php } ?>   

<div class="alert alert-success alert-dismissible">
    <h3 class="box-title"> 
        ชื่อ-นามสกุล : <font color="#F7FE2E"><?php echo $chk['full_name']; ?></font> &nbsp; &nbsp;  
        เลข 13 หลัก : <font color="#F7FE2E"><?php echo $chk['cid']; ?></font> &nbsp; &nbsp; 
        วันรับบริการ : <font color="#F7FE2E"><?php echo $chk['vstdate']; ?></font></h3>
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
                       <th scope="row"><code>CID [เลขที่บัตรประชาชน]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['cid']; ?></td>
                        <td><font color="cid"><?php
                            if ($chk['pid'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบเลขประจำตัวประชาชน ตามกรมการปกครองกำหนดเป็นรหัสประจำตัวบุคคล';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>3</td>
                         <th scope="row"><code>PID [ทะเบียนบุคคล]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['pid']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['pid'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบทะเบียนบุคคล [ทะเบียนของบุคคลที่มาขึ้นทะเบียนในสถานบริการนั้นๆ ใช้สำหรับเชื่อมโยงหาตัวบุคคลในแฟ้มอื่น ๆ (สามารถกำหนดได้ตั้งแต่ 1-15 หลัก)(program generate)]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <th scope="row"><code>HID [รหัสบ้าน]</code></th>
                        <td><?php echo $chk['hid']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['hid'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบรหัสบ้าน [รหัสบ้านที่กำหนดโดยโปรแกรมจากแฟ้ม HOME และรหัสนี้จะซ้ำกันได้หากบุคคลอาศัยอยู่ในหลังคาเรือนเดียวกัน อ้างอิงเพื่อค้นหาบ้านในแฟ้ม HOME (หลังคาเรือนในเขตรับผิดชอบ) กรณีที่อาศัยในเขตรับผิดชอบ]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <th scope="row"><code>PRENAME [คำนำหน้า]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['prename']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['prename'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบคำนำหน้า [คำนำหน้าชื่อ อ้างอิงมาตรฐานตามกรมการปกครอง]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <th scope="row"><code>NAME [ชื่อ]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['name']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['name'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบชื่อ';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <th scope="row"><code>LNAME [นามสกุล]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['lname']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['lname'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบนามสกุล';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <th scope="row"><code>HN [เลขที่ผู้ป่วยนอก (HN)]</code></th>
                        <td><?php echo $chk['hn']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['hn'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบเลขที่ผู้ป่วยนอก (HN) [เลขทะเบียนการมารับบริการ(สามารถกำหนดได้ตั้งแต่ 1-15 หลัก) ในกรณีที่มีเลขทะเบียนที่ต่างไปจาก PID]';
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
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบเพศ [1 = ชาย , 2 = หญิง]';
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
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบวันเกิด [วันเดือนปีเกิด กำหนดเป็น ค.ศ. (YYYYMMDD) (หากไม่ทราบวัน เดือนที่เกิด แต่ทราบ ค.ศ เกิด ให้กำหนดวันเกิดเป็นวันที่ 1 มกราคมของปี ค.ศ.นั้นๆ)]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <th scope="row"><code>MSTATUS [สถานะสมรส]</code></th>
                        <td><?php echo $chk['mstatus']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['mstatus'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบสถานะสมรส [1 = โสด, 2 = คู่, 3 = ม่าย, 4 = หย่า, 5 = แยก, 6 = สมณะ,  9=ไม่ทราบ]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?>      
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <th scope="row"><code>OCCUPATION_NEW [อาชีพ(รหัสใหม่)]</code></th>
                        <td><?php echo $chk['occupation']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['occupation'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบอาชีพรหัสใหม่ [รหัสมาตรฐานสำนักนโยบายและยุทธศาสตร์]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>14</td>
                        <th scope="row"><code>RACE [เชื้อชาติ]</code></th>
                        <td><?php echo $chk['race']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['race'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบเชื้อชาติ [รหัสมาตรฐานตามกรมการปกครอง]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>15</td>
                        <th scope="row"><code>NATION [สัญชาติ]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['nation']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['nation'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'การสอบสัญชาติ [รหัสมาตรฐานตามกรมการปกครอง ถ้าไม่ทราบให้ระบุ 999 ตามรหัสมาตรฐาน]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>16</td>
                        <th scope="row"><code>RELIGION [ศาสนา]</code></th>
                        <td><?php echo $chk['religion']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['religion'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบศาสนา [รหัสมาตรฐานสำนักนโยบายและยุทธศาสตร์]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>17</td>
                        <th scope="row"><code>EDUCATION [ระดับการศึกษา]</code></th>
                        <td><?php echo $chk['education']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['education'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบระดับการศึกษา[รหัสมาตรฐานสำนักนโยบายและยุทธศาสตร์]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>18</td>
                        <th scope="row"><code>FSTATUS [สถานะในครอบครัว]</code></th>
                        <td><?php echo $chk['fstatus']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['fstatus'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบสถานะในครอบครัว [1 = เจ้าบ้าน  , 2 = ผู้อาศัย]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>19</td>
                        <th scope="row"><code>FATHER [รหัส CID บิดา]</code></th>
                        <td><?php echo $chk['father']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['father'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบรหัสบัตรประชาชนของบิดา';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>20</td>
                        <th scope="row"><code>MOTHER [รหัส CID มารดา]</code></th>
                        <td><?php echo $chk['mother']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['mother'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบรหัสบัตรประชาชนของมารดา';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>21</td>
                        <th scope="row"><code>COUPLE [รหัส CID คู่สมรส]</code></th>
                        <td><?php echo $chk['couple']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['couple'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบรหัสบัตรประชาชนของคู่สมรส';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>22</td>
                        <th scope="row"><code>VSTATUS [สถานะในชุมชน]</code></th>
                        <td><?php echo $chk['vstatus']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['vstatus'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', '1 = กำนัน ผู้ใหญ่บ้าน, 2 = อสม., 3 = แพทย์ประจำตำบล, 4 = สมาชิกอบต., 5 = อื่นๆ]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>23</td>
                        <th scope="row"><code>MOVEIN [วันที่ย้ายเข้ามาเขตพื้นที่รับผิดชอบ]</code></th>
                        <td><?php echo $chk['movein']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['movein'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบวันที่ย้ายเข้ามาเขตพื้นที่รับผิดชอบ [วันเดือนปีที่ย้ายเข้า ในเขตรับผิดชอบ กำหนดเป็น ค.ศ.(YYYYMMDD)]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                        <tr>
                        <td>24</td>
                        <th scope="row"><code>DISCHARGE [สถานะ/สาเหตุการจำหน่าย]</code></th>
                        <td><?php echo $chk['discharge']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['discharge'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบสถานะ/สาเหตุการจำหน่าย [1 = ตาย , 2 = ย้าย  , 3 = สาบสูญ ,9 =ไม่จำหน่าย]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>25</td>
                        <th scope="row"><code>DDISCHARGE [วันที่จำหน่าย]</code></th>
                        <td><?php echo $chk['ddischarge']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['ddischarge'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบวันที่จำหน่าย [วันเดือนปีที่จำหน่าย กำหนดเป็น ค.ศ. (YYYYMMDD)]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>26</td>
                        <th scope="row"><code>ABOGROUP [หมู่เลือด]</code></th>
                        <td><?php echo $chk['abogroup']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['abogroup'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบหมู่เลือด [1 = A , 2 = B , 3 = AB , 4 = O]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>27</td>
                        <th scope="row"><code>RHGROUP [หมู่เลือด RH]</code></th>
                        <td><?php echo $chk['rhgroup']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['rhgroup'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบหมู่เลือด RH [1 = positive , 2 = negative]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>28</td>
                        <th scope="row"><code>LABOR [รหัสความเป็นคนต่างด้าว]</code></th>
                        <td><?php echo $chk['labor']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['labor'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบรหัสความเป็นคนต่างด้าว [รหัสมาตรฐานสำนักนโยบายและยุทธศาสตร์]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>29</td>
                        <th scope="row"><code>PASSPORT [เลขที่ passport]</code></th>
                        <td><?php echo $chk['passport']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['passport'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบเลขที่ passport';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>30</td>
                        <th scope="row"><code>TYPEAREA [สถานะบุคคล]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['typearea']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['typearea'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบสถานะบุคคล[1=มีชื่ออยู่ตามทะเบียนบ้านในเขตรับผิดชอบและอยู่จริง ,2= มีชื่ออยู่ตามทะเบีบนบ้านในเขตรับผิดชอบแต่ตัวไม่อยู่จริง ,3= มาอาศัยอยู่ในเขตรับผิดชอบ(ตามทะเบียนบ้านในเขตรับผิดชอบ)แต่ทะเบียนบ้านอยู่นอกเขตรับผิดชอบ ,4= ที่อาศัยอยู่นอกเขตรับผิดชอบและทะเบียนบ้านไม่อยู่ในเขตรับผิดชอบ เข้ามารับบริการหรือเคยอยู่ในเขตรับผิดชอบ ,5=มาอาศัยในเขตรับผิดชอบแต่ไม่ได้อยู่ตามทะเบียนบ้านในเขตรับผิดชอบ เช่น คนเร่ร่อน ไม่มีที่พักอาศัย เป็นต้น]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>31</td>
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


