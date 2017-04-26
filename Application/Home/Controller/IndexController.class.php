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

    /**
     * 首页点击获得更多
     */
    public function showMore(){
        $start = I('post.start') * 10;
        $article_model = D('Article');
        $map = array('status' => 1, 'is_new' => 1 );
        $new_data = $article_model->alias('a')->join('left join __CATEGORY__ c on a.cate_id = c.cate_id')
            ->field('article_id,title,titleimg,newstime,synopsis,clicks,url')->where($map)
            ->order('article_id desc')->limit($start.',10')->select();
        $this->assign('new_data', $new_data);
        $this->display();
    }

    /**
     * 展示所有栏目名称
     */
     public function showCategories(){
         $category_model = D('Category');
         $category_data = $category_model->select();
         $this->assign('category_data', $category_data);
         $this->display();
     }






}