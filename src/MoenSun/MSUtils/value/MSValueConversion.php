<?php
/**
 * Created by PhpStorm.
 * Copyright MoenSun
 * User: Bane.Shi
 * Date: 2015/11/16
 * Time: 23:25
 */

namespace MoenSun\MSUtils\value;


class MSValueConversion
{
    public static function stdClassToArray($obj){
        try {
            return json_decode(json_encode($obj),true);
        } catch (Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function objectToArray($obj){
        if(is_object($obj)){
            return get_object_vars($obj);
        }else {
            return null;
        }
    }
}