<?php
/*2016-4-24*/

namespace Scc;

class Register
{
	protected static $object;
	static function set($alias,$value)
	{
		self::$object[$alias] = $value;
	}
	
	static function get($alias)
	{
		return self::$object[$alias];
	}
	
	static function _unset($alias)
	{
		unset(self::$object[$alias]);
	}
	
	
}