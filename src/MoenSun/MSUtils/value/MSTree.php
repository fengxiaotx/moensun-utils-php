<?php
/**
 * Created by Bane.Shi.
 * Copyright MoenSun
 * User: Bane.Shi
 * Date: 2016/3/10
 * Time: 23:23
 */

namespace MoenSun\MSUtils\value;


class MSTree
{
	/**
	 * 创建一个适用于EXTJS的树形数组
	 * @param $array
	 * @param $pidVal
	 * @param $idField
	 * @param $pidField
	 * @param string $folderIcon
	 * @param string $fileIcon
	 * @return array
	 */
	public static function createTreeExtjs($array,$pidVal,$idField,$pidField,$folderIcon="",$fileIcon="")
	{
		$newArray=array();
		if(count($array)>0){
			foreach ($array as $arr)
			{
				if($arr[$pidField]==$pidVal)
				{
					$children=self::createTreeExtjs($array, $arr[$idField],$idField,$pidField,$folderIcon,$fileIcon);
					if(!empty($children))
					{
						$arr['expanded']=true;
						$arr['iconCls']=$folderIcon;
						$arr['children']=$children;
					}
					else
					{
						$arr['iconCls']=$fileIcon;
						$arr['leaf']=true;
					}

					$newArray[]=$arr;
				}
			}
		}
		return  $newArray;
	}

	/**
	 * @param $array
	 * @param $pidVal
	 * @param $idField
	 * @param $pidField
	 * @return array
	 */
	public static function createTree($array,$pidVal,$idField,$pidField){
		$newArray=array();
		if(count($array)>0){
			foreach ($array as $arr)
			{
				if($arr[$pidField]==$pidVal)
				{
					$children=self::createTree($array, $arr[$idField],$idField,$pidField);
					if(!empty($children))
					{
						$arr['children']=$children;
					}
					$newArray[]=$arr;
				}
			}
		}
		return  $newArray;
	}

	/**
	 * 树形数据从子页节点到跟节点
	 * @param $list
	 * @param $id
	 * @param $pid
	 * @param $startValue
	 * @return array
	 */
	public static function upTreeArray($list,$id,$pid,$startValue){
		$start = $startValue;
		$isLast = false;
		$arr = [];
		while(1){
			foreach($list as $k => $v){
				if($list[$k][$id] == $start){
					$start = $list[$k][$pid];
					$arr[] = $list[$k];
					break;
				}
				if($k == (count($list)-1)){
					$isLast = true;
				}
			}
			if($isLast){
				break;
			}

		}
		return array_reverse($arr);
	}

	/**
	 * 将带有层级关系的数组转换成树形结构的数组
	 * @param $array 需要转换的数组
	 * @param string $pidVal 父级ID的值
	 * @param $idField ID的字段名
	 * @param $pidField 父级ID的字段名
	 * @param $textField 显示的字段名
	 * @param $placeholder 占位符
	 * @param int $level 级别
	 * @return array
	 */
	public static function treeList($array,$pidVal = "0",$idField,$pidField,$textField,$placeholder ="",$level = 1){
		$newArray = [];
		$space = "";

		if($level>1){
			for($i=1;$i<$level;$i++){
				$space.= $placeholder;
			}
		}

		foreach ($array as $k=>$v){
			if($array[$k][$pidField] == $pidVal){
				$array[$k][$textField] = $space.$array[$k][$textField];
				array_push($newArray,$array[$k]);
				$children = self::treeList($array,$array[$k][$idField],$idField,$pidField,$textField,$placeholder,$level+1);
				if(count($children)){
					foreach ($children as $child){
						array_push($newArray,$child);
					}
				}
			}
		}

		return $newArray;
	}


}