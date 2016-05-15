<?php
/**
 * Created by Bane.Shi.
 * Copyright MoenSun
 * User: Bane.Shi
 * Date: 2016/2/21
 * Time: 22:49
 */

namespace MoenSun\MSUtils\value;


class MSValueCheck
{
    /**
     * 判断是不是sql查询条件
     * @param $value
     * @return bool
     */
    public static function isSqlCondition($value){
        if($value ||  $value == "0" || is_int($value)){
            return true;
        }
        return false;
    }

    /**
     * 判断数组中是否有符合sql查询的条件
     * @param array $conditions
     * @return bool
     */
    public static function hasCondition(array $conditions){
        $isTrue = false;
        if(!empty($conditions) && count($conditions)>0){
            foreach ($conditions as $k=>$v){
                if(self::isSqlCondition($v)){
                    $isTrue = true;
                    break;
                }
            }
        }
        return $isTrue;
    }
}