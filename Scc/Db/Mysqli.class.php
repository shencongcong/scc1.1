<?php

namespace Scc\Db;
use Scc\Idb;

class Mysqli implements Idb
{
	protected $conn;
	public function connect($host,$user,$pwd,$dbname)
	{
		$this->conn = mysqli_connect($host,$user,$pwd,$dbname);
	}

	function query($sql)
	{
		$res = mysqli_query($this->conn,$sql);
		return $res;
	}

	function close()
	{
		mysqli_close($this->conn);
	}
}
