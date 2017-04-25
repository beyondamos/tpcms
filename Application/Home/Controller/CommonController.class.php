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
        $map['is_hot'] = 1;
        $map['status'] = 1;
        $right_data = $article_model->alias('a')->field('article_id,title,titleimg,newstime,url')
            ->join('left join __CATEGORY__ c on c.cate_id = a.cate_id')->where($map)->limit('11')
            ->order('article_id desc')->select();
        $this->assign('right_data', $right_data);
    }


}