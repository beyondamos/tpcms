<?php
/**
 * 权限模型
 */
namespace Common\Model;
use Think\Model;

class AuthModel extends Model{

	/**
	 * 获得排好序的权限列表
	 * @param array $auth_info 需要排序的权限列表
	 * @return array [description]
	 */
	public function getSortAuth($auth_info){
//		$auth_info = $this->order('auth_id asc')->select();
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

	/**
	 * 获得所有权限列表
	 */
	public function getSort(){
		return $this->order('auth_id asc')->select();
	}

	/**
	 * 获取权限列表的纯路由部分信息
	 * @param array $array 需要处理的数据
 	 * @return array
	 */
	public function urlAuth($array){
		$list = array();
		foreach($array as $val){
			$list[] = $val['auth_url'];
		}
		return array_filter($list);
	}

}