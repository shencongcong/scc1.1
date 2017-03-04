<?php
/*2016-4-24*/

namespace Scc;

class FileCache
{
	public function setCache($key,$value='',$cacheTime = 0)
	{
		
		$file = CACHE_PATH.'/'.$key.'.txt';
		if($value !== '')
		{
			
			if(is_null($value))
			{
				return @unlink($file);	
			}
			if(!is_dir(dirname($file)))
				mkdir(dirname($file),0777);
			
			$cacheTime = sprintf("%011d",$cacheTime);
			//echo $cacheTime;exit;
			return file_put_contents($file,$cacheTime.json_encode($value),FILE_APPEND);
			
		}
		if(!is_file($file))
		{
			return false;
		}
		$time = (int)substr(file_get_contents($file),0,11);
		if($cacheTime!=0 && (filemtime($file)+$time) < time())
		{
			@unlink($file);
			return false;
		}
		
			return json_decode(substr(file_get_contents($file),11),true);
	}
	
}