<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use bright_tech\yii2theme\aceadmin\widgets\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = '登录';
$this->params['breadcrumbs'][] = $this->title;

AppAsset::register($this);
\bright_tech\yii2theme\adminlte\assets\AdminlteAsset::register($this);
\bright_tech\yii2theme\adminlte\assets\AdminltePluginAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content=""/>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="hold-transition login-page">
<?php $this->beginBody() ?>


<div class="login-box">
    <div class="login-logo">
        <?= \common\models\Property::getProperty('backend-title') ?>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>


        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
        <?= $form->field($model, 'username', [
            'template' => "{label}\n{input}\n<span class=\"glyphicon glyphicon-envelope form-control-feedback\"></span>\n{hint}\n{error}",
            'options' => ['class' => 'form-group has-feedback']
        ])->textInput(['autofocus' => true])->label(false) ?>
        <?= $form->field($model, 'password',[
            'template' => "{label}\n{input}\n<span class=\"glyphicon glyphicon-lock form-control-feedback\"></span>\n{hint}\n{error}",
            'options' => ['class' => 'form-group has-feedback']
        ])->passwordInput()->label(false) ?>


        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox"> 记住密码
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">登陆</button>
            </div>
            <!-- /.col -->
        </div>

        <?php ActiveForm::end(); ?>


        <a href="#">I forgot my password</a><br>
        <a href="register.html" class="text-center">Register a new membership</a>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<?php $this->registerJs('
$(\'input\').iCheck({
    checkboxClass: \'icheckbox_square-blue\',
    radioClass: \'iradio_square-blue\',
    increaseArea: \'20%\' // optional
});
') ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
