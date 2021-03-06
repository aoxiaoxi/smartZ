<?php
/**
 * Created by PhpStorm.
 * User: zhangyingren
 * Date: 2018/7/30
 * Time: 11:29
 */

//初始化常量
defined('VENDER_PATH') or define('VENDER_PATH',__DIR__.'/');

defined('APP_PATH') or define('APP_PATH',ROOT_PATH.'application/');

defined('CONFIG_PATH') or define('CONFIG_PATH',ROOT_PATH.'config/');

defined('RUNTIME_PATH') or define('RUNTIME_PATH',ROOT_PATH.'runtime/');

defined('RESOURCES_PATH') or define('RESOURCES_PATH',ROOT_PATH.'resources/');

//加载配置文件
require CONFIG_PATH.'/config.php';

//加载核心文件
require VENDER_PATH.'Core.php';

//实例化核心类
$core = new Core();
$core->run();
