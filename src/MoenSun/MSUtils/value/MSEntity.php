<?php
/**
 * Created by Bane.Shi.
 * Copyright MoenSun
 * User: Bane.Shi
 * Date: 2016/6/10
 * Time: 15:53
 */

namespace MoenSun\MSUtils\value;


class MSEntity
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