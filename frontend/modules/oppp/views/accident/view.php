
<?php
$this->title = Yii::t('app', 'ตรวจสอบแฟ้ม accident รายบุคคล');

use yii\helpers\Html;

?>

<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li> <?= Html::a('ตรวจสอบ 43 แฟ้ม', ['oppp/index']) ?></li>
    <li> <?= Html::a('ตรวจสอบแฟ้ม accident', ['accident/index']) ?></li>
    <li>ตรวจสอบแฟ้ม accident รายบุคคล</li>
</ol>
<?php foreach ($data_view as $chk) { ?>
<?php } ?>   

<div class="alert alert-success alert-dismissible">
    <h3 class="box-title"> 
        ชื่อ-นามสกุล : <font color="#F7FE2E"><?php echo $chk['full_name']; ?></font> &nbsp; &nbsp;  
        HN : <font color="#F7FE2E"><?php echo $chk['hn']; ?></font> &nbsp; &nbsp; 
        วัน/เวลารับบริการ : <font color="#F7FE2E"><?php echo $chk['enter_er_time']; ?></font></h3>
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
                        <th scope="row"><code>DATETIME_SERV [วันที่และเวลามารับบริการ]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['datetime_serv']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['datetime_serv'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบวันที่และเวลามารับบริการ [วันเดือนปีที่มารับบริการ กำหนดเป็น ค.ศ.(YYYYMMDDHHMMSS)]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <th scope="row"><code>DATETIME_AE [วันที่และเวลาเกิดอุบัติเหตุ]</code></th>
                        <td><?php echo $chk['datetime_ae']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['datetime_ae'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบวันที่และเวลาเกิดอุบัติเหตุ [วันเดือนปีที่เกิดอุบัติเหตุ/ฉุกเฉิน กำหนดเป็น ค.ศ.(YYYYMMDDHHMMSS)]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <th scope="row"><code>AETYPE [ประเภทผู้ป่วยอุบัติเหตุ]</code></th>
                        <td><?php echo $chk['aetype']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['aetype'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบประเภทผู้ป่วยอุบัติเหตุ [รหัสสาเหตุ 19 สาเหตุ ตามมาตรฐานอ้างอิงตามสำนักระบาดวิทยา]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <th scope="row"><code>AEPLACE [สถานที่เกิดอุบัติเหตุ]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['aeplace']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['aeplace'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบสถานที่เกิดอุบัติเหตุ [01 = ที่บ้าน หรืออาคารที่พัก, 02 = ในสถานที่ทำงาน ยกเว้นโรงงานหรือก่อสร้าง, 03= ในโรงงานอุตสาหกรรม หรือบริเวณก่อสร้าง, 04 = ภายในอาคารอื่นๆ, 05= ในสถานที่สาธารณะ, 06 = ในชุมชน และไร่นา, 07 = บนถนนสายหลัก, 08 = บนถนนสายรอง, 09 = ในแม่น้ำ ลำคลอง หนองน้ำ, 10= ในทะเล, 11 = ในป่า/ภูเขา, 98 = อื่นๆ, 99= ไม่ทราบ]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <th scope="row"><code>TYPEIN_AE [ประเภทการมารับบริการกรณีอุบัติเหตุฉุกเฉิน]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['typein_ae']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['typein_ae'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบประเภทการมารับบริการกรณีอุบัติเหตุฉุกเฉิน [1 = มารับบริการเอง, 2 = ได้รับการส่งตัวโดย First responder , 3 = ได้รับการส่งตัวโดย BLS, 4 = ได้รับการส่งตัวโดย ILS ,5 = ได้รับการส่งตัวโดย ALS, 6 = ได้รับการส่งต่อจากสถานพยาบาลอื่น, 7 = อื่น ๆ ,9=ไม่ทราบ]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <th scope="row"><code>TRAFFIC [ประเภทผู้บาดเจ็บ (อุบัติเหตุจราจร)]</code></th>
                        <td><?php echo $chk['traffic']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['traffic'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบประเภทผู้บาดเจ็บ (อุบัติเหตุจราจร) [1= ผู้ขับขี่, 2= ผู้โดยสาร, 3= คนเดินเท้า, 8= อื่นๆ, 9= ไม่ทราบ]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <th scope="row"><code>VEHICLE [ประเภทยานพาหนะที่เกิดเหตุ]</code></th>
                        <td><?php echo $chk['vehicle']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['vehicle'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบประเภทยานพาหนะที่เกิดเหตุ [01= จักรยานและสามล้อถึบ, 02= จักรยานยนต์, 03= สามล้อเครื่อง, 04= รถยนต์นั่ง/แท็กซี่, 05= รถปิกอัพ,  06= รถตู้, 07= รถโดยสารสองแถว, 08= รถโดยสารใหญ่ (รถบัส รถเมล์), 09= รถบรรทุก/รถพ่วง, 10= เรือโดยสาร 11= เรืออื่นๆ, 12= อากาศยาน, 98= อื่นๆ 99= ไม่ทราบ ]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <th scope="row"><code>ALCOHOL [การดื่มแอลกอฮอลล์]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['alcohol']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['alcohol'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบการดื่มแอลกอฮอลล์ [1= ดื่ม, 2= ไม่ดื่ม, 9= ไม่ทราบ]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?>      
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <th scope="row"><code>NACROTIC_DRUG [การใช้ยาสารเสพติดขณะเกิดอุบัติเหตุ]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['nacrotic_drug']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['nacrotic_drug'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบการใช้ยาสารเสพติดขณะเกิดอุบัติเหตุ [1= ใช้, 2= ไม่ใช้, 9= ไม่ทราบ]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <th scope="row"><code>BELT [การคาดเข็มขัดนิรภัย]</code></th>
                        <td><?php echo $chk['belt']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['belt'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบการคาดเข็มขัดนิรภัย [1= คาด, 2= ไม่คาด, 9= ไม่ทราบ]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>14</td>
                        <th scope="row"><code>HELMET [การสวมหมวกนิรภัย]</code></th>
                        <td><?php echo $chk['helmet']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['helmet'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'การสวมหมวกนิรภัย [1= สวม, 2= ไม่สวม, 9= ไม่ทราบ]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>15</td>
                        <th scope="row"><code>AIRWAY [การดูแลการหายใจ]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['airway']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['airway'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบการดูแลการหายใจ [1= มีการดูแลการหายใจก่อนมาถึง, 2= ไม่มีการดูแลการหายใจก่อนมาถึง     3= ไม่จำเป็น]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>16</td>
                        <th scope="row"><code>STOPBLEED [การห้ามเลือด]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['stopbleed']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['stopbleed'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบการห้ามเลือด [1= มีการห้ามเลือดก่อนมาถึง, 2= ไม่มีการห้ามเลือดก่อนมาถึง , 3= ไม่จำเป็น]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>17</td>
                        <th scope="row"><code>SPLINT [การใส่ splint / slab]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['splint']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['splint'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบการใส่ splint / slab [1= มีการใส่ splint/slab ก่อนมาถึง, 2= ไม่มีการใส่ splint/slabก่อนมาถึง , 3= ไม่จำเป็น]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>18</td>
                        <th scope="row"><code>FLUID [การให้น้ำเกลือ]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['fluid']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['fluid'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบการให้น้ำเกลือ [1= มีการให้ IV fluid ก่อนมาถึง, 2= ไม่มีการให้ IV fluid ก่อนมาถึง , 3= ไม่จำเป็น]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>19</td>
                        <th scope="row"><code>URGENCY [ระดับความเร่งด่วน]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['urgency']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['urgency'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบระดับความเร่งด่วน [ระดับความเร่งด่วน 5 ระดับ (1= life threatening, 2= emergency, 3= urgent, 4= acute, 5= non acute, 6 = ไม่แน่ใจ) ]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>20</td>
                        <th scope="row"><code>COMA_EYE [ระดับความรู้สึกทางด้านตา]</code></th>
                        <td><?php echo $chk['coma_eye']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['coma_eye'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบระดับความรู้สึกตัววัดจากการตอบสนองของตา';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>21</td>
                        <th scope="row"><code>COMA_SPEAK [ระดับความรู้สึกทางด้านการพูด]</code></th>
                        <td><?php echo $chk['coma_speak']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['coma_speak'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบระดับความรู้สึกตัววัดจากการตอบสนองของการพูด';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>22</td>
                        <th scope="row"><code>COMA_MOVEMENT [ระดับความรู้สึกทางด้านการเคลื่อนไหว]</code></th>
                        <td><?php echo $chk['coma_movement']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['coma_movement'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบระดับความรู้สึกตัววัดจากการตอบสนองของการเคลื่อนไหว';
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


