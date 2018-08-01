<?php
/**
 * Created by PhpStorm.
 * User: zhangyingren
 * Date: 2018/7/30
 * Time: 11:30
 */
class Core{
    //运行程序
    public function run(){
        //自动加载
        spl_autoload_register(array($this,'loadClass'));

        //设置报错等级
        $this->setReporting();

        //路由捷信
        $this->route();
    }
    
    public function loadClass($class){
        $vendor = VENDER_PATH.$class.'.class.php';
        $controller = APP_PATH.'Controller/'.$class.'.php';
        $model = APP_PATH.'Model/'.$class.'.php';

        if(file_exists($vendor)){
            include $vendor;
        }elseif (file_exists($controller)){
            include $controller;
        }elseif (file_exists($model)){
            include $model;
        }else{

        }
    }
    
    public function setReporting(){
        if(true === APP_DEBUG){
            error_reporting(E_ALL);
            ini_set('display_errors','On');
        }else{
            error_reporting(E_ALL);
            ini_set('display_errors','Off');
            ini_set('log_errors', 'On');
            ini_set('error_log', RUNTIME_PATH. 'logs/error.log');
        }
    }

    //e.g yoursite.com/controllerName/actionName/queryString 根据.htaccess规则，则重写后的规则就是
    //yoursite.com/index.php?url=controllerName/actionName/queryString
    public function route(){
        if (!empty($_GET['url'])) {
            $url = $_GET['url'];
            $urlArray = explode('/', $url);
            // 获取控制器名
            $controllerName = ucfirst($urlArray[0]);
            // 获取动作名
            array_shift($urlArray);
            $action = empty($urlArray[0]) ? 'index' : $urlArray[0];
            //获取URL参数
            array_shift($urlArray);
            $queryString = empty($urlArray) ? array() : $urlArray;
        }
        // 数据为空的处理
        $queryString  = empty($queryString) ? array() : $queryString;

        //实例化控制器
        $controller = $controllerName.'Controller';
        $dispatch = new $controller($controllerName,$action);

        if(method_exists($controller,$action)){
            call_user_func_array(array($dispatch, $action), $queryString);
        }else{
            exit($controller.'不存在或'.$controller.'里的'.$action.'方法不存在');
        }
    }
}