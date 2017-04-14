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





}