<?php
/**
 * 文章控制器
 */
namespace Home\Controller;
use Home\Controller\CommonController;
use Common\Model\JSSDK;

class ArticleController extends CommonController{
    /**
     * 文章详情页面展示
     */
    public function detail(){
        //微信分享
        $jssdk = new JSSDK("wx6b02d891922e20f3", "5442fd3ad6d5cc081569d5e13c65fb92");
        $signPackage = $jssdk->GetSignPackage();
        $this->assign('signPackage',$signPackage);

        $article_id = I('get.article_id');
        if(!$article_id || $article_id <= 0) $this->error('不存在的页面');
        //文章信息
        $article_model = D('Article');
        $article_data = $article_model->alias('a')->join('left join __CATEGORY__ c on a.cate_id = c.cate_id')->field('a.*,c.*')->find($article_id);
        $this->assign('article_data',$article_data);

        //右侧信息
        $this->rightInfo();
        //相关推荐
        $map = array('status' => 1, 'is_recommend' => 1);
        $related_data = $article_model->alias('a')->join('left join __CATEGORY__ c on a.cate_id = c.cate_id')
                                    ->field('article_id,titleimg,title,newstime,url')->where($map)
                                    ->order('article_id desc')->limit('6')->select();
        $this->assign('related_data', $related_data);
        $this->display();
    }


    /**
     * 文章列表
     */
    public function listing(){
        $cate_name = I('get.cate_name');
        //判断是否是合法存在的栏目名称
        $category_model = D('Category');
        $cate_data = $category_model->where(array('url' => $cate_name))->find();
        if(!$cate_data) $this->error('不存在栏目分类');
        $this->assign('cate_data', $cate_data);
        //最新信息
        $article_model = D('Article');
        $map = array('status' => 1, 'is_new' => 1 , 'c.cate_id' => $cate_data['cate_id']);
        $new_data = $article_model->alias('a')->join('left join __CATEGORY__ c on a.cate_id = c.cate_id')
            ->field('article_id,title,titleimg,newstime,synopsis,clicks,url')->where($map)
            ->order('article_id desc')->limit('10')->select();
        $this->assign('new_data', $new_data);
//        $count = $article_model->count();
//        $page = new \Think\Page($count,1);
//        $show = $page->show();
//        $this->assign('show',$show);
        //推荐
        $map = array('status' => 1, 'is_recommend' => 1 , 'c.cate_id' => $cate_data['cate_id']);
        $recommed_data = $article_model->alias('a')->join('left join __CATEGORY__ c on a.cate_id = c.cate_id')
            ->field('article_id,title,titleimg,newstime,synopsis,clicks,url')->where($map)
            ->order('article_id desc')->limit('10')->select();
        $this->assign('recommed_data', $recommed_data);




        //右侧信息
        $this->rightInfo();
        $this->display();
    }

}