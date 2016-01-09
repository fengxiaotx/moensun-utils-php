<?php
/**
 * Created by PhpStorm.
 * Copyright MoenSun
 * User: Bane.Shi
 * Date: 2015/11/16
 * Time: 23:23
 */

namespace MoenSun\MSUtils\device;


class MSDeviceJudeg
{
    public static function isMobile(){
        if(isset ($_SERVER['HTTP_X_WAP_PROFILE'])||(strpos((isset($_SERVER['HTTP_USER_AGENT'])?$_SERVER['HTTP_USER_AGENT']:""),"MicroMessenger"))||isset ($_SERVER['HTTP_VIA'])){
            return true;
        }else {
            return false;
        }
    }
}