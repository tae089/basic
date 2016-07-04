<?php
use yii\helpers\Html;
use dektrium\user\models\User;
use dektrium\user\models\profile;
/* @var $this \yii\web\View */
/* @var $content string */
$app = Yii::$app->name='Back Office';
if (!Yii::$app->user->isGuest) {
$link_id = 'index.php?r=user/profile/show&id='.Yii::$app->user->identity->id;
}else{
    $link_id = '#';
}
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">BOFF</span><span class="logo-lg">' . $app . '</span>', $link_id, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
                <?php if(!Yii::$app->user->isGuest){ ?>
                    <!-- Messages: style can be found in dropdown.less-->
           

    <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="/basic/web/img/logo.png" class="user-image" alt="User Image"/>
            <span class="hidden-xs">
                <?php if(!Yii::$app->user->isGuest){echo Yii::$app->user->identity->username;}?>
            </span>
        </a>
        <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
                <img src="/basic/web/img/logo.png" class="img-circle"
                alt="User Image"/>

                <p>
                   <?php if(!Yii::$app->user->isGuest){echo Yii::$app->user->identity->username;}?>
                </p>
            </li>
            <!-- Menu Body -->

            <!-- Menu Footer-->
            <li class="user-footer">
                <div class="pull-left">
                    <a href="index.php?r=user/settings/account" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                    <?= Html::a(
                        'Sign out',
                                    //['/site/logout'],
                        ['/user/security/logout'],
                        ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                        ) ?>
                </div>
            </li>
        </ul>
    </li>

    <!-- User Account: style can be found in dropdown.less -->
    <!--<li>
        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
    </li>-->
</ul>
<?php }else{ ?>
    <li>
      <a href="index.php?r=user/security/login">
        <i class="fa fa-lock text-white"></i> Login
    </a>
</li>
<?php } ?>
</div>
</nav>
</header>
