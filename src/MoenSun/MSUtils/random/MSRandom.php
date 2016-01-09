<?php
/**
 * Created by PhpStorm.
 * Copyright MoenSun
 * User: Bane.Shi
 * Date: 2015/11/16
 * Time: 23:21
 */

namespace MoenSun\MSUtils\random;


class MSRandom
{
    public static  function getNonceStr($length = 32) {
        $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        $str ="";
        for ( $i = 0; $i < $length; $i++ )  {
            $str .= substr($chars, mt_rand(0, strlen($chars)-1), 1);
        }
        return $str;
    }

    /**
     * ��ɳ�uuid
     * @return mixed
     */
    public static function getUUID(){
        return str_replace(".","",uniqid("",true));
    }
    /**
     * ��ɴ����ֵ�uuid
     * @return string
     */
    public static function getNumberUUID(){
        return date("YmdHis",time()).mt_rand(1000, 9999);
    }

    /**
     *  获取tradeid ，多用于支付
     */
    public static function getOutTradeID(){
        list($ta,$tb)=explode(" ",microtime());
        return $tb.str_replace(".", "", $ta);
    }
}