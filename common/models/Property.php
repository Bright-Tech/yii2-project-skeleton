<?php
/**
 * Created by PhpStorm.
 * User: SamXiao
 * Date: 16/9/13
 * Time: 下午3:57
 */

namespace common\models;


use yii\behaviors\TimestampBehavior;
use yii2tech\ar\softdelete\SoftDeleteBehavior;

class Property extends \common\models\base\Property
{
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            'softDeleteBehavior' => [
                'class' => SoftDeleteBehavior::className(),
                'softDeleteAttributeValues' => [
                    'isDeleted' => true
                ],
            ]
        ];
    }

    public static function getProperty($key)
    {
        $cache = \Yii::$app->cache;
        if (!$cache->exists($key)) {
            $model = Property::findOne(['key' => $key]);
            if (!$model) {
                throw new \Exception('Property not exists');
            }
            $cache->set($key, $model->value);
        }
        return $cache->get($key);
    }
}