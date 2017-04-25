<?php
/**
 * 搜索控制器
 */
namespace Home\Controller;
use Home\Controller\CommonController;

class SearchController extends CommonController{

    public function index(){
        if(IS_POST){
            $search = I('post.search');
            if(!$search) $this->error('请输入搜索内容');
            $article_model = D('Article');
            $map = array('status' => 1, 'title' => array('like',"%{$search}%"));
            $search_data = $article_model->alias('a')->join('left join __CATEGORY__ c on a.cate_id = c.cate_id')->field('a.*,c.*')
                                ->where($map)->order('article_id desc')->select();
            $this->assign('search_data', $search_data);
            //右侧信息
            $this->rightInfo();
            $this->display();
        }else{
            $this->display();
        }

    }


}