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

        $manageAdmin = $auth->createPermission('manage admin');
        $auth->add($manageAdmin);

        $manageUser = $auth->createPermission('manage user');
        $auth->add($manageUser);

        $manageSystemProperty = $auth->createPermission('manage system property');
        $auth->add($manageSystemProperty);

        $admin = $auth->createRole('administrator');
        $admin->description = '系统管理员';
        $user = $auth->createRole('user');
        $user->description = '用户';
        $auth->add($admin);
        $auth->add($user);
        $auth->addChild($admin, $manageAdmin);
        $auth->addChild($admin, $manageUser);
        $auth->addChild($admin, $manageSystemProperty);

        // 为用户指派角色。其中 1 和 2 是由 IdentityInterface::getId() 返回的id （译者注：user表的id）
        // 通常在你的 User 模型中实现这个函数。
        $auth->assign($admin, 1);

    }
}