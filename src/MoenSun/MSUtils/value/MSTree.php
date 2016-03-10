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

}