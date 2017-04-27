<?php
namespace Business\Controller;
use Business\Controller\CommonController;

class LoginController extends CommonController{
    /*
     * 登录
     */
    public function index(){
        if(IS_POST){

        }else{
            $this->display();
        }
    }



}