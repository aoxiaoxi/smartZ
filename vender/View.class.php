<?php
/**
 * Created by PhpStorm.
 * User: zhangyingren
 * Date: 2018/7/31
 * Time: 10:20
 */
class View{

    protected $_controller;
    protected $_action;
    protected $variables = [];

    public function __construct($controller,$action){
        $this->_controller = $controller;
        $this->_action = $action;
    }

    //分配变量
    public function assign($name,$value){
        $this->variables[$name] = $value;
    }

    //渲染
    public function render(){
        extract($this->variables);
    }
}