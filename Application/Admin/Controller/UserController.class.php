<?php
/**
 * 用户控制器
 */
namespace Admin\Controller;
use Admin\Controller\CommonController;

class UserController extends CommonController{
	/**
	 * 用户列表
	 * @return [type] [description]
	 */
	public function listing(){
		$user_model = D('User');
		$user_data = $user_model->select();
		$this->assign('user_data',$user_data);
		$this->display();
	}

	/**
	 * 用户添加
	 */
	public function add(){
		if(IS_POST){
			$user_model = D('User');
			if($user_model->create()){
				if($user_model->add()){
					$this->success('用户添加成功',U('User/listing'),1);
				}else{
					$this->error('用户添加失败');
				}
			}else{
				$this->error($user_model->getError());
			}
		}else{
			$role_model = D('Role');
			$role_data = $role_model->select();
			$this->assign('role_data',$role_data);
			$this->display();
		}
	}

	/**
	 * 用户编辑
	 * @return [type] [description]
	 */
	public function edit(){
		if(IS_POST){
			$user_model = D('User');
			if($user_model->create()){
				$user_model->password = $user_model->generatePasswordUpdate(I('post.user_id'),I('post.password'));
				if($user_model->save()){
					$this->success('用户编辑成功',U('User/listing'),1);
				}else{
					$this->error('用户编辑失败');
				}
			}else{
				$this->error($user_model->getError());
			}
		}elseif(IS_GET){
			$user_id = I('get.user_id');
			if(!$user_id) $this->error('未知错误');
			$user_model = D('User');
			//用户信息
			$user_data = $user_model->find($user_id);
			if(!$user_data) $this->error('不存在的用户');
			$this->assign('user_data', $user_data);
			//角色信息
			$role_model = D('Role');
			$role_data = $role_model->select();
			$this->assign('role_data',$role_data);
			$this->display();
		}
	}

	/**
	 * 用户删除
	 * @return [type] [description]
	 */
	public function delete(){
		$user_id = I('get.user_id');
		if(!$user_id || $user_id == 1 ) $this->error('未知错误');
		if(D('User')->deleteUser($user_id)){
			$this->success('用户删除成功', U('User/listing'), 1);
		}else{
			$this->error('用户删除失败');
		}
	}

}