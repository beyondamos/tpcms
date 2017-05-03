<?php
/**
 * 前台首页控制器
 */
namespace Home\Controller;
use Home\Controller\CommonController;

class IndexController extends CommonController {

    public function index(){
        //seo信息
        $config_model = D('Config');
        $this->assign('site_title', $config_model->where(array('conf_name' => 'site_title'))->getField('conf_value'));
        $this->assign('site_keywords', $config_model->where(array('conf_name' => 'site_keywords'))->getField('conf_value'));
        $this->assign('site_desc', $config_model->where(array('conf_name' => 'site_desc'))->getField('conf_value'));

        //友情链接
        $friendlink_data = D('Friendlink')->select();
        $this->assign('friendlink_data', $friendlink_data);

        //广告
        $adv_model = D('Adv');
        //生活馆专享广告
        $life_adv = $adv_model->where(array('id' => 1))->getField('adv_code');
        $this->assign('life_adv', $life_adv);
        //首页上广告
        $adv_1 = $adv_model->where(array('id' => 2))->getField('adv_code');
        $this->assign('adv_1', $adv_1);
        //首页中广告
        $adv_2 = $adv_model->where(array('id' => 3))->getField('adv_code');
        $this->assign('adv_2', $adv_2);
        //首页下广告
        $adv_3 = $adv_model->where(array('id' => 4))->getField('adv_code');
        $this->assign('adv_3', $adv_3);




        //最新信息(移动端)
        $article_model = D('Article');
        $map = array('status' => 1 );
        $new_data = $article_model->alias('a')->join('left join __CATEGORY__ c on a.cate_id = c.cate_id')
                                    ->field('article_id,title,titleimg,newstime,synopsis,clicks,url,content')->where($map)
                                  ->order('newstime desc')->limit('10')->select();


        $this->assign('new_data', $new_data);
        $this->display();
    }

    /**
     * 首页点击获得更多
     */
    public function showMore(){
        $start = I('post.start') * 10;
        $article_model = D('Article');
        $map = array('status' => 1);
        $new_data = $article_model->alias('a')->join('left join __CATEGORY__ c on a.cate_id = c.cate_id')
            ->field('article_id,title,titleimg,newstime,synopsis,clicks,url,content')->where($map)
            ->order('newstime desc')->limit($start.',10')->select();
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