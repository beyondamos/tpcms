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


	public function edit(){
		if(IS_POST){
			$role_model = D('Role');
			if($role_model->create()){
				if($role_model->save()){
					$this->success('角色编辑成功',U('Role/listing'),1);
				}else{
					$this->error('角色编辑失败');
				}	
			}else{
				$this->error($role_model->getError());
			}
		}elseif(IS_GET){
			$role_id = I('get.role_id');
			if(!$role_id || $role_id == 1 ) $this->error('未知错误');
			//角色信息
			$role_model = D('Role');
			$role_data = $role_model->getRoleInfo($role_id);
			$this->assign('role_data', $role_data);
			//权限信息
			$auth_model = D('Auth');
			$auth_data = $auth_model->getSortAuth();
			$this->assign('auth_data',$auth_data);
			$this->display();

		}
	}


}