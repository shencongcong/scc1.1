<?php

//use Scc\Generator;
/*2016-4-24*/
define('ROOT', __DIR__);
define('EXT','.class.php');
define('PHP','.php');
define('CACHE_PATH',ROOT.'/Cache');

include ROOT.'/Scc/Loader.class.php';

//Scc\Obiect::test();
//App\Controller\Home\Index::test();

/* $db = new Scc\Db;
$info = $db->table('test')->where('id=1')->order('id DESC')->limit(20)->select();
var_dump($info); */

//Scc\Obiect::hshsh('kkddd');

/*  $obj = new Scc\Obiect();
echo $obj();  */

/* $info = Scc\Db::getInstance()->table('test')->where('id=1')->order('id DESC')->limit(20)->select();
var_dump($info); */

/* 
$info = Scc\Factory::createdb()->table('test')->where('id=1')->order('id DESC')->limit(20)->select();
var_dump($info); */
/* Scc\Factory::createdb();
$info = Scc\Register::get('db1');
var_dump($info); */
$test = new Scc\Db\Mysqli();
$test->connect('127.0.0.1','root','root','test');
$sql = "select * from test";
$res = $test->query($sql);
$newArray = [];
while($rs=mysqli_fetch_row($res)){
	$newArray[]=$rs;
}
var_dump($newArray);
$test->close();

/* class Event extends Scc\Generator
{
	function trigger()
	{
		echo "fa sheng";
		$this->notify();
	}
}

class Observer1 implements Scc\Observer
{
	function update($event_info = NULL)
	{
		echo 'observer1';
	}
}

class Observer2 implements Scc\Observer
{
	function update($event_info = NULL)
	{
		echo 'observer2';
	}
}
var_dump(new Observer1);
$event = new Event;
$event->addObserver(new Observer1);
$event->addObserver(new Observer2);
$event->trigger(); */

/* $test = new Scc\Configs(ROOT.'/configs');

var_dump($test->offsetGet('test')); */
/* $data = 'dddddds';
$file = new Scc\FileCache();
$file->setCache('scc_'); */
/* $data = array(

		'home'=>array(
				'a' => 'ddd',
				'b' => 'ddskkks',
		),
		'admin'=>array(
				'c' => 'dkjksjj',
				'd' => 'kksjssj',
		),
);
$app = new Scc\AppDatas();

$info = $app->output_datas('200','成功',$data,$type='xml');

var_dump($info); */
/* $test = new Scc\Configs(ROOT.'/Conf');

var_dump($test->offsetGet('config')); */
/*$file = new Scc\FileCache();

$rs = array();
if(!$rs = $file->setCache('db_arr','',15))
{
	$dbconf = new Scc\Configs(ROOT.'/Conf');
	$config = $dbconf->offsetGet('config');

	$db = new Scc\Db\mysql();
	$db->connect($config["DB_HOST"],$config["DB_USER"],$config["DB_PWD"],$config["DB_NAME"]);
	$sql = "select * from hd_ask";
	$rs = $db->query($sql);
	//$file->setCache('db_arr',$rs,180);
	if($rs){
		$file->setCache('db_arr',$rs,15);
	}
}


$app = new Scc\AppDatas();

return $app::output_datas('200','ok',$rs,$type='xml');*/



?>