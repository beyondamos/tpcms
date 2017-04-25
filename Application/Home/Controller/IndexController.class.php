<?php
/**
 * 前台首页控制器
 */
namespace Home\Controller;
use Home\Controller\CommonController;

class IndexController extends CommonController {

    public function index(){
        //右侧信息
        $this->rightInfo();
        //最新信息
        $article_model = D('Article');
        $map = array('status' => 1, 'is_new' => 1 );
        $new_data = $article_model->alias('a')->join('left join __CATEGORY__ c on a.cate_id = c.cate_id')
                                    ->field('article_id,title,titleimg,newstime,synopsis,clicks,url')->where($map)
                                  ->order('article_id desc')->limit('10')->select();
        $this->assign('new_data', $new_data);
        //推荐
        $map = array('status' => 1, 'is_recommend' => 1 );
        $recommed_data = $article_model->alias('a')->join('left join __CATEGORY__ c on a.cate_id = c.cate_id')
                                        ->field('article_id,title,titleimg,newstime,synopsis,clicks,url')->where($map)
                                       ->order('article_id desc')->limit('10')->select();
        $this->assign('recommed_data', $recommed_data);
        $this->display();
    }


}