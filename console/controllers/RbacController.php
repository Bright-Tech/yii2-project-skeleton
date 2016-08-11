<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;
use backend\models\AuthorRule;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $admin = $auth->createRole('Administrator');
        $admin->description = '超级管理员';
        $supervisor = $auth->createRole('Supervisor');
        $supervisor->description = '管理员';
        $auth->add($admin);
        $auth->add($supervisor);
        
        // 为用户指派角色。其中 1 和 2 是由 IdentityInterface::getId() 返回的id （译者注：user表的id）
        // 通常在你的 User 模型中实现这个函数。
        $auth->assign($admin, 1);
        
    }
}