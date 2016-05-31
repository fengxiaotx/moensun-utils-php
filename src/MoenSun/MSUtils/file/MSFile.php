<?php
/**
 * Created by PhpStorm.
 * Copyright MoenSun
 * User: Bane.Shi
 * Date: 2015/11/16
 * Time: 23:19
 */

namespace MoenSun\MSUtils\file;


use MoenSun\MSUtils\random\MSRandom;

class MSFile
{
    /**
     * @param $val
     * @return null|string
     */
    public static function getExtension($val){
        return strtolower(substr($val,strrpos($val,'.')+1));
    }

    public static function datePath($fileName,$prefix = ''){
        $d = explode('-',date('Y-y-m-d-H-i-s'));
        $fileName = preg_replace("/[\|\?\"\<\>\/\*\\\\]+/", '', $fileName);
        return str_replace('//','/',$prefix."/".$d[0].'/'.$d[2].'/').$fileName;
    }

    public static function getExtensionByType($type){
        $extension = strtolower(substr($type,strrpos($type,'/')+1));
        if($extension == 'jpeg'){
            $extension = 'jpg';
        }
        return $extension;
    }

    public static function randomFileName($fileName){
        return MSRandom::getUUID().'.'.self::getExtension($fileName);
    }

    public static function getFileTypeByMimeType($type){
        return strtolower(substr($type,0,strpos($type,'/')-1));
    }

}