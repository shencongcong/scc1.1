<?php
/**
 * Created by PhpStorm.
 * User: hlcc
 * Date: 2017/2/25
 * Time: 11:38
 * scc 1.0框架入口文件
 */
define('ROOT', __DIR__);
define('CORE', ROOT.'/core');
define('APP', ROOT.'/app');
define('MODEL','app');
include "vendor/autoload.php";
//var_dump(ROOT);exit;
//定义调试模式
define('DEBUG',true);
if('DEBUG'){
    ini_set("display_error","On");
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
}else{
    ini_set("display_error","Off");
}
require CORE."/Common/function.php";
require CORE."/scc.php";
spl_autoload_register('\Core\scc::load');
 \Core\Scc::run();