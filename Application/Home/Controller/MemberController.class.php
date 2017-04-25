<?php
/**
 * 会员控制器
 */
namespace Home\Controller;
use Home\Controller\CommonController;

class MemberController extends CommonController{
    /**
     * 会员登录
     */
    public function login(){
        $this->display();
    }

    /**
     * 会员注册
     */
    public function register(){
        $this->display();
    }
}