<?php
/**
 * Created by Bane.Shi.
 * Copyright MoenSun
 * User: Bane.Shi
 * Date: 2015/11/8
 * Time: 0:35
 */

namespace MoenSun\MSUtils\http;


use Illuminate\Http\Request;
use MoenSun\MSUtils\http\request\MSRequestEntity;

class MSHttpRequest
{
    /**
     * 获取http传递的流文件内容
     * @return string
     */
    public static function getPostData(){
        //return file_get_contents("php://input");
		$request = new Request();
		return $request->getContent();
    }

    /**
     * 以 array 的形式返回
     * @return mixed
     */

    public static function getPostDataArray(){
        return json_decode(self::getPostData(),true);
    }

    /**
     * 获取的是post的json，以对象的形式返回 取值的时候用 -> 这样可以忽略到 没有Key的情况
     * @return MSRequestEntity
     */
    public static function getPostDataEntity(){
        $data = json_decode(self::getPostData(),true);
        return new MSRequestEntity($data);
    }

    /**
     * 获取的是post的form提交的所有数据
     * @return MSRequestEntity
     */
    public static function getPostFormEntity(){
        return new MSRequestEntity($_POST);
    }

    public static function getParam($key,$isRequired = false){
        if(isset($_REQUEST[$key])){
            return $_REQUEST[$key];
        }else {
            if($isRequired){
                return "";
            }else {
                return null;
            }
        }
    }

    /**
     * 判断是否为ajax请求
     * @return boolean
     */
    public static function isAjaxRequest(){
        if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest"){
            return true;
        }else {
            return false;
        }
    }
    /**
     * 获取请求域名或者ip
     * @return string
     */
    public static function getHost(){
        return (isset($_SERVER['HTTPS'])?"https://":"http://").$_SERVER["HTTP_HOST"];
    }

    /**
     * 获取项目根URL
     * @return mixed
     */
    public static  function getBaseUrl(){
        return preg_replace("/[\/\\\]$/","",(isset($_SERVER['HTTPS'])?"https://":"http://").$_SERVER["SERVER_NAME"].(($_SERVER["SERVER_PORT"]=="80")?"":(":".$_SERVER["SERVER_PORT"])).dirname($_SERVER['SCRIPT_NAME']));
    }


}