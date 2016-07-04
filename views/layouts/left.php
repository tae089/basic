<aside class="main-sidebar">
<?php if(!Yii::$app->user->isGuest){ ?>
    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/basic/web/img/logo.png" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>
                <?php if(!Yii::$app->user->isGuest){echo Yii::$app->user->identity->username;}?>
                    
                </p>

               <a href="index.php?r=user/profile/show&id=<?php echo Yii::$app->user->identity->id; ?>"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'เมนู', 'options' => ['class' => 'header']],
                    ['label' => 'ข่าวสาร กิจกรรม', 'url' => ['/news/index'],'icon' => 'fa fa-rss-square'],
                    ['label' => 'ภาพสไลด์', 'url' => ['/slide-photo/index'],'icon' => 'fa fa-file-photo-o'],
                    ['label' => 'อัลบั้มภาพ', 'url' => ['/album-photo/index'],'icon' => 'fa  fa-image'],
                    ['label' => 'แผนผัง', 'url' => ['/diagrams/index'],'icon' => 'fa fa-sitemap'],
                    ['label' => 'จัดการ Admin', 'url' => ['/user/admin/index'],'icon' => 'fa fa-gear'],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
/*                    [
                        'label' => 'Same tools',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],],
                        ],
                    ],*/
                ],
            ]
        ) ?>

    </section>
    <?php } ?>
</aside>
