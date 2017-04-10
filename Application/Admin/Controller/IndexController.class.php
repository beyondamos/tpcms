<?php
/**
 * 后台首页控制器
 */
namespace Admin\Controller;
use Admin\Controller\CommonController;

class IndexController extends CommonController{
	public function index(){
		$this->display();
	}

	public function head(){
		$this->display();
	}

	public function left(){
		$this->display();
	}

	public function main(){
		$this->display();
	}
}