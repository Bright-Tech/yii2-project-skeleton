<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "organization".
 *
 * @property integer $id
 * @property string $name
 * @property integer $province_id
 * @property string $province_cn
 * @property integer $city_id
 * @property string $city_cn
 * @property integer $district_id
 * @property string $district_cn
 * @property string $better_address
 * @property string $contact
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_at
 */
class Organization extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'organization';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'province_id', 'city_id', 'district_id'], 'required'],
            [['province_id', 'city_id', 'district_id', 'created_by', 'created_at', 'updated_at'], 'integer'],
            [['name', 'province_cn', 'city_cn', 'district_cn', 'better_address', 'contact'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '名称',
            'province_id' => '省份',
            'province_cn' => '省份名称',
            'city_id' => '城市',
            'city_cn' => '城市名称',
            'district_id' => '县区',
            'district_cn' => '县区名称',
            'better_address' => '详细地址',
            'contact' => '联系人',
            'created_by' => '创建人',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
}
