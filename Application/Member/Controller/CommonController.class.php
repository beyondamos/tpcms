<?php
/**
 * 会员公共控制器
 */
namespace Member\Controller;
use Think\Controller;

class CommonController extends Controller{
    /**
     * 页面初始化
     */
    public function _initialize(){
        //导航
        $this->nav();
    }

    /**
     * 空操作
     */
    public function _empty($name){

        $this->error('您访问的页面不存在',U('Home/Index/index'),1);
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
}