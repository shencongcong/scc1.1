<?php
/*2016-4-24*/
namespace Scc;

class Obiect
{
	protected  $array = array();
	static function test()
	{
		echo 'obiect';
	}
	
 	
 	function  __set($key,$value)
	{
		echo __METHOD__;
		$this->array[$key] = $value;
	} 
	
	function  __get($key)
	{
		return $this->array[$key]; 
	} 
	
	function __call($func,$param)
	{
		var_dump($func,$param);
	}
	
	static function __callStatic($func,$param)
	{
		var_dump($func,$param);
	}
	
	function __toString()
	{
		return __CLASS__;
	}
	
	
	function __invoke()
	{
		return __CLASS__;
	}
}

