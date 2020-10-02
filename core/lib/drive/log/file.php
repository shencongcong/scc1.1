<?php
/**
 * Created by PhpStorm.
 * User: hlcc
 * Date: 2017/3/2
 * Time: 19:40
 */

namespace core\lib\drive\log;

use core\lib\config;

class file {

    var $path;

    public function __construct() {
        $this->path = config::get('LOG_PATH', 'log') . date("Y-m-d");
    }

    public function log($name) {
        if(!is_dir($this->path)) {
            mkdir($this->path, '0777', true);
        }
        file_put_contents($this->path . '/log.php', $name . PHP_EOL, FILE_APPEND);
    }
}