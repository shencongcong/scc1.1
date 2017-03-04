<?php

namespace app\controller;

use core\lib\config;
use core\lib\model;
use core\scc;
use core\lib\log;

class Index extends scc{
    public function index(){
        //dump(config::get('ACTION','route'));
        // 日志测试
/*         for($i=0;$i<=10;$i++){
            log::log('写日志1'.$i);
        }*/

        // 数据库测试 medoo
       /* $table = 'test';
        $data = ['name'=>'wang'];
        $model = new model();
        $arr = $model->select('test',['id','name'],['id'=>1]);
        dump($arr);
        $res = $model->insert($table, $data);
        dump($res);*/
 /*       $model = new \app\model\testModel;
        $res = $model->lists();
        dump($res);*/
        $title = '视图标题';
        $this->assign('title',$title);
        $this->display('index.html');
    }
}
