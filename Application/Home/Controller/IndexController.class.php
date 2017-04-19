<?php
/**
 * 前台首页控制器
 */
namespace Home\Controller;
use Home\Controller\CommonController;
class IndexController extends CommonController {

    /**
     * 首页内容
     */
    public function index(){
        //四条最新信息
        $article_model = D('Article');
        $new_article_data = $article_model->field('article_id,title,titleimg,synopsis')->where(array('status' => '1','is_new'=> 1))->order('article_id')->select();
        $this->assign('new_article_data', $new_article_data);




        $this->display();
    }


}