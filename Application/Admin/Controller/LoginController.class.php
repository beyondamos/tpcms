<?php
/**
 * 登录控制器
 */
namespace Admin\Controller;
use Admin\Controller\CommonController;

class LoginController extends CommonController{
    /**
     * 登录页面
     */
    public function index(){
    	if(IS_POST){
    		//先检测验证码
    		$code = I('post.verify');
    		if(!$this->check_verify($code)) $this->error('验证码错误');
    		$user_model = D('User');
    		if($user_model->login(I('post.username'), I('post.password'))){
				//验证登录成功之后的操作  通过session中的user_id 保存其他信息 更新数据库信息
				$user_model->afterLogin();
    			$this->success('登录成功', U('Admin/Index/index') ,1);
    		}else{
    			$this->error('用户名或者密码错误');
    		}	
    	}else{
    		$this->display();
    	}
        
    }

    /**
     * 验证码
     */
    public function verify(){
    	$config =    array(
		    'fontSize'    =>    30,    // 验证码字体大小
		    'length'      =>    4,     // 验证码位数
		    'useNoise'    =>    false, // 关闭验证码杂点
		    'useCurve'	  =>    false, // 关闭曲线干扰
		);
    	$verify = new \Think\Verify($config);
    	$verify->entry();
    }

    /**
     * 验证码检测
     * @param  [type] $code [description]
     * @return [type]       [description]
     */
    public function check_verify($code){
	    $verify = new \Think\Verify();
	    return $verify->check($code);
	}

    /**
     * 退出登录
     */
    public function logout(){
        session(null);
        $this->success('退出成功',U('Admin/Login/index') ,1);
    }

}