<?php
use yii\helpers\Html;
use yii\db\Query;


/* @var $this \yii\web\View */
/* @var $content string */
?>
<aside class="main-sidebar">
    <section class="sidebar">
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="ค้นหา.."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => '', 'options' => ['class' => 'header']],
                    ['label' => 'ตรวจสอบ 43/50 แฟ้ม', 'icon' => 'fa  fa-bar-chart-o', 'url' => ['/oppp/default']],
                    ['label' => 'ตรวจสอบ QOF 2559', 'icon' => 'fa fa-dashboard', 'url' => ['/qof/default']],
                    [
                        'label' => 'ระบบรายงาน HOSxP',
                        'icon' => 'fa fa-laptop',
                        'url' => '#',
                        'items' => [
                            ['label' => 'รายงานพื้นฐาน', 'icon' => 'fa fa-angle-double-right', 'url' => ['report/index'],],
                            ['label' => 'รายงานตามตัวชี้วัด', 'icon' => 'fa fa-angle-double-right', 'url' => ['kpi/index'],],
                        ],
                    ],
                    ['label' => 'เข้าสู่ระบบ', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'ออกจากระบบ', 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']],
                ],
            ]
        ) ?>

    </section>
    <li>   
        <div class="small-box">
            <div class="inner">
                <h3>   
                    <?php $hn_total = Yii::$app->db->createCommand("SELECT COUNT(DISTINCT hn) AS hn_total from vn_stat WHERE vstdate = DATE(NOW())")->queryScalar(); ?>
                    <font color="#0080FF"><?php echo $hn_total; ?></font>  <sup style="font-size: 20px"><font color="#FA58AC">คน</font></sup>
                    <?php $vn_total = Yii::$app->db->createCommand("SELECT COUNT(vn) AS vn_total from vn_stat WHERE vstdate = DATE(NOW())")->queryScalar(); ?>
                    <font color="#0080FF"><?php echo $vn_total; ?></font> <sup style="font-size: 20px"><font color="#FA58AC">ครั้ง</font></sup>
                </h3>
                <small class="label label-warning"><i class="fa fa-clock-o"></i> ผู้รับบริการวันนี้</small>
                <?php
                function DateThai($strDate) {
                    $timezone = date_default_timezone_set("Asia/Bangkok");
                    $strYear = date("Y", strtotime($strDate)) + 543;
                    $strMonth = date("n", strtotime($strDate));
                    $strDay = date("j", strtotime($strDate));
                    $strHour = date("H", strtotime($strDate));
                    $strMinute = date("i", strtotime($strDate));
                    $strSeconds = date("s", strtotime($strDate));
                    $strMonthCut = Array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
                    $strMonthThai = $strMonthCut[$strMonth];
                    return "$strDay $strMonthThai $strYear เวลา $strHour:$strMinute:$strSeconds น.";
                }

                $strDate = "now";
                echo "" . DateThai($strDate); 
                ?>
            </div>
            <div class="icon"><i class="fa  fa-stethoscope text-blue"></i></div>
        </div>
    </li>

</aside>
