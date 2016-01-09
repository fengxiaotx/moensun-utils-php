<?php
/**
 * Created by Bane.Shi.
 * Copyright MoenSun
 * User: Bane.Shi
 * Date: 2016/1/8
 * Time: 22:37
 */

namespace MoenSun\MSUtils\http\request;


class MSRequestEntity
{
    private $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function __get($key)
    {
        if(isset($this->data[$key])){
            return $this->data[$key];
        }else{
            return null;
        }
    }

    public function __set($key, $value)
    {
        $this->data[$key] = $value;
    }
}