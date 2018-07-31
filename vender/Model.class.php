<?php
/**
 * Created by PhpStorm.
 * User: zhangyingren
 * Date: 2018/7/31
 * Time: 13:56
 */
class Model extends Sql{

    protected $_table;

    public function __construct(){
        $this->connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
    }
}