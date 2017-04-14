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
		array('password', 'require', '密码不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
		array('password', 'checkPassword', '密码必须为8-16的大小写字母、数字、下划线的组合', self::MUST_VALIDATE, 'callback', self::MODEL_BOTH),
		array('password2', 'require', '重复密码不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
		array('password2', 'password', '两次密码不一致', self::MUST_VALIDATE, 'confirm', self::MODEL_BOTH),
		array('email', 'email', '邮箱格式不正确', self::VALUE_VALIDATE, 'regex', self::MODEL_BOTH),
		array('role_id', '0', '必须选择用户角色', self::MUST_VALIDATE, 'notequal', self::MODEL_BOTH),
 
	);

	protected $_auto = array(
		array('salt', 'salt', self::MODEL_INSERT, 'callback'),
		array('last_login_time', '0', self::MODEL_INSERT, 'string'),
		array('last_login_ip', '0', self::MODEL_INSERT, 'string'),
		array('add_time', 'time', self::MODEL_INSERT, 'function'),
		array('login_number', '0', self::MODEL_INSERT, 'string'),
		array('status', '1', self::MODEL_INSERT, 'string'),
		array('password', 'generatePassword', self::MODEL_INSERT, 'callback'),
	);

	/**
	 * 生成密码
	 * @return string  生成的用户密码
	 */
	protected function generatePassword($password){
		return md5($password.session('salt'));
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
	 * 获取用户信息
	 * @return [type] [description]
	 */
	public function getUsers(){
		// $this->join("LEFT JOIN __ROLE__ ")
	}




}