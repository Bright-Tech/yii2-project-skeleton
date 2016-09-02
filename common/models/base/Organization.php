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
            [['name', 'created_at', 'updated_at'], 'required'],
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
            'name' => 'Name',
            'province_id' => 'Province ID',
            'province_cn' => 'Province Cn',
            'city_id' => 'City ID',
            'city_cn' => 'City Cn',
            'district_id' => 'District ID',
            'district_cn' => 'District Cn',
            'better_address' => 'Better Address',
            'contact' => 'Contact',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
