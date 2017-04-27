<?php
/**
 * 活动控制器
 */
namespace Business\Controller;
use Business\Controller\CommonController;

class ActivityController extends CommonController{
    /**
     * 活动列表
     */
    public function index(){
        $this->display();
    }


}