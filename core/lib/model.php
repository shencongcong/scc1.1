<?php
/**
 * Created by PhpStorm.
 * User: hlcc
 * Date: 2017/2/28
 * Time: 20:20
 */

namespace core\lib;

class model extends \Medoo\Medoo {
    public function __construct() {
        $option = config::all('database');
        parent::__construct($option);
    }
}