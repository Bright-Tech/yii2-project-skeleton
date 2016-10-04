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
    
    /**
     * 用于select省份列表
     * @return array
     */
    public static function getProvinceList()
    {
        $provinceList = [];
        $provinceModels = self::find()->select(['id' , 'name'])->where(['upid' => 0 , 'type' => 1])->orderBy('sort' , 'asc')->all();
        foreach ($provinceModels as $provinceModel){
            $provinceList[$provinceModel->id] = $provinceModel->name;
        }
        return $provinceList;
    }
    
    /**
     * 用于select城市列表
     * @param $provinceId
     * @return array
     */
    public static function getCitiesList($provinceId)
    {
        $citiesList = [];
        $cityModels = self::find()->select(['id' , 'name'])->where(['upid' => $provinceId , 'type' => 2])->all();
        foreach ($cityModels as $cityModel){
            $citiesList[$cityModel->id] = $cityModel->name;
        }
        return $citiesList;
    }
    
    /**
     * 用于select县区列表
     * @param $cityId
     * @return array
     */
    public static function getDistrictsList($cityId)
    {
        $districtsList = [];
        $districtModels = self::find()->select(['id' , 'name'])->where(['upid' => $cityId , 'type' => 3])->all();
        foreach ($districtModels as $districtModel){
            $districtsList[$districtModel->id] = $districtModel->name;
        }
        return $districtsList;
    }
}