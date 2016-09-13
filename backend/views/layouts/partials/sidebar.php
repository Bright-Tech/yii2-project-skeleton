<?php
use yii\helpers\Url;
use bright_tech\yii2theme\aceadmin\widgets\Sidebar;

$menus = [
    'items' => [
        [
            'label' => '用户管理',
            'url' => ['user/index'],
            //  'visible' => !Yii::$app->user->isGuest,
            'visible' => Yii::$app->user->can('manage user'),
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

            ]
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
<!--   set this to nav-tab to get tab-styled navigation -->
<div class="sidebar responsive sidebar-fixed sidebar-scroll" id="sidebar">
    <script type="text/javascript">
        try {
            ace.settings.check('sidebar', 'fixed')
        } catch (e) {
        }
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <a class="btn btn-info" href="#" title="快捷方式1">
                <i class="ace-icon fa fa-home"></i>
            </a>
            <a class="btn btn-warning" href="#" title="快捷方式2">
                <i class="ace-icon fa fa-plus-square"></i>
            </a>

            <!-- #section:basics/sidebar.layout.shortcuts -->
            <a class="btn btn-success" href="#" title="快捷方式3">
                <i class="ace-icon fa fa-user"></i>
            </a>
            <a class="btn btn-purple" href="#" title="快捷方式4">
                <i class="ace-icon fa fa-shopping-cart"></i>
            </a>

            <!-- /section:basics/sidebar.layout.shortcuts -->
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span> <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span> <span class="btn btn-danger"></span>
        </div>
    </div>
    <!-- /.sidebar-shortcuts -->


    <?= Sidebar::widget($menus); ?>

    <!-- /.nav-list -->

    <!-- #section:basics/sidebar.layout.minimize -->
    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i class="ace-icon fa fa-angle-double-left"
           data-icon1="ace-icon fa fa-angle-double-left"
           data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>

    <!-- /section:basics/sidebar.layout.minimize -->
    <script type="text/javascript">
        try {
            ace.settings.check('sidebar', 'collapsed')
        } catch (e) {
        }
    </script>
</div>
<!-- End .sidebar -->