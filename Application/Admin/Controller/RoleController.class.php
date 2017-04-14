<?php
/**
 * 角色控制器
 */
namespace Admin\Controller;
use Admin\Controller\CommonController;

class RoleController extends CommonController{
	/**
	 * 角色列表
	 */
	public function listing(){
		$role_model = D('Role');
		$role_data = $role_model->select();
		$this->assign('role_data',$role_data);
		$this->display();
	}

	/**
	 * 角色添加
	 */
	public function add(){
		if(IS_POST){
			$role_model = D('Role');
			if($role_model->create()){
				if($role_model->add()){
					$this->success('角色添加成功',U('Role/listing'),1);
				}else{
					$this->error('角色添加失败');
				}
			}else{
				$this->error($role_model->getError());
			}
		}else{
			$auth_model = D('Auth');
			$auth_data = $auth_model->getSortAuth();
			$this->assign('auth_data',$auth_data);
			$this->display();
		}
	}




}