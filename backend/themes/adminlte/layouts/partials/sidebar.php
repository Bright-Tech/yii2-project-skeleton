<?php
/* @var $this yii\web\View */

$theme=$this->theme;

$menus = [
    'items' => [
        [
            'label' => '用户管理',
            'url' => ['user/index'],
            //  'visible' => !Yii::$app->user->isGuest,
            'visible' => Yii::$app->user->can('manage user'),
            'options' => ['class'=>'']
        ],
        [
            'label' => '组织管理',
            'url' => ['organization/index'],
            'visible' => !Yii::$app->user->isGuest
        ],
        [
            'label' => '后台管理',
            'items' => [
                [
                    'label' => '管理员管理',
                    'url' => ['admin/index'],
                    //  'visible' => !Yii::$app->user->isGuest,
                    'visible' => Yii::$app->user->can('manage admin'),
                ],
                [
                    'label' => '系统设置',
                    'url' => ['system/index'],
                    'visible' => Yii::$app->user->can('manage system property')
                ]

            ],

            'options' => ['class'=>'treeview']
//             'visible' => ( !Yii::$app->user->isGuest &&  array_key_exists('admin', Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId())) )
        ],
        [
            'label' => 'Login',
            'url' => [
                'site/login'
            ],
            'visible' => Yii::$app->user->isGuest
        ]
    ],
    'options' => []
] ?>

?>
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?=\yii\helpers\Url::to('/images/avatars/user3-128x128.jpg')?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <?= \bright_tech\yii2theme\adminlte\widgets\Sidebar::widget($menus); ?>

    </section>
    <!-- /.sidebar -->
</aside>