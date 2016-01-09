<?php
/**
 * Created by Bane.Shi.
 * Copyright MoenSun
 * User: Bane.Shi
 * Date: 2015/11/8
 * Time: 1:26
 */

namespace MoenSun\MSUtils\http;


class MSCurl
{
    public static function get($url,$header=array(),$useSsl=false,$second=30){
        try {
            $mscurl= curl_init();
            curl_setopt($mscurl, CURLOPT_TIMEOUT, $second);
            curl_setopt($mscurl, CURLOPT_URL, $url);
            curl_setopt($mscurl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($mscurl, CURLOPT_HEADER, false);
            curl_setopt($mscurl, CURLOPT_HTTPHEADER, $header);
            curl_setopt($mscurl, CURLOPT_SSL_VERIFYPEER, $useSsl);
            $result=curl_exec($mscurl);
            curl_close($mscurl);

            return $result;
        } catch (Exception $e) {
            throw new \Exception($e);
        }
    }


    public static function post($url,$header=array(),$data=null,$second=30){
        try {
            $mscurl= curl_init();
            curl_setopt($mscurl, CURLOPT_TIMEOUT, $second);
            curl_setopt($mscurl, CURLOPT_URL, $url);
            curl_setopt($mscurl,CURLOPT_SSL_VERIFYPEER,FALSE);
            curl_setopt($mscurl,CURLOPT_SSL_VERIFYHOST,false);
            //设置header
            curl_setopt($mscurl, CURLOPT_HEADER, false);
            curl_setopt($mscurl, CURLOPT_HTTPHEADER, $header);
            curl_setopt($mscurl, CURLOPT_RETURNTRANSFER,true);
            curl_setopt($mscurl, CURLOPT_POST, true);
            curl_setopt($mscurl, CURLOPT_POSTFIELDS,$data) ;

            $result = curl_exec($mscurl);
            curl_close($mscurl);
            return $result;
        } catch (Exception $e) {
            throw new \Exception($e);
        }
    }
}