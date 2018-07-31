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

        //
    }
    
    public function loadClass($class){
        $vendor = VENDER_PATH.$class.'class.php';
        $controller = APP_PATH.'/Controller/'.$class.'class.php';
        $model = APP_PATH.'/Model/'.$class.'class.php';

        if(file_exists($vendor)){
            include $vendor;
        }elseif ($controller){
            include $controller;
        }elseif ($model){
            include $controller;
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

    public function route(){
        if(!empty($_GET['url'])){
            $url = $_GET['url'];
            
        }
    }
}