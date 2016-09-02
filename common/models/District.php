<?php
namespace common\models;

use common\models\base\District;

class District extends District
{
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'upid' => '父级ID',
            'name' => '名称',
            'type' => '类型',
            'sort' => '排序',
        ];
    }
}