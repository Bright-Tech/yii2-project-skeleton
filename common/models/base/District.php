<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "district".
 *
 * @property integer $id
 * @property integer $upid
 * @property string $name
 * @property integer $type
 * @property integer $sort
 */
class District extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'district';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['upid', 'name'], 'required'],
            [['upid', 'type', 'sort'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'upid' => 'Upid',
            'name' => 'Name',
            'type' => 'Type',
            'sort' => 'Sort',
        ];
    }
}
