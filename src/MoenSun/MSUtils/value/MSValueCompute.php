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
     * 获取页面分页按钮的起始页
     * @param $count
     * @param $pageSize
     * @param $currentPage
     * @param $pageShowCount
     * @return int
     */
    public static function getStartPage($count,$pageSize,$currentPage,$pageShowCount){
        $pageCount = self::getPageCount($count,$pageSize);
        if($currentPage <= $pageShowCount){
            return 1;
        }elseif($currentPage>$pageCount){
            return  $pageCount -( ($pageCount%$pageShowCount == 0)?$pageShowCount :($pageCount%$pageShowCount-1)) ;
        } else {
            return  $currentPage -( ($currentPage%$pageShowCount == 0)?$pageShowCount :($currentPage%$pageShowCount-1)) ;
        }
    }

    /**获取页面分页按钮的结束页
     * @param $count
     * @param $pageSize
     * @param $currentPage
     * @param $pageShowCount
     * @return int
     */
    public static function getEndPage($count,$pageSize,$currentPage,$pageShowCount){
        $pageCount = self::getPageCount($count,$pageSize);
        if($currentPage <= $pageShowCount ){
            if( $pageCount<= $pageShowCount){
                return $pageCount;
            }else {
                return $pageShowCount;
            }
        }elseif( $currentPage>$pageCount ){
            return $pageCount;
        }else {
            $end = $currentPage+( ($currentPage%$pageShowCount == 0)? 0:($pageShowCount-$currentPage%$pageShowCount) );
            if($end >= $pageCount){
                return $pageCount;
            }else {
                return $end;
            }
        }
    }

}