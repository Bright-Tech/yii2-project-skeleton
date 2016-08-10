<?php
/**
 * Created by PhpStorm.
 * User: 嘉旭
 * Date: 2016/8/10
 * Time: 13:02
 */
namespace common\models;

use yii\base\Model;

class UserAdd extends User
{
    public $repeat_password;
    public function rules()
    {
        return [
            ['name','required'],
            ['username', 'filter', 'filter' => 'trim'],
            ['email','email'],
            ['username', 'required','message' => '用户名不能为空'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => '用户名已存在'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => '该邮箱已被使用'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['password_hash', 'required','message' => '密码不能为空'],
            ['password_hash', 'string', 'min' => 6],
            ['repeat_password', 'compare', 'compareAttribute'=>'password_hash', 'message'=>'与密码不符请重新输入']
        ];
    }
    public function adduser()
    {
        if (!$this->validate()) {
            return null;
        }
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password_hash);
        $user->generateAuthKey();
        $user->name=$this->name;
       // return $user;
        return $user->save() ? $user : null;
    }
    public function updateuser($id){
        if (!$this->validate()) {
            return null;
        }
        $user=User::findOne($id);
        if ($this->password_hash){
            $user->setPassword($this->password_hash);
        }
        if ($this->username){
            $user->setPassword($this->username);
        }
        $user->email = $this->email;
        $user->generateAuthKey();
        $user->name=$this->name;
        return $user->save() ? $user : null;
    }



}