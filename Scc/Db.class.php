<?php
/*2016-4-24*/
namespace Scc;




class Db
{
	private $sql = array(
		'from' => '',
		'where'=> '',
		'order'=> '',
		'limit'=> '',
	
			
	);
	
	static private $db;
	static private $conn;
	private $host;
	private $user;
	private $pwd;
	private $dbName;
	
	
	private  function __construct()
	{

	}
	
	private function dbconnect(){
		mysqli_connect($this->host,$this->user,$this->pwd,$this->dbName) or die('error');
	}
	static function getInstance()
	{
		if(!(self::$db instanceof self))
		{
			return self::$db = new self();
		}
		return self::$db;
		
	}
	
	public function query()
	{
		$sql = $this->db; 
		$res = mysqli_query($this->conn,$sql);
		//return $this->conn;
		$rows = array();
		while($row = mysql_fetch_assoc($res))
		{
			$rows[] = $row;
		}
		return $rows;
	}

	public function table($tablename)
	{
		$this->sql['from'] = "FROM ".$tablename; 
		return $this;
	}
	
	public function where($_where='1=1')
	{
		$this->sql['where'] =  "WHERE ".$_where;
		return $this;
	}
	

	
	public function order($order)
	{
		$this->sql['order'] = "ORDER BY ".$order;
		return $this; 
	}
	
	public function limit($limit)
	{
		$this->sql['limit'] = "LIMIT 0,".$limit;
		return $this;
	}
	
	public function select($_select='*')
	{
		return "SELECT ".$_select." ".(implode(" ",$this->sql));
	}
}