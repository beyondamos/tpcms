<?php
/**
 * 后台公共控制器
 */
namespace Admin\Controller;
use Think\Controller;

class CommonController extends Controller{
	/**
	 * 初始化控制器
	 * @return [type] [description]
	 */
	public function _initialize(){
		$array_filter = array('Login/index','Login/verify','Login/logout');
		$current = CONTROLLER_NAME.'/'.ACTION_NAME;
		if(!in_array($current,$array_filter)){
			if(!$this->isLogin()) $this->error('您尚未登录！',U('Login/index'),2);
		}
		//获取用户信息
		$user_model = D('User');
		$login_user_data = $user_model->find(session('user_id'));
		$this->assign('login_user_data',$login_user_data);


		//获取用户角色信息
		$role_model = D('Role');
		$role_info = $role_model->find($login_user_data['role_id']);
		$this->assign('role_info',$role_info);

		//所有权限列表
		$auth_model = D('Auth');
		$all_auth_list = $auth_model->select();
		//获取角色权限列表
		$user_auth = $role_info['auth_list'];
		if( $user_auth == 'all'){
			$user_auth_list = $all_auth_list;
		}else{
			$map['auth_id'] = array('in',$user_auth);
			$user_auth_list = $auth_model->where($map)->select();
		}
		$auth_list = $auth_model->getSortAuth($user_auth_list); //排序
		$this->assign('user_auth_list',$auth_list);
		$url_auth_list = $auth_model->urlAuth($user_auth_list);
//		var_dump($url_auth_list);
		//进行权限限制 首先不是在通用过滤权限内
		$array_filter[] = 'Index/index';//首页默认谁都可以查看
		if(!in_array($current,$array_filter)){
			if(!in_array($current,$url_auth_list)) $this->error('您的用户等级无权进行此项操作');
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