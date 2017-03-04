<?php
/*2016-4-24*/
namespace Scc;

class Loader
{
	
	static function loader($class)
	{
		$file = ROOT.'/'.str_replace('\\','/', $class).EXT;
		require $file;
	}
}
spl_autoload_register("Scc\Loader::loader");