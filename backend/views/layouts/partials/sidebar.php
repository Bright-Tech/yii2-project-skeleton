<?php
use yii\helpers\Url;
use bright\theme\yii2\aceadmin\widgets\Sidebar;

$menus = [
    'items' => [
        [
            'label' => '网站设置',
            'url' => [
                'website-set/update'
            ],
            'visible' => ! Yii::$app->user->isGuest
        ],
        [
            'label' => '导航管理',
            'url' => [
                'navigation/index'
            ],
            'visible' => ! Yii::$app->user->isGuest
        ],
        [
            'label' => '内容管理',
            'url' => [
                'content/index'
            ],
            'visible' => ! Yii::$app->user->isGuest
        ],
        [
           'label' => '分类管理',
           'url' => ['category/index'],
           'visible' => ! Yii::$app->user->isGuest
        ],
        [
            'label' => '用户管理',
            'url' => ['user/index'],
            'visible' => ( !Yii::$app->user->isGuest &&  array_key_exists('admin', Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId())) )
        ],
        [
        'label' => '首页设置',
        'url' => ['index-set/update'],
        'visible' => ! Yii::$app->user->isGuest
        ],
        
        [
        'label' => '轮播图设置',
        'url' => ['carousel/index'],
        'visible' => ! Yii::$app->user->isGuest
        ],
        
        [
        'label' => '图片管理',
        'url' => ['pictures/index'],
        'visible' => ! Yii::$app->user->isGuest
        ],
     //   [
     //   'label' => '图片管理',
      //  'url' => ['pictures/index'],
     //   'visible' => ! Yii::$app->user->isGuest
     //   ],
        
        [
            'label' => 'Login',
            'url' => [
                'site/login'
            ],
            'visible' => Yii::$app->user->isGuest
        ]
    ],
    'options' => []
]?> 
<!--   set this to nav-tab to get tab-styled navigation -->
<div class="sidebar responsive" id="sidebar">
	<script type="text/javascript">
		try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
	</script>

	<div class="sidebar-shortcuts" id="sidebar-shortcuts">
		<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
			<a class="btn btn-info" href="<?=Url::to(['/order'])?>" title="首页"> <i
				class="ace-icon fa fa-home"></i>
			</a> <a class="btn btn-warning" href="<?=Url::to(['/order'])?>"
				title="新增会员"> <i class="ace-icon fa fa-plus-square"></i>
			</a>

			<!-- #section:basics/sidebar.layout.shortcuts -->
			<a class="btn btn-success" href="<?=Url::to(['/order'])?>"
				title="会员扣次"> <i class="ace-icon fa fa-user"></i>
			</a> <a class="btn btn-purple" href="<?=Url::to(['/order'])?>"
				title="快速消费"> <i class="ace-icon fa fa-shopping-cart"></i>
			</a>

			<!-- /section:basics/sidebar.layout.shortcuts -->
		</div>

		<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
			<span class="btn btn-success"></span> <span class="btn btn-info"></span>

			<span class="btn btn-warning"></span> <span class="btn btn-danger"></span>
		</div>
	</div>
	<!-- /.sidebar-shortcuts -->


    <?= Sidebar::widget( $menus); ?>

	<!-- /.nav-list -->

	<!-- #section:basics/sidebar.layout.minimize -->
	<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
		<i class="ace-icon fa fa-angle-double-left"
			data-icon1="ace-icon fa fa-angle-double-left"
			data-icon2="ace-icon fa fa-angle-double-right"></i>
	</div>

	<!-- /section:basics/sidebar.layout.minimize -->
	<script type="text/javascript">
		try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
	</script>
</div>
<!-- End .sidebar -->