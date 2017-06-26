<?php
/**
 * 前台首页控制器
 */
namespace Home\Controller;
use Home\Controller\CommonController;

class IndexController extends CommonController {

    public function index(){
        $this->auto_update();

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
        $life_adv = $adv_model->find('1');
        $this->assign('life_adv', $life_adv);
        //首页上广告
        $adv_upper = $adv_model->find('2');
        $this->assign('adv_upper', $adv_upper);
        //首页中广告
        $adv_middle = $adv_model->find('3');
        $this->assign('adv_middle', $adv_middle);
        //首页下广告
        $adv_lower = $adv_model->find('4');
        $this->assign('adv_lower', $adv_lower);


        $article_model = D('Article');
        //PC端信息
        //6条推荐
        $pc_recommend_data = $article_model->alias('a')->join('left join __CATEGORY__ c on a.cate_id = c.cate_id')
                                            ->field('article_id,title,titleimg,url,content')->where(array('status' => 1, 'is_recommend' => 1))
                                            ->order('newstime desc')->limit('6')->select();
        $this->assign('pc_recommend_data', $pc_recommend_data);
        //18条最新信息 去除在首页上已经展示的模块
        $pc_new_data = $article_model->alias('a')->join('left join __CATEGORY__ c on a.cate_id = c.cate_id')
                                    ->field('article_id,title,url,cate_name')->where(array('status' => 1, 'a.cate_id' => array('not in','24,5,3,33,20,36')))
                                    ->order('newstime desc')->limit('18')->select();
        $this->assign('pc_new_data', $pc_new_data);


        //招聘 6条信息
        $pc_hot_data = $article_model->alias('a')->join('left join __CATEGORY__ c on a.cate_id = c.cate_id')
                                    ->where(array('status'=> 1, 'c.cate_id' => '24'))
                                    ->field('article_id,title,url,titleimg,cate_name,content')->order('newstime desc')
                                    ->limit('6')->select();
        $this->assign('pc_hot_data', $pc_hot_data);

        //生活9张图片
        $pc_life_data = $article_model->alias('a')->join('left join __CATEGORY__ c on a.cate_id = c.cate_id')
                                        ->field('article_id,title,url,titleimg')
                                        ->where(array('status' => 1, 'a.cate_id' => '5'))->order('newstime desc')
                                        ->limit('9')->select();
        $this->assign('pc_life_data', $pc_life_data);
        //圈子4条信息
        $pc_quanzi_data = $article_model->alias('a')->join('left join __CATEGORY__ c on a.cate_id = c.cate_id')
                                        ->field('article_id,title,url,titleimg,content')
                                        ->where(array('status' => 1, 'a.cate_id' => '33'))->order('newstime desc')
                                        ->limit('4')->select();
        $this->assign('pc_quanzi_data', $pc_quanzi_data);
        //运动4条信息
        $pc_yundong_data = $article_model->alias('a')->join('left join __CATEGORY__ c on a.cate_id = c.cate_id')
            ->field('article_id,title,url,titleimg,content')
            ->where(array('status' => 1, 'a.cate_id' => '20'))->order('newstime desc')
            ->limit('4')->select();
        $this->assign('pc_yundong_data', $pc_yundong_data);
        //旅行9条信息
        $pc_lvxing_data = $article_model->alias('a')->join('left join __CATEGORY__ c on a.cate_id = c.cate_id')
            ->field('article_id,title,url,titleimg,content')
            ->where(array('status' => 1, 'a.cate_id' => '3'))->order('newstime desc')
            ->limit('9')->select();
        $this->assign('pc_lvxing_data', $pc_lvxing_data);
        //商家推荐6条信息
        $pc_shangjia_data = $article_model->alias('a')->join('left join __CATEGORY__ c on a.cate_id = c.cate_id')
            ->field('article_id,url,titleimg')
            ->where(array('status' => 1, 'a.cate_id' => '36'))->order('newstime desc')
            ->limit('6')->select();
        $this->assign('pc_shangjia_data', $pc_shangjia_data);


        //最新信息(移动端)
        $map = array('status' => 1 );
        $new_data = $article_model->alias('a')->join('left join __CATEGORY__ c on a.cate_id = c.cate_id')
                                    ->field('article_id,title,titleimg,newstime,synopsis,clicks,url,content,zan')->where($map)
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


    /**
     * 自动更新文章
        //区分user_id
     */
    public function auto_update(){
        $newstime = date('Y-m-d', time());
        $article_model = D('Article');
        $article_model->where(array('newstime' => $newstime, 'status' => '0'))->setField('status','1');
    }



}