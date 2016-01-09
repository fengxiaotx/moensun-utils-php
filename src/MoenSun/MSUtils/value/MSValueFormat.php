<?php
/**
 * Created by PhpStorm.
 * Copyright MoenSun
 * User: Bane.Shi
 * Date: 2015/11/16
 * Time: 23:26
 */

namespace MoenSun\MSUtils\value;


class MSValueFormat
{
    public static function xmlToArray($xml){
        try {
            return json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
        } catch (Exception $e) {
            throw new \Exception($e);
        }
    }
}