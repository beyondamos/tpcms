<?php
/**
 * 用户控制器
 */
namespace Admin\Controller;
use Admin\Controller\CommonController;

class UserController extends CommonController{
    /**
     * 用户列表
     */
    public function listing(){
    	//管理员信息
    	$user_model = D('User');
    	$user_data = $user_model->alias('u')->join('left join __ROLE__ r on u.role_id = r.role_id')->select();
    	$this->assign('user_data', $user_data);
        $this->display();
    }

    /**
     * 用户添加
     */
    public function add(){
    	if(IS_POST){
    		 $user_model=D('User');
    		 if($user_model->create()){
    		 	if($user_model->add()){
    		 		$this->success('用户添加成功', U('User/listing'),1);
    		 	}else{
    		 		$this->error('用户添加失败');
    		 	}
    		 }else{
    		 	$this->error($user_model->getError());
    		 }
    	}elseif(IS_GET){
    		//角色信息
    		$role_model = D('Role');
    		$role_data = $role_model->select();
    		$this->assign('role_data',$role_data);
    		$this->display();
    	}

    }
    
    /**
     * 用户编辑
     */
    public function edit(){
        if(IS_POST){
            $user_model = D('User');
            if($user_model->create()){
            if(I('post.password')) //如果密码不为空
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
            //用户信息
            $user_id = I('get.user_id');
            $user_model = D('User');
            $user_data = $user_model->find($user_id);
            $this->assign('user_data',$user_data);
            //角色信息
            $role_model = D('Role');
            $role_data = $role_model->select();
            $this->assign('role_data',$role_data);
            $this->display();
        }
    }

    /**
     * 管理员删除
     * @return [type] [description]
     */
    public function delete(){
        $user_id = I('get.user_id');
        if(!$user_id && $user_id == 1) $this->error('系统错误');
        $user_model = D('User');
        if($user_model->deleteUser($user_id)){
            $this->success('删除用户成功',U('User/listing'),1);
        }else{
            $this->error('删除用户失败');
        }
    }

    /**
     * 修改个人密码
     * @return [type] [description]
     */
    public function password(){
        if(IS_POST){
            //先判断获得的密码是否正确
            if(!I('post.oldpassword')) $this->error('原密码必须填写');
            $user_model = D('User');
            if($user_model->validatePassword(I('post.user_id'), I('post.oldpassword'))){
                if(I('post.password') && I('post.password2')){
                    if($user_model->create()){
                        $user_model->password = $user_model->generatePasswordUpdate(I('post.user_id'), I('post.password'));
                        if($user_model->save()){
                            $this->success('密码修改成功', U('Admin/Index/index'), 1);
                        }else{
                            $this->error('密码修改失败');
                        }
                    }else{
                        $this->error($user_model->getError());
                    }
                }else{
                    $this->error('无效的修改密码操作');
                }
            }else{
                $this->error('旧密码输入错误');
            }

        }else{
            $this->display();
        }   
    }

}
