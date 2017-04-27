<?php
/**
 * 参与记录控制器
 */
namespace Business\Controller;
use Business\Controller\CommonController;

class PartakeController extends CommonController{
    /**
     * 活动记录列表
     */
    public function index(){
        $this->display();
    }

    public function search(){
        $this->display();
    }

}