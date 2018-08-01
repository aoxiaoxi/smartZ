<?php
//应用跟目录
define('ROOT_PATH', dirname(dirname($_SERVER['SCRIPT_FILENAME'])).'/');
// 开启调试模式
define('APP_DEBUG', true);
//应用url
define('APP_URL','http://www.myframe.com');

//加载框架
require ROOT_PATH.'/vender/Src.php';
