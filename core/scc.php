<?php
/**
 * Created by PhpStorm.
 * User: hlcc
 * Date: 2017/2/25
 * Time: 11:52
 */

namespace core;

use core\lib\config;
use core\lib\route;
use core\lib\log;

class scc {
    static $classMap = [];

    /**
     * @var $assign
     */
    var $assign;

    static function run() {
        log::init();
        // 初始化日志类
        $route = new \core\lib\route;
        $contl = $route->controller;
        $action = $route->action;
        $path = APP . '/controller/' . $contl . '.php';
        $contlClass = '\\' . MODEL . '\controller' . '\\' . $contl;
        if(is_file(APP . '/controller/' . $contl . '.php')) {
            require $path;
            $class = new $contlClass;
            $class->$action();
        } else {
            throw new \Exception('找不到控制器' . $contl);
        }
    }

    static function load($class) {
        // new \Core\route
        // class \Core\route  -> require ROOT.'/Core/route.php'
        if(isset($routeMap[$class])) {
            return true;
        } else {
            $class = str_replace('\\', '/', $class);
            $file = ROOT . '/' . $class . '.php';
            if(is_file($file)) {
                require $file;
                self::$classMap[$class] = $class;
            } else {
                return false;
            }
        }
    }

    public function assign($key, $val) {
        //self::$assign[$key] = $val;
        $this->assign[$key] = $val;
    }

    public function display($file) {
        $route = new route();
        $cont = $route->controller;
        $path = APP . '/view/' . $cont . '/' . $file;
        if(is_file($path)) {
            // extract($this->assign);
            //require $path;
            \Twig_Autoloader::register();
            $loader = new \Twig_Loader_Filesystem(APP . '/view/' . $cont);
            $twig = new \Twig_Environment($loader, array(
                'cache' => ROOT . '/runtime/cache/',
                'debug' => DEBUG,
            ));
            $template = $twig->load('index.html');
            $template->display($this->assign ? $this->assign : array());
        } else {
            throw new \Exception('模板不存在');
        }
    }
}