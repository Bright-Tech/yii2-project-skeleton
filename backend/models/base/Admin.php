<?php

namespace backend\models\base;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $name
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $is_deleted
 */
class Admin extends \yii\db\ActiveRecord
{
    public $password_old;
    public $repeat_password;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%admin}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'name', 'email'], 'required'],
            [['status', 'created_at', 'updated_at', 'is_deleted'], 'integer'],
            [['username', 'password_hash','repeat_password', 'password_reset_token', 'name', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            ['repeat_password', 'compare', 'compareAttribute'=>'password_hash', 'message'=>'与密码不符请重新输入']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '用户ID',
            'username' => '登录名',
            'password_old'=>'旧密码',
            'repeat_password'=>'请再输入一次',
            'auth_key' => 'Auth Key',
            'password_hash' => '用户密码',
            'password_reset_token' => 'Password Reset Token',
            'name' => '昵称',
            'email' => '用户邮箱',
            'status' => '用户状态',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'is_deleted' => 'Is Deleted',
        ];
    }
}
