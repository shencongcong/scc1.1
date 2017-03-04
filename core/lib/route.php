<?php
/**
 * Created by PhpStorm.
 * User: hlcc
 * Date: 2017/2/26
 * Time: 20:52
 */
namespace core\lib;
use core\lib\config;

class route{
    var $action = '';
    var $controller = '';
    public function __construct()
    {
        /*
         * 1. 影藏 index.php .htaccess文件处理
         * 2. 获取url参数部分
         * 3. 返回对应的控制器和方法
         * */
        if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/'){
            // /index/index
            $path = explode('/',substr($_SERVER['REQUEST_URI'],1));
            if(isset($path[0])){
                $this->controller = $path[0];
            }
            unset($path[0]);
            if(isset($path[1])){
                $this->action = $path[1];
                unset($path[1]);
            }else{
                $this->action = config::get('ACTION','route');
            }
            // 多余的参数转化为 get 请求
            // index/index/id/3/hh/34
            //$arr = explode('/',$path);
            $count = count($path)+2;
            $i = 2;
            while ($i<$count){
                if(isset($path[$i+1])){
                    $_GET[$path[$i]] = $path[$i+1];
                }
                $i = $i+2;
            }
        }else{
            $this->controller = config::get('CONTROLLER','route');
            $this->action = config::get('ACTION','route');
        }
    }

}