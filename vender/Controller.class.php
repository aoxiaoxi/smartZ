<?php
/**
 * Created by PhpStorm.
 * User: zhangyingren
 * Date: 2018/7/31
 * Time: 10:08
 */
class Controller{
    protected $_controller;
    protected $_action;
    protected $_view;

    public function __construct($controller,$action){
        $this->_controller = $controller;
        $this->_action = $action;
        $this->_view = new View($controller,$action);
    }

    //分配变量
    public function assign($name,$value){
        $this->_view->assign($name,$value);
    }

    //渲染视图
    public function __destruct(){
        $this->_view->render();
    }
}