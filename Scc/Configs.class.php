<?php
/*2016-4-24*/

namespace Scc;

class Configs implements \ArrayAccess
{
	protected $path = '';
	protected $configs = array();
	function __construct($path)
	{
		$this->path = $path;
	}
	
	function offsetGet($key)
	{
	
		if(empty($this->configs[$key]))
		{
			$file = $this->path.'/'.$key.PHP;
			$config = include $file;
			$this->configs[$key] = $config;
		}
		return $this->configs[$key];
	}
	
	function offsetSet($key, $value)
	{
		 throw new \Exception("cannot write config file");
	}
	
	function offsetExists($key)
	{
		return isset($this->configs[$key]);
	}
	
	function offsetUnset($key)
	{
		 unset($this->configs[$key]);
	}
}