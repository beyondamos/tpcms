<?php
namespace Business\Controller;
use Think\Controller;

class CommonController extends Controller{

    /**
     * 控制器初始化
     */
    public function _initialize(){
        $array_filter = array('Login/index','Login/logout');
        $current = CONTROLLER_NAME.'/'.ACTION_NAME;
        if(!in_array($current,$array_filter)){
            if(!$this->isLogin()) $this->error('您尚未登录！',U('Login/index'),2);
        }


    }

    /**
     * 判断是否已经登录
     * @return boolean [description]
     */
    private function isLogin(){
        if(session('business_user_id') && session('business_user_id') > 0) return true;
        return false;
    }

}
