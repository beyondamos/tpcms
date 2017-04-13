<?php
/**
 * 后台登录控制器
 */
namespace Admin\Controller;
use Admin\Controller\CommonController;

class LoginController extends CommonController{
	/**
	 * 后台登录
	 * @return [type] [description]
	 */
	public function index(){
		$this->display();
	}


	/**
	 * 登录
	 * @return [type] [description]
	 */
	public function login(){
		if(IS_POST){
			var_dump(I('post.'));
		}
		
	}

}
