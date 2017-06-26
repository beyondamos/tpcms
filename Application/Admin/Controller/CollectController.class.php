<?php
namespace Admin\Controller;
use Admin\Controller\CommonController;

/**
 * Class CollectController
 * @package Admin\Controller
 * 采集控制器
 */
class CollectController extends CommonController{

    public function index(){
        $map = array();
        if(IS_POST){
            $cate_id = I('post.cate_id');
            $title = I('post.title');
            if($cate_id != 0) $map['c.cate_id'] = $cate_id;
            if($title != '') $map['title']  = array('like', '%'.$title.'%');
        }

        $category_model = D('Category');
        $category_data = $category_model->getSortCategories();
        $this->assign('category_data', $category_data);
        $collect_model = D('Collect');
        $p = I('get.p') ? I('get.p') : 1;
        $count = $collect_model->count();
        $page = new \Think\Page($count, 20);
        $show = $page->show();
        $this->assign('show', $show);
        $collect_data = $collect_model->alias('c')->field('c.*,ca.cate_name')
            ->join('left join __CATEGORY__ ca on c.cate_id = ca.cate_id')
            ->where($map)
            ->page($p,', 20')->select();
        $this->assign('collect_data', $collect_data);
        $this->display();
    }

    /**
     * 删除采集信息
     */
    public function delete(){
        $id = I('get.id');
        $collect_model = D('Collect');
        if($collect_model->delete($id)){
            $this->success('删除成功', U('Collect/index'), 1);
        }else{
            $this->error('删除失败');
        }
    }

    /**
     * 单条采集信息
     */
    public function collect(){
        $collect_model = D('Collect');
        $id = I('get.id');
        if($collect_model->collect($id)){
            $this->success('采集成功', U('Article/listing'), 1);
        }else{
            $this->error('采集失败');
        }
    }

}