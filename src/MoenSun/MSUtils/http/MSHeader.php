<?php
/**
 * Created by Bane.Shi.
 * Copyright MoenSun
 * User: Bane.Shi
 * Date: 2015/11/8
 * Time: 1:27
 */

namespace MoenSun\MSUtils\http;


class MSHeader
{
    public static function getLanguage(){
        try{
            if(isset($_SERVER["HTTP_ACCEPT_LANGUAGE"])){
                $lanageInfo=$_SERVER["HTTP_ACCEPT_LANGUAGE"];
                $groups=explode(";",$lanageInfo);
                $languages=explode(",",$groups[0]);
                return str_replace("-","_",$languages[0]);
            }else {
                return null;
            }
        }catch (\Exception $e){
            MSLog::log($e);
            throw new \Exception($e);
        }
    }

    public static function getHeader($key){
        $headers=apache_request_headers();
        return isset($headers[$key])?$headers[$key]:null;
    }
}