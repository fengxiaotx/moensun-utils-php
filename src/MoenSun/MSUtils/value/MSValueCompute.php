<?php
/**
 * Created by PhpStorm.
 * Copyright MoenSun
 * User: Bane.Shi
 * Date: 2015/11/16
 * Time: 23:28
 */

namespace MoenSun\MSUtils\value;


class MSValueCompute
{
    public static function getStartRow($page,$pageSize){
        $page=($page<1)?1:$page;
        return ($page-1)*$pageSize;
    }
}