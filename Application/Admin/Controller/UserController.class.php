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
		$user_data = $user_model->alias('u')->join('left join __ROLE__ r on u.role_id = r.role_id')->select();
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
				if(I('post.password'))  //如果密码存在，就更改密码
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

	/**
	 * 修改个人资料
	 */
	public function modifypersonal(){
		if(IS_POST){
			$user_model = D('User');
			if($user_model->create()){
				if(I('post.password'))  //如果密码存在，就更改密码
				$user_model->password = $user_model->generatePasswordUpdate(I('post.user_id'),I('post.password'));
				if($user_model->save()){
					$user_info = $user_model->find(I('post.user_id'));
					session('user_id',$user_info['user_id']);
					session('username',$user_info['username']);
					session('role_id',$user_info['role_id']);
					session('last_login_time',$user_info['last_login_time']);
					session('last_login_ip', $user_info['last_login_ip']);
					$this->success('修改个人资料成功');
				}else{
					$this->error('修改个人资料失败');
				}
			}else{
				$this->error($user_model->getError());
			}
		}else{
			$user_model = D('User');
			$user_data = $user_model->find(session('user_id'));
			$this->assign('user_data', $user_data);
			$this->display();
		}

	}

}