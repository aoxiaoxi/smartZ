<?php
/**
 * Created by PhpStorm.
 * User: zhangyingren
 * Date: 2018/7/31
 * Time: 10:38
 */
class Sql{

    protected $hander;

    public function __construct(){

    }

    public function connect($host,$user,$pass,$dbname){
        try{
            $dsn = sprintf("mysql:host=%s;dbname=%s;charset=utf8", $host, $dbname);

            $this->hander = new PDO($dsn,$user,$pass,[PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);
        }catch (\Exception $e){
            exit('错误'.$e->getMessage());
        }

    }

    //查询所有
    public function selectAll(){
        $sql = sprintf("select * from `%s`",$this->_table);

        $pre = $this->hander->prepare($sql);

        $pre->execute();

        return $pre->fetchAll();
    }

    //根据某一字段查询
    public function where($field,$value){
        $sql = sprintf("select * from `%s` where `%s` = '%s'",$this->_table,$field,$value);

        $pre = $this->hander->prepare($sql);

        $pre->execute();

        return $pre->fetch();
    }

    //根据某一字段删除
    public function delete($field,$value){
        $sql = sprintf("delete from `%s` where `%s` = '%s'",$this->_table,$field,$value);

        $pre = $this->hander->prepare($sql);

        $pre->execute();

        return $pre->fetch();
    }

    //自己写原生sql查询
    public function select($sql){
        $pre = $this->hander->prepare($sql);

        $pre->execute();

        return $pre->fetch();
    }

    //新增
    public function insert(array $data){
        $sql = sprintf("insert into `%s` %s",$this->_table,$this->formatInsert($data));

        return $this->query($sql);
    }

    public function formatInsert($data){
        $fieldArr = [];
        $valueArr = [];

        foreach ($data as $key=>$val){
            $fieldArr[] = sprintf("`%s`",$key);
            $valueArr[] = sprintf("'%s'",$key);
        }

        $field = implode(',',$fieldArr);
        $value = implode(',',$valueArr);

        return sprintf("(%s) values (%s)",$field,$value);
    }

    //修改
    public function update(array $data,$field,$value){
        $sql = sprintf("update `%s` set %s where `%s` = '%s'",$this->_table,$this->formatUpdate($data),$field,$value);

        return $this->query($sql);
    }

    public function formatUpdate($data){
        $arr = [];

        foreach ($data as $key=>$val){
            $arr[] = sprintf("`%s` = '%s'",$key,$val);
        }

        return implode(',',$arr);
    }
}