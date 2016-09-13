<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "{{%property}}".
 *
 * @property integer $id
 * @property string $type
 * @property string $key
 * @property string $value
 * @property integer $sort
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $is_deleted
 */
class Property extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%property}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'key', 'value', 'created_at', 'updated_at'], 'required'],
            [['sort', 'created_at', 'updated_at', 'is_deleted'], 'integer'],
            [['type', 'key', 'value'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'key' => 'Key',
            'value' => 'Value',
            'sort' => 'Sort',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'is_deleted' => 'Is Deleted',
        ];
    }
}
