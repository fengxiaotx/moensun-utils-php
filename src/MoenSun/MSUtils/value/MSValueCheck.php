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
    public static function isSqlCondition($value){
        if($value ||  $value == "0" || is_int($value)){
            return true;
        }
        return false;
    }
}