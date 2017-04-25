<?php
/**
 * 自定义页面
 */
namespace Home\Controller;
use Home\Controller\CommonController;

class CustomController extends CommonController{
    /**
     * 关于社圈
     */
    public function about(){
        $this->display();
    }

    /**
     * 广告服务
     */
    public function ad(){
        $this->display();
    }

    /**
     * 隐私政策
     */
    public function privacy(){
        $this->display();
    }

    /**
     * 法律声明
     */
    public function law(){
        $this->display();
    }

    /**
     * 加入我们
     */
    public function joinUs(){
        $this->display();
    }

}