<?php
namespace Home\Controller;

use Home\Controller\CommonController;

/**
 * 房产控制器
 */
class FangchanController extends CommonController
{
    /**
     * 详情页
     */
    public function detail($id)
    {
        $this->clicks();

        //房产详情
        $id = (int)$id;
        $fangchan_model = D('Fangchan');
        $fangchan_data = $fangchan_model->find($id);
        $this->assign('fangchan_data', $fangchan_data);

        //底部相关推荐 小区名称相同的另外4条信息。
        $relation_data = $fangchan_model->where(array('compound_name' => $fangchan_data['compound_name'], 'id' => array('neq', $id)))->order("createtime desc")->limit(4)->select();
        $this->assign('relation_data', $relation_data);

        //右侧房产排行榜
        $ranking_list = $fangchan_model->order('clicks desc')->limit(6)->select();
        $this->assign('ranking_list', $ranking_list);

        $this->display();
    }


    public function index()
    {
        $p = I('get.p') ? I('get.p') : 1;
        $fangchan_model = D('Fangchan');
        $count = $fangchan_model->count();
        $page = new \Think\Pagehome($count, 10);
        $show = $page->show();
        $this->assign('show', $show);

        $new_data = $fangchan_model->order('createtime desc')->page($p.',10')->select();
        $this->assign('new_data', $new_data);

        $recommend_data = $fangchan_model->order('clicks desc')->page($p.',10')->select();
        $this->assign('recommend_data', $recommend_data);

        $this->display();
    }



    /**
     * 增加点击量
     */
    public function clicks(){
        $fangchan_model = D('Fangchan');
        $id = I('get.id');
        $time = time();
        //判断是否增加真实点击量
        //将点击的页面都保存到cookie中去
        if(cookie('fangchan_clicks')){
            $fangchan_clicks = unserialize(cookie('fangchan_clicks'));
//            var_dump($fangchan_clicks);
        }else{
            $fangchan_clicks = array();
        }
        //判断是否有点击过的记录,如果有，那么判断是否过期并清除
        $info = array();
        if($fangchan_clicks){
            foreach($fangchan_clicks as $key => $val){
                if(($time - $val) < 3600*24){
                    $info[$key] = $val;
                }
            }
            //如果记录里面没有该文章的信息了 增加真实
            if(!array_key_exists($id, $info)){
                $info[$id] = $time;
                $fangchan_model->where(array('id' => $id))->setInc('clicks');
            }
        }else{
            $info[$id] = $time;
            $fangchan_model->where(array('id' => $id))->setInc('clicks');
        }
        cookie('fangchan_clicks',serialize($info));
    }



}