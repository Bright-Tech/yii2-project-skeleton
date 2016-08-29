<?php
/**
 * Created by PhpStorm.
 * User: howdo
 * Date: 2016/8/12
 * Time: 13:02
 */
namespace common\models;

use Yii;

class User extends \common\models\base\User{

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
        //   return $user;
        return $user->save() ? $user : null;
    }
    public function updateuser($id)
    {
        if (!$this->validate()) {
            return null;
        }
        $user=User::findOne($id);
        if ($this->password_hash){
            $user->setPassword($this->password_hash);
        }
        $user->setPassword($this->username);
        $user->email = $this->email;
        $user->generateAuthKey();
        $user->name=$this->name;
        return $user->save() ? $user : null;
    }
}