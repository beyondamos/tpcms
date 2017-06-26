<?php
/**
 * 会员控制器
 */
namespace Member\Controller;
use Member\Controller\CommonController;

class LoginController extends CommonController{



    // /**
    //  * 会员登录
    //  */
    // public function index(){
    //     $this->display();
    // }

    /**
     * 会员注册
     */
    public function register(){
        $this->display();
    }

    /**
     * 退出登录
     */
    public function logout(){
        session('url', $_SERVER['HTTP_REFERER']);
        session('member_id',null);
        session('member_name',null);
        header("Location:".session('url'));
    }

    /**
     * 微信扫码登录
     */
    public function wechatLogin(){
        //-------配置
        $AppID = 'wxd004e24814da66b1';
        $AppSecret = '31edaa8a8993099d82d8c2699e8a24f4';
//        $callback  =  urlencode('http://test.ishequan.cn/home/wx_oauth.php'); //回调地址
        $callback  =  urlencode(U('Member/Login/wechatLoginCallback','',true,true));//回调地址
        //-------生成唯一随机串防CSRF攻击
        $state  = md5(uniqid(rand(), TRUE));
        session('wx_state',$state);
        session('url', $_SERVER['HTTP_REFERER']);
        $wxurl = "https://open.weixin.qq.com/connect/qrconnect?appid=".$AppID."&redirect_uri=".$callback."&response_type=code&scope=snsapi_login&state=".$state."#wechat_redirect";
        header("Location: $wxurl");
    }

    /**
     * 微信登录回调地址
     */
    public function wechatLoginCallback(){

        if(I('get.state') != session('wx_state')){
            $this->error('系统错误',session('url'),2);
        }

        $AppID = 'wxd004e24814da66b1';
        $AppSecret = '31edaa8a8993099d82d8c2699e8a24f4';
        $url='https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$AppID.'&secret='.$AppSecret.'&code='.$_GET['code'].'&grant_type=authorization_code';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_URL, $url);
        $json =  curl_exec($ch);
        curl_close($ch);
        $arr=json_decode($json,1);
        //得到 access_token 与 openid
        // print_r($arr);
        $url='https://api.weixin.qq.com/sns/userinfo?access_token='.$arr['access_token'].'&openid='.$arr['openid'];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_URL, $url);
        $json =  curl_exec($ch);
        curl_close($ch);
        $arr = json_decode($json,1);


        /**
         * 用户登录判断
         * 如果用户已经存在，更新登录时间
         * 未存在，添加记录
         */
        $time = time();

        $member_model = D('Member');
        $member_info = $member_model->where(array('openid' => $arr['openid']))->find();
        if($member_info){
            //用户已经存在
            //更新下登录时间
            $member_model->where(array('id' => $member_info['id']))->save(array('last_login_time' => $time));
            $member_id = $member_info['id'];
        }else{
            //用户不存在
            //得到 用户资料
            $info = array(
                        'name'  =>  $arr['nickname'],
                        'city'  =>  $arr['city'],
                        'reg_time'  =>  $time,
                        'last_login_time'   =>  $time,
                        'sex'   =>  $arr['sex'],
                        'head_pic'  => $arr['headimgurl'],
                        'province'  =>  $arr['province'],
                        'openid'    =>  $arr['openid'],
                        'status'    =>  0
                    );
            $member_id = $member_model->add($info);
        }

        session('member_id', $member_id);
        session('member_name', $arr['nickname']);

        //跳转回登录前的页面
        header("Location:".session('url'));
    }

}