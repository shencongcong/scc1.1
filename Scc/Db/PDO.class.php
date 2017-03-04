<?php

namespace Scc\Db;
use Scc;

class PDO implements Idb
{
    protected $conn;
    public function connect($host,$user,$pwd,$dbname)
    {
            $this->conn = new PDO("mysql:host=$host;dbname=$dbname",$user,$pwd);
    }

    public function query($sql)
    {
        $res = $this->conn->query($sql);
        return $res;
    }

    public function close()
    {
            unset($this->conn);
    }


}