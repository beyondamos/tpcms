<?php
/**
 * 商家用户模型
 */
namespace Common\Model;
use Think\Model;

class BusinessModel extends Model{
    /**
     * 登录验证
     * @param string $username 用户名
     * @param string $pwd   密码
     */
    public function login($username,$pwd){
        $user_info = $this->where(array('user_name' => $username))->find();
        if(!$user_info) return false;
        if($user_info['pwd'] !== md5($pwd)) return false;
        session('business_user_id',$user_info['user_id']);
        return true;
    }
}