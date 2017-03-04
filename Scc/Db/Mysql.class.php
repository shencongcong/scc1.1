<?php
/*2016-4-24*/

namespace Scc\Db;
use Scc\IDb;

class Mysql implements IDb
{
	private $conn;
	
	function connect($host,$user,$pwd,$dbname)
	{
		$this->conn = mysql_connect($host,$user,$pwd) or die('error');
		 mysql_set_charset('utf8');
		 mysql_select_db($dbname,$this->conn);
		
	}
	
	function query($sql)
	{
		$res = mysql_query($sql,$this->conn);
		$rows =array();
		while($row = mysql_fetch_assoc($res))
		{
			$rows[] = $row;
		}
		return $rows;
	//return $this->conn; 
	
	}
	
	function close()
	{
		mysql_close($this->conn);
	}
}