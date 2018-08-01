<?php
/**
 * Created by PhpStorm.
 * User: zhangyingren
 * Date: 2018/8/1
 * Time: 10:33
 */
class UserController extends Controller{

    public function index($arg1,$arg2){
        $user = new UserModel();
        $userList = $user->selectAll();

        $this->assign('arg1',$arg1);
        $this->assign('arg2',$arg2);
        $this->assign('title','用户信息');
        $this->assign('userlist',$userList);
    }

}