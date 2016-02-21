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
        if($value || $value == 0 || $value == "0"){
            return true;
        }
        return false;
    }
}