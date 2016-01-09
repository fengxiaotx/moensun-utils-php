<?php
/**
 * Created by PhpStorm.
 * Copyright MoenSun
 * User: Bane.Shi
 * Date: 2015/11/16
 * Time: 23:19
 */

namespace MoenSun\MSUtils\file;


class MSFile
{
    /**
     * @param $val
     * @return null|string
     */
    public static function getExtension($val){
        $returnStr=null;
        if($val){
            $array=explode(".",$val);
            if(count($array)>0){
                $returnStr=".".$array[count($array)-1];
            }
        }
        return $returnStr;
    }
}