<?php
/**
 * Created by PhpStorm.
 * User: hlcc
 * Date: 2017/3/2
 * Time: 19:39
 */

namespace core\lib;


class log {

    static $class = array();

    static public function init() {
        $drive = config::get('DRIVE', 'log');
        $class = '\core\lib\drive\log\file';
        self::$class = new $class;
    }

    static public function log($name) {
        self::$class->log($name);
    }
}