<?php
/**
 * 权限模型
 */
namespace Common\Model;
use Think\Model;

class AuthModel extends Model{

	/**
	 * 获得排好序的权限列表
	 * @return array [description]
	 */
	public function getSortAuth(){
		$auth_info = $this->order('auth_id asc')->select();
		$list = array();
		foreach($auth_info as $val){
			if($val['parent_id'] == 0){
				$list[$val['auth_id']][] = $val;
			}else{
				$list[$val['parent_id']][] = $val; 
			}
			
		}
		return $list;
	}


}