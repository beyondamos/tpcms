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
		if(IS_POST){
			$login_info = I('post.');
			if(!$this->checkVerify($login_info['verify'])) $this->ajaxReturn(array('status' => 0, 'error' => '验证码错误'));
			if(!$this->login($login_info['username'],$login_info['password'])) $this->ajaxReturn(array('status'=> 0 ,'error' => '用户名或者密码错误'));
			$this->updateUserInfo();
			// $this->success('登录成功',U('Index/index'),1);
			$this->ajaxReturn(array('status'=> 1 ,'info' => '登录成功'));
		}else{
			$this->display();
		}
	}

	/**
	 * 生成验证码
	 * @return [type] [description]
	 */
	public function verify(){
		$config =    array(
		    'fontSize'    =>    40,    // 验证码字体大小
		    'length'      =>    4,     // 验证码位数
		    'useNoise'    =>    false, // 关闭验证码杂点
		    'useCurve'    =>  false,            // 是否画混淆曲线
		);
		$Verify = new \Think\Verify($config);
		$Verify->entry();
	}

	/**
	 * 检验验证码
	 * @param  string $code 用户填入的验证码
	 * @return [type] [description]
	 */
	private function checkVerify($code){
	    $verify = new \Think\Verify();
	    return $verify->check($code);
	}


	/**
	 * 登录验证 用户名和密码
	 * @param  [type] $username [description]
	 * @param  [type] $password [description]
	 * @return [type]           [description]
	 */
	private function login($username,$password){
		$username = trim($username);
		$password = trim($password);
		$user_model = D('User');
		$user_info = $user_model->where(array('username' => $username))->find();
		if(!$user_info) return false;
		if($user_info['password'] != md5($password)) return false;
		session('user_id',$user_info['user_id']);
		session('username',$user_info['username']);
		session('role_id',$user_info['role_id']);
		session('last_login_time',$user_info['last_login_time']);
		session('last_login_ip', $user_info['last_login_ip']);
		return true;
	}

	/**
	 * 更新用户信息
	 * @return [type] [description]
	 */
	private function updateUserInfo(){
		$user_id = session('user_id');
		$time = time();
		$ip = ip2long(get_client_ip());
		$sql = "update __USER__ set `last_login_time` = '{$time}' ,`last_login_ip` = '{$ip}', `login_number` = login_number + 1 where `user_id` = '{$user_id}'";
		// $user_model = D('User');
		M()->execute($sql);
	}

}
