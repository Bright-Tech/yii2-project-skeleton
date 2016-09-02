<?php

namespace common\models;

use common\models\base\Organization;

class Organization extends Organization
{
    
    
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '名称',
            'province_id' => '省份ID',
            'province_cn' => '省份名称',
            'city_id' => '城市ID',
            'city_cn' => '城市名称',
            'district_id' => '县区ID',
            'district_cn' => '县区名称',
            'better_address' => '详细地址',
            'contact' => '联系人',
            'created_by' => '创建人',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
}