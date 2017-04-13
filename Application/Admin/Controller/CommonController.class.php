<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 后台公共控制器
 */
class CommonController extends Controller{

	/**
	 * 初始化控制器
	 * @return [type] [description]
	 */
	public function _initialize(){
		$array_filter = array('Login/index','Login/verify');
		$current = CONTROLLER_NAME.'/'.ACTION_NAME;
		if(!in_array($current,$array_filter)){
			if(!$this->isLogin()) $this->error('您尚未登录！',U('Login/index'),2);
		}
		
	}



	/**
	 * 判断是否已经登录
	 * @return boolean [description]
	 */
	private function isLogin(){
		if(session('user_id') && session('user_id') > 0) return true;
		return false;
	}

}