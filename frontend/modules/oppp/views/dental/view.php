
<?php
$this->title = Yii::t('app', 'ตรวจสอบแฟ้ม dental รายบุคคล');

use yii\helpers\Html;
?>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li> <?= Html::a('ตรวจสอบ 43 แฟ้ม', ['oppp/index']) ?></li>
    <li> <?= Html::a('ตรวจสอบแฟ้ม dental', ['dental/index']) ?></li>
    <li>ตรวจสอบแฟ้ม dental รายบุคคล</li>
</ol>

<?php foreach ($data_view as $chk) { ?>
<?php } ?>   

<div class="alert alert-success alert-dismissible">
    <h3 class="box-title"> 
        ชื่อ-นามสกุล : <font color="#F7FE2E"><?php echo $chk['full_name']; ?></font> &nbsp; &nbsp;  
        HN : <font color="#F7FE2E"><?php echo $chk['hn']; ?></font> &nbsp; &nbsp; 
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
                        <th scope="row"><code>DATE_SERV [วันที่ให้บริการ]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['date_serv']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['date_serv'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบวันที่ให้บริการ [วันเดือนปีที่มารับบริการ กำหนดเป็น ค.ศ.(YYYYMMDD)]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <th scope="row"><code>DENTTYPE [ประเภทผู้ได้รับบริการตรวจสภาวะทันตสุขภาพ]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['denttype']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['denttype'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบประเภทผู้ได้รับบริการตรวจสภาวะทันตสุขภาพ [1 = กลุ่มหญิงตั้งครรถ์, 2 = กลุ่มเด็กก่อนวัยเรียน, 3 = กลุ่มเด็กวัยเรียน, 4 = กลุ่มผู้สูงอายุ, 5 = กลุ่มอื่นๆ (นอกเหนือจาก 4 กลุ่มแรก)]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <th scope="row"><code>SERVPLACE [บริการใน-นอกสถานบริการ]<font color="#04B404">*ใส่ข้อมูล</font></code></th>
                        <td><?php echo $chk['servplace']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['servplace'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบบริการใน-นอกสถานบริการ [1 = ในสถานบริการ , 2 = นอกสถานบริการ]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <th scope="row"><code>PTEETH [จำนวนฟันแท้ที่มีอยู่ (ซี่)]</code></th>
                        <td><?php echo $chk['pteeth']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['pteeth'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบจำนวนฟันแท้ที่มีอยู่ (ซี่)';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <th scope="row"><code>PCARIES [จำนวนฟันแท้ผุที่ไม่ได้อุด (ซี่)]</code></th>
                        <td><?php echo $chk['pcaries']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['pcaries'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบจำนวนฟันแท้ผุที่ไม่ได้อุด (ซี่)';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <th scope="row"><code>PFILLING [จำนวนฟันแท้ที่ได้รับการอุด (ซี่)]</code></th>
                        <td><?php echo $chk['pfilling']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['pfilling'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบจำนวนฟันแท้ที่ได้รับการอุด (ซี่)';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <th scope="row"><code>PEXTRACT [จำนวนฟันแท้ที่ถอนหรือหลุด (ซี่)]</code></th>
                        <td><?php echo $chk['pextract']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['pextract'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบจำนวนฟันแท้ที่ถอนหรือหลุด (ซี่)';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <th scope="row"><code>DTEETH [จำนวนฟันน้ำนมที่มีอยู่ (ซี่)]</code></th>
                        <td><?php echo $chk['dteeth']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['dteeth'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบจำนวนฟันน้ำนมที่มีอยู่ (ซี่)';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <th scope="row"><code>DCARIES [จำนวนฟันน้ำนมผุที่ไม่ได้อุด (ซี่)]</code></th>
                        <td><?php echo $chk['dcaries']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['dcaries'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบจำนวนฟันน้ำนมผุที่ไม่ได้อุด (ซี่)';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <th scope="row"><code>DFILLING [จำนวนฟันน้ำนมที่ได้รับการอุด (ซี่)]</code></th>
                        <td><?php echo $chk['dfilling']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['dfilling'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบจำนวนฟันน้ำนมที่ได้รับการอุด (ซี่';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>14</td>
                        <th scope="row"><code>DEXTRACT [จำนวนฟันน้ำนมที่ถอนหรือหลุด (ซี่)]</code></th>
                        <td><?php echo $chk['dextract']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['dextract'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบจำนวนฟันน้ำนมที่ถอนหรือหลุด (ซี่)';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>15</td>
                        <th scope="row"><code>NEED_FLUORIDE [จำเป็นต้องทา/เคลือบฟลูออไรด์]</code></th>
                        <td><?php echo $chk['need_fluoride']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['need_fluoride'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบจำเป็นต้องทา/เคลือบฟลูออไรด์ [1 = ต้องทา/เคลือบฟูลออไรด์, 2 = ไม่ต้องทา/เคลือบฟูลออไรด์]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>16</td>
                        <th scope="row"><code>NEED_SCALING [จำเป็นต้องขูดหินน้ำลาย]</code></th>
                        <td><?php echo $chk['need_scaling']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['need_scaling'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบจำเป็นต้องขูดหินน้ำลาย [1 = ต้องขูดหินน้ำลาย, 2 = ไม่ต้องขูดหินน้ำลาย]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>17</td>
                        <th scope="row"><code>NEED_SEALANT [จำนวนฟันที่ต้องเคลือบหลุมร่องฟัน]</code></th>
                        <td><?php echo $chk['need_sealant']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['need_sealant'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบจำนวนฟันแท้ที่ต้องได้รับการเคลือบหลุมร่องฟัน (ซี่)';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>18</td>
                        <th scope="row"><code>NEED_PFILLING [จำนวนฟันแท้ที่ต้องอุด]</code></th>
                        <td><?php echo $chk['need_pfilling']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['need_pfilling'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบจำนวนฟันแท้ที่ต้องได้รับการรักษาโดยการอุดฟัน (ซี่)';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?>      
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>19</td>
                        <th scope="row"><code>NEED_DFILLING [จำนวนฟันน้ำนมที่ต้องอุด]</code></th>
                        <td><?php echo $chk['need_dfilling']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['need_dfilling'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบจำนวนฟันน้ำนมที่ต้องได้รับการรักษาโดยการอุดฟัน (ซี่)';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>20</td>
                        <th scope="row"><code>NEED_PEXTRACT [จำนวนฟันแท้ที่ต้องถอน/รักษาคลองรากฟัน]</code></th>
                        <td><?php echo $chk['need_pextract']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['need_pextract'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบจำนวนฟันแท้ที่ต้องได้รับการรักษาโดยการถอนฟัน หรือรักษาคลองรากฟัน (ซี่)';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>21</td>
                        <th scope="row"><code>NEED_DEXTRACT [จำนวนฟันน้ำนมที่ต้องถอน/รักษาคลองรากฟัน]</code></th>
                        <td><?php echo $chk['need_dextract']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['need_dextract'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบจำนวนฟันน้ำนมที่ต้องได้รับการรักษาโดยการถอนฟัน หรือรักษาคลองรากฟัน (ซี่)';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>22</td>
                        <th scope="row"><code>NPROSTHESIS [จำเป็นต้องใส่ฟันเทียม]</code></th>
                        <td><?php echo $chk['nprosthesis']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['nprosthesis'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบจำเป็นต้องใส่ฟันเทียม] [1 = ต้องใส่ฟันเทียมบนและล่าง, 2 = ต้องใส่ฟันเทียมบน, 3 =ต้องใส่ฟันเทียมล่าง, 4 =ไม่ต้องใส่ฟันเทียม]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>23</td>
                        <th scope="row"><code>PERMANENT_PERMANENT [จำนวนคู่สบฟันแท้กับฟันแท้]</code></th>
                        <td><?php echo $chk['permanent_permanent']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['permanent_permanent'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบจำนวนคู่สบฟันแท้กับฟันแท้';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>24</td>
                        <th scope="row"><code>PERMANENT_PROSTHESIS [จำนวนคู่สบฟันแท้กับฟันเทียม]</code></th>
                        <td><?php echo $chk['permanent_prosthesis']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['permanent_prosthesis'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบจำนวนคู่สบฟันแท้กับฟันเทียม   เฉพาะในกลุ่มที่มีอายุ ³ 60 ปี (ซี่)';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>25</td>
                        <th scope="row"><code>PROSTHESIS_PROSTHESIS [จำนวนคู่สบฟันเทียมกับฟันเทียม]</code></th>
                        <td><?php echo $chk['prosthesis_prosthesis']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['prosthesis_prosthesis'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบจำนวนคู่สบฟันเทียมกับฟันเทียม   เฉพาะในกลุ่มที่มีอายุ ³ 60 ปี (ซี่)';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>26</td>
                        <th scope="row"><code>GUM [สภาวะปริทันต์]</code></th>
                        <td><?php echo $chk['gum']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['gum'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบสภาวะปริทันต์ [ใช้รหัส CPI ของสำนักทันตสาธารณสุข กรมอนามัย 0 = ปกติ, 1 = มีเลือดออกภายหลังจากการตรวจด้วยเครื่องมือตรวจปริทันต์, 2 = มีหินน้ำลาย แต่ยังเห็นแถบดำบนเครื่องมือ, 3 = มีร่องลึกปริทันต์ 4–5 ม.ม. (ขอบเหงือกอยู่ภายในแถบดำ), 4 = มีร่องลึกปริทันต์ 6 ม.ม.หรือมากกว่า (มองไม่เห็นแถบดำบนเครื่องมือ), 5 = มีหินน้ำลายและมีเลือดออกภายหลังการจากตรวจด้วยเครื่องมือตรวจปริทันต์, 9 = ตรวจไม่ได้/ไม่ตรวจ
หลักที่ 1=ตำแหน่งฟันหลังบนด้านขวา, หลักที่ 2=ตำแหน่งฟันหน้าบน ,หลักที่ 3=ตำแหน่งฟันหลังบนด้านซ้าย, หลักที่ 4=ตำแหน่งฟันหลังล่างด้านซ้าย, หลักที่ 5=ตำแหน่งฟันหน้าล่าง ,หลักที่ 6=ตำแหน่งฟันหลังล่างด้านขวา]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>27</td>
                        <th scope="row"><code>SCHOOLTYPE [สถานศึกษา]</code></th>
                        <td><?php echo $chk['schooltype']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['schooltype'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบสถานศึกษา [กรณีเป็นกลุ่มเด็กวัยเรียน ให้ระบุสังกัดของโรงเรียน 
1 = ศพด., 2 = ประถมศึกษารัฐบาล, 3 = ประถมศึกษาเทศบาล, 4 = ประถมศึกษาท้องถิ่น, 5 = ประถมศึกษาเอกชน, 6 = มัธยมศึกษารัฐบาล, 7 = มัธยมศึกษาเทศบาล, 8 = มัธยมศึกษาท้องถิ่น, 9 = มัธยมศึกษาเอกชน]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>28</td>
                        <th scope="row"><code>CLASS [ระดับการศึกษา]</code></th>
                        <td><?php echo $chk['class']; ?></td>
                        <td><font color="red"><?php
                            if ($chk['class'] == NULL) {
                                echo Html::img('@web/images/no.png'), ' ', 'ตรวจสอบระดับการศึกษา [กรณีเป็นกลุ่มเด็กวัยเรียน ให้ระบุชั้นที่เรียนอยู่ ศพด. มีชั้นที่ 1-3ประถมศึกษา มีชั้นที่ 1-6 มัธยมศึกษา มีชั้นที่ 1-6]';
                            } else {
                                echo Html::img('@web/images/yes.png');
                            }
                            ?> 
                            </fotn></td>
                    </tr>
                    <tr>
                        <td>29</td>
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
                        <td>30</td>
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

