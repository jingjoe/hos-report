<?php
use yii\helpers\Html;
use yii\db\Query;


/* @var $this \yii\web\View */
/* @var $content string */
?>
<link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/images/favicon.ico" type="image/x-icon" />
<div class=""></div>
<?php echo Html::a(Html::img(Yii::getAlias('@web') . '/images/hosreport.png', ['alt' => 'some', 'class' => 'img-responsive'])); ?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user-md"></i>
                           <?php $mem_total = Yii::$app->db->createCommand("SELECT COUNT(doctorcode) AS docter_total FROM opduser WHERE (account_disable<>'Y' OR account_disable IS NULL)")->queryScalar(); ?>
                        <span class="label label-success"><?= $mem_total;?></span>
                    </a>
                </li>
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-database"></i>
                           <?php $useronline = Yii::$app->db->createCommand("SELECT COUNT(loginname) AS online_total FROM onlineuser")->queryScalar(); ?>
                        <span class="label label-warning"><?= $useronline;?></span>
                    </a>
             
                </li>
                <!-- Tasks: style can be found in dropdown.less -->
                <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <span class="label label-danger">9</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>
