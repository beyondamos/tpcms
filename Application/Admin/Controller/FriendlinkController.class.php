<?php
/**
 * 友情链接控制器
 */
namespace Admin\Controller;
use Admin\Controller\CommonController;

class FriendlinkController extends CommonController{
    /**
     * 友情链接列表展示
     */
    public function index(){
        $this->display();
    }

}