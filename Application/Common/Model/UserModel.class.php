<?php
/**
 * 用户模型
 */
namespace Common\Model;
use Think\Model;

class UserModel extends Model{

	protected $_validate = array(
		array('username', 'require', '用户名不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
		array('username', '', '用户名已经存在', self::MUST_VALIDATE, 'unique', self::MODEL_BOTH),
		array('password', 'require', '密码不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_INSERT),
		array('password', 'checkPassword', '密码必须为8-16的大小写字母、数字、下划线的组合', self::VALUE_VALIDATE, 'callback', self::MODEL_BOTH),
		array('password2', 'require', '重复密码不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_INSERT),
		array('password2', 'password', '两次密码不一致', self::MUST_VALIDATE, 'confirm', self::MODEL_BOTH),
		array('email', 'email', '邮箱格式不正确', self::VALUE_VALIDATE, 'regex', self::MODEL_BOTH),
		array('role_id', '0', '必须选择用户角色', self::MUST_VALIDATE, 'notequal', self::MODEL_BOTH),
		array('nickname', 'require', '昵称不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
 
	);

	protected $_auto = array(
		array('salt', 'salt', self::MODEL_INSERT, 'callback'),
		array('last_login_time', '0', self::MODEL_INSERT, 'string'),
		array('last_login_ip', '0', self::MODEL_INSERT, 'string'),
		array('add_time', 'time', self::MODEL_INSERT, 'function'),
		array('status', '1', self::MODEL_INSERT, 'string'),
		array('password', 'generatePassword', self::MODEL_INSERT, 'callback'),
		array('password', '', self::MODEL_UPDATE, 'ignore'),
	);

	/**
	 * 生成密码
	 * @return string  生成的用户密码
	 */
	protected function generatePassword($password){
		return md5($password.session('salt'));
	}

	/**
	 * 编辑时生成密码
	 * @param  int $user_id 用户id
	 * @param  string $password 用户密码
	 */
	public function generatePasswordUpdate($user_id,$password){
		$salt = $this->where(array('user_id' => $user_id))->getField('salt');
		if(!$salt) return false;
		return md5($password.$salt);
	}
	 

	/**
	 * 生成密码盐
	 */
	protected function salt(){
		$str = 'abcdefghijklmnopqstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		$length = strlen($str)-1;
		$salt = '';
		for($i = 0; $i < 6; $i++){
			$j = mt_rand(0,$length);
			$salt .= $str[$j];
		}
		session('salt',$salt);
		return $salt;
	}


	/**
	 * 检验密码格式是否正确
	 * 密码只能为数字大小写字母和下划线
	 * 密码位数必须为8到16位之间
	 * @param  string $password 需要验证的密码
	 * @return boolean 验证成功返回true 验证失败返回false
	 */
	protected function checkPassword($password){
		if(preg_match('/^[A-Za-z0-9_]{8,16}$/',$password)) return true;
		return false;
	}

	/**
	 * 删除用户
	 * @param  [type] $user_id [description]
	 * @return [type]          [description]
	 */
	public function deleteUser($user_id){
		//第一个管理员不能删除
		if($user_id == 1) return false;
		$user_info = $this->find($user_id);
		//不存在用户
		if(!$user_info) return false;
		//删除失败
		if(!$this->delete($user_id)) return false;
		return true;
	}

	/**
	 * 登录判断
	 * @param  string $username 用户名
	 * @param  string $password 用户密码
	 * @return boolean 成功返回true 失败返回false
	 */
	public function login($username,$password){
		$username = trim($username);
		$password = trim($password);
		$user_info = $this->where(array('username' => $username))->find();
		if(!$user_info) return false;
		$salt = $user_info['salt'];
		if($user_info['password'] != md5($password.$salt)) return false;
		session('user_id',$user_info['user_id']);
		return true;
	}

	/**
	 * 验证密码是否正确
	 * @param int $user_id	用户id
	 * @param string $password 提交上来的密码
	 * @return 验证密码相同 返回true  否则返回false
	 */
	public function validatePassword($user_id,$password){
		$user_info = $this->field('password,salt')->find($user_id);
		if($user_info['password'] == md5($password.$user_info['salt'])) return true;
		return false;
	}

	/**
	 * 登录成功之后的操作
	 * 通过session中保存的user_id 获取信息和保存信息
	 */
	public function afterLogin(){
		$user_id = session('user_id');
		$user_info = $this->find($user_id);
		session('login_times', $user_info['login_times']);
		session('last_login_time', $user_info['last_login_time']);
		session('last_login_ip', $user_info['last_login_ip']);
		$login_times = $user_info['login_times'] + 1;
		$data = array(
			'user_id' => $user_id,
			'login_times' => $login_times,
			'last_login_time' => time(),
			'last_login_ip' => ip2long(get_client_ip()),
		);
		$this->save($data);
	}


}