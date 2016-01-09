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
        return preg_match("/^value:.*?;base64,/",$str);
    }

    public static function decode($str){
        return base64_decode(preg_replace("/^value:.*?\/.*?;base64,/","",$str));
    }

    public static function head($str){
        return substr($str,0,strpos($str,";"));
    }

    public static function type($str){
        $head=self::head($str);
        $type=null;
        if($head){
            $type=substr($head, strpos($head,"/")+1);
            switch ($type){
                case "jpeg":
                    $type="jpg";
                    break;
                default:
                    break;
            }
        }
        return $type;
    }

    public static function extension($str){
        $head=self::head($str);
        $extension=null;
        if($head){
            $extension=substr($head, strpos($head,":")+1,strpos($head,":")+1);
        }
        return $extension;
    }
}