<?php
/**
 * 帖子控制器
 */
namespace Member\Controller;
use Member\Controller\CommonController;

class PostController extends CommonController{
    /**
     * 会员帖子列表
     */
    public function index(){
        $member_id = session('member_id');
        $post_model = D('Post');
        $p = I('get.p') ? I('get.p') : 1;
        $post_data = $post_model->where(array('member_id' => $member_id))->order('newstime desc')->page($p.',10')->select();
        $this->assign('post_data', $post_data);
        $count = $post_model->where(array('member_id' => $member_id))->count();
        $page_model = new \Think\Pagemember($count,10);
        $show = $post_model->show();
        $this->assign('pageLink', $show);
        $this->display();
    }


}