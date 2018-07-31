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

        $defaultHeader = RESOURCES_PATH . '/views/header.php';
        $defaultFooter = RESOURCES_PATH . '/views/footer.php';
        $controllerHeader = RESOURCES_PATH . '/views/' . $this->_controller . '/header.php';
        $controllerFooter = RESOURCES_PATH . '/views/' . $this->_controller . '/footer.php';
        // 页头文件
        if (file_exists($controllerHeader)) {
            include ($controllerHeader);
        } else {
            include ($defaultHeader);
        }
        // 页内容文件
        include (RESOURCES_PATH . '/views/' . $this->_controller . '/' . $this->_action . '.php');
        // 页脚文件
        if (file_exists($controllerFooter)) {
            include ($controllerFooter);
        } else {
            include ($defaultFooter);
        }
    }
}