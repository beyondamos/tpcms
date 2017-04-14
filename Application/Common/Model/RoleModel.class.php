<?php
/**
 * 角色模型
 */
namespace Common\Model;
use Think\Model;

class RoleModel extends Model{
	protected $_validate = array(
		array('role_name', 'require', '角色名称不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
		array('role_name', '', '角色名称已经存在', self::MUST_VALIDATE, 'unique', self::MODEL_BOTH),
		array('role_desc', '1,256', '角色描述不能超过256个字符', self::VALUE_VALIDATE, 'length', self::MODEL_BOTH),
		array('auth_list', 'checkAuth', '必须选择权限', self::MUST_VALIDATE, 'callback', self::MODEL_BOTH),
	);

	protected $_auto = array(
		array('auth_list', 'getAuth', self::MODEL_BOTH, 'callback'),
	);

	/**
	 * 验证表单选择的权限
	 * @param array $array 提交的权限数组
	 * @return Boolean 
	 */
	protected function checkAuth($array){
		if(!isset($array)) return false;
		if(count($array) < 2) return false; 
		return true; 
	}

	/**
	 * @param $array $auth 需要处理的权限列表
	 * @return string 处理完毕的权限字符串
	 */
	protected function getAuth($array){
		return implode(',',$array);
	}

	/**
	 * 获取角色信息 主要是将权限字段信息变成数组
	 * @param  int $role_id 角色id
	 * @return [type]          [description]
	 */
	public function getRoleInfo($role_id){
		$role_data = $this->find($role_id);
		$role_data['auth_list'] = explode(',', $role_data['auth_list']);
		return $role_data;
	}

}