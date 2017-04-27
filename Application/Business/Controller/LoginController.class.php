<?php
namespace Business\Controller;
use Business\Controller\CommonController;

class LoginController extends CommonController{
    /*
     * 登录
     */
    public function index(){
        if(IS_POST){
            $user_name = trim(I('post.user_name'));
            $pwd = trim(I('post.pwd'));
            if(!$user_name || !$pwd) $this->error('用户名密码必须填写');
            $business_model = D('Business');
            if($business_model->login($user_name,$pwd)){
                $this->success('登录成功', U('Index/index'), 1);
            }else{
                $this->error('用户名或者密码错误');
            }
        }else{
            $this->display();
        }
    }

    /**
     * 退出
     */
    public function logout(){
        session(null);
        $this->success('退出成功',U('Login/index') ,1);
    }

}