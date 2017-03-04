<?php
/*2016-4-24*/
namespace Scc;
class Factory
{
	
	
	static function createdb()
	{
		$db = Db::getInstance();
		Register::set('db1',$db);
		return $db;
	}
}