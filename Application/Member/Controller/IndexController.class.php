<?php
/**
 * 会员首页控制器
 */
namespace Member\Controller;
use Member\Controller\CommonController;

class IndexController extends CommonController{
    /**
     * 会员中心首页
     */
    public function index(){
        $this->display();
    }


}