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

        //增加点击量
        $this->clicks();

        //文章信息
        $article_model = D('Article');
        $article_data = $article_model->alias('a')->join('left join __CATEGORY__ c on a.cate_id = c.cate_id')->field('a.*,c.*')->find($article_id);
        $this->assign('article_data',$article_data);

        //右侧信息
        $this->rightInfo();
        //相关推荐
        $map = array('status' => 1, 'is_recommend' => 1);
        $related_data = $article_model->alias('a')->join('left join __CATEGORY__ c on a.cate_id = c.cate_id')
                                    ->field('article_id,titleimg,title,newstime,url,clicks,zan')->where($map)
                                    ->order('article_id desc')->limit('6')->select();
        $this->assign('related_data', $related_data);

        //移动端精彩推荐
        $mobile_recommend_data = $article_model->alias('a')->join('left join __CATEGORY__ c on a.cate_id = c.cate_id')
                                                ->field('article_id,titleimg,title,newstime,url,clicks,zan')
                                                ->where(array('a.cate_id'=> $article_data['cate_id']))->order('article_id desc')
                                                ->limit('10')->select();
        //如果不满10条信息，那么从其他地方凑满10条
        $num = count($mobile_recommend_data);
        if($num < 10){
            $other_num = 10 - $num;
            $mobile_recommend_data_other = $article_model->alias('a')->join('left join __CATEGORY__ c on a.cate_id = c.cate_id')
                                            ->field('article_id,titleimg,title,newstime,url,clicks,zan')
                                            ->where(array('a.cate_id' => array('neq' => $article_data['cate_id'])))->order('article_id desc')
                                            ->limit($other_num)->select();
            $mobile_recommend_data = array_merge($mobile_recommend_data,$mobile_recommend_data_other);
        }

        $this->assign('mobile_recommend_data', $mobile_recommend_data);
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

        $p = I('get.p') ? I('get.p') : 1;

        //最新信息
        $article_model = D('Article');
        $map = array('status' => 1,  'c.cate_id' => $cate_data['cate_id']);
        $new_data = $article_model->alias('a')->join('left join __CATEGORY__ c on a.cate_id = c.cate_id')
            ->field('article_id,title,titleimg,newstime,synopsis,clicks,url,content,zan')->where($map)
            ->order('newstime desc')->page($p.',10')->select();
        $this->assign('new_data', $new_data);
        //分页数据
        $count = $article_model->where(array('status' => 1,  'cate_id' =>  $cate_data['cate_id']))->count();
        $page = new \Think\Pagehome($count,10);
        $show = $page->show();
        $this->assign('show',$show);
        //推荐
        $map = array('status' => 1, 'is_recommend' => 1 , 'c.cate_id' => $cate_data['cate_id']);
        $recommed_data = $article_model->alias('a')->join('left join __CATEGORY__ c on a.cate_id = c.cate_id')
            ->field('article_id,title,titleimg,newstime,synopsis,clicks,url,content,zan')->where($map)
            ->order('newstime desc')->page($p.',10')->select();
        $this->assign('recommed_data', $recommed_data);

        //分页数据
        $count = $article_model->where(array('status' => 1, 'is_recommend' => 1, 'cate_id' =>  $cate_data['cate_id']))->count();
        $page = new \Think\Pagehome($count,10);
        $show = $page->show();
        $this->assign('show1',$show);


        //右侧信息
        $this->rightInfo();
        $this->display();
    }

    /**
     * 文章点赞功能
     */
    public function zan(){
        $article_id = I('post.article_id');
        $article_model = D('Article');
        if(cookie('zanArticles')){
            //判断是否存在 赞过的文章cookie
            $zanArticles = unserialize(cookie('zanArticles'));
            //判断当前文章是否在这个数组中
            if(in_array($article_id, $zanArticles)){
                $this->ajaxReturn(array('status' => 0));
            }else{
                //如果文章没有点过赞
                $article_model->where(array('article_id' => $article_id))->setInc('zan');
                $zanArticles[] = $article_id;
                cookie('zanArticles',serialize($zanArticles), 3600*24);
                $this->ajaxReturn(array('status' => 1));
            }
        }else{
            //点赞 存cookie
            $article_model->where(array('article_id' => $article_id))->setInc('zan');
            $zanArticles[] = $article_id;
            cookie('zanArticles',serialize($zanArticles), 3600*24);
            $this->ajaxReturn(array('status' => 1));
        }

    }


    /**
     * 下拉
     */
    public function dropDown(){
        $cate_name = I('post.cate_name');
        $i = I('post.start') * 10;
        $category_model = D('Category');
        $category_data = $category_model->where(array('url' => $cate_name))->find();

        if($category_data){
            $map['c.cate_id'] = $category_data['cate_id'];
        }
        $map['status'] = 1;
        $article_model = D('Article');
        $article_data = $article_model->alias('a')->join('left join __CATEGORY__ c on a.cate_id = c.cate_id')
                        ->field('article_id,title,titleimg,newstime,synopsis,clicks,url,content')
                        ->where($map)->order('article_id desc')->limit($i.',10')->select();
        $empty = '<div id="none"></div>';
        $this->assign('article_data', $article_data);
        $this->assign('empty', $empty);
        $this->display();

    }

    /**
     * 增加点击量
     */
    public function clicks(){
        $article_id = I('get.article_id');
        $time = time();

        //首先只要浏览器刷新就会增加点击量  第一次增加随机1-10个点击，然后每次刷新增加1个点击
        $article_model = D('Article');
        //判断是否存在第一次点击的cookie数组
        if(cookie('first_click')){
            $first_click = unserialize(cookie('first_click'));
        }else{
            $first_click = array();
        }
        $clicks = array();
        if($first_click){
            foreach($first_click as $key => $val){
                if(($time - $val) < 3600*24){
                    $clicks[$key] = $val;
                }
            }
            //如果记录里面没有该文章的信息了 增加真实
            if(!array_key_exists($article_id, $clicks)){
                $clicks[$article_id] = $time;
                $article_model->where(array('article_id' => $article_id))->setInc('clicks',mt_rand(1,10));
            }else{
                $article_model->where(array('article_id' => $article_id))->setInc('clicks');
            }
        }else{
            $clicks[$article_id] = $time;
            $article_model->where(array('article_id' => $article_id))->setInc('clicks',mt_rand(1,10));
        }
        cookie('first_click', serialize($clicks));



        //判断是否增加真实点击量
//        $ip = get_client_ip();
        //将点击的页面都保存到cookie中去
        if(cookie('real_clicks')){
            $real_clicks = unserialize(cookie('real_clicks'));
//            var_dump($real_clicks);
        }else{
            $real_clicks = array();
        }
        //判断是否有点击过的记录,如果有，那么判断是否过期并清除
        $info = array();
        if($real_clicks){
            foreach($real_clicks as $key => $val){
                if(($time - $val) < 3600*24){
                    $info[$key] = $val;
                }
            }
            //如果记录里面没有该文章的信息了 增加真实
            if(!array_key_exists($article_id, $info)){
                $info[$article_id] = $time;
                $article_model->where(array('article_id' => $article_id))->setInc('real_clicks');
            }
        }else{
            $info[$article_id] = $time;
            $article_model->where(array('article_id' => $article_id))->setInc('real_clicks');
        }
        cookie('real_clicks',serialize($info));
    }



}