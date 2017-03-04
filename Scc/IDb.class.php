<?php

namespace Scc;
/*
 * 数据库操作的接口
 * */
interface Idb
{
	function connect($host,$user,$pwd,$dbname);

	function query($sql);

	function close();
}