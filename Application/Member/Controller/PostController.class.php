<?php
/**
 * 帖子控制器
 */
namespace Member\Controller;
use Member\Controller\CommonController;

class PostController extends CommonController{
    /**
     * 会员帖子列表
     */
    public function index(){
        $this->display();
    }
}