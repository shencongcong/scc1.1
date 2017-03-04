<?php
/**
 * Created by PhpStorm.
 * User: hlcc
 * Date: 2017/3/3
 * Time: 1:57
 */

namespace app\model;

use core\lib\model;

class testModel extends model{
    public $table = 'test';
    public function lists(){
        return $this->select($this->table,'*');
    }
}