<?php
/**
 * Created by PhpStorm.
 * Copyright MoenSun
 * User: Bane.Shi
 * Date: 2015/11/16
 * Time: 23:19
 */

namespace MoenSun\MSUtils\file;


class MSFileBase64
{
    public static function isBase64($str){
        return preg_match("/^data:.*?;base64,/",$str);
    }

    public static function isImage($str){
        return preg_match("/^data:image\/.*/",$str);
    }

    public static function decode($str){
        return base64_decode(preg_replace("/^data:.*?\/.*?;base64,/","",$str));
    }


    public static function prefix($str){
        if(preg_match("/^data:.*?;base64,/",$str,$out)){
            return $out[0];
        }else {
            return "";
        }
    }

    public static function type($str){
        $type = null;
        $prefix = self::prefix($str);
        if($prefix){
            if(preg_match("/(^data:)(.*?)(\/.*?;)/",$prefix,$out)){
                if(isset($out[2])){
                    $type = $out[2];
                }
            }
        }
        return $type;
    }

    public static function extension($str){
        $extension = "";
        $prefix = self::prefix($str);
        if($prefix){
            if(preg_match("/(^data:.*?\/)(.*?)(;.*?)/",$prefix,$out)){
                if(isset($out[2])){
                    $extension = $out[2];
                }
            }
        }
        return $extension;
    }

}