<?php
/**
 * Created by PhpStorm.
 * Copyright MoenSun
 * User: Bane.Shi
 * Date: 2015/12/13
 * Time: 15:19
 */

namespace MoenSun\MSUtils\value;


class MSValueJudge
{
    public static function isNull($value){
        if(!isset($value) || $value==null){
            return true;
        }else {
            return false;
        }
    }

    public static function isNullOrBlank($value){
        if(!isset($value) || $value==null || $value==""){
            return true;
        }else {
            return false;
        }
    }
}