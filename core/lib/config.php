<?php
/**
 * Created by PhpStorm.
 * User: hlcc
 * Date: 2017/3/2
 * Time: 18:58
 */

namespace core\lib;
class config {
    static $config = array();

    /**
     * 1.先判断配置文件是否存在
     * 2.判断配置是否存在
     * 3.缓存配置
     **/
    static public function get($key, $file) {
        if(isset($config[$key])) {
            return true;
        } else {
            $path = CORE . '/config/' . $file . '.php';
            if(is_file($path)) {
                $config = include $path;
                if(isset($config[$key])) {
                    self::$config[$path] = $config;
                    return $config[$key];
                } else {
                    throw  new \Exception('找不到配置' . $config[$key]);
                }
            } else {
                throw new \Exception('找不到配置文件' . $path);
            }
        }

    }

    static public function all($file) {
        $path = CORE . '/config/' . $file . '.php';
        if(is_file($path)) {
            $config = include $path;
            return $config;
        } else {
            throw new \Exception('找不到配置文件' . $path);
        }
    }

}
