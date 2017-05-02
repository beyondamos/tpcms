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
        if(is_mobile()){
            C('DEFAULT_THEME','Mobile');
        }
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


}