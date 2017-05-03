<?php
/**
 * 前台公共控制器
 */

namespace Home\Controller;
use Think\Controller;

class CommonController extends Controller{
    /**
     * 页面初始化
     */
    public function _initialize(){
        //判断是否是手机访问，切换主题
        if(is_mobile()){
            C('DEFAULT_THEME','Mobile');
        }

        //统计流量
//        $this->flow();
        //导航
        $this->nav();
    }


    /**
     * 导航页面
     */
    public function nav(){
        //导航页面
        $nav_model = D('Nav');
        $nav_data = $nav_model->where(array('is_show' => '1'))->order('sort asc')->select();
        $this->assign('nav_data', $nav_data);
    }

    /**
     * 页面右侧信息
     */
    public function rightInfo(){
        $article_model = D('Article');
        // $map['is_hot'] = 1;
        $map['status'] = 1;
//        $today = date('Y-m-d',time());
        $five_day_ago = date('Y-m-d', strtotime('-5 day'));
        $map['newstime']  = array('egt',$five_day_ago);
        $right_data = $article_model->alias('a')->field('article_id,title,titleimg,newstime,url,clicks,zan')
            ->join('left join __CATEGORY__ c on c.cate_id = a.cate_id')->where($map)->limit('11')
            ->order('clicks desc')->select();
//        var_dump($right_data);
        $this->assign('right_data', $right_data);
    }

    /**
     * 统计流量
     */
    public function flow(){
        $flow_model = D('Flow');
        $url = $_SERVER['REQUEST_URI'];
        $ip = getIP();
//        echo $ip;
        $ip = explode(',', $ip);
        $real_ip = $ip[0];
        $date = date('Y-m-d',time());
        $time = date('H:i:s',time());
        //判断该页面是否被访问过
        if(!cookie($url)){
           $info =  getIpLookup($ip);
           if(!$info) return false;

           if($info['city']){
               $area = $info['city'];
           }elseif($info['province']){
               $area = $info['province'];
           }else{
               $area = '';
           }
           $data = array('ip' => $ip, 'date' => $date, 'time' => $time, 'area' => $area);
           $flow_model->add($data);
            cookie($url,$url,3600);
        }


    }

}