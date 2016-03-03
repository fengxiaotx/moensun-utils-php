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
    /**
     * 分页查询的时候获取起始条数
     * @param $page
     * @param $pageSize
     * @return int
     */
    public static function getStartRow($page,$pageSize){
        $page=($page<1)?1:$page;
        return ($page-1)*$pageSize;
    }

    /**
     * 分页查询时， 获取总页数
     * @param $count
     * @param $pageSize
     * @return int
     */
    public static function getPageCount($count,$pageSize){
        if( $count <= $pageSize){
            return 1;
        }else{
            return intval($count/$pageSize)+(($count%$pageSize==0)?0:1);
        }
    }

    /**
     * 列表页的分页菜单的起始页
     * @param $currentPage
     * @param $pageSize
     * @return int
     */
    public static function getStartPage($currentPage,$pageSize){
        if($currentPage <= $pageSize){
            return 1;
        }else {
            return  $currentPage -($currentPage%$pageSize-1) ;
        }
    }

    /**
     * 列表页分页菜单的结束页
     * @param $count
     * @param $currentPage
     * @param $pageSize
     * @return int
     */
    public static function getEndPage($count,$currentPage,$pageSize){
        $pageCount = self::getPageCount($count,$pageSize);
        if($currentPage <= $pageSize ){
            return $pageSize;
        }elseif( $end = $currentPage+( $pageSize- ($currentPage%$pageSize)) ){
            if($end >= $pageCount){
                return $pageCount;
            }else {
                return $end;
            }
        }
    }

}